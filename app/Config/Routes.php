<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// $routes->group('c_access', ['namespace' => 'App\Controllers\C_access', 'filter' =>])
$routes->get('/','C_Access::index');

$routes->post('C_Access/r_cad_usu','C_Access::mtc_cadusu',['as' => 'r_cad_usu']);
$routes->post('C_Access/r_log_usu','C_Access::mtc_logusu',['as' => 'r_log_usu']);


$routes->group('doacao', ['namespace'=>'App\Controllers\Doacao', 'filter' => 'doaauth'], static function($routes)
{
    $routes->get('r_principal', 'DoacaoController::index', ['as' => 'r_principal']);
});

