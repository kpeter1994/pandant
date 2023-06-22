@extends('layouts.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1000px!important;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('partials._tabs')
                    <div class="col-12 p-3 ">
                        @livewire('work-center-search')
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
