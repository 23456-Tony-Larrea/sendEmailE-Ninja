<template>
        <div>
          <Header />
            <div class="container">

                <form action="" class="form-horizontal">
                    <div class="form-group left">
                       <label for="" class="control-label col-sm-2">Nombre</label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="nombre" id="nombre" v-model="form.name">
                       </div>
                       <label for="" class="control-label col-sm-2">Correo</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="email" id="email" v-model="form.email">
                       </div>
                    </div>

          <div class="form-group left">
        <label for="">Contraseña</label>
        <input type="password" class="form-control" id="pass1" v-model="form.password">
    </div>
    <div class="form-group left">
        <label for="">Vuelve a escribir la Contraseña</label>
        <input type="password" class="form-control" id="pass2" v-model="password2" >
    </div>

                        <div class="alert alert-danger" role="alert" v-if="alerta">
                   {{alert_msg}}
                      
                    </div>
                 
                   <div class="form-group">
                      <button type="button" class="btn btn-primary" v-on:click="editar()">Guardar</button>
                      <button type="button" class="btn btn-dark margen" v-on:click="salir()"  >Salir</button>
                  </div> 
                </form>
            </div>
        </div>
    
</template>
<script>
import Header from '@/components/HeaderAdmin.vue';
import axios from 'axios';


export default {
  name:"Profile",
  components:{
    Header,
  },
  data:function(){
    return {
      id:null,
      alerta: false,
      alert_msg: "Tu contraseña ha sido actualizada exitosamente",
      password2:null,
      usuario:null,
  form:{
        "name":"",
        "email":"",
        "password":"",
        },     
    }
  },
  methods:{
      editar(){
        if(this.form.password==this.password2){
        this.form.id = this.$route.params.id;
          axios.put("http://127.0.0.1:8000/api/user/"+this.form.id,this.form)
          .then( data =>{
           console.log(data);
            this.$toaster.success('Su contraseña a sido cambiada con exito!.');
            this.$router.push('/dashboard/'+data);
               
          })
        }else{
          this.$toaster.error('Por favor asegurese de que las contraseñas esten llenas o esten iguales para el cambio de contraseña');
        }
      },
      salir(){
        this.$router.push("/dashboard/"+this.form.id);
      },

  },
  mounted:function(){
      this.form.id = this.$route.params.id;
      console.log(this.form.id)
      axios.get("http://127.0.0.1:8000/api/user/"+ this.form.id)
      .then( datos => {    
        console.log(datos);
       this.form.name=datos.data.name;
       this.form.email=datos.data.email;
     })
     
  } 
}
 
</script>
<style scoped>
 .left{
   text-align: left;
 };
 .margen{
   margin-left: 15px;
   margin-right: 15px;
 }
 .ocultar {
    display: none;
}
 
.mostrar {
    display: block;
}
</style>