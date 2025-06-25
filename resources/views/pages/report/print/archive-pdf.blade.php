<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Export PDF</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            font-size: 12px;
        }

        h2 {
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <h2>GA Archive</h2>
    <table width="100%">
        <thead>
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
            @foreach ($gaData as $i => $item)
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
    </table>

    <h2>Vendor Archive</h2>
    <table width="100%">
        <thead>
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
            @foreach ($vendorData as $i => $item)
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

</body>

</html>
