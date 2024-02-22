<template>
  <div class="wrapper">
    <div class="container">
      <nav class="navbar navbar-light bg-light">
        <router-link :to="{ name: 'home' }" class="navbar-brand mb-0"
          >Navbar</router-link
        >
      </nav>

      <!-- Notifications -->
      <notifications />

      <!-- ROUTER VIEW -->
      <router-view> </router-view>
    </div>
  </div>
</template>

<style>
body {
  font-family: "Poppins";
}

.title-header {
  font-size: 18px;
}

.card {
  border-radius: 9px;
  border: 1px solid rgba(0, 0, 0, 0.204);
  box-shadow: 0px 2px 8px 1px rgba(0, 0, 0, 0.1);
}
</style>