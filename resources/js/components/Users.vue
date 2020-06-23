<template>
    <div>
        
    </div>
</template>
<script>

import {mapActions, mapGetters} from 'vuex';

export default {
    name:'Users',
    components:{

    },

    computed:mapGetters(['allUsers']),

    methods: {
        ...mapActions(['fetchUsers', 'deleteUser'])
    },

    created() {
        this.fetchUsers();
    },
}
</script>
<style lang="sass" scoped>

</style>