<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/user/{user}/check/{page}', [\App\Http\Controllers\PageViewController::class, 'checkPage']);
Route::get('/user/{user}/viewlist', [\App\Http\Controllers\PageViewController::class, 'viewList']);
Route::get('/test', [\App\Http\Controllers\PageViewController::class, 'test']);
//по-хорошему post должен быть, ведь мы данные то записываем.
// ну да ладно, мне же продемонстрировать просто надо, ТЗ все-таки :-)
Route::get('/user/{user}/view/{page}', [\App\Http\Controllers\PageViewController::class, 'viewPage']);
