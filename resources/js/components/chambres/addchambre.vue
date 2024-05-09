<template>
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
      <form @submit.prevent="addChambre">
        <div class="mb-3">
          <label for="nomChambre" class="form-label">Nom chambre</label>
          <input type="text" class="form-control" id="nomChambre" v-model="chambre.nom">
        </div>
        <div class="mb-3">
          <label for="imageChambre" class="form-label">Image</label>
          <input type="text" class="form-control" id="imageChambre" v-model="chambre.image">
        </div>
        <div class="mb-3">
          <label for="descriptionChambre" class="form-label">Description</label>
          <textarea class="form-control" id="descriptionChambre" v-model="chambre.description"></textarea>
        </div>
        <div class="mb-3">
          <label for="prixChambre" class="form-label">Prix</label>
          <input type="number" class="form-control" id="prixChambre" v-model="chambre.prix">
        </div>
        <div class="mb-3">
          <label for="disponibiliteChambre" class="form-label">Disponibilité</label>
          <input type="checkbox" class="form-check-input" id="disponibiliteChambre" v-model="chambre.disponibilite">
        </div>
  
        <button type="submit"  class="btn btn-outline-primary">Enregistrer</button>
        <router-link to="/chambres" class="btn btn-outline-danger mx-2">Annuler</router-link>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  import { useRouter } from 'vue-router';
  import axios from 'axios';
  
  const router = useRouter();
  const chambre = ref({
    nom: "",
    image: "",
    description: "",
    prix: null,
    disponibilite: false
  });
  
  const addChambre = async () => {
  try {
    await axios.post("http://localhost:8000/api/chambres/", chambre.value);
    console.log("Chambre ajoutée avec succès !");
    router.push({ name: 'viewchambre' });
  } catch (error) {
    console.error("Erreur lors de l'ajout de la chambre :", error);
  }
};
  </script>
  
  <style scoped>
    /* Add your styles here if needed */
  </style>
