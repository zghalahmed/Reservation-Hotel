<template>
  <div>
    <h2>Ajouter un Client</h2>
    <form @submit.prevent="addClient">
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

      <button type="submit">Ajouter le client</button>
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
