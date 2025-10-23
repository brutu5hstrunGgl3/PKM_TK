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
        <div class="breadcrumb-item"><a href="{{ route('teams.index') }}">Teams</a></div>
        <div class="breadcrumb-item active">Edit Teams</div>
      </div>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4>Form Edit Teams</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="name" value="{{ old('name', $team->name) }}" class="form-control">
            </div>
            <div class="form-group">
    <label>Posisi</label>
    <select name="position" class="form-control" required>
        <option value="" disabled {{ old('position', $team->position) == '' ? 'selected' : '' }}>Pilih posisi</option>
        <option value="Guru" {{ old('position', $team->position) == 'Guru' ? 'selected' : '' }}>Guru</option>
        <option value="Ketua Yayasan" {{ old('position', $team->position) == 'Ketua Yayasan' ? 'selected' : '' }}>Ketua Yayasan</option>
    </select>

    @error('position')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>
            <div class="form-group">
              <label>Foto Saat Ini</label><br>
                @if($team->photo)
                    <img src="{{ asset('storage/' . $team->photo) }}" width="100" class="rounded mb-2">
                @else
                    <p class="text-muted">Belum ada foto</p>
                @endif
                <input type="file" name="photo" class="form-control">
                  @error('photo')
                    <div class="text-danger mt-1">{{ $message }}</div>
                  @enderror
            </div>
              <div class="form-group text-right">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
              <a href="{{ route('teams.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
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
