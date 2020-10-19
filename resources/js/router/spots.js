import Vue from 'vue'
import VueRouter from 'vue-router'
import Accueil from '../components/spots/spots.vue'
import Scoring from '../components/spots/scoring.vue'

Vue.use(VueRouter)

const routes = [
    {
        path: '/spots',
        name: 'Home',
        component: Accueil
    },
    {
        path: '/spots/quai-alpha',
        name: 'scoring',
        component: Scoring
    }

]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
