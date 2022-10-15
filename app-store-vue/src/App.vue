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
				<div class="navbar-start">
					<div class="navbar-item">
					</div>	
				</div>
				<div class="navbar-end">
					<router-link to="/" class="navbar-item"> Pedidos </router-link>
					<router-link to="/productos" class="navbar-item"> Productos </router-link> 
					<div class="navbar-item">
						<div class="buttons">
							<router-link to="/log-in" class="button is-light"> Log in</router-link>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="is-loading-bar has-text-centered">
			<div class="lds-dual-ring"></div>
		</div>
		<section class="section">
			<router-view/>
		</section>
		<footer class="footer">
			<p class="has-text-centered">Copyright (c) 2021</p>
		</footer>
</template>
<script>
export default {
	data(){
		return {
			showMobileMenu: false
		}
	}
}
</script>
<style lang="scss">
@import '../node_modules/bulma';
</style>
