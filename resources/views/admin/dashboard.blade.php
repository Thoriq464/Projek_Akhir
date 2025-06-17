@extends('admin.main')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-tachometer-alt text-primary me-2"></i>
                Dashboard Kamus Jawa
            </h1>
            <p class="text-muted mb-0">Kelola dan pantau data kosakata bahasa Jawa</p>
        </div>
        <div class="btn-group">
            <a href="{{ route('dashboard.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Kosakata
            </a>
            <a href="{{ route('dashboard.importForm') }}" class="btn btn-success">
                <i class="fas fa-upload me-2"></i>Import CSV
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show animate-slideUp" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <strong>Berhasil!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Statistics Cards Row -->
    <div class="row mb-4">
        <!-- Total Kosakata Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 animate-fadeIn">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Kosakata
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($jumlahKosakata) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Row -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow animate-slideUp">
                <div class="card-header bg-gradient-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-bolt me-2"></i>Aksi Cepat
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('dashboard.create') }}" class="btn btn-outline-primary w-100 py-3">
                                <i class="fas fa-plus-circle fa-2x d-block mb-2"></i>
                                <strong>Tambah Kata Baru</strong>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('dashboard.importForm') }}" class="btn btn-outline-success w-100 py-3">
                                <i class="fas fa-file-upload fa-2x d-block mb-2"></i>
                                <strong>Import Data CSV</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- Main Data Table -->
    <div class="card shadow mb-4 animate-slideUp">
        <div class="card-header bg-gradient-primary py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-white">
                <i class="fas fa-table me-2"></i>Daftar Kosakata Bahasa Jawa
            </h6>
            <div class="dropdown">
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="filterTable('all')">Semua</a></li>
                    <li><a class="dropdown-item" href="#" onclick="filterTable('noun')">Kata Benda</a></li>
                    <li><a class="dropdown-item" href="#" onclick="filterTable('verb')">Kata Kerja</a></li>
                    <li><a class="dropdown-item" href="#" onclick="filterTable('adjective')">Kata Sifat</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-primary">
                                <i class="fas fa-language me-1"></i>Kata Jawa
                            </th>
                            <th class="text-success">
                                <i class="fas fa-flag me-1"></i>Kata Indonesia
                            </th>
                            <th class="text-info">
                                <i class="fas fa-quote-left me-1"></i>Contoh Kalimat
                            </th>
                            <th class="text-warning">
                                <i class="fas fa-translate me-1"></i>Arti Contoh
                            </th>
                            <th class="text-secondary">
                                <i class="fas fa-tag me-1"></i>Jenis Kata
                            </th>
                            <th class="text-center">
                                <i class="fas fa-cogs me-1"></i>Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kosakata as $kata)
                            <tr class="table-row">
                                <td class="font-weight-bold text-primary">{{ $kata->kata_jawa }}</td>
                                <td>{{ $kata->kata_indonesia }}</td>
                                <td class="text-muted">
                                    {{ Str::limit($kata->contoh_kalimat, 50) }}
                                    @if(strlen($kata->contoh_kalimat) > 50)
                                        <button class="btn btn-link btn-sm p-0" data-bs-toggle="tooltip" 
                                                title="{{ $kata->contoh_kalimat }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    @endif
                                </td>
                                <td class="text-muted">
                                    {{ Str::limit($kata->contoh_kalimat_id, 50) }}
                                </td>
                                <td>
                                    @if($kata->jenis_kata)
                                        <span class="badge bg-info">{{ $kata->jenis_kata }}</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('dashboard.edit', $kata->id) }}" 
                                           class="btn btn-outline-primary" 
                                           data-bs-toggle="tooltip" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-delete-modal" 
                                                data-id="{{ $kata->id }}"
                                                data-kata="{{ $kata->kata_jawa }}"
                                                data-indo="{{ $kata->kata_indonesia }}"
                                                title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                        <h5>Belum ada data kosakata</h5>
                                        <p>Silakan tambah kosakata baru untuk memulai.</p>
                                        <a href="{{ route('dashboard.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus me-2"></i>Tambah Kosakata Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Global -->
    <div class="modal fade" id="globalDeleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Konfirmasi Hapus
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus kosakata berikut?</p>
                    <div class="alert alert-warning" id="deleteModalKosakataInfo">
                        <strong id="deleteModalKataJawa"></strong> - <span id="deleteModalKataIndo"></span>
                    </div>
                    <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Batal
                    </button>
                    <form id="deleteModalForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Filter table function
function filterTable(filter) {
    const table = document.getElementById('dataTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const jenisKata = row.cells[4]?.textContent.toLowerCase();
        
        if (filter === 'all' || jenisKata.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
}

// Modal hapus global
let deleteModal;
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi modal hanya jika elemen ada
    const modalEl = document.getElementById('globalDeleteModal');
    if (modalEl) {
        deleteModal = new bootstrap.Modal(modalEl);
    }

    // Event delegation untuk tombol hapus (agar tetap berfungsi meski tabel di-render ulang)
    document.body.addEventListener('click', function(e) {
        if (e.target.closest('.btn-delete-modal')) {
            const btn = e.target.closest('.btn-delete-modal');
            const id = btn.getAttribute('data-id');
            const kata = btn.getAttribute('data-kata');
            const indo = btn.getAttribute('data-indo');
            document.getElementById('deleteModalKataJawa').textContent = kata;
            document.getElementById('deleteModalKataIndo').textContent = indo;
            const form = document.getElementById('deleteModalForm');
            form.action = "{{ url('admin/dashboard') }}/" + id;
            if (deleteModal) deleteModal.show();
        }
        // FIX: Tutup modal jika klik tombol batal
        if (e.target.matches('[data-bs-dismiss="modal"]')) {
            if (deleteModal) deleteModal.hide();
        }
    });
});
</script>

@endsection