<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JavDict - Kamus Jawa Digital Berbasis Chatbot</title>
        <meta name="description" content="Kamus Bahasa Jawa digital dengan chatbot untuk mempelajari dan melestarikan budaya Jawa. Temukan arti kata-kata Jawa dengan mudah dan interaktif.">
        <meta name="keywords" content="kamus jawa, bahasa jawa, chatbot, AI, budaya jawa, dictionary, javanese">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">        <style>            :root {
                --primary-color: #6B46C1;
                --secondary-color: #10B981;
                --accent-color: #F59E0B;
                --text-primary: #1F2937;
                --text-secondary: #6B7280;
            }/* Prevent horizontal scroll */
            html, body {
                overflow-x: hidden;
                max-width: 100%;
            }

            /* Ensure all containers don't overflow */
            *, *::before, *::after {
                box-sizing: border-box;
            }

            img, video, iframe {
                max-width: 100%;
                height: auto;
            }

            .w-100 {
                width: 100% !important;
                max-width: 100% !important;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }            body {
                font-family: 'Poppins', sans-serif;
                line-height: 1.6;
                color: var(--text-primary);
                background-color: #F8FAFC;
                overflow-x: hidden;
                position: relative;
            }

            .container {
                max-width: 100%;
                padding-left: 15px;
                padding-right: 15px;
            }

            section {
                overflow-x: hidden;
                position: relative;
            }

            .row {
                margin-left: 0;
                margin-right: 0;
            }

            .row > * {
                padding-left: 12px;
                padding-right: 12px;
            }

            .gradient-bg {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            }            .hero-section {
                min-height: 80vh;
                display: flex;
                align-items: center;
                position: relative;
                overflow: hidden;
                padding: 100px 0 60px;
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
            }            .hero-content {
                position: relative;
                z-index: 2;
            }

            /* Custom viewport height classes for better centering */
            .min-vh-75 {
                min-height: 75vh;
            }

            /* Improve hero section centering on mobile */
            @media (max-width: 768px) {
                .hero-section {
                    min-height: 70vh !important;
                    padding: 80px 0 40px !important;
                }
                
                .min-vh-75 {
                    min-height: 60vh !important;
                }
            }

            @media (max-width: 480px) {
                .hero-section {
                    min-height: 65vh !important;
                    padding: 60px 0 30px !important;
                }
                
                .min-vh-75 {
                    min-height: 50vh !important;
                }
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
            }            .feature-card {
                background: white;
                border-radius: 15px;
                padding: 2rem;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08), 0 15px 35px rgba(0, 0, 0, 0.05);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                height: 100%;
                margin-bottom: 1.5rem;
                position: relative;
            }

            .feature-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12), 0 25px 60px rgba(0, 0, 0, 0.08);
            }

            .feature-card::after {
                content: '';
                position: absolute;
                bottom: -8px;
                left: 50%;
                transform: translateX(-50%);
                width: 80%;
                height: 8px;
                background: linear-gradient(90deg, transparent, rgba(107, 70, 193, 0.1), transparent);
                border-radius: 50%;
                filter: blur(4px);
                opacity: 0.6;
                transition: opacity 0.3s ease;
            }

            .feature-card:hover::after {
                opacity: 0.8;
                width: 90%;
                height: 12px;
            }

            /* Responsive grid for 4 features */
            @media (min-width: 992px) {
                .features-grid .col-lg-3 {
                    flex: 0 0 25%;
                    max-width: 25%;
                }
            }

            @media (min-width: 576px) and (max-width: 991.98px) {
                .features-grid .col-sm-6 {
                    flex: 0 0 50%;
                    max-width: 50%;
                }
            }

            @media (max-width: 575.98px) {
                .features-grid .col-sm-6 {
                    flex: 0 0 100%;
                    max-width: 100%;
                    margin-bottom: 1rem;
                }
                
                .feature-card {
                    padding: 1.5rem;
                    margin-bottom: 1rem;
                }
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
            }            .btn-primary-custom {
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
            }            .btn-secondary-custom:hover {
                background: white;
                color: var(--primary-color);
            }            /* Enhanced Desktop Button Styling */
            @media (min-width: 1024px) {
                .btn-primary-custom {
                    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
                    border: none;
                    padding: 1.25rem 2.5rem;
                    font-size: 1.125rem;
                    font-weight: 600;
                    border-radius: 50px;
                    color: white;
                    text-decoration: none;
                    display: inline-flex;
                    align-items: center;
                    transition: all 0.3s ease;
                    box-shadow: 0 8px 25px rgba(107, 70, 193, 0.25);
                    letter-spacing: 0.025em;
                }

                .btn-primary-custom:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 12px 35px rgba(107, 70, 193, 0.35);
                    color: white;
                    background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
                }

                .btn-secondary-custom {
                    background: transparent;
                    border: 2px solid var(--primary-color);
                    padding: 1.125rem 2.375rem;
                    font-size: 1.125rem;
                    font-weight: 600;
                    border-radius: 50px;
                    color: var(--primary-color);
                    text-decoration: none;
                    display: inline-flex;
                    align-items: center;
                    transition: all 0.3s ease;
                    letter-spacing: 0.025em;
                }

                .btn-secondary-custom:hover {
                    background: var(--primary-color);
                    color: white;
                    transform: translateY(-3px);
                    box-shadow: 0 8px 25px rgba(107, 70, 193, 0.25);
                }
            }

            .floating-element {
                position: absolute;
                opacity: 0.1;
                animation: float 6s ease-in-out infinite;
            }

            .floating-element:nth-child(odd) {
                animation-delay: -3s;
            }            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }            /* General Desktop Improvements */
            @media (min-width: 1024px) {
                /* Better spacing and typography */
                body {
                    line-height: 1.8;
                }

                .container {
                    max-width: 1200px;
                }

                .section-padding {
                    padding: 120px 0;
                }

                /* Hero section improvements for better centering */
                .hero-section {
                    min-height: 85vh;
                    padding: 120px 0 80px;
                }

                .min-vh-75 {
                    min-height: 70vh;
                }

                /* Enhanced headings */
                .display-5 {
                    font-size: 3rem;
                    font-weight: 700;
                    line-height: 1.2;
                }

                .lead {
                    font-size: 1.25rem;
                    line-height: 1.7;
                    font-weight: 400;
                }

                /* Better card spacing */
                .row.g-4 > * {
                    margin-bottom: 2rem;
                }

                /* Enhanced hover effects */
                .feature-card, .stats-card, .testimonial-card {
                    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
                }

                .feature-card:hover {
                    transform: translateY(-15px) scale(1.02);
                }

                .stats-card:hover {
                    transform: translateY(-10px) scale(1.02);
                }

                .testimonial-card:hover {
                    transform: translateY(-10px) scale(1.02);
                }

                /* Enhanced navigation */
                .navbar {
                    padding: 1.25rem 0;
                    background: rgba(255, 255, 255, 0.98) !important;
                    backdrop-filter: blur(20px);
                }

                .navbar-nav .nav-link {
                    font-size: 1.1rem;
                    font-weight: 500;
                    padding: 1rem 1.5rem;
                    margin: 0 0.25rem;
                    border-radius: 25px;
                    transition: all 0.3s ease;
                }

                .navbar-nav .nav-link:hover {
                    background: rgba(107, 70, 193, 0.1);
                    color: var(--primary-color) !important;
                    transform: translateY(-2px);
                }

                .navbar-brand {
                    font-size: 1.75rem;
                    font-weight: 700;
                }

                /* Hero section improvements */
                .hero-section {
                    min-height: 100vh;
                    padding: 140px 0 100px;
                }

                .hero-content h1 {
                    font-size: 3.5rem;
                    font-weight: 800;
                    line-height: 1.1;
                    margin-bottom: 2rem;
                    letter-spacing: -0.02em;
                }

                .hero-content .lead {
                    font-size: 1.375rem;
                    margin-bottom: 3rem;
                    max-width: 650px;
                }

                /* Better feature icons */
                .feature-icon {
                    width: 90px;
                    height: 90px;
                    font-size: 2.25rem;
                    margin-bottom: 2.5rem;
                    transition: all 0.3s ease;
                }

                .feature-card:hover .feature-icon {
                    transform: scale(1.1) rotateY(10deg);
                }

                /* Improved chat container */
                .modern-chat-container {
                    max-width: 550px;
                    min-height: 650px;
                    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1), 0 35px 100px rgba(0, 0, 0, 0.05);
                }

                .modern-chat-container:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15), 0 45px 120px rgba(0, 0, 0, 0.08);
                }

                /* Better spacing for demo and about sections */
                .demo-section, .about-section {
                    padding: 140px 0;
                }

                .demo-section h2, .about-section h2 {
                    font-size: 3rem;
                    font-weight: 700;
                    margin-bottom: 2.5rem;
                }

                /* Enhanced footer */
                footer {
                    padding: 100px 0 50px;
                }

                footer h4 {
                    font-size: 1.75rem;
                    margin-bottom: 1.5rem;
                }

                footer h6 {
                    font-size: 1.25rem;
                    margin-bottom: 1.5rem;
                }

                footer p, footer a {
                    font-size: 1.1rem;
                    line-height: 1.8;
                }

                /* Social media hover effects */
                footer .d-flex.gap-3 a {
                    width: 45px;
                    height: 45px;
                    background: rgba(255, 255, 255, 0.1);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.3s ease;
                    text-decoration: none;
                }

                footer .d-flex.gap-3 a:hover {
                    background: rgba(255, 255, 255, 0.2);
                    transform: translateY(-3px);
                }
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
            }        .navbar-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .navbar-toggler {
            border: none;
            padding: 4px 8px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
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
            }            .stats-card {
                background: white;
                border-radius: 15px;
                padding: 1.5rem;
                text-align: center;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08), 0 15px 35px rgba(0, 0, 0, 0.05);
                margin-bottom: 2rem;
                position: relative;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                height: auto;
                min-height: 140px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .stats-card .display-4 {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                line-height: 1.1;
            }

            .stats-card p {
                font-size: 0.95rem;
                margin-bottom: 0;
                font-weight: 500;
                opacity: 0.8;
            }

            .stats-card::after {
                content: '';
                position: absolute;
                bottom: -6px;
                left: 50%;
                transform: translateX(-50%);
                width: 70%;
                height: 6px;
                background: linear-gradient(90deg, transparent, rgba(6, 182, 212, 0.1), transparent);
                border-radius: 50%;
                filter: blur(3px);
                opacity: 0.5;
            }

            .stats-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1), 0 20px 50px rgba(0, 0, 0, 0.06);
            }

            .stats-card:hover::after {
                opacity: 0.7;
                width: 80%;
                height: 8px;
            }            .testimonial-card {
                background: white;
                border-radius: 15px;
                padding: 2rem;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08), 0 15px 35px rgba(0, 0, 0, 0.05);
                text-align: center;
                margin-bottom: 2rem;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                position: relative;
            }

            .testimonial-card::after {
                content: '';
                position: absolute;
                bottom: -6px;
                left: 50%;
                transform: translateX(-50%);
                width: 70%;
                height: 6px;
                background: linear-gradient(90deg, transparent, rgba(245, 158, 11, 0.1), transparent);
                border-radius: 50%;
                filter: blur(3px);
                opacity: 0.5;
            }

            .testimonial-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1), 0 20px 50px rgba(0, 0, 0, 0.06);
            }

            .testimonial-card:hover::after {
                opacity: 0.7;
                width: 80%;
                height: 8px;
            }.avatar {
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
            }            /* Modern Chat Container Styles - Flutter Inspired */
            .modern-chat-container {
                max-width: 450px;
                min-height: 580px;
                height: auto;
                margin: 0 auto;
                background: white;
                border-radius: 24px;
                box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08), 0 25px 70px rgba(0, 0, 0, 0.04);
                overflow: visible;
                border: 1px solid rgba(255, 255, 255, 0.3);
                position: relative;
                transition: all 0.3s ease;
                display: flex;
                flex-direction: column;
            }

            .modern-chat-container::after {
                content: '';
                position: absolute;
                bottom: -12px;
                left: 50%;
                transform: translateX(-50%);
                width: 90%;
                height: 12px;
                background: linear-gradient(90deg, transparent, rgba(107, 70, 193, 0.12), transparent);
                border-radius: 50%;
                filter: blur(8px);
                opacity: 0.7;
                z-index: -1;
            }

            .modern-chat-container:hover {
                transform: translateY(-3px);
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12), 0 35px 90px rgba(0, 0, 0, 0.06);
            }

            .modern-chat-container:hover::after {
                opacity: 0.9;
                width: 100%;
                height: 16px;
            }            .chat-header {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
                color: white;
                padding: 24px;
                position: relative;
                flex-shrink: 0;
                border-top-left-radius: 24px;
                border-top-right-radius: 24px;
            }

            .bot-avatar-container {
                position: relative;
            }            .bot-avatar {
                width: 52px;
                height: 52px;
                background: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
                color: var(--primary-color);
                font-size: 1.4rem;
            }

            .chat-title {
                color: white;
                font-size: 19px;
                font-weight: 700;
                letter-spacing: 0.5px;
                margin: 0;
            }

            .status-badge {
                background: rgba(255, 255, 255, 0.25);
                border-radius: 14px;
                padding: 5px 14px;
                display: inline-block;
            }

            .status-badge span {
                color: white;
                font-size: 13px;
                font-weight: 500;
            }

            .status-badge span {
                color: white;
                font-size: 12px;
                font-weight: 500;
            }            .chat-body {
                position: relative;
                height: 380px;
                min-height: 380px;
                overflow: hidden;
                flex: 1;
                display: flex;
                flex-direction: column;
            }.chat-pattern {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image: 
                    radial-gradient(circle at 20px 80px, rgba(107, 70, 193, 0.05) 0%, transparent 50%),
                    radial-gradient(circle at 80px 20px, rgba(6, 182, 212, 0.05) 0%, transparent 50%),
                    radial-gradient(circle at 40px 40px, rgba(245, 158, 11, 0.05) 0%, transparent 50%);
                background-size: 120px 120px;
                background-position: 0 0, 60px 60px, 30px 30px;
                z-index: 1;
            }            .messages-container {
                position: relative;
                z-index: 2;
                height: 100%;
                flex: 1;
                overflow-y: auto;
                overflow-x: hidden;
                padding: 24px;
                scrollbar-width: thin;
                scrollbar-color: rgba(0, 0, 0, 0.2) transparent;
                max-height: 350px;
            }

            .messages-container::-webkit-scrollbar {
                width: 4px;
            }

            .messages-container::-webkit-scrollbar-track {
                background: transparent;
            }

            .messages-container::-webkit-scrollbar-thumb {
                background: rgba(0, 0, 0, 0.2);
                border-radius: 2px;
            }

            .message-row {
                display: flex;
                align-items: flex-start;
                margin-bottom: 16px;
                animation: messageSlideIn 0.3s ease-out;
            }

            .message-row.bot-message {
                flex-direction: row;
            }            .message-row.user-message {
                flex-direction: row;
                justify-content: flex-end;
            }

            .message-avatar {
                flex-shrink: 0;
                margin: 0 12px;
            }

            .user-message .message-avatar {
                order: 2;
            }

            .user-message .message-content {
                order: 1;
                text-align: right;
            }            .bot-avatar-small, .user-avatar-small {
                width: 36px;
                height: 36px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 15px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.12);
            }            .bot-avatar-small {
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                color: white;
            }

            .user-avatar-small {
                background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
                color: white;
            }

            .message-content {
                flex: 1;
                max-width: 75%;
            }

            .message-bubble {
                border-radius: 20px;
                padding: 14px 18px;
                margin-bottom: 5px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
                position: relative;
                font-size: 15px;
                line-height: 1.4;
            }

            .bot-bubble {
                background: #f0f2f5;
                color: #1F2937;
            }            .user-bubble {
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                color: white;
            }

            .message-sender {
                font-size: 12px;
                font-weight: 500;
                opacity: 0.7;
                margin-left: 10px;
            }

            .user-message .message-sender {
                text-align: right;
                margin-right: 8px;
                margin-left: 0;
            }

            .typing-indicator {
                animation: fadeIn 0.3s ease-in;
            }

            .typing-bubble {
                background: #f0f2f5;
                border-radius: 18px;
                padding: 12px 16px;
                display: flex;
                align-items: center;
                gap: 8px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .typing-text {
                font-size: 14px;
                color: #6B7280;
                font-weight: 500;
            }

            .typing-dots {
                display: flex;
                gap: 4px;
            }

            .dot {
                width: 6px;
                height: 6px;
                background: #6B7280;
                border-radius: 50%;
                animation: typingDots 1.4s infinite ease-in-out;
            }            .dot:nth-child(1) { animation-delay: -0.32s; }
            .dot:nth-child(2) { animation-delay: -0.16s; }

            .chat-input {
                background: #f8f9fa;
                border-top: 1px solid #e9ecef;
                padding: 20px;
                position: relative;
                flex-shrink: 0;
                border-bottom-left-radius: 24px;
                border-bottom-right-radius: 24px;
            }

            .input-container {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .input-field {
                flex: 1;
                position: relative;
                display: flex;
                align-items: center;
            }

            .input-icon {
                position: absolute;
                left: 16px;
                color: #6B7280;
                font-size: 16px;
                z-index: 2;
            }            .input-field input {
                width: 100%;
                border: 1px solid #e5e7eb;
                border-radius: 28px;
                padding: 14px 18px 14px 52px;
                font-size: 15px;
                outline: none;
                transition: all 0.3s ease;
                background: white;
            }            .input-field input:focus {
                border-color: var(--primary-color);
                box-shadow: 0 0 0 4px rgba(107, 70, 193, 0.1);
            }

            .input-icon {
                position: absolute;
                left: 18px;
                color: #6B7280;
                font-size: 17px;
                z-index: 2;
            }

            .send-button {
                width: 48px;
                height: 48px;
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                border: none;
                border-radius: 50%;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(107, 70, 193, 0.35);
                font-size: 16px;
            }
                border: none;
                border-radius: 50%;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 12px rgba(107, 70, 193, 0.3);
            }            .send-button:hover {
                transform: scale(1.05);
                box-shadow: 0 6px 16px rgba(107, 70, 193, 0.4);
            }

            .send-button:active {
                transform: scale(0.95);
            }

            /* Animations */
            @keyframes messageSlideIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            @keyframes typingDots {
                0%, 80%, 100% {
                    transform: scale(0.8);
                    opacity: 0.5;
                }
                40% {
                    transform: scale(1);
                    opacity: 1;
                }            }            /* ===== RESPONSIVE DESIGN ===== */

            /* Prevent horizontal scrolling on all screen sizes */
            .container-fluid, .container {
                max-width: 100%;
                overflow-x: hidden;
            }

            /* Features responsive layout */
            @media (max-width: 575.98px) {
                .features-grid .col-sm-6 {
                    flex: 0 0 100% !important;
                    max-width: 100% !important;
                    padding-left: 15px !important;
                    padding-right: 15px !important;
                }
                
                .container {
                    padding-left: 15px !important;
                    padding-right: 15px !important;
                }
                
                .row {
                    margin-left: -15px !important;
                    margin-right: -15px !important;
                }
            }

            @media (min-width: 576px) and (max-width: 991.98px) {
                .features-grid .col-sm-6 {
                    flex: 0 0 50% !important;
                    max-width: 50% !important;
                }
            }

            @media (min-width: 992px) {
                .features-grid .col-lg-3 {
                    flex: 0 0 25% !important;
                    max-width: 25% !important;
                }
            }

            /* Mobile Small (360px and up) */
            @media (max-width: 480px) {
                /* Typography */
                .hero-section h1 {
                    font-size: 1.5rem !important;
                    line-height: 1.3;
                    margin-bottom: 1rem;
                }

                .hero-section .lead {
                    font-size: 0.9rem;
                    margin-bottom: 1.5rem;
                }

                /* Containers */
                .container {
                    padding-left: 15px;
                    padding-right: 15px;
                }

                /* Hero Section */
                .hero-section {
                    min-height: 90vh;
                    padding: 60px 0 30px;
                    text-align: center;
                }

                .hero-content .col-lg-6 {
                    margin-bottom: 2rem;
                }                /* Buttons */
                .btn-lg {
                    padding: 0.7rem 1.5rem;
                    font-size: 0.9rem;
                    width: 100%;
                    margin-bottom: 0.5rem;
                }

                .btn-primary-custom, .btn-secondary-custom {
                    padding: 0.7rem 1.5rem;
                    font-size: 0.9rem;
                    width: 100%;
                    text-align: center;
                    margin-bottom: 0.5rem;
                }

                /* Hero adjustments */
                .hero-content {
                    text-align: center;
                }

                .typewriter {
                    font-size: 1.5rem !important;
                    white-space: normal;
                    border-right: none;
                }

                /* Remove floating elements on mobile */
                .floating-element {
                    display: none;
                }                /* Chatbot Demo */
                .modern-chat-container {
                    max-width: 100%;
                    min-height: 400px;
                    margin: 0 10px;
                    border-radius: 12px;
                    height: auto;
                }

                .chat-body {
                    height: 250px;
                    min-height: 250px;
                }

                .messages-container {
                    max-height: 220px;
                }

                .chat-header {
                    padding: 0.8rem 1rem;
                }                .chat-header h6 {
                    font-size: 0.85rem;
                }

                .message-bubble {
                    max-width: 90%;
                    padding: 0.6rem 0.8rem;
                    font-size: 0.8rem;
                }

                .chat-input {
                    padding: 0.6rem;
                    gap: 0.5rem;
                }

                .input-field input {
                    font-size: 0.8rem;
                    padding: 10px 12px 10px 40px;
                }

                .send-button {
                    width: 36px;
                    height: 36px;
                }

                /* Features Section */
                .feature-card {
                    padding: 1.5rem 1rem;
                    margin-bottom: 1rem;
                    text-align: center;
                }

                .feature-card h5 {
                    font-size: 1rem;
                }

                .feature-card p {
                    font-size: 0.85rem;
                }

                /* Stats Section */
                .stats-card {
                    padding: 1.5rem 1rem;
                    margin-bottom: 1rem;
                    text-align: center;
                }

                .stats-card h2 {
                    font-size: 1.8rem;
                }

                /* Section Spacing */
                .py-5 {
                    padding-top: 2.5rem !important;
                    padding-bottom: 2.5rem !important;
                }                /* Navigation */
                .navbar {
                    padding: 0.5rem 0;
                }

                .navbar-brand {
                    font-size: 1.1rem;
                }

                .navbar-nav {
                    text-align: center;
                }

                .navbar-nav .nav-link {
                    padding: 0.75rem 1rem;
                    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
                }

                .navbar-nav .nav-link:last-child {
                    border-bottom: none;
                }

                .navbar-collapse {
                    background: white;
                    margin: 0.5rem 0;
                    border-radius: 8px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                }                /* About & Demo Section */
                .demo-section .col-lg-6,
                .about-section .col-lg-6 {
                    text-align: center;
                    margin-bottom: 2rem;
                }

                .demo-section .order-1,
                .demo-section .order-2,
                .about-section .order-1,
                .about-section .order-2 {
                    order: unset !important;
                }

                .demo-section h2,
                .about-section h2 {
                    font-size: 1.5rem;
                    text-align: center;
                }

                .demo-section .lead,
                .about-section .lead {
                    font-size: 0.9rem;
                    text-align: center;
                }

                .demo-section .d-flex.flex-column,
                .about-section .d-flex.flex-column {
                    align-items: center;
                }

                .demo-section .d-flex.align-items-center {
                    justify-content: center;
                    text-align: center;
                }

                /* Image responsiveness */
                .img-fluid {
                    max-width: 100%;
                    height: auto;
                }

                .position-relative img {
                    border-radius: 12px !important;
                }

                .footer-section h5 {
                    font-size: 1rem;
                    margin-bottom: 0.8rem;
                }                .footer-section p, .footer-section a {
                    font-size: 0.8rem;
                }

                /* Footer Mobile Layout */
                footer .container {
                    text-align: center;
                }

                footer .row > div {
                    text-align: center;
                    margin-bottom: 2rem;
                }

                footer .d-flex.gap-3 {
                    justify-content: center;
                }

                footer .text-md-end {
                    text-align: center !important;
                }

                footer hr {
                    margin: 2rem 0 1rem;
                }

                footer .col-lg-2,
                footer .col-lg-3,
                footer .col-lg-4 {
                    margin-bottom: 2rem;
                }
            }

            /* Mobile Medium (481px to 767px) */
            @media (min-width: 481px) and (max-width: 767px) {
                /* Typography */
                .hero-section h1 {
                    font-size: 1.8rem !important;
                    line-height: 1.3;
                }

                .hero-section .lead {
                    font-size: 1rem;
                }

                /* Hero Section */
                .hero-section {
                    min-height: 85vh;
                    padding: 70px 0 40px;
                }                /* Chatbot Demo */
                .modern-chat-container {
                    max-width: 100%;
                    min-height: 450px;
                    margin: 0 15px;
                    border-radius: 16px;
                    height: auto;
                }

                .chat-body {
                    height: 300px;
                    min-height: 300px;
                }

                .messages-container {
                    max-height: 270px;
                }

                .message-bubble {
                    max-width: 85%;
                }                /* Features Grid */
                .row.g-4 > .col-md-4 {
                    margin-bottom: 2rem;
                }

                .row.g-4 > .col-md-6 {
                    margin-bottom: 2rem;
                }

                .row.g-4 > .col-lg-4 {
                    margin-bottom: 2rem;
                }

                /* Stats Grid */
                .row.g-4 > .col-md-3 {
                    margin-bottom: 1.5rem;
                }

                .row.g-4 > .col-lg-3 {
                    margin-bottom: 1.5rem;
                }

                /* Flex adjustments for small screens */
                .d-flex.flex-wrap.gap-3 {
                    flex-direction: column;
                    align-items: center;
                }

                .d-flex.flex-wrap.gap-3 .btn {
                    width: 100%;
                    max-width: 300px;
                    text-align: center;
                }
            }

            /* Tablet (768px to 1023px) */
            @media (min-width: 768px) and (max-width: 1023px) {
                /* Typography */
                .hero-section h1 {
                    font-size: 2.2rem !important;
                }

                /* Hero Section */
                .hero-section {
                    min-height: 90vh;
                    padding: 80px 0 50px;
                }                /* Chatbot Demo */
                .modern-chat-container {
                    max-width: 450px;
                    min-height: 500px;
                    height: auto;
                }

                .chat-body {
                    height: 350px;
                    min-height: 350px;
                }

                .messages-container {
                    max-height: 320px;
                }

                /* Features and Stats */
                .feature-card {
                    height: 280px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }                .stats-card {
                    height: 160px;
                    padding: 1.5rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .stats-card .display-4 {
                    font-size: 2.2rem;
                    margin-bottom: 0.5rem;
                }

                .stats-card p {
                    font-size: 0.95rem;
                    margin-bottom: 0;
                }
            }            /* Desktop Small (1024px to 1199px) */
            @media (min-width: 1024px) and (max-width: 1199px) {
                /* Hero Section */
                .hero-section {
                    min-height: 100vh;
                    padding: 100px 0 80px;
                }
                
                .hero-section h1 {
                    font-size: 3rem !important;
                    line-height: 1.2;
                    margin-bottom: 1.5rem;
                }

                .hero-section .lead {
                    font-size: 1.25rem;
                    margin-bottom: 2.5rem;
                    max-width: 600px;
                }

                /* Buttons */
                .btn-lg {
                    padding: 1rem 2rem;
                    font-size: 1.1rem;
                }

                .btn-primary-custom, .btn-secondary-custom {
                    padding: 1rem 2rem;
                    font-size: 1.1rem;
                }

                /* Chat Container */
                .modern-chat-container {
                    max-width: 500px;
                    min-height: 600px;
                    height: auto;
                }

                .chat-body {
                    height: 450px;
                    min-height: 450px;
                }

                .messages-container {
                    max-height: 420px;
                }

                /* Feature Cards */
                .feature-card {
                    padding: 2.5rem 2rem;
                    height: 350px;
                    transition: all 0.3s ease;
                }

                .feature-card:hover {
                    transform: translateY(-10px) scale(1.03);
                }

                .feature-icon {
                    width: 80px;
                    height: 80px;
                    font-size: 2rem;
                    margin-bottom: 2rem;
                }

                .feature-card h4 {
                    font-size: 1.5rem;
                    margin-bottom: 1.5rem;
                }

                .feature-card p {
                    font-size: 1rem;
                    line-height: 1.6;
                }                /* Stats Cards */
                .stats-card {
                    padding: 2rem 1.5rem;
                    height: 180px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .stats-card .display-4 {
                    font-size: 2.5rem;
                    margin-bottom: 0.5rem;
                }

                .stats-card p {
                    font-size: 1rem;
                    margin-bottom: 0;
                }

                /* Section Padding */
                .section-padding {
                    padding: 100px 0;
                }

                /* Navigation */
                .navbar-nav .nav-link {
                    font-size: 1rem;
                    font-weight: 500;
                    padding: 0.75rem 1.5rem;
                }

                .navbar-brand {
                    font-size: 1.5rem;
                }

                /* Demo Section */
                .demo-section h2 {
                    font-size: 2.5rem;
                    margin-bottom: 2rem;
                }

                .demo-section .lead {
                    font-size: 1.2rem;
                    margin-bottom: 2.5rem;
                }

                /* About Section */
                .about-section h2 {
                    font-size: 2.5rem;
                    margin-bottom: 2rem;
                }

                .about-section .lead {
                    font-size: 1.2rem;
                    margin-bottom: 2.5rem;
                }

                /* Testimonial Cards */
                .testimonial-card {
                    padding: 2.5rem 2rem;
                    height: auto;
                    min-height: 300px;
                }

                .testimonial-card p {
                    font-size: 1.1rem;
                    line-height: 1.7;
                }
            }

            /* Desktop Large (1200px and up) */
            @media (min-width: 1200px) {
                /* Hero Section */
                .hero-section {
                    min-height: 100vh;
                    padding: 120px 0 100px;
                }
                
                .hero-section h1 {
                    font-size: 3.5rem !important;
                    line-height: 1.2;
                    margin-bottom: 2rem;
                    letter-spacing: -0.02em;
                }

                .hero-section .lead {
                    font-size: 1.375rem;
                    margin-bottom: 3rem;
                    max-width: 650px;
                    line-height: 1.6;
                }

                /* Buttons */
                .btn-lg {
                    padding: 1.25rem 2.5rem;
                    font-size: 1.125rem;
                    font-weight: 600;
                }

                .btn-primary-custom, .btn-secondary-custom {
                    padding: 1.25rem 2.5rem;
                    font-size: 1.125rem;
                    font-weight: 600;
                }

                /* Chat Container */
                .modern-chat-container {
                    max-width: 550px;
                    min-height: 650px;
                    height: auto;
                }

                .chat-body {
                    height: 480px;
                    min-height: 480px;
                }

                .messages-container {
                    max-height: 450px;
                }

                .chat-header {
                    padding: 30px;
                }

                .chat-title {
                    font-size: 22px;
                }

                .bot-avatar {
                    width: 60px;
                    height: 60px;
                    font-size: 1.5rem;
                }

                .message-bubble {
                    font-size: 16px;
                    padding: 16px 20px;
                }

                .bot-avatar-small, .user-avatar-small {
                    width: 42px;
                    height: 42px;
                    font-size: 16px;
                }

                /* Feature Cards */
                .feature-card {
                    padding: 3rem 2.5rem;
                    height: 380px;
                    transition: all 0.4s ease;
                }

                .feature-card:hover {
                    transform: translateY(-15px) scale(1.05);
                    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15), 0 40px 100px rgba(0, 0, 0, 0.08);
                }

                .feature-icon {
                    width: 90px;
                    height: 90px;
                    font-size: 2.25rem;
                    margin-bottom: 2.5rem;
                }

                .feature-card h4 {
                    font-size: 1.75rem;
                    margin-bottom: 1.75rem;
                    font-weight: 700;
                }

                .feature-card p {
                    font-size: 1.125rem;
                    line-height: 1.7;
                }                /* Stats Cards */
                .stats-card {
                    padding: 2.5rem 2rem;
                    height: 200px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .stats-card .display-4 {
                    font-size: 3rem;
                    font-weight: 700;
                    margin-bottom: 0.5rem;
                }

                .stats-card p {
                    font-size: 1rem;
                    font-weight: 500;
                    margin-bottom: 0;
                }

                /* Section Padding */
                .section-padding {
                    padding: 120px 0;
                }

                /* Navigation */
                .navbar {
                    padding: 1rem 0;
                }

                .navbar-nav .nav-link {
                    font-size: 1.1rem;
                    font-weight: 500;
                    padding: 1rem 2rem;
                    transition: all 0.3s ease;
                }

                .navbar-nav .nav-link:hover {
                    color: var(--primary-color) !important;
                    transform: translateY(-2px);
                }

                .navbar-brand {
                    font-size: 1.75rem;
                    font-weight: 700;
                }

                /* Demo Section */
                .demo-section {
                    padding: 120px 0 140px;
                }

                .demo-section h2 {
                    font-size: 3rem;
                    margin-bottom: 2.5rem;
                    font-weight: 700;
                }

                .demo-section .lead {
                    font-size: 1.25rem;
                    margin-bottom: 3rem;
                    line-height: 1.7;
                }

                .demo-section .d-flex.align-items-center {
                    margin-bottom: 1.5rem;
                }

                .demo-section .d-flex.align-items-center span {
                    font-size: 1.125rem;
                }

                /* About Section */
                .about-section h2 {
                    font-size: 3rem;
                    margin-bottom: 2.5rem;
                    font-weight: 700;
                }

                .about-section .lead {
                    font-size: 1.25rem;
                    margin-bottom: 3rem;
                    line-height: 1.7;
                }

                /* Testimonial Cards */
                .testimonial-card {
                    padding: 3rem 2.5rem;
                    height: auto;
                    min-height: 350px;
                }

                .testimonial-card p {
                    font-size: 1.2rem;
                    line-height: 1.8;
                    margin-bottom: 2rem;
                }

                .testimonial-card h6 {
                    font-size: 1.125rem;
                    font-weight: 600;
                }

                .avatar {
                    width: 70px;
                    height: 70px;
                    font-size: 1.75rem;
                    margin-bottom: 1.5rem;
                }

                /* Container Max Width */
                .container {
                    max-width: 1200px;
                }

                /* Footer */
                footer {
                    padding: 80px 0 40px;
                }

                footer h5 {
                    font-size: 1.25rem;
                    margin-bottom: 1.5rem;
                }

                footer p, footer a {
                    font-size: 1rem;
                }            }

            /* Extra Large Desktop (1400px and up) */
            @media (min-width: 1400px) {
                /* Hero Section */
                .hero-section {
                    min-height: 100vh;
                    padding: 140px 0 120px;
                }
                
                .hero-section h1 {
                    font-size: 4rem !important;
                    line-height: 1.1;
                    margin-bottom: 2.5rem;
                    letter-spacing: -0.03em;
                }

                .hero-section .lead {
                    font-size: 1.5rem;
                    margin-bottom: 3.5rem;
                    max-width: 700px;
                    line-height: 1.6;
                }

                /* Buttons */
                .btn-lg {
                    padding: 1.5rem 3rem;
                    font-size: 1.25rem;
                    font-weight: 600;
                }

                .btn-primary-custom, .btn-secondary-custom {
                    padding: 1.5rem 3rem;
                    font-size: 1.25rem;
                    font-weight: 600;
                }

                /* Chat Container */
                .modern-chat-container {
                    max-width: 600px;
                    min-height: 700px;
                }

                .chat-body {
                    height: 520px;
                    min-height: 520px;
                }

                .messages-container {
                    max-height: 490px;
                }

                /* Feature Cards */
                .feature-card {
                    padding: 3.5rem 3rem;
                    height: 420px;
                }

                .feature-icon {
                    width: 100px;
                    height: 100px;
                    font-size: 2.5rem;
                    margin-bottom: 3rem;
                }

                .feature-card h4 {
                    font-size: 2rem;
                    margin-bottom: 2rem;
                }

                .feature-card p {
                    font-size: 1.25rem;
                    line-height: 1.8;
                }                /* Stats Cards */
                .stats-card {
                    padding: 3rem 2.5rem;
                    height: 220px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .stats-card .display-4 {
                    font-size: 3.5rem;
                    margin-bottom: 0.5rem;
                }

                .stats-card p {
                    font-size: 1rem;
                    margin-bottom: 0;
                }

                /* Section Padding */
                .section-padding {
                    padding: 140px 0;
                }

                /* Demo Section */
                .demo-section {
                    padding: 140px 0 160px;
                }

                .demo-section h2 {
                    font-size: 3.5rem;
                    margin-bottom: 3rem;
                }

                .demo-section .lead {
                    font-size: 1.375rem;
                    margin-bottom: 3.5rem;
                }

                /* Container Max Width */
                .container {
                    max-width: 1320px;
                }
            }

            /* Ultra Wide Desktop (1600px and up) */
            @media (min-width: 1600px) {
                .hero-section h1 {
                    font-size: 4.5rem !important;
                }

                .hero-section .lead {
                    font-size: 1.625rem;
                    max-width: 800px;
                }

                .container {
                    max-width: 1500px;
                }

                .feature-card {
                    height: 450px;
                    padding: 4rem 3.5rem;
                }                .stats-card {
                    height: 240px;
                    padding: 3.5rem 3rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .stats-card .display-4 {
                    font-size: 3.5rem;
                    margin-bottom: 0.5rem;
                }

                .stats-card p {
                    font-size: 1.1rem;
                    margin-bottom: 0;
                }

                .modern-chat-container {
                    max-width: 650px;
                    min-height: 750px;
                }                .section-padding {
                    padding: 160px 0;
                }
            }

            /* Additional improvements for ultra-wide displays */
            @media (min-width: 1920px) {
                .container {
                    max-width: 1600px;
                }

                .hero-section h1 {
                    font-size: 5rem !important;
                }

                .hero-section .lead {
                    font-size: 1.75rem;
                    max-width: 900px;
                }

                .section-padding {
                    padding: 180px 0;
                }

                .feature-card {
                    height: 480px;
                    padding: 4.5rem 4rem;
                }                .stats-card {
                    height: 260px;
                    padding: 4rem 3.5rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .stats-card .display-4 {
                    font-size: 4rem;
                    margin-bottom: 0.5rem;
                }

                .stats-card p {
                    font-size: 1.2rem;
                    margin-bottom: 0;
                }

                .modern-chat-container {
                    max-width: 700px;
                    min-height: 800px;
                }
            }

            /* Landscape Mobile Orientation */
            @media (max-height: 500px) and (orientation: landscape) {
                .hero-section {
                    min-height: 100vh;
                    padding: 40px 0 20px;
                }

                .hero-section h1 {
                    font-size: 1.5rem !important;
                    margin-bottom: 0.5rem;
                }

                .hero-section .lead {
                    font-size: 0.9rem;
                    margin-bottom: 1rem;
                }

                .modern-chat-container {
                    height: 250px;
                }

                .chat-body {
                    height: 150px;
                }

                .py-5 {
                    padding-top: 1.5rem !important;
                    padding-bottom: 1.5rem !important;
                }
            }            /* High DPI Displays */
            @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
                .feature-card, .stats-card, .testimonial-card {
                    border: 0.5px solid rgba(0, 0, 0, 0.1);
                }
                
                .feature-card::after, .stats-card::after, .testimonial-card::after {
                    filter: blur(2px);
                }
            }

            /* Print Styles */
            @media print {
                .navbar, .footer-section, .chatbot-demo, .btn {
                    display: none !important;
                }

                .hero-section {
                    min-height: auto;
                    padding: 2rem 0;
                    background: white !important;
                    color: black !important;
                }

                .feature-card, .stats-card {
                    break-inside: avoid;
                    border: 1px solid #ccc;
                    box-shadow: none;
                }
            }

            /* Accessibility - Reduced Motion */
            @media (prefers-reduced-motion: reduce) {
                * {
                    animation-duration: 0.01ms !important;
                    animation-iteration-count: 1 !important;
                    transition-duration: 0.01ms !important;
                }

                .hero-section::before {
                    animation: none;
                }

                [data-aos] {
                    animation: none !important;
                }
            }

                .hero-section .lead {
                    font-size: 1rem;
                    margin-bottom: 2rem !important;
                }

                .typewriter {
                    font-size: 1.8rem;
                }

                /* Navigation Mobile */
                .navbar-brand {
                    font-size: 1.2rem;
                }

                .navbar-nav .nav-link {
                    padding: 0.75rem 1rem;
                    text-align: center;
                }                /* Features Section Mobile */
                .feature-card {
                    margin-bottom: 1.5rem !important;
                    padding: 1.5rem !important;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06), 0 8px 20px rgba(0, 0, 0, 0.04) !important;
                }

                .feature-card::after {
                    height: 4px !important;
                    filter: blur(2px) !important;
                }

                .feature-icon {
                    width: 60px !important;
                    height: 60px !important;
                    font-size: 1.5rem !important;
                    margin: 0 auto 1rem !important;
                }

                /* Ensure no horizontal overflow */
                .features-grid {
                    overflow-x: hidden !important;
                }

                .features-grid .col-sm-6 {
                    padding-left: 10px !important;
                    padding-right: 10px !important;
                }                /* Stats Section Mobile */
                .stats-card {
                    padding: 1.5rem;
                    margin-bottom: 1.5rem;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06), 0 8px 20px rgba(0, 0, 0, 0.04) !important;
                    min-height: 120px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .stats-card::after {
                    height: 4px !important;
                    filter: blur(2px) !important;
                }

                .stats-card .display-4 {
                    font-size: 2rem;
                    margin-bottom: 0.5rem;
                }

                .stats-card p {
                    font-size: 0.9rem;
                    margin-bottom: 0;
                }

                /* Demo Section Mobile */
                .demo-section .display-5 {
                    font-size: 1.5rem;
                    margin-bottom: 1.5rem !important;
                }

                .demo-section .lead {
                    font-size: 0.95rem;
                    margin-bottom: 1.5rem !important;
                }

                .btn-primary-custom {
                    padding: 10px 20px;
                    font-size: 0.9rem;
                }

                /* Chat Demo Mobile */
                .chat-header {
                    padding: 15px;
                }

                .chat-title {
                    font-size: 16px;
                }

                .status-badge span {
                    font-size: 11px;
                }

                .bot-avatar {
                    width: 40px;
                    height: 40px;
                }

                .messages-container {
                    padding: 15px;
                }

                .message-bubble {
                    padding: 10px 12px;
                    font-size: 14px;
                }

                .message-sender {
                    font-size: 10px;
                }

                .chat-input {
                    padding: 12px;
                }

                .input-field input {
                    padding: 10px 12px 10px 40px;
                    font-size: 13px;
                }

                .send-button {
                    width: 38px;
                    height: 38px;
                }

                /* About Section Mobile */
                .about-section .display-5 {
                    font-size: 1.5rem;
                }

                .about-section .lead {
                    font-size: 0.95rem;
                }                /* Testimonial Mobile */
                .testimonial-card {
                    padding: 1.5rem;
                    margin-bottom: 1.5rem;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06), 0 8px 20px rgba(0, 0, 0, 0.04) !important;
                }

                .testimonial-card::after {
                    height: 4px !important;
                    filter: blur(2px) !important;
                }

                .avatar {
                    width: 50px;
                    height: 50px;
                    font-size: 1.2rem;
                }

                /* Footer Mobile */
                footer .container {
                    text-align: center;
                }

                footer .col-lg-4,
                footer .col-lg-2,
                footer .col-lg-3 {
                    margin-bottom: 2rem;
                }

                footer .d-flex {
                    justify-content: center;
                }

                /* Section Padding Mobile */
                .section-padding {
                    padding: 60px 0;
                }

                /* Floating Elements Mobile */
                .floating-element {
                    display: none;
                }
            }

            /* Tablet Responsive */
            @media (min-width: 769px) and (max-width: 1024px) {
                .hero-section .display-4 {
                    font-size: 2.2rem;
                }

                .feature-card {
                    padding: 1.8rem;
                }                .modern-chat-container {
                    max-width: 95%;
                    min-height: 420px;
                    height: auto;
                }

                .chat-body {
                    height: 280px;
                    min-height: 280px;
                }

                .messages-container {
                    max-height: 250px;
                }
            }            /* Small Mobile */
            @media (max-width: 480px) {
                .container {
                    padding-left: 10px !important;
                    padding-right: 10px !important;
                    max-width: 100% !important;
                }

                .hero-section .display-4 {
                    font-size: 1.5rem !important;
                }

                .typewriter {
                    font-size: 1.5rem;
                }

                .hero-section .lead {
                    font-size: 0.9rem;
                }                .feature-card {
                    padding: 1.2rem !important;
                    margin-bottom: 1rem !important;
                    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05), 0 6px 15px rgba(0, 0, 0, 0.03) !important;
                }

                .feature-card::after {
                    height: 3px !important;
                    width: 60% !important;
                    filter: blur(1.5px) !important;
                }

                .feature-icon {
                    width: 50px !important;
                    height: 50px !important;
                    font-size: 1.2rem !important;
                }

                .features-grid .col-sm-6 {
                    padding-left: 5px !important;
                    padding-right: 5px !important;
                    flex: 0 0 100% !important;
                    max-width: 100% !important;
                }                .row {
                    margin-left: -5px !important;
                    margin-right: -5px !important;
                }

                .stats-card {
                    padding: 1.2rem;
                    min-height: 100px;
                    margin-bottom: 1rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05), 0 6px 15px rgba(0, 0, 0, 0.03) !important;
                }

                .stats-card .display-4 {
                    font-size: 1.8rem;
                    margin-bottom: 0.3rem;
                }

                .stats-card p {
                    font-size: 0.85rem;
                    margin-bottom: 0;
                }

                .stats-card::after {
                    height: 3px !important;
                    width: 60% !important;
                    filter: blur(1.5px) !important;
                }.modern-chat-container {
                    border-radius: 12px;
                    min-height: 380px;
                    height: auto;
                    margin: 0 5px;
                }

                .chat-body {
                    height: 240px;
                    min-height: 240px;
                }

                .messages-container {
                    max-height: 210px;
                }

                .chat-header {
                    padding: 12px;
                }

                .bot-avatar {
                    width: 35px;
                    height: 35px;
                }

                .chat-title {
                    font-size: 14px;
                }

                .status-badge span {
                    font-size: 10px;
                }

                .messages-container {
                    padding: 12px;
                }

                .message-bubble {
                    padding: 8px 10px;
                    font-size: 13px;
                }

                .btn-primary-custom {
                    padding: 8px 16px;
                    font-size: 0.85rem;
                }                .testimonial-card {
                    padding: 1.2rem;
                    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05), 0 6px 15px rgba(0, 0, 0, 0.03) !important;
                }

                .testimonial-card::after {
                    height: 3px !important;
                    width: 60% !important;
                    filter: blur(1.5px) !important;
                }
            }            /* Extra Small Mobile */
            @media (max-width: 360px) {
                .container {
                    padding-left: 8px !important;
                    padding-right: 8px !important;
                    max-width: 100% !important;
                }

                .hero-section .display-4 {
                    font-size: 1.3rem !important;
                }

                .typewriter {
                    font-size: 1.3rem;
                }

                .section-padding {
                    padding: 40px 0;
                }                .feature-card {
                    padding: 1rem !important;
                    margin-bottom: 0.8rem !important;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04), 0 4px 12px rgba(0, 0, 0, 0.02) !important;
                }

                .feature-card::after {
                    height: 2px !important;
                    width: 50% !important;
                    filter: blur(1px) !important;
                }

                .features-grid .col-sm-6 {
                    padding-left: 4px !important;
                    padding-right: 4px !important;
                    flex: 0 0 100% !important;
                    max-width: 100% !important;
                }

                .row {
                    margin-left: -4px !important;
                    margin-right: -4px !important;
                }                .stats-card {
                    padding: 1rem;
                    min-height: 90px;
                    margin-bottom: 0.8rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05), 0 6px 15px rgba(0, 0, 0, 0.03) !important;
                }

                .stats-card .display-4 {
                    font-size: 1.6rem;
                    margin-bottom: 0.3rem;
                }

                .stats-card p {
                    font-size: 0.8rem;
                    margin-bottom: 0;
                }

                .stats-card::after {
                    height: 3px !important;
                    width: 60% !important;
                    filter: blur(1.5px) !important;
                }.modern-chat-container {
                    margin: 0 -4px;
                    border-radius: 8px;
                    min-height: 350px;
                    height: auto;
                }

                .chat-body {
                    height: 200px;
                    min-height: 200px;
                }

                .messages-container {
                    max-height: 170px;
                }
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
            </div>            <div class="container hero-content">
                <div class="row align-items-center justify-content-start min-vh-75">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h1 class="display-4 fw-bold mb-4">
                            Kamus <span class="typewriter">Bahasa Jawa Digital</span>
                        </h1>
                        <p class="lead mb-4">
                            Temukan makna kata-kata bahasa Jawa dengan mudah melalui chatbot yang interaktif. 
                            Belajar dan lestarikan budaya Jawa dengan teknologi modern.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#features" class="btn btn-primary-custom btn-lg">
                                <i class="fas fa-arrow-down me-2"></i>Pelajari Lebih
                            </a>
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
                </div>                <div class="row g-4 justify-content-center features-grid">
                    <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-card text-center">
                            <div class="feature-icon gradient-bg">
                                <i class="fas fa-robot"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Chatbot</h4>
                            <p class="text-secondary">
                                Berinteraksi dengan Chatbot yang memahami konteks dan memberikan jawaban tentang kosakata Bahasa Jawa
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
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
                    <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
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
                    <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
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
        </section>        <!-- Demo Section -->
        <section id="demo" class="section-padding demo-section" style="padding-bottom: 120px;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                        <h2 class="display-5 fw-bold text-gradient mb-4">Coba Langsung Sekarang</h2>
                        <p class="lead text-secondary mb-4">
                            Rasakan pengalaman belajar bahasa Jawa yang menyenangkan dengan chatbot kami. 
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
                            </div>                        </div>
                        <div class="text-center text-lg-start">
                            <a href="#" class="btn btn-primary-custom btn-lg" onclick="openChatDemo()">
                                <i class="fas fa-comments me-2"></i>Mulai Chat
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0" data-aos="fade-left">
                        <div class="position-relative">
                            <!-- Modern Chat Interface based on Flutter design -->
                            <div class="modern-chat-container">
                                <!-- Chat Header -->
                                <div class="chat-header">
                                    <div class="d-flex align-items-center">
                                        <div class="bot-avatar-container">
                                            <div class="bot-avatar">
                                                <i class="fas fa-robot"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="chat-title mb-1">Chatbot Javdict</h6>
                                            <div class="status-badge">
                                                <span>Asisten Bahasa Jawa • Online</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Chat Body -->
                                <div class="chat-body">
                                    <!-- Background Pattern -->
                                    <div class="chat-pattern"></div>
                                    
                                    <!-- Messages -->
                                    <div class="messages-container" id="chatMessages">
                                        <!-- Bot Message -->
                                        <div class="message-row bot-message" data-aos="fade-up" data-aos-delay="100">
                                            <div class="message-avatar">
                                                <div class="bot-avatar-small">
                                                    <i class="fas fa-robot"></i>
                                                </div>
                                            </div>
                                            <div class="message-content">
                                                <div class="message-bubble bot-bubble">
                                                    <p class="mb-0">Halo! Saya asisten kamus bahasa Jawa. Apa yang ingin Anda tanyakan tentang bahasa Jawa hari ini?</p>
                                                </div>
                                                <small class="message-sender">Javdict Bot</small>
                                            </div>
                                        </div>
                                          <!-- User Message -->
                                        <div class="message-row user-message" data-aos="fade-up" data-aos-delay="200">
                                            <div class="message-avatar">
                                                <div class="user-avatar-small">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="message-content">
                                                <div class="message-bubble user-bubble">
                                                    <p class="mb-0">Apa arti "rawuh" dalam bahasa Jawa?</p>
                                                </div>
                                                <small class="message-sender">Anda</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Bot Response -->
                                        <div class="message-row bot-message" data-aos="fade-up" data-aos-delay="300">
                                            <div class="message-avatar">
                                                <div class="bot-avatar-small">
                                                    <i class="fas fa-robot"></i>
                                                </div>
                                            </div>
                                            <div class="message-content">
                                                <div class="message-bubble bot-bubble">
                                                    <p class="mb-0">"Rawuh" artinya datang atau hadir. Contoh: "Sampun rawuh pak guru" berarti "Sudah datang pak guru"</p>
                                                </div>
                                                <small class="message-sender">Javdict Bot</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Typing Indicator -->
                                        <div class="message-row bot-message typing-indicator" id="typingIndicator" style="display: none;">
                                            <div class="message-avatar">
                                                <div class="bot-avatar-small">
                                                    <i class="fas fa-robot"></i>
                                                </div>
                                            </div>
                                            <div class="message-content">
                                                <div class="message-bubble bot-bubble typing-bubble">
                                                    <span class="typing-text">Sedang mengetik</span>
                                                    <div class="typing-dots">
                                                        <div class="dot"></div>
                                                        <div class="dot"></div>
                                                        <div class="dot"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!-- Chat Input -->
                                <div class="chat-input">
                                    <div class="input-container">
                                        <div class="input-field">
                                            <i class="fas fa-comment-dots input-icon"></i>
                                            <input type="text" 
                                                   placeholder="Ketik pertanyaan tentang bahasa Jawa..." 
                                                   id="demoInput"
                                                   autocomplete="off">
                                        </div>                                        <button class="send-button" onclick="sendDemoMessage()" title="Kirim pesan">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
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
                                 alt="Budaya Jawa" class="img-fluid rounded-4 shadow-lg">                            <div class="position-absolute top-0 start-0 w-100 h-100 rounded-4" 
                                 style="background: linear-gradient(45deg, rgba(139,92,246,0.8), rgba(6,182,212,0.8));"></div>
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
                            </div>                        </div>
                        <div class="text-center text-lg-center">
                            <a href="#demo" class="btn btn-primary-custom btn-lg">
                                <i class="fas fa-arrow-right me-2"></i>Mulai Belajar
                            </a>
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
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Chatbot</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Kamus Online</a></li>
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
            });            // Chat demo function
            function openChatDemo() {
                const demoInput = document.getElementById('demoInput');
                if (demoInput) {
                    demoInput.focus();
                    demoInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } else {
                    alert('Fitur chat demo akan segera tersedia! Untuk saat ini, Anda dapat melihat preview di bagian demo.');
                }
            }

            // Sample responses for demo
            const demoResponses = {
                'halo': 'Halo! Selamat datang di JavDict. Saya siap membantu Anda belajar bahasa Jawa.',
                'rawuh': '"Rawuh" artinya datang atau hadir. Contoh: "Sampun rawuh pak guru" (Sudah datang pak guru)',
                'sugeng': '"Sugeng" berarti selamat. Misalnya "Sugeng enjing" (Selamat pagi)',
                'monggo': '"Monggo" artinya silakan. Digunakan untuk mengundang atau mempersilakan seseorang.',
                'matur': '"Matur" berarti terima kasih. Biasanya diucapkan "Matur nuwun" (Terima kasih)',
                'nuwun': '"Nuwun" adalah bagian dari "matur nuwun" yang berarti terima kasih.',
                'sewu': '"Sewu" berarti maaf atau permisi. Sering diucapkan "Nuwun sewu" (Permisi/maaf)',
                'piye': '"Piye" artinya bagaimana. Contoh: "Piye kabare?" (Bagaimana kabarnya?)',
                'kabare': '"Kabare" artinya kabarnya. Biasanya dalam kalimat tanya "Piye kabare?"',
                'apik': '"Apik" berarti bagus atau baik. Contoh: "Apik tenan" (Bagus sekali)',
                'tenan': '"Tenan" artinya sekali atau benar-benar. Kata penegas dalam bahasa Jawa.',
                'default': 'Maaf, saya belum memahami kata tersebut. Coba tanyakan kata lain seperti: rawuh, sugeng, monggo, matur, atau piye.'
            };            // Send demo message function
            function sendDemoMessage() {
                const input = document.getElementById('demoInput');
                const message = input.value.trim().toLowerCase();
                
                if (!message) return;

                const messagesContainer = document.getElementById('chatMessages');
                
                // Add user message
                addMessage(messagesContainer, message, 'user');
                
                // Clear input
                input.value = '';
                
                // Show typing indicator
                showTypingIndicator();
                
                // Generate bot response after delay
                setTimeout(() => {
                    hideTypingIndicator();
                    
                    // Find response
                    let response = demoResponses.default;
                    for (let key in demoResponses) {
                        if (message.includes(key) && key !== 'default') {
                            response = demoResponses[key];
                            break;
                        }
                    }
                    
                    addMessage(messagesContainer, response, 'bot');
                }, 1500);
            }

            // Add message to chat
            function addMessage(container, text, sender) {
                const messageRow = document.createElement('div');
                messageRow.className = `message-row ${sender}-message`;
                messageRow.style.opacity = '0';
                messageRow.style.transform = 'translateY(10px)';                if (sender === 'user') {
                    messageRow.innerHTML = `
                        <div class="message-avatar">
                            <div class="user-avatar-small">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="message-content">
                            <div class="message-bubble user-bubble">
                                <p class="mb-0">${text}</p>
                            </div>
                            <small class="message-sender">Anda</small>
                        </div>
                    `;
                } else {
                    messageRow.innerHTML = `
                        <div class="message-avatar">
                            <div class="bot-avatar-small">
                                <i class="fas fa-robot"></i>
                            </div>
                        </div>
                        <div class="message-content">
                            <div class="message-bubble bot-bubble">
                                <p class="mb-0">${text}</p>
                            </div>
                            <small class="message-sender">Javdict Bot</small>
                        </div>
                    `;
                }

                container.appendChild(messageRow);
                
                // Animate message appearance
                setTimeout(() => {
                    messageRow.style.transition = 'all 0.3s ease-out';
                    messageRow.style.opacity = '1';
                    messageRow.style.transform = 'translateY(0)';
                }, 50);

                // Scroll to bottom
                setTimeout(() => {
                    container.scrollTop = container.scrollHeight;
                }, 100);
            }

            // Show typing indicator
            function showTypingIndicator() {
                const indicator = document.getElementById('typingIndicator');
                if (indicator) {
                    indicator.style.display = 'flex';
                    const container = document.getElementById('chatMessages');
                    container.scrollTop = container.scrollHeight;
                }
            }

            // Hide typing indicator
            function hideTypingIndicator() {
                const indicator = document.getElementById('typingIndicator');
                if (indicator) {
                    indicator.style.display = 'none';
                }
            }

            // Handle Enter key in demo input
            document.addEventListener('DOMContentLoaded', function() {
                const demoInput = document.getElementById('demoInput');
                if (demoInput) {
                    demoInput.addEventListener('keypress', function(e) {
                        if (e.key === 'Enter') {
                            sendDemoMessage();
                        }
                    });
                }
            });

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
                const chatArea = document.querySelector('.messages-container');
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
