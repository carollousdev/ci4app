<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Pages::index');
$routes->get('/komik/create', 'Komik::create');
$routes->get('/komik/(:segment)', 'Komik::details/$1');
