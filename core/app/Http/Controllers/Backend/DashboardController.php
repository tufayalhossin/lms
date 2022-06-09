<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        dd(alphaNumeric(20,'upper'));
        return view('backend.templates.dashboard.admin');
    }
}
