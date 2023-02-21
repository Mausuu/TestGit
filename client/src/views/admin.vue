<template>
        <div class="container-fluid">
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
        </div>

        
</template>

<script>
import "../assets/css/admin.css";

</script>