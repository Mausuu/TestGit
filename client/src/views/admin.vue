<template>
  <div id="app">
    <div id="sidebar" class='active'>
      <div class="sidebar-wrapper active">

        <div class="sidebar-header">
          <div class="navbar-brand">404KEY</div>
        </div>

        <div class="sidebar-menu">
          <ul class="menu">
            <li class='sidebar-title'>Main Menu</li>
            <li class="sidebar-item active ">

              <router-link :to="{ name: 'admin'}" class='sidebar-link'>
                <i data-feather="home" width="20"></i>
                <span>Trang chủ</span>
              </router-link>
            </li>

            <li class='sidebar-title'>Hệ thống quản lý</li>

            <li class="sidebar-item ">
              <router-link :to="{ name: 'user'}"  class='sidebar-link'>
                <i data-feather="file-plus" width="20"></i>
                <span>Quản lý người dùng</span>
              </router-link>
            </li>

            <li class="sidebar-item ">
              <router-link :to="{ name: 'category'}"  class='sidebar-link'>
                <i data-feather="file-plus" width="20"></i>
                <span>Quản lý danh mục sản phẩm</span>
              </router-link>
            </li>

            <li class="sidebar-item ">
              <router-link :to="{ name: 'product'}"  class='sidebar-link'>
                <i data-feather="file-plus" width="20"></i>
                <span>Quản lý sản phẩm</span>
              </router-link>
            </li>

            <li class="sidebar-item ">
              <router-link :to="{ name: 'bill'}"  class='sidebar-link'>
                <i data-feather="file-plus" width="20"></i>
                <span>Quản lý hóa đơn</span>
              </router-link>
            </li>
          </ul>
        </div>

      </div>
    </div>
    <div id="main">
      <div class="main-content container-fluid">
        <router-view />
      </div>
    </div>
  </div>
</template>
<script>
import '../assets/admin.css'
import '../assets/admin.js'
</script>