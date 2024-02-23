<?php

namespace App\Imports;

use App\Komoditi;
use Maatwebsite\Excel\Concerns\ToModel;

class KomoditiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row[20]);

        return new Komoditi([
            'user_id'    => $row[0],
            'tanggal'    => \Carbon\Carbon::parse($row['1']),
            'beras_premium'   =>$row[2],
            'beras_medium'    =>$row[3],
            'kedelai'         =>$row[4],
            'bawang_merah'    =>$row[5],
            'bawang_putih'    =>$row[6],
            'cabai_merah_keriting'  =>$row[7],
            'cabai_rawit_merah'     =>$row[8],
            'daging_sapi'           =>$row[9],
            'daging_ayam_ras'       =>$row[10],
            'telur_ayam_ras'        =>$row[11],
            'gula_konsumsi'         =>$row[12],
            'minyak_goreng_kemasan' =>$row[13],
            'tepung_terigu_curah'    =>$row[14],
            'minyak_goreng_curah'    =>$row[15],
            'jagung_pipilan'            =>$row[16],
            'ikan_kembung'              =>$row[17],
            'ikan_tongkol'              =>$row[18],
            'ikan_bandeng'              =>$row[19],
            'garam'                     =>$row[20],
            'tepung_terigu_non_curah'   =>$row[21]
        ]);
    }
}
