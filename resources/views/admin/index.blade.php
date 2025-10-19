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
                <h1>Sistem Informasi CMS </h1>
               
                <div class="section-header-breadcrumb">
                   
                </div>
            </div>
            <div class="section-body">
                
          

                
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                           
                                <h4>All Posts</h4>
                            </div>
                           
                                <div class="card-body">
                                <div class="float-left">
                                </div>
                                
                                <a href=" {{route('content.create')}}" class="btn btn-primary">Tambah Data</a>
                                
                              
                                </div>
                               
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search" name="jenis_paket">
                                                
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Aksi</th>
                                           
                                        </tr>
                                            @forelse ($contents as $content)
                                            <tr>
                                            <td>
                                           {{ $content->title }}
                                            </td>
                                            <td>
                                          {{ $content->description }}
                                            </td>
                                          <td>
                                            @if  ($content->image)
                                                <img src="{{ asset('storage/' . $content->image) }}" alt="Gambar" width="100" class="rounded">
                                            @else
                                                <span class="text-gray-500">Tidak ada gambar</span>
                                            @endif
                                        </td>
                                            </td>
                                           
                                            <td>
                        <div class="d-flex gap-2">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('content.edit', $content->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('content.destroy', $content->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                                        </tr>
                                          @empty
                                            
                                                        
                                                        <!-- Modal Konfirmasi Penghapusan -->

                                                        <!-- ====== -->
                                                    </div>
                                            </td>
                                        </tr>
                                   @endforelse

                                        </tbody>

                                    </table>
                                </div>
                                <div class="float-right">
                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
