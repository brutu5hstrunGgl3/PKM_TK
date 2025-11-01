<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar;
use App\Models\Content;
use App\Models\Body;
use App\Models\Setting;
use App\Models\Event;
use App\Models\Teams;
use App\Models\Contact;
use App\Models\Menu;

class DaftarController extends Controller
{
    /**
     * Landing page pendaftaran
     */
    public function index()
    {
        // Ambil data layout umum
        $menus   = Menu::orderBy('order')->get();
        $content = Content::latest()->first();
        $body    = Body::latest()->first();
        $logo    = Setting::first();
        $teams   = Teams::latest()->get();
        $contact = Contact::first();
        $events  = Event::where('is_published', true)->latest()->get();

        // Ambil link form terbaru yang aktif
        $daftar = Daftar::where('status', true)->latest()->first();

        return view('landing.blog', compact(
            'menus',
            'content',
            'body',
            'logo',
            'teams',
            'contact',
            'events',
            'daftar'
        ));
    }
}
