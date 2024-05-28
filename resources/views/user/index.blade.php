@extends('user.layout.header')

  @section('content')
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Welcome To.</h1>
        <p class="lead">Kusuma Group Lodging</p>
      </div>
    </div>
    <!-- End Jumbotron -->

    <!-- about us -->
    <section id="about">
      <div class="container-fluid pt-5 mb-5">
        <div class="container">
          <div class="row justify-content-md-center pt-2">
            <div class="col-lg-5 col-md-12 col-12">
              <div class="about-img" >
                <img src="img/document/kantor.jpg" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-7 col-md-12 col-12 ps-lg-5 mt-4 mt-md-0 align-text-top text-end">
              <div class="about-text">
                <h2>About Us</h2>
                <p style="margin-top: 45px"><span style="font-weight: bold">Kusuma Group</span> merupakan sebuah perusahaan 
                  group yang bergerak di bidang jasa penjualan kamar penginapan, villa, pengelolaan restoran dan agent 
                  travel wisata dengan harga terjangkau.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end about us -->

    <!-- bisnis -->
    <section id="bisnis">
      <div class="container-fluid mb-5">
        <div class="row">
          <div id="bisnis" class="text-center">
            <h2>Business</h2>
          </div>
        </div>
        <div class="row mb-2 pt-2 justify-content-center text-center">
          <div class="card col-md-5 me-sm-4 me-0 mb-2 pt-3 pb-3" style="width: 18rem;">
            <img src="img/document/fobwi.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Villa Pakis Residance</h5>
              <p class="card-text">Villa Pakis Residence : tempat istirahat yang membuat anda serasa dirumah sendiri 
                dengan nuansa pepohonan yang hijau dan rimbun.</p>
              <hr>
              <a href="https://maps.app.goo.gl/8vZf7ibL5kULs7oH8" onclick="window.open(this.href); return false;" class="btnbg btn"><i class="fa-solid fa-location-dot"></i> Maps</a>
              <a href="/villapakis" class="btnbg btn">Explore</a>
            </div>
          </div>
          <div class="card col-md-5 ms-sm-4 ms-0 mb-2 pt-3 pb-3" style="width: 18rem;">
            <img src="img/document/fobali.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Kusuma Hills Guest House</h5>
              <p class="card-text">Kusuma Hills Guest House : lokasi istirahat yang nyaman dan aman, lokasi yang 
                sangat strategis sangat dekat dengan wisata populer dibali.</p>
              <hr>
              <a href="https://maps.app.goo.gl/Ks5coGkgnzAbAMXD8" onclick="window.open(this.href); return false;" class="btnbg btn"><i class="fa-solid fa-location-dot"></i> Maps</a>
              <a href="/kusumahills" class="btnbg btn">Explore</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end bisnis -->

    <!-- kegiatan -->
    <section id="kegiatan" class="overflow-hidden">
      <div class="container mb-5">
        <div class="row mb-3">
          <div class="col-6">
            <h2>Event</h2>
          </div>
          <div class="col-6 d-flex justify-content-end">
            <a href="/event" class="btnbg btn"><span>Read More... <i class="fa-solid fa-angle-right"></span></i></a>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 d-flex justity-content-start">
              <div class="card-fitur me-3">
                <img src="img/document/e-1.jpeg" class="img-fluid" alt="">
              </div>
              <div class="card-fitur me-3">
                <img src="img/document/e-2.jpeg" class="img-fluid" alt="">
              </div>
              <div class="card-fitur me-3">
                <img src="img/document/e-3.jpeg" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end kegiatan -->

    <!-- lainnya -->
    <section id="other">
      <div class="container-fluid mb-5">
        <div class="container">
          <div class="row justify-content-center pt-2">
            <div class="col-lg-7 col-md-12 col-12 ps-lg-5">
              <div class="about-text align-text-top text-start">
                <h2>Other Business</h2>
                <p style="margin-top: 45px"><span style="font-weight: bold">PangPi(Panggon ngoPi)</span> merupakan warung makan ditengah 
                    kota Banyuwangi dengan nuansa tradisional dengan konsep bangunan dari bambu membuat anda serasa didesa walau ada di tangah kota 
                    dengan sajian makanan dan minuman yang nikmat serta dengan harga terjangkau pastinya.</p>
              </div>
              <a href="/other" class="btnbg btn mb-4 mb-md-0" style="margin-top: 25px;">Read More</a>
            </div>
            <div class="col-lg-5 col-md-12 col-12">
              <div class="other-img" >
                <img src="img/document/pangpi.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end lainnya -->
  @endsection