<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\WorkingArea;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;
use ReturnTypeWillChange;

class HomeController extends Controller
{
    public function index(){
        $data['banner'] = Banner::orderBy('banner_order')->get();
        $data['area'] = WorkingArea::get();
        $data['aboutmain'] = AboutUs::first();
        return view('frontend.welcome', compact('data'));
    }
    
    public function admin_index(){
        return view('backend.home');
    }
    

    public function about(){
        $about = AboutUs::get();
        return view('frontend.about', compact('about'));
    }
    public function workingareas(){
        return view('frontend.workingareas');
    }
}
