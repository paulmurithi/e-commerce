import axios from 'axios';

const state = {
    permissions:[]
};

const getters = {
    allPermissions:state=>state.permissions
};

const actions = {
    async fetchPermissions({commit}){
        const response = await axios.get('api/permissions');
        commit('SET_PERMISSIONS', response.data);
    },

    async addPermission({commit}, permission){
        const response = await axios.post('api/permissions', permission);
        commit('ADD_PERMISSION', response.data);
    },

    async editPermission({commit}, updatedPermission){
        const response = await axios.put(`api/permissions/${updatedPermission.id}`, updatedPermission);
        commit('EDIT_PERMISSION', response.data);
    },

    async deletePermission({commit}, id){
        const response = await axios.delete(`api/permissions/${id}`);
        commit('DELETE_PERMISSION', id);
    },
};

const mutations = {
    SET_PERMISSIONS:(state, permissions)=>state.permissions = permissions,

    ADD_PERMISSION:(state, permission)=>state.permissions.unshift(permission),

    EDIT_PERMISSION: (state, updatedPermission)=>{
        const index = state.permissions.findIndex(permission=>permission.id==updatedPermission.id);
    },
    
    DELETE_PERMISSION: (state, id)=>state.permissions.filter(permission=>permission.id==id)
};

export default{
    state,
    getters,
    mutations,
    actions
}