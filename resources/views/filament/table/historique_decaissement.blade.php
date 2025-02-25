<div>
    <table class="table w-full">
        <tr class="bg-primary-500">
            <th>Date de decaissement</th>
            <th>Taux</th>
            <th>Montant</th>
        </tr>
        @foreach($record->decaissements as $decaissement)
            <tr class="p-2 bg-gray-200">
                <td class="text-center">{{$decaissement->created_at}}</td>
                <td class="text-center">{{$decaissement->taux}}</td>
                <td class="text-center">{{$decaissement->montant}}</td>
            </tr>
        @endforeach
    </table>
</div>
