<?php

namespace App\Listeners;

use App\Events\SyncProductToEbayEvent;
use App\Jobs\ProductToEbaySync;

class SyncProductToEbayNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SyncProductToEbayEvent  $event
     * @return void
     */
    public function handle(SyncProductToEbayEvent $event)
    {
        dispatch( new ProductToEbaySync($event->productIds));
    }
}
