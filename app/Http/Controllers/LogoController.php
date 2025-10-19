<?php
namespace App\Http\Controllers;


use App\Models\Setting;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function index()
    {
        $logo = Setting::first();
        return view('admin.logo.index', compact('logo'));
    }

    public function update(Request $request)
    {
         $request->validate([
        'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
    ]);

    if ($request->hasFile('logo')) {
        // Simpan logo baru tanpa hapus lama
        $path = $request->file('logo')->store('logos', 'public');
        Setting::create(['logo' => $path]);
    }

    return back()->with('success', 'Logo berhasil diunggah!');
    }
}
