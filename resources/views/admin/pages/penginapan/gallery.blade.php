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
                      <h4 class="card-title">Gallery</h4>
                    </div>
                    <div class="col text-right">
                      <button type="button" class="btn btn-info btn-icon-text" data-toggle="modal" data-target="#tambahgallery">
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
                          <th>Nama Tempat</th>
                          <th>Foto Gallery</th>
                          <th>Keterangan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1 ?>
                        @foreach ($gallery as $datagallery)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $datagallery->nm_gallery }}</td>
                          <td><img src="{{ url('img/'.$datagallery->gmbr_gallery) }}" alt=""></td>
                          <td>{{ $datagallery->keterangan_gallery }}</td>
                          <td><button type="button" class="btn btn-inverse-dark btn-rounded btn-icon" data-toggle="modal" data-target="#editgallery{{ $datagallery->id_gallery }}"><i class="ti-pencil-alt"></i></button>
                          <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" data-toggle="modal" data-target="#deletegallery{{ $datagallery->id_gallery }}"><i class="ti-trash"></i></button></td>
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
        <div class="modal" id="tambahgallery" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/gallery/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="id_bisnis">Lokasi</label>
                    <select class="form-control" name="id_bisnis" id="id_bisnis">
                      <option value="">~ Pilih ~</option>
                      @foreach ($bisnis as $databisnis)
                        <option value="{{ $databisnis->id_bisnis }}">{{ $databisnis->lokasi }} - {{ $databisnis->nm_bisnis }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nm_gallery">Nama Tempat</label>
                    <input type="text" class="form-control" name="nm_gallery" id="nm_gallery" placeholder="nama tempat">
                  </div>
                  <div class="form-group">
                    <label for="gmbr_gallery">Gambar Gallery</label>
                    <input type="file" class="form-control-file" name="gmbr_gallery" id="gmbr_gallery">
                    <p class="text-danger" style="margin-top:3px; font-size: 13px">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | Ukuran 16:9</p>
                    <!-- error message untuk gambar -->
                    <div class="text-danger" style="font-size: 10px">
                      @error('gambar')
                        {{ $message }}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="keterangan_gallery">Keterangan Foto</label>
                    <input type="text" class="form-control" name="keterangan_gallery" id="keterangan_gallery" placeholder="keterangan">
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
        @foreach ($gallery as $dataedit)
        <div class="modal" id="editgallery{{ $dataedit->id_gallery }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/gallery/update/{{ $dataedit->id_gallery }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="id_bisnis">Lokasi</label>
                    <select class="form-control" name="id_bisnis" id="id_bisnis">
                      <option value="">~ Pilih ~</option>
                      @foreach ($bisnis as $databisnis)
                        <option value="{{ $databisnis->id_bisnis }}" {{ $databisnis->id_bisnis == $dataedit->id_bisnis ? 'selected' : null }}>
                          {{ $databisnis->lokasi }} - {{ $databisnis->nm_bisnis }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nm_gallery">Nama Tempat</label>
                    <input type="text" class="form-control" name="nm_gallery" id="nm_gallery" value="{{ $dataedit->nm_gallery }}" placeholder="nama tempat">
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <img src="{{  url('img/'.$dataedit->gmbr_gallery)  }}" width="125px">
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="gmbr_gallery">Ganti Gambar Gallery</label>
                        <input type="file" class="form-control-file" name="gmbr_gallery" id="gmbr_gallery" style="font-size: 13px">
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
                  <div class="form-group">
                    <label for="keterangan_gallery">Keterangan Foto</label>
                    <input type="text" class="form-control" name="keterangan_gallery" id="keterangan_gallery" value="{{ $dataedit->keterangan_gallery }}" placeholder="keterangan">
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
        @foreach ($gallery as $datahapus)
        <div class="modal" id="deletegallery{{ $datahapus->id_gallery }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">{{ $datahapus->nm_gallery }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h6> Apakah Anda Yakin Ingin Menghapus Data ini..???</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="/gallery/delete/{{ $datahapus->id_gallery }}" class="btn btn-primary">Iya</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

  @endsection