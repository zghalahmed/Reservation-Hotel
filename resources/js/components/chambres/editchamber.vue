<template>
    <div>
      <h3 class="text-center">Modifier Chambre</h3>
      <div class="row">
        <div class="col-md-6">
          <form @submit.prevent="updateChambre">
            <div class="form-group">
              <label>Nom de la chambre</label>
              <input type="text" class="form-control" v-model="chambre.nom">
            </div>
            <div class="form-group">
              <label>Image</label>
              <input type="text" class="form-control" v-model="chambre.image">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" v-model="chambre.description"></textarea>
            </div>
            <div class="form-group">
              <label>Prix</label>
              <input type="number" class="form-control" v-model="chambre.prix">
            </div>
            <div class="form-group">
              <label>Disponibilité</label>
              <input type="checkbox" class="form-check-input" v-model="chambre.disponibilite">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import axios from 'axios';
  import { useRouter, useRoute } from 'vue-router';
  import { ref, onMounted } from 'vue';
  
  const router = useRouter();
  const route = useRoute();
  const chambre = ref({});
  
  const fetchChambre = async () => {
    try {
      const response = await axios.get(`http://localhost:8000/api/chambres/${route.params.id}`);
      chambre.value = response.data;
    } catch (error) {
      console.error(error);
    }
  };
  
  const updateChambre = async () => {
    try {
      await axios.patch(`http://localhost:8000/api/chambres/${route.params.id}`, chambre.value);
      router.push({ name: 'viewchambre' });
    } catch (error) {
      console.error(error);
    }
  };
  
  onMounted(async () => {
    await fetchChambre();
  });
  </script>
  