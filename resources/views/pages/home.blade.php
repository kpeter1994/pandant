@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="feed-container">
            <div class="mb-3">
                <!-- Button trigger modal -->
                <div class="card p-3">
                    <button type="button" class="btn btn-primary r" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Új bejegyzés létrehozása
                    </button>
                </div>

                {{--<form id="post-form">
                    @csrf
                    <input type="text" id="author" name="author" placeholder="Author">
                    <textarea id="content" name="content" placeholder="Content"></textarea>
                    <input type="text" id="image" name="image" placeholder="Image URL (optional)">
                    <input type="text" id="category" name="category" placeholder="Category">
                    <button type="submit">Submit</button>
                </form>--}}


                <!-- Modal -->

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div>
                                    <h1 class="modal-title" > Bejegyzés létrehozása</h1>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['url' => isset($post) ? route('posts.update', $post) : route('posts.store'), 'method' => isset($post) ? 'PUT' : 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="form-group">
                                    {!! Form::label('author', 'Szerző') !!}

                                    {!! Form::text('author', isset($post) ? $post->author : Auth::user()->name, ['class' => 'form-control']) !!}

                                </div>

                                <div class="form-group">
                                    {!! Form::label('category', 'Kategória') !!}
                                    {!! Form::text('category', isset($post) ? $post->category : null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('content', 'Tartalom') !!}
                                    {!! Form::textarea('content', isset($post) ? $post->content : null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('image', 'Kép') !!}
                                    {!! Form::file('image', ['class' => 'form-control-file']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::submit(isset($post) ? 'Mentés' : 'Létrehozás', ['class' => 'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="timeline">

                <div class="time-label">
                    <span class="bg-red">10 Feb. 2014</span>
                </div>


                <div>
                    <i class="fas fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                        <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                            <a class="btn btn-primary btn-sm">Read more</a>
                            <a class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                </div>


                <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                    </div>
                </div>


                <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                        <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                            <a class="btn btn-warning btn-sm">View comment</a>
                        </div>
                    </div>
                </div>


                <div class="time-label">
                    <span class="bg-green">3 Jan. 2014</span>
                </div>


                <div>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                        <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                        </div>
                    </div>
                </div>


                <div>
                    <i class="fas fa-video bg-maroon"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
                        <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>
                        <div class="timeline-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="timeline-footer">
                            <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        console.log(document.getElementById('author').textContent)
        console.log(document.getElementById('content').textContent)

        document.getElementById('post-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const data = {
                _token: document.querySelector('input[name="_token"]').value,
                author: document.getElementById('author').value ,
                content: document.getElementById('content').value,
                image: document.getElementById('image').files[0].name,
                category: document.getElementById('category').value,
            };

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/posts', true);
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 400) {
                    const response = JSON.parse(xhr.responseText);
                    alert('Post created successfully' );
                    console.log(response);
                } else {
                    const error = JSON.parse(xhr.responseText);
                    alert('Error: ' + error.message);
                    console.error(error);
                }
            };
            xhr.onerror = function () {
                alert('Request failed');
            };
            xhr.send(JSON.stringify(data));
        });
    </script>
@endsection
