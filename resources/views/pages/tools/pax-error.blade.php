@extends('layouts.app')

@section('title', 'Pax hibajelentő')

@section('content')
    <div class="container">
        <h1 class="my-3 fs-4">Pax hibabejelentés</h1>
        <form>
            <div class="form-group mb-3">
                <label for="tid">TID</label>
                <input id="tid" class="form-control" type="text">
            </div>
            <table class="tid-message">

            </table>
            <div class="form-group mb-3">
                <label for="problem">Probléma megnevezése, összegzése:</label>
                <input id="problem" class="form-control" placeholder="pl: A terminál nem kommunikál" type="text">
            </div>
            <div class="form-group mb-3">
                <label for="company">Cégnév</label>
                <input id="company" class="form-control" placeholder="Koi Endre E.V." type="text">
            </div>
            <div class="form-group mb-3">
                <label for="name">Ügyfél neve</label>
                <input id="name" class="form-control" type="text">
            </div>
            <div class="form-group mb-3">
                <label for="tid">Telefonszám</label>
                <input id="tid" class="form-control" type="text">
            </div>
            <div class="form-group mb-3">
                <label for="error">Hiba részletes leírása</label>
                <textarea id="error" class="form-control" placeholder="A PAX A920-as készülék tegnap délután óta nem tud csatlakozni a hálózatra.
A készülék bekapcsol és elindul a hálózat ikon nem jelzi, hogy fent lenne a hálózaton"></textarea>

            </div>
            <div class="form-group mb-3">
                <label for="error-code">Hibakód (kijelzőn, bizonylaton):</label>
                <input id="error-code" class="form-control" placeholder="pl: 115" type="text">
            </div>
            <div class="form-group mb-3">
                <label for="tranz-info">Tranzakciós hiba esetén elutasított tranzakció adatai:</label>
                <input id="tranz-info" class="form-control" placeholder="pl: 2023.04.01. 10:10, 5000 Ft" type="text">
            </div>
            <div class="form-group mb-3">
                <label for="operation">Elvégzett műveletek leírása a megoldás érdekében:</label>
                <input id="operation" class="form-control" placeholder="pl.: terminál kikapcsolás SIM igazítás, újraindítás, ping teszt" type="text">
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary"><i class="fas fa-paper-plane me-2"></i>Levél küldése</button>
            </div>

        </form>

        <form action="mailto:cel@pelda.com" method="post" enctype="text/plain">
            <label for="subject">Tárgy:</label>
            <input type="text" id="subject" name="subject" required>
            <br>
            <label for="message">Üzenet:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <br>
            <input type="submit" value="Küldés">
        </form>
    </div>

@endsection

@section('scripts')
    <script>
        const tidList = [
            {
                tidPrefix: "3196",
                serviceProvider: "Worldline",
                software: "Wallee",
                supportedTerminal: "PAX Q80/S800/S920/A920/A920 Pro",
                guide: "worldline pax",
                guideLink: "https://drive.google.com/drive/folders/1dGj1CpajMoUU-ELhl88-73rn1LIFqNel"
            },
            {
                tidPrefix: "3238",
                serviceProvider: "Worldline",
                software: "Wallee",
                supportedTerminal: "PAX Q80/S800/S920/A920/A920 Pro",
                guide: "worldline pax",
                guideLink: "https://drive.google.com/drive/folders/1Xj9Tp12kuR8EDnZRkXmp_XFmkFyAa77B"
            },
            {
                tidPrefix: "314",
                serviceProvider: "Worldline",
                software: "",
                supportedTerminal: "Yomani XR Autonom/Yomani XR PINPAD Printer",
                guide: "yomani/yoximo",
                guideLink: "https://drive.google.com/drive/folders/1VcrSY2wKaS3awUBTb5kougkDmOXOyx0s"
            },
            {
                tidPrefix: "315",
                serviceProvider: "Worldline",
                software: "",
                supportedTerminal: "Yomani XR Autonom/Yomani XR PINPAD Printer",
                guide: "yomani/yoximo",
                guideLink: ""
            },
            {
                tidPrefix: "241",
                serviceProvider: "Worldline",
                software: "",
                supportedTerminal: "Yoximo mobile FLEX ",
                guide: "yomani/yoximo",
                guideLink: ""
            },
            {
                tidPrefix: "2970",
                serviceProvider: "eService",
                software: "eService Prolin",
                supportedTerminal: "PAX D220",
                guide: "eService prolin",
                guideLink: "https://drive.google.com/drive/folders/1PCCX8txyC_L7YgQXkt3t2AslT75CYctH"
            },
            {
                tidPrefix: "2727",
                serviceProvider: "eService",
                software: "eService Android",
                supportedTerminal: "PAX A920/A920 Pro",
                guide: "eService prolin",
                guideLink: "https://drive.google.com/drive/folders/11irCbi686xSkRb0CNEazXoNcg8cgGcSj"
            },
            {
                tidPrefix: "9851",
                serviceProvider: "Elavon",
                software: "Novelpay Prolin",
                supportedTerminal: "PAX S800/S920",
                guide: "eService prolin",
                guideLink: "https://drive.google.com/drive/folders/1DbNjFDqXvbvxHTpGNxRx-GRN8nv--B0B"
            },
            {
                tidPrefix: "2101",
                serviceProvider: "Elavon",
                software: "PAX Positive",
                supportedTerminal: "PAX A80/A920/A920 Pro",
                guide: "ELAVON android",
                guideLink: "https://drive.google.com/drive/folders/1scpSwnhhP8BzB72s2NnTD8x_7BJ_DD-a"
            },
            {
                tidPrefix: "s00h",
                serviceProvider: "NEXI",
                software: "",
                supportedTerminal: "Telium IWL221/ICT220/ICT250/IWL258",
                guideLink: "https://drive.google.com/drive/folders/1UpzdLbW5KcaAWC1KZUGyPDULWXFFDtZR"
            },
            {
                tidPrefix: "s00s",
                serviceProvider: "NEXI",
                software: "",
                supportedTerminal: "Telium IWL221/ICT220/ICT250/IWL258",
                guide: '',
                guideLink: "https://drive.google.com/drive/folders/1UpzdLbW5KcaAWC1KZUGyPDULWXFFDtZR"
            },
            {
                tidPrefix: "six",
                serviceProvider: "NEXI",
                software: "",
                supportedTerminal: "TETRA MOVE3500/MOVE2500/DESK3500/DESK3200",
                guide: '',
                guideLink: ""
            },

        ]

        let tid = document.getElementById('tid')
        let tidMessage = document.querySelector('.tid-message')
        console.log(tidList)

        tid.addEventListener('input', function (){
            if (tid.value.length > 2){
                for (let i = 0; i < tidList.length; i++){
                    if(tidList[i].tidPrefix.includes(tid.value)){
                        tidMessage.classList.add('bg-info')
                        tidMessage.classList.add('table')

                        tidMessage.innerHTML = `
                                              <tr>
                                                    <th>Szolgáltató:</th>
                                                    <th>Terminál software:</th>
                                                    <th>Támogatott terminálok: </th>
                                                    <th>Használati útmutató: </th>
                                              </tr>
                                              <tr>
                                                    <td>${tidList[i].serviceProvider}</td>
                                                    <td>${tidList[i].software}</td>
                                                    <td>${tidList[i].supportedTerminal}</td>
                                                    <td><a target="_blank" class="text-warning" href="${tidList[i].guideLink}">${tidList[i].guide}</a> </td>
                                              </tr> `
                    }
                }
            }

        })

    </script>
@endsection
