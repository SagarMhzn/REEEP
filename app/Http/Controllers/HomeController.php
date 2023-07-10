<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Album;
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\NewsAndEvent;
use App\Models\Partner;
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
        $data['album'] = Album::latest()->with('gallery')->limit(3)->get();
        $data['partner'] = Partner::limit(3)->get();
        return view('frontend.welcome', compact('data'));
    }
    
    public function admin_index(){
        return view('backend.home');
    }

    public function galleryTest(){
        $data['album'] = Album::latest()->with('gallery')->limit(3)->get();
        return view('frontend.gallerytest', compact('data'));
    }

    public function contactTest(){
        return view('frontend.testcontact');
    }

    public function test(){
        $data['area'] = WorkingArea::get();
        return view('frontend.test', compact('data'));
    }
    

    public function about(){
        $about = AboutUs::get();
        return view('frontend.about', compact('about'));
    }
    public function workingareas(){
        return view('frontend.workingareas');
    }
}
