@if ($user->isAuthor($thread))
    @include('pages.thread.parts.create', ['headline' => 'Update Thread'])
@else
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="form-title">{{ $thread->title }}</h3>
        </div>
        <div class="card-body">
            <div class="alert alert-primary">
                {{ $thread->content }}
            </div>
        </div>
        <div class="card-footer">
            Author: {{ $thread->author->email }}
        </div>
    </div>
@endif