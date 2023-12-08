<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
// use ArielMejiaDev\LarapexCharts\LineChart;
// use ArielMejieaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;


use App\Models\order;

class OrdersChart extends Chart
{
    protected $chart;
    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
{
        // Array label bulan dari Januari hingga Desember
        $labels = [
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ];
    
        // Mengambil data order per bulan dari database
        $dataOrders = Order::selectRaw('MONTH(created_at) as month, SUM(jumlah) as total_jumlah')
                        ->groupBy('month')
                        ->get();
    
        // Inisialisasi data penjualan untuk setiap bulan
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Mengisi dengan nol untuk setiap bulan
    
        // Memasukkan data penjualan yang diambil dari database ke dalam array data
        foreach ($dataOrders as $order) {
            $monthIndex = $order->month - 1; // Index array dimulai dari 0, bulan dimulai dari 1
            $data[$monthIndex] = $order->total_jumlah;
        }
    
        return $this->chart->LineChart()
            ->setTitle('Data Penjualan Bulanan')
            ->setHeight(200)
            ->setSubtitle(date('Y'))
            ->addData('Total Penjualan', $data)
            ->setLabels($labels);
        
}

}
