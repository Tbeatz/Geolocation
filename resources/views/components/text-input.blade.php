@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 block dark:border-gray-200 dark:bg-gray-100 dark:text-gray-900 dark:focus:border-lime-400 focus:ring-lime-300 dark:focus:ring-lime-600 font-arial rounded-md shadow-sm']) !!}>
