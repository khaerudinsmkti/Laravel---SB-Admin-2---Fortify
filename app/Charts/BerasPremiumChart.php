<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use App\Komoditi;
use DB;

class BerasPremiumChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $date           = Carbon::now()->subdays(10);
        $tahun_ini      = Carbon::now()->format('Y');
        $tahun_kemarin  = $date->subYear()->format('Y');

        $beras_2023 = Komoditi::select(DB::raw("CAST(AVG(beras_premium) as int) as rata_bulan"))
                        ->whereYear('tanggal',$tahun_kemarin)
                        ->GroupBy(DB::raw("Month(tanggal)"))
                        ->orderBy(DB::raw("Month(tanggal)"), 'ASC')
                        ->pluck('rata_bulan')->toArray();
        
        $beras_2024 = Komoditi::select(DB::raw("CAST(AVG(beras_premium) as int) as rata_bulan"))
        ->whereYear('tanggal',$tahun_ini)
        ->GroupBy(DB::raw("Month(tanggal)"))
        ->orderBy(DB::raw("Month(tanggal)"), 'ASC')
        ->pluck('rata_bulan')->toArray();

        //dd($tes);

        return $this->chart->LineChart()
        ->setTitle('Beras Premium')
        ->addData('2023', $beras_2023 )
        ->addData('2024',$beras_2024)
        ->setXAxis(['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'])
        ->setColors(['#FFC107','#303F9F'])
        ->setHeight(258)
        ->setFontColor('#ffffff')
        ->setMarkers(['#FF5722', '#E040FB'], 0, 8);
    }
}
