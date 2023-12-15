<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color:black; font-size:14px;">
    <center>
    <div class="card-cetakOrder" style="width: 200px; height:100%;   background-color: white;">
    <center>
        <img style="height: 70px; width:70px;" src="{{ asset('assets/icon/logo kedai kopi.png') }} " alt="">
        <h5>Orderan</h5>
    </center>
 <div class="" style="text-align: start; margin:5px; width:100%">
    <p>Tanggal: {{ $tanggalSekarang }}</p>
    {{-- {{ $orderChard->created_at }} <br> --}}
    -------------------------
    <br>
    <table>
    <tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    @foreach($menus as $index => $menu)
    <tr>
        <td>{{ $menu }}</td>
        <td>x{{ $jumlahs[$index] }}</td>
        <td>{{ $subHargas[$index] }}</td>
    </tr>
@endforeach
</table>
-------------------
<table>
    <tr>
        <td>Sub total</td>
        <td> : @currency($orderChard->total_harga)</td>
    </tr>
    <tr>
        <td>Ppn(0%)</td>
        <td>: Rp. 0 </td>
    </tr>
    <tr>
        <td>Total</td>
        <td> : @currency($orderChard->total_harga)</td>
    </tr>
</table>
    -------------------------
    <p>Tunai</p>
    <p>Kembalian</p>
    -------------------------
    <center>
        Terima kasih atas kunjungan anda
    </center>
</div>

</div>
</center>
{{-- <script>
    window.print();
</script> --}}
</body>
</html>