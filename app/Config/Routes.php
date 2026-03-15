<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('Twitter/Home','PiwladasController::twitter_view');
$routes->get('Twitter/news','PiwladasController::twitter_view');
$routes->get('Twitter/login','UsersController::login_view');
$routes->post('Twitter/login','UsersController::login_post');
$routes->get('Twitter/register','UsersController::register_view');
$routes->post('Twitter/register','UsersController::register_post');
$routes->get('Twitter/Admin/Dashboard','UsersController::Dash_view');

$routes->get('Twitter/Admin/logout','UsersController::logout');
$routes->post('Twitter/Admin/logout','UsersController::logout');


$routes->get('Twitter/Admin/Piwladas_list','PiwladasController::Piw_list');
$routes->get('Twitter/Admin/Piwladas_list/admin','PiwladasController::Piw_list_admin',['filter' => 'admin']);
$routes->get('Twitter/Admin/Piwladas/crear','PiwladasController::Piw_create');
$routes->post('Twitter/Admin/Piwladas/crear','PiwladasController::Piw_create_post');
$routes->get('Twitter/Admin/Piwladas/read/(:segment)','PiwladasController::Piw_read/$1');
$routes->get('Twitter/Admin/Piwladas/borrar/(:Segment)','PiwladasController::Piw_delete_post/$1');
$routes->get('Twitter/Admin/Piwladas/edit/(:segment)','PiwladasController::Piw_edit/$1');
$routes->post('Twitter/Admin/Piwladas/edit/(:segment)','PiwladasController::Piw_update/$1');
$routes->get('Twitter/Piw/Search','PiwladasController::search');

$routes ->post('Twitter/Admin/Piwladas/com','CommentController::crear_comment');
$routes->get('Twitter/Admin/Piwladas/com/list', 'CommentController::list_comments');
$routes->get('Twitter/Admin/Piwladas/com/list/admin', 'CommentController::list_comments_admin',['filter' => 'admin']);

$routes->get('Twitter/Admin/Piwladas/com/edit/(:segment)', 'CommentController::edit/$1');
$routes->post('Twitter/Admin/Piwladas/com/update/(:segment)', 'CommentController::update/$1');
$routes->get('Twitter/Admin/Piwladas/com/delete/(:segment)', 'CommentController::delete/$1');
