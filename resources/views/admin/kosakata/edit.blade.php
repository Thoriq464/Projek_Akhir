@extends('admin.main')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-edit text-warning me-2"></i>
                Edit Kosakata
            </h1>
            <p class="text-muted mb-0">Mengubah data kosakata: <strong>{{ $kosakata->kata_jawa }}</strong></p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Kosakata</li>
            </ol>
        </nav>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show animate-slideUp" role="alert">
            <h6><i class="fas fa-exclamation-triangle me-2"></i><strong>Ada kesalahan input!</strong></h6>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <!-- Main Form Card -->
            <div class="card shadow animate-fadeIn">
                <div class="card-header bg-gradient-warning py-3">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-edit me-2"></i> Form Edit Kosakata
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.update', $kosakata->id) }}" method="POST" id="editKosakataForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="kata_jawa" class="form-label font-weight-bold">
                                        <i class="fas fa-language text-primary me-1"></i> Kata Jawa
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('kata_jawa') is-invalid @enderror" 
                                           id="kata_jawa" 
                                           name="kata_jawa" 
                                           value="{{ old('kata_jawa', $kosakata->kata_jawa) }}"
                                           placeholder="Masukkan kata dalam bahasa Jawa"
                                           required>
                                    @error('kata_jawa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Kata asli dalam bahasa Jawa
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="kata_indonesia" class="form-label font-weight-bold">
                                        <i class="fas fa-flag text-success me-1"></i> Kata Indonesia
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('kata_indonesia') is-invalid @enderror" 
                                           id="kata_indonesia" 
                                           name="kata_indonesia" 
                                           value="{{ old('kata_indonesia', $kosakata->kata_indonesia) }}"
                                           placeholder="Masukkan arti dalam bahasa Indonesia"
                                           required>
                                    @error('kata_indonesia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Arti kata dalam bahasa Indonesia
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="jenis_kata" class="form-label font-weight-bold">
                                        <i class="fas fa-tag text-info me-1"></i> Jenis Kata
                                    </label>
                                    <select class="form-select form-select-lg @error('jenis_kata') is-invalid @enderror" 
                                            id="jenis_kata" 
                                            name="jenis_kata">
                                        <option value="">Pilih jenis kata...</option>
                                        <option value="Kata Benda" {{ old('jenis_kata', $kosakata->jenis_kata) == 'Kata Benda' ? 'selected' : '' }}>Kata Benda</option>
                                        <option value="Kata Kerja" {{ old('jenis_kata', $kosakata->jenis_kata) == 'Kata Kerja' ? 'selected' : '' }}>Kata Kerja</option>
                                        <option value="Kata Sifat" {{ old('jenis_kata', $kosakata->jenis_kata) == 'Kata Sifat' ? 'selected' : '' }}>Kata Sifat</option>
                                        <option value="Kata Keterangan" {{ old('jenis_kata', $kosakata->jenis_kata) == 'Kata Keterangan' ? 'selected' : '' }}>Kata Keterangan</option>
                                        <option value="Kata Ganti" {{ old('jenis_kata', $kosakata->jenis_kata) == 'Kata Ganti' ? 'selected' : '' }}>Kata Ganti</option>
                                        <option value="Kata Bilangan" {{ old('jenis_kata', $kosakata->jenis_kata) == 'Kata Bilangan' ? 'selected' : '' }}>Kata Bilangan</option>
                                        <option value="Kata Sambung" {{ old('jenis_kata', $kosakata->jenis_kata) == 'Kata Sambung' ? 'selected' : '' }}>Kata Sambung</option>
                                        <option value="Kata Seru" {{ old('jenis_kata', $kosakata->jenis_kata) == 'Kata Seru' ? 'selected' : '' }}>Kata Seru</option>
                                    </select>
                                    @error('jenis_kata')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="contoh_kalimat" class="form-label font-weight-bold">
                                <i class="fas fa-quote-left text-warning me-1"></i> Contoh Kalimat
                            </label>
                            <textarea class="form-control @error('contoh_kalimat') is-invalid @enderror" 
                                      id="contoh_kalimat" 
                                      name="contoh_kalimat" 
                                      rows="3"
                                      placeholder="Masukkan contoh kalimat menggunakan kata Jawa">{{ old('contoh_kalimat', $kosakata->contoh_kalimat) }}</textarea>
                            @error('contoh_kalimat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Contoh penggunaan kata dalam kalimat bahasa Jawa
                            </small>
                        </div>

                        <div class="mb-4">
                            <label for="contoh_kalimat_id" class="form-label font-weight-bold">
                                <i class="fas fa-translate text-secondary me-1"></i> Arti Contoh Kalimat
                            </label>
                            <textarea class="form-control @error('contoh_kalimat_id') is-invalid @enderror" 
                                      id="contoh_kalimat_id" 
                                      name="contoh_kalimat_id" 
                                      rows="3"
                                      placeholder="Masukkan arti contoh kalimat dalam bahasa Indonesia">{{ old('contoh_kalimat_id', $kosakata->contoh_kalimat_id) }}</textarea>
                            @error('contoh_kalimat_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Terjemahan contoh kalimat ke dalam bahasa Indonesia
                            </small>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button type="submit" class="btn btn-warning btn-lg text-white">
                                    <i class="fas fa-save me-2"></i> Update Kosakata
                                </button>
                                <button type="reset" class="btn btn-secondary btn-lg">
                                    <i class="fas fa-undo me-2"></i> Reset
                                </button>
                            </div>
                            <a href="{{ route('dashboard.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Current Data Card -->
            <div class="card shadow animate-fadeIn" style="animation-delay: 0.2s;">
                <div class="card-header bg-gradient-info">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-info-circle me-2"></i> Data Saat Ini
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-primary"><i class="fas fa-language me-1"></i> Kata Jawa</h6>
                        <p class="mb-0 font-weight-bold">{{ $kosakata->kata_jawa }}</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <h6 class="text-success"><i class="fas fa-flag me-1"></i> Kata Indonesia</h6>
                        <p class="mb-0">{{ $kosakata->kata_indonesia }}</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <h6 class="text-info"><i class="fas fa-tag me-1"></i> Jenis Kata</h6>
                        <p class="mb-0">
                            @if($kosakata->jenis_kata)
                                <span class="badge bg-info">{{ $kosakata->jenis_kata }}</span>
                            @else
                                <span class="text-muted">Belum ditentukan</span>
                            @endif
                        </p>
                    </div>
                    @if($kosakata->contoh_kalimat)
                        <hr>
                        <div class="mb-3">
                            <h6 class="text-warning"><i class="fas fa-quote-left me-1"></i> Contoh Kalimat</h6>
                            <p class="mb-0 small">{{ $kosakata->contoh_kalimat }}</p>
                        </div>
                    @endif
                    @if($kosakata->contoh_kalimat_id)
                        <hr>
                        <div class="mb-3">
                            <h6 class="text-secondary"><i class="fas fa-translate me-1"></i> Arti Contoh</h6>
                            <p class="mb-0 small">{{ $kosakata->contoh_kalimat_id }}</p> 
                        </div>
                    @endif
                </div>
            </div>

            <!-- Action History Card -->
            <div class="card shadow mt-4 animate-fadeIn" style="animation-delay: 0.4s;">
                <div class="card-header bg-gradient-secondary">
                    <h6 class="m-0 font-weight-bold text-white">
                        <i class="fas fa-history me-2"></i> Informasi
                    </h6>
                </div>
                <div class="card-body">
                    <div class="small text-muted">
                        <p class="mb-2">
                            <i class="fas fa-calendar me-1"></i>
                            <strong>Dibuat:</strong> {{ $kosakata->created_at->format('d/m/Y H:i') }}
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-edit me-1"></i>
                            <strong>Diubah:</strong> {{ $kosakata->updated_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Form enhancement
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('editKosakataForm');
    const kataJawa = document.getElementById('kata_jawa');
    const kataIndonesia = document.getElementById('kata_indonesia');
    
    // Auto formatting
    kataJawa.addEventListener('input', function() {
        this.value = this.value.toLowerCase();
    });
    
    kataIndonesia.addEventListener('input', function() {
        this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase();
    });
    
    // Form validation
    form.addEventListener('submit', function(e) {
        let isValid = true;
        
        if (kataJawa.value.trim() === '') {
            isValid = false;
            kataJawa.classList.add('is-invalid');
        } else {
            kataJawa.classList.remove('is-invalid');
        }
        
        if (kataIndonesia.value.trim() === '') {
            isValid = false;
            kataIndonesia.classList.add('is-invalid');
        } else {
            kataIndonesia.classList.remove('is-invalid');
        }
        
        if (!isValid) {
            e.preventDefault();
        }
    });
});
</script>

@endsection