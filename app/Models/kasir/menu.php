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
}
