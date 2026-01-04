import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import viteReact from "@vitejs/plugin-react";
import path from "node:path";

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/js/app.ts', 'resources/css/app.css'],
      refresh: true,
    }),
    tailwindcss(),
    viteReact()
  ],
  server: {
    cors: true,
    hmr: {
			host: "127.0.0.1",
		},
  },
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./resources/js"),
    },
  },
});
