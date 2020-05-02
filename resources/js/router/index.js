import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import DashBoard from '../components/DashBoard'
import User from '../components/User'
import UserProfile from '../components/User/UserProfile.vue'
import Vegetable from '../components/Vegetable'
import Category from '../components/AdminBoard/Category'
import Role from '../components/AdminBoard/Role'

const mainRoutes = [
    { path: '/', component: DashBoard },
    { path: '/users', component: User },
    { path: '/users/:id', component: UserProfile },
    { path: '/vegetables', component: Vegetable },
    { path: '/category', component: Category },
    { path: '/role', component: Role },
]

export default new Router({
    // mode: 'history',
    routes:mainRoutes
})