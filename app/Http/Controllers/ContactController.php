<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'product_interest' => $request->product_interest,
            'message'          => $request->message,
        ]);

        return redirect()->route('contacts')->with('success', 'Pesan kamu berhasil dikirim! Kami akan segera menghubungi kamu.');
    }
}
