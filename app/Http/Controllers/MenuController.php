<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public function index(){
        return view('menu.menuTreeview',compact('menus','allMenus'));
    }
    
    public function create(){
        $menus = Menu::with('child')->whereNUll('parent_id')->get();
        return view('backend.menu.create',compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|unique',
           'parents' =>'nullable',
        ]);

        $menu = new Menu;
        
        $menu->title = $request->title;
        $menu->status = $request->status;
        
        if($request->checked == 1){
            $menu->parent_id = NULL;
        }else{
            $menu->parent_id = $request->parents;
        }
        $menu->slug = Str::slug($request->title);
        $menu->order = $request->order;

        $menu->save();

        return view('home');


        // $input = $request->all();
        // $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        // Menu::create($input);
        // return back()->with('success', 'Menu added successfully.');
    }

    public function show()
    {
        $menus = Menu::with('child')->OrderBy('order')->where('parent_id', null)->get();
        $count = Menu::with('child')->OrderBy('order')->where('parent_id', null)->count();
        return view('backend.menu.list',compact('menus','count'));
    }

    public function showChild($id)
    {
        // dd($id);
        $menus = Menu::with('child')->OrderBy('order')->where('parent_id',$id)->get();
        $count = Menu::with('child')->OrderBy('order')->where('parent_id',$id)->count();
        return view('backend.menu.list',compact('menus','count'));
    }

    public function edit($id){
        $update = Menu::with('child')->where('id',$id)->first();
        $menus = Menu::with('child')->whereNUll('parent_id')->get();

        return view('backend.menu.edit',compact('update','menus'));
    }

    public function update(MenuRequest $request, $id){

        $menus = Menu::findOrFail($id);

        $menus->title = $request->title;
        $menus->status = $request->status;
        
        $menus->parent_id = $request->parents;
        
        $menus->slug = Str::slug($request->title);
        $menus->order = $request->order;

        $menus->save();

        return view('home');
    }
}
