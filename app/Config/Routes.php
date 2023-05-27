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
$routes->get('/', 'Main::index');
$routes->get('login', 'Login::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
$routes->get('/profile', 'Profile::index');
$routes->get('/store', 'Store::index');
$routes->get('/register', 'register::index');
$routes->post('/comment', 'AddComments::process');
$routes->get('/transactions', 'Transaction::index');
$routes->get('/invoice', 'Invoice::pdfGenerator');
$routes->get('/confirm', 'Invoice::index');
$routes->get('/cart', 'Cart::index', ['filter' => 'auth']);
$routes->post('/add_transactions', 'Transaction::AddTransaction');
$routes->post('/update_status', 'Transaction::updateStatus');
$routes->post('/update_stock', 'Store::update_stock');

$routes->get('buy/(:any)', 'Buy::$1', ['filter' => 'auth']);
$routes->post('buy/(:any)', 'Buy::$1');
$routes->get('admin/(:any)', 'Admin::$1', ['filter' => 'admin']);
$routes->post('admin/(:any)', 'Admin::$1');
$routes->get('cart/(:any)', 'Cart::$1', ['filter' => 'auth']);
$routes->post('cart/(:any)', 'Cart::$1');
$routes->get('transaction/(:any)', 'Transaction::$1');
$routes->post('transaction/(:any)', 'Transaction::$1');
$routes->get('invoice/(:any)', 'Invoice::$1');
$routes->post('invoice/(:any)', 'Invoice::$1');
$routes->get('main/(:any)', 'Main::$1');
$routes->post('main/(:any)', 'Main::$1');


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
