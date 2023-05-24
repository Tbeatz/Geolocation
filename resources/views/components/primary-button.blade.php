<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-arial text-sm inline-flex items-center px-3 py-2 font-arial font-medium bg-green-600 text-white hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-800 font-medium rounded-md px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800']) }}>
    {{ $slot }}
</button>
