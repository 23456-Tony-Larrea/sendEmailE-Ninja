<template>
   <div>
       <Header/>
      <div class="col-xl-7 col-lg-12 d-flex">
        <div class="container align-self-center p-6">
            <h1 class="font-weight-bold mb-3">Registro</h1>
            <div class="form-group">
               
                <p class="text-muted mb-5">Ingresa la siguiente información para registrarte.</p>
    <form>
        <div class="form-row mb-2">
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Nombres Completos</label>
                <input type="text" class="form-control" placeholder="Tu nombre">
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Apellido Completos</label>
                <input type="text" class="form-control" placeholder="Tu apellido">
            </div>
        </div>
        <div class="form-group mb-3">
            <label class="font-weight-bold">Telefono</label>
            <input type="email" class="form-control" placeholder="Ingresa tu correo electrónico">
        </div>
        <div class="form-group mb-3">
            <label class="font-weight-bold">Correo</label>
            <input type="email" class="form-control" placeholder="Ingresa tu número celular">
        </div>
        <button class="btn btn-primary width-100">Regístrate</button>
    </form>
    
</div>
</div>
</div>

</div> 
</template>
<script>
import Header from '@/components/Header.vue';

export default{
 name:"Registro",
     data(){
        return{
   Listauser:null,
            pagina:1
        }
    },   
    components:{
        Header,
        
    },
}
</script>
<style scoped>
body {
  font-family:sans-serif;
  font-size: 1.1rem;
  font-weight: 300;
  background-color: var(--color-grey);
  color: var(--color-light);
  letter-spacing: .05rem;
}

.bg-light {
  background-color: var(--color-light)!important;
}

.bg-dark {
  background-color: var(--color-dark)!important;
}

.p-6 {
  padding: 4rem 7rem;
}

.contact-box {
  padding: 3rem;
}

.btn {
  font-weight: 400;
  padding: 1rem 2rem;
  border-radius: 5rem;
  min-width: 10rem;
}

.btn-outline-dark {
  border: 2px solid var(--color-dark-xx);
}

.form-control {
  background-color: var(--color-dark-xx);
  border: 2px solid var(--color-dark-xx);
  border-radius: .2rem;
  padding: 1.5rem 1rem;
}

.testiomonial {
  bottom: 10px
}
</style>