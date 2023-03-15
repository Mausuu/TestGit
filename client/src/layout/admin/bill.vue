<template>
  <br>
  <div class="container-fluid">
    <div class="">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">          
              <h2 class="text-center">Quản lý các đơn hàng </h2>   
          </div>
        </div>


        <div class="form-group" style="margin-bottom: 20px;">
          <label style=" display: block;
          font-weight: bold;
          margin-bottom: 5px;
          font-size:20px">Lựa chọn khách hàng:</label> <br>
          <select v-model="selectedUser">
          
            <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
          </select>
          <br>
        </div>
        
        <button class="btn btn-primary" @click="getOrder" style="margin-bottom: 20px;">Lấy danh sách đơn hàng</button>
        
        <h4 class="text-black">Danh sách đơn hàng</h4>
        
        <table class="table table-striped table-hover">
          <thead>
            <tr>       
              <th>Tên khách hàng</th>        
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Trạng thái</th>
              <th>Hình thức thanh toán</th>
              <th>Ngày đặt hàng</th>
              <th>Tổng tiền</th>
              <th></th>
            </tr>
          </thead>
          <br>
          <tbody v-for="order in orders.sort((a, b) => a.id - b.id)" >
            <tr>
              <td>{{ order.name }}</td>
              <td>{{ order.diachinguoinhan }}</td>
              <td> (+84) {{ order.sdt }}</td>
              <td>{{ order.trangthai }}</td>
              <td>{{ order.thanhtoan }}</td>
              <td>{{ order.ngaydat }}</td>     
              <td>{{  formatPrice(order.sum_cart) }}</td>     
              <td><button class="btn btn-primary" @click="senmail">Xác nhận</button></td>  
            </tr>     
          </tbody> 
          <tr>
          </tr>
        </table>

      </div>
    </div>
  </div>
</template>
  
<script>

export default {
  name: "category_admin",
  data() {
    return {
      users: [],
      orders: [],
      selectedUser: null,
      user_name:''
    };
  },
  mounted() {
    this.getuser(),
      this.getOrder()

  },
  methods: {
    formatPrice(value) {
        var formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
        });
        return formatter.format(value);
    },
    async getuser() {
      try {
        const result = await axios.get(
          `${import.meta.env.VITE_API_BASE_URL}user`
        );
        this.users = result.data;
        console.log(result);
      } catch (e) {
        console.log(e);
      }
    },

    getOrder() {
      if (this.selectedUser !== '') {
        axios.get(`${import.meta.env.VITE_API_BASE_URL}order/` + this.selectedUser)
          .then(response => {
            this.orders = response.data;    
          })
          .catch(error => {
            console.log(error);
          });
      } else {
        this.carts = [];
      }

    },

  }
};

</script>


<style>
select {
  width: 100%;
  height: 40px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
  transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

select:focus {
  border-color: #66afe9;
  outline: 0;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
}
</style>