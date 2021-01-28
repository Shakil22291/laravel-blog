<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="w-3/4 mx-auto py-6">
        <div class="flex justify-between items-center">
            <div class="flex space-x-2 items-center">
                <img
                    src="{{ $user->profile_photo_url }}"
                    alt="{{ $user->name }}"
                    class="rounded-full shadow-sm"
                    width="70"
                >
                <div>
                    <h2 class="text-2xl">{{ $user->name }}</h2>
                    <div class="text-gray-400 text-xs"> member since {{ $user->created_at->diffForHumans() }} </div>
                </div>
            </div>
            <div>
                <a href="{{ route('profile.edit', $user->id) }}"
                    class="rounded-full border border-purple-600 shadow-sm hover:bg-purple-600 hover:text-purple-200 text-purple-600 py-2 px-4 transition hover:shadow-md text-xs font-bold uppercase"
                >Edit Profile</a>
            </div>
        </div>
        <hr class="my-2">

        <h2 class="mb-3 text-lg font-bold ml-2">All Posts</h2>
        @foreach($user->posts as $post)
            <x-post-item :post="$post" />
        @endforeach
    </div>

</x-app-layout>