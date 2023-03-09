<template>
    <navbar/>
    <banner />
    <product />
    <about />
    <blog />
    <footers />

    <router-view />
</template> 
<script>
import "../assets/client.css";
import navbar from "../components/navbar.vue";
import product from "../components/product.vue";
import about from "../components/about.vue";
import blog from "../components/blog.vue";
import banner from "../components/banner.vue";
import footers from '../components/footer.vue';
import cart from "../components/cart.vue";
export default {
   
    components:
    {
        footers,
        banner, about, blog, product,navbar,cart
    },
   
}
    
</script>