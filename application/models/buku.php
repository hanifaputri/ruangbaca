<?php 
class Buku extends CI_Model {
    public $idBuku;
    public $judulBuku;
    public $penerbitBuku;
    public $kategoriBuku;
    public $bahasaBuku;

    private $table;

    public function __construct()
    {
        parent::__construct();

        $this->table = 'BUKU';
    }

    public function getBuku(){
        $query = $this->db->query("
        SELECT 
            BUKU.ID_BUKU, 
            BUKU.ISBN, 
            BUKU.JUDUL_BUKU, 
            BUKU.URL_IMG_BUKU, 
            BUKU.ID_KATEGORI, 
            BUKU.STATUS_BUKU,
            KATEGORI.NAMA_KATEGORI
        FROM BUKU
        INNER JOIN KATEGORI ON BUKU.ID_KATEGORI = KATEGORI.ID_KATEGORI;");
        
        return $query->result();
    }

    public function getBukuById($idBuku){
        $query = $this->db->query("
        SELECT BUKU.ID_BUKU, BUKU.ISBN, BUKU.JUDUL_BUKU, BUKU.URL_IMG_BUKU, BUKU.ID_PENERBIT, PENERBIT.NAMA_PENERBIT, BUKU.ID_KATEGORI, KATEGORI.NAMA_KATEGORI, BUKU.ID_BAHASA, BAHASA.NAMA_BAHASA FROM BUKU
        INNER JOIN PENERBIT ON BUKU.ID_PENERBIT = PENERBIT.ID_PENERBIT
        INNER JOIN KATEGORI ON BUKU.ID_KATEGORI = KATEGORI.ID_KATEGORI
        INNER JOIN BAHASA ON BUKU.ID_BAHASA = BAHASA.ID_BAHASA
        WHERE BUKU.ID_BUKU = '$idBuku'
        LIMIT 1;");

        return $query->result();
    }

    public function searchByQuery($keyword){
        $query = $this->db->query("
        SELECT * FROM BUKU 
        INNER JOIN KATEGORI ON BUKU.ID_KATEGORI = KATEGORI.ID_KATEGORI
        WHERE JUDUL_BUKU LIKE '%$keyword%';");

        return $query->result();
    }

}