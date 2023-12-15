<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order;

class penjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu',
        'jumlah',
        'uang',
        'kembalian',
        'total_harga',
    ];   
    
}
