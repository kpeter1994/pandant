<div class="position-relative">

    <form class="d-flex">
        <div class="input-group">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fas fa-search text-white"></i>
            </button>
            <input type="text" class="form-control " wire:model="search" placeholder="Keresés...">
        </div>
    </form>

    <ul class="list-group position-absolute w-100 z-10">
        @foreach($posts as $post)
            <a href="{{route('edu.show',$post->id)}}">
                <li class="list-group-item bg-dark text-white"> {!! \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($post->content)), 150 ) !!} </li>
            </a>
        @endforeach
    </ul>


</div>
