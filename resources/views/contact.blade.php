<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact with us') }}
        </h2>
    </x-slot>

    <div class="container py-6 mx-auto">
        <form action="/contact" method="POST">
            @csrf
            <x-forms.input
                name="subject"
                label="Enter a subject"
                placeholder="eg: About Cvid-19"
            />
            <x-forms.input
                name="email"
                type="email"
                label="Enter Your subject"
                placeholder="eg: example@example.com"
            />

            <x-forms.textarea
                name="body"
                label="Write your message"
            ></x-forms.textarea>
            <x-button>Submit</x-button>
        </form>
    </div>

</x-app-layout>