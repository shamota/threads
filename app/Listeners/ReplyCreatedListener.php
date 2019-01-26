<?php

namespace App\Listeners;

use App\Events\ReplyCreated;
use App\Models\Thread\Reply;
use App\Models\User\User;
use App\Services\ThreadService;
use Mail;
use App\Mail\ReplyCreated as ReplyCreatedEmail;

class ReplyCreatedListener
{
    /**
     * @var ThreadService $service
     */
    private $service;

    /**
     * Create the event listener.
     *
     * @param ThreadService $service
     */
    public function __construct(ThreadService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle the event.
     *
     * @param ReplyCreated $replyCreated
     * @return void
     */
    public function handle(ReplyCreated $replyCreated)
    {
        $thread = $replyCreated->reply->thread;
        $author = $thread->author;

        $this->notifyThreadAuthor($replyCreated->reply, $author);
        $this->subscribeReplyAuthor($replyCreated->reply);
    }

    protected function notifyThreadAuthor(Reply $reply, User $author)
    {
        Mail::to($author)->send(new ReplyCreatedEmail($reply));
    }

    protected function subscribeReplyAuthor(Reply $reply)
    {
        $this->service->collaborate($reply);
    }
}
