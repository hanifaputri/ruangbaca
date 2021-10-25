<?php
class LoginController extends CI_Controller {
    
    public function __construct()
	{
	parent::__construct();
	$this->load->database();
    $this->load->model('Pengguna');
	}
    
    public function index(){
        if($this->input->post('Login')) {
            $emailUser=$this->input->post('EMAIL_USER');
            $password=md5($this->input->post('PASSWORD_USER'));
            $data=$this->Pengguna->checkLogin($emailUser,$password);
           
            if ($data==false){
               $this->session->set_flashdata('pesan','
                    <div class="alert alert-danger" role="alert">
                    <span>Data email dan password salah</span> 
                    </div>
                ');
                $this->load->view('viewLogin');
            } else {
                // Add session
                $user_data = array(
                    'nama'  	=> $data->NAMA_USER,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($user_data);
                redirect('/home');
            }
        } else {
            $this->load->view('viewLogin');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->cart->destroy();
        redirect('/login');
    }
}
?>
    
