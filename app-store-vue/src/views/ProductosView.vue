<template>
    <div class="productos">
		<div class="container has-text-centered">
			<div class='columns is-centered'>
      			<div class='column is-12'>
                    <table class="table has-text-centered is-fullwidth is-bordered is-centered">
						<thead>
                            <tr>
                                <th colspan="7"><h3 class="is-size-3 has-text-centered">Listado Productos</h3></th>
                            </tr>
							<tr class="has-text-centered">
								<th>Código</th>
								<th>Nombre</th>
                                <th>Descripción</th>
								<th>Precio de venta</th>
								<th>Precio de compra</th>
								<th>Cantidad en Stock</th>
								<th>Proveedor</th>
							</tr>
						</thead>
						<tbody>
                            <tr v-for="producto in productos" :key="producto.id">
								<td>{{ producto.codigo }}</td>
								<td>{{ producto.nombre }}</td>
                                <td>{{ producto.descripcion }}</td>
								<td>{{ producto.precio_venta }}</td>
								<td>{{ producto.precio_compra }}</td>
                                <td>{{ producto.cantidad_stock }}</td>
								<td>{{ producto.proveedor }}</td>
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
    name: 'ProductosView',
	data(){
		return {
			productos: [],
		}
	},	
    components: {
    },
	mounted(){
		this.getProductos();
		document.title = 'Productos | Store'
	},
	methods:{
		getProductos() {
			axios.get(`api/v1/productos`).then(response => {
				this.productos = response.data.data
			}).catch(error => {
				console.log(error);
			});
		}
	}
}
</script>