<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditi;
use Carbon\Carbon;
use App\Charts\BerasPremiumChart;
use App\Charts\BerasMediumChart;
use App\Charts\KedelaiChart;
use App\Charts\BawangMerahChart;
use App\Charts\BawangPutihChart;
use App\Charts\CabaiMerahKeritingChart;
use App\Charts\CabaiRawitMerahChart;
use App\Charts\DagingSapiChart;
use App\Charts\DagingAyamRasChart;
use App\Charts\GaramChart;
use App\Charts\GulaKonsumsiChart;
use App\Charts\IkanBandengChart;
use App\Charts\IkanKembungChart;
use App\Charts\IkanTongkolChart;
use App\Charts\JagungPipilanChart;
use App\Charts\MinyakGorengCurahChart;
use App\Charts\MinyakGorengKemasanChart;
use App\Charts\TelurAyamRasChart;
use App\Charts\TepungTeriguCurahChart;
use App\Charts\TepungTeriguNonCurahChart;
use App\User;
use DB;

use function Laravel\Prompts\alert;

class WelcomeController extends Controller
{
    public function index(BerasPremiumChart $berasPremiumChart, BerasMediumChart $berasMediumChart, KedelaiChart $kedelaiChart, BawangMerahChart $bawangMerahChart,
                           BawangPutihChart $bawangPutihChart, CabaiMerahKeritingChart $cabaiMerahKeritingChart, CabaiRawitMerahChart $cabaiRawitMerahChart,
                           DagingSapiChart $dagingSapiChart, DagingAyamRasChart $dagingAyamRasChart, TelurAyamRasChart $telurAyamRasChart,
                           GulaKonsumsiChart $gulaKonsumsiChart, MinyakGorengKemasanChart $minyakGorengKemasanChart, TepungTeriguCurahChart $tepungTeriguCurahChart,
                           MinyakGorengCurahChart $minyakGorengCurahChart, JagungPipilanChart $jagungPipilanChart, IkanBandengChart $ikanBandengChart, IkanKembungChart $ikanKembungChart,
                           IkanTongkolChart $ikanTongkolChart, GaramChart $garamChart, TepungTeriguNonCurahChart $tepungTeriguNonCurahChart,
                           )
    {
        $date_now        = Carbon::now();
        $date_yesterday  = Carbon::yesterday();
        $harga_hari_ini = Komoditi::whereDate('tanggal', '=', $date_now)->first();
        $harga_kemarin  = Komoditi::whereDate('tanggal', '=', $date_yesterday)->first();

        //Chart
        $berasPremiumChart  = $berasPremiumChart->build();
        $berasMediumChart   = $berasMediumChart->build();
        $kedelaiChart       = $kedelaiChart->build();
        $bawangMerahChart   = $bawangMerahChart->build();
        $bawangPutihChart   = $bawangPutihChart->build();
        $cabaiMerahKeritingChart   = $cabaiMerahKeritingChart->build();
        $cabaiRawitMerahChart      = $cabaiRawitMerahChart->build();
        $dagingSapiChart           = $dagingSapiChart->build();
        $dagingAyamRasChart      = $dagingAyamRasChart->build();
        $telurAyamRasChart       = $telurAyamRasChart->build();
        $gulaKonsumsiChart       = $gulaKonsumsiChart->build();
        $minyakGorengKemasanChart  = $minyakGorengKemasanChart->build();
        $tepungTeriguCurahChart    = $tepungTeriguCurahChart->build();
        $minyakGorengCurahChart    = $minyakGorengCurahChart->build();
        $jagungPipilanChart        = $jagungPipilanChart->build();
        $ikanKembungChart        = $ikanKembungChart->build();
        $ikanBandengChart        = $ikanBandengChart->build();
        $ikanTongkolChart        = $ikanTongkolChart->build();
        $garamChart        = $garamChart->build();
        $tepungTeriguNonCurahChart        = $tepungTeriguNonCurahChart->build();


        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        if(is_null($harga_hari_ini)) {
            $beras_premium  =0;
            $beras_medium   =0;
            $kedelai        =0;
            $bawang_merah   =0;
            $bawang_putih   =0;
            $cabai_merah_keriting   =0;
            $cabai_rawit_merah      =0;
            $daging_sapi        =0;
            $daging_ayam_ras    =0;
            $telur_ayam_ras     =0;
            $gula_konsumsi      =0;
            $minyak_goreng_kemasan  =0;
            $tepung_terigu_curah    =0;
            $minyak_goreng_curah    =0;
            $jagung_pipilan     =0;
            $ikan_kembung       =0;
            $ikan_tongkol       =0;
            $ikan_bandeng       =0;
            $garam              =0;
            $tepung_terigu_non_curah =0;

        } else {
            $beras_premium = $harga_hari_ini->beras_premium - $harga_kemarin->beras_premium;
            $beras_medium  = $harga_hari_ini->beras_medium  - $harga_kemarin->beras_medium ;
            $kedelai       = $harga_hari_ini->kedelai  - $harga_kemarin->kedelai ;
            $bawang_merah  = $harga_hari_ini->bawang_merah  - $harga_kemarin->bawang_merah ;
            $bawang_putih  = $harga_hari_ini->bawang_putih  - $harga_kemarin->bawang_putih ;
            $cabai_merah_keriting  = $harga_hari_ini->cabai_merah_keriting  - $harga_kemarin->cabai_merah_keriting ;
            $cabai_rawit_merah  = $harga_hari_ini->cabai_rawit_merah  - $harga_kemarin->cabai_rawit_merah ;
            $daging_sapi        = $harga_hari_ini->daging_sapi  - $harga_kemarin->daging_sapi ;
            $daging_ayam_ras    = $harga_hari_ini->daging_ayam_ras  - $harga_kemarin->daging_ayam_ras ;
            $telur_ayam_ras     = $harga_hari_ini->telur_ayam_ras  - $harga_kemarin->telur_ayam_ras ;
            $gula_konsumsi      = $harga_hari_ini->gula_konsumsi  -  $harga_kemarin->gula_konsumsi ;
            $minyak_goreng_kemasan      = $harga_hari_ini->minyak_goreng_kemasan  -  $harga_kemarin->minyak_goreng_kemasan ;
            $tepung_terigu_curah        = $harga_hari_ini->tepung_terigu_curah    -  $harga_kemarin->tepung_terigu_curah   ;
            $minyak_goreng_curah        = $harga_hari_ini->minyak_goreng_curah    -  $harga_kemarin->minyak_goreng_curah   ;
            $jagung_pipilan             = $harga_hari_ini->jagung_pipilan    -  $harga_kemarin->jagung_pipilan   ;
            $ikan_kembung               = $harga_hari_ini->ikan_kembung    -  $harga_kemarin->ikan_kembung   ;
            $ikan_tongkol               = $harga_hari_ini->ikan_tongkol    -  $harga_kemarin->ikan_tongkol   ;
            $ikan_bandeng               = $harga_hari_ini->ikan_bandeng    -  $harga_kemarin->ikan_bandeng   ;
            $garam                      = $harga_hari_ini->garam    -  $harga_kemarin->garam   ;
            $tepung_terigu_non_curah    = $harga_hari_ini->tepung_terigu_non_curah    -  $harga_kemarin->tepung_terigu_non_curah   ;
            
        }

        //beras premium
        if ($beras_premium >0){
            $span_class_premium = "danger";
            $i_class_premium    = "fa-arrow-up";
        } elseif ($beras_premium == 0){
            $span_class_premium = "primary";
            $i_class_premium    = "fa-minus";
        } else {
            $span_class_premium = "success";
            $i_class_premium    = "fa-arrow-down";
        }

        //beras medium
        if ($beras_medium >0){
            $span_class_medium = "danger";
            $i_class_medium    = "fa-arrow-up";
        } elseif ($beras_medium == 0){
            $span_class_medium = "primary";
            $i_class_medium    = "fa-minus";
        } else {
            $span_class_medium = "success";
            $i_class_medium    = "fa-arrow-down";
        }

        //kedelai
        if ($kedelai >0){
            $span_class_kedelai = "danger";
            $i_class_kedelai    = "fa-arrow-up";
        } elseif ($kedelai == 0){
            $span_class_kedelai = "primary";
            $i_class_kedelai    = "fa-minus";
        } else {
            $span_class_kedelai = "success";
            $i_class_kedelai    = "fa-arrow-down";
        }

        //bawang merah
        if ($bawang_merah >0){
            $span_class_bawang_merah = "danger";
            $i_class_bawang_merah    = "fa-arrow-up";
        } elseif ($bawang_merah == 0){
            $span_class_bawang_merah = "primary";
            $i_class_bawang_merah    = "fa-minus";
        } else {
            $span_class_bawang_merah = "success";
            $i_class_bawang_merah    = "fa-arrow-down";
        }

        //bawang putih
        if ($bawang_putih >0){
            $span_class_bawang_putih = "danger";
            $i_class_bawang_putih    = "fa-arrow-up";
        } elseif ($bawang_putih == 0){
            $span_class_bawang_putih = "primary";
            $i_class_bawang_putih    = "fa-minus";
        } else {
            $span_class_bawang_putih = "success";
            $i_class_bawang_putih    = "fa-arrow-down";
        }

        //cabai merah keriting
        if ($cabai_merah_keriting >0){
            $span_class_cabai_merah_keriting = "danger";
            $i_class_cabai_merah_keriting    = "fa-arrow-up";
        } elseif ($cabai_merah_keriting == 0){
            $span_class_cabai_merah_keriting = "primary";
            $i_class_cabai_merah_keriting    = "fa-minus";
        } else {
            $span_class_cabai_merah_keriting = "success";
            $i_class_cabai_merah_keriting    = "fa-arrow-down";
        }

        //cabai rawit merah
        if ($cabai_rawit_merah >0){
            $span_class_cabai_rawit_merah = "danger";
            $i_class_cabai_rawit_merah    = "fa-arrow-up";
        } elseif ($cabai_rawit_merah == 0){
            $span_class_cabai_rawit_merah = "primary";
            $i_class_cabai_rawit_merah    = "fa-minus";
        } else {
            $span_class_cabai_rawit_merah = "success";
            $i_class_cabai_rawit_merah    = "fa-arrow-down";
        }

        //daging sapi
        if ($daging_sapi >0){
            $span_class_daging_sapi = "danger";
            $i_class_daging_sapi    = "fa-arrow-up";
        } elseif ($daging_sapi == 0){
            $span_class_daging_sapi = "primary";
            $i_class_daging_sapi    = "fa-minus";
        } else {
            $span_class_daging_sapi = "success";
            $i_class_daging_sapi    = "fa-arrow-down";
        }

        //daging ayam ras
        if ($daging_ayam_ras >0){
            $span_class_daging_ayam_ras = "danger";
            $i_class_daging_ayam_ras    = "fa-arrow-up";
        } elseif ($daging_ayam_ras == 0){
            $span_class_daging_ayam_ras = "primary";
            $i_class_daging_ayam_ras    = "fa-minus";
        } else {
            $span_class_daging_ayam_ras = "success";
            $i_class_daging_ayam_ras    = "fa-arrow-down";
        }

        //telur ayam ras
        if ($telur_ayam_ras >0){
            $span_class_telur_ayam_ras = "danger";
            $i_class_telur_ayam_ras    = "fa-arrow-up";
        } elseif ($telur_ayam_ras == 0){
            $span_class_telur_ayam_ras = "primary";
            $i_class_telur_ayam_ras    = "fa-minus";
        } else {
            $span_class_telur_ayam_ras = "success";
            $i_class_telur_ayam_ras    = "fa-arrow-down";
        }

        //gula konsumsi
        if ($gula_konsumsi >0){
            $span_class_gula_konsumsi = "danger";
            $i_class_gula_konsumsi    = "fa-arrow-up";
        } elseif ($gula_konsumsi == 0){
            $span_class_gula_konsumsi = "primary";
            $i_class_gula_konsumsi    = "fa-minus";
        } else {
            $span_class_gula_konsumsi = "success";
            $i_class_gula_konsumsi    = "fa-arrow-down";
        }

        //minyak goreng kemasan
        if ($minyak_goreng_kemasan >0){
            $span_class_minyak_goreng_kemasan = "danger";
            $i_class_minyak_goreng_kemasan    = "fa-arrow-up";
        } elseif ($minyak_goreng_kemasan == 0){
            $span_class_minyak_goreng_kemasan = "primary";
            $i_class_minyak_goreng_kemasan    = "fa-minus";
        } else {
            $span_class_minyak_goreng_kemasan = "success";
            $i_class_minyak_goreng_kemasan    = "fa-arrow-down";
        }

        //tepung terigu curah
        if ($tepung_terigu_curah >0){
            $span_class_tepung_terigu_curah = "danger";
            $i_class_tepung_terigu_curah    = "fa-arrow-up";
        } elseif ($tepung_terigu_curah == 0){
            $span_class_tepung_terigu_curah = "primary";
            $i_class_tepung_terigu_curah    = "fa-minus";
        } else {
            $span_class_tepung_terigu_curah = "success";
            $i_class_tepung_terigu_curah    = "fa-arrow-down";
        }

        //minyak_goreng_curah
        if ($minyak_goreng_curah >0){
            $span_class_minyak_goreng_curah = "danger";
            $i_class_minyak_goreng_curah    = "fa-arrow-up";
        } elseif ($minyak_goreng_curah == 0){
            $span_class_minyak_goreng_curah = "primary";
            $i_class_minyak_goreng_curah    = "fa-minus";
        } else {
            $span_class_minyak_goreng_curah = "success";
            $i_class_minyak_goreng_curah    = "fa-arrow-down";
        }

        //jagung_pipilan
        if ($jagung_pipilan >0){
            $span_class_jagung_pipilan = "danger";
            $i_class_jagung_pipilan    = "fa-arrow-up";
        } elseif ($jagung_pipilan == 0){
            $span_class_jagung_pipilan = "primary";
            $i_class_jagung_pipilan    = "fa-minus";
        } else {
            $span_class_jagung_pipilan = "success";
            $i_class_jagung_pipilan    = "fa-arrow-down";
        }

        //ikan_kembung
        if ($ikan_kembung >0){
            $span_class_ikan_kembung = "danger";
            $i_class_ikan_kembung    = "fa-arrow-up";
        } elseif ($ikan_kembung == 0){
            $span_class_ikan_kembung = "primary";
            $i_class_ikan_kembung    = "fa-minus";
        } else {
            $span_class_ikan_kembung = "success";
            $i_class_ikan_kembung    = "fa-arrow-down";
        }

        //ikan_tongkol
        if ($ikan_tongkol >0){
            $span_class_ikan_tongkol = "danger";
            $i_class_ikan_tongkol    = "fa-arrow-up";
        } elseif ($ikan_tongkol == 0){
            $span_class_ikan_tongkol = "primary";
            $i_class_ikan_tongkol    = "fa-minus";
        } else {
            $span_class_ikan_tongkol = "success";
            $i_class_ikan_tongkol    = "fa-arrow-down";
        }

        //ikan_bandeng
        if ($ikan_bandeng >0){
            $span_class_ikan_bandeng = "danger";
            $i_class_ikan_bandeng    = "fa-arrow-up";
        } elseif ($ikan_bandeng == 0){
            $span_class_ikan_bandeng = "primary";
            $i_class_ikan_bandeng    = "fa-minus";
        } else {
            $span_class_ikan_bandeng = "success";
            $i_class_ikan_bandeng    = "fa-arrow-down";
        }

        //garam
        if ($garam >0){
            $span_class_garam = "danger";
            $i_class_garam    = "fa-arrow-up";
        } elseif ($garam == 0){
            $span_class_garam = "primary";
            $i_class_garam    = "fa-minus";
        } else {
            $span_class_garam = "success";
            $i_class_garam    = "fa-arrow-down";
        }

        //tepung_terigu_non_curah
        if ($tepung_terigu_non_curah >0){
            $span_class_tepung_terigu_non_curah = "danger";
            $i_class_tepung_terigu_non_curah    = "fa-arrow-up";
        } elseif ($tepung_terigu_non_curah == 0){
            $span_class_tepung_terigu_non_curah = "primary";
            $i_class_tepung_terigu_non_curah    = "fa-minus";
        } else {
            $span_class_tepung_terigu_non_curah = "success";
            $i_class_tepung_terigu_non_curah    = "fa-arrow-down";
        }
        

        return view('welcome', compact('widget','harga_hari_ini','harga_kemarin','beras_premium','beras_medium','kedelai','bawang_merah',
                                    'span_class_premium','i_class_premium','span_class_medium','i_class_medium','span_class_bawang_merah',
                                    'bawang_putih','span_class_bawang_putih','i_class_bawang_putih',
                                    'span_class_kedelai','i_class_kedelai','i_class_bawang_merah',
                                    'cabai_merah_keriting','span_class_cabai_merah_keriting','i_class_cabai_merah_keriting',
                                    'cabai_rawit_merah','span_class_cabai_rawit_merah','i_class_cabai_rawit_merah',
                                    'daging_sapi','span_class_daging_sapi','i_class_daging_sapi',
                                    'daging_ayam_ras','span_class_daging_ayam_ras','i_class_daging_ayam_ras',
                                    'telur_ayam_ras','span_class_telur_ayam_ras','i_class_telur_ayam_ras',
                                    'gula_konsumsi','span_class_gula_konsumsi','i_class_gula_konsumsi',
                                    'minyak_goreng_kemasan','span_class_minyak_goreng_kemasan','i_class_minyak_goreng_kemasan',
                                    'tepung_terigu_curah','span_class_tepung_terigu_curah','i_class_tepung_terigu_curah',
                                    'minyak_goreng_curah','span_class_minyak_goreng_curah','i_class_minyak_goreng_curah',
                                    'jagung_pipilan','span_class_jagung_pipilan','i_class_jagung_pipilan',
                                    'ikan_kembung','span_class_ikan_kembung','i_class_ikan_kembung',
                                    'ikan_tongkol','span_class_ikan_tongkol','i_class_ikan_tongkol',
                                    'ikan_bandeng','span_class_ikan_bandeng','i_class_ikan_bandeng',
                                    'garam','span_class_garam','i_class_garam',
                                    'tepung_terigu_non_curah','span_class_tepung_terigu_non_curah','i_class_tepung_terigu_non_curah',
                                    'berasPremiumChart','berasMediumChart','kedelaiChart','bawangMerahChart','bawangPutihChart',
                                    'cabaiMerahKeritingChart','cabaiRawitMerahChart','dagingSapiChart','dagingAyamRasChart','telurAyamRasChart',
                                    'gulaKonsumsiChart','minyakGorengKemasanChart', 'tepungTeriguCurahChart','minyakGorengCurahChart',
                                    'jagungPipilanChart','ikanKembungChart','ikanBandengChart','ikanTongkolChart','garamChart','tepungTeriguNonCurahChart'
                                    
                    ));
    }

    public function harga_eceran()
    {

        $date = Carbon::now()->subdays(6);
        //dd($tes);
        if (!request()->start_date){
            $komoditas = Komoditi::whereDate('tanggal', '>=', $date)->get();
        } elseif (!request()->end_date) {
            alert('Input tanggal akhir');
            $komoditas = Komoditi::whereDate('tanggal', '>=', $date)->get();
        }        
        else{
            $komoditas = Komoditi::orderBy('tanggal','ASC')
            ->when(request()->start_date, function($komoditas){
                $komoditas->whereDate('tanggal', '>=', request()->start_date)
                    ->whereDate('tanggal', '<=', request()->end_date);
            })
            ->get();
        };

        return view('front.harga-eceran', compact('komoditas'));
    }

    public function perkembangan_harga()
    {
        $cari = request()->jenis_komoditas;

        switch(request()->jenis_komoditas) {
            case('beras_premium'):
                $komoditas = "Beras Premium";
                break;
            case('beras_medium'):
                $komoditas = "Beras Medium";                
                break;
            case('kedelai'):
                $komoditas = "Kedelai Biji Kering (Import)";                
                break;
            case('bawang_merah'):
                $komoditas = "Bawang Merah";                
                break;
            case('bawang_putih'):
                $komoditas = "Bawang Putih";                
                break;
            case('cabai_merah_keriting'):
                $komoditas = "Cabai Merah Keriting";                
                break;
            case('cabai_rawit_merah'):
                $komoditas = "Cabai Rawit Merah";                
                break;
            case('daging_sapi'):
                $komoditas = "Daging Sapi";                
                break;
            case('daging_ayam_ras'):
                $komoditas = "Daging Ayam Ras";                
                break;
            case('telur_ayam_ras'):
                $komoditas = "Telur Ayam Ras";                
                break;
            case('gula_konsumsi'):
                $komoditas = "Gula Konsumsi";                
                break;
            case('minyak_goreng_kemasan'):
                $komoditas = "Minyak Goreng Kemasan";                
                break;
            case('tepung_terigu_curah'):
                $komoditas = "Tepung Terigu Curah";                
                break;
            case('minyak_goreng_curah'):
                $komoditas = "Minyak Goreng Curah";                
                break;
            case('jagung_pipilan'):
                $komoditas = "Jagung Pipilan";                
                break;
            case('ikan_kembung'):
                $komoditas = "Ikan Kembung";                
                break;
            case('ikan_tongkol'):
                $komoditas = "Ikan Tongkol";                
                break;
            case('ikan_kembung'):
                $komoditas = "Ikan Kembung";                
                break;
            case('ikan_bandeng'):
                $komoditas = "Ikan Bandeng";                
                break;
            case('garam'):
                $komoditas = "Garam Beryodium";                
                break;
            case('tepung_terigu_non_curah'):
                $komoditas = "Tepung Terigu Non Curah";                
                break;
            default:
                $komoditas = 'Beras Premium';
        }

        $date   = Carbon::now()->subdays(29);
        $date2  = Carbon::now();
        $tahun_ini      = Carbon::now()->format('Y');
        $tahun_kemarin  = $date2->subYear()->format('Y');

        if (!request()->jenis_komoditas){
            $cari = 'beras_premium';
            $data['berasPremium_30']   = Komoditi::whereDate('tanggal', '>=', $date)->orderBy('tanggal','ASC')->pluck('beras_premium');
            $data['tanggal_30']        = Komoditi::whereDate('tanggal', '>=', $date)->orderBy('tanggal','ASC')->pluck('tanggal');
    
            $data['berasPremium2023'] = Komoditi::select(DB::raw("CAST(AVG(beras_premium) as int) as rata_bulan"))
                            ->whereYear('tanggal',$tahun_kemarin)
                            ->GroupBy(DB::raw("Month(tanggal)"))
                            ->orderBy(DB::raw("Month(tanggal)"), 'ASC')
                            ->pluck('rata_bulan');
            
            $data['berasPremium2024'] = Komoditi::select(DB::raw("CAST(AVG(beras_premium) as int) as rata_bulan"))
                            ->whereYear('tanggal',$tahun_ini)
                            ->GroupBy(DB::raw("Month(tanggal)"))
                            ->orderBy(DB::raw("Month(tanggal)"), 'ASC')
                            ->pluck('rata_bulan');
        } else {
            $data['berasPremium_30']   = Komoditi::whereDate('tanggal', '>=', $date)->orderBy('tanggal','ASC')->pluck($cari);
            $data['tanggal_30']        = Komoditi::whereDate('tanggal', '>=', $date)->orderBy('tanggal','ASC')->pluck('tanggal');
    
            $data['berasPremium2023'] = Komoditi::select(DB::raw("CAST(AVG($cari) as int) as rata_bulan"))
                            ->whereYear('tanggal',$tahun_kemarin)
                            ->GroupBy(DB::raw("Month(tanggal)"))
                            ->orderBy(DB::raw("Month(tanggal)"), 'ASC')
                            ->pluck('rata_bulan');
            
            $data['berasPremium2024'] = Komoditi::select(DB::raw("CAST(AVG($cari) as int) as rata_bulan"))
                            ->whereYear('tanggal',$tahun_ini)
                            ->GroupBy(DB::raw("Month(tanggal)"))
                            ->orderBy(DB::raw("Month(tanggal)"), 'ASC')
                            ->pluck('rata_bulan');
        };


        return view('front.perkembangan-harga', $data, compact('komoditas'));
    }

    
}
