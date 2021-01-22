<li>
    <a
        href="{{ $href }}"
        class="block hover:bg-purple-100 px-4 py-2 rounded-md text-gray-600 text-lg {{ $isActive ? 'bg-purple-100 text-purple-700' : '' }}"
    >
        {{ $slot }}
    </a>
</li>