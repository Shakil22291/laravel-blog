<div class="my-6">
    <div class="flex space-x-2">
        <a href="{{ route('profile.show', $comment->user->id) }}" class="flex-none">
            <img
                src="{{ $comment->user->profile_photo_url }}"
                alt="{{ $comment->user->name }}"
                width="50"
                height="50"
                class="rounded-full object-cover shadow"
            >
        </a>
        <div class="my-2">
            <h4 class="font-semibold text-lg text-gray-700">{{ $comment->user->name }}</h4>
            <div class="text-xs text-gray-500 font-bold">{{ $comment->created_at->diffForHumans() }}</div>
            <div class="text-gray-600">{{ $comment->body }}</div>
            @can('view', $comment)
                <form action="/comments/{{ $comment->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="focus:outline-none text-red-600 hover:text-red-800 font-bold text-xs">Delete comment</button>
                </form>
            @endcan
        </div>
    </div>
</div>
