<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\SocialRequest;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:social-list|social-create|social-edit|social-delete', ['only' => ['index','show']]);
          $this->middleware('permission:social-create', ['only' => ['create','store']]);
          $this->middleware('permission:social-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:social-delete', ['only' => ['destroy']]);
     }

    public function index()
    {
        $data['social'] = Social::get();
        return view('backend.socials.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.socials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialRequest $request)
    {

        $network_titles = $request->input('network_title');
        $source_urls = $request->input('source_url');

        foreach ($network_titles as $key => $title) {

            $socials = [
                'network_title' => $title,
                'source_url' => $source_urls[$key],
                'slug' => Str::slug($title),
            ];
            
            Social::create($socials);
        }
        return redirect()->route('backend.socials.index')->with('success', 'Socials created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social)
    {
        return view('backend.socials.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialRequest $request, Social $social)
    {
        $social->network_title = $request->network_title;
        $social->slug = Str::slug($request->network_title);
        $social->source_url = $request->source_url;

        $social->save();

        return redirect(route('backend.socials.index'))->with('update', 'Socials updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Social $social)
    {
        $social->delete();
        return redirect(route('backend.socials.index'))->with('delete', 'Socials deleted successfully');
    }
}
