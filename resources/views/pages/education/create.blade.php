@extends('layouts.app')

@section('title','Új bejegyzés létrehozása')


@section('link')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: '#content-field',
            plugins: [
                'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                'lists','link','image','charmap','preview', 'code' ,'anchor','searchreplace','visualblocks',
                'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
            ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>
@endsection

@section('content')

    @if (Auth::check() && Auth::user()->status === 3)
        <div class="content-wrapper" style="min-height: 1000px!important;">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8 modal-body">
                            @include('partials._create-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    @else
        <div class="container">
            <p class="lead card bg-warning mt-3">Nem vagy jogosult ehez a tartalomhoz!</p>
        </div>

        </div>
    @endif




@endsection

@section('scripts')
    <script>


    </script>
@endsection
