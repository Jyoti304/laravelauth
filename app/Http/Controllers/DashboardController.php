<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('user')){
            return view('layouts.userdash');
        }elseif(Auth::user()->hasRole('employee')){
            return view('layouts.employeedash');
        }elseif(Auth::user()->hasRole('admin')){
            return view('layouts.admindash');
        }
    }
    public function myprofile(){
        return view('layouts.myprofile');
    }
    public function empcreate(){
        return view('layouts.empcreate');
    }
}
