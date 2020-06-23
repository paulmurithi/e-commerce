<template>
    <div>
        
    </div>
</template>
<script>

import {mapActions} from 'vuex';

export default {
    name:'AddRole',
    components:{

    },

    data() {
        return {
            name:''
        }
    },

    methods: {
        ...mapActions(['addRole'])
    }
}
</script>
<style lang="sass" scoped>

</style>