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
            Route::prefix('curriculum')->group(function () {
                Route::get('/index/{operationID}/{slug?}',[ Courses::class, 'curriculum'])->name('curriculum');
                Route::post('/curriculum-store/{operationID}',[ Courses::class, 'curriculum_store'])->name('curriculum_store');
            });
            // section
            Route::prefix('section')->group(function () {
                Route::post('/store/{operationID}',[ Courses::class, 'section_store'])->name('section_store');
                Route::post('/sort/{operationID}',[ Courses::class, 'section_sort'])->name('section_sort');
                Route::get('/destroy/{operationID}/{id}',[ Courses::class, 'section_destroy'])->name('section_destroy');
            });
            // lesson
            Route::prefix('lesson')->group(function () {
                Route::post('/sort/{operationID}',[ Courses::class, 'lesson_sort'])->name('lesson_sort');
                Route::get('/store/{operationID}/{id?}',[ Courses::class, 'lesson'])->name('lesson');
                Route::post('/store/{operationID}/{id?}',[ Courses::class, 'lesson_store'])->name('lesson_store');
            });
            Route::prefix('resource')->group(function () {
                Route::post('/store/{operationID}/{lession_id?}',[ Courses::class, 'resource_store'])->name('resource_store');
                Route::get('/delete/{operationID}/{lesson_id}/{id}',[ Courses::class, 'resource_delete'])->name('resource_delete');
            });
            Route::prefix('priceing')->group(function () {
                Route::post('/update/{operationID}',[ Courses::class, 'price_store'])->name('pricing_store');
                Route::post('/price-ajax/{operationID}',[ Courses::class, 'price_ajax'])->name('price_ajax');
                Route::get('/{operationID}',[ Courses::class, 'pricing'])->name('pricing');
            });
            Route::prefix('landing-media')->group(function () {
                Route::post('/update/{operationID}',[ Courses::class, 'landing_media_store'])->name('landing_media_store');
                Route::get('/{operationID}',[ Courses::class, 'landing_media'])->name('landing_media');
            });
            Route::prefix('promotion')->group(function () {
                Route::post('/update/{operationID}',[ Courses::class, 'promotion_store'])->name('promotion_store');
                Route::get('/create/{operationID}/{id?}',[ Courses::class, 'promotion_create'])->name('promotion_create');
                Route::get('/{operationID}',[ Courses::class, 'promotion'])->name('promotion');
            });
            Route::prefix('messages')->group(function () {
                Route::post('/update/{operationID}',[ Courses::class, 'messages_store'])->name('messages_store');
                Route::get('/{operationID}',[ Courses::class, 'messages'])->name('messages');
            });
            Route::prefix('faq')->group(function () {
                Route::post('/update/{operationID}',[ Courses::class, 'faq_store'])->name('faq_store');
                Route::get('/{operationID}',[ Courses::class, 'faq'])->name('faq');
            });
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
