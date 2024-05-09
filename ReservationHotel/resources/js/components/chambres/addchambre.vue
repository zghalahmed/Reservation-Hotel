<template>
  <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow" style="background-color: #ffffff;">
    <form @submit.prevent="addChambre">
      <div class="mb-3">
        <label for="nomChambre" class="form-label" style="color: #333;">Nom Chambre</label>
        <input type="text" class="form-control" id="nomChambre" v-model="chambre.nom" style="border: 1px solid #ccc; border-radius: 5px;">
      </div>
      <div class="form-group">
<div>
<file-pond
name="test"
ref="pond"
class-name="my-pond"
label-idle="Drop files here..."
allow-multiple="false"
accepted-file-types="image/jpeg, image/png"
v-bind:files="myFiles"

v-on:init="handleFilePondInit"
:server="serverOptions()"
/>
</div>
</div>
      <div class="mb-3">
        <label for="descriptionChambre" class="form-label" style="color: #333;">Description</label>
        <textarea class="form-control" id="descriptionChambre" v-model="chambre.description" style="border: 1px solid #ccc; border-radius: 5px;"></textarea>
      </div>
      <div class="mb-3">
        <label for="prixChambre" class="form-label" style="color: #333;">Prix</label>
        <input type="number" class="form-control" id="prixChambre" v-model="chambre.prix" style="border: 1px solid #ccc; border-radius: 5px;">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="disponibiliteChambre" v-model="chambre.disponibilite">
        <label class="form-check-label" for="disponibiliteChambre" style="color: #333;">Disponibilité</label>
      </div>

      <button type="submit" class="btn btn-outline-primary" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Enregistrer</button>
      <router-link to="/voitures" class="btn btn-outline-danger mx-2" style="border: 1px solid #e74c3c; color: #e74c3c; border-radius: 5px;">Annuler</router-link>
    </form>
  </div>
</template>

  
  <script setup>
  import { ref } from "vue";
  import { useRouter } from 'vue-router';
  import axios from 'axios';
  import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

// Create FilePond component
const FilePond = vueFilePond(FilePondPluginImagePreview);
const myFiles = ref([]);
  
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
    console.log(chambre.value)
    console.log("Chambre ajoutée avec succès !");
    router.push({ name: 'viewvoiture' });
  } catch (error) {
    console.error("Erreur lors de l'ajout de la voiture :", error);
    console.log(chambre.value)
  }
  
};
const handleFilePondInit = () => {
console.log('FilePond has initialized');
}
const serverOptions = () => { console.log('server pond');
return {
process: (fieldName, file, metadata, load, error, progress, abort) => {
const data = new FormData();
data.append('file', file);
data.append('upload_preset', 'Ecommerce_cloudinary');
data.append('cloud_name', 'iset-sfax');
data.append('public_id', file.name);
axios.post('https://api.cloudinary.com/v1_1/iset-sfax/image/upload',
data)
.then((response) => response.data)
.then((data) => {
console.log(data);

chambre.value.image = data.url;
load(data);
})
.catch((error) => {
console.error('Error uploading file:', error);
error('Upload failed');
abort();
});
},
};
};
  </script>
  
  <style scoped>
    /* Add your styles here if needed */
  </style>
