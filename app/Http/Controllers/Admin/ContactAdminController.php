<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    /**
     * Tampilkan semua pesan kontak yang masuk.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $contacts = Contact::when($search, fn($q) => $q->where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%"))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.contacts.index', compact('contacts', 'search'));
    }

    /**
     * Tampilkan detail satu pesan kontak.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Hapus pesan kontak.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Pesan berhasil dihapus!');
    }
}
