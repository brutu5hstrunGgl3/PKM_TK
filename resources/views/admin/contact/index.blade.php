@extends('layouts dashboard.app')

@section('title', 'Kontak')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Kontak</h1>
            <div class="section-header-breadcrumb"></div>
        </div>

        <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Kontak</h4>
                        </div>

                        <div class="card-body">
                            <div class="float-left">
                                <a href="{{ route('contact.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>

                            <div class="float-right">
                                <form method="GET" action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari..." name="search" value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th>
                                            <th>Sosial Media</th>
                                            <th>Dibuat</th>
                                            <th>Diperbarui</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($contacts as $contact)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->alamat ?? '-' }}</td>
                                                <td>
                                                    @if (!empty($contact->sosmed))
                                                    <div class="footer-icon d-flex justify-content-center">
                                                        @foreach ($contact->sosmed as $platform => $url)
                                                            @if (!empty($url))
                                                                <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white"
                                                                href="{{ $url }}" target="_blank" title="{{ ucfirst($platform) }}">
                                                                    <i class="fab fa-{{ $platform == 'x' ? 'youtube' : $platform }}"></i>
                                                                </a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span class="text-muted">Tidak ada sosial media tersedia.</span>
                                                @endif
                                                </td>
                                                <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                                                <td>{{ $contact->updated_at->format('d M Y H:i') }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-sm btn-info">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kontak ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted py-4">
                                                    Belum ada data kontak.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- Pagination opsional --}}
                            {{-- <div class="float-right">
                                {{ $contacts->links() }}
                            </div> --}}
                        </div>
                    </div>
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
