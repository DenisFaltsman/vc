<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user/{user}/view/{page}', [\App\Http\Controllers\PageViewController::class, 'viewPage']);
Route::get('/user/{user}/check/{page}', [\App\Http\Controllers\PageViewController::class, 'checkPage']);
Route::get('/user/{user}/viewlist', [\App\Http\Controllers\PageViewController::class, 'viewList']);
Route::get('/test', [\App\Http\Controllers\PageViewController::class, 'test']);
