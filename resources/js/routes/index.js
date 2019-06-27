import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router);

import Welcome from '../components/Welcome.vue';
import Home from  '../components/ChatPage'
export default new Router({
    mode: 'history',
    routes: [
        { path: '/', component: Welcome, name: 'Welcome' },
        { path: '/home', component: Home, name: 'chat' },
    ]
});

