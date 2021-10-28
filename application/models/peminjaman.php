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
}