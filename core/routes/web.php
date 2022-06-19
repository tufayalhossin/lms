<?php

use App\Http\Controllers\Backend\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
   return view('welcome');
});
// Route::get('/login-as',[ Category::class, 'index'])->name('login-as');

Route::middleware(['auth'])->prefix('app')->group(function () {
   Route::get('/login-as', function () {
      return view('auth.loginas');
   })->name('login-as');
});

Route::get('/dashboard', function () {
   return view('dashboard');
})->middleware(['auth', 'IsUser'])->name('dashboard');

require __DIR__ . '/auth.php';
