<template>
        <div>
          <Header />
            <div class="container">
                <form action="" class="form-horizontal">
                    <div class="form-group left">
                       <label for="" class="control-label col-sm-2">Nombre</label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control" name="nombre" id="nombre" v-model="form.nombres">
                            <span class="text-danger" v-if="errores.nombres">{{errores.nombres[0]}}</span>
                       </div>
                    </div>
                     <div class="form-group left">
                       <label for="" class="control-label col-sm-2">Apellidos</label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control" name="direccion" id="direccion" v-model="form.apellidos">
                            <span class="text-danger" v-if="errores.apellidos">{{errores.apellidos[0]}}</span>
                       </div>
                    </div>
                    <div class="form-group left row">
                      <div class="col">
                            <label for="" class="control-label col-sm-3">Telefono</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="correo" id="correo" v-model="form.telefono">
                                <span class="text-danger" v-if="errores.telefono">{{errores.telefono[0]}}</span>
                            </div>
                        </div>
                        <div class="col">
                          <label for="" class="control-label col-sm-5">Correo</label>
                          <div class="col-sm-7">
                              <input type="text" class="form-control" name="correo" id="codigopostal" v-model="form.correo">
                              <span class="text-danger" v-if="errores.correo">{{errores.correo[0]}}</span>
                          </div>
                        </div> 
                    </div>
                 
                   <div class="form-group">
                      <button type="button" class="btn btn-primary" v-on:click="guardar()" >Añadir</button>
                      <button type="button" class="btn btn-dark margen" v-on:click="salir()"  >Salir</button>
                    </div> 
                </form>
            </div>
        </div>
    
</template>
<script>
import Header from '@/components/HeaderAdmin.vue'
import axios from 'axios';
export default {
    name:"Nuevo",
    data:function(){
        return {
          id:null,
            form:{
                "nombres" : "",
                "apellidos": "", 
                "telefono" : "",
                "correo":"",
                "estado_id":1,
                "token" : "" 
            },
            errores:{}
        }
    },
    components:{
        Header,
    },
    methods:{
        guardar(){
            this.form.token = localStorage.getItem("token");
            this.form.id = this.$route.params.id;
            axios.post("http://127.0.0.1:8000/api/usuarios/",this.form)
            .then(data =>{
                console.log(data);
                this.$toaster.success('Exito al guardar');
                this.$router.push('/dashboard/'+this.form.id);
            }).catch( e =>{
              if(e.response.data){
                this.errores = e.response.data.errors
              }
                // console.log(e.response.data);
                //  this.makeToast("Error","Error al guardar","error");
            })
        }, 
        salir(){
          this.form.id = this.$route.params.id;
            this.$router.push("/dashboard/"+this.form.id);
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
.left{
    text-align:  left;
}
.button {
  display: inline-block;
  padding: 15px 30px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;	
  text-decoration: none;
  outline: none;
  color: #000000;
  background-color: #ff5f45     ;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #d6d7d7;
}

.button:hover {background-color: #000000;
box-shadow: 0 9px #262a25;
color: #e9e7e6;
}
.buttonuno {
  display: inline-block;
  padding: 15px 30px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;	
  text-decoration: none;
  outline: none;
  color: #e9e7e6;
  background-color: #000000;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #d6d7d7;
}

.buttonuno:hover {background-color: #ff5f45;
box-shadow: 0 9px #262a25;
color:#000000;
}

</style>