<?php

namespace Tests\Unit;

use App\Models\Thread\Thread;
use App\Models\User\User;
use App\Services\ThreadService;
use AppDataSeeder;
use DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ThreadService $service
     */
    private $service;

    public function setUp()
    {
        parent::setUp();
        $this->service = app(ThreadService::class);
        $this->seed(DatabaseSeeder::class);
        $this->seed(AppDataSeeder::class);
    }

    /**
     * @covers \App\Services\ThreadService::create
     */
    public function testCreateThread()
    {
        $author = User::inRandomOrder()->first();
        $data = collect([
            'title'     =>  'Test Title',
            'content'   => 'Some test text'
        ]);

        $this->service->create($data, $author);

        $data->put('author_id', $author->id);
        $this->assertDatabaseHas('threads', $data->toArray());
    }

    /**
     * @covers \App\Services\ThreadService::update
     */
    public function testUpdateThread()
    {
        $thread = Thread::inRandomOrder()->first();

        $oldData = [
            'title'     => $thread->title,
            'content'   => $thread->content
        ];

        $newData = [
            'title'     => 'Some New Title',
            'content'   => 'Some New Content of the Thread.'
        ];

        $this->service->update($thread, collect($newData));

        $this->assertDatabaseHas('threads', $newData);
        $this->assertDatabaseMissing('threads', $oldData);
    }

    /**
     * @covers \App\Services\ThreadService::reply
     */
    public function testReplyCreate()
    {
        $thread = Thread::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        $data = [
            'content'   => 'This is test reply!'
        ];

        $this->service->reply($thread, collect($data), $user);

        $data = $data + ['thread_id' => $thread->id];

        $this->assertDatabaseHas('replies', $data);
    }

    public function testCollaborationCreate()
    {
        $thread = Thread::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        $data = [
            'content'   => 'This is test reply!'
        ];

        $reply = $this->service->reply($thread, collect($data), $user);

        $this->assertDatabaseHas('collaborations', ['reply_id' => $reply->id, 'thread_id' => $thread->id]);
    }
}
