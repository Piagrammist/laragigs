const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                laravel: "#ef3b2d",
            },
            fontFamily: {
                'sans': ['Roboto', ...defaultTheme.fontFamily.sans],
                'poppins': 'Poppins',
                'recursive': 'Recursive',
                'ubuntu': 'Ubuntu',
            },
        },
    },
    plugins: [],
}
