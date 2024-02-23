@extends('layouts.front')

@section('main-content')
    <hr>
    <!--Slider-->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Perkembangan Harga</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $komoditas }}</li>
            </ol>
        </nav>
    </div>

    <div class="container">
      <div class="row justify-content-between py-4">
        <div class="col-4">
          <h3 class="h3 font-weight-bold">Perkembangan Harga {{ $komoditas }}</h1>
        </div>
        <div class="col-4">
          <form action="{{ route('komoditas.perkembangan-harga') }}" method="get">

          <div class="input-group mb-3">
              <select class="custom-select" id="inputGroupSelect04" name="jenis_komoditas">
                <option value="beras_premium">Beras Premium</option>
                <option value="beras_medium">Beras Medium</option>
                <option value="kedelai">Kedelai Kering Import</option>
                <option value="bawang_merah">Bawang Merah</option>
                <option value="bawang_putih">Bawang Putih</option>
                <option value="cabai_merah_keriting">Cabai Merah Keriting</option>
                <option value="cabai_rawit_merah">Cabai Rawit Merah</option>
                <option value="daging_sapi">Daging Sapi</option>
                <option value="daging_ayam_ras">Daging Ayam Ras</option>
                <option value="telur_ayam_ras">Telur Ayam Ras</option>
                <option value="gula_konsumsi">Gula Konsumsi</option>
                <option value="minyak_goreng_kemasan">Minyak Goreng Kemasan</option>
                <option value="tepung_terigu_curah">Tepung Terigu Curah</option>
                <option value="minyak_goreng_curah">Minyak Goreng Curah</option>
                <option value="jagung_pipilan">Jagung Pipilan</option>
                <option value="ikan_kembung">Ikan Kembung</option>
                <option value="ikan_tongkol">Ikan Tongkol</option>
                <option value="ikan_bandeng">Ikan Bandeng</option>
                <option value="garam">Garam Beryodium</option>
                <option value="tepung_terigu_non_curah">Tepung Terigu Non Curah</option>
              </select>
              <div class="input-group-append">
                <button class="btn btn-outline-danger" type="submit">Filter</button>
              </div>
          </div>
        </form>
        
        </div>
      </div>


        <div class="card shadow mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="chart">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-5" >
          <div class="card-body">
              <div class="row">
                  <div class="col-md-12">
                      <div id="chartTahunan">

                      </div>
                  </div>
              </div>
          </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
          series: [{
            name: "Harga",
            data: @json($berasPremium_30),
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Perkembangan Harga {{ $komoditas }} selama 30 Hari Terahir',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: @json($tanggal_30),
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush

@push('js')
    <script>
        var options = {
          series: [{
            name: "2023",
            data: @json($berasPremium2023),
        },
        {
          name: "2024",
          data: @json($berasPremium2024),
        }
      ],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Perkembangan Harga {{ $komoditas }} Bulanan',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'],
        },
        markers :{
          size: 5
        }
        };

        var chart = new ApexCharts(document.querySelector("#chartTahunan"), options);
        chart.render();
    </script>
@endpush