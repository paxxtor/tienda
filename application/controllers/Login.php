<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
		if ($this->session->userdata('nivel') > 0) {
			redirect(base_url().'productos', 'refresh');	
		}
		$page['title'] = 'Login';
		$page['page_name'] = 'login';
		$this->load->view('index', $page);
	}

	function salir()
	{
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

	function verificar()
	{
		$correo = $this->input->post('correo');
		$clave = sha1($this->input->post('clave'));
		if($correo != '' && $clave != ''){
			$this->db->where('correo', $correo);
			$this->db->where('clave', $clave);
			$query = $this->db->get('clientes')->result_array();
			if(count($query) == 1){
				if($query[0]['estado']==1)
				{
					$this->session->set_userdata('arraycliente', $query);
					$this->session->set_userdata('id_cliente', $query[0]['id_cliente']);
					$this->session->set_userdata('nombre', $query[0]['nombre']);
					$this->session->set_userdata('apellido', $query[0]['apellido']);
					$this->session->set_userdata('direccion', $query[0]['direccion']);
					$this->session->set_userdata('telefono', $query[0]['telefono']);
					$this->session->set_userdata('correo', $correo);
					$this->session->set_userdata('clave', $clave);
					$this->session->set_userdata('nivel', 1);
					echo '101';
				}
				else{
					if($query[0]['estado']==3) $this->enviarcodigo($correo);
					else echo '201';
				}
			}
			else{ echo '202';}
		}
		else{ 
			echo '203'; 
		}
	}

    function vistaadmin(){
		$page['title'] = 'administrador';
		$page['page_name'] = 'administrador';
		$this->load->view('index',$page);
	}

	public function adminverificar(){
		$usuario = $this->input->post('usuario');
		$clave = sha1($this->input->post('clave'));
		if($usuario != '' && $clave != ''){
			$this->db->where('usuario', $usuario);
			$this->db->where('clave', $clave);
			$query = $this->db->get('usuario')->result_array();
			if(count($query) == 1){
				if($query[0]['estado']==1)
				{	
					$this->session->set_userdata('arrayadmin', $query);
					$this->session->set_userdata('nombre', $query[0]['nombre']);
					$this->session->set_userdata('usuario', $usuario);
					$this->session->set_userdata('clave', $clave);
					$this->session->set_userdata('nivel', 2);
					echo '101';
				}
				else{
					echo '201';
				}
			}
			else{ echo '202';}
		}
		else{ 
			echo '203'; 
		}
	}


	function registrar($param1 = '')
	{
		
		switch ($param1) {
			case '':
				if ($this->session->userdata('nivel') > 0) {
					redirect(base_url(), 'refresh');
				}
				$data['title'] = 'Registro';
				$data['page_name'] = 'registrar';
				$this->load->view('index',$data);
				break;
			case 'guardar':
				$vrnombre = $this->input->post('nombre');
				$vrapellido = $this->input->post('apellido');
				$vrtelefono = $this->input->post('telefono');
				$vrnit = $this->input->post('nit');
				$vrcorreo = $this->input->post('correo');
				$vrclave = $this->input->post('clave');
				$vrdireccion = $this->input->post('direccion');
				if($vrnombre != '' && $vrapellido != '' && $vrtelefono != '' && $vrnit != '' && $vrcorreo != '' && $vrclave != '' && $vrdireccion != '')
				{
				$correo = $this->db->get_where('clientes', array('correo' => $this->input->post('correo')))->num_rows();
				if ($correo == 0) {
					$data['nombre'] = $vrnombre;
					$data['apellido'] = $vrapellido;
					$data['telefono'] = $vrtelefono;
					$data['nit'] = $vrnit;
					$data['correo'] = $vrcorreo;
					$data['clave'] = sha1($vrclave);
					$data['direccion'] = $vrdireccion;
					$data['estado'] = 3;
					$this->db->insert('clientes', $data);
					$this->enviarcodigo($data['correo']);}
				    else{
						$this->session->set_flashdata("Error", "1");
						redirect(base_url() . 'login/registrar', 'refresh');
					}
				}else{echo 'vacios';}

				break;
			}
	}

	function generate_string($input, $strength = 8)
	{
		$input_length = strlen($input);
		$random_string = '';
		for ($i = 0; $i < $strength; $i++) {
			$random_character = $input[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}
		return strtoupper($random_string);
	}
	function submitWa($phone = '43816544', $body = 'activacion')
	{
		$chat = urlencode($body);
		$key = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VySWQiOiIxIiwiZGV2aWNlIjoiMSIsIm1lbWJlcnNoaXAiOiIwIiwidGF4IjoiMC4xIn0.NWQ0MWU2YjE5ODRiZmFmMGMxMWM0ODg0YTRhNTc1ZTg0NjQ0Y2Q3OGY5NDllYjQyMDVmZDQ1MTljODY1NWVlYw";
		$token = "HYMYSCAX47NAU88HOVGRYSHG2X15";
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://chats.mayansource.com/sendMessage',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => 'api_key=' . $key . '&messageType=1&token=' . $token . '&phone=502' . str_replace('+', '', $phone) . '&chat=' . $chat,
		));
		$response = curl_exec($curl);
		curl_close($curl);
	}
	function enviarcodigo($correo = '')
	{
		if ($correo == '') {
			if ($this->session->tempdata('verificarcorreo') != '') {
				$correo = $this->session->tempdata('verificarcorreo');
				$this->session->set_flashdata('alerta', '1');
				$this->enviarcodigo($correo);
			} else {
				$this->session->set_flashdata('alerta', '3');
				redirect(base_url(), 'refresh');
			}
		} else {
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$codigo = $this->generate_string($permitted_chars, 8);
			$data['activacion'] = $codigo;
			$this->db->where('correo', $correo);
			$this->db->update('clientes', $data);
			$usuario = $this->db->get_where('clientes', array('correo' => $correo))->row_array();
			$body = 'Hola ' . $usuario['nombre'] . ', este es tu código de activación para tu cuenta: ' . $usuario['activacion'];
			$this->submitWa($usuario['telefono'], $body);
			$this->session->set_tempdata('verificarcodigo', $codigo, 125);
			$this->session->set_tempdata('verificarcorreo', $correo, 125);
			echo '102';
		}
	}
	function validarcuenta($param1 = '')
	{
		if ($this->session->tempdata('verificarcorreo') != '') {
			switch ($param1) {
				case '':
					$data['title'] = "validar cuenta";
					$data["page_name"] = "confirmarcodigo";
					$this->load->view('index',$data);
					break;
				case 'verificar':
					if ($this->input->post('codigo') == $this->session->tempdata('verificarcodigo')) {
						$correo = $this->session->tempdata('verificarcorreo');
						$data['estado'] = 1;
						$this->db->where('correo', $correo);
						$this->db->update('clientes', $data);
						$this->session->set_flashdata("verificacion", "1");
						redirect(base_url() . 'login', 'refresh');
					} else {
						$this->session->set_flashdata("verificacion", "2");
						redirect(base_url() . 'login/validarcuenta', 'refresh');
					}
					break;
			}
		} 
		else {
			$this->session->set_flashdata('alerta','3');
			redirect(base_url(), 'refresh');
		} 	
	}
	
	public function cerrar_session() {
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}
}

