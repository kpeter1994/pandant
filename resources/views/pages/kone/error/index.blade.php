@extends('layouts.app')

@section('content')

    <div class="content-wrapper" style="min-height: 1000px!important;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('partials._tabs')
                    <h1 class="fs-4 my-3 fw-bold">Hibabbejelentések</h1>
                        <table class="table table-responsive table-small" id="myTable">
                            <tr class="text-center">
                                <th>Művelet</th>
                                <th>Hibajegy száma</th>
                                <th>Dátum</th>
                                <th>Bejelentés Időpontja </th>
                                <th>Szerződésszám</th>
                                <th>Partner neve</th>
                                <th>Beépítési cím</th>
                                <th>Equipment</th>
                                <th>ÉMI szám</th>
                                <th>Berendezés típusa</th>
                                <th>Karbantartó </th>
                                <th>Hiba elhárító karbantartó</th>
                                <th>Hibajelenség leírása</th>
                                <th>Hiba típusa</th>
                                <th>Áll-e a lift?</th>
                                <th>Hány sérült van? </th>
                                <th>Diszpécser neve</th>
                                <th>Bejelentő</th>
                                <th>Bejelentő telefonszáma</th>
                                <th>Komment</th>
                            </tr>
                            @foreach($errors as $error)
                                <tr>
                                    <td><button id="row{{$error->id}}" class="btn btn-primary btn-sm" onclick="copyRowToClipboard('row{{$error->id}}')">Másolás</button></td>
                                    <td>{{date('mddi',strtotime($error->created_at)) }}_P</td>
                                    <td>{{date('Y.m.d',strtotime($error->created_at)) }}</td>
                                    <td>{{date('H:i',strtotime($error->created_at)) }}</td>
                                    <td>{{$error->equipment->legacy_reference}}</td>
                                    <td>{{$error->equipment->name}}</td>
                                    <td>{{$error->equipment->address}}</td>
                                    <td>{{$error->equipment->equipment}}</td>
                                    <td>{{$error->equipment->emi}}</td>
                                    <td>{{$error->equipment->type}}</td>
                                    <td>{{$error->equipment->work_center}}</td>
                                    <td>{{$error->troubleshooter}}</td>
                                    <td>{{$error->description}}</td>
                                    <td>{{$error->error_type}}</td>
                                    <td>{{$error->stand}}</td>
                                    <td>{{$error->injured}}</td>
                                    <td>{{$error->recorder}}</td>
                                    <td>{{$error->whistleblower}}</td>
                                    <td>{{$error->phone}}</td>
                                    <td>{{$error->comment}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    <script>
        document.querySelectorAll("#myTable button").forEach((button) => {
            button.addEventListener("click", (event) => {
                let rowContent = "";
                let row = event.target.parentElement.parentElement;
                let cells = row.querySelectorAll("td:not(:first-child)"); // Ez csak az utolsó előtti cellákig veszi figyelembe

                cells.forEach((cell) => {
                    rowContent += cell.textContent + "\t";
                });

                navigator.clipboard.writeText(rowContent.trim()).then(function() {
                    /* sikeres másolás */
                    console.log('Másolás sikeres!');
                }, function(err) {
                    /* másolás sikertelen */
                    console.error('Hiba történt a másolás közben: ', err);
                });
            });
        });

    </script>
@endsection
