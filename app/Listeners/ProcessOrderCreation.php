<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Penjualan;
use App\Models\orderCard;

class ProcessOrderCreation
{
    public function handle(OrderCreated $event)
    {
        $orderCard = $event->orderCard; // Dapatkan objek order dari event

        $menus = explode(',', $orderCard->menu);

        foreach ($menus as $menu) {
            Penjualan::create([
                'menu' => $menu,
                'jumlah' => $orderCard->jumlah,
            ]);
        }
    }
}

