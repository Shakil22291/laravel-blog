<x-app-layout>
    <x-slot name="header">
        <div class="flex space-x-3 items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
            <div class="overflow-x-auto">
                <x-nav>
                    <x-nav-item
                        href="{{ route('posts.index') }}"
                        :isActive="Request::routeIs('posts.index')"
                    >
                        all
                    </x-nav-item>
                    @foreach($tags as $tag)
                        <x-nav-item
                            href="{{ route('tags.show', $tag->slug) }}"
                            :isActive="Request::is('tags/' . $tag->slug)"
                        >
                            {{ $tag->name }}
                        </x-nav-item>
                    @endforeach
                </x-nav>
            </div>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container mx-auto sm:px-6 lg:px-8">
           @forelse($posts as $post)
                <x-post-item :post="$post" />
            @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        No Post Available !
                    </div>
                </div>
           @endforelse
           {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
