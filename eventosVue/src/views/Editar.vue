<template>
        <div>
          <Header />
            <div class="container">
                <form action="" class="form-horizontal">
                    <div class="form-group left">
                       <label for="" class="control-label col-sm-2">Nombre</label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control" name="nombre" id="nombre" v-model="form.nombres">
                            <br>
                            <span class="text-danger" v-if="errores.nombres">{{errores.nombres[0]}}</span>
                       </div>
                    </div>
                     <div class="form-group left">
                       <label for="" class="control-label col-sm-2">Apellidos</label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control" name="direccion" id="direccion" v-model="form.apellidos">
                          <br>
                            <span class="text-danger" v-if="errores.apellidos">{{errores.apellidos[0]}}</span>
                       </div>
                    </div>
                    <div class="form-group left row">
                      <div class="col">
                            <label for="" class="control-label col-sm-3">Telefono</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="correo" id="correo" v-model="form.telefono">
                                <br>
                                <span class="text-danger" v-if="errores.telefono">{{errores.telefono[0]}}</span>
                            </div>
                        </div>
                        <div class="col">
                          <label for="" class="control-label col-sm-5">Correo</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="correo" id="codigopostal" v-model="form.correo">
                              <br>
                              <span class="text-danger" v-if="errores.correo">{{errores.correo[0]}}</span>
                          </div>
                        </div> 
                        <div class="alert alert-danger" role="alert" v-if="alerta">
                   {{alert_msg}}
                </div>

                    </div>
                 
                   <div class="form-group">
                      <button type="button" class="btn btn-primary" v-on:click="editar()" >Editar</button>
                      <button type="button" class="btn btn-danger margen" v-on:click="eliminar()" >Eliminar</button>
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
  name:"Editar",
  components:{
    Header,
  },
  data:function(){
    return {
      id:null,
        alerta: false,
      alert_msg: "tus datos han sido actualizados exitosamente",
    
  form:{
         "nombres":"",
        "apellidos":"",
        "telefono":"",
        "correo":"",
         "estado_id":1  
        },
   formDisconnect:{
     "estado_id":2
   },
   errores:{}     
    }
  },
  methods:{
      editar(){
          this.form.id = this.$route.params.id;
          axios.put("http://127.0.0.1:8000/api/usuarios/"+this.form.id,this.form)
          .then( data =>{
           console.log(data);
            this.$toaster.success('editar con exito.');
            this.$router.push('/dashboard');  
          }).catch( e =>{
              if(e.response.data){
                this.errores = e.response.data.errors
              }
                // console.log(e.response.data);
                //  this.makeToast("Error","Error al guardar","error");
            })
          
      },
      salir(){
        this.$router.push("/dashboard");
      },
      eliminar(){
         this.form.id = this.$route.params.id;
        axios.put("http://127.0.0.1:8000/api/usuarios/"+this.form.id,this.formDisconnect)
        .then( datos => {
            console.log(datos);
              this.$toaster.success('el usuario fue dado de baja con exito.');
             this.$router.push("/dashboard"); 
        });

      }
  },
  mounted:function(){
      this.form.id = this.$route.params.id;
      console.log(this.form.id)
      axios.get("http://127.0.0.1:8000/api/usuarios/"+ this.form.id)
      .then( datos => {    
        console.log(datos);
       this.form.nombres=datos.data.nombres;
      this.form.apellidos=datos.data.apellidos;
      this.form.telefono=datos.data.telefono;
      this.form.correo=datos.data.correo;
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
</style>