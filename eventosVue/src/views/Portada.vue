<template>

 <div class="site-wrapper">

        <div class="cover-container">

          <div class="inner cover" >
            
            <!-- Icon -->
                <div class="fadeIn first">
                <br>
                  <img src="@/assets/logoninja.png" id="icon" alt="User Icon"/>
                </div>
            <h1 style="color: white"> <strong>¿Te ha sucedido que te enteras de un evento <br>
                    interesante muy tarde?</strong></h1> 
                    <br>


             <table class="relleno">
            <tr>
                <td class="relleno" >
                  <h3 style="color: white"> La plataforma  <br>
                   <strong>eventos.ninja</strong> te ayuda<br>
              a estar al día en los <br>
               eventos en español <br>
               diariamente.</h3>
               <button class="button"  onclick="window.location='/registerUser'">Suscríbete</button>

                </td>
                <td class="relleno"  align="center">
                  <h3 style="color: white"> Además, <br>si quieres que tu evento sea <br>
                   conocido por más personas, nosotros <br>
                    te ayudamos.</h3>

               <button class="button"  onclick="window.location='/registerUser'">Compartir</button>
              

                </td>
            </tr>
        </table>
        <br>
        

          <h2 style="color: white">¡Sé parte de <strong>nuestra comunidad!</strong></h2>
              
             <a href="https://openlab.ec/"><img src="@/assets/openlab.png"/> </a>
            
           
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
  width:75%;
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
  background-color: #fcfcfc;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #d6d7d7;
}

.button:hover {background-color: #000000;
box-shadow: 0 9px #262a25;
color: #e9e7e6;
}



</style>