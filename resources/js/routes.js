import LinkShortener from './components/LinkShortener.vue';
import LinkHistory from './components/LinkHistory.vue';

const routes = [
  { path: '/', component: LinkShortener, name: 'LinkShortener' },
  { path: '/Link-history', component: LinkHistory, name: 'LinkHistory' },
];

export default routes;
