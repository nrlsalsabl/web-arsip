<table>
    <thead>
        <tr><th colspan="6">GA Archive</th></tr>
        <tr>
            <th>No</th>
            <th>Filling Number</th>
            <th>Cabinet Number</th>
            <th>Document Name</th>
            <th>Date</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gaData as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->filling_number }}</td>
            <td>{{ $item->cabinet_number }}</td>
            <td>{{ $item->document_name }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->category }}</td>
        </tr>
        @endforeach
    </tbody>

    <thead>
        <tr><th colspan="6">Vendor Archive</th></tr>
        <tr>
            <th>No</th>
            <th>Filling Number</th>
            <th>Cabinet Number</th>
            <th>Document Number</th>
            <th>Date</th>
            <th>Company</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vendorData as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $item->filling_number }}</td>
            <td>{{ $item->cabinet_number }}</td>
            <td>{{ $item->document_number }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->company_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
