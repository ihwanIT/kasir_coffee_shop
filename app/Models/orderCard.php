<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\OrderCreated;
use App\Models\kasir\menu;

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
    

    public function menus()
    {
        return $this->hasMany(menu::class);
    }

    protected static function booted()
    {
        static::created(function ($orderCard) {
            // Ambil menu yang di-order pada order tersebut
            $menuItems = explode('-', $orderCard->menu);
            $quantities = explode('-', $orderCard->jumlah);

            // Update jumlah menu pada tabel 'menu'
            foreach ($menuItems as $index => $menuItem) {
                $menu = Menu::where('nama', $menuItem)->first();
                if ($menu) {
                    $menu->decrement('jumlah', (int)$quantities[$index]);
                }
            }
        });
    }
}
