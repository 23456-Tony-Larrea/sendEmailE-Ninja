<template>

<div>
  <b-navbar toggleable="lg" type="dark" variant="info" style="background-color: #ff5f45!important;">
    <img src="@/assets/ninja.png" id="icon" alt="User Icon" class="imagen"/>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            <em>User</em>
          </template>
          <b-dropdown-item href="/admin">Salir</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
    
</template>
<!-- <script>
import axios from 'axios';
export default {
  
  name:"Profile",
  
  data:function(){
    return {
      id:null,
      Listauser:null,
    form:{
      "id":"",
      "email":"",
     "password":""
  },
  }
    },
  methods:{
  editar(id){
                this.$router.push('/profile/' + id);
  },
  },
 
 mounted:function(){
      this.form.id=this.$route.params.id
        let direccion = "http://127.0.0.1:8000/api/user/"+this.form.id;
        axios.get(direccion).then( data =>{
            console.log(data.data);
        });
    }, 
}
</script>-->
<style scoped>
.imagen{
 width:10%;
height:10%;
}
</style>