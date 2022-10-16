<template>
    <div class="home">
		<div class="container has-text-centered">
			<div class='columns is-mobile is-centered'>
				<div class='column is-10'>
					<h3 class="is-size-2 has-text-centered">Ultimos pedidos solicitados</h3>
					<div class="mb-4">
						<h4 class="is-size-4">Buscar pedidos por fecha</h4>
						<form action="" method="get">
							<div class="columns">
								<div class="column is-10">
									<input v-model="fecha" class="input is-normal" type="date" placeholder="Small input" />
								</div>
								<div class="column is-2">
									<a href="#" class="button is-normal is-primary is-fullwidth" @click="getPedidoPorFecha">Buscar</a>
								</div>
							</div>
						</form>
					</div>
					<table class="table has-text-centered is-fullwidth is-bordered is-centered">
						<thead>
							<tr>
								<th>Código</th>
								<th>Fecha de Entrega</th>
								<th>Dirección de Entrega</th>
								<th>Prioridad</th>
								<th>Entregado</th>
								<th>Productos</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="pedido in ultimosPedidos" :key="pedido.id">
								<td>{{pedido.codigo}}</td>
								<td>{{pedido.fecha_entrega}}</td>
								<td>{{pedido.direccion_entrega}}</td>
								<td>{{pedido.prioridad}}</td>
								<td>{{pedido.entregado}}</td>
								<td><router-link :to="{ path: 'pedido/' + pedido.id }" class="button is-small is-primary mt-2">Alistamiento Productos</router-link></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'HomeView',
	data(){
		return {
			ultimosPedidos: [],
			fecha: ""
		}
	},	
    components: {
    },
	mounted(){
		this.getUltimosPedidos();
		document.title = 'Home | Store'
	},
	methods:{
		getUltimosPedidos() {
			axios.get('api/v1/pedidos').then(response => {
				this.ultimosPedidos = response.data.data
				this.links = response.data.links
				this.metaLinks = response.data.meta
			}).catch(error => {
				console.log(error);
			});
		},
		getPedidoPorFecha(){
			axios.get('api/v1/pedidos/buscar-pedido/' + this.fecha).then(response => {
				this.ultimosPedidos = response.data.data
				this.links = response.data.links
				this.metaLinks = response.data.meta
			}).catch(error => {
				console.log(error);
			});
		}
	}
}
</script>
