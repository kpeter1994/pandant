@extends('layouts.app')

@section('title','Új bejegyzés létrehozása')


@section('link')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>



@endsection

@section('content')

    <div class="content-wrapper" style="min-height: 1000px!important;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 modal-body">
                        @include('partials._category-form')

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
