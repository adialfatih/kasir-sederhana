<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Block extends CI_Controller
{
  function __construct()
  {
      parent::__construct();
      $this->load->model('data_model');
      date_default_timezone_set("Asia/Jakarta");
   //    if($this->session->userdata('status') != "login"){
			// redirect(base_url("auth_login"));
	    //}
  }
   
  function index(){
      $this->load->view('blok_view');
  }
   
  function tes(){
      $query = $this->data_model->get_byid('data_fol', ['konstruksi'=>'SM05B', 'jns_fold'=>'Finish', 'posisi'=>'Samatex']);
      echo "Jumlah data ".$query->num_rows() ." Roll<br>";
      foreach($query->result() as $val){
          $kdrol = $val->kode_roll;
          $cek = $this->data_model->get_byid('new_tb_isi', ['kode'=>$kdrol]);
          if($cek->num_rows() > 0){
              $pkg = $cek->row("kd");
              $ke = $this->data_model->get_byid('new_tb_packinglist', ['kd'=>$pkg])->row("kepada");
              $sj = $this->data_model->get_byid('new_tb_packinglist', ['kd'=>$pkg])->row("no_sj");
              echo "".$cek->row('kd')." -- : Kode Roll : ".$kdrol." Terjual ke  : ".$ke." -- SJ -- (".$sj.")<br>";
          }
          
      }
  }

  function owek(){
    echo "tes oke <hr>";
      $query = $this->db->query("SELECT kode_roll, COUNT(*) as jumlah_duplikat
      FROM new_roll_onpst
      GROUP BY kode_roll
      HAVING COUNT(*) > 1");
      foreach($query->result() as $val){
          $kd = $val->kode_roll;
          //echo $val->kode_roll." -- ".$val->jumlah_duplikat."<br>";
          if($val->jumlah_duplikat > 1){
              $qeq = $this->data_model->get_byid('new_roll_onpst', ['kode_roll'=>$kd]);
              foreach($qeq->result() as $ns => $val2){
                echo "-------<br>";
                  if($ns==0){

                  } else {
                      $iid = $val2->id_auto25;
                      $this->db->query("DELETE FROM new_roll_onpst WHERE id_auto25='$iid'");
                  }
                echo $val2->kode_roll."--$iid<br>";
                echo "-------<br>";
              }
          }
      }
  } //end
  function produksi(){
      $prod = $this->db->query("SELECT * FROM data_ig WHERE tanggal BETWEEN '2024-10-01' AND '2024-10-31' AND dep = 'RJS' GROUP BY konstruksi");
      echo "<table border='1'><tr><td>NO</td><td>KONSTRUKSI</td><td>ORI</td><td>BS</td>";
      echo "</tr>";
      $no=1;
      foreach($prod->result() as $val){
          $kons = $val->konstruksi;
          $jumlah = $this->db->query("SELECT SUM(ukuran_ori) AS jml FROM data_ig WHERE konstruksi='$kons' AND tanggal BETWEEN '2024-10-01' AND '2024-10-31' AND dep = 'RJS'")->row("jml");
          $bs = $this->db->query("SELECT SUM(ukuran_bs) AS jml FROM data_ig WHERE konstruksi='$kons' AND tanggal BETWEEN '2024-10-01' AND '2024-10-31' AND dep = 'RJS'")->row("jml");
          echo "<tr>";
          echo "<td>".$no."</td>";
          echo "<td>".$kons."</td>";
          echo "<td>".$jumlah."</td>";
          echo "<td>".$bs."</td>";
          echo "</tr>";
          $no++;
      }
  }

  function hasilkanPiutang(){
        $qry = "SELECT id_customer,nama_konsumen FROM `view_nota2` WHERE nama_konsumen NOT LIKE 'KM%' AND nama_konsumen NOT LIKE 'PS%' AND nama_konsumen NOT LIKE 'PH%' GROUP BY id_customer;";
        $result = $this->db->query($qry)->result();
        foreach($result as $val){
            $idcus = $val->id_customer;
            $nmcus = $val->nama_konsumen;
            echo "$idcus - $nmcus <br>";
        }
        foreach($result as $val1){
            $idcus = $val1->id_customer;
            $nmcus = $val1->nama_konsumen;
            $cekCusId = $this->db->query("SELECT * FROM ab_cuspriority WHERE idcus='$idcus'");
                            if($cekCusId->num_rows() == 1){
                                //echo $idcus;
                                $inisial  = $cekCusId->row("awalan");
                                $allID    = $this->db->query("SELECT id_konsumen,nama_konsumen FROM dt_konsumen WHERE nama_konsumen LIKE '$inisial%' OR id_konsumen='$idcus'");
                                $arrID = array();
                                foreach($allID->result() as $vl){
                                    $thisID = "'".$vl->id_konsumen."'";
                                    $arrID[]= $thisID;
                                }
                                $arrIM = implode(",", $arrID);
                                $qry   = "SELECT *  FROM `view_nota2` WHERE `id_customer` IN (".$arrIM.")";
                                $showNota = $this->db->query($qry);
                                $showBayar = $this->db->query("SELECT * FROM `a_nota_bayar2` WHERE id_cus IN (".$arrIM.")");
                            } else {
                                //echo $idcus;
                                $qry   = "SELECT *  FROM `view_nota2` WHERE `id_customer` = '$idcus' ";
                                $showNota = $this->db->query($qry);
                                $showBayar = $this->db->query("SELECT * FROM `a_nota_bayar2` WHERE id_cus = '$idcus'");
                            }
                            $allNota = [];
                            foreach($showNota->result() as $val){
                                $allNota[] = [
                                    "tipe" => "nota",
                                    "idnota" => $val->id_nota,
                                    "nosj" => $val->no_sj,
                                    "idcustomer" => $val->id_customer,
                                    "nmcus" => $val->nama_konsumen,
                                    "kd" => $val->kd,
                                    "jnsfold" => $val->jns_fold,
                                    "konstruksi" => $val->konstruksi,
                                    "jmlroll" => $val->jml_roll,
                                    "totalpanjang" => $val->total_panjang,
                                    "hargasatuan" => $val->harga_satuan,
                                    "totalharga" => $val->total_harga,
                                    "tglnota" => $val->tgl_nota,
                                    "bayar" => 0,
                                    "saldo" => 0,
                                    "nomorbukti" => "null",
                                    "tujuan_rek"=> "null"
                                ];
                            }
                            foreach($showBayar->result() as $byr){
                                $allNota[] = [
                                    "tipe" => "bayar",
                                    "idnota" => 0,
                                    "nosj" => 0,
                                    "idcustomer" => $byr->id_cus,
                                    "nmcus" => "null",
                                    "kd" => "null",
                                    "jnsfold" => "null",
                                    "konstruksi" => "null",
                                    "jmlroll" => "null",
                                    "totalpanjang" => 0,
                                    "hargasatuan" => "null",
                                    "totalharga" => 0,
                                    "tglnota" => $byr->tgl_pemb,
                                    "bayar" => $byr->nominal_pemb,
                                    "saldo" => 0,
                                    "nomorbukti" => $byr->nomor_bukti,
                                    "tujuan_rek"=> $byr->tujuan_rek
                                ];
                            }
                            // usort($allNota, function($a, $b) {
                            //     return strtotime($a['tglnota']) - strtotime($b['tglnota']);
                            // });
                            usort($allNota, function($a, $b) {
                                $tanggalA = strtotime($a['tglnota']);
                                $tanggalB = strtotime($b['tglnota']);

                                // 1. Urutkan berdasarkan tanggal (asc)
                                if ($tanggalA != $tanggalB) {
                                    return $tanggalA - $tanggalB;
                                }

                                // 2. Jika tanggal sama, tampilkan 'nota' dulu baru 'bayar'
                                // Nilai 'nota' dianggap lebih kecil dari 'bayar'
                                $prioritas = ['nota' => 0, 'bayar' => 1];
                                $tipeA = isset($a['tipe']) ? $a['tipe'] : 'bayar'; // default ke bayar jika tidak ada
                                $tipeB = isset($b['tipe']) ? $b['tipe'] : 'bayar';

                                return $prioritas[$tipeA] - $prioritas[$tipeB];
                            });
                            //$thisTotalPanjang = SUM($allNota['totalpanjang']);
                            $thisTotalPanjang = array_reduce($allNota, function($carry, $item) {
                                if (isset($item['tipe']) && $item['tipe'] === 'nota') {
                                    $carry += floatval($item['totalpanjang']);
                                }
                                return $carry;
                            }, 0);
                            $thisTotalHarga = array_reduce($allNota, function($carry, $item) {
                                if (isset($item['tipe']) && $item['tipe'] === 'nota') {
                                    $carry += floatval($item['totalharga']);
                                }
                                return $carry;
                            }, 0);
                            $thisTotalBayar = array_reduce($allNota, function($carry, $item) {
                                if (isset($item['tipe']) && $item['tipe'] === 'bayar') {
                                    $carry += floatval($item['bayar']);
                                }
                                return $carry;
                            }, 0);
                            ?>
                            <table class="table table-bordered stripe hover nowrap">
								<thead>
									<tr>
										<th class="table-plus datatable-nosort" style="text-align:center;">TUJUAN</th>
										<th style="text-align:center;">TANGGAL</th>
										<th style="text-align:center;">KONSTRUKSI</th>
										<th style="text-align:center;">NO SJ</th>
										<th style="text-align:center;">NO NOTA</th>
										<th style="text-align:center;">QTY</th>
										<th style="text-align:center;">PANJANG EP</th>
										<th style="text-align:center;">HARGA</th>
                                        <th style="text-align:center;">PPN</th>
                                        <th style="text-align:center;">JUMLAH EP+PPN</th>
                                        <th style="text-align:center;">BAYAR</th>
                                        <th style="text-align:center;">SALDO</th>
									</tr>
								</thead>
								<tbody>
                            <?php
                            $allsaldo = 0; $allBayar = 0;
                                    foreach ($allNota as $nota):
                                    if($nota['totalpanjang'] == floor($nota['totalpanjang'])){
                                        $totalPanjang = number_format($nota['totalpanjang'],0,',','.');
                                    } else {
                                        $totalPanjang = number_format($nota['totalpanjang'],2,',','.');
                                    }
                                    if($nota['hargasatuan'] == "null"){ $hargasatuan =""; } else { 
                                    if($nota['hargasatuan'] == floor($nota['hargasatuan'])){
                                        $hargasatuan = "Rp ".number_format($nota['hargasatuan'],0,',','.');
                                    } else {
                                        $hargasatuan = "Rp ".number_format($nota['hargasatuan'],2,',','.');
                                    } }
                                    if($nota['totalharga'] == "null"){ $totalharga =""; } else {
                                    if($nota['totalharga'] == floor($nota['totalharga'])){
                                        $totalharga = "Rp ".number_format($nota['totalharga'],0,',','.');
                                    } else {
                                        $totalharga = "Rp ".number_format($nota['totalharga'],2,',','.');
                                    } }
                                    if($nota['bayar'] > 0){
                                        if($nota['bayar'] == floor($nota['bayar'])){
                                            $notabayar = "Rp ".number_format($nota['bayar'],0,',','.');
                                        } else {
                                            $notabayar = "Rp ".number_format($nota['bayar'],2,',','.');
                                        }
                                    } else {
                                        $notabayar = "";
                                    }
                                    if($nota['saldo'] > 0){
                                        if($nota['saldo'] == floor($nota['saldo'])){
                                            $saldonota = "Rp ".number_format($nota['saldo'],0,',','.');
                                        } else {
                                            $saldonota = "Rp ".number_format($nota['saldo'],2,',','.');
                                        }
                                    } else {
                                        $saldonota = "";
                                    }
                                    if($nota['tipe']=="nota"){
                                        $allsaldo = $allsaldo + $nota['totalharga'];
                                        $thisBayar = 0;
                                        $showAkhirSaldo = $allsaldo - $thisBayar;
                                        if($showAkhirSaldo == floor($showAkhirSaldo)){
                                            $saldoTanpaFormat = $showAkhirSaldo;
                                            $formatSaldo = "Rp. ".number_format($showAkhirSaldo,0,",",".");
                                        } else {
                                            $saldoTanpaFormat = $showAkhirSaldo;
                                            $formatSaldo = "Rp. ".number_format($showAkhirSaldo,2,",",".");
                                        }
                                        
                                    } else {
                                        $thisSaldo = $allsaldo;
                                        $thisBayar = $nota['bayar'];
                                        $showAkhirSaldo = $allsaldo - $thisBayar;
                                        if($showAkhirSaldo == floor($showAkhirSaldo)){
                                            $saldoTanpaFormat = $showAkhirSaldo;
                                            $formatSaldo = "Rp. ".number_format($showAkhirSaldo,0,",",".");
                                        } else {
                                            $saldoTanpaFormat = $showAkhirSaldo;
                                            $formatSaldo = "Rp. ".number_format($showAkhirSaldo,2,",",".");
                                        }
                                        $allsaldo = $showAkhirSaldo;
                                    }
                                    ?>
                                    <tr>
                                        <td><?=$nota['nmcus']=="null" ? "":$nota['nmcus'];?></td>
                                        <td><?=date('d/m/y',strtotime($nota['tglnota']));?></td>
                                        <td><?=$nota['konstruksi']=="null" ? $nota['nomorbukti'] : $nota['konstruksi'];?></td>
                                        <td><?=$nota['nosj']=="0" ? "":$nota['nosj'];?></td>
                                        <td><?=$nota['idnota']=="0" ? "":$nota['idnota'];?></td>
                                        <td><?=$totalPanjang==0 ? "":$totalPanjang;?></td>
                                        <td><?=$totalPanjang==0 ? "":$totalPanjang;?></td>
                                        <td><?=$hargasatuan;?></td>
                                        <td>-</td>
                                        <td><?=$totalharga;?></td>
                                        <td style="color:red;"><?=$notabayar;?></td>
                                        <td><?=$formatSaldo;?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="12"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="font-weight:bold;">Total</td>
                                        <td style="font-weight:bold;"><?=number_format($thisTotalPanjang,0,",",".");?></td>
                                        <td style="font-weight:bold;"><?=number_format($thisTotalPanjang,0,",",".");?></td>
                                        <td></td>
                                        <td></td>
                                        <td style="font-weight:bold;">Rp. <?=number_format($thisTotalHarga,0,",",".");?></td>
                                        <td style="color:red;font-weight:bold;">Rp. <?=number_format($thisTotalBayar,0,",",".");?></td>
                                        <td style="font-weight:bold;"><?=$formatSaldo;?></td>
                                    </tr>
                                </tbody>
                            </table><?php
                            $cekKons = $this->data_model->get_byid('tes_piutang3', ['id_konsumen'=>$idcus])->num_rows();
                            if($cekKons == 0){
                                $this->data_model->saved('tes_piutang3',[
                                    'id_konsumen' => $idcus,
                                    'nominal_piutang' => $formatSaldo,
                                    'updatess' => date('Y-m-d H:i:s'),
                                    'saldop' => $saldoTanpaFormat,
                                    'nmcus' => $nmcus
                                ]);
                            } else {
                                $this->data_model->updatedata('id_konsumen',$idcus,'tes_piutang3',[
                                    'nominal_piutang' => $formatSaldo,
                                    'updatess' => date('Y-m-d H:i:s'),
                                    'saldop' => $saldoTanpaFormat,
                                ]);
                            }
                            
        }
  }

}
?>