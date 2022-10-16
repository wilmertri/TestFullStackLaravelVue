import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Producto from '../views/ProductoView.vue'
import Productos from '../views/ProductosView.vue'
import Login from '../views/LoginView.vue'
import IndexView from '../views/IndexView.vue'

const routes = [
  {
    path: '/',
    name: 'index',
    component: IndexView
  },
  {
    path: '/home',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/pedido/:pedido',
    name: 'Producto',
    component: Producto
  },
  {
    path: '/productos',
    name: 'Productos',
    component: Productos
  },
  {
    path: '/log-in',
    name: 'Login',
    component: Login
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
