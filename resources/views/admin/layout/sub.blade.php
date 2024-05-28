<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Penginapan Kusuma Group</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="admin/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="img/logo/logo_kusuma.jpeg">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#"><img src="img/logo/logo_kusuma.jpeg" class="mr-2" alt="logo"/><span style="color: #000; font-size: 15px">Kusuma Group</span></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="img/logo/logo_kusuma.jpeg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="img/logo/person.jpg" alt="profile"/>
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
          @if (auth()->user()->jabatan == 'Sekretaris')
            <li class="nav-item">
              <a class="nav-link" href="/pegawai">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Data Pegawai</span>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      @yield('content')

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
  <script src="admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->

  <!-- Plugin js for this page -->
  <script src="admin/vendors/chart.js/Chart.min.js"></script>
  <script src="admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="admin/js/dataTables.select.min.js"></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="admin/js/off-canvas.js"></script>
  <script src="admin/js/hoverable-collapse.js"></script>
  <script src="admin/js/template.js"></script>
  <script src="admin/js/settings.js"></script>
  <script src="admin/js/todolist.js"></script>
  <!-- endinject -->

  <!-- Custom js for this page-->
  <script src="admin/js/dashboard.js"></script>
  <script src="admin/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

  @yield('chart')

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
    $(function() {
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
      });
      $(function () {
        $('#edit_idbisnis').on('change', function(){
          let edit_idbisnis = $('#edit_idbisnis'). val();
          $.ajax({
            type : 'POST',
            url : "{{ route('getedittypekamar') }}",
            data : {edit_idbisnis:edit_idbisnis},
            cache : false,

            success: function(msg){
              $('#edit_idtypekamar').html(msg);
            },
            error: function(data){
              console.log('error', data)
            },
          })
        })
      })
    })
  </script>
</body>

</html>