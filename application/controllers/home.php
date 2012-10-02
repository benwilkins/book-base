<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	private $page_content;

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('member');
		$this->load->model('books');
	}

	public function index()	{
		if( $this->member->is_logged_in() ){
			$this->_set_page_number();
			$this->_set_sort_field();
			
			$books = $this->books->get_full_book_list();
			$this->page_content = $this->load->view('library', array('books' => $books), TRUE);
		} else {
			redirect('login');
		}

		$this->_display_page();
	}

	private function _display_page(){
		ob_start();

		$this->load->view('includes/header');
		echo $this->page_content;
		$this->load->view('includes/footer');

		ob_end_flush();
	}

	private function _set_sort_field() {
		if( $this->input->get('sort') ){
			$this->books->set_db_config('order_by', $this->input->get('sort'));
		}
	}

	private function _set_page_number() {
		if( $this->input->get('pg') ){
			$offset = Books::BOOKS_PER_PAGE * (intval($this->input->get('pg')) - 1);
			if( $offset < 0 ){
				$offset = 0;
			}
			$this->books->set_db_config('offset', $offset);
		}
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */