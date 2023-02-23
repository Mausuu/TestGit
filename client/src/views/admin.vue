<template>
  <!-- <div class="container-fluid">
          <div class="row">
            <div class="col-3">
              <input type="checkbox" id="toggler" />
              <aside class="aside-wrapper">
                <h1 class="logo-text"><span>404KEY</span> <label for="toggler"><i
                      class="fas fa-bars sidebar-toggle"></i></label></h1>
                <ul>
                  <router-link :to="{ name: 'admin-information' }" class="nav-link li" ><i class="fas fa-home"></i> Trang chủ</router-link>
                  <router-link :to="{ name: 'admin-users' }" class="nav-link li" ><i class="fas fa-building"></i> Quản lý khách hàng</router-link>
                  <router-link :to="{ name: 'admin-menu' }" class="nav-link li" ><i class="fas fa-dollar-sign"></i> Quản lý danh mục</router-link>
                  <router-link :to="{ name: 'admin-products' }" class="nav-link li" ><i class="fas fa-dollar-sign"></i> Quản lý sản phẩm</router-link>
                  <router-link :to="{ name: 'admin-bill' }" class="nav-link li" ><i class="fas fa-credit-card"></i> Quản lý hóa đơn</router-link>
                </ul>
                <ul>
                  <li class="li"><i class="fas fa-headset"></i> Đăng xuất</li>
                </ul>
              </aside>
            </div>
            <div class="col-9">
             
              <router-view />
            </div>
          </div>
        </div> -->

  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>404KEY</h3>
      </div>

      <ul class="list-unstyled components">
        <p>Quản lý hệ thống website</p>
        <li>
          <router-link :to="{ name: 'admin-information' }" class="nav-link li"><i class="fas fa-home"></i> Trang
            chủ</router-link>
          <router-link :to="{ name: 'admin-users' }" class="nav-link li"><i class="fas fa-building"></i> Quản lý khách
            hàng</router-link>
          <router-link :to="{ name: 'admin-menu' }" class="nav-link li"><i class="fas fa-dollar-sign"></i> Quản lý danh
            mục</router-link>
          <router-link :to="{ name: 'admin-products' }" class="nav-link li"><i class="fas fa-dollar-sign"></i> Quản lý sản
            phẩm</router-link>
          <router-link :to="{ name: 'admin-bill' }" class="nav-link li"><i class="fas fa-credit-card"></i> Quản lý hóa
            đơn</router-link>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-infos">
            <i class="fas fa-align-left"></i>
            <span> </span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link">Trang quản lý</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">Đăng xuất</a>

              </li>
            </ul>
          </div>
        </div>
      </nav>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import "../assets/css/admin.css";
$(document).ready(function () {
  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
  });
});
</script>