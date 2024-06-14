<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('coinlist', 'Home::getCoinList');
$routes->post('webhook', 'Home::respond');
$routes->get('coininfo', 'Home::coinInfo');
$routes->get('querybalance', 'Home::getQueryBalance');
$routes->get('balance', 'Home::getBalance');
$routes->get('deposit', 'Home::deposit');

$routes->get('formwd', 'Home::formWD');
$routes->post('withdraw', 'Home::withdraw');