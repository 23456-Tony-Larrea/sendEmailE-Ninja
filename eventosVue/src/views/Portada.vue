<template>

 <div class="site-wrapper">

        <div class="cover-container">

          <div class="inner cover" >
            
            <!-- Icon -->
                <div class="fadeIn first">
                  <img src="@/assets/logoninja.png" id="icon" alt="User Icon"/>
                </div>
            <h1 style="color:hsla(0,100%,50%,1);"> <strong>¿Te ha sucedido que te enteras de un evento <br>
                    interesante muy tarde?</strong></h1> 
                    <br>


             <table class="relleno">
            <tr>
                <td class="relleno" >
                  <h4> La plataforma  <br>
                   <strong>eventos.ninja</strong> te ayuda<br>
              a estar al día en los <br>
               eventos en español <br>
               diariamente.</h4>
               <a type="button" class="btn btn-light" href="registerUser">Registrarme</a>

                </td>
                <td class="relleno">
                   <h4>Además, si quieres que tu evento <br>
                   sea conocido por <br>
                   más personas, nosotros <br>
                   te ayudamos.</h4>

                   <a type="button" class="btn btn-light" href="registerUser">Compartir</a>

                    
                </td>
            </tr>
        </table>
        <br>
        

          <h2>¡Sé parte de <strong>nuestra comunidad!</strong></h2>
              
            
             <a type="button" class="btn btn-light" href="https://openlab.ec/">Compartir</a>
            
           
        </div>
      </div>

  </div>

</template>
<script>
export default {
  created () {
  },
    name:"Portada"
}
</script>

<style scoped>

.site-wrapper {
  background-color: #ff5f45;
}
.relleno{
  text-align: center;
  width:76%;
  }

</style>