@extends('layouts.front')

@push('slider')
        <!--Slider-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="first-slide" src="{{ asset('slider/satu.jpg') }}" alt="First slide" height="470px" >
              </div>
              <div class="carousel-item">
                <img class="second-slide" src="{{ asset('slider/dua.jpg') }}" alt="First slide" height="470px" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="third-slide" src="{{ asset('slider/tiga.jpg') }}" alt="First slide" height="470px" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
@endpush


@section('main-content')
    <!-- Harga hari ini -->
    <div class="container-fluid">
        <div class="container-fluid">
            <h1 class="h3 font-weight-bold mt-3">{{ __('Harga Pangan Hari Ini') }}</h1>
            <p class="text-secondary">Data dibandingkan dengan hari kemarin</p>
        </div>
        <div class="card shadow-lg container-fluid">
            <div class="row">

                <!-- Beras Premium -->
                <div class="col-xl-3 col-md-6 mb-4 mt-4">
                    <div class="card shadow h-100 bg-secondary" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/beras-premium.png') }}" class="img" width="220" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <a class="font-weight-bold text-white mb-1" href="{{ route('komoditas.perkembangan-harga') }}" target="_blank">Beras Premium</a>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->beras_premium,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_premium }}"> 
                                                <i class="fas {{ $i_class_premium }}"></i>  
                                                {{ number_format(($beras_premium)/$harga_hari_ini->beras_premium,2) }}%  (Rp {{ $beras_premium }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Beras Medium -->
                <div class="col-xl-3 col-md-6 mb-4 mt-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-70">
                                    <img src="{{ asset('img/beras-premium.png') }}" class="img" width="220" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Beras Medium</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->beras_medium,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_medium }}"> 
                                                <i class="fas {{ $i_class_medium }}"></i>  
                                                {{ number_format(($beras_medium)/$harga_hari_ini->beras_medium,2) }}%  (Rp {{ $beras_medium }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kedelai -->
                <div class="col-xl-3 col-md-6 mb-4 mt-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/kedelai.png') }}" class="img" width="220" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Kedelai Biji Kering</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->kedelai,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_kedelai }}"> 
                                                <i class="fas {{ $i_class_kedelai }}"></i>  
                                                {{ number_format(($kedelai)/$harga_hari_ini->kedelai,2) }}%  (Rp {{ $kedelai }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bawang merah -->
                <div class="col-xl-3 col-md-6 mb-4 mt-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/bawang-merah.png') }}" class="img" width="220" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <a class="font-weight-bold text-white mb-1" data-toggle="modal" data-target="#showKomoditas">Bawang Merah</a>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->bawang_merah,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_bawang_merah }}"> 
                                                <i class="fas {{ $i_class_bawang_merah }}"></i>  
                                                {{ number_format(($bawang_merah)/$harga_hari_ini->bawang_merah,2) }}%  (Rp {{ number_format($bawang_merah,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bawang putih -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/bawang-putih.png') }}" class="img" width="220" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Bawang Putih</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->bawang_putih,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_bawang_putih }}"> 
                                                <i class="fas {{ $i_class_bawang_putih }}"></i>  
                                                {{ number_format(($bawang_putih)/$harga_hari_ini->bawang_putih,2) }}%  (Rp {{ number_format($bawang_putih,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cabai merah keriting -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/cabai-merah-keriting.png') }}" class="img" width="220" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Cabai Merah Keriting</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->cabai_merah_keriting,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_cabai_merah_keriting }}"> 
                                                <i class="fas {{ $i_class_cabai_merah_keriting }}"></i>  
                                                {{ number_format(($cabai_merah_keriting)/$harga_hari_ini->cabai_merah_keriting,2) }}%  (Rp {{ number_format($cabai_merah_keriting,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cabai rawit merah -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/cabai-rawit-merah.png') }}" class="img" width="220" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Cabai Rawit Merah</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->cabai_rawit_merah,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_cabai_rawit_merah }}"> 
                                                <i class="fas {{ $i_class_cabai_rawit_merah }}"></i>  
                                                {{ number_format(($cabai_rawit_merah)/$harga_hari_ini->cabai_rawit_merah,2) }}%  (Rp {{ number_format($cabai_rawit_merah,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daging sapi -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/daging-sapi-murni.png') }}" class="img" width="220" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Daging Sapi</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->daging_sapi,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_daging_sapi }}"> 
                                                <i class="fas {{ $i_class_daging_sapi }}"></i>  
                                                {{ number_format(($daging_sapi)/$harga_hari_ini->daging_sapi,2) }}%  (Rp {{ number_format($daging_sapi,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daging ayam ras -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/daging-ayam-ras.png') }}" class="img" width="220" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Daging Ayam Ras</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->daging_ayam_ras,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_daging_ayam_ras }}"> 
                                                <i class="fas {{ $i_class_daging_ayam_ras }}"></i>  
                                                {{ number_format(($daging_ayam_ras)/$harga_hari_ini->daging_ayam_ras,2) }}%  (Rp {{ number_format($daging_ayam_ras,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Telur ayam ras -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/telur-ayam-ras.png') }}" class="img" width="220" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Telur Ayam Ras</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->telur_ayam_ras,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_telur_ayam_ras }}"> 
                                                <i class="fas {{ $i_class_telur_ayam_ras }}"></i>  
                                                {{ number_format(($telur_ayam_ras)/$harga_hari_ini->telur_ayam_ras,2) }}%  (Rp {{ number_format($telur_ayam_ras,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gula konsumsi -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/gula-konsumsi.png') }}" class="img" width="100" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Gula Konsumsi</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->gula_konsumsi,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_gula_konsumsi }}"> 
                                                <i class="fas {{ $i_class_gula_konsumsi }}"></i>  
                                                {{ number_format(($gula_konsumsi)/$harga_hari_ini->gula_konsumsi,2) }}%  (Rp {{ number_format($gula_konsumsi,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Minyak goreng kemasan -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/minyak-goreng-kemasan-sederhana.png') }}" class="img" width="200" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white">Minyak Goreng Kemasan</div>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/Liter
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->minyak_goreng_kemasan,0,',','.') }}</h5>
                                            <a>Per Liter</a>
                                            <h5><span class="badge badge-{{ $span_class_minyak_goreng_kemasan }}"> 
                                                <i class="fas {{ $i_class_minyak_goreng_kemasan }}"></i>  
                                                {{ number_format(($minyak_goreng_kemasan)/$harga_hari_ini->minyak_goreng_kemasan,2) }}%  (Rp {{ number_format($minyak_goreng_kemasan,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tepung terigu curah -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/tepung-terigu-curah.png') }}" class="img" width="200" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Tepung Terigu Curah</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->tepung_terigu_curah,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_tepung_terigu_curah }}"> 
                                                <i class="fas {{ $i_class_tepung_terigu_curah }}"></i>
                                                    {{ number_format(($tepung_terigu_curah)/$harga_hari_ini->tepung_terigu_curah,2) }}%  (Rp {{ number_format($tepung_terigu_curah,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- minyak goreng curah -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/minyak-goreng-curah.png') }}" class="img" width="200" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Minyak Goreng Curah</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/Liter
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->minyak_goreng_curah,0,',','.') }}</h5>
                                            <a>Per Liter</a>
                                            <h5><span class="badge badge-{{ $span_class_minyak_goreng_curah }}"> 
                                                <i class="fas {{ $i_class_minyak_goreng_curah }}"></i>  
                                                {{ number_format(($minyak_goreng_curah)/$harga_hari_ini->minyak_goreng_curah,2) }}%  (Rp {{ number_format($minyak_goreng_curah,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- jagung_pipilan -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/jagung-tk-peternak.png') }}" class="img" width="200" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Jagung Pipilan</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->jagung_pipilan,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_jagung_pipilan }}"> 
                                                <i class="fas {{ $i_class_jagung_pipilan }}"></i>  
                                                {{ number_format(($jagung_pipilan)/$harga_hari_ini->jagung_pipilan,2) }}%  (Rp {{ number_format($jagung_pipilan,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ikan Kembung -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/ikan-kembung.png') }}" class="img" width="150" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Ikan Kembung</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->ikan_kembung,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_ikan_kembung }}"> 
                                                <i class="fas {{ $i_class_ikan_kembung }}"></i>  
                                                {{ number_format(($ikan_kembung)/$harga_hari_ini->ikan_kembung,2) }}%  (Rp {{ number_format($ikan_kembung,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ikan Tongkol -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/ikan-tongkol.png') }}" class="img" width="120" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Ikan Tongkol</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->ikan_tongkol,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_ikan_tongkol }}"> 
                                                <i class="fas {{ $i_class_ikan_tongkol }}"></i>  
                                                {{ number_format(($ikan_tongkol)/$harga_hari_ini->ikan_tongkol,2) }}%  (Rp {{ number_format($ikan_tongkol,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ikan Bandeng -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/ikan-bandeng.png') }}" class="img" width="120" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Ikan Bandeng</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->ikan_bandeng,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_ikan_bandeng }}"> 
                                                <i class="fas {{ $i_class_ikan_bandeng }}"></i>  
                                                {{ number_format(($ikan_bandeng)/$harga_hari_ini->ikan_bandeng,2) }}%  (Rp {{ number_format($ikan_bandeng,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Garam -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/garam.png') }}" class="img" width="120" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Garam</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->garam,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_garam }}"> 
                                                <i class="fas {{ $i_class_garam }}"></i>  
                                                {{ number_format(($garam)/$harga_hari_ini->garam,2) }}%  (Rp {{ number_format($garam,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- terigu non curah -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100" style="background: #606060 !important;">
                        <div class="card-body">
                            <div class="row">
                                <div class="opacity-50">
                                    <img src="{{ asset('img/terigu-non-curah.png') }}" class="img" width="200" style="opacity: 0.5;">
                                </div>
                                <div class="card-img-overlay">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-white mb-1">Terigu Non Curah</div>
                                        <p></p>
                                        <div class="text-white">
                                            @if (is_null($harga_hari_ini))
                                                Rp 0/kg
                                            @else
                                            <h5 class="font-weight-bold">Rp {{ number_format($harga_hari_ini->tepung_terigu_non_curah,0,',','.') }}</h5>
                                            <a>Per Kg</a>
                                            <h5><span class="badge badge-{{ $span_class_tepung_terigu_non_curah }}"> 
                                                <i class="fas {{ $i_class_tepung_terigu_non_curah }}"></i>  
                                                {{ number_format(($tepung_terigu_non_curah)/$harga_hari_ini->tepung_terigu_non_curah,2) }}%  (Rp {{ number_format($tepung_terigu_non_curah,0,',','.') }})
                                                </span>
                                            </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container-fluid">
            <h4 class="font-weight-bold mb-4 mt-4">Perkembangan Harga Pangan Pokok Strategis</h4>
        </div>

        <div class="card shadow-lg container-fluid">
            <div class="row ">
                <!-- Beras medium -->
                <div class="col-lg-4 mb-3 mt-4">
                    <!-- Illustrations -->
                    <div class="card shadow" style="background: #606060 !important;">
    
                            {!! $berasPremiumChart->container() !!}

                    </div>
                </div>
        
                <!-- Beras medium -->
                <div class="col-lg-4 mb-3 mt-4">
                    <!-- Illustrations -->
                    <div class="card shadow" style="background: #606060 !important;">

                            {!! $berasMediumChart->container() !!}
                
                    </div>
                </div>
        
                <!-- Kedelai -->
                <div class="col-lg-4 mb-3 mt-4">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $kedelaiChart->container() !!}
                    </div>
                </div>

                <!-- Bawang Merah -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $bawangMerahChart->container() !!}
                    </div>
                </div>

                <!-- Bawang Putih -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $bawangPutihChart->container() !!}
                    </div>
                </div>

                <!-- Cabai Merah Keriting -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $cabaiMerahKeritingChart->container() !!}
                    </div>
                </div>

                <!-- Cabai Rawit Merah -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $cabaiRawitMerahChart->container() !!}
                    </div>
                </div>

                <!-- Daging sapi -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $dagingSapiChart->container() !!}
                    </div>
                </div>

                <!-- Daging ayam ras -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $dagingAyamRasChart->container() !!}
                    </div>
                </div>

                <!-- Telur ayam -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $telurAyamRasChart->container() !!}
                    </div>
                </div>

                <!-- Gula Konsumsi -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $gulaKonsumsiChart->container() !!}
                    </div>
                </div>

                <!-- Minyak Goreng Kemasan -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $minyakGorengKemasanChart->container() !!}
                    </div>
                </div>

                <!-- Tepung Terigu Curah -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $tepungTeriguCurahChart->container() !!}
                    </div>
                </div>

                <!-- Minyak Goreng Curah -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $minyakGorengCurahChart->container() !!}
                    </div>
                </div>

                <!-- Jagung Pipilan -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $jagungPipilanChart->container() !!}
                    </div>
                </div>

                <!-- Ikan Kembung -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $ikanKembungChart->container() !!}
                    </div>
                </div>

                <!-- Ikan tongkol -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $ikanTongkolChart->container() !!}
                    </div>
                </div>

                <!-- Ikan bandeng -->
                <div class="col-lg-4 mb-3">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $ikanBandengChart->container() !!}
                    </div>
                </div>

                <!-- Garam -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $garamChart->container() !!}
                    </div>
                </div>

                <!-- Terigu non curah-->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow" style="background: #606060 !important;">
                        {!! $tepungTeriguNonCurahChart->container() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>

    @include('front.bawang_merah')
@endsection
    

@push('js')
    <!-- Scripts -->
    <script src="{{ $berasPremiumChart->cdn() }}"></script>
    <script src="{{ $berasMediumChart->cdn() }}"></script>
    <script src="{{ $kedelaiChart->cdn() }}"></script>
    <script src="{{ $bawangMerahChart->cdn() }}"></script>
    <script src="{{ $bawangPutihChart->cdn() }}"></script>
    <script src="{{ $cabaiMerahKeritingChart->cdn() }}"></script>
    <script src="{{ $cabaiRawitMerahChart->cdn() }}"></script>
    <script src="{{ $dagingSapiChart->cdn() }}"></script>
    <script src="{{ $dagingAyamRasChart->cdn() }}"></script>
    <script src="{{ $telurAyamRasChart->cdn() }}"></script>
    <script src="{{ $gulaKonsumsiChart->cdn() }}"></script>
    <script src="{{ $minyakGorengKemasanChart->cdn() }}"></script>
    <script src="{{ $tepungTeriguCurahChart->cdn() }}"></script>
    <script src="{{ $minyakGorengCurahChart->cdn() }}"></script>
    <script src="{{ $jagungPipilanChart->cdn() }}"></script>
    <script src="{{ $ikanKembungChart->cdn() }}"></script>
    <script src="{{ $ikanTongkolChart->cdn() }}"></script>
    <script src="{{ $ikanBandengChart->cdn() }}"></script>
    <script src="{{ $garamChart->cdn() }}"></script>
    <script src="{{ $tepungTeriguNonCurahChart->cdn() }}"></script>

    {{ $berasPremiumChart->script() }}
    {{ $berasMediumChart->script() }}
    {{ $kedelaiChart->script() }}
    {{ $bawangMerahChart->script() }}
    {{ $bawangPutihChart->script() }}
    {{ $cabaiMerahKeritingChart->script() }}
    {{ $cabaiRawitMerahChart->script() }}
    {{ $dagingSapiChart->script() }}
    {{ $dagingAyamRasChart->script() }}
    {{ $telurAyamRasChart->script() }}
    {{ $gulaKonsumsiChart->script() }}
    {{ $minyakGorengKemasanChart->script() }}
    {{ $tepungTeriguCurahChart->script() }}
    {{ $minyakGorengCurahChart->script() }}
    {{ $jagungPipilanChart->script() }}
    {{ $ikanKembungChart->script() }}
    {{ $ikanTongkolChart->script() }}
    {{ $ikanBandengChart->script() }}
    {{ $garamChart->script() }}
    {{ $tepungTeriguNonCurahChart->script() }}
@endpush