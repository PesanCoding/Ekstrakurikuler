<?php

namespace App\Charts;

use App\Models\Ekskul;
use App\Models\Pendaftaran;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardAdminChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $chartData = [];
        $Datakskul = Pendaftaran::where('status_pendaftran', '=', 'setuju')->with('ekskul')->get();
        $dataId = $Datakskul->pluck('id_ekskul')->toArray();
        $dataId = array_unique($dataId);
        foreach ($dataId as $id_ekskul) {
            $jumlah_pendaftaran[$id_ekskul] = Pendaftaran::whereHas('ekskul', function ($query) use ($id_ekskul) {
                $query->where('id_ekskul', $id_ekskul);
            })->count();

            $chartData[] = [
                'id_ekskul' => $id_ekskul,
                'jumlah_pendaftaran' => $jumlah_pendaftaran[$id_ekskul],
            ];
        }
        $ekskulNames = Ekskul::whereIn('id', $dataId)->pluck('nama_ekskul')->toArray();
        $chartLabels = $ekskulNames;
        $chartValues = array_values($jumlah_pendaftaran);

        return $this->chart->pieChart()
            ->setTitle('Data Siswa yang mengikuti Kegiata Ekskul')
            ->setSubtitle('Tahun 2024.')
            ->addData($chartValues)
            ->setLabels($chartLabels)
            ->setDataLabels(true)
            ->setWidth(400)
            ->setheight(400);
    }
}
