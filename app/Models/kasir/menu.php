<?php

namespace App\Models\kasir;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    protected $fillable =[
        "nama",
        "kategori",
        "harga",
    ];

    public function scopeFilter($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){
            $query->where('nama', 'like', '%'. $filters['search']. '%');
            
        }
    }
}
