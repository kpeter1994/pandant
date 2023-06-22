@extends('layouts.app')

@section('title','Új bejegyzés létrehozása')



@section('content')

    <div class="content-wrapper" style="min-height: 1000px!important;">
        <div class="content">
            <div class="container">
                <h1 class="my-3">{{$category->category_name}}</h1>
                <div class="row my-5">
                    @foreach($posts as $post)
                        <div class="col-12">
                            <a href="{{route('edu.show',$post->id)}}" class="card flex-row">
                                @if($post->image)
                                    <div class="w-50">
                                        <img class="img-fluid rounded rounded-1" src="{{asset($post->image)}}" alt="">
                                    </div>
                                @endif
                                <div class="p-4 d-flex flex-column justify-content-between">
                                    <p class="fw-bold fs-5">{{$post->title}}</p>
                                    <p>{{\Illuminate\Support\Str::limit(html_entity_decode(strip_tags($post->content)), 150)}}</p>
                                    <hr>
                                    <div>
                                        <p>{{$post->author}}<br>{{convertDate($post->created_at)}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>


    </script>
@endsection
