<?php
namespace App\Services;


use App\Models\Thread\Collaboration;
use App\Models\Thread\Reply;
use App\Models\Thread\Thread;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ThreadService extends BaseService
{
    /**
     * @param Collection $data
     * @param User|null $user
     * @return Model
     */
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

    /**
     * @param Thread $thread
     * @param Collection $data
     * @return Thread
     */
    public function update(Thread $thread, Collection $data): Thread
    {
        $thread->title = $data->get('title');
        $thread->content = $data->get('content');
        $thread->save();

        return $thread;
    }

    /**
     * @param Thread $thread
     * @param Collection $data
     * @param User|null $user
     * @return Reply
     */
    public function reply(Thread $thread, Collection $data, User $user = null): Reply
    {
        $user = $user ?: auth()->user();
        $reply = new Reply;

        $reply->content = $data->get('content');
        $reply->author()->associate($user);
        $reply->thread()->associate($thread);

        $reply->save();

        return $reply;
    }

    /**
     * @param Reply $reply
     * @return Collaboration
     */
    public function collaborate(Reply $reply): Collaboration
    {
        $collaboration = new Collaboration;

        $collaboration->reply()->associate($reply);
        $collaboration->thread()->associate($reply->thread);

        $collaboration->save();

        return $collaboration;
    }
}