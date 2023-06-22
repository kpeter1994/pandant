<div class="modal-body">
    {!! Form::open(['url' => isset($post) ? route('posts.update', $post) : route('posts.store'), 'method' => isset($post) ? 'PUT' : 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        {!! Form::hidden('author', isset($post) ? $post->author : Auth::user()->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Cím') !!}
        {!! Form::text('title', isset($post) ? $post->title : null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Kategória') !!}
        {!! Form::select('category_id', $categories->pluck('category_name', 'id'), isset($post) ? $post->category_id : null  ,['class' => 'form-select']) !!}

    </div>

    <div class="form-group">
        {!! Form::label('content', 'Tartalom') !!}
        {!! Form::textarea('content', isset($post) ? $post->content : null, ['class' => 'form-control', 'id' => 'content-field']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Kép') !!}
        {!! Form::file('image', ['class' => 'form-control-file']) !!}
    </div>

    <div class="form-group">
        {!! Form::hidden('post_type', isset($post) ? $post->post_type : $postType) !!}
        {!! Form::submit(isset($post) ? 'Mentés' : 'Létrehozás', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
