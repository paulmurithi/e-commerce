<template>
    <div>
        
    </div>
</template>
<script>

import {mapActions, mapGetters} from 'vuex';

export default {
    name:'Roles',
    components:{

    },

    computed:mapGetters(['allRoles']),

    methods: {
        ...mapActions(['fetchRoles', 'deleteRole'])
    },
    
    created() {
        this.fetchRoles();
    },
}
</script>
<style lang="sass" scoped>

</style>