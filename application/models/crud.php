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
    public function getencabezado(){

        return $this->db->query('SELECT encabezado.id_encabezado,encabezado.id_persona,encabezado.fecha,encabezado.direccionenvio,encabezado.direccionfacturacion,encabezado.total,clientes.nombre,clientes.apellido, clientes.telefono,clientes.nit, clientes.correo FROM `encabezado` INNER JOIN clientes on clientes.id_cliente = encabezado.id_persona;')->result_array();
    }
    public function encabezadoespecifio($id_encabezado){
        return $this->db->query(sprintf('SELECT encabezado.id_encabezado,encabezado.id_persona,encabezado.fecha,encabezado.direccionfacturacion,encabezado.direccionenvio,encabezado.total,clientes.nombre,clientes.apellido, clientes.telefono,clientes.nit, clientes.correo FROM `encabezado` INNER JOIN clientes on clientes.id_cliente = encabezado.id_persona WHERE encabezado.id_encabezado = %d;', $id_encabezado))->result_array();
    }
    public function detallecompra($id_encabezado){
        return $this->db->query(sprintf('SELECT *,detalleventa.cantidad FROM `detalleventa` INNER JOIN productos on productos.id_producto = detalleventa.id_producto WHERE detalleventa.id_encabezado = %d;', $id_encabezado))->result_array();
    }
    public function obtener_productos($inicio, $registros) {
        $this->db->limit($registros, $inicio);
        return $query = $this->db->get_where('productos',array('estado'=>1))->result_array();
    }


    function getTables($table = '', $param1 = '', $param2 = '', $param3 = '')
    {
        $this->db->where('estado',1);
        $datos=$this->db->get('productos')->result_array();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                // $sub_array[] = $row["id_producto"];
                $sub_array[] = $row["nombre"];
                // $sub_array[] = $row["cantidad"];
                // $sub_array[] = $row["codigo"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["id_producto"].');"  id="'.$row["id_producto"].'" class="btn btn-outline-primary btn-icon"><div><i class="bi bi-pen"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_producto"].');"  id="'.$row["id_producto"].'" class="btn btn-outline-danger btn-icon"><div><i class="bi bi-trash"></i></div></button>';
                $data[]=$sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
    }

    function MakeTable($table,$param1, $param2, $param3)
	{
        // $this->MakeQuery($table,$param1, $param2, $param3);
        $this->db->from("productos");

        // if($_POST["length"] != -1)
        // {
        //     $this->db->limit($_POST['length'], $_POST['start']);
        // }
        $query = $this->db->get();
        return $query->result();
    }

    function MakeQuery($table,$param1, $param2, $param3)
    {
        $this->db->select("*");

        if($table == 'productos')
        {
            $this->db->from("productos");
        }

        // if($_POST["search"]["value"] != "")
        // {
        //     if($table == 'productos')
        //     {
        //         $search = explode(' ',$_POST["search"]["value"]);
        //         $this->db->like("productos", $_POST["search"]["value"],'both');

        //         for($i=0;$i < count($search); $i++)
        //         {
        //             if($i == 0)
        //                 $this->db->or_like("nombre",$search[$i],'both');
        //             else
        //                 $this->db->like("nombre",$search[$i],'both');
        //         }
        //     }

        // }
    }



    function getArrays($table, $fetch_data,$param1, $param2, $param3)
    {
        if($table == 'productos')
        {
           return $this->get_samples($table, $fetch_data,$param1, $param2, $param3);
        }

    }
    function GetAllData($table,$param1, $param2, $param3)
    {
        if($table == 'productos')
        {
            $this->db->select("*");
            $this->db->from("productos");
            return $this->db->count_all_results();
        }
    }
    function GetFilteredData($table,$param1, $param2, $param3)
    {
        $this->MakeQuery($table,$param1, $param2, $param3);
        $query = $this->db->get();
        return $query->num_rows();
    }


}


