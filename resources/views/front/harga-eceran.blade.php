@extends('layouts.front')

@push('css')
    <style type="text/css">
        tr:first-child, td:first-child
        {
            position:sticky;
            left:0px;
            z-index: 1;
        }
        tr:nth-child(odd) > td{
            background-color: #AAB1BA;
        }
        tr:nth-child(even) > td{
            background-color: #ffffff;
        }
        tr:nth-child(odd) > th{
            background-color: #d7d7d7;
        }

        table.table tr th{background-color: #AF1010 !important;}
    </style>
@endpush

@section('main-content')
<hr>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <h1 class="h3 font-weight-bold mt-4 mb-4">{{ __('Perkembangan Harga Pangan') }}</h1>
        <div class="card shadow mb-5">
            <div class="container">
                <form action="{{ route('harga.eceran') }}" method="get">
                    <div class="row pb-3 mt-3">
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Start Date</span>
                                </div>
                                <input type="date" class="form-control" name="start_date" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">End Date</span>
                                </div>
                                <input type="date" class="form-control" name="end_date" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <button class="btn btn-primary" type="submit">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-hover ml-3 mr-3 mb-3 ">
                    <thead>
                        <tr>
                            <th class="text-white">Komoditas (Rp)</th>
                            @foreach ($komoditas as $data)
                                <th class="text-white text-right">{{ \Carbon\Carbon::parse($data->tanggal)->format('d/m/Y') }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>Beras Premium </b></td>
                            @foreach ($komoditas as $key => $value) 
                            <td class="text-md-right">{{ number_format($value->beras_premium,0,',','.') }}</td>
                        @endforeach
                        </tr>                       
                        <tr>
                            <td><b>Beras Medium</b></td>
                            @foreach ($komoditas as $key => $value) 
                                <td class="text-md-right">{{ number_format($value->beras_medium,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Kedelai</b></td>
                            @foreach ($komoditas as $key => $value)
                                <td class="text-md-right">{{ number_format($value->kedelai,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Bawang Merah</b></td>
                            @foreach ($komoditas as $key => $value)
                                <td class="text-md-right">{{ number_format($value->bawang_merah,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Bawang Putih</b></td>
                            @foreach ($komoditas as $key => $value)
                                <td class="text-md-right">{{ number_format($value->bawang_putih,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Cabai Merah Keriting</b></td>
                            @foreach ($komoditas as $key => $value)
                                <td class="text-md-right">{{ number_format($value->cabai_merah_keriting,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Cabai Rawit Merah</b></td>
                            @foreach ($komoditas as $key => $value) 
                                <td class="text-md-right">{{ number_format($value->cabai_rawit_merah,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Daging Sapi</b></td>
                            @foreach ($komoditas as $key => $value)
                                <td class="text-md-right">{{ number_format($value->daging_sapi,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Daging Ayam Ras</b></td>
                            @foreach ($komoditas as $key => $value)
                                <td class="text-md-right">{{ number_format($value->daging_ayam_ras,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Telur Ayam Ras</b></td>
                            @foreach ($komoditas as $key => $value)
                                <td class="text-md-right">{{ number_format($value->telur_ayam_ras,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Gula Konsumsi</b></td>
                            @foreach ($komoditas as $key => $value) 
                                <td class="text-md-right">{{ number_format($value->gula_konsumsi,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Minyak Goreng Kemasan</b></td>
                            @foreach ($komoditas as $key => $value)
                                <td class="text-md-right">{{ number_format($value->minyak_goreng_kemasan,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Tepung Terigu Curah</b></td>
                            @foreach ($komoditas as $key => $value) 
                                <td class="text-md-right">{{ number_format($value->tepung_terigu_curah,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Minyak Goreng Curah</b></td>
                            @foreach ($komoditas as $key => $value)
                                <td class="text-md-right">{{ number_format($value->minyak_goreng_curah,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Jagung Pipilan</b></td>
                            @foreach ($komoditas as $key => $value) 
                                <td class="text-md-right">{{ number_format($value->jagung_pipilan,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Ikan Kembung</b></td>
                            @foreach ($komoditas as $key => $value) 
                                <td class="text-md-right">{{ number_format($value->ikan_kembung,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Ikan Tongkol</b></td>
                            @foreach ($komoditas as $key => $value) 
                                <td class="text-md-right">{{ number_format($value->ikan_tongkol,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Ikan Bandeng</b></td>
                            @foreach ($komoditas as $key => $value)
                                <td class="text-md-right">{{ number_format($value->ikan_bandeng,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Garam Beryodium</b></td>
                            @foreach ($komoditas as $key => $value) 
                                <td class="text-md-right">{{ number_format($value->garam,0,',','.') }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><b>Tepung Terigu Non Curah</b></td>
                            @foreach ($komoditas as $key => $value) 
                                <td class="text-md-right">{{ number_format($value->tepung_terigu_non_curah,0,',','.') }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
@endsection