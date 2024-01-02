<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['carrito'] = 'admin/ventas/mostrar_carrito';
$route['cerrar'] = 'login/cerrar_session';
$route['productos'] = 'admin/ventas';
$route[''] = '';
