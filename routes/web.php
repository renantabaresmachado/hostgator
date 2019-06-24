<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('breeds')->group(function(){
    Route::get('/' , 'BreedController@find')->name('find_by_name');
    Route::get('/id/{id}' , 'BreedController@show')->name('breed_show');
});
