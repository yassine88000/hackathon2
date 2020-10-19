import Vue from 'vue'
import VueRouter from 'vue-router'
import login from '../components/blackroom/login'
import admin from '../components/blackroom/admin'
import general from '../components/blackroom/general'
import users from '../components/blackroom/users'
import spots from '../components/blackroom/spots'
import projects from '../components/blackroom/projects'
import scoring from '../components/blackroom/scoring'


Vue.use(VueRouter)

const routes = [
    {
        path: '/blackroom',
        name: 'login',
        component: login
    },
    {
        path: '/blackroom',
        name: 'admin',
        component: admin,
        children: [
            {
                path: 'general',
                name: 'general',
                component: general
            },
            {
                path: 'users',
                name: 'users',
                component: users
            },
            {
                path: 'spots',
                name: 'spots',
                component: spots
            },
            {
                path: 'projects',
                name: 'projects',
                component: projects
            },
            {
                path: 'scoring',
                name: 'scoring',
                component: scoring
            },
        ]
    },

]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
