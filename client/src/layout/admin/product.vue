<template>
  <br>
  <div class="container-fluid">
    <div class="">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">
              <h2>Quản lý sản phẩm</h2>
            </div>
          </div>
        </div>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Thêm sản phẩm
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
              <th>Tên sản phẩm</th>
              <th>Giá sản phẩm</th>
              <th>Hình ảnh sản phẩm sản phẩm</th>
              <th>Tên loại sản phẩm</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products">
              <td>
                <span class="custom-checkbox">
                  <input type="checkbox" id="checkbox1" name="options[]" value="1">
                  <label for="checkbox1"></label>
                </span>
              </td>
              <td>{{ product.name_product }}</td>
              <td>{{ product.price }}</td>
              <td>{{ product.avatar }}</td>
              <td>{{ product.name_cat }}</td>

              <td>
                <button class="btn btn-secondary" @click="deleteproduct(product.id)">Xóa</button>
              </td>
              <td>
                <button  type="button" class="btn btn-primary"
                      data-bs-toggle="modal" data-bs-target="#staticBackdrop-edit"
                      @click="sendProduct(product)">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm sản phẩm</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
              <input type="text" class="form-control" v-model="name_product">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Giá sản phẩm</label>
              <input type="text" class="form-control" v-model="price">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Ảnh sản phẩm</label>
              <input type="text" class="form-control" v-model="avatar">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Danh mục sản phẩm</label>
              <form>
                <select  v-model="key" class="form-select" id="sel1" name="sellist1">
                  <option>Chọn loại danh mục</option>
                  <option v-for="category in categorys" :value="category.id">{{ category.cat_name }}</option>
                </select>
              </form>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button @click="storeProduct" class="btn btn-secondary">Thêm</button>
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
                <h4 class="modal-title">Sửa sản phẩm</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                    <label>Tên sản phẩm:</label>
                    <input type="text" class="form-control"  required  :placeholder= selectProduct.name_product v-model="name_product">
                </div>
                <div class="form-group">
                    <label>Giá:</label>
                    <input type="text" class="form-control"  required :placeholder= selectProduct.price  v-model="price">
                </div>
                <div class="form-group">
                  <label>Danh mục sản phẩm</label>
                  <form>
                  <select  v-model="key" class="form-select" id="sel1" name="sellist1"> 
                    <option v-for="category in categorys" :placeholder="category.id">{{ category.cat_name }}</option>
                  </select>
                </form>
                </div>
                
                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="text" class="form-control"  :placeholder= selectProduct.avatar required v-model="avatar">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <div class="control">
                    <button class="btn btn-primary" @click="updateProduct">Sửa</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</template>

<script>
export default {
  data() {
    return {
      products: [],
      categorys: [],
      selectProduct:'',
    };
  },
  mounted() {
    this.getproducts();
    this.getcategorys();
  },
  methods: {

    sendProduct(product){
      this.selectProduct = product;
    },
    
    getCat(event) {
      return event.target.value
    },
    reloadPage() {
      window.location.reload();
    },
    async getproducts() {
      try {
        const result = await axios.get(
          `${import.meta.env.VITE_API_BASE_URL}product`
        );
        this.products = result.data;
        console.log(result);
      } catch (e) {
        console.log(e);
      }
    },

    async getcategorys() {
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

    async storeProduct() {
      try {
        
        const product = await axios.post(
          `${import.meta.env.VITE_API_BASE_URL}add-product`,
          {
            name_product: this.name_product,
            avatar: this.avatar,
            price: this.price,
            cat_id: this.key,
          }
        );
      
       this.reloadPage()
     
      } catch (e) {
        console.log(e);
      }
    },
    async deleteproduct(id) {
      try {
        await axios.delete('${import.meta.env.VITE_API_BASE_URL}delete-product/' + id)
        this.reloadPage()
      } catch (error) {
        this.error = error.response.data
      }
    },

    
  }
};

</script>