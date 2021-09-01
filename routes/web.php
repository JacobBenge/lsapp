<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return '<h1>Hello World!</h1>';
});

// Dynamic parameters in URL
Route::get('users/{id}/{name}', function($id, $name){
    return 'This is user '.$name.' With an id of '.$id; // use dot for concatenation in PHP
});

Route::get('about', function(){
    return view('pages.about'); // resources/views/pages/about.blade.php Can also use pages/about
});
 */

// Return a controller, which then returns the view
Route::get('/', 'App\Http\Controllers\PagesController@index'); //MyController@methodname
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/services', 'App\Http\Controllers\PagesController@services');

// shortcut to add all routes in the PostsController
Route::resource('posts','App\Http\Controllers\PostsController');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
