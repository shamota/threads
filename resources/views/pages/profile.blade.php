@extends('layouts.app')

@section('content')
    <div class="jumbotron-fluid">
        <div class="card">
            <div class="card-header bg-primary">
                <h2>Your threads</h2>
            </div>
            <div class="card-body">
                @forelse ($threads as $thread)
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mt-0">Title</h3>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                    </div>
                @empty
                    <h4>You don't have any threads</h4>
                @endforelse
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header bg-info">
                <h2>Create thread</h2>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" class="form-control" name="title">
                    </div>

                    <div class="form-group">
                        <label for="text">Text</label>
                        <textarea id="text" class="form-control" name="text"></textarea>
                    </div>

                    <button class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection