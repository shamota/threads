<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Http\Requests\ThreadRequest;
use App\Models\Thread\Thread;
use App\Models\User\User;
use App\Services\ThreadService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ThreadController extends Controller
{
    /**
     * @var ThreadService $service
     */
    private $service;

    public function __construct(ThreadService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $threads = $this->filterThreads(collect($request->all()));

        $users = User::all();

        return view('pages.thread.index', compact('threads', 'users'));
    }

    public function create()
    {
        return view('pages.thread.create');
    }

    public function store(ThreadRequest $request)
    {
        $data = collect($request->only(['title', 'content']));
        $thread = $this->service->create($data);

        return redirect('threads')->withMessage(['success' => true, 'thread' => $thread]);
    }

    public function show(Thread $thread)
    {
        $user = auth()->user();
        return view('pages.thread.show', compact('thread', 'user'));
    }

    public function reply(Thread $thread, ReplyRequest $request)
    {
        $data = collect($request->only('content'));
        $reply = $this->service->reply($thread, $data);

        return redirect()->back()->withMessage(['success' => true, 'reply' => $reply]);
    }

    public function remove(Thread $thread)
    {
        try {
            $thread->delete();
        } catch (\Exception $e) {
            return redirect()->back();
        }

        return redirect('threads');
    }

    public function update(Thread $thread, ThreadRequest $request)
    {
        $data = collect($request->only('title', 'content'));
        $this->service->update($thread, $data);

        return redirect()->back()->withMessage(['success' => true, 'thread' => $thread]);
    }

    /**
     * @param Collection $request
     * @return Thread|Builder|mixed
     */
    protected function filterThreads(Collection $request): Collection
    {
        return Thread::query()
            ->when($request->has('users'), function (Builder $builder) use ($request) {
                if (!in_array(0, $request->get('users'))) {
                    $builder->whereIn('author_id', $request->get('users'));
                }
            })
            ->when($request->has('sort'), function (Builder $builder) use ($request) {
                $sort = $request->get('sort');

                switch ($sort) {
                    case 'new':
                        return $builder->orderByDesc('created_at');
                    case 'old':
                        return $builder->orderBy('created_at');
                    case 'asc':
                        return $builder->orderBy('title');
                    case 'desc':
                        return $builder->orderByDesc('title');
                    default:
                        return $builder->orderByDesc('created_at');
                }
            }, function (Builder $builder) {
                return $builder->orderByDesc('created_at');
            })
            ->get();
    }
}
