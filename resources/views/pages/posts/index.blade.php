@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="feed-container">
            <div class="mb-3">
                <!-- Button trigger modal -->
                <div class="mb-3">
                    <button type="button" class="btn btn-outline-info w-100 rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                        <i class="fas fa-plus-circle me-2"></i>
                        Új bejegyzés létrehozása
                    </button>
                </div>

                
            <!-- Modal -->
                <div class="w-100">
                    @livewire('post')
                </div>
                @if(session('success'))
                    <div class="alert alert-success d-flex justify-content-between">
                        <div>
                            <i class="fas fa-check mb-2"></i>
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>

                @endif

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div>
                                    <h1 class="modal-title"> Bejegyzés létrehozása</h1>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @include('partials._create-form')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="timeline">




                @foreach($posts as $post)

                    @php
                        $category = \App\Models\Category::find($post->category_id);
                    @endphp
                    <div>
                        <div class="category-image">
                            @if(isset($category) && $category->image !== null)
                                <img src="{{asset($category->image)}}" alt="{{ $category->name}}" class="category-image">

                            @endif
                        </div>
                        <div class="timeline-item">
                            <span class="time"><i
                                    class="fas fa-clock me-2"></i>{{convertDate($post->created_at)}}</span>
                            @if($post->image !== null)
                                <div class="w-100 d-flex justify-content-center">
                                    <img class="img-fluid w-100" src="{{asset($post->image)}}" alt="">
                                </div>
                            @endif

                            <h3 class="timeline-header"><a href="#">{{$post->author}}</a> sent you an email</h3>
                            <div class="timeline-body">
                                {!! $post->content !!}
                            </div>
                            @if(Auth::check() && $post->author == Auth::user()->name)
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-sm"  href="{{route('posts.edit', $post->id)}}" >
                                        <i class="fas fa-edit me-2"></i>
                                        Szerkeszt</a>


                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#delete-{{$post->id}}">
                                        <i class="far fa-trash-alt me-2"></i>
                                         Törlés
                                    </button>
                                </div>
                                <div class="modal fade" id="delete-{{$post->id}}" tabindex="-1" aria-labelledby="delete"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5><i class="icon fas fa-exclamation-triangle"></i> Figyelem!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Biztosan törlöd ezt a bejegyzést?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Bezárás
                                                </button>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                      style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger " type="submit"><i
                                                            class="far fa-trash-alt me-2"></i> Igen, törlöm
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach


                <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>


    </script>
@endsection
