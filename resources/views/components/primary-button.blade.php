<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-arial text-sm text-white inline-flex items-center px-3 py-2 font-arial font-medium focus:ring-4 focus:outline-none font-medium rounded-md px-4 py-2 bg-greenprimary hover:bg-green-700 focus:ring-green-800']) }}>
    {{ $slot }}
</button>
