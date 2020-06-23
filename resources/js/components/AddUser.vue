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

    methods: {
        ...mapActions(['addUser'])
    }
}
</script>
<style lang="sass" scoped>

</style>