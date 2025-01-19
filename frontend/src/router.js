// filepath: frontend/src/router.js
import { createRouter, createWebHistory } from 'vue-router';
import Prototipo from './components/PrototipoComponent.vue';

const routes = [
  { path: '/prototipo', components: Prototipo },
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;