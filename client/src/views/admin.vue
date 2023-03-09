<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
    <div class="container">
      <router-link to="/admin" class="navbar-brand d-flex justify-content-between align-items-center order-lg-0">
        <img style="width:100px" src="../assets/logo.png" alt="site icon">
        <span class="text-uppercase fw-lighter ms-2">404KEY ADMIN</span>
      </router-link>

      
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-lg-1" id="navMenu">
        <ul class="navbar-nav mx-auto text-center">

          <li class="nav-item px-2 py-2">
            <router-link to="/admin" class="nav-link text-uppercase text-dark">TRANG CHỦ</router-link>
          </li>


          <li class="nav-item px-2 py-2 border-0">
            <router-link :to="{ name: 'user'}" class="nav-link text-uppercase text-dark">QUẢN LÝ NGƯỜI DÙNG</router-link>
          </li>

          <li class="nav-item px-2 py-2 border-0">
            <router-link :to="{ name: 'category'}" class="nav-link text-uppercase text-dark">QUẢN LÝ DANH MỤC</router-link>
          </li>

          <li class="nav-item px-2 py-2 border-0">
            <router-link :to="{ name: 'product'}" class="nav-link text-uppercase text-dark">QUẢN LÝ SẢN PHẨM</router-link>
          </li>

          <li class="nav-item px-2 py-2 border-0">
            <router-link :to="{ name: 'bill'}" class="nav-link text-uppercase text-dark">QUẢN LÝ HÓA ĐƠN</router-link>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <div style="padding-top: 104px;">
    <div class="dashboard-main">
      <div class="container">
        <!--content center-->
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>
<script>
import '../assets/admin.js'
</script>
