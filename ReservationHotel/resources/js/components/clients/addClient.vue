<template>
  <div style="max-width: 400px; margin: 0 auto;">
    <h2 style="text-align: center; color: #333;">Ajouter un Client</h2>
    <form @submit.prevent="addClient" style="margin-bottom: 20px;">
      
      <div style="margin-bottom: 15px;">
        <label for="nom" style="display: block; margin-bottom: 5px;">Nom :</label>
        <input type="text" id="nom" v-model="client.nom" required style="width: 100%; padding: 8px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label for="prenom" style="display: block; margin-bottom: 5px;">Prénom :</label>
        <input type="text" id="prenom" v-model="client.prenom" required style="width: 100%; padding: 8px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; margin-bottom: 5px;">E-mail :</label>
        <input type="email" id="email" v-model="client.email" required style="width: 100%; padding: 8px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label for="num_tel" style="display: block; margin-bottom: 5px;">Numéro de téléphone :</label>
        <input type="tel" id="num_tel" v-model="client.num_tel" required style="width: 100%; padding: 8px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label for="ville" style="display: block; margin-bottom: 5px;">Ville :</label>
        <input type="text" id="ville" v-model="client.ville" required style="width: 100%; padding: 8px;">
      </div>

      <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;">Ajouter le client</button>
      <RouterLink  :to="{name: 'viewvoiture'}"><button type="submit" class="btn btn-primary" style="background-color: red; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;">Annuler</button></RouterLink>
    </form>
  </div>
</template>


<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const client = ref({
  nom: "",
  prenom: "",
  email: "",
  num_tel: "",
  ville: ""
});

const addClient = async () => {
  try {
    await axios.post("http://localhost:8000/api/clients/", client.value);
    router.push({ name: 'clients' });
  } catch (error) {
    console.error(error);
  }
};
</script>
