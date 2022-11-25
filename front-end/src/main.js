import { createApp } from 'vue';
import App from './App.vue';
import router from './routes';
import { registerGlobalComponent } from './utils/import';



import './assets/styles/tailwind.css';

import './assets/styles/icons.css';

import './assets/styles/global.css';
 
 const app = createApp(App)   
 registerGlobalComponent(app)
 app.use(router)
 app.mount('#app')

