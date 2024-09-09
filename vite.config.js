import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    includeAbsolute: false,
                },
            },
        }), // Corrigido: adicionado vírgula e parêntese fechado
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        },
    },
    build: {
        sourcemap: false,
        chunkSizeWarningLimit: 1500, // Por exemplo, ajuste para 1.5MB
        outDir: 'public/build', // ou o diretório onde você deseja que os arquivos de build sejam gerados
    },
    server: {
        host: '167.71.177.58', // ou defina o IP correto
        port: 5174,
        proxy: {
            '/app': {
                target: 'http://167.71.177.58/public/build', // URL do backend
                changeOrigin: true, // Para alterar o header `Origin` do request
                rewrite: (path) => path.replace(/^\/app/, ''), // Reescrever o caminho se necessário
            },
        },
    },
});
