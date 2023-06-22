
@extends('layouts.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1000px!important;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('partials._tabs')
                    <div class="col-12 px-3 ">
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-outline-info rounded-pill" href="{{route('work-orders.create')}}"><i class="fas fa-calendar-day me-2"></i>Beosztás kezelése</a>
                        </div>


                        <h2 class="fs-5">Ügyeletesek</h2>
                        <table class="table mt-3">
                            <tr>
                                <th class="text-center">Dátum</th>
                                <th colspan="2" class="text-center">Délelötti ügyeletesek</th>
                                <th class="text-center">Délutáni ügyeletes</th>
                                <th class="text-center">Mozgólépcső ügyeletes</th>
                            </tr>
                            @foreach($groupedServices as $date => $services)
                                <tr>
                                    <td>{{$date}}</td>

                                    @foreach ($services as $service)
                                        <td class="text-center" {{($service->status == '3') ? 'colspan= 3 ' : null}}>{{ $service->workCenter->name }}

                                            <form class="d-inline" action="{{route('work-orders.destroy',$service->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn  btn-sm bg-dark"><i class="fas fa-minus-square"></i></button>
                                            </form>
                                        </td>
                                    @endforeach
                                </tr>

                            @endforeach

                        </table>
                        <h2 class="mt-5 fs-5">Távol lévők</h2>
                        <table class="table">

                                @foreach($groupedAbsents as $date => $absents)
                                    <tr>
                                        <td>{{$date}}</td>

                                        @foreach ($absents as $absent)
                                            <td class="text-center" {{($absent->status == '3') ? 'colspan= 3 ' : null}}>{{ $absent->workCenter->name }}
                                                <span class="badge text-bg-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, minus nam! Alias aspernatur earum eius facere iste placeat voluptatem voluptates?" >{{getStatusName($absent->status)}}</span>

                                                <form class="d-inline" action="{{route('work-orders.destroy',$absent->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn  btn-sm bg-dark" ><i class="fas fa-minus-square"></i></button>
                                                </form>
                                            </td>
                                        @endforeach
                                    </tr>

                                @endforeach

                        </table>


                    </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
