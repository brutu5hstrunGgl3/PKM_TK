@extends('layouts dashboard.app')

@section('title', 'Tambah Event')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('events.index') }}">Event</a></div>
                <div class="breadcrumb-item active">Tambah Event</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Event</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" placeholder="Contoh: 29 Nov" required>
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Waktu</label>
                            <input type="text" name="time" class="form-control" placeholder="Contoh: 10:00am - 12:00pm">
                        </div>

                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="location" class="form-control" placeholder="Contoh: Jakarta">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Tulis deskripsi kegiatan..."></textarea>
                        </div>

                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Status Publish</label>
                            <select name="is_published" class="form-control selectric">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('events.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
