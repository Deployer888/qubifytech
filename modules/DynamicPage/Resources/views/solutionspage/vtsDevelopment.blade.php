@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $coreFeaturesContent = $coreFeaturesContent ?? null;
    $additionalFeaturesContent = $additionalFeaturesContent ?? null;
    $hardwareIntegrationContent = $hardwareIntegrationContent ?? null;
    $useCasesContent = $useCasesContent ?? null;
    $benefitsContent = $benefitsContent ?? null;
    $testimonialsContent = $testimonialsContent ?? null;
    $finalCtaContent = $finalCtaContent ?? null;
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
                    <li class="breadcrumb-item active" aria-current="page">VTS Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">VTS Development Sections</h5>
                    </div>
                    <div class="sections-nav">
                        <button class="section-nav-link active" data-section="hero">
                            <i class="fas fa-star"></i>
                            Hero Section
                        </button>
                        <button class="section-nav-link" data-section="intro">
                            <i class="fas fa-info-circle"></i>
                            What is Qubify VTS
                        </button>
                        <button class="section-nav-link" data-section="core-features">
                            <i class="fas fa-cogs"></i>
                            Core Capabilities
                        </button>   
                     <button class="section-nav-link" data-section="additional-features">
                            <i class="fas fa-plus-circle"></i>
                            Additional Features
                        </button>
                        <button class="section-nav-link" data-section="hardware-integration">
                            <i class="fas fa-microchip"></i>
                            Hardware Integration
                        </button>
                        <button class="section-nav-link" data-section="use-cases">
                            <i class="fas fa-industry"></i>
                            Use Cases
                        </button>
                        <button class="section-nav-link" data-section="benefits">
                            <i class="fas fa-thumbs-up"></i>
                            Benefits
                        </button>
                        <button class="section-nav-link" data-section="testimonials">
                            <i class="fas fa-quote-left"></i>
                            Testimonials
                        </button>
                        <button class="section-nav-link" data-section="final-cta">
                            <i class="fas fa-bullhorn"></i>
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
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Track Every Vehicle. Optimize Every Route.">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Track Every Vehicle. Optimize Every Route.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="Qubify VTS is a real-time vehicle tracking and fleet intelligence platform...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : 'Qubify VTS is a real-time vehicle tracking and fleet intelligence platform designed to help businesses monitor vehicle locations, reduce operational waste, and improve driver performance — all from a single dashboard.' }}</textarea>
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
                                            <input type="text" class="form-control" name="feature_pill_1" placeholder="🚚 Live GPS Tracking" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][0] ?? '') : '🚚 Live GPS Tracking' }}">
                                        </div>
                                    </div>    
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="feature_pill_2" placeholder="📍 Route History & Alerts" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][1] ?? '') : '📍 Route History & Alerts' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="feature_pill_3" placeholder="📊 Driver Insights" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][2] ?? '') : '📊 Driver Insights' }}">
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
                                            <input type="text" class="form-control" name="button1_text" placeholder="🔵 Request a Live Demo" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][0]['text'] ?? '') : '🔵 Request a Live Demo' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="button2_text" placeholder="⚪ Talk to Sales" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['text'] ?? '') : '⚪ Talk to Sales' }}">
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
                                    What is Qubify VTS Section
                                </h2>
 
                            </div>
                        </div>
                        
                        <form id="introForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="intro_title" rows="2" placeholder="What is Qubify VTS?">{{ isset($introContent) && $introContent ? ($introContent->content_json['title'] ?? '') : 'What is Qubify VTS?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control editor" name="intro_subtitle" rows="4" placeholder="Qubify VTS is a comprehensive vehicle tracking system...">{{ isset($introContent) && $introContent ? ($introContent->content_json['subtitle'] ?? '') : 'Qubify VTS is a comprehensive vehicle tracking system designed to provide real-time insights into your fleet operations, helping you optimize routes, reduce costs, and improve overall efficiency.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="intro_description" rows="4" placeholder="Qubify VTS is a comprehensive vehicle tracking system...">{{ isset($introContent) && $introContent ? ($introContent->content_json['description'] ?? '') : 'Qubify VTS is a comprehensive vehicle tracking system designed to provide real-time insights into your fleet operations, helping you optimize routes, reduce costs, and improve overall efficiency.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-list"></i>
                                    Core Features (4 Features)
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature 1 Title</label>
                                            <input type="text" class="form-control" name="core_feature_1_title" placeholder="Real-Time Tracking" value="{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][0]['title'] ?? '') : 'Real-Time Tracking' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Feature 1 Description</label>
                                            <textarea class="form-control" name="core_feature_1_description" rows="2" placeholder="Monitor vehicle locations in real-time">{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][0]['description'] ?? '') : 'Monitor vehicle locations in real-time with precise GPS tracking and instant updates.' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2 Title</label>
                                            <input type="text" class="form-control" name="core_feature_2_title" placeholder="Route Optimization" value="{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][1]['title'] ?? '') : 'Route Optimization' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Feature 2 Description</label>
                                            <textarea class="form-control" name="core_feature_2_description" rows="2" placeholder="Optimize routes for efficiency">{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][1]['description'] ?? '') : 'Optimize routes for maximum efficiency and reduced fuel consumption.' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3 Title</label>
                                            <input type="text" class="form-control" name="core_feature_3_title" placeholder="Driver Analytics" value="{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][2]['title'] ?? '') : 'Driver Analytics' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Feature 3 Description</label>
                                            <textarea class="form-control" name="core_feature_3_description" rows="2" placeholder="Analyze driver behavior and performance">{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][2]['description'] ?? '') : 'Analyze driver behavior and performance to improve safety and efficiency.' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature 4 Title</label>
                                            <input type="text" class="form-control" name="core_feature_4_title" placeholder="Fleet Management" value="{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][3]['title'] ?? '') : 'Fleet Management' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Feature 4 Description</label>
                                            <textarea class="form-control" name="core_feature_4_description" rows="2" placeholder="Comprehensive fleet management tools">{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][3]['description'] ?? '') : 'Comprehensive fleet management tools for maintenance, scheduling, and reporting.' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Intro Section
                                </button>
                            </div>
                        </form>
                    </div>  

                    <!-- Core Capabilities Section -->
                    <div class="section-content" id="core-features-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    Core Capabilities Section
                                </h2>
        
                            </div>
                        </div>
                        
                        <form id="coreFeaturesForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="core_features_title" rows="2" placeholder="Core Capabilities">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['title'] ?? '') : 'Core Capabilities' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="core_features_subtitle" placeholder="Everything you need to manage your fleet efficiently" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['subtitle'] ?? '') : 'Everything you need to manage your fleet efficiently' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Capability 1 -->
                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Capability 1: Real-Time Vehicle Location Tracking
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="capability_1_title" placeholder="Real-Time Vehicle Location Tracking" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['title'] ?? '') : 'Real-Time Vehicle Location Tracking' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Subtitle</label>
                                            <input type="text" class="form-control" name="capability_1_subtitle" placeholder="Know Exactly Where Every Vehicle Is" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['subtitle'] ?? '') : 'Know Exactly Where Every Vehicle Is' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="capability_1_description" rows="3" placeholder="Qubify VTS updates locations in real time...">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['description'] ?? '') : 'Qubify VTS updates locations in real time, giving you complete visibility into your fleet operations with precise GPS tracking and instant notifications.' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Features (3 items)</label>
                                            <input type="text" class="form-control mb-2" name="capability_1_feature_1" placeholder="Live GPS tracking with instant updates" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['features'][0] ?? '') : 'Live GPS tracking with instant updates' }}">
                                            <input type="text" class="form-control mb-2" name="capability_1_feature_2" placeholder="Movement trails and speed monitoring" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['features'][1] ?? '') : 'Movement trails and speed monitoring' }}">
                                            <input type="text" class="form-control" name="capability_1_feature_3" placeholder="Vehicle status and health indicators" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['features'][2] ?? '') : 'Vehicle status and health indicators' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Dashboard Stats (3 items)</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control mb-2" name="capability_1_stat_1_label" placeholder="Vehicle TR-001" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['dashboard_stats'][0]['label'] ?? '') : 'Vehicle TR-001' }}">
                                                    <input type="text" class="form-control mb-2" name="capability_1_stat_2_label" placeholder="Current Speed" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['dashboard_stats'][1]['label'] ?? '') : 'Current Speed' }}">
                                                    <input type="text" class="form-control" name="capability_1_stat_3_label" placeholder="ETA" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['dashboard_stats'][2]['label'] ?? '') : 'ETA' }}">
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control mb-2" name="capability_1_stat_1_value" placeholder="Moving" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['dashboard_stats'][0]['value'] ?? '') : 'Moving' }}">
                                                    <input type="text" class="form-control mb-2" name="capability_1_stat_2_value" placeholder="65 km/h" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['dashboard_stats'][1]['value'] ?? '') : '65 km/h' }}">
                                                    <input type="text" class="form-control" name="capability_1_stat_3_value" placeholder="45 mins" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][0]['dashboard_stats'][2]['value'] ?? '') : '45 mins' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Capability 2 -->
                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-route"></i>
                                    Capability 2: Route Optimization & History
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="capability_2_title" placeholder="Route Optimization & History" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['title'] ?? '') : 'Route Optimization & History' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Subtitle</label>
                                            <input type="text" class="form-control" name="capability_2_subtitle" placeholder="Optimize Routes for Maximum Efficiency" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['subtitle'] ?? '') : 'Optimize Routes for Maximum Efficiency' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="capability_2_description" rows="3" placeholder="Plan the most efficient routes and track historical data...">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['description'] ?? '') : 'Plan the most efficient routes and track historical data to reduce fuel costs, minimize travel time, and improve customer satisfaction.' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Features (3 items)</label>
                                            <input type="text" class="form-control mb-2" name="capability_2_feature_1" placeholder="AI-powered route optimization" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['features'][0] ?? '') : 'AI-powered route optimization' }}">
                                            <input type="text" class="form-control mb-2" name="capability_2_feature_2" placeholder="Historical route analysis" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['features'][1] ?? '') : 'Historical route analysis' }}">
                                            <input type="text" class="form-control" name="capability_2_feature_3" placeholder="Traffic and weather integration" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['features'][2] ?? '') : 'Traffic and weather integration' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Dashboard Stats (3 items)</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control mb-2" name="capability_2_stat_1_label" placeholder="Fuel Saved" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['dashboard_stats'][0]['label'] ?? '') : 'Fuel Saved' }}">
                                                    <input type="text" class="form-control mb-2" name="capability_2_stat_2_label" placeholder="Time Reduced" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['dashboard_stats'][1]['label'] ?? '') : 'Time Reduced' }}">
                                                    <input type="text" class="form-control" name="capability_2_stat_3_label" placeholder="Routes Optimized" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['dashboard_stats'][2]['label'] ?? '') : 'Routes Optimized' }}">
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control mb-2" name="capability_2_stat_1_value" placeholder="25%" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['dashboard_stats'][0]['value'] ?? '') : '25%' }}">
                                                    <input type="text" class="form-control mb-2" name="capability_2_stat_2_value" placeholder="30 mins" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['dashboard_stats'][1]['value'] ?? '') : '30 mins' }}">
                                                    <input type="text" class="form-control" name="capability_2_stat_3_value" placeholder="156" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][1]['dashboard_stats'][2]['value'] ?? '') : '156' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Capability 3 -->
                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-user-check"></i>
                                    Capability 3: Driver Performance Analytics
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="capability_3_title" placeholder="Driver Performance Analytics" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['title'] ?? '') : 'Driver Performance Analytics' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Subtitle</label>
                                            <input type="text" class="form-control" name="capability_3_subtitle" placeholder="Monitor and Improve Driver Behavior" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['subtitle'] ?? '') : 'Monitor and Improve Driver Behavior' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="capability_3_description" rows="3" placeholder="Track driver behavior patterns and performance metrics...">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['description'] ?? '') : 'Track driver behavior patterns and performance metrics to improve safety, reduce accidents, and optimize fleet operations.' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Features (3 items)</label>
                                            <input type="text" class="form-control mb-2" name="capability_3_feature_1" placeholder="Speed and harsh driving detection" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['features'][0] ?? '') : 'Speed and harsh driving detection' }}">
                                            <input type="text" class="form-control mb-2" name="capability_3_feature_2" placeholder="Driver scoring and rankings" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['features'][1] ?? '') : 'Driver scoring and rankings' }}">
                                            <input type="text" class="form-control" name="capability_3_feature_3" placeholder="Performance improvement insights" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['features'][2] ?? '') : 'Performance improvement insights' }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Dashboard Stats (3 items)</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-control mb-2" name="capability_3_stat_1_label" placeholder="Driver Score" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['dashboard_stats'][0]['label'] ?? '') : 'Driver Score' }}">
                                                    <input type="text" class="form-control mb-2" name="capability_3_stat_2_label" placeholder="Safety Events" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['dashboard_stats'][1]['label'] ?? '') : 'Safety Events' }}">
                                                    <input type="text" class="form-control" name="capability_3_stat_3_label" placeholder="Fuel Efficiency" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['dashboard_stats'][2]['label'] ?? '') : 'Fuel Efficiency' }}">
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control mb-2" name="capability_3_stat_1_value" placeholder="92/100" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['dashboard_stats'][0]['value'] ?? '') : '92/100' }}">
                                                    <input type="text" class="form-control mb-2" name="capability_3_stat_2_value" placeholder="2 this week" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['dashboard_stats'][1]['value'] ?? '') : '2 this week' }}">
                                                    <input type="text" class="form-control" name="capability_3_stat_3_value" placeholder="8.5 L/100km" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][2]['dashboard_stats'][2]['value'] ?? '') : '8.5 L/100km' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                          
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Core Capabilities Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Additional Features Section -->
                    <div class="section-content" id="additional-features-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-plus-circle"></i>
                                    Additional Features Section
                                </h2>
       
                            </div>
                        </div>
                        
                        <form id="additionalFeaturesForm">
                            @csrf
                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-th"></i>
                                    Feature Cards (6 Cards in 3-Column Grid)
                                </div>
                                <div class="row">
                                    <!-- Feature Card 1 -->
                                    <div class="col-md-12">
                                        <div class="card-inner">
                                            <h6>Feature Card 1</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <textarea class="form-control editor" name="feature_1_title" placeholder="Smart Alerts & Notifications">{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][0]['title'] ?? '') : 'Smart Alerts & Notifications' }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control editor" name="feature_1_subtitle" placeholder="Stay informed instantly" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][0]['subtitle'] ?? '') : 'Stay informed instantly' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control editor" name="feature_1_description" rows="2" placeholder="Get instant notifications for important events">{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][0]['description'] ?? '') : 'Get instant notifications for important events, maintenance schedules, and security alerts.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Feature Card 2 -->
                                    <div class="col-md-12">
                                        <div class="card-inner">
                                            <h6>Feature Card 2</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="feature_2_title" placeholder="Advanced Analytics" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][1]['title'] ?? '') : 'Advanced Analytics' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="feature_2_subtitle" placeholder="Data-driven insights" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][1]['subtitle'] ?? '') : 'Data-driven insights' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="feature_2_description" rows="2" placeholder="Comprehensive reports and analytics">{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][1]['description'] ?? '') : 'Comprehensive reports and analytics to optimize your fleet operations and reduce costs.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Feature Card 3 -->
                                    <div class="col-md-12">
                                        <div class="card-inner">
                                            <h6>Feature Card 3</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="feature_3_title" placeholder="Security & Anti-Theft" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][2]['title'] ?? '') : 'Security & Anti-Theft' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="feature_3_subtitle" placeholder="Protect your assets" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][2]['subtitle'] ?? '') : 'Protect your assets' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="feature_3_description" rows="2" placeholder="Advanced security features and theft protection">{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][2]['description'] ?? '') : 'Advanced security features and theft protection to keep your vehicles safe and secure.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Feature Card 4 -->
                                    <div class="col-md-12">
                                        <div class="card-inner">
                                            <h6>Feature Card 4</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="feature_4_title" placeholder="Mobile App Access" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][3]['title'] ?? '') : 'Mobile App Access' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="feature_4_subtitle" placeholder="Track on the go" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][3]['subtitle'] ?? '') : 'Track on the go' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="feature_4_description" rows="2" placeholder="Access your fleet data from anywhere">{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][3]['description'] ?? '') : 'Access your fleet data from anywhere with our mobile app for iOS and Android.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Feature Card 5 -->
                                    <div class="col-md-12">
                                        <div class="card-inner">
                                            <h6>Feature Card 5</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="feature_5_title" placeholder="Maintenance Scheduling" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][4]['title'] ?? '') : 'Maintenance Scheduling' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="feature_5_subtitle" placeholder="Keep vehicles running" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][4]['subtitle'] ?? '') : 'Keep vehicles running' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="feature_5_description" rows="2" placeholder="Automated maintenance reminders and scheduling">{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][4]['description'] ?? '') : 'Automated maintenance reminders and scheduling to keep your fleet in optimal condition.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Feature Card 6 -->
                                    <div class="col-md-12">
                                        <div class="card-inner">
                                            <h6>Feature Card 6</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="feature_6_title" placeholder="API Integration" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][5]['title'] ?? '') : 'API Integration' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="feature_6_subtitle" placeholder="Connect with existing systems" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][5]['subtitle'] ?? '') : 'Connect with existing systems' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="feature_6_description" rows="2" placeholder="Seamless integration with your existing business systems">{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][5]['description'] ?? '') : 'Seamless integration with your existing business systems through our comprehensive API.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Additional Features Section
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
                                        <textarea class="form-control editor" name="hardware_title" rows="2" placeholder="Hardware Integration">{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['title'] ?? '') : 'Hardware Integration' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="hardware_description" rows="3" placeholder="Compatible with a wide range of GPS tracking devices...">{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['description'] ?? '') : 'Compatible with a wide range of GPS tracking devices and hardware solutions to meet your specific fleet management needs.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-microchip"></i>
                                    Hardware Types (4 Types in 4-Column Grid)
                                </div>
                                <div class="row">
                                    <!-- Hardware Type 1 -->
                                    <div class="col-md-12">
                                        <div class="card-inner">
                                            <h6>Hardware Type 1</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="hardware_1_title" placeholder="GPS Trackers" value="{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['hardware_types'][0]['title'] ?? '') : 'GPS Trackers' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="hardware_1_description" rows="3" placeholder="High-precision GPS tracking devices">{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['hardware_types'][0]['description'] ?? '') : 'High-precision GPS tracking devices for accurate real-time location monitoring and route tracking.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Hardware Type 2 -->
                                    <div class="col-md-12">
                                        <div class="card-inner">
                                            <h6>Hardware Type 2</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="hardware_2_title" placeholder="Dash Cameras" value="{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['hardware_types'][1]['title'] ?? '') : 'Dash Cameras' }}">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="hardware_2_description" rows="3" placeholder="Advanced dash cameras for safety monitoring">{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['hardware_types'][1]['description'] ?? '') : 'Advanced dash cameras for safety monitoring and incident recording with real-time video streaming.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Hardware Type 3 -->
                                    <div class="col-md-12">
                                        <div class="card-inner">
                                            <h6>Hardware Type 3</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="hardware_3_title" placeholder="Temperature Sensors" value="{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['hardware_types'][2]['title'] ?? '') : 'Temperature Sensors' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="hardware_3_description" rows="3" placeholder="Temperature monitoring for cold chain logistics">{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['hardware_types'][2]['description'] ?? '') : 'Temperature monitoring sensors for cold chain logistics and cargo protection with real-time alerts.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Hardware Type 4 -->
                                    <div class="col-md-12">
                                        <div class="card-inner">
                                            <h6>Hardware Type 4</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="hardware_4_title" placeholder="Fuel Sensors" value="{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['hardware_types'][3]['title'] ?? '') : 'Fuel Sensors' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="hardware_4_description" rows="3" placeholder="Fuel level monitoring and theft prevention">{{ isset($hardwareIntegrationContent) && $hardwareIntegrationContent ? ($hardwareIntegrationContent->content_json['hardware_types'][3]['description'] ?? '') : 'Fuel level monitoring and theft prevention systems with accurate consumption tracking and alerts.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Hardware Integration Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Use Cases Section -->
                    <div class="section-content" id="use-cases-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-industry"></i>
                                    Use Cases Across Industries Section
                                </h2>
                       
                            </div>
                        </div>
                        
                        <form id="useCasesForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="use_cases_title" rows="2" placeholder="Use Cases Across Industries">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['title'] ?? '') : 'Use Cases Across Industries' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control" name="use_cases_description" rows="3" placeholder="Qubify VTS adapts to various industry needs...">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['description'] ?? '') : 'Qubify VTS adapts to various industry needs, providing specialized tracking and management solutions for different business sectors.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-industry"></i>
                                    Industry Use Cases (8 Use Cases in 4-Column Grid)
                                </div>
                                <div class="row">
                                    <!-- Use Case 1 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Use Case 1</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="use_case_1_title" placeholder="Logistics & Transportation" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][0]['title'] ?? '') : 'Logistics & Transportation' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="use_case_1_description" rows="3" placeholder="Optimize delivery routes and track shipments">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][0]['description'] ?? '') : 'Optimize delivery routes, track shipments in real-time, and improve customer satisfaction with accurate ETAs.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Use Case 2 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Use Case 2</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="use_case_2_title" placeholder="Construction" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][1]['title'] ?? '') : 'Construction' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="use_case_2_description" rows="3" placeholder="Monitor equipment and vehicle usage on job sites">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][1]['description'] ?? '') : 'Monitor equipment and vehicle usage on job sites, prevent theft, and optimize resource allocation.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Use Case 3 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Use Case 3</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="use_case_3_title" placeholder="Retail & E-commerce" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][2]['title'] ?? '') : 'Retail & E-commerce' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="use_case_3_description" rows="3" placeholder="Track delivery vehicles and ensure timely deliveries">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][2]['description'] ?? '') : 'Track delivery vehicles, ensure timely deliveries, and provide customers with real-time delivery updates.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Use Case 4 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Use Case 4</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="use_case_4_title" placeholder="Healthcare" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][3]['title'] ?? '') : 'Healthcare' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="use_case_4_description" rows="3" placeholder="Track ambulances and medical supply vehicles">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][3]['description'] ?? '') : 'Track ambulances and medical supply vehicles, ensure emergency response efficiency and patient care.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Use Case 5 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Use Case 5</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="use_case_5_title" placeholder="Food & Beverage" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][4]['title'] ?? '') : 'Food & Beverage' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="use_case_5_description" rows="3" placeholder="Monitor cold chain logistics and delivery vehicles">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][4]['description'] ?? '') : 'Monitor cold chain logistics, track delivery vehicles, and ensure food safety compliance.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Use Case 6 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Use Case 6</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="use_case_6_title" placeholder="Education" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][5]['title'] ?? '') : 'Education' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="use_case_6_description" rows="3" placeholder="Track school buses and ensure student safety">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][5]['description'] ?? '') : 'Track school buses, ensure student safety, and provide parents with real-time bus location updates.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Use Case 7 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Use Case 7</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="use_case_7_title" placeholder="Security Services" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][6]['title'] ?? '') : 'Security Services' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="use_case_7_description" rows="3" placeholder="Monitor security patrol vehicles and response teams">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][6]['description'] ?? '') : 'Monitor security patrol vehicles, track response teams, and ensure optimal coverage of protected areas.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Use Case 8 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Use Case 8</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="use_case_8_title" placeholder="Environmental Services" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][7]['title'] ?? '') : 'Environmental Services' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="use_case_8_description" rows="3" placeholder="Track waste collection and environmental monitoring vehicles">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][7]['description'] ?? '') : 'Track waste collection vehicles, monitor environmental services, and optimize route efficiency for sustainability.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Use Cases Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Benefits Section -->
                    <div class="section-content" id="benefits-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    Benefits At a Glance Section
                                </h2>
                      
                            </div>
                        </div>
                        
                        <form id="benefitsForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="benefits_title" rows="2" placeholder="Benefits At a Glance">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['title'] ?? '') : 'Benefits At a Glance' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    Benefits (6 Benefits in 3-Column Grid)
                                </div>
                                <div class="row">
                                    <!-- Benefit 1 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Benefit 1</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="benefit_1_title" placeholder="Cost Reduction" value="{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][0]['title'] ?? '') : 'Cost Reduction' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="benefit_1_description" rows="3" placeholder="Reduce fuel costs and operational expenses">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][0]['description'] ?? '') : 'Reduce fuel costs and operational expenses through optimized routing and efficient fleet management.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Benefit 2 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Benefit 2</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="benefit_2_title" placeholder="Time Efficiency" value="{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][1]['title'] ?? '') : 'Time Efficiency' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="benefit_2_description" rows="3" placeholder="Save time with automated tracking and reporting">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][1]['description'] ?? '') : 'Save time with automated tracking, reporting, and streamlined fleet management processes.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Benefit 3 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Benefit 3</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="benefit_3_title" placeholder="Enhanced Security" value="{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][2]['title'] ?? '') : 'Enhanced Security' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="benefit_3_description" rows="3" placeholder="Protect your vehicles and cargo with advanced security features">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][2]['description'] ?? '') : 'Protect your vehicles and cargo with advanced security features, theft prevention, and real-time alerts.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Benefit 4 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Benefit 4</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="benefit_4_title" placeholder="Improved Performance" value="{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][3]['title'] ?? '') : 'Improved Performance' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="benefit_4_description" rows="3" placeholder="Enhance driver performance and fleet efficiency">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][3]['description'] ?? '') : 'Enhance driver performance and fleet efficiency through detailed analytics and performance monitoring.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Benefit 5 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Benefit 5</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="benefit_5_title" placeholder="Customer Satisfaction" value="{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][4]['title'] ?? '') : 'Customer Satisfaction' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="benefit_5_description" rows="3" placeholder="Improve customer satisfaction with accurate delivery tracking">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][4]['description'] ?? '') : 'Improve customer satisfaction with accurate delivery tracking, timely updates, and reliable service.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Benefit 6 -->
                                    <div class="col-md-6">
                                        <div class="card-inner">
                                            <h6>Benefit 6</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="benefit_6_title" placeholder="Environmental Impact" value="{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][5]['title'] ?? '') : 'Environmental Impact' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="benefit_6_description" rows="3" placeholder="Reduce carbon footprint through optimized routes">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][5]['description'] ?? '') : 'Reduce carbon footprint through optimized routes, efficient fuel usage, and sustainable fleet management practices.' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Benefits Section
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
                                    Why Companies Choose Qubify VTS Section
                                </h2>
                   
                            </div>
                        </div>
                        
                        <form id="testimonialsForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="testimonials_title" rows="2" placeholder="Why Companies Choose Qubify VTS">{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['title'] ?? '') : 'Why Companies Choose Qubify VTS' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-quote-left"></i>
                                    Customer Testimonials (3 Testimonials in 3-Column Layout)
                                </div>
                                <div class="row">
                                    <!-- Testimonial 1 -->
                                    <div class="col-md-4">
                                        <div class="card-inner">
                                            <h6>Testimonial 1</h6>
                                            <div class="form-group">
                                                <label class="form-label">Customer Name</label>
                                                <input type="text" class="form-control" name="testimonial_1_name" placeholder="Sarah Johnson" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][0]['name'] ?? '') : 'Sarah Johnson' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Position</label>
                                                <input type="text" class="form-control" name="testimonial_1_position" placeholder="Fleet Manager, LogiCorp" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][0]['position'] ?? '') : 'Fleet Manager, LogiCorp' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Testimonial Text</label>
                                                <textarea class="form-control" name="testimonial_1_text" rows="4" placeholder="Qubify VTS has transformed our fleet operations...">{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][0]['text'] ?? '') : 'Qubify VTS has transformed our fleet operations. The real-time tracking and route optimization features have reduced our fuel costs by 25% and improved customer satisfaction significantly.' }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Star Rating (1-5)</label>
                                                <select class="form-control" name="testimonial_1_rating">
                                                    <option value="1" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][0]['rating'] ?? 5) == 1 ? 'selected' : '' }}>1 Star</option>
                                                    <option value="2" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][0]['rating'] ?? 5) == 2 ? 'selected' : '' }}>2 Stars</option>
                                                    <option value="3" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][0]['rating'] ?? 5) == 3 ? 'selected' : '' }}>3 Stars</option>
                                                    <option value="4" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][0]['rating'] ?? 5) == 4 ? 'selected' : '' }}>4 Stars</option>
                                                    <option value="5" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][0]['rating'] ?? 5) == 5 ? 'selected' : '' }}>5 Stars</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonial 2 -->
                                    <div class="col-md-4">
                                        <div class="card-inner">
                                            <h6>Testimonial 2</h6>
                                            <div class="form-group">
                                                <label class="form-label">Customer Name</label>
                                                <input type="text" class="form-control" name="testimonial_2_name" placeholder="Michael Chen" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][1]['name'] ?? '') : 'Michael Chen' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Position</label>
                                                <input type="text" class="form-control" name="testimonial_2_position" placeholder="Operations Director, FastTrack Delivery" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][1]['position'] ?? '') : 'Operations Director, FastTrack Delivery' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Testimonial Text</label>
                                                <textarea class="form-control" name="testimonial_2_text" rows="4" placeholder="The driver analytics feature has been a game-changer...">{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][1]['text'] ?? '') : 'The driver analytics feature has been a game-changer for our business. We can now monitor driver behavior, improve safety, and reduce insurance costs. Highly recommended!' }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Star Rating (1-5)</label>
                                                <select class="form-control" name="testimonial_2_rating">
                                                    <option value="1" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][1]['rating'] ?? 5) == 1 ? 'selected' : '' }}>1 Star</option>
                                                    <option value="2" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][1]['rating'] ?? 5) == 2 ? 'selected' : '' }}>2 Stars</option>
                                                    <option value="3" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][1]['rating'] ?? 5) == 3 ? 'selected' : '' }}>3 Stars</option>
                                                    <option value="4" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][1]['rating'] ?? 5) == 4 ? 'selected' : '' }}>4 Stars</option>
                                                    <option value="5" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][1]['rating'] ?? 5) == 5 ? 'selected' : '' }}>5 Stars</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Testimonial 3 -->
                                    <div class="col-md-4">
                                        <div class="card-inner">
                                            <h6>Testimonial 3</h6>
                                            <div class="form-group">
                                                <label class="form-label">Customer Name</label>
                                                <input type="text" class="form-control" name="testimonial_3_name" placeholder="Emily Rodriguez" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][2]['name'] ?? '') : 'Emily Rodriguez' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Position</label>
                                                <input type="text" class="form-control" name="testimonial_3_position" placeholder="CEO, Urban Transport Solutions" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][2]['position'] ?? '') : 'CEO, Urban Transport Solutions' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Testimonial Text</label>
                                                <textarea class="form-control" name="testimonial_3_text" rows="4" placeholder="Qubify VTS provides excellent value for money...">{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][2]['text'] ?? '') : 'Qubify VTS provides excellent value for money. The comprehensive features, reliable support, and user-friendly interface make it the perfect choice for our growing business.' }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Star Rating (1-5)</label>
                                                <select class="form-control" name="testimonial_3_rating">
                                                    <option value="1" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][2]['rating'] ?? 5) == 1 ? 'selected' : '' }}>1 Star</option>
                                                    <option value="2" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][2]['rating'] ?? 5) == 2 ? 'selected' : '' }}>2 Stars</option>
                                                    <option value="3" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][2]['rating'] ?? 5) == 3 ? 'selected' : '' }}>3 Stars</option>
                                                    <option value="4" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][2]['rating'] ?? 5) == 4 ? 'selected' : '' }}>4 Stars</option>
                                                    <option value="5" {{ isset($testimonialsContent) && $testimonialsContent && ($testimonialsContent->content_json['testimonials'][2]['rating'] ?? 5) == 5 ? 'selected' : '' }}>5 Stars</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
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
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="final_cta_title" rows="2" placeholder="Ready to Transform Your Fleet Management?">{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['title'] ?? '') : 'Ready to Transform Your Fleet Management?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control" name="final_cta_description" rows="3" placeholder="Join thousands of businesses that trust Qubify VTS...">{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['description'] ?? '') : 'Join thousands of businesses that trust Qubify VTS to optimize their fleet operations, reduce costs, and improve efficiency. Get started today and see the difference real-time tracking can make.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-tags"></i>
                                    Feature Pills (4 Features)
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature Pill 1</label>
                                            <input type="text" class="form-control" name="final_feature_pill_1" placeholder="✓ 30-Day Free Trial" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][0] ?? '') : '✓ 30-Day Free Trial' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature Pill 2</label>
                                            <input type="text" class="form-control" name="final_feature_pill_2" placeholder="✓ No Setup Fees" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][1] ?? '') : '✓ No Setup Fees' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature Pill 3</label>
                                            <input type="text" class="form-control" name="final_feature_pill_3" placeholder="✓ 24/7 Support" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][2] ?? '') : '✓ 24/7 Support' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature Pill 4</label>
                                            <input type="text" class="form-control" name="final_feature_pill_4" placeholder="✓ Easy Integration" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][3] ?? '') : '✓ Easy Integration' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-mouse-pointer"></i>
                                    CTA Buttons (2 Buttons)
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 1 Text</label>
                                            <input type="text" class="form-control" name="final_button1_text" placeholder="🔵 Start Free Trial" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['buttons'][0]['text'] ?? '') : '🔵 Start Free Trial' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="final_button2_text" placeholder="⚪ Schedule Demo" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['buttons'][1]['text'] ?? '') : '⚪ Schedule Demo' }}">
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
        // Section navigation with smooth transitions and active highlighting
        const sectionLinks = document.querySelectorAll('.section-nav-link');
        const sectionContents = document.querySelectorAll('.section-content');
        
        sectionLinks.forEach(link => {
            link.addEventListener('click', function() {
                const targetSection = this.getAttribute('data-section');
                const targetSectionElement = document.getElementById(targetSection + '-section');
                
                if (!targetSectionElement) return;
                
                // Remove active class from all links and sections with fade out
                sectionLinks.forEach(l => l.classList.remove('active'));
                sectionContents.forEach(s => {
                    s.classList.remove('active');
                    s.style.opacity = '0';
                    s.style.transform = 'translateX(-20px)';
                });
                
                // Add active class to clicked link with visual feedback
                this.classList.add('active');
                
                // Smooth transition for the target section
                setTimeout(() => {
                targetSectionElement.classList.add('active');
                targetSectionElement.style.opacity = '1';
                targetSectionElement.style.transform = 'translateX(0)';
            }, 150);
            
            // Scroll to top of content area smoothly
            const contentArea = document.querySelector('.content-area');
            if (contentArea) {
                contentArea.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Initialize first section with proper styling
    const firstSection = document.querySelector('.section-content.active');
    if (firstSection) {
        firstSection.style.opacity = '1';
        firstSection.style.transform = 'translateX(0)';
    }
    
    // Toggle switches with dynamic label updates
    const toggleSwitches = document.querySelectorAll('.section-toggle input[type="checkbox"]');
    toggleSwitches.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const label = this.nextElementSibling;
            const isChecked = this.checked;
            
            // Update label with smooth transition
            label.style.opacity = '0.5';
            setTimeout(() => {
                label.textContent = isChecked ? 'On' : 'Off';
                label.style.opacity = '1';
                label.style.color = isChecked ? '#10b981' : '#6b7280';
            }, 100);
            
            // Call toggle section function
            toggleSection(this.id, isChecked);
        });
    });
    
    // Enhanced form submissions with AJAX
    const forms = document.querySelectorAll('form[id$="Form"]');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            submitFormAjax(this);
        });
    });
    
    // Section toggle functionality
    function toggleSection(switchId, isActive) {
        const sectionName = switchId.replace('Switch', '');
        const formData = new FormData();
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append('section', sectionName);
        formData.append('is_active', isActive ? '1' : '0');
        
        fetch('{{ route("admin.vts-development.toggle-section") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Section status updated successfully!', 'success');
            } else {
                showNotification('Error updating section status: ' + (data.message || 'Unknown error'), 'error');
                // Revert toggle state on error
                const toggle = document.getElementById(switchId);
                toggle.checked = !isActive;
                const label = toggle.nextElementSibling;
                label.textContent = !isActive ? 'On' : 'Off';
                label.style.color = !isActive ? '#10b981' : '#6b7280';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Network error occurred while updating section status', 'error');
            // Revert toggle state on error
            const toggle = document.getElementById(switchId);
            toggle.checked = !isActive;
            const label = toggle.nextElementSibling;
            label.textContent = !isActive ? 'On' : 'Off';
            label.style.color = !isActive ? '#10b981' : '#6b7280';
        });
    }
    
    // AJAX form submission function
    function submitFormAjax(form) {
        const formId = form.id;
        const submitButton = form.querySelector('button[type="submit"]');
        const originalButtonText = submitButton.innerHTML;
        
        // Show loading state
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
        
        // Clear previous validation errors
        clearValidationErrors(form);
        
        const formData = new FormData(form);
        
        // Determine the route based on form ID
        let route = '';
        switch(formId) {
            case 'heroForm':
                route = '{{ route("admin.vts-development.save-hero") }}';
                break;
            case 'introForm':
                route = '{{ route("admin.vts-development.save-intro") }}';
                break;
            case 'coreFeaturesForm':
                route = '{{ route("admin.vts-development.save-core-features") }}';
                break;
            case 'additionalFeaturesForm':
                route = '{{ route("admin.vts-development.save-additional-features") }}';
                break;
            case 'hardwareIntegrationForm':
                route = '{{ route("admin.vts-development.save-hardware-integration") }}';
                break;
            case 'useCasesForm':
                route = '{{ route("admin.vts-development.save-use-cases") }}';
                break;
            case 'benefitsForm':
                route = '{{ route("admin.vts-development.save-benefits") }}';
                break;
            case 'testimonialsForm':
                route = '{{ route("admin.vts-development.save-testimonials") }}';
                break;
            case 'finalCtaForm':
                route = '{{ route("admin.vts-development.save-final-cta") }}';
                break;
            default:
                console.error('Unknown form ID:', formId);
                return;
        }
        
        fetch(route, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Section saved successfully!', 'success');
            } else {
                if (data.errors) {
                    displayValidationErrors(form, data.errors);
                    showNotification('Please fix the validation errors and try again.', 'error');
                } else {
                    showNotification('Error saving section: ' + (data.message || 'Unknown error'), 'error');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Network error occurred while saving section', 'error');
        })
        .finally(() => {
            // Restore button state
            submitButton.disabled = false;
            submitButton.innerHTML = originalButtonText;
        });
    }
    
    // Notification system
    function showNotification(message, type = 'info') {
     
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 5000);
    }
    
    // Validation error handling
    function displayValidationErrors(form, errors) {
        Object.keys(errors).forEach(fieldName => {
            const field = form.querySelector(`[name="${fieldName}"]`);
            if (field) {
                field.classList.add('is-invalid');
                
                // Create or update error message
                let errorDiv = field.parentElement.querySelector('.invalid-feedback');
                if (!errorDiv) {
                    errorDiv = document.createElement('div');
                    errorDiv.className = 'invalid-feedback';
                    field.parentElement.appendChild(errorDiv);
                }
                errorDiv.textContent = errors[fieldName][0];
            }
        });
    }
    
    function clearValidationErrors(form) {
        const invalidFields = form.querySelectorAll('.is-invalid');
        invalidFields.forEach(field => {
            field.classList.remove('is-invalid');
        });
        
        const errorMessages = form.querySelectorAll('.invalid-feedback');
        errorMessages.forEach(error => error.remove());
    }
});
</script>

@endsection