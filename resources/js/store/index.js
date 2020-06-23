import Vue from 'vue';
import Vuex from 'vuex';

// import modules
import Users from './modules/Users';
import Roles from './modules/Roles';
import Permissions from './modules/Permissions';

Vue.use(Vuex);

export default Vuex.Store({
    state:{},
    getters:{},
    mutations:{},
    actions:{},
    modules:{
        Users,
        Roles,
        Permissions
    }
});