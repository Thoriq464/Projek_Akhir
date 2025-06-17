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

            .stats-card {
                background: white;
                border-radius: 15px;
                padding: 2rem;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                margin-bottom: 2rem;
            }

            .testimonial-card {
                background: white;
                border-radius: 15px;
                padding: 2rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                text-align: center;
                margin-bottom: 2rem;
            }

            .avatar {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                margin: 0 auto 1rem;
                background: var(--primary-color);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.5rem;
                font-weight: bold;
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
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonial">Testimoni</a>
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

        <!-- Stats Section -->
        <section class="section-padding" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="stats-card">
                            <h2 class="display-4 fw-bold text-primary mb-2">1000+</h2>
                            <p class="text-secondary mb-0">Kosakata Jawa</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="stats-card">
                            <h2 class="display-4 fw-bold text-primary mb-2">24/7</h2>
                            <p class="text-secondary mb-0">Tersedia Online</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="stats-card">
                            <h2 class="display-4 fw-bold text-primary mb-2">500+</h2>
                            <p class="text-secondary mb-0">Pengguna Aktif</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="stats-card">
                            <h2 class="display-4 fw-bold text-primary mb-2">99%</h2>
                            <p class="text-secondary mb-0">Akurasi Respon</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Demo Section -->
        <section id="demo" class="section-padding">
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
        <section id="about" class="section-padding" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
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
                                    <h3 class="fw-bold text-primary mb-2">Mudah</h3>
                                    <p class="mb-0 text-secondary">Digunakan</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <h3 class="fw-bold text-primary mb-2">Akurat</h3>
                                    <p class="mb-0 text-secondary">Terjemahan</p>
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

        <!-- Testimonial Section -->
        <section id="testimonial" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                        <h2 class="display-5 fw-bold text-gradient mb-3">Apa Kata Mereka</h2>
                        <p class="lead text-secondary">
                            Pengalaman pengguna yang telah merasakan manfaat JavDict
                        </p>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-card">
                            <div class="avatar">S</div>
                            <p class="text-secondary mb-3">
                                "JavDict sangat membantu saya belajar bahasa Jawa. Chatbot-nya responsif dan mudah dipahami!"
                            </p>
                            <h6 class="fw-bold mb-1">Sari Dewi</h6>
                            <small class="text-secondary">Mahasiswa</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-card">
                            <div class="avatar">B</div>
                            <p class="text-secondary mb-3">
                                "Aplikasi yang luar biasa! Membantu saya mengajarkan bahasa Jawa kepada anak-anak dengan cara yang menyenangkan."
                            </p>
                            <h6 class="fw-bold mb-1">Budi Santoso</h6>
                            <small class="text-secondary">Guru</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-card">
                            <div class="avatar">A</div>
                            <p class="text-secondary mb-3">
                                "Interface yang user-friendly dan database kosakata yang lengkap. Sangat recommended!"
                            </p>
                            <h6 class="fw-bold mb-1">Andi Wijaya</h6>
                            <small class="text-secondary">Peneliti Budaya</small>
                        </div>
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

                // Counter animation for stats
                const counters = document.querySelectorAll('.stats-card h2');
                counters.forEach(counter => {
                    const updateCount = () => {
                        const target = parseInt(counter.textContent);
                        const count = parseInt(counter.getAttribute('data-count') || 0);
                        const increment = target / 100;
                        
                        if (count < target) {
                            counter.setAttribute('data-count', count + increment);
                            counter.textContent = Math.ceil(count + increment);
                            setTimeout(updateCount, 20);
                        } else {
                            counter.textContent = target;
                        }
                    };
                    
                    // Start animation when element comes into view
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                updateCount();
                                observer.unobserve(entry.target);
                            }
                        });
                    });
                    
                    observer.observe(counter);
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

            // Add hover effect to testimonial cards
            document.querySelectorAll('.testimonial-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        </script>
    </body>
</html>
