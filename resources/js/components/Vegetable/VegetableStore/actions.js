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
export const get_vegetable_list = ({ commit }, page) => {
    return new Promise((resolve, reject) => {
        axios.get(`api/vegetables?page=${page}`).then(response => {
            // Response data store the state array through mutation
            commit('set_all_vegetables', response.data)
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const add_new_vegetable = ({ commit }, item) => {
    return new Promise((resolve, reject) => {
        axios.post('api/vegetables',item).then(response => {
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
export const update_vegetable = ({ commit }, item) => {
    return new Promise((resolve, reject) => {
        axios.put(`api/vegetables/${item.id}`,item).then(response => {
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const delete_vegetable = ({ dispatch }, id) => {
    return new Promise((resolve, reject) => {
        axios.delete(`api/vegetables/${id}`).then(response => {
            dispatch('get_vegetable_list');
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}