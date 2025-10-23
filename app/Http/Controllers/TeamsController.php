<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Teams::latest()->get();
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'position' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'position']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('teams', 'public');
        }

        Teams::create($data);

        return redirect()->route('teams.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Teams $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Teams $team)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'position' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'position']);

        if ($request->hasFile('photo')) {
            if ($team->photo && Storage::exists('public/' . $team->photo)) {
                Storage::delete('public/' . $team->photo);
            }
            $data['photo'] = $request->file('photo')->store('teams', 'public');
        }

        $team->update($data);

        return redirect()->route('teams.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Teams $team)
    {
        if ($team->photo && Storage::exists('public/' . $team->photo)) {
            Storage::delete('public/' . $team->photo);
        }

        $team->delete();

        return redirect()->route('teams.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
