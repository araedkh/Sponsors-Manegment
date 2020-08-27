<?php

use Illuminate\Support\Facades\Route;

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


// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
 
// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');


// Applacation Route 

Route::get ( '/', function () {
    return view ( 'mainpage' );
});
Route::post ( '/login', 'MainController@login' );
Route::post ( '/register', 'MainController@register' );
Route::get ( '/logout', 'MainController@logout' );


// Add Sponsor Route

 Route::get('mainpage' , 'MainController@homapage')->name('homapage');

 Route::get('newPersonalSponsor', 'MainController@newPersonalSponsor')->name('newPersonalSponsor');

 Route::get('newCorporationSponsor', 'MainController@newCorporationSponsor')
              ->name('newCorporationSponsor');


// Search Sponsor Route

  Route::get('my-search','MainController@Search')->name('Search');

  // show all sponsor Route

  Route::get('showsponsor','MainController@list')->name('list');

  // update sponsor Route  

  Route::get('editSponsor','MainController@update')->name('update');

  // Delete Sponsor Route 

  Route::get('showsponsor','MainController@destroy')->name('destroy');



