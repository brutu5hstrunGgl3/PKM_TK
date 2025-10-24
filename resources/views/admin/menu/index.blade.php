@extends('layouts dashboard.app')

@section('title', 'Daftar Menu Navbar')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Menu Navbar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('menu.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active">Menu</div>
            </div>
        </div>

        <div class="section-body">
            <a href="{{ route('menu.create') }}" class="btn btn-primary mb-4">
                <i class="fas fa-plus"></i> Tambah Menu
            </a>

            <div class="card">
                <div class="card-header">
                    <h4>Data Menu Navbar</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="menu-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>URL</th>
                                    <th>Urutan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->url }}</td>
                                        <td class="text-center">{{ $menu->order }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('menu.edit', $menu) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('menu.destroy', $menu) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Hapus menu ini?')" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada menu</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#menu-table').DataTable({
                "language": {
                    "emptyTable": "Belum ada data menu"
                }
            });
        });
    </script>
@endpush
