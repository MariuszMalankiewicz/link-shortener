import { createApp } from 'vue';
import App from './App.vue';
import axios from 'axios';
import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes';

const router = createRouter({
  history: createWebHistory(),
  routes,
});

window.axios = axios;
axios.defaults.baseURL = '/api';

const app = createApp(App);
app.use(router);
app.mount('#app');