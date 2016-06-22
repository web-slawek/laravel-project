<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     $gallery = \App\Gallery::get();
//     return view('welcome')->with('gallery', $gallery);
// });

// Route::get('/upload', function() {
//   return View::make('upload');
// });
// Route::get('/lista', 'UploadController@show');

// Route::post('upload/upload', 'UploadController@upload');

// Route::auth();
// Route::resource('nerds', 'NerdController');
// Route::get('/home', 'HomeController@index');

Route::get('/', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
Route::post('upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);
