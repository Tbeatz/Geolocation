@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 block w-full border-gray-300 bg-white text-gray-900 focus:border-green-600 font-arial dark:border-gray-300 dark:bg-white dark:text-gray-900 dark:focus:border-green-600 focus:ring-lime-600 dark:focus:ring-lime-600 rounded-md shadow-sm']) !!}>
