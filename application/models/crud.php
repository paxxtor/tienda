<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');    
    }

    public function getproveedores()
    {
        return $this->db->get('proveedores')->result_array();
    }
    public function getproductostab()
    {
        return $this->db->get('productos')->result_array();
    }
    public function getproductos()
    {
        return $this->db->query('SELECT productos.id_producto,productos.nombre,productos.cantidad,productos.codigo,productos.precioventa,productos.preciocosto,productos.estado,proveedores.nombreempresa,categoria.nombre as nombrecategoria FROM `productos` inner JOIN proveedores on productos.id_proveedor = proveedores.id_proveedor inner JOIN categoria on productos.id_categoria = categoria.id_categoria;')->result_array();
    }
}


