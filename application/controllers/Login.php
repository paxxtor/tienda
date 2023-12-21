<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->userdata('id_usuario') > 0){
			redirect(base_url().'admin/tablero/', 'refresh');
		}
		$this->load->view('login');
	}

	function salir(){
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

	function auth()
	{		
		$username = $this->input->post('usuario');
		$password = sha1($this->input->post('password'));
		
		$this->db->where('estado', 1);		
		$this->db->where('usuario', $username);
		$this->db->where('clave', $password);
		$query = $this->db->get('usuario');
		if($query->num_rows() > 0)
		{
			$row = $query->row();

			//Setear.
			$this->session->set_userdata('id_usuario', $row->id_usuario);
			$this->session->set_userdata('correo', $row->correo);
			$this->session->set_userdata('nombre', $row->nombre);
			$this->session->set_userdata('apellido', $row->apellido);

			//Recuperar.
			/*$this->session->userdata('id_usuario').'<br>';
			$this->session->userdata('correo').'<br>';
			$this->session->userdata('nombre').'<br>';
			$this->session->userdata('apellido').'<br>';*/
			redirect(base_url().'admin/tablero/', 'refresh');
		}else{
			redirect(base_url(), 'refresh');
		}
		//Opcion 1.
		/*$this->db->limit(1);
		$this->order_by('id_usario', 'DESC');
		$this->db->where('usuario', $username);
		$this->db->where('clave', $password);
		$this->db->get('usuario')->result_array();

		//Opcion 2.
		$this->db->limit(1);
		$this->order_by('id_usario', 'ASC');
		$this->db->get_where('usuario', array('usuario' => $username, 'clave' => $password))->result_array();

		//Opcion 3.
		$this->db->query('SELECT * FROM usuario WHERE usuario = "$username" AND clave = "$password" LIMIT 4 ORDER BY id_usuario ASC')->result_array();
		*/
	}
}
