@extends('layouts.admin')

@section('title', 'Tabulasi Nilai')

@section('styles')
<style>
    .page-wrapper {
        padding: 10px 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }
    
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #e3e6f0;
        margin-bottom: 20px;
    }
    
    .page-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
        margin: 0;
    }
    
    .btn-add {
        background-color: #343a40;
        color: #fff !important;
        border-radius: 5px;
        padding: 8px 15px;
        font-weight: 500;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
    }
    
    .btn-add:hover {
        background-color: #23272b;
        transform: translateY(-2px);
        color: #fff !important;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .search-box {
        width: 100%;
        margin: 15px 0;
        padding: 10px;
        border: none;
        border-radius: 5px;
        outline: none;
        transition: all 0.2s;
        background-color: #f8f9fc;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }
    
    .search-box:focus {
        box-shadow: 0 2px 15px rgba(78, 115, 223, 0.1);
    }
    
    .table-container {
        margin-top: 20px;
        overflow: auto;
        border: 1px solid #e3e6f0;
        border-radius: 5px;
    }
    
    .filter-container {
        background-color: #f8f9fc;
        border-radius: 0.5rem;
        padding: 18px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: none;
        transition: all 0.3s ease;
    }
    
    .filter-container:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    }
    
    .ranking-badge {
        font-size: 0.9rem;
        font-weight: 600;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    
    .ranking-1 {
        background-color: #FFD700;
        color: #000;
    }
    
    .ranking-2 {
        background-color: #C0C0C0;
        color: #000;
    }
    
    .ranking-3 {
        background-color: #CD7F32;
        color: #000;
    }
    
    .ranking-other {
        background-color: #f8f9fc;
        color: #5a5c69;
        border: 1px solid #eaecf4;
    }
    
    .avatar-circle {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        background-color: #4e73df;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: bold;
        margin: 0 auto 15px;
    }
    
    .form-select {
        border: 1px solid #e3e6f0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
        padding: 8px 12px;
        border-radius: 5px;
        font-weight: 500;
        background-color: white;
        cursor: pointer;
        height: 38px;
    }
    
    .form-select:hover {
        border-color: #cfd5ea;
        box-shadow: 0 3px 10px rgba(78, 115, 223, 0.1);
    }
    
    .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.15);
        border-color: #bac8f3;
    }
    
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        color: #fff !important;
        text-decoration: none;
        font-weight: 500;
        padding: 8px 16px;
        border-radius: 5px;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        box-shadow: 0 2px 5px rgba(78, 115, 223, 0.15);
    }
    
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2e59d9;
        color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(78, 115, 223, 0.25);
    }
    
    .btn-outline-secondary {
        border: 1px solid #d1d3e2;
        color: #6c757d !important;
        text-decoration: none;
        font-weight: 500;
        padding: 8px 16px;
        border-radius: 5px;
        transition: all 0.3s;
        background-color: white;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
    
    .btn-outline-secondary:hover {
        background-color: #f8f9fc;
        color: #5a5c69 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .btn-sm {
        padding: 6px 12px;
        font-size: 0.85rem;
    }
    
    @media (max-width: 767px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .search-box {
            margin-bottom: 20px;
        }
        
        .btn-add {
            width: 100%;
        }
        
        .filter-container .d-flex {
            flex-direction: column;
            align-items: stretch;
        }
        
        .filter-container {
            padding: 15px;
        }
        
        .filter-container .flex-grow-1,
        .filter-container .d-flex {
            width: 100%;
        }
        
        .filter-container select.form-select {
            width: 100%;
            margin-bottom: 15px;
        }
        
        .filter-container .btn {
            width: 100%;
            margin-bottom: 8px;
            margin-top: 0;
            justify-content: center;
            height: 38px;
        }
        
        .filter-container .d-flex.gap-2 {
            gap: 8px !important;
        }
    }
</style>
@endsection

@section('content')
<div class="page-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Tabulasi Nilai Siswa</h1>
        <a href="{{ route('admin.tabulasi.create') }}" class="btn btn-add">
            <i class="fas fa-plus me-2"></i> Tambah Nilai
        </a>
    </div>
    
    <!-- Search Bar -->
    <div class="position-relative">
        <form id="searchForm" action="{{ route('admin.tabulasi.index') }}" method="GET">
            <input type="text" id="searchInput" name="search" class="search-box" 
                placeholder="Cari NISN atau nama..." value="{{ request('search') }}" autocomplete="off">
        </form>
    </div>
    
    <!-- Filter Section -->
    <div class="filter-container">
        <form method="GET" class="mb-0">
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <div class="flex-grow-1">
                    <select name="jalur" class="form-select" aria-label="Filter Jalur">
                        <option value="" selected disabled>-- Pilih Jalur --</option>
                        <option value="Afirmasi" {{ request('jalur') == 'Afirmasi' ? 'selected' : '' }}>Afirmasi</option>
                        <option value="Prestasi" {{ request('jalur') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                        <option value="Domisili" {{ request('jalur') == 'Domisili' ? 'selected' : '' }}>Domisili</option>
                        <option value="Mutasi" {{ request('jalur') == 'Mutasi' ? 'selected' : '' }}>Mutasi</option>
                    </select>
                </div>

                <!-- Tombol Action -->
                <div class="d-flex gap-2 mobile-buttons">
                    <button type="submit" name="apply" class="btn btn-primary btn-sm">
                        <i class="fas fa-check"></i> Apply
                    </button>

                    <a href="{{ route('admin.tabulasi.index') }}"
                        class="btn btn-outline-secondary btn-sm {{ !request()->has('jalur') ? 'disabled' : '' }}">
                        <i class="fas fa-undo"></i> Reset
                    </a>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Data Table -->
    <div class="table-container">
        <table class="table table-bordered table-hover">
            <thead class="bg-light">
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">Ranking</th>
                    <th width="15%">NISN</th>
                    <th>Nama Siswa</th>
                    <th width="15%">Jalur</th>
                    <th width="15%">Jurusan</th>
                    <th width="10%">Nilai Akhir</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tabulasi as $index => $item)
                <tr>
                    <td>{{ $tabulasi->firstItem() + $index }}</td>
                    <td class="text-center">
                        @if($index + $tabulasi->firstItem() < 4) <span
                            class="ranking-badge ranking-{{ $index + $tabulasi->firstItem() }}">
                            {{ $index + $tabulasi->firstItem() }}
                            </span>
                            @else
                            <span class="ranking-badge ranking-other">
                                {{ $index + $tabulasi->firstItem() }}
                            </span>
                            @endif
                    </td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama_siswa }}</td>
                    <td>{{ $item->jalur }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td class="fw-bold">{{ number_format($item->nilai_akhir, 2) }}</td>
                    <td>
                        <div class="d-flex action-buttons">
                            <a href="{{ route('admin.tabulasi.edit', $item->id) }}"
                                class="btn btn-sm btn-warning me-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.tabulasi.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus data nilai ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar-circle">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <h5>Data Tabulasi Kosong</h5>
                            <p class="text-muted">Belum ada data nilai yang tercatat</p>
                            <a href="{{ route('admin.tabulasi.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Tambah Data Nilai
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @if($tabulasi->count() > 0)
        <div class="d-flex justify-content-between align-items-center p-3 border-top">
            <div class="text-muted">
                Menampilkan {{ $tabulasi->firstItem() }} sampai {{ $tabulasi->lastItem() }} dari
                {{ $tabulasi->total() }} data
            </div>
            <div>
                {{ $tabulasi->withQueryString()->links() }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection