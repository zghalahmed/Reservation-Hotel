<template>
    <div>
      <h2>Liste des Réservations</h2>
  
      <!-- Tableau pour afficher les réservations -->
      <table class="table table-striped shadow">
        <thead>
          <tr>
            <th>Date d'Arrivée</th>
            <th>Date de Départ</th>
            <th>Nombre de Personnes</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="reservation in reservations" :key="reservation.id">
            <td>{{ reservation.date_arrivee }}</td>
            <td>{{ reservation.date_depart }}</td>
            <td>{{ reservation.nombre_personnes }}</td>
            <td>
              <button @click="deleteReservation(reservation.id)" class="btn btn-danger">Supprimer</button>
            </td>
          </tr>
        </tbody>
      </table>
  
      <!-- Bouton pour ajouter une réservation -->
      <router-link to="/addreservation" class="btn btn-primary">Ajouter une Réservation</router-link>
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
  