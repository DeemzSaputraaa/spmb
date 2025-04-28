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
    
    .btn-success {
        background-color: #1cc88a;
        color: #fff !important;
        border-radius: 5px;
        padding: 8px 15px;
        font-weight: 500;
        border: none;
        transition: all 0.3s;
        text-decoration: none;
    }
    
    .btn-success:hover {
        background-color: #169b6b;
        transform: translateY(-2px);
        color: #fff !important;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .dropdown-menu {
        border-radius: 0.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: none;
        padding: 0.5rem 0;
    }
    
    .dropdown-item {
        padding: 0.6rem 1.2rem;
        transition: all 0.2s;
        display: flex;
        align-items: center;
    }
    
    .dropdown-item:hover {
        background-color: #f8f9fc;
        color: #4e73df;
        transform: translateX(5px);
    }
    
    .dropdown-item i {
        width: 20px;
        text-align: center;
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
            width: auto;
            font-size: 0.75rem;
            padding: 6px 10px;
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
        
        .page-header .d-flex {
            flex-direction: row;
            width: 100%;
            justify-content: space-between;
            gap: 5px !important;
        }
        
        .page-header .btn {
            width: auto;
            margin-bottom: 0;
            font-size: 0.75rem;
            padding: 6px 10px;
        }
        
        .dropdown {
            width: auto;
        }
        
        .dropdown button {
            width: auto;
            font-size: 0.75rem;
            padding: 6px 10px;
        }
        
        .dropdown button .me-2 {
            margin-right: 0.1rem !important;
        }
        
        .page-header i.fas {
            font-size: 0.75rem;
        }
        
        .dropdown-toggle::after {
            margin-left: 0.25rem;
        }
        
        .btn-success, .btn-add {
            white-space: nowrap;
        }
    }
    
    /* Modal confirmation styles */
    .modal-confirm {
        color: #636363;
    }
    
    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 12px;
        border: none;
    }
    
    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
        text-align: center;
        margin: -20px -20px 0;
        border-radius: 12px 12px 0 0;
        padding: 35px;
    }
    
    .modal-confirm h4 {
        color: white;
        text-align: center;
        font-size: 26px;
        margin: 0;
    }
    
    .modal-confirm .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -30px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        z-index: 9;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }
    
    .modal-confirm .icon-box i {
        font-size: 24px;
        margin-top: 6px;
    }
    
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.4s;
        min-width: 120px;
    }
    
    .modal-confirm .btn-secondary {
        background: #c1c1c1;
        border: none;
    }
    
    .modal-confirm .btn-danger {
        background: #dc3545;
        border: none;
    }
    
    .modal-confirm .btn-warning {
        background: #f6c23e;
        border: none;
        color: #fff;
    }
    
    .modal-confirm .btn:hover {
        opacity: 0.8;
    }
    
    .modal-confirm .modal-body {
        padding: 20px;
    }
    
    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 0 0 12px 12px;
        padding: 10px 0 20px;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                // Hanya submit form jika nilai input telah berubah
                // dan telah beberapa waktu sejak pengguna terakhir mengetik
                clearTimeout(this.timer);
                this.timer = setTimeout(() => {
                    document.getElementById('searchForm').submit();
                }, 500);
            });
            
            // Auto focus pada field search saat halaman dimuat
            if (!searchInput.value) {
                searchInput.focus();
            }
        }
        
        // Setup delete confirmation
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const tabulasiId = this.getAttribute('data-id');
                const siswaNama = this.getAttribute('data-name');
                
                // Populate modal with data
                document.getElementById('delete-siswa-name').textContent = siswaNama;
                
                // Setup form action dengan URL yang benar
                const deleteForm = document.getElementById('deleteForm');
                deleteForm.setAttribute('action', `/admin/tabulasi/${tabulasiId}`);
                
                // Show modal
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            });
        });
        
        // Setup edit confirmation
        const editButtons = document.querySelectorAll('.btn-edit');
        editButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const tabulasiId = this.getAttribute('data-id');
                const siswaNama = this.getAttribute('data-name');
                
                // Populate modal with data
                document.getElementById('edit-siswa-name').textContent = siswaNama;
                
                // Setup link dengan URL yang benar
                document.getElementById('editConfirmButton').href = `/admin/tabulasi/${tabulasiId}/edit`;
                
                // Show modal
                const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();
            });
        });
    });
</script>
@endsection

@section('content')
<div class="page-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Tabulasi Nilai Siswa</h1>
        <div class="d-flex gap-2">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-file-export me-2"></i> Export Data
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="exportDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.tabulasi.export.excel') }}"><i class="fas fa-file-excel me-2"></i> Export Excel (.xls)</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.tabulasi.export.csv') }}"><i class="fas fa-file-csv me-2"></i> Export CSV</a></li>
                </ul>
            </div>
            <a href="{{ route('admin.tabulasi.create') }}" class="btn btn-add">
                <i class="fas fa-plus me-2"></i> Tambah Nilai
            </a>
        </div>
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
                            <button class="btn btn-sm btn-warning me-2 btn-edit" 
                                data-id="{{ $item->id }}" 
                                data-name="{{ $item->nama_siswa }}"
                                title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger btn-delete"
                                data-id="{{ $item->id }}"
                                data-name="{{ $item->nama_siswa }}"
                                title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-confirm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <div class="icon-box bg-danger">
                    <i class="fas fa-trash text-white"></i>
                </div>
                <h4 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Apakah Anda yakin ingin menghapus data nilai untuk siswa:<br><strong id="delete-siswa-name"></strong>?</p>
                <p class="text-center text-muted small">Data yang dihapus tidak dapat dikembalikan!</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Confirmation Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-confirm">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <div class="icon-box bg-warning">
                    <i class="fas fa-edit text-white"></i>
                </div>
                <h4 class="modal-title" id="editModalLabel">Konfirmasi Edit</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Anda akan mengedit data nilai untuk siswa:<br><strong id="edit-siswa-name"></strong></p>
                <p class="text-center text-muted small">Pastikan data yang akan diubah sudah benar</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a id="editConfirmButton" href="#" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection