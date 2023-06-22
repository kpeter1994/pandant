<div class="mt-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{request()->is('equipment') ? 'active' : ''}}"  href="{{route('equipment.index')}}">Berendezések</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->is('error') ? 'active' : ''}}" href="{{route('error.index')}}">Hibabejelentések</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->is('work-center') ? 'active' : ''}}" href="{{route('work-center.index')}}">Karbantartók</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{request()->is('work-orders') ? 'active' : ''}}" href="{{route('work-orders.index')}}">Beosztás</a>
        </li>
    </ul>
</div>
<div class="d-flex justify-content-end p-2">
    @foreach(getCurrentMaintrencers($services) as $services)
        <button class="btn btn-secondary">
            {{$services->workCenter->name}}
            <i class="fas fa-phone"></i>
        </button>
        <span>{{$services->workCenter->tel}}</span>

    @endforeach

</div>
@section('script')
    <script>
        let hello = 'Hello'
    </script>
@endsection
