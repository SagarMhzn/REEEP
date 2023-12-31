<?php

namespace App\Http\Controllers;

use App\Models\WorkingArea;
use Illuminate\Http\Request;
use App\Http\Requests\WorkingAreaRequest;

class WorkingAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:working-areas-list|working-areas-create|working-areas-edit|working-areas-delete', ['only' => ['index','show']]);
          $this->middleware('permission:working-areas-create', ['only' => ['create','store']]);
          $this->middleware('permission:working-areas-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:working-areas-delete', ['only' => ['destroy']]);
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
        return view('backend.workingareas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkingAreaRequest $request)
    {
        $workingarea = new WorkingArea();

        $workingarea->title = $request->title;
        $workingarea->description = $request->description;

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/workingarea'), $filename);
            $workingarea->logo = $filename;
        }

        $workingarea->save();

        return redirect(route('backend.workingareas.list'))->with('success', 'Working Areas created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkingArea $workingArea)
    {
        $workingarea = WorkingArea::get();
        return view('backend.workingareas.list',compact('workingarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $workingarea = WorkingArea::findOrFail($id);
        return view('backend.workingareas.edit',compact('workingarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkingAreaRequest $request, $id)
    {
        $workingarea = WorkingArea::findOrFail($id);

        $workingarea->title = $request->title;
        $workingarea->description = $request->description;

        if ($request->hasFile('logo')) {
            if ($workingarea->logo != null) {
                $previousImagePath = public_path('public/Image/workingarea/' . $workingarea->logo);

                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/workingarea'), $filename);
            $workingarea->update([
                'logo' => $filename,
            ]);
        }
        
        $workingarea->save();

        return redirect(route('backend.workingareas.list'))->with('update', 'Working Areas updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkingArea $id)
    {

        if ($id->logo != null) {
            $imagePath = public_path('public/Image/workingarea/' . $id->logo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $id->delete();
        return redirect(route('backend.workingareas.list'))->with('delete', 'Working Areas deleted successfully');
    }
}
