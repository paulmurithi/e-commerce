<template>
    <div>
        
    </div>
</template>
<script>

import {mapActions, mapGetters} from 'vuex';

export default {
    name:'Permissions',
    components:{

    },

    computed:mapGetters(['allPermissions']),

    methods: {
        ...mapActions(['fetchPermissions'])
    },
    
    created() {
        this.fetchPermissions();
    },
}
</script>
<style lang="sass" scoped>

</style>