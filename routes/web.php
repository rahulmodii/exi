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

Route::get('/', 'LoginController@loginview')->name('login');
Route::post('/','LoginController@handellogin');
Route::get('/logout','LoginController@logout');
Route::get('/createsuperadmin','LoginController@createuser');
Route::group(['prefix' => 'superadmin','namespace'=>'Superadmin','middleware'=>['auth','superadmin']], function () {
    Route::get('/user','UserController@create');
    Route::post('/user','UserController@store');
    Route::get('/user/delete/{id}','UserController@delete');
    Route::get('/user/perdelete/{id}','UserController@permanentdelete');
    Route::put('/user/{id}','UserController@update');
    Route::get('/user/{id}/edit','UserController@edit');
    Route::get('/user/restore/{id}','UserController@restore');
    // exibhition
    Route::get('/exibhition','ExhibitionController@create');
    Route::post('/exibhition','ExhibitionController@store');
    Route::get('/exibhition/destroy/{id}','ExhibitionController@destroy');
    Route::get('/exibhition/restore/{id}','ExhibitionController@restore');
    Route::get('/exibhition/delete/{id}','ExhibitionController@delete');
    Route::get('/exibhition/{id}/edit','ExhibitionController@edit');
    Route::put('/exibhition/{id}','ExhibitionController@update');
});

Route::group(['prefix' => 'Artist','namespace'=>'Artist','middleware'=>['auth']], function () {
    Route::get('/dashboard','ArtistController@dashboard');
    Route::get('/exibhition','ArtistController@exibhition');
    Route::get('/exibhition/add/{exiid}/{paintid}','ArtistController@addexipaint');
    Route::get('/exibhition/details/{id}','ArtistController@exidetails');
    Route::get('/exibhitionsjoined/{id}','ArtistController@exijoined');
    //paint show and create
    Route::get('/painting','PaintingController@create');
    Route::post('/painting','PaintingController@store');
    //paint edit update
    Route::get('/painting/{id}/edit','PaintingController@edit');
    Route::put('/painting/{id}','PaintingController@update');
    //soft delete restore hard delete
    Route::get('/painting/delete/{id}','PaintingController@delete');
    Route::get('/painting/restore/{id}','PaintingController@restore');
    Route::get('/painting/destroy/{id}','PaintingController@destroy');
    //exibhitions
    Route::get('/painting/exibhitions/{id}','PaintingController@joined');
    Route::get('/painting/addpainting/{id}','PaintingController@addpainting');
    Route::get('/painting/addtoexi/{paintid}/{exiid}','PaintingController@exitopaint');
});


