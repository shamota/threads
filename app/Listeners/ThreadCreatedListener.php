<?php

namespace App\Listeners;

use App\Events\ThreadCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ThreadCreatedListener
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
     * @param ThreadCreated $threadCreated
     * @return void
     */
    public function handle(ThreadCreated $threadCreated)
    {
        $thread = $threadCreated->thread;
        $author = $thread->author;

        if ($author->threads->count() > 4) {
            $author->threads->sortBy('created_at')->first()->delete();
        }
    }
}
