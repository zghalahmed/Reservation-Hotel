<template>
    <div>
      <h2>Ajouter une Réservation</h2>
  
      <!-- Formulaire d'ajout de réservation -->
      <form @submit.prevent="addreservation">
        <div>
          <label for="chambreId">Chambre :</label>
          <select id="chambreId" v-model="reservation.chambre_id" required>
            <option v-for="chambre in chambres" :key="chambre.id" :value="chambre.id">{{ chambre.nom }}</option>
          </select>
        </div>
  
        <div>
          <label for="clientId">Client :</label>
          <select id="clientId" v-model="reservation.client_id" required>
            <option v-for="client in clients" :key="client.id" :value="client.id">{{ client.nom }} {{ client.prenom }}</option>
          </select>
        </div>
  
        <div>
          <label for="dateArrivee">Date d'Arrivée :</label>
          <input type="date" id="dateArrivee" v-model="reservation.date_arrivee" required>
        </div>
  
        <div>
          <label for="dateDepart">Date de Départ :</label>
          <input type="date" id="dateDepart" v-model="reservation.date_depart" required>
        </div>
  
        <div>
          <label for="nombrePersonnes">Nombre de Personnes :</label>
          <input type="number" id="nombrePersonnes" v-model="reservation.nombre_personnes" required>
        </div>
  
        <button type="submit" class="btn btn-primary">Ajouter la Réservation</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  const reservation = ref({
    chambreId: null,
    clientId: null,
    dateArrivee: "",
    dateDepart: "",
    nombrePersonnes: 1
  });
  
  const chambres = ref([]);
  const clients = ref([]);
  
  const getChambres = async () => {
    try {
      const response = await axios.get("http://localhost:8000/api/chambres");
      chambres.value = response.data;
    } catch (error) {
      console.error(error);
    }
  };
  
  const getClients = async () => {
    try {
      const response = await axios.get("http://localhost:8000/api/clients");
      clients.value = response.data;
    } catch (error) {
      console.error(error);
    }
  };
  
  const addreservation = async () => {
    try {
      await axios.post("http://localhost:8000/api/reservations", reservation.value);
      // Réinitialiser le formulaire après l'ajout
      reservation.value = {
        chambreId: null,
        clientId: null,
        dateArrivee: "",
        dateDepart: "",
        nombrePersonnes: 1
      };
    } catch (error) {
      console.error(error);
    }
  };
  
  onMounted(() => {
    getChambres();
    getClients();
  });
  </script>
  
  <style lang="scss" scoped>
  /* Ajoutez vos styles ici si nécessaire */
  </style>
  