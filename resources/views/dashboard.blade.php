<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-green-300 mb-4 text-green-900 p-6 border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                    {{session('message')}}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($posts->isNotEmpty())
                        <h2 class="mb-2 text-xl">Your posts</h2>
                        <x-posts-table :posts="$posts"/>
                    @else
                        <h2 class="text-xl">No post you have created</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
