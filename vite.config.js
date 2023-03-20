import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { fileURLToPath, URL } from 'url';
import vueJxs from '@vitejs/plugin-vue-jsx';

export default defineConfig({
    base: '/public/',
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vueJxs(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
                compilerOptions: {
                    isCustomElement: tag => tag.startsWith('sl-'),
                }
            },
        }),

    ],
    resolve: {
        alias: {
            // '@@': fileURLToPath(new URL('./resources', import.meta.url)),
        },
    }
});
