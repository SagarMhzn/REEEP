<?php

namespace App\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $menuItems = $this->getMenuItems();
        $view->with('menuItems', $menuItems);
    }
    function getMenuItems($parentId = null) {
        $menuItems = Menu::where('status', 1)
            ->where('parent_id', $parentId)
            ->orderBy('order')
            ->get();

        foreach ($menuItems as $menuItem) {
            $menuItem->children = $this->getMenuItems($menuItem->id);
        }

        return $menuItems;
    }

}