<template>
    <br>
    <div class="container-fluid">
      <div class="">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2>Quản lý người dùng</h2>
              </div>
            </div>

          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>
                  <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                  </span>
                </th>
                <th>Tên người dùng</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users">
                <td>
                  <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                  </span>
                </td>
                

                <td>{{ user.name}}</td>
                <td>{{ user.email }}</td>
                <td>
                  <button class="btn btn-secondary" @click="deleteuser(user.id)">Xóa</button>
                </td>
                <td>
                  <button  type="button" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop-edit"
                        @click="senduser(user.id)">
                        Chỉnh sửa
                </button>
                </td>
              </tr>
  
            </tbody>
          </table>

        </div>
      </div>
    </div>
   
    <!-- Edit Modal HTML -->
  <div class="modal fade" id="staticBackdrop-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
         
              <div class="modal-header">
                  <h4 class="modal-title">Chỉnh sửa người dùng</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                      <label>Tên người dùng:</label>
                      <input type="text" class="form-control"  v-model="name">
                  </div>

                  <div class="form-group">
                    <label>Mail người dùng:</label>
                    <input type="text" class="form-control"   v-model="mail">
                </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <div class="control">
                      <button class="btn btn-primary" @click="updateUser()">Sửa</button>
                  </div>
              </div>
         
      </div>
  </div>
  </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
       users: [],  
        selectuser:'',
        name:"",
        mail:"",
        id:""
      };
    },
    mounted() {
      this.getuser();
    },
    methods: {
  
      senduser(user){
        this.selectuser = user;
      },
      
      reloadPage() {
        window.location.reload();
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
  
      
      async deleteuser(id) {
        try {
          await axios.delete(`${import.meta.env.VITE_API_BASE_URL}delete-user/` + id)
          this.reloadPage()
        } catch (error) {
          this.error = error.response.data
        }
      }, 
      senduser(id)
      {
       this.id=id
       console.log(this.id)
      },
     async updateUser()
      {
        try {
          
          const user= await axios.post(
            `${import.meta.env.VITE_API_BASE_URL}update-user/` +this.id,
            {      
              email:this.mail ,
              name:this.name,         
            }            
          );                  
        } catch (e) {
          console.log(e);
        } 
        location.reload();
      }
    }
  };
  
  </script>