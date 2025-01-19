// filepath: frontend/vite.config.js
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [vue()],
  build: {
    manifest: true,
    outDir: 'public/build',
    rollupOptions: {
      input: '/src/main.js'
    }
  }
});