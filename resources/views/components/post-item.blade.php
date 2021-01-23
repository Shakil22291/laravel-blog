<article class="bg-white max-w-md mx-auto md:mx-0 md:max-w-4xl rounded-xl shadow-md overflow-hidden mb-2">
    <div class="md:flex">
        @if ($post->thumbnail_path !== null)
            <div class="md:flex-shrink-0">
                <img
                    class="h-full w-full object-cover md:w-48"
                    src="{{ asset('storage/' . $post->thumbnail_path) }}"
                    alt="{{ $post->title }}"
                >
            </div>
        @endif
        <div class="p-8">
            <a
                href="#"
                class="text-sm hover:underline font-semibold text-purple-700 uppercase tracking-wide"
            >
                {{ $post->user->name }}
            </a>
            <a
                href="{{route('posts.show', $post->slug)}}"
                class="mt-1 block text-lg leading-tight font-medium text-black hover:underline"
            >{{ $post->title }}</a>
            <p class="text-gray-500 mt-2">{{ excerpt($post->body) }}</p>
            <div class="flex mt-2 space-x-2">
                @foreach ($post->tags as $tag)
                    <a
                        href="{{route('tags.show', $tag->slug)}}"
                        class="text-xs hover:underline font-semibold text-purple-700 capitalize tracking-wide"
                    >
                        {{$tag->name}}
                    </a>
                @endforeach
            </div>
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        href="{{ route('posts.destroy', $post->slug) }}"
                        class="mt-2 text-red-700 font-bold text-sm hover:text-red-500"
                    >
                        Delete this post
                    </button>
                </form>
            @endcan
        </div>
    </div>
</article>