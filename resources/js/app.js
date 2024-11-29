import './bootstrap';
import {createApp} from "vue";
import router from "./router.js";
import App from "./Pages/App.vue";

const app = createApp(App)
.use(router)
.mount('#app')
