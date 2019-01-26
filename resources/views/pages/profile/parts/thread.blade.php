<div class="alert alert-success">
    <h5>
        {{ $thread->title }}
        <a href="{{ route('threads.show', $thread->id) }}"><i class="fa fa-edit"></i></a>
    </h5>
    <hr>
    <p>{{ $thread->content }}</p>
</div>