<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Tampilkan semua data kontak.
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Form tambah kontak.
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Simpan data kontak baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|string|max:50',
            'alamat' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'x' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        $sosmed = collect($validated)
            ->only(['facebook', 'instagram', 'x', 'tiktok', 'youtube'])
            ->filter() // hapus null/empty
            ->toArray();

        Contact::create([
            'phone' => $validated['phone'],
            'alamat' => $validated['alamat'] ?? null,
            'sosmed' => $sosmed, // cukup array, Laravel akan otomatis encode ke JSON
        ]);

        return redirect()
            ->route('contact.index')
            ->with('success', 'Kontak berhasil ditambahkan!');
    }

    /**
     * Form edit kontak.
     */
    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update data kontak.
     */
    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'phone' => 'required|string|max:50',
            'alamat' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'x' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        $sosmed = collect($validated)
            ->only(['facebook', 'instagram', 'x', 'tiktok', 'youtube'])
            ->filter()
            ->toArray();

        $contact->update([
            'phone' => $validated['phone'],
            'alamat' => $validated['alamat'] ?? null,
            'sosmed' => $sosmed,
        ]);

        return redirect()
            ->route('contact.index')
            ->with('success', 'Kontak berhasil diperbarui!');
    }

    /**
     * Hapus data kontak.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('contact.index')
            ->with('success', 'Data kontak berhasil dihapus!');
    }
}
