@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Menu Navbar</h1>

    <a href="{{ route('menu.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Menu</a>

    <table class="w-full border border-gray-300 mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">URL</th>
                <th class="px-4 py-2 border">Urutan</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $menu)
                <tr>
                    <td class="border px-4 py-2">{{ $menu->name }}</td>
                    <td class="border px-4 py-2">{{ $menu->url }}</td>
                    <td class="border px-4 py-2 text-center">{{ $menu->order }}</td>
                    <td class="border px-4 py-2 text-center">
                        <a href="{{ route('menu.edit', $menu) }}" class="text-blue-600 hover:underline">Edit</a> |
                        <form action="{{ route('menu.destroy', $menu) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus menu ini?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center py-4 text-gray-500">Belum ada menu</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
