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