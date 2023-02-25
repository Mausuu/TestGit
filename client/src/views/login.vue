<template>
   
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Đăng nhập</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			
			<input type="email" placeholder="Tên tài khoản :" />
			<input type="password" placeholder="Mật khẩu :" />
			<a href="#">Quên mật khẩu</a>
			<button type="submit">Đăng nhập</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h2>Chào mừng bạn</h2>
				<p>Nếu bạn chưa có tài khoản,hãy tạo ra nó.</p>
				<router-link :to="{ name: 'register' }"><button class="ghost" id="signUp">Đăng ký</button></router-link>
			</div>
		</div>
	</div>
</div>
 
</template>

<script>
import { ref } from 'vue';
import { reactive } from 'vue';
import axios from 'axios'
import '../assets/css/login.css'

  let form = reactive
</script>