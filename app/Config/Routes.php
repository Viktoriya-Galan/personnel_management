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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/rating', 'Ratings::getIndex');

$routes->get('/rating/create', 'Ratings::getCreate');
$routes->post('/rating/create', 'Ratings::postCreate');

$routes->get('/rating/delete/(:num)', 'Ratings::getDelete/$1');
$routes->post('/rating/delete/(:num)', 'Ratings::postDelete/$1');
//$routes->get('/rating/calculateAverageRating/(:num)', 'Ratings::calculateAverageRating/$1');
$routes->get('/average-ratings/calculate/(:num)', 'AverageRatings::calculateAverageRating/$1');



$routes->get('/departments/index', 'Departments::getIndex');
$routes->get('/departments/create', 'Departments::getCreate');
$routes->post('/departments/create', 'Departments::postCreate');

$routes->get('/tradeObjects/index', 'TradeObjects::getIndex');
$routes->get('/tradeObjects/create', 'TradeObjects::getCreate');
$routes->post('/tradeObjects/create', 'TradeObjects::postCreate');


$routes->get('/statuses/index', 'EmploymentStatuses::getIndex');
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
