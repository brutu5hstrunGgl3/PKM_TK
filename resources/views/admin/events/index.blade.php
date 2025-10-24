@extends('layouts dashboard.app')

@section('title', 'Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush
@section('main')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kegiatan </h1>
               
                <div class="section-header-breadcrumb">
                   
                </div>
            </div>
            <div class="section-body">
                
          

                
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                           
                                <h4>Kegiatan</h4>
                            </div>
                           
                                <div class="card-body">
                                <div class="float-left">
                                </div>
                                
                                <a href=" {{route('events.create')}}" class="btn btn-primary">Tambah Data</a>
                                
                              
                                </div>
                               
                                </div>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Data Kegiatan</h4>
      </div>
      <div class="card-body">
        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table-events">
            <thead>
              <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>Kegiatan</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Publish</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($events as $key => $event)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                  @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" width="80" class="rounded">
                  @else
                    <span class="text-muted">Tidak ada</span>
                  @endif
                </td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->location }}</td>
                <td>
                  <span class="badge {{ $event->is_published ? 'badge-success' : 'badge-secondary' }}">
                    {{ $event->is_published ? 'Ya' : 'Tidak' }}
                  </span>
                </td>
                <td>
                  <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus event ini?')">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
