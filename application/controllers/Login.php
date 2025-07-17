<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('data_model');
    }
    
    function index(){ 
        $this->session->sess_destroy();
        $this->load->view('login_form');
    } //end
    function act_login(){
        $username = $this->data_model->clean($this->input->post('username', TRUE));
        $password = $this->data_model->clean($this->input->post('password', TRUE));
        if($username!="" && $password!=""){
            $cek = $this->data_model->get_byid('table_user',['username'=>$username])->num_rows();
            if($cek == 1){
                $cek2 = $this->data_model->get_byid('table_user',['username'=>$username,'password'=>sha1($password)]);
                if($cek2->num_rows() == 1){
                    $data_session = array(
						'username'=> $username,
						'password'=> $password,
						'login_form'=> 'akses-as1563sd1679dsad8789asff53afhafaf670fa'
					);
					$this->session->set_userdata($data_session);
                    echo json_encode(array('statusCode' => 200, 'message' => 'Login Berhasil'));
                } else {
                    echo json_encode(array('statusCode' => 500, 'message' => 'Password salah'));
                }
            } else {
                echo json_encode(array('statusCode' => 500, 'message' => 'Username tidak ditemukan'));
            }
        } else {
            echo json_encode(array('statusCode' => 500, 'message' => 'Username atau Password tidak boleh kosong!'));
        }
    }
    
}
?>