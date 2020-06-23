import axios from 'axios';

const state = {
    users:[],
};
const getters = {
    allUsers:(state)=>state.users,
};
const actions = {
    async fetchUsers({commit}){
        const response = await axios.get('api/users');
        commit('SET_USER',response.data);
    },
    async  addUser({commit}, user){
        const response = await axios.post('api/users', user);
        commit('ADD_USER', response.data);
    },
    async editUser({commit}, updatedUser){
        const response = await axios.put(`api/users/${updatedUser.id}`, updatedUser);
        commit('EDIT_USER', response.data);
    },
    async deleteUser({commit}, id){
        await axios.delete(`api/users/${id}`);
        commit('DELETE_USER', id);
    }
};
const mutations = {
    SET_USERS:(state, users)=>state.users = users,

    ADD_USER:(state, user)=>state.users.unshift(user),

    EDIT_USER:(state, updatedUser)=>{
        const index = state.users.findIndex(user=>user.id == updatedUser.id);
        if(index!==-1){
            state.users.splice(index, 1, updatedUser);
        }
    },
    DELETE_USER:(state, id)=>state.users.filter(user=>user.id==id)
};

export default{
    state,
    getters,
    mutations,
    actions
}