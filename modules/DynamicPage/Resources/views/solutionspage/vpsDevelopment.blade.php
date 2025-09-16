@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $coreFeaturesContent = $coreFeaturesContent ?? null;
    $hardwareIntegrationContent = $hardwareIntegrationContent ?? null;
    $industriesContent = $industriesContent ?? null;
    $scalabilityContent = $scalabilityContent ?? null;
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
                    <li class="breadcrumb-item"><a href="#">Solutions Page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">VPS Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">VPS Development Sections</h5>
                    </div>
                    <div class="sections-nav">
                        <button class="section-nav-link active" data-section="hero">
                            <i class="fas fa-star"></i>
                            Hero Section
                        </button>
                        <button class="section-nav-link" data-section="intro">
                            <i class="fas fa-info-circle"></i>
                            Intro Section
                        </button>
                        <button class="section-nav-link" data-section="core-features">
                            <i class="fas fa-cogs"></i>
                            Core Features
                        </button>
                        <button class="section-nav-link" data-section="hardware-integration">
                            <i class="fas fa-microchip"></i>
                            Hardware Integration
                        </button>
                        <button class="section-nav-link" data-section="industries">
                            <i class="fas fa-industry"></i>
                            Industries We Serve
                        </button>
                        <button class="section-nav-link" data-section="scalability">
                            <i class="fas fa-expand-arrows-alt"></i>
                            Scalability
                        </button>
                        <button class="section-nav-link" data-section="testimonials">
                            <i class="fas fa-expand-arrows-alt"></i>
                            Testimonials
                        </button>
                        <button class="section-nav-link" data-section="final-cta">
                            <i class="fas fa-expand-arrows-alt"></i>
                            Final CTA
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
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Title</label>
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Smarter Parking. Fully Automated.">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Smarter Parking. Fully Automated.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="Qubify VPS streamlines every part of the parking experience...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : 'Qubify VPS streamlines every part of the parking experience—from license plate recognition and real-time slot visibility to digital payments and admin analytics. It\'s the modern solution for modern facilities.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-tags"></i>
                                    Feature Pills
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 1</label>
                                            <input type="text" class="form-control" name="hero_feature1" placeholder="Live LPR" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][0] ?? '') : 'Live LPR' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="hero_feature2" placeholder="Contactless Pay" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][1] ?? '') : 'Contactless Pay' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="hero_feature3" placeholder="Central Control Panel" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][2] ?? '') : 'Central Control Panel' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-mouse-pointer"></i>
                                    CTA Buttons
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 1 Text</label>
                                            <input type="text" class="form-control" name="hero_button1_text" placeholder="Request Demo" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][0]['text'] ?? '') : 'Request Demo' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="hero_button2_text" placeholder="See It In Action" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['text'] ?? '') : 'See It In Action' }}">
                                        </div>
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
   
                    <!-- Intro Section -->
                    <div class="section-content" id="intro-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-info-circle"></i>
                                    Intro Section
                                </h2>

                            </div>
                        </div>
                        
                        <form id="introForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="intro_title" rows="2" placeholder="What is Qubify VPS?">{{ isset($introContent) && $introContent ? ($introContent->content_json['title'] ?? '') : 'What is Qubify VPS?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="intro_description" rows="4" placeholder="Qubify VPS is a full-stack Vehicle Parking System...">{{ isset($introContent) && $introContent ? ($introContent->content_json['description'] ?? '') : 'Qubify VPS is a full-stack Vehicle Parking System that replaces paper slips, cash payments, and manual slot checks with an end-to-end digital solution. Whether you\'re managing five spaces or five levels of parking, VPS adapts to your infrastructure and transforms it into a smart, secure, and user-friendly operation.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    ['title' => 'Real-Time Slots', 'description' => 'Live slot visibility and dynamic allocation', 'icon' => 'fas fa-parking'],
                                    ['title' => 'License Plate Recognition', 'description' => 'Automatic vehicle identification and validation', 'icon' => 'fas fa-camera'],
                                    ['title' => 'Digital Payments', 'description' => 'Contactless UPI, card, and wallet payments', 'icon' => 'fas fa-credit-card'],
                                    ['title' => 'Smart Analytics', 'description' => 'Comprehensive reporting and data insights', 'icon' => 'fas fa-chart-line']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Feature {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_title" placeholder="{{ $defaultFeatures[$i-1]['title'] }}" value="{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][$i-1]['title'] ?? '') : $defaultFeatures[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="feature{{ $i }}_description" rows="2" placeholder="{{ $defaultFeatures[$i-1]['description'] }}">{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][$i-1]['description'] ?? '') : $defaultFeatures[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Intro Section
                                </button>
                            </div>
                        </form>
                    </div> 

                   <!-- Core Features Section -->
                    <div class="section-content" id="core-features-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    Core Features Section
                                </h2>
                            
                            </div>
                        </div>
                        
                        <form id="coreFeaturesForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="core_title">{{ $coreFeaturesContent->content_json['title'] ?? 'Core Capabilities' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="core_subtitle" 
                                            value="{{ $coreFeaturesContent->content_json['subtitle'] ?? 'Everything you need for modern parking management' }}">
                                    </div>
                                </div>
                            </div>

                            @for ($i = 1; $i <= 3; $i++)
                                <div class="card p-3 mb-3">
                                    <div class="card-title">Capability {{ $i }}</div>
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="capability{{ $i }}_title" class="form-control"
                                            value="{{ $coreFeaturesContent->content_json['capabilities'][$i-1]['title'] ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Subtitle</label>
                                        <input type="text" name="capability{{ $i }}_subtitle" class="form-control"
                                            value="{{ $coreFeaturesContent->content_json['capabilities'][$i-1]['subtitle'] ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea name="capability{{ $i }}_description" class="form-control">{{ $coreFeaturesContent->content_json['capabilities'][$i-1]['description'] ?? '' }}</textarea>
                                    </div>

                                    <h6>Features</h6>
                                    @for ($j = 1; $j <= 3; $j++)
                                        <input type="text" class="form-control mb-2"
                                            name="capability{{ $i }}_feature{{ $j }}"
                                            value="{{ $coreFeaturesContent->content_json['capabilities'][$i-1]['features'][$j-1] ?? '' }}"
                                            placeholder="Feature {{ $j }}">
                                    @endfor

                                    <div class="form-group">
                                        <label class="form-label">Dashboard Title</label>
                                            <input type="text" name="capability{{ $i }}_dashboard_title" class="form-control" value="{{ $coreFeaturesContent->content_json['capabilities'][$i-1]['dashboard_title'] ?? '' }}">

                                    </div>
                                    @for ($k = 1; $k <= 3; $k++)
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                    name="capability{{ $i }}_stat{{ $k }}_label"
                                                    value="{{ $coreFeaturesContent->content_json['capabilities'][$i-1]['stats'][$k-1]['label'] ?? '' }}"
                                                    placeholder="Stat Label {{ $k }}">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"
                                                    name="capability{{ $i }}_stat{{ $k }}_value"
                                                    value="{{ $coreFeaturesContent->content_json['capabilities'][$i-1]['stats'][$k-1]['value'] ?? '' }}"
                                                    placeholder="Stat Value {{ $k }}">
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            @endfor

                            @for ($i = 4; $i <= 9; $i++)
                                <div class="card p-3 mb-3">
                                    <div class="card-title">Capability {{ $i }}</div>
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="additional{{ $i }}_title" class="form-control"
                                            value="{{ $coreFeaturesContent->content_json['additional_features'][$i-1]['title'] ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Subtitle</label>
                                        <input type="text" name="additional{{ $i }}_subtitle" class="form-control"
                                            value="{{ $coreFeaturesContent->content_json['additional_features'][$i-1]['subtitle'] ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea name="additional{{ $i }}_description" class="form-control">{{ $coreFeaturesContent->content_json['additional_features'][$i-1]['description'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Core Features Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Hardware Integration Section -->
                    <div class="section-content" id="hardware-integration-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-microchip"></i>
                                    Hardware Integration Section
                                </h2>
                   
                            </div>
                        </div>

                        <form id="hardwareIntegrationForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="hardware_title" 
                                            placeholder="Hardware-Friendly Integration" >{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['title'] ?? '') : 'Hardware-Friendly Integration' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="hardware_description" rows="3" 
                                            placeholder="Already have boom barriers or IP cameras? Qubify VPS plugs right in for fast deployment">{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['description'] ?? '') : 'Already have boom barriers or IP cameras? Qubify VPS plugs right in for fast deployment' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-3 card-title">Hardware Types</div>
                            <div class="row">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="col-md-12 mb-3">
                                        <div class="card p-3">
                                            <div class="form-group mb-2">
                                                <label class="form-label">Title {{ $i+1 }}</label>
                                                <input type="text" class="form-control" 
                                                    name="hardware[{{ $i }}][title]" 
                                                    placeholder="e.g., IP Cameras"
                                                    value="{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['hardware_types'][$i]['title'] ?? '') : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description {{ $i+1 }}</label>
                                                <textarea class="form-control" rows="2"
                                                    name="hardware[{{ $i }}][description]" 
                                                    placeholder="e.g., High-resolution license plate capture">{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['hardware_types'][$i]['description'] ?? '') : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Hardware Integration Section
                                </button>
                            </div>
                        </form>
                    </div>


                    <!-- Industries Section -->
                    <div class="section-content" id="industries-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-industry"></i>
                                    Industries We Serve Section
                                </h2>
                     
                            </div>
                        </div>
                        
                        <form id="industriesForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="industries_title"
                                            placeholder="Industries We Serve">{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['title'] ?? '') : 'Industries We Serve' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="industries_description" rows="3"
                                                placeholder="Qubify VPS works across multiple verticals—wherever vehicles park, we fit.">{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['description'] ?? '') : 'Qubify VPS works across multiple verticals—wherever vehicles park, we fit.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-3 card-title">Industries (8 Required)</div>

                            <div class="row">
                                @for ($i = 1; $i <= 8; $i++)
                                    <div class="col-md-12 mb-3">
                                        <div class="card p-3 h-100">
                                            <div class="form-group mb-2">
                                                <label class="form-label">Industry {{ $i }} Title</label>
                                                <input type="text" class="form-control"
                                                    name="industry{{ $i }}_title"
                                                    value="{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['industries'][$i-1]['title'] ?? '') : '' }}"
                                                    placeholder="e.g., Corporate & IT Parks">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="form-label">Industry {{ $i }} Description</label>
                                                <textarea class="form-control" rows="2"
                                                        name="industry{{ $i }}_description"
                                                        placeholder="e.g., Enterprise campus parking solutions">{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['industries'][$i-1]['description'] ?? '') : '' }}</textarea>
                                            </div>
                                           
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Industries Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Scalability Section -->
                    <div class="section-content" id="scalability-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-expand-arrows-alt"></i>
                                    Scalability Section
                                </h2>
                        
                            </div>
                        </div>
                        
                        <form id="scalabilityForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="scalability_title" placeholder="Scalability Without Limitations">{{ isset($scalabilityContent) && $scalabilityContent ? ($scalabilityContent->content_json['title'] ?? '') : 'Scalability Without Limitations' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="scalability_description" rows="3" placeholder="Whether you're handling 50 cars a day or 5,000, Qubify VPS is built to scale.">{{ isset($scalabilityContent) && $scalabilityContent ? ($scalabilityContent->content_json['description'] ?? '') : 'Whether you\'re handling 50 cars a day or 5,000, Qubify VPS is built to scale. Add more slots, users, zones, or hardware without disruption.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-3 card-title">Scalability Features (3 Required)</div>
                            <div class="row">
                                @for ($i = 1; $i <= 3; $i++)
                                    <div class="col-md-12 mb-3">
                                        <div class="card p-3 h-100">
                                            <div class="form-group mb-2">
                                                <label class="form-label">Industry {{ $i }} Title</label>
                                                <input type="text" class="form-control"
                                                    name="scalability{{ $i }}_title"
                                                    value="{{ isset($scalabilityContent) && $scalabilityContent ? ($scalabilityContent->content_json['features'][$i-1]['title'] ?? '') : '' }}"
                                                    placeholder="e.g., Corporate & IT Parks">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="form-label">Industry {{ $i }} Description</label>
                                                <textarea class="form-control" rows="2"
                                                        name="scalability{{ $i }}_description"
                                                        placeholder="e.g., Enterprise campus parking solutions">{{ isset($scalabilityContent) && $scalabilityContent ? ($scalabilityContent->content_json['features'][$i-1]['description'] ?? '') : '' }}</textarea>
                                            </div>
                                           
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Scalability Section
                                </button>
                            </div>
                        </form>
                    </div>
                    
                        <!-- Testimonials Section -->
                    <div class="section-content" id="testimonials-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-quote-left"></i>
                                    Testimonials Section
                                </h2>
                       
                            </div>
                        </div>
                        
                        <form id="testimonialsForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="testimonials_title" placeholder="What Customers Are Saying">{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['title'] ?? '') : 'What Customers Are Saying' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTestimonials = [
                                    ['name' => 'Maya P.', 'role' => 'VP of People', 'company' => 'SaaS Company', 'review' => 'We consolidated 4 tools into HRMS. Payroll, performance, onboarding—it\'s all just there, and it works.', 'rating' => 5],
                                    ['name' => 'Leo D.', 'role' => 'HR Manager', 'company' => 'Logistics Firm', 'review' => 'Our payroll used to take two full days every month. Now it takes 30 minutes. That\'s the impact HRMS had.', 'rating' => 5],
                                    ['name' => 'Ayesha R.', 'role' => 'Operations Lead', 'company' => 'E-commerce Startup', 'review' => 'It\'s a relief not having to chase people for leave approvals or document signatures anymore.', 'rating' => 5]
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-user"></i>
                                        Testimonial {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="testimonial{{ $i }}_name" placeholder="{{ $defaultTestimonials[$i-1]['name'] }}" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][$i-1]['name'] ?? '') : $defaultTestimonials[$i-1]['name'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <input type="text" class="form-control" name="testimonial{{ $i }}_role" placeholder="{{ $defaultTestimonials[$i-1]['role'] }}" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][$i-1]['role'] ?? '') : $defaultTestimonials[$i-1]['role'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Company</label>
                                                <input type="text" class="form-control" name="testimonial{{ $i }}_company" placeholder="{{ $defaultTestimonials[$i-1]['company'] }}" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][$i-1]['company'] ?? '') : $defaultTestimonials[$i-1]['company'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-label">Review</label>
                                                <textarea class="form-control" name="testimonial{{ $i }}_review" rows="3" placeholder="{{ $defaultTestimonials[$i-1]['review'] }}">{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][$i-1]['review'] ?? '') : $defaultTestimonials[$i-1]['review'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Rating (1-5)</label>
                                                <select class="form-control" name="testimonial{{ $i }}_rating">
                                                    @for($r = 1; $r <= 5; $r++)
                                                        <option value="{{ $r }}" {{ (isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][$i-1]['rating'] ?? $defaultTestimonials[$i-1]['rating']) : $defaultTestimonials[$i-1]['rating']) == $r ? 'selected' : '' }}>{{ $r }} Star{{ $r > 1 ? 's' : '' }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Testimonials Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Final CTA Section -->
                    <div class="section-content" id="final-cta-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-bullhorn"></i>
                                    Final CTA Section
                                </h2>
                        
                            </div>
                        </div>
                        
                        <form id="finalCtaForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">CTA Title</label>
                                        <textarea class="form-control editor" name="final_cta_title" rows="2" placeholder="Simplify HR. Empower Your Team.">{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['title'] ?? '') : 'Simplify HR. Empower Your Team.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">CTA Description</label>
                                        <textarea class="form-control editor" name="final_cta_description" rows="4" placeholder="HRMS gives you the tools to work smarter—not harder...">{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['description'] ?? '') : 'HRMS gives you the tools to work smarter—not harder. Whether you\'re building a team or managing thousands, you\'ll have everything you need to stay in control.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-tags"></i>
                                    Feature Pills
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 1</label>
                                            <input type="text" class="form-control" name="feature_pill_1" placeholder="🛠 No setup fees" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][0] ?? '') : '🛠 No setup fees' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="feature_pill_2" placeholder="⏱ Go live in under a week" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][1] ?? '') : '⏱ Go live in under a week' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="feature_pill_3" placeholder="🔐 SOC2 & GDPR compliant" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][2] ?? '') : '🔐 SOC2 & GDPR compliant' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 4</label>
                                            <input type="text" class="form-control" name="feature_pill_4" placeholder="🔐 SOC2 & GDPR compliant" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][3] ?? '') : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-mouse-pointer"></i>
                                    CTA Buttons
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 1 Text</label>
                                            <input type="text" class="form-control" name="button1_text" placeholder="🚀 Start Free Trial" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['buttons'][0]['text'] ?? '') : '🚀 Start Free Trial' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="button2_text" placeholder="📞 Call Now" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['buttons'][1]['text'] ?? '') : '📞 Call Now' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Final CTA Section
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for section navigation and form handling -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Section navigation
    const sectionLinks = document.querySelectorAll('.section-nav-link');
    const sectionContents = document.querySelectorAll('.section-content');

    sectionLinks.forEach(link => {
        link.addEventListener('click', function() {
            const sectionId = this.getAttribute('data-section');
            
            // Remove active class from all links and sections
            sectionLinks.forEach(l => l.classList.remove('active'));
            sectionContents.forEach(s => s.classList.remove('active'));
            
            // Add active class to clicked link and corresponding section
            this.classList.add('active');
            document.getElementById(sectionId + '-section').classList.add('active');
        });
    });

    // CSRF token setup for AJAX requests
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Form submissions for POS
    const forms = [
        'heroForm', 
        'introForm', 
        'coreFeaturesForm', 
        'hardwareIntegrationForm', 
        'industriesForm', 
        'scalabilityForm',
        'testimonialsForm',
        'finalCtaForm'
    ];

    const routes = {
        'heroForm': '{{ route("admin.vps-development.save-hero") }}',
        'introForm': '{{ route("admin.vps-development.save-intro") }}',
        'coreFeaturesForm': '{{ route("admin.vps-development.save-core-features") }}',
        'hardwareIntegrationForm': '{{ route("admin.vps-development.save-hardware-integration") }}',
        'industriesForm': '{{ route("admin.vps-development.save-industries") }}',
        'scalabilityForm': '{{ route("admin.vps-development.save-scalability") }}',
        'testimonialsForm': '{{ route("admin.vps-development.save-testimonials") }}',
        'finalCtaForm': '{{ route("admin.vps-development.save-final-cta") }}'
    };

    forms.forEach(formId => {
        const form = document.getElementById(formId);
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;

                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
                submitBtn.disabled = true;

                fetch(routes[formId], {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification(data.message, 'success');
                    } else if (data.errors) {
                        Object.values(data.errors).forEach(errArr => {
                            showNotification(errArr[0], 'error');
                        });
                    } else {
                        showNotification(data.message || 'An error occurred while saving the section.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('Error saving form data', 'error');
                })
                .finally(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            });
        }
    });

    // Notification function
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
                notification.parentNode.removeChild(notification);
            }
        }, 5000);
    }


    // Section toggle functionality
    $('.section-toggle input[type="checkbox"]').on('change', function() {
        const sectionName = $(this).attr('id').replace('Switch', '').replace(/([A-Z])/g, '_$1').toLowerCase().replace(/^_/, '');
        const isActive = $(this).is(':checked');
        const label = $(this).next('label');
        
        $.ajax({
            url: '{{ route("admin.pos-development.toggle-section") }}',
            method: 'POST',
            data: {
                section_name: sectionName,
                is_active: isActive,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    label.text(isActive ? 'On' : 'Off');
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('An error occurred while updating section status.');
                // Revert the toggle
                $(this).prop('checked', !isActive);
            }
        });
    });
});
</script>

@endsection