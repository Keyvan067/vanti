import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import { resolve } from "path";

export default defineConfig({
    plugins: [
        tailwindcss(),
    ],

    build: {
        outDir: resolve(__dirname, "dist"),
        emptyOutDir: true,

        rollupOptions: {
            input: {
                app: resolve(__dirname, "resources/js/app.js"),
            },
        },
    },
});