import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import ControlPanel from '../components/index.vue'

const mainRoutes = [
    { path: '/', component: ControlPanel },
]

export default new Router({
    // mode: 'history',
    mainRoutes
})