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
    // Matches: POST /api/v1/users/signup
    $routes->post('signup', 'AuthController::signup');
});
