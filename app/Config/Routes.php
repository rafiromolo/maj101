<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/api/billing', 'ApiController::getTable1');
$routes->get('/api/material', 'ApiController::getTable2');