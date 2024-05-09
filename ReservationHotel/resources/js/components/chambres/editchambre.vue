<template>
  <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
    <h3 style="text-align: center; color: #333;">Modifier voiture</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="updateChambre">
          <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #333;">Nom de la voiture :</label>
            <input type="text" class="form-control" v-model="chambre.nom" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
          </div>
          <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #333;">Image :</label>
            <input type="text" class="form-control" v-model="chambre.image" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
          </div>
          <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #333;">Description :</label>
            <textarea class="form-control" v-model="chambre.description" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
          </div>
          <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; color: #333;">Prix :</label>
            <input type="number" class="form-control" v-model="chambre.prix" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
          </div>
          <div style="margin-bottom: 15px;">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" v-model="chambre.disponibilite">
              <label class="form-check-label" style="color: #333;">Disponibilité</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;">Mettre à jour</button>
          <RouterLink  :to="{name: 'viewvoiture'}"><button type="submit" class="btn btn-primary" style="background-color: red; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;">Annuler</button></RouterLink>

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
      router.push({ name: 'viewvoiture' });
    } catch (error) {
      console.error(error);
    }
  };
  
  onMounted(async () => {
    await fetchChambre();
  });
  </script>
  