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

Route::get('/', function ($name) {
    return view('welcome');
});
Route::prefix('breeds')->group(function(){
    Route::get('/' , 'BreedController@index')->name('breed_index');
    Route::get('/id/{id}' , 'BreedController@show')->name('breed_show');
    Route::get('/name/{name}' , 'BreedController@findByName')->name('find_by_name');
});
