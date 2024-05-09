<template>
 <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
    <a class="navbar-brand" href="/">Gestion Hotel </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav mx-auto">
            <router-link to="/accueil" class="nav-item nav-link" :class="{ active: $route.path === '/accueil' }">Accueil</router-link>
            <router-link to="/chambres" class="nav-item nav-link" :class="{ active: $route.path === '/chambres' }">Chambres</router-link>
            <router-link to="/clients" class="nav-item nav-link" :class="{ active: $route.path === '/clients' }">Clients</router-link>
            <router-link to="/reservations" class="nav-item nav-link" :class="{ active: $route.path === '/reservations' }">Réservations</router-link>
        </div>

        <div class="navbar-nav">
            <router-link to="/">
                <button class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> Log Out</button>
            </router-link>
        </div>
    </div>
</nav><br>


  




  
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Bienvenue dans votre site de Gestion Chambres</div>
            <div class="card-body">
              <p>Vous êtes à la page d'accueil de votre site web</p>
              <p>{{ message }}</p> 
              

            </div>
          </div>
        </div>
      </div>
    </div><br>
    
          <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
  </template>

  <script>
  export default {
    data() {
      return {
        message: "C'est le bon moment pour gérer votre demande de location des voitures   Bon travail !!!!!"
        
      };
    },
    mounted() {
      console.log('Component mounted.');
    }
  }
  </script>
  
<style scoped>
/* Updated styles for Gestion Hotel component */
body {
  background-color: #f8f9fa; /* Change the background color of the entire page */
  font-family: 'Arial', sans-serif; /* Change the font family */
}

.navbar {
  background-color: #343a40; /* Change the navbar background color */
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow to the navbar */
}

.navbar-brand {
  color: #ffffff; /* Change the navbar brand text color */
  font-weight: bold;
  font-size: 24px; /* Adjust the font size */
}

.nav-link {
  color: #495057; /* Change the navigation link text color */
  font-size: 16px; /* Adjust the font size */
}

.nav-link.active {
  color: #e74c3c; /* Change the active navigation link text color */
}

.btn-outline-danger {
  color: #e74c3c; /* Change the logout button text color */
  border-color: #e74c3c; /* Change the logout button border color */
}

.btn-outline-danger:hover {
  background-color: #e74c3c; /* Change the logout button background color on hover */
  color: #fff; /* Change the text color on hover */
}

.card {
  background-color: #ffffff; /* Change the card background color */
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow to the card */
}

.card-header {
  background-color: #343a40; /* Change the card header background color */
  color: #ffffff; /* Change the card header text color */
}

.card-body {
  padding: 20px; /* Adjust the padding for better spacing */
}

.text-center {
  margin-top: 20px; /* Add margin to the text-center for spacing */
}

.img-fluid {
  max-width: 100%; /* Ensure the image is responsive within its container */
  height: auto; /* Maintain the image aspect ratio */
}

/* Add or modify any other styles as needed */
</style>