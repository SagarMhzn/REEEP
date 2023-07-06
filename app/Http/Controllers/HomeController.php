<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;
use ReturnTypeWillChange;

class HomeController extends Controller
{
    public function index(){
        $data['banner'] = Banner::orderBy('banner_order')->get();
        return view('frontend.welcome', compact('data'));
    }

    

    public function about(){
        $about = AboutUs::get();
        return view('frontend.about', compact('about'));
    }
    public function workingareas(){
        return view('frontend.workingareas');
    }
}
