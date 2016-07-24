<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
App::bind('Acme\Repos\PostsRepoInterface', 'Acme\Repos\PostsRepo');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {


    
    /*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
|Passes the blog 
|
*/
    Route::group(['middleware' => 'blog'], function () {

        Route::get('/blog', 'SiteController@blogListing');
        Route::get('/blog/{blog}', 'SiteController@blogShow');
        
    });
/*
|--------------------------------------------------------------------------
|Public Routes
|--------------------------------------------------------------------------
|
|
*/


    Route::get('/', 'SiteController@frontpage');
    Route::get('/about', 'SiteController@about');
    Route::get('/contact', 'SiteController@contact');
    Route::post('/contact', 'SiteController@sendMail');
    Route::get('/smallgroups', 'SiteController@smallGroups');
    Route::get('time', 'BlogController@time');
    
    /*
|--------------------------------------------------------------------------
| CMS Routes
|--------------------------------------------------------------------------
|
|
*/
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::resource('/home/smallgroups', 'SmallgroupsController');
    Route::delete('/home/posts', 'BlogController@destroy');
    Route::any('upload', 'BlogController@addPhoto');
    Route::get('posts', ['as' => 'posts', 'uses' => 'BlogController@index']);
    Route::resource('/home/posts', 'BlogController');
    Route::get('/home/posts/{posts}/photos', 'BlogController@photos');
    Route::post('/home/posts/{posts}/photos', 'BlogController@addPhoto');
    Route::delete('/home/posts/photos/{id}', 'BlogController@destroyPhoto');

    Route::resource('/home/users', 'UserController');
    Route::post('home/users/{id}/photos', 'UserController@addPhoto');
    Route::delete('home/users/photo/{id}', 'UserController@deletePhoto');
    
   

});
