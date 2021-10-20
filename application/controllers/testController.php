<?php
class testController extends CI_Controller {
    
    public function __construct()
	{
	parent::__construct();
	$this->load->database();
    $this->load->model('Pengguna');
	}
    public function index(){
        $this->load->view('viewLoginBerhasil');
    }
}