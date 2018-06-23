<template>
    <grid :position="position" :color="color" class="flex flex-col border border-black">
        <div class="bg-black text-white p-2 text-center text-xs">{{ property }}</div>
        <div class="flex items-center justify-center h-full text-center font-bold">
            <div v-if="value">{{ value }}</div>
        </div>
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
            property: {
                type: String,
                default: '',
            }
        },
        data () {
            return {
                value: ''
            }
        },
        created: function() {
            this.listen();
        },
        methods: {
            listen() {
                window.Echo.channel(`dashboard-data`)
                    .listen('.data-was-fetched', (event) => {
                        this.value = event.data[this.property];
                    });
            }
        }
    }
</script>
