<div>
    <input type="text" wire:model="input" class="form-control my-3" placeholder="Keresés a berendezések között">

    <table class="table ">
        <tr class="text-center">
            <th>Szerződésszám</th>
            <th>Partner</th>
            <th>Cím</th>
            <th>Equipment</th>
            <th>ÉMI</th>
            <th>Típus</th>
            <th>Karbantartó</th>
            <th>Teherbírás</th>
            <th>Jelzés</th>

            <th>Művelet</th>
        </tr>
        @foreach ($equipments as $equipment)
            <tr>
                <td>{{ $equipment->legacy_reference }}</td>
                <td>{{ $equipment->name }}</td>
                <td>{{ $equipment->address }}</td>
                <td>{{ $equipment->equipment }}</td>
                <td>{{ $equipment->emi }}</td>
                <td>{{ $equipment->type }}</td>
                <td>{{ $equipment->work_center }}</td>
                <td>{{ $equipment->rated_load }}</td>
                <td>{{ $equipment->inventory_number }}</td>

                <td><a class="btn btn-warning " href="{{route('error.create',$equipment->id)}}"><i class="fas fa-wrench"></i></a></td>
            </tr>
        @endforeach
    </table>
</div>
