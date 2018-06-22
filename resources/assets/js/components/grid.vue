<template>
    <div :style="'grid-area: ' + position" :class="'bg-' + color">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: ['position', 'color'],
    };
</script>