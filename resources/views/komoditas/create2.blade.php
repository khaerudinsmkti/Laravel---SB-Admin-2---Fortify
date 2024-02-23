@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Input Harga') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('komoditas.store') }}" method="post">
                @csrf

                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" class="form-control @error('name') is-invalid @enderror" name="tanggal" id="tanggal" placeholder="Pilih tanggal" autocomplete="off" value="{{ old('tanggal') }}">
                  @error('tanggal')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="beras_premium"><b>Beras Premium</b> | satuan Rp./Kg, minimal 9500, maksimal 35000</label>
                  <input type="number" class="form-control @error('beras_premium') is-invalid @enderror" name="beras_premium" id="beras_premium" value="{{ old('beras_premium') }}">
                  @error('beras_premium')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="beras_medium"><b>Beras Medium</b>| satuan Rp./Kg, minimal 8500, maksimal 30000</label>
                    <input type="number" class="form-control @error('beras_medium') is-invalid @enderror" name="beras_medium" id="beras_medium" value="{{ old('beras_medium') }}">
                    @error('beras_medium')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kedelai">Kedelai Biji Kering (impor)</label>
                    <input type="number" class="form-control @error('kedelai') is-invalid @enderror" name="kedelai" id="kedelai" value="{{ old('kedelai') }}">
                    @error('kedelai')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bawang_merah">Bawang Merah</label>
                    <input type="number" class="form-control @error('bawang_merah') is-invalid @enderror" name="bawang_merah" id="bawang_merah" value="{{ old('bawang_merah') }}">
                    @error('bawang_merah')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bawang_putih">Bawang Putih</label>
                    <input type="number" class="form-control @error('bawang_putih') is-invalid @enderror" name="bawang_putih" id="bawang_putih" value="{{ old('bawang_putih') }}">
                    @error('bawang_putih')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cabai_merah_keriting">Cabai Merah Keriting</label>
                    <input type="number" class="form-control @error('cabai_merah_keriting') is-invalid @enderror" name="cabai_merah_keriting" id="cabai_merah_keriting" value="{{ old('cabai_merah_keriting') }}">
                    @error('cabai_merah_keriting')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cabai_rawit_merah">Cabai Rawit Merah</label>
                    <input type="number" class="form-control @error('cabai_rawit_merah') is-invalid @enderror" name="cabai_rawit_merah" id="cabai_rawit_merah" value="{{ old('cabai_rawit_merah') }}">
                    @error('cabai_rawit_merah')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="daging_sapi">Daging Sapi</label>
                    <input type="number" class="form-control @error('daging_sapi') is-invalid @enderror" name="daging_sapi" id="daging_sapi" value="{{ old('daging_sapi') }}">
                    @error('daging_sapi')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="daging_ayam_ras">Daging Ayam Ras</label>
                    <input type="number" class="form-control @error('daging_ayam_ras') is-invalid @enderror" name="daging_ayam_ras" id="daging_ayam_ras" value="{{ old('daging_ayam_ras') }}">
                    @error('daging_ayam_ras')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telur_ayam_ras">Telur Ayam Ras</label>
                    <input type="number" class="form-control @error('telur_ayam_ras') is-invalid @enderror" name="telur_ayam_ras" id="telur_ayam_ras" value="{{ old('telur_ayam_ras') }}">
                    @error('telur_ayam_ras')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gula_konsumsi">Gula Pasir Konsumsi</label>
                    <input type="number" class="form-control @error('gula_konsumsi') is-invalid @enderror" name="gula_konsumsi" id="gula_konsumsi" value="{{ old('gula_konsumsi') }}">
                    @error('gula_konsumsi')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="minyak_goreng_kemasan">Minyak Goreng Kemasan</label>
                    <input type="number" class="form-control @error('minyak_goreng_kemasan') is-invalid @enderror" name="minyak_goreng_kemasan" id="minyak_goreng_kemasan" value="{{ old('minyak_goreng_kemasan') }}">
                    @error('minyak_goreng_kemasan')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tepung_terigu_curah">Tepung Terigu Curah</label>
                    <input type="number" class="form-control @error('tepung_terigu_curah') is-invalid @enderror" name="tepung_terigu_curah" id="tepung_terigu_curah" value="{{ old('tepung_terigu_curah') }}">
                    @error('tepung_terigu_curah')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="minyak_goreng_curah">Minyak Goreng Curah</label>
                    <input type="number" class="form-control @error('minyak_goreng_curah') is-invalid @enderror" name="minyak_goreng_curah" id="minyak_goreng_curah" value="{{ old('minyak_goreng_curah') }}">
                    @error('minyak_goreng_curah')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jagung_pipilan">Jagung Tingkat Peternak</label>
                    <input type="number" class="form-control @error('jagung_pipilan') is-invalid @enderror" name="jagung_pipilan" id="jagung_pipilan" value="{{ old('jagung_pipilan') }}">
                    @error('jagung_pipilan')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="ikan_kembung">Ikan Kembung</label>
                  <input type="number" class="form-control @error('ikan_kembung') is-invalid @enderror" name="ikan_kembung" id="ikan_kembung" value="{{ old('ikan_kembung') }}">
                  @error('ikan_kembung')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="ikan_tongkol">Ikan Tongkol</label>
                  <input type="number" class="form-control @error('ikan_tongkol') is-invalid @enderror" name="ikan_tongkol" id="ikan_tongkol" value="{{ old('ikan_tongkol') }}">
                  @error('ikan_tongkol')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="ikan_bandeng">Ikan Bandeng</label>
                  <input type="number" class="form-control @error('ikan_bandeng') is-invalid @enderror" name="ikan_bandeng" id="ikan_bandeng" value="{{ old('ikan_bandeng') }}">
                  @error('ikan_bandeng')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="garam">Garam Halus Beryodium</label>
                  <input type="number" class="form-control @error('garam') is-invalid @enderror" name="garam" id="garam" value="{{ old('garam') }}">
                  @error('garam')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tepung_terigu_non_curah">Tepung Terigu Non Curah</label>
                  <input type="number" class="form-control @error('tepung_terigu_non_curah') is-invalid @enderror" name="tepung_terigu_non_curah" id="tepung_terigu_non_curah" value="{{ old('tepung_terigu_non_curah') }}">
                  @error('tepung_terigu_non_curah')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('komoditas.index') }}" class="btn btn-default">Back to komoditas</a>

            </form>
        </div>
    </div>

    <!-- End of Main Content -->
@endsection

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
