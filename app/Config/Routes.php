<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('Modules\Auth\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->group('/', ['namespace' => '\Modules\Auth\Controllers'], function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('/login', 'Auth::login');
    $routes->get('/logout', 'Auth::logout');
});

$routes->group('/users', ['namespace' => '\Modules\User\Controllers', 'filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'User::index');
    $routes->post('save', 'User::save');
    $routes->get('ajax-users', 'User::ajax_users');
    $routes->get('manage', 'User::manage');
    $routes->get('manage/(:num)', 'User::manage/$1');
    $routes->post('delete', 'User::delete');
});

$routes->group('/home', ['namespace' => '\Modules\Homepages\Controllers', 'filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Homepages::homepage');
});
$routes->group('/Student', ['namespace' => '\Modules\Student\Controllers'], function ($routes) {
    $routes->get('/', 'Student::index');
    $routes->get('create', 'Student::createStd');
    $routes->post('createStd', 'Student::insetStd');
});
$routes->group('/Addmin', ['namespace' => '\Modules\Addmin\Controllers'], function ($routes) {
    $routes->get('/', 'Addmin::index');
    $routes->get('life', 'Addmin::index11');
    $routes->post('Addadmin','Addmin::Addadmin'); 
});
$routes->group('/Addsubject', ['namespace' => '\Modules\Addsubject\Controllers'], function ($routes) {
    $routes->get('/', 'Addsubject::index');
});


// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Dashborad

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
