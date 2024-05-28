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
                      <h4 class="card-title">Panggon ngoPi (PangPi)</h4>
                    </div>
                    <div class="col text-right">
                      <button type="button" class="btn btn-info btn-icon-text" data-toggle="modal" data-target="#tambahpangpi">
                        <i class="ti-plus btn-icon-prepend"></i>
                        gallery                                                                              
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Tanggal</th>
                          <th>Foto Kegiatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1 ?>
                        @foreach ($pangpi as $datapangpi)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ \Carbon\Carbon::parse($datapangpi->tgl_pangpi)->translatedFormat('d F Y') }}</td>
                          <td><img src="{{ url('img/'.$datapangpi->gmbr_pangpi) }}"></td>
                          <td><button type="button" class="btn btn-inverse-dark btn-rounded btn-icon" data-toggle="modal" data-target="#editpangpi{{ $datapangpi->id_pangpi }}"><i class="ti-pencil-alt"></i></button>
                          <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" data-toggle="modal" data-target="#hapuspangpi{{ $datapangpi->id_pangpi }}"><i class="ti-trash"></i></button></td>
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

        <!-- modal tambah -->
        <div class="modal" id="tambahpangpi" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Kegiatan PangPi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/pangpi/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="tgl_pangpi">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" name="tgl_pangpi" id="tgl_pangpi">
                  </div>
                  <div class="form-group">
                    <label for="gmbr_pangpi">Gambar Gallery</label>
                    <input type="file" class="form-control-file" name="gmbr_pangpi" id="gmbr_pangpi">
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- modal edit -->
        @foreach ($pangpi as $dataedit)
          <div class="modal" id="editpangpi{{ $dataedit->id_pangpi }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Kegiatan PangPi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/pangpi/update/{{ $dataedit->id_pangpi }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="tgl_pangpi">Tanggal</label>
                      <input type="date" class="form-control" name="tgl_pangpi" id="tgl_pangpi" value="{{ $dataedit->tgl_pangpi }}">
                    </div>
                    <div class="row">
                      <div class="col sm 4">
                        <img src="{{  url('img/'.$dataedit->gmbr_pangpi)  }}" width="125px">
                      </div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label for="gmbr_pangpi">Ganti Gambar Gallery</label>
                          <input type="file" class="form-control-file" name="gmbr_pangpi" id="gmbr_pangpi" style="font-size: 13px">
                          <p class="text-danger" style="margin-top:3px; font-size: 13px"> Ekstensi yang diperbolehkan .png | .jpg | .jpeg | Ukuran 16:9 </p>
                          <!-- error message untuk gambar -->
                          <div class="text-danger" style="font-size: 10px">
                            @error('gambar')
                                {{ $message }}
                            @enderror
                          </div>
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
        @endforeach

        <!-- Modal hapus -->
        @foreach ($pangpi as $datahapus)
          <div class="modal" id="hapuspangpi{{ $datahapus->id_pangpi }}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Hapus Gallery PangPi</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h6> Apakah Anda Yakin Ingin Menghapus Data ini..???</h6>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                  <a href="/pangpi/delete/{{ $datahapus->id_pangpi }}" class="btn btn-primary">Iya</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach

  @endsection