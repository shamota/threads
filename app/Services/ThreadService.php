<?php
namespace App\Services;


use App\Models\Thread\Reply;
use App\Models\Thread\Thread;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ThreadService extends BaseService
{
    public function create(Collection $data, User $user = null): Model
    {
        $user = $user ?: auth()->user();
        $thread = new Thread;

        $thread->title = $data->get('title');
        $thread->content = $data->get('content');
        $thread->author()->associate($user);

        $thread->save();

        return $thread;
    }

    public function reply(Thread $thread, Collection $data, User $user = null)
    {
        $user = $user ?: auth()->user();
        $reply = new Reply;

        $reply->content = $data->get('content');
        $reply->author()->associate($user);
        $reply->thread()->associate($thread);

        $reply->save();

        return $reply;
    }
}