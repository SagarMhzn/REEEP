<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Requests\LangRequest;
use Illuminate\Support\Facades\App;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

use function PHPUnit\Framework\returnSelf;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function view()
    {
        return view('lang');
    }

    public function index()
    {
        $lang = Lang::get();
        return view('backend.lang.list', compact('lang'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return Lang::get();
        return view('backend.lang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LangRequest $request)
    {
        // $data = $request->validated();

        $lang = new Lang;
        $lang->title = [
            'en' => $request['title']['en'],
            'ne' => $request['title']['ne'],
        ];
        $lang->description = [
            'en' => $request['description']['en'],
            'ne' => $request['description']['ne'],
        ];
        $lang->save();

        return redirect()->back();
        // return redirect(route('backend.lang.index'));
    }

    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Lang $lang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lang $lang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lang $lang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lang $lang)
    {
        
        $lang->delete();
        return redirect()->back();
    }
}
