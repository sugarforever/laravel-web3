<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessagePushed implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $message;
    private $channel_id;
    private $user_name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($channel_id, $message, $user_name)
    {
        $this->channel_id = $channel_id;
        $this->message = $message;
        $this->user_name = $user_name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->channel_id);
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'user' => $this->user_name
        ];
    }
}
