<?php

namespace App\Models\kasir;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order;

class menu extends Model
{
    use HasFactory;
    protected $fillable =[
        "nama",
        "kategori",
        "harga",
        "jumlah",
    ];

    // relasi ke table order
    public function orders()
    {
        return $this->hasMany(order::class, 'nama_orderan', 'nama');
    }

    public function scopeFilter($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
            $query->where('nama', 'like', '%'. $filters['search']. '%');
            
        }
    }
    // searh menu orders
    // public function scopeFilterMenuOrder($query, array $filters){
    //     if(isset($filters['SearchMenuOrders']) ? $filters['SearchMenuOrders'] : false){
    //         $query->where('nama', 'like', '%'. $filters['SearchMenuOrders']. '%');
            
    //     }
    // }
}
