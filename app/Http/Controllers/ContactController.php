<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $credintials = $request->validate([
            'subject' => 'required|max:25',
            'email' => 'required|email',
            'body' => 'required|min:5'
        ]);

        Mail::to('shakil@gmail.com')
            ->send(new ContactMe($credintials));

        return redirect(route('dashboard'))
            ->with('message', 'Mail was sent');
    }
}
