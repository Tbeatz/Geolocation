@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-lime-300 dark:text-lime-600 font-semibold']) }}>
    {{ $value ?? $slot }}
</label>
