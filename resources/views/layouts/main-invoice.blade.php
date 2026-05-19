<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice Pesanan #{{ $order->id }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .invoice-card { max-width: 800px; margin: 40px auto; border: none; box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15); }
        @media print {
            body { background-color: #fff; }
            .invoice-card { box-shadow: none; margin: 0; }
            .btn { display: none; }
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>