<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Reservasi</title>
    <style>
        @page {size: 12cm 10cm portrait}
    </style>
</head>
<body>
    <div class="row">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <?php $no=1 ?>
                <center>
                    <i><h2 class="card-title" style="text-align:center">Kode Reservasi</h2></i>
                    <strong>{{ $datareservasi->kode_booking }}</strong>
                    <p>Total Harga: <strong>Rp. {{ number_format($datareservasi->total_harga, 0, ',', '.') }}</strong></p>
                    <p>Silahkan lakukan pembayaran DP 50% seharga <strong>RP. {{ number_format($totalDP, 0, ',', '.') }}</strong> atau pembayaran penuh untuk konfirmasi pemesanan kamar pada menu "Konfirmasi Pemesanan"</p>
                    <p style="font-size: 65%; text-align: left"><strong>NB : Apabila dalam rentan waktu 1 jam belum melakukan konfirmasi maka kode reservasi tidak berlaku</strong></p>
                    <h6 class="card-subtitle" style="text-align:center">~~~ {{ $datareservasi->bisnis->nm_bisnis }} ~~~</h6>
                </center>
            </div>
        </div>
    </div>
</body>
</html>