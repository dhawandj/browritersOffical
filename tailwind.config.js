import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                anton:['Anton']

            },
            colors: {
                background: '#323437', // --bg-color
                primary: '#E2B714', // --main-color
                caret: '#E2B714', // --caret-color
                secondary: '#646669', // --sub-color
                secondaryAlt: '#2C2E31', // --sub-alt-color
                textPrimary: '#D1D0C5', // --text-color
                error: '#CA4754', // --error-color
                errorSecondary: '#7E2A33', // --error-extra-color
                errorColorful: '#ffffff', // --colorful-error-color
                errorColorfulAlt: '#ffffff', // --colorful-error-extra-color
            },
        },
    },

    plugins: [forms],
};
