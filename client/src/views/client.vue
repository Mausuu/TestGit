<template>   
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top ">
        <div class="container">
          <a to="/" class=" order-lg-0 navbar-brand d-flex justify-content-between align-items-center">
            <span class="text-uppercase fw-lighter">404KEY</span>
          </a>
          <div class="order-lg-2">
            <button type="button" class="btn reponsive-relative">
              <i class="fa fa-shopping-cart"></i>
            </button>
    
            <button type="button" class="btn reponsive-relative">
              <i class="fa fa-search"></i>
            </button>
    
            <button type="button" class="btn reponsive-relative">
              <i class="fa fa-phone"></i>
               <span class="text-uppercase fw-lighter">  HOTLINE: 0123456789</span>
            </button>
          </div>
    
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse order-lg-1" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item px-2 py-2 ">
                <a class="nav-link " to="/">Trang chủ</a>
              </li>
    
              <!--Keycap bộ-->
              <li class="nav-item dropdown px-2 py-2">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  KEYCAP BỘ
                </a>
                <ul class="dropdown-menu ">
                  <li class="nav-item px-2 py-2"> <a class="nav-link" to="/keyPBT">Keycap PBT</a> </li>
                  <li class="nav-item px-2 py-2"> <a class="nav-link" to="/keyABS">Keycap ABS</a> </li>
                </ul>
              </li>
    
              <!--MODs phím-->
              <li class="nav-item px-2 py-2">
                <a class="nav-link" to="/mod">MODS PHÍM</a>
              </li>
    
               <!--Sản phẩm-->
               <li class="nav-item dropdown px-2 py-2">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  SẢN PHẨM
                </a>
                <ul class="dropdown-menu ">
                  <li class="nav-item px-2 py-2"> <a class="nav-link" to="/KitCustom">Kit Custom</a> </li>
                  <li class="nav-item px-2 py-2"> <a class="nav-link" to="/KitStock">Kit Stock</a> </li>
                </ul>
              </li>
    
              <!--Blog-->
              <li class="nav-item px-2 py-2">
                <a class="nav-link" to="/blog">BLOG</a>
              </li>
    
              
              <!--Về chung tôi-->
              <li class="nav-item px-2 py-2">
                <a class="nav-link" to="/about">VỀ CHÚNG TÔI</a>
              </li>
    
               <!--tài khoản-->
               <li class="nav-item dropdown px-2 py-2">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  TÀI KHOẢN
                </a>
                <ul class="dropdown-menu ">
                  <li class="nav-item px-2 py-2"> <a class="nav-link" to="/">Đăng nhập</a> </li>
                  <li class="nav-item px-2 py-2"> <a class="nav-link" to="/">Đăng ký</a> </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>        
      <banner/>
      <router-view></router-view>
</template>

<script>
import banner from '../components/banner.vue';
import '../assets/css/client.css';
export default
{
    components:
    {
        banner,
    }
}
</script>

<style scoped>
body
{
    background: rgb(236,143,184);
    background: radial-gradient(circle, rgba(236,143,184,1) 0%, rgba(255,255,255,1) 100%);
}
</style> 