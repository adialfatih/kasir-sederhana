<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller
{
    function __construct()
    {
            parent::__construct();
            $this->load->model('data_model');
            $this->load->library('pdf');
            date_default_timezone_set("Asia/Jakarta");
    }
    function index(){
        echo "";
    }
    
    function invoice($id_pesanan = null){
        $qry = "SELECT * FROM `pesanan` WHERE id = '$id_pesanan'";
        $result = $this->db->query($qry);
        if($result->num_rows() == 1){
            $cus_name = $result->row("customer_name");
            $payment_method = $result->row("payment_method");
            $total = $result->row("total");
            $change_amount = $result->row("change_amount");
            $created_at = $result->row("created_at");
            $total_produk = $total - $change_amount;
            $pdf = new FPDF('P', 'mm', array(58, 150)); // 58mm lebar, panjang 150mm (bisa disesuaikan)

            $pdf->AddPage();
            $pdf->SetMargins(1, 5,1);
            $pdf->SetAutoPageBreak(true, 10);

            // Judul
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(35, 5, 'Resto Kamu', 0, 1, 'C');

            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell(0, 4, 'Jl. Contoh No.123, Kota', 0, 1, 'C');
            $pdf->Cell(0, 4, 'Telp: 08123456789', 0, 1, 'C');
            $pdf->Ln(1);

            $pdf->Cell(0, 4, '----------------------------------------', 0, 1, 'C');

            // Info Pesanan
            $no_inv = 'INV-'.sprintf("%04d", $id_pesanan); // ganti dengan dari DB jika ada
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell(0, 4, 'No: '.$no_inv, 0, 1, 'L');
            $pdf->Cell(0, 4, 'Tgl: '.date('d-m-Y H:i', strtotime($created_at)), 0, 1, 'L');
            $pdf->Cell(0, 4, 'Kasir: Admin', 0, 1, 'L');

            $pdf->Cell(0, 4, '----------------------------------------', 0, 1, 'C');

            // Contoh item pesanan
            $pesanan = $this->data_model->get_byid('pesanan_detail', ['pesanan_id' => $id_pesanan])->result_array();

            foreach ($pesanan as $item) {
                $subtotal = $item['quantity'] * $item['base_price'];
                $pdf->Cell(0, 4, "{$item['quantity']}x {$item['menu_name']}", 0, 1, 'L');
                if($item['total_harga_toppings'] > 0){
                    $pdf->Cell(0, 4, 'Rp '.number_format($subtotal, 0, ',', '.').' (+ Rp. '.number_format($item['total_harga_toppings'], 0, ',', '.').' Toping)', 0, 1, 'L');
                } else {
                    $pdf->Cell(0, 4, 'Rp '.number_format($subtotal, 0, ',', '.').'', 0, 1, 'L');
                }
                
            }

            $pdf->Cell(0, 4, '----------------------------------------', 0, 1, 'C');

            // Total
            

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(25, 5, 'Total', 0, 0, 'L');
            $pdf->Cell(0, 5, 'Rp '.number_format($total_produk, 0, ',', '.'), 0, 1, 'L');

            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(25, 5, 'Bayar', 0, 0, 'L');
            $pdf->Cell(0, 5, 'Rp '.number_format($total, 0, ',', '.'), 0, 1, 'L');

            $pdf->Cell(25, 5, 'Kembali', 0, 0, 'L');
            $pdf->Cell(0, 5, 'Rp '.number_format($change_amount, 0, ',', '.'), 0, 1, 'L');

            $pdf->Ln(2);
            $pdf->SetFont('Arial', 'I', 8);
            $pdf->Cell(0, 4, 'Terima kasih!', 0, 1, 'C');

            $pdf->Output('I', 'invoice_'.$no_inv.'.pdf');
        } else {
            echo "Tidak ditemukan invoice";
        }
        
    }

}
?>