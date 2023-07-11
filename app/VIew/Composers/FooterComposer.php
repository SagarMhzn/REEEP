<?php

namespace App\View\Composers;

use App\Models\Contact;
use App\Models\Menu;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view)
    {
        $data['contact'] = Contact::first();
        // dd($data['contact']);
        $view->with('data', $data);
    }
    
}