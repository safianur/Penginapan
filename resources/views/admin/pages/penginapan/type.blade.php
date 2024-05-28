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
                      <h4 class="card-title">Type Kamar</h4>
                    </div>
                    <div class="col text-right">
                      <button type="button" class="btn btn-info btn-icon-text" data-toggle="modal" data-target="#tambahtype">
                        <i class="ti-plus btn-icon-prepend"></i>
                        type                                                                              
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Type Kamar</th>
                          <th>Harga</th>
                          <th>Stok Kamar</th>
                          <th>Foto Kamar</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; ?>
                        @foreach ($type as $datatype)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $datatype->nm_typekamar }}</td>
                          <td>Rp. {{ number_format($datatype->harga, 0, ',', '.') }}/malam</td>
                          <td>{{ $datatype->stok_kamar }}</td>
                          <td><img src="{{ url('img/'.$datatype->gmbr_typekamar) }}" alt=""></td>
                          <td><button type="button" class="btn btn-inverse-dark btn-rounded btn-icon" data-toggle="modal" data-target="#edittype{{ $datatype->id_typekamar }}"><i class="ti-pencil-alt"></i></button>
                          <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" data-toggle="modal" data-target="#deletetype{{ $datatype->id_typekamar }}"><i class="ti-trash"></i></button>
                          <a href="/type/info/{{ $datatype->id_typekamar }}"><button type="button" class="btn btn-inverse-warning btn-rounded btn-icon"><i class="ti-info"></i></button></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              {{-- <div class="card-footer">
                {{ $datatype->link() }}
              </div> --}}
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- modal tambah -->
        <div class="modal" id="tambahtype" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Type Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/type/create/" method="post" enctype="multipart/form-data">
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
                    <label for="nm_typekamar">Nama Type Kamar</label>
                    <input type="text" class="form-control" name="nm_typekamar" id="nm_typekamar" placeholder="nama type kamar">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="harga per-malam">
                  </div>
                  <div class="form-group">
                    <label for="stok_kamar">Stok Kamar</label>
                    <input type="text" class="form-control" name="stok_kamar" id="stok_kamar" placeholder="stok kamar yang ada">
                  </div>
                  <div class="form-group">
                    <label for="gmbr_typekamar">Foto Kamar</label>
                    <input type="file" class="form-control-file" name="gmbr_typekamar" id="gmbr_typekamar">
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
        @foreach ($type as $dataedit)
        <div class="modal" id="edittype{{ $dataedit->id_typekamar }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Type Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/type/update/{{ $dataedit->id_typekamar }}" method="post" enctype="multipart/form-data">
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
                    <label for="nm_typekamar">Nama Type Kamar</label>
                    <input type="text" class="form-control" name="nm_typekamar" id="nm_typekamar" value="{{ $dataedit->nm_typekamar }}" placeholder="nama type kamar">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" value="{{ $dataedit->harga }}" placeholder="harga per-malam">
                  </div>
                  <div class="form-group">
                    <label for="stok_kamar">Stok Kamar</label>
                    <input type="text" class="form-control" name="stok_kamar" id="stok_kamar" value="{{ $dataedit->stok_kamar }}" placeholder="stok kamar yang ada">
                  </div>
                  <div class="row">
                    <div class="col sm 4">
                      <img src="{{  url('img/'.$dataedit->gmbr_typekamar)  }}" width="125px">
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="gmbr_typekamar">Ganti Gambar Type Kamar</label>
                        <input type="file" class="form-control-file" name="gmbr_typekamar" id="gmbr_typekamar" style="font-size: 13px">
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
        @foreach ($type as $datahapus)
        <div class="modal" id="deletetype{{ $datahapus->id_typekamar }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">{{ $datahapus->nm_typekamar }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h6> Apakah Anda Yakin Ingin Menghapus Data ini..???</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="/type/delete/{{ $datahapus->id_typekamar }}" class="btn btn-primary">Iya</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

  @endsection