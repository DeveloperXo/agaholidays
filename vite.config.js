import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/about_page.css',
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/auth.css',
                'resources/css/blog_single.css',
                'resources/css/blogs_page.css',
                'resources/css/contact_page.css',
                'resources/css/defaults.css',
                'resources/css/destination_single.css',
                'resources/css/destinations.css',
                'resources/css/footer.css',
                'resources/css/home.css',
                'resources/css/navigation.css',
                'resources/css/package_single.css',
                'resources/css/packages_page.css',
            ],
            refresh: true,
        }),
    ],
});
