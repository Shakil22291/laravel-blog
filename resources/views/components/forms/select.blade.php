<div class="mb-2">
    @if($label)
        <label class="text-lg">{{ $label }}</label>
    @endif()

    <select
        name="{{ $name }}"
        {{ isset( $options['multiple'] ) ? $options['multiple'] ? 'multiple' : '' : '' }}
        class="rounded-md @error($name) border-red-500 ring ring-red-300 ring-opacity-50 @enderror block w-full shadow-sm border-gray-300 focus:border-{{$color}}-300 focus:ring focus:ring-{{$color}}-200 focus:ring-opacity-50"
    >
        {{ $slot }}
    </select>
</div>