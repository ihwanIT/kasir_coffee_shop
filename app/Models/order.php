<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable =[
        "nama_pembeli",
        "nama_orderan",
        "keterangan",
        "jumlah"
    ];

    public function scopeFilter($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
            $query->where('nama_pembeli', 'like', '%'. $filters['search']. '%');
            
        }
    }
}
