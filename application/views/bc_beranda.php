<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root{--primary:#e74c3c;--secondary:#e67e22;--light:#f5f5f5;--dark:#333;--shadow:0 4px 6px rgba(0, 0, 0, 0.1)}*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif}body{background-color:#f9f9f9;color:var(--dark);overflow-x:hidden}.app-container{display:flex;min-height:100vh;position:relative}.hamburger-menu{position:fixed;top:20px;left:20px;font-size:24px;cursor:pointer;z-index:1000;color:var(--primary);background:#fff;width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:var(--shadow)}.sidebar{width:250px;background:linear-gradient(135deg,var(--primary),var(--secondary));color:#fff;position:fixed;height:100vh;left:-250px;top:0;transition:all 0.3s ease;z-index:999;padding-top:70px;overflow-y:auto}.sidebar.active{left:0}.sidebar ul{list-style:none;padding:0}.sidebar li{padding:15px 20px;cursor:pointer;transition:background 0.3s;border-bottom:1px solid rgb(255 255 255 / .1)}.sidebar li:hover{background:rgb(255 255 255 / .1)}.sidebar li.active{background:rgb(255 255 255 / .2);border-left:4px solid #fff}.main-content{flex:1;padding:20px;margin-left:0;transition:margin-left 0.3s;padding-bottom:100px}.main-content.sidebar-active{margin-left:250px}h1{color:var(--primary);margin-bottom:20px;text-align:center}.search-container{margin-bottom:20px;position:relative}.search-container input{width:100%;padding:12px 20px;border:2px solid #ddd;border-radius:30px;font-size:16px;outline:none;transition:all 0.3s}.search-container input:focus{border-color:var(--primary)}.search-container i{position:absolute;right:20px;top:50%;transform:translateY(-50%);color:#aaa}.menu-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:20px}.menu-card{background:#fff;border-radius:10px;overflow:hidden;box-shadow:var(--shadow);transition:transform 0.3s}.menu-card:hover{transform:translateY(-5px)}.menu-img{width:100%;height:180px;object-fit:cover}
		.menu-info{padding:15px;width: 100%;display:flex;align-items:center;justify-content:space-between;}
		.menu-name{font-weight:700;margin-bottom:5px;color:var(--dark)}.menu-price{color:var(--primary);font-weight:700;margin-bottom:15px}.menu-actions{display:flex;justify-content:space-between;align-items:center}.quantity-control{display:flex;align-items:center}.quantity-btn{width:30px;height:30px;border-radius:50%;background:var(--primary);color:#fff;border:none;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center}.quantity{margin:0 10px;font-weight:700}.add-btn{background:var(--secondary);color:#fff;border:none;padding:8px 15px;border-radius:20px;cursor:pointer;font-weight:700;transition:background 0.3s}.add-btn:hover{background:#d35400}.cart-footer{position:fixed;bottom:0;left:0;right:0;background:#fff;box-shadow:0 -2px 10px rgb(0 0 0 / .1);padding:15px 20px;display:flex;justify-content:space-between;align-items:center;transform:translateY(100%);transition:transform 0.3s ease;z-index:998}.cart-footer.active{transform:translateY(0)}.cart-icon{position:relative;cursor:pointer;font-size:24px;color:var(--primary)}.cart-count{position:absolute;top:-10px;right:-10px;background:var(--primary);color:#fff;width:22px;height:22px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:12px}.total-price{font-weight:700;color:var(--dark)}.total-price span{color:var(--primary)}.cart-actions{display:flex;gap:10px}.cart-btn{padding:8px 15px;border-radius:20px;border:none;font-weight:700;cursor:pointer;transition:all 0.3s}.save-btn{background:var(--primary);color:#fff}.save-btn:hover{background:#c0392b}.print-btn{background:var(--secondary);color:#fff}.print-btn:hover{background:#d35400}.modal{position:fixed;top:0;left:0;right:0;bottom:0;background:rgb(0 0 0 / .5);display:flex;align-items:center;justify-content:center;z-index:1001;opacity:0;visibility:hidden;transition:all 0.3s}.modal.active{opacity:1;visibility:visible}.modal-content{background:#fff;width:90%;max-width:500px;max-height:80vh;border-radius:10px;overflow:hidden;box-shadow:var(--shadow);transform:translateY(20px);transition:transform 0.3s}.modal.active .modal-content{transform:translateY(0)}.modal-header{padding:15px 20px;background:var(--primary);color:#fff;display:flex;justify-content:space-between;align-items:center}.close-modal{font-size:24px;cursor:pointer}.modal-body{padding:20px;overflow-y:auto}.modal-title{margin-bottom:15px;color:var(--dark)}.topping-item{display:flex;justify-content:space-between;align-items:center;padding:10px 0;border-bottom:1px solid #eee}.topping-name{flex:1}.topping-price{color:var(--primary);font-weight:700;margin:0 15px}.topping-checkbox{width:20px;height:20px}.modal-footer{padding:15px 20px;display:flex;justify-content:flex-end;border-top:1px solid #eee}.add-to-cart{background:var(--primary);color:#fff;border:none;padding:10px 20px;border-radius:20px;cursor:pointer;font-weight:700;transition:background 0.3s}.add-to-cart:hover{background:#c0392b}.cart-modal{position:fixed;top:0;left:0;right:0;bottom:0;background:rgb(0 0 0 / .5);display:flex;align-items:center;justify-content:center;z-index:1001;opacity:0;visibility:hidden;transition:all 0.3s}.cart-modal.active{opacity:1;visibility:visible}.cart-modal-content{background:#fff;width:90%;max-width:500px;max-height:80vh;border-radius:10px;overflow:hidden;box-shadow:var(--shadow);transform:translateY(20px);transition:transform 0.3s}.cart-modal.active .cart-modal-content{transform:translateY(0)}.cart-item{display:flex;justify-content:space-between;align-items:center;padding:15px;border-bottom:1px solid #eee}.cart-item-info{flex:1}.cart-item-name{font-weight:700;margin-bottom:5px}.cart-item-toppings{font-size:12px;color:#777;margin-bottom:5px}.cart-item-price{color:var(--primary);font-weight:700}.cart-item-actions{display:flex;align-items:center}.remove-item{color:var(--primary);margin-left:15px;cursor:pointer}.cart-summary{padding:15px;border-top:1px solid #eee}.cart-total{display:flex;justify-content:space-between;font-weight:700;font-size:18px;margin-top:10px}@media (max-width:768px){.menu-grid{grid-template-columns:repeat(auto-fill,minmax(200px,1fr))}.main-content.sidebar-active{margin-left:0}.sidebar.active{width:80%}}@media (max-width:480px){.menu-grid{grid-template-columns:1fr}.cart-actions{flex-direction:column;gap:5px}.cart-btn{width:100%}}
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
                <li data-category="food"><i class="fas fa-hamburger"></i> Makanan</li>
                <li data-category="drink"><i class="fas fa-coffee"></i> Minuman</li>
                <li data-category="snack"><i class="fas fa-cookie"></i> Snack</li>
            </ul>
        </nav>
        
        <!-- Main Content -->
        <main class="main-content">
            <h1><?=$mrc['nama_merchant'];?></h1>
            
            <div class="search-container">
                <input type="text" id="search-input" placeholder="Cari menu...">
                <i class="fas fa-search"></i>
            </div>
            
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
            <div class="cart-modal-content">
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
	
    <script>
		
        const hamburgerMenu = document.querySelector('.hamburger-menu');
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');
        const menuGrid = document.getElementById('menu-grid');
        const searchInput = document.getElementById('search-input');
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

        // Render menu items
        // function renderMenuItems(items) {
        //     menuGrid.innerHTML = '';
            
        //     items.forEach(item => {
        //         const menuCard = document.createElement('div');
        //         menuCard.className = 'menu-card';
        //         menuCard.dataset.category = item.category;
                
        //         menuCard.innerHTML = `
        //             <img src="${item.image}" alt="${item.name}" class="menu-img">
        //             <div class="menu-info">
        //                 <div class="menu-name">${item.name}</div>
        //                 <div class="menu-price">Rp${item.price.toLocaleString()}</div>
        //                 <div class="menu-actions">
        //                     <button class="add-btn" data-id="${item.id}">Tambah</button>
        //                 </div>
        //             </div>
        //         `;
                
        //         menuGrid.appendChild(menuCard);
        //     });
            
        //     // Add event listeners to add buttons
            document.querySelectorAll('.add-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const itemId = parseInt(e.target.dataset.id);
                    //currentMenuItem = menuData.menuItems.find(item => item.id === itemId);
                    openAddModal(itemId);
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
                basePrice: menuItem.price,
                toppings: [...toppings],
                quantity: 1
            };
            
            cart.push(cartItem);
            updateCart();
            closeModal(addModal);
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

        // Setup event listeners
        function setupEventListeners() {
            // Hamburger menu toggle
            
            
            // Category filter
            categoryItems.forEach(item => {
                item.addEventListener('click', () => {
                    const category = item.dataset.category;
                    
                    categoryItems.forEach(li => li.classList.remove('active'));
                    item.classList.add('active');
                    
                    if (category === 'all') {
                        renderMenuItems(menuData.menuItems);
                    } else {
                        const filteredItems = menuData.menuItems.filter(menu => menu.category === category);
                        renderMenuItems(filteredItems);
                    }
                });
            });
            
            // Search functionality
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                
                if (searchTerm === '') {
                    const activeCategory = document.querySelector('.sidebar li.active');
                    if (activeCategory.dataset.category === 'all') {
                        renderMenuItems(menuData.menuItems);
                    } else {
                        const filteredItems = menuData.menuItems.filter(menu => menu.category === activeCategory.dataset.category);
                        renderMenuItems(filteredItems);
                    }
                    return;
                }
                
                const filteredItems = menuData.menuItems.filter(menu => 
                    menu.name.toLowerCase().includes(searchTerm)
                );
                
                renderMenuItems(filteredItems);
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
                alert('Transaksi disimpan ke local storage');
                // In a real app, you would send this to your backend
            });
            
            // Print receipt
            printBtn.addEventListener('click', () => {
                alert('Fitur cetak struk akan diimplementasikan di sini');
                // In a real app, you would generate a printable receipt
            });
        }

        // Initialize the app
        init();
		hamburgerMenu.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('sidebar-active');
			console.log('test');
        });
    </script>
</body>
</html>