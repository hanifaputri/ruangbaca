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

	public function insertPeminjaman($idBuku, $idUser, $durasi) {
        $data = array(
            'ID_BUKU' => (int) $idBuku,
            'ID_USER' => $idUser,
            'TGL_PINJAM' => date("Y-m-d"),
            'DURASI_PEMINJAMAN' => (int)$durasi
        );
        // Insert peminjaman
        $this->db->insert($this->table, $data);

        // Update buku
        $this->db->set('STATUS_BUKU', 'Tidak Tersedia');
        $this->db->where('ID_BUKU', (int)$idBuku);
        $this->db->update('BUKU'); // gives UPDATE mytable SET field = field+1 WHERE id = 2

		// $query = $this->db->query("
        // INSERT INTO $this->table (ID_BUKU, ID_USER, TGL_PINJAM, DURASI) 
        // VALUES ('$idBuku', '$idUser', now(), $durasi);
        // ");

        return $this->db->affected_rows();
	}

    public function insertAllPeminjaman($data)
    {
		$this->db->insert_batch($this->table, $data);
		// Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date'),  ('Another title', 'Another name', 'Another date')
       
        return $this->db->affected_rows();
    }
}