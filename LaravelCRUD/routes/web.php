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

// Route::get('/', function () {
//     return view('home');
// });



//--CRUD OPERATION
	//-- getting list of all doctors
Route::get('/', 'CreatesController@home');

//-- open input field to insert doctors details
Route::get('/create', function () {
	return view('create');
});

//-- insert doctors details
Route::post('/insert', 'CreatesController@insert');

//-- get data for update doctor details
Route::get('/update/{id}', 'CreatesController@update');

//-- edit doctors detail
Route::post('/edit/{id}', 'CreatesController@edit');


//-- get data for reading doctor details
Route::get('/read/{idread}', 'CreatesController@read');



//-- delete doctor details
Route::get('/delete/{id}', 'CreatesController@delete');
