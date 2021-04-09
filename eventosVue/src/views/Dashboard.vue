<template>
    <div>
        <Header/>

                    <div class="left">
                     <button class="btn btn-success" v-on:click="perfil(idprofile)">Perfil</button>
                     </div>
            <div class="container izquierda">
                <br>
                  <button class="button"  v-on:click="nuevo(idprofile)">Nuevo Usuario</button>
                <br><br>
                 <input type="text" v-model="buscador"><button class="button"  v-on:click="search(buscador)">Buscar</button>
                 <br>
                 <br>
                 <button class="button" v-on:click="send()">Enviar Emails</button>
            
                 <table class="table table-hover">
                <thead>
                    <br>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in Listauser" :key="user.id" v-on:click="editar(user.id)">
                        <th scope="row">{{ user.id}}</th>
                        <td>{{ user.nombres }}</td>
                        <td>{{ user.apellidos }}</td>
                        <td>{{ user.telefono }}</td>
                        <td>{{ user.correo }}</td>                 
                    </tr>
            
                </tbody>
                </table>

            </div>
    </div>
    
</template>
<script>
import Header from '@/components/HeaderAdmin.vue';
import axios from 'axios';
export default {
    name:"Dashboard",
    data(){
        return {
            Listauser:null,
            pagina:1,
            buscador: null,
            idprofile:this.$route.params.id
        }
    },
    components:{
        Header,
    },
    methods:{
          
            editar(id){
                this.$router.push('/editar/' + id);
               },
            nuevo(idprofile){
                this.$router.push('/nuevo/'+idprofile);
             }, 
             perfil(idprofile){
        
               this.$router.push('/profile/'+idprofile);
             },
            search(filter){
                console.log(filter);
                let direccion = `http://127.0.0.1:8000/api/buscador?texto=${filter}`;
                axios.get(direccion).then( data =>{
                
                this.Listauser = data.data;
            });
             },
             send(){
                 console.log(this.Listauser);
                 this.Listauser.forEach(value => {
                    console.log(value.correo);
                    let sent = value.correo;
                    let url = `http://127.0.0.1:8000/api/sendTwuit?correo=${sent}`;
                    axios.get(url).then(data=>{
                        console.log(data);
                        this.$toaster.success('Se han enviado los twuits a todos los usuarios');
                    }).catch(e=>{
                        console.log(e)
                        this.$toaster.error('Hubo un problema con el servidor');
                    })
                });
                
             } 
},
    mounted:function(){
        let direccion = "http://127.0.0.1:8000/api/usuarios/";
        axios.get(direccion).then( data =>{
            console.log(data.data);
            this.Listauser = data.data;
        });
    },
    }
</script>
<style  scoped>
    .izquierda{
        text-align: left;
    }
     .button {
  display: inline-block;
  padding: 5px 10px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;	
  text-decoration: none;
  outline: none;
  color: #000000;
  background-color:#ff5f45;
  border: none;
  border-radius: 15px;
}

.button:hover {background-color: #000000;
color: #e9e7e6;
}
.left{
        text-align: right;
    }
</style>