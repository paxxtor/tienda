<?php
require_once 'public/vendor/autoload.php';
defined('BASEPATH') or exit('No direct script access allowed');

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {
        $bURL = base_url();
        //Recuperamos la sesión.
        if ($this->session->userdata('id_cliente') > 0) {
            redirect(base_url() . 'admin/tablero/', 'refresh');
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    function tablero()
    {
        if ($this->session->userdata('nivel') > 0) {
            //Envio de variables a las vistas.
            $page_data['variable'] = '';
            $page_data['title'] = 'Tablero';
            //Cargamos la vista.
            $page_data['page_name'] = 'tablero';
            $this->load->view('index', $page_data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    function usuarios($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('nivel') == 2) {
            switch ($param1) {

                case 'guardar':
                    $data['nombre'] = $this->input->post('nombre');
                    $data['apellido'] = $this->input->post('apellido');
                    $data['correo'] = $this->input->post('correo');
                    $data['clave'] = sha1($this->input->post('clave'));
                    $data['direccion'] = $this->input->post('direccion');
                    $data['usuario'] = $this->input->post('usuario');
                    $data['telefono'] = $this->input->post('telefono');
                    $this->db->insert('usuario', $data);
                    redirect(base_url('admin/usuarios'), 'refresh');
                    break;
                case 'update':
                    $data['nombre'] = $this->input->post('nombre');
                    $data['apellido'] = $this->input->post('apellido');
                    $data['usuario'] = $this->input->post('usuario');
                    if ($this->input->post('clave') != '') {
                        $data['clave'] = sha1($this->input->post('clave'));
                    }
                    $data['correo'] = $this->input->post('correo');
                    $data['telefono'] = $this->input->post('telefono');
                    $data['direccion'] = $this->input->post('direccion');
                    $this->db->where('id_usuario', $param2);
                    $this->db->update('usuario', $data);
                    redirect(base_url('admin/usuarios'), 'refresh');
                    break;
                case 'desactivar':
                    $data['estado'] = 0;
                    $this->db->where('id_usuario', $param2);
                    $this->db->update('usuario', $data);
                    redirect(base_url('admin/usuarios'), 'refresh');
                    break;
                case 'activar':
                    $data['estado'] = 1;
                    $this->db->where('id_usuario', $param2);
                    $this->db->update('usuario', $data);
                    redirect(base_url('admin/usuarios'), 'refresh');
                    break;

                case 'eliminar':
                    $data['estado'] = 2;
                    $this->db->where('id_usuario', $param2);
                    $this->db->update('usuario', $data);
                    redirect(base_url('admin/usuarios'), 'refresh');
                    break;

            }

            //Envio de variables a las vistas.
            $page_data['title'] = 'Usuarios';
            //Cargamos la vista.
            $page_data['users'] = $this->db->get('usuario')->result_array();
            $page_data['page_name'] = 'usuarios';
            $this->load->view('index', $page_data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    function producto($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('nivel') == 2) {

            switch ($param1) {
                case 'guardarcategoria':
                    $data['nombre'] = $this->input->post('nombre');
                    $data['descripcion'] = $this->input->post('descripcion');
                    $this->db->insert('categoria', $data);
                    redirect(base_url('admin/producto'), 'refresh');
                    break;
                case "guardar":
                    $data['nombre'] = $this->input->post('nombre');
                    $data['cantidad'] = $this->input->post('cantidad');
                    $data['codigo'] = $this->input->post('codigo');
                    $data['precioventa'] = $this->input->post('precioventa');
                    $data['preciocosto'] = $this->input->post('preciocosto');
                    $data['id_proveedor'] = $this->input->post('id_proveedor');
                    $data['descripcion'] = $this->input->post('descripcion');
                    $data['id_categoria'] = $this->input->post('id_categoria');
                    $this->db->insert('productos', $data);
                    $idproducto = $this->db->insert_id();
                    $data2['fotografia'] = $idproducto . "-" . str_replace(' ', '', $_FILES["fotografia"]["name"]);
                    $this->db->where('id_producto', $idproducto);
                    $this->db->update('productos', $data2);
                    move_uploaded_file($_FILES["fotografia"]["tmp_name"], "public/uploads/productos/" . $idproducto . "-" . $_FILES["fotografia"]["name"]);
                    redirect(base_url('admin/producto'), 'refresh');
                    break;
                case "actualizar":
                    $data['nombre'] = $this->input->post('nombre');
                    $data['cantidad'] = $this->input->post('cantidad');
                    $data['codigo'] = $this->input->post('codigo');
                    $data['precioventa'] = $this->input->post('precioventa');
                    $data['preciocosto'] = $this->input->post('preciocosto');
                    $data['id_proveedor'] = $this->input->post('id_proveedor');
                    $data['descripcion'] = $this->input->post('descripcion');
                    $data['id_categoria'] = $this->input->post('id_categoria');
                    if (str_replace(' ', '', $_FILES["fotografia"]["name"]) != '') {
                        $data['fotografia'] = $param2 . "-" . str_replace(' ', '', $_FILES["fotografia"]["name"]);
                    }
                    $this->db->where('id_producto', $param2);
                    $this->db->update('productos', $data);
                    move_uploaded_file($_FILES["fotografia"]["tmp_name"], "public/uploads/productos/" . $param2 . "-" . $_FILES["fotografia"]["name"]);
                    redirect(base_url('admin/producto'), 'refresh');
                    break;
                case "update":
                    $page_data['title'] = 'Editar Producto';
                    $page_data['producto'] = $this->db->get_where('productos', array('id_producto' => $param2))->result_array();
                    $page_data['empresa'] = $this->db->get_where('proveedores', array('estado' => 1))->result_array();
                    $page_data['categoria'] = $this->db->get('categoria')->result_array();
                    $page_data['page_name'] = 'editar_producto';
                    $this->load->view('index', $page_data);
                    break;
                case "activar":
                    $data['estado'] = 1;
                    $this->db->where('id_producto', $param2);
                    $this->db->update('productos', $data);
                    redirect(base_url('admin/producto'), 'refresh');
                    break;
                case "desactivar":
                    $data['estado'] = 0;
                    $this->db->where('id_producto', $param2);
                    $this->db->update('productos', $data);
                    redirect(base_url('admin/producto'), 'refresh');
                    break;
                case "eliminar":
                    $data['estado'] = 2;
                    $nombrefotografia = $this->db->get_where('productos', array('id_producto' => $param2))->row()->fotografia;
                    unlink('public/uploads/productos/' . $nombrefotografia);
                    $his->db->where('id_producto', $param2);
                    $this->db->update('productos', $data);
                    redirect(base_url('admin/producto'), 'refresh');
                    break;
            }
            if ($param1 == '') {
                $page_data['title'] = 'Productos';
                $page_data['producto'] = $this->crud->getproductos();
                $page_data['page_name'] = 'productos';
                $page_data['empresa'] = $this->db->get_where('proveedores', array('estado' => 1))->result_array();
                $page_data['categoria'] = $this->db->get('categoria')->result_array();
                $this->load->view('index', $page_data);
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    function proveedores($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('nivel') == 2) {
            switch ($param1) {
                case "guardar":
                    $data['nombre'] = $this->input->post('nombre');
                    $data['apellido'] = $this->input->post('apellido');
                    $data['nombreempresa'] = $this->input->post('nombreempresa');
                    $data['nit'] = $this->input->post('nit');
                    $data['direccion'] = $this->input->post('direccion');
                    $data['telefono'] = $this->input->post('telefono');
                    $data['celular'] = $this->input->post('celular');
                    $this->db->insert('proveedores', $data);
                    redirect(base_url('admin/proveedores'), 'refresh');
                    break;
                case "actualizar":
                    $data['nombre'] = $this->input->post('nombre');
                    $data['apellido'] = $this->input->post('apellido');
                    $data['nombreempresa'] = $this->input->post('nombreempresa');
                    $data['nit'] = $this->input->post('nit');
                    $data['direccion'] = $this->input->post('direccion');
                    $data['telefono'] = $this->input->post('telefono');
                    $data['celular'] = $this->input->post('celular');
                    $this->db->where('id_proveedor', $param2);
                    $this->db->update('proveedores', $data);
                    redirect(base_url('admin/proveedores'), 'refresh');
                    break;
                case "update":
                    $page_data['title'] = 'Editar Proveedor';
                    $page_data['proveedores'] = $this->db->get_where('proveedores', array('id_proveedor' => $param2))->result_array();
                    $page_data['page_name'] = 'editar_proveedores';
                    $this->load->view('index', $page_data);
                    break;
                case "activar":
                    $data['estado'] = 1;
                    $this->db->where('id_proveedor', $param2);
                    $this->db->update('proveedores', $data);
                    redirect(base_url('admin/proveedores'), 'refresh');
                    break;
                case "desactivar":
                    $data['estado'] = 0;
                    $this->db->where('id_proveedor', $param2);
                    $this->db->update('proveedores', $data);
                    redirect(base_url('admin/proveedores'), 'refresh');
                    break;
                case "eliminar":
                    $data['estado'] = 2;
                    $this->db->where('id_proveedor', $param2);
                    $this->db->update('proveedores', $data);
                    redirect(base_url('admin/proveedores'), 'refresh');
                    break;
            }
            if ($param1 == '') {
                $page_data['title'] = 'Proveedores';
                $page_data['proveedores'] = $this->crud->getproveedores();
                $page_data['page_name'] = 'proveedores';
                $this->load->view('index', $page_data);
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    function clientes($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('nivel') == 2) {
            switch ($param1) {
                case "guardar":
                    $data['nombre'] = $this->input->post('nombre');
                    $data['apellido'] = $this->input->post('apellido');
                    $data['telefono'] = $this->input->post('telefono');
                    $data['nit'] = $this->input->post('nit');
                    $data['correo'] = $this->input->post('correo');
                    $data['tipocliente'] = $this->input->post('tipocliente');
                    $data['direccion'] = $this->input->post('direccion');
                    $this->db->insert('clientes', $data);
                    redirect(base_url('admin/clientes'), 'refresh');
                    break;
                case "actualizar":
                    $data['nombre'] = $this->input->post('nombre');
                    $data['apellido'] = $this->input->post('apellido');
                    $data['telefono'] = $this->input->post('telefono');
                    $data['nit'] = $this->input->post('nit');
                    $data['correo'] = $this->input->post('correo');
                    if($this->input->post('clave') != ''){
                    $data['clave'] = sha1($this->input->post('clave'));}
                    $data['tipocliente'] = $this->input->post('tipocliente');
                    $data['direccion'] = $this->input->post('direccion');
                    $this->db->where('id_cliente', $param2);
                    $this->db->update('clientes', $data);
                    redirect(base_url('admin/clientes'), 'refresh');
                    break;
                case "update":
                    $page_data['title'] = 'Editar Cliente';
                    $page_data['clientes'] = $this->db->get_where('clientes', array('id_cliente' => $param2))->result_array();
                    $page_data['page_name'] = 'editar_cliente';
                    $this->load->view('index', $page_data);
                    break;
                case "activar":
                    $data['estado'] = 1;
                    $this->db->where('id_cliente', $param2);
                    $this->db->update('clientes', $data);
                    redirect(base_url('admin/clientes'), 'refresh');
                    break;
                case "desactivar":
                    $data['estado'] = 0;
                    $this->db->where('id_cliente', $param2);
                    $this->db->update('clientes', $data);
                    redirect(base_url('admin/clientes'), 'refresh');
                    break;
                case "eliminar":
                    $data['estado'] = 2;
                    $this->db->where('id_cliente', $param2);
                    $this->db->update('clientes', $data);
                    redirect(base_url('admin/clientes'), 'refresh');
                    break;
            }

            if ($param1 == '') {
                $page_data['title'] = 'Clientes';
                $page_data['clientes'] = $this->db->get('clientes')->result_array();
                $page_data['page_name'] = 'clientes';
                $this->load->view('index', $page_data);
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    function editar($id = '')
    {
        $page_data['title'] = 'Editar';
        $page_data['users'] = $this->db->get_where('usuario', array('id_usuario' => base64_decode($id)))->result_array();
        $page_data['page_name'] = 'editar';
        $this->load->view('index', $page_data);
    }
    function ventas($param1 = '', $param2 = '')
    {
        switch ($param1) {
            case 'agregarcarrito':
                $data = array(
                    'id' => $this->input->post('id_producto'),
                    'qty' => $this->input->post('cantidadcompra'),
                    'price' => $this->input->post('precioventa'),
                    'name' => $this->input->post('nombre')
                );
                $this->cart->insert($data);
                redirect('admin/ventas/mostrar_carrito');
                break;

            case 'mostrar_carrito':

                if (count($this->cart->contents()) > 0) {
                    $page_data['title'] = 'Listado de Productos';
                    $page_data['page_name'] = 'carrito';
                    $this->load->view('index', $page_data);
                } else {
                    redirect('admin/ventas');
                }
                break;

            case 'eliminarcarrito':
                $this->cart->destroy();
                redirect('admin/ventas/mostrar_carrito');
                break;
            case 'eliminar_item':
                $data = array(
                    'rowid' => $param2,
                    'qty' => 0
                );
                $this->cart->update($data);
                redirect('admin/ventas/mostrar_carrito');
                break;

            case 'actualizarcarrito':
                foreach ($this->cart->contents() as $item) {
                    $stock = $this->db->get_where('productos', array('id_producto' => $item['id']))->row()->cantidad;
                    if ($this->input->post('cantidad_' . $item['rowid']) <= $stock) {
                        $data['rowid'] = $item['rowid'];
                        $data['qty'] = $this->input->post('cantidad_' . $item['rowid']);
                        $this->cart->update($data);
                    } else {
                        $this->session->set_flashdata("Error", "1");
                    }
                }
                redirect('admin/ventas/mostrar_carrito');
                break;

            case 'comprar':
                if ($this->session->userdata('nivel') > 0) {
                        $encabezado['id_persona'] = $this->session->userdata('id_cliente');
                        $encabezado['fecha'] = date('Y-m-d H:i:s');
                        $encabezado['direccionenvio'] = $this->input->post("direccionenvio");
                        $encabezado['direccionfacturacion'] = $this->session->userdata('direccion');
                        $encabezado['notas'] = $this->input->post("notas");
                        $encabezado['total'] = $this->cart->total();
                        $this->db->insert('encabezado',$encabezado);
                        $id_encabezado = $this->db->insert_id();
                        
                        foreach ($this->cart->contents() as $item) {
                            $stock = $this->db->get_where('productos', array('id_producto' => $item['id']))->row()->cantidad;
                            $cantidad = $item['qty'];
                            $data['cantidad'] = $stock - $cantidad;
                            $this->db->where('id_producto', $item['id']);
                            $this->db->update('productos', $data);

                            $producto['id_encabezado'] = $id_encabezado;
                            $producto['id_producto'] = $item['id'];
                            $producto['cantidad'] = $item['qty'];
                            $producto['precio'] = $item['price'];
                            $producto['subtotal'] = $item['subtotal'];
                            $this->db->insert('detalleventa',$producto);
                        }
                        $this->cart->destroy();
                        echo '200';
                        // echo json_encode($producto);
                        return;
            } else {
                echo "404";
            }
        }

        if ($param1 == '') {
            $page_data['title'] = 'Ventas';
            $page_data['page_name'] = 'ventas';
            $page_data['listaclientes'] = $this->db->get('clientes')->result_array();
            $page_data['listaproductos'] = $this->db->get('productos')->result_array();
            $page_data['cantprodu'] = $this->db->get_where('productos',array('estado'=>1))->num_rows();
            $this->load->view('index', $page_data);
        }
    }

    function historial() {
        $page_data['title'] = 'Historial';
        $page_data['encabezado'] = $this->crud->getencabezado();
        $page_data['page_name'] = 'historial';
        $this->load->view('index', $page_data);
    }
    function detallecompra($param1 = '') {
        $page_data['title'] = 'Detalle de Compra';
        $page_data['encabezado'] = $this->crud->encabezadoespecifio($param1);
        $page_data['detalle'] = $this->crud->detallecompra($param1);
        $page_data['page_name'] = 'detallecompra';
        $this->load->view('index', $page_data);
    }

    function descargarpdf($param1 = '1') {
        $page_data['encabezado'] = $this->crud->encabezadoespecifio($param1);
        $page_data['detalle'] = $this->crud->detallecompra($param1);
        $tamañofilas = 82;
        foreach($page_data['detalle'] as $row){
            $aprox = ceil(strlen($row['nombre'])/22);
            $tamañofilas += $aprox*10;
        }

        $data = array(
            'color' => '99bf2d',
            'estado' => 'Recibo Generado Electronicamente',
            'imei' => '#KEI43KDK',
        );
        $html = $this->load->view('recibo.php',$page_data,TRUE);
        $pdfFilePath = "recibo-".'KEI43KDK'.'-'.date('Y-m-d-H-i-s').".pdf";
        // $this->load->library('M_pdf');
        $mpdf = new \Mpdf\Mpdf([
            "orientation"=> "L",
            "format"=>[$tamañofilas,48],
            "margin_left"=> 0,
            "margin_right"=>0,
            "margin_top"=>8,
            "margin_bottom"=>3,
            "margin_header"=>4,
            "margin_footer"=>4,

        ]);    // mode - default ''
            //  [80, 90],    // format - A4, for example, default ''
            //  0,     // font size - default 0
            //  '',    // default font family
            //  1,    // margin_left
            //  1,    // margin right
            //  8,     // margin top
            //  1,    // margin bottom
            //  4,     // margin header
            //  4,     // margin footer
            //  'L');  // L - landscape, P - portrait
        $mpdf->packTableData = true;
        $mpdf->WriteHTML($html,0);
        $mpdf->Output($pdfFilePath, "I");  
    }   

 function compra(){
	$page_data['title'] = 'Detalle de compra';
	$page_data['page_name']= 'compra';
	$this->load->view('index',$page_data);
}

 function procesocompra(){
    if(!empty($this->session->userdata('nivel')))
    echo '200';
    else echo '404';
}
function vistaprueba(){
    $data["page_name"] = "compracliente";
    $data["title"] = "Prueba";
    $this->load->view('index',$data);
}

function optabla($param1 = ''){
    switch($param1){
        
        case 'listar':
            $datos=$this->crud->getproductostab();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                // $sub_array[] = $row["id_producto"];
                $sub_array[] = $row["nombre"];
                // $sub_array[] = $row["cantidad"];
                // $sub_array[] = $row["codigo"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["id_producto"].');"  id="'.$row["id_producto"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_producto"].');"  id="'.$row["id_producto"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                $data[]=$sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;


            // $datos['productos'] = $this->crud->getproductostab();
            // $datos['page_name'] = "compracliente";
            // $datos['title'] = "prueba";
            // $data = Array();
            // foreach($datos['productos'] as $row)
            // {
            //     $sub_array = array();
            //     $sub_array[] = $row["nombre"];
            //     $sub_array[] = '<button type="button" onClick="editar('.$row["id_producto"].');"  id="'.$row["id_producto"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
            //     $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_producto"].');"  id="'.$row["id_producto"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                
            //     $data[] = $sub_array;
            // }

            // $result = array (
            //     "sEcho" => 1,
            //     "iTotalRecords" => count($data),
            //     "iTotalDisplayRecords"=>count($data),
            //     "aaData"=>$data);
            // $datos['resultados'] = $result;
            // $this->load->view("index",$datos);
            break;
    }

}

/* Función para obter las tablas*/
function getTable($table = '' ,$param1 = '' ,$param2 = '' ,$param3 = '')
{
    return $this->crud->getTables($table,$param1,$param2,$param3);  
}


function productojq($param1 = '',$param2=''){
    switch($param1)
    {
        case 'eliminar':
            $data['estado'] = 2;
            $nombrefotografia = $this->db->get_where('productos', array('id_producto' => $param2))->row()->fotografia;
            unlink('public/uploads/productos/' . $nombrefotografia);
            $this->db->where('id_producto', $param2);
            $this->db->update('productos', $data);
            echo '1';
            break;
        default:
            echo 'ocurrio un error';

    }
}

public function messageError($numcolumns,$row){
    $array = [
        'name' => 'dataError',
        'column' => chr($numcolumns + 64 ),
        'row' => $row
    ];
    echo json_encode($array);
    exit();
}

public function upload() {
    
    if($_FILES["select_excel"]["name"] != '')
{
    $md5 = md5(date('d-m-Y H:i:s'));
    $name = $md5.str_replace(' ', '', $_FILES['select_excel']['name']);
    $data['file']= $name;
    move_uploaded_file($_FILES['select_excel']['tmp_name'], 'public/uploads/import/' . $name);
    $path = 'public/uploads/import/' . $name;
    
    $allowed_extension = array('xls', 'xlsx');
    $file_array = explode(".", $_FILES['select_excel']['name']);
    $file_extension = end($file_array);
    if(in_array($file_extension, $allowed_extension))
    {
    $reader = IOFactory::createReader('Xlsx');
    $spreadsheet = $reader->load($path);
    // $object = IOFactory::load($path);
    // $worksheet = $spreadsheet->getActiveSheet();
    $numUpdate = 0;
    $productInsert = 0;
        foreach($spreadsheet->getWorksheetIterator() as $worksheet){
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for($row=8; $row <= $highestRow; $row++){
                $this->db->where('codigo',$worksheet->getCellByColumnAndRow(3, $row)->getValue());
                $Duplicate  = $this->db->get('productos')->num_rows();
                $categoriaresult = $this->db->get_where('categoria', array('nombre' => $worksheet->getCellByColumnAndRow(4, $row)->getValue()));
                $categoriaresult->num_rows() > 0 ? $id_categoria = $categoriaresult->row()->id_categoria: $this->messageError(4,$row);
                $proveedoresresult = $this->db->get_where('proveedores', array('nombreempresa' => $worksheet->getCellByColumnAndRow(9, $row)->getValue()));
                $proveedoresresult->num_rows() > 0 ? $id_proveedor = $proveedoresresult->row()->id_proveedor : $this->messageError(9,$row);
                
                $data = [
                    'nombre' =>  $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
                    'cantidad' =>   $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
                    'codigo'  =>    $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
                    'id_categoria' => $id_categoria,
                    'fotografia' =>    $worksheet->getCellByColumnAndRow(5, $row)->getValue(),
                    'descripcion' =>    $worksheet->getCellByColumnAndRow(6, $row)->getValue(),
                    'precioventa' =>    $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
                    'preciocosto' =>    $worksheet->getCellByColumnAndRow(8, $row)->getValue(),
                    'id_proveedor' =>   $id_proveedor,
                    'estado' =>    $worksheet->getCellByColumnAndRow(10, $row)->getValue(),
                ];
                $numcolumns = 1;
                foreach ($data as &$valor) {
                    if (empty($valor)) {
                        $array = [
                            'name' => 'cellEmpty',
                            'valor' => $valor,
                            'column' => chr($numcolumns + 64 ),
                            'row' => $row
                        ];
                        echo json_encode($array);
                        exit();
                    }
                    $numcolumns++;
                }

                if($Duplicate>0)
                {
                    $numUpdate += $Duplicate;
                    $this->db->where('codigo', $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                    $this->db->update('productos',$data);
                }
                else{ $productInsert += 1;
                    $this->db->insert('productos',$data);
            }
        }
    }
        
        $array = [
            'name' => 'insertWithDuplicate',
            'totalDuplicates'=> $numUpdate,
            'totalInsert' => $productInsert
        ];
        }
        else
        {
        $array = ['name' =>  'fileExtensionError'];
        }
    }
    else
    {
        $array = ['name' => 'fileNotFound'];
}
    echo $message = json_encode($array);
}

function service_export()
{
        $md5 = md5(date('d-m-Y H:i:s'));
        $path = 'public/uploads/import/services.xlsx';

        $spreadsheet = IOFactory::load($path);

        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                'style' => Border::BORDER_THIN
                )
            )
            ); 

        setlocale(LC_ALL, "es_ES");

        $spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
        $spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
        $spreadsheet->getActiveSheet()->getPageSetup()->setFitToPage(true);

        $products = $this->crud->getproductostab();
        $row = 8;
        foreach ($products as $product) {
            $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $product['nombre']);
            $spreadsheet->getActiveSheet()->setCellValue('B' . $row, $product['cantidad']);
            $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $product['codigo']);
            $spreadsheet->getActiveSheet()->setCellValue('D' . $row, $this->db->get_where('categoria',array('id_categoria' => $product['id_categoria']))->row()->nombre);
            $spreadsheet->getActiveSheet()->setCellValue('E' . $row, $product['fotografia']);
            $spreadsheet->getActiveSheet()->setCellValue('F' . $row, $product['descripcion']);
            $spreadsheet->getActiveSheet()->setCellValue('G' . $row, $product['precioventa']);
            $spreadsheet->getActiveSheet()->setCellValue('H' . $row, $product['preciocosto']);
            $spreadsheet->getActiveSheet()->setCellValue('I' . $row, $this->db->get_where('proveedores',array('id_proveedor' => $product['id_proveedor']))->row()->nombreempresa);
            $spreadsheet->getActiveSheet()->setCellValue('J' . $row, $product['estado']);
            $row++;
        }

        // Configurar el encabezado HTTP para descargar el archivo Excel
        $nombrePersonalizado = "Servicios.xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $nombrePersonalizado . '"');
        header('Content-Disposition: attachment;filename="productos.xlsx"');
        header('Cache-Control: max-age=0');

        // Guardar el archivo Excel en el flujo de salida
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
}

function makeinvoice($id_persona = '2',$id_encabezado="23"){
    $this->db->select('*');
    $this->db->from('encabezado');
    $this->db->join('clientes','clientes.id_cliente = encabezado.id_persona', 'inner');
    $this->db->where('id_persona',$id_persona);
    $this->db->where('id_encabezado',$id_encabezado);
    $headerfact = $this->db->get()->row_array();
    // echo json_encode($headerfact);
    $name = $headerfact['nombre']." ".$headerfact['apellido'];
    $address = $headerfact['direccionfacturacion'];
    // $nit = $headerfact['nit'];
    $nit = '';
    $cui = '';
    $type_id = 'NIT';
    $items = $this->db->get_where('detalleventa',array('id_encabezado'=>$id_encabezado))->result_array();
    // $items = $detailsfact;

    $this->facturasat($type_id ,$nit,$cui,$name,$address,$items);
}


function insert_invoice($type_id, $nit, $cui, $name, $address, $items) {
    $total = 0; $total_iva = 0;
    $data['day']   = date('d');
    $data['month'] = date('m');
    $data['year']  = date('Y');
    if ($type_id == "CUI") $data['cui'] = $cui;
    else $data['nit'] = $nit;
    $data['name']  = $name;
    $data['address'] = $address;
    $data['institution_id'] = 1;
    $this->db->insert('invoice', $data);
    $invoice_id = $this->db->insert_id();
    
    // $details = json_decode($items, true);
    $details = $items;

    foreach ($details as $item) {
        $number = 1; $discount = 0; $iva = 0;
        $subtotal = $item['cantidad'] * $item['precio'];
        $cost = $subtotal / 1.12;
        $iva = $cost * 0.12;
        $total += $subtotal; $total_iva += $iva;
        
        $data_det['invoice_id']  = $invoice_id;
        $data_det['number']      = $number;
        $data_det['type']        = 'S';
        $data_det['amount']      = $item['cantidad'];
        // $data_det['description'] = $item['description'];
        $data_det['description'] = "descripcion";
        $data_det['price']       = $item['precio'];
        $data_det['discount']    = $discount;
        $data_det['iva']         = $iva;
        $data_det['cost']        = $cost;
        $data_det['subtotal']    = $subtotal;
        $this->db->insert('invoice_detail', $data_det);
        $number++;
    }
    
    $data_upd['total'] = $total;
    $data_upd['iva']   = $total_iva;
    $this->db->where('invoice_id', $invoice_id);
    $this->db->update('invoice', $data_upd);
    return $invoice_id;
}


function facturasat($type_id, $nit, $cui, $name, $address, $items){
        $institution_id = 1;

        $invoice_id = $this->insert_invoice($type_id, $nit, $cui, $name, $address, $items);
        $inv = $this->db->get_where('invoice', array('invoice_id'=>$invoice_id))->row_array();
        $items = $this->db->get_where('invoice_detail', array('invoice_id'=>$invoice_id, 'status'=>1))->result_array();

        echo json_encode($inv);
        echo json_encode($items);
       
        $IDReceptor = '';
        if ($type_id == "NIT") {
            if($nit == '' || $name == ''){
                $IDReceptor = 'CF';
                $nombre = 'Consumidor Final';
                $direccion = 'Ciudad';    
            }else{
                $IDReceptor = strtoupper(str_replace(' ', '', $nit));
                $nombre     = trim($name);
                $direccion  = trim($address);
            }
        } elseif ($type_id == "CUI") {
            $IDReceptor = $cui;
            $nombre     = trim($name);
            $direccion  = trim($address);
        }
        if ($direccion == '') $direccion = "Ciudad";
        $estab  = $this->db->get_where('institution', array('institution_id' => $institution_id))->row_array();
        $nombre = str_replace('&', 'Y', $nombre);
       
        $xml= '<?xml version="1.0" encoding="utf-8"?>
        <dte:GTDocumento xmlns:cex="http://www.sat.gob.gt/face2/ComplementoExportaciones/0.1.0"
            xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
            xmlns:cfe="http://www.sat.gob.gt/face2/ComplementoFacturaEspecial/0.1.0"
            xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:cfc="http://www.sat.gob.gt/dte/fel/CompCambiaria/0.1.0"
            xmlns:cno="http://www.sat.gob.gt/face2/ComplementoReferenciaNota/0.1.0" Version="0.1"
            xmlns:dte="http://www.sat.gob.gt/dte/fel/0.2.0">
            <dte:SAT ClaseDocumento="dte">
                <dte:DTE ID="DatosCertificados">
                    <dte:DatosEmision ID="DatosEmision">
                        <dte:DatosGenerales Tipo="FACT"
                            FechaHoraEmision="'.date('Y').'-'.date('m').'-'.date('d').'T'.date('H').':'.date('i').':'.date('s').'"
                            CodigoMoneda="GTQ" />
                        <dte:Emisor NITEmisor="'.$estab['nit'].'"
                            NombreEmisor="'.$estab['personal_name'].'"
                            CodigoEstablecimiento="'.$estab['code'].'" NombreComercial="'.$estab['name'].'" AfiliacionIVA="'.$estab['afiliation'].'">
                            <dte:DireccionEmisor>
                                <dte:Direccion>'.strtoupper($estab['address']).'</dte:Direccion>
                                <dte:CodigoPostal>'.$estab['postal_code'].'</dte:CodigoPostal>
                                <dte:Municipio>'.strtoupper($estab['municipality']).'</dte:Municipio>
                                <dte:Departamento>'.strtoupper($estab['department']).'</dte:Departamento>
                                <dte:Pais>GT</dte:Pais>
                            </dte:DireccionEmisor>
                        </dte:Emisor>
                        <dte:Receptor IDReceptor="'.$IDReceptor.'"';
        if ($type_id == "CUI") $xml .= ' TipoEspecial="CUI"';
        $xml .= ' NombreReceptor="'.$nombre.'">
                            <dte:DireccionReceptor>
                                <dte:Direccion>'.$direccion.'</dte:Direccion>
                                <dte:CodigoPostal>01000</dte:CodigoPostal>
                                <dte:Municipio>Guatemala</dte:Municipio>
                                <dte:Departamento>Guatemala</dte:Departamento>
                                <dte:Pais>GT</dte:Pais>
                            </dte:DireccionReceptor>
                        </dte:Receptor>
                        <dte:Frases>
                            <dte:Frase TipoFrase="1" CodigoEscenario="1"/>
                        </dte:Frases>
                        <dte:Items>';
                            $totalImpuesto = 0;
                            $GranTotal     = 0;
                            $n             = 1;
                            foreach($items as $key)
                            {
                                $regimen = 12/100;
                                $totalp  = $key['price']*$key['amount'];
                                $totald  = ($key['price']*$key['amount'])-$key['discount'];
                                $montoGravable = number_format($totald/($regimen + 1), 6, ".", "");
                                $montoImpuesto = number_format($montoGravable*$regimen, 6, ".", "");
                                $totalImpuesto += $montoImpuesto;
                                $GranTotal += $montoGravable + $montoImpuesto;
                                $xml.='<dte:Item NumeroLinea="'.$n++.'" BienOServicio="'.$key['type'].'">
                                    <dte:Cantidad>'.rtrim($key['amount']).'</dte:Cantidad>
                                    <dte:UnidadMedida>UNI</dte:UnidadMedida>
                                    <dte:Descripcion>'.rtrim($key['description']).'</dte:Descripcion>
                                    <dte:PrecioUnitario>'.rtrim(number_format($key['price'], 6, ".", "")).'</dte:PrecioUnitario>
                                    <dte:Precio>'.rtrim(number_format($totalp, 6, ".", "")).'</dte:Precio>
                                    <dte:Descuento>'.rtrim(number_format($key['discount'], 6, ".", "")).'</dte:Descuento>
                                    <dte:Impuestos>
                                        <dte:Impuesto>
                                            <dte:NombreCorto>IVA</dte:NombreCorto>
                                            <dte:CodigoUnidadGravable>1</dte:CodigoUnidadGravable>
                                            <dte:MontoGravable>'.rtrim($montoGravable).'</dte:MontoGravable>
                                            <dte:MontoImpuesto>'.rtrim($montoImpuesto).'</dte:MontoImpuesto>
                                        </dte:Impuesto>
                                    </dte:Impuestos>
                                    <dte:Total>'.rtrim(number_format($totald, 6, ".", "")).'</dte:Total>
                                </dte:Item>';
                            }
                            $xml.='</dte:Items>
                        <dte:Totales>
                            <dte:TotalImpuestos>
                                <dte:TotalImpuesto NombreCorto="IVA" TotalMontoImpuesto="'.rtrim(number_format($totalImpuesto, 6, ".", "")).'"/>
                            </dte:TotalImpuestos>
                            <dte:GranTotal>'.rtrim(number_format($GranTotal, 6, ".", "")).'</dte:GranTotal>
                        </dte:Totales>
                    </dte:DatosEmision>
                </dte:DTE>
            </dte:SAT>
        </dte:GTDocumento>';
        log_message("error", $xml);
        $response = $this->newDocument($xml);
}

public function newDocument($document)
{
    // $fel = $this->crud_model->getInfo("fel");
    // if ($fel) {
    //     $link = "https://app.corposistemasgt.com/webservicefront/factwsfront.asmx?WSDL";
    //     $Entity      = $this->crud_model->getInfo("entity"); //es la variable del nit del emisor de la factura.
    //     $Requestor   = $this->crud_model->getInfo("requestor"); //es la variable del requestor asignado 
    // } else {
        // $link = "https://app.corposistemasgt.com/webservicefrontTEST/factwsfront.asmx?WSDL";
        // $Entity      = $this->crud_model->getInfo("entity_test"); //es la variable del nit del emisor de la factura.
        // $Requestor   = $this->crud_model->getInfo("requestor_test"); //es la variable del requestor asignado 
        $link = "https://app.corposistemasgt.com/webservicefrontTEST/factwsfront.asmx?WSDL";
        $Entity      = '50206109'; //es la variable del nit del emisor de la factura.
        $Requestor   = '4379A29A-C438-43D7-8DE5-57DB732D49C6'; //es la variable del requestor asignado 
    // }
    log_message("error", "Link: $link, Entity: $Entity, Requestor: $Requestor");
    //CERTIFICAR UNA FACTURA CON SAT
    $Data1       = "POST_DOCUMENT_SAT";
    $xml         = base64_encode($document);
    $url_ws      = $link;
    $retornar    = array();
    $UserName    = 'ADMINISTRADOR'; //es la variable del usuario para certificar el documento
    $fecha       = new DateTime();
    $fecha_d_m_y = $fecha->format('dd-m-yyyy-HH-mm-ss');                                  
    $Data3       = $fecha_d_m_y."-msbox";
    require_once('public/soap/lib/nusoap.php');
    $client      = new nusoap_client($url_ws,true);
    $err         = $client->getError();
    if ($err) {
        log_message("error", "Constructor error: $err");
        // echo '<h2>Constructor error</h2>' . $err;
        exit();
    }
    try {
        $response = $client->call('RequestTransaction', array(
            'Requestor'     => $Requestor,
            'Transaction'   => "SYSTEM_REQUEST",
            'Country'       => "GT",
            'Entity'        => $Entity,
            'User'          => $Requestor,
            'UserName'      => $UserName,
            'Data1'         => $Data1,
            'Data2'         => $xml,
            'Data3'         => $Data3
        ));
        if ($client->fault) {
            $retornar['Fallo'] = $retornar;
            log_message("error", "$response<- response");
            // echo($response."<- response");
        } else {
            $retornar['Response'] = $response;	
            $Result=$response['RequestTransactionResult']['Response']['Result'];
            if($Result=='false')
            {           
                $TimeStamp=$response['RequestTransactionResult']['Response']['TimeStamp'];
                $LastResult=$response['RequestTransactionResult']['Response']['LastResult'];
                $Code= $response['RequestTransactionResult']['Response']['Code'];
                $Description=$response['RequestTransactionResult']['Response']['Description'];
                $Hint=$response['RequestTransactionResult']['Response']['Hint'];
                $Data=$response['RequestTransactionResult']['Response']['Data'];
                log_message("error", "ERROR SAT: $Data $Description");
                // echo 'ERROR: ' .$Data."  ".$Description;
                $retornar['Data']= $Data;
            }
            else {
                $Description= $response['RequestTransactionResult']['Response']['Description'];
                $Batch=$response['RequestTransactionResult']['Response']['Identifier']['Batch'];
                $Serial=$response['RequestTransactionResult']['Response']['Identifier']['Serial'];
                $DocumentGUID=$response['RequestTransactionResult']['Response']['Identifier']['DocumentGUID'];
                $TimeStamp=$response['RequestTransactionResult']['Response']['TimeStamp'];
                $retornar = array(
                    'Batch' => $Batch,
                    'Serial' => $Serial,
                    'Guid' => $DocumentGUID,
                    'Description' => $Description,
                    'TimeStamp' => $TimeStamp,
                    'BaseXML' => $response['RequestTransactionResult']['ResponseData']['ResponseData1'],
                );
            }
        }
    } catch(Exception $e) {
        log_message("error", "Error: ".$e->getMessage());
        // echo 'Error: ' . $e->getMessage();
    }
    $numeracion   = $retornar['Batch'];
    $serial       = $retornar['Serial'];
    $autorizacion = $retornar['Guid'];
    $fechahora    = $retornar['TimeStamp'];
    $bxml    = $retornar['BaseXML'];
    $respuesta = array('response' => $bxml, 'guid' => $autorizacion, 'date' => $fechahora);
    return $respuesta;
}

}