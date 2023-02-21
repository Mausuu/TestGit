import user from "../pages/admin/user/index.vue";
import product from "../pages/admin/product/index.vue";
import menu from "../pages/admin/menu/index.vue";
import bill from "../pages/admin/bill/index.vue";
import information from "../pages/admin/information/index.vue";

const admin =
[
    {
        path:'/admin',
        name: "admin",
        component:()=>import("../views/admin.vue"),
        children: [
            {
              path: 'users',
              name: "admin-users",
              component: user,
            },
            {
              path: 'product',
              name: "admin-products",
              component: product,
            },
            {
              path: 'menu',
              name: "admin-menu",
              component: menu,
            },
            {
              path: 'bill',
              name: "admin-bill",
              component: bill,
            },
            {
              path: 'information',
              name: "admin-information",
              component: information,
            },
        ]
    }
]
export default admin;