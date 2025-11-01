@extends('layouts dashboard.app')

@section('title', 'Tambah Menu')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Menu Baru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('menu.index') }}">Menu</a></div>
                <div class="breadcrumb-item active">Tambah Menu</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Menu</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('menu.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Menu</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>URL / Link</label>
                            <select name="url" class="form-control selectric @error('url') is-invalid @enderror" required>
                                <option value="">-- Pilih URL --</option>
                                <option value="{{ route('landing') }}" {{ old('url') == route('landing') ? 'selected' : '' }}>Landing Page</option>
                                <option value="/tentang-kami" {{ old('url') == '/infromasi' ? 'selected' : '' }}>Informasi </option>
                                <option value="{{route('/daftar')}}" {{ old('url') == '/daftar' ? 'selected' : '' }}> Pendaftaran</option>
                            </select>
                            @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Urutan</label>
                            <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order') }}">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('menu.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
