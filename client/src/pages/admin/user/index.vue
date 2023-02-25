<template>
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản lý <b>khách hàng</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <button style="background-color:rgb(70,127,170)" type="button" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Thêm khách hàng
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
                            <th>Tên tài khoản</th>
                            <th>Địa chỉ email</th>
                            <th>Ảnh đại diện</th>
                            <th>Sửa</th>
                            <th>Xóa</th>

                        </tr>
                    </thead>
                    <tbody v-for="user of users">
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.avatar }}</td>
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
                        <h4 class="modal-title">Thêm khách hàng</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên khách hàng:</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ email:</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu khách hàng:</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary">Thêm khách hàng</button>
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
                        <h4 class="modal-title">Chỉnh sửa khách hàng</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên khách hàng:</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ email:</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu khách hàng:</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary">Chỉnh sửa khách hàng</button>
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
            users: [],
            errors: [],
        };
    },

    // lấy dữ liệu khi component được tạo thành công
    created() {
        axios.get(`http://127.0.0.1:8000/api/users`)
            .then(response => {
                this.users = response.data
            })
            .catch(e => {
                this.errors.push(e)
            })
    }
}
</script>