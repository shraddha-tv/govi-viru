import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

import state from './state'
import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

import vegetable from '../components/Vegetable/VegetableStore';
import user from '../components/User/UserStore';
import category from '../components/AdminBoard/Category/CategoryStore';
import role from '../components/AdminBoard/Role/RoleStore';

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions,
    modules : {
        user,
        vegetable,
        category,
        role
    }
});