<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-6">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-lg">Profile Avatar</h2>
                <form
                    action="/user/{{ $user->id }}/profile-photo"
                    method="POST"
                    x-data="{photoName:null, photoPreview: null}"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div>
                        <input
                            type="file"
                            class="hidden"
                            x-ref="photo"
                            name="photo"
                            x-on:change="
                                let photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                }
                                reader.readAsDataURL($refs.photo.files[0]);
                            "
                        >
                        <!-- Current Profile Photo -->
                        <div class="mt-2" x-show="! photoPreview">
                            <img
                                src="{{ $user->profile_photo_url }}"
                                alt="{{ $user->name }}"
                                class="rounded-full h-20 w-20 object-cover"
                            >
                        </div>
                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="photoPreview">
                            <span class="block rounded-full w-20 h-20"
                                x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>

                        <x-button
                            class="mt-2 mr-2 bg-indigo-400"
                            type="button"
                            x-on:click.prevent="$refs.photo.click()"
                        >
                            {{ __('Select A New Photo') }}
                        </x-button>

                        @if($user->profile_photo_path)
                            <form action="/user/{{ $user->id }}/profile-photo" method="POST">
                                @method('DELETE')
                                @csrf
                                <x-button
                                    class="mt-2 mr-2 bg-red-600"
                                    type="submit"
                                >
                                    {{ __('Delete') }}
                                </x-button>
                            </form>
                        @endif

                    </div>

                    <x-button class="mt-3 ml-auto" style="display: block" type="submit">Save</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>