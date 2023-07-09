<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\NewsAndEvent;
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
        $data['NaE_latest'] = NewsAndEvent::latest()->take(1)->first();
        $data['NaE_latest_five'] = NewsAndEvent::latest()->limit(5)->get();
        // dd($data['NaE_latest_five']);
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
