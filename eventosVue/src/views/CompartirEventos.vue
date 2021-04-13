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
                       <label for="" class="control-label col-sm-2"><h5 style="color: white">Nombre</h5></label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control"  name="nombre" id="nombre" v-model="form.nombre">
<br>
                    <span class="text-danger" v-if="errores.nombre">{{errores.nombre[0]}}</span>
                       </div>
                       <label for="" class="control-label col-sm-2"><h5 style="color: white">Correo</h5></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  name="email" id="email" v-model="form.email">
                       </div>
                       <label for="" class="control-label col-sm-4"><h5 style="color: white">Título de Evento</h5></label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control"  name="titulo" id="titulo" v-model="form.tituloEvento">
                       </div>
                       <label for="" class="control-label col-sm-4"><h5 style="color: white">Temática de Evento</h5></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  name="tematica" id="tematica" v-model="form.tematicaEvento">
                       </div>
                        <label for="" class="control-label col-sm-4"><h5 style="color: white">Enlace del Evento</h5></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  name="enlace" id="enlace" v-model="form.enlaceEvento">
                       </div>
                       <label for="" class="control-label col-sm-2"><h5 style="color: white">Fecha</h5></label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control"  name="Fecha" id="Fecha" v-model="form.fechaEvento">
                       </div>
                        <label for="" class="control-label col-sm-4"><h5 style="color: white">Descripción</h5></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"  name="descricion" id="decripcion" v-model="form.descripciónEvento">
                          <br>

                          <button type="button" class="button" v-on:click="guardar()">Enviar</button>
                       </div>
                    </div>
                    

                        <div class="alert alert-danger" role="alert" v-if="alerta">
                   {{alert_msg}}
                      
                    </div>
                 
                      
                 
                </form>
                <br>
            </div>
        </div>
        </div>
    
</template>
<script>
import Header from '@/components/Header.vue';
import axios from 'axios';


export default {
  name:"CompartirEventos",
  components:{
    Header,
  },
  data:function(){
    return {
      alerta: false,
      alert_msg: "Tu evento ha sido guardado",
  form:{
        "nombre":"",
        "email":"",
        "tituloEvento":"",
        "tematicaEvento":"",
       "enlaceEvento":"",
        "fechaEvento":"",
        "descripcionEvento":"",

 }, 
 errores:{}    
    }
  },
   methods:{
       guardar(){
            axios.post("http://127.0.0.1:8000/api/postUser",this.form)
            .then(data =>{
                console.log(data);
                this.makeToast("Hecho","evento guardado","success");
            }).catch( e =>{
              if(e.response.data){
                this.errores = e.response.data.errors
              }
               
            })
            },

             makeToast(titulo,texto,tipo) {
            this.toastCount++
            this.$bvToast.toast(texto, {
            title: titulo,
            variant: tipo,
            autoHideDelay: 5000,
            appendToast: true
            })
        }
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
.button {
  display: inline-block;
  padding: 1% 48%;
  font-size: 15px;
  cursor: pointer;
  text-align: center;	
  text-decoration: none;
  outline: none;
  color: #FFFAF0;
  background-color: #000000;
  border: none;
  box-shadow: 0 9px #808080;
}
</style>