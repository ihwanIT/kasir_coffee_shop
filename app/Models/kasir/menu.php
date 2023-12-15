<?php

namespace App\Models\kasir;

use App\Charts\OrdersChart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderCard;

class menu extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama",
        "image",
        "kategori",
        "harga",
        "jumlah",
    ];

    // relasi ke table orde

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            $query->where('nama', 'like', '%' . $filters['search'] . '%');
        }
    }
    // searh menu orders
    // public function scopeFilterMenuOrder($query, array $filters){
    //     if(isset($filters['SearchMenuOrders']) ? $filters['SearchMenuOrders'] : false){
    //         $query->where('nama', 'like', '%'. $filters['SearchMenuOrders']. '%');

    //     }
    // }
}
