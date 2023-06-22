@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="feed-container">
            <div class="my-5">
                <div class="modal-body mb-5">
                    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                    <div class="form-group">
                        {!! Form::label('author', 'Szerző neve') !!}
                        {!! Form::text('author', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category', 'Kategória') !!}
                        {!! Form::select('category',  [
                                                        'Hírek' => 'Hírek',
                                                        'Sport' => 'Sport',
                                                        'Szórakozás' => 'Szórakozás',
                                                        'Technológia' => 'Technológia',
                                                    ], null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('content', 'Tartalom') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('image', 'Kép') !!}
                        {!! Form::file('image', ['class' => 'form-control-file']) !!}
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-secondary" href="{{route('posts.index')}}">Vissza</a>
                        {!! Form::submit('Mentés', ['class' => 'btn btn-primary']) !!}
                    </div>


                    {!! Form::close() !!}
                </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>


    </script>
@endsection
