<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use Illuminate\Http\Request;
use App\Http\Requests\KnowledgeRequest;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:knowledge-list|knowledge-create|knowledge-edit|knowledge-delete', ['only' => ['index','show']]);
          $this->middleware('permission:knowledge-create', ['only' => ['create','store']]);
          $this->middleware('permission:knowledge-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:knowledge-delete', ['only' => ['destroy']]);
     }

    public function index()
    {
        $knowledge = Knowledge::get();
        return view('backend.knowledge-and-resources.list', compact('knowledge'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.knowledge-and-resources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KnowledgeRequest $request)
    {
        $knowledge = new Knowledge();

        $knowledge->title = $request->title;
        $knowledge->description = $request->description;
        
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/knowledge-and-resources/images'), $filename);
            $knowledge->image = $filename;
        }
        
        $knowledge->source = $request->source;
        
        if ($request->file('documents')) {
            $file = $request->file('documents');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/knowledge-and-resources/documents'), $filename);
            $knowledge->documents = $filename;
        }

        $knowledge->save();

        return redirect(route('backend.knowledge.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Knowledge $knowledge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Knowledge $knowledge)
    {
        // dd($knowledge);
        return view('backend.knowledge-and-resources.edit',compact('knowledge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KnowledgeRequest $request, Knowledge $knowledge)
    {
        $knowledge->title = $request->title;
        $knowledge->description = $request->description;
        $knowledge->source = $request->source;

        if ($request->hasFile('image')) {
            if ($knowledge->image != null) {
                $previousImagePath = public_path('public/Image/knowledge-and-resources/images/' . $knowledge->image);

                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/knowledge-and-resources/images/'), $filename);
            $knowledge->update([
                'image' => $filename,
            ]);
        }
        
        if ($request->hasFile('documents')) {
            if ($knowledge->image != null) {
                $previousImagePath = public_path('public/Image/knowledge-and-resources/documents/' . $knowledge->documents);

                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $file = $request->file('documents');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/knowledge-and-resources/documents'), $filename);
            $knowledge->update([
                'documents' => $filename,
            ]);
        }
        
        $knowledge->save();

        return redirect(route('backend.knowledge.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Knowledge $knowledge)
    {

        if ($knowledge->image!=null) {
            $imagePath = public_path('public/Image/knowledge-and-resources/images/' . $knowledge->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        if ($knowledge->documents!=null) {
            $imagePath = public_path('public/Image/knowledge-and-resources/documents/' . $knowledge->documents);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $knowledge->delete();
        return redirect()->back();
    }

    public function view(){
        $knowledge = Knowledge::get();
        return view('frontend.resources.resources',compact('knowledge'));
    }
}
