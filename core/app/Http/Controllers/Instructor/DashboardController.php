<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index(){
        // $routes = Route::getRoutes();
        // dd($routes);
        return view('instructor.templates.dashboard.index');
    }
}
