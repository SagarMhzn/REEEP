<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Requests\PartnerRequest;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:partners-list|partners-create|partners-edit|partners-delete', ['only' => ['index','show']]);
          $this->middleware('permission:partners-create', ['only' => ['create','store']]);
          $this->middleware('permission:partners-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:partners-delete', ['only' => ['destroy']]);
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
        return view('backend.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        $partners = new Partner();

        $partners->title = $request->title;
        $partners->abbreviations = $request->abbreviations;
        $partners->description = $request->description;

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/partners'), $filename);
            $partners->logo = $filename;
        }

        $partners->save();

        return redirect(route('backend.partners.list'))->with('success', 'Partners created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partners)
    {
        // dd($partners);
        $partners = Partner::get();
        return view('backend.partners.list',compact('partners'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partners)
    {
        return view('backend.partners.edit',compact('partners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerRequest $request, Partner $partners)
    {

        $partners->title = $request->title;
        $partners->description = $request->description;
        $partners->abbreviations = $request->abbreviations;

        if ($request->hasFile('logo')) {
            if ($partners->logo != null) {
                $previousImagePath = public_path('public/Image/partners/' . $partners->logo);

                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/partners'), $filename);
            $partners->update([
                'logo' => $filename,
            ]);
        }
        
        $partners->save();

        return redirect(route('backend.partners.list'))->with('update', 'Partners updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partners)
    {
        
        if ($partners->logo != null) {
            $imagePath = public_path('public/Image/partners/' . $partners->logo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $partners->delete();
        return redirect(route('backend.partners.list'))->with('delete', 'Partners deleted successfully');
    }
}
