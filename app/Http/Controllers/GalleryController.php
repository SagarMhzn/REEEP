<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::orderBy('album_id')->get();
        return view('backend.gallery.list', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $album['album']= Album::pluck('title', 'id');
        return view('backend.gallery.create', compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {

        // dd($request->image);
        $albumId = $request->input('album_id');
        $images = $request->file('image');
        $titles = $request->input('title');

        foreach ($images as $key => $image) {
            $title = $titles[$key];

            $galleyData = [
                'album_id' => $albumId,
                'title' => $title,
            ];

            if ($image) {

                $imageName =  date('YmdHi') . $image->getClientOriginalName();
                $image->move(public_path('public/Image/gallery'), $imageName);
                $galleyData['image'] = $imageName;
            }
            Gallery::create($galleyData);
        }
        return redirect()->route('backend.gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $data['album']= Album::pluck('title', 'id');
        // $data['record'] = Gallery::find($gallery);
        return view('backend.gallery.edit',compact('data','gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $gallery->album_id = $request->album_id;
        $gallery->title = $request->title;

        if ($request->hasFile('image')) {
            if ($gallery->image != null) {
                $previousImagePath = public_path('public/Image/gallery/' . $gallery->image);

                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/gallery'), $filename);
            $gallery->update([
                'image' => $filename,
            ]);
        }

        $gallery->save();

        return redirect(route('backend.gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image != null) {
            $imagePath = public_path('public/Image/gallery/' . $gallery->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $gallery->delete();
        return redirect(route('backend.gallery.index'));
    }
}
