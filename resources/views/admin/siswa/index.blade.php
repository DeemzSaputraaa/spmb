@extends('layouts.admin')

@section('title', 'Data Siswa')

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
    
    .search-icon {
        position: absolute;
        left: 25px;
        top: 50%;
        transform: translateY(-50%);
        color: #aaa;
    }
    
    .table-container {
        margin-top: 20px;
        overflow: auto;
        border: 1px solid #e3e6f0;
        border-radius: 5px;
    }
    
    .action-buttons .btn {
        margin-right: 5px;
        width: 36px;
        height: 36px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
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
                const siswaId = this.getAttribute('data-id');
                const siswaName = this.getAttribute('data-name');
                
                // Populate modal with data
                document.getElementById('delete-siswa-name').textContent = siswaName;
                
                // Setup form action dengan URL yang benar
                const deleteForm = document.getElementById('deleteForm');
                deleteForm.setAttribute('action', `/admin/siswa/${siswaId}`);
                
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
                const siswaId = this.getAttribute('data-id');
                const siswaName = this.getAttribute('data-name');
                
                // Populate modal with data
                document.getElementById('edit-siswa-name').textContent = siswaName;
                
                // Setup link dengan URL yang benar
                document.getElementById('editConfirmButton').href = `/admin/siswa/${siswaId}/edit`;
                
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
        <h1 class="page-title">Data Siswa</h1>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-add">
            Tambah Siswa
        </a>
    </div>
    
    <!-- Search Bar -->
    <div class="position-relative">
        <form id="searchForm" action="{{ route('admin.siswa.index') }}" method="GET">
            <input type="text" id="searchInput" name="search" class="search-box" 
                   placeholder="Cari NISN, nama, atau email..." 
                   value="{{ request('search') }}" autocomplete="off">
        </form>
    </div>
    
    <!-- Data Table -->
    <div class="table-container">
        <table class="table table-hover m-0">
            <thead class="bg-light">
                <tr>
                    <th class="px-4 py-3" width="5%">#</th>
                    <th class="px-4 py-3">Siswa</th>
                    <th class="px-4 py-3">NISN</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Nomor HP</th>
                    <th class="px-4 py-3">Tanggal Daftar</th>
                    <th class="px-4 py-3" width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswas as $index => $siswa)
                <tr>
                    <td class="px-4 py-3">{{ $siswas->firstItem() + $index }}</td>
                    <td class="px-4 py-3">
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($siswa->nama_lengkap) }}&background=4e73df&color=ffffff" class="table-avatar" alt="{{ $siswa->nama_lengkap }}" style="width: 36px; height: 36px; border-radius: 50%; margin-right: 10px;">
                            <div>
                                <div class="fw-bold">{{ $siswa->nama_lengkap }}</div>
                                <small class="text-muted">NIK: {{ Str::limit($siswa->nik, 8) }}...</small>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3"><span class="badge-nisn">{{ $siswa->nisn }}</span></td>
                    <td class="px-4 py-3">{{ $siswa->email }}</td>
                    <td class="px-4 py-3">{{ $siswa->nomor_hp }}</td>
                    <td class="px-4 py-3">{{ $siswa->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-3">
                        <div class="action-buttons d-flex">
                            <a href="{{ route('admin.siswa.pendaftaran.index', $siswa->id) }}" class="btn btn-sm btn-primary" title="Pendaftaran">
                                <i class="fas fa-school"></i>
                            </a>
                            <button class="btn btn-sm btn-warning btn-edit" 
                                    data-id="{{ $siswa->id }}" 
                                    data-name="{{ $siswa->nama_lengkap }}" 
                                    title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger btn-delete" 
                                    data-id="{{ $siswa->id }}" 
                                    data-name="{{ $siswa->nama_lengkap }}" 
                                    title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar-circle">
                                <i class="fas fa-user-slash"></i>
                            </div>
                            <h5>Data Siswa Kosong</h5>
                            <p class="text-muted">Belum ada data siswa yang terdaftar</p>
                            <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Tambah Siswa Baru
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($siswas->count() > 0)
        <div class="d-flex justify-content-between align-items-center p-3 border-top">
            <div class="text-muted">
                Menampilkan {{ $siswas->firstItem() }} sampai {{ $siswas->lastItem() }} dari {{ $siswas->total() }} data
            </div>
            <div>
                {{ $siswas->withQueryString()->links() }}
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
                <p class="text-center">Apakah Anda yakin ingin menghapus data siswa:<br><strong id="delete-siswa-name"></strong>?</p>
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
                <p class="text-center">Anda akan mengedit data siswa:<br><strong id="edit-siswa-name"></strong></p>
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