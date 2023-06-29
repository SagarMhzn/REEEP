<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Requests\AboutUsRequest;
use Illuminate\Routing\Route;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutUsRequest $request)
    {
        $aboutus = new AboutUs();

        $aboutus->title = $request->title;
        $aboutus->description = $request->description;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/aboutus'), $filename);
            $aboutus->image = $filename;
        }

        $aboutus->save();

        return redirect(route('backend.aboutus.list'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $aboutus = AboutUs::get();
        return view('backend.aboutus.list',compact('aboutus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aboutus = AboutUs::findOrFail($id);
        return view('backend.aboutus.edit',compact('aboutus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUsRequest $request, $id)
    {
        $aboutus = AboutUs::findOrFail($id);

        $aboutus->title = $request->title;
        $aboutus->description = $request->description;

        if ($request->hasFile('image')) {
            if ($aboutus->image != null) {
                $previousImagePath = public_path('public/Image/aboutus/' . $aboutus->image);

                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/aboutus'), $filename);
            $aboutus->update([
                'image' => $filename,
            ]);
        }
        
        $aboutus->save();

        return redirect(route('backend.aboutus.list'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $id)
    {

        if ($id->image != null) {
            $imagePath = public_path('public/Image/aboutus/' . $id->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $id->delete();
        return redirect(route('backend.aboutus.list'));
    }
}
