@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah Menu Baru</h1>

    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <label class="block mb-2 font-semibold">Nama Menu</label>
        <input type="text" name="name" class="w-full border p-2 rounded mb-4" required>

        <label class="block mb-2 font-semibold">URL / Link</label>
            <select name="url" class="w-full border p-2 rounded mb-4" required>
        <option value="">-- Pilih URL --</option>
        <option value="{{ route('landing') }}">Landing Page</option>
        <option value="">Tentang Kami</option>
        <option value="">Kontak</option>
        </select>
        <label class="block mb-2 font-semibold">Urutan</label>
        <input type="number" name="order" class="w-full border p-2 rounded mb-4">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
