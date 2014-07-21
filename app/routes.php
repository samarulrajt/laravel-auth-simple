<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');

});

Route::get('about', function(){

	return View::make('home.about');
});*/
Route::get('/', function()
{
	return Redirect::to('users/login');

});
Route::controller('users', 'UsersController');

Route::get('dashboard/product', array(
    'as' => 'test_home',
    'before' => 'basicAuth|hasPermissions:user.create|hasPermissions:products-management',
    'uses' => 'ProductController@getIndex'
    )
);

/*Route::get('dashboard/product', array('as' => 'manage_products', 'before' => 'hasPermissions:products-management',
'uses' => 'ProductController@getIndex'));*/

View::composer('syntara::layouts.dashboard.master', function($view)
{
    $view->nest('navPages', 'layouts.left-nav');
    //$view->nest('navPagesRight', 'right-nav');
});
