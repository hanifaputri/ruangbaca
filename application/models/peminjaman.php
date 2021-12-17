<?php 
class Peminjaman extends CI_Model {
    private $table;

    public function __construct()
    {
        parent::__construct();

        $this->table = 'PEMINJAMAN';
    }

    public function getPeminjaman(){
        // return "Tes";
        return $this->db->get($this->table)->result();
    }

    public function insertAllPeminjaman($data, $idBuku)
    {
		$this->db->insert_batch($this->table, $data);
		// Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date'),  ('Another title', 'Another name', 'Another date')
    }

    public function getAllPeminjaman($idUser)
    {
        $query = $this->db->query("
        SELECT * FROM PEMINJAMAN
        INNER JOIN BUKU ON PEMINJAMAN.ID_BUKU = BUKU.ID_BUKU
        WHERE ID_USER = '$idUser'
        ");

        return $query->result();
    }

    public function updateTglKembali($idPeminjaman)
    {
        $date = date("Y-m-d");
        $data = $this->db->query("SELECT DURASI_PEMINJAMAN, TGL_PINJAM FROM PEMINJAMAN WHERE ID_PEMINJAMAN = '$idPeminjaman'")->row();

        // Convert date string into int
        $convertTgl = (strtotime($date)) - (strtotime($data->TGL_PINJAM));

        // Date format
        $tglKembali = idate('z', $convertTgl);

        //$cek2 = (int)($data->DURASI_PEMINJAMAN);
        //var_dump($cek2);
        //die();

        // Update Status
        if ($tglKembali <= (int)($data->DURASI_PEMINJAMAN)) {
            $this->db->set('STATUS_PENGEMBALIAN', 'Pengembalian berhasil');
        } else {
            $this->db->set('STATUS_PENGEMBALIAN', 'Pengembalian terlambat');
        }
        
        // Update Peminjaman
        $this->db->set('TGL_KEMBALI', $date);
        $this->db->where('ID_PEMINJAMAN', (int)$idPeminjaman);
        $this->db->update('PEMINJAMAN');

        return $this->db->affected_rows();
    }
}