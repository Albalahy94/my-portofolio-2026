/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    50: 'rgb(var(--color-primary-500) / 0.1)', // Simulating shade
                    100: 'rgb(var(--color-primary-500) / 0.2)',
                    200: 'rgb(var(--color-primary-500) / 0.3)',
                    300: 'rgb(var(--color-primary-500) / 0.4)',
                    400: 'rgb(var(--color-primary-500) / 0.6)',
                    500: 'rgb(var(--color-primary-500) / <alpha-value>)', // Main ID
                    600: 'rgb(var(--color-primary-500) / 0.9)',
                    700: 'rgb(var(--color-primary-500) / 1.0)', // Using main as base for now, ideal full palette needs more variables
                    800: 'rgb(var(--color-primary-500) / 1.0)',
                    900: 'rgb(var(--color-primary-500) / 1.0)',
                },
                accent: {
                    50: 'rgb(var(--color-accent-500) / 0.1)',
                    100: 'rgb(var(--color-accent-500) / 0.2)',
                    200: 'rgb(var(--color-accent-500) / 0.3)',
                    300: 'rgb(var(--color-accent-500) / 0.4)',
                    400: 'rgb(var(--color-accent-500) / 0.6)',
                    500: 'rgb(var(--color-accent-500) / <alpha-value>)',
                    600: 'rgb(var(--color-accent-500) / 0.9)',
                    700: 'rgb(var(--color-accent-500) / 1.0)',
                    800: 'rgb(var(--color-accent-500) / 1.0)',
                    900: 'rgb(var(--color-accent-500) / 1.0)',
                },
                dark: {
                    50: '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: 'rgb(var(--color-bg-950) / 0.5)', // Mixed usage
                    950: 'rgb(var(--color-bg-950) / <alpha-value>)',
                }
            },
            fontFamily: {
                cairo: ['Cairo', 'sans-serif'],
                roboto: ['Roboto', 'sans-serif'],
            },
            animation: {
                'gradient': 'gradient 8s linear infinite',
                'float': 'float 6s ease-in-out infinite',
                'glow': 'glow 2s ease-in-out infinite alternate',
            },
            keyframes: {
                gradient: {
                    '0%, 100%': {
                        'background-size': '200% 200%',
                        'background-position': 'left center'
                    },
                    '50%': {
                        'background-size': '200% 200%',
                        'background-position': 'right center'
                    },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                glow: {
                    '0%': { 'box-shadow': '0 0 5px rgba(14, 165, 233, 0.5), 0 0 10px rgba(14, 165, 233, 0.3)' },
                    '100%': { 'box-shadow': '0 0 20px rgba(14, 165, 233, 0.8), 0 0 30px rgba(14, 165, 233, 0.5)' },
                },
            },
        },
    },
    plugins: [],
};
