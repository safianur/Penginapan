@extends('admin.layout.sub')

  @section('content')

      <!-- partial -->
      <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row mb-4">
              <div class="col-md-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome back, {{ auth()->user()->nm_pegawai }}</h3>
                <h6 class="font-weight-normal mb-0">Silahkan mengecek list data Booking dan menambah data yang perlu ditambahkan....</h6>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    {{-- <p class="card-title">Pemasukan Data Tahun 2024</p>
                    <canvas id="sales-chart"></canvas> --}}
                    <div id="PemasukanData"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin transparent">
                <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p class="mb-4">Data Tamu Bulan {{ \Carbon\Carbon::now()->translatedFormat('F') }}</p>
                        <p class="fs-30 mb-2">{{ $DataTamu }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p class="mb-4">Data Pemesanan Bulan {{ \Carbon\Carbon::now()->translatedFormat('F') }}</p>
                        <p class="fs-30 mb-2">{{ $DataPemesanan }}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p class="mb-4">Data Check In Bulan {{ \Carbon\Carbon::now()->translatedFormat('F') }}</p>
                        <p class="fs-30 mb-2">{{ $DataCheckIn }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        {{-- <p class="mb-4">Data Check Out Bulan </p> --}}
                        <p class="mb-4">Data Check Out Bulan {{ \Carbon\Carbon::now()->translatedFormat('F') }}</p>
                        <p class="fs-30 mb-2">{{ $DataCheckOut }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->

  @endsection

  @section('chart')
  <!-- script chart -->
  <script src="admin/js/highcharts.js"></script>
  <script>
    Highcharts.chart('PemasukanData', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Pemasukan Tahun 2024',
        },
        xAxis: {
            categories: {!! json_encode($bulan) !!}
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Pemasukan'
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            {
                name: 'Total Pemasukan',
                data: {!! json_encode($totaldata) !!}
            },
        ]
    });

  </script>
  @endsection