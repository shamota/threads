<div class="card mt-5">
    <div class="card-header bg-primary">
        <h2>Threads</h2>
    </div>
    <div class="card-body">
        @forelse ($threads as $thread)
            @include('pages.profile.parts.thread', $thread)
        @empty
            <h4>You don't have any threads</h4>
        @endforelse
    </div>
</div>