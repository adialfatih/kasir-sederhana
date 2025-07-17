<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kasir Rumah Makan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root{--primary:#FF6B00;--primary-dark:#E65C00;--secondary:#E30613;--white:#FFFFFF;--light:#FFF5EE;--dark:#333333}*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif}body{background-color:var(--light);display:flex;justify-content:center;align-items:center;min-height:100vh;background-image:url(https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80);background-size:cover;background-position:center;background-blend-mode:overlay;background-color:rgb(255 107 0 / .2)}.login-container{width:90%;max-width:400px;background-color:var(--white);border-radius:15px;box-shadow:0 10px 30px rgb(0 0 0 / .2);overflow:hidden;animation:fadeIn 0.8s ease-out;position:relative}.login-header{background:linear-gradient(135deg,var(--primary),var(--secondary));padding:25px;text-align:center;color:var(--white);position:relative;overflow:hidden}.login-header::before{content:'';position:absolute;top:0;left:0;width:100%;height:100%;background:linear-gradient(135deg,var(--primary),var(--secondary));z-index:-1}.login-header h1{font-size:24px;margin-bottom:5px;font-weight:700;text-shadow:1px 1px 3px rgb(0 0 0 / .3)}.login-header p{font-size:14px;opacity:.9}.login-form{padding:30px;animation:slideUp 0.6s ease-out 0.3s both}.form-group{margin-bottom:20px;position:relative}.form-group label{display:block;margin-bottom:8px;font-weight:600;color:var(--dark);font-size:14px}.form-group input{width:100%;padding:12px 15px;border:2px solid #ddd;border-radius:8px;font-size:14px;transition:all 0.3s;background-color:var(--white)}.form-group input:focus{border-color:var(--primary);box-shadow:0 0 0 3px rgb(255 107 0 / .2);outline:none}.password-toggle{position:absolute;right:15px;top:46px;transform:translateY(-50%);cursor:pointer;color:var(--dark);opacity:.6;transition:all 0.3s}.password-toggle:hover{opacity:1;color:var(--primary)}.login-btn{width:100%;padding:12px;background:linear-gradient(to right,var(--primary),var(--primary-dark));border:none;border-radius:8px;color:var(--white);font-size:16px;font-weight:600;cursor:pointer;transition:all 0.3s;margin-top:10px;box-shadow:0 4px 6px rgb(0 0 0 / .1)}.login-btn:hover{background:linear-gradient(to right,var(--primary-dark),var(--primary));box-shadow:0 6px 8px rgb(0 0 0 / .15);transform:translateY(-2px)}.login-btn:active{transform:translateY(0);box-shadow:0 2px 4px rgb(0 0 0 / .1)}.login-footer{text-align:center;padding:15px;font-size:12px;color:var(--dark);opacity:.7;border-top:1px solid #eee}.login-footer a{color:var(--secondary);text-decoration:none;font-weight:600}.login-footer a:hover{text-decoration:underline}@keyframes fadeIn{from{opacity:0;transform:scale(.95)}to{opacity:1;transform:scale(1)}}@keyframes slideUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}@media (max-width:480px){.login-container{width:95%}.login-header h1{font-size:20px}.login-form{padding:20px}}.corner-decoration{position:absolute;width:100px;height:100px;background-color:var(--white);opacity:.1;border-radius:50%}.corner-1{top:-50px;right:-50px}.corner-2{bottom:-50px;left:-50px}
    </style>
</head>
<body>
    <div class="login-container">
        <div class="corner-decoration corner-1"></div>
        <div class="corner-decoration corner-2"></div>
        
        <div class="login-header">
            <h1>Kasir Rumah Makan</h1>
            <p>Silakan masuk untuk mengakses sistem</p>
        </div>
        
        <form class="login-form" id="loginForm">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                <i class="fas fa-eye password-toggle" id="togglePassword"></i>
            </div>
            
            <button type="submit" class="login-btn">Masuk</button>
        </form>
        
        <div class="login-footer">
            &copy; 2025 Develop By : <a href="#">Grafamedia</a>
        </div>
    </div>

	<script src="<?=base_url('assets/jquery.js');?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
            
            // Form submission
            const loginForm = document.getElementById('loginForm');
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const username = document.getElementById('username').value;
                const password = document.getElementById('password').value;
                
                // Simulate login process
                console.log('Login attempt with:', { username, password });
                
                // Add loading animation
                const loginBtn = document.querySelector('.login-btn');
                loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                loginBtn.disabled = true;
				$.ajax({
					url:"<?=base_url();?>login/act_login",
					type: "POST",
					dataType: "json",
					data: {"username" : username, "password" : password},
					cache: false,
					success: function(dataResult){
						setTimeout(() => {
							if(dataResult.statusCode == 200){
								Swal.fire({
									icon: 'success',
									title: 'Berhasil Login',
									text: dataResult.message
								}).then((result) => {
									window.location.href = "<?=base_url();?>dashboard";
								});
							} else {
								Swal.fire({
									icon: 'error',
									title: 'Gagal Login',
									text: dataResult.message
								});
							}
							loginBtn.innerHTML = 'Masuk';
							loginBtn.disabled = false;
						}, 500);
					}
				});
                
            });
            
            // Add input focus effects
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.querySelector('label').style.color = 'var(--primary)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.querySelector('label').style.color = 'var(--dark)';
                });
            });
        });
    </script>
</body>
</html>