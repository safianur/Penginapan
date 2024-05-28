@extends('user.layout.header')

  @section('content')
    <!-- Jumbotron -->
    <div class="banner-other jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">PangPi (Panggon ngoPi)</h1>
        <p class="lead">Banyuwangi</p>
      </div>
    </div>
    <!-- End Jumbotron -->

    <!-- PangPi -->
    <section class="PangPi">
      <div class="container">
        <div class="container-fluid mt-5 mb-5">
          <div class="row">
            <div class="col-sm-12 col-12 ps-lg-5 text-center">
              <div class="about-text text-center">
                <h2>PangPi</h2>
                <p><span style="font-weight: bold">PangPi(Panggon ngoPi)</span> merupakan warung makan dengan nuansa tradisional dengan konsep bangunan dari bambu. 
                  Tempat makan yang nyaman dengan ruang dan perabot yang sederhana ini menyajikan berbagai makanan 
                  dan minuman seperti nasi goreng, mie gobyos, dll dengan rasa yang sangat enak dan yang pasti harga 
                  terjangkau.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end PangPi -->

    <!-- fasilitas -->
    <section class="fasilitas">
      <div class="container mt-5">
        <div class="row">
          <div class="judul-fasilitas">
            <h2>Fasilitas</h2>
          </div>
        </div>
        <div class="row pt-3 text-center justify-content-center">
          <div class="col-4 col-sm-2 mb-4">
            <span class="lingkaran"><img src="user/icons/toilet.png" alt=""></span>
            <h6 class="mt-3">WC</h6>
          </div>
          <div class="col-4 col-sm-2 mb-4">
            <span class="lingkaran"><img src="user/icons/wifi.png" alt=""></span>
            <h6 class="mt-3">Free Wifi</h6>
          </div>
          <div class="col-4 col-sm-2 mb-4">
            <span class="lingkaran"><img src="user/icons/parking.png" alt=""></i></span>
            <h6 class="mt-3">Parkir luas</h6>
          </div>
          <div class="col-4 col-sm-2 mb-4">
            <span class="lingkaran"><img src="user/icons/projector.png" alt=""></span>
            <h6 class="mt-3">LCD Proyektor untuk Nobar</h6>
          </div>
        </div>
      </div>
    </section>
    <!-- end fasilitas -->

    <!-- gallery -->
    <section class="gallery">
      <div class="container mt-5">
        <div class="row">
          <div class="judul-gallery text-center">
            <h2>Gallery</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          @foreach ($pangpi as $other)
          <div class="col-3 pb-3">
            <img src="{{ url('img/'.$other->gmbr_pangpi) }}" alt="" class="w-100">
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- end gallery -->
  @endsection