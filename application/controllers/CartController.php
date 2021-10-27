<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartController extends CI_Controller {

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

        // Load model
        $this->load->model('buku');

    }
    public function view()
    {
        echo "Test";
    }
    

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

    public function remove()
	{
        $id = $this->input->post('id');
		$data = array(
            'rowid'   => $id,
            'qty'     => 0
        );
        
        $view = $this->load->view('cart', '', TRUE);
        // var_dump($data);

        // Update cart
        $this->cart->update($data);

        // Return cart content
        echo $view;
	}

	public function deleteById($id)
	{
		$data = array(
            'rowid'   => $id,
            'qty'     => 0
        );

        $this->cart->update($data);
		redirect('/home');
	}

	public function reset()
	{
		$this->cart->destroy();
		redirect('/home');
	}

}
