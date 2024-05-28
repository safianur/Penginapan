@extends('admin.layout.sub')

  @section('content')

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            @if (session('pesan'))
              <div class="col-lg-12 grid-margin alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon" fa fa-check></i>Success!</h4>
                {{ session('pesan') }}
              </div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4 class="card-title">Booking List</h4>
                    </div>
                    <div class="col text-right">
                      <button type="button" class="btn btn-info btn-icon-text" data-toggle="modal" data-target="#order">
                        <i class="ti-plus btn-icon-prepend"></i>
                        Order                                                                              
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>E-mail</th>
                          <th>Nama</th>
                          <th>No. Telp</th>
                          <th>Check In</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; ?>
                        @foreach ($reservasi as $datareservasi)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $datareservasi->pengunjung->email }}</td>
                          <td>{{ $datareservasi->pengunjung->nm_pengunjung }}</td>
                          <td>{{ $datareservasi->pengunjung->kontak }}</td>
                          <td>{{ \Carbon\Carbon::parse($datareservasi->checkin)->translatedFormat('d F Y') }}</td>
                          <?php
                            if ($datareservasi->status == 'CheckIn') {
                              echo '<td><label class="badge badge-primary">CheckIn</label></td>';
                            } elseif ($datareservasi->status == 'CheckOut') {
                              echo '<td><label class="badge badge-primary">CheckOut</label></td>';
                            } else {
                              echo '<td><label class="badge badge-primary">Menunggu Respon</label></td>';
                            }
                          ?>
                          <td><a href="/list/detail/{{ $datareservasi->id_reservasi }}"><button type="button" class="btn btn-inverse-warning btn-rounded btn-icon"><i class="ti-info"></i></button></a>
                            @if ($datareservasi->id_typekamar == '')
                              <button type="button" class="btn btn-inverse-dark btn-rounded btn-icon" data-toggle="modal" data-target="#editreservasi{{ $datareservasi->id_reservasi }}"><i class="ti-pencil-alt"></i></button>
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- modal tambah booking -->
        <div class="modal" id="order" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Book Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/list/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="id_bisnis">Tujuan Penginapan</label>
                    <select class="form-control" name="id_bisnis" id="id_bisnis">
                      <option>~ Pilih Lokasi ~</option>
                      @foreach ($bisnis as $databisnis)
                      <option value="{{ $databisnis->id_bisnis }}">
                        {{ $databisnis->lokasi }} - {{ $databisnis->nm_bisnis }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="id_typekamar">Type Kamar</label>
                        <select class="form-control" name="id_typekamar" id="id_typekamar">
                          <option>~ Pilih Type Kamar ~</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="jumlah_orang">Jumlah Orang</label>
                            <input type="number" class="form-control" name="jumlah_orang" id="jumlah_orang">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="jumlah_kamar">Jumlah Kamar</label>
                            <input type="number" class="form-control" name="jumlah_kamar" id="jumlah_kamar">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@gmail.com">
                  </div>
                  <div class="form-group">
                    <label for="nm_pengunjung">Nama</label>
                    <input type="text" class="form-control" name="nm_pengunjung" id="nm_pengunjung" placeholder="nama lengkap sesuai KTP">
                  </div>
                  <div class="form-group">
                    <label for="kontak">No. Hp</label>
                    <input type="number" class="form-control" name="kontak" id="kontak" placeholder="no telepon yang aktif">
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="checkin">Check In</label>
                        <input type="date" class="form-control" name="checkin" id="checkin">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="checkout">Check Out</label>
                        <input type="date" class="form-control" name="checkout" id="checkout">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- modal edit reservasi -->
        @foreach ($reservasi as $editreservasi)
        <div class="modal" id="editreservasi{{ $editreservasi->id_reservasi }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Book Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/list/editreservasi/{{ $editreservasi->id_reservasi }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="edit_idbisnis">Tujuan Penginapan</label>
                    <select class="form-control" name="edit_idbisnis" id="edit_idbisnis">
                      <option>~ Pilih Lokasi ~</option>
                      @foreach ($bisnis as $databisnis)
                      <option value="{{ $databisnis->id_bisnis }}" <?= $databisnis->id_bisnis == $editreservasi->id_bisnis ? 'selected' : null ?>>
                        {{ $databisnis->lokasi }} - {{ $databisnis->nm_bisnis }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="edit_idtypekamar">Type Kamar</label>
                        <select class="form-control" name="edit_idtypekamar" id="edit_idtypekamar">
                          <option>~ Pilih Type Kamar ~</option>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for="edit_jumlah_orang">Jumlah Orang</label>
                            <input type="number" class="form-control" name="edit_jumlah_orang" value="{{ $editreservasi->jumlah_orang }}" id="edit_jumlah_orang">
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for="edit_jumlah_kamar">Jumlah Kamar</label>
                            <input type="number" class="form-control" name="edit_jumlah_kamar" value="{{ $editreservasi->jumlah_kamar }}" id="edit_jumlah_kamar">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach

  @endsection