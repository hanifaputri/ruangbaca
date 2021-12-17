<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengembalianController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('nama')){
            $this->session->set_flashdata('pesan','
                <div class="alert alert-danger" role="alert">
                <span>Anda belum login!</span>
                </div>
            ');
            redirect('login');
        }
    
        // Load Model
        $this->load->model('peminjaman');
    }

    public function index()
    {
        $idUser = $this->session->userdata('id');
        $data['pengembalian'] = $this->peminjaman->getAllPeminjaman($idUser);
        
        $data['title'] = "Detail Pengembalian Buku";
        $this->load->view('viewPengembalian', $data);
    }

    public function returnBuku($id)
    {
        $this->peminjaman->updateTglKembali($id);

        redirect('/pengembalian');
    }
}