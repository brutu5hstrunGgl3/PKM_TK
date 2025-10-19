@extends('layouts dashboard.app')

@section('title', 'Pengaturan Logo')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengaturan Logo Website</h1>
        </div>

        <div class="section-body">

            {{-- ✅ Notifikasi sukses --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- ✅ Kartu Upload Logo --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Upload / Ganti Logo</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('logo.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label>Logo Saat Ini</label><br>
                            @if(!empty($logo->logo))
                                <img src="{{ asset('storage/'.$logo->logo) }}" 
                                     alt="Logo Saat Ini" 
                                     width="150" 
                                     class="mb-3 rounded shadow-sm border">
                            @else
                                <p class="text-muted">Belum ada logo yang diunggah.</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="logo">Upload Logo Baru</label>
                            <input type="file" name="logo" id="logo" class="form-control-file" accept="image/*">
                            <small class="text-muted">Format: JPG/PNG, Maks 2MB</small>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="fas fa-upload"></i> Simpan Logo
                        </button>
                    </form>
                </div>
            </div>

            {{-- ✅ Tabel Daftar Logo --}}
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Logo yang Pernah Diupload</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                   
                                    <th>Preview Logo</th>
    
                                    <th>Tanggal Upload</th>
                                </tr>
                            </thead>
                          <tbody>
   <tbody>
    @if ($logo)
        <tr class="align-middle text-center">
            <td>
                @if ($logo->logo)
                    <img src="{{ asset('storage/' . $logo->logo) }}" 
                         alt="Logo" width="100" class="rounded">
                @else
                    <span class="text-gray-500">Tidak ada gambar</span>
                @endif
            </td>
            <td>{{ $logo->created_at ? $logo->created_at->format('d M Y H:i') : '-' }}</td>
        </tr>
    @else
        <tr>
            <td colspan="2" class="text-center text-muted">Belum ada logo yang diunggah.</td>
        </tr>
    @endif
</tbody>


                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
