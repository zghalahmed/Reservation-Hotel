<template>
    <div>
      <div class="py-6">
        <table class="table table-striped shadow">
          <thead>
            <tr>
              <td>Image</td>
              <td>Nom chambre</td>
              <td>Description</td>
              <td>Disponibilité</td>
              <td>Réserver</td>
            </tr>
          </thead>
          <tbody>
            <tr v-for="chambre in chambres" :key="chambre.id">
    <td><img :src="chambre.image" width="70" height="80" /></td>
    <td>{{ chambre.nom }}</td>
    <td>{{ chambre.description }}</td>
    <td>{{ chambre.disponibilite }}</td>
    <td>
        <button class="btn btn-warning mx-2">Réserver</button>
        <div class="btn-group" role="group">
            <router-link :to="{ name: 'editChambre', params: { id: chambre.id }}" class="btn btn-success">Edit</router-link>
            <button class="btn btn-danger" @click="deleteChambre(chambre.id)">Delete</button>
        </div>
    </td>
</tr>

          </tbody>
        </table>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">

<div class="container-fluid">

<router-link :to="{name: 'addchambre'}" class="btn btn-
outline-light">

New chambre
</router-link>
</div>
</nav>
  </template>
  
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  const chambres = ref([]);
  
  const getChambres = async () => {
    try {
      const response = await axios.get("http://localhost:8000/api/chambres");
      chambres.value = response.data;
      console.log(chambres.value);
    } catch (error) {
      console.log(error);
    }
  };
  
  onMounted(() => {
    getChambres();
  });
  
  const deleteChambre = async (id) => {
    try {
      await axios.delete(`http://localhost:8000/api/chambres/${id}`);
      getChambres();
    } catch (error) {
      console.log(error);
    }
  };
  </script>
  
  <style lang="scss" scoped>
  /* Add your styles here if needed */
  </style>
  