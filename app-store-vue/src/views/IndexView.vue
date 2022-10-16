<template>
    <section class="hero is-small is-dark">
        <div class="hero-body has-text-centered">
            <p class="title">
                Bienvenido <span v-if="user">{{ user.name }}</span>!
            </p>
            <p class="subtitle">
                El mejor sitio de administración
            </p>
        </div>
    </section>
</template>
<script>
    import {mapGetters} from 'vuex'
    export default {
        name: 'IndexView',
        computed: {
            ...mapGetters(['user'])
        }
    }
</script>