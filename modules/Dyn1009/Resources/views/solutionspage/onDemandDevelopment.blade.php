@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $coreFeaturesContent = $coreFeaturesContent ?? null;
    $additionalFeaturesContent = $additionalFeaturesContent ?? null;
    $useCasesContent = $useCasesContent ?? null;
    $highlightsContent = $highlightsContent ?? null;
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
                    <li class="breadcrumb-item"><a href="#">Solutions Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">On-Demand Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">On-Demand Development Sections</h5>
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
                        <button class="section-nav-link" data-section="additional-features">
                            <i class="fas fa-plus-circle"></i>
                            Additional Features
                        </button>
                        <button class="section-nav-link" data-section="use-cases">
                            <i class="fas fa-briefcase"></i>
                            Use Cases
                        </button>
                        <button class="section-nav-link" data-section="highlights">
                            <i class="fas fa-lightbulb"></i>
                            Highlights
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Title</label>
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Deliver Smarter Faster and in Real-Time">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Deliver Smarter Faster and in Real-Time' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="Qubify's On-Demand Delivery Software powers businesses with end-to-end control over every delivery...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : "Qubify's On-Demand Delivery Software powers businesses with end-to-end control over every delivery — from dispatch to doorstep. Whether you're managing food, packages, or field services, Qubify automates logistics, tracks drivers live, and enhances your customer experience." }}</textarea>
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
                                            <input type="text" class="form-control" name="hero_feature1" placeholder="Real-Time Tracking" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][0] ?? '') : 'Real-Time Tracking' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="hero_feature2" placeholder="Route Optimization" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][1] ?? '') : 'Route Optimization' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="hero_feature3" placeholder="Customer Notifications" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][2] ?? '') : 'Customer Notifications' }}">
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
                                            <input type="text" class="form-control" name="hero_button1_text" placeholder="🔵 Book a Demo" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][0]['text'] ?? '') : '🔵 Book a Demo' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="hero_button2_text" placeholder="⚪ See It in Action" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['text'] ?? '') : '⚪ See It in Action' }}">
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="intro_title" rows="2" placeholder="What is Qubify On-Demand Delivery Software?">{{ isset($introContent) && $introContent ? ($introContent->content_json['title'] ?? '') : 'What is Qubify On-Demand Delivery Software?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="intro_description" rows="4" placeholder="Qubify's delivery platform enables you to digitize and manage every part of your on-demand logistics operation...">{{ isset($introContent) && $introContent ? ($introContent->content_json['description'] ?? '') : "Qubify's delivery platform enables you to digitize and manage every part of your on-demand logistics operation. From order assignments to last-mile tracking, the system is built to reduce delivery time, cut operational waste, and scale delivery capacity — without adding more people or complexity." }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control" name="intro_subtitle" rows="2" placeholder="It's the smart backbone for restaurants, e-commerce, courier services...">{{ isset($introContent) && $introContent ? ($introContent->content_json['subtitle'] ?? '') : "It's the smart backbone for restaurants, e-commerce, courier services, and hyperlocal businesses looking to move fast and keep customers loyal." }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    ['title' => 'Real-Time Tracking', 'description' => 'Live driver and order monitoring with ETAs', 'icon' => 'fas fa-map-marker-alt'],
                                    ['title' => 'Auto-Dispatch', 'description' => 'Smart order assignment to nearest drivers', 'icon' => 'fas fa-robot'],
                                    ['title' => 'Route Optimization', 'description' => 'Traffic-aware navigation and best paths', 'icon' => 'fas fa-route'],
                                    ['title' => 'Customer Portal', 'description' => 'Live updates and delivery notifications', 'icon' => 'fas fa-mobile-alt']
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="core_title" rows="2" placeholder="Core Capabilities">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['title'] ?? '') : 'Core Capabilities' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="core_subtitle" placeholder="Everything you need for complete delivery management" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['subtitle'] ?? '') : 'Everything you need for complete delivery management' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultCoreFeatures = [
                                    [
                                        'title' => 'Real-Time Driver & Order Tracking',
                                        'subtitle' => 'Complete Visibility, Every Step',
                                        'description' => 'Know exactly where every driver is, and where every order stands. Customers get live updates with ETAs and map tracking, while dispatchers can monitor delivery routes and address delays instantly.',
                                        'benefits' => ['Live driver location tracking', 'Customer ETA notifications', 'Instant delay resolution'],
                                        'stats' => [
                                            ['label' => 'Active Drivers', 'value' => '24/30'],
                                            ['label' => 'In Transit', 'value' => '67'],
                                            ['label' => 'Avg. ETA', 'value' => '23 min']
                                        ]
                                    ],
                                    [
                                        'title' => 'Automated Order Dispatching',
                                        'subtitle' => 'Smart Assignment, Maximum Efficiency',
                                        'description' => 'Incoming orders are auto-assigned to the nearest available driver based on location, capacity, and priority. The system balances workload in real time and ensures maximum efficiency.',
                                        'benefits' => ['Location-based smart assignment', 'Real-time workload balancing', 'Priority-based order handling'],
                                        'stats' => [
                                            ['label' => 'Orders Auto-Assigned', 'value' => '94%'],
                                            ['label' => 'Avg. Assignment Time', 'value' => '8s'],
                                            ['label' => 'Efficiency Gain', 'value' => '+42%']
                                        ]
                                    ],
                                    [
                                        'title' => 'Route Optimization Engine',
                                        'subtitle' => 'Fastest Path, Every Time',
                                        'description' => 'Qubify uses live traffic data and delivery windows to recommend the fastest, most cost-effective routes. Whether it\'s one drop or 100, your drivers take the best path every time.',
                                        'benefits' => ['Live traffic data integration', 'Multi-drop route optimization', 'Fuel efficiency maximization'],
                                        'stats' => [
                                            ['label' => 'Time Saved', 'value' => '32%'],
                                            ['label' => 'Fuel Efficiency', 'value' => '+18%'],
                                            ['label' => 'Drops/Hour', 'value' => '8.3']
                                        ]
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-cog"></i>
                                        Core Feature {{ $i }} - {{ $defaultCoreFeatures[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_title" placeholder="{{ $defaultCoreFeatures[$i-1]['title'] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['features'][$i-1]['title'] ?? '') : $defaultCoreFeatures[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_subtitle" placeholder="{{ $defaultCoreFeatures[$i-1]['subtitle'] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['features'][$i-1]['subtitle'] ?? '') : $defaultCoreFeatures[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="feature{{ $i }}_description" rows="3" placeholder="{{ $defaultCoreFeatures[$i-1]['description'] }}">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['features'][$i-1]['description'] ?? '') : $defaultCoreFeatures[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Benefit 1</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_benefit1" placeholder="{{ $defaultCoreFeatures[$i-1]['benefits'][0] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['features'][$i-1]['benefits'][0] ?? '') : $defaultCoreFeatures[$i-1]['benefits'][0] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Benefit 2</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_benefit2" placeholder="{{ $defaultCoreFeatures[$i-1]['benefits'][1] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['features'][$i-1]['benefits'][1] ?? '') : $defaultCoreFeatures[$i-1]['benefits'][1] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Benefit 3</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_benefit3" placeholder="{{ $defaultCoreFeatures[$i-1]['benefits'][2] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['features'][$i-1]['benefits'][2] ?? '') : $defaultCoreFeatures[$i-1]['benefits'][2] }}">
                                            </div>
                                        </div>
                                        @for($j = 1; $j <= 3; $j++)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $j }} Label</label>
                                                    <input type="text" class="form-control" name="feature{{ $i }}_stat{{ $j }}_label" placeholder="{{ $defaultCoreFeatures[$i-1]['stats'][$j-1]['label'] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['features'][$i-1]['stats'][$j-1]['label'] ?? '') : $defaultCoreFeatures[$i-1]['stats'][$j-1]['label'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $j }} Value</label>
                                                    <input type="text" class="form-control" name="feature{{ $i }}_stat{{ $j }}_value" placeholder="{{ $defaultCoreFeatures[$i-1]['stats'][$j-1]['value'] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['features'][$i-1]['stats'][$j-1]['value'] ?? '') : $defaultCoreFeatures[$i-1]['stats'][$j-1]['value'] }}">
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Core Features Section
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="additional_title" placeholder="Additional Features">{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['title'] ?? '') : 'Additional Features' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultAdditionalFeatures = [
                                    ['title' => 'Customer Experience Portal', 'subtitle' => 'Real-Time Engagement', 'description' => 'Customers get real-time notifications with driver info, delivery status, and live map tracking — keeping them informed, engaged, and confident throughout the process.', 'icon' => 'fas fa-user-check'],
                                    ['title' => 'Electronic Proof of Delivery', 'subtitle' => 'Digital Accountability', 'description' => 'Every delivery ends with digital proof — photo capture, signature, timestamp, or OTP confirmation. Logs sync instantly for full accountability and dispute resolution.', 'icon' => 'fas fa-clipboard-check'],
                                    ['title' => 'Admin Dashboard', 'subtitle' => 'Central Command', 'description' => 'Your entire delivery fleet, visualized and controlled in one dashboard. Assign tasks, view heatmaps, monitor SLAs, and generate reports from a single screen.', 'icon' => 'fas fa-tachometer-alt'],
                                    ['title' => 'Delivery Time Slots', 'subtitle' => 'Flexible Scheduling', 'description' => 'Give customers preferred delivery windows. Support instant, same-day, or next-day delivery with dynamic slot allocation based on capacity and traffic.', 'icon' => 'fas fa-clock'],
                                    ['title' => 'Real-Time Alerts', 'subtitle' => 'Proactive Monitoring', 'description' => 'Never miss a delivery window. Get alerts for late deliveries, missed stops, or route deviations with full control to reassign before problems escalate.', 'icon' => 'fas fa-bell'],
                                    ['title' => 'Driver Mobile App', 'subtitle' => 'Complete Toolkit', 'description' => 'More than navigation — real-time route updates, task alerts, digital proof collection, and performance stats in one mobile toolkit.', 'icon' => 'fas fa-mobile-alt']
                                ];
                                
                                $defaultAdvancedFeatures = [
                                    ['title' => 'Integrated Billing & Payout Tools', 'subtitle' => 'Complete Financial Management', 'description' => 'Manage delivery charges, driver commissions, and vendor payments in one place. Generate automated invoices, track cash-on-delivery balances, and ensure payment accuracy across every partner.', 'icon' => 'fas fa-credit-card'],
                                    ['title' => 'Third-Party Integrations & APIs', 'subtitle' => 'Seamless Connectivity', 'description' => 'Already using e-commerce, POS, or warehouse platforms? Qubify integrates with your existing tools via secure APIs and webhooks — including payment gateways and CRM systems.', 'icon' => 'fas fa-plug']
                                ];
                            @endphp

                            <h4 class="mt-4 mb-3">Main Additional Features</h4>
                            @for($i = 1; $i <= 6; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-plus"></i>
                                        Additional Feature {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_title" placeholder="{{ $defaultAdditionalFeatures[$i-1]['title'] }}" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][$i-1]['title'] ?? '') : $defaultAdditionalFeatures[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_subtitle" placeholder="{{ $defaultAdditionalFeatures[$i-1]['subtitle'] }}" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][$i-1]['subtitle'] ?? '') : $defaultAdditionalFeatures[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="feature{{ $i }}_description" rows="3" placeholder="{{ $defaultAdditionalFeatures[$i-1]['description'] }}">{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['features'][$i-1]['description'] ?? '') : $defaultAdditionalFeatures[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <h4 class="mt-4 mb-3">Advanced Features</h4>
                            @for($i = 1; $i <= 2; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Advanced Feature {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="advanced_feature{{ $i }}_title" placeholder="{{ $defaultAdvancedFeatures[$i-1]['title'] }}" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['advanced_features'][$i-1]['title'] ?? '') : $defaultAdvancedFeatures[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="advanced_feature{{ $i }}_subtitle" placeholder="{{ $defaultAdvancedFeatures[$i-1]['subtitle'] }}" value="{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['advanced_features'][$i-1]['subtitle'] ?? '') : $defaultAdvancedFeatures[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="advanced_feature{{ $i }}_description" rows="3" placeholder="{{ $defaultAdvancedFeatures[$i-1]['description'] }}">{{ isset($additionalFeaturesContent) && $additionalFeaturesContent ? ($additionalFeaturesContent->content_json['advanced_features'][$i-1]['description'] ?? '') : $defaultAdvancedFeatures[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Additional Features Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Use Cases Section -->
                    <div class="section-content" id="use-cases-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-briefcase"></i>
                                    Use Cases Section
                                </h2>

                            </div>
                        </div>
                        
                        <form id="useCasesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="use_cases_title" placeholder="Use Cases Across Industries">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['title'] ?? '') : 'Use Cases Across Industries' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="use_cases_subtitle" placeholder="Qubify supports delivery operations for every sector — whether you deliver in minutes or by appointment, we adapt." value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['subtitle'] ?? '') : 'Qubify supports delivery operations for every sector — whether you deliver in minutes or by appointment, we adapt.' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultUseCases = [
                                    ['title' => 'Food & Beverage', 'description' => 'Hot food delivery with time-critical logistics', 'icon' => 'fas fa-utensils', 'color' => 'orange-600'],
                                    ['title' => 'E-commerce & D2C', 'description' => 'Package delivery with customer experience focus', 'icon' => 'fas fa-shopping-bag', 'color' => 'blue-600'],
                                    ['title' => 'Courier & Logistics', 'description' => 'Professional courier services and logistics', 'icon' => 'fas fa-shipping-fast', 'color' => 'green-600'],
                                    ['title' => 'Pharma & Healthcare', 'description' => 'Medicine delivery with compliance tracking', 'icon' => 'fas fa-pills', 'color' => 'red-600'],
                                    ['title' => 'Home Services', 'description' => 'Service professional dispatch and tracking', 'icon' => 'fas fa-tools', 'color' => 'purple-600'],
                                    ['title' => 'Retail & Grocery', 'description' => 'Same-day grocery and retail deliveries', 'icon' => 'fas fa-store', 'color' => 'teal-600'],
                                    ['title' => 'Education', 'description' => 'Document and educational material dispatch', 'icon' => 'fas fa-graduation-cap', 'color' => 'indigo-600'],
                                    ['title' => 'And More', 'description' => 'Custom solutions for your industry needs', 'icon' => 'fas fa-plus', 'color' => 'yellow-600']
                                ];
                            @endphp

                            @for($i = 1; $i <= 8; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-briefcase"></i>
                                        Use Case {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="case{{ $i }}_title" placeholder="{{ $defaultUseCases[$i-1]['title'] }}" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['cases'][$i-1]['title'] ?? '') : $defaultUseCases[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Icon Class</label>
                                                <input type="text" class="form-control" name="case{{ $i }}_icon" placeholder="{{ $defaultUseCases[$i-1]['icon'] }}" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['cases'][$i-1]['icon'] ?? '') : $defaultUseCases[$i-1]['icon'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Color Class</label>
                                                <input type="text" class="form-control" name="case{{ $i }}_color" placeholder="{{ $defaultUseCases[$i-1]['color'] }}" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['cases'][$i-1]['color'] ?? '') : $defaultUseCases[$i-1]['color'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="case{{ $i }}_description" rows="2" placeholder="{{ $defaultUseCases[$i-1]['description'] }}">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['cases'][$i-1]['description'] ?? '') : $defaultUseCases[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Use Cases Section
                                </button>
                            </div>
                        </form>
                    </div>         
           
                    <!-- Highlights Section -->
                    <div class="section-content" id="highlights-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-lightbulb"></i>
                                    Highlights Section
                                </h2>

                            </div>
                        </div>
                        
                        <form id="highlightsForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="highlights_title" placeholder="Highlights At a Glance">{{ isset($highlightsContent) && $highlightsContent ? ($highlightsContent->content_json['title'] ?? '') : 'Highlights At a Glance' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultHighlights = [
                                    ['title' => 'Real-time Tracking', 'description' => 'Driver and order tracking with live updates', 'icon' => 'fas fa-satellite-dish', 'color' => 'blue-600'],
                                    ['title' => 'Auto-assign & Batch', 'description' => 'Smart scheduling and workload optimization', 'icon' => 'fas fa-calendar-alt', 'color' => 'green-600'],
                                    ['title' => 'Route Optimization', 'description' => 'Traffic-aware navigation and best paths', 'icon' => 'fas fa-route', 'color' => 'purple-600'],
                                    ['title' => 'ePOD with Proof', 'description' => 'Digital proof with image, signature, OTP', 'icon' => 'fas fa-clipboard-check', 'color' => 'orange-600'],
                                    ['title' => 'Admin Dashboards', 'description' => 'Complete fleet control and monitoring', 'icon' => 'fas fa-tachometer-alt', 'color' => 'teal-600'],
                                    ['title' => 'Full-stack APIs', 'description' => 'Seamless integration with existing systems', 'icon' => 'fas fa-plug', 'color' => 'red-600'],
                                    ['title' => 'Mobile Apps', 'description' => 'Driver apps with real-time communication', 'icon' => 'fas fa-mobile-alt', 'color' => 'indigo-600'],
                                    ['title' => 'Smart Analytics', 'description' => 'Performance insights and optimization', 'icon' => 'fas fa-chart-line', 'color' => 'pink-600']
                                ];
                            @endphp

                            @for($i = 1; $i <= 8; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-lightbulb"></i>
                                        Highlight {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="highlight{{ $i }}_title" placeholder="{{ $defaultHighlights[$i-1]['title'] }}" value="{{ isset($highlightsContent) && $highlightsContent ? ($highlightsContent->content_json['highlights'][$i-1]['title'] ?? '') : $defaultHighlights[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Icon Class</label>
                                                <input type="text" class="form-control" name="highlight{{ $i }}_icon" placeholder="{{ $defaultHighlights[$i-1]['icon'] }}" value="{{ isset($highlightsContent) && $highlightsContent ? ($highlightsContent->content_json['highlights'][$i-1]['icon'] ?? '') : $defaultHighlights[$i-1]['icon'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Color Class</label>
                                                <input type="text" class="form-control" name="highlight{{ $i }}_color" placeholder="{{ $defaultHighlights[$i-1]['color'] }}" value="{{ isset($highlightsContent) && $highlightsContent ? ($highlightsContent->content_json['highlights'][$i-1]['color'] ?? '') : $defaultHighlights[$i-1]['color'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="highlight{{ $i }}_description" rows="2" placeholder="{{ $defaultHighlights[$i-1]['description'] }}">{{ isset($highlightsContent) && $highlightsContent ? ($highlightsContent->content_json['highlights'][$i-1]['description'] ?? '') : $defaultHighlights[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Highlights Section
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="testimonials_title" placeholder="Why Teams Trust Qubify's Delivery Platform">{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['title'] ?? '') : 'Why Teams Trust Qubify\'s Delivery Platform' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTestimonials = [
                                    ['name' => 'Sameer P.', 'position' => 'Head of Operations', 'company' => 'QuickServe India', 'content' => 'Since switching to Qubify, we\'ve reduced our average delivery time by 30% and increased drop rates by over 40%.', 'rating' => 5],
                                    ['name' => 'Manisha K.', 'position' => 'Co-founder', 'company' => 'Blit Grocery App', 'content' => 'The live tracking and auto-dispatch tools have been huge. We don\'t need a huge back-office team to scale now.', 'rating' => 5],
                                    ['name' => 'Rahul D.', 'position' => 'Product Manager', 'company' => 'UrbanPickup', 'content' => 'Our NPS scores went up because customers can now track deliveries like rides. That visibility changed everything.', 'rating' => 5]
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-quote-left"></i>
                                        Testimonial {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="testimonial{{ $i }}_name" placeholder="{{ $defaultTestimonials[$i-1]['name'] }}" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][$i-1]['name'] ?? '') : $defaultTestimonials[$i-1]['name'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Position</label>
                                                <input type="text" class="form-control" name="testimonial{{ $i }}_position" placeholder="{{ $defaultTestimonials[$i-1]['position'] }}" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][$i-1]['position'] ?? '') : $defaultTestimonials[$i-1]['position'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Company</label>
                                                <input type="text" class="form-control" name="testimonial{{ $i }}_company" placeholder="{{ $defaultTestimonials[$i-1]['company'] }}" value="{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][$i-1]['company'] ?? '') : $defaultTestimonials[$i-1]['company'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Rating (1-5)</label>
                                                <select class="form-control" name="testimonial{{ $i }}_rating">
                                                    @for($r = 1; $r <= 5; $r++)
                                                        <option value="{{ $r }}" {{ (isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][$i-1]['rating'] ?? $defaultTestimonials[$i-1]['rating']) : $defaultTestimonials[$i-1]['rating']) == $r ? 'selected' : '' }}>{{ $r }} Star{{ $r > 1 ? 's' : '' }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Testimonial Content</label>
                                                <textarea class="form-control" name="testimonial{{ $i }}_content" rows="3" placeholder="{{ $defaultTestimonials[$i-1]['content'] }}">{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['testimonials'][$i-1]['content'] ?? '') : $defaultTestimonials[$i-1]['content'] }}</textarea>
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">CTA Title</label>
                                        <textarea class="form-control editor" name="cta_title" placeholder="Ready to Deliver Like a Pro?">{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['title'] ?? '') : 'Ready to Deliver Like a Pro?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">CTA Description</label>
                                        <textarea class="form-control" name="cta_description" rows="3" placeholder="Whether you're launching a last-mile fleet or upgrading your operations, Qubify On-Demand Delivery Software gives you the tools to scale without chaos and deliver delight — every time.">{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['description'] ?? '') : 'Whether you\'re launching a last-mile fleet or upgrading your operations, Qubify On-Demand Delivery Software gives you the tools to scale without chaos and deliver delight — every time.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-tags"></i>
                                    Feature Pills
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature 1</label>
                                            <input type="text" class="form-control" name="cta_feature1" placeholder="📲 Mobile-first delivery ops" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][0] ?? '') : '📲 Mobile-first delivery ops' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="cta_feature2" placeholder="📦 End-to-end visibility & control" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][1] ?? '') : '📦 End-to-end visibility & control' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="cta_feature3" placeholder="📈 Actionable data, smart dispatch" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][2] ?? '') : '📈 Actionable data, smart dispatch' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature 4</label>
                                            <input type="text" class="form-control" name="cta_feature4" placeholder="🧩 Integrates with your tech stack" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][3] ?? '') : '🧩 Integrates with your tech stack' }}">
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
                                            <input type="text" class="form-control" name="cta_button1_text" placeholder="🚀 Schedule Your Demo" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['buttons'][0]['text'] ?? '') : '🚀 Schedule Your Demo' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 1 URL</label>
                                            <input type="text" class="form-control" name="cta_button1_url" placeholder="{{ route('frontend.index') }}#contact" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['buttons'][0]['url'] ?? '') : route('frontend.index') . '#contact' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="cta_button2_text" placeholder="📞 Talk to a Product Consultant" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['buttons'][1]['text'] ?? '') : '📞 Talk to a Product Consultant' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 URL</label>
                                            <input type="text" class="form-control" name="cta_button2_url" placeholder="tel:+917087076111" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['buttons'][1]['url'] ?? '') : 'tel:+917087076111' }}">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Section navigation
    $('.section-nav-link').click(function() {
        var section = $(this).data('section');
        
        // Update active nav link
        $('.section-nav-link').removeClass('active');
        $(this).addClass('active');
        
        // Show corresponding section
        $('.section-content').removeClass('active');
        $('#' + section + '-section').addClass('active');
    });

    // Toggle switches
    $('.section-toggle input[type="checkbox"]').change(function() {
        var isActive = $(this).is(':checked');
        var label = $(this).next('label');
        
        if (isActive) {
            label.text('On');
        } else {
            label.text('Off');
        }
        
        // Update section status via AJAX
        var sectionName = $(this).attr('id').replace('Switch', '').replace(/([A-Z])/g, '_$1').toLowerCase();
        if (sectionName.startsWith('_')) {
            sectionName = sectionName.substring(1);
        }
        
        $.ajax({
            url: '{{ route("admin.on-demand-development.toggle-section") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                section_name: sectionName,
                is_active: isActive
            },
            success: function(response) {
                if (response.success) {
                    showNotification('success', response.message);
                } else {
                    showNotification('error', response.message);
                }
            },
            error: function() {
                showNotification('error', 'Error updating section status');
            }
        });
    });

    // Form submissions
    $('#heroForm').submit(function(e) {
        e.preventDefault();
        submitForm(this, '{{ route("admin.on-demand-development.save-hero") }}', 'Hero section');
    });

    $('#introForm').submit(function(e) {
        e.preventDefault();
        submitForm(this, '{{ route("admin.on-demand-development.save-intro") }}', 'Intro section');
    });

    $('#coreFeaturesForm').submit(function(e) {
        e.preventDefault();
        submitForm(this, '{{ route("admin.on-demand-development.save-core-features") }}', 'Core Features section');
    });

    $('#additionalFeaturesForm').submit(function(e) {
        e.preventDefault();
        submitForm(this, '{{ route("admin.on-demand-development.save-additional-features") }}', 'Additional Features section');
    });

    $('#useCasesForm').submit(function(e) {
        e.preventDefault();
        submitForm(this, '{{ route("admin.on-demand-development.save-use-cases") }}', 'Use Cases section');
    });

    $('#highlightsForm').submit(function(e) {
        e.preventDefault();
        submitForm(this, '{{ route("admin.on-demand-development.save-highlights") }}', 'Highlights section');
    });

    $('#testimonialsForm').submit(function(e) {
        e.preventDefault();
        submitForm(this, '{{ route("admin.on-demand-development.save-testimonials") }}', 'Testimonials section');
    });

    $('#finalCtaForm').submit(function(e) {
        e.preventDefault();
        submitForm(this, '{{ route("admin.on-demand-development.save-final-cta") }}', 'Final CTA section');
    });

    function submitForm(form, url, sectionName) {
        var formData = new FormData(form);
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('is_active', true);

        var submitBtn = $(form).find('button[type="submit"]');
        var originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Saving...').prop('disabled', true);

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    showNotification('success', response.message);
                } else {
                    showNotification('error', response.message);
                }
            },
            error: function(xhr) {
                var errorMessage = 'Error saving ' + sectionName;
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showNotification('error', errorMessage);
            },
            complete: function() {
                submitBtn.html(originalText).prop('disabled', false);
            }
        });
    }

    function showNotification(type, message) {
        // Create notification element
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
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }
});
</script>

@endsection