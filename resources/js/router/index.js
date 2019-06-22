import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../views/Home';

//auth
import SignUp from '../views/auth/SignUp';
import SignIn from '../views/auth/SignIn';

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/signup',
            name: 'SignUp',
            component: SignUp
        },
        {
            path: '/signin',
            name: 'SignIn',
            component: SignIn
        }
    ]
})