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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('artists','ArtistController@index')->name('artists')->middleware('can:admin-role');
Route::get('editArtist/{id}', 'ArtistController@show')->name('editArtists')->middleware('can:admin-role');
Route::post('updateArtist{artist}', 'ArtistController@update')->name('updateArtist')->middleware('can:admin-role');
Route::post('storeArtist', 'ArtistController@store')->name('storeArtist')->middleware('can:admin-role');
Route::get('createArtist', 'ArtistController@create')->name('createArtist')->middleware('can:admin-role');

Route::get('albums','AlbumController@index')->name('albums')->middleware('can:admin-role');
Route::get('createAlbum', 'AlbumController@create')->name('createAlbum')->middleware('can:admin-role');
Route::post('storeAlbum', 'AlbumController@store')->name('storeAlbum')->middleware('can:admin-role');
Route::get('showAlbum/{id}', 'AlbumController@show')->name('showAlbum')->middleware('can:admin-role');

Route::post('storeSong{album}', 'SongController@store')->name('storeSong')->middleware('can:admin-role');
Route::get('download/{id}', 'SongController@download')->name('download')->middleware('can:customer-role');

Route::get('albumShop', 'AlbumController@shop')->name('albumShop')->middleware('can:customer-role');
Route::get('showShopAlbum/{id}', 'AlbumController@showShopAlbum')->name('showShopAlbum')->middleware('can:customer-role');

Route::get('buyAlbum/{id}', 'AlbumController@buy')->name('buyAlbum')->middleware('can:customer-role');
Route::get('collection', 'SongController@showCollection')->name('collection')->middleware('can:customer-role');



