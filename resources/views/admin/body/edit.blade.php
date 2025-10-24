@extends('layouts dashboard.app')

@section('title', 'Edit Konten')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Konten</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('body.index') }}">Konten</a></div>
                <div class="breadcrumb-item active">Edit Konten</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Konten</h4>
                </div>

                <div class="card-body">

                    {{-- Notifikasi error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <div class="alert-title">Terjadi Kesalahan</div>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('body.update', $body->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" 
                                   name="judul" 
                                   value="{{ old('judul', $body->judul) }}" 
                                   class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="content" 
                                      rows="4" 
                                      class="form-control @error('content') is-invalid @enderror">{{ old('content', $body->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gambar</label><br>
                            @if($body->image)
                                <img src="{{ asset('storage/'.$body->image) }}" 
                                     alt="Preview" 
                                     class="img-thumbnail mb-3" 
                                     style="max-width: 200px;">
                            @endif
                            <input type="file" 
                                   name="image" 
                                   class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('body.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>

                    </form>
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
