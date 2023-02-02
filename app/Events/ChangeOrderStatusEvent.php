<?php

namespace App\Events;

use App\Models\Order;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ChangeOrderStatusEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $status;
    public $user;
    public $order;

    /**
     * Create a new event instance.
     *
     * @param $userId
     * @param Order $order
     * @param $status
     */
    public function __construct(Order $order ,$status)
    {
        $this->status=$status;
        $this->order=$order;
        $this->user=$order->user;
    }

}
