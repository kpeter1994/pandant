<div class="modal-body">
    {!! Form::open(['url' => isset($category) ? route('category.update', $category) : route('category.store'), 'method' => isset($category) ? 'PUT' : 'POST', 'enctype' => 'multipart/form-data' ]) !!}



    <div class="form-group">
        {!! Form::label('category_name', 'Partner') !!}
        {!! Form::text('category_name', isset($category) ? $category->category_name : null, ['class' => 'form-control', 'id' => 'content-field']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('master_category', 'Fő partner (ha van)') !!}
        {!! Form::text('master_category', isset($category) ? $category->master_category : null, ['class' => 'form-control', 'id' => 'master_category']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Leírás') !!}
        {!! Form::textarea('description', isset($category) ? $category->description : null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Kép') !!}
        {!! Form::file('image', ['class' => 'form-control-file']) !!}
    </div>

    <div class="form-group d-flex justify-content-between">
        <a @class('btn btn-secondary') href="/category">Vissza</a>
        {!! Form::submit(isset($category) ? 'Mentés' : 'Létrehozás', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
