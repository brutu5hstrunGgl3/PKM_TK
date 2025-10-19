<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $contents = Content::latest()->get();
        return view('admin.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
         $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        Content::create($data);

        return redirect()->route('content.index')->with('success', 'Konten baru berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $content = Content::findOrFail($id);
        return view('admin.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $content = Content::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Jika ada upload gambar baru, hapus yang lama dulu
        if ($request->hasFile('image')) {
            if ($content->image && Storage::disk('public')->exists($content->image)) {
                Storage::disk('public')->delete($content->image);
            }

            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $content->update($data);

        return redirect()->route('content.index')->with('success', 'Konten berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        $content = Content::findOrFail($id);

    // 2️⃣ Hapus file gambar dari storage kalau ada
    if ($content->image && Storage::disk('public')->exists($content->image)) {
        Storage::disk('public')->delete($content->image);
    }

    // 3️⃣ Hapus data dari database
    $content->delete();

    // 4️⃣ Redirect dengan pesan sukses
    return redirect()->route('content.index')->with('success', 'Konten berhasil dihapus!');
    }
}
