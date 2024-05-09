<template>
  <div>
    <h2>Modifier Client</h2>
    <form @submit.prevent="updateClient">
      <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" v-model="client.nom" required>
      </div>

      <div>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" v-model="client.prenom" required>
      </div>

      <div>
        <label for="email">E-mail :</label>
        <input type="email" id="email" v-model="client.email" required>
      </div>

      <div>
        <label for="num_tel">Numéro de téléphone :</label>
        <input type="tel" id="num_tel" v-model="client.num_tel" required>
      </div>

      <div>
        <label for="ville">Ville :</label>
        <input type="text" id="ville" v-model="client.ville" required>
      </div>

      <button type="submit">Enregistrer les modifications</button>
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
