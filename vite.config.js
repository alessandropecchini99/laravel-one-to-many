import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
const path = require("path");

// vite.config.js
export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Modifichiamo il percorso del css usando sass
                "resources/scss/app.scss",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
    //Aggiungiamo un alias per la cartella /resources/
    resolve: {
        alias: {
            "~resources": "/resources/",
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
        },
    },
});
