@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2>Threads</h2>
        @foreach ($threads as $thread)
            <div class="card mt-4">
                <div class="card-header">
                    <h3>
                        <a href="{{ route('threads.show', $thread->id) }}">
                            {{ $thread->title }}
                        </a>
                    </h3>
                    Replies:
                    <span title="Replies in this thread">({{ $thread->replies->count() }})</span>
                </div>
                <div class="card-body">
                    <div class="alert alert-dark">
                        {{ str_limit($thread->content, 75, '...') }}
                    </div>
                </div>
                <div class="card-footer">
                    Author:
                        <a href="{{ route('profile', $thread->author_id) }}">
                            <strong>{{ $thread->author->email }}</strong>
                        </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection