<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function __construct()
     {
          $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['index','show']]);
          $this->middleware('permission:contact-create', ['only' => ['create','store']]);
          $this->middleware('permission:contact-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
     }

    public function index()
    {
        $contact = Contact::get();
        return view('backend.contact-us.create', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact = Contact::first();
        // dd($contact);
        if (empty($contact)) {
            $contact = null;
            return view('backend.contact-us.create', compact('contact'));
        } else {
            return view('backend.contact-us.create', compact('contact'));
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $contact = new Contact;

        $contact->url = $request->url;
        $contact->location = $request->location;
        $contact->email = $request->email;
        $contact->phone = $request->phone;

        $contact->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->url = $request->url;
        $contact->location = $request->location;
        $contact->email = $request->email;
        $contact->phone = $request->phone;

        $contact->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
