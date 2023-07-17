<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:album-list|album-create|album-edit|album-delete', ['only' => ['index','show']]);
          $this->middleware('permission:album-create', ['only' => ['create','store']]);
          $this->middleware('permission:album-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:album-delete', ['only' => ['destroy']]);
     }

    public function index()
    {
        $album = Album::get();
        return view('backend.album.list',compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumRequest $request)
    {
        $album = new Album();
        
        $album->title = $request->title;
        
        if ($request->file('cover_image')) {
            $file = $request->file('cover_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/albums'), $filename);
            $album->cover_image = $filename;
        }
        
        // dd($album->cover_image);
        $album->save();

        return redirect(route('backend.album.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('backend.album.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlbumRequest $request, Album $album)
    {
        $album->title = $request->title;

        if ($request->hasFile('cover_image')) {
            if ($album->cover_image != null) {
                $previousImagePath = public_path('public/Image/albums/' . $album->cover_image);

                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $file = $request->file('cover_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/albums'), $filename);
            $album->update([
                'cover_image' => $filename,
            ]);
        }
        
        $album->save();

        return redirect(route('backend.album.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        if ($album->cover_image != null) {
            $imagePath = public_path('public/Image/albums/' . $album->cover_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $album->delete();
        return redirect(route('backend.album.index'));
    }
}
