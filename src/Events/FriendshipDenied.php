<?php

namespace Hootlex\Friendships\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FriendshipDenied
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender, $recipient;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($sender, $recipient)
    {
        $this->sender = $sender;
        $this->recipient = $recipient;
    }
}
