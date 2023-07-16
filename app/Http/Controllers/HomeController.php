<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Album;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Knowledge;
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
        $data['knowledge'] = Knowledge::latest()->limit(3)->get();
        $data['contact'] = Contact::first();
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
        $contact = Contact::first();
        return view('frontend.test-blades.testcontact',compact('contact'));
    }

    public function test(){
        $data['area'] = WorkingArea::get();
        return view('frontend.test', compact('data'));
    }
    

    public function about(){
        $data['about-first'] = AboutUs::first();
        $data['about-second'] = AboutUs::skip(1)->first();
        $data['about'] = AboutUs::get()->slice(2);
        // dd($data['about']);
        return view('frontend.about.page', compact('data'));
    }
    public function workingareas(){
        $data['area'] = WorkingArea::get();
        return view('frontend.working-areas.workingareas',compact('data'));
    }

    public function viewArea($id){
        $data['area'] = WorkingArea::findOrFail($id);
        return view('frontend.working-areas.areas.area',compact('data'));
    }
}
