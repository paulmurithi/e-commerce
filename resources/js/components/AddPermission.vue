<template>
    <div>
        
    </div>
</template>
<script>

import {mapActions} from 'vuex';

export default {
    name:'AddPermission',
    components:{

    },

    methods: {
        ...mapActions(['addPermission'])
    }
}
</script>
<style lang="sass" scoped>

</style>