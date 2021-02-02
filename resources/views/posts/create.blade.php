<x-post-edit-layout>
    <x-slot name="main">
        <input
            class="border-none text-4xl resize-none overflow-y-auto w-full focus:outline-none pl-0"
            placeholder="Add Title"
            name="title"
            value="{{ old('title')}}"
        />
        <div id="editorjs"></div>
        <input name="body" type="text" id="faceInput" value="{{ old('body') }}">
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
                        <option value="{{ $tag->id }}">
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
            <div
                class="h-20 mx-auto w-full bg-gray-200 text-sm flex items-center justify-center cursor-pointer hover:bg-gray-300"
                x-on:click.prevent="$refs.photo.click()"
            >
                set fetured image
            </div>
        </div>
    </x-slot>

    <x-slot name="scripts">
        <script src="{{ asset('js/post-create.js') }}"></script>
    </x-slot>
</x-post-edit-layout>