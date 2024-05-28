@extends('user.layout.header')

  @section('content')
  <div class="container">
    <div class="container-fluid mb-5">
      <div class="row justify-content-center">
        <div class="card col-lg-10" style="margin-top: 10%">
          <div class="card-body">
            <h2 class="card-title">Ketentuan</h2>
            <?php $no=1 ?>
            <p class="card-text text-start">{{ $no++ }}. Reservasi diperbolehkan h-1 minggu sebelum penginapan</p>
            <p class="card-text text-start">{{ $no++ }}. Cek terlebih dahulu mengenai ketersediaan kamar</p>
            <p class="card-text text-start">{{ $no++ }}. Lakukan Login terlebih dahulu sebelum melakukan reservasi kamar</p>
            <p class="card-text text-start">{{ $no++ }}. Setelah melakukan reservasi kamar, diharapkan melakukan pembayaran minimal 50% dalam rentan waktu 1 jam</p>
            <p class="card-text text-start">{{ $no++ }}. Untuk pembayaran dapat dilakukan via transfer pada rekening yang telah disediakan</p>
            <p class="card-text text-start">{{ $no++ }}. Setelah melakukan pembayaran, harap melakukan konfirmasi pembayaran dengan upload bukti transfer pada menu yang disediakan website</p>
            <p class="card-text text-start">{{ $no++ }}. Jika dalam rentan waktu 1 jam tidak melakukan konfirmasi pembayaran, maka data pemesanan akan otomatis terhapus</p>
            <p class="card-text text-start">{{ $no++ }}. Kamar yang sudah di pesan dan di konfirmasi tidak dapat melakukan pembatalan atau meminta uang kembali</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection