@extends('user.layout.header')

  @section('content')
    <!-- Banner -->
    <section class="banner-event">
      <div class="container">
        <h1 class="display-4">Kegiatan yang ada</h1>
        <p class="lead">di Halaman Villa Pakis Residance</p>
      </div>
    </section>
    <!-- end Banner -->  

    <!-- judul Event -->
    <div class="container">
      <div class="container-fluid mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
          <div class="col-sm-9 col-12 ps-lg-5 text-center">
            <div class="about-text text-center">
              <h2>Event</h2>
              <p>Villa Pakis Residence sangat cocok untuk kegiatan happy camp, pelatihan, wedding dan outbound
                dengan halaman yang luas serta hijau membuat villa pakis residence pilihan tepat untuk keluarga anda.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end judul Event -->

    <!-- gallery Event -->
    <div class="container">
      <div class="container-fluid mb-5">
        <div class="row">
          <div id="bisnis" class="text-center">
            <h2>Business</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          @foreach ($event as $dataevent)
          <div class="card col-sm-3 pt-2 me-md-5 me-0">
            <img src="{{ url('img/'.$dataevent->gmbr_kegiatan) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="font-weight-bold" style="font-size: 14px">
                Tanggal Kegiatan <span> : </span>
                <span>{{ $dataevent->tgl_kegiatan }}</span>
              </p>
              <p class="font-weight-bold" style="margin-top:-10px; font-size: 14px">
                Nama Kegiatan <span> : </span>
                <span>{{ $dataevent->nm_kegiatan }}</span>
              </p>
              <p class="font-weight-bold" style="margin-top:-10px; font-size: 14px">
                Pengada Kegiatan <span> : </span>
                <span>{{ $dataevent->pengada_kegiatan }}</span>
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- end gallery Event -->
  @endsection