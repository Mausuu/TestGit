<template>
    
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Quản lý sản phẩm</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
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
                        <td>{{product.name_product}}</td>
                        <td>{{product.price}}</td>
                        <td>{{product.avatar}}</td>
                        <td>{{product.name_cat}}</td>
                        <td>
                            <a  class="edit" data-toggle="modal">Xóa</a>
                            
                        </td>
                        <td>
                           
                            <a  class="delete" data-toggle="modal">Sửa</a>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
            
        </div>
    </div> 
     
  </template>

<script>
export default {
    data: () => ({
    error: "",
    products: []
  }),
  mounted() {
    fetch("https://www.404fn.online/server/public/api/product")
      .then(response => response.json())
      .then(result => {
        console.log(result);
        this.products = result;
      });
  },
}
</script>