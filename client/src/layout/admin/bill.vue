<template>
    <br>
    <div class="container-fluid">
      <div class="">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2>Quản lý các đơn hàng </h2>
              </div>
            </div>
          </div>

          <label>Lựa chọn khách hàng:</label>
          <select id="category" v-model="selectUser">
            <option v-for="user in users" :value="user.id">{{ user.name }}</option>
          </select>

          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Tên danh mục sản phẩm</th>
              </tr>
            </thead>
             <button @click="test">a</button>
            <tbody>
              <tr v-for="order in orders">
                <td>{{ order.id}}</td>
              </tr>
  
            </tbody>
          </table>
  
        </div>
      </div>
    </div>
   
  </template>
  
  <script>

  export default {
    name:"category_admin",
    data() {
      return {
      users: [],
      orders:[],  
      selectUser:'' 
      };
    },
    mounted() {
    this.getuser(),
    this.getOrder(),
    this.selectUser
    },
    methods: {
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
      test()
      {
         console.log(this.selectUser)
      },
      async getOrder(id) {
                try {
                    const result = await axios.get(
                        `${import.meta.env.VITE_API_BASE_URL}order/` + id
                    );
                    this.orders = result.data;
                    console.log(result);

                } catch (e) {
                    console.log(e);
                }
            },
      
    }
  };
  
  </script>