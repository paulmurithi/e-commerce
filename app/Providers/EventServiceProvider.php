<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\OrderPlaced;
use App\Listeners\SendOrderPacedNotification;
use App\Events\OrderProcessed;
use App\Listeners\SendOrderProcessedNotification;
use App\Events\OrderShipped;
use App\Listeners\SendOrderShippedNotification;

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
        OrderPlaced::class => [
            SendOrderPacedNotification::class,
        ],
        OrderProcessed::class => [
            SendOrderProcessedNotification::class,
        ],
        OrderShipped::class => [
            SendOrderShippedNotification::class,
        ],
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
