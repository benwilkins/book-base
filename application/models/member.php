<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/**
	 * @return bool
	 * @todo WRITE THIS FUNCTION
	 */
	public function is_logged_in() {
		return TRUE;
	}
}

/* End of file member.php */
/* Location: ./application/models/member.php */