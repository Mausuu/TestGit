<template>
   
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Đăng ký</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                
                <input type="email" placeholder="Tên tài khoản :" />
                <input type="password" placeholder="Mật khẩu :" />
                <input type="repassword" placeholder="Nhâp lại mật khẩu :" />
                <button>Đăng ký</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h2>Chào mừng bạn</h2>
                    <p>Nếu bạn đã có tài khoản,đăng nhập.</p>
                    <router-link :to="{ name: 'login' }"><button class="ghost" id="signUp">Đăng nhập</button></router-link>
                </div>
            </div>
        </div>
    </div>
     
    </template>
    
    <script>
    import '../assets/css/login.css'
    </script>