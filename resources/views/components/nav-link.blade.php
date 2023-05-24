@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-green-700 dark:border-green-400 text-sm leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-gray-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm leading-5 text-gray-900 dark:text-gray-100 hover:text-green-700 dark:hover:text-green-300 hover:border-green-700 dark:hover:border-green-400 focus:outline-none focus:text-gray-100 dark:focus:text-gray-100 focus:border-green-700 dark:focus:border-green-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
