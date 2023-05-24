@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-600 text-sm font-arial']) }}>
    {{ $value ?? $slot }}
</label>
