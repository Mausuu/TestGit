import about from '../pages/client/about/index.vue'
import home from '../pages/client/home/index.vue'

const client =
[
    {
        path:'/client',
        name:'client',
        component:()=>import('../views/client.vue'),    
        children: [
            {
              path: 'about',
              name: "about",
              component: about,
            },
            {
                path: 'home',
                name: "home",
                component: home,
              },
            
        ]
    }
]
export default client;