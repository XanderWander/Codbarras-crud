<template>
    <div>
        <h1>Blog</h1>
        <PrototipoComponent v-for="prototipo in prototipo" :key="prototipo.id" :prototipo="prototipo" />
    </div>
</template>

<script>

import PrototipoComponent from './components/PrototipoComponent.vue';

export default {
    components: { PrototipoComponent },
    data() {
        return {
            prototipo: [],
        }
    },
    mounted() {
        fetch('http://localhost:8000/api/prototipo/')
            .then(response => response.json())
            .then(data => {
                this.prototipo = data;
            });
    },
}
</script>