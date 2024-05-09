import accueil from './components/accueil.vue';
import viewchambre from './components/chambres/viewchambre.vue';
import addchambre from './components/chambres/addchambre.vue';
import editchambres from './components/chambres/editchambre.vue';
import clients from './components/clients/clients.vue';
import addClient from './components/clients/addClient.vue';
import editClient from './components/clients/editClient.vue';
import reservations from './components/reservations/reservations.vue';
import addreservation from './components/reservations/addreservation.vue';
import Login from './components/authentification/login.vue'
import Register from './components/authentification/register.vue'


export const routes = [
{
name: 'login',
path: '/',
component: Login
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
            name: 'editchambre',
            path: '/editchambre/:id',
            component: editchambres
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
            name: 'raddreservation',
            path: '/addreservation',
            component: addreservation
          },
          
            {
            name: "register",
            path: "/register",
            component: Register,
            },
            {
              name: "accueil",
              path: "/accueil",
              component: accueil,
              }
];