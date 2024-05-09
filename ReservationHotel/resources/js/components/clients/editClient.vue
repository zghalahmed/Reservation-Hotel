<template>
  <div style="max-width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
    <h2 style="text-align: center; color: #333;">Modifier Client</h2>
    <form @submit.prevent="updateClient">
      <div style="margin-bottom: 15px;">
        <label for="nom" style="display: block; margin-bottom: 5px; color: #333;">Nom :</label>
        <input type="text" id="nom" v-model="client.nom" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label for="prenom" style="display: block; margin-bottom: 5px; color: #333;">Prénom :</label>
        <input type="text" id="prenom" v-model="client.prenom" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; margin-bottom: 5px; color: #333;">E-mail :</label>
        <input type="email" id="email" v-model="client.email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label for="num_tel" style="display: block; margin-bottom: 5px; color: #333;">Numéro de téléphone :</label>
        <input type="tel" id="num_tel" v-model="client.num_tel" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label for="ville" style="display: block; margin-bottom: 5px; color: #333;">Ville :</label>
        <input type="text" id="ville" v-model="client.ville" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
      </div>

      <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;">Enregistrer les modifications</button>
      <RouterLink  :to="{name: 'clients'}"><button type="submit" class="btn btn-primary" style="background-color: red; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;">Annuler</button></RouterLink>
    </form>
  </div>
</template>


<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter, useRoute } from 'vue-router';

const router = useRouter();
const route = useRoute();
const client = ref({});

const fetchClient = async () => {
  try {
    const response = await axios.get(`http://localhost:8000/api/clients/${route.params.id}`);
    client.value = response.data;
  } catch (error) {
    console.error(error);
  }
};

const updateClient = async () => {
  try {
    await axios.patch(`http://localhost:8000/api/clients/${route.params.id}`, client.value);
    router.push({ name: 'clients' });
  } catch (error) {
    console.error(error);
  }
};

onMounted(() => {
  fetchClient();
});
</script>
