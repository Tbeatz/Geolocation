@props(['value'])

<label style="font-family:arial;" {{ $attributes->merge(['class' => 'text-gray-200 font-semibold text-sm']) }}>
    {{ $value ?? $slot }}
</label>
