<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
    <div class="container ">
      <router-link to="/" class="navbar-brand d-flex justify-content-between align-items-center order-lg-0">
        <img style="width:100px" src="../assets/logo.png" alt="site icon">
        <span class="text-uppercase fw-lighter ms-2">404KEY</span>
      </router-link>

      <div class="order-lg-2 nav-btns">
        <button type="button" class="btn position-relative" @click="checkCart">
          <i class="fa fa-shopping-cart"></i>
        </button>
       
      </div>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-lg-1" id="navMenu">
        <ul class="navbar-nav ">

          <li class="nav-item px-2 py-2">
            <router-link to="/" class="nav-link text-uppercase text-dark">TRANG CHỦ</router-link>
          </li>

          <li class="nav-item px-2 py-2 border-0">
            <a class="nav-link text-uppercase text-dark">VỀ CHÚNG TÔI</a>
          </li>
          
          <li class="nav-item px-2 py-2 border-0">
            <a @click="handleButtonClick" class="nav-link text-uppercase text-dark">{{buttonLabel}}</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  
</template>


<script>
export default {
  data() {
    return {
      buttonLabel:'Đăng nhập'
    }
  },
  computed: {
    buttonLabel() {
      let user=localStorage.getItem("user-info");
      if (user) {
        this.buttonLabel= 'Đăng xuất'
       
      } else {
        this.buttonLabel = 'Đăng nhập';
      }
      return this.buttonLabel
    },
  },
  methods:
  {
    handleButtonClick()
    {
     if(this.buttonLabel == 'Đăng nhập')
     {
      this.$router.push({ name:'login_client'})
     }
     else if((this.buttonLabel == 'Đăng xuất'))
     {
      localStorage.removeItem('user-info')
      this.$router.push({ name:'login_client'})
     }
    },
    checkCart()
    {
      let user=localStorage.getItem("user-info")
      if(user)
      {
        this.$router.push({ name: 'cart' })
      }
      else
      {
        alert('Hãy đăng nhập để xem giỏ hàng')
      }
    }
  }
};
</script>

<style>
a:hover{
  cursor: pointer;
}
</style>