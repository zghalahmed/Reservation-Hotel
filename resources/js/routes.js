import accueil from './components/accueil.vue';
import viewchambre from './components/chambres/viewchambre.vue';
import addchambre from './components/chambres/addchambre.vue';
import EditChambre from './components/chambres/editchamber.vue';
import clients from './components/clients/clients.vue';
import addClient from './components/clients/addClient.vue';
import editClient from './components/clients/editClient.vue';
import reservations from './components/reservations/reservations.vue';
import addreservation from './components/reservations/addreservation.vue';
import login from './components/Authentification/login.vue'
import register from './components/Authentification/register.vue'






export const routes = [
  {
    name: 'login',
    path: '/',
    component: login
    },
{
name: 'accueil',
path: '/accueil',
component: accueil
},
{
    name: "viewchambre",
    path: '/chambres',
    component: viewchambre
    },
    {
        name:"addchambre",
        path:"/addchambre",
        component:addchambre
        },
        {
            name: 'editChambre',
            path: '/editChambre/:id',
            component: EditChambre
          },
          {
            name: 'clients',
            path: '/clients',
            component: clients
          },
          {
            name: 'addClient',
            path: '/addClient',
            component: addClient
          },
          {
            name: 'editClient',
            path: '/editClient/:id',
            component: editClient
          },
          {
            name: 'reservations',
            path: '/reservations',
            component: reservations
          },
          {
            name: 'register',
            path: '/register',
            component: register
          },
          {
            name: 'raddreservation',
            path: '/addreservation',
            component: addreservation
          },
          
];