@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-900 font-semibold text-sm font-arial']) }}>
    {{ $value ?? $slot }}
</label>
