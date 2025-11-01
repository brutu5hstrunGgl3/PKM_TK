@extends('layouts dashboard.app')

@section('title', 'Pendaftaran')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Pendaftaran</h1>
            <div class="section-header-breadcrumb"></div>
        </div>

        <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Link Pendaftaran</h4>
                        </div>

                        <div class="card-body">
                            <div class="float-left">
                                <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>

                            <div class="float-right">
                                <form method="GET" action="">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul...">
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Link Google Form</th>
                                            <th>Status</th>
                                            <th>Dibuat</th>
                                            <th>Diupdate</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($daftars as $daftar)
                                            <tr>
                                                <td>{{ $daftar->judul }}</td>
                                                <td>{{ $daftar->deskripsi }}</td>
                                                <td>
                                                    <a href="{{ $daftar->link_form }}" target="_blank">
                                                       {{ Str::limit($daftar->link_form, 60) }}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($daftar->status)
                                                        <span class="badge badge-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-secondary">Nonaktif</span>
                                                    @endif
                                                </td>
                                                <td>{{ $daftar->created_at->format('d M Y') }}</td>
                                                <td>{{ $daftar->updated_at->format('d M Y') }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('pendaftaran.edit', $daftar->id) }}" class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                       <form action="{{ route('pendaftaran.destroy', $daftar->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus link ini?')" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">
                                                    Belum ada data pendaftaran yang diunggah.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
