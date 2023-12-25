<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EwallteTransaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu',
        'jumlah',
        'metode',
        'total_harga'
    ];
}
