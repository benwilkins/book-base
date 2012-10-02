<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Model {

	const BOOKS_PER_PAGE = 25;
	const DEFAULT_SORT_FIELD = 'reading_level';

	private $db_config = array();
	private $book_list = array();

	function __construct() {
		parent::__construct();
	}

	/**
	 * @param object
	 * @return array
	 */
	public function get_full_book_list() {
		$this->set_db_config();

		$query = $this->db
					// ->limit($this->db_config['limit'])
					// ->offset($this->db_config['offset'])
					->order_by($this->db_config['order_by'])
					->get('books');

		foreach( $query->result() as $row ){
			$this->book_list[] = $row;
		}

		return $this->book_list;
	}

	/**
	 * @param string
	 * @param int
	 */
	public function set_db_config($property=NULL, $value=NULL) {
		if( ! isset($this->db_config['limit']) ){
			$this->db_config['limit'] = self::BOOKS_PER_PAGE;
		}
		
		if( ! isset($this->db_config['offset']) ){
			$this->db_config['offset'] = 0;
		}

		if( ! isset($this->db_config['order_by']) ){
			$this->db_config['order_by'] = self::DEFAULT_SORT_FIELD;
		}

		if( isset($property) AND isset($value) ){
			$this->db_config[$property] = $value;
		}
	}
}

/* End of file books.php */
/* Location: ./application/models/books.php */