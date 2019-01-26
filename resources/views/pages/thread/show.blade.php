@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h2 class="thread-title">Thread #{{ $thread->id }}</h2>
            @if ($user->hasRole('admin') || $user->isAuthor($thread))
                <form action="{{ route('threads.remove', $thread->id) }}" method="POST" class="remove-thread">
                    @csrf
                    {{ method_field('delete') }}
                    <button class="btn btn-link"><i class="fa fa-trash-alt"></i></button>
                </form>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                @include('pages.thread.parts.thread')
                @include('pages.thread.parts.reply')
            </div>
        </div>
    </div>
@endsection