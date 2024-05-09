<template>
      <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
    <a class="navbar-brand" href="/">Gestion Hotel </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav mx-auto">
            <router-link to="/accueil" class="nav-item nav-link" :class="{ active: $route.path === '/accueil' }">Accueil</router-link>
            <router-link to="/voitures" class="nav-item nav-link" :class="{ active: $route.path === '/voitures' }">Chambres</router-link>
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
    <div>
      <h2>Liste des Chambres</h2><br>
      <router-link :to="{name: 'addvoiture'}" class="btn btn-primary">New Chambre</router-link>
      <div class="py-6">
        <table class="table table-striped shadow">
          <thead>
            <tr>
              <td>Image</td>
              <td>Nom </td>
              <td>Description</td>
              <td>Disponibilité</td>
              <td>Actions</td>
            </tr>
          </thead>
          <tbody>
            <tr v-for="chambre in chambres" :key="chambre.id">
    <td><img :src="chambre.image" width="70" height="80" /></td>
    <td>{{ chambre.nom }}</td>
    <td>{{ chambre.description }}</td>
    <td>{{ chambre.disponibilite }}</td>
    <td>
        
        <div class="btn-group" role="group">
            <router-link :to="{ name: 'editvoiture', params: { id: chambre.id }}" class="btn btn-success">Edit</router-link>
            <button class="btn btn-danger" @click="deleteChambre(chambre.id)">Delete</button>
        </div>
    </td>
</tr>

          </tbody>
        </table>
      </div>
    </div>
    
  </template>
  
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { useRouter } from 'vue-router';
  const chambres = ref([]);
  const router = useRouter();
  
  const getChambres = async () => {
    try {
      const response = await axios.get("http://localhost:8000/api/chambres");
      chambres.value = response.data;
      console.log(chambres.value);
    } catch (error) {
      console.log(error);
    }
  };
  
  onMounted(() => {
    getChambres();
  });
  
  const deleteChambre = async (id) => {
    try {
      await axios.delete(`http://localhost:8000/api/chambres/${id}`);
      getChambres();
    } catch (error) {
      console.log(error);
    }
  };

  const logout=async()=> {
let token=""

token=localStorage.getItem('token')
console.log(token)
axios.post('http://localhost:8000/api/logout', null, {

headers: {
'Authorization': `Bearer ${token}`
}
})

.then((response) => {
console.log(response)
localStorage.removeItem('token')
localStorage.removeItem('user')


router.push("/")
})
.catch(err => {console.log(err);alert(err) })

}

  </script>
  
  <style lang="scss" scoped>
  /* Styles for Gestion Chambres component */
  
  .navbar {
    background-color: #343a40; /* Change the navbar background color */
    color: #ffffff; /* Change the text color */
  }
  
  .navbar-brand {
    font-weight: bold;
    font-size: 24px;
  }
  
  .navbar-toggler-icon {
    color: #ffffff; /* Change the color of the navbar toggler icon */
  }
  
  .nav-link {
    color: #ffffff; /* Change the navigation link text color */
    font-size: 16px;
  }
  
  .btn-outline-danger {
    color: #e74c3c; /* Change the logout button text color */
    border-color: #e74c3c; /* Change the logout button border color */
  }
  
  .btn-outline-danger:hover {
    background-color: #e74c3c; /* Change the logout button background color on hover */
    color: #ffffff; /* Change the text color on hover */
  }
  
  h2 {
    color: #343a40; /* Change the heading text color */
  }
  
  .btn-primary {
    background-color: #007bff; /* Change the primary button background color */
    color: #ffffff; /* Change the primary button text color */
  }
  
  .table {
    background-color: #ffffff; /* Change the table background color */
  }
  
  .table th, .table td {
    color: #343a40; /* Change the table header and cell text color */
  }
  
  .btn-success, .btn-danger {
    margin-right: 5px; /* Add margin between the Edit and Delete buttons */
  }
  
  </style>
  