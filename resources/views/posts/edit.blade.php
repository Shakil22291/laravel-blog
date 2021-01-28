<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Post') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 container mx-auto">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-forms.input
                name="title"
                label="Post Title"
                value="{{ $post->title }}"
            />
            @if($tags->isNotEmpty())
                <x-forms.select
                    name="tags[]"
                    label="Post Tags"
                    :options="['multiple' => true]"
                >
                    @foreach($tags as $tag)
                        <option
                            value="{{ $tag->id }}"
                            {{ $post->hasTag($tag->id) ? 'selected' : '' }}
                        >
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </x-forms.select>
            @endif()
            <div>
                @if($post->hasThumbnail())
                    <img
                        src="{{ asset('storage/' . $post->thumbnail_path) }}"
                        alt=""
                        class="object-cover w-3/4 rounded-lg h-20"
                    >
                @endif
                <x-forms.file name="thumbnail" label="New Post Thumbnail" />
            </div>
            <x-forms.textarea name="body" label="Post Body">
                {{ $post->body }}
            </x-forms.textarea>
            <x-button>
                Submit
            </x-button>
        </form>
    </div>
</x-app-layout>