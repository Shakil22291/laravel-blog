<x-post-edit-layout method="PATCH" action="/posts/{{$post->slug}}">
    <x-slot name="main">
        <input
            class="border-none text-4xl resize-none overflow-y-auto w-full focus:outline-none pl-0"
            placeholder="Add Title"
            name="title"
            value="{{ old('title', $post->title) }}"
        />
        <div class="flex justify-end">
            <button
                class="text-indigo-600 text-sm"
                id="saveButton"
                type="button"
            >Save</button>

        </div>
        <div id="editorjs"></div>
        <input name="body" type="text" id="faceInput">
        <input type="text" id="oldBody" value="{{ $post->body }}">
    </x-slot>

    <x-slot name="sidebar">
       @if($tags->isNotEmpty())
            <div class="border-b p-2">
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
            </div>
        @endif()
        <div
            class="p-2 border-b"
            x-data="{photoName:null, photoPreview: null}"
        >
            <div class="text-lg mb-1">Featured Image</div>
            <input
                type="file"
                class="hidden"
                x-ref="photo"
                name="thumbnail"
                x-on:change="
                    let photoName = $refs.photo.files[0].name;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        photoPreview = e.target.result;
                    }
                    reader.readAsDataURL($refs.photo.files[0]);
                "
            >
            <div x-show="photoPreview">
                <img
                    x-bind:src="photoPreview"
                    alt=""
                    class="object-cover w-full rounded-lg h-32 mb-1"
                >
            </div>

            @if($post->hasThumbnail())
                <img
                    src="{{ asset('storage/' . $post->thumbnail_path) }}"
                    alt=""
                    x-show=" ! photoPreview"
                    class="object-cover w-full mb-1 rounded-lg h-32"
                >
            @endif
            <div
                class="h-20 mx-auto w-full bg-gray-200 text-sm flex items-center justify-center cursor-pointer hover:bg-gray-300"
                x-on:click.prevent="$refs.photo.click()"
            >
                set a new fetured image
            </div>
        </div>
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('js/post-edit.js') }}"></script>
    </x-slot>
</x-post-edit-layout>