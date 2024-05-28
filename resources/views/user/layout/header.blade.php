<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="img/logo/logo_kusuma.jpeg" />
  <title>Penginapan Kusuma Group</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="user/css/bootstrap.css">

  <!-- My Fonts -->
  <link rel="stylesheet" href="user/fonts/fonts.googleapis.com_css_family=Viga.css">
  <link rel="stylesheet" href="user/fonts/fonts.googleapis.com_css_family=Poppins.css">

  <!-- Swiper css -->
  <link rel="stylesheet" href="user/css/swiper-bundle.min.css" />

  <!-- My CSS -->
  <link rel="stylesheet" href="user/css/style.css">
  {{-- <link rel="stylesheet" href="user/css/bisnis/style.css"> --}}

  <!-- My Icons -->
  <link rel="stylesheet" href="user/fontawesome-free-6.4.2-web/css/all.min.css">

</head>
<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light position-fixed w-100">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="img/logo/logo_kusuma.jpeg" alt="" height="24" class="d-inline-block align-text-top">
        KusumaGroup
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse"  id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Location
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="/villapakis">Banyuwangi - Villa Pakis Residance</a></li>
              <li><a class="dropdown-item" href="/kusumahills">Bali - Kusuma Hills Guest House</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/event">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/ketentuan">Ketentuan</a>
          </li>
          {{-- @if ( Str::length(Auth::guard('data_pengunjung')->user()) > 0 )
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{ Auth::guard('data_pengunjung')->user()->nm_pengunjung }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/rincian">Konfirmasi Pemesanan</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-right"></i>LogOut</a></li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          @endif --}}
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modalkonfirmasi" href="#">Konfirmasi Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modalpemesanan" href="#">Book Now</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end navbar -->

  {{-- modal konfirmasi pemesanan --}}
  <div class="modal" id="modalkonfirmasi" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasikan Pemesanan Anda!!!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/uploadbuktitf" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Kode Reservasi</label>
              <input type="text" class="form-control" name="kode_booking" id="kode_booking" placeholder="masukkan kode reservasi anda">
            </div>
            <div class="form-group">
              <label for="bukti_transfer">Bukti Transfer : </label>
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- modal book now -->
  <div class="modal" id="modalpemesanan" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Book Now</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/booknow" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Tujuan Penginapan</label>
              <select class="form-control" name="id_bisnis" id="id_bisnis">
                <option>~ Pilih Lokasi ~</option>
                @foreach ($bisnis as $databisnis)
                  <option value="{{ $databisnis->id_bisnis }}">
                    {{ $databisnis->lokasi }} - {{ $databisnis->nm_bisnis }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Type Kamar</label>
              <select class="form-control" name="id_typekamar" id="id_typekamar">
                <option>~ Pilih Type Kamar ~</option>
              </select>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="mb-3">
                  <label class="form-label">Jumlah Orang</label>
                  <input type="number" class="form-control" name="jmlorang" id="jmlorang" placeholder="jumlah orang">
                </div>
              </div>
              <div class="col-sm">
                <div class="mb-3">
                  <label class="form-label">Jumlah Kamar</label>
                  <input type="number" class="form-control" name="jmlkamar" id="jmlkamar" placeholder="jumlah kamar">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="name@gmail.com">
            </div>
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="nama lengkap sesuai KTP">
            </div>
            <div class="mb-3">
              <label class="form-label">No. Hp</label>
              <input type="number" class="form-control" name="nohp" id="nohp" placeholder="no telepon yang aktif">
            </div>
            <div class="row">
              <div class="col">
                <div class="g-2 mb-3">
                  <label class="form-label">Check In</label>
                  <input type="date" class="form-control" name="checkin" id="checkin">
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label class="form-label">Check Out</label>
                  <input type="date" class="form-control" name="checkout" id="checkout">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @yield('content')

  <!-- footer -->
  <footer class="footer text-white pt-5 pb-3">
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="col-sm-5">
          <div class="alamat">
            <p>Jl. Nuri No.50a, Pakis, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68418</p>
            <p>villakusuma001@gmail.com.com</p>
            <p>(+62) 813-3338-5305</p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="logo pt-sm-2">
            <img src="img/logo/logo_kusuma.jpeg" alt="">
            <img src="img/logo/logo_stikom.jpg" alt="">
          </div>
        </div>
        <div class="menu col-sm-4">
          <h3>Navigation</h3>
          <ul>
            <li><a href="/">Home</a></li>
            <li>
              <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Location
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/villapakis">Banyuwangi - Villa Pakis Residance</a></li>
                <li><a class="dropdown-item" href="/kusumahills">Bali - Melasti Hills</a></li>
              </ul>
            </li>
            <li><a href="/event">Event</a></li>
            <li><a cdata-bs-toggle="modal" data-bs-target="#modalpemesanan" href="#">Book Now</a></li>
          </ul>
        </div>
      </div>
      <hr>
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>©copyright 2023. Kusuma Group ~ StikomPGRIBwi. All Right Reserved</span>
        </div>
      </div>
    </div>
  </footer>
  <!-- end footer -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="user/js/bootstrap.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="user/js/popper.min.js"></script>
    {{-- <script src="user/js/bootstrap.min.js"></script> --}}

    <!-- carousel js -->
    <script src="user/js/jquery-3.7.1.min.js"></script>

    <!-- swipper js -->
    {{-- <script src="user/js/swiper-bundle.min.js"></script> --}}

    <!-- Javascript -->
    <script src="user/js/script.js"></script>

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
              url : "{{ route('gettypekamaruser') }}",
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