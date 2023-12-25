<!-- resources/views/transactions.blade.php -->
<html>

<head>
    <title>Daftar Transaksi</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Tipe</th>
                <th>Status</th>
                <!-- Tambahkan kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            {{-- <td> {{ $transactions->order_id }}</td>
            <td> {{ $transactions->payment_type }}</td>
            <td> {{ $transactions->gross_amount }}</td>
            <td> {{ $transactions->transaction_time }}</td>
            <td> {{ $transactions->acquirer }}</td>
            <td> {{ $transactions->transaction_status }}</td> --}}
            {{-- {{ $transactions->transaction_time }} --}}
            {{-- @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->order_id }}</td>
                    <td>{{ $transaction->payment_type }}</td>
                    <td>{{ $transaction->gross_amount }}</td>
                </tr>
            @endforeach --}}

            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction['payment_type'] }}</td>
                <td>{{ $transaction['transaction_status'] }}</td>
                <td>{{ $transaction['gross_amount'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>

</html>
