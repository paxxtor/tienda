<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
		$page_data['title'] = 'Usuarios';
		//Cargamos la vista.
		$page_data['users'] = $this->db->get('usuario')->result_array();
		$page_data['page_name'] = 'ingreso';
		$this->load->view('index', $page_data);
}
}

