<template>
  <div>
    <div class="py-6">
      <table class="table table-striped shadow">
        <thead>
          <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Email</td>
            <td>Numéro de téléphone</td>
            <td>Ville</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="client in clients" :key="client.id">
            <td>{{ client.nom }}</td>
            <td>{{ client.prenom }}</td>
            <td>{{ client.email }}</td>
            <td>{{ client.num_tel }}</td>
            <td>{{ client.ville }}</td>
            <td>
              <div class="btn-group" role="group">
                <router-link :to="{ name: 'editClient', params: { id: client.id }}" class="btn btn-success">Edit</router-link>
                <button class="btn btn-danger" @click="deleteClient(client.id)">Delete</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
      <router-link :to="{ name: 'addClient' }" class="btn btn-outline-light">New Client</router-link>
    </div>
  </nav>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const clients = ref([]);

const getClients = async () => {
  try {
    const response = await axios.get("http://localhost:8000/api/clients");
    clients.value = response.data;
    console.log(clients.value);
  } catch (error) {
    console.log(error);
  }
};

const deleteClient = async (id) => {
  try {
    await axios.delete(`http://localhost:8000/api/clients/${id}`);
    getClients();
  } catch (error) {
    console.log(error);
  }
};

onMounted(() => {
  getClients();
});
</script>

<style lang="scss" scoped>
/* Add your styles here if needed */
</style>
