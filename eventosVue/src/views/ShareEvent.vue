<template>
        <div>
          <Header />
          <div class="site-wrapper">
            <div class="container">

                <form action="" class="form-horizontal">
                <div class="fadeIn first">
                <h1 style="color: white"> <strong>COMPARTE TU EVENTO</strong></h1> 
                   <h3 style="color: white"> Les invitamos a compartir sus eventos de impacto social.</h3>
                     <h3 style="color: white"> Nosotros lo enviaremos a la comunidad de<strong> eventos.ninja</strong></h3>
                     <h3 style="color: white">que crece día a día.</h3>
                </div>
                
                    <div class="form-group left">
                       <label for="" class="control-label col-sm-2"><h6 style="color: white">Nombre</h6></label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="nombre" id="nombre" v-model="form.name">
                       </div>
                       <label for="" class="control-label col-sm-2"><h6 style="color: white">Correo</h6></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="email" id="email" v-model="form.email">
                       </div>
                       <label for="" class="control-label col-sm-2"><h6 style="color: white">Título de Evento</h6></label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="titulo" id="titulo" v-model="form.TítulodeEvento">
                       </div>
                       <label for="" class="control-label col-sm-2"><h6 style="color: white">Temática de Evento</h6></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="tematica" id="tematica" v-model="form.TemáticadeEvento">
                       </div>
                        <label for="" class="control-label col-sm-2"><h6 style="color: white">Enlace del Evento</h6></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="enlace" id="enlace" v-model="form.EnlacedelEvento">
                       </div>
                       <label for="" class="control-label col-sm-2"><h6 style="color: white">Fecha</h6></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="Fecha" id="Fecha" v-model="form.Fecha">
                       </div>
                        <label for="" class="control-label col-sm-2"><h6 style="color: white">Descripción</h6></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled name="descricion" id="decripcion" v-model="form.Descripción">
                       </div>
                    </div>
                    

                        <div class="alert alert-danger" role="alert" v-if="alerta">
                   {{alert_msg}}
                      
                    </div>
                 
                   <div class="form-group">
                      <button type="button" class="btn btn-primary" v-on:click="editar()">Enviar</button>
                  </div> 
                </form>
            </div>
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
.site-wrapper {
  background-color: #ff5f45;
}
.container{
background-color: #ff5f45;
}
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
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
  height: 30%;

}
</style>