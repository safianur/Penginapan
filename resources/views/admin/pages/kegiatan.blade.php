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
                    <div class="col-md">
                      <h4 class="card-title">Kegiatan Kusuma Group</h4>
                    </div>
                    <div class="col text-right">
                      <button type="button" class="btn btn-info btn-icon-text" data-toggle="modal" data-target="#tambahkegiatan">
                        <i class="ti-plus btn-icon-prepend"></i>
                        kegiatan                                                                              
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Tanggal</th>
                          <th>Nama</th>
                          <th>Pengada Kegiatan</th>
                          <th>Foto Kegiatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; ?>
                      @foreach ($kegiatan as $datakegiatan)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ \Carbon\Carbon::parse($datakegiatan->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                        <td>{{ $datakegiatan->nm_kegiatan }}</td>
                        <td>{{ $datakegiatan->pengada_kegiatan }}</td>
                        <td><img src="{{ url('img/'.$datakegiatan->gmbr_kegiatan) }}"></td>
                        <td><button type="button" class="btn btn-inverse-dark btn-rounded btn-icon" data-toggle="modal" data-target="#editkegiatan{{ $datakegiatan->id_kegiatan }}"><i class="ti-pencil-alt"></i></button>
                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" data-toggle="modal" data-target="#hapuskegiatan{{ $datakegiatan->id_kegiatan }}"><i class="ti-trash"></i></button></td>
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
        <div class="modal" id="tambahkegiatan" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/kegiatan/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan">
                  </div>
                  <div class="form-group">
                    <label for="nm_kegiatan">Nama Kegiatan</label>
                    <input type="text" class="form-control" name="nm_kegiatan" id="nm_kegiatan" placeholder="nama kegiatan">
                  </div>
                  <div class="form-group">
                    <label for="pengada_kegiatan">Pengada Acara</label>
                    <input type="text" class="form-control" name="pengada_kegiatan" id="pengada_kegiatan" placeholder="nama pembuat acara">
                  </div>
                  {{-- <div class="form-group">
                    <label>Upload Gambar Kegiatan</label>
                    <input type="file" name="gambar" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                      </span>
                    </div>
                    <p class="text-danger" style="font-size: 13px">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
                  </div> --}}
                  <div class="form-group">
                    <label for="gmbr_kegiatan">Gambar Kegiatan</label>
                    <input type="file" class="form-control-file" name="gmbr_kegiatan" id="gmbr_kegiatan">
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
        @foreach ($kegiatan as $dataedit)
        <div class="modal" id="editkegiatan{{ $dataedit->id_kegiatan }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/kegiatan/update/{{ $dataedit->id_kegiatan }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan" value="{{ $dataedit->tgl_kegiatan }}">
                  </div>
                  <div class="form-group">
                    <label for="nm_kegiatan">Nama Kegiatan</label>
                    <input type="text" class="form-control" name="nm_kegiatan" id="nm_kegiatan" placeholder="nama kegiatan" value="{{ $dataedit->nm_kegiatan }}">
                  </div>
                  <div class="form-group">
                    <label for="pengada_kegiatan">Pengada Acara</label>
                    <input type="text" class="form-control" name="pengada_kegiatan" id="pengada_kegiatan" placeholder="nama pembuat acara" value="{{ $dataedit->pengada_kegiatan }}">
                  </div>
                  <div class="row">
                    <div class="col sm 4">
                      <img src="{{  url('img/'.$dataedit->gmbr_kegiatan)  }}" width="125px">
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="gmbr_kegiatan">Ganti Gambar Kegiatan</label>
                        <input type="file" class="form-control-file" name="gmbr_kegiatan" id="gmbr_kegiatan" style="font-size: 13px">
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
        @foreach ($kegiatan as $datahapus)
        <div class="modal" id="hapuskegiatan{{ $datahapus->id_kegiatan }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">{{ $datahapus->nm_kegiatan }} oleh {{ $datahapus->pengada_kegiatan }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h6> Apakah Anda Yakin Ingin Menghapus Data ini..???</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="/kegiatan/delete/{{ $datahapus->id_kegiatan }}" class="btn btn-primary">Iya</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

  @endsection