<?php
namespace App\resources\view\routes;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Auth\AuthController;
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

// Route::get('/admin', function () {
//     return view('backend.templates.dashboard.admin');
// });

Route::middleware(['auth','admin'])->prefix('app')->name('admin.')->group(function () {
    Route::get('/dashboard',[ DashboardController::class, 'index'])->name('dashboard');
});