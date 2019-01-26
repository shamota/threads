@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('pages.thread.parts.create', ['headline' => 'Create Thread', 'thread' => null])
    </div>
@endsection