<div>
    <input type="text" class="form-control" wire:model="searchWorker" placeholder="Keresés a karbantartók között">

    <table class="table">
        @foreach ($searchResults as $result)
            <tr>
                <td>{{ $result->name }}</td>
                <td>{{ getTelTransform($result->tel) }}</td>
                <td>{{ $result->position }}</td>
                <td>{{ $result->supervisor }}</td>
            </tr>
        @endforeach
    </table>
</div>
