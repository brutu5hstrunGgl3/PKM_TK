@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Menu</h1>

    <form action="{{ route('menu.update', $menu) }}" method="POST">
        @csrf @method('PUT')

        <label class="block mb-2 font-semibold">Nama Menu</label>
        <input type="text" name="name" value="{{ $menu->name }}" class="w-full border p-2 rounded mb-4" required>

        <label class="block mb-2 font-semibold">URL / Link</label>
        <input type="text" name="url" value="{{ $menu->url }}" class="w-full border p-2 rounded mb-4" required>

        <label class="block mb-2 font-semibold">Urutan</label>
        <input type="number" name="order" value="{{ $menu->order }}" class="w-full border p-2 rounded mb-4">

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Perbarui</button>
    </form>
</div>
@endsection
