@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Harga Pangan</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahdata"><i
                class="fas fa-plus fa-sm text-white-50" ></i> Add Data</a>
    </div>
    @include('komoditas.create')
    @push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning border-left-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @endpush

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('komoditas.index') }}" method="get">
                            <div class="row pb-3">
                                <div class="col-md-5 pt-4">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import">
                                        Import
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Start Date</label>
                                    <input type="date" name="start_date" id="time" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="">End Date</label>
                                    <input type="date" name="end_date" id="" class="form-control">
                                </div>
                                <div class="col-md-1 pt-4">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="button-action" style="margin-bottom: 20px">

                            {{-- <a href="" class="btn btn-primary btn-md">EXPORT</a> --}}
                        </div>
                    </div>
                    <div class="table-responsive ">
                        <table class="table table-bordered table-stripped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Beras Premium</th>
                                    <th>Beras Medium</th>
                                    <th>Kedelai Import</th>
                                    <th>Cabai Rawit Merah</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    
                                    @foreach ($komoditas as $no =>$data)
                                    <tr>
                                        <td>{{ ++$no + ($komoditas->currentPage()-1) * $komoditas->perPage() }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                                        <td>{{ number_format($data->beras_premium,0,',','.') }}</td>
                                        <td>{{ number_format($data->beras_medium,0,',','.') }}</td>
                                        <td>{{ number_format($data->kedelai,0,',','.') }}</td>
                                        <td>{{ number_format($data->cabai_rawit_merah,0,',','.') }}</td>
                                        <td>
                                            <form action="{{ route('komoditas.destroy', $data->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ShowKomoditas<?php echo $data->id ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm delete-link" onclick="return confirm('Kamu yakin mau menghapus data tanggal {{ date('d-m-Y', strtotime($data->tanggal)) }} ini ?')"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @include('komoditas.show')
                                    @endforeach
                            </tbody>
                        </table>
                        <br> 
                    </div>
                    {{ $komoditas->links() }}
                </div>

            </div>

        </div>

    </div>

<!-- modal -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('komoditas.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">IMPORT</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('#tooltip').tooltip('show')
    </script>
@endpush

