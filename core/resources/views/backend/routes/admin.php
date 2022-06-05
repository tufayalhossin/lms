<?php
namespace App\resources\view\routes;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController as Category;
use App\Http\Controllers\Backend\SubcategoryController as Subcategory;
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
    
   /*
    -- category routes
   */
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/',[ Category::class, 'index'])->name('list');
        Route::get('/create',[ Category::class, 'create'])->name('create');
        Route::post('/store',[ Category::class, 'store'])->name('store');
        Route::get('/view/{id}',[ Category::class, 'view'])->name('view');
        Route::get('/edit/{id}',[ Category::class, 'edit'])->name('edit');
        Route::post('/update/{id}',[ Category::class, 'update'])->name('update');
        Route::get('/delete/{id}',[ Category::class, 'destroy'])->name('delete');
    });
    Route::prefix('subcategory')->name('subcategory.')->group(function () {
        Route::get('/',[ Subcategory::class, 'index'])->name('list');
        Route::get('/create',[ Subcategory::class, 'create'])->name('create');
        Route::post('/store',[ Subcategory::class, 'store'])->name('store');
        Route::get('/view/{id}',[ Subcategory::class, 'view'])->name('view');
        Route::get('/edit/{id}',[ Subcategory::class, 'edit'])->name('edit');
        Route::post('/update/{id}',[ Subcategory::class, 'update'])->name('update');
        Route::get('/delete/{id}',[ Subcategory::class, 'destroy'])->name('delete');
    });
});