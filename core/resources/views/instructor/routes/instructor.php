<?php
namespace App\resources\view\routes;

// use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController as Category;
use App\Http\Controllers\Backend\SubcategoryController as Subcategory;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Instructor\DashboardController;
use App\Http\Controllers\Instructor\CoursesController as Courses;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| instructor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth','IsInstructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/dashboard',[ DashboardController::class, 'index'])->name('dashboard');
    
   /*
    -- category routes
   */
    Route::prefix('courses')->name('course.')->group(function () {
        Route::get('/',[ Courses::class, 'index'])->name('list');
        Route::get('/view/{id}',[ Category::class, 'view'])->name('view');
    });
    
   /*
    -- category routes
   */
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/',[ Category::class, 'index'])->name('list');
        Route::get('/view/{id}',[ Category::class, 'view'])->name('view');
    });

    Route::prefix('subcategory')->name('subcategory.')->group(function () {
        Route::get('/',[ Subcategory::class, 'index'])->name('list');
        Route::get('/view/{id}',[ Subcategory::class, 'view'])->name('view');
    });

    /*
    -- user routes
   */
    //students
    Route::prefix('students')->name('students.')->group(function () {
        Route::get('get-students/{status?}', [UsersController::class, 'studentAjax'])->name('ajaxtable');
        Route::get('/{status?}',[ UsersController::class, 'instructors'])->name('list');
    });

});