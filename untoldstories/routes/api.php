<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//artikel
Route::get('/dashboard', 'Api\ArtikelController@dashboard');
Route::get('/artikel/{id}', 'Api\ArtikelController@artikel');

//kategoris
Route::get('/allkategori', 'Api\KategoriController@allkategori');
Route::get('/kategori/{id}', 'Api\KategoriController@getkategori');

//tag
Route::get('/alltag', 'Api\TagController@alltag');
Route::get('/tag/{id}', 'Api\TagController@tag');

//tanggal
Route::get('/tanggal/{id}', 'Api\ArtikelController@getTanggal');