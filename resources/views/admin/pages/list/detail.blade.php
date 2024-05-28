<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Penginapan Kusuma Group</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../../admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../../admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../../admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../../admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../../admin/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../img/logo/logo_kusuma.jpeg">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#"><img src="../../../img/logo/logo_kusuma.jpeg" class="mr-2" alt="logo"/><span style="color: #000; font-size: 15px">Kusuma Group</span></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="../../../img/logo/logo_kusuma.jpeg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../../img/logo/person.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="/logout" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/list">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">List Booking</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-penginapan" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Penginapan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-penginapan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/type">Type Kamar</a></li>
                <li class="nav-item"> <a class="nav-link" href="/faspub">Fasilitas Public</a></li>
                <li class="nav-item"> <a class="nav-link" href="/wisata">Wisata</a></li>
                <li class="nav-item"> <a class="nav-link" href="/gallery">Gallery</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/kegiatan">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Kegiatan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-pangpi" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">PangPi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-pangpi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/pangpi">Gallery</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pegawai">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Data Pegawai</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 text-right" style="margin-top: -20px">
              <a href="{{ route('listbooking') }}" class="text-light">
                <button type="button" class="btn btn-info btn-icon-text mb-2">
                  <i class="ti-angle-double-left btn-icon-append" style="margin-left: -8px;"></i>
                  Kembali
                </button>
              </a>  
            </div>
          </div>
          <div class="row">
            @if (session('pesan'))
              <div class="col-lg-12 grid-margin alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon" fa fa-check></i>Success!</h4>
                {{ session('pesan') }}
              </div>
            @endif

            <!-- detail data -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <!-- detail data tamu -->
                      <div class="row">
                        <div class="col-9">
                          <h4 class="card-title text-primary">Detail Data Tamu</h4>
                        </div>
                        <div class="col-3 text-right">
                          <button type="button" class="btn btn-link text-info" data-toggle="modal" data-target="#editpengunjung{{ $booking->id_pengunjung }}" style="padding-top: 0.5px">Edit</button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-10 ml-2">
                          <p class="font-weight-bold">{{ $booking->pengunjung->nm_pengunjung }}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-10 ml-2">
                          <p>{{ $booking->pengunjung->tempat_lahir }}, {{ \Carbon\Carbon::parse($booking->pengunjung->tanggal_lahir)->translatedFormat('d F Y') }} ~~ {{ $booking->pengunjung->alamat }}</p>
                        </div>
                        <div class="col-sm-10 ml-2">
                          <p><cite class="text-info" title="Source Title">{{ $booking->pengunjung->email }}</cite> ~~ {{ $booking->pengunjung->nik_paspor }} ~~ {{ $booking->pengunjung->kontak }}</p>
                        </div>
                      </div>
                      <!-- end detail data tamu -->
                      <hr>
                      <!-- detail data pemesanan -->
                      <div class="row">
                        <div class="col-9">
                          <h4 class="card-title text-primary">Detail Data Pemesanan</h4>
                        </div>
                        <div class="col-3 text-right">
                          <button type="button" class="btn btn-link text-info" data-toggle="modal" data-target="#editreservasi{{ $booking->id_reservasi }}" style="padding-top: 0.5px">Edit</button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="font-weight-bold">Check In</p>
                          <p style="font-size: 13px">{{ \Carbon\Carbon::parse($booking->checkin)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div class="col-sm-3">
                          <p class="font-weight-bold">Check Out</p>
                          <p style="font-size: 13px">{{ \Carbon\Carbon::parse($booking->checkout)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div class="col-sm-3">
                          <p class="font-weight-bold">Status</p>
                          <?php
                            if ($booking->status == 'CheckIn') {
                              echo '<p class="card-description text-danger font-weight-bold" style="font-size: 13px"><cite title="Source Title">CheckIn</cite></p>';
                            } elseif ($booking->status == 'CheckOut') {
                              echo '<p class="card-description text-danger font-weight-bold" style="font-size: 13px"><cite title="Source Title">CheckOut</cite></p>';
                            } else {
                              echo '<p class="card-description text-danger font-weight-bold" style="font-size: 13px"><cite title="Source Title">Menunggu Respon</cite></p>';
                            }
                          ?>
                        </div>
                      </div>
                      <!-- end detail data pemesanan -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- detail pembayaran -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4 class="card-title text-primary">Detail Pembayaran</h4>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Type Kamar</th>
                          <th>Jumlah Kamar</th>
                          <th>Jumlah Hari</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no=1;
                          $hari = 0; 

                          $tglcheckin = \Carbon\Carbon::parse($booking->checkin);
                          $tglcheckout = \Carbon\Carbon::parse($booking->checkout);
                          $hari += $tglcheckin->diffInDays($tglcheckout);
                        ?>
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $booking->typekamar->nm_typekamar }}</td>
                            <td>{{ $booking->jumlah_kamar }}</td>
                            <td>{{ $hari }}</td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-6 ml-2">
                      <p class="font-weight-bold"style="font-size: 13px">Total Harga</p>
                    </div>
                    <div class="col-5">
                      <p style="margin-left: -50px"> : <span style="padding-left: 5px">Rp. {{ number_format($booking->total_harga, 0, ',', '.') }}</span></p>
                    </div>
                  </div>
                  @if ($booking->bukti_transfer)
                  <div class="row">
                    <div class="col-6 ml-2">
                      <p class="font-weight-bold"style="font-size: 13px">Status pembayaran</p>
                    </div>
                    <div class="col-5">
                      <p style="margin-left: -50px"> : <span style="padding-left: 5px">Sudah</span></p>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#buktitransfer{{ $booking->id_reservasi }}">Bukti Transfer</button>
                    </div>
                  </div>
                  @else
                  <div class="row">
                    <div class="col-6 ml-2">
                      <p class="font-weight-bold"style="font-size: 13px">Status pembayaran</p>
                    </div>
                    <div class="col-5">
                      <p style="margin-left: -50px"> : <span style="padding-left: 5px">Belum</span></p>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#uploadbuktitransfer{{ $booking->id_reservasi }}">Upload Bukti Transfer</button>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- modal edit data pengunjung -->
        <div class="modal" id="editpengunjung{{ $booking->id_pengunjung }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Data Pengunjung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/list/detail/pengunjung/{{ $booking->id_pengunjung }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nik_paspor">NIK/Paspor</label>
                    <input type="number" class="form-control" name="nik_paspor" id="nik_paspor" value="{{ $booking->pengunjung->nik_paspor }}" placeholder="masukkan nik/paspor">
                  </div>
                  <div class="form-group">
                    <label for="nm_pengunjung">Nama</label>
                    <input type="text" class="form-control" name="nm_pengunjung" value="{{ $booking->pengunjung->nm_pengunjung }}" id="nm_pengunjung" placeholder="nama lengkap">
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ $booking->pengunjung->tempat_lahir }}" placeholder="tempat lahir">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="{{ $booking->pengunjung->tanggal_lahir }}" id="tanggal_lahir" placeholder="tanggal lahir">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{ $booking->pengunjung->alamat }}" id="alamat" placeholder="alamat">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $booking->pengunjung->email }}" id="email" placeholder="name@gmail.com">
                  </div>
                  <div class="form-group">
                    <label for="kontak">No. Hp</label>
                    <input type="number" class="form-control" name="kontak" value="{{ $booking->pengunjung->kontak }}" id="kontak" placeholder="no telepon yang aktif">
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

        <!-- modal edit checkin checkout -->
        <div class="modal" id="editreservasi{{ $booking->id_reservasi }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/list/detail/reservasi/{{ $booking->id_reservasi }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                      <option>~ Pilih ~</option>
                      <option value="CheckIn">CheckIn</option>
                      <option value="CheckOut">CheckOut</option>
                    </select>
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

        <!-- modal upload bukti transfer -->
        <div class="modal" id="uploadbuktitransfer{{ $booking->id_reservasi }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Upload Bukti Transfer :</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/list/detail/buktitf/{{ $booking->id_reservasi }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="bukti_transfer">Bukti Transfer</label>
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- modal bukti transfer -->
        <div class="modal fade" id="buktitransfer{{ $booking->id_reservasi }}" aria-hidden="true" aria-labelledby="modaldetailLabel" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modaldetailLabel">Bukti Tranfer a.n {{ $booking->pengunjung->nm_pengunjung }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-12">
                        <img src="{{ url('img/buktitransfer/'.$booking->bukti_transfer) }}" class="w-100">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
        
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. StikomPGRIBwi. All Right Reserved</span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="../../../admin/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="../../../admin/vendors/chart.js/Chart.min.js"></script>
<script src="../../../admin/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../../../admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="../../../admin/js/dataTables.select.min.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="../../../admin/js/off-canvas.js"></script>
<script src="../../../admin/js/hoverable-collapse.js"></script>
<script src="../../../admin/js/template.js"></script>
<script src="../../../admin/js/settings.js"></script>
<script src="../../../admin/js/todolist.js"></script>
<!-- endinject -->

<!-- Custom js for this page-->
<script src="../../../admin/js/dashboard.js"></script>
<script src="../../../admin/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->

<!-- javascript -->
<script>
$(function() {
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });
  $(function () {
    $('#id_bisnis').on('change', function(){
      let id_bisnis = $('#id_bisnis'). val();

      $.ajax({
        type : 'POST',
        url : "{{ route('gettypekamar') }}",
        data : {id_bisnis:id_bisnis},
        cache : false,

        success: function(msg){
          $('#id_typekamar').html(msg);
        },
        error: function(data){
          console.log('error', data)
        },
      })
    })
  })
});
</script>
</body>

</html>
