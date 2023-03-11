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
                :src=product.url
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
              <button  @click="addCart(product.id)" class="btn btn-primary mt-3 position-relative " data-bs-toggle="modal" data-bs-target="#exampleModal"  >Mua hàng</button>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

<!-- Modal -->
<div class="modal fade" id="exampleModal"  aria-labelledby="exampleModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Giỏ hàng</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng mua</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="cart in carts">

              <td>{{ cart.name_product }}</td>
              <td>{{
                 formatPrice(cart.price * cart.product_qty) }}</td>
              <td>{{ cart.product_qty }}</td>

            </tr>

          </tbody>
        </table>

      </div>
    </div>



  </div>
</div>
</template>

<script>
export default {
 
  data() {
    return {
      products: [],  
      carts: [],
     
    };
  },
  mounted() {
    this.getproducts(); 
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
      let user = localStorage.getItem("user-info");
      if(user)
      {
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
      this.getcart();
      this.$forceUpdate();
      }
      else
      {
        alert('Bạn chưa đăng nhập vào website')
        location.reload()
      }
      
    },
    formatPrice(value) {
        var formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
        });
        return formatter.format(value);
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