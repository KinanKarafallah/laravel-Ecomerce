<?php

namespace App\Listeners;

use App\Events\PaymentEvent;
use App\Notifications\PaymentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaymentListener
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
     * @param  \App\Events\vent=PaymentEvent  $event
     * @return void
     */
    public function handle(PaymentEvent $event)
    {
        $event->user->notify(new PaymentNotification($event->order));
    }
}
