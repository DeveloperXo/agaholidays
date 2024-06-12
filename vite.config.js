import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/defaults.css',
                'resources/css/footer.css',
                'resources/css/home.css',
                'resources/css/navigation.css',
            ],
            refresh: true,
        }),
    ],
});
