<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'phone' => 'required|string|max:50',
        'alamat' => 'nullable|string|max:255',
        'facebook' => 'nullable|url|max:255',
        'instagram' => 'nullable|url|max:255',
        'x' => 'nullable|url|max:255',
        'tiktok' => 'nullable|url|max:255',
        'youtube' => 'nullable|url|max:255',
    ]);

    $sosmed = [
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'x' => $request->x,
        'tiktok' => $request->tiktok,
        'youtube' => $request->youtube,
    ];

    Contact::create([
        'phone' => $request->phone,
        'alamat' => $request->alamat,
        'sosmed' => json_encode($sosmed), // simpan dalam format JSON
    ]);

    return redirect()->route('contact.index')->with('success', 'Kontak berhasil ditambahkan!');
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
         return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
{
    $request->validate([
        'phone' => 'required|string|max:50',
        'alamat' => 'nullable|string|max:255',
        'facebook' => 'nullable|url|max:255',
        'instagram' => 'nullable|url|max:255',
        'x' => 'nullable|url|max:255',
        'tiktok' => 'nullable|url|max:255',
        'youtube' => 'nullable|url|max:255',
    ]);

    $sosmed = [
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'x' => $request->x,
        'tiktok' => $request->tiktok,
        'youtube' => $request->youtube,
    ];

    $contact->update([
        'phone' => $request->phone,
        'alamat' => $request->alamat,
        'sosmed' => json_encode($sosmed),
    ]);

    return redirect()->route('contact.index')->with('success', 'Kontak berhasil diperbarui!');
}


    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
          $contact->delete();

        return redirect()->route('contact.index')
            ->with('success', 'Data kontak berhasil dihapus!');
    }
}
