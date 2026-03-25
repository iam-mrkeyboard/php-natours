<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/**
 * --------------------------------------------------------------------
 * API Routes
 * --------------------------------------------------------------------
 */

// User Authentication Routes
$routes->group('api/v1/users', function ($routes) {
    // Route for user registration
    $routes->post('signup', 'AuthController::signup');
    // Route for user login
    $routes->post('login', 'AuthController::login');
});
