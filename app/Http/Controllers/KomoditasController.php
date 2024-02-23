<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditi;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Imports\KomoditiImport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class KomoditasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = Carbon::now()->subdays(6);
        
        //dd($tes);
        if (!request()->start_date and !request()->end_date) {
            $komoditas = Komoditi::orderBy('tanggal','DESC')->paginate(10);
        } elseif (request()->start_date and request()->end_date) {
            $komoditas = Komoditi::orderBy('tanggal','ASC')
            ->when(request()->start_date, function($komoditas){
                $komoditas->whereDate('tanggal', '>=', request()->start_date)
                    ->whereDate('tanggal', '<=', request()->end_date);
            })
            ->paginate(366);
        }
        
        elseif (request()->start_date) {
            $komoditas = Komoditi::where('tanggal','=', request()->start_date)->paginate(1);
        } elseif (request()->end_date) {
            $komoditas = Komoditi::where('tanggal','=', request()->end_date)->paginate(1);
        } ;

       // dd( $komoditas->tanggal->format('d-m-Y'));

        //dd($komoditas);

        return view('komoditas.index', compact('komoditas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('komoditas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = 1;
        Komoditi::create([
            'user_id'           => $user,
            'tanggal'           => $request->tanggal,
            'beras_premium'     => $request->beras_premium,
            'beras_medium'      => $request->beras_medium,
            'kedelai'           => $request->kedelai,
            'bawang_merah'      => $request->bawang_merah,
            'bawang_putih'      => $request->bawang_putih,
            'cabai_merah_keriting'      => $request->cabai_merah_keriting,
            'cabai_rawit_merah' => $request->cabai_rawit_merah,
            'daging_sapi'       => $request->daging_sapi,
            'daging_ayam_ras'   => $request->daging_ayam_ras,
            'telur_ayam_ras'    => $request->telur_ayam_ras,
            'gula_konsumsi'     => $request->gula_konsumsi,
            'minyak_goreng_kemasan'     => $request->minyak_goreng_kemasan,
            'tepung_terigu_curah'       => $request->tepung_terigu_curah,
            'minyak_goreng_curah'       => $request->minyak_goreng_curah,
            'jagung_pipilan'    => $request->jagung_pipilan,
            'ikan_kembung'      => $request->ikan_kembung,
            'ikan_tongkol'      => $request->ikan_tongkol,
            'ikan_bandeng'      => $request->ikan_bandeng,
            'garam'             => $request->garam,
            'tepung_terigu_non_curah'   => $request->tepung_terigu_non_curah
            
         ]);

         return redirect()->route('komoditas.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        // $this->validate($request, [
        //     'beras_premium'     => 'required',
        //     'beras_medium'      => 'required',
        //     'kedelai'           => 'required',
        //     'bawang_merah'   => 'required',
        //     'bawang_putih'   => 'required',
        //     'cabai_merah_keriting'    => 'required',
        //     'cabai_rawit_merah'       => 'required',
        //     'daging_sapi'      => 'required',
        //     'daging_ayam_ras'  => 'required',
        //     'telur_ayam_ras'   => 'required',
        //     'gula_konsumsi'    => 'required',
        //     'minyak_goreng_kemasan'  => 'required',
        //     'tepung_terigu_curah'    => 'required',
        //     'minyak_goreng_curah'    => 'required',
        //     'jagung_pipilan'  => 'required',
        //     'ikan_kembung'    => 'required',
        //     'ikan_tongkol'    => 'required',
        //     'ikan_bandeng'    => 'required',
        //     'garam'           => 'required',
        //     'tepung_terigu_non_curah'  => 'required',
        // ]);



        $data     = Komoditi::findOrFail($id);
        $user = 1;

        $data->update([
            'user_id'   => $user,
            'tanggal'   => $request->tanggal,
            'beras_premium'     => $request->beras_premium,
            'beras_medium'      => $request->beras_medium,
            'kedelai'           => $request->kedelai,
            'bawang_merah'   => $request->bawang_merah,
            'bawang_putih'   => $request->bawang_putih,
            'cabai_merah_keriting'    => $request->cabai_merah_keriting,
            'cabai_rawit_merah'       => $request->cabai_rawit_merah,
            'daging_sapi'      => $request->daging_sapi,
            'daging_ayam_ras'  => $request->daging_ayam_ras,
            'telur_ayam_ras'   => $request->telur_ayam_ras,
            'gula_konsumsi'    => $request->gula_konsumsi,
            'minyak_goreng_kemasan'  => $request->minyak_goreng_kemasan,
            'tepung_terigu_curah'    => $request->tepung_terigu_curah,
            'minyak_goreng_curah'    => $request->minyak_goreng_curah,
            'jagung_pipilan'  => $request->jagung_pipilan,
            'ikan_kembung'    => $request->ikan_kembung,
            'ikan_tongkol'    => $request->ikan_tongkol,
            'ikan_bandeng'    => $request->ikan_bandeng,
            'garam'           => $request->garam,
            'tepung_terigu_non_curah'  => $request->tepung_terigu_non_curah,
        ]);

        return redirect( route('komoditas.index'))->with(['success' => 'Komoditas berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komoditas = Komoditi::findOrFail($id);

        $komoditas->delete();

        return redirect( route('komoditas.index'))->with(['success' => 'Data berhasil dihapus']);
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new KomoditiImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return redirect()->route('komoditas.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('komoditas.index')->with(['error' => 'Data Gagal Diimport!']);
        }
    }

    public function filter(Request $request){

        //dd($request);

        $start_date = $request->start_date;
        $end_date   = $request->end_date;

        $komoditas = Komoditi::whereDate('tanggal','>=',$start_date)
                            ->whereDate('tanggal','<=',$end_date)
                            ->get();

        return view('komoditas.index', compact('komoditas'));
    }
}
