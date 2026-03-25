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

// Tour Routes (Resourceful)
$routes->group('api/v1/tours', function ($routes) {
    $routes->get('/', 'TourController::index');
    $routes->post('/', 'TourController::create');
    $routes->get('(:num)', 'TourController::show/$1');
    $routes->patch('(:num)', 'TourController::update/$1');
    $routes->delete('(:num)', 'TourController::delete/$1');
});

// Review Routes
$routes->group('api/v1/reviews', function ($routes) {
    $routes->get('/', 'ReviewController::index');
    $routes->post('/', 'ReviewController::create');
});
