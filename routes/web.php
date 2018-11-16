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
// Route::get('/login', function () {
//     return view('login.login');
// });
// Route::get('/daftar', function () {
//     return view('login.daftar');
// });
/*Route::get('/home', function () {
    return view('front.viewpost');
});*/

Route::resource('/post','PostController');
Auth::routes();
Route::resource('/post/komentar','KomentarController');
// Route::get('post/komentar/post/{id}', ['as' => 'komentar_post.komentar', 'uses' => 'KomentarController@komentar']);
Route::resource('/home', 'PostController');

