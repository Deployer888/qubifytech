@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $aboutContent = $aboutContent ?? null;
    $servicesContent = $servicesContent ?? null;
    $solutionsContent = $solutionsContent ?? null;
    $portfolioContent = $portfolioContent ?? null;
    $testimonialsContent = $testimonialsContent ?? null;
    $ctaContent = $ctaContent ?? null;
    $contactContent = $contactContent ?? null;
@endphp

<!-- Common Dynamic Page Admin Styles -->
<link rel="stylesheet" href="{{ asset('css/dynamic-page-admin.css') }}">

<style>
    /* Homepage-specific styles */
    .content-editor {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        border: 1px solid #e2e8f0;
        min-height: 600px;
    }
    .save-btn {
        background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
        border: none;
        color: white;
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 8px;
        box-shadow: 0 4px 6px -1px rgba(34, 197, 94, 0.3);
        transition: all 0.2s ease;
    }

    .save-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 8px -1px rgba(34, 197, 94, 0.4);
        background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
    }

    /* CKEditor Toolbar Styling */
    .ck.ck-toolbar {
        border: 2px solid #e2e8f0 !important;
        border-bottom: none !important;
        border-radius: 8px 8px 0 0 !important;
        background: #f8fafc !important;
        padding: 8px 12px !important;
    }

    .ck.ck-toolbar .ck-toolbar__items {
        gap: 4px;
    }

    .ck.ck-button {
        border-radius: 6px !important;
        padding: 6px 8px !important;
    }

    .ck.ck-button:hover {
        background: #e2e8f0 !important;
    }

    .ck.ck-button.ck-on {
        background: #3b82f6 !important;
        color: white !important;
    }

    .ck-editor__main {
        border-radius: 0 0 8px 8px !important;
    }

    .ck-content p {
        margin: 0 0 8px 0 !important;
    }

    .ck-content ul, .ck-content ol {
        margin: 8px 0 !important;
        padding-left: 20px !important;
    }

    .ck-content li {
        margin: 4px 0 !important;
    }
</style>
<link rel="stylesheet" href="{{ asset('css/dynamic-page-admin.css') }}">
<div class="dynamic-page-container">
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="dynamic-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dynamic Homepage Editor</li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- Left Sidebar - Section Navigation -->
            <div class="col-md-3">
                <div class="sections-sidebar">
                    <div class="sections-nav">
                        <h5 class="px-3 py-2 mb-3 text-muted border-bottom">Page Sections</h5>
                        <button class="section-nav-link active" data-section="hero">
                            <span class="tab-indicator"></span>
                            <i class="fas fa-rocket"></i>Hero Section
                        </button>
                        <button class="section-nav-link" data-section="about">
                            <span class="tab-indicator"></span>
                            <i class="fas fa-info-circle"></i>About / Why Us
                        </button>
                        <button class="section-nav-link" data-section="services">
                            <span class="tab-indicator"></span>
                            <i class="fas fa-cogs"></i>Services
                        </button>
                        <button class="section-nav-link" data-section="solutions">
                            <span class="tab-indicator"></span>
                            <i class="fas fa-lightbulb"></i>Solutions
                        </button>
                        <button class="section-nav-link" data-section="portfolio">
                            <span class="tab-indicator"></span>
                            <i class="fas fa-briefcase"></i>Portfolio
                        </button>
                        <button class="section-nav-link" data-section="testimonials">
                            <span class="tab-indicator"></span>
                            <i class="fas fa-quote-left"></i>Testimonials
                        </button>
                        <button class="section-nav-link" data-section="cta">
                            <span class="tab-indicator"></span>
                            <i class="fas fa-bullhorn"></i>Call to Action
                        </button>
                        <button class="section-nav-link" data-section="contact">
                            <span class="tab-indicator"></span>
                            <i class="fas fa-envelope"></i>Contact
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Content Area - Form Editor -->
            <div class="col-md-9">
                <div class="content-editor">
                    
                    <!-- Hero Section -->
                    <div class="section-content active" id="hero-content">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="section-title">Hero Section</h4>
                             
                            </div>
                        </div>
                        
                        <div class="form-container">
                            <form id="heroForm">
                                
                                <!-- Hero Badge -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-rocket me-2"></i>Hero Badge</h5>
                                    </div>
                                   {{--<!-- <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="heroBadgeIcon" class="form-label">Badge Icon</label>
                                            <input type="text" class="form-control" id="heroBadgeIcon" name="hero_badge_icon" 
                                                value="{{ $heroContent->content_json['badge']['icon'] ?? 'fas fa-rocket' }}" placeholder="fas fa-rocket">
                                        </div>
                                    </div> --> --}} 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="heroBadgeText" class="form-label">Badge Text</label>
                                            <input type="text" class="form-control" id="heroBadgeText" name="hero_badge_text" 
                                                value="{{ $heroContent->content_json['badge']['text'] ?? 'A Leading Software Development Company' }}" placeholder="Badge text">
                                        </div>
                                    </div>
                                </div>

                                <!-- Main Title -->
                                <div class="form-group mb-4">
                                    <label for="heroTitle" class="form-label">Main Title</label>
                                    <input type="text" class="form-control form-control-lg" id="heroTitle" name="hero_title" 
                                        value="{{ $heroContent->content_json['title'] ?? 'AI-Driven Software Development Company' }}" placeholder="Enter main title">
                                </div>

                                <!-- Description -->
                                <div class="form-group mb-4">
                                    <label for="heroDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="heroDescription" name="hero_description" rows="4">{{ $heroContent->content_json['description'] ?? 'We design AI-powered software and cutting-edge solutions that help global enterprises and tech startups build faster, smarter, and more efficiently. Making an advanced and better future.' }}</textarea>
                                </div>

                                <!-- Sub Description -->
                                <div class="form-group mb-4">
                                    <label for="heroSubDescription" class="form-label">Sub Description</label>
                                    <input type="text" class="form-control" id="heroSubDescription" name="hero_sub_description" 
                                        value="{{ $heroContent->content_json['sub_description'] ?? 'From idea to execution, Qubify is your engine for next-gen innovation.' }}" placeholder="Sub description">
                                </div>

                                <!-- CTA Button -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-mouse-pointer me-2"></i>Call to Action Button</h5>
                                    </div>
                                   {{--<!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="heroCtaIcon" class="form-label">Button Icon</label>
                                            <input type="text" class="form-control" id="heroCtaIcon" name="hero_cta_icon" 
                                                value="{{ $heroContent->content_json['cta']['icon'] ?? 'fas fa-rocket' }}" placeholder="fas fa-rocket">
                                        </div>
                                    </div> -->--}} 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="heroCtaText" class="form-label">Button Text</label>
                                            <input type="text" class="form-control" id="heroCtaText" name="hero_cta_text" 
                                                value="{{ $heroContent->content_json['cta']['text'] ?? 'Start Your Project' }}" placeholder="Button text">
                                        </div>
                                    </div>
                              
                                </div>

                                <!-- Statistics -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-chart-bar me-2"></i>Statistics</h5>
                                    </div>
                                </div>

                                <!-- Stat 1 -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="stat1Number" class="form-label">Number</label>
                                            <input type="text" class="form-control" id="stat1Number" name="stat1_number" 
                                                value="{{ $heroContent->content_json['statistics'][0]['number'] ?? '500' }}" placeholder="500">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stat1Suffix" class="form-label">Suffix</label>
                                            <input type="text" class="form-control" id="stat1Suffix" name="stat1_suffix" 
                                                value="{{ $heroContent->content_json['statistics'][0]['suffix'] ?? '+' }}" placeholder="+">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="stat1Label" class="form-label">Label</label>
                                            <input type="text" class="form-control" id="stat1Label" name="stat1_label" 
                                                value="{{ $heroContent->content_json['statistics'][0]['label'] ?? 'Successful Projects' }}" placeholder="Label">
                                        </div>
                                    </div>
                                </div>

                                <!-- Stat 2 -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="stat2Number" class="form-label">Number</label>
                                            <input type="text" class="form-control" id="stat2Number" name="stat2_number" 
                                                value="{{ $heroContent->content_json['statistics'][1]['number'] ?? '50' }}" placeholder="50">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stat2Suffix" class="form-label">Suffix</label>
                                            <input type="text" class="form-control" id="stat2Suffix" name="stat2_suffix" 
                                                value="{{ $heroContent->content_json['statistics'][1]['suffix'] ?? '+' }}" placeholder="+">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="stat2Label" class="form-label">Label</label>
                                            <input type="text" class="form-control" id="stat2Label" name="stat2_label" 
                                                value="{{ $heroContent->content_json['statistics'][1]['label'] ?? 'Enterprise Clients' }}" placeholder="Label">
                                        </div>
                                    </div>
                                </div>

                                <!-- Stat 3 -->
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="stat3Number" class="form-label">Number</label>
                                            <input type="text" class="form-control" id="stat3Number" name="stat3_number" 
                                                value="{{ $heroContent->content_json['statistics'][2]['number'] ?? '99' }}" placeholder="99">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="stat3Suffix" class="form-label">Suffix</label>
                                            <input type="text" class="form-control" id="stat3Suffix" name="stat3_suffix" 
                                                value="{{ $heroContent->content_json['statistics'][2]['suffix'] ?? '%' }}" placeholder="%">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="stat3Label" class="form-label">Label</label>
                                            <input type="text" class="form-control" id="stat3Label" name="stat3_label" 
                                                value="{{ $heroContent->content_json['statistics'][2]['label'] ?? 'Project Success Rate' }}" placeholder="Label">
                                        </div>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-end">
                                    <button type="submit" class="save-btn btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save me-2"></i>Save Hero Section
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- About Section -->
                    <div class="section-content" id="about-content">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="section-title">About / Why Us Section</h4>
                            </div>
                        </div>
                        
                        <div class="form-container">
                            <form id="aboutForm">
                                
                                <!-- Section Title -->
                                <div class="form-group mb-4">
                                    <label for="aboutTitle" class="form-label">Section Title</label>
                                    <input type="text" class="form-control form-control-lg" id="aboutTitle" name="about_title" 
                                        value="{{ $aboutContent->content_json['title'] ?? 'Why Qubify?' }}" placeholder="Section title">
                                </div>

                                <!-- Value Pillars -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-columns me-2"></i>Value Pillars</h5>
                                    </div>
                                </div>

                                <!-- Pillar 1 -->
                                <div class="row mb-4">
                                   {{-- <!-- <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pillar1Icon" class="form-label">Icon</label>
                                            <input type="text" class="form-control" id="pillar1Icon" name="pillar1_icon" 
                                                value="{{ $aboutContent->content_json['pillars'][0]['icon'] ?? 'fas fa-shield-alt' }}" placeholder="Icon class">
                                        </div>
                                    </div> -->--}}
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="pillar1Title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="pillar1Title" name="pillar1_title" 
                                                value="{{ $aboutContent->content_json['pillars'][0]['title'] ?? 'Built for Visionaries, Trusted by Leaders' }}" placeholder="Pillar title">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="pillar1Description" class="form-label">Description</label>
                                            <textarea class="form-control" id="pillar1Description" name="pillar1_description" rows="3">{{ $aboutContent->content_json['pillars'][0]['description'] ?? "At Qubify, we don't just build software — we engineer transformative digital systems with security, scalability, and strategic growth baked in from day one." }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pillar 2 -->
                                <div class="row mb-4">
                                   {{-- <!-- <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pillar2Icon" class="form-label">Icon</label>
                                            <input type="text" class="form-control" id="pillar2Icon" name="pillar2_icon" 
                                                value="{{ $aboutContent->content_json['pillars'][1]['icon'] ?? 'fas fa-graduation-cap' }}" placeholder="Icon class">
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="pillar2Title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="pillar2Title" name="pillar2_title" 
                                                value="{{ $aboutContent->content_json['pillars'][1]['title'] ?? 'Enterprise-Grade Security Architecture' }}" placeholder="Pillar title">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="pillar2Description" class="form-label">Description</label>
                                            <textarea class="form-control" id="pillar2Description" name="pillar2_description" rows="3">{{ $aboutContent->content_json['pillars'][1]['description'] ?? 'Modern businesses demand more than encryption. We develop secure, scalable platforms with future-ready smart contracts and decentralized infrastructure—ensuring your systems are safe, efficient, and built to grow.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pillar 3 -->
                                <div class="row mb-4">
                                   {{-- <!-- <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pillar3Icon" class="form-label">Icon</label>
                                            <input type="text" class="form-control" id="pillar3Icon" name="pillar3_icon" 
                                                value="{{ $aboutContent->content_json['pillars'][2]['icon'] ?? 'fas fa-cogs' }}" placeholder="Icon class">
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="pillar3Title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="pillar3Title" name="pillar3_title" 
                                                value="{{ $aboutContent->content_json['pillars'][2]['title'] ?? 'Accelerated Operational Intelligence' }}" placeholder="Pillar title">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="pillar3Description" class="form-label">Description</label>
                                            <textarea class="form-control" id="pillar3Description" name="pillar3_description" rows="3">{{ $aboutContent->content_json['pillars'][2]['description'] ?? 'We turn raw data into strategic action. Our AI-driven platforms uncover insights that help you scale faster, enhance customer journeys, and streamline internal operations—all in real time.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pillar 4 -->
                                <div class="row mb-4">
                                  {{--  <!-- <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pillar4Icon" class="form-label">Icon</label>
                                            <input type="text" class="form-control" id="pillar4Icon" name="pillar4_icon" 
                                                value="{{ $aboutContent->content_json['pillars'][3]['icon'] ?? 'fas fa-handshake' }}" placeholder="Icon class">
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="pillar4Title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="pillar4Title" name="pillar4_title" 
                                                value="{{ $aboutContent->content_json['pillars'][3]['title'] ?? 'We Take Every Project Serious' }}" placeholder="Pillar title">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="pillar4Description" class="form-label">Description</label>
                                            <textarea class="form-control" id="pillar4Description" name="pillar4_description" rows="3">{{ $aboutContent->content_json['pillars'][3]['description'] ?? "We're not a volume shop—we're a partner. Each project gets direct C-suite oversight, access to top 1% tech talent, and tailored strategies to go from zero to market dominance with precision." }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-end">
                                    <button type="submit" class="save-btn btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save me-2"></i>Save About Section
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                                    
                    <!-- Services Section -->
                    <div class="section-content" id="services-content">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="section-title">Services Section</h4>
                            </div>
                        </div>
                        
                        <div class="form-container">
                            <form id="servicesForm">
                                
                                <!-- Section Header -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-heading me-2"></i>Section Header</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="servicesTitle" class="form-label">Section Title</label>
                                            <input type="text" class="form-control form-control-lg" id="servicesTitle" name="services_title" 
                                                value="{{ $servicesContent->content_json['title'] ?? 'Our Capabilities – Solutions Portfolio' }}" placeholder="Section title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="servicesSubtitle" class="form-label">Section Subtitle</label>
                                            <input type="text" class="form-control" id="servicesSubtitle" name="services_subtitle" 
                                                value="{{ $servicesContent->content_json['subtitle'] ?? 'Scalable. Future-Ready.' }}" placeholder="Section subtitle">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="servicesDescription" class="form-label">Section Description</label>
                                            <textarea class="form-control" id="servicesDescription" name="services_description" rows="3">{{ $servicesContent->content_json['description'] ?? 'We engineer digital systems that do more than just work — they accelerate transformation. From AI to blockchain, every solution we deliver is crafted to solve real problems with long-term impact.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Service Tabs -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-layer-group me-2"></i>Service Categories</h5>
                                        <div class="nav nav-tabs" id="serviceTabsAdmin" role="tablist">
                                            <button class="nav-link active" id="ai-tab" data-bs-toggle="tab" data-bs-target="#ai-admin" type="button" role="tab">AI Solutions</button>
                                            <button class="nav-link" id="mobile-tab" data-bs-toggle="tab" data-bs-target="#mobile-admin" type="button" role="tab">Mobile Development</button>
                                            <button class="nav-link" id="web-tab" data-bs-toggle="tab" data-bs-target="#web-admin" type="button" role="tab">Web Platforms</button>
                                            <button class="nav-link" id="mvp-tab" data-bs-toggle="tab" data-bs-target="#mvp-admin" type="button" role="tab">MVP</button>
                                            <button class="nav-link" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-admin" type="button" role="tab">UI/UX Design</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content" id="serviceTabsContent">
                                    <!-- AI Solutions Tab -->
                                    <div class="tab-pane fade show active" id="ai-admin" role="tabpanel">
                                        <div class="row mb-4 p-4 border rounded">
                                            <div class="col-12 mb-3">
                                                <h6 class="text-primary fw-bold">AI Solutions Configuration</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="aiTitle" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="aiTitle" name="ai_title" 
                                                        value="{{ $servicesContent->content_json['services']['ai']['title'] ?? 'Enterprise AI Solutions — Built for Scale' }}" placeholder="Service title">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="aiSubtitle" class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" id="aiSubtitle" name="ai_subtitle" 
                                                        value="{{ $servicesContent->content_json['services']['ai']['subtitle'] ?? 'Architect intelligent infrastructure that doesn\'t just analyze — it learns, adapts, and unlocks value at every level.' }}" placeholder="Service subtitle">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="aiImage" class="form-label">Upload Image</label>
                                                    <input type="file" class="form-control" id="aiImage" name="ai_image" accept="image/*">
                                                    @if(isset($servicesContent->content_json['services']['ai']['image']) && $servicesContent->content_json['services']['ai']['image'])
                                                        <div class="mt-2">
                                                            <img src="{{ asset($servicesContent->content_json['services']['ai']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 150px;">
                                                            <input type="hidden" name="ai_image_current" value="{{ $servicesContent->content_json['services']['ai']['image'] }}">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="aiImageAlt" class="form-label">Image Alt Text</label>
                                                    <input type="text" class="form-control" id="aiImageAlt" name="ai_image_alt" 
                                                        value="{{ $servicesContent->content_json['services']['ai']['image_alt'] ?? 'AI Dashboard' }}" placeholder="Image alt text">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="aiButtonText" class="form-label">Button Text</label>
                                                    <input type="text" class="form-control" id="aiButtonText" name="ai_button_text" 
                                                        value="{{ $servicesContent->content_json['services']['ai']['button_text'] ?? '🟣 Explore AI Solutions' }}" placeholder="Button text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="aiContent" class="form-label">Description & Features</label>
                                                    <textarea class="form-control ck-editor-inline" id="aiContent" name="ai_content" rows="12">{{ $servicesContent->content_json['services']['ai']['content'] ?? 'What we help you build:\n\n• AI systems that enhance human decision-making\n• Platforms that convert data into actionable insight\n• Solutions that are secure, scalable, and performance-optimized\n• Predictive tools that identify patterns before problems arise' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Mobile Development Tab -->
                                    <div class="tab-pane fade" id="mobile-admin" role="tabpanel">
                                        <div class="row mb-4 p-4 border rounded">
                                            <div class="col-12 mb-3">
                                                <h6 class="text-primary fw-bold">Mobile Development Configuration</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="mobileTitle" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="mobileTitle" name="mobile_title" 
                                                        value="{{ $servicesContent->content_json['services']['mobile']['title'] ?? 'Mobile App Development — Designed for Growth' }}" placeholder="Service title">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="mobileSubtitle" class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" id="mobileSubtitle" name="mobile_subtitle" 
                                                        value="{{ $servicesContent->content_json['services']['mobile']['subtitle'] ?? 'Create high-performance mobile experiences that delight users and scale with your business.' }}" placeholder="Service subtitle">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="mobileImage" class="form-label">Upload Image</label>
                                                    <input type="file" class="form-control" id="mobileImage" name="mobile_image" accept="image/*">
                                                    @if(isset($servicesContent->content_json['services']['mobile']['image']) && $servicesContent->content_json['services']['mobile']['image'])
                                                        <div class="mt-2">
                                                            <img src="{{ asset($servicesContent->content_json['services']['mobile']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 150px;">
                                                            <input type="hidden" name="mobile_image_current" value="{{ $servicesContent->content_json['services']['mobile']['image'] }}">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="mobileImageAlt" class="form-label">Image Alt Text</label>
                                                    <input type="text" class="form-control" id="mobileImageAlt" name="mobile_image_alt" 
                                                        value="{{ $servicesContent->content_json['services']['mobile']['image_alt'] ?? 'Mobile Development' }}" placeholder="Image alt text">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="mobileButtonText" class="form-label">Button Text</label>
                                                    <input type="text" class="form-control" id="mobileButtonText" name="mobile_button_text" 
                                                        value="{{ $servicesContent->content_json['services']['mobile']['button_text'] ?? '🟣 View Mobile Projects' }}" placeholder="Button text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mobileContent" class="form-label">Description & Features</label>
                                                    <textarea class="form-control ck-editor-inline" id="mobileContent" name="mobile_content" rows="12">{{ $servicesContent->content_json['services']['mobile']['content'] ?? "Create high-performance mobile experiences that delight users and scale with your business.\n\n• Custom iOS and Android apps with intuitive UX and native performance\n• Cross-platform solutions using React Native or Flutter\n• Real-time features, API integrations, and offline-ready functionality\n• Scalable backend infrastructure to support millions of users" }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Web Platforms Tab -->
                                    <div class="tab-pane fade" id="web-admin" role="tabpanel">
                                        <div class="row mb-4 p-4 border rounded">
                                            <div class="col-12 mb-3">
                                                <h6 class="text-primary fw-bold">Web Platforms Configuration</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="webTitle" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="webTitle" name="web_title" 
                                                        value="{{ $servicesContent->content_json['services']['web']['title'] ?? 'Modern Web Platforms — Engineered for Performance' }}" placeholder="Service title">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="webSubtitle" class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" id="webSubtitle" name="web_subtitle" 
                                                        value="{{ $servicesContent->content_json['services']['web']['subtitle'] ?? 'We craft custom web applications that don\'t just look great — they drive engagement, streamline workflows, and scale with your business.' }}" placeholder="Service subtitle">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="webImage" class="form-label">Upload Image</label>
                                                    <input type="file" class="form-control" id="webImage" name="web_image" accept="image/*">
                                                    @if(isset($servicesContent->content_json['services']['web']['image']) && $servicesContent->content_json['services']['web']['image'])
                                                        <div class="mt-2">
                                                            <img src="{{ asset($servicesContent->content_json['services']['web']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 150px;">
                                                            <input type="hidden" name="web_image_current" value="{{ $servicesContent->content_json['services']['web']['image'] }}">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="webImageAlt" class="form-label">Image Alt Text</label>
                                                    <input type="text" class="form-control" id="webImageAlt" name="web_image_alt" 
                                                        value="{{ $servicesContent->content_json['services']['web']['image_alt'] ?? 'Web Development' }}" placeholder="Image alt text">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="webButtonText" class="form-label">Button Text</label>
                                                    <input type="text" class="form-control" id="webButtonText" name="web_button_text" 
                                                        value="{{ $servicesContent->content_json['services']['web']['button_text'] ?? '🟣 Explore Web Development' }}" placeholder="Button text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="webContent" class="form-label">Description & Features</label>
                                                    <textarea class="form-control ck-editor-inline" id="webContent" name="web_content" rows="12">{{ $servicesContent->content_json['services']['web']['content'] ?? "We craft custom web applications that don't just look great — they drive engagement, streamline workflows, and scale with your business.\n\n• Responsive, high-performance web platforms tailored to your use case\n• Scalable backend systems powered by clean, modular code\n• Seamless user interfaces that drive conversion and retention\n• Integrations with CRMs, APIs, and third-party platforms" }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- MVP Tab -->
                                    <div class="tab-pane fade" id="mvp-admin" role="tabpanel">
                                        <div class="row mb-4 p-4 border rounded">
                                            <div class="col-12 mb-3">
                                                <h6 class="text-primary fw-bold">MVP Development Configuration</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="mvpTitle" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="mvpTitle" name="mvp_title" 
                                                        value="{{ $servicesContent->content_json['services']['mvp']['title'] ?? 'MVP Development – Go to Market Fast' }}" placeholder="Service title">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="mvpSubtitle" class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" id="mvpSubtitle" name="mvp_subtitle" 
                                                        value="{{ $servicesContent->content_json['services']['mvp']['subtitle'] ?? 'Building your product\'s first version doesn\'t mean compromising on quality — it means focusing on what matters.' }}" placeholder="Service subtitle">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="mvpImage" class="form-label">Upload Image</label>
                                                    <input type="file" class="form-control" id="mvpImage" name="mvp_image" accept="image/*">
                                                    @if(isset($servicesContent->content_json['services']['mvp']['image']) && $servicesContent->content_json['services']['mvp']['image'])
                                                        <div class="mt-2">
                                                            <img src="{{ asset($servicesContent->content_json['services']['mvp']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 150px;">
                                                            <input type="hidden" name="mvp_image_current" value="{{ $servicesContent->content_json['services']['mvp']['image'] }}">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="mvpImageAlt" class="form-label">Image Alt Text</label>
                                                    <input type="text" class="form-control" id="mvpImageAlt" name="mvp_image_alt" 
                                                        value="{{ $servicesContent->content_json['services']['mvp']['image_alt'] ?? 'MVP Development' }}" placeholder="Image alt text">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="mvpButtonText" class="form-label">Button Text</label>
                                                    <input type="text" class="form-control" id="mvpButtonText" name="mvp_button_text" 
                                                        value="{{ $servicesContent->content_json['services']['mvp']['button_text'] ?? '🟣 Start Your MVP Journey' }}" placeholder="Button text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mvpContent" class="form-label">Description & Features</label>
                                                    <textarea class="form-control ck-editor-inline" id="mvpContent" name="mvp_content" rows="12">{{ $servicesContent->content_json['services']['mvp']['content'] ?? "Building your product's first version doesn't mean compromising on quality — it means focusing on what matters.\n\n• A lean, scalable core product — built fast, built right\n• User-focused design that solves real pain points\n• Agile release cycles for testing, feedback, and iteration\n• A future-proof tech stack ready to grow with your vision" }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- UI/UX Design Tab -->
                                    <div class="tab-pane fade" id="design-admin" role="tabpanel">
                                        <div class="row mb-4 p-4 border rounded">
                                            <div class="col-12 mb-3">
                                                <h6 class="text-primary fw-bold">UI/UX Design Configuration</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="designTitle" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="designTitle" name="design_title" 
                                                        value="{{ $servicesContent->content_json['services']['design']['title'] ?? 'UI/UX Design That Feels as Good as It Looks' }}" placeholder="Service title">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="designSubtitle" class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" id="designSubtitle" name="design_subtitle" 
                                                        value="{{ $servicesContent->content_json['services']['design']['subtitle'] ?? 'At Qubify, we design interfaces that do more than function — they connect.' }}" placeholder="Service subtitle">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="designImage" class="form-label">Upload Image</label>
                                                    <input type="file" class="form-control" id="designImage" name="design_image" accept="image/*">
                                                    @if(isset($servicesContent->content_json['services']['design']['image']) && $servicesContent->content_json['services']['design']['image'])
                                                        <div class="mt-2">
                                                            <img src="{{ asset($servicesContent->content_json['services']['design']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 150px;">
                                                            <input type="hidden" name="design_image_current" value="{{ $servicesContent->content_json['services']['design']['image'] }}">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="designImageAlt" class="form-label">Image Alt Text</label>
                                                    <input type="text" class="form-control" id="designImageAlt" name="design_image_alt" 
                                                        value="{{ $servicesContent->content_json['services']['design']['image_alt'] ?? 'UI/UX Design' }}" placeholder="Image alt text">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="designButtonText" class="form-label">Button Text</label>
                                                    <input type="text" class="form-control" id="designButtonText" name="design_button_text" 
                                                        value="{{ $servicesContent->content_json['services']['design']['button_text'] ?? '🟣 Explore Design Services' }}" placeholder="Button text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="designContent" class="form-label">Description & Features</label>
                                                    <textarea class="form-control ck-editor-inline" id="designContent" name="design_content" rows="12">{{ $servicesContent->content_json['services']['design']['content'] ?? "At Qubify, we design interfaces that do more than function — they connect.\n\n• Intuitive user flows that reduce friction and boost retention\n• Responsive design systems for web, mobile, and beyond\n• Research-backed wireframes and interaction prototypes\n• Visual experiences tailored to real user behavior" }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-end mt-4">
                                    <button type="submit" class="save-btn btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save me-2"></i>Save Services Section
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Solutions Section -->
                    <div class="section-content" id="solutions-content">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="section-title">Solutions Section</h4>
                            </div>
                        </div>
                        
                        <div class="form-container">
                            <form id="solutionsForm">
                                
                                <!-- Section Header -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-heading me-2"></i>Section Header</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="solutionsTitle" class="form-label">Section Title</label>
                                            <input type="text" class="form-control form-control-lg" id="solutionsTitle" name="solutions_title" 
                                                value="{{ $solutionsContent->content_json['title'] ?? 'Ready-to-Use Tech Solutions' }}" placeholder="Section title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="solutionsSubtitle" class="form-label">Section Subtitle</label>
                                            <input type="text" class="form-control" id="solutionsSubtitle" name="solutions_subtitle" 
                                                value="{{ $solutionsContent->content_json['subtitle'] ?? 'Pre-built Platforms. Custom Results. Zero Code Hassle.' }}" placeholder="Section subtitle">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="solutionsDescription" class="form-label">Section Description</label>
                                            <textarea class="form-control" id="solutionsDescription" name="solutions_description" rows="3">{{ $solutionsContent->content_json['description'] ?? 'Qubify delivers business-ready digital architectures that reduce dev time, eliminate unnecessary complexity, and let you launch faster than ever — no deep tech team required.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Solution Cards -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-puzzle-piece me-2"></i>Solution Cards</h5>
                                    </div>
                                </div>

                                <!-- Solution Card 1 -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Solution Card 1</h6>
                                    </div>
                                  {{-- <!-- <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="solution1Icon" class="form-label">Icon (Emoji)</label>
                                            <input type="text" class="form-control" id="solution1Icon" name="solution1_icon" 
                                                value="{{ $solutionsContent->content_json['solutions'][0]['icon'] ?? '🔋' }}" placeholder="🔋">
                                            <small class="text-muted">Use emoji or icon class</small>
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-5">
                                        <div class="form-group mb-3">
                                            <label for="solution1Title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="solution1Title" name="solution1_title" 
                                                value="{{ $solutionsContent->content_json['solutions'][0]['title'] ?? '70% Ready Code Architecture' }}" placeholder="Solution title">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group mb-3">
                                            <label for="solution1Description" class="form-label">Description</label>
                                            <textarea class="form-control" id="solution1Description" name="solution1_description" rows="3">{{ $solutionsContent->content_json['solutions'][0]['description'] ?? 'Start with a strong, scalable foundation already wired with essential features and workflows.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Solution Card 2 -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Solution Card 2</h6>
                                    </div>
                                  {{--  <!-- <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="solution2Icon" class="form-label">Icon (Emoji)</label>
                                            <input type="text" class="form-control" id="solution2Icon" name="solution2_icon" 
                                                value="{{ $solutionsContent->content_json['solutions'][1]['icon'] ?? '🧩' }}" placeholder="🧩">
                                            <small class="text-muted">Use emoji or icon class</small>
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-5">
                                        <div class="form-group mb-3">
                                            <label for="solution2Title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="solution2Title" name="solution2_title" 
                                                value="{{ $solutionsContent->content_json['solutions'][1]['title'] ?? 'Customized for Your Business' }}" placeholder="Solution title">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group mb-3">
                                            <label for="solution2Description" class="form-label">Description</label>
                                            <textarea class="form-control" id="solution2Description" name="solution2_description" rows="3">{{ $solutionsContent->content_json['solutions'][1]['description'] ?? 'We tailor every solution to fit your brand, logic, and unique market positioning.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Solution Card 3 -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Solution Card 3</h6>
                                    </div>
                                  {{--  <!-- <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label for="solution3Icon" class="form-label">Icon (Emoji)</label>
                                            <input type="text" class="form-control" id="solution3Icon" name="solution3_icon" 
                                                value="{{ $solutionsContent->content_json['solutions'][2]['icon'] ?? '⚡' }}" placeholder="⚡">
                                            <small class="text-muted">Use emoji or icon class</small>
                                        </div>
                                    </div> -->--}}
                                    <div class="col-md-5">
                                        <div class="form-group mb-3">
                                            <label for="solution3Title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="solution3Title" name="solution3_title" 
                                                value="{{ $solutionsContent->content_json['solutions'][2]['title'] ?? 'Launch MVP in 2-3 Days' }}" placeholder="Solution title">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group mb-3">
                                            <label for="solution3Description" class="form-label">Description</label>
                                            <textarea class="form-control" id="solution3Description" name="solution3_description" rows="3">{{ $solutionsContent->content_json['solutions'][2]['description'] ?? 'Go live with a fully functional MVP in as little as 48 hours — faster than any traditional dev cycle.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-end mt-4">
                                    <button type="submit" class="save-btn btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save me-2"></i>Save Solutions Section
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Portfolio Section -->
                    <div class="section-content" id="portfolio-content">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="section-title">Portfolio Section</h4>
                            </div>
                        </div>
                        
                        <div class="form-container">
                            <form id="portfolioForm">
                                
                                <!-- Section Header -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-heading me-2"></i>Section Header</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="portfolioTitle" class="form-label">Section Title</label>
                                            <input type="text" class="form-control form-control-lg" id="portfolioTitle" name="portfolio_title" 
                                                value="{{ $portfolioContent->content_json['title'] ?? 'Our Innovations in Action' }}" placeholder="Section title">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="portfolioSubtitle" class="form-label">Section Subtitle</label>
                                            <input type="text" class="form-control" id="portfolioSubtitle" name="portfolio_subtitle" 
                                                value="{{ $portfolioContent->content_json['subtitle'] ?? 'Built by Qubify. Powering the Real World.' }}" placeholder="Section subtitle">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="portfolioDescription" class="form-label">Section Description</label>
                                            <textarea class="form-control" id="portfolioDescription" name="portfolio_description" rows="3">{{ $portfolioContent->content_json['description'] ?? 'From smart cities to retail floors, our in-house platforms are transforming how industries operate, scale, and innovate. These aren\'t just solutions — they\'re living proof of what we do best.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Portfolio Systems -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-layer-group me-2"></i>Portfolio Systems</h5>
                                        <div class="nav nav-tabs" id="portfolioSystemTabs" role="tablist">
                                            <button class="nav-link active" id="hrms-tab" data-bs-toggle="tab" data-bs-target="#hrms-admin" type="button" role="tab">HRMS</button>
                                            <button class="nav-link" id="crm-tab" data-bs-toggle="tab" data-bs-target="#crm-admin" type="button" role="tab">CRM</button>
                                            <button class="nav-link" id="vms-tab" data-bs-toggle="tab" data-bs-target="#vms-admin" type="button" role="tab">VMS</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content" id="portfolioSystemTabsContent">
                                    <!-- HRMS System -->
                                    <div class="tab-pane fade show active" id="hrms-admin" role="tabpanel">
                                        <div class="row mb-4 p-4 border rounded">
                                            <div class="col-12 mb-3">
                                                <h6 class="text-primary fw-bold">HRMS - Human Resource Management System</h6>
                                            </div>
                                            
                                            <!-- HRMS Basic Info -->
                                            <div class="col-md-6 mb-4">
                                               {{-- <!-- <div class="form-group mb-3">
                                                    <label for="hrmsIcon" class="form-label">Icon Class</label>
                                                    <input type="text" class="form-control" id="hrmsIcon" name="hrms_icon" 
                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['icon'] ?? 'fas fa-users' }}" placeholder="fas fa-users">
                                                </div> --> --}}
                                                <div class="form-group mb-3">
                                                    <label for="hrmsTitle" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="hrmsTitle" name="hrms_title" 
                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['title'] ?? 'HRMS' }}" placeholder="HRMS">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="hrmsSubtitle" class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" id="hrmsSubtitle" name="hrms_subtitle" 
                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['subtitle'] ?? 'Human Resource Management System' }}" placeholder="System subtitle">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="hrmsOverview" class="form-label">System Overview</label>
                                                    <textarea class="form-control ck-editor-inline" id="hrmsOverview" name="hrms_overview" rows="6">{{ $portfolioContent->content_json['systems']['hrms']['overview'] ?? 'Transform your HR operations with our comprehensive HRMS solution. Streamline recruitment, payroll processing, attendance tracking, and performance management with intelligent automation, advanced analytics, and seamless integration capabilities that scale with your organization\'s growth.' }}</textarea>
                                                </div>
                                            </div>

                                            <!-- HRMS Features Sub-tabs -->
                                            <div class="col-12">
                                                <h6 class="text-secondary mb-3">HRMS Features</h6>
                                                <div class="nav nav-pills mb-3" id="hrmsFeatureTabs" role="tablist">
                                                    <button class="nav-link active" id="employee-mgmt-tab" data-bs-toggle="pill" data-bs-target="#employee-mgmt-admin" type="button" role="tab">Employee Management</button>
                                                    <button class="nav-link" id="payroll-tab" data-bs-toggle="pill" data-bs-target="#payroll-admin" type="button" role="tab">Payroll Processing</button>
                                                    <button class="nav-link" id="attendance-tab" data-bs-toggle="pill" data-bs-target="#attendance-admin" type="button" role="tab">Attendance Tracking</button>
                                                    <button class="nav-link" id="performance-tab" data-bs-toggle="pill" data-bs-target="#performance-admin" type="button" role="tab">Performance Analytics</button>
                                                </div>

                                                <div class="tab-content" id="hrmsFeatureContent">
                                                    <!-- Employee Management Feature -->
                                                    <div class="tab-pane fade show active" id="employee-mgmt-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="hrms_employee_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['features']['employee']['title'] ?? 'Employee Management' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image Alt</label>
                                                                    <input type="text" class="form-control" name="hrms_employee_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['features']['employee']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="hrms_employee_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['hrms']['features']['employee']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['hrms']['features']['employee']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="hrms_employee_image_current" value="{{ $portfolioContent->content_json['systems']['hrms']['features']['employee']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="hrms_employee_description" rows="6">{{ $portfolioContent->content_json['systems']['hrms']['features']['employee']['description'] ?? 'Complete employee lifecycle management from onboarding to offboarding. Manage personal profiles, organizational hierarchy, role assignments, and career progression. Features include automated workflows, document management, skill tracking, and comprehensive employee databases with advanced search and filtering capabilities.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Payroll Processing Feature -->
                                                    <div class="tab-pane fade" id="payroll-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="hrms_payroll_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['features']['payroll']['title'] ?? 'Payroll Processing' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image Alt</label>
                                                                    <input type="text" class="form-control" name="hrms_payroll_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['features']['payroll']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="hrms_payroll_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['hrms']['features']['payroll']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['hrms']['features']['payroll']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="hrms_payroll_image_current" value="{{ $portfolioContent->content_json['systems']['hrms']['features']['payroll']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="hrms_payroll_description" rows="6">{{ $portfolioContent->content_json['systems']['hrms']['features']['payroll']['description'] ?? 'Automated payroll system with tax calculations, statutory compliance, and multi-currency support. Process salaries, bonuses, deductions, and benefits with complete accuracy. Generate detailed payslips, handle complex salary structures, and maintain comprehensive audit trails for financial compliance.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Attendance Tracking Feature -->
                                                    <div class="tab-pane fade" id="attendance-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="hrms_attendance_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['features']['attendance']['title'] ?? 'Attendance Tracking' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image Alt</label>
                                                                    <input type="text" class="form-control" name="hrms_attendance_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['features']['attendance']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="hrms_attendance_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['hrms']['features']['attendance']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['hrms']['features']['attendance']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="hrms_attendance_image_current" value="{{ $portfolioContent->content_json['systems']['hrms']['features']['attendance']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="hrms_attendance_description" rows="6">{{ $portfolioContent->content_json['systems']['hrms']['features']['attendance']['description'] ?? 'Real-time attendance monitoring with biometric integration, GPS tracking, and mobile check-ins. Manage shifts, leaves, overtime calculations, and generate detailed reports. Features include automated notifications, flexible work arrangements, and comprehensive time analytics for workforce optimization.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Performance Analytics Feature -->
                                                    <div class="tab-pane fade" id="performance-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="hrms_performance_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['features']['performance']['title'] ?? 'Performance Analytics' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="hrms_performance_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['hrms']['features']['performance']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="hrms_performance_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['hrms']['features']['performance']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['hrms']['features']['performance']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="hrms_performance_image_current" value="{{ $portfolioContent->content_json['systems']['hrms']['features']['performance']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="hrms_performance_description" rows="6">{{ $portfolioContent->content_json['systems']['hrms']['features']['performance']['description'] ?? 'Advanced performance management with goal setting, regular reviews, and 360-degree feedback. Track KPIs, generate performance reports, and identify top performers. Includes predictive analytics, skill gap analysis, and personalized development recommendations for enhanced workforce productivity.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            

                                    <!-- CRM System -->
                                    <div class="tab-pane fade" id="crm-admin" role="tabpanel">
                                        <div class="row mb-4 p-4 border rounded">
                                            <div class="col-12 mb-3">
                                                <h6 class="text-primary fw-bold">CRM - Customer Relationship Management</h6>
                                            </div>
                                            
                                            <!-- CRM Basic Info -->
                                            <div class="col-md-6 mb-4">
                                               {{-- <!-- <div class="form-group mb-3">
                                                    <label for="crmIcon" class="form-label">Icon Class</label>
                                                    <input type="text" class="form-control" id="crmIcon" name="crm_icon" 
                                                        value="{{ $portfolioContent->content_json['systems']['crm']['icon'] ?? 'fas fa-handshake' }}" placeholder="fas fa-handshake">
                                                </div> --> --}}
                                                <div class="form-group mb-3">
                                                    <label for="crmTitle" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="crmTitle" name="crm_title" 
                                                        value="{{ $portfolioContent->content_json['systems']['crm']['title'] ?? 'CRM' }}" placeholder="CRM">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="crmSubtitle" class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" id="crmSubtitle" name="crm_subtitle" 
                                                        value="{{ $portfolioContent->content_json['systems']['crm']['subtitle'] ?? 'Customer Relationship Management' }}" placeholder="System subtitle">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="crmOverview" class="form-label">System Overview</label>
                                                    <textarea class="form-control ck-editor-inline" id="crmOverview" name="crm_overview" rows="6">{{ $portfolioContent->content_json['systems']['crm']['overview'] ?? 'Revolutionize your customer interactions with our intelligent CRM platform. Manage leads, track sales pipelines, automate marketing campaigns, and deliver exceptional customer service with powerful analytics, AI-driven insights, and seamless integration across all customer touchpoints.' }}</textarea>
                                                </div>
                                            </div>

                                            <!-- CRM Features Sub-tabs -->
                                            <div class="col-12">
                                                <h6 class="text-secondary mb-3">CRM Features</h6>
                                                <div class="nav nav-pills mb-3" id="crmFeatureTabs" role="tablist">
                                                    <button class="nav-link active" id="lead-mgmt-tab" data-bs-toggle="pill" data-bs-target="#lead-mgmt-admin" type="button" role="tab">Lead Management</button>
                                                    <button class="nav-link" id="sales-pipeline-tab" data-bs-toggle="pill" data-bs-target="#sales-pipeline-admin" type="button" role="tab">Sales Pipeline</button>
                                                    <button class="nav-link" id="customer-service-tab" data-bs-toggle="pill" data-bs-target="#customer-service-admin" type="button" role="tab">Customer Service</button>
                                                    <button class="nav-link" id="marketing-automation-tab" data-bs-toggle="pill" data-bs-target="#marketing-automation-admin" type="button" role="tab">Marketing Automation</button>
                                                </div>

                                                <div class="tab-content" id="crmFeatureContent">
                                                    <!-- Lead Management Feature -->
                                                    <div class="tab-pane fade show active" id="lead-mgmt-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="crm_lead_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['crm']['features']['lead']['title'] ?? 'Lead Management' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image Alt</label>
                                                                    <input type="text" class="form-control" name="crm_lead_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['crm']['features']['lead']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="crm_lead_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['crm']['features']['lead']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['crm']['features']['lead']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="crm_lead_image_current" value="{{ $portfolioContent->content_json['systems']['crm']['features']['lead']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="crm_lead_description" rows="6">{{ $portfolioContent->content_json['systems']['crm']['features']['lead']['description'] ?? 'Capture, qualify, and nurture leads through intelligent lead scoring and automated workflows. Track lead sources, manage contact information, and convert prospects into customers with personalized engagement strategies. Features include lead assignment, follow-up reminders, and comprehensive lead analytics.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Sales Pipeline Feature -->
                                                    <div class="tab-pane fade" id="sales-pipeline-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="crm_sales_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['crm']['features']['sales']['title'] ?? 'Sales Pipeline' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image alt</label>
                                                                    <input type="text" class="form-control" name="crm_sales_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['crm']['features']['sales']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="crm_sales_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['crm']['features']['sales']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['crm']['features']['sales']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="crm_sales_image_current" value="{{ $portfolioContent->content_json['systems']['crm']['features']['sales']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="crm_sales_description" rows="6">{{ $portfolioContent->content_json['systems']['crm']['features']['sales']['description'] ?? 'Visualize and manage your entire sales process with customizable pipeline stages. Track deals, forecast revenue, and identify bottlenecks with real-time analytics. Includes opportunity management, sales forecasting, and automated follow-ups to maximize conversion rates and accelerate deal closure.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Customer Service Feature -->
                                                    <div class="tab-pane fade" id="customer-service-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="crm_service_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['crm']['features']['service']['title'] ?? 'Customer Service' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image Alt</label>
                                                                    <input type="text" class="form-control" name="crm_service_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['crm']['features']['service']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="crm_service_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['crm']['features']['service']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['crm']['features']['service']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="crm_service_image_current" value="{{ $portfolioContent->content_json['systems']['crm']['features']['service']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="crm_service_description" rows="6">{{ $portfolioContent->content_json['systems']['crm']['features']['service']['description'] ?? 'Deliver exceptional customer support with integrated ticketing, knowledge base, and multi-channel communication. Manage customer inquiries, track resolution times, and maintain service quality with automated workflows, escalation rules, and comprehensive customer interaction history.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Marketing Automation Feature -->
                                                    <div class="tab-pane fade" id="marketing-automation-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="crm_marketing_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['crm']['features']['marketing']['title'] ?? 'Marketing Automation' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image Alt</label>
                                                                    <input type="text" class="form-control" name="crm_marketing_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['crm']['features']['marketing']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="crm_marketing_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['crm']['features']['marketing']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['crm']['features']['marketing']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="crm_marketing_image_current" value="{{ $portfolioContent->content_json['systems']['crm']['features']['marketing']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="crm_marketing_description" rows="6">{{ $portfolioContent->content_json['systems']['crm']['features']['marketing']['description'] ?? 'Create sophisticated marketing campaigns with email automation, social media integration, and personalized content delivery. Track campaign performance, segment audiences, and nurture leads with targeted messaging. Includes A/B testing, behavioral triggers, and comprehensive marketing analytics.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- VMS System -->
                                    <div class="tab-pane fade" id="vms-admin" role="tabpanel">
                                        <div class="row mb-4 p-4 border rounded">
                                            <div class="col-12 mb-3">
                                                <h6 class="text-primary fw-bold">VMS - Visitor Management System</h6>
                                            </div>
                                            
                                            <!-- VMS Basic Info -->
                                            <div class="col-md-6 mb-4">
                                               {{-- <!-- <div class="form-group mb-3">
                                                    <label for="vmsIcon" class="form-label">Icon Class</label>
                                                    <input type="text" class="form-control" id="vmsIcon" name="vms_icon" 
                                                        value="{{ $portfolioContent->content_json['systems']['vms']['icon'] ?? 'fas fa-id-card' }}" placeholder="fas fa-id-card">
                                                </div> --> --}}
                                                <div class="form-group mb-3">
                                                    <label for="vmsTitle" class="form-label">Title</label>
                                                    <input type="text" class="form-control" id="vmsTitle" name="vms_title" 
                                                        value="{{ $portfolioContent->content_json['systems']['vms']['title'] ?? 'VMS' }}" placeholder="VMS">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="vmsSubtitle" class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" id="vmsSubtitle" name="vms_subtitle" 
                                                        value="{{ $portfolioContent->content_json['systems']['vms']['subtitle'] ?? 'Visitor Management System' }}" placeholder="System subtitle">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group">
                                                    <label for="vmsOverview" class="form-label">System Overview</label>
                                                    <textarea class="form-control ck-editor-inline" id="vmsOverview" name="vms_overview" rows="6">{{ $portfolioContent->content_json['systems']['vms']['overview'] ?? 'Enhance security and streamline visitor experiences with our advanced VMS platform. Manage visitor registration, access control, and compliance tracking with contactless check-ins, real-time notifications, and comprehensive visitor analytics for complete facility management.' }}</textarea>
                                                </div>
                                            </div>

                                            <!-- VMS Features Sub-tabs -->
                                            <div class="col-12">
                                                <h6 class="text-secondary mb-3">VMS Features</h6>
                                                <div class="nav nav-pills mb-3" id="vmsFeatureTabs" role="tablist">
                                                    <button class="nav-link active" id="visitor-registration-tab" data-bs-toggle="pill" data-bs-target="#visitor-registration-admin" type="button" role="tab">Visitor Registration</button>
                                                    <button class="nav-link" id="access-control-tab" data-bs-toggle="pill" data-bs-target="#access-control-admin" type="button" role="tab">Access Control</button>
                                                    <button class="nav-link" id="digital-checkin-tab" data-bs-toggle="pill" data-bs-target="#digital-checkin-admin" type="button" role="tab">Digital Check-in</button>
                                                    <button class="nav-link" id="security-monitoring-tab" data-bs-toggle="pill" data-bs-target="#security-monitoring-admin" type="button" role="tab">Security Monitoring</button>
                                                </div>

                                                <div class="tab-content" id="vmsFeatureContent">
                                                    <!-- Visitor Registration Feature -->
                                                    <div class="tab-pane fade show active" id="visitor-registration-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="vms_registration_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['vms']['features']['registration']['title'] ?? 'Visitor Registration' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image Alt</label>
                                                                    <input type="text" class="form-control" name="vms_registration_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['vms']['features']['registration']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="vms_registration_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['vms']['features']['registration']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['vms']['features']['registration']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="vms_registration_image_current" value="{{ $portfolioContent->content_json['systems']['vms']['features']['registration']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="vms_registration_description" rows="6">{{ $portfolioContent->content_json['systems']['vms']['features']['registration']['description'] ?? 'Streamline visitor registration with digital forms, pre-registration capabilities, and automated host notifications. Capture visitor information, purpose of visit, and generate digital badges instantly. Features include photo capture, document verification, and visitor history tracking for enhanced security.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Access Control Feature -->
                                                    <div class="tab-pane fade" id="access-control-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="vms_access_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['vms']['features']['access']['title'] ?? 'Access Control' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image Alt</label>
                                                                    <input type="text" class="form-control" name="vms_access_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['vms']['features']['access']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="vms_access_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['vms']['features']['access']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['vms']['features']['access']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="vms_access_image_current" value="{{ $portfolioContent->content_json['systems']['vms']['features']['access']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="vms_access_description" rows="6">{{ $portfolioContent->content_json['systems']['vms']['features']['access']['description'] ?? 'Implement sophisticated access control with zone-based permissions, time-restricted access, and real-time monitoring. Integrate with existing security systems, manage visitor credentials, and track movement throughout facilities with automated alerts for unauthorized access attempts.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Digital Check-in Feature -->
                                                    <div class="tab-pane fade" id="digital-checkin-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="vms_checkin_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['vms']['features']['checkin']['title'] ?? 'Digital Check-in' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image Title</label>
                                                                    <input type="text" class="form-control" name="vms_checkin_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['vms']['features']['checkin']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="vms_checkin_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['vms']['features']['checkin']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['vms']['features']['checkin']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="vms_checkin_image_current" value="{{ $portfolioContent->content_json['systems']['vms']['features']['checkin']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="vms_checkin_description" rows="6">{{ $portfolioContent->content_json['systems']['vms']['features']['checkin']['description'] ?? 'Enable contactless visitor experiences with QR code check-ins, mobile app integration, and self-service kiosks. Automate badge printing, host notifications, and visitor tracking with touchless technology that ensures health compliance and enhances visitor satisfaction.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Security Monitoring Feature -->
                                                    <div class="tab-pane fade" id="security-monitoring-admin" role="tabpanel">
                                                        <div class="row p-3 bg-light rounded">
                                                            <div class="col-md-4">
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Title</label>
                                                                    <input type="text" class="form-control" name="vms_security_title" 
                                                                        value="{{ $portfolioContent->content_json['systems']['vms']['features']['security']['title'] ?? 'Security Monitoring' }}">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label class="form-label">Feature Image Alt</label>
                                                                    <input type="text" class="form-control" name="vms_security_image_alt" 
                                                                        value="{{ $portfolioContent->content_json['systems']['vms']['features']['security']['image_alt'] ?? '' }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Image</label>
                                                                    <input type="file" class="form-control" name="vms_security_image" accept="image/*">
                                                                    @if(isset($portfolioContent->content_json['systems']['vms']['features']['security']['image']))
                                                                        <div class="mt-2">
                                                                            <img src="{{ asset($portfolioContent->content_json['systems']['vms']['features']['security']['image']) }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                                                                            <input type="hidden" name="vms_security_image_current" value="{{ $portfolioContent->content_json['systems']['vms']['features']['security']['image'] }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="form-label">Feature Description</label>
                                                                    <textarea class="form-control ck-editor-inline" name="vms_security_description" rows="6">{{ $portfolioContent->content_json['systems']['vms']['features']['security']['description'] ?? 'Comprehensive security oversight with real-time visitor tracking, automated alerts, and incident management. Monitor facility access, generate security reports, and maintain compliance with visitor logs, evacuation lists, and emergency response protocols for complete facility security.' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End tab-content -->

                                <!-- Save Button -->
                                <div class="text-end mt-4">
                                    <button type="submit" class="save-btn btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save me-2"></i>Save Portfolio Section
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Testimonials Section -->
                    <div class="section-content" id="testimonials-content">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="section-title">Testimonials Section</h4>
                            </div>
                        </div>
                        
                        <div class="form-container">
                            <form id="testimonialsForm">
                                
                                <!-- Section Header -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-heading me-2"></i>Section Header</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="testimonialsTitle" class="form-label">Section Title</label>
                                            <input type="text" class="form-control form-control-lg" id="testimonialsTitle" name="testimonials_title" 
                                                value="{{ (isset($testimonialsContent) && $testimonialsContent) ? ($testimonialsContent->content_json['title'] ?? 'Trusted by Global Teams That Lead Their Industries') : 'Trusted by Global Teams That Lead Their Industries' }}" placeholder="Section title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="testimonialsSubtitle" class="form-label">Section Subtitle</label>
                                            <input type="text" class="form-control" id="testimonialsSubtitle" name="testimonials_subtitle" 
                                                value="{{ $testimonialsContent->content_json['subtitle'] ?? 'We Don\'t Just Deliver Projects — We Become Part of the Mission.' }}" placeholder="Section subtitle">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="testimonialsDescription" class="form-label">Section Description</label>
                                            <textarea class="form-control" id="testimonialsDescription" name="testimonials_description" rows="3">{{ $testimonialsContent->content_json['description'] ?? 'Our clients see us as an extension of their own team — not just a vendor. Here\'s what partnership feels like when you build with Qubify: 💬' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonials -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-quote-left me-2"></i>Client Testimonials</h5>
                                    </div>
                                </div>

                                <!-- Testimonial 1 -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Testimonial 1</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="testimonial1Quote" class="form-label">Quote/Testimonial</label>
                                            <textarea class="form-control" id="testimonial1Quote" name="testimonial1_quote" rows="4">{{ $testimonialsContent->content_json['testimonials'][0]['quote'] ?? 'We could not have asked for a better partner than the Qubify Technologies team. We truly feel like they are part of the LokaTrain team and family instead of seeing them as a service provider.' }}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="testimonial1Name" class="form-label">Client Name</label>
                                                    <input type="text" class="form-control" id="testimonial1Name" name="testimonial1_name" 
                                                        value="{{ $testimonialsContent->content_json['testimonials'][0]['name'] ?? 'LokaTrain Team' }}" placeholder="Client name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="testimonial1Company" class="form-label">Company/Position</label>
                                                    <input type="text" class="form-control" id="testimonial1Company" name="testimonial1_company" 
                                                        value="{{ $testimonialsContent->content_json['testimonials'][0]['company'] ?? 'Training Platform' }}" placeholder="Company or position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial 2 -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Testimonial 2</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="testimonial2Quote" class="form-label">Quote/Testimonial</label>
                                            <textarea class="form-control" id="testimonial2Quote" name="testimonial2_quote" rows="4">{{ $testimonialsContent->content_json['testimonials'][1]['quote'] ?? 'What stood out with Qubify wasn\'t just the technology — it was the way they thought like co-founders. They challenged our roadmap, filled in the gaps, and helped us build something better than we imagined.' }}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="testimonial2Name" class="form-label">Client Name</label>
                                                    <input type="text" class="form-control" id="testimonial2Name" name="testimonial2_name" 
                                                        value="{{ $testimonialsContent->content_json['testimonials'][1]['name'] ?? 'Co-Founder, SwiftCart' }}" placeholder="Client name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="testimonial2Company" class="form-label">Company/Position</label>
                                                    <input type="text" class="form-control" id="testimonial2Company" name="testimonial2_company" 
                                                        value="{{ $testimonialsContent->content_json['testimonials'][1]['company'] ?? 'Hyperlocal Delivery Platform' }}" placeholder="Company or position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Testimonial 3 -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Testimonial 3</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="testimonial3Quote" class="form-label">Quote/Testimonial</label>
                                            <textarea class="form-control" id="testimonial3Quote" name="testimonial3_quote" rows="4">{{ $testimonialsContent->content_json['testimonials'][2]['quote'] ?? 'Qubify delivered a fully operational system in record time — no back-and-forth, no bloat, just clean execution. The team\'s ability to adapt on the fly was critical to meeting our launch window.' }}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="testimonial3Name" class="form-label">Client Name</label>
                                                    <input type="text" class="form-control" id="testimonial3Name" name="testimonial3_name" 
                                                        value="{{ $testimonialsContent->content_json['testimonials'][2]['name'] ?? 'Head of Operations, Transline Fleet' }}" placeholder="Client name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="testimonial3Company" class="form-label">Company/Position</label>
                                                    <input type="text" class="form-control" id="testimonial3Company" name="testimonial3_company" 
                                                        value="{{ $testimonialsContent->content_json['testimonials'][2]['company'] ?? 'Vehicle Tracking & Logistics' }}" placeholder="Company or position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="text-end mt-4">
                                    <button type="submit" class="save-btn btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save me-2"></i>Save Testimonials Section
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
  

                    <!-- Call to Action Section -->
                    <div class="section-content" id="cta-content">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="section-title">Call to Action Section</h4>
                            </div>
                        </div>
                        
                        <div class="form-container">
                            <form id="ctaForm">
                                
                                <!-- Section Header -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-heading me-2"></i>Section Header</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ctaTitle" class="form-label">Main Title</label>
                                            <input type="text" class="form-control form-control-lg" id="ctaTitle" name="cta_title" 
                                                value="{{ $ctaContent->content_json['title'] ?? 'Let\'s Build What\'s Next — Together' }}" placeholder="Main title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ctaSubtitle" class="form-label">Subtitle</label>
                                            <input type="text" class="form-control" id="ctaSubtitle" name="cta_subtitle" 
                                                value="{{ $ctaContent->content_json['subtitle'] ?? 'Ready to Elevate Your Business with AI-Powered Precision?' }}" placeholder="Subtitle">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ctaDescription" class="form-label">Main Description</label>
                                            <textarea class="form-control" id="ctaDescription" name="cta_description" rows="3">{{ $ctaContent->content_json['description'] ?? 'At Qubify, we don\'t just develop software – we build intelligent systems that learn, adapt, and scale with your business. Let us transform your vision into reality with cutting-edge AI solutions that deliver measurable results.' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ctaSubDescription" class="form-label">Sub Description</label>
                                            <textarea class="form-control" id="ctaSubDescription" name="cta_sub_description" rows="3">{{ $ctaContent->content_json['sub_description'] ?? 'Get a free consultation today and see how we can accelerate your success with next-generation technology.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- CTA Features -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-star me-2"></i>CTA Features</h5>
                                    </div>
                                </div>

                                <!-- Feature 1 -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Feature 1</h6>
                                    </div>
                                  {{--  <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="feature1Icon" class="form-label">Icon Class</label>
                                            <input type="text" class="form-control" id="feature1Icon" name="feature1_icon" 
                                                value="{{ $ctaContent->content_json['features'][0]['icon'] ?? 'fas fa-comments' }}" placeholder="fas fa-comments">
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="feature1Title" class="form-label">Feature Title</label>
                                            <input type="text" class="form-control" id="feature1Title" name="feature1_title" 
                                                value="{{ $ctaContent->content_json['features'][0]['title'] ?? 'Free Consultation' }}" placeholder="Feature title">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="feature1Description" class="form-label">Feature Description</label>
                                            <textarea class="form-control" id="feature1Description" name="feature1_description" rows="2">{{ $ctaContent->content_json['features'][0]['description'] ?? 'Get expert advice tailored to your specific needs and challenges.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Feature 2 -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Feature 2</h6>
                                    </div>
                                   {{-- <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="feature2Icon" class="form-label">Icon Class</label>
                                            <input type="text" class="form-control" id="feature2Icon" name="feature2_icon" 
                                                value="{{ $ctaContent->content_json['features'][1]['icon'] ?? 'fas fa-code' }}" placeholder="fas fa-code">
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="feature2Title" class="form-label">Feature Title</label>
                                            <input type="text" class="form-control" id="feature2Title" name="feature2_title" 
                                                value="{{ $ctaContent->content_json['features'][1]['title'] ?? 'Rapid Development' }}" placeholder="Feature title">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="feature2Description" class="form-label">Feature Description</label>
                                            <textarea class="form-control" id="feature2Description" name="feature2_description" rows="2">{{ $ctaContent->content_json['features'][1]['description'] ?? 'Launch your MVP in weeks, not months, with our proven methodologies.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Feature 3 -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Feature 3</h6>
                                    </div>
                                 {{--   <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="feature3Icon" class="form-label">Icon Class</label>
                                            <input type="text" class="form-control" id="feature3Icon" name="feature3_icon" 
                                                value="{{ $ctaContent->content_json['features'][2]['icon'] ?? 'fas fa-shield-alt' }}" placeholder="fas fa-shield-alt">
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="feature3Title" class="form-label">Feature Title</label>
                                            <input type="text" class="form-control" id="feature3Title" name="feature3_title" 
                                                value="{{ $ctaContent->content_json['features'][2]['title'] ?? 'Enterprise Security' }}" placeholder="Feature title">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="feature3Description" class="form-label">Feature Description</label>
                                            <textarea class="form-control" id="feature3Description" name="feature3_description" rows="2">{{ $ctaContent->content_json['features'][2]['description'] ?? 'Bank-grade security and compliance built into every solution.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Feature 4 -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Feature 4</h6>
                                    </div>
                                 {{--   <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="feature4Icon" class="form-label">Icon Class</label>
                                            <input type="text" class="form-control" id="feature4Icon" name="feature4_icon" 
                                                value="{{ $ctaContent->content_json['features'][3]['icon'] ?? 'fas fa-headset' }}" placeholder="fas fa-headset">
                                        </div>
                                    </div> -->  --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="feature4Title" class="form-label">Feature Title</label>
                                            <input type="text" class="form-control" id="feature4Title" name="feature4_title" 
                                                value="{{ $ctaContent->content_json['features'][3]['title'] ?? 'Ongoing Support' }}" placeholder="Feature title">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="feature4Description" class="form-label">Feature Description</label>
                                            <textarea class="form-control" id="feature4Description" name="feature4_description" rows="2">{{ $ctaContent->content_json['features'][3]['description'] ?? '24/7 support and maintenance to keep your systems running smoothly.' }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- CTA Buttons -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-mouse-pointer me-2"></i>Call to Action Buttons</h5>
                                    </div>
                                </div>

                                <!-- Primary Button -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Primary Button</h6>
                                    </div>
                                {{--    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="primaryBtnIcon" class="form-label">Button Icon</label>
                                            <input type="text" class="form-control" id="primaryBtnIcon" name="primary_btn_icon" 
                                                value="{{ $ctaContent->content_json['buttons']['primary']['icon'] ?? 'fas fa-calendar' }}" placeholder="fas fa-calendar">
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="primaryBtnText" class="form-label">Button Text</label>
                                            <input type="text" class="form-control" id="primaryBtnText" name="primary_btn_text" 
                                                value="{{ $ctaContent->content_json['buttons']['primary']['text'] ?? 'Book Free Consultation' }}" placeholder="Button text">
                                        </div>
                                    </div>
                                   {{-- <!-- <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="primaryBtnLink" class="form-label">Button Link/Action</label>
                                            <input type="text" class="form-control" id="primaryBtnLink" name="primary_btn_link" 
                                                value="{{ $ctaContent->content_json['buttons']['primary']['link'] ?? 'javascript:void(0)' }}" placeholder="Button link or action">
                                        </div>
                                    </div> --> --}}
                                </div>

                                <!-- Secondary Button -->
                                <div class="row mb-4 p-4 border rounded">
                                    <div class="col-12 mb-3">
                                        <h6 class="text-primary fw-bold">Secondary Button</h6>
                                    </div>
                                  {{--  <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="secondaryBtnIcon" class="form-label">Button Icon</label>
                                            <input type="text" class="form-control" id="secondaryBtnIcon" name="secondary_btn_icon" 
                                                value="{{ $ctaContent->content_json['buttons']['secondary']['icon'] ?? 'fas fa-eye' }}" placeholder="fas fa-eye">
                                        </div>
                                    </div> --> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="secondaryBtnText" class="form-label">Button Text</label>
                                            <input type="text" class="form-control" id="secondaryBtnText" name="secondary_btn_text" 
                                                value="{{ $ctaContent->content_json['buttons']['secondary']['text'] ?? 'View Our Solutions' }}" placeholder="Button text">
                                        </div>
                                    </div>
                                 {{--   <!-- <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="secondaryBtnLink" class="form-label">Button Link</label>
                                            <input type="text" class="form-control" id="secondaryBtnLink" name="secondary_btn_link" 
                                                value="{{ $ctaContent->content_json['buttons']['secondary']['link'] ?? '/solutions' }}" placeholder="Button link">
                                        </div>
                                    </div> --> --}}
                                </div>

                                <!-- Save Button -->
                                <div class="text-end mt-4">
                                    <button type="submit" class="save-btn btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save me-2"></i>Save CTA Section
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div class="section-content" id="contact-content">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="section-title">Contact Section</h4>
                            </div>
                        </div>
                        
                        <div class="form-container">
                            <form id="contactForm">
                                
                                <!-- Section Configuration -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h5 class="mb-3"><i class="fas fa-cog me-2"></i>Contact Section Configuration</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="contactType" class="form-label">Url</label>
                                            <input type="text" name="contact_url" id="contactType" class="form-control" 
                                              value="{{ $contactContent->content_json['calendly']['url'] ?? '' }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="contactType" class="form-label">Add Script</label>
                                            <input type="text" name="contact_script" id="contactScript" class="form-control" value="{{$contactContent->content_json['calendly']['script'] ?? ''}}">
                                        </div>
                                       
                                    </div>
                               
                                </div>

                                <!-- Save Button -->
                                <div class="text-end mt-4">
                                    <button type="submit" class="save-btn btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save me-2"></i>Save Contact Section
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Section navigation functionality
    const sectionLinks = document.querySelectorAll('.section-nav-link');
    const sectionContents = document.querySelectorAll('.section-content');

    sectionLinks.forEach(link => {
        link.addEventListener('click', function() {
            const targetSection = this.getAttribute('data-section');
            
            // Remove active class from all links and contents
            sectionLinks.forEach(l => l.classList.remove('active'));
            sectionContents.forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked link and corresponding content
            this.classList.add('active');
            const targetContent = document.getElementById(targetSection + '-content');
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });

    // Toggle switch functionality
    const toggleSwitches = document.querySelectorAll('.section-toggle input[type="checkbox"]');
    toggleSwitches.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const label = this.nextElementSibling;
            if (this.checked) {
                label.textContent = 'On';
                label.style.color = '#22c55e';
            } else {
                label.textContent = 'Off';
                label.style.color = '#94a3b8';
            }
        });
    });

    // Form submission handlers
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            // Show success message (you can replace this with actual AJAX call)
            const button = this.querySelector('.save-btn');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check me-2"></i>Saved!';
            button.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.background = '';
            }, 2000);
            
            console.log('Form data:', data);
        });
    });
});
</script>

              
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Section navigation functionality
    const sectionLinks = document.querySelectorAll('.section-nav-link');
    const sectionContents = document.querySelectorAll('.section-content');

    sectionLinks.forEach(link => {
        link.addEventListener('click', function() {
            const targetSection = this.getAttribute('data-section');
            
            // Remove active class from all links and contents
            sectionLinks.forEach(l => l.classList.remove('active'));
            sectionContents.forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked link and corresponding content
            this.classList.add('active');
            const targetContent = document.getElementById(targetSection + '-content');
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });

    // Toggle switch functionality
    const toggleSwitches = document.querySelectorAll('.section-toggle input[type="checkbox"]');
    toggleSwitches.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const label = this.nextElementSibling;
            const sectionName = this.id.replace('Switch', '');
            
            if (this.checked) {
                label.textContent = 'On';
                label.style.color = '#22c55e';
            } else {
                label.textContent = 'Off';
                label.style.color = '#94a3b8';
            }

            // Send AJAX request to toggle section
            toggleSectionStatus(sectionName, this.checked);
        });
    });

    // Hero Form Submission
    const heroForm = document.getElementById('heroForm');
    if (heroForm) {
        heroForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const button = this.querySelector('.save-btn');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
            button.disabled = true;
            
            // Add CSRF token to form data
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            // Send AJAX request
            fetch('/admin/homepage/save-hero', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success state
                    button.innerHTML = '<i class="fas fa-check me-2"></i>Saved!';
                    button.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
                    
                    // Show success message
                    showNotification('success', data.message);
                } else {
                    // Show error state
                    button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                    button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                    
                    // Show error message
                    showNotification('error', data.message || 'An error occurred while saving');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                showNotification('error', 'Network error occurred');
            })
            .finally(() => {
                // Reset button after 2 seconds
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    button.disabled = false;
                }, 2000);
            });
        });
    }

    // About Form Submission
    const aboutForm = document.getElementById('aboutForm');
    if (aboutForm) {
        aboutForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const button = this.querySelector('.save-btn');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
            button.disabled = true;
            
            // Add CSRF token to form data
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            // Send AJAX request
            fetch('/admin/homepage/save-about', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success state
                    button.innerHTML = '<i class="fas fa-check me-2"></i>Saved!';
                    button.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
                    
                    // Show success message
                    showNotification('success', data.message);
                } else {
                    // Show error state
                    button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                    button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                    
                    // Show error message
                    showNotification('error', data.message || 'An error occurred while saving');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                showNotification('error', 'Network error occurred');
            })
            .finally(() => {
                // Reset button after 2 seconds
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    button.disabled = false;
                }, 2000);
            });
        });
    }

    // Toggle Section Status Function
    function toggleSectionStatus(sectionName, isActive) {
        fetch('/admin/homepage/toggle-section', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                section_name: sectionName,
                is_active: isActive
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('success', data.message);
            } else {
                showNotification('error', data.message || 'Error updating section status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('error', 'Network error occurred');
        });
    }

    // Notification Function
    function showNotification(type, message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        // Add to page
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }

    // Initialize toggle switches based on existing data
    @if(isset($heroContent) && $heroContent)
        const heroSwitch = document.getElementById('heroSwitch');
        if (heroSwitch) {
            heroSwitch.checked = {{ $heroContent->is_active ? 'true' : 'false' }};
            const heroLabel = document.querySelector('#heroSwitch + label');
            if (heroLabel) {
                heroLabel.textContent = '{{ $heroContent->is_active ? "On" : "Off" }}';
                heroLabel.style.color = '{{ $heroContent->is_active ? "#22c55e" : "#94a3b8" }}';
            }
        }
    @endif

    @if(isset($aboutContent) && $aboutContent)
        const aboutSwitch = document.getElementById('aboutSwitch');
        if (aboutSwitch) {
            aboutSwitch.checked = {{ $aboutContent->is_active ? 'true' : 'false' }};
            const aboutLabel = document.querySelector('#aboutSwitch + label');
            if (aboutLabel) {
                aboutLabel.textContent = '{{ $aboutContent->is_active ? "On" : "Off" }}';
                aboutLabel.style.color = '{{ $aboutContent->is_active ? "#22c55e" : "#94a3b8" }}';
            }
        }
    @endif

    @if(isset($servicesContent) && $servicesContent)
        const servicesSwitch = document.getElementById('servicesSwitch');
        if (servicesSwitch) {
            servicesSwitch.checked = {{ $servicesContent->is_active ? 'true' : 'false' }};
            const servicesLabel = document.querySelector('#servicesSwitch + label');
            if (servicesLabel) {
                servicesLabel.textContent = '{{ $servicesContent->is_active ? "On" : "Off" }}';
                servicesLabel.style.color = '{{ $servicesContent->is_active ? "#22c55e" : "#94a3b8" }}';
            }
        }
    @endif

    @if(isset($solutionsContent) && $solutionsContent)
        const solutionsSwitch = document.getElementById('solutionsSwitch');
        if (solutionsSwitch) {
            solutionsSwitch.checked = {{ $solutionsContent->is_active ? 'true' : 'false' }};
            const solutionsLabel = document.querySelector('#solutionsSwitch + label');
            if (solutionsLabel) {
                solutionsLabel.textContent = '{{ $solutionsContent->is_active ? "On" : "Off" }}';
                solutionsLabel.style.color = '{{ $solutionsContent->is_active ? "#22c55e" : "#94a3b8" }}';
            }
        }
    @endif

    // Services Form Submission
    const servicesForm = document.getElementById('servicesForm');
    if (servicesForm) {
        servicesForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Update CKEditor 5 instances before getting form data
            document.querySelectorAll('.ck-editor-inline').forEach(function(textarea) {
                if (textarea.ckeditorInstance) {
                    textarea.value = textarea.ckeditorInstance.getData();
                }
            });
            
            const formData = new FormData(this);
            const button = this.querySelector('.save-btn');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
            button.disabled = true;
            
            // Add CSRF token to form data
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            // Send AJAX request
            fetch('/admin/homepage/save-services', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success state
                    button.innerHTML = '<i class="fas fa-check me-2"></i>Saved!';
                    button.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
                    
                    // Show success message
                    showNotification('success', data.message);
                } else {
                    // Show error state
                    button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                    button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                    
                    // Show error message
                    showNotification('error', data.message || 'An error occurred while saving');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                showNotification('error', 'Network error occurred');
            })
            .finally(() => {
                // Reset button after 2 seconds
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    button.disabled = false;
                }, 2000);
            });
        });
    }

    // Solutions Form Submission
    const solutionsForm = document.getElementById('solutionsForm');
    if (solutionsForm) {
        solutionsForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const button = this.querySelector('.save-btn');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
            button.disabled = true;
            
            // Add CSRF token to form data
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            // Send AJAX request
            fetch('/admin/homepage/save-solutions', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success state
                    button.innerHTML = '<i class="fas fa-check me-2"></i>Saved!';
                    button.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
                    
                    // Show success message
                    showNotification('success', data.message);
                } else {
                    // Show error state
                    button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                    button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                    
                    // Show error message
                    showNotification('error', data.message || 'An error occurred while saving');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                showNotification('error', 'Network error occurred');
            })
            .finally(() => {
                // Reset button after 2 seconds
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    button.disabled = false;
                }, 2000);
            });
        });
    }

    // Portfolio Form Submission
    const portfolioForm = document.getElementById('portfolioForm');
    if (portfolioForm) {
        portfolioForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Update CKEditor 5 instances before getting form data
            document.querySelectorAll('.ck-editor-inline').forEach(function(textarea) {
                if (textarea.ckeditorInstance) {
                    textarea.value = textarea.ckeditorInstance.getData();
                }
            });
            
            const formData = new FormData(this);
            const button = this.querySelector('.save-btn');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
            button.disabled = true;
            
            // Add CSRF token to form data
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            // Send AJAX request
            fetch('/admin/homepage/save-portfolio', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success state
                    button.innerHTML = '<i class="fas fa-check me-2"></i>Saved!';
                    button.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
                    
                    // Show success message
                    showNotification('success', data.message);
                } else {
                    // Show error state
                    button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                    button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                    
                    // Show error message
                    showNotification('error', data.message || 'An error occurred while saving');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                showNotification('error', 'Network error occurred');
            })
            .finally(() => {
                // Reset button after 2 seconds
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    button.disabled = false;
                }, 2000);
            });
        });
    }

    // Initialize portfolio toggle switch
    @if(isset($portfolioContent) && $portfolioContent)
        const portfolioSwitch = document.getElementById('portfolioSwitch');
        if (portfolioSwitch) {
            portfolioSwitch.checked = {{ $portfolioContent->is_active ? 'true' : 'false' }};
            const portfolioLabel = document.querySelector('#portfolioSwitch + label');
            if (portfolioLabel) {
                portfolioLabel.textContent = '{{ $portfolioContent->is_active ? "On" : "Off" }}';
                portfolioLabel.style.color = '{{ $portfolioContent->is_active ? "#22c55e" : "#94a3b8" }}';
            }
        }
    @endif

    // Testimonials Form Submission
    const testimonialsForm = document.getElementById('testimonialsForm');
    if (testimonialsForm) {
        testimonialsForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const button = this.querySelector('.save-btn');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
            button.disabled = true;
            
            // Add CSRF token to form data
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            // Send AJAX request
            fetch('/admin/homepage/save-testimonials', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success state
                    button.innerHTML = '<i class="fas fa-check me-2"></i>Saved!';
                    button.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
                    
                    // Show success message
                    showNotification('success', data.message);
                } else {
                    // Show error state
                    button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                    button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                    
                    // Show error message
                    showNotification('error', data.message || 'An error occurred while saving');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                showNotification('error', 'Network error occurred');
            })
            .finally(() => {
                // Reset button after 2 seconds
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    button.disabled = false;
                }, 2000);
            });
        });
    }

    // Initialize testimonials toggle switch
    @if(isset($testimonialsContent) && $testimonialsContent)
        const testimonialsSwitch = document.getElementById('testimonialsSwitch');
        if (testimonialsSwitch) {
            testimonialsSwitch.checked = {{ $testimonialsContent->is_active ? 'true' : 'false' }};
            const testimonialsLabel = document.querySelector('#testimonialsSwitch + label');
            if (testimonialsLabel) {
                testimonialsLabel.textContent = '{{ $testimonialsContent->is_active ? "On" : "Off" }}';
                testimonialsLabel.style.color = '{{ $testimonialsContent->is_active ? "#22c55e" : "#94a3b8" }}';
            }
        }
    @endif

    // CTA Form Submission
    const ctaForm = document.getElementById('ctaForm');
    if (ctaForm) {
        ctaForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const button = this.querySelector('.save-btn');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
            button.disabled = true;
            
            // Add CSRF token to form data
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            // Send AJAX request
            fetch('/admin/homepage/save-cta', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success state
                    button.innerHTML = '<i class="fas fa-check me-2"></i>Saved!';
                    button.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
                    
                    // Show success message
                    showNotification('success', data.message);
                } else {
                    // Show error state
                    button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                    button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                    
                    // Show error message
                    showNotification('error', data.message || 'An error occurred while saving');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                showNotification('error', 'Network error occurred');
            })
            .finally(() => {
                // Reset button after 2 seconds
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    button.disabled = false;
                }, 2000);
            });
        });
    }

    // Initialize CTA toggle switch
    @if(isset($ctaContent) && $ctaContent)
        const ctaSwitch = document.getElementById('ctaSwitch');
        if (ctaSwitch) {
            ctaSwitch.checked = {{ $ctaContent->is_active ? 'true' : 'false' }};
            const ctaLabel = document.querySelector('#ctaSwitch + label');
            if (ctaLabel) {
                ctaLabel.textContent = '{{ $ctaContent->is_active ? "On" : "Off" }}';
                ctaLabel.style.color = '{{ $ctaContent->is_active ? "#22c55e" : "#94a3b8" }}';
            }
        }
    @endif

    // Contact Form Submission
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const button = this.querySelector('.save-btn');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
            button.disabled = true;
            
            // Add CSRF token to form data
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            // Send AJAX request
            fetch('/admin/homepage/save-contact', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success state
                    button.innerHTML = '<i class="fas fa-check me-2"></i>Saved!';
                    button.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
                    
                    // Show success message
                    showNotification('success', data.message);
                } else {
                    // Show error state
                    button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                    button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                    
                    // Show error message
                    showNotification('error', data.message || 'An error occurred while saving');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = '<i class="fas fa-times me-2"></i>Error!';
                button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                showNotification('error', 'Network error occurred');
            })
            .finally(() => {
                // Reset button after 2 seconds
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = '';
                    button.disabled = false;
                }, 2000);
            });
        });
    }

    // Contact Type Switching
    const contactTypeSelect = document.getElementById('contactType');
    if (contactTypeSelect) {
        const calendlyConfig = document.getElementById('calendlyConfig');
        const formConfig = document.getElementById('formConfig');
        const infoConfig = document.getElementById('infoConfig');
        
        contactTypeSelect.addEventListener('change', function() {
            const selectedType = this.value;
            
            // Hide all config sections
            calendlyConfig.style.display = 'none';
            formConfig.style.display = 'none';
            infoConfig.style.display = 'none';
            
            // Show selected config section
            if (selectedType === 'calendly') {
                calendlyConfig.style.display = 'block';
            } else if (selectedType === 'form') {
                formConfig.style.display = 'block';
            } else if (selectedType === 'info') {
                infoConfig.style.display = 'block';
            }
        });
        
        // Initialize on page load
        const initialType = contactTypeSelect.value;
        if (initialType === 'calendly') {
            calendlyConfig.style.display = 'block';
        } else if (initialType === 'form') {
            formConfig.style.display = 'block';
        } else if (initialType === 'info') {
            infoConfig.style.display = 'block';
        }
    }

    // Initialize contact toggle switch
    @if(isset($contactContent) && $contactContent)
        const contactSwitch = document.getElementById('contactSwitch');
        if (contactSwitch) {
            contactSwitch.checked = {{ $contactContent->is_active ? 'true' : 'false' }};
            const contactLabel = document.querySelector('#contactSwitch + label');
            if (contactLabel) {
                contactLabel.textContent = '{{ $contactContent->is_active ? "On" : "Off" }}';
                contactLabel.style.color = '{{ $contactContent->is_active ? "#22c55e" : "#94a3b8" }}';
            }
        }
    @endif

    // Initialize service category tabs with improved functionality
    const initServiceTabs = () => {
        const tabButtons = document.querySelectorAll('#serviceTabsAdmin .nav-link');
        const tabPanes = document.querySelectorAll('#serviceTabsContent .tab-pane');
        
        console.log('Found service tab buttons:', tabButtons.length);
        console.log('Found service tab panes:', tabPanes.length);
        
        tabButtons.forEach((button, index) => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Service tab clicked:', this.getAttribute('data-bs-target'));
                
                // Remove active class from all buttons and panes
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabPanes.forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show corresponding pane
                const targetId = this.getAttribute('data-bs-target');
                const targetPane = document.querySelector(targetId);
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                    console.log('Activated service pane:', targetId);
                } else {
                    console.error('Service target pane not found:', targetId);
                }
            });
        });
        
        // Ensure first tab is active by default
        if (tabButtons.length > 0 && tabPanes.length > 0) {
            tabButtons[0].classList.add('active');
            tabPanes[0].classList.add('show', 'active');
        }
        
        console.log('Service tabs initialized successfully');
    };

    // Initialize portfolio system tabs
    const initPortfolioTabs = () => {
        const portfolioTabButtons = document.querySelectorAll('#portfolioSystemTabs .nav-link');
        const portfolioTabPanes = document.querySelectorAll('#portfolioSystemTabsContent .tab-pane');
        
        console.log('Found portfolio tab buttons:', portfolioTabButtons.length);
        console.log('Found portfolio tab panes:', portfolioTabPanes.length);
        
        portfolioTabButtons.forEach((button, index) => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Portfolio tab clicked:', this.getAttribute('data-bs-target'));
                
                // Remove active class from all buttons and panes
                portfolioTabButtons.forEach(btn => btn.classList.remove('active'));
                portfolioTabPanes.forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show corresponding pane
                const targetId = this.getAttribute('data-bs-target');
                const targetPane = document.querySelector(targetId);
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                    console.log('Activated portfolio pane:', targetId);
                } else {
                    console.error('Portfolio target pane not found:', targetId);
                }
            });
        });
        
        // Ensure first tab is active by default
        if (portfolioTabButtons.length > 0 && portfolioTabPanes.length > 0) {
            portfolioTabButtons[0].classList.add('active');
            portfolioTabPanes[0].classList.add('show', 'active');
        }
        
        console.log('Portfolio tabs initialized successfully');
    };

    // Initialize HRMS feature sub-tabs
    const initHRMSFeatureTabs = () => {
        const hrmsTabButtons = document.querySelectorAll('#hrmsFeatureTabs .nav-link');
        const hrmsTabPanes = document.querySelectorAll('#hrmsFeatureContent .tab-pane');
        
        console.log('Found HRMS feature tab buttons:', hrmsTabButtons.length);
        console.log('Found HRMS feature tab panes:', hrmsTabPanes.length);
        
        hrmsTabButtons.forEach((button, index) => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('HRMS feature tab clicked:', this.getAttribute('data-bs-target'));
                
                // Remove active class from all buttons and panes
                hrmsTabButtons.forEach(btn => btn.classList.remove('active'));
                hrmsTabPanes.forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show corresponding pane
                const targetId = this.getAttribute('data-bs-target');
                const targetPane = document.querySelector(targetId);
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                    console.log('Activated HRMS feature pane:', targetId);
                } else {
                    console.error('HRMS feature target pane not found:', targetId);
                }
            });
        });
        
        // Ensure first tab is active by default
        if (hrmsTabButtons.length > 0 && hrmsTabPanes.length > 0) {
            hrmsTabButtons[0].classList.add('active');
            hrmsTabPanes[0].classList.add('show', 'active');
        }
        
        console.log('HRMS feature tabs initialized successfully');
    };
    
    // Initialize all tabs after DOM is ready
    setTimeout(() => {
        initServiceTabs();
        initPortfolioTabs();
        initHRMSFeatureTabs();
        
        // Portfolio tabs fix - Direct approach
        console.log('Initializing portfolio tabs...');
        
        // Portfolio System Tabs (HRMS, CRM, VMS)
        const portfolioSystemTabs = document.querySelectorAll('#portfolioSystemTabs .nav-link');
        const portfolioSystemPanes = document.querySelectorAll('#portfolioSystemTabsContent .tab-pane');
        
        console.log('Portfolio system tabs found:', portfolioSystemTabs.length);
        console.log('Portfolio system panes found:', portfolioSystemPanes.length);
        
        portfolioSystemTabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Portfolio system tab clicked:', this.textContent.trim());
                
                // Remove active from all system tabs and panes
                portfolioSystemTabs.forEach(t => t.classList.remove('active'));
                portfolioSystemPanes.forEach(p => {
                    p.classList.remove('show', 'active');
                });
                
                // Add active to clicked tab
                this.classList.add('active');
                
                // Show corresponding pane
                const target = this.getAttribute('data-bs-target');
                const pane = document.querySelector(target);
                if (pane) {
                    pane.classList.add('show', 'active');
                    console.log('Activated portfolio system pane:', target);
                } else {
                    console.error('Portfolio system pane not found:', target);
                }
            });
        });
        
        // HRMS Feature Tabs (Employee, Payroll, etc.)
        const hrmsFeatureTabs = document.querySelectorAll('#hrmsFeatureTabs .nav-link');
        const hrmsFeaturePanes = document.querySelectorAll('#hrmsFeatureContent .tab-pane');
        
        console.log('HRMS feature tabs found:', hrmsFeatureTabs.length);
        console.log('HRMS feature panes found:', hrmsFeaturePanes.length);
        
        hrmsFeatureTabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('HRMS feature tab clicked:', this.textContent.trim());
                
                // Remove active from all HRMS feature tabs and panes
                hrmsFeatureTabs.forEach(t => t.classList.remove('active'));
                hrmsFeaturePanes.forEach(p => {
                    p.classList.remove('show', 'active');
                });
                
                // Add active to clicked tab
                this.classList.add('active');
                
                // Show corresponding pane
                const target = this.getAttribute('data-bs-target');
                const pane = document.querySelector(target);
                if (pane) {
                    pane.classList.add('show', 'active');
                    console.log('Activated HRMS feature pane:', target);
                } else {
                    console.error('HRMS feature pane not found:', target);
                }
            });
        });
        
        // Activate first tabs by default
        if (portfolioSystemTabs.length > 0) {
            portfolioSystemTabs[0].classList.add('active');
        }
        if (portfolioSystemPanes.length > 0) {
            portfolioSystemPanes[0].classList.add('show', 'active');
        }
        if (hrmsFeatureTabs.length > 0) {
            hrmsFeatureTabs[0].classList.add('active');
        }
        if (hrmsFeaturePanes.length > 0) {
            hrmsFeaturePanes[0].classList.add('show', 'active');
        }
        
        console.log('Portfolio tabs initialization complete');
        
    }, 500);

    // Initialize CKEditor 5 for all textareas with ck-editor-inline class
    setTimeout(() => {
        document.querySelectorAll('.ck-editor-inline').forEach(function(textarea) {
            if (!textarea.dataset.ckEditorInitialized) {
                ClassicEditor
                    .create(textarea, {
                        toolbar: {
                            items: [
                                'bold', 'italic', 'underline', '|',
                                'bulletedList', 'numberedList', '|',
                                'link', '|',
                                'undo', 'redo'
                            ]
                        },
                        placeholder: 'Enter description and features...',
                        removePlugins: ['MediaEmbed', 'Table', 'TableToolbar'],
                        link: {
                            decorators: {
                                openInNewTab: {
                                    mode: 'manual',
                                    label: 'Open in a new tab',
                                    attributes: {
                                        target: '_blank',
                                        rel: 'noopener noreferrer'
                                    }
                                }
                            }
                        }
                    })
                    .then(editor => {
                        // Store editor instance for form submission
                        textarea.ckeditorInstance = editor;
                        textarea.dataset.ckEditorInitialized = 'true';
                        
                        // Update textarea value when editor content changes
                        editor.model.document.on('change:data', () => {
                            textarea.value = editor.getData();
                        });
                    })
                    .catch(error => {
                        console.error('CKEditor 5 initialization error:', error);
                    });
            }
        });
    }, 1000);
});
</script>

<!-- CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<!-- Service Tabs JavaScript -->
<script src="{{ asset('js/service-tabs-final-fix.js') }}"></script>

<!-- Portfolio Tabs Fix -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Portfolio tabs fix - specific for admin panel
    setTimeout(function() {
        console.log('Initializing portfolio admin tabs...');
        
        // Portfolio System Tabs (HRMS, CRM, VMS)
        const portfolioSystemTabs = document.querySelectorAll('#portfolioSystemTabs .nav-link');
        const portfolioSystemPanes = document.querySelectorAll('#portfolioSystemTabsContent .tab-pane');
        
        console.log('Portfolio system tabs found:', portfolioSystemTabs.length);
        console.log('Portfolio system panes found:', portfolioSystemPanes.length);
        
        // Add click handlers for portfolio system tabs
        portfolioSystemTabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Portfolio system tab clicked:', this.textContent.trim());
                
                // Remove active from all system tabs and panes
                portfolioSystemTabs.forEach(function(t) {
                    t.classList.remove('active');
                });
                portfolioSystemPanes.forEach(function(p) {
                    p.classList.remove('show', 'active');
                });
                
                // Add active to clicked tab
                this.classList.add('active');
                
                // Show corresponding pane
                const target = this.getAttribute('data-bs-target');
                const pane = document.querySelector(target);
                if (pane) {
                    pane.classList.add('show', 'active');
                    console.log('Activated portfolio system pane:', target);
                } else {
                    console.error('Portfolio system pane not found:', target);
                }
            });
        });
        
        // HRMS Feature Tabs (Employee, Payroll, etc.)
        const hrmsFeatureTabs = document.querySelectorAll('#hrmsFeatureTabs .nav-link');
        const hrmsFeaturePanes = document.querySelectorAll('#hrmsFeatureContent .tab-pane');
        
        console.log('HRMS feature tabs found:', hrmsFeatureTabs.length);
        console.log('HRMS feature panes found:', hrmsFeaturePanes.length);
        
        // Add click handlers for HRMS feature tabs
        hrmsFeatureTabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('HRMS feature tab clicked:', this.textContent.trim());
                
                // Remove active from all HRMS feature tabs and panes
                hrmsFeatureTabs.forEach(function(t) {
                    t.classList.remove('active');
                });
                hrmsFeaturePanes.forEach(function(p) {
                    p.classList.remove('show', 'active');
                });
                
                // Add active to clicked tab
                this.classList.add('active');
                
                // Show corresponding pane
                const target = this.getAttribute('data-bs-target');
                const pane = document.querySelector(target);
                if (pane) {
                    pane.classList.add('show', 'active');
                    console.log('Activated HRMS feature pane:', target);
                } else {
                    console.error('HRMS feature pane not found:', target);
                }
            });
        });

        // CRM Feature Tabs (Lead Management, Sales Pipeline, etc.)
        const crmFeatureTabs = document.querySelectorAll('#crmFeatureTabs .nav-link');
        const crmFeaturePanes = document.querySelectorAll('#crmFeatureContent .tab-pane');
        
        console.log('CRM feature tabs found:', crmFeatureTabs.length);
        console.log('CRM feature panes found:', crmFeaturePanes.length);
        
        // Add click handlers for CRM feature tabs
        crmFeatureTabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('CRM feature tab clicked:', this.textContent.trim());
                
                // Remove active from all CRM feature tabs and panes
                crmFeatureTabs.forEach(function(t) {
                    t.classList.remove('active');
                });
                crmFeaturePanes.forEach(function(p) {
                    p.classList.remove('show', 'active');
                });
                
                // Add active to clicked tab
                this.classList.add('active');
                
                // Show corresponding pane
                const target = this.getAttribute('data-bs-target');
                const pane = document.querySelector(target);
                if (pane) {
                    pane.classList.add('show', 'active');
                    console.log('Activated CRM feature pane:', target);
                } else {
                    console.error('CRM feature pane not found:', target);
                }
            });
        });

        // VMS Feature Tabs (Visitor Registration, Access Control, etc.)
        const vmsFeatureTabs = document.querySelectorAll('#vmsFeatureTabs .nav-link');
        const vmsFeaturePanes = document.querySelectorAll('#vmsFeatureContent .tab-pane');
        
        console.log('VMS feature tabs found:', vmsFeatureTabs.length);
        console.log('VMS feature panes found:', vmsFeaturePanes.length);
        
        // Add click handlers for VMS feature tabs
        vmsFeatureTabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('VMS feature tab clicked:', this.textContent.trim());
                
                // Remove active from all VMS feature tabs and panes
                vmsFeatureTabs.forEach(function(t) {
                    t.classList.remove('active');
                });
                vmsFeaturePanes.forEach(function(p) {
                    p.classList.remove('show', 'active');
                });
                
                // Add active to clicked tab
                this.classList.add('active');
                
                // Show corresponding pane
                const target = this.getAttribute('data-bs-target');
                const pane = document.querySelector(target);
                if (pane) {
                    pane.classList.add('show', 'active');
                    console.log('Activated VMS feature pane:', target);
                } else {
                    console.error('VMS feature pane not found:', target);
                }
            });
        });
        
        // Activate first tabs by default
        if (portfolioSystemTabs.length > 0) {
            portfolioSystemTabs[0].classList.add('active');
        }
        if (portfolioSystemPanes.length > 0) {
            portfolioSystemPanes[0].classList.add('show', 'active');
        }
        if (hrmsFeatureTabs.length > 0) {
            hrmsFeatureTabs[0].classList.add('active');
        }
        if (hrmsFeaturePanes.length > 0) {
            hrmsFeaturePanes[0].classList.add('show', 'active');
        }
        if (crmFeatureTabs.length > 0) {
            crmFeatureTabs[0].classList.add('active');
        }
        if (crmFeaturePanes.length > 0) {
            crmFeaturePanes[0].classList.add('show', 'active');
        }
        if (vmsFeatureTabs.length > 0) {
            vmsFeatureTabs[0].classList.add('active');
        }
        if (vmsFeaturePanes.length > 0) {
            vmsFeaturePanes[0].classList.add('show', 'active');
        }
        
        console.log('Portfolio admin tabs initialization complete');
    }, 1500); // Wait for other scripts to load
});
</script>

@endsection