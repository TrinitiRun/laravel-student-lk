import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    щзрзplugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0', // Слушать все интерфейсы
        hmr: {
            host: '192.168.0.102', // Твой IP, чтобы телефон знал, куда стучаться
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
