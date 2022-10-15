<template>
    <div class="producto">
		<div class="container has-text-centered">
			<div class='columns is-centered'>
      			<div class='column is-8'>
					<table class="table has-text-centered is-fullwidth is-bordered is-centered">
						<thead class="has-text-centered">
                            <tr>
                                <th colspan="5"><h3 class="is-size-3 has-text-centered">Pedido</h3></th>
                            </tr>
							<tr class="has-text-centered">
								<th>Código</th>
								<th>Fecha de Entrega</th>
								<th>Dirección de Entrega</th>
								<th>Prioridad</th>
								<th>Entregado</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
								<td>{{pedido.codigo}}</td>
								<td>{{pedido.fecha_entrega}}</td>
								<td>{{pedido.direccion_entrega}}</td>
								<td>{{pedido.prioridad}}</td>
								<td>{{pedido.entregado}}</td>
							</tr>
						</tbody>
					</table>
                    
				</div>
			</div>
		</div>
        <div class="container has-text-centered">
			<div class='columns is-centered'>
      			<div class='column is-8'>
                    <table class="table has-text-centered is-fullwidth is-bordered is-centered">
						<thead>
                            <tr>
                                <th colspan="6"><h3 class="is-size-3 has-text-centered">Productos de Pedido</h3></th>
                            </tr>
							<tr class="has-text-centered">
								<th>Código</th>
								<th>Nombre</th>
								<th>Precio de venta</th>
                                <th>Cantidad solicitada</th>
								<th>Cantidad en Stock</th>
								<th>Abastecer</th>
							</tr>
						</thead>
						<tbody>
                            <tr v-for="producto in productos" :key="producto.producto.id">
								<td>{{ producto.producto.codigo }}</td>
								<td>{{ producto.producto.nombre }}</td>
								<td>{{ producto.producto.precio_venta }}</td>
                                <td>{{ producto.producto.pivot.cantidad }}</td>
								<td>{{ producto.cantidad }}</td>
								<td>{{ producto.abastecer }}</td>
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
    name: 'ProductoView',
	data(){
		return {
            pedido: {},
			pedido_id: this.$route.params.pedido,
			productos: [],
		}
	},	
    components: {
    },
	mounted(){
        this.getPedido();
		this.getProductos();
		document.title = 'Productos | Store'
	},
	methods:{
        getPedido() {
			axios.get(`api/v1/pedidos/${this.pedido_id}`).then(response => {
				this.pedido = response.data.data
                console.log(response.data.data);
			}).catch(error => {
				console.log(error);
			});
		},
		getProductos() {
			axios.get(`api/v1/pedidos/alistamiento/${this.pedido_id}`).then(response => {
				this.productos = response.data
			}).catch(error => {
				console.log(error);
			});
		}
	}
}
</script>