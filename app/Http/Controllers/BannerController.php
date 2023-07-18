<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:banner-list|banner-create|banner-edit|banner-delete', ['only' => ['index','show']]);
          $this->middleware('permission:banner-create', ['only' => ['create','store']]);
          $this->middleware('permission:banner-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:banner-delete', ['only' => ['destroy']]);
     }

    public function index()
    {
        $banner = Banner::get();
        return view('backend.banners.list',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $banner = new Banner();

        $banner->title = $request->title;
        $banner->banner_order = $request->banner_order;
        $banner->caption = $request->caption;

        if ($request->file('banner_file')) {
            $file = $request->file('banner_file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/banners'), $filename);
            $banner->banner_file = $filename;
        }

        $banner->save();

        return redirect(route('backend.banner.index'))->with('success', 'Banners created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('backend.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $banner->title = $request->title;
        $banner->banner_order = $request->banner_order;
        $banner->caption = $request->caption;

        if ($request->hasFile('banner_file')) {
            if ($banner->banner_file != null) {
                $previousImagePath = public_path('public/Image/banners/' . $banner->banner_file);

                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $file = $request->file('banner_file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/banners'), $filename);
            $banner->update([
                'banner_file' => $filename,
            ]);
        }

        $banner->save();

        return redirect(route('backend.banner.index'))->with('update', 'Banners updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if ($banner->banner_file != null) {
            $imagePath = public_path('public/Image/banners/' . $banner->banner_file);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $banner->delete();
        return redirect(route('backend.banner.index'))->with('delete', 'Banners deleted successfully');
    }
}
