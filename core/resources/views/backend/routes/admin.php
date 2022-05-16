<?php
namespace App\resources\view\routes;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController as Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth','IsAdmin'])->prefix('app')->name('admin.')->group(function () {
    Route::get('/dashboard',[ DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/',[ Category::class, 'index'])->name('list');
        Route::post('/create',[ Category::class, 'store'])->name('create');
        Route::get('/edit',[ Category::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[ Category::class, 'destroy'])->name('delete');
    });
    Route::prefix('subcategory')->name('subcategory.')->group(function () {
        Route::get('/',[ Category::class, 'index'])->name('list');
        Route::post('/create',[ Category::class, 'store'])->name('create');
        Route::get('/edit',[ Category::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[ Category::class, 'destroy'])->name('delete');
    });
});