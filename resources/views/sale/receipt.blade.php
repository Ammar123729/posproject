<!-- resources/views/sale/receipt.blade.php -->
@include('sidebar.head')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        /* Add any styling you want for the receipt here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            width: 270px; /* Adjust width for receipt */
            border: 1px solid #000; /* Optional border for visual clarity */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000; /* Add borders */
            padding: 5px;
            text-align: left;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Receipt</h1>
    <p><strong>Party Name:</strong> {{ $party->party_name }}</p>
    <p><strong>Phone Number:</strong> {{ $phone_number }}</p>
    <p><strong>Invoice Number:</strong> {{ $invoice_number }}</p>
    <p><strong>Date:</strong> {{ $date }}</p>
    <p><strong>Payment Method:</strong> {{ $payment_method }}</p>
    <p><strong>Cash Details:</strong> {{ $cash_details }}</p>

    <table class="tab">
        <thead>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item['item_name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['total'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total Amount:</strong> {{ $totalAmount }}</p>

    <button id="printButton">Print Receipt</button>
    <button id="pdfButton">Generate PDF</button>

    <script>
        // Print functionality
        document.getElementById('printButton').onclick = function() {
            window.print();
        };

        // Generate PDF functionality
        document.getElementById('pdfButton').onclick = function() {
            window.location.href = '{{ route("receipt.pdf", ["id" => $invoice_number]) }}'; // Assuming you have a route for PDF generation
        };
    </script>
</body>
</html>
@include('sidebar.footbar')
