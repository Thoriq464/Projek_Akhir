<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JavDict - Kamus Jawa Digital Berbasis Chatbot AI</title>
        <meta name="description" content="Kamus Bahasa Jawa digital dengan chatbot AI untuk mempelajari dan melestarikan budaya Jawa. Temukan arti kata-kata Jawa dengan mudah dan interaktif.">
        <meta name="keywords" content="kamus jawa, bahasa jawa, chatbot, AI, budaya jawa, dictionary, javanese">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <style>
            :root {
                --primary-color: #6B46C1;
                --secondary-color: #10B981;
                --accent-color: #F59E0B;
                --text-primary: #1F2937;
                --text-secondary: #6B7280;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Poppins', sans-serif;
                line-height: 1.6;
                color: var(--text-primary);
                background-color: #F8FAFC;
            }

            .gradient-bg {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            }

            .hero-section {
                min-height: 100vh;
                display: flex;
                align-items: center;
                position: relative;
                overflow: hidden;
            }

            .hero-section::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff" fill-opacity="0.1" points="0,1000 1000,0 1000,1000"/></svg>');
                z-index: 1;
            }

            .hero-content {
                position: relative;
                z-index: 2;
            }

            .chatbot-demo {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 20px;
                padding: 2rem;
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            }

            .chat-message {
                margin-bottom: 1rem;
                padding: 0.75rem 1rem;
                border-radius: 15px;
                max-width: 80%;
                animation: fadeInUp 0.5s ease;
            }

            .chat-user {
                background: rgba(255, 255, 255, 0.2);
                margin-left: auto;
                text-align: right;
            }

            .chat-bot {
                background: rgba(255, 255, 255, 0.3);
                margin-right: auto;
            }

            .feature-card {
                background: white;
                border-radius: 15px;
                padding: 2rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                height: 100%;
            }

            .feature-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            }

            .feature-icon {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                color: white;
                margin: 0 auto 1.5rem;
            }

            .btn-primary-custom {
                background: var(--primary-color);
                border: none;
                padding: 12px 30px;
                border-radius: 50px;
                color: white;
                font-weight: 600;
                text-decoration: none;
                display: inline-block;
                transition: all 0.3s ease;
                box-shadow: 0 5px 15px rgba(107, 70, 193, 0.3);
            }

            .btn-primary-custom:hover {
                background: #553C9A;
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(107, 70, 193, 0.4);
                color: white;
            }

            .btn-secondary-custom {
                background: transparent;
                border: 2px solid white;
                padding: 12px 30px;
                border-radius: 50px;
                color: white;
                font-weight: 600;
                text-decoration: none;
                display: inline-block;
                transition: all 0.3s ease;
            }

            .btn-secondary-custom:hover {
                background: white;
                color: var(--primary-color);
            }

            .floating-element {
                position: absolute;
                opacity: 0.1;
                animation: float 6s ease-in-out infinite;
            }

            .floating-element:nth-child(odd) {
                animation-delay: -3s;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .section-padding {
                padding: 80px 0;
            }

            .text-gradient {
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .navbar-custom {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            }

            .typewriter {
                overflow: hidden;
                border-right: .15em solid var(--primary-color);
                white-space: nowrap;
                margin: 0 auto;
                letter-spacing: .15em;
                animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
            }

            @keyframes typing {
                from { width: 0 }
                to { width: 100% }
            }

            @keyframes blink-caret {
                from, to { border-color: transparent }
                50% { border-color: var(--primary-color); }
            }
        </style>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold text-gradient" href="#">
                    <i class="fas fa-book-open me-2"></i>JavDict
                </a>
                
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#demo">Demo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Tentang</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary-custom ms-2">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="btn btn-primary-custom ms-2">Masuk</a>
                                </li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="hero-section gradient-bg text-white">
            <!-- Floating Elements -->
            <div class="floating-element" style="top: 10%; left: 10%; font-size: 3rem;">
                <i class="fas fa-language"></i>
            </div>
            <div class="floating-element" style="top: 20%; right: 15%; font-size: 2rem;">
                <i class="fas fa-robot"></i>
            </div>
            <div class="floating-element" style="bottom: 30%; left: 20%; font-size: 2.5rem;">
                <i class="fas fa-comments"></i>
            </div>
            <div class="floating-element" style="bottom: 15%; right: 10%; font-size: 2rem;">
                <i class="fas fa-book"></i>
            </div>

            <div class="container hero-content">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h1 class="display-4 fw-bold mb-4">
                            Kamus <span class="typewriter">Bahasa Jawa Digital</span>
                        </h1>
                        <p class="lead mb-4">
                            Temukan makna kata-kata bahasa Jawa dengan mudah melalui chatbot AI yang interaktif. 
                            Belajar dan lestarikan budaya Jawa dengan teknologi modern.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#demo" class="btn btn-secondary-custom btn-lg">
                                <i class="fas fa-play me-2"></i>Coba Sekarang
                            </a>
                            <a href="#features" class="btn btn-primary-custom btn-lg">
                                <i class="fas fa-arrow-down me-2"></i>Pelajari Lebih
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="chatbot-demo">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success rounded-circle" style="width: 12px; height: 12px;"></div>
                                <span class="ms-2 fw-semibold">JavDict Bot - Online</span>
                            </div>
                            <div class="chat-message chat-user">
                                Apa arti kata "sugeng" dalam bahasa Jawa?
                            </div>
                            <div class="chat-message chat-bot">
                                <i class="fas fa-robot me-2"></i>
                                "Sugeng" dalam bahasa Jawa artinya "selamat" atau "baik". 
                                Contoh penggunaan: "Sugeng enjing" berarti "Selamat pagi".
                            </div>
                            <div class="chat-message chat-user">
                                Bagaimana cara mengucapkan terima kasih?
                            </div>
                            <div class="chat-message chat-bot">
                                <i class="fas fa-robot me-2"></i>
                                Terima kasih dalam bahasa Jawa adalah "Matur nuwun" 
                                atau "Matur sembah nuwun" untuk ungkapan yang lebih formal.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                        <h2 class="display-5 fw-bold text-gradient mb-3">Fitur Unggulan</h2>
                        <p class="lead text-secondary">
                            Jelajahi berbagai fitur canggih yang memudahkan Anda belajar bahasa Jawa
                        </p>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-card text-center">
                            <div class="feature-icon gradient-bg">
                                <i class="fas fa-robot"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Chatbot AI Cerdas</h4>
                            <p class="text-secondary">
                                Berinteraksi dengan AI yang memahami konteks dan memberikan jawaban akurat tentang bahasa Jawa
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-card text-center">
                            <div class="feature-icon" style="background: var(--secondary-color);">
                                <i class="fas fa-search"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Pencarian Cepat</h4>
                            <p class="text-secondary">
                                Temukan arti kata bahasa Jawa dengan pencarian yang cepat dan hasil yang komprehensif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-card text-center">
                            <div class="feature-icon" style="background: var(--accent-color);">
                                <i class="fas fa-volume-up"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Panduan Pelafalan</h4>
                            <p class="text-secondary">
                                Pelajari cara pengucapan yang benar dengan panduan pelafalan yang mudah dipahami
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-card text-center">
                            <div class="feature-icon gradient-bg">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Contoh Kalimat</h4>
                            <p class="text-secondary">
                                Dapatkan contoh penggunaan kata dalam kalimat untuk memahami konteks yang tepat
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="feature-card text-center">
                            <div class="feature-icon" style="background: var(--secondary-color);">
                                <i class="fas fa-history"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Riwayat Pencarian</h4>
                            <p class="text-secondary">
                                Akses kembali kata-kata yang pernah Anda cari untuk belajar berulang
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="feature-card text-center">
                            <div class="feature-icon" style="background: var(--accent-color);">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Akses Mobile</h4>
                            <p class="text-secondary">
                                Gunakan JavDict di mana saja melalui perangkat mobile dengan interface yang responsif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Demo Section -->
        <section id="demo" class="section-padding" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2 class="display-5 fw-bold text-gradient mb-4">Coba Langsung Sekarang</h2>
                        <p class="lead text-secondary mb-4">
                            Rasakan pengalaman belajar bahasa Jawa yang menyenangkan dengan chatbot AI kami. 
                            Tanyakan apa saja tentang kosakata, tata bahasa, atau budaya Jawa.
                        </p>
                        <div class="d-flex flex-column gap-3 mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-3"></i>
                                <span>Respon yang cepat dan akurat</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-3"></i>
                                <span>Interface yang mudah digunakan</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-3"></i>
                                <span>Gratis dan dapat diakses 24/7</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary-custom btn-lg" onclick="openChatDemo()">
                            <i class="fas fa-comments me-2"></i>Mulai Chat
                        </a>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="position-relative">
                            <div class="bg-white rounded-4 shadow-lg p-4" style="max-width: 400px; margin: 0 auto;">
                                <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            <i class="fas fa-robot text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold">JavDict Bot</h6>
                                            <small class="text-success">Online</small>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <div class="bg-danger rounded-circle" style="width: 8px; height: 8px;"></div>
                                        <div class="bg-warning rounded-circle" style="width: 8px; height: 8px;"></div>
                                        <div class="bg-success rounded-circle" style="width: 8px; height: 8px;"></div>
                                    </div>
                                </div>
                                <div class="chat-demo-area" style="height: 300px; overflow-y: auto;">
                                    <div class="mb-3">
                                        <div class="bg-light rounded-3 p-3 mb-2">
                                            <small class="text-primary fw-bold">Bot</small>
                                            <p class="mb-0">Halo! Saya JavDict Bot. Apa yang ingin Anda ketahui tentang bahasa Jawa hari ini?</p>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="bg-primary text-white rounded-3 p-3 mb-2 ms-auto" style="max-width: 80%;">
                                            <small class="fw-bold">Anda</small>
                                            <p class="mb-0">Apa arti "rawuh" dalam bahasa Jawa?</p>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="bg-light rounded-3 p-3 mb-2">
                                            <small class="text-primary fw-bold">Bot</small>
                                            <p class="mb-0">"Rawuh" artinya datang atau hadir. Contoh: "Sampun rawuh pak guru" berarti "Sudah datang pak guru"</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" placeholder="Ketik pertanyaan Anda...">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="position-relative">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'%3E%3Crect width='400' height='300' fill='%236B46C1'/%3E%3Ctext x='50%25' y='50%25' font-size='20' fill='white' text-anchor='middle' dy='.3em'%3EBudaya Jawa%3C/text%3E%3C/svg%3E" 
                                 alt="Budaya Jawa" class="img-fluid rounded-4 shadow-lg">
                            <div class="position-absolute top-0 start-0 w-100 h-100 rounded-4" 
                                 style="background: linear-gradient(45deg, rgba(107,70,193,0.8), rgba(16,185,129,0.8));"></div>
                            <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
                                <i class="fas fa-play-circle display-1 mb-3"></i>
                                <h5>Pelajari Budaya Jawa</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <h2 class="display-5 fw-bold text-gradient mb-4">Tentang JavDict</h2>
                        <p class="lead text-secondary mb-4">
                            JavDict adalah platform pembelajaran bahasa Jawa modern yang menggabungkan teknologi 
                            Artificial Intelligence dengan kearifan budaya tradisional Jawa.
                        </p>
                        <p class="text-secondary mb-4">
                            Dikembangkan dengan tujuan melestarikan dan mempermudah pembelajaran bahasa Jawa, 
                            JavDict menggunakan teknologi chatbot berbasis Dialogflow untuk memberikan pengalaman 
                            belajar yang interaktif dan menyenangkan.
                        </p>
                        <div class="row g-4 mb-4">
                            <div class="col-6">
                                <div class="text-center">
                                    <h3 class="fw-bold text-primary mb-2">1000+</h3>
                                    <p class="mb-0 text-secondary">Kosakata</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <h3 class="fw-bold text-primary mb-2">24/7</h3>
                                    <p class="mb-0 text-secondary">Tersedia</p>
                                </div>
                            </div>
                        </div>
                        <a href="#demo" class="btn btn-primary-custom btn-lg">
                            <i class="fas fa-arrow-right me-2"></i>Mulai Belajar
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="gradient-bg text-white py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <h4 class="fw-bold mb-3">
                            <i class="fas fa-book-open me-2"></i>JavDict
                        </h4>
                        <p class="mb-3">
                            Kamus Bahasa Jawa digital dengan teknologi AI untuk melestarikan budaya Jawa.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="#" class="text-white">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-white">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-white">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-white">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6 class="fw-bold mb-3">Navigasi</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#home" class="text-white-50 text-decoration-none">Home</a></li>
                            <li class="mb-2"><a href="#features" class="text-white-50 text-decoration-none">Fitur</a></li>
                            <li class="mb-2"><a href="#demo" class="text-white-50 text-decoration-none">Demo</a></li>
                            <li class="mb-2"><a href="#about" class="text-white-50 text-decoration-none">Tentang</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h6 class="fw-bold mb-3">Fitur</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Chatbot AI</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Kamus Online</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Panduan Pelafalan</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Budaya Jawa</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <h6 class="fw-bold mb-3">Kontak</h6>
                        <p class="text-white-50 mb-2">
                            <i class="fas fa-envelope me-2"></i>info@javdict.com
                        </p>
                        <p class="text-white-50 mb-2">
                            <i class="fas fa-phone me-2"></i>+62 xxx xxxx xxxx
                        </p>
                        <p class="text-white-50">
                            <i class="fas fa-map-marker-alt me-2"></i>Yogyakarta, Indonesia
                        </p>
                    </div>
                </div>
                <hr class="my-4 border-white-50">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0 text-white-50">&copy; 2024 JavDict. Semua hak cipta dilindungi.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="text-white-50 text-decoration-none me-3">Kebijakan Privasi</a>
                        <a href="#" class="text-white-50 text-decoration-none">Syarat & Ketentuan</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <script>
            // Initialize AOS
            AOS.init({
                duration: 1000,
                once: true,
                offset: 100
            });

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Navbar background on scroll
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar-custom');
                if (window.scrollY > 50) {
                    navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                } else {
                    navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                }
            });

            // Chat demo function
            function openChatDemo() {
                alert('Fitur chat demo akan segera tersedia! Untuk saat ini, Anda dapat melihat preview di bagian demo.');
            }

            // Typing animation for hero section
            function typeWriter(element, text, speed = 100) {
                let i = 0;
                element.innerHTML = '';
                function typing() {
                    if (i < text.length) {
                        element.innerHTML += text.charAt(i);
                        i++;
                        setTimeout(typing, speed);
                    }
                }
                typing();
            }

            // Auto-scroll chat demo
            function animateChatDemo() {
                const chatArea = document.querySelector('.chat-demo-area');
                if (chatArea) {
                    setTimeout(() => {
                        chatArea.scrollTop = chatArea.scrollHeight;
                    }, 1000);
                }
            }

            // Initialize animations when page loads
            document.addEventListener('DOMContentLoaded', function() {
                animateChatDemo();
                
                // Add floating animation to chat messages
                const chatMessages = document.querySelectorAll('.chat-message');
                chatMessages.forEach((message, index) => {
                    message.style.animationDelay = `${index * 0.5}s`;
                });
            });

            // Add some interactive features
            document.querySelectorAll('.feature-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        </script>
    </body>
</html>
                        <path d="M110.256 41.6337C108.061 38.1275 104.945 35.3731 100.905 33.3681C96.8667 31.3647 92.8016 30.3618 88.7131 30.3618C83.4247 30.3618 78.5885 31.3389 74.201 33.2923C69.8111 35.2456 66.0474 37.928 62.9059 41.3333C59.7643 44.7401 57.3198 48.6726 55.5754 53.1293C53.8287 57.589 52.9572 62.274 52.9572 67.1813C52.9572 72.1925 53.8287 76.8995 55.5754 81.3069C57.3191 85.7173 59.7636 89.6241 62.9059 93.0293C66.0474 96.4361 69.8119 99.1155 74.201 101.069C78.5885 103.022 83.4247 103.999 88.7131 103.999C92.8016 103.999 96.8667 102.997 100.905 100.994C104.945 98.9911 108.061 96.2359 110.256 92.7282V102.195H126.563V32.1642H110.256V41.6337ZM108.76 75.7472C107.762 78.4531 106.366 80.8078 104.572 82.8112C102.776 84.8161 100.606 86.4183 98.0637 87.6206C95.5202 88.823 92.7004 89.4238 89.6103 89.4238C86.5178 89.4238 83.7252 88.823 81.2324 87.6206C78.7388 86.4183 76.5949 84.8161 74.7998 82.8112C73.004 80.8078 71.6319 78.4531 70.6856 75.7472C69.7356 73.0421 69.2644 70.1868 69.2644 67.1821C69.2644 64.1758 69.7356 61.3205 70.6856 58.6154C71.6319 55.9102 73.004 53.5571 74.7998 51.5522C76.5949 49.5495 78.738 47.9451 81.2324 46.7427C83.7252 45.5404 86.5178 44.9396 89.6103 44.9396C92.7012 44.9396 95.5202 45.5404 98.0637 46.7427C100.606 47.9451 102.776 49.5487 104.572 51.5522C106.367 53.5571 107.762 55.9102 108.76 58.6154C109.756 61.3205 110.256 64.1758 110.256 67.1821C110.256 70.1868 109.756 73.0421 108.76 75.7472Z" fill="currentColor" />
                        <path d="M242.805 41.6337C240.611 38.1275 237.494 35.3731 233.455 33.3681C229.416 31.3647 225.351 30.3618 221.262 30.3618C215.974 30.3618 211.138 31.3389 206.75 33.2923C202.36 35.2456 198.597 37.928 195.455 41.3333C192.314 44.7401 189.869 48.6726 188.125 53.1293C186.378 57.589 185.507 62.274 185.507 67.1813C185.507 72.1925 186.378 76.8995 188.125 81.3069C189.868 85.7173 192.313 89.6241 195.455 93.0293C198.597 96.4361 202.361 99.1155 206.75 101.069C211.138 103.022 215.974 103.999 221.262 103.999C225.351 103.999 229.416 102.997 233.455 100.994C237.494 98.9911 240.611 96.2359 242.805 92.7282V102.195H259.112V32.1642H242.805V41.6337ZM241.31 75.7472C240.312 78.4531 238.916 80.8078 237.122 82.8112C235.326 84.8161 233.156 86.4183 230.614 87.6206C228.07 88.823 225.251 89.4238 222.16 89.4238C219.068 89.4238 216.275 88.823 213.782 87.6206C211.289 86.4183 209.145 84.8161 207.35 82.8112C205.554 80.8078 204.182 78.4531 203.236 75.7472C202.286 73.0421 201.814 70.1868 201.814 67.1821C201.814 64.1758 202.286 61.3205 203.236 58.6154C204.182 55.9102 205.554 53.5571 207.35 51.5522C209.145 49.5495 211.288 47.9451 213.782 46.7427C216.275 45.5404 219.068 44.9396 222.16 44.9396C225.251 44.9396 228.07 45.5404 230.614 46.7427C233.156 47.9451 235.326 49.5487 237.122 51.5522C238.917 53.5571 240.312 55.9102 241.31 58.6154C242.306 61.3205 242.806 64.1758 242.806 67.1821C242.805 70.1868 242.305 73.0421 241.31 75.7472Z" fill="currentColor" />
                        <path d="M438 -3H421.694V102.197H438V-3Z" fill="currentColor" />
                        <path d="M139.43 102.197H155.735V48.2834H183.712V32.1665H139.43V102.197Z" fill="currentColor" />
                        <path d="M324.49 32.1665L303.995 85.794L283.498 32.1665H266.983L293.748 102.197H314.242L341.006 32.1665H324.49Z" fill="currentColor" />
                        <path d="M376.571 30.3656C356.603 30.3656 340.797 46.8497 340.797 67.1828C340.797 89.6597 356.094 104 378.661 104C391.29 104 399.354 99.1488 409.206 88.5848L398.189 80.0226C398.183 80.031 389.874 90.9895 377.468 90.9895C363.048 90.9895 356.977 79.3111 356.977 73.269H411.075C413.917 50.1328 398.775 30.3656 376.571 30.3656ZM357.02 61.0967C357.145 59.7487 359.023 43.3761 376.442 43.3761C393.861 43.3761 395.978 59.7464 396.099 61.0967H357.02Z" fill="currentColor" />
                    </svg>

                    {{-- Light Mode 12 SVG --}}
                    <svg class="w-[448px] max-w-none relative -mt-[4.9rem] -ml-8 lg:ml-0 lg:-mt-[6.6rem] dark:hidden" viewBox="0 0 440 376" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4">
                            <path d="M188.263 355.73L188.595 355.73C195.441 348.845 205.766 339.761 219.569 328.477C232.93 317.193 242.978 308.205 249.714 301.511C256.34 294.626 260.867 287.358 263.296 279.708C265.725 272.058 264.565 264.121 259.816 255.896C254.516 246.716 247.062 239.352 237.454 233.805C227.957 228.067 217.908 225.198 207.307 225.198C196.927 225.197 190.136 227.97 186.934 233.516C183.621 238.872 184.726 246.331 190.247 255.894L125.647 255.891C116.371 239.825 112.395 225.481 113.72 212.858C115.265 200.235 121.559 190.481 132.602 183.596C143.754 176.52 158.607 172.982 177.159 172.983C196.594 172.984 215.863 176.523 234.968 183.6C253.961 190.486 271.299 200.241 286.98 212.864C302.661 225.488 315.14 239.833 324.416 255.899C333.03 270.817 336.841 283.918 335.847 295.203C335.075 306.487 331.376 316.336 324.75 324.751C318.346 333.167 308.408 343.494 294.936 355.734L377.094 355.737L405.917 405.656L217.087 405.649L188.263 355.73Z" fill="black" />
                            <path d="M9.11884 226.339L-13.7396 226.338L-42.7286 176.132L43.0733 176.135L175.595 405.649L112.651 405.647L9.11884 226.339Z" fill="black" />
                            <path d="M188.263 355.73L188.595 355.73C195.441 348.845 205.766 339.761 219.569 328.477C232.93 317.193 242.978 308.205 249.714 301.511C256.34 294.626 260.867 287.358 263.296 279.708C265.725 272.058 264.565 264.121 259.816 255.896C254.516 246.716 247.062 239.352 237.454 233.805C227.957 228.067 217.908 225.198 207.307 225.198C196.927 225.197 190.136 227.97 186.934 233.516C183.621 238.872 184.726 246.331 190.247 255.894L125.647 255.891C116.371 239.825 112.395 225.481 113.72 212.858C115.265 200.235 121.559 190.481 132.602 183.596C143.754 176.52 158.607 172.982 177.159 172.983C196.594 172.984 215.863 176.523 234.968 183.6C253.961 190.486 271.299 200.241 286.98 212.864C302.661 225.488 315.14 239.833 324.416 255.899C333.03 270.817 336.841 283.918 335.847 295.203C335.075 306.487 331.376 316.336 324.75 324.751C318.346 333.167 308.408 343.494 294.936 355.734L377.094 355.737L405.917 405.656L217.087 405.649L188.263 355.73Z" stroke="#1B1B18" stroke-width="1" />
                            <path d="M9.11884 226.339L-13.7396 226.338L-42.7286 176.132L43.0733 176.135L175.595 405.649L112.651 405.647L9.11884 226.339Z" stroke="#1B1B18" stroke-width="1" />
                            <path d="M204.592 327.449L204.923 327.449C211.769 320.564 222.094 311.479 235.897 300.196C249.258 288.912 259.306 279.923 266.042 273.23C272.668 266.345 277.195 259.077 279.624 251.427C282.053 243.777 280.893 235.839 276.145 227.615C270.844 218.435 263.39 211.071 253.782 205.524C244.285 199.786 234.236 196.917 223.635 196.916C213.255 196.916 206.464 199.689 203.262 205.235C199.949 210.59 201.054 218.049 206.575 227.612L141.975 227.61C132.699 211.544 128.723 197.2 130.048 184.577C131.593 171.954 137.887 162.2 148.93 155.315C160.083 148.239 174.935 144.701 193.487 144.702C212.922 144.703 232.192 148.242 251.296 155.319C270.289 162.205 287.627 171.96 303.308 184.583C318.989 197.207 331.468 211.552 340.745 227.618C349.358 242.536 353.169 255.637 352.175 266.921C351.403 278.205 347.704 288.055 341.078 296.47C334.674 304.885 324.736 315.213 311.264 327.453L393.422 327.456L422.246 377.375L233.415 377.368L204.592 327.449Z" fill="#F8B803" />
                            <path d="M25.447 198.058L2.58852 198.057L-26.4005 147.851L59.4015 147.854L191.923 377.368L128.979 377.365L25.447 198.058Z" fill="#F8B803" />
                            <path d="M204.592 327.449L204.923 327.449C211.769 320.564 222.094 311.479 235.897 300.196C249.258 288.912 259.306 279.923 266.042 273.23C272.668 266.345 277.195 259.077 279.624 251.427C282.053 243.777 280.893 235.839 276.145 227.615C270.844 218.435 263.39 211.071 253.782 205.524C244.285 199.786 234.236 196.917 223.635 196.916C213.255 196.916 206.464 199.689 203.262 205.235C199.949 210.59 201.054 218.049 206.575 227.612L141.975 227.61C132.699 211.544 128.723 197.2 130.048 184.577C131.593 171.954 137.887 162.2 148.93 155.315C160.083 148.239 174.935 144.701 193.487 144.702C212.922 144.703 232.192 148.242 251.296 155.319C270.289 162.205 287.627 171.96 303.308 184.583C318.989 197.207 331.468 211.552 340.745 227.618C349.358 242.536 353.169 255.637 352.175 266.921C351.403 278.205 347.704 288.055 341.078 296.47C334.674 304.885 324.736 315.213 311.264 327.453L393.422 327.456L422.246 377.375L233.415 377.368L204.592 327.449Z" stroke="#1B1B18" stroke-width="1" />
                            <path d="M25.447 198.058L2.58852 198.057L-26.4005 147.851L59.4015 147.854L191.923 377.368L128.979 377.365L25.447 198.058Z" stroke="#1B1B18" stroke-width="1" />
                        </g>
                        <g style="mix-blend-mode: hard-light" class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4">
                            <path d="M217.342 305.363L217.673 305.363C224.519 298.478 234.844 289.393 248.647 278.11C262.008 266.826 272.056 257.837 278.792 251.144C285.418 244.259 289.945 236.991 292.374 229.341C294.803 221.691 293.643 213.753 288.895 205.529C283.594 196.349 276.14 188.985 266.532 183.438C257.035 177.7 246.986 174.831 236.385 174.83C226.005 174.83 219.214 177.603 216.012 183.149C212.699 188.504 213.804 195.963 219.325 205.527L154.725 205.524C145.449 189.458 141.473 175.114 142.798 162.491C144.343 149.868 150.637 140.114 161.68 133.229C172.833 126.153 187.685 122.615 206.237 122.616C225.672 122.617 244.942 126.156 264.046 133.233C283.039 140.119 300.377 149.874 316.058 162.497C331.739 175.121 344.218 189.466 353.495 205.532C362.108 220.45 365.919 233.551 364.925 244.835C364.153 256.12 360.454 265.969 353.828 274.384C347.424 282.799 337.486 293.127 324.014 305.367L406.172 305.37L434.996 355.289L246.165 355.282L217.342 305.363Z" fill="#F0ACB8" />
                            <path d="M38.197 175.972L15.3385 175.971L-13.6505 125.765L72.1515 125.768L204.673 355.282L141.729 355.279L38.197 175.972Z" fill="#F0ACB8" />
                            <path d="M217.342 305.363L217.673 305.363C224.519 298.478 234.844 289.393 248.647 278.11C262.008 266.826 272.056 257.837 278.792 251.144C285.418 244.259 289.945 236.991 292.374 229.341C294.803 221.691 293.643 213.753 288.895 205.529C283.594 196.349 276.14 188.985 266.532 183.438C257.035 177.7 246.986 174.831 236.385 174.83C226.005 174.83 219.214 177.603 216.012 183.149C212.699 188.504 213.804 195.963 219.325 205.527L154.725 205.524C145.449 189.458 141.473 175.114 142.798 162.491C144.343 149.868 150.637 140.114 161.68 133.229C172.833 126.153 187.685 122.615 206.237 122.616C225.672 122.617 244.942 126.156 264.046 133.233C283.039 140.119 300.377 149.874 316.058 162.497C331.739 175.121 344.218 189.466 353.495 205.532C362.108 220.45 365.919 233.551 364.925 244.835C364.153 256.12 360.454 265.969 353.828 274.384C347.424 282.799 337.486 293.127 324.014 305.367L406.172 305.37L434.996 355.289L246.165 355.282L217.342 305.363Z" stroke="#1B1B18" stroke-width="1" />
                            <path d="M38.197 175.972L15.3385 175.971L-13.6505 125.765L72.1515 125.768L204.673 355.282L141.729 355.279L38.197 175.972Z" stroke="#1B1B18" stroke-width="1" />
                        </g>
                        <g style="mix-blend-mode: plus-darker" class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4">
                            <path d="M230.951 281.792L231.282 281.793C238.128 274.907 248.453 265.823 262.256 254.539C275.617 243.256 285.666 234.267 292.402 227.573C299.027 220.688 303.554 213.421 305.983 205.771C308.412 198.12 307.253 190.183 302.504 181.959C297.203 172.778 289.749 165.415 280.142 159.868C270.645 154.13 260.596 151.26 249.995 151.26C239.615 151.26 232.823 154.033 229.621 159.579C226.309 164.934 227.413 172.393 232.935 181.956L168.335 181.954C159.058 165.888 155.082 151.543 156.407 138.92C157.953 126.298 164.247 116.544 175.289 109.659C186.442 102.583 201.294 99.045 219.846 99.0457C239.281 99.0464 258.551 102.585 277.655 109.663C296.649 116.549 313.986 126.303 329.667 138.927C345.349 151.551 357.827 165.895 367.104 181.961C375.718 196.88 379.528 209.981 378.535 221.265C377.762 232.549 374.063 242.399 367.438 250.814C361.033 259.229 351.095 269.557 337.624 281.796L419.782 281.8L448.605 331.719L259.774 331.712L230.951 281.792Z" fill="#F3BEC7" />
                            <path d="M51.8063 152.402L28.9479 152.401L-0.0411453 102.195L85.7608 102.198L218.282 331.711L155.339 331.709L51.8063 152.402Z" fill="#F3BEC7" />
                            <path d="M230.951 281.792L231.282 281.793C238.128 274.907 248.453 265.823 262.256 254.539C275.617 243.256 285.666 234.267 292.402 227.573C299.027 220.688 303.554 213.421 305.983 205.771C308.412 198.12 307.253 190.183 302.504 181.959C297.203 172.778 289.749 165.415 280.142 159.868C270.645 154.13 260.596 151.26 249.995 151.26C239.615 151.26 232.823 154.033 229.621 159.579C226.309 164.934 227.413 172.393 232.935 181.956L168.335 181.954C159.058 165.888 155.082 151.543 156.407 138.92C157.953 126.298 164.247 116.544 175.289 109.659C186.442 102.583 201.294 99.045 219.846 99.0457C239.281 99.0464 258.551 102.585 277.655 109.663C296.649 116.549 313.986 126.303 329.667 138.927C345.349 151.551 357.827 165.895 367.104 181.961C375.718 196.88 379.528 209.981 378.535 221.265C377.762 232.549 374.063 242.399 367.438 250.814C361.033 259.229 351.095 269.557 337.624 281.796L419.782 281.8L448.605 331.719L259.774 331.712L230.951 281.792Z" stroke="#1B1B18" stroke-width="1" />
                            <path d="M51.8063 152.402L28.9479 152.401L-0.0411453 102.195L85.7608 102.198L218.282 331.711L155.339 331.709L51.8063 152.402Z" stroke="#1B1B18" stroke-width="1" />
                        </g>
                        <g class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4">
                            <path d="M188.467 355.363L188.798 355.363C195.644 348.478 205.969 339.393 219.772 328.11C233.133 316.826 243.181 307.837 249.917 301.144C253.696 297.217 256.792 293.166 259.205 288.991C261.024 285.845 262.455 282.628 263.499 279.341C265.928 271.691 264.768 263.753 260.02 255.529C254.719 246.349 247.265 238.985 237.657 233.438C228.16 227.7 218.111 224.831 207.51 224.83C197.13 224.83 190.339 227.603 187.137 233.149C183.824 238.504 184.929 245.963 190.45 255.527L125.851 255.524C116.574 239.458 112.598 225.114 113.923 212.491C114.615 206.836 116.261 201.756 118.859 197.253C122.061 191.704 126.709 187.03 132.805 183.229C143.958 176.153 158.81 172.615 177.362 172.616C196.797 172.617 216.067 176.156 235.171 183.233C254.164 190.119 271.502 199.874 287.183 212.497C302.864 225.121 315.343 239.466 324.62 255.532C333.233 270.45 337.044 283.551 336.05 294.835C335.46 303.459 333.16 311.245 329.151 318.194C327.915 320.337 326.515 322.4 324.953 324.384C318.549 332.799 308.611 343.127 295.139 355.367L377.297 355.37L406.121 405.289L217.29 405.282L188.467 355.363Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M9.32197 225.972L-13.5365 225.971L-42.5255 175.765L43.2765 175.768L175.798 405.282L112.854 405.279L9.32197 225.972Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M345.247 111.915C329.566 99.2919 312.229 89.5371 293.235 82.6512L235.167 183.228C254.161 190.114 271.498 199.869 287.179 212.492L345.247 111.915Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M382.686 154.964C373.41 138.898 360.931 124.553 345.25 111.93L287.182 212.506C302.863 225.13 315.342 239.475 324.618 255.541L382.686 154.964Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M293.243 82.6472C274.139 75.57 254.869 72.031 235.434 72.0303L177.366 172.607C196.801 172.608 216.071 176.147 235.175 183.224L293.243 82.6472Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M394.118 194.257C395.112 182.973 391.301 169.872 382.688 154.953L324.619 255.53C333.233 270.448 337.044 283.55 336.05 294.834L394.118 194.257Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M235.432 72.0311C216.88 72.0304 202.027 75.5681 190.875 82.6442L132.806 183.221C143.959 176.145 158.812 172.607 177.363 172.608L235.432 72.0311Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M265.59 124.25C276.191 124.251 286.24 127.12 295.737 132.858L237.669 233.435C228.172 227.697 218.123 224.828 207.522 224.827L265.59 124.25Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M295.719 132.859C305.326 138.406 312.78 145.77 318.081 154.95L260.013 255.527C254.712 246.347 247.258 238.983 237.651 233.436L295.719 132.859Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M387.218 217.608C391.227 210.66 393.527 202.874 394.117 194.25L336.049 294.827C335.459 303.451 333.159 311.237 329.15 318.185L387.218 217.608Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M245.211 132.577C248.413 127.03 255.204 124.257 265.584 124.258L207.516 224.835C197.136 224.834 190.345 227.607 187.143 233.154L245.211 132.577Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M318.094 154.945C322.842 163.17 324.002 171.107 321.573 178.757L263.505 279.334C265.934 271.684 264.774 263.746 260.026 255.522L318.094 154.945Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M176.925 96.6737C180.127 91.1249 184.776 86.4503 190.871 82.6499L132.803 183.227C126.708 187.027 122.059 191.702 118.857 197.25L176.925 96.6737Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M387.226 217.606C385.989 219.749 384.59 221.813 383.028 223.797L324.96 324.373C326.522 322.39 327.921 320.326 329.157 318.183L387.226 217.606Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M317.269 188.408C319.087 185.262 320.519 182.045 321.562 178.758L263.494 279.335C262.451 282.622 261.019 285.839 259.201 288.985L317.269 188.408Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M245.208 132.573C241.895 137.928 243 145.387 248.522 154.95L190.454 255.527C184.932 245.964 183.827 238.505 187.14 233.15L245.208 132.573Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M176.93 96.6719C174.331 101.175 172.686 106.255 171.993 111.91L113.925 212.487C114.618 206.831 116.263 201.752 118.862 197.249L176.93 96.6719Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M317.266 188.413C314.853 192.589 311.757 196.64 307.978 200.566L249.91 301.143C253.689 297.216 256.785 293.166 259.198 288.99L317.266 188.413Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M464.198 304.708L435.375 254.789L377.307 355.366L406.13 405.285L464.198 304.708Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M353.209 254.787C366.68 242.548 376.618 232.22 383.023 223.805L324.955 324.382C318.55 332.797 308.612 343.124 295.141 355.364L353.209 254.787Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M435.37 254.787L353.212 254.784L295.144 355.361L377.302 355.364L435.37 254.787Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M183.921 154.947L248.521 154.95L190.453 255.527L125.853 255.524L183.921 154.947Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M171.992 111.914C170.668 124.537 174.643 138.881 183.92 154.947L125.852 255.524C116.575 239.458 112.599 225.114 113.924 212.491L171.992 111.914Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M307.987 200.562C301.251 207.256 291.203 216.244 277.842 227.528L219.774 328.105C233.135 316.821 243.183 307.832 249.919 301.139L307.987 200.562Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M15.5469 75.1797L44.5359 125.386L-13.5321 225.963L-42.5212 175.756L15.5469 75.1797Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M277.836 227.536C264.033 238.82 253.708 247.904 246.862 254.789L188.794 355.366C195.64 348.481 205.965 339.397 219.768 328.113L277.836 227.536Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M275.358 304.706L464.189 304.713L406.12 405.29L217.29 405.283L275.358 304.706Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M44.5279 125.39L67.3864 125.39L9.31834 225.967L-13.5401 225.966L44.5279 125.39Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M101.341 75.1911L233.863 304.705L175.795 405.282L43.2733 175.768L101.341 75.1911ZM15.5431 75.19L-42.525 175.767L43.277 175.77L101.345 75.1932L15.5431 75.19Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M246.866 254.784L246.534 254.784L188.466 355.361L188.798 355.361L246.866 254.784Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M246.539 254.781L275.362 304.701L217.294 405.277L188.471 355.358L246.539 254.781Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M67.3906 125.391L170.923 304.698L112.855 405.275L9.32257 225.967L67.3906 125.391Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                            <path d="M170.921 304.699L233.865 304.701L175.797 405.278L112.853 405.276L170.921 304.699Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="bevel" />
                        </g>
                        <g style="mix-blend-mode: hard-light" class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4">
                            <path d="M246.544 254.79L246.875 254.79C253.722 247.905 264.046 238.82 277.849 227.537C291.21 216.253 301.259 207.264 307.995 200.57C314.62 193.685 319.147 186.418 321.577 178.768C324.006 171.117 322.846 163.18 318.097 154.956C312.796 145.775 305.342 138.412 295.735 132.865C286.238 127.127 276.189 124.258 265.588 124.257C255.208 124.257 248.416 127.03 245.214 132.576C241.902 137.931 243.006 145.39 248.528 154.953L183.928 154.951C174.652 138.885 170.676 124.541 172 111.918C173.546 99.2946 179.84 89.5408 190.882 82.6559C202.035 75.5798 216.887 72.0421 235.439 72.0428C254.874 72.0435 274.144 75.5825 293.248 82.6598C312.242 89.5457 329.579 99.3005 345.261 111.924C360.942 124.548 373.421 138.892 382.697 154.958C391.311 169.877 395.121 182.978 394.128 194.262C393.355 205.546 389.656 215.396 383.031 223.811C376.627 232.226 366.688 242.554 353.217 254.794L435.375 254.797L464.198 304.716L275.367 304.709L246.544 254.79Z" fill="#F0ACB8" />
                            <path d="M246.544 254.79L246.875 254.79C253.722 247.905 264.046 238.82 277.849 227.537C291.21 216.253 301.259 207.264 307.995 200.57C314.62 193.685 319.147 186.418 321.577 178.768C324.006 171.117 322.846 163.18 318.097 154.956C312.796 145.775 305.342 138.412 295.735 132.865C286.238 127.127 276.189 124.258 265.588 124.257C255.208 124.257 248.416 127.03 245.214 132.576C241.902 137.931 243.006 145.39 248.528 154.953L183.928 154.951C174.652 138.885 170.676 124.541 172 111.918C173.546 99.2946 179.84 89.5408 190.882 82.6559C202.035 75.5798 216.887 72.0421 235.439 72.0428C254.874 72.0435 274.144 75.5825 293.248 82.6598C312.242 89.5457 329.579 99.3005 345.261 111.924C360.942 124.548 373.421 138.892 382.697 154.958C391.311 169.877 395.121 182.978 394.128 194.262C393.355 205.546 389.656 215.396 383.031 223.811C376.627 232.226 366.688 242.554 353.217 254.794L435.375 254.797L464.198 304.716L275.367 304.709L246.544 254.79Z" stroke="#1B1B18" stroke-width="1" stroke-linejoin="round" />
                        </g>
                        <g style="mix-blend-mode: hard-light" class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4">
                            <path d="M67.41 125.402L44.5515 125.401L15.5625 75.1953L101.364 75.1985L233.886 304.712L170.942 304.71L67.41 125.402Z" fill="#F0ACB8" />
                            <path d="M67.41 125.402L44.5515 125.401L15.5625 75.1953L101.364 75.1985L233.886 304.712L170.942 304.71L67.41 125.402Z" stroke="#1B1B18" stroke-width="1" />
                        </g>
                    </svg>

                    {{-- Dark Mode 12 SVG --}}
                    <svg class="w-[448px] max-w-none relative -mt-[4.9rem] -ml-8 lg:ml-0 lg:-mt-[6.6rem] hidden dark:block" viewBox="0 0 440 376" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4">
                            <path d="M188.263 355.73L188.595 355.73C195.441 348.845 205.766 339.761 219.569 328.477C232.93 317.193 242.978 308.205 249.714 301.511C256.34 294.626 260.867 287.358 263.296 279.708C265.725 272.058 264.565 264.121 259.816 255.896C254.516 246.716 247.062 239.352 237.454 233.805C227.957 228.067 217.908 225.198 207.307 225.198C196.927 225.197 190.136 227.97 186.934 233.516C183.621 238.872 184.726 246.331 190.247 255.894L125.647 255.891C116.371 239.825 112.395 225.481 113.72 212.858C115.265 200.235 121.559 190.481 132.602 183.596C143.754 176.52 158.607 172.982 177.159 172.983C196.594 172.984 215.863 176.523 234.968 183.6C253.961 190.486 271.299 200.241 286.98 212.864C302.661 225.488 315.14 239.833 324.416 255.899C333.03 270.817 336.841 283.918 335.847 295.203C335.075 306.487 331.376 316.336 324.75 324.751C318.346 333.167 308.408 343.494 294.936 355.734L377.094 355.737L405.917 405.656L217.087 405.649L188.263 355.73Z" fill="black"/>
                            <path d="M9.11884 226.339L-13.7396 226.338L-42.7286 176.132L43.0733 176.135L175.595 405.649L112.651 405.647L9.11884 226.339Z" fill="black"/>
                            <path d="M188.263 355.73L188.595 355.73C195.441 348.845 205.766 339.761 219.569 328.477C232.93 317.193 242.978 308.205 249.714 301.511C256.34 294.626 260.867 287.358 263.296 279.708C265.725 272.058 264.565 264.121 259.816 255.896C254.516 246.716 247.062 239.352 237.454 233.805C227.957 228.067 217.908 225.198 207.307 225.198C196.927 225.197 190.136 227.97 186.934 233.516C183.621 238.872 184.726 246.331 190.247 255.894L125.647 255.891C116.371 239.825 112.395 225.481 113.72 212.858C115.265 200.235 121.559 190.481 132.602 183.596C143.754 176.52 158.607 172.982 177.159 172.983C196.594 172.984 215.863 176.523 234.968 183.6C253.961 190.486 271.299 200.241 286.98 212.864C302.661 225.488 315.14 239.833 324.416 255.899C333.03 270.817 336.841 283.918 335.847 295.203C335.075 306.487 331.376 316.336 324.75 324.751C318.346 333.167 308.408 343.494 294.936 355.734L377.094 355.737L405.917 405.656L217.087 405.649L188.263 355.73Z" stroke="#FF750F" stroke-width="1"/>
                            <path d="M9.11884 226.339L-13.7396 226.338L-42.7286 176.132L43.0733 176.135L175.595 405.649L112.651 405.647L9.11884 226.339Z" stroke="#FF750F" stroke-width="1"/>
                            <path d="M204.592 327.449L204.923 327.449C211.769 320.564 222.094 311.479 235.897 300.196C249.258 288.912 259.306 279.923 266.042 273.23C272.668 266.345 277.195 259.077 279.624 251.427C282.053 243.777 280.893 235.839 276.145 227.615C270.844 218.435 263.39 211.071 253.782 205.524C244.285 199.786 234.236 196.917 223.635 196.916C213.255 196.916 206.464 199.689 203.262 205.235C199.949 210.59 201.054 218.049 206.575 227.612L141.975 227.61C132.699 211.544 128.723 197.2 130.048 184.577C131.593 171.954 137.887 162.2 148.93 155.315C160.083 148.239 174.935 144.701 193.487 144.702C212.922 144.703 232.192 148.242 251.296 155.319C270.289 162.205 287.627 171.96 303.308 184.583C318.989 197.207 331.468 211.552 340.745 227.618C349.358 242.536 353.169 255.637 352.175 266.921C351.403 278.205 347.704 288.055 341.078 296.47C334.674 304.885 324.736 315.213 311.264 327.453L393.422 327.456L422.246 377.375L233.415 377.368L204.592 327.449Z" fill="#391800"/>
                            <path d="M25.447 198.058L2.58852 198.057L-26.4005 147.851L59.4015 147.854L191.923 377.368L128.979 377.365L25.447 198.058Z" fill="#391800"/>
                            <path d="M204.592 327.449L204.923 327.449C211.769 320.564 222.094 311.479 235.897 300.196C249.258 288.912 259.306 279.923 266.042 273.23C272.668 266.345 277.195 259.077 279.624 251.427C282.053 243.777 280.893 235.839 276.145 227.615C270.844 218.435 263.39 211.071 253.782 205.524C244.285 199.786 234.236 196.917 223.635 196.916C213.255 196.916 206.464 199.689 203.262 205.235C199.949 210.59 201.054 218.049 206.575 227.612L141.975 227.61C132.699 211.544 128.723 197.2 130.048 184.577C131.593 171.954 137.887 162.2 148.93 155.315C160.083 148.239 174.935 144.701 193.487 144.702C212.922 144.703 232.192 148.242 251.296 155.319C270.289 162.205 287.627 171.96 303.308 184.583C318.989 197.207 331.468 211.552 340.745 227.618C349.358 242.536 353.169 255.637 352.175 266.921C351.403 278.205 347.704 288.055 341.078 296.47C334.674 304.885 324.736 315.213 311.264 327.453L393.422 327.456L422.246 377.375L233.415 377.368L204.592 327.449Z" stroke="#FF750F" stroke-width="1"/>
                            <path d="M25.447 198.058L2.58852 198.057L-26.4005 147.851L59.4015 147.854L191.923 377.368L128.979 377.365L25.447 198.058Z" stroke="#FF750F" stroke-width="1"/>
                        </g>
                        <g class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4" style="mix-blend-mode:hard-light">
                            <path d="M217.342 305.363L217.673 305.363C224.519 298.478 234.844 289.393 248.647 278.11C262.008 266.826 272.056 257.837 278.792 251.144C285.418 244.259 289.945 236.991 292.374 229.341C294.803 221.691 293.643 213.753 288.895 205.529C283.594 196.349 276.14 188.985 266.532 183.438C257.035 177.7 246.986 174.831 236.385 174.83C226.005 174.83 219.214 177.603 216.012 183.149C212.699 188.504 213.804 195.963 219.325 205.527L154.725 205.524C145.449 189.458 141.473 175.114 142.798 162.491C144.343 149.868 150.637 140.114 161.68 133.229C172.833 126.153 187.685 122.615 206.237 122.616C225.672 122.617 244.942 126.156 264.046 133.233C283.039 140.119 300.377 149.874 316.058 162.497C331.739 175.121 344.218 189.466 353.495 205.532C362.108 220.45 365.919 233.551 364.925 244.835C364.153 256.12 360.454 265.969 353.828 274.384C347.424 282.799 337.486 293.127 324.014 305.367L406.172 305.37L434.996 355.289L246.165 355.282L217.342 305.363Z" fill="#733000"/>
                            <path d="M38.197 175.972L15.3385 175.971L-13.6505 125.765L72.1515 125.768L204.673 355.282L141.729 355.279L38.197 175.972Z" fill="#733000"/>
                            <path d="M217.342 305.363L217.673 305.363C224.519 298.478 234.844 289.393 248.647 278.11C262.008 266.826 272.056 257.837 278.792 251.144C285.418 244.259 289.945 236.991 292.374 229.341C294.803 221.691 293.643 213.753 288.895 205.529C283.594 196.349 276.14 188.985 266.532 183.438C257.035 177.7 246.986 174.831 236.385 174.83C226.005 174.83 219.214 177.603 216.012 183.149C212.699 188.504 213.804 195.963 219.325 205.527L154.725 205.524C145.449 189.458 141.473 175.114 142.798 162.491C144.343 149.868 150.637 140.114 161.68 133.229C172.833 126.153 187.685 122.615 206.237 122.616C225.672 122.617 244.942 126.156 264.046 133.233C283.039 140.119 300.377 149.874 316.058 162.497C331.739 175.121 344.218 189.466 353.495 205.532C362.108 220.45 365.919 233.551 364.925 244.835C364.153 256.12 360.454 265.969 353.828 274.384C347.424 282.799 337.486 293.127 324.014 305.367L406.172 305.37L434.996 355.289L246.165 355.282L217.342 305.363Z" stroke="#FF750F" stroke-width="1"/>
                            <path d="M38.197 175.972L15.3385 175.971L-13.6505 125.765L72.1515 125.768L204.673 355.282L141.729 355.279L38.197 175.972Z" stroke="#FF750F" stroke-width="1"/>
                        </g>
                        <g class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4">
                            <path d="M217.342 305.363L217.673 305.363C224.519 298.478 234.844 289.393 248.647 278.11C262.008 266.826 272.056 257.837 278.792 251.144C285.418 244.259 289.945 236.991 292.374 229.341C294.803 221.691 293.643 213.753 288.895 205.529C283.594 196.349 276.14 188.985 266.532 183.438C257.035 177.7 246.986 174.831 236.385 174.83C226.005 174.83 219.214 177.603 216.012 183.149C212.699 188.504 213.804 195.963 219.325 205.527L154.726 205.524C145.449 189.458 141.473 175.114 142.798 162.491C144.343 149.868 150.637 140.114 161.68 133.229C172.833 126.153 187.685 122.615 206.237 122.616C225.672 122.617 244.942 126.156 264.046 133.233C283.039 140.119 300.377 149.874 316.058 162.497C331.739 175.121 344.218 189.466 353.495 205.532C362.108 220.45 365.919 233.551 364.925 244.835C364.153 256.12 360.454 265.969 353.828 274.384C347.424 282.799 337.486 293.127 324.014 305.367L406.172 305.37L434.996 355.289L246.165 355.282L217.342 305.363Z" stroke="#FF750F" stroke-width="1"/>
                            <path d="M38.197 175.972L15.3385 175.971L-13.6505 125.765L72.1515 125.768L204.673 355.282L141.729 355.279L38.197 175.972Z" stroke="#FF750F" stroke-width="1"/>
                        </g>
                        <g class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4">
                            <path d="M188.467 355.363L188.798 355.363C195.644 348.478 205.969 339.393 219.772 328.11C233.133 316.826 243.181 307.837 249.917 301.144C253.696 297.217 256.792 293.166 259.205 288.991C261.024 285.845 262.455 282.628 263.499 279.341C265.928 271.691 264.768 263.753 260.02 255.529C254.719 246.349 247.265 238.985 237.657 233.438C228.16 227.7 218.111 224.831 207.51 224.83C197.13 224.83 190.339 227.603 187.137 233.149C183.824 238.504 184.929 245.963 190.45 255.527L125.851 255.524C116.574 239.458 112.598 225.114 113.923 212.491C114.615 206.836 116.261 201.756 118.859 197.253C122.061 191.704 126.709 187.03 132.805 183.229C143.958 176.153 158.81 172.615 177.362 172.616C196.797 172.617 216.067 176.156 235.171 183.233C254.164 190.119 271.502 199.874 287.183 212.497C302.864 225.121 315.343 239.466 324.62 255.532C333.233 270.45 337.044 283.551 336.05 294.835C335.46 303.459 333.16 311.245 329.151 318.194C327.915 320.337 326.515 322.4 324.953 324.384C318.549 332.799 308.611 343.127 295.139 355.367L377.297 355.37L406.121 405.289L217.29 405.282L188.467 355.363Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M9.32197 225.972L-13.5365 225.971L-42.5255 175.765L43.2765 175.768L175.798 405.282L112.854 405.279L9.32197 225.972Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M345.247 111.915C329.566 99.2919 312.229 89.5371 293.235 82.6512L235.167 183.228C254.161 190.114 271.498 199.869 287.179 212.492L345.247 111.915Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M382.686 154.964C373.41 138.898 360.931 124.553 345.25 111.93L287.182 212.506C302.863 225.13 315.342 239.475 324.618 255.541L382.686 154.964Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M293.243 82.6472C274.139 75.57 254.869 72.031 235.434 72.0303L177.366 172.607C196.801 172.608 216.071 176.147 235.175 183.224L293.243 82.6472Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M394.118 194.257C395.112 182.973 391.301 169.872 382.688 154.953L324.619 255.53C333.233 270.448 337.044 283.55 336.05 294.834L394.118 194.257Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M235.432 72.0311C216.88 72.0304 202.027 75.5681 190.875 82.6442L132.806 183.221C143.959 176.145 158.812 172.607 177.363 172.608L235.432 72.0311Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M265.59 124.25C276.191 124.251 286.24 127.12 295.737 132.858L237.669 233.435C228.172 227.697 218.123 224.828 207.522 224.827L265.59 124.25Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M295.719 132.859C305.326 138.406 312.78 145.77 318.081 154.95L260.013 255.527C254.712 246.347 247.258 238.983 237.651 233.436L295.719 132.859Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M387.218 217.608C391.227 210.66 393.527 202.874 394.117 194.25L336.049 294.827C335.459 303.451 333.159 311.237 329.15 318.185L387.218 217.608Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M245.211 132.577C248.413 127.03 255.204 124.257 265.584 124.258L207.516 224.835C197.136 224.834 190.345 227.607 187.143 233.154L245.211 132.577Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M318.094 154.945C322.842 163.17 324.002 171.107 321.573 178.757L263.505 279.334C265.934 271.684 264.774 263.746 260.026 255.522L318.094 154.945Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M176.925 96.6737C180.127 91.1249 184.776 86.4503 190.871 82.6499L132.803 183.227C126.708 187.027 122.059 191.702 118.857 197.25L176.925 96.6737Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M387.226 217.606C385.989 219.749 384.59 221.813 383.028 223.797L324.96 324.373C326.522 322.39 327.921 320.326 329.157 318.183L387.226 217.606Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M317.269 188.408C319.087 185.262 320.519 182.045 321.562 178.758L263.494 279.335C262.451 282.622 261.019 285.839 259.201 288.985L317.269 188.408Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M245.208 132.573C241.895 137.928 243 145.387 248.522 154.95L190.454 255.527C184.932 245.964 183.827 238.505 187.14 233.15L245.208 132.573Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M176.93 96.6719C174.331 101.175 172.686 106.255 171.993 111.91L113.925 212.487C114.618 206.831 116.263 201.752 118.862 197.249L176.93 96.6719Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M317.266 188.413C314.853 192.589 311.757 196.64 307.978 200.566L249.91 301.143C253.689 297.216 256.785 293.166 259.198 288.99L317.266 188.413Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M464.198 304.708L435.375 254.789L377.307 355.366L406.13 405.285L464.198 304.708Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M353.209 254.787C366.68 242.548 376.618 232.22 383.023 223.805L324.955 324.382C318.55 332.797 308.612 343.124 295.141 355.364L353.209 254.787Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M435.37 254.787L353.212 254.784L295.144 355.361L377.302 355.364L435.37 254.787Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M183.921 154.947L248.521 154.95L190.453 255.527L125.853 255.524L183.921 154.947Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M171.992 111.914C170.668 124.537 174.643 138.881 183.92 154.947L125.852 255.524C116.575 239.458 112.599 225.114 113.924 212.491L171.992 111.914Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M307.987 200.562C301.251 207.256 291.203 216.244 277.842 227.528L219.774 328.105C233.135 316.821 243.183 307.832 249.919 301.139L307.987 200.562Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M15.5469 75.1797L44.5359 125.386L-13.5321 225.963L-42.5212 175.756L15.5469 75.1797Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M277.836 227.536C264.033 238.82 253.708 247.904 246.862 254.789L188.794 355.366C195.64 348.481 205.965 339.397 219.768 328.113L277.836 227.536Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M275.358 304.706L464.189 304.713L406.12 405.29L217.29 405.283L275.358 304.706Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M44.5279 125.39L67.3864 125.39L9.31834 225.967L-13.5401 225.966L44.5279 125.39Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M101.341 75.1911L233.863 304.705L175.795 405.282L43.2733 175.768L101.341 75.1911ZM15.5431 75.19L-42.525 175.767L43.277 175.77L101.345 75.1932L15.5431 75.19Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M246.866 254.784L246.534 254.784L188.466 355.361L188.798 355.361L246.866 254.784Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M246.539 254.781L275.362 304.701L217.294 405.277L188.471 355.358L246.539 254.781Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M67.3906 125.391L170.923 304.698L112.855 405.275L9.32257 225.967L67.3906 125.391Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                            <path d="M170.921 304.699L233.865 304.701L175.797 405.278L112.853 405.276L170.921 304.699Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="bevel"/>
                        </g>
                        <g class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4" style="mix-blend-mode:hard-light">
                            <path d="M246.544 254.79L246.875 254.79C253.722 247.905 264.046 238.82 277.849 227.537C291.21 216.253 301.259 207.264 307.995 200.57C314.62 193.685 319.147 186.418 321.577 178.768C324.006 171.117 322.846 163.18 318.097 154.956C312.796 145.775 305.342 138.412 295.735 132.865C286.238 127.127 276.189 124.258 265.588 124.257C255.208 124.257 248.416 127.03 245.214 132.576C241.902 137.931 243.006 145.39 248.528 154.953L183.928 154.951C174.652 138.885 170.676 124.541 172 111.918C173.546 99.2946 179.84 89.5408 190.882 82.6559C202.035 75.5798 216.887 72.0421 235.439 72.0428C254.874 72.0435 274.144 75.5825 293.248 82.6598C312.242 89.5457 329.579 99.3005 345.261 111.924C360.942 124.548 373.421 138.892 382.697 154.958C391.311 169.877 395.121 182.978 394.128 194.262C393.355 205.546 389.656 215.396 383.031 223.811C376.627 232.226 366.688 242.554 353.217 254.794L435.375 254.797L464.198 304.716L275.367 304.709L246.544 254.79Z" fill="#4B0600"/>
                            <path d="M246.544 254.79L246.875 254.79C253.722 247.905 264.046 238.82 277.849 227.537C291.21 216.253 301.259 207.264 307.995 200.57C314.62 193.685 319.147 186.418 321.577 178.768C324.006 171.117 322.846 163.18 318.097 154.956C312.796 145.775 305.342 138.412 295.735 132.865C286.238 127.127 276.189 124.258 265.588 124.257C255.208 124.257 248.416 127.03 245.214 132.576C241.902 137.931 243.006 145.39 248.528 154.953L183.928 154.951C174.652 138.885 170.676 124.541 172 111.918C173.546 99.2946 179.84 89.5408 190.882 82.6559C202.035 75.5798 216.887 72.0421 235.439 72.0428C254.874 72.0435 274.144 75.5825 293.248 82.6598C312.242 89.5457 329.579 99.3005 345.261 111.924C360.942 124.548 373.421 138.892 382.697 154.958C391.311 169.877 395.121 182.978 394.128 194.262C393.355 205.546 389.656 215.396 383.031 223.811C376.627 232.226 366.688 242.554 353.217 254.794L435.375 254.797L464.198 304.716L275.367 304.709L246.544 254.79Z" stroke="#FF750F" stroke-width="1" stroke-linejoin="round"/>
                        </g>
                        <g class="transition-all delay-300 translate-y-0 opacity-100 duration-750 starting:opacity-0 starting:translate-y-4" style="mix-blend-mode:hard-light">
                            <path d="M67.41 125.402L44.5515 125.401L15.5625 75.1953L101.364 75.1985L233.886 304.712L170.942 304.71L67.41 125.402Z" fill="#4B0600"/>
                            <path d="M67.41 125.402L44.5515 125.401L15.5625 75.1953L101.364 75.1985L233.886 304.712L170.942 304.71L67.41 125.402Z" stroke="#FF750F" stroke-width="1"/>
                        </g>
                    </svg>
                    <div class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"></div>
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
