<?php

namespace App\Listeners;

use App\Events\ChangeOrderStatusEvent;
use App\Notifications\CanceledOrderNotification;
use App\Notifications\SuccessOrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeOrderStatusListener
{
    /**
     * Handle the event.
     *
     * @param ChangeOrderStatusEvent $event
     * @return void
     */
    public function handle(ChangeOrderStatusEvent $event)
    {
        if($event->status=="success"){
            $event->user->notify( new SuccessOrderNotification($event->order));

        }else if($event->status=="canceled"){
            $event->user->notify( new CanceledOrderNotification($event->order));
            $event->order->setStatus("canceled");
        }

    }
}
