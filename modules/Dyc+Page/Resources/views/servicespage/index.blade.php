@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $servicesHeaderContent = $servicesHeaderContent ?? null;
    $webDevContent = $webDevContent ?? null;
    $softwareDevContent = $softwareDevContent ?? null;
    $mobileDevContent = $mobileDevContent ?? null;
    $webAppDevContent = $webAppDevContent ?? null;
    $whyQubifyContent = $whyQubifyContent ?? null;
    $technologiesContent = $technologiesContent ?? null;
    $ctaContent = $ctaContent ?? null;
@endphp

<!-- Common Dynamic Page Admin Styles -->
<link rel="stylesheet" href="{{ asset('css/dynamic-page-admin.css') }}">

<div class="dynamic-page-container">
    <!-- Breadcrumb -->
    <div class="container-fluid">
        <div class="dynamic-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Dynamic Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Services Page</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="sections-sidebar">
                    <div class="p-3 border-bottom">
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">Services Page Sections</h5>
                    </div>
                    <div class="sections-nav">
                        <button class="section-nav-link active" data-section="hero">
                            <i class="fas fa-star"></i>
                            Hero Section
                        </button>
                        <button class="section-nav-link" data-section="services-header">
                            <i class="fas fa-heading"></i>
                            Services Header
                        </button>
                        <button class="section-nav-link" data-section="web-development">
                            <i class="fas fa-globe"></i>
                            Web Development
                        </button>
                        <button class="section-nav-link" data-section="software-development">
                            <i class="fas fa-code"></i>
                            Software Development
                        </button>
                        <button class="section-nav-link" data-section="mobile-development">
                            <i class="fas fa-mobile-alt"></i>
                            Mobile Development
                        </button>
                        <button class="section-nav-link" data-section="web-app-development">
                            <i class="fas fa-desktop"></i>
                            Web App Development
                        </button>
                        <button class="section-nav-link" data-section="why-qubify">
                            <i class="fas fa-lightbulb"></i>
                            Why Qubify
                        </button>
                        <button class="section-nav-link" data-section="technologies">
                            <i class="fas fa-cogs"></i>
                            Technologies
                        </button>
                        <button class="section-nav-link" data-section="cta">
                            <i class="fas fa-bullhorn"></i>
                            CTA Section
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <div class="content-area">  
                  <!-- Hero Section -->
                    <div class="section-content active" id="hero-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-star"></i>
                                    Hero Section
                                </h2>
                            </div>
                        </div>
                       
                        <form id="heroForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Title</label>
                                        <textarea class="form-control" name="hero_title" rows="3" placeholder="Professional Development Services Built for Modern Business Growth">{{ isset($heroContent) && $heroContent ? ($heroContent['title'] ?? '') : 'Professional Development Services Built for Modern Business Growth' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control" name="hero_subtitle" rows="4" placeholder="Qubify delivers comprehensive development services...">{{ isset($heroContent) && $heroContent ? ($heroContent['subtitle'] ?? '') : 'Qubify delivers comprehensive development services that transform your ideas into powerful digital solutions—from custom web applications to mobile apps and enterprise software that drives real business results.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button 1 Text</label>
                                        <input type="text" class="form-control" name="hero_button1_text" placeholder="Get Started Today" value="{{ isset($heroContent) && $heroContent ? ($heroContent['buttons'][0]['text'] ?? '') : 'Get Started Today' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button 1 URL</label>
                                        <input type="text" class="form-control" name="hero_button1_url" placeholder="#contact" value="{{ isset($heroContent) && $heroContent ? ($heroContent['buttons'][0]['url'] ?? '') : '#contact' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button 2 Text</label>
                                        <input type="text" class="form-control" name="hero_button2_text" placeholder="Contact Our Team" value="{{ isset($heroContent) && $heroContent ? ($heroContent['buttons'][1]['text'] ?? '') : 'Contact Our Team' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button 2 URL</label>
                                        <input type="text" class="form-control" name="hero_button2_url" placeholder="mailto:sales@qubifytech.com" value="{{ isset($heroContent) && $heroContent ? ($heroContent['buttons'][1]['url'] ?? '') : 'mailto:sales@qubifytech.com' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Hero Section
                                </button>
                            </div>
                        </form>
                    </div>     
               <!-- Services Header Section -->
                    <div class="section-content" id="services-header-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-heading"></i>
                                    Services Header Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="servicesHeaderForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Services Title</label>
                                        <input type="text" class="form-control" name="services_title" placeholder="Our Development Services" value="{{ isset($servicesHeaderContent) && $servicesHeaderContent ? ($servicesHeaderContent['title'] ?? '') : 'Our Development Services' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Services Subtitle</label>
                                        <textarea class="form-control" name="services_subtitle" rows="3" placeholder="Comprehensive development solutions designed to transform your business operations...">{{ isset($servicesHeaderContent) && $servicesHeaderContent ? ($servicesHeaderContent['subtitle'] ?? '') : 'Comprehensive development solutions designed to transform your business operations and accelerate growth across all digital platforms.' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Services Header Section
                                </button>
                            </div>
                        </form>
                    </div> 
                   <!-- Web Development Section -->
                    <div class="section-content" id="web-development-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-globe"></i>
                                    Web Development Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="webDevForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <input type="text" class="form-control" name="category" placeholder="Web Development" value="{{ isset($webDevContent) && $webDevContent ? ($webDevContent['category'] ?? '') : 'Web Development' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Image URL</label>
                                        <input type="text" class="form-control" name="image_url" placeholder="https://images.unsplash.com/..." value="{{ isset($webDevContent) && $webDevContent ? ($webDevContent['image_url'] ?? '') : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&h=300&fit=crop&auto=format' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Custom Web Development Services" value="{{ isset($webDevContent) && $webDevContent ? ($webDevContent['title'] ?? '') : 'Custom Web Development Services' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="4" placeholder="You define the vision; we craft the solution...">{{ isset($webDevContent) && $webDevContent ? ($webDevContent['description'] ?? '') : 'You define the vision; we craft the solution. Leveraging our expertise in web technologies and agile development, we create high-performing, scalable, and responsive websites, web apps, and portals tailored to your goals. From e-commerce platforms to enterprise web applications, we deliver solutions that drive results.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Key Features</label>
                                        <input type="text" class="form-control" name="features" placeholder="Fully responsive design, SEO optimized, e-commerce ready..." value="{{ isset($webDevContent) && $webDevContent ? ($webDevContent['features'] ?? '') : 'Fully responsive design, SEO optimized, e-commerce ready, modern frameworks, and scalable architecture.' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" placeholder="Learn More" value="{{ isset($webDevContent) && $webDevContent ? ($webDevContent['button']['text'] ?? '') : 'Learn More' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button URL</label>
                                        <input type="text" class="form-control" name="button_url" placeholder="/services/web-development" value="{{ isset($webDevContent) && $webDevContent ? ($webDevContent['button']['url'] ?? '') : '/services/web-development' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Web Development Section
                                </button>
                            </div>
                        </form>
                    </div>        
            <!-- Software Development Section -->
                    <div class="section-content" id="software-development-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-code"></i>
                                    Software Development Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="softwareDevForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <input type="text" class="form-control" name="category" placeholder="Software Development" value="{{ isset($softwareDevContent) && $softwareDevContent ? ($softwareDevContent['category'] ?? '') : 'Software Development' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Image URL</label>
                                        <input type="text" class="form-control" name="image_url" placeholder="https://images.unsplash.com/..." value="{{ isset($softwareDevContent) && $softwareDevContent ? ($softwareDevContent['image_url'] ?? '') : 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=500&h=300&fit=crop&auto=format' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Custom Software Development Services" value="{{ isset($softwareDevContent) && $softwareDevContent ? ($softwareDevContent['title'] ?? '') : 'Custom Software Development Services' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="4" placeholder="You define the vision; we craft the software...">{{ isset($softwareDevContent) && $softwareDevContent ? ($softwareDevContent['description'] ?? '') : 'You define the vision; we craft the software to bring it to life. With a focus on scalability, performance, and purpose-driven solutions, our custom software development services address your unique challenges and drive results. We build AI-powered, enterprise-ready solutions that grow with your business.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Specialties</label>
                                        <input type="text" class="form-control" name="features" placeholder="AI-driven solutions, enterprise software..." value="{{ isset($softwareDevContent) && $softwareDevContent ? ($softwareDevContent['features'] ?? '') : 'AI-driven solutions, enterprise software, product development, system integration, and cloud-native applications.' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" placeholder="Learn More" value="{{ isset($softwareDevContent) && $softwareDevContent ? ($softwareDevContent['button']['text'] ?? '') : 'Learn More' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button URL</label>
                                        <input type="text" class="form-control" name="button_url" placeholder="/services/software-development" value="{{ isset($softwareDevContent) && $softwareDevContent ? ($softwareDevContent['button']['url'] ?? '') : '/services/software-development' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Software Development Section
                                </button>
                            </div>
                        </form>
                    </div>  
                  <!-- Mobile Development Section -->
                    <div class="section-content" id="mobile-development-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-mobile-alt"></i>
                                    Mobile Development Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="mobileDevForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <input type="text" class="form-control" name="category" placeholder="Mobile Development" value="{{ isset($mobileDevContent) && $mobileDevContent ? ($mobileDevContent['category'] ?? '') : 'Mobile Development' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Image URL</label>
                                        <input type="text" class="form-control" name="image_url" placeholder="https://images.unsplash.com/..." value="{{ isset($mobileDevContent) && $mobileDevContent ? ($mobileDevContent['image_url'] ?? '') : 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=500&h=300&fit=crop&auto=format' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Mobile App Development Services" value="{{ isset($mobileDevContent) && $mobileDevContent ? ($mobileDevContent['title'] ?? '') : 'Mobile App Development Services' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="4" placeholder="You bring the vision. We bring it to life...">{{ isset($mobileDevContent) && $mobileDevContent ? ($mobileDevContent['description'] ?? '') : 'You bring the vision. We bring it to life—built with precision, passion, and purpose. We build apps that feel natural to use, perform flawlessly, and scale easily with your business growth. From iOS and Android native apps to cross-platform solutions, we deliver mobile experiences that users love.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Platforms</label>
                                        <input type="text" class="form-control" name="features" placeholder="iOS & Android native, Flutter & React Native..." value="{{ isset($mobileDevContent) && $mobileDevContent ? ($mobileDevContent['features'] ?? '') : 'iOS & Android native, Flutter & React Native cross-platform, progressive web apps, and future-ready solutions.' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" placeholder="Learn More" value="{{ isset($mobileDevContent) && $mobileDevContent ? ($mobileDevContent['button']['text'] ?? '') : 'Learn More' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button URL</label>
                                        <input type="text" class="form-control" name="button_url" placeholder="/services/mobile-app" value="{{ isset($mobileDevContent) && $mobileDevContent ? ($mobileDevContent['button']['url'] ?? '') : '/services/mobile-app' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Mobile Development Section
                                </button>
                            </div>
                        </form>
                    </div>         
           <!-- Web App Development Section -->
                    <div class="section-content" id="web-app-development-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-desktop"></i>
                                    Web App Development Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="webAppDevForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <input type="text" class="form-control" name="category" placeholder="Web Applications" value="{{ isset($webAppDevContent) && $webAppDevContent ? ($webAppDevContent['category'] ?? '') : 'Web Applications' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Image URL</label>
                                        <input type="text" class="form-control" name="image_url" placeholder="https://images.unsplash.com/..." value="{{ isset($webAppDevContent) && $webAppDevContent ? ($webAppDevContent['image_url'] ?? '') : 'https://images.unsplash.com/photo-1551650975-87deedd944c3?w=500&h=300&fit=crop&auto=format' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Web Application Development Services" value="{{ isset($webAppDevContent) && $webAppDevContent ? ($webAppDevContent['title'] ?? '') : 'Web Application Development Services' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="4" placeholder="Transform your business processes...">{{ isset($webAppDevContent) && $webAppDevContent ? ($webAppDevContent['description'] ?? '') : 'Transform your business processes with powerful web applications that streamline operations and enhance user experiences. We develop scalable, secure, and feature-rich web applications using modern technologies and best practices to deliver solutions that perform under pressure.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Solutions</label>
                                        <input type="text" class="form-control" name="features" placeholder="Enterprise web apps, SaaS platforms..." value="{{ isset($webAppDevContent) && $webAppDevContent ? ($webAppDevContent['features'] ?? '') : 'Enterprise web apps, SaaS platforms, progressive web apps, API development, and cloud integration.' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" placeholder="Learn More" value="{{ isset($webAppDevContent) && $webAppDevContent ? ($webAppDevContent['button']['text'] ?? '') : 'Learn More' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button URL</label>
                                        <input type="text" class="form-control" name="button_url" placeholder="/services/web-app" value="{{ isset($webAppDevContent) && $webAppDevContent ? ($webAppDevContent['button']['url'] ?? '') : '/services/web-app' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Web App Development Section
                                </button>
                            </div>
                        </form>
                    </div>          
          <!-- Why Qubify Section -->
                    <div class="section-content" id="why-qubify-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-lightbulb"></i>
                                    Why Qubify Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="whyQubifyForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Why Choose Qubify for Development Services?" value="{{ isset($whyQubifyContent) && $whyQubifyContent ? ($whyQubifyContent['title'] ?? '') : 'Why Choose Qubify for Development Services?' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">First Paragraph</label>
                                        <textarea class="form-control" name="description1" rows="3" placeholder="What sets Qubify apart...">{{ isset($whyQubifyContent) && $whyQubifyContent ? ($whyQubifyContent['description1'] ?? '') : 'What sets Qubify apart is more than just our technology—it\'s our approach. Every service we provide is tailored, scalable, and built with cutting-edge technologies. We\'re not here to just "digitize" your business. We\'re here to transform how it works, end to end.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Second Paragraph</label>
                                        <textarea class="form-control" name="description2" rows="3" placeholder="Our team combines technical expertise...">{{ isset($whyQubifyContent) && $whyQubifyContent ? ($whyQubifyContent['description2'] ?? '') : 'Our team combines technical expertise with industry insight to deliver development services that provide real ROI—secure, future-ready, and always aligned with your growth objectives.' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Why Qubify Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Technologies Section -->
                    <div class="section-content" id="technologies-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    Technologies Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="technologiesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Technologies We Master" value="{{ isset($technologiesContent) && $technologiesContent ? ($technologiesContent['title'] ?? '') : 'Technologies We Master' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control" name="subtitle" rows="2" placeholder="We work with the latest technologies...">{{ isset($technologiesContent) && $technologiesContent ? ($technologiesContent['subtitle'] ?? '') : 'We work with the latest technologies and frameworks to deliver cutting-edge solutions:' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTechs = [
                                    ['title' => 'Frontend Technologies', 'description' => 'Vue.js, HTML5, CSS3, JavaScript'],
                                    ['title' => 'Backend Technologies', 'description' => 'Node.js, Python, PHP, Java, Laravel, Django'],
                                    ['title' => 'Mobile Technologies', 'description' => 'Swift, Kotlin, Flutter, React Native'],
                                    ['title' => 'Databases', 'description' => 'MySQL, Firebase, Redis, SQLite']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-code"></i>
                                        Technology {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Technology Title</label>
                                                <input type="text" class="form-control" name="tech_{{ $i }}_title" placeholder="{{ $defaultTechs[$i-1]['title'] }}" value="{{ isset($technologiesContent) && $technologiesContent ? ($technologiesContent['technologies'][$i-1]['title'] ?? '') : $defaultTechs[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Technology Description</label>
                                                <input type="text" class="form-control" name="tech_{{ $i }}_description" placeholder="{{ $defaultTechs[$i-1]['description'] }}" value="{{ isset($technologiesContent) && $technologiesContent ? ($technologiesContent['technologies'][$i-1]['description'] ?? '') : $defaultTechs[$i-1]['description'] }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Technologies Section
                                </button>
                            </div>
                        </form>
                    </div> 
                   <!-- CTA Section -->
                    <div class="section-content" id="cta-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-bullhorn"></i>
                                    CTA Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="ctaForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">CTA Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Ready to Start Your Development Project?" value="{{ isset($ctaContent) && $ctaContent ? ($ctaContent['title'] ?? '') : 'Ready to Start Your Development Project?' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">CTA Description</label>
                                        <textarea class="form-control" name="description" rows="3" placeholder="Let's build something extraordinary together...">{{ isset($ctaContent) && $ctaContent ? ($ctaContent['description'] ?? '') : 'Let\'s build something extraordinary together. Whether you\'re looking to create a new web application, mobile app, or enterprise software solution, Qubify has the expertise and execution power to bring your vision to life.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="sales@qubifytech.com" value="{{ isset($ctaContent) && $ctaContent ? ($ctaContent['contact']['email'] ?? '') : 'sales@qubifytech.com' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="+91 99154 37999" value="{{ isset($ctaContent) && $ctaContent ? ($ctaContent['contact']['phone'] ?? '') : '+91 99154 37999' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Website</label>
                                        <input type="text" class="form-control" name="website" placeholder="www.qubifytech.com" value="{{ isset($ctaContent) && $ctaContent ? ($ctaContent['contact']['website'] ?? '') : 'www.qubifytech.com' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" placeholder="Get Started Today" value="{{ isset($ctaContent) && $ctaContent ? ($ctaContent['button']['text'] ?? '') : 'Get Started Today' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save CTA Section
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Section navigation
    const sectionLinks = document.querySelectorAll('.section-nav-link');
    const sectionContents = document.querySelectorAll('.section-content');

    sectionLinks.forEach(link => {
        link.addEventListener('click', function() {
            const targetSection = this.getAttribute('data-section');
            
            // Update active states
            sectionLinks.forEach(l => l.classList.remove('active'));
            sectionContents.forEach(c => c.classList.remove('active'));
            
            this.classList.add('active');
            document.getElementById(targetSection + '-section').classList.add('active');
        });
    });

    // Form submissions
    document.getElementById('heroForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitForm(this, '/admin/servicespage/save-hero', 'Hero section saved successfully!');
    });

    document.getElementById('servicesHeaderForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitForm(this, '/admin/servicespage/save-services-header', 'Services header section saved successfully!');
    });

    document.getElementById('webDevForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitServiceForm(this, '/admin/servicespage/save-service/web_development', 'Web Development section saved successfully!');
    });

    document.getElementById('softwareDevForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitServiceForm(this, '/admin/servicespage/save-service/software_development', 'Software Development section saved successfully!');
    });

    document.getElementById('mobileDevForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitServiceForm(this, '/admin/servicespage/save-service/mobile_development', 'Mobile Development section saved successfully!');
    });

    document.getElementById('webAppDevForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitServiceForm(this, '/admin/servicespage/save-service/web_app_development', 'Web App Development section saved successfully!');
    });

    document.getElementById('whyQubifyForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitForm(this, '/admin/servicespage/save-why-qubify', 'Why Qubify section saved successfully!');
    });

    document.getElementById('technologiesForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitForm(this, '/admin/servicespage/save-technologies', 'Technologies section saved successfully!');
    });

    document.getElementById('ctaForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitForm(this, '/admin/servicespage/save-cta', 'CTA section saved successfully!');
    });

    // Toggle switches
    document.querySelectorAll('.section-toggle input[type="checkbox"]').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const label = this.nextElementSibling;
            label.textContent = this.checked ? 'On' : 'Off';
        });
    });

    function submitForm(form, url, successMessage) {
        const formData = new FormData(form);
        const toggleId = form.closest('.section-content').querySelector('.section-toggle input[type="checkbox"]').id;
        const isActive = document.getElementById(toggleId).checked;
        formData.append('is_active', isActive ? '1' : '0');

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(successMessage, 'success');
            } else {
                showNotification(data.message || 'An error occurred', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('An error occurred while saving', 'error');
        });
    }

    function submitServiceForm(form, url, successMessage) {
        submitForm(form, url, successMessage);
    }

    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }
});
</script>
@endsection