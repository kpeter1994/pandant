@extends('layouts.app')

@section('title','Új bejegyzés létrehozása')




@section('content')

    <div class="content-wrapper" style="min-height: 1000px!important;">
        <div class="content">
            <div class="container-fluid">

    <div class="row my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Parnerek</h1>
            <div>
                <a class="btn btn-primary" href="{{route('category.create')}}"><i class="fas fa-plus-circle me-2"></i>Új partner hozzáadása</a>
            </div>

        </div>

        @foreach($categories as $category)
            <div class="col-lg-6 col-xl-4">
                <div class=" p-2 p-lg-4 card flex-row gap-3">
                    <div class="img-container">
                        <img class="img-fluid" src="{{asset('/'.$category->image)}}" alt="">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <a href=""><h3>{{$category->category_name}}</h3></a>
                        <div>
                            <a class="btn btn-primary btn-sm" href="{{route('category.edit',$category->id)}}">Szerkeszt</a>
                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#categoryDelete-{{$category->id}}" href="">Töröl</a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="categoryDelete-{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Partner törlése</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Biztosan törlöd a <strong>{{$category->category_name}}</strong>-et a partnerek közül?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{route('category.destroy', $category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" ><i
                                        class="far fa-trash-alt me-2"></i>Igen, törlöm</button>
                            </form>
                        </div>
                    </div>
                </div>
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
