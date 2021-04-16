<template>
    <div>
        <Header/>

                    <div class="container left">
                        <br>
                     <a class="boton" v-on:click="perfil(idprofile)"><b-icon icon="person-fill"></b-icon>Perfil</a>
                     </div>
                     <br>
            <div class="container izquierda">
                <br>
                  <button class="button"  v-on:click="nuevo(idprofile)">Nuevo Usuario</button>
                <br><br>
                 <input style="margin: 10px" type="text" placeholder="Busqueda por apellido" v-model="buscador"><button class="button"  v-on:click="search(buscador)"><b-icon icon="search"></b-icon> Buscar</button>
                 <br>
                 <br>
                 <button style="margin: 10px" class="button" v-on:click="send()"> <b-icon icon="envelope">  </b-icon> Enviar Emails</button>
                 <button class="button" v-on:click="sendEventos()"> <b-icon icon="envelope"></b-icon> Enviar Eventos</button>
               

                 <table class="table table-hover">
                <thead>
                    <br>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr v-for="user in datospaginado" :key="user.id" v-on:click="editar(user.id,idprofile)">
                        <th scope="row">{{ user.id}}</th>
                        <td>{{ user.nombres }}</td>
                        <td>{{ user.apellidos }}</td>
                        <td>{{ user.telefono }}</td>
                        <td>{{ user.correo }}</td>
                        <td>{{ user.nombre }}</td>                 
                    </tr>
            
                </tbody>
                </table>
              <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
    <li class="page-item"><a v-on:click="getpreviospage()" class="page-link" href="#">Antes</a></li>
    <li v-for="pagina in totalpag()" :key="pagina" v-on:click="getpag(pagina)" id="cargar" class="page-item"><a class="page-link" href="#">{{pagina}}</a></li>
    <li class="page-item"><a v-on:click="getnextpage()" class="page-link" href="#">Sigiente</a></li>
  </ul>
</nav>

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
            elementosporpag:5,
            datospaginado:[],
            paginaActual:1,
        }
    },
    components:{
        Header,
    },
    methods:{
        
            totalpag(){
                console.log("entra")
               
                return Math.ceil(this.Listauser.length / this.elementosporpag);

                
               },

            getpag(numpag){
                console.log(numpag);  
                let ini = (numpag * this.elementosporpag) - this.elementosporpag;
                let fin = (numpag * this.elementosporpag);
                this.datospaginado = this.Listauser.slice(ini , fin);  
                 this.datospaginado = this.Listauser.slice(ini , fin);
                this.datospaginado = this.Listauser.slice(ini , fin);  
                
            },
            getpreviospage(){
          if(this.paginaActual > 1)
             {
                 console.log("si")
              this.paginaActual-- ;
               }
             this.getpag(this.paginaActual);
             
        },

            getnextpage(){
                
             if(this.paginaActual < this.totalpag())
             {
            this.paginaActual ++;
            }
            this.getpag(this.paginaActual);
         },

            editar(id,idprofile){
                this.$router.push(`/dashboard/${idprofile}/editar/${id}`);
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
                    // console.log(value.nombre);
                    let comprobate = value.nombre;
                    if(comprobate == 'Activo'){
                        let sent = value.correo;
                        let url = `http://127.0.0.1:8000/api/sendTwuit?correo=${sent}`;
                            axios.get(url).then(data=>{
                            console.log(data);
                            this.$toaster.success('Se han enviado los twuits a este usuario');
                        }).catch(e=>{
                            console.log(e)
                            this.$toaster.error('Hubo un problema con el servidor');
                        })
                    }else{
                        this.$toaster.error('Este Usuario Esta desabilitado si quiere mandar un correo cambie su estado');
                    }
                });
                },
                 sendEventos(){
                 console.log(this.Listauser);
                 this.Listauser.forEach(value => {
                    // console.log(value.nombre);
                    let comprobate = value.nombre;
                    if(comprobate == 'Activo'){
                        let sent = value.correo;
                        let url = `http://127.0.0.1:8000/api/sendEmailUser?correo=${sent}`;
                            axios.get(url).then(data=>{
                            console.log(data);
                            this.$toaster.success('Se han enviado los eventos a este usuario');
                        }).catch(e=>{
                            console.log(e)
                            this.$toaster.error('Hubo un problema con el servidor');
                        })
                    }else{
                        this.$toaster.error('Este Usuario Esta desabilitado si quiere mandar un correo cambie su estado');
                    }
                });
                
    } 
             
},
    mounted:function(){
        let direccion = "http://127.0.0.1:8000/api/usuarios/";
        axios.get(direccion).then( data =>{
            console.log(data.data);
            this.Listauser = data.data.sort((a,b)=>a.id-b.id);
            this.getpag(1);
        });
    },
    }
</script>
<style  scoped>
    .izquierda{
        text-align: left;
    }
     .button {
  text-align: right;
  padding: 10px 10px;
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
.boton {
  display: inline-block;
  padding: 5px 10px;
  font-size: 20px;
  cursor: pointer;
  text-align: center;	
  text-decoration: none;
  outline: none;
  color: #000000;
  background-color:#ff5f45;
  border: none;
}

.boton:hover {background-color: #000000;
display: inline-flexbox;
width: right 2px;
height: left 3px;
color: #e9e7e6;
}
.left{
        text-align: right;
    }
</style>