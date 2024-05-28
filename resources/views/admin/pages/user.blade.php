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
                      <h4 class="card-title"> Data User</h4>
                    </div>
                    <div class="col text-right">
                      <button type="button" class="btn btn-info btn-icon-text" data-toggle="modal" data-target="#tambahuser">
                        <i class="ti-plus btn-icon-prepend"></i>
                        User                                                                              
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nomer Induk</th>
                          <th>Nama</th>
                          <th>E-mail</th>
                          <th>No. Telp</th>
                          <th>Lokasi</th>
                          <th>Jabatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; ?>
                        @foreach ($user as $datauser)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datauser->nib }}</td>
                            <td>{{ $datauser->nm_pegawai }}</td>
                            <td>{{ $datauser->email }}</td>
                            <td>{{ $datauser->kontak }}</td>
                            <td>{{ $datauser->bisnis->lokasi }} - {{ $datauser->bisnis->nm_bisnis }}</td>
                            <td>{{ $datauser->jabatan }}</td>
                            <td><button type="button" class="btn btn-inverse-dark btn-rounded btn-icon" data-toggle="modal" data-target="#edituser{{ $datauser->id_user }}"><i class="ti-pencil-alt"></i></button>
                            <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" data-toggle="modal" data-target="#hapususer{{ $datauser->id_user }}"><i class="ti-trash"></i></button></td>
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
        <div class="modal" id="tambahuser" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/pegawai/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nib">Nomer Induk</label>
                    <input type="text" class="form-control" name="nib" id="nib" placeholder="nomer induk">
                  </div>
                  <div class="form-group">
                    <label for="nm_pegawai">Nama Pegawai</label>
                    <input type="text" class="form-control" name="nm_pegawai" id="nm_pegawai" placeholder="nama lengkap pegawai">
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@gamil.com">
                    <!-- error message untuk kontak -->
                    <div class="text-danger" style="font-size: 10px">
                      @error('kontak')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="kontak">No. Hp</label>
                    <input type="number" class="form-control" name="kontak" id="kontak" placeholder="no telepon yang aktif">
                    <!-- error message untuk kontak -->
                    <div class="text-danger" style="font-size: 10px">
                      @error('kontak')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
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
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control" name="jabatan" id="jabatan">
                      <option value="">~ Pilih ~</option>
                      <option value="CEO">CEO</option>
                      <option value="Sekretaris">Sekretaris</option>
                      <option value="Karyawan">Karyawan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    <!-- error message untuk password -->
                    <div class="text-danger" style="font-size: 10px">
                      @error('password')
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
        @foreach ($user as $dataedit)
        <div class="modal" id="edituser{{ $dataedit->id_user }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/pegawai/update/{{ $dataedit->id_user }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nib">Nomer Induk</label>
                    <input type="text" class="form-control" name="nib" id="nib" value="{{ $dataedit->nib }}">
                  </div>
                  <div class="form-group">
                    <label for="nm_pegawai">Nama</label>
                    <input type="text" class="form-control" name="nm_pegawai" id="nmpegawai_edit" value="{{ $dataedit->nm_pegawai }}">
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{ $dataedit->email }}" id="email_edit">
                  </div>
                  <div class="form-group">
                    <label for="kontak">No. Hp</label>
                    <input type="number" class="form-control" name="kontak" id="kontak_edit" value="{{ $dataedit->kontak }}">
                    <!-- error message untuk kontak -->
                    <div class="text-danger" style="font-size: 10px">
                      @error('kontak')
                          {{ $message }}
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="id_bisnis">Lokasi</label>
                    <select class="form-control" name="id_bisnis" id="bisnis_edit">
                      <option>~ Pilih ~</option>
                      @foreach ($bisnis as $databisnis)
                        <option value="{{ $databisnis->id_bisnis }}" {{ $databisnis->id_bisnis == $dataedit->id_bisnis ? 'selected' : null }}>
                          {{ $databisnis->lokasi }} - {{ $databisnis->nm_bisnis }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control" name="jabatan" id="jabatan_edit">
                      <option value="">~ Pilih ~</option>
                      <option value="CEO" {{ $dataedit->jabatan == 'CEO' ? 'selected' : null }}>CEO</option>
                      <option value="Sekretaris" {{ $dataedit->jabatan == 'Sekretaris' ? 'selected' : null }}>Sekretaris</option>
                      <option value="Karyawan" {{ $dataedit->jabatan == 'Karyawan' ? 'selected' : null }}>Karyawan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password_id" value="{{ $dataedit->password }}">
                    <!-- error message untuk password -->
                    <div class="text-danger" style="font-size: 10px">
                      @error('password')
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
        @endforeach

        <!-- Modal hapus -->
        @foreach ($user as $datahapus)
        <div class="modal" id="hapususer{{ $datahapus->id_user }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">{{ $datahapus->nm_pegawai }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h6> Apakah Anda Yakin Ingin Menghapus Data ini..???</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="/pegawai/delete/{{ $datahapus->id_user }}" class="btn btn-primary">Iya</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach

  @endsection