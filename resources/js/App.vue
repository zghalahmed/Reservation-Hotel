<template>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
          <div class="navbar-nav">
            <router-link to="/chambres" class="nav-item nav-link" :class="{ active: $route.path === '/chambres' }">Chambres</router-link>
            <router-link to="/clients" class="nav-item nav-link" :class="{ active: $route.path === '/clients' }">Clients</router-link>
            <router-link to="/reservations" class="nav-item nav-link" :class="{ active: $route.path === '/reservations' }">Réservations</router-link>
          </div>
        </div>
      </nav>
      <router-view></router-view>
    </div>
  </template>
  
  <script>
  export default {}
  </script>
  