<?php

namespace App\Providers;

use App\Events\ReplyCreated;
use App\Events\ThreadCreated;
use App\Listeners\ReplyCreatedListener;
use App\Listeners\ThreadCreatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        ThreadCreated::class => [
            ThreadCreatedListener::class
        ],
        ReplyCreated::class => [
            ReplyCreatedListener::class
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
