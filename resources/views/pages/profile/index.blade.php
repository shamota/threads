@extends('layouts.app')

@section('content')
    <div class="jumbotron-fluid">
        <h2>{{ $user->email }}</h2>

        @if (!auth()->user()->hasRole('admin'))
            @include('pages.thread.parts.create', ['headline' => 'Create Thread', 'thread' => null])
        @endif

        @include('pages.profile.parts.list')
    </div>
@endsection