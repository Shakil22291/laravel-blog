<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="container py-12 mx-auto px-2">
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
            <div> {!! $post->getBodyAsHtml() !!} </div>
        </div>
    </div>
</x-app-layout>