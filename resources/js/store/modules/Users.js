import axios from 'axios';

const state = {
    users:[],
};
const getters = {
    allUsers(state){
        return state.users
    },
};
const actions = {};
const mutations = {};

export default{
    state,
    getters,
    mutations,
    actions
}