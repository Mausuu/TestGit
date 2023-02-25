<template>
    <div class="product container">
        <h3 class="product_title">{{title}}</h3>
        <div class="product_content ">
             <div class="row">  
                <div class="col-xl-4 col-sm-12 col-md-6"  v-for="product of products">
                    <div class="product-card">
                        <div class="badge">Hot</div>
                        <div class="product-tumb">
                          <img src="https://i.imgur.com/xdbHo4E.png" alt="">
                        </div>
                        <div class="product-details">
                          <span class="product-catagory">{{ product.name_cat }}</span>
                          <h4><a href="">{{ product.name_product }}</a></h4>
                          <p>{{ product.name_product }}</p>
                          <div class="product-bottom-details">
                            <div class="product-price">{{ product.price }}</div>
                            <div class="product-links">
                              <a href=""><i class="fa fa-heart"></i></a>
                              <a href=""><i class="fa fa-shopping-cart"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
             </div>
             
        </div>
    </div>
</template>

<script>
export default
{
    props:
    {
        title:String
    },
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

<style>
.product_title{
    font-weight: 500;
    display: block;
    text-transform: uppercase;
    color: #363636;
    margin: 2rem;
    text-align: center;
}
a
{
    text-decoration: none;
}
.product-card {
    width: 380px;
    position: relative;
    box-shadow: 0 2px 7px #dfdfdf;
    margin: 50px auto;
    background: #fafafa;
}

.badge {
    position: absolute;
    left: 10px;
    top: 20px;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 700;
    background: red;
    color: #fff;
    padding: 3px 10px;
}

.product-tumb {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 300px;
    padding: 50px;
    background: #f0f0f0;
}

.product-tumb img {
    max-width: 100%;
    max-height: 100%;
}

.product-details {
    padding: 30px;
}

.product-catagory {
    display: block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    color: #ccc;
    margin-bottom: 18px;
}

.product-details h4 a {
    font-weight: 500;
    display: block;
    margin-bottom: 18px;
    text-transform: uppercase;
    color: #363636;
    text-decoration: none;
    transition: 0.3s;
}

.product-details h4 a:hover {
    color: #fbb72c;
}

.product-details p {
    font-size: 15px;
    line-height: 22px;
    margin-bottom: 18px;
    color: #999;
}

.product-bottom-details {
    overflow: hidden;
    border-top: 1px solid #eee;
    padding-top: 20px;
}

.product-bottom-details div {
    float: left;
    width: 50%;
}

.product-price {
    font-size: 18px;
    color: #fbb72c;
    font-weight: 600;
}

.product-price small {
    font-size: 80%;
    font-weight: 400;
    text-decoration: line-through;
    display: inline-block;
    margin-right: 5px;
}

.product-links {
    text-align: right;
}

.product-links a {
    display: inline-block;
    margin-left: 5px;
    color: #e1e1e1;
    transition: 0.3s;
    font-size: 17px;
}

.product-links a:hover {
    color: #fbb72c;
}

</style>