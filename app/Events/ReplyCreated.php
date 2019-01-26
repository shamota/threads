<?php

namespace App\Events;

use App\Models\Thread\Reply;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ReplyCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Reply $reply
     */
    public $reply;

    /**
     * Create a new event instance.
     *
     * @param Reply $reply
     */
    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }
}
