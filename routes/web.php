<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
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

Route::group([], function () {
    Route::get('/', [PageController::class, 'index'])->name('page.index');
});
Route::group(['prefix'=> 'admin', 'namespace' => 'Admin'], function ()
{
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::group(['prefix' => 'page-settings', 'namespace' => 'PageSettings'], function ()
    {
        Route::get('/');
    });
});
