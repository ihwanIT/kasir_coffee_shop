<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\penjualan;

class OrdersChart extends Chart
{
    protected $chart;
    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {

        // ================================
        $months = [];
        $totalSales = [];

        // Loop untuk setiap bulan (dalam contoh ini, bulan Januari hingga Desember)
        for ($month = 1; $month <= 12; $month++) {
            $orderCards = penjualan::whereMonth('created_at', $month)->get();
            $total = 0;

            // Hitung total penjualan per bulan
            foreach ($orderCards as $orderCard) {
                $quantities = explode('-', $orderCard->jumlah);

                foreach ($quantities as $quantity) {
                    $total += (int)$quantity;
                }
            }

            // Simpan nama bulan dan total penjualan
            $months[] = date("F", mktime(0, 0, 0, $month, 1));
            $totalSales[] = $total;
        }

        // Siapkan data untuk grafik
        return $this->chart->LineChart()
            ->setTitle('Data penjualan Bulanan')
            ->setSubtitle(date('Y'))
            ->setHeight(200)
            ->setColors(['#ffc63b', '#ff6384', 'black'])
            ->addData('Total Penjualan Bulanan', $totalSales) // Menggunakan addData dengan nama string dan data array
            ->setXAxis($months)
            ->setGrid()
            ->setMarkers(['#FF5722', '#E040FB'], 7, 10);
    }
}
