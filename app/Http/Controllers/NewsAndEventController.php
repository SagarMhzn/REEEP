<?php

namespace App\Http\Controllers;

use App\Models\NewsAndEvent;
use Illuminate\Http\Request;
use App\Http\Requests\NewsAndEventRequest;

class NewsAndEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:news-and-events-list|news-and-events-create|news-and-events-edit|news-and-events-delete', ['only' => ['index','show']]);
          $this->middleware('permission:news-and-events-create', ['only' => ['create','store']]);
          $this->middleware('permission:news-and-events-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:news-and-events-delete', ['only' => ['destroy']]);
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.news-and-events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsAndEventRequest $request)
    {
        $nae = new NewsAndEvent();

        $nae->title = $request->title;
        $nae->description = $request->description;
        $nae->category = $request->category;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/news-and-events'), $filename);
            $nae->image = $filename;
        }

        $nae->save();

        return redirect(route('backend.news-and-events.list'))->with('success', 'News and Events created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsAndEvent $newsAndEvent)
    {
        $nae = NewsAndEvent::get();
        return view('backend.news-and-events.list', compact('nae'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nae = NewsAndEvent::findOrFail($id);
        return view('backend.news-and-events.edit', compact('nae'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsAndEventRequest $request, $id)
    {
        $nae = NewsAndEvent::findOrFail($id);

        $nae->title = $request->title;
        $nae->description = $request->description;
        $nae->category = $request->category;

        if ($request->hasFile('image')) {
            if ($nae->image != null) {
                $previousImagePath = public_path('public/Image/news-and-events/' . $nae->image);

                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/nae'), $filename);
            $nae->update([
                'image' => $filename,
            ]);
        }

        $nae->save();

        return redirect(route('backend.news-and-events.list'))->with('update', 'News and Events updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsAndEvent $id)
    {
        // dd($id);

        if ($id->image != null) {
            $imagePath = public_path('public/Image/news-and-events/' . $id->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $id->delete();
        return redirect(route('backend.news-and-events.list'))->with('delete', 'News and Events deleted successfully');
    }

    public function getEntry(Request $request)
    {
        $itemId = $request->itemId;
        $entry = NewsAndEvent::find($itemId);

        return view('partials.entry', compact('entry'))->render();
    }

    public function getEntryInner(Request $request)
    {
        $itemId = $request->itemId;
        $entry = NewsAndEvent::find($itemId);

        return view('partials.entry-inner', compact('entry'))->render();
    }

    public function viewArticle($id)
    {
        $data['NaE_latest'] = NewsAndEvent::findOrFail($id);
        $data['NaE_latest_five'] = NewsAndEvent::latest()->limit(8)->get();
        return view('frontend.news-and-events.view-article', compact('data'));
    }

    public function viewMain()
    {
        $data['nae'] = NewsAndEvent::latest()->get();
        return view('frontend.news-and-events.main', compact('data'));
    }
}
