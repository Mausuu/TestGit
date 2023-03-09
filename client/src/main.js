import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap/dist/js/bootstrap.js"
import axios from 'axios'
window.axios=axios;
import router from './router/index.js';
import 'dotenv'
createApp(App).use(router).mount('#app')
