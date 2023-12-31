<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{

    function __construct()
     {
          $this->middleware('permission:menu-list|menu-create|menu-edit|menu-delete', ['only' => ['index','show']]);
          $this->middleware('permission:menu-create', ['only' => ['create','store']]);
          $this->middleware('permission:menu-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:menu-delete', ['only' => ['destroy']]);
     }

    public function index()
    {
        // return view('menu.menuTreeview',compact('menus','allMenus'));
    }

    public function create()
    {
        $menus = Menu::with('children')->whereNUll('parent_id')->get();
        return view('backend.menu.create', compact('menus'));
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

        if ($parent_id != Null) {
            return redirect(route('backend.menu.childlist', $parent_id))->with('success', 'Menu created successfully');
        } elseif ($parent_id == Null) {
            return redirect(route('backend.menu.list'))->with('success', 'Menu created successfully');
        }


        // $input = $request->all();
        // $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        // Menu::create($input);
        // return back()->with('success', 'Menu added successfully.');
    }

    public function show()
    {
        $menus = Menu::with('children')->OrderBy('order')->where('parent_id', null)->get();

        $parent_id = Menu::value('parent_id');
        return view('backend.menu.list', compact('menus', 'parent_id'));
    }

    public function showChild($id)
    {
        $menus = Menu::with('children')->OrderBy('order')->where('parent_id', $id)->get();

        $parent_id = $id;
        $parent_title = Menu::where('id', $id)->value('title');

        return view('backend.menu.list', compact('menus', 'parent_id', 'parent_title'));
    }

    public function edit($id)
    {
        $update = Menu::with('children')->where('id', $id)->first();
        $menus = Menu::with('children')->whereNUll('parent_id')->get();

        return view('backend.menu.edit', compact('update', 'menus'));
    }

    public function update(MenuRequest $request, $id)
    {

        $update = Menu::findOrFail($id);

        $update->title = $request->title;
        $update->status = $request->status;

        $update->parent_id = $request->parents;

        $parent_id = $update->parent_id;

        $update->slug = Str::slug($request->title);
        $update->order = $request->order;

        $update->save();

        if ($parent_id != Null) {
            return redirect(route('backend.menu.childlist', $parent_id))->with('update', 'Menu updated successfully');
        } elseif ($parent_id == Null) {
            return redirect(route('backend.menu.list'))->with('update', 'Menu updated successfully');
        }
    }

    public function toggle($id)
    {
        $menu = Menu::findOrFail($id);
        if ($menu->status == 0) {
            $menu->status = !$menu->status;
            $menu->save();
            return redirect()->back();
        }elseif($menu->status == 1){
            $menu->status = !$menu->status;
            $menu->save();
            return redirect()->back();
        }
    }

    public function destroy(Menu $id)
    {
        $parentId = $id->parent_id;
        Menu::where('parent_id', $id->id)->update(['parent_id' => $parentId]);
        $id->delete();

        return redirect(route('backend.menu.list'))->with('delete', 'Menu deleted successfully');
    }
}
