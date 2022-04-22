<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Middleware PageCheckRole (page.checkrole)
|--------------------------------------------------------------------------
|
| If you want use middleware PageCheckRole. You need
| to describe $param as the page you are going to
|
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
