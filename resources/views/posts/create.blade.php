<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Post') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 container mx-auto">
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <x-forms.input
                name="title"
                label="Post Title"
                placeholder="eg: About Covid-19"
            />
            @if($tags->isNotEmpty())
                <x-forms.select
                    name="tags[]"
                    label="Post Tags"
                    :options="['multiple' => true]"
                >
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </x-forms.select>
            @endif
            <x-forms.file name="thumbnail" label="Post Thumbnail" />
            <x-forms.textarea name="body" label="Post Body"></x-forms.textarea>
            <x-button>
                Submit
            </x-button>
        </form>
    </div>
</x-app-layout>