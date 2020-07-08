<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//produtos
$route['produto/(:num)'] = 'home/produto/$1';


//admin
$route['admin'] = 'admin';
$route['admin/novo'] = 'admin/AdicionarProduto';
$route['admin/slides'] = 'admin/slides';
$route['admin/editar/(:num)'] = 'admin/editarProduto/$1';
$route['admin/comentarios'] = 'admin/comentarios';
// Crud
$route['crud/adicionar'] = 'admin/appendProduct';
$route['crud/apagar/(:num)'] = 'admin/deleteProduct/$1';
$route['crud/editar'] = 'admin/editProduct';
$route['crud/addslide'] = 'admin/addSlide';
$route['crud/deleteSlide/(:num)'] = 'admin/deleteSlide/$1';
$route['crud/addComentario'] = 'admin/addComentario';
$route['crud/deleteComentario/(:num)'] = 'admin/deleteComentario/$1';
