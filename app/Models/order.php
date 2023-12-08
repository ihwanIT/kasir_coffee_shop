<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\penjualan;
use App\Observers\OrdersObserver;
use App\Models\kasir\menu;


class order extends Model
{
    use HasFactory;
    protected $fillable =[
        "nama_pembeli",
        "nama_orderan",
        "keterangan",
        "harga",
        "jumlah",
        "total",
    ];

    // relasi ke table menu
    public function menu()
    {
        return $this->belongsTo(menu::class, 'nama_orderan', 'nama');
    }
    // proses search orderan berdasarkan nama dan nama menu
    public function scopeFilter($query, array $filters){
        if(isset($filters['search_orders']) ? $filters['search_orders'] : false){
            $query->where('nama_pembeli', 'like', '%'. $filters['search_orders']. '%')
            ->orWhere('nama_orderan', 'like', '%'. $filters['search_orders']. '%');
            
        }
    }
}
