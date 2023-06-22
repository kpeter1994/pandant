@extends('layouts.app')

@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
@endsection

@section('content')

    <div class="content-wrapper" style="min-height: 1000px!important;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('partials._tabs')
                    <div class="col-12 p-3 ">
                        <div class="card mt-5">


                            {!! Form::open(['url' => isset($workOrder) ? route('work-orders.update', $workOrder) : route('work-orders.store'), 'method' => isset($workOrder) ? 'PUT' : 'POST', 'class'=>'row' ]) !!}


                            <div class="form-group col-3">
                                {!! Form::label('worker', 'Szerelő') !!}
                                {!! Form::text('worker', isset($workOrder) ? $workOrder->worker_id : null , ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-3">
                                {!! Form::label('status', 'Státusz') !!}
                                {!! Form::select('status',[
                                                                1 => 'Délelötti ügyeletes',
                                                                2 => 'Délutáni ügyeletes',
                                                                3 => 'Egésznapos ügyeletes',
                                                                4 => 'Mozgólépcső ügyeletes',
                                                                5 => 'Szabadság',
                                                                6 => 'Külön munka',
                                                                7 => 'Nem elérhető'
                                                                ],
                                  isset($workOrder) ? $workOrder->status : null  , ['class' => 'form-select']) !!}
                            </div>
                            <div class="form-group col-3">
                                {!! Form::label('start', 'Kezdés') !!}
                                {!! Form::datetimeLocal('start',isset($workOrder) ? $workOrder->start : null , ['class' => 'form-control',]) !!}
                            </div>
                            <div class="form-group col-3">
                                {!! Form::label('end', ' Vége ') !!}
                                {!! Form::datetimeLocal('end',isset($workOrder) ? $workOrder->end : null  , ['class' => 'form-control', ]) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::submit(isset($workOrder) ? 'Mentés' : 'Létrehozás', ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $.getJSON('/api/work_centers', function (data) {
                var availableWorkers = [];
                for (let i = 0; i < data.length; i++) {
                    availableWorkers.push(data[i].name);
                }
                $("#worker").autocomplete({
                    source: availableWorkers
                });
            });
        });
    </script>
@endsection
