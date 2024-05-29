<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\News; // Add this line
use App\Controllers\Cars;
use App\Controllers\Pages;
use App\Controllers\User;
use App\Controllers\Cart;


/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// Include the Pages controller
$routes->get('news', [News::class, 'index']);           // Add this line
$routes->get('news/new', [News::class, 'new']); // Add this line
$routes->post('news', [News::class, 'create']); // Add this line
$routes->get('cars', [Cars::class, 'index']);           // Add this line
$routes->get('cars/new', [Cars::class, 'new']); // Add this line
$routes->post('cars', [Cars::class, 'create']); // Add this line
$routes->get('user/register', [User::class,'register']);
$routes->post('user', [User::class, 'doRegister']);
$routes->get('/login', [User::class,'login']);
$routes->get('user/select', 'User::userSelect');
$routes->get('/car/makes', 'Cars::getMakes');
$routes->get('/car/models/(:any)', 'Cars::getModels/$1');
$routes->get('/car/years/(:any)/(:any)', 'Cars::getYears/$1/$2');
$routes->get('/car/accessories/(:any)', 'Cars::getAccessories/$1');


$routes->get('cart/view', 'Cart::view'); // Routes for the cart



$routes->get('news/(:segment)', [News::class, 'show']); // Add this line
$routes->get('cars/(:segment)', [Cars::class, 'show']); // Add this line




// Define routes for the Pages controller
$routes->get('pages', [Pages::class, 'index']); // Route to the index method in the Pages controller
$routes->get('(:segment)', [Pages::class, 'view']); // Route to the view method in the Pages controller


