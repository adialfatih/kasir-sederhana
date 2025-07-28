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
		.menu-gridss2 {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
			gap: 20px;
			width: 100%;
			margin: 0 auto;
		}

		.menu-item2 {
			background: white;
			border-radius: 16px;
			padding: 30px 20px;
			text-align: center;
			transition: transform 0.3s ease, box-shadow 0.3s ease;
			cursor: pointer;
			box-shadow: 0 4px 10px rgba(0,0,0,0.06);
			position: relative;
			overflow: hidden;
		}

		.menu-item2:hover {
			transform: translateY(-6px);
			box-shadow: 0 10px 20px rgba(0,0,0,0.1);
		}

		.menu-item2 i {
			font-size: 28px;
			color: #e74c3c;
			margin-bottom: 10px;
			animation: fadeIn 0.5s ease;
		}

		.menu-item2 span {
			display: block;
			font-size: 15px;
			font-weight: 500;
			color: #333;
			animation: fadeInUp 0.4s ease;
		}

		@keyframes fadeIn {
			from {opacity: 0; transform: scale(0.8);}
			to {opacity: 1; transform: scale(1);}
		}

		@keyframes fadeInUp {
			from {opacity: 0; transform: translateY(10px);}
			to {opacity: 1; transform: translateY(0);}
		}
		 .custom-modal-overlay {
		position: fixed;
		top: 0; left: 0;
		width: 100%; height: 100%;
		background: rgba(0, 0, 0, 0.5);
		display: flex;
		justify-content: center;
		align-items: center;
		z-index: 999;
		visibility: hidden;
		opacity: 0;
		transition: opacity 0.3s ease, visibility 0.3s ease;
		}

		.custom-modal-overlay.show {
		visibility: visible;
		opacity: 1;
		}

		.custom-modal-box {
		background: #fff;
		border-radius: 10px;
		width: 90%;
		max-width: 600px;
		box-shadow: 0 10px 30px rgba(0,0,0,0.2);
		transform: translateY(50px);
		opacity: 0;
		transition: all 0.4s ease;
		}

		.custom-modal-overlay.show .custom-modal-box {
		transform: translateY(0);
		opacity: 1;
		}

		.custom-modal-header {
		padding: 15px 20px;
		font-size: 18px;
		font-weight: bold;
		border-bottom: 1px solid #eee;
		position: relative;
		}

		.custom-modal-close {
		position: absolute;
		top: 10px;
		right: 15px;
		font-size: 20px;
		cursor: pointer;
		color: #999;
		}

		.custom-modal-close:hover {
		color: #000;
		}

		.custom-modal-content-body {
		padding: 20px;
		max-height: 400px;
		overflow-y: auto;
		}

		.custom-modal-footer {
		padding: 15px 20px;
		border-top: 1px solid #eee;
		text-align: right;
		}

		.custom-modal-footer button {
		padding: 8px 16px;
		border: none;
		background: #007bff;
		color: white;
		border-radius: 6px;
		cursor: pointer;
		}

		.custom-modal-footer button:hover {
		background: #0056b3;
		}
		.btn-edit {
			outline: none;
			border: 1px solid red;
			padding: 5px 10px;
			border-radius: 5px;
			background: #fff;
			color:red;
			cursor: pointer;
		}
		.btn-simpan {
			outline: none;
			border: 1px solid green;
			padding: 5px 10px;
			border-radius: 5px;
			background: #fff;
			color:green;
			cursor: pointer;
		}
		.ipt-form {
			width: 80%;
			outline: none;
			border: 1px solid blue;
			padding: 8px 10px;
			border-radius: 5px;
		}
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
                <li class="active" data-category="all"><i class="fas fa-utensils"></i> Semua Menu</li>
				<?php
				$_kat = $this->db->query("SELECT * FROM menu_categories")->result();
				foreach($_kat as $val){ 
					if($val->id == "drink"){
						$icon = "fa-coffee";
					} elseif($val->id == "food"){
						$icon = "fa-hamburger";
					} else {
						$icon = "fa-cookie";
					}
				?>
				<li data-category="<?=$val->id;?>"><i class="fas <?=$icon;?>"></i> <?=$val->name;?></li>
				<?php } ?>
				<?php if(strtolower($sess_nama) == "admin"){ ?>
				<!-- #superuser -->
				<li data-category="today"><i class="fas fa-chart-line"></i> Penjualan</li>
				<li data-category="setup"><i class="fas fa-gear"></i> Pengaturan</li>
				<?php } else { ?>
				<li data-category="today"><i class="fas fa-list-check"></i> Laporan Hari ini</li>
				<?php } ?>
				<li data-category="logout"><i class="fas fa-right-from-bracket"></i> Logout</li>
            </ul>
        </nav>
        
        <!-- Main Content -->
        <main class="main-content">
            <h1><?=$mrc['nama_merchant'];?></h1>
            
            <div class="search-container">
                <input type="text" id="search-input" placeholder="Cari menu...">
                <i class="fas fa-search" id="search-icon" style="cursor:pointer;"></i>
            </div>
            <div id="forSetup"></div>
            <div class="menu-grid" id="menu-grid">
				<?php
				$menu = $this->data_model->get_record('menu_items');
				foreach($menu->result() as $val):
				?>
                <div class="menu-card" data-category="food">
					<img src="<?=$val->image;?>" alt="<?=$val->name;?>" class="menu-img">
                    <div class="menu-info">
						<div style="display:flex;flex-direction:column;">
							<div class="menu-name"><?=$val->name;?></div>
							<div class="menu-price">Rp <?=number_format($val->price);?></div>
						</div>
                        <div class="menu-actions">
                            <button class="add-btn" data-id="<?=$val->id;?>">Tambah</button>
                        </div>
                    </div>
				</div>
				<?php endforeach; ?>
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

<!-- Modal Component -->
  <div class="custom-modal-overlay" id="customModal">
    <div class="custom-modal-box">
      <div class="custom-modal-header">
        <span id="customModalTitle">Modal Title</span>
        <span class="custom-modal-close" onclick="closeModal2()">&times;</span>
      </div>
      <div class="custom-modal-content-body" id="customModalContent">
        <!-- Dynamic Content Goes Here -->
      </div>
      <div class="custom-modal-footer">
        <button onclick="closeModal2()">Close</button>
      </div>
    </div>
  </div>

	<script src="<?=base_url('assets/jquery.js');?>"></script>
    <script>
        const hamburgerMenu = document.querySelector('.hamburger-menu');
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        const menuGrid = document.getElementById('menu-grid');
        const searchInput = document.getElementById('search-input');
		const searchIcon = document.getElementById('search-icon');
        const cartFooter = document.querySelector('.cart-footer');
        const cartIcon = document.getElementById('cart-icon');
        const cartCount = document.querySelector('.cart-count');
        const totalPrice = document.getElementById('total-price');
        const addModal = document.getElementById('add-modal');
        const modalMenuName = document.getElementById('modal-menu-name');
        const toppingsContainer = document.getElementById('toppings-container');
        const confirmAddBtn = document.getElementById('confirm-add');
        const closeModalBtns = document.querySelectorAll('.close-modal');
        const cartModal = document.getElementById('cart-modal');
        const cartItemsContainer = document.getElementById('cart-items-container');
        const cartModalTotal = document.getElementById('cart-modal-total');
        const saveBtn = document.getElementById('save-btn');
        const printBtn = document.getElementById('print-btn');
        const categoryItems = document.querySelectorAll('.sidebar li');

        // State
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        let currentMenuItem = null;
        let selectedToppings = [];

        // Initialize the app
        function init() {
            //renderMenuItems(menuData.menuItems);
            setupEventListeners();
            updateCartUI();
        }

            document.querySelectorAll('.add-btn').forEach(btn => {
				btn.addEventListener('click', (e) => {
					const itemId = parseInt(e.target.dataset.id);

					// Ambil detail menu dari server
					fetch(`<?= base_url('menu/get_menu_detail/') ?>${itemId}`)
						.then(response => response.json())
						.then(data => {
							console.log('Data dari server:', data);
							const menuItem = data.menuItem;
							const category = menuItem.category_id.toLowerCase();
							// Cek kategori
							if (category === 'food') {
								currentMenuItem = menuItem;
								openAddModal(itemId); // munculkan popup topping
							} else {
								// Jika bukan makanan langsung tambahkan ke keranjang
								addToCart(menuItem, []);
							}
						})
						.catch(error => {
							console.error('Gagal mengambil data menu:', error);
						});
				});
			});

        // }

        // Open add modal with toppings
        function openAddModal(itemId) {
			// Ambil data menu + topping dari server
			fetch(`<?= base_url('menu/get_menu_detail/') ?>${itemId}`)
				.then(response => response.json())
				.then(data => {
					currentMenuItem = data.menuItem;
					const menuItem = data.menuItem;
					const toppings = data.toppings;

					// Tampilkan nama menu
					modalMenuName.textContent = menuItem.name;
					toppingsContainer.innerHTML = '';
					selectedToppings = [];

					// Tampilkan topping
					toppings.forEach(topping => {
						const toppingItem = document.createElement('div');
						toppingItem.className = 'topping-item';
						toppingItem.innerHTML = `
							<div class="topping-name">${topping.name}</div>
							<div class="topping-price">+Rp${topping.price.toLocaleString()}</div>
							<input type="checkbox" class="topping-checkbox" data-id="${topping.id}" data-price="${topping.price}">
						`;
						toppingsContainer.appendChild(toppingItem);
					});

					// Event listener checkbox
					document.querySelectorAll('.topping-checkbox').forEach(checkbox => {
						checkbox.addEventListener('change', (e) => {
							const toppingId = parseInt(e.target.dataset.id);
							const toppingPrice = parseInt(e.target.dataset.price);

							if (e.target.checked) {
								selectedToppings.push({ 
									id: toppingId, 
									name: e.target.parentElement.querySelector('.topping-name').textContent, 
									price: toppingPrice 
								});
							} else {
								selectedToppings = selectedToppings.filter(t => t.id !== toppingId);
							}
						});
					});

					addModal.classList.add('active');
				})
				.catch(error => {
					console.error('Gagal ambil data:', error);
				});
		}


        // Add item to cart
        function addToCart(menuItem, toppings) {
            const cartItem = {
                id: Date.now(),
                menuId: menuItem.id,
                name: menuItem.name,
                basePrice: parseInt(menuItem.price),
                toppings: [...toppings],
                quantity: 1
            };
            
            cart.push(cartItem);
            updateCart();
            closeModal(addModal);
    		Swal.fire('',`${menuItem.name} berhasil ditambahkan ke keranjang.`,'success');
        }

        // Update cart in state and UI
        function updateCart() {
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartUI();
        }

        // Update cart UI
        function updateCartUI() {
            const itemCount = cart.reduce((total, item) => total + item.quantity, 0);
            const total = cart.reduce((sum, item) => {
                const toppingsTotal = item.toppings.reduce((tSum, topping) => tSum + topping.price, 0);
                return sum + (item.basePrice + toppingsTotal) * item.quantity;
            }, 0);
            
            cartCount.textContent = itemCount;
            totalPrice.innerHTML = `Total: <span>Rp${total.toLocaleString()}</span>`;
            cartModalTotal.textContent = `Rp${total.toLocaleString()}`;
            
            if (itemCount > 0) {
                cartFooter.classList.add('active');
            } else {
                cartFooter.classList.remove('active');
            }
            
            // Update cart modal items
            renderCartItems();
        }

        // Render cart items in modal
        function renderCartItems() {
            cartItemsContainer.innerHTML = '';
            
            cart.forEach(item => {
                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                
                const toppingsText = item.toppings.length > 0 
                    ? `Topping: ${item.toppings.map(t => t.name).join(', ')}` 
                    : '';
                
                const itemTotal = (item.basePrice + item.toppings.reduce((sum, t) => sum + t.price, 0)) * item.quantity;
                
                cartItem.innerHTML = `
                    <div class="cart-item-info">
                        <div class="cart-item-name">${item.name} × ${item.quantity}</div>
                        <div class="cart-item-toppings">${toppingsText}</div>
                        <div class="cart-item-price">Rp${itemTotal.toLocaleString()}</div>
                    </div>
                    <div class="cart-item-actions">
                        <i class="fas fa-trash remove-item" data-id="${item.id}"></i>
                    </div>
                `;
                
                cartItemsContainer.appendChild(cartItem);
            });
            
            // Add event listeners to remove buttons
            document.querySelectorAll('.remove-item').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const itemId = parseInt(e.target.dataset.id);
                    removeFromCart(itemId);
                });
            });
        }

        // Remove item from cart
        function removeFromCart(itemId) {
            cart = cart.filter(item => item.id !== itemId);
            updateCart();
        }

        // Close modal
        function closeModal(modal) {
            modal.classList.remove('active');
        }
		function showAllMenu(ct,nama){
			$('#menu-grid').show();
			$('#forSetup').hide();
			$('#forSetup').html('');
			$.ajax({
				url:"<?=base_url();?>beranda/show_menu",
				type: "POST",
				data: {"ct" : ct, "nama":nama},
				cache: false,
				success: function(dataResult){
					$('#menu-grid').html(dataResult);
				}
			});
		}
		function showStup(){
			$('#menu-grid').hide();
			$('#forSetup').show();
			$('#forSetup').html('<div style="width:100%;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:30px;"><div class="loader"></div><span>Memuat halaman setup...</span></div>');
			$.ajax({
				url:"<?=base_url();?>beranda/showSetup",
				type: "POST",
				data: {"ct" : "tes"},
				cache: false,
				success: function(dataResult){
					setTimeout(() => {
						$('#forSetup').html(dataResult);
					}, 500);
				}
			});
		}
        // Setup event listeners
        function setupEventListeners() {
            // Hamburger menu toggle
            
            
            // Category filter
            categoryItems.forEach(item => {
                item.addEventListener('click', () => {
                    const category = item.dataset.category;
                    console.log(category);
                    categoryItems.forEach(li => li.classList.remove('active'));
                    item.classList.add('active');
                    
                    if (category === 'all') {
						sidebar.classList.toggle('active');
            			mainContent.classList.toggle('sidebar-active');
                        showAllMenu('all','null');
                    } else {
						if(category === 'today'){
							window.location.href = "<?=base_url('laporan');?>";
						} else if(category == 'logout'){
							window.location.href = "<?=base_url('login');?>";
						} else if(category == 'setup'){
							sidebar.classList.toggle('active');
            				mainContent.classList.toggle('sidebar-active');
							showStup();
						} else {
							sidebar.classList.toggle('active');
            				mainContent.classList.toggle('sidebar-active');
                        	showAllMenu(category,'null');
						}
                    }
                });
            });
            
            // Search functionality
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
				if (searchTerm === '') {
					searchIcon.classList.remove('fa-times');
					searchIcon.classList.add('fa-search');
					showAllMenu('all', 'null');
				} else {
					searchIcon.classList.remove('fa-search');
					searchIcon.classList.add('fa-times');
					showAllMenu('nama', searchTerm);
				}
            });
			searchIcon.addEventListener('click', () => {
				if (searchIcon.classList.contains('fa-times')) {
					searchInput.value = '';
					searchIcon.classList.remove('fa-times');
					searchIcon.classList.add('fa-search');
					showAllMenu('all', 'null');
					searchInput.focus();
				}
			});
            
            // Confirm add to cart
            confirmAddBtn.addEventListener('click', () => {
                if (currentMenuItem) {
                    addToCart(currentMenuItem, selectedToppings);
                }
            });
            
            // Close modals
            closeModalBtns.forEach(btn => {
                btn.addEventListener('click', () => {
					console.log('ini di klik');
                    closeModal(addModal);
                    closeModal(cartModal);
                });
            });
            
            // Open cart modal
            cartIcon.addEventListener('click', () => {
                if (cart.length > 0) {
                    cartModal.classList.add('active');
                }
            });
            
            // Close modals when clicking outside
            [addModal, cartModal].forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        closeModal(modal);
                    }
                });
            });
            
            // Save cart
            saveBtn.addEventListener('click', () => {
				const cart = JSON.parse(localStorage.getItem('cart')) || [];
				const summary = popupvGenerateSummary(cart);
				const summaryDiv = document.getElementById('popupv-order-summary');
				summaryDiv.innerHTML = '';

				let total = 0;

				// Buat tabel
				const table = document.createElement('table');
				table.className = 'popupv-table';

				// Header tabel
				table.innerHTML = `
					<thead>
						<tr>
							<th>Menu</th>
							<th>Qty</th>
							<th>Topping</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody></tbody>
				`;

				const tbody = table.querySelector('tbody');

				summary.forEach(item => {
					const toppings = item.toppings.map(t => t.name).join(', ');
					const hargaItem = (item.basePrice + item.toppings.reduce((a, b) => a + b.price, 0)) * item.quantity;
					total += hargaItem;

					const row = document.createElement('tr');
					row.innerHTML = `
						<td>${item.name}</td>
						<td><span class="popupv-qty">x${item.quantity}</span></td>
						<td>${toppings || '-'}</td>
						<td>Rp ${hargaItem.toLocaleString()}</td>
					`;
					tbody.appendChild(row);
				});
				const row1 = document.createElement('tr');
					row1.innerHTML = `
						<td colspan="3"><strong>Total</strong></td>
						<td>Rp <strong>${total.toLocaleString()}</strong></td>
					`;
					tbody.appendChild(row1);
				summaryDiv.appendChild(table);

				document.getElementById('popupv-total').value = total.toLocaleString('id-ID');;
				document.getElementById('popupv-change').value = 0;
				document.getElementById('popupv-payment').value = '';

				popupvOpen();
			});
            
            // Print receipt
            printBtn.addEventListener('click', () => {
                alert('Fitur cetak struk akan diimplementasikan di sini');
                // In a real app, you would generate a printable receipt
            });
        }

        // Initialize the app
        init();
		function popupvGenerateSummary(cart) {
		const map = new Map();
		cart.forEach(item => {
			const key = item.name + '|' + JSON.stringify(item.toppings.map(t => t.id).sort());
			if (!map.has(key)) {
			map.set(key, { ...item, quantity: 0 });
			}
			map.get(key).quantity += item.quantity;
		});
		return [...map.values()];
		}

		// Hitung ulang bayar dan kembalian
		document.getElementById('popupv-payment').addEventListener('change', async (e) => {
			//const total = parseInt(document.getElementById('popupv-total').value);
			const total = parseInt(document.getElementById('popupv-total').value.replace(/\./g, ''));

			if (e.target.value === 'qris') {
				document.getElementById('popupv-total').value = total.toLocaleString('id-ID');;
				document.getElementById('popupv-change').value = 0;
			} else if (e.target.value === 'cash') {
				const { value: bayar } = await Swal.fire({
					title: 'Masukkan Nominal Pembayaran',
					input: 'number',
					inputAttributes: {
						min: total,
						autofocus: true
					},
					inputPlaceholder: 'Contoh: 50000',
					showCancelButton: true,
					confirmButtonText: 'OK',
					cancelButtonText: 'Batal'
				});

				const bayarInt = parseInt(bayar);
				if (!bayar || isNaN(bayarInt) || bayarInt < total) {
					Swal.fire({
						icon: 'error',
						title: 'Nominal tidak valid',
						text: 'Harus lebih besar atau sama dengan total.'
					});
					document.getElementById('popupv-payment').value = '';
					document.getElementById('popupv-change').value = 0;
				} else {
					document.getElementById('popupv-total').value =  bayarInt.toLocaleString('id-ID');
					var kembalian = bayarInt - total;
					document.getElementById('popupv-change').value = kembalian.toLocaleString('id-ID');
				}
			}
		});
		hamburgerMenu.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('sidebar-active');
			console.log('test');
        });
		
		function popupvOpen() {
		document.getElementById('popupv-modal').style.display = 'block';
		}
		function popupvClose() {
		document.getElementById('popupv-modal').style.display = 'none';
		}

		document.getElementById('popupv-confirm').addEventListener('click', () => {
			$('#popupv-confirm').html('Loading...');
			const name = document.getElementById('popupv-name').value.trim();
			const payment = document.getElementById('popupv-payment').value;
			const totalStr = document.getElementById('popupv-total').value;
			const totalKembalian = document.getElementById('popupv-change').value;
			const total = parseInt(totalStr.replace(/\./g, ''));
			const change = parseInt(totalKembalian.replace(/\./g, ''));
			const fileInput = document.getElementById('popupv-file');
			const file = fileInput.files[0];
			const originalFile = fileInput.files[0];

			if (!name || !payment || !totalStr) {
				Swal.fire({
				icon: 'warning',
				title: 'Form tidak lengkap',
				text: 'Pastikan semua data telah terisi!',
				});
				$('#popupv-confirm').html('Simpan');
				return;
			}
			if (payment === 'qris' && !file) {
				Swal.fire({
					icon: 'warning',
					title: 'Upload Bukti Pembayaran',
					text: 'Metode QRIS membutuhkan bukti pembayaran!',
				});
				$('#popupv-confirm').html('Simpan');
				return;
			}

			const cart = JSON.parse(localStorage.getItem('cart') || '[]');

			if (cart.length === 0) {
				Swal.fire({
				icon: 'error',
				title: 'Keranjang kosong',
				text: 'Tidak ada item dalam keranjang!',
				});
				$('#popupv-confirm').html('Simpan');
				return;
			}

			// Payload yang akan dikirim
			// const data = {
			// 	customer_name: name,
			// 	payment_method: payment,
			// 	total,
			// 	change,
			// 	items: cart
			// };
			const formData = new FormData();
			formData.append('customer_name', name);
			formData.append('payment_method', payment);
			formData.append('total', total);
			formData.append('change', change);
			formData.append('items', JSON.stringify(cart));
			// if (payment === 'qris' && file) {
			// 	formData.append('bukti_qris', file);
			// }
			if (payment === 'qris') {
				if (!originalFile) {
					Swal.fire({ icon: 'warning', text: 'Bukti QRIS wajib diunggah' });
					$('#popupv-confirm').html('Simpan');
					return;
				}

				// Kompres file dulu
				compressImage(originalFile).then((compressedFile) => {
					formData.append('bukti_qris', compressedFile, 'compressed.jpg');
					kirimDataKeServer(formData);
				}).catch((err) => {
					console.error('Error saat kompres:', err);
					Swal.fire({ icon: 'error', text: 'Gagal kompres gambar' });
					$('#popupv-confirm').html('Simpan');
				});
			} else {
				kirimDataKeServer(formData);
			}
			console.log('Data yang akan dikirim ke server:');
		});
		function kirimDataKeServer(formData) {
			$.ajax({
				url: "<?=base_url();?>beranda/simpan_pesanan",
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				success: function (res) {
					const response = JSON.parse(res);
					if (response.status) {
						Swal.fire({ icon: 'success', title: 'Berhasil', text: response.message }).then((result) => {
			 				localStorage.removeItem('cart');
							location.reload();
			 			});
					} else {
						Swal.fire({ icon: 'error', title: 'Gagal', text: response.message });
						$('#popupv-confirm').html('Simpan');
					}
				},
				error: function (xhr, status, error) {
					Swal.fire({ icon: 'error', title: 'AJAX Error', text: error });
					$('#popupv-confirm').html('Simpan');
				}
			});
		}
		function compressImage(file, maxWidth = 800, maxHeight = 800, quality = 0.7) {
			return new Promise((resolve, reject) => {
				const img = new Image();
				const reader = new FileReader();

				reader.onload = function (e) {
					img.src = e.target.result;
				};

				img.onload = function () {
					let canvas = document.createElement('canvas');
					let ctx = canvas.getContext('2d');

					let width = img.width;
					let height = img.height;

					if (width > height) {
						if (width > maxWidth) {
							height = Math.round((height *= maxWidth / width));
							width = maxWidth;
						}
					} else {
						if (height > maxHeight) {
							width = Math.round((width *= maxHeight / height));
							height = maxHeight;
						}
					}

					canvas.width = width;
					canvas.height = height;
					ctx.drawImage(img, 0, 0, width, height);

					canvas.toBlob((blob) => {
						resolve(blob);
					}, 'image/jpeg', quality);
				};

				reader.onerror = (e) => reject(e);
				reader.readAsDataURL(file);
			});
		}
		const modal = document.getElementById('customModal');
		const modalTitle = document.getElementById('customModalTitle');
		const modalContent = document.getElementById('customModalContent');

		function openModal(type) {
			console.log(''+type);
		// Set content based on type
			switch(type) {
				case 'akun':
				modalTitle.innerText = 'Pengaturan Akun';
				showSetupModal('akun');
				break;

				case 'kategori':
				modalTitle.innerText = 'Pengaturan Kategori';
				showSetupModal('kategori');
				break;

				case 'toppings':
				modalTitle.innerText = 'Menu Tambahan (Topping)';
				showSetupModal('toppings');
				break;

				default:
				modalTitle.innerText = 'Informasi';
				showSetupModal('none');
			}
			modal.classList.add('show');
		}

		function closeModal2() {
			modal.classList.remove('show');
		}
		function showSetupModal(page){
			$('#customModalContent').html('Loading...');
			if(page=='none'){
				$('#customModalContent').html('Token Error.!');
			} else {
			$.ajax({
				url:"<?=base_url();?>setupmodals/datasetup",
				type: "POST",
				data: {"page" : page},
				cache: false,
				success: function(dataResult){
					$('#customModalContent').html(dataResult);
				}
			}); }
		}
		function delkat(id,kat){
			Swal.fire({
				text: "Konfirmari hapus kategori "+kat+"?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Hapus"
				}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url:"<?=base_url();?>setupmodals/delkat",
						type: "POST",
						data: {"id" : id},
						cache: false,
						success: function(dataResult){
							openModal('kategori');
						}
					});
				}
			});
		}
		function deltop(id,kat){
			Swal.fire({
				text: "Konfirmari hapus topping "+kat+"?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Hapus"
				}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url:"<?=base_url();?>setupmodals/delkat2",
						type: "POST",
						data: {"id" : id},
						cache: false,
						success: function(dataResult){
							openModal('kategori');
						}
					});
				}
			});
		}
		function newKat(){
			var kat = $('#newKat').val();
			if(kat!=""){
			$.ajax({
				url:"<?=base_url();?>setupmodals/newkat",
				type: "POST",
				data: {"kat" : kat},
				cache: false,
				success: function(dataResult){
					var response = JSON.parse(dataResult);
					if(response.status == 200){
						Swal.fire({ icon: 'success', title: 'Berhasil', text: response.message });
						openModal('kategori');
					} else {
						Swal.fire({ icon: 'error', title: 'Gagal', text: response.message });
					}
				}
			}); }
		}
		function newTop(){
			var kat = $('#newTops').val();
			if(kat!=""){
			$.ajax({
				url:"<?=base_url();?>setupmodals/newkat2",
				type: "POST",
				data: {"kat" : kat},
				cache: false,
				success: function(dataResult){
					var response = JSON.parse(dataResult);
					if(response.status == 200){
						Swal.fire({ icon: 'success', title: 'Berhasil', text: response.message });
						openModal('toppings');
					} else {
						Swal.fire({ icon: 'error', title: 'Gagal', text: response.message });
					}
				}
			}); }
		}
		function toHalamanMenu(){
			window.location.href = "<?=base_url();?>setup-menu";
		}
    </script>
</body>
</html>