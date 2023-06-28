<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    public function index(){
        // return view('menu.menuTreeview',compact('menus','allMenus'));
    }
    
    public function create(){
        $menus = Menu::with('child')->whereNUll('parent_id')->get();
        return view('backend.menu.create',compact('menus'));
    }

    public function store(MenuRequest $request)
    {
        

        $menu = new Menu;
        
        $menu->title = $request->title;
        $menu->status = $request->status;
        
        $menu->parent_id = $request->parents;

        $parent_id = $menu->parent_id;

        
        $menu->slug = Str::slug($request->title);
        $menu->order = $request->order;

        $menu->save();

        if($parent_id != Null){
            return redirect(route('backend.menu.childlist',$parent_id));
        }elseif($parent_id == Null){
            return redirect(route('backend.menu.list'));
        }


        // $input = $request->all();
        // $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        // Menu::create($input);
        // return back()->with('success', 'Menu added successfully.');
    }

    public function show()
    {
        $menus = Menu::with('child')->OrderBy('order')->where('parent_id', null)->get();
        $count = Menu::with('child')->OrderBy('order')->where('parent_id', null)->count();

        $parent_id = Menu::value('parent_id');
        return view('backend.menu.list',compact('menus','count','parent_id'));
    }

    public function showChild($id)
    {
        $menus = Menu::with('child')->OrderBy('order')->where('parent_id',$id)->get();
        $count = Menu::with('child')->OrderBy('order')->where('parent_id',$id)->count();

        $parent_id = $id;
        $parent_title = Menu::where('id',$id)->value('title');

        return view('backend.menu.list',compact('menus','count','parent_id','parent_title'));
    }

    public function edit($id){
        $update = Menu::with('child')->where('id',$id)->first();
        $menus = Menu::with('child')->whereNUll('parent_id')->get();

        return view('backend.menu.edit',compact('update','menus'));
    }

    public function update(MenuRequest $request, $id){

        $update = Menu::findOrFail($id);

        $update->title = $request->title;
        $update->status = $request->status;
        
        $update->parent_id = $request->parents;
        
        $parent_id = $update->parent_id;

        $update->slug = Str::slug($request->title);
        $update->order = $request->order;

        $update->save();

        // $menus = Menu::with('child')->where('parent_id',$parent_id)->get();
        // $count = Menu::with('child')->OrderBy('order')->where('parent_id',$parent_id)->count();

        // return view('backend.menu.list', compact('menus','count'));

        if($parent_id != Null){
            return redirect(route('backend.menu.childlist',$parent_id));
        }elseif($parent_id == Null){
            return redirect(route('backend.menu.list'));
        }

    }

    public function destroy(Menu $id){
        $id->delete();
        return redirect(route('backend.menu.list'));
    }
}
