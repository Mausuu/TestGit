<template>
    <navbar/>
    <div class="body">
         <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col"><h4><b>Giỏ hàng</b></h4></div>
                        <div class="col align-self-center text-right text-muted">{{sumqty()}} Sản phẩm</div>
                    </div>
                </div>    
                <div class="row border-top border-bottom" >
                    <div class="row main align-items-center"  v-for="cart in carts">
                        <div class="col-2"><img class="img-fluid" :src=cart.url ></div>
                        <div class="col">
                            <div class="row text-muted">{{ cart.name_product }}</div>
                            <!-- <div class="row">Cotton T-shirt</div> -->
                        </div>
                        <div class="col">
                            
                            <input  aria-label="quantity" class="input-qty" name="product_qty" type="number" @input="updateCart($event,cart.id) "
                            :value="cart.product_qty" > 
                        </div>
                        <div class="col">{{
                            formatPrice(cart.price * cart.product_qty) }} <span class="close"></span></div>
                            <div class="col">
                                <button @click="deletecart(cart.id)" style="border:none;padding:10px;color:red" >X</button>
                            </div>
                    </div>
                </div>
                
                <div class="back-to-shop">  <router-link to="/">&leftarrow;<span class="text-muted">Tiếp tục mua sắm</span></router-link></div>
            </div>
            <div class="col-md-4 summary">
                <div><h5><b>Hóa đơn tạm tính:</b></h5></div>
            
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">Tổng tiền</div>
                    <div class="col text-right">{{sumprice()}}</div>
                </div>
            
                <router-link class="btn" to="/order">Thanh toán</router-link>
                <button class="btn" @click="update()">Cập nhập giỏ hàng</button>

              
            </div>
        </div>
        
    </div>
    </div>
 
</template>

<script>
import navbar from '../components/navbar.vue';

export default
{
    components:
    {
        navbar
    },
    data()
    {
        return{
            carts:[],
            qty:""  ,
          
                
        }
    },
    mounted()
    {
        this.getCart();
       
    },
    methods:
    {
    
    formatPrice(value) {
        var formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
        });
        return formatter.format(value);
    },
    sumprice()
    {
        var i=0
        var array =  this.carts
        var sum=0;
      for ( i=0;i<array.length;i++)
      {    
        sum+=array[i].price*array[i].product_qty     
      }
      return this.formatPrice(sum)
    },
    sumqty()
    {
        var i=0
        var array = this.carts
        var sum=0;
      for ( i=0;i<array.length;i++)
      {    
        sum+=array[i].product_qty   
      }
      return (sum)
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
     
    async updateCart(e,id) {
        try {
          
          const cart = await axios.post(
            `${import.meta.env.VITE_API_BASE_URL}cart-update/` +id,
            {
               
             product_qty: e.target.value,            
            }            
          );        
        } catch (e) {
          console.log(e);
        } 
      },
      
     async deletecart(id) {
      try {
        await axios.get(`${import.meta.env.VITE_API_BASE_URL}cart-delete/` + id)
        window.location.reload()
      } catch (error) {
        this.error = error.response.data
      }
     
    },
     
    },

}
</script>

<style >
.body
{
    background: #ddd;
    min-height: 100vh;
    vertical-align: middle;
    display: flex;
    font-family: sans-serif;
    font-size: 0.8rem;
    font-weight: bold;
    padding-top: 100px;
}
.title{
    margin-bottom: 5vh;
}
.card{
    margin: auto;
    max-width: 950px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
}
@media(max-width:767px){
    .card{
        margin: 3vh auto;
    }
}
.cart{
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
}
@media(max-width:767px){
    .cart{
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem;
    }
}
.summary{
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65);
}
@media(max-width:767px){
    .summary{
    border-top-right-radius: unset;
    border-bottom-left-radius: 1rem;
    }
}
.summary .col-2{
    padding: 0;
}
.summary .col-10
{
    padding: 0;
}.row{
    margin: 0;
}
.title b{
    font-size: 1.5rem;
}
.main{
    margin: 0;
    padding: 2vh 0;
    width: 100%;
}
.col-2, .col{
    padding: 0 1vh;
}
a{
    padding: 0 1vh;
}
.close{
    margin-left: auto;
    font-size: 0.7rem;
}
img{
    width: 3.5rem;
}
.back-to-shop{
    margin-top: 4.5rem;
}
h5{
    margin-top: 4vh;
}
hr{
    margin-top: 1.25rem;
}
form{
    padding: 2vh 0;
}
select{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input:focus::-webkit-input-placeholder
{
      color:transparent;
}
.btn{
    margin-top: 4vh;
    padding: 1vh;

}

a{
    color: black; 
}
a:hover{
    color: black;
    text-decoration: none;
}
 #code{
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253) , rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
}
</style>