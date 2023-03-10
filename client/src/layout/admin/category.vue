<template>
    <br>
    <div class="container-fluid">
      <div class="">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2>Quản lý danh mục sản phẩm </h2>
              </div>
            </div>
          </div>
  
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Thêm danh mục sản phẩm
          </button>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>
                  <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                  </span>
                </th>
                <th>Tên danh mục sản phẩm</th>
                
              </tr>
            </thead>
            <tbody>
              <tr v-for="category in categorys">
                <td>
                  <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" cat_name="options[]" value="1">
                    <label for="checkbox1"></label>
                  </span>
                </td>
                <td>{{ category.cat_name}}</td>
              
                <td>
                  <button class="btn btn-secondary" @click="deletecategory(category.id)">Xóa</button>
                </td>
                <td>
                  <button  type="button" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop-edit"
                        @click="sendcategory(category)">
                        Chỉnh sửa
                </button>
                </td>
              </tr>
  
            </tbody>
          </table>
  
        </div>
      </div>
    </div>
    <!--model thêm-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm danh mục sản phẩm</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên danh mục sản phẩm</label>
                <input type="text" class="form-control" v-model="cat_name">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button @click="storecategory" class="btn btn-secondary">Thêm</button>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Edit Modal HTML -->
  <div class="modal fade" id="staticBackdrop-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <form>
              <div class="modal-header">
                  <h4 class="modal-title">Sửa danh mục sản phẩm</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                      <label>Tên danh mục sản phẩm:</label>
                      <input type="text" class="form-control"  required  :placeholder= selectcategory.cat_name v-model="cat_name">
                  </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <div class="control">
                      <button class="btn btn-primary" @click="updatecategory">Sửa</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
  </div>
  </template>
  
  <script>

  export default {
    name:"category_admin",
    data() {
      return {
       categorys: [],  
        selectcategory:'',
       
      };
    },
    mounted() {
    
      this.getcategory();
    },
    methods: {
      sendcategory(category){
        this.selectcategory = category;
      },
      
      reloadPage() {
        window.location.reload();
      },

      async getcategory() {
        try {
          const result = await axios.get(
            `${import.meta.env.VITE_API_BASE_URL}category`
          );
          this.categorys = result.data;
          console.log(result);
        } catch (e) {
          console.log(e);
        }
      },
  
      async storecategory() {
        try {
          const category = await axios.post(
            `${import.meta.env.VITE_API_BASE_URL}add-category`,
            {
              cat_name: this.cat_name,
            }
          ); 
         this.reloadPage()      
        } catch (e) {
          console.log(e);
        }
      },

     async deletecategory(id) {
      try {
        await axios.delete(`${import.meta.env.API_BASE_URL}delete-category/` + id)
        this.reloadPage()
      } catch (error) {
        this.error = error.response.data
      }
    },
    }
  };
  
  </script>