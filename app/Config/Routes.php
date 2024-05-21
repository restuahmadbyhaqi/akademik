<?php

namespace Config;

// Create a new instance of the RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, to allow the app and ENVIRONMENT to override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'Dashboard::index');

// Route setup for Auth Controller
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/proses_login', 'Auth::proses_login');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/proses_register', 'Auth::proses_register');

// Other routes for different controllers
$routes->get('dashboard', 'Dashboard::index');
$routes->get('fakultas', 'Fakultas::index');
$routes->get('fakultas/create', 'Fakultas::create');
$routes->post('fakultas/store', 'Fakultas::store');
$routes->get('fakultas/edit/(:num)', 'Fakultas::edit/$1');
$routes->post('fakultas/update/(:num)', 'Fakultas::update/$1');
$routes->get('fakultas/delete/(:num)', 'Fakultas::delete/$1');
$routes->get('prodi', 'Prodi::index');
$routes->get('prodi/create', 'Prodi::create');
$routes->post('prodi/store', 'Prodi::store');
$routes->get('prodi/show/(:num)', 'Prodi::show/$1');
$routes->get('prodi/edit/(:num)', 'Prodi::edit/$1');
$routes->post('prodi/update/(:num)', 'Prodi::update/$1');
$routes->get('prodi/delete/(:num)', 'Prodi::delete/$1');
$routes->post('fakultas/update', 'Fakultas::update');
// ini ruting mahasiswa
$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->get('mahasiswa/create', 'Mahasiswa::create');
$routes->post('mahasiswa/create', 'Mahasiswa::store');
$routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
$routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->get('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Default route for 'Home' controller
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There may be times when additional routing is necessary, such as environment-based routes.
 * Require additional route files here to make that happen.
 *
 * You'll have access to the $routes object within that file without needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

// Please note, the last line comments out additional instructions to tidy up the provided code
