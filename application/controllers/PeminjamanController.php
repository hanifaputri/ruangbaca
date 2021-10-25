<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeminjamanController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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

		// Load model
		$this->load->model('buku');
		$this->load->model('peminjaman');

    }

	public function index()
	{
		$data['buku'] = $this->buku->getBuku();
		// $this->cart->destroy();
		// var_dump($this->cart->contents());

		// var_dump($data['buku']);
		$data['title'] = "Eksplor Buku";
		$this->load->view('header', $data);
		$this->load->view('viewPeminjaman', $data);
		$this->load->view('footer');
	}

	public function search()
	{
		// Get url param
		$keyword = trim($this->input->get('q'));
		$data['keyword'] = $keyword;
		
		if ($keyword){
			$data['buku'] = $this->buku->searchByQuery($keyword);
		} else {
			redirect('/home');
		}
		$data['title'] = "Hasil Pencarian";
		$this->load->view('header', $data);
		$this->load->view('viewPeminjaman', $data);
		$this->load->view('footer');
	}

	public function viewDetailPeminjaman($id)
	{
		$book = $this->buku->getBukuById($id);
		if ($book) {
			// echo $id;
			$data['buku'] = $book;
			$data['title'] = "Detail Peminjaman Buku";

			$this->load->view('header', $data);
			$this->load->view('viewDetailPeminjaman', $data);
			$this->load->view('footer');
			
		} else {
			redirect("/404");
		}
	}

	public function addToPeminjaman()
	{
		$idBuku = $this->input->post('idBuku');
		$durasi = $this->input->post('durasi');

		// var_dump($idBuku, $durasi);

		// Insert sss
		$insert = $this->peminjaman->insertPeminjaman($idBuku, 1, $durasi);
		if ($insert > 0){
			// If insert successful
			redirect('/peminjaman/success');
		} else {
			echo "Peminjaman gagal";
		}
		// var_dump($insert);
	}

	public function peminjamanBerhasil()
	{
		$data['title'] = "Peminjaman Berhasil";
		$this->load->view('header', $data);
		$this->load->view('viewPeminjamanBerhasil');
		$this->load->view('footer');
	}

	public function addToCart($id)
	{
		$book = $this->buku->getCartDetailById($id);
		$data = array(
			'id' => $book->ID_BUKU,
			'qty' => 1,
			'price' => 0,
			'name' => $book->JUDUL_BUKU,
			'options' => array(
				'imgUrl' => $book->URL_IMG_BUKU
			)
		);

		$this->cart->insert($data);
		redirect('/home');
		// var_dump($data);
	}

	public function resetCart()
	{
		$this->cart->destroy();
		redirect('/home');
	}

	public function deleteCartById($id)
	{
		$data = array(
            'rowid'   => $id,
            'qty'     => 0
        );

        $this->cart->update($data);
		redirect('/home');
	}
}
