<div class="mb-2">
    @if($label)
        <label class="text-lg" for="{{ $name }}">{{ $label }}</label>
    @endif
    <textarea
        id="{{ $name }}"
        name="{{$name}}"
        class="rounded-md @error($name) border-red-500 ring ring-red-300 ring-opacity-50 @enderror block w-full shadow-sm border-gray-300 focus:border-{{$color}}-300 focus:ring focus:ring-{{$color}}-200 focus:ring-opacity-50"
        placeholder="{{ $placeholder }}"
        rows="{{ $options['rows'] ?? 6 }}"
    >{{ old($name, $slot) }}</textarea>
    @error($name)
        <div class="text-sm font-semibold text-red-600">{{ $message }}</div>
    @enderror
</div>