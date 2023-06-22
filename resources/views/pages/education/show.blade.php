@extends('layouts.app')

@section('content')
    <div class="content-wrapper edu-container">
        <div class="row m-0">
            <div class="col-lg-8 py-3 px-5">
                <h1>{{$post->title}}</h1>
                {!! $post->content !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>


    </script>
@endsection
