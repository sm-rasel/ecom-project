<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Pagesettings\SliderSectionController;
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
        //Big Slider Section
        Route::get('/slider-section', [SliderSectionController::class, 'sliderIndex'])->name('admin.slider_index');
        Route::get('/slider-section-add', [SliderSectionController::class, 'sliderAdd'])->name('admin.slider_add');
        Route::post('/slider-section-store', [SliderSectionController::class, 'sliderStore'])->name('admin.slider_store');
        Route::get('/slider-section-edit/{id}', [SliderSectionController::class, 'sliderEdit'])->name('admin.slider_edit');
        Route::post('/slider-section-update/{id}', [SliderSectionController::class, 'sliderUpdate'])->name('admin.slider_update');
        Route::post('/slider-section-status-update/{id}', [SliderSectionController::class, 'sliderStatusUpdate'])->name('admin.slider_status_update');
        Route::post('/slider-section-delete/{id}', [SliderSectionController::class, 'sliderDelete'])->name('admin.slider_delete');

        //Small Banner-1

    });
});
