@extends('layouts dashboard.app')

@section('title', 'Edit Pendaftaran')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Link Pendaftaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('pendaftaran.index') }}">Pendaftaran</a></div>
                <div class="breadcrumb-item active">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Pendaftaran</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('pendaftaran.update', $daftar->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" 
                                           name="judul" 
                                           id="judul" 
                                           class="form-control @error('judul') is-invalid @enderror" 
                                           value="{{ old('judul', $daftar->judul) }}"
                                           placeholder="Masukkan judul pendaftaran...">
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" 
                                              id="deskripsi" 
                                              class="form-control @error('deskripsi') is-invalid @enderror" 
                                              rows="4"
                                              placeholder="Masukkan deskripsi pendaftaran...">{{ old('deskripsi', $daftar->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="link_form">Link Google Form</label>
                                    <input type="url" 
                                           name="link_form" 
                                           id="link_form" 
                                           class="form-control @error('link_form') is-invalid @enderror" 
                                           value="{{ old('link_form', $daftar->link_form) }}"
                                           placeholder="https://docs.google.com/forms/d/e/.../viewform">
                                    @error('link_form')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control selectric">
                                        <option value="1" {{ $daftar->status ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ !$daftar->status ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>

                                <div class="form-group text-right">
                                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Simpan Perubahan
                                    </button>
                                </div>
                            </form>
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
