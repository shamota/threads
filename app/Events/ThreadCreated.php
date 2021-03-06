<?php

namespace App\Events;

use App\Models\Thread\Thread;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ThreadCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Thread $thread
     */
    public $thread;

    /**
     * Create a new event instance.
     *
     * @param Thread $thread
     */
    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }
}
