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
		// $id = 2;
		// $data = $this->cart->contents();

		// foreach ($data as $item){
		// 	if ($item['id']==$id){
		// 		echo "Yes ketemu!";
		// 		break;
		// 	} else {
		// 		echo "Ga ketemu";
		// 	}
		// }
		// // foreach ($post['idUser'] as $key => $value) {

		// // var_dump($data);
		// die();
		
		$data['buku'] = $this->buku->getBuku();
		$data['kategori'] = $this->buku->getCategory();

		// $this->cart->destroy();
		// var_dump($this->cart->contents());

		// var_dump($data['buku']);
		$data['title'] = "Eksplor Buku";
		$this->load->view('header', $data);
		$this->load->view('viewPeminjaman', $data);
	}

	public function search()
	{
		// Get url param
		$keyword = trim($this->input->get('q'));
		$category = $this->input->get('c');

		$data['keyword'] = $keyword;
		$data['category'] = $category;
		
		if ($keyword && $category=="all"){
			$data['buku'] = $this->buku->searchByQuery($keyword);
		} else if ($keyword){
			$data['buku'] = $this->buku->searchByCategory($keyword, $category);
		} else {
			redirect('/home');
		}

		$data['title'] = "Hasil Pencarian";
		$data['kategori'] = $this->buku->getCategory();

		$this->load->view('header', $data);
		$this->load->view('viewPeminjaman', $data);
	}

	public function viewDetailBuku($id)
	{
		$book = $this->buku->getBukuById($id);
		if ($book) {
			// echo $id;
			$data['buku'] = $book;
			$data['title'] = "Detail Peminjaman Buku";

			$this->load->view('header', $data);
			$this->load->view('viewDetailBuku', $data);
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

	// public function addToCart($id)
	// {
	// 	$book = $this->buku->getCartDetailById($id);
	// 	$data = array(
	// 		'id' => $book->ID_BUKU,
	// 		'qty' => 1,
	// 		'price' => 0,
	// 		'name' => $book->JUDUL_BUKU,
	// 		'options' => array(
	// 			'imgUrl' => $book->URL_IMG_BUKU,
	// 			'penulis' => $book->PENULIS
	// 		)
	// 	);

	// 	$this->cart->insert($data);
	// 	redirect('/home');
	// 	// var_dump($data);
	// }

	public function add()
	{
		// Retrieve id from cart
		$id = $this->input->get('id');
		$book = $this->buku->getCartDetailById($id);
		$data = array(
			'id' => $book->ID_BUKU,
			'qty' => 1,
			'price' => 0,
			'name' => $book->JUDUL_BUKU,
			'options' => array(
				'imgUrl' => $book->URL_IMG_BUKU,
				'penulis' => $book->PENULIS
			)
		);
		// Add item to cart
		$this->cart->insert($data);

		// Add total item
		$data['total_item'] = $this->cart->total_items();
		
		// Return value to view asynchronously
		echo json_encode($data);
		exit();
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

	public function viewDetailPeminjaman()
	{	
		$this->load->view('viewDetailPeminjaman');
		// $data = $this->cart->contents();
		// $data = $this->session->userdata('id');
		// print_r($data);
	}

	public function addDataPeminjaman()
	{
		// $data = $this->input->post();
		// var_dump($data);
		$data = array();
		$post = $this->input->post();
		
		foreach ($post['idUser'] as $key => $value) {
			if(isset($post['idUser'][$key])){
				array_push($data, array(
					'ID_USER'			=> $post['idUser'][$key],
					'ID_BUKU'			=> $post['idBuku'][$key],
					'DURASI_PEMINJAMAN'	=> $post['durasi'][$key]
				));
			}
		}
		// var_dump($data);
		$status = $this->peminjaman->insertAllPeminjaman($data);
		if ($status){
			$this->cart->destroy();
			redirect('/peminjaman/success');
		} else {
			echo "Gagal";
		}
	}
}
