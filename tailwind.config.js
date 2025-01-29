import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./node_modules/tw-elements/dist/js/**/*.js"

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                wiggle: {
                  '0%, 100%': { transform: 'rotate(-3deg)' },
                  '50%': { transform: 'rotate(3deg)' },
                },
                'fade-in-down': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(-10px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                }
            },
            animation: {
                wiggle: 'wiggle 1s ease-in-out infinite',
                'fade-in-down': 'fade-in-down 0.5s ease-out'
            },
            spacing: {
                '80': '20rem',
            },
            fontSize: {
                'sm': '0.8rem',
                'base': '1rem',
                'xl': '1.25rem',
                '2xl': '1.563rem',
                '3xl': '1.953rem',
                '4xl': '2.441rem',
                '5xl': '3.052rem',
            },
            flexBasis: {
                '1/7': '14.2857143%',
                '2/7': '28.5714286%',
                '3/7': '42.8571429%',
                '4/7': '57.1428571%',
                '5/7': '71.4285714%',
                '6/7': '85.7142857%',
                '1/6': '16.666666667%',
                '2/6': '33.333333334%',
                '3/6': '50%',
                '4/6': '56.666666667%',
                '5/6': '83.333333334%',
                '1/5': '20%',
                '2/5': '40%',
                '3/5': '60%',
                '4/5': '80%',
                '1/10': '10%',
                '2/10': '20%',
                '3/10': '30%',
                '4/10': '40%',
                '5/10': '50%',
                '6/10': '60%',
                '7/10': '70%',
                '8/10': '80%',
                '9/10': '90%',
                
            },
            colors : {
                'default-900': '#00414d',
                'default-800': '#005766',
                'default-700': '#005d6d',
                'default-600': '#006c80',
                'default-500': '#008299',
                'default-400': '#0098b3',
                'default-300': '#00adcc',
                'default-200': '#00c3e6',
                'default-100': '#00d9ff',
            }
        },
    },

    plugins: [
        forms,
        require("tw-elements/dist/plugin.cjs")
    ],
};
