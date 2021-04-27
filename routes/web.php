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
use App\ImageModel;
Route::get('/', function () {
    return view('images_view');

})->middleware('auth');
Route::get('/view', function () {
    return view('images_view');
})->middleware('auth');
Route::get('/image/{filename}', 'ImageController@image')->middleware('auth');
Route::get('/login', array( 'login', function () {
    return view('login');
}));
Route::post('/login','userController@show');
Route::get('/sing_up', function () {
    return view('sing_up');
});
Route::post('/sign_up','userController@store');
Route::get('create','ImageController@create')->middleware('auth');
Route::post('create','ImageController@store');
Route::get('edit','ImageController@edit')->middleware('auth');
Route::get('/delete/{filename}','ImageController@destroy' );
Route::post('update/{filename}','ImageController@update');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
