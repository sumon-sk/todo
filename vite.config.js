import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['public/css/app.css', 'public/js/todo.js'],
            refresh: true,
        }),
    ],
});
