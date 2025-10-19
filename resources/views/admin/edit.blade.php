<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Konten</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 p-10">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-semibold mb-4">Edit Konten</h1>

        {{-- Notifikasi error --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 mb-4 rounded">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block mb-2 font-semibold">Judul</label>
            <input type="text" name="title" value="{{ old('title', $content->title) }}" class="w-full p-2 border rounded mb-4">

            <label class="block mb-2 font-semibold">Deskripsi</label>
            <textarea name="description" class="w-full p-2 border rounded mb-4" rows="4">{{ old('description', $content->description) }}</textarea>

            <label class="block mb-2 font-semibold">Gambar</label>
            @if($content->image)
                <img src="{{ asset('storage/'.$content->image) }}" alt="Preview" class="w-40 rounded mb-3">
            @endif

            <input type="file" name="image" class="mb-4 block">

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </form>
    </div>
</body>
</html>
