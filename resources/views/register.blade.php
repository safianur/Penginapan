<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Penginapan Kusuma Group</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="img/logo/logo_kusuma.jpeg" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="img/logo/logo_kusuma.jpeg" alt="logo">
                KusumaGroup
              </div>
              <h4>Hallo! Silahkan Melakukan Registrasi terlebih dahulu!</h4>
              <form action="/register" method="post" class="pt-3" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <input type="nm_pengunjung" class="form-control form-control-lg" name="nm_pengunjung" id="nm_pengunjung" placeholder="nama lengkap" autofocus required value="{{ old('nm_pengunjung') }}">
                  @error('nm_pengunjung')
                    <small>{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="name@gmail.com" autofocus required value="{{ old('email') }}">
                  @error('email')
                    <small>{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" required value="{{ old('password') }}">
                  @error('password')
                    <small>{{ $message }}</small>
                  @enderror
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register</button>
                </div>
              </form>
              <small class="d-block text-center mt-3">Sudah Registrasi? <a href="/login">LogIn</a></small>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->

  <!-- inject:js -->
  <script src="admin/js/off-canvas.js"></script>
  <script src="admin/js/hoverable-collapse.js"></script>
  <script src="admin/js/template.js"></script>
  <script src="admin/js/settings.js"></script>
  <script src="admin/js/todolist.js"></script>
  <!-- endinject -->

  <!-- alert -->
  <script src="admin/js/sweetalert2@11.js"></script>

  @if ($message = Session::get('pesan'))
    <script>
      Swal.fire('{{ $message }}');
    </script>
  @endif

</body>

</html>
