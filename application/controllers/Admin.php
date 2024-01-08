<?php
require_once 'public/vendor/autoload.php';
defined('BASEPATH') or exit('No direct script access allowed');

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
                    $this->db->where('id_producto', $param2);
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
            $aprox = ceil(strlen($row['nombre'])/32);
            $tamañofilas += $aprox*2;
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
            "format"=>[$tamañofilas,45],
            "margin_left"=> 1,
            "margin_right"=>1,
            "margin_top"=>8,
            "margin_bottom"=>1,
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
        $mpdf->WriteHTML($html,2);
        $mpdf->Output($pdfFilePath, "D");  
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

}
