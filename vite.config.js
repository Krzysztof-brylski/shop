import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/all.mini.scs',
                'resources/js/app.js',
                'resources/js/filter.js',
                'resources/js/delete.js',
                'resources/js/cart.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery',
        },
    },
});
