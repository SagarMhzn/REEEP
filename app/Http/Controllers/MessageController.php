<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\MailMessage;
use App\Mail\MessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\MessageRequest;
use Illuminate\Contracts\Mail\Mailable;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $message = Message::latest()->get();
        return view('backend.contact-us.feedback', compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        $mes = new Message();

        $mes->name = $request->name;
        $mes->phone = $request->phone;
        $mes->email = $request->email;
        $mes->subject = $request->subject;
        $mes->message = $request->message;

        $mes->save();
        $uname = $request->name;

        Mail::to($mes->email)->send(new MessageMail($uname));


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return view('backend.contact-us.message', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect(route('backend.message.index'));
    }
}
