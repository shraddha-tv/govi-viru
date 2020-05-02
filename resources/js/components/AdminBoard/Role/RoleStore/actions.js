// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const toggle_dialog = ({ commit }) => {
    commit('toggle_dialog')
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const set_edit_item = ({ commit },item) => {
    commit('set_edit_item',item)
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const get_roles_list = ({ commit }, page) => {
    return new Promise((resolve, reject) => {
        axios.get(`api/roles?page=${page}`).then(response => {
            // Response data store the state array through mutation
            commit('set_all_roles', response.data)
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const add_new_role = ({ commit }, item) => {
    return new Promise((resolve, reject) => {
        axios.post('api/roles',item).then(response => {
            // Response data store the state array through mutation
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const update_role = ({ commit }, item) => {
    return new Promise((resolve, reject) => {
        axios.put(`api/roles/${item.id}`,item).then(response => {
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const delete_role = ({ dispatch }, id) => {
    return new Promise((resolve, reject) => {
        axios.delete(`api/roles/${id}`).then(response => {
            dispatch('get_roles_list');
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const get_active_roles = ({ commit }) => {
    return new Promise((resolve, reject) => {
        axios.get('api/roles/active').then(response => {
            commit('set_all_roles', response.data)
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}