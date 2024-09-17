<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .header-table, .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .header-table td, .items-table th, .items-table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .header-table td {
            width: 50%;
        }
        .items-table th {
            background-color: #f4f4f4;
        }
        .total-row td {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Sales Invoice</h2>

    <!-- Sales Header Information -->
    <table class="header-table">
        <tr>
            <td><strong>Invoice No:</strong> {{ $salesHData->invno }}</td>
            <td><strong>Date:</strong> {{ $salesHData->invdate }}</td>
        </tr>
        <tr>
            <td><strong>Customer Code:</strong> {{ $salesHData->cuscode }}</td>
            
        </tr>
        <tr>
        <td><strong>Customer Name:</strong> {{ $salesHData->cusengname }}</td>
        <td><strong>Customer Name Ar:</strong> {{ $salesHData->cusarname }}</td>
        <td><strong>Address :</strong> {{ $salesHData->address }}</td>
        </tr>
        <tr>
            <td><strong>Sales ID:</strong> {{ $salesHData->id }}</td>
            <td><strong>Customer ID:</strong> {{ $salesHData->cus_id }}</td>
        </tr>
    </table>

    <!-- Sales Items -->
    <table class="items-table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>VAT (%)</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesData as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->vat_percent }}%</td>
                    <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
            @endforeach
            <!-- Total Row -->
            <tr class="total-row">
                <td colspan="4" align="right">Total</td>
                <td>${{ number_format($salesData->sum(fn($item) => $item->quantity * $item->price), 2) }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Sales Summary -->
    <table class="header-table">
        <tr>
            <td><strong>Total:</strong> ${{ number_format($salesHData->total, 2) }}</td>
            <td><strong>VAT:</strong> ${{ number_format($salesHData->vat, 2) }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Grand Total:</strong> ${{ number_format($salesHData->gtotal, 2) }}</td>
        </tr>
    </table>

</body>
</html>
