<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    use HasFactory;
    protected $fillable = [
        'bahan_baku',
        'jumlah_stok',
        'satuan_pengukuran',
        'jumlah_cup',
        'supplier',
        'harga_beli',
        'keterangan'

    ];
    public function scopeFilter($query, array $filters){
        if(isset($filters['search_stoks']) ? $filters['search_stoks'] : false){
            $query->where('bahan_baku', 'like', '%'. $filters['search_stoks']. '%')
            ->orWhere('supplier', 'like', '%'. $filters['search_stoks']. '%');
            
        }
    }

}
