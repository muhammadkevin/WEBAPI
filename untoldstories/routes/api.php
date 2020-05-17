<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', 'Api\ArtikelController@dashboard');
Route::get('/artikel/{id}', 'Api\ArtikelController@artikel');