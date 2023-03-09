import admin from '../views/admin.vue';
import client from '../views/client.vue';


import {createRouter,createWebHistory} from 'vue-router';
const router = createRouter({
  history: createWebHistory(),
  routes: [ 
    {
      path: '/',
      name:'home',
      components: {
        default: client, 
      }, children:[
        {
          path:'cart',
          name:'cart' ,
          component:()=>import('../layout/client/cart.vue')
        }
      ],       
        
      },
      {
        path:'/login',
        component:()=>import('../layout/client/login.vue'),
        name:'login_client'
   },
       {
        path:'/register',
        component:()=>import('../layout/client/register.vue'),
        name:'register_client'
       },
      //admin
      {
        path: '/home_login',
        name:'home_login',
        components: {
          default: admin,      
        },
        children:
        [
         {
          path:'user',
          component:()=>import('../layout/admin/user.vue'),
          name:'user'
         },
         {
          path:'bill',
          component:()=>import('../layout/admin/bill.vue'),
          name:'bill'
         },
         {
          path:'product',
          component:()=>import('../layout/admin/product.vue'),
          name:'product'
         },
         {
          path:'category',
          component:()=>import('../layout/admin/category.vue'),
          name:'category'
         },       
        ],
     
      },

      {
        path:'/admin',
        component:()=>import('../layout/admin/login.vue'),
        name:'admin'
       },
  ],
})
export default router;