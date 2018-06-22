<template>
    <grid :position="position" :color="color">
        <div>{{ val }}</div>
        <div v-if="value">{{ value }}</div>
    </grid>
</template>

<script>
    import grid from './grid.vue';

    export default {
        components: {
            grid,
        },
        props: {
            position: {
                type: String,
                default: '1 / 1 / span 1 / span 1',
            },
            color: {
                type: String,
                default: 'grey',
            },
            val: {
                type: String,
                default: '',
            }
        },
        data () {
            return {
                value: '',
            }
        }
    }
</script>
