import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Dashboard from '../views/Dashboard.vue';
import Editar from '../views/Editar.vue';
import Nuevo from '../views/Nuevo.vue';
import Registro from '../views/Registro.vue';
import Portada from '../views/Portada.vue';
import Usuarios from '../views/Usuarios.vue';
import Portada from '../views/Portada.vue'
Vue.use(VueRouter)

const routes = [
  {
    path: '/admin',
    name: 'Home',
    component: Home
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard
  },
  {
    path: '/editar/:id',
    name: 'Editar',
    component: Editar
  },
  {
    path: '/nuevo',
    name: 'Nuevo',
    component: Nuevo
  },
  {
    path:'/registro',
    name:'Registro',
    component:Registro
  },
  {
    path:'/usuarios',
    name:'Usuarios',
    component:Usuarios
    },
  {
  path:'/',
  name:'Portada',
  component:Portada
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router

