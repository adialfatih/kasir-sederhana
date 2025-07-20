<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setupmodals extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('data_model');
    }
    function index(){ 
        echo "Token Error...";
    } //end-
    function newmenu(){ 
        $mrc = $this->db->query("SELECT * FROM `merchant` WHERE id_merchant=1")->row_array();
        $data = array(
            'title' => 'Setup menu '.$mrc['nama_merchant'].'',
            'sess_nama' => $this->session->userdata('username'),
            'sess_pass' => $this->session->userdata('password'),
            'sess_id' => $this->session->userdata('login_form'),
            'mrc' => $mrc
        );
        $this->load->view('menu_view', $data);
    } //end-
    function delkat(){
        $this->data_model->delete('menu_categories','id', $this->input->post('id', TRUE));
        echo "success";
    }
    function delkat2(){
        $this->data_model->delete('menu_toppings','id', $this->input->post('id', TRUE));
        echo "success";
    }
    function newkat(){
        $kat = $this->input->post('kat', TRUE);
        if($kat == ""){
            echo json_encode(['status' => 500, 'message' => 'Kategori tidak boleh kosong']);
        } else {
            $_kat = strtolower($kat);
            $_kat2 = ucwords($_kat);
            $cek = $this->data_model->get_byid('menu_categories',['id'=>$_kat])->num_rows();
            if($cek == 0){
                $this->data_model->saved('menu_categories',['id'=>$_kat,'name'=>$_kat2]);
                echo json_encode(['status' => 200, 'message' => 'Menyimpan kategori '.$_kat2.'']);
            } else {
                echo json_encode(['status' => 500, 'message' => 'Kategori sudah ada']);
            }
        }
    }
    function newkat2(){
        $kat = $this->input->post('kat', TRUE);
        $toping = '';
        $harga = 0;
        // Ambil baris pertama saja
        $lines = explode("\n", $kat);
        $firstLine = trim($lines[0]);
        // Pisahkan berdasarkan koma
        $parts = explode(',', $firstLine);

        if (count($parts) == 2) {
            $toping = trim($parts[0]);
            $hargaRaw = trim($parts[1]);
            $hargaClean = str_replace('.', '', $hargaRaw);

            if (is_numeric($hargaClean)) {
                $harga = (int) $hargaClean;
                $_toping = ucwords($toping);
                $_harga = $harga;
                $this->data_model->saved('menu_toppings',['name'=>$_toping,'price'=>$_harga]);
                echo json_encode(['status' => 200, 'message' => 'Menyimpan topping '.$_toping.'']);
            } else {
                echo json_encode(['status' => 500, 'message' => 'Harga harus angka']);
                //return ;
            }
        } else {
            echo json_encode(['status' => 500, 'message' => 'Format isian salah.!']);
        }//end gpt
    }
    function datasetup(){
        $page = $this->input->post('page', TRUE);
        if($page == "kategori"){
            ?>
            <table style="width:100%; border-collapse: collapse;">
				<thead>
					<tr>
					<th style="text-align:left; border-bottom:1px solid #ccc;">Nama Kategori</th>
					<th style="text-align:left; border-bottom:1px solid #ccc;">Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                    $kat = $this->db->query("SELECT * FROM menu_categories")->result();
                    foreach($kat as $val){
                    ?>
					<tr>
					<td><?=$val->name;?></td>
					<td><button class='btn-edit' onclick="delkat('<?=$val->id;?>','<?=$val->name;?>')">Hapus</button></td>
					</tr>
                    <?php } ?>
                    <tr>
                        <td><input type="text" id="newKat" placeholder="Kategori Baru" class="ipt-form"></td>
                        <td><button class='btn-simpan' onclick="newKat()">Tambah</button></td>
                    </tr>
				</tbody>
			</table>
            <?php
        }
        if($page == "toppings"){
            ?>
            <table style="width:100%; border-collapse: collapse;">
				<thead>
					<tr>
					<th style="text-align:left; border-bottom:1px solid #ccc;">Topping</th>
					<th style="text-align:left; border-bottom:1px solid #ccc;">Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                    $kat = $this->db->query("SELECT * FROM menu_toppings")->result();
                    foreach($kat as $val){
                    ?>
					<tr>
					<td><?=$val->name;?>, Rp <?=number_format($val->price,0,',','.');?></td>
					<td><button class='btn-edit' onclick="deltop('<?=$val->id;?>','<?=$val->name;?>')">Hapus</button></td>
					</tr>
                    <?php } ?>
                    <tr>
                        <td style="display:flex;flex-direction:column;align-items:flex-end;"><input type="text" id="newTops" placeholder="Topping Baru, harga" class="ipt-form">
                        <small>Contoh : Sosis, 3000</small></td>
                        <td><button class='btn-simpan' onclick="newTop()">Tambah</button></td>
                    </tr>
				</tbody>
			</table>
            <?php
        }
        if($page == "akun"){
            ?>
            <form>
				<label>Nama:</label><br>
				<input type="text" placeholder="Nama Anda" style="width:100%;padding:8px"><br><br>
				<label>Email:</label><br>
				<input type="email" placeholder="Email" style="width:100%;padding:8px">
			</form>
            <?php
        }
    }
}
?>