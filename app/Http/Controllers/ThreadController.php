<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Http\Requests\ThreadRequest;
use App\Models\Thread\Thread;
use App\Services\ThreadService;

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

    public function index()
    {
        $threads = Thread::all()->sortByDesc('created_at');

        return view('pages.thread.index', compact('threads'));
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
}
