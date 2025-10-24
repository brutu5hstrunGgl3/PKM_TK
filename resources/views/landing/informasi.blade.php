@extends('landing.layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container-fluid hero">
     <div class="container-fluid events py-5 bg-light">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    Kegiatan Belajar
                </h4>
                <h1 class="mb-5 display-3">Jadwal Kegiatan Event Siswa</h1>
            </div>

            <div class="row g-5 justify-content-center">
                @forelse ($events as $event)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="events-item rounded" style="background-color:#0d47a1;">
                            <div class="events-inner position-relative">
                                <div class="events-img overflow-hidden rounded-circle position-relative">
                                    <img src="{{ asset('storage/' . e($event->image)) }}"
                                        class="img-fluid w-100 rounded-circle" alt="Event Image">
                                    <div class="event-overlay">
                                        <a href="{{ asset('storage/' . e($event->image)) }}"
                                            data-lightbox="event-{{ e($event->id) }}">
                                            <i class="fas fa-search-plus text-white fa-2x"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="px-4 py-2 bg-secondary text-white text-center events-rate">
                                    {{ e($event->date) }}
                                </div>

                                <div class="d-flex justify-content-between px-4 py-2 bg-secondary">
                                    <small class="text-white">
                                        <i class="fas fa-calendar me-1 text-primary"></i> {{ e($event->time) }}
                                    </small>
                                    <small class="text-white">
                                        <i class="fas fa-map-marker-alt me-1 text-primary"></i> {{ e($event->location) }}
                                    </small>
                                </div>
                            </div>

                            <div class="events-text p-4 border border-primary bg-white border-top-0 rounded-bottom">
                                <a href="#" class="h4">{{ e($event->description) }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <p>Belum ada event yang tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
 
</div>
@endsection
