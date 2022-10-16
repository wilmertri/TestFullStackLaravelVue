<template>
	<Nav />
	<section class="section">
		<router-view />
	</section>
	<footer class="footer">
		<p class="has-text-centered">Copyright (c) 2021</p>
	</footer>
</template>
<script>
import axios from 'axios'
import Nav from "./components/Nav.vue";
export default {
    data() {
        return {
            showMobileMenu: false,
        };
    },
    async created() {
		try {
			const bodyParameters = {};
			const response = await axios.get(`api/v1/user`, bodyParameters);
			this.$store.dispatch('user', response.data);
		}catch(error){
			console.log(error);
		}
    },
    methods: {
    },
    components: { Nav }
}
</script>
<style lang="scss">
@import '../node_modules/bulma';
</style>
