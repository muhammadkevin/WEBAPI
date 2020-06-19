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
Route::get('/tanggal/{param}', 'Api\ArtikelController@gettanggal');

//comment
Route::post('/comment/post', 'Api\CommentController@commentpost');

//search
Route::get('/search', 'Api\SearchController@search');

//user
Route::get('/users', 'Api\UsersController@users');
Route::post('/auth/registers', 'Api\UsersController@registers');
Route::post('/auth/login', 'Api\UsersController@login');
