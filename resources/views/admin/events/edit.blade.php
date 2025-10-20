@extends('layouts dashboard.app')

@section('title', 'Edit Event')

@push('style')
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Event</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('events.index') }}">Event</a></div>
        <div class="breadcrumb-item active">Edit Event</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4>Form Edit Event</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" name="date" value="{{ old('date', $event->date) }}" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Waktu</label>
              <input type="text" name="time" value="{{ old('time', $event->time) }}" class="form-control">
            </div>

            <div class="form-group">
              <label>Lokasi</label>
              <input type="text" name="location" value="{{ old('location', $event->location) }}" class="form-control">
            </div>

            <div class="form-group">
              <label>Deskripsi</label>
              <textarea name="description" class="form-control" rows="5">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="form-group">
              <label>Gambar Saat Ini</label><br>
              @if($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" width="100" class="rounded mb-2">
              @else
                <p class="text-muted">Belum ada gambar</p>
              @endif
              <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
              <label>Status Publish</label>
              <select name="is_published" class="form-control selectric">
                <option value="1" {{ $event->is_published ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ !$event->is_published ? 'selected' : '' }}>Tidak</option>
              </select>
            </div>

            <div class="form-group text-right">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
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
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
