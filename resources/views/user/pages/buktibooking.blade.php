<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Booking</title>
    <style>
        @page {size: 12cm 10cm portrait}
    </style>
</head>
<body>
    <div class="row">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <center>
                    <i><h2 class="card-title" style="margin-bottom: -3%; text-align:center">Bukti Booking</h2></i>
                    <p><strong>{{ $reservasi->kode_booking }}</strong></p>
                    <p style="text-align:center; margin-top: -18px;">{{ $reservasi->pengunjung->nm_pengunjung }}</p>
                    <p style="margin-top: -15px; text-align:center">{{ $reservasi->pengunjung->email }}</p>
                    <p style="margin-top: -10px; text-align:center">{{ $reservasi->pengunjung->kontak }}</p>
                    <div class="col-12" style="margin-top: -10px">
                        <div class="row">
                            <div class="col-6" style="margin-top: -18px; text-align:center">
                                <p>Jumlah Orang: {{ $reservasi->jumlah_orang }}</p>
                            </div>
                            <div class="col-6" style="margin-top: -27px; text-align:center">
                                <p>Jumlah Kamar: {{ $reservasi->jumlah_kamar }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" style="margin-top: -27px; text-align:center">
                            <p>Check-In: {{ $reservasi->checkin }}</p>
                        </div>
                        <div class="col-6" style="margin-top: -30px; text-align:center">
                            <p>Check-Out: {{ $reservasi->checkout }}</p>
                        </div>
                    </div>
                    <p style="margin-top: -10px; text-align:center">Total Harga : {{ $reservasi->total_harga }}</p>
                    <p style="margin-top: -10px; text-align:center" {{ $reservasi->bukti_transfer != 0 }}>Status : Telah melakukan konfirmasi pembayaran</p>
                    <h6 class="card-subtitle" style="text-align:center">~~~ {{ $reservasi->bisnis->nm_bisnis }} ~~~</h6>
                </center>
            </div>
        </div>
    </div>
</body>
</html>