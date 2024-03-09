<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\News;
use App\Controllers\Blogs;
use App\Controllers\Pages;
use App\Controllers\Pagination;

/**
 * @var RouteCollection $routes
 */

$routes->get('/home', [Blogs::class, 'index']);
$routes->get('page', [Blogs::class, 'blogList']);
$routes->get('page/(:any)', [Blogs::class, 'blogList']);

$routes->get('new_blog', [Blogs::class, 'new']); 
$routes->post('/success', [Blogs::class, 'create']);
$routes->get('blogs/(:segment)', [Blogs::class, 'show']); 

