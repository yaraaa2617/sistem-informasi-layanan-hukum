<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function adminDashboard()
{
    return view('admin.dashboard', [
        'totalKontak' => Contact::count(),
        'totalUser' => User::count(),
        'today' => Contact::whereDate('created_at', now())->count(),
        'contacts' => Contact::latest()->take(5)->get()
    ]);
}
    public function index()
    {
        return view('kontak.index');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
    ]);

    // ❌ SALAH: $request->all() → Ada _token dll
    // ✅ BENAR: $request->only()
    Contact::create($request->only(['name', 'email', 'subject', 'message']));

    return redirect()->back()->with('success', '✅ Pesan berhasil dikirim!');
}

    public function adminIndex()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts', compact('contacts'));
    }
}
