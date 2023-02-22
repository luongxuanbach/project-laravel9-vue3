import { createApp } from 'vue';
import App from './App.vue'
import router from './router/index.js'
import {
     Avatar,
     Menu,
     List,
     Drawer,
     Button,
     message,
     Card,
     Table,
     Select,
     Input,
     InputPassword
} from 'ant-design-vue';
import { createPinia } from 'pinia';
import axios from 'axios';

import './static/fontawesome-free-6.3.0-web/css/all.min.css'
import 'ant-design-vue/dist/antd.css';
import 'bootstrap/dist/css/bootstrap-grid.min.css';
import 'bootstrap/dist/css/bootstrap-utilities.min.css';

window.axios = axios;

const app = createApp(App);
app.use(createPinia());
app.use(router);
/* Automatically register components under Button, such as Button.Group */
app.use(Button);
app.use(Drawer);
app.use(List);
app.use(Menu);
app.use(Card);
app.use(Table);
app.use(Avatar);
app.use(Select);
app.use(Input);
app.use(InputPassword);
app.mount('#app');

app.config.globalProperties.$message = message;
