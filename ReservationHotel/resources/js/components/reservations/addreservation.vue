<template>
  <div style="max-width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
    <h2 style="text-align: center; color: #333;">Ajouter une Réservation</h2>

    <!-- Formulaire d'ajout de réservation -->
    <form @submit.prevent="addreservation">
      <div style="margin-bottom: 15px;">
        <label for="chambreId" style="display: block; margin-bottom: 5px; color: #333;">Voiture :</label>
        <select id="chambreId" v-model="reservation.chambre_id" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
          <option v-for="chambre in chambres" :key="chambre.id" :value="chambre.id">{{ chambre.nom }}</option>
        </select>
      </div>

      <div style="margin-bottom: 15px;">
        <label for="clientId" style="display: block; margin-bottom: 5px; color: #333;">Client :</label>
        <select id="clientId" v-model="reservation.client_id" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
          <option v-for="client in clients" :key="client.id" :value="client.id">{{ client.nom }} {{ client.prenom }}</option>
        </select>
      </div>

      <div style="margin-bottom: 15px;">
        <label for="dateArrivee" style="display: block; margin-bottom: 5px; color: #333;">Date depart :</label>
        <input type="date" id="dateArrivee" v-model="reservation.date_depart" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label for="dateDepart" style="display: block; margin-bottom: 5px; color: #333;">Date de Arrivé :</label>
        <input type="date" id="dateDepart" v-model="reservation.date_arrivee" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label for="nombrePersonnes" style="display: block; margin-bottom: 5px; color: #333;">Prix :</label>
        <input type="number" id="nombrePersonnes" v-model="reservation.nombre_personnes" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
      </div>

      <button type="submit" class="btn btn-primary">Ajouter la Réservation</button>
      <RouterLink  :to="{name: 'reservations'}"><button type="submit" class="btn btn-primary" style="background-color: red; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;">Annuler</button></RouterLink>
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
      router.push({ name: 'reservations' });
      reservation.value = {
        chambreId: null,
        clientId: null,
        dateArrivee: "",
        dateDepart: "",
        nombrePersonnes: 0
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
  