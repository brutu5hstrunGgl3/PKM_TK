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
                <h1>Teams </h1>
               
                <div class="section-header-breadcrumb">
                   
                </div>
            </div>
            <div class="section-body">
                
          

                
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                           
                                <h4>Team</h4>
                            </div>
                           
                                <div class="card-body">
                                <div class="float-left">
                                </div>
                                
                                <a href=" {{route('teams.create')}}" class="btn btn-primary">Tambah Data</a>
                                
                              
                                </div>
                               
                                </div>

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Data Event</h4>
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
                <th>Nama</th>
                <th>Foto</th>
                <th>Posisi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teams as $key => $team)
              <tr>
                <td>{{ $key + 1 }}</td>
                
                <td>{{ $team->name }}</td>
                <td>{{ $team->position }}</td>
                <td>
                  @if($team->photo)
                    <img src="{{ asset('storage/' . $team->photo) }}" width="80" class="rounded">
                  @else
                    <span class="text-muted">Tidak ada</span>
                  @endif
                </td>
               
                <td>
                  <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline">
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
