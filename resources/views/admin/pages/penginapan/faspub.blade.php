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
                      <h4 class="card-title">Fasilitas Public</h4>
                    </div>
                    <div class="col text-right">
                      <button type="button" class="btn btn-info btn-icon-text" data-toggle="modal" data-target="#tambahfaspub">
                        <i class="ti-plus btn-icon-prepend"></i>
                        faspub                                                                              
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Fasilitas Public</th>
                          <th>Keterangan estimasi</th>
                          <th>Foto Faspub</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; ?>
                        @foreach ($faspub as $datafaspub)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $datafaspub->nm_faspub }}</td>
                          <td>estimasi kurang lebih {{ $datafaspub->estimasi }}</td>
                          <td><img src="{{ url('img/'.$datafaspub->gmbr_faspub) }}" alt=""></td>
                          <td><button type="button" class="btn btn-inverse-dark btn-rounded btn-icon" data-toggle="modal" data-target="#editfaspub{{ $datafaspub->id_faspub }}"><i class="ti-pencil-alt"></i></button>
                          <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" data-toggle="modal" data-target="#deletefaspub{{ $datafaspub->id_faspub }}"><i class="ti-trash"></i></button></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              {{-- <div class="card-footer">
                {{ $datafaspub->link() }}
              </div> --}}
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- modal tambah -->
        <div class="modal" id="tambahfaspub" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Fasilitas Public</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/faspub/create" method="post" enctype="multipart/form-data">
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
                    <label for="nm_faspub">Nama Fasilitas Public</label>
                    <input type="text" class="form-control" name="nm_faspub" id="nm_faspub" placeholder="nama fasilitas public">
                  </div>
                  <div class="form-group">
                    <label for="estimasi">Estimasi Fasilitas Public</label>
                    <input type="text" class="form-control" name="estimasi" id="estimasi" placeholder="estimasi tempat">
                  </div>
                  <div class="form-group">
                    <label for="gmbr_faspub">Gambar Fasilitas Public</label>
                    <input type="file" class="form-control-file" name="gmbr_faspub" id="gmbr_faspub">
                    <p class="text-danger" style="margin-top:3px; font-size: 13px">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | Ukuran 16:9</p>
                    <!-- error message untuk gambar -->
                    <div class="text-danger" style="font-size: 10px">
                      @error('gambar')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="link">Maps Lokasi</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="maps lokasi">
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
        @foreach ($faspub as $dataedit)
        <div class="modal" id="editfaspub{{ $dataedit->id_faspub }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Fasilitas Public</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/faspub/update/{{ $dataedit->id_faspub }}" method="post" enctype="multipart/form-data">
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
                    <label for="nm_faspub">Nama Fasilitas Public</label>
                    <input type="text" class="form-control" name="nm_faspub" id="nm_faspub" value="{{ $dataedit->nm_faspub }}">
                  </div>
                  <div class="form-group">
                    <label for="estimasi">Estimasi Fasilitas Public</label>
                    <input type="text" class="form-control" name="estimasi" id="estimasi" value="{{ $dataedit->estimasi }}">
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <img src="{{  url('img/'.$dataedit->gmbr_faspub)  }}" width="125px">
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="gmbr_faspub">Ganti Gambar Fasilitas Public</label>
                        <input type="file" class="form-control-file" name="gmbr_faspub" id="gmbr_faspub" style="font-size: 13px">
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
                    <label for="link">Maps Lokasi</label>
                    <input type="text" class="form-control" name="link" id="link" value="{{ $dataedit->link }}">
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
        @foreach ($faspub as $datahapus)
        <div class="modal" id="deletefaspub{{ $datahapus->id_faspub }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">{{ $datahapus->nm_faspub }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h6> Apakah Anda Yakin Ingin Menghapus Data ini..???</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="/faspub/delete/{{ $datahapus->id_faspub }}" class="btn btn-primary">Iya</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

  @endsection