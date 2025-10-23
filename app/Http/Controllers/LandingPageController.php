<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Body;
use App\Models\Setting;
use App\Models\Event;
use App\Models\Teams;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data terbaru dari tabel contents
        $content = Content::latest()->first();

        // Ambil data terbaru dari tabel bodies
        $body = Body::latest()->first();

        $setting = Setting::first();


         $events = Event::where('is_published', true)
        ->latest() // kalau mau batasi 3 event terbaru, bisa dihapus kalau mau semua
        ->get();
        $teams = Teams::latest()->get();

        // Kirim keduanya ke view
        return view('landing.landing', compact('content', 'body','setting','events','teams'));
         
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
