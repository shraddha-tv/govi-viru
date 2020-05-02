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
export const get_category_list = ({ commit }, page) => {
    return new Promise((resolve, reject) => {
        axios.get(`api/category?page=${page}`).then(response => {
            // Response data store the state array through mutation
            commit('set_all_category', response.data)
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const add_new_category = ({ commit }, item) => {
    return new Promise((resolve, reject) => {
        axios.post('api/category',item).then(response => {
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
export const update_category = ({ commit }, item) => {
    return new Promise((resolve, reject) => {
        axios.put(`api/category/${item.id}`,item).then(response => {
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const delete_category = ({ dispatch }, id) => {
    return new Promise((resolve, reject) => {
        axios.delete(`api/category/${id}`).then(response => {
            dispatch('get_category_list');
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}

// **********************************************************************************************************
//                           Get all Banks in database with Pagination
// **********************************************************************************************************
export const search_category = ({ commit }, query) => {
    return new Promise((resolve, reject) => {
        axios.get('api/category/search',{params: { searchquery: query }}).then(response => {
            commit('set_all_category', response.data)
            resolve(response.data);
        }, error => {
            reject(error);
        })
    })
}