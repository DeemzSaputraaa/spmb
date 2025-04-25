@extends('layouts.admin')

@section('title', 'Tabulasi Nilai')

@section('styles')
<style>
    .search-container {
        position: relative;
        width: 100%;
        max-width: 400px;
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #aaa;
    }

    .search-input {
        width: 100%;
        padding: 10px 15px 10px 40px;
        border-radius: 50px;
        border: 1px solid #e3e6f0;
        transition: all 0.3s;
        background-color: #f8f9fc;
    }

    .search-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        border-color: #bac8f3;
        outline: none;
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

    .filter-container {
        background-color: #f8f9fc;
        border-radius: 0.5rem;
        padding: 15px;
        margin-bottom: 20px;
    }

    .filter-label {
        font-weight: 600;
        color: #4e73df;
        margin-bottom: 8px;
    }
</style>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tabulasi Nilai Siswa</h1>
    <a href="{{ route('admin.tabulasi.create') }}" class="btn btn-primary">
        <i class="fas fa-plus fa-sm"></i> Tambah Nilai
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tabulasi Nilai Siswa</h6>
        <form id="searchForm" action="{{ route('admin.tabulasi.index') }}" method="GET" class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="searchInput" name="search" class="search-input"
                placeholder="Cari NISN, nama, atau email..." value="{{ request('search') }}" autocomplete="off">
        </form>
    </div>

    <div class="card-body">
        <div class="filter-container">
            <div class="row">
                <form method="GET" class="mb-4">
                    <div class="d-flex flex-column">
                        <select name="jalur" class="form-select mb-2" aria-label="Filter Jalur">
                            <option value="" selected disabled>-- Pilih Jalur --</option>
                            <option value="Afirmasi" {{ request('jalur') == 'Afirmasi' ? 'selected' : '' }}>Afirmasi
                            </option>
                            <option value="Prestasi" {{ request('jalur') == 'Prestasi' ? 'selected' : '' }}>Prestasi
                            </option>
                            <option value="Domisili" {{ request('jalur') == 'Domisili' ? 'selected' : '' }}>Domisili
                            </option>
                            <option value="Mutasi" {{ request('jalur') == 'Mutasi' ? 'selected' : '' }}>Mutasi</option>
                        </select>

                        <!-- Tombol Action -->
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" name="apply" class="btn btn-primary btn-sm">
                                <i class="fas fa-check me-1"></i> Apply
                            </button>

                            <a href="{{ route('admin.tabulasi.index') }}"
                                class="btn btn-outline-secondary btn-sm {{ !request()->has('jalur') ? 'disabled' : '' }}">
                                <i class="fas fa-undo me-1"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive">
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
                        <td>
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
                            <div class="d-flex">
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
                                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="No Data"
                                    style="width: 100px; height: 100px; opacity: 0.5" class="mb-3">
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
            <div class="d-flex justify-content-between align-items-center mt-3">
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
</div>
@endsection