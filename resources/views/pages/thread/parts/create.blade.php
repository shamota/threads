<div class="card mt-2">
    <div class="card-header bg-info">
        <h2>{{ $headline }}</h2>
    </div>
    <div class="card-body">
        <form action="{{ isset($thread) ? route('threads.update', $thread->id) : route('threads.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input value="{{ optional($thread)->title }}" required id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Title">
                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" placeholder="Content">{{ optional($thread)->content }}</textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>