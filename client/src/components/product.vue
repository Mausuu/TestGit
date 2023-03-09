<template>
  <section id="collection" class="py-5">
    <div class="container">

      <div class="title text-center">
        <h2 class="position-relative d-inline-block">DANH MỤC SẢN PHẨM</h2>
      </div>

      <div class="row g-0 ">
        <div class="collection-list mt-4 row gx-0 gy-3">

          <div class="col-md-6 col-lg-4 col-xl-3 p-2 best" v-for="product in products">
            <div class="collection-img position-relative">
              <img
                src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhFay27pbtEp5Wy-v4m0MOZX8maVgLtog6_f35T2PjoLdzxBki2gZKpP1sd2HQ3lMcrasHEZhKzTs0rFfssTxlHVykzG1nxRR3VxBdBS3F6bDWqmoTLLt3sTLQFQnQPwkjpJc-uGjJcCcdSoFZs9IHQef2E7nkm9AIBM8Z60kPhI6kYvIORltc68kTF1A/s1600/Hinh-nen-Anime-dong-TaihinhanhVn%20%284%29.gif"
                class="w-100">

            </div>
            <div class="text-center">

              <p class="text-capitalize mt-3 mb-1">{{ product.name_product }}</p>
              <span class="fw-bold d-block">{{ product.price }}</span>
              <p class="card-text">
                <small class="text-muted">
                  <span class="fw-bold">Loại: </span>{{ product.name_cat }}
                </small>
              </p>
              <!--@click="addCart(product.id)"-->
              <button  @click="addCart(product.id)" class="btn btn-primary mt-3 position-relative" >Mua hàng</button>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

<cart v-if="isShowModel" @cancel="addCart"/>
</template>

<script>
import cart from './cart.vue';
export default {
  components:
  {
    cart,
  },
  data() {
    return {
      products: [],
      carts: [],
      isShowModel:false,
    };
  },
  mounted() {
    this.getproducts();
    this.getcart();
  },
  methods:
  {
    async getproducts() {
      try {
        const result = await axios.get(
          `${import.meta.env.VITE_API_BASE_URL}product`
        );
        this.products = result.data;
        console.log(result.data);
      } catch (e) {
        console.log(e);
      }

    },
    //ham lay tong tien  
    async addCart(id) {
      this.isShowModel=!this.isShowModel;
      let user = localStorage.getItem("user-info");
      const result = JSON.parse(user);
      try {
        const cart = await axios.post(
          `${import.meta.env.VITE_API_BASE_URL}cart-add`,
          {

            id_users: result.id,
            id_product: id,
            product_qty: 1,
          }
        );
      
      } catch (e) {
        console.log(e);
      }

    },

    async getcart() {
      try {
        let user = localStorage.getItem("user-info");
        const a = JSON.parse(user);
        const result = await axios.get(
          `${import.meta.env.VITE_API_BASE_URL}cart/` + a.id
        );
        this.carts = result.data;
        console.log(result);
      } catch (e) {
        console.log(e);
      }
    },

  }
}
</script>