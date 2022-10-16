<template>
    <nav class="navbar is-dark">
        <div class="navbar-brand">
            <router-link to="/" class="navbar-item"> <strong>Store</strong> </router-link>
            <a class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar-menu" @click="showMobileMenu = !showMobileMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu" id="navbar-menu" v-bind:class="{'is-active': showMobileMenu }">
            <div v-if="user" class="navbar-start">
                <router-link to="/home" class="navbar-item"> Pedidos </router-link>
                <router-link to="/productos" class="navbar-item"> Productos </router-link>
            </div>
            <div class="navbar-end">
                <div v-if="user" class="navbar-item">
                    Usuario: {{user.email}} 
                </div>
                <div v-if="user" class="navbar-item">
                    <div class="buttons">
                        <a href="#" class="button is-light" @click="logout">Cerrar Sesión</a>
                    </div>
                </div>
                <div v-if="!user" class="navbar-item">
                    <div class="buttons">
                        <router-link to="/log-in" class="button is-light">Iniciar Sesión</router-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>
<script>
import {mapGetters} from 'vuex'
import axios from 'axios'
export default {
    name: 'Nav',
    props: [
        'showMobileMenu',
    ],
    data(){
		return {
		}
	},
    methods: {
        async logout(){
            const token = localStorage.getItem('token');
            const bodyParameters = {};
            const config = {
                headers: { Authorization: `Bearer ${token}` }
            };
            await axios.post(`api/v1/logout`, bodyParameters, config);
            localStorage.removeItem('token');
            this.$store.dispatch('user', null);
            this.$router.push('/');
        }
    },
    computed: {
        ...mapGetters(['user'])
    }
}
</script>