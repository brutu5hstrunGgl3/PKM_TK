@extends('layouts dashboard.app')

@section('title', 'Edit Kontak')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Kontak</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('contact.index') }}">Kontak</a></div>
                <div class="breadcrumb-item active">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Kontak</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Nomor Telepon --}}
                                <div class="form-group">
                                    <label for="phone">Nomor Telepon <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="phone" 
                                           id="phone" 
                                           value="{{ old('phone', $contact->phone) }}" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           placeholder="Contoh: +62 812 3456 7890" 
                                           required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Alamat --}}
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" 
                                              id="alamat" 
                                              class="form-control @error('alamat') is-invalid @enderror" 
                                              placeholder="Masukkan alamat lengkap">{{ old('alamat', $contact->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Sosial Media --}}
                                @php
                                    // Ambil data sosial media dari JSON
                                    $sosmed = $contact->sosmed;
                                @endphp

                                <div class="border rounded p-3 mb-3">
                                    <h6 class="mb-3 font-weight-bold">Sosial Media</h6>

                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="url" 
                                               name="facebook" 
                                               id="facebook" 
                                               value="{{ $contact->sosmed['facebook'] ?? '' }}" 
                                               class="form-control @error('facebook') is-invalid @enderror" 
                                               placeholder="https://facebook.com/username">
                                        @error('facebook')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="url" 
                                               name="instagram" 
                                               id="instagram" 
                                               value="{{ $contact->sosmed['instagram'] ?? '' }}" 
                                               class="form-control @error('instagram') is-invalid @enderror" 
                                               placeholder="https://instagram.com/username">
                                        @error('instagram')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="youtube">Youtube</label>
                                        <input type="url" 
                                               name="youtube" 
                                               id="youtube" 
                                               value="{{ $contact->sosmed['youtube'] ?? '' }}" 
                                               class="form-control @error('youtube') is-invalid @enderror" 
                                               placeholder="https://youtube.com/username">
                                        @error('youtube')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tiktok">TikTok</label>
                                        <input type="url" 
                                               name="tiktok" 
                                               id="tiktok" 
                                               value="{{ $contact->sosmed['tiktok'] ?? '' }}" 
                                               class="form-control @error('tiktok') is-invalid @enderror" 
                                               placeholder="https://tiktok.com/@username">
                                        @error('tiktok')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-right">
                                    <a href="{{ route('contact.index') }}" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
