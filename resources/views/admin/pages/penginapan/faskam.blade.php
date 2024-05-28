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
          <li class="nav-item">
            <a class="nav-link" href="/list">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">List Booking</span>
            </a>
          </li>
          <li class="nav-item active">
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
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-md-12 grid-margin transparent">
                  <div class="row"> 
                    <div class="col-md-3 stretch-card transparent">
                      <div class="card card-tale">
                        <div class="card-body">
                            <p style="font-size: 120%">Nama Kamar</p>
                            <hr>
                            <p class="text-right" style="font-size: 100%">{{ $type->nm_typekamar }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 stretch-card transparent">
                      <div class="card card-dark-blue">
                        <div class="card-body">
                          <p style="font-size: 120%">Harga Kamar</p>
                          <hr>
                          <p class="text-right" style="font-size: 100%">Rp. {{ number_format($type->harga, 0, ',', '.') }}/malam</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 text-right">
                      <a href="{{ route('typekamar') }}" class="text-light">
                        <button type="button" class="btn btn-info btn-icon-text mb-2">
                          <i class="ti-angle-double-left btn-icon-append" style="margin-left: -8px;"></i>
                          Kembali
                        </button>
                      </a>  
                    </div>
                  </div>
                </div>
              </div>
              {{-- tabel fasilitas kamar --}}
              <div class="row" style="margin-top: -2%">
                @if (session('pesan'))
                  <div class="col-lg-12 grid-margin alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon" fa fa-check></i>Success!</h4>
                    {{ session('pesan') }}
                  </div>
                @endif
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <h4 class="card-title">Fasilitas Kamar</h4>
                        </div>
                        <div class="col text-right">
                          <button type="button" class="btn btn-info btn-icon-text" data-toggle="modal" data-target="#tambahfasilitas{{ $type->id_typekamar }}">
                            <i class="ti-plus btn-icon-prepend"></i>
                            fasilitas kamar                                                                            
                          </button>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama Fasilitas Kamar</th>
                              <th>Jumlah Fasilitas Kamar</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; ?>
                            @foreach ($fasilitaskamar as $datafasilitaskamar)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $datafasilitaskamar->nm_faskam }}</td>
                              <td>{{ $datafasilitaskamar->jumlah_faskam }}</td>
                              <td><button type="button" class="btn btn-inverse-dark btn-rounded btn-icon" data-toggle="modal" data-target="#edittype{{ $datafasilitaskamar->id_faskam }}"><i class="ti-pencil-alt"></i></button>
                              <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon" data-toggle="modal" data-target="#deletetype{{ $datafasilitaskamar->id_faskam }}"><i class="ti-trash"></i></button></td>
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
          </div>
        </div>

        {{-- modal tambah fasilitas kamar --}}
        <div class="modal" id="tambahfasilitas{{ $type->id_typekamar }}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Fasilitas Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/type/info/create/{{ $type->id_typekamar }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nm_faskam">Nama</label>
                    <input type="text" class="form-control" name="nm_faskam" id="nm_faskam" placeholder="nama fasilitas kamar">
                  </div>
                  <div class="form-group">
                    <label for="jumlah_faskam">Jumlah Fasilitas Kamar</label>
                    <input type="text" class="form-control" name="jumlah_faskam" id="jumlah_faskam" placeholder="jumlah fasilitas kamar">
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

  success: function(mid_typekamar').html(msg);
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