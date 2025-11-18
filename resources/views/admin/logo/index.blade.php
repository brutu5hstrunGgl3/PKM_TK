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
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($logo && $logo->logo)
                                    <tr class="align-middle text-center">
                                        <td>
                                            <img src="{{ asset('storage/' . $logo->logo) }}" 
                                                 alt="Logo" width="100" class="rounded shadow-sm">
                                        </td>
                                        <td>{{ $logo->created_at ? $logo->created_at->format('d M Y H:i') : '-' }}</td>
                                        <td>
                                            {{-- Tombol Hapus Logo --}}
                                            <form action="{{ route('logo.destroy', $logo->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Yakin ingin menghapus logo ini?')"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">Belum ada logo yang diunggah.</td>
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
