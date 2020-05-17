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

Auth::routes();

Route::get('/', 'ArtikelController@dashboard');
Route::get('/artikel/{id}', 'ArtikelController@artikel');
Route::get('/kategori/{id}', 'ArtikelController@kategori');
Route::get('/tag/{id}', 'ArtikelController@tag');
Route::get('/about', 'ArtikelController@about');
Route::get('/cari', 'ArtikelController@cari');

//comment
Route::post('/artikel/comment', 'ArtikelController@commentpost');

//Amdin
	//Profil
	Route::get('/admin/profil', 'Admin\AdminController@profil');
	Route::post('/admin/editprofil', 'Admin\AdminController@editprofil');
	Route::post('/admin/editfoto', 'Admin\AdminController@editfoto');

	//artikel
	Route::get('/admin/tambah', 'Admin\AdminController@tambahartikel');
	Route::get('/admin/kelola', 'Admin\AdminController@kelolaartikel');
	Route::post('/admin/artikelpost', 'Admin\ArtikelController@artikelpost');
	Route::post('/admin/edittitle', 'Admin\ArtikelController@edittitle');
	Route::post('/admin/editgambar', 'Admin\ArtikelController@editgambar');
	Route::post('/admin/artikel/urlimage', 'Admin\ArtikelController@urlimage');
	Route::get('/admin/artikeledit/{id}', 'Admin\ArtikelController@artikeledit');
	Route::post('/admin/editpost', 'Admin\ArtikelController@editpost');
	Route::get('/admin/hapuspost/{id}', 'Admin\ArtikelController@deleteproc');
	Route::get('/admin/artikeltrash', 'Admin\ArtikelController@trash');
	Route::get('/admin/artikelrestore/{id}', 'Admin\ArtikelController@restored');
	Route::get('/admin/restoreall', 'Admin\ArtikelController@restoredall');
	Route::get('/admin/artikeldelete/{id}', 'Admin\ArtikelController@hapuspermanen');
	Route::get('/admin/deleteall', 'Admin\ArtikelController@hapusall');

	//list
	Route::get('/admin/kategori', 'Admin\KategoriController@index');
	Route::post('/admin/kategori/tambah', 'Admin\KategoriController@tambahproc');
	Route::post('/admin/kategori/editstore', 'Admin\KategoriController@editproc');
	Route::get('/admin/kategori/deletestore/{id}', 'Admin\KategoriController@deleteproc');
	Route::get('/admin/profil', 'Admin\AdminController@profil');

	//tag
	Route::get('/admin/tag', 'Admin\TagController@tampil');
	Route::post('/admin/tag/tambah', 'Admin\TagController@tambah');
	Route::post('/admin/tag/editstore', 'Admin\TagController@editproc');
	Route::post('/admin/artikeltag', 'Admin\TagController@tambahtag');
	Route::get('/admin/tagdelete/{id}', 'Admin\TagController@hapustag');
