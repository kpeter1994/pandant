@extends('layouts.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1000px!important;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-3">
                        @livewire('post')

                    </div>
                    @foreach($categories as $category)
                        <div class="col-lg-6 col-xl-4">
                            <div class=" p-2 p-lg-4 card flex-row gap-3">
                                <div class="img-container">
                                    <img class="img-fluid" src="{{asset('/'.$category->image)}}" alt="">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="{{route('category.show',$category->id)}}"><h3>{{$category->category_name}}</h3></a>

                                </div>
                            </div>
                        </div>

                    @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    <script>


    </script>
@endsection
