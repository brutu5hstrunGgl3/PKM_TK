<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $daftars = Daftar::latest()->get(); // ambil semua data
         return view('admin.daftar.index', compact('daftars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.daftar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'judul' => 'nullable|string|max:255',
        'deskripsi' => 'nullable|string',
        'link_form' => 'required|url',
        ]);

        Daftar::create($validated);

        return redirect()->back()->with('success', 'Link Google Form berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daftar $daftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        return view('admin.daftar.edit', compact('daftar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daftar $daftar)
    {
        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'link_form' => 'required|url',
        ]);

        $daftar->update($validated);

        return redirect()->route('pendaftaran.index')->with('success', 'Link Google Form berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftar $daftar)
    {
        $daftar->delete();

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()
        ->route('pendaftaran.index')
        ->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
