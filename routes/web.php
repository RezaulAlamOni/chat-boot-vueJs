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
//     return view('vue');
// });
Auth::routes();

Route::get('/users','VueController@AllUsers');
Route::get('/users/{id}','VueController@userChatData');
Route::post('/users/message-send','VueController@messageSend');
Route::post('/users/message-update','VueController@messageUpdate');
Route::post('/user-status/update/{id}','VueController@UpdateStatus');
Route::post('/photo-upload','VueController@UploadPhoto');
Route::post('/users/message-delete/{id}','VueController@DeleteMessage');

Route::get( '/{vue_route?}', 'VueController@index' )->where( 'vue_route', '(.*)' );


