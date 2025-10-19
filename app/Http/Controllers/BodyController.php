<?php

namespace App\Http\Controllers;

use App\Models\Body;
use App\Http\Requests\StoreBodyRequest;
use App\Http\Requests\UpdateBodyRequest;
use Illuminate\Support\Facades\Storage;

class BodyController extends Controller
{
    public function index()
    {
        $bodies = Body::latest()->get();
        return view('admin.body.index', compact('bodies'));
    }

    public function create()
    {
        return view('admin.body.create');
    }

    public function store(StoreBodyRequest $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        Body::create($data);

        return redirect()->route('body.index')->with('success', 'Konten baru berhasil dibuat!');
    }

    public function edit(Body $body)
    {
        return view('admin.body.edit', compact('body'));
    }

    public function update(UpdateBodyRequest $request, Body $body)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($body->image && Storage::disk('public')->exists($body->image)) {
                Storage::disk('public')->delete($body->image);
            }
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $body->update($data);

        return redirect()->route('body.index')->with('success', 'Konten berhasil diperbarui!');
    }

    public function destroy(Body $body)
    {
        if ($body->image && Storage::disk('public')->exists($body->image)) {
            Storage::disk('public')->delete($body->image);
        }

        $body->delete();

        return redirect()->route('body.index')->with('success', 'Konten berhasil dihapus!');
    }
}
