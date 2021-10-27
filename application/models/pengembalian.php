<?php
class Pengembalian extends CI_Model {
    private $table;

    public function __construct()
    {
        parent::__construct();

        $this->table = 'PENGEMBALIAN';
    }

    public function getIdPeminjaman(){
        return $this->db->get($this->table)->result();
    }

    public function insertIdPeminjaman($idPeminjaman, $idBuku, $idUser, $durasi) {
        
    }
}