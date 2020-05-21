@foreach ($conversation->replies as $reply)

    <div>
        <header style="display: flex; justify-content: space-between; margin: 10px auto;">
            <p class="m-0"><strong>{{ $reply->user->name}} said... </strong></p>

            {{-- @if ($conversation->best_reply_id === $reply->id) --}}
            @if ($conversation->best_reply_id === $reply->id)
                <span style="color: green;"> Best reply </span>
            @endif 

        </header>

        {{ $reply->body }}

        @can('update', $conversation)
            <form method="POST" action="/best-replies/{{ $reply->id }}">
                @csrf
                <button class="btn btn-sm btn-secondary" type="submit"> Best Reply </button>
            </form> 
        @endcan

    </div>

    @continue($loop->last)
    <hr>
      
@endforeach