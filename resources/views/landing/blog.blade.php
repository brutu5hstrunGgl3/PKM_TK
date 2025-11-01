@extends('landing.layouts.app')

@section('title', 'Pendaftaran Siswa Baru')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="text-center mb-5">
        
    </div>

    <!-- Form Section -->
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            @if ($daftar && $daftar->link_form)
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <iframe 
                            src="{{ $daftar->link_form }}" 
                            style="width: 100%; min-height: 800px; border: none;" 
                            frameborder="0" 
                            allowfullscreen
                            scrolling="yes"
                        >
                            Memuat Formulir...
                        </iframe>
                    </div>
                </div>
            @else
                <div class="alert alert-warning text-center">
                    Formulir pendaftaran belum tersedia.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
