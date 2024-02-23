<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
	            <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('komoditas.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control" name="tanggal" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="beras_premium" class="col-sm-5 col-form-label">Beras Premium</label>
                        <div class="col-sm-7">
                          <input type="number" name="beras_premium" class="form-control" placeholder="Min 10.000 max 25.000">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="beras_medium" class="col-sm-5 col-form-label">Beras Medium</label>
                        <div class="col-sm-7">
                          <input type="number" name="beras_medium" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kedelai" class="col-sm-5 col-form-label">Kedelai</label>
                        <div class="col-sm-7">
                          <input type="number" name="kedelai" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bawang_merah" class="col-sm-5 col-form-label">Bawang Merah</label>
                        <div class="col-sm-7">
                          <input type="number" name="bawang_merah" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bawang_putih" class="col-sm-5 col-form-label">Bawang Putih</label>
                        <div class="col-sm-7">
                          <input type="number" name="bawang_putih" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cabai_merah_keriting" class="col-sm-5 col-form-label">Cabai Merah Keriting</label>
                        <div class="col-sm-7">
                          <input type="number" name="cabai_merah_keriting" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cabai_rawit_merah" class="col-sm-5 col-form-label">Cabai Rawit Merah</label>
                        <div class="col-sm-7">
                          <input type="number" name="cabai_rawit_merah" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="daging_sapi" class="col-sm-5 col-form-label">Daging Sapi</label>
                        <div class="col-sm-7">
                          <input type="number" name="daging_sapi" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="daging_ayam_ras" class="col-sm-5 col-form-label">Daging Ayam Ras</label>
                        <div class="col-sm-7">
                          <input type="number" name="daging_ayam_ras" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telur_ayam_ras" class="col-sm-5 col-form-label">Telur Ayam Ras</label>
                        <div class="col-sm-7">
                          <input type="number" name="telur_ayam_ras" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gula_konsumsi" class="col-sm-5 col-form-label">Gula Konsumsi</label>
                        <div class="col-sm-7">
                          <input type="number" name="gula_konsumsi" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="minyak_goreng_kemasan" class="col-sm-5 col-form-label">Minyak Goreng Kemasan</label>
                        <div class="col-sm-7">
                          <input type="number" name="minyak_goreng_kemasan" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="tepung_terigu_curah" class="col-sm-5 col-form-label">Tepung Terigu Curah</label>
                      <div class="col-sm-7">
                        <input type="number" name="tepung_terigu_curah" class="form-control" value="">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="minyak_goreng_curah" class="col-sm-5 col-form-label">Minyak Goreng Curah</label>
                        <div class="col-sm-7">
                          <input type="number" name="minyak_goreng_curah" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jagung_pipilan" class="col-sm-5 col-form-label">Jagung Pipilan</label>
                        <div class="col-sm-7">
                          <input type="number" name="jagung_pipilan" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ikan_kembung" class="col-sm-5 col-form-label">Ikan Kembung</label>
                        <div class="col-sm-7">
                          <input type="number" name="ikan_kembung" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ikan_tongkol" class="col-sm-5 col-form-label">Ikan Tongkol</label>
                        <div class="col-sm-7">
                          <input type="number" name="ikan_tongkol" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ikan_bandeng" class="col-sm-5 col-form-label">Ikan Bandeng</label>
                        <div class="col-sm-7">
                          <input type="number" name="ikan_bandeng" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="garam" class="col-sm-5 col-form-label">Garam</label>
                        <div class="col-sm-7">
                          <input type="number" name="garam" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tepung_terigu_non_curah" class="col-sm-5 col-form-label">Tepung Terigu Non Curah</label>
                        <div class="col-sm-7">
                          <input type="number" name="tepung_terigu_non_curah" class="form-control" value="">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <div class="btn-group">
                                {{-- <button type="submit" class="btn btn-info">Simpan</button> --}}
                                <button type="submit" class="btn btn-success">Simpan</button>&nbsp; &nbsp;
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="clearfix"></div> --}}

                </form>
            </div>
        </div>
    </div>
</div>