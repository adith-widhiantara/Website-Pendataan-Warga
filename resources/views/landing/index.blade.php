@extends('base.base')

@section('title', 'Sistem Pendataan Warga')

@section('style')

@endsection

@section('breadcrumb')
  {{ Breadcrumbs::render('landing') }}
@endsection

@section('base')
  <div class="row">
    <div class="col-6">
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ \App\KartuKeluarga::all()->count() }}</h3>
          <p>Kartu Keluarga</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('kartukeluarga.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-6">
      <div class="small-box bg-secondary">
        <div class="inner">
          <h3>{{ \App\AnggotaKeluarga::where('status', 1)->count() }}</h3>
          <p>Warga</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('anggotakeluarga.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ \App\DataKelahiran::all()->count() }}</h3>
          <p>Data Kelahiran</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('datakelahiran.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ \App\DataKematian::all()->count() }}</h3>
          <p>Data Kematian</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{ route('datakematian.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ \App\DataPindahDatang::all()->count() }}</h3>
          <p>Data Pindah Datang</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('datapindahdatang.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ \App\DataPindahKeluar::all()->count() }}</h3>
          <p>Data Pindah Keluar</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{ route('datapindahkeluar.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-6">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Rentang Usia Warga</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Agama Warga</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>

  <script>
    $(function () {

      // Rentang Usia
      var areaChartData = {
        labels : [
          '0-10',
          '11-20',
          '21-30',
          '31-40',
          '41-50',
          '51-60',
          '61-70',
          '71-80',
          '81-90',
          '91-100',
        ],
        datasets: [
          {
            label : 'Rentang Usia Warga',
            backgroundColor : 'rgba(60,141,188,0.9)',
            borderColor : 'rgba(60,141,188,0.8)',
            pointRadius : false,
            pointColor : '#3b8bba',
            pointStrokeColor : 'rgba(60,141,188,1)',
            pointHighlightFill : '#fff',
            pointHighlightStroke : 'rgba(60,141,188,1)',
            data :
              [
                {{ \DB::table('anggota_keluargas')->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR,anggota_keluargas.tanggal_bulan_tahun_lahir,CURDATE())'), array( 1 , 10 ))->count() }},
                {{ \DB::table('anggota_keluargas')->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR,anggota_keluargas.tanggal_bulan_tahun_lahir,CURDATE())'), array( 11 , 20 ))->count() }},
                {{ \DB::table('anggota_keluargas')->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR,anggota_keluargas.tanggal_bulan_tahun_lahir,CURDATE())'), array( 21 , 30 ))->count() }},
                {{ \DB::table('anggota_keluargas')->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR,anggota_keluargas.tanggal_bulan_tahun_lahir,CURDATE())'), array( 31 , 40 ))->count() }},
                {{ \DB::table('anggota_keluargas')->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR,anggota_keluargas.tanggal_bulan_tahun_lahir,CURDATE())'), array( 41 , 50 ))->count() }},
                {{ \DB::table('anggota_keluargas')->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR,anggota_keluargas.tanggal_bulan_tahun_lahir,CURDATE())'), array( 51 , 60 ))->count() }},
                {{ \DB::table('anggota_keluargas')->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR,anggota_keluargas.tanggal_bulan_tahun_lahir,CURDATE())'), array( 61 , 70 ))->count() }},
                {{ \DB::table('anggota_keluargas')->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR,anggota_keluargas.tanggal_bulan_tahun_lahir,CURDATE())'), array( 71 , 80 ))->count() }},
                {{ \DB::table('anggota_keluargas')->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR,anggota_keluargas.tanggal_bulan_tahun_lahir,CURDATE())'), array( 81 , 90 ))->count() }},
                {{ \DB::table('anggota_keluargas')->whereBetween(\DB::raw('TIMESTAMPDIFF(YEAR,anggota_keluargas.tanggal_bulan_tahun_lahir,CURDATE())'), array( 91 , 100 ))->count() }},
              ]
          },
        ]
      }

      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      barChartData.datasets[0] = temp0
      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }
      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
      // end Rentang Usia

      // Agama
      var donutData = {
        labels: [
          @foreach ( \App\Agama::all() as $agama )
            '{{ $agama -> keterangan }}',
          @endforeach
        ],
        datasets: [
          {
            data: [
              @foreach ( \App\Agama::all() as $agama )
                {{ \App\AnggotaKeluarga::where('agamas_id', $agama -> id)->count() }},
              @endforeach
            ],
            backgroundColor : [
              '#f56954',
              '#00a65a',
              '#f39c12',
              '#00c0ef',
              '#3c8dbc',
              '#d2d6de',
              '#f1d3a1'
            ],
          }
        ]
      }

      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData        = donutData;
      var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })
      // Agama
    });
  </script>
@endsection
