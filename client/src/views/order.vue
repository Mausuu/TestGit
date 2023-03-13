<template>
    <div class="body">
        <div class="card">
            <div class="row">
                <div class="col-md-6 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col" style="padding-bottom: 5x;">
                                <h4><b>Thông tin khách hàng</b></h4>
                            </div>

                            <hr style="padding-bottom: 30px;">
                            <label class="form-label">Tên khách hàng</label>
                            <input class="form-control" v-model="name" disabled>

                            <label class="form-label">Địa chỉ nhận hàng</label>
                            <input type="text" class="form-control" v-model="address">

                            <label class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" v-model="numberphone">

                            <label class="form-label">Email</label>
                            <input class="form-control" v-model="email" disabled>

                            <hr style="padding-top: 10px;">
                        </div>
                    </div>


                    <div class="back-to-shop"> <router-link to="/cart">&leftarrow;<span class="text-muted">Quay lại giỏ
                                hàng</span></router-link></div>
                </div>
                <div class="col-md-6 summary">
                    <div class="col">
                        <h4><b>Hóa đơn</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted"> Tống có: {{ sumqty() }} sản phẩm</div>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center" v-for="cart in carts">
                            <div class="col-2"><img class="img-fluid" :src=cart.url></div>
                            <div class="col">
                                <div class="row text-muted">{{ cart.name_product }}</div>
                                <!-- <div class="row">Cotton T-shirt</div> -->
                            </div>
                            <div class="col">

                                Số lượng : {{ cart.product_qty }}
                            </div>
                            <div class="col">{{
                                formatPrice(cart.price * cart.product_qty) }}</div>

                        </div>
                    </div>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">Tổng tiền</div>
                        <div class="col text-right">{{ sumprice() }}</div>
                    </div>

                    <button class="btn" @click="addOrder">Đặt hàng</button>



                </div>
            </div>

        </div>
    </div>
</template>



<script>
export default
    {
        data() {
            return {
                carts: [],
                qty: "",
                name: '',
                address: '',
                numberphone: '',
                email: '',
                users: []

            }
        },
        mounted() {
            this.getCart();
            this.getuser()
        },
        methods:
        {
            async getuser() {
                let user = localStorage.getItem("user-info");
                const a = JSON.parse(user);
                try {
                    const result = await axios.get(
                        `${import.meta.env.VITE_API_BASE_URL}user/` + a.id
                    );
                    this.users = result.data;
                    this.name = result.data.name;
                    this.email = result.data.email;
                    console.log(result);
                } catch (e) {
                    console.log(e);
                }
            },
            async getCart() {
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
            async addOrder() {
                let user = localStorage.getItem("user-info");
                const a = JSON.parse(user);
                try {
                    const order = await axios.post(
                        `${import.meta.env.VITE_API_BASE_URL}add-order`,
                        {
                            id_user: a.id,
                            diachinguoinhan: this.address,
                            sdt: this.numberphone,
                        }
                    );
                    if (order.data.status == 200) {
                        alert('Đặt hàng thành công')
                        this.$router.push({ name:'home'})
                    }
                } catch (e) {
                    console.log(e);
                }
            },
            formatPrice(value) {
                var formatter = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND',
                    minimumFractionDigits: 0
                });
                return formatter.format(value);
            },

            sumprice() {
                var i = 0
                var array = this.carts
                var sum = 0;
                for (i = 0; i < array.length; i++) {
                    sum += array[i].price * array[i].product_qty
                }
                return this.formatPrice(sum)
            },

            sumqty() {
                var i = 0
                var array = this.carts
                var sum = 0;
                for (i = 0; i < array.length; i++) {
                    sum += array[i].product_qty
                }
                return (sum)
            },
        }
    }
</script>


<style >
.body {
    background: #ddd;
    min-height: 100vh;
    vertical-align: middle;
    display: flex;
    font-family: sans-serif;
    font-size: 0.8rem;
    font-weight: bold;
    padding-top: 100px;
}

.title {
    margin-bottom: 5vh;
}

.card {
    margin: auto;
    max-width: 950px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
}

@media(max-width:767px) {
    .card {
        margin: 3vh auto;
    }
}

.cart {
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
}

@media(max-width:767px) {
    .cart {
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem;
    }
}

.summary {
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65);
}

@media(max-width:767px) {
    .summary {
        border-top-right-radius: unset;
        border-bottom-left-radius: 1rem;
    }
}

.summary .col-2 {
    padding: 0;
}

.summary .col-10 {
    padding: 0;
}

.row {
    margin: 0;
}

.title b {
    font-size: 1.5rem;
}

.main {
    margin: 0;
    padding: 2vh 0;
    width: 100%;
}

.col-2,
.col {
    padding: 0 1vh;
}

a {
    padding: 0 1vh;
}

.close {
    margin-left: auto;
    font-size: 0.7rem;
}

img {
    width: 3.5rem;
}

.back-to-shop {
    margin-top: 4.5rem;
}

h5 {
    margin-top: 4vh;
}

hr {
    margin-top: 1.25rem;
}

form {
    padding: 2vh 0;
}

select {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}

input {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}

input:focus::-webkit-input-placeholder {
    color: transparent;
}

.btn {
    margin-top: 4vh;
    padding: 1vh;

}

a {
    color: black;
}

a:hover {
    color: black;
    text-decoration: none;
}

#code {
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
}
</style>


