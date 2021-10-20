<?php
class PendaftaranController extends CI_Controller {


    public function __construct()
	{
	parent::__construct();
	$this->load->database();
    $this->load->model('Pengguna');
	}
    

    public function index(){
        if($this->input->post('Registrasi')) {
            $namaUser=$this->input->post('NAMA_USER');
            $emailUser=$this->input->post('EMAIL_USER');
            $password=md5($this->input->post('PASSWORD_USER'));

            if ($this->Pengguna->checkDataUser($emailUser)){
                $this->session->set_flashdata('pesan','
                    <div class="alert alert-danger" role="alert">
                    <span>Pengguna sudah terdaftar</span> 
                    </div>
                ');
                $this->load->view('viewRegistrasi');
            } else {
                $this->Pengguna->submitDataUser($namaUser,$emailUser,$password);
                $this->load->view('viewRegistrasiBerhasil');
            }
        } else {
            $this->load->view('viewRegistrasi');
        }
    }
}
?>