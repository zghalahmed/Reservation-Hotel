<template>
      <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
    <a class="navbar-brand" href="/">Gestion de location </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav mx-auto">
            <router-link to="/accueil" class="nav-item nav-link" :class="{ active: $route.path === '/accueil' }">Accueil</router-link>
            <router-link to="/voitures" class="nav-item nav-link" :class="{ active: $route.path === '/voitures' }">Voitures</router-link>
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
      <h2>Liste des Réservations</h2><br>
      <router-link to="/addreservation" class="btn btn-primary">Ajouter une Réservation</router-link>
      <!-- Tableau pour afficher les réservations -->
      <br><table class="table table-striped shadow">
        <thead>
          <tr>
            <th>ClientID</th>
            <th>VoitureID</th>
            <th>Date de arrivé</th>
            <th>Date de depart</th>
            <th>Prix</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="reservation in reservations" :key="reservation.id">
            <td>{{ reservation.client_id }}</td>
            <td>{{ reservation.chambre_id }}</td>
            <td>{{ reservation.date_arrivee }}</td>
            <td>{{ reservation.date_depart }}</td>
            
            <td>{{ reservation.nombre_personnes }}</td>
            <td>
              <button @click="deleteReservation(reservation.id)" class="btn btn-danger">Supprimer</button>
            </td>
          </tr>
        </tbody>
      </table>
  
      
      
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  const reservations = ref([]);
  
  const getReservations = async () => {
    try {
      const response = await axios.get("http://localhost:8000/api/reservations");
      reservations.value = response.data;
    } catch (error) {
      console.error(error);
    }
  };
  
  const deleteReservation = async (id) => {
    try {
      await axios.delete(`http://localhost:8000/api/reservations/${id}`);
      getReservations();
    } catch (error) {
      console.error(error);
    }
  };
  
  onMounted(() => {
    getReservations();
  });
  </script>
  
  <style lang="scss" scoped>
  /* Ajoutez vos styles ici si nécessaire */
  </style>
  