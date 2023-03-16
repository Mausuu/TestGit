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
              <th>Mô tả</th>
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
              <td>{{ product.detail }}</td>
              <td>{{ product.price }}</td>
              <td>{{ product.avatar }}</td>
              <td>{{ product.name_cat }}</td>

              <td>
                <button class="btn btn-secondary" @click="deleteproduct(product.id)">Xóa</button>
              </td>
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-edit"
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
          <form @submit.prevent="saveProduct">
            <div class="form-group">
              <label for="name_product">Tên sản phẩm:</label>
              <input class="form-control" type="text" id="name_product" v-model="name_product" required>
              <br>
            </div>
            <div class="form-group">
              <label for="price">Giá:</label>
              <input class="form-control" type="number" id="price" v-model="price" required>
              <br>
            </div>
            <div class="form-group">
              <label for="cat_id">Loại sản phẩm:</label>
              <select id="cat_id" v-model="cat_id" required>
                <option value="">Chọn loại sản phẩm</option>
                <option v-for="category in categorys" :key="category.id" :value="category.id">{{ category.cat_name }}
                </option>
              </select>
              <br>
            </div>
            <div class="form-group">
              <label for="detail">Mô tả chi tiết:</label>
              <textarea class="form-control" id="detail" v-model="detail" required></textarea>
              <br>
            </div>
            <div class="form-group">
              <label for="quantity">Số lượng:</label>
              <input class="form-control" type="number" id="quantity" v-model="quantity" required>
              <br>
            </div>
            <div class="form-group">
              <label for="image">Hình ảnh:</label>
              <input class="form-control" type="file" id="image" @change="onFileSelected">
              <br>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary">Lưu sản phẩm</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal HTML -->
  <div class="modal fade" id="staticBackdrop-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
          <div class="modal-header">
            <h4 class="modal-title">Sửa sản phẩm</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Tên sản phẩm:</label>
              <input type="text" class="form-control" required v-model="name_product">
            </div>

            <div class="form-group">
              <label>Mô tả:</label>
              <input type="text" class="form-control" required v-model="detail">
            </div>

            <div class="form-group">
              <label>Giá:</label>
              <input type="text" class="form-control" required v-model="price">
            </div>
            <div class="form-group">
              <label>Giá:</label>
              <input type="text" class="form-control" required v-model="quantity">
            </div>
            <div class="form-group">
              <label>Danh mục sản phẩm</label>
              <form>
                <select v-model="key" class="form-select" id="sel1" name="sellist1">        
                  <option v-for="category in categorys">{{ category.cat_name }}</option>
                </select>
              </form>
            </div>

            <div class="form-group">
              <label for="image">Hình ảnh:</label>
              <input class="form-control" type="file" id="image" @change="onFileSelectedNew">
              <br>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <div class="control">
              <button class="btn btn-primary" @click="editProduct">Sửa</button>
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
      products: [],
      categorys: [],
      name_product: '',
      id_product:'',
      price: '',
      detail: '',
      avatar: null,
      avatar_new: null,
      quantity: '',
      productCategory: ''
    };
  },
  mounted() {
    this.getproducts();
    this.getcategorys();

  },

  methods: {

    sendProduct(product) {
      this.name_product = product.name_product;
      this.price = product.price;
      this.detail = product.detail
      this.id_product=product.id;
      this.quantity=product.quantity;
    },

    getCat(event) {
      return event.target.value
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

    onFileSelected(event) {
      this.avatar = event.target.files[0]
    },

    onFileSelectedNew(event) {
      this.avatar_new = event.target.files[0]
    },
    saveProduct() {
      let formData = new FormData()
      formData.append('name_product', this.name_product)
      formData.append('price', this.price)
      formData.append('cat_id', this.cat_id)
      formData.append('detail', this.detail)
      formData.append('quantity', this.quantity)
      formData.append('avatar', this.avatar)

      axios.post(`${import.meta.env.VITE_API_BASE_URL}add-product`, formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
        .then(response => {
          console.log(response.data)
          // Thực hiện các thao tác cần thiết sau khi lưu sản phẩm thành công
        })
        .catch(error => {
          console.log(error.response.data)
          // Hiển thị thông báo lỗi cho người dùng
        })
    },

    async deleteproduct(id) {
      try {
        await axios.delete(`${import.meta.env.VITE_API_BASE_URL}delete-product/` + id)
        location.reload()
      } catch (error) {
        this.error = error.response.data
      }
    },

    editProduct() {
  axios.post(`${import.meta.env.VITE_API_BASE_URL}update-product/` + this.id_product, {
    name_product: this.name_product,
    detail: this.detail,
    price: this.price,
    category: this.key,
    avatar: this.avatar_new,
    quantity:this.quantity
  })
  .then(response => {
    alert("Sửa sản phẩm thành công!");
  })
  .catch(error => {
    console.log(error);
  });
}
  }
};

</script>