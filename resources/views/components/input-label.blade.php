@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-blue-700 dark:text-blue-300']) }}>
    {{ $value ?? $slot }}
</label>
