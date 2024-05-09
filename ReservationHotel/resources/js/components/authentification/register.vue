<template>
    <div class="marge">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card card-default">
            <div class="card-header">Register</div>
            <div class="card-body">
              <form>
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control" v-model="user.name" required autofocus autocomplete="off">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control" v-model="user.email" required autofocus autocomplete="off">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control" v-model="user.password" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Password Confirmation</label>
                  <div class="col-md-6">
                    <input id="password_confirmation" type="password" class="form-control" v-model="user.password_confirmation" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary" @click="handleSubmit">Register</button>
                    <router-link :to="{ name: 'login' }" class="btn btn-secondary">Login</router-link>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
<script setup>
import axios from "axios"
import { useRouter } from 'vue-router';
const router = useRouter()
let user= {}

const handleSubmit=async()=> {
axios.post('http://localhost:8000/api/register/', user)

.then(response => {
console.log(response)
router.replace({ name: 'login' })
})
.catch(err => {console.log(err);alert(err) })

}
</script>
<style scoped>
.marge {
  position: relative;
  width: 90%; /* Adjust the width as needed */
  max-width: 600px; /* Set a maximum width for responsiveness */
  margin: 5% auto;
  padding: 30px; /* Increase padding for better spacing */
  border: 2px solid #333;
  background-color: #f8f8f8;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-header {
  background-color: #007bff;
  color: #fff;
  padding: 15px; /* Increase padding for better spacing */
}

.card-body {
  padding: 20px; /* Increase padding for better spacing */
}

.form-group {
  margin-bottom: 20px; /* Increase margin for better spacing */
}

.col-md-4 {
  text-align: right;
}

.btn-primary {
  background-color: #28a745;
  border-color: #28a745;
  color: #fff;
  padding: 10px 20px; /* Adjust padding for better button size */
}

.btn-secondary {
  margin-left: 10px;
}
</style>