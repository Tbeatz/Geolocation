const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        colors: {
            greenprimary: "#16a34a",
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                arial: ["Arial"],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],
};
