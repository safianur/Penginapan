@extends('user.layout.header')

  @section('content')
  <div class="container">
    <div class="container-fluid mb-5">
      <?php 
        $no=1;
        $total_pembayaran = 0; 
      ?>
      @foreach ($pengunjung as $datapengunjung)
      @foreach ($reservasi as $datareservasi)
      @if ($datareservasi->status != 'CheckOut')
      <div class="row justify-content-center">
        <div class="col-10" style="margin-top: 6%">
          <h5>Informasi Rincian Pembayaran</h5>
          <p>
            {{ $datapengunjung->nm_pengunjung }} <br>
            {{ $datapengunjung->email }} <br>
            {{ $datapengunjung->kontak }} <br>
            <b>Kode Unik : {{ $datareservasi->kode_booking }}</b>
          </p>
          <br>
          <h5>Status : </h5>
          @if ($datareservasi->bukti_transfer)
          <p>Telah Melakukan Konfirmasi Pembayaran</p>
          @else
          <p>Menunggu Konfirmasi Pembayaran</p>
          @endif
          <br>
          <div class="row">
            <div class="col-6">
              <h5>Rincian Pembayaran</h5>
            </div>
            @if ($datareservasi->bukti_transfer == '')
            <div class="col-6 d-flex justify-content-end">
              <a href="#" class="btnbg btn" data-bs-toggle="modal" data-bs-target="#uploadbuktitransfer{{ $datareservasi->id_reservasi }}"><span>Upload Bukti Transfer</span></a>
            </div>
            @endif
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Type Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Jumlah Kamar</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $datareservasi->typekamar->nm_typekamar }}</td>
                <td>{{ $datareservasi->checkin }}</td>
                <td>{{ $datareservasi->checkout }}</td>
                <td>{{ $datareservasi->jumlah_kamar }}</td>
                <td>Rp. {{ number_format($datareservasi->total_harga, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <td colspan="5" style="text-align:end"><b>Total</b></td>
                <?php
                  $total_harga = $datareservasi->total_harga;
                  $total_pembayaran += $total_harga
                ?>
                <td>Rp. {{ number_format($total_pembayaran, 0, ',', '.') }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- modal upload bukti transfer -->
        <div class="modal" id="uploadbuktitransfer{{ $datareservasi->id_reservasi }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="/list/detail/buktitf/{{ $datareservasi->id_reservasi }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="bukti_transfer">Bukti Transfer : </label>
                    <input type="file" class="form-control-file" name="bukti_transfer" id="bukti_transfer">
                    <p class="text-danger" style="margin-top:3px; font-size: 13px">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | Ukuran 16:9</p>
                    <!-- error message untuk gambar -->
                    <div class="text-danger" style="font-size: 10px">
                      @error('gambar')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="row justify-content-center">
        <div class="col-10" style="margin-top: 14.5%; margin-bottom: 9%">
          <p class="text-center" style="color: rgb(166, 166, 166)">Belum ada Data Pemesanan</p>
        </div>
      </div>
      @endif
      @endforeach
      @endforeach
    </div>
  </div>

  @endsection