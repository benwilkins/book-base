<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('member');
	}

	public function index()	{
		if( $this->member->is_logged_in() ){
			redirect('home');
		} else {
			$this->load->view('login/form');
		}
	}

	public function submit() {
		
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */