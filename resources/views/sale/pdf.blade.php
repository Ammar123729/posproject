<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Sales Report</title>
    <style>
        .table {
            box-shadow: 10px 10px 5px #aaaaaa;
        }
    </style>
</head>

<body>


    <table class="table table-striped" border="1" cellpadding="5">
        <thead>
            <tr style="background-color: #CCCCFF;">
                <th>Sale ID</th>
                <th>Party Name</th>
                <th>Transction Detail</th>
                <th>Payment Method</th>
                <th>Payment</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody style="background-color: #9999FF;">
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->party->party_name }}</td>
                <td>{{ $sale->status }}</td>
                <td>{{ $sale->payment_method }}</td>
                <td>{{ $sale->cash_details }}</td>
                <td>{{ $sale->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>