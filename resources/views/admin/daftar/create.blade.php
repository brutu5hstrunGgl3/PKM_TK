@extends('layouts dashboard.app')

@section('title', 'Tambah Link Pendaftaran')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Link Pendaftaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('pendaftaran.index') }}">Pendaftaran</a></div>
                <div class="breadcrumb-item active">Tambah Data</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Link Google Form</h4>
                        </div>
                        <div class="card-body">

                            {{-- Notifikasi sukses --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- Notifikasi error validasi --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Terjadi kesalahan!</strong>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('pendaftaran.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="judul">Judul (Opsional)</label>
                                    <input type="text" 
                                           name="judul" 
                                           id="judul" 
                                           class="form-control @error('judul') is-invalid @enderror" 
                                           placeholder="Contoh: Pendaftaran Siswa Baru 2025" 
                                           value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi (Opsional)</label>
                                    <textarea name="deskripsi" 
                                              id="deskripsi" 
                                              class="form-control @error('deskripsi') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Tambahkan deskripsi singkat tentang pendaftaran...">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="link_form">Link Google Form <span class="text-danger">*</span></label>
                                    <input type="url" 
                                           name="link_form" 
                                           id="link_form" 
                                           class="form-control @error('link_form') is-invalid @enderror" 
                                           placeholder="https://forms.gle/..." 
                                           value="{{ old('link_form') }}" required>
                                    @error('link_form')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group text-right">
                                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
                                </div>
                            </form>

                        </div> <!-- card-body -->
                    </div> <!-- card -->
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
