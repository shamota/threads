@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2 class="thread-title">Thread #{{ $thread->id }}</h2>
        @if ($user->hasRole('admin') || $user->isAuthor($thread))
            <form action="{{ route('threads.remove', $thread->id) }}" method="POST" class="remove-thread">
                {{ method_field('delete') }}
                <button class="btn btn-link"><i class="fa fa-trash-alt"></i></button>
            </form>
        @endif
        @include('pages.thread.parts.thread')
        @include('pages.thread.parts.reply')
    </div>
@endsection