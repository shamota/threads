@extends('layouts.app')

@section('content')
    <div class="jumbotron-fluid">
        <h2>Profile #{{ $user->id }}</h2>
        @if (!auth()->user()->hasRole('admin'))
            <a class="btn btn-primary" href="{{ route('threads.create') }}">Create Thread</a>
        @endif

        @include('pages.profile.parts.list')
    </div>
@endsection