<template>
        <div>
          <Header />
            <div class="container">
                <form action="" class="form-horizontal">
                    <div class="form-group left">
                       <label for="" class="control-label col-sm-2">Nombre</label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control" name="nombre" id="nombre" v-model="form.nombres">
                       </div>
                    </div>
                    <div class="form-group left">
                       <label for="" class="control-label col-sm-2">Apellidos</label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control" name="direccion" id="direccion" v-model="form.apellidos">
                       </div>
                    </div>
                    <div class="form-group left row">
                      <div class="col">
                            <label for="" class="control-label col-sm-3">Telefono</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="correo" id="correo" v-model="form.telefono">
                            </div>
                        </div>
                        <div class="col">
                          <label for="" class="control-label col-sm-5">Correo</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="codigopostal" id="codigopostal" v-model="form.correo">
                          </div>
                        </div> 
                    </div>
                 
                   <div class="form-group">
                      <button type="button" class="btn btn-primary" v-on:click="editar()" >Editar</button>
                      <button type="button" class="btn btn-danger margen" v-on:click="eliminar()" >Eliminar</button>
                      <button type="button" class="btn btn-dark margen" v-on:click="salir()"  >Salir</button>
                    </div> 
                </form>
            </div>
          <!-- <Footer />   -->
        </div>
    
</template>
<script>
import Header from '@/components/Header.vue';
import axios from 'axios';
export default {
  name:"Editar",
  components:{
    Header,

  },
  data:function(){
    return {
        form:{
          "id":"",
          "nombres" : "",
          "apellidos": "", 
          "telefono" : "",
          "correo":"",
          "token" : "" 
        }
    }
  },
  methods:{
      editar(){
          axios.put("http://127.0.0.1:8000/api/usuarios/",this.form)
          .then( data =>{
              console.log(data);
          })
      },
      salir(){
        this.$router.push("/dashboard");
      },
      eliminar(){
        var enviar = {
            "id" : this.form.id,
            "token" : this.form.token
        };
        axios.delete("http://127.0.0.1:8000/api/usuarios/", { headers : enviar})
        .then( datos => {
            console.log(datos);
           this.$router.push("/dashboard");
        });

      }
  },
  mounted:function(){
      this.form.id = this.$route.params.id;
      axios.get("http://127.0.0.1:8000/api/usuarios/"+ this.form.id)
      .then( datos => {
        
        this.form.nombres = datos.data[0].nombres;
        this.form.apellidos = datos.data[0].apellidos;
        this.form.telefono = datos.data[0].telefono;
        this.form.correo = datos.data[0].correo;
        this.form.token = localStorage.getItem("token");
        console.log(this.form);

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
   margin-right: 15px;;
 }
</style>