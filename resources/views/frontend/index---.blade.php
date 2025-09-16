@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')

    <!-- Premium Off-Canvas Menu -->
    <div class="off-canvas-overlay" id="offCanvasOverlay"></div>
    <div class="off-canvas-menu" id="offCanvasMenu">
        <div class="off-canvas-header">
            <div class="off-canvas-logo">VMS</div>
            <button class="off-canvas-close" id="offCanvasClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="off-canvas-body">
            <nav class="off-canvas-nav">
                <a href="#features" class="off-canvas-link">
                    <i class="fas fa-star"></i>
                    Features
                </a>
                <a href="#solutions" class="off-canvas-link">
                    <i class="fas fa-cog"></i>
                    Solutions
                </a>
                <a href="#pricing" class="off-canvas-link">
                    <i class="fas fa-tag"></i>
                    Pricing
                </a>
                <a href="#resources" class="off-canvas-link">
                    <i class="fas fa-book"></i>
                    Resources
                </a>
                <a href="#contact" class="off-canvas-link">
                    <i class="fas fa-envelope"></i>
                    Contact
                </a>
                <!-- <a href="#signin" class="off-canvas-link">
                    <i class="fas fa-sign-in-alt"></i>
                    Sign In
                </a> -->
            </nav>
            
            <div class="off-canvas-cta">
                <a href="#demo" class="btn-off-canvas">
                    <i class="fas fa-rocket"></i>
                    Get Started Free
                </a>
            </div>
            
            <div class="off-canvas-footer">
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                </div>
                <p class="off-canvas-copyright">© 2025 VMS. All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- Premium Hero Section with Video Background -->
    <section class="hero-section" id="heroSection">
        <!-- Video Background -->
        <div class="video-background">
            <div class="video-overlay"></div>
            <!-- Placeholder for video - would be actual video in production -->
            <div class="video-placeholder">
                <div class="video-content">
                    <div class="floating-particles">
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content animate-zoom-in">
                        <h1 class="hero-headline">
                            <span class="gradient-text">Control Access.</span><br>
                            <span class="text-white">Protect People.</span><br>
                            <span class="highlight-text">Simplify Visitor Check-Ins.</span>
                        </h1>
                        
                        <p class="hero-subheadline">
                            VMS is an intelligent Visitor Management System designed to help you secure your premises, track visitor activity in real time, and offer a seamless check-in experience—from Aadhaar verification to facial recognition.
                        </p>
                        
                        <ul class="feature-checkpoints">
                            <li class="animate-fade-in" style="animation-delay: 0.2s;">
                                <div class="check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                Built for corporate offices, hospitals, factories & government facilities
                            </li>
                            <li class="animate-fade-in" style="animation-delay: 0.4s;">
                                <div class="check-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                Fully compliant with data privacy and access control regulations
                            </li>
                        </ul>
                        
                        <div class="cta-section animate-fade-in" style="animation-delay: 0.6s;">
                            <a href="#cal" class="btn-primary-hero" id="scheduleDemoBtn">
                                <i class="fas fa-calendar-check"></i>
                                Schedule a Demo
                            </a>
                            <a href="#how-it-works" class="btn-secondary-hero" id="howItWorksBtn">
                                <i class="fas fa-play"></i>
                                See How It Works
                            </a>
                        </div>

                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="hero-visual animate-scale-in">
                        <!-- Interactive Dashboard Preview -->
                        <div class="dashboard-preview">
                            <div class="preview-header">
                                <div class="preview-dots">
                                    <span class="dot red"></span>
                                    <span class="dot yellow"></span>
                                    <span class="dot green"></span>
                                </div>
                                <div class="preview-title">VMS Dashboard</div>
                            </div>
                            
                            <div class="preview-content">
                                <div class="live-indicator">
                                    <div class="pulse-dot"></div>
                                    <span>Live Dashboard</span>
                                </div>
                                
                                <div class="dashboard-stats-mini">
                                    <div class="mini-stat">
                                        <div class="mini-stat-icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <div class="mini-stat-info">
                                            <div class="mini-stat-number">1,247</div>
                                            <div class="mini-stat-label">Active Today</div>
                                        </div>
                                    </div>
                                    
                                    <div class="mini-stat">
                                        <div class="mini-stat-icon">
                                            <i class="fas fa-shield-alt"></i>
                                        </div>
                                        <div class="mini-stat-info">
                                            <div class="mini-stat-number">100%</div>
                                            <div class="mini-stat-label">Secure</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Mini Chart -->
                                <div class="mini-chart">
                                    <div class="chart-title">Visitor Flow</div>
                                    <div class="chart-bars-mini">
                                        <div class="mini-bar" style="height: 60%"></div>
                                        <div class="mini-bar" style="height: 80%"></div>
                                        <div class="mini-bar" style="height: 45%"></div>
                                        <div class="mini-bar" style="height: 95%"></div>
                                        <div class="mini-bar" style="height: 70%"></div>
                                        <div class="mini-bar" style="height: 55%"></div>
                                        <div class="mini-bar" style="height: 85%"></div>
                                    </div>
                                </div>
                                
                                <!-- Activity Feed Mini -->
                                <div class="activity-mini">
                                    <div class="activity-title-mini">Recent Activity</div>
                                    <div class="activity-list-mini">
                                        <div class="activity-item-mini">
                                            <div class="activity-dot-mini"></div>
                                            <span>John Doe - Face scan verified</span>
                                        </div>
                                        <div class="activity-item-mini">
                                            <div class="activity-dot-mini"></div>
                                            <span>Sarah Wilson - ID badge printed</span>
                                        </div>
                                        <div class="activity-item-mini">
                                            <div class="activity-dot-mini"></div>
                                            <span>Mike Johnson - Aadhaar confirmed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counter-section position-relative overflow-hidden">
        <!-- Background Elements -->
        <div class="counter-bg-elements">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
            <div class="grid-pattern"></div>
        </div>

        <div class="container position-relative">
            <!-- Section Header -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center">
                    <h2 class="section-title mb-4">
                        Join Thousands of <span class="text-gradient">Satisfied Customers</span>
                    </h2>
                    <p class="section-subtitle">
                        Our platform powers secure visitor management for organizations across the globe, 
                        delivering unmatched reliability and performance.
                    </p>
                </div>
            </div>

            <!-- Counter Cards -->
            <div class="row g-4">
                <!-- Happy Customers -->
                <div class="col-lg-4 col-md-6">
                    <div class="counter-card h-100" data-aos="fade-up" data-aos-delay="100">
                        <div class="counter-icon-wrapper">
                            <div class="counter-icon customers">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="icon-glow customers-glow"></div>
                        </div>
                        <div class="counter-content">
                            <div class="counter-number" data-target="50000">0</div>
                            <div class="counter-suffix">+</div>
                            <h4 class="counter-label">Happy Clients</h4>
                            <p class="counter-description">
                                Organizations worldwide trust our platform for their visitor management needs
                            </p>
                        </div>
                        <div class="counter-progress">
                            <div class="progress-bar customers-progress"></div>
                        </div>
                    </div>
                </div>

                <!-- Uptime -->
                <div class="col-lg-4 col-md-6">
                    <div class="counter-card h-100" data-aos="fade-up" data-aos-delay="200">
                        <div class="counter-icon-wrapper">
                            <div class="counter-icon uptime">
                                <i class="fas fa-server"></i>
                            </div>
                            <div class="icon-glow uptime-glow"></div>
                        </div>
                        <div class="counter-content">
                            <div class="counter-number" data-target="99.9">0</div>
                            <div class="counter-suffix">%</div>
                            <h4 class="counter-label">Uptime</h4>
                            <p class="counter-description">
                                Guaranteed system availability with enterprise-grade infrastructure
                            </p>
                        </div>
                        <div class="counter-progress">
                            <div class="progress-bar uptime-progress"></div>
                        </div>
                    </div>
                </div>

                <!-- Support -->
                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="counter-card h-100" data-aos="fade-up" data-aos-delay="300">
                        <div class="counter-icon-wrapper">
                            <div class="counter-icon support">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="icon-glow support-glow"></div>
                        </div>
                        <div class="counter-content">
                            <div class="counter-number" data-target="24">0</div>
                            <div class="counter-suffix">/7</div>
                            <h4 class="counter-label">Support</h4>
                            <p class="counter-description">
                                Round-the-clock expert support to keep your operations running smoothly
                            </p>
                        </div>
                        <div class="counter-progress">
                            <div class="progress-bar support-progress"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- Intro Section: Value Proposition -->
    <section class="intro-section animate-on-scroll" id="intro">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="intro-content text-center">
                        <h2 class="intro-headline scale-on-scroll">
                            Smarter Visitor Access <span class="gradient-text">Starts Here</span>
                        </h2>
                        
                        <p class="intro-description animate-fade-in" style="animation-delay: 0.2s;">
                            Managing who enters your facility shouldn't rely on clipboards, manual logs, or ID cards that can be faked. VMS takes the guesswork out of guest management with a fully digital system built to verify, track, and log every visitor interaction.
                        </p>
                    </div>
                </div>
                <div class="intro-features animate-fade-in col-lg-7" style="animation-delay: 0.4s;">
                            <div class="col-sm-6">
                                <div class="feature-highlight">
                                    <div class="feature-icon">
                                        <i class="fa-solid fa-check-to-slot"></i>
                                    </div>
                                    <span>Aadhaar-based ID verification</span>
                                </div>
                            </div>
                            
                           <div class="col-sm-6">
                                <div class="feature-highlight">
                                    <div class="feature-icon">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                    <span>Real-time face authentication</span>
                                </div>
                           </div>
                            
                            <div class="col-sm-6">
                                <div class="feature-highlight">
                                    <div class="feature-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <span>Instant visitor logs and reporting tools</span>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="feature-highlight">
                                    <div class="feature-icon">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <span>Digital pre-invites and pre-check-in workflows</span>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        
        <!-- Background Elements -->
        <div class="intro-bg-elements">
            <div class="bg-circle bg-circle-1"></div>
            <div class="bg-circle bg-circle-2"></div>
            <div class="bg-circle bg-circle-3"></div>
        </div>
    </section>

    <!-- Key Benefits Section -->
    <section class="benefits-section" id="benefits">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center animate-on-scroll">
                        <h2 class="section-title">
                            Why Choose <span class="gradient-text">VMS</span>?
                        </h2>
                        <p class="section-subtitle">
                            Experience the future of visitor management with enterprise-grade security and seamless user experience
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="row benefits-grid">
                <!-- Benefit 1: Enhanced Security & Compliance -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="benefit-card scale-on-scroll" style="animation-delay: 0.1s;">
                        <div class="benefit-icon-wrapper">
                            <div class="benefit-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="icon-glow"></div>
                        </div>
                        
                        <div class="benefit-content">
                            <h3 class="benefit-title">Enhanced Security & Compliance</h3>
                            <p class="benefit-description">
                                VMS uses Aadhaar verification and facial recognition to ensure every visitor is authenticated before they step through your door. Every entry and exit is automatically logged and audit-ready.
                            </p>
                            
                            <div class="benefit-features">
                                <div class="mini-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Government-grade ID verification</span>
                                </div>
                                <div class="mini-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Automatic audit trail generation</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Benefit 2: Seamless Pre-Check-In Experience -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="benefit-card scale-on-scroll" style="animation-delay: 0.2s;">
                        <div class="benefit-icon-wrapper">
                            <div class="benefit-icon">
                                <i class="fas fa-magic"></i>
                            </div>
                            <div class="icon-glow"></div>
                        </div>
                        
                        <div class="benefit-content">
                            <h3 class="benefit-title">Seamless Pre-Check-In Experience</h3>
                            <p class="benefit-description">
                                Visitors receive a digital invite before arrival, complete Aadhaar verification at home, and simply walk in using face authentication. The result? Faster check-ins and fewer bottlenecks at the reception desk.
                            </p>
                            
                            <div class="benefit-features">
                                <div class="mini-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Digital invitation system</span>
                                </div>
                                <div class="mini-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Remote pre-verification</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Benefit 3: Contactless Face Authentication -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="benefit-card scale-on-scroll" style="animation-delay: 0.3s;">
                        <div class="benefit-icon-wrapper">
                            <div class="benefit-icon">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <div class="icon-glow"></div>
                        </div>
                        
                        <div class="benefit-content">
                            <h3 class="benefit-title">Contactless Face Authentication</h3>
                            <p class="benefit-description">
                                Eliminate manual ID checks with real-time facial recognition at entry points. Match visitor faces to pre-verified data for a zero-contact, friction-free experience.
                            </p>
                            
                            <div class="benefit-features">
                                <div class="mini-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Zero-touch entry system</span>
                                </div>
                                <div class="mini-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>AI-powered face matching</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Benefit 4: Real-Time Visitor Tracking -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="benefit-card scale-on-scroll" style="animation-delay: 0.4s;">
                        <div class="benefit-icon-wrapper">
                            <div class="benefit-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="icon-glow"></div>
                        </div>
                        
                        <div class="benefit-content">
                            <h3 class="benefit-title">Real-Time Visitor Tracking</h3>
                            <p class="benefit-description">
                                Keep tabs on who's on-site, when they entered, who they're meeting, and when they leave. Generate detailed reports to support audits, investigations, or compliance reviews.
                            </p>
                            
                            <div class="benefit-features">
                                <div class="mini-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Live visitor dashboard</span>
                                </div>
                                <div class="mini-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Comprehensive reporting suite</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </section>

    <!-- Core Features Section -->
    <section class="core-features-section" id="features">
        <div class="container">
                    <div class="counter-bg-elements">
                        <div class="floating-shape shape-1"></div>
                        <div class="floating-shape shape-2"></div>
                        <div class="floating-shape shape-3"></div>
                        <div class="floating-shape shape-4"></div>
                        <div class="grid-pattern"></div>
                    </div>
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center animate-on-scroll">
                        <h2 class="section-title">
                            Core <span class="gradient-text">Features</span>
                        </h2>
                        <p class="section-subtitle">
                            Developer-friendly modules designed for seamless integration and maximum security
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Feature 1: Secure Login & Admin Access -->
            <div class="feature-block feature-left animate-on-scroll">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="feature-content">
                            <div class="feature-number">01</div>
                            <h3 class="feature-title">Secure Login & Admin Access</h3>
                            <p class="feature-description">
                                Admins access the system through encrypted credentials. Passwords are securely hashed, and password recovery is handled via time-sensitive email links—keeping your control center protected at all times.
                            </p>
                            <div class="feature-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Encrypted Authentication</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-key"></i>
                                    <span>Secure Password Hashing</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-clock"></i>
                                    <span>Time-Sensitive Recovery</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-visual scale-on-scroll">
                            <div class="visual-card">
                                <div class="card-header">
                                    <div class="header-dots">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </div>
                                    <span class="card-title">Admin Panel</span>
                                </div>
                                <div class="card-content">
                                    <div class="login-form">
                                        <div class="form-group">
                                            <div class="input-field">
                                                <div class="input-icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="input-placeholder">admin@vms.com</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-field">
                                                <div class="input-icon">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                                <div class="input-placeholder">••••••••••</div>
                                            </div>
                                        </div>
                                        <div class="login-button">
                                            <span>Secure Login</span>
                                            <div class="button-loader"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Feature 2: Aadhaar Verification -->
            <div class="feature-block feature-right animate-on-scroll">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="feature-content">
                            <div class="feature-number">02</div>
                            <h3 class="feature-title">Aadhaar Verification via API</h3>
                            <p class="feature-description">
                                Integrated directly with India's official Aadhaar API, VMS enables instant visitor verification using an OTP-based authentication flow. It ensures every visitor's identity is legitimate before entry is granted.
                            </p>
                            <div class="feature-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-id-card"></i>
                                    <span>Official API Integration</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>OTP Authentication</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Instant Verification</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="feature-visual scale-on-scroll">
                            <div class="visual-card">
                                <div class="card-header">
                                    <div class="header-dots">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </div>
                                    <span class="card-title">Aadhaar Verification</span>
                                </div>
                                <div class="card-content">
                                    <div class="aadhaar-form">
                                        <div class="form-step active">
                                            <div class="step-icon">
                                                <i class="fas fa-id-card"></i>
                                            </div>
                                            <div class="step-text">Enter Aadhaar Number</div>
                                            <div class="aadhaar-input">XXXX XXXX 1234</div>
                                        </div>
                                        <div class="form-step">
                                            <div class="step-icon">
                                                <i class="fas fa-mobile-alt"></i>
                                            </div>
                                            <div class="step-text">OTP Verification</div>
                                            <div class="otp-boxes">
                                                <span class="otp-box">8</span>
                                                <span class="otp-box">7</span>
                                                <span class="otp-box">4</span>
                                                <span class="otp-box">2</span>
                                            </div>
                                        </div>
                                        <div class="verification-status">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Verified Successfully</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Feature 3: Visitor Management -->
            <div class="feature-block feature-left animate-on-scroll">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="feature-content">
                            <div class="feature-number">03</div>
                            <h3 class="feature-title">Visitor Management & Smart Logging</h3>
                            <p class="feature-description">
                                From name and purpose to entry time and host details, every visitor is automatically logged. The system creates and manages digital visitor passes, minimizing human error and speeding up access.
                            </p>
                            <div class="feature-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-clipboard-list"></i>
                                    <span>Automatic Logging</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-qrcode"></i>
                                    <span>Digital Visitor Passes</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span>Speed & Accuracy</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-visual scale-on-scroll">
                            <div class="visual-card">
                                <div class="card-header">
                                    <div class="header-dots">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </div>
                                    <span class="card-title">Visitor Dashboard</span>
                                </div>
                                <div class="card-content">
                                    <div class="visitor-list">
                                        <div class="visitor-item">
                                            <div class="visitor-avatar">JD</div>
                                            <div class="visitor-info">
                                                <div class="visitor-name">John Doe</div>
                                                <div class="visitor-details">Meeting • 2:30 PM • Room A</div>
                                            </div>
                                            <div class="visitor-status active">Active</div>
                                        </div>
                                        <div class="visitor-item">
                                            <div class="visitor-avatar">SW</div>
                                            <div class="visitor-info">
                                                <div class="visitor-name">Sarah Wilson</div>
                                                <div class="visitor-details">Interview • 3:00 PM • HR</div>
                                            </div>
                                            <div class="visitor-status pending">Pending</div>
                                        </div>
                                        <div class="visitor-item">
                                            <div class="visitor-avatar">MR</div>
                                            <div class="visitor-info">
                                                <div class="visitor-name">Mike Rodriguez</div>
                                                <div class="visitor-details">Delivery • 1:45 PM • Reception</div>
                                            </div>
                                            <div class="visitor-status completed">Completed</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Feature 4: Face Authentication -->
            <div class="feature-block feature-right animate-on-scroll">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="feature-content">
                            <div class="feature-number">04</div>
                            <h3 class="feature-title">Face Authentication at Entry</h3>
                            <p class="feature-description">
                                No ID cards, no questions. VMS uses facial recognition to match visitors with pre-approved records. This ensures high-speed, high-security access—especially useful in high-volume or high-risk environments.
                            </p>
                            <div class="feature-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-user-check"></i>
                                    <span>Contactless Entry</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-brain"></i>
                                    <span>AI-Powered Recognition</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-bolt"></i>
                                    <span>High-Speed Access</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="feature-visual scale-on-scroll">
                            <div class="visual-card">
                                <div class="card-header">
                                    <div class="header-dots">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </div>
                                    <span class="card-title">Face Recognition</span>
                                </div>
                                <div class="card-content">
                                    <div class="face-scanner">
                                        <div class="scanner-frame">
                                            <div class="face-outline">
                                                <div class="face-icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="scan-lines">
                                                <div class="scan-line"></div>
                                                <div class="scan-line"></div>
                                                <div class="scan-line"></div>
                                            </div>
                                        </div>
                                        <div class="scan-status">
                                            <div class="status-dot pulse"></div>
                                            <span>Scanning...</span>
                                        </div>
                                        <div class="match-result">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Match Found: John Doe</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Feature 5: Pre-Verification -->
            <div class="feature-block feature-left animate-on-scroll">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="feature-content">
                            <div class="feature-number">05</div>
                            <h3 class="feature-title">Pre-Verification via Invite Links</h3>
                            <p class="feature-description">
                                Employees send secure, digital invites directly to visitors via email or text. Visitors complete Aadhaar verification before they even arrive, shortening the check-in process to just a few seconds.
                            </p>
                            <div class="feature-highlights">
                                <div class="highlight-item">
                                    <i class="fas fa-envelope"></i>
                                    <span>Digital Invitations</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-clock"></i>
                                    <span>Pre-Verification</span>
                                </div>
                                <div class="highlight-item">
                                    <i class="fas fa-rocket"></i>
                                    <span>Instant Check-in</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-visual scale-on-scroll">
                            <div class="visual-card">
                                <div class="card-header">
                                    <div class="header-dots">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </div>
                                    <span class="card-title">Digital Invite</span>
                                </div>
                                <div class="card-content">
                                    <div class="invite-preview">
                                        <div class="invite-header">
                                            <div class="company-logo">VMS</div>
                                            <div class="invite-title">You're Invited!</div>
                                        </div>
                                        <div class="invite-details">
                                            <div class="detail-item">
                                                <i class="fas fa-user"></i>
                                                <span>Host: Sarah Johnson</span>
                                            </div>
                                            <div class="detail-item">
                                                <i class="fas fa-calendar"></i>
                                                <span>Date: Today, 2:30 PM</span>
                                            </div>
                                            <div class="detail-item">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>Location: Conference Room A</span>
                                            </div>
                                        </div>
                                        <div class="verify-button">
                                            <span>Pre-Verify Now</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                        <div class="qr-code">
                                            <div class="qr-pattern"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Background Elements -->
        <div class="features-bg-elements">
            <div class="bg-shape shape-1"></div>
            <div class="bg-shape shape-2"></div>
            <div class="bg-shape shape-3"></div>
        </div>
    </section>

    <!-- Industry Fit Section -->
    <section class="industry-section" id="industries">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center animate-on-scroll">
                        <h2 class="section-title">
                            Built for Any Facility That Requires <span class="gradient-text">Real Security</span>
                        </h2>
                        <p class="section-subtitle">
                            VMS is flexible enough for SMBs and powerful enough for high-traffic, high-security zones
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="industry-grid">
                <!-- Corporate Offices -->
                <div class="industry-card scale-on-scroll" style="animation-delay: 0.1s;">
                    <div class="industry-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3 class="industry-title">Corporate Offices</h3>
                    <p class="industry-description">
                        Greet clients and partners with streamlined digital entry
                    </p>
                    <div class="industry-overlay">
                        <div class="overlay-content">
                            <h4>Perfect for Corporate</h4>
                            <p>Streamline visitor management for professional environments with seamless digital check-ins.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Hospitals -->
                <div class="industry-card scale-on-scroll" style="animation-delay: 0.2s;">
                    <div class="industry-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <h3 class="industry-title">Hospitals</h3>
                    <p class="industry-description">
                        Authenticate vendors, patients, and visitors without slowing operations
                    </p>
                    <div class="industry-overlay">
                        <div class="overlay-content">
                            <h4>Healthcare Security</h4>
                            <p>Maintain patient safety while ensuring smooth operations for medical facilities.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Government Facilities -->
                <div class="industry-card scale-on-scroll" style="animation-delay: 0.3s;">
                    <div class="industry-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3 class="industry-title">Government Facilities</h3>
                    <p class="industry-description">
                        Control access to sensitive zones with real-time verification
                    </p>
                    <div class="industry-overlay">
                        <div class="overlay-content">
                            <h4>Government Grade</h4>
                            <p>Maximum security protocols for sensitive government and public facilities.</p>

                        </div>
                    </div>
                </div>
                
                <!-- Industrial Sites -->
                <div class="industry-card scale-on-scroll" style="animation-delay: 0.4s;">
                    <div class="industry-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h3 class="industry-title">Industrial Sites</h3>
                    <p class="industry-description">
                        Ensure safety and track contractor and vendor movement easily
                    </p>
                    <div class="industry-overlay">
                        <div class="overlay-content">
                            <h4>Industrial Safety</h4>
                            <p>Comprehensive tracking and safety protocols for industrial environments.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Background Pattern -->

    </section>

    <!-- Why Businesses Trust VMS Section -->
    <section class="trust-section" id="trust">
        <div class="container">
                    <div class="counter-bg-elements">
                        <div class="floating-shape shape-1"></div>
                        <div class="floating-shape shape-2"></div>
                        <div class="floating-shape shape-3"></div>
                        <div class="floating-shape shape-4"></div>
                        <div class="grid-pattern"></div>
                    </div>
            <div class="section-header text-center mb-5">
                <h2 class="section-title">Why Businesses Trust VMS</h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="row g-4">
                <!-- Security Card -->
                <div class="col-md-6 col-lg-3">
                    <div class="trust-card scale-on-scroll">
                        <div class="trust-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3 class="trust-title">Uncompromised Security</h3>
                        <p class="trust-description">
                            From Aadhaar integration to facial recognition, VMS puts identity at the center of access control. You always know who's in your building—and why.
                        </p>
                    </div>
                </div>
                
                <!-- Efficiency Card -->
                <div class="col-md-6 col-lg-3">
                    <div class="trust-card scale-on-scroll" style="animation-delay: 0.1s;">
                        <div class="trust-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3 class="trust-title">Operational Efficiency</h3>
                        <p class="trust-description">
                            Replace sign-in sheets, manual checks, and reception queues with automated workflows. Your front desk will thank you.
                        </p>
                    </div>
                </div>
                
                <!-- Scalable Card -->
                <div class="col-md-6 col-lg-3">
                    <div class="trust-card scale-on-scroll" style="animation-delay: 0.2s;">
                        <div class="trust-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="trust-title">Scalable & Configurable</h3>
                        <p class="trust-description">
                            VMS supports multi-location setups, thousands of daily check-ins, and custom access settings—so you can grow without limits.
                        </p>
                    </div>
                </div>
                
                <!-- Compliance Card -->
                <div class="col-md-6 col-lg-3">
                    <div class="trust-card scale-on-scroll" style="animation-delay: 0.3s;">
                        <div class="trust-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="trust-title">Data Privacy & Compliance</h3>
                        <p class="trust-description">
                            All visitor data is encrypted and stored securely, ensuring full compliance with your industry's regulations and internal policies.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section " id="testimonials">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">What Our Clients Say</h2>
                <div class="section-divider"></div>
            </div>
            
            <div class="owl-carousel testimonial-carousel">
                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p class="testimonial-text">
                            "The integration with Aadhaar and facial recognition was a game changer for us. We're now processing visitors 60% faster with far more control."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-image">
                                <div class="author-initials">NS</div>
                            </div>
                            <div class="author-info">
                                <h4 class="author-name">Naveen S.</h4>
                                <p class="author-title">Head of Security, Government Facility</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p class="testimonial-text">
                            "We used to have visitors waiting in line every morning. With VMS, they're already verified and walking in within seconds."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-image">
                                <div class="author-initials">SM</div>
                            </div>
                            <div class="author-info">
                                <h4 class="author-name">Shalini M.</h4>
                                <p class="author-title">Admin Manager, Multinational Bank</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p class="testimonial-text">
                            "What impressed us most was the audit-ready reporting. We now have logs for every visitor, accessible instantly."
                        </p>
                        <div class="testimonial-author">
                            <div class="author-image">
                                <div class="author-initials">VJ</div>
                            </div>
                            <div class="author-info">
                                <h4 class="author-name">Vikram J.</h4>
                                <p class="author-title">Compliance Lead, Healthcare Provider</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inline Calendar through Calendly section -->
    <section id="cal" class="cal-section">
        <div class="container my-5">
            <h2 class="text-center mb-3">Book a Time That Works for You</h2>
    
            <!-- 1) Placeholder for the inline widget -->
            <div id="calendly-inline-scheduler">
                <!-- Calendly inline widget begin -->
                <div class="calendly-inline-widget" data-url="https://calendly.com/qubifytech/visitor-management-demo" style="min-width:320px;height:700px;"></div>
                <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                <!-- Calendly inline widget end -->
            </div>
        </div>
    </section>

@endsection