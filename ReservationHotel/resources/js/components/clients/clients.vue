<template>
      <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
    <a class="navbar-brand" href="/">Gestion de location </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav mx-auto">
            <router-link to="/accueil" class="nav-item nav-link" :class="{ active: $route.path === '/accueil' }">Accueil</router-link>
            <router-link to="/voitures" class="nav-item nav-link" :class="{ active: $route.path === '/voitures' }">Voitures</router-link>
            <router-link to="/clients" class="nav-item nav-link" :class="{ active: $route.path === '/clients' }">Clients</router-link>
            <router-link to="/reservations" class="nav-item nav-link" :class="{ active: $route.path === '/reservations' }">Réservations</router-link>
        </div>

        <div class="navbar-nav">
            <router-link to="/">
                <button class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> Log Out</button>
            </router-link>
        </div>
    </div>
</nav><br>
  <div>
    <h2>Liste des Clients</h2><br>
      <router-link :to="{ name: 'addClient' }" class="btn btn-primary">New Client</router-link>
    
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
