<?php

namespace App\Mail;

use App\Models\Thread\Reply;
use App\Models\Thread\Thread;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplyCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Reply $reply
     */
    private $reply;

    /**
     * Create a new message instance.
     *
     * @param Reply $reply
     */
    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reply')
            ->text('emails.plainreply')
            ->with([
                'threadTitle'   => $this->reply->thread->title,
                'replyAuthor'   => $this->reply->author->email,
            ]);
    }
}
