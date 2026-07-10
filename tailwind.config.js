import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'sre-green': '#009150',
                'sre-light-green': '#01ce72',
                'sre-dark-green': '#002816',
                'sre-yellow': '#facc15',
                'primary': '#009150',
                'dark': '#002816',
            },
            fontFamily: {
                sans: ['Hanken Grotesk', 'Inter', 'system-ui', 'sans-serif', ...defaultTheme.fontFamily.sans],
                serif: ['Hanken Grotesk', 'Inter', 'system-ui', 'sans-serif', ...defaultTheme.fontFamily.serif],
            },
        },
    },

    plugins: [forms],
};
