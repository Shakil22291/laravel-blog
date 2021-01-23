<div class="my-3">
    @if($label)
        <label class="text-lg" for="{{ $name }}">{{ $label }}</label>
    @endif
    <input
        id="{{ $name }}"
        type="file"
        name="{{ $name }}"
        class="border mt-1 appearance-none @error($name) border-red-500 ring ring-red-300 ring-opacity-50 @enderror border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 focus:outline-none w-full rounded shadow text-gray-700 placeholder-gray-400 py-3 px-4"
    >
    @error($name)
        <div class="text-sm font-semibold text-red-600">{{ $message }}</div>
    @enderror
</div>