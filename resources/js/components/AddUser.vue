<template>
    <div>
        
    </div>
</template>
<script>

import {mapGetters, mapActions} from 'vuex';

export default {
    name:'AddUser',
    components:{

    },

    data() {
        return {
            name:'',
            email:'',
            roles:[],
            password:'',
            password_confirm:''
        }
    },

    computed: {
        ...papGetters(['allRoles'])
    },

    methods: {
        ...mapActions(['fetchRoles', 'addUser'])
    }
}
</script>
<style lang="sass" scoped>

</style>