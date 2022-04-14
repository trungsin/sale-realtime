<?php

namespace App\Providers;

use App\Events\ImportProductEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\SyncProductToEbayEvent;
use App\Listeners\ImportProductNotification;
use App\Listeners\SyncProductToEbayNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SyncProductToEbayEvent::class => [
            SyncProductToEbayNotification::class
        ],
        ImportProductEvent::class => [
            ImportProductNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
