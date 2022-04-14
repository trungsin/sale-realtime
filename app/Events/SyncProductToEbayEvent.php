<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class SyncProductToEbayEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // variant global
    public $productIds;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($productIds)
    {
        $this->productIds = $productIds;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('product-to-ebay');
    }
}
