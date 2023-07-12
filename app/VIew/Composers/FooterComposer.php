<?php

namespace App\View\Composers;

use App\Models\Contact;
use App\Models\Menu;
use App\Models\Social;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view)
    {
        $data['contact'] = Contact::first();
        $data['social'] = Social::get();
        $data['menu'] = Menu::whereNull('parent_id')->doesntHave('children')->take(5)->get();

       
        $view->with('data', $data);
    }
    
}