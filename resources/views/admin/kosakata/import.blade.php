@extends('admin.main')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-file-import text-primary mr-2"></i>
                Import Kosakata
            </h1>
            <p class="mb-0 text-muted">Upload file CSV untuk menambahkan data kosakata secara massal</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active">Import CSV</li>
            </ol>
        </nav>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <!-- Upload Card -->
            <div class="card shadow-lg mb-4 border-0">
                <div class="card-header py-4 bg-gradient-primary border-0">
                    <div class="d-flex align-items-center">
                        <div class="bg-white rounded-circle p-2 mr-3">
                            <i class="fas fa-upload text-primary fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="m-0 font-weight-bold text-white">Upload File CSV</h5>
                            <p class="m-0 text-white-50 small">Pilih file CSV yang berisi data kosakata</p>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle mr-3 fa-lg"></i>
                                <div>
                                    <strong>Berhasil!</strong><br>
                                    <span class="text-muted">{{ session('success') }}</span>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-exclamation-triangle mr-3 fa-lg mt-1"></i>
                                <div>
                                    <strong>Terjadi kesalahan:</strong>
                                    <ul class="mb-0 mt-2 pl-3">
                                        @foreach($errors->all() as $error)
                                            <li class="text-muted">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('dashboard.importCsv') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="csv_file" class="form-label font-weight-bold text-gray-700 mb-2">
                                <i class="fas fa-file-csv text-muted mr-2"></i>
                                File CSV
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="csv_file" name="csv_file" accept=".csv,.txt" required>
                                <label class="custom-file-label" for="csv_file">Pilih file CSV...</label>
                                <div class="invalid-feedback">
                                    Silakan pilih file CSV yang valid.
                                </div>
                            </div>
                            <small class="form-text text-muted mt-2">
                                <i class="fas fa-info-circle mr-1"></i>
                                File harus berformat CSV (.csv) atau text (.txt) dengan ukuran maksimal 2MB
                            </small>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Format Information Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light border-0 py-3">
                    <h6 class="m-0 font-weight-bold text-gray-700">
                        <i class="fas fa-info-circle text-info mr-2"></i>
                        Format File CSV
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold text-gray-800 mb-3">Struktur Data:</h6>
                            <div class="bg-light p-3 rounded mb-3">
                                <code class="text-dark">
                                    kata_jawa,kata_indonesia,contoh_kalimat,contoh_kalimat_id,jenis_kata
                                </code>
                            </div>
                            <p class="text-muted small mb-0">
                                <i class="fas fa-exclamation-triangle text-warning mr-1"></i>
                                Pastikan urutan kolom sesuai dengan format di atas
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="font-weight-bold text-gray-800 mb-3">Contoh Data:</h6>
                            <div class="bg-light p-3 rounded">
                                <small class="text-muted d-block">sugeng,selamat,Sugeng enjing,Selamat pagi,kata sifat</small>
                                <small class="text-muted d-block">rawuh,datang,Sampun rawuh,Sudah datang,kata kerja</small>
                                <small class="text-muted d-block">omah,rumah,Omah gedhe,Rumah besar,kata benda</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-top">
                        <h6 class="font-weight-bold text-gray-800 mb-2">Catatan Penting:</h6>
                        <ul class="text-muted small mb-0 pl-3">
                            <li>Setiap baris mewakili satu data kosakata</li>
                            <li>Gunakan koma (,) sebagai pemisah antar kolom</li>
                            <li>Jika ada koma dalam data, gunakan tanda petik (")</li>
                            <li>Encoding file harus UTF-8 untuk karakter khusus</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Custom file input
    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
    });

    // Form validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
});
</script>

<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
}

.custom-file-input:focus ~ .custom-file-label {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.custom-file-label.selected {
    color: #495057 !important;
}

.alert {
    border-radius: 10px;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

code {
    font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
    font-size: 0.875em;
}

.btn {
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
</style>
@endsection
