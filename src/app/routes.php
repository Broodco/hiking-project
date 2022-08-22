<?php

/** @var object $router */

/*
 * Pages routes - Direct to specific pages, not linked to a specific resource
 */
$router->get('', 'PagesController@home');

/*
 * Hikes routes
 */
$router->get('hikes', 'HikesController@index');
$router->get('hike', 'HikesController@show');
$router->get('hikes/create', 'HikesController@create');
$router->post('hikes', 'HikesController@store');
$router->get('hikes/edit', 'HikesController@edit');
$router->post('hikes/update', 'HikesController@update');
$router->post('hikes/delete', 'HikesController@destroy');

/*
 * Authentication routes
 */
$router->get('login', 'Auth\AuthenticationController@create');
$router->post('login', 'Auth\AuthenticationController@store');
$router->post('logout', 'Auth\AuthenticationController@destroy');

/*
 * Registration routes
 */
$router->get('register', 'Auth\RegistrationController@create');
$router->post('register', 'Auth\RegistrationController@store');