<template>
    <div>
        <p>{{ prototipo.Serial }}</p>
        <p>{{ prototipo.Modelo }}</p>
    </div>
</template>

<script>
export default {
    props: ['prototipo'],
}
</script>