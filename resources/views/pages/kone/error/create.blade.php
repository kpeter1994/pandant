@extends('layouts.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1000px!important;">
        <div class="content">
            <div class="container-fluid">
                <div class="card mt-5">


                    {!! Form::open(['url' => isset($error) ? route('error.update', $error) : route('error.store'), 'method' => isset($error) ? 'PUT' : 'POST', 'enctype' => 'multipart/form-data', 'class'=>'row' ]) !!}


                    <div class="form-group col-12">
                        {!! Form::label('error_id', 'Hibajegy száma') !!}
                        {!! Form::text('error_id', createErrorId(), ['class' => 'form-control' ]) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('title', 'Szerződés száma') !!}
                        {!! Form::text('title',$equipment->legacy_reference , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('title', 'Partner neve') !!}
                        {!! Form::text('title',$equipment->name , ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('title', ' Beépítési cím ') !!}
                        {!! Form::text('title',$equipment->address , ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('title', 'Equipment') !!}
                        {!! Form::text('title',$equipment->equipment , ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                        {!! Form::hidden('equipment_id',$equipment->id , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('title', 'ÉMI szám ') !!}
                        {!! Form::text('title',$equipment->emi , ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('title', 'Berendezés típusa') !!}
                        {!! Form::text('title',$equipment->type , ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('title', 'Karbantartó ') !!}
                        {!! Form::text('title',$equipment->work_center , ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('troubleshooter', 'Hiba elhárító karbantartó ') !!}
                        {!! Form::text('troubleshooter', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-8">
                        {!! Form::label('description', 'Hibajelenség leírása (Bejelentő)  ') !!}
                        {!! Form::text('description', null , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('error_type', 'Hiba típusa ') !!}
                        {!! Form::text('error_type', 'normál' , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('stand', 'Áll-e a lift? ') !!}
                        {!! Form::text('stand', 'i' , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('injured', 'Hány sérült van? ') !!}
                        {!! Form::text('injured', 'n' , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('recorder', 'Diszpécser neve') !!}
                        {!! Form::text('recorder', Auth::user()->name , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('whistleblower', 'Bejelentő neve') !!}
                        {!! Form::text('whistleblower',null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-2">
                        {!! Form::label('phone', 'Bejelentő tell') !!}
                        {!! Form::text('phone', null , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-12">
                        {!! Form::label('comment', 'Megjegyzés') !!}
                        {!! Form::text('comment', null , ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit(isset($error) ? 'Mentés' : 'Létrehozás', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

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
