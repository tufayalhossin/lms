<?php
namespace App\resources\view\routes;

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
    Route::get('/',function(){
        return redirect()->route('instructor.dashboard');
    });
    Route::get('/dashboard',[ DashboardController::class, 'index'])->name('dashboard');
    
   /*
    -- category routes
   */
    Route::prefix('courses')->name('course.')->group(function () {
        // intend
        Route::get('/intend/{operationID?}',[ Courses::class, 'intend'])->name('intend');
        Route::post('/intend_store/{operationID?}',[ Courses::class, 'intend_store'])->name('intend_store');
        Route::get('/',[ Courses::class, 'index'])->name('list');
        Route::get('/draft',[ Courses::class, 'draft'])->name('draft');
        Route::middleware(['Owner'])->group(function () {
            Route::post('/intend_update/{operationID?}',[ Courses::class, 'intend_update'])->name('intend_update');
            // course info 
            Route::get('/create/{operationID}/{slug?}',[ Courses::class, 'create'])->name('create');
            Route::post('/store/{operationID}',[ Courses::class, 'store'])->name('store');
            // course curriculum
            Route::get('/curriculum/{operationID}/{slug?}',[ Courses::class, 'curriculum'])->name('curriculum');
            Route::post('/curriculum-store/{operationID}',[ Courses::class, 'curriculum_store'])->name('curriculum_store');
            //course info
           // Route::get('get-courses/{status?}', [Courses::class, 'courseAjax'])->name('ajaxtable');
        });
    });
    
   /*
    -- category routes
   */


    Route::prefix('subcategory')->name('subcategory.')->group(function () {
        Route::get('get-subcategory', [Courses::class, 'ajaxsubcategory'])->name('ajax');
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