import Vue from 'vue'
import VueRouter from 'vue-router'
import login from '../components/judges/login.vue'
import welcome from '../components/judges/welcome.vue'

Vue.use(VueRouter)

const routes = [
    {
        path: '/judges',
        name: 'Login',
        component: login
    },
    {
        path: '/judges/welcome',
        name: 'welcome',
        component: welcome
    }

]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
