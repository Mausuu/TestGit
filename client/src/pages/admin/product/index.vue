<template>
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản lý <b>sản phẩm</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <button style="background-color:rgb(70,127,170)" type="button" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Thêm sản phẩm
                            </button>
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
                            <th>Ảnh sản phẩm</th>
                            <th>Loại sản phẩm</th>

                            <th>Sửa</th>
                            <th>Xóa</th>

                        </tr>
                    </thead>
                    <tbody v-for="product of products">
                        <tr>
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
                                <button style="background-color:rgb(70,127,170)" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop-edit">
                                    Chỉnh sửa
                                </button>
                            </td>
                            <td>
                                <button style="background-color:rgb(70,127,170)" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop-delete">
                                    Xóa
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>


            </div>
        </div>
    </div>


    <!-- Add Modal HTML -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm sản phẩm</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên sản phẩm:</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm:</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary">Thêm sản phẩm</button>
                    </div>
                </form>
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
                        <h4 class="modal-title">Chỉnh sửa sản phẩm</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên sản phẩm:</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm:</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary">Chỉnh sửa sản phẩm</button>
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
            errors: [],
        };
    },

    // lấy dữ liệu khi component được tạo thành công
    created() {
        axios.get(`http://127.0.0.1:8000/api/product`)
            .then(response => {
                this.products = response.data
            })
            .catch(e => {
                this.errors.push(e)
            })
    }
}
</script>