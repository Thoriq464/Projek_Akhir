<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Kamus Jawa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .btn-login {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e3e6f0;
        }        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
            animation: slideDown 0.3s ease-out;
        }
        .alert .btn-close {
            padding: 0.5rem 0.75rem;
        }
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            border: 1px solid #f1aeb5;
            color: #721c24;
        }
        .alert-warning {
            background: linear-gradient(135deg, #fff3cd 0%, #fdf2a3 100%);
            border: 1px solid #faebcc;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-card p-5">
                        <!-- Logo & Title -->
                        <div class="text-center mb-4">
                            <div class="mb-3">
                                <i class="fas fa-book text-primary" style="font-size: 3rem;"></i>
                            </div>
                            <h2 class="h4 text-gray-900 mb-2">JavaDict | Kamus Jowo Suroboyo</h2>
                            <p class="text-muted">Login ke Panel Admin</p>
                        </div>                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="fas fa-exclamation-circle fa-lg text-danger"></i>
                                    </div>
                                    <div>
                                        <strong>Login Gagal!</strong><br>
                                        <small>{{ session('error') }}</small>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show border-0 shadow-sm" role="alert">
                                <div class="d-flex align-items-start">
                                    <div class="me-3">
                                        <i class="fas fa-exclamation-triangle fa-lg text-warning"></i>
                                    </div>
                                    <div>
                                        <strong>Perhatian!</strong><br>
                                        <small>Silakan periksa kembali data yang Anda masukkan.</small>
                                        @if($errors->has('name'))
                                            <br><small class="text-muted">• {{ $errors->first('name') }}</small>
                                        @endif
                                        @if($errors->has('password'))
                                            <br><small class="text-muted">• {{ $errors->first('password') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                              <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" placeholder="Masukkan username" 
                                           value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password" placeholder="Masukkan password" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">
                                    Ingat saya
                                </label>
                            </div>

                            <button type="submit" class="btn btn-login text-white w-100">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Login
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <small class="text-muted">
                                © {{ date('Y') }} JavaDict | Kamus Jowo
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>        // Auto hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000); // 5 seconds
            });
              // Add shake animation to login card when there's an error
            @if(session('error') || $errors->any())
                const loginCard = document.querySelector('.login-card');
                loginCard.style.animation = 'shake 0.5s ease-in-out';
                
                setTimeout(function() {
                    loginCard.style.animation = '';
                }, 500);
            @endif
            
            // Form validation
            const form = document.querySelector('form');
            const nameInput = document.getElementById('name');
            const passwordInput = document.getElementById('password');
            
            form.addEventListener('submit', function(e) {
                let isValid = true;
                
                // Reset previous validation states
                nameInput.classList.remove('is-invalid');
                passwordInput.classList.remove('is-invalid');
                
                // Validate username
                if (nameInput.value.trim() === '') {
                    nameInput.classList.add('is-invalid');
                    isValid = false;
                }
                
                // Validate password
                if (passwordInput.value.trim() === '') {
                    passwordInput.classList.add('is-invalid');
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                    
                    // Show custom alert
                    showAlert('Mohon lengkapi semua field yang diperlukan.', 'warning');
                }
            });
            
            // Function to show custom alert
            function showAlert(message, type = 'danger') {
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${type} alert-dismissible fade show border-0 shadow-sm`;
                alertDiv.innerHTML = `
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-exclamation-triangle fa-lg text-${type}"></i>
                        </div>
                        <div>
                            <strong>Perhatian!</strong><br>
                            <small>${message}</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                
                const form = document.querySelector('form');
                form.insertBefore(alertDiv, form.firstChild);
                
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alertDiv);
                    bsAlert.close();
                }, 3000);
            }
        });
    </script>
    
    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
    </style>
</body>
</html>
