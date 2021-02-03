<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="container py-12 mx-auto px-2">
        @if (session('message'))
            <div class="bg-green-300 mb-4 text-green-900 p-6 border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                {{session('message')}}
            </div>
        @endif
        <div class="max-w-3xl mx-auto">
            <p class="text-gray-600 text-sm font-light">
                {{ $post->created_at->diffForHumans() }}
            </p>
            <div class="flex">
                <h2 class="text-lg text-gray-800 font-medium">
                    {{ $post->user->name }}
                </h2>
            </div>
            <h2 class="text-gray-800 text-xl sm:text-2xl md:text-3xl font-bold capitalize mt-2">
                {{ $post->title }}
            </h2>
            @if ($post->thumbnail_path !== null)
                <div class="mt-2 w-full">
                    <img
                        class="w-full object-cover max-h-96"
                        src="{{ asset('storage/' . $post->thumbnail_path) }}"
                        alt="{{ $post->title }}"
                    >
                </div>
            @endif
            <div class="flex my-2 space-x-2">
                @foreach($post->tags as $tag)
                    <a
                        href="{{ route('tags.show',$tag->slug) }}"
                        class="text-xs hover:underline font-semibold text-purple-700 capitalize tracking-wide"
                    >
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
            <div class="mt-6"> {!! $post->getBodyAsHtml() !!} </div>
            <div class="my-12">
                <h2 class="text-xl font-bold text-gray-700">Comments</h2>
                <hr>
                @auth
                    <form class="my-6" action="/comments/{{ $post->id }}" method="POST">
                        @csrf
                        <x-forms.textarea
                            name="body"
                            label="Write your comment"
                            placeholder="What an awesome story.."
                            ></x-forms.textarea
                        >
                        <x-button type="submit">Publish</x-button>
                    </form>
                @endauth
                @foreach($post->comments as $comment)
                    <x-post-comments :comment="$comment" />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>