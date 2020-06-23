import axios from 'axios';

const state = {
    roles:[]
};
const getters = {
    allRoles: state=>state.roles
};
const actions = {
    async fetchRoles({commit}){
        const response = axios.get('api/roles');
        commit('SET_ROLES', response.data);
    },
    async addRole({commit}, role){
        const response = axios.get('api/roles', role);
        commit('ADD_ROLE', response.data);
    },
    async editRole({commit}, updatedRole){
        const response = axios.get(`api/roles/${updatedRole.id}`, updatedRole);
        commit('EDIT_ROLE', response.data);
    },
    async deleteRole({commit}, id){
        const response = axios.delete(`api/roles/${id}`, id);
        commit('DELETE_ROLE', id);
    }
};
const mutations = {
    SET_ROLES:(state, roles)=>state.users = roles,

    ADD_ROLE:(state, role)=>state.roles.unshift(role),

    EDIT_ROLE:(state, updatedRole)=>{
        const index = state.roles.findIndex(role=>role.id==updatedRole.id);
        if(index!==-1){
            state.roles.splice(index, 1, updatedRole);
        }
    },
    
    DELETE_ROLE:(state, id)=>state.roles.filter(role=>role.id==id)
};

export default{
    state,
    getters,
    mutations,
    actions
}