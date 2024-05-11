<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as'=>'homepage']);
$routes->get('/services', 'Home::services', ['as'=>'services']);
$routes->get('/gallery', 'Home::gallery', ['as'=>'gallery']);
$routes->get('/gallery/(:any)', 'Home::event/$1', ['as'=>'event']);

$routes->match(['get','post'], 'login', 'UserController::login', ['filter'=>'noauth', 'as'=>"adminlogin"]);

$routes->group('admin', ['filter'=>'auth'], function ($routes)
{
    $routes->get('logout', 'UserController::logout', ['as'=>"adminlogout"]);
    $routes->get('dashboard', 'Backend\Dashboard::index', ['as'=>"admindashboard"]);
    
    $routes->group('events', function ($routes)
    {
        $routes->get('view', 'Backend\Events::view_event', ['as'=>'viewevents', 'filter'=>'has:view-events'] );
        $routes->match(['get','post'], 'add', 'Backend\Events::add_event', ['as'=>'addevent', 'filter'=>'has:add-event'] );
        $routes->match(['get','post'], 'update/(\d{1,5})', 'Backend\Events::update/$1', ['as'=>'updateevent', 'filter'=>'has:update-event'] );
        $routes->get('delete/(\d{1,5})', 'Backend\Events::delete_event/$1', ['as'=>'deleteevent', 'filter'=>'has:remove-event'] );
    });
    
    $routes->group('event/category', function ($routes)
    {
        $routes->get('view', 'Backend\Events::view_categories', ['as'=>'viewcategories', 'filter'=>'has:view-categories'] );
        $routes->match(['get','post'], 'add', 'Backend\Events::add_category', ['as'=>'addcategory', 'filter'=>'has:add-category'] );
        $routes->match(['get','post'], 'update/(\d{1,5})', 'Backend\Events::update_category/$1', ['as'=>'updatecategory', 'filter'=>'has:update-category'] );
        $routes->get('delete/(\d{1,5})', 'Backend\Events::delete_category/$1', ['as'=>'deletecategory', 'filter'=>'has:remove-category'] );
    });

});
