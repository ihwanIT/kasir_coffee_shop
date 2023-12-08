<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\OrderCreated;

class orderCard extends Model
{
    use HasFactory;
    protected $fillable =[
        'menu',
        'jumlah',
        'sub_harga',
        'total_harga',
        'keterangan',
    ];

    protected $dispatchesEvents = [
        'created' => OrderCreated::class,
    ];
}
