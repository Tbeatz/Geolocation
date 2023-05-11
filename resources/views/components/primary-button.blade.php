<button style="font-family: arial;" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 font-medium bg-green-500 uppercase text-white hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-4 py-2 dark:bg-gray-900 dark:hover:bg-green-700 dark:focus:ring-green-800']) }}>
    {{ $slot }}
</button>
