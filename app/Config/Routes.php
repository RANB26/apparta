<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/login', 'LoginController::index', ['as' => 'login']);
$routes->post('/crearusuario', 'LoginController::crearUsuario', ['as' => 'crear_usuario']);
$routes->post('/ingresar', 'LoginController::ingresar', ['as' => 'ingresar']);
$routes->get('/salir', 'LoginController::salir', ['as' => 'salir']);

$routes->get('/miperfil', 'PageController::perfil', ['as' => 'perfil']);
$routes->get('/actualizarmiperfil/(:num)', 'PageController::actualizarPerfil/$1', ['as' => 'actualizar_perfil']);
$routes->get('/actualizarmivivienda/(:num)', 'PageController::actualizarMiVivienda/$1', ['as' => 'actualizar_mi_vivienda']);
$routes->post('/actualizarviviendausuario', 'PageController::actualizarViviendaUsuario', ['as' => 'actualizar_vivienda_usuario']);
$routes->get('/eliminarmivivienda/(:num)', 'PageController::eliminarMiVivienda/$1', ['as' => 'eliminar_mi_vivienda']);
$routes->get('/publicar', 'PageController::publicar', ['as' => 'publicar']);
$routes->post('/crearvivienda', 'PageController::crearVivienda', ['as' => 'crear_vivienda']);
$routes->get('/viviendas', 'PageController::viviendas', ['as' => 'viviendas']);
$routes->post('/favorito', 'PageController::favorito', ['as' => 'favorito']);
$routes->get('/xml', 'PageController::Xml', ['as' => 'xml']);

$routes->get('/gesusuarios', 'UserController::gesUsuarios', ['as' => 'gesusuarios']);
$routes->get('/gesusuarios/usuario/(:num)', 'UserController::gesUsuario/$1', ['as' => 'gesusuario']);
$routes->post('/actualizarusuario/(:num)', 'UserController::actualizarUsuario/$1', ['as' => 'actualizar_usuario']);
$routes->get('/eliminarusuario/(:num)', 'UserController::eliminarUsuario/$1', ['as' => 'eliminar_usuario']);

$routes->get('/gesviviendas', 'ViviendasController::gesViviendas', ['as' => 'gesviviendas']);
$routes->get('/gesviviendas/vivienda/(:num)', 'ViviendasController::gesVivienda/$1', ['as' => 'gesvivienda']);
$routes->post('/actualizarvivienda', 'ViviendasController::actualizarVivienda', ['as' => 'actualizar_vivienda']);
$routes->get('/eliminarvivienda/(:num)', 'ViviendasController::eliminarVivienda/$1', ['as' => 'eliminar_vivienda']);
$routes->get('/vivienda/(:num)', 'ViviendasController::vivienda/$1', ['as' => 'vivienda']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
