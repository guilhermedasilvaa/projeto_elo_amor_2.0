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
$routes->get('C_Access/r_logout','C_Access::mtc_logout',['as' => 'r_logout']);


$routes->group('doacao', ['namespace'=>'App\Controllers\Doacao', 'filter' => 'doaauth'], static function($routes)
{
    $routes->get('r_principal', 'DoacaoController::index', ['as' => 'r_principal']);
    $routes->add('r_alldonations', 'DoacaoController::mtc_donations', ['as' => 'r_alldonations']);

    $routes->add('r_cad_doacao', 'DoacaoController::mtc_cad_doacao', ['as' => 'r_cad_doacao']);
});

