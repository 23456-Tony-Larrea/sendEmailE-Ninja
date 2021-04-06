<template>
    <div>
        <Header />
            <div class="container">
                

                <form action="" class="form-horizontal">
                    <div class="form-group left">
                       <label for="" class="control-label col-sm-2">Nombre</label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control"  minlength="8"  name="nombre" id="nombre" v-model="form.nombres">
                       </div>
                    </div>
                    <div class="form-group left">
                       <label for="" class="control-label col-sm-2" >Apellido</label>
                       <div class="col-sm-10">
                          <input type="text" class="form-control"  minlength="8" name="direccion" id="direccion" v-model="form.apellidos" required>
                       </div>
                    </div>
                    <div class="form-group left row">
                      <div class="col">
                            <label for="" class="control-label col-sm-3">telefono</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="telefono" id="telefono" v-model="form.telefono" required >
                            </div>
                        </div>
                        <div class="col">
                          <label for="" class="control-label col-sm-5">Correo</label>
                          <div class="col-sm-7">
                              <input type="email" class="form-control" name="email" id="email" v-model="form.correo" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]" required>
                          </div>
                        </div> 
                    </div>
                   
                    <div class="form-group">
                       <button class="button" v-on:click="guardar()">Suscríbete</button>
                       <button class="buttonuno" v-on:click="salir()" >Salir</button>
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
            form:{
                "nombres" : "",
                "apellidos": "", 
                "telefono" : "",
                "correo":"",
                "estado_id":1,
                "token" : "" 
            }
        }
    },
    components:{
        Header,
    },
    methods:{
        guardar(){
            this.form.token = localStorage.getItem("token");
            axios.post("http://127.0.0.1:8000/api/usuarios/",this.form)
            .then(data =>{
                console.log(data);
                this.makeToast("Hecho","Usuario creado","success");
                this.$router.push("/dashboard");
            }).catch( e =>{
                console.log(e);
                 this.makeToast("Error","Error al guardar","error");
            })
        }, 
        salir(){
            this.$router.push("/dashboard");
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