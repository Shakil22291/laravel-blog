<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new blog</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="font-sans box-border">
    <header class="flex bg-white border-b justify-between items-center pr-10" style="min-height: 10vh">
        <div class="flex space-x-2 flex-1 items-center">
            <a href="/"><x-application-logo class="w-14" /></a>
            <h2 class="flex-1 text-3xl font-semibold text-gray-600">Write Your masterpice</h2>
        </div>
        <div class="flex space-x-4 items-center">
            <a href="{{ route('dashboard') }}" class="text-red-600 font-bold">Cancel</a>
            <x-button
                class="bg-blue-600"
                onclick="document.getElementById('mainForm').submit()"
            >publish</x-button>
        </div>
    </header>
    <form id="mainForm" action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @method($method)
        @csrf
        <main class=" ml-auto flex" style="height: 90vh">
            <div class="overflow-y-auto py-12 flex-1">
                <div class="mb-6 mx-auto" style="max-width: 650px">
                    <x-auth-validation-errors></x-auth-validation-errors>
                    @if (session('message'))
                        <div class="bg-green-300 mb-4 text-green-900 p-6 border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                            {{session('message')}}
                        </div>
                    @endif
                    {{ $main }}
                </div>
            </div>

            <div class="w-1/4 flex-none border-l overflow-y-auto">
                {{ $sidebar }}
            </div>
        </main>
    </form>

    @isset($scripts)
        <script src="{{ asset('js/app.js') }}"></script>
        {{ $scripts }}
    @endisset
</body>
</html>