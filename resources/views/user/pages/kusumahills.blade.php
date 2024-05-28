@extends('user.layout.header')

  @section('content')
    <!-- Banner -->
    <section class="banner-melasti">
      <div class="container">
        <h1 class="display-4">Melasti Hills Room & Cafe</h1>
        <p class="lead">Bali</p>
      </div>
    </section>
    <!-- end Banner -->

    <!-- judul Event -->
    <div class="container">
      <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
          <div class="col-sm-9 col-12 ps-lg-5 text-center">
            <div class="about-text text-center">
              <p><span style="font-weight: bold; font-size: 20px">Kusuma Hills Guest House</span> ini merupakan tempat peristirahatan
              yang nyaman dan aman, lokasi yang begitu strategis dengan tempat wisata yang populer
              di Bali seperti GWK, Pantai Melasti dan Pantai Pandawa yang dapat ditempuh sekitar 10 menit dari Kusuma Hills Guest House</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end judul Event -->

    <!-- type kamar -->
    <section id="type-kamar">
      <div class="container mt-5">
        <div class="row">
          <div class="judul-type">
            <h2>Kamar</h2>
          </div>
        </div>
        <div class="row d-flex justify-center">
          <div class="col-md-4">
            <div class="card-fitur mt-3 position-relative">
              <img src="{{ url('img/'.$typekamar->gmbr_typekamar) }}" alt="" class="w-100">
              <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
                <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                  <h5>{{ $typekamar->nm_typekamar }}</h5>
                  <button class="btn btn-outline-light tombol" data-bs-toggle="modal" data-bs-target="#modaldetail{{ $typekamar->id_typekamar }}">Selengkapnya</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end type kamar -->

    <!-- modal detail type kamar -->
    <div class="modal fade" id="modaldetail{{ $typekamar->id_typekamar }}" aria-hidden="true" aria-labelledby="modaldetailLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modaldetailLabel">Detail Kamar {{ $typekamar->nm_typekamar }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 m-3">
                <div class="row">
                  <div class="col-6">
                    <img src="{{ url('img/'.$typekamar->gmbr_typekamar) }}" class="w-100">
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-6">
                        <h5>{{ $typekamar->nm_typekamar }}</h5>
                      </div>
                      <div class="col-6">
                        <p style="font-size: 80%; margin-right:15%; margin-top: 1.5%; text-align:end">Rp. {{ number_format($typekamar->harga, 0, ',', '.') }}/malam</p>
                      </div>
                    </div>
                    <hr style="margin-top:-1%; margin-left:-1%; margin-right:6%">
                    <div class="row justify-content-center">
                      <div class="col-11" style="margin-right: 6%">
                        <h6> Fasilitas : </h6>
                        @foreach ($faskam as $datafaskam)
                        <p>
                           {{ $datafaskam->jumlah_faskam }} {{ $datafaskam->nm_faskam }},
                        </p>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal detail type kamar -->

    <!-- ketersediaan kamar -->
    <section id="ketersediaan-kamar">
      <div class="container mt-5">
        <div class="row">
          <div class="judul-ketkam text-end">
            <h2>Ketersediaan Kamar</h2>
          </div>
        </div>
        <div class="row mt-2 justify-content-center">
          <div class="col-11">
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Standard Room</th>
                  <th scope="col">Superior Twin Room</th>
                  <th scope="col">Superior Room</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>12 Oktober 2023</td>
                  <td>Tersedia 1 kamar</td>
                  <td>Tersedia 2 kamar</td>
                  <td>Tersedia 1 kamar</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>13 Oktober 2023</td>
                  <td>Tersedia 3 kamar</td>
                  <td>Tersedia 1 kamar</td>
                  <td>Tersedia 2 kamar</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- end ketersediaan kamar -->

    <!-- fasilitas public -->
    <section id="fasilitas-public" class="overflow-hidden">
      <div class="container mt-5">
        <div class="row">
          <div class="judul-faspub text-center">
            <h2>Fasilitas Public</h2>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach ($faspub as $datafaspub)
                  <div class="carousel-item active">
                    <div class="card">
                      <div class="img-wrapper">
                        <img src="{{ url('img/'.$datafaspub->gmbr_faspub) }}" alt="...">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">{{ $datafaspub->nm_faspub }}</h5>
                        <p class="card-text">estimasi kurang lebih {{ $datafaspub->estimasi }}</p>
                        <a href="#" onclick="window.open(this.href); return false;" class="btnbg btn"><i class="fa-solid fa-location-dot"></i> Explore</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if ($faspub->count() > 3)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end fasilitas public -->

    <!-- wisata -->
    <section id="wisata" class="overflow-hidden">
      <div class="container mt-5">
        <div class="row">
          <div class="judul-wisata text-start">
            <h2>Wisata</h2>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach ($wisata as $datawisata)
                  <div class="carousel-item active">
                    <div class="card">
                      <div class="img-wrapper">
                        <img src="{{ url('img/'.$datawisata->gmbr_wisata) }}" alt="...">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">{{ $datawisata->nm_wisata }}</h5>
                        <p class="card-text">estimasi kurang lebih {{ $datawisata->estimasi }}</p>
                        <a href="#" onclick="window.open(this.href); return false;" class="btnbg btn"><i class="fa-solid fa-location-dot"></i> Explore</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if ($wisata->count() > 3)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end wisata -->

    <!-- gallery -->
    <section id="gallery" class="overflow-hidden">
      <div class="container mt-5">
        <div class="row">
          <div class="judul-gallery text-center">
            <h2>Gallery</h2>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach ($gallery as $datagallery)
                  <div class="carousel-item active">
                    <div class="card">
                      <div class="img-wrapper">
                        <img src="{{ url('img/'.$datagallery->gmbr_gallery) }}" alt="...">
                      </div>
                      <div class="card-body">
                        <p class="card-text">{{ $datagallery->keterangan_gallery }}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if ($gallery->count() > 3)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end gallery -->

    <!-- alamat bisnis -->
    <section id="alamat-bisnis">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-5 d-flex justify-content-center" style="background-color: #EFE4BB">
            <div class="albis">
              <p>Alamat : {{ $alamat->alamat }}</p>
              <p>Contact Person : <br> +62 813-3340-8524 (Bahron) <br> +62 882-0000-32209 (Maura)</p>
            </div>
          </div>
          <div class="col-5 ps-0">
            <img src="../../img/document/fobali.jpeg" alt="" class="w-100">
          </div>
        </div>
      </div>
    </section>
    <!-- end alamat bisnis -->
  @endsection