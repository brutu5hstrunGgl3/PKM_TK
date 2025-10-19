<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Konten</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 p-10">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-semibold mb-4">Tambah Konten Baru</h1>

        <form action=" {{ route('content.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="block mb-2 font-semibold">Judul</label>
            <input type="text" name="title" class="w-full p-2 border rounded mb-4">

            <label class="block mb-2 font-semibold">Deskripsi</label>
            <textarea name="description" class="w-full p-2 border rounded mb-4" rows="4"></textarea>

            <label class="block mb-2 font-semibold">Gambar (opsional)</label>
            <input type="file" name="image" class="mb-4 block">

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        </form>
    </div>
</body>
</html>
