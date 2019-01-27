<?php

use App\Models\Thread\Reply;
use App\Models\User\User;
use App\Models\Thread\Thread;
use Illuminate\Database\Seeder;

class AppDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 5)->create()->each(function (User $user) {
            $user->assignRole('author');
        });

        $users->each(function (User $user) {
            factory(Thread::class, 10)->create([
                'author_id'     => $user->id
            ]);
        });
        $threads = Thread::all();

        $threads->each(function(Thread $thread) {
            factory(Reply::class, 10)->create([
                'thread_id' => $thread->id
            ]);
        });
    }
}
