<template>
  <!--gio hang-->
  <div class="modal" @click="onCloseModal">
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
<style>
.modal {
  display: block;
}
</style>
<script>

export default {
  data() {
    return {
      products: [],
      carts: [],
    };
  },
  mounted() {

    this.getcart();

  },
  methods:
  {
    formatPrice(value) {
        var formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
        });
        return formatter.format(value);
    },
    onCloseModal() {
      this.$emit("cancel");
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