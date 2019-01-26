<div class="jumbotron mt-2">
    <h3>Replies</h3>
    @forelse ($thread->replies as $reply)
        <div class="alert alert-info">
            <blockquote class="blockquote">
                <p class="mb-0">{{ $reply->content }}</p>
                <footer class="blockquote-footer">{{ $reply->author->email }} said</footer>
            </blockquote>
        </div>
    @empty
    @endforelse

    <form action="{{ route('threads.reply', $thread->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="content">Reply</label>
            <textarea rows="5" required id="content" class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" placeholder="Your reply"></textarea>
            @if ($errors->has('content'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>

        <button class="btn btn-primary">Reply</button>
    </form>
</div>