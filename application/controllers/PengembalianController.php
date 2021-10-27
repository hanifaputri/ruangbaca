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
    
    /*
    public function getPeminjamanById($id)
    {
        $query = $this->db->query("
        SELECT ID_PEMINJAMAN, ID_BUKU, ID_USER, TGL_PINJAM, DURASI_PEMINJAMAN, TGL_KEMBALI
        FROM PEMINJAMAN
        WHERE ID_PEMINJAMAN = '$id';
        ");

        return $query->row();
    }
    */

    public function index()
    {
        
    }

    public function searchId($id)
    {
        $idPeminjaman = $this->peminjaman->getPeminjamanById($id);
        if (!$idPeminjaman){
            echo "ID Peminjaman tidak ditemukan";
        } else {
            $data['peminjaman'] = 
            
            $this->load->view('viewPengembalian', $data);
        }
    }

    public function returnBuku()
    {
        
    }
}