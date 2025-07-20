<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('data_model');
        if($this->session->userdata('login_form') != "akses-as1563sd1679dsad8789asff53afhafaf670fa"){
            redirect(base_url('login'));
        }
    }
    function index(){ 
        $mrc = $this->db->query("SELECT * FROM `merchant` WHERE id_merchant=1")->row_array();
        $data = array(
            'title' => 'Kasir - '.$mrc['nama_merchant'].'',
            'sess_nama' => $this->session->userdata('username'),
            'sess_pass' => $this->session->userdata('password'),
            'sess_id' => $this->session->userdata('login_form'),
            'mrc' => $mrc
        );
        $this->load->view('beranda_view', $data);
    } //end-laporan
    function laporan(){ 
        $mrc = $this->db->query("SELECT * FROM `merchant` WHERE id_merchant=1")->row_array();
        $data = array(
            'title' => 'Laporan Penjualan '.$mrc['nama_merchant'].'',
            'sess_nama' => $this->session->userdata('username'),
            'sess_pass' => $this->session->userdata('password'),
            'sess_id' => $this->session->userdata('login_form'),
            'mrc' => $mrc
        );
        $this->load->view('laporan_view', $data);
    } //end-
    function show_menu(){
        $ct = $this->input->post('ct', TRUE);
        $nama = $this->input->post('nama', TRUE);
        if($ct == "all"){
            $qr = $this->data_model->get_record('menu_items');
        } else {
            if($ct == "nama"){
                $qr = $this->db->query("SELECT * FROM menu_items WHERE name LIKE '%$nama%'");
            } else {
                $qr = $this->data_model->get_byid('menu_items',['category_id'=>$ct]);
            }
            
        }
        foreach($qr->result() as $val):
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
		<?php endforeach;
    }

    // function simpan_pesanan(){
    //     $post = $this->input->post('data');
    //     $username = $this->session->userdata('username');
    //     $cek = $this->db->query("SELECT username FROM `table_user` WHERE `username`='$username'")->num_rows();
    //     if($cek != 1){
    //         echo json_encode(['status' => false, 'message' => 'Anda mungkin sudah logout.']);
    //         return;
    //     }
    //     // Validasi dasar
    //     if (!$post || !isset($post['customer_name'], $post['payment_method'], $post['total'], $post['items'])) {
    //         echo json_encode(['status' => false, 'message' => 'Data tidak lengkap']);
    //         return;
    //     }

    //     // Ambil data dari payload
    //     $nama       = $post['customer_name'];
    //     $metode     = $post['payment_method'];
    //     $total      = intval($post['total']);
    //     $kembalian  = intval($post['change']);
    //     $items      = $post['items'];

    //     // Simpan ke tabel `pesanan`
    //     $this->db->insert('pesanan', [
    //         'customer_name'   => $nama,
    //         'payment_method'  => $metode,
    //         'total'           => $total,
    //         'change_amount'   => $kembalian,
    //         'created_at'      => date('Y-m-d H:i:s'),
    //         'created_by'      => $username
    //     ]);

    //     $pesanan_id = $this->db->insert_id();

    //     // Simpan masing-masing item ke tabel `pesanan_detail`
    //     foreach ($items as $item) {
    //         $menu_id     = isset($item['menuId']) ? intval($item['menuId']) : 0;
    //         $menu_name   = isset($item['name']) ? $item['name'] : '';
    //         $base_price  = isset($item['basePrice']) ? intval($item['basePrice']) : 0;
    //         $quantity    = isset($item['quantity']) ? intval($item['quantity']) : 0;
    //         //$toppings    = isset($item['toppings']) ? json_encode($item['toppings']) : null;
    //         $toppings    = isset($item['toppings']) ? $item['toppings'] : [];
    //         $total_harga_toppings = 0;
    //         if (is_array($toppings)) {
    //             foreach ($toppings as $topping) {
    //                 if (isset($topping['price'])) {
    //                     $total_harga_toppings += intval($topping['price']);
    //                 }
    //             }
    //         }

    //         $this->db->insert('pesanan_detail', [
    //             'pesanan_id'  => $pesanan_id,
    //             'menu_id'     => $menu_id,
    //             'menu_name'   => $menu_name,
    //             'base_price'  => $base_price,
    //             'quantity'    => $quantity,
    //             'toppings'              => json_encode($toppings),
    //             'total_harga_toppings'  => $total_harga_toppings
    //         ]);
    //     }

    //     echo json_encode(['status' => true, 'message' => 'Pesanan berhasil disimpan']);
    // } //end function
    public function simpan_pesanan(){
        $username = $this->session->userdata('username');
        $cek = $this->db->query("SELECT username FROM `table_user` WHERE `username`='$username'")->num_rows();
        if ($cek != 1) {
            echo json_encode(['status' => false, 'message' => 'Anda mungkin sudah logout.']);
            return;
        }

        // Ambil data dari FormData (bukan dari key 'data' lagi)
        // $nama       = $this->input->post('customer_name');
        // $metode     = $this->input->post('payment_method');
        // $total      = intval($this->input->post('total'));
        // $kembalian  = intval($this->input->post('change'));
        // $items_json = $this->input->post('items');
        // $items      = json_decode($items_json, true);

        $nama       = $_POST['customer_name'] ?? null;
        $metode     = $_POST['payment_method'] ?? null;
        $total      = intval($_POST['total'] ?? 0);
        $kembalian  = intval($_POST['change'] ?? 0);
        $items_json = $_POST['items'] ?? null;
        $items      = json_decode($items_json, true);

        if (!$nama || !$metode || !$total || !is_array($items)) {
            echo json_encode(['status' => false, 'message' => 'Data tidak lengkap']);
            return;
        }

        // Jika QRIS, validasi upload file
        $bukti_qris_path = null;
        if ($metode === 'qris') {
            if (!isset($_FILES['bukti_qris']) || $_FILES['bukti_qris']['error'] !== UPLOAD_ERR_OK) {
                echo json_encode(['status' => false, 'message' => 'Bukti pembayaran QRIS wajib diunggah.']);
                return;
            }

            // Upload konfigurasi
            $config['upload_path']   = './public/bukti_qris/';
            $config['allowed_types'] = 'jpg|jpeg|png|svg|gif';
            $config['max_size']      = 6048; // 2MB
            $config['file_name']     = 'bukti_' . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('bukti_qris')) {
                echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                return;
            }

            $upload_data = $this->upload->data();
            $bukti_qris_path = 'public/bukti_qris/' . $upload_data['file_name'];
        }

        // Simpan ke tabel `pesanan`
        $this->db->insert('pesanan', [
            'customer_name'     => $nama,
            'payment_method'    => $metode,
            'total'             => $total,
            'change_amount'     => $kembalian,
            'created_at'        => date('Y-m-d H:i:s'),
            'created_by'        => $username,
            'bukti_qris'        => $metode=='qris' ? $bukti_qris_path : 'null',
            'tampilkan'         => 'yes'
        ]);

        $pesanan_id = $this->db->insert_id();

        // Simpan masing-masing item ke tabel `pesanan_detail`
        foreach ($items as $item) {
            $menu_id     = isset($item['menuId']) ? intval($item['menuId']) : 0;
            $menu_name   = isset($item['name']) ? $item['name'] : '';
            $base_price  = isset($item['basePrice']) ? intval($item['basePrice']) : 0;
            $quantity    = isset($item['quantity']) ? intval($item['quantity']) : 0;
            $toppings    = isset($item['toppings']) ? $item['toppings'] : [];

            $total_harga_toppings = 0;
            if (is_array($toppings)) {
                foreach ($toppings as $topping) {
                    if (isset($topping['price'])) {
                        $total_harga_toppings += intval($topping['price']);
                    }
                }
            }

            $this->db->insert('pesanan_detail', [
                'pesanan_id'            => $pesanan_id,
                'menu_id'               => $menu_id,
                'menu_name'             => $menu_name,
                'base_price'            => $base_price,
                'quantity'              => $quantity,
                'toppings'              => json_encode($toppings),
                'total_harga_toppings'  => $total_harga_toppings
            ]);
        }

        echo json_encode(['status' => true, 'message' => 'Pesanan berhasil disimpan']);
    }
    function load_menu(){
        $data = $this->input->post('data');
        $kata = "null";
        if (stripos($data, 'kat:') === 0) {
            $kata = trim(substr($data, 4));
        }
        $nama = $this->session->userdata('username');
        $nama = strtolower($nama);
        if($nama == "admin"){
            #superuser
            if($data == "all"){
                $menu = $this->db->query("SELECT * FROM menu_items ORDER BY name ASC")->result();
            } else {
                if($kata == "null"){
                    $menu = $this->db->query("SELECT * FROM menu_items WHERE name LIKE '%$data%' ORDER BY name ASC")->result();
                } else {
                    $menu = $this->db->query("SELECT * FROM menu_items WHERE category_id LIKE '%$kata%' ORDER BY name ASC")->result();
                }
            }
            ?>
            <span>Menampilkan daftar menu yang tersedia</span>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Kategori</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($menu as $row){
                            
                            ?>
                            <tr>
                                <td><img src="<?=$row->image;?>" alt="<?=$row->name;?>" style="width:100px;height:100px;object-fit:cover"></td>
                                <td><?=ucwords($row->category_id);?></td>
                                <td><?=$row->name;?></td>
                                <td>Rp. <?=number_format($row->price,0,',','.');?></td>
                                <td>
                                    <a href="javascript:void(0);" onclick="updateMenu('<?=$row->name;?>','<?=$row->id;?>','<?=number_format($row->price,0,',','.');?>','<?=$row->category_id;?>')" class="btn-simpan">Edit</a>&nbsp;
                                    <a href="javascript:void(0);" onclick="hapusmenu('<?=$row->name;?>','<?=$row->id;?>')" class="btn-edit">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php
        }
    }

    function load_laporan(){
        $data = $this->input->post('data');
        $nama = $this->session->userdata('username');
        // if($nama == "admin"){
        //     //#superuser
        // } else {
            //show penjualan hari ini saja jika kasir
            $today = date('Y-m-d');
            $start = $today . ' 00:00:00';
            $end = $today . ' 23:59:59';
            $yes = 'yes';
            $penjualan = $this->db->query("SELECT * FROM pesanan WHERE created_at BETWEEN ? AND ? AND tampilkan = ?", [$start, $end, $yes]);
            if($penjualan -> num_rows() > 0){
                ?>
                <span>Menampilkan Data Pesanan Hari Ini : <strong><?=date('d M Y');?></strong></span>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Total Menu</th>
                                <th>Total Harga</th>
                                <th>Pembayaran</th>
                                <th>Jam Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $total_terjual=0;
                            $total_pendapatan=0;
                            $no=1; foreach($penjualan->result() as $row){ 
                            $total_dibayar = $row->total - $row->change_amount;
                            $pesanan_id = $row->id;
                            $jml_menu = $this->data_model->get_byid('pesanan_detail', ['pesanan_id'=>$pesanan_id])->num_rows();
                            $total_terjual += $jml_menu;
                            $total_pendapatan += $total_dibayar;
                            ?>
                            <tr>
                                <td data-label="No"><?=$no++;?></td>
                                <td data-label="Nama"><?=$row->customer_name;?></td>
                                <td data-label="Total Menu"><?=$jml_menu;?></td>
                                <td data-label="Harga">Rp. <?=number_format($total_dibayar);?></td>
                                <td data-label="Pembayaran"><?=strtoupper($row->payment_method);?></td>
                                <td data-label="Jam Pesan">
                                    <span class="table-status status-success"><?=date('H:i', strtotime($row->created_at));?></span>
                                </td>
                                <td data-label="Aksi">
                                    <button class="table-action-btn table-delete-btn" onclick="del('<?=$pesanan_id;?>')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="2"><strong>Total Terjual</strong></td>
                                <td><strong><?=$total_terjual;?></strong></td>
                                <td>Rp. <strong><?=number_format($total_pendapatan);?></strong></td>
                                <td colspan="3"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
            } else {
                ?>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Total Menu</th>
                                <th>Total Harga</th>
                                <th>Jam Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6">Belum ada pesanan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
            }
        //}
        
    } //end of function 

    function hapus_pesanan(){
        $id = $this->input->post('id');
        $this->data_model->updatedata('id', $id, 'pesanan', ['tampilkan' => 'no']);
        $this->data_model->saved('log_user',[
            'txt' => ''.$this->session->userdata('username').' telah menghapus pesanan #'.$id.'#',
            'dtime' => date('Y-m-d H:i:s')
        ]);
        echo "success";
    }

    function hapus_menu(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $image = $this->data_model->get_byid('menu_items', ['id'=>$id])->row('image');
        $this->data_model->delete('menu_items','id', $id);
        $this->data_model->saved('log_user',[
            'txt' => ''.$this->session->userdata('username').' telah menghapus menu #'.$menu.'#',
            'dtime' => date('Y-m-d H:i:s')
        ]);
        $parts = explode('/', $image);
        $filename = end($parts);

        // Buat path absolut ke file di server
        $filepath = $_SERVER['DOCUMENT_ROOT'] . '/public/foto_menu/' . $filename;

        // Cek dan hapus file
        if (file_exists($filepath)) {
            unlink($filepath); }
        echo "success";
    }
    function showSetup(){
        ?>
        <div class="menu-gridss2">
            <div class="menu-item2" onclick="openModal('akun')">
                <i class="fas fa-chart-line"></i>
                <span>Laporan</span>
            </div>
            <!-- <div class="menu-item2">
                <i class="fas fa-user-circle"></i>
                <span>Akun</span>
            </div> -->
            <div class="menu-item2">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </div>
            <div class="menu-item2" onclick="openModal('kategori')">
                <i class="fas fa-box-open"></i>
                <span>Kategori</span>
            </div>
            <div class="menu-item2" onclick="toHalamanMenu()">
                <i class="fas fa-utensils"></i>
                <span>Menu</span>
            </div>
            <div class="menu-item2" onclick="openModal('toppings')">
                <i class="fas fa-cookie"></i>
                <span>Toppings</span>
            </div>
            
            <div class="menu-item2">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </div>
        </div>
        <?php
    }

    public function simpan_menu(){
        $username = $this->session->userdata('username');
        $cek = $this->db->query("SELECT username FROM `table_user` WHERE `username`='$username'")->num_rows();
        if ($cek != 1) {
            echo json_encode(['status' => false, 'message' => 'Anda mungkin sudah logout.']);
            return;
        }

        $nama_menu  = $_POST['nama_menu'] ?? null;
        $kat_menu   = $_POST['kategori_id'] ?? null;
        $foto_menu  = $_POST['bukti_qris'];
        $tipeid     = $_POST['tipeid'];
        $total      = intval($_POST['total'] ?? 0);
        $nama_menu  = strtolower($nama_menu);

        if (!$nama_menu || !$kat_menu || !$total) {
            echo json_encode(['status' => false, 'message' => 'Data tidak lengkap']);
            return;
        }
        $bukti_qris_path = null;
        if ($foto_menu === 'default_image') {
            if($kat_menu == "drink" || $kat_menu=="minum" || $kat_menu=="minuman" || $kat_menu=="jus"){
                $bukti_qris_path = 'public/drink-logo.png';
            } else {
                $bukti_qris_path = 'public/food-logo.png';
            }
        } else {
            $config['upload_path']   = './public/foto_menu/';
            $config['allowed_types'] = 'jpg|jpeg|png|svg|gif';
            $config['max_size']      = 6048; // 2MB
            $config['file_name']     = 'menu_' . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('bukti_qris')) {
                echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                return;
            }

            $upload_data = $this->upload->data();
            $bukti_qris_path = 'public/foto_menu/' . $upload_data['file_name'];
        }

        if($typeid == 'addmenu'){
            $this_image = "".base_url()."".$bukti_qris_path."";
            $this->db->insert('menu_items', [
                'name'           => ucwords($nama_menu),
                'price'          => $total,
                'category_id'    => $kat_menu,
                'image'          => $this_image
            ]);
            $menu_id = $this->db->insert_id();
        } else {
            if ($foto_menu === 'default_image') {
                $this->data_model->updatedata('id', $tipeid, 'menu_items', ['name' => ucwords($nama_menu), 'price' => $total, 'category_id' => $kat_menu]);
            } else {
                $this_image = "".base_url()."".$bukti_qris_path."";
                $this->data_model->updatedata('id', $tipeid, 'menu_items', ['name' => ucwords($nama_menu), 'price' => $total, 'category_id' => $kat_menu,'image' => $this_image]);
            }
        }
        
        echo json_encode(['status' => true, 'message' => 'Menu berhasil disimpan']);
    }
}
?>