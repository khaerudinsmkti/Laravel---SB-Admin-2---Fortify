<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use App\Komoditi;


class DashboardChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $date       = Carbon::now()->subdays(10);
        $komoditas  = Komoditi::all();
        //$komoditas->where('tanggal','>=',$date)->pluck('beras_premium'),

        $tanggal        = $komoditas->where('tanggal','>=',$date)->pluck('tanggal')->toArray();
        $beras_premium  = $komoditas->where('tanggal','>=',$date)->pluck('beras_premium')->toArray();

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
        
        $bulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];

        return $this->chart->AreaChart()
        ->setTitle('Beras Premium')
        ->setSubtitle('10 Hari Terahir')
        ->addData('2023', $beras_2023 )
        ->addData('2024', $beras_2024 )
        ->setXAxis($bulan)
        ->setColors(['#FFC107', '#303F9F'])
        ->setHeight(258)
        ->setMarkers(['#FF5722', '#E040FB'], 0, 8);
    }
}
