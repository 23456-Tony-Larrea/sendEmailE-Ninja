<template>

<div>
  <b-navbar toggleable="lg" type="dark" variant="info" style="background-color: #ff5f45!important;">
    <img src="@/assets/ninja.png" id="icon" alt="User Icon" class="imagen"/>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            <em>User</em>
          </template>
          <b-dropdown-item href="/admin">Salir</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
    
</template>
<style scoped>
.imagen{
 width:10%;
height:10%;
}
</style>