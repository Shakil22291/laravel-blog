<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Post') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 container mx-auto">
        <form action="/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-forms.input
                name="title"
                label="Post Title"
                value="{{ $post->title }}"
            />
            <x-forms.select
                name="tags[]"
                label="Post Tags"
                :options="['multiple' => true]"
            >
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </x-forms.select>
            <x-forms.file name="thumbnail" label="Post Thumbnail" />
            <x-forms.textarea name="body" label="Post Body">
                {{ $post->body }}
            </x-forms.textarea>
            <x-button>
                Submit
            </x-button>
        </form>
    </div>
</x-app-layout>