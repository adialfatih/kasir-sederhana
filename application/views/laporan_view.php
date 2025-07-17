<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root{--primary:#e74c3c;--secondary:#e67e22;--light:#f5f5f5;--dark:#333;--shadow:0 4px 6px rgba(0, 0, 0, 0.1)}*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif}body{background-color:#f9f9f9;color:var(--dark);overflow-x:hidden}.app-container{display:flex;min-height:100vh;position:relative}.hamburger-menu{position:fixed;top:20px;left:20px;font-size:24px;cursor:pointer;z-index:1000;color:var(--primary);background:#fff;width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:var(--shadow)}.sidebar{width:250px;background:linear-gradient(135deg,var(--primary),var(--secondary));color:#fff;position:fixed;height:100vh;left:-250px;top:0;transition:all 0.3s ease;z-index:999;padding-top:70px;overflow-y:auto}.sidebar.active{left:0}.sidebar ul{list-style:none;padding:0}.sidebar li{padding:15px 20px;cursor:pointer;transition:background 0.3s;border-bottom:1px solid rgb(255 255 255 / .1)}.sidebar li:hover{background:rgb(255 255 255 / .1)}.sidebar li.active{background:rgb(255 255 255 / .2);border-left:4px solid #fff}.main-content{flex:1;padding:20px;margin-left:0;transition:margin-left 0.3s;padding-bottom:100px}.main-content.sidebar-active{margin-left:250px}h1{color:var(--primary);margin-bottom:20px;text-align:center}.search-container{margin-bottom:20px;position:relative}.search-container input{width:100%;padding:12px 20px;border:2px solid #ddd;border-radius:30px;font-size:16px;outline:none;transition:all 0.3s}.search-container input:focus{border-color:var(--primary)}.search-container i{position:absolute;right:20px;top:50%;transform:translateY(-50%);color:#aaa}.menu-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:20px}.menu-card{background:#fff;border-radius:10px;overflow:hidden;box-shadow:var(--shadow);transition:transform 0.3s}.menu-card:hover{transform:translateY(-5px)}.menu-img{width:100%;height:180px;object-fit:cover}
		.menu-info{padding:15px;width: 100%;display:flex;align-items:center;justify-content:space-between;}
		.menu-name{font-weight:700;margin-bottom:5px;color:var(--dark)}.menu-price{color:var(--primary);font-weight:700;margin-bottom:15px}.menu-actions{display:flex;justify-content:space-between;align-items:center}.quantity-control{display:flex;align-items:center}.quantity-btn{width:30px;height:30px;border-radius:50%;background:var(--primary);color:#fff;border:none;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center}.quantity{margin:0 10px;font-weight:700}.add-btn{background:var(--secondary);color:#fff;border:none;padding:8px 15px;border-radius:20px;cursor:pointer;font-weight:700;transition:background 0.3s}.add-btn:hover{background:#d35400}.cart-footer{position:fixed;bottom:0;left:0;right:0;background:#fff;box-shadow:0 -2px 10px rgb(0 0 0 / .1);padding:15px 20px;display:flex;justify-content:space-between;align-items:center;transform:translateY(100%);transition:transform 0.3s ease;z-index:998}.cart-footer.active{transform:translateY(0)}.cart-icon{position:relative;cursor:pointer;font-size:24px;color:var(--primary)}.cart-count{position:absolute;top:-10px;right:-10px;background:var(--primary);color:#fff;width:22px;height:22px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px}.total-price{font-weight:700;color:var(--dark)}.total-price span{color:var(--primary)}.cart-actions{display:flex;gap:10px}.cart-btn{padding:8px 15px;border-radius:20px;border:none;font-weight:700;cursor:pointer;transition:all 0.3s}.save-btn{background:var(--primary);color:#fff}.save-btn:hover{background:#c0392b}.print-btn{background:var(--secondary);color:#fff}.print-btn:hover{background:#d35400}.modal{position:fixed;top:0;left:0;right:0;bottom:0;background:rgb(0 0 0 / .5);display:flex;align-items:center;justify-content:center;z-index:1001;opacity:0;visibility:hidden;transition:all 0.3s}.modal.active{opacity:1;visibility:visible}.modal-content{background:#fff;width:90%;max-width:500px;max-height:80vh;border-radius:10px;overflow:hidden;box-shadow:var(--shadow);transform:translateY(20px);transition:transform 0.3s}.modal.active .modal-content{transform:translateY(0)}.modal-header{padding:15px 20px;background:var(--primary);color:#fff;display:flex;justify-content:space-between;align-items:center}.close-modal{font-size:24px;cursor:pointer}.modal-body{padding:20px;overflow-y:auto}.modal-title{margin-bottom:15px;color:var(--dark)}.topping-item{display:flex;justify-content:space-between;align-items:center;padding:10px 0;border-bottom:1px solid #eee}.topping-name{flex:1}.topping-price{color:var(--primary);font-weight:700;margin:0 15px}.topping-checkbox{width:20px;height:20px}.modal-footer{padding:15px 20px;display:flex;justify-content:flex-end;border-top:1px solid #eee}.add-to-cart{background:var(--primary);color:#fff;border:none;padding:10px 20px;border-radius:20px;cursor:pointer;font-weight:700;transition:background 0.3s}.add-to-cart:hover{background:#c0392b}.cart-modal{position:fixed;top:0;left:0;right:0;bottom:0;background:rgb(0 0 0 / .5);display:flex;align-items:center;justify-content:center;z-index:1001;opacity:0;visibility:hidden;transition:all 0.3s}.cart-modal.active{opacity:1;visibility:visible}.cart-modal-content{background:#fff;width:90%;max-width:500px;max-height:80vh;border-radius:10px;overflow:hidden;box-shadow:var(--shadow);transform:translateY(20px);transition:transform 0.3s}.cart-modal.active .cart-modal-content{transform:translateY(0)}.cart-item{display:flex;justify-content:space-between;align-items:center;padding:15px;border-bottom:1px solid #eee}.cart-item-info{flex:1}.cart-item-name{font-weight:700;margin-bottom:5px}.cart-item-toppings{font-size:12px;color:#777;margin-bottom:5px}.cart-item-price{color:var(--primary);font-weight:700}.cart-item-actions{display:flex;align-items:center}.remove-item{color:var(--primary);margin-left:15px;cursor:pointer}.cart-summary{padding:15px;border-top:1px solid #eee}.cart-total{display:flex;justify-content:space-between;font-weight:700;font-size:18px;margin-top:10px}@media (max-width:768px){.menu-grid{grid-template-columns:repeat(auto-fill,minmax(200px,1fr))}.main-content.sidebar-active{margin-left:0}.sidebar.active{width:80%}}@media (max-width:480px){.menu-grid{grid-template-columns:1fr}.cart-actions{flex-direction:column;gap:5px}.cart-btn{width:100%}}
		.popupv-modal{display:none;position:fixed;overflow-y:auto;z-index:1000;left:0;top:0;width:100%;height:100%;background-color:rgb(0 0 0 / .5);font-family:'Segoe UI',sans-serif}.popupv-content{background:#fff;max-width:500px;margin:60px auto;padding:25px;border-radius:10px;box-shadow:0 10px 25px rgb(0 0 0 / .25);animation:popupv-fadein 0.3s ease}@keyframes popupv-fadein{from{opacity:0;transform:translateY(-20px)}to{opacity:1;transform:translateY(0)}}.popupv-title{margin-bottom:20px;font-size:20px;font-weight:700;text-align:center}.popupv-summary{background:#f7f7f7;border:1px solid #ddd;padding:10px;max-height:200px;overflow-y:auto;border-radius:6px;margin-bottom:20px}.popupv-summary p{margin:6px 0;font-size:14px}.popupv-form-group{margin-bottom:15px}.popupv-form-group label{display:block;margin-bottom:5px;font-weight:600}.popupv-form-group input,.popupv-form-group select{width:100%;padding:8px 10px;font-size:14px;border:1px solid #ccc;border-radius:6px}.popupv-actions{display:flex;justify-content:space-between;margin-top:20px}.popupv-btn-confirm{background-color:#007bff;color:#fff;border:none;padding:10px 18px;border-radius:5px;cursor:pointer}.popupv-btn-cancel{background-color:#dc3545;color:#fff;border:none;padding:10px 18px;border-radius:5px;cursor:pointer}.popupv-table{width:100%;border-collapse:collapse;margin-top:10px;font-size:14px}.popupv-table th,.popupv-table td{border:1px solid #ddd;padding:8px}.popupv-table th{background-color:#f4f4f4;font-weight:700}.popupv-qty{color:red}
        .loader{width:48px;height:48px;margin:auto;position:relative}.loader:before{content:'';width:48px;height:5px;background:#f0808050;position:absolute;top:60px;left:0;border-radius:50%;animation:shadow324 0.5s linear infinite}.loader:after{content:'';width:100%;height:100%;background:#f08080;position:absolute;top:0;left:0;border-radius:4px;animation:jump7456 0.5s linear infinite}@keyframes jump7456{15%{border-bottom-right-radius:3px}25%{transform:translateY(9px) rotate(22.5deg)}50%{transform:translateY(18px) scale(1,.9) rotate(45deg);border-bottom-right-radius:40px}75%{transform:translateY(9px) rotate(67.5deg)}100%{transform:translateY(0) rotate(90deg)}}@keyframes shadow324{0%,100%{transform:scale(1,1)}50%{transform:scale(1.2,1)}}
        .table-container{width:100%;overflow-x:auto;margin:20px 0;border-radius:10px;box-shadow:var(--shadow)}table{width:100%;border-collapse:collapse;background:#fff;border-radius:10px;overflow:hidden}th,td{padding:15px;text-align:left;border-bottom:1px solid rgb(0 0 0 / .05)}th{background:linear-gradient(135deg,var(--primary),var(--secondary));color:#fff;font-weight:700;text-transform:uppercase;font-size:14px}tr:nth-child(even){background-color:rgb(231 76 60 / .05)}tr:hover{background-color:rgb(231 76 60 / .1)}.table-action-btn{padding:8px 12px;border-radius:20px;border:none;font-weight:700;cursor:pointer;transition:all 0.3s;margin-right:5px;font-size:14px}.table-edit-btn{background:var(--secondary);color:#fff}.table-edit-btn:hover{background:#d35400}.table-delete-btn{background:#e74c3c;color:#fff}.table-delete-btn:hover{background:#c0392b}.table-status{padding:6px 12px;border-radius:20px;font-size:12px;font-weight:700;text-transform:uppercase}.status-success{background:#2ecc71;color:#fff}.status-warning{background:#f39c12;color:#fff}.status-danger{background:#e74c3c;color:#fff}@media (max-width:768px){thead{display:none}tbody{width:100%}tr{display:block;width:100%;margin-bottom:15px;border-radius:10px;box-shadow:0 2px 5px rgb(0 0 0 / .1)}td{display:flex;width:100%;justify-content:space-between;align-items:center;padding:10px 15px;border-bottom:1px solid #eee}td:before{content:attr(data-label);font-weight:700;margin-right:15px;color:var(--primary);flex:1}td:last-child{border-bottom:none}.table-action-btn{width:100%;margin-bottom:5px}}

    </style>
</head>
<body>
    <div class="app-container">
        <!-- Hamburger Menu -->
        <div class="hamburger-menu">
            <i class="fas fa-bars"></i>
        </div>
        
        <!-- Sidebar Navigation -->
        <nav class="sidebar">
            <ul>
                <li data-category="all"><i class="fas fa-utensils"></i> Semua Menu</li>
                <li data-category="food"><i class="fas fa-hamburger"></i> Makanan</li>
                <li data-category="drink"><i class="fas fa-coffee"></i> Minuman</li>
                <li data-category="snack"><i class="fas fa-cookie"></i> Snack</li>
				<?php if($sess_nama == "admin"){ ?>
                <!-- #superuser -->
				<li data-category="today" class="active" ><i class="fas fa-list-check"></i> Laporan</li>
				<li data-category="setup"><i class="fas fa-gear"></i> Pengaturan</li>
				<?php } else { ?>
				<li data-category="today" class="active" ><i class="fas fa-list-check"></i> Laporan Hari ini</li>
				<?php } ?>
				<li data-category="logout"><i class="fas fa-right-from-bracket"></i> Logout</li>
            </ul>
        </nav>
        
        <!-- Main Content -->
        <main class="main-content">
            <h1><?=$mrc['nama_merchant'];?></h1>
            
            <!-- <div class="search-container">
                <input type="text" id="search-input" placeholder="Cari menu...">
                <i class="fas fa-search" id="search-icon" style="cursor:pointer;"></i>
            </div> -->
            
            <div class="menu-grid" id="menu-grid" style="width:100%;min-height:200px;display:flex;flex-direction:column;align-items:center;">
                <div class="loader"></div><span>Memuat data...</span>
            </div>
        </main>
        
        <!-- Cart Footer -->
        <footer class="cart-footer">
            <div class="cart-icon" id="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>
            </div>
            <div class="total-price">Total: <span id="total-price">Rp0</span></div>
            <div class="cart-actions">
                <button class="cart-btn print-btn" id="print-btn"><i class="fas fa-print"></i> Cetak</button>
                <button class="cart-btn save-btn" id="save-btn"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </footer>
        
        <!-- Modal untuk Tambahan -->
        <div class="modal" id="add-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="modal-menu-name">Nasi Goreng</h3>
                    <span class="close-modal">&times;</span>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title">Pilih Topping</h4>
                    <div id="toppings-container">
                        <!-- Toppings will be added here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="add-to-cart" id="confirm-add">Tambahkan ke Keranjang</button>
                </div>
            </div>
        </div>
        
        <!-- Cart Modal -->
        <div class="cart-modal" id="cart-modal">
            <div class="cart-modal-content" style="overflow-y: auto;">
                <div class="modal-header">
                    <h3>Keranjang Belanja</h3>
                    <span class="close-modal">&times;</span>
                </div>
                <div class="modal-body" id="cart-items-container">
                    <!-- Cart items will be added here -->
                </div>
                <div class="cart-summary">
                    <div class="cart-total">
                        <span>Total:</span>
                        <span id="cart-modal-total">Rp0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- POPUP VERIFIKASI -->
<div id="popupv-modal" class="popupv-modal">
  <div class="popupv-content">
    <h2 class="popupv-title">Verifikasi Pesanan</h2>

    <div id="popupv-order-summary" class="popupv-summary"></div>

    <form id="popupv-form" enctype="multipart/form-data">
      <div class="popupv-form-group">
        <label for="popupv-name">Nama:</label>
        <input type="text" id="popupv-name" name="name" value="Customer" required>
      </div>

      <div class="popupv-form-group">
        <label for="popupv-payment">Jenis Bayar:</label>
        <select id="popupv-payment" name="payment" required>
          <option value="">Pilih</option>
          <option value="cash">Cash</option>
          <option value="qris">QRIS</option>
        </select>
      </div>
	  <div class="popupv-form-group">
        <label for="popupv-file">Foto Bukti Bayar:</label>
        <input type="file" id="popupv-file" name="popupv-file">
      </div>
      <div class="popupv-form-group">
        <label for="popupv-total">Total Bayar:</label>
        <input type="text" id="popupv-total" readonly>
      </div>

      <div class="popupv-form-group">
        <label for="popupv-change">Kembalian:</label>
        <input type="number" id="popupv-change" readonly>
      </div>

      <div class="popupv-actions">
        <button type="button" id="popupv-confirm" class="popupv-btn-confirm">Konfirmasi</button>
        <button type="button" class="popupv-btn-cancel" onclick="popupvClose()">Batal</button>
      </div>
    </form>
  </div>
</div>


	<script src="<?=base_url('assets/jquery.js');?>"></script>
    <script>
        const hamburgerMenu = document.querySelector('.hamburger-menu');
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        const menuGrid = document.getElementById('menu-grid');
        
        const categoryItems = document.querySelectorAll('.sidebar li');

        
        function init() {
            setupEventListeners();
        }
        function setupEventListeners() {
            categoryItems.forEach(item => {
                item.addEventListener('click', () => {
                    const category = item.dataset.category;
                    console.log(category);
                    categoryItems.forEach(li => li.classList.remove('active'));
                    item.classList.add('active');
                    
                    if (category === 'all') {
                        window.location.href = "<?=base_url('dashboard');?>";
                    } else {
						if(category === 'today'){
							window.location.href = "<?=base_url('laporan');?>";
						} else if(category == 'logout'){
							window.location.href = "<?=base_url('login');?>";
						} else {
                        	window.location.href = "<?=base_url('dashboard');?>";
						}
                    }
                });
            });
            
            
        }

        // Initialize the app
        init();
		
		
		hamburgerMenu.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('sidebar-active');
			console.log('test');
        });
        function loadLaporan(){
            $('#menu-grid').html('<div class="loader"></div><span>Memuat data...</span>');
            $.ajax({
				url: "<?=base_url('load-laporan');?>",
				type: "POST",
				data: {
                    'data' : 'test'
                },
				success: function (res) {
					setTimeout(() => {
                        $('#menu-grid').html(res);
                    }, 300);
				},
				error: function (xhr, status, error) {
                    console.log('Error:', error);
				}
			});
        }
        loadLaporan();
        function del(id){
            Swal.fire({
                title: "Anda yakin ?",
                text: "Anda tidak akan bisa mengembalikan data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus"
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?=base_url('hapus-pesanan');?>",
                        type: "POST",
                        data: {'id' : id},
                        success: function (res) {
                            Swal.fire({
                            title: "Hapus Berhasil",
                            text: "Satu pesanan di hapus",
                            icon: "success"
                            }).then((result) => {
                                loadLaporan();
                            });
                        },
                        error: function (xhr, status, error) {
                            console.log('Error:', error);
                        }
                    });
                    
                }
            });
        }
    </script>
</body>
</html>