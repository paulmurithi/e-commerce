<template>
    <div>
        
    </div>
</template>
<script>

import {mapActions} from 'vuex';

export default {
    name:'AddUser',
    components:{

    },

    data() {
        return {
            name:'',
            email:'',
            password:'',
            password_confirm:''
        }
    },

    methods: {
        ...mapActions(['addUser'])
    }
}
</script>
<style lang="sass" scoped>

</style>