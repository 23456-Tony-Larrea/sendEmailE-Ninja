import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home.vue';
import Dashboard from '../views/Dashboard.vue';
import Editar from '../views/Editar.vue';
import Nuevo from '../views/Nuevo.vue';
import RegisterUser from '../views/RegisterUser.vue';
import Portada from '../views/Portada.vue';
import CreateAdmin from '../views/CreateAdmin.vue';
import ForgotPassword from '../views/ForgotPassword.vue';
import Profile from '../views/Profile.vue';
import CompartirEventos from '../views/CompartirEventos.vue';
Vue.use(VueRouter)

const routes = [
  {
    path: '/admin',
    name: 'Home',
    component: Home
  },
  {
    path: '/dashboard/:id',
    name: 'Dashboard',
    component: Dashboard
  },
  {
    path: '/dashboard/:idprofile/editar/:id',
    name: 'Editar',
    component: Editar
  },
  {
    path: '/nuevo/:id',
    name: 'Nuevo',
    component: Nuevo
  },
  {
    path:'/registerUser',
    name:'RegisterUser',
    component:RegisterUser
  },
  
  {
  path:'/',
  name:'Portada',
  component:Portada
  },
  {
  path:'/createAdmin',
  name:'CreateAdmin',
  component: CreateAdmin
  },

  {
    path:'/forgotPassword',
    name:'ForgotPassword',
    component: ForgotPassword
    },

    {
      path:'/profile/:id',
      name:'Profile',
      component: Profile
      },
      {
        path:'/compartirEventos',
        name:'CompartirEventos',
        component: CompartirEventos
        },
        {
          path: '/profile/:3',
          name: 'profile',
          component: Profile
        }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router 

