<template>
    <div>
        
    </div>
</template>
<script>

import {mapGetters, mapActions} from 'vuex';

export default {
    name:'AddRole',
    components:{

    },

    data() {
        return {
            name:''
        }
    },
    computed: {
        ...mapGetter(['allPermissions'])
    },
    methods: {
        ...mapActions(['addRole', 'FetchPermissions'])
    }
}
</script>
<style lang="sass" scoped>

</style>