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
        ...mapActions(['fetchRoles'])
    },
    
    created() {
        this.fetchRoles();
    },
}
</script>
<style lang="sass" scoped>

</style>