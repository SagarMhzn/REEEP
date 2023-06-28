<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;
use ReturnTypeWillChange;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    

    public function viewAbout(){
        return view('about');
    
    }
    public function viewWorkingAreas(){
        return view('workingareas');
    }
}
