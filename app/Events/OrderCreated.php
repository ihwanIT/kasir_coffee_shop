<?php

namespace App\Events;

// use App\Models\order;
use App\Models\orderCard;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $orderCard;

    public function __construct(orderCard $orderCard)
    {
        $this->orderCard = $orderCard;
    }
}
