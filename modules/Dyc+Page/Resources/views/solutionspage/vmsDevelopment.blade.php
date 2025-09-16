@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $coreFeaturesContent = $coreFeaturesContent ?? null;
    $benefitsContent = $benefitsContent ?? null;
    $useCasesContent = $useCasesContent ?? null;
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
                    <li class="breadcrumb-item active" aria-current="page">VMS Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">VMS Development Sections</h5>
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
                        <button class="section-nav-link" data-section="key-benefits">
                            <i class="fas fa-info-circle"></i>
                            Key Benefits
                        </button>
                        <button class="section-nav-link" data-section="core-features">
                            <i class="fas fa-cogs"></i>
                            Core Features
                        </button>
                        <button class="section-nav-link" data-section="real-security">
                            <i class="fas fa-info-circle"></i>
                            Real Security
                        </button>
                        <button class="section-nav-link" data-section="why-trust">
                            <i class="fas fa-thumbs-up"></i>
                            Why Trust
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
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Reimagine HR with VMS">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Reimagine HR with VMS' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="All-in-one Human Resource Management system software built to streamline workflows...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : "All-in-one Human Resource Management system software built to streamline workflows, boost team engagement, and keep your organization compliant—automatically." }}</textarea>
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
                                            <input type="text" class="form-control" name="feature_pill_1" placeholder="Fully cloud-based" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][0] ?? '') : 'Fully cloud-based' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="feature_pill_2" placeholder="Mobile-ready" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][1] ?? '') : 'Mobile-ready' }}">
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
                                            <input type="text" class="form-control" name="button1_text" placeholder="🔵 Start Free Trial" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][0]['text'] ?? '') : '🔵 Start Free Trial' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="button2_text" placeholder="⚪ Book a Live Demo" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['text'] ?? '') : '⚪ Book a Live Demo' }}">
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
                                        <textarea class="form-control editor" name="intro_title" rows="2"
                                            placeholder="What is Qubify VMS?">{{ isset($introContent) && $introContent ? ($introContent->content_json['title'] ?? '') : 'What is Qubify VMS?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="intro_description" rows="4"
                                            placeholder="Your Business. Fully Connected.">{{ isset($introContent) && $introContent ? ($introContent->content_json['description'] ?? '') : 'Your Business. Fully Connected.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    ['title' => 'VMS & Leads', 'description' => 'Client management and lead tracking'],
                                    ['title' => 'Invoicing', 'description' => 'Automated billing and payments'],
                                    ['title' => 'Projects', 'description' => 'Task tracking and collaboration'],
                                    ['title' => 'HR', 'description' => 'Team management and attendance']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Feature {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" 
                                                    name="feature{{ $i }}_title" 
                                                    placeholder="{{ $defaultFeatures[$i-1]['title'] }}" 
                                                    value="{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][$i-1]['title'] ?? '') : $defaultFeatures[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" 
                                                    name="feature{{ $i }}_description" 
                                                    rows="2" 
                                                    placeholder="{{ $defaultFeatures[$i-1]['description'] }}">{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][$i-1]['description'] ?? '') : $defaultFeatures[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Intro Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Key benefits Section -->
                    <div class="section-content" id="key-benefits-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-star"></i>
                                    Key Benefits Section
                                </h2>
                            </div>
                        </div>

                        <form id="keybenefitForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="benefits_title">{{ $keyBenefitsContent->content_json['title'] ?? 'Key Benefits' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultBenefits = [
                                    ['title' => 'Enhanced Security', 'description' => 'VMS uses Aadhaar verification and facial recognition to ensure every visitor is authenticated before entry. Every entry and exit is automatically logged and audit-ready.'],
                                    ['title' => 'Seamless Pre-Check-In', 'description' => 'Visitors receive digital invites, complete Aadhaar verification at home, and walk in using face authentication. Faster check-ins and fewer bottlenecks.'],
                                    ['title' => 'Contactless Authentication', 'description' => 'Eliminate manual ID checks with real-time facial recognition at entry points. Match visitor faces to pre-verified data for zero-contact experience.'],
                                    ['title' => 'Real-Time Tracking', 'description' => 'Keep tabs on who\'s on-site, when they entered, who they\'re meeting, and when they leave. Generate detailed reports for audits and compliance.']
                                ];
                            @endphp

                            @foreach($defaultBenefits as $index => $benefit)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        Benefit {{ $index + 1 }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control"
                                                    name="feature{{ $index + 1 }}_title"
                                                    value="{{ $keyBenefitsContent->content_json['features'][$index]['title'] ?? $benefit['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" rows="3"
                                                        name="feature{{ $index + 1 }}_description">{{ $keyBenefitsContent->content_json['features'][$index]['description'] ?? $benefit['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Key Benefits
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Real Security Section -->
                    <div class="section-content" id="real-security-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-shield-alt"></i>
                                    Real Security Section
                                </h2>
                            </div>
                        </div>

                        <form id="realSecurityForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="section_title">{{ $realSecurityContent->content_json['title'] ?? 'Built for Any Facility That Requires Real Security' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control editor" rows="2" name="section_subtitle">{{ $realSecurityContent->content_json['subtitle'] ?? 'VMS is flexible enough for SMBs and powerful enough for high-traffic, high-security zones.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFacilities = [
                                    ['title' => 'Corporate Offices', 'description' => 'Greet clients and partners with streamlined digital entry'],
                                    ['title' => 'Hospitals', 'description' => 'Authenticate vendors, patients, and visitors without slowing operations'],
                                    ['title' => 'Government Facilities', 'description' => 'Control access to sensitive zones with real-time verification'],
                                    ['title' => 'Industrial Sites', 'description' => 'Ensure safety and track contractor and vendor movement easily'],
                                ];
                            @endphp

                            @foreach($defaultFacilities as $index => $facility)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        Facility {{ $index + 1 }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control"
                                                    name="facility{{ $index + 1 }}_title"
                                                    value="{{ $realSecurityContent->content_json['facilities'][$index]['title'] ?? $facility['title'] }}">
                                            </div>
                                        </div>
                                       
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" rows="2"
                                                    name="facility{{ $index + 1 }}_description">{{ $realSecurityContent->content_json['facilities'][$index]['description'] ?? $facility['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Real Security
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
                                        <textarea class="form-control editor" name="capabilities_title" placeholder="Core Capabilities">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['title'] ?? '') : 'Core Capabilities' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="capabilities_description" rows="2" placeholder="Everything your business needs in one powerful platform">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['description'] ?? '') : 'Everything your business needs in one powerful platform' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultCapabilities = [
                                    [
                                        'icon' => 'fas fa-diamond',
                                        'icon_color' => '#4F94FF',
                                        'title' => 'VMS & Lead Management',
                                        'subtitle' => 'Organize. Track. Convert',
                                        'description' => 'Organize unlimited clients, track leads, and convert them with a single click. Each client profile includes notes, activity history, assigned team members, and secure file uploads. Use custom tags and filters to segment your database and keep everything searchable.',
                                        'features' => [
                                            'Unlimited client profiles with full history',
                                            'Custom tags and advanced filtering',
                                            'One-click lead conversion'
                                        ],
                                        'dashboard' => [
                                            'title' => 'VMS Dashboard',
                                            'color' => '#4F94FF',
                                            'stats' => [
                                                ['label' => 'Hot Leads', 'value' => '23'],
                                                ['label' => 'Conversions', 'value' => '18%'],
                                                ['label' => 'Pipeline Value', 'value' => '₹12.3L']
                                            ]
                                        ]
                                    ],
                                    [
                                        'icon' => 'fas fa-diamond',
                                        'icon_color' => '#22C55E',
                                        'title' => 'Proforma Invoicing & Billing',
                                        'subtitle' => 'Professional Billing Made Simple',
                                        'description' => 'Send branded quotes, invoices, and receipts in seconds. You can convert estimates into projects or recurring invoices automatically. Built-in support for PayPal, Stripe, Paytm, and multi-currency payments makes it ideal for global teams. Dues and transactions are tracked in real time.',
                                        'features' => [
                                            'Branded quotes and invoices',
                                            'Multiple payment gateways',
                                            'Multi-currency support'
                                        ],
                                        'dashboard' => [
                                            'title' => 'Invoice Generator',
                                            'color' => '#22C55E',
                                            'stats' => [
                                                ['label' => 'Sent This Month', 'value' => '89'],
                                                ['label' => 'Payment Rate', 'value' => '94%'],
                                                ['label' => 'Outstanding', 'value' => '₹2.1L']
                                            ]
                                        ]
                                    ],
                                    [
                                        'icon' => 'fas fa-diamond',
                                        'icon_color' => '#A855F7',
                                        'title' => 'HR & Team Management',
                                        'subtitle' => 'All Your People. One Platform',
                                        'description' => 'Monitor employee attendance with time cards and IP-restricted check-ins. HR teams can post internal announcements, approve leave requests, assign user roles, and generate productivity reports without needing a separate HR platform.',
                                        'features' => [
                                            'Time tracking and attendance',
                                            'Leave request management',
                                            'Role-based access control'
                                        ],
                                        'dashboard' => [
                                            'title' => 'HR Dashboard',
                                            'color' => '#A855F7',
                                            'stats' => [
                                                ['label' => 'Team Members', 'value' => '47'],
                                                ['label' => 'Present Today', 'value' => '44'],
                                                ['label' => 'Pending Leaves', 'value' => '3']
                                            ]
                                        ]
                                    ],
                                    [
                                        'icon' => 'fas fa-diamond',
                                        'icon_color' => '#6366F1',
                                        'title' => 'Project & Task Tracking',
                                        'subtitle' => 'From Deadlines to Deliverables',
                                        'description' => 'Create projects, assign tasks, and monitor progress with built-in time tracking and status updates. Use checklists, recurring tasks, and priority markers to keep everything on track. Team collaboration happens directly within each task.'
                                    ],
                                    [
                                        'icon' => 'fas fa-diamond',
                                        'icon_color' => '#06B6D4',
                                        'title' => 'Team Chat & Support Desk',
                                        'subtitle' => 'Communication & Customer Support',
                                        'description' => 'Built-in communication tools let your team chat internally or with clients in real time. Announcements, shared calendars, and personal to-do lists keep everyone aligned. For customer issues, Qubify includes a full helpdesk with ticket management.'
                                    ]
                                ];
                            @endphp

                            @foreach($defaultCapabilities as $index => $capability)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="{{ $capability['icon'] }}"></i>
                                        Capability {{ $index + 1 }} - {{ $capability['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="capability{{ $index + 1 }}_title" placeholder="{{ $capability['title'] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['title'] ?? '') : $capability['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="capability{{ $index + 1 }}_subtitle" placeholder="{{ $capability['subtitle'] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['subtitle'] ?? '') : $capability['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="capability{{ $index + 1 }}_description" rows="3" placeholder="{{ $capability['description'] }}">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['description'] ?? '') : $capability['description'] }}</textarea>
                                            </div>
                                        </div>
                                        @if($index < 3)
                                        <!-- Features -->
                                        @for($i = 1; $i <= 3; $i++)
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Feature {{ $i }}</label>
                                                    <input type="text" class="form-control" name="capability{{ $index + 1 }}_feature{{ $i }}" placeholder="{{ $capability['features'][$i-1] ?? '' }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['features'][$i-1] ?? '') : ($capability['features'][$i-1] ?? '') }}">
                                                </div>
                                            </div>
                                        @endfor

                                        
                                            <!-- Dashboard Settings (only for first 3 capabilities) -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Dashboard Title</label>
                                                    <input type="text" class="form-control" name="capability{{ $index + 1 }}_dashboard_title" placeholder="{{ $capability['dashboard']['title'] ?? '' }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['dashboard']['title'] ?? '') : ($capability['dashboard']['title'] ?? '') }}">
                                                </div>
                                            </div>

                                            <!-- Dashboard Stats -->
                                            @for($j = 1; $j <= 3; $j++)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Stat {{ $j }} Label</label>
                                                        <input type="text" class="form-control" name="capability{{ $index + 1 }}_stat{{ $j }}_label" placeholder="{{ $capability['dashboard']['stats'][$j-1]['label'] ?? '' }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['dashboard']['stats'][$j-1]['label'] ?? '') : ($capability['dashboard']['stats'][$j-1]['label'] ?? '') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Stat {{ $j }} Value</label>
                                                        <input type="text" class="form-control" name="capability{{ $index + 1 }}_stat{{ $j }}_value" placeholder="{{ $capability['dashboard']['stats'][$j-1]['value'] ?? '' }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['dashboard']['stats'][$j-1]['value'] ?? '') : ($capability['dashboard']['stats'][$j-1]['value'] ?? '') }}">
                                                    </div>
                                                </div>
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Core Capabilities Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- why trust Section -->
                    <div class="section-content" id="why-trust-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    Why Trust Section
                                </h2>
                
                            </div>
                        </div>
                        
                        <form id="whyTrustForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="whyTrust_title" placeholder="Why Teams Choose VMS">{{ isset($whyTrustContent) && $whyTrustContent ? ($whyTrustContent->content_json['title'] ?? '') : 'Why Teams Choose VMS' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultwhyTrust = [
                                    ['title' => 'Enhanced Compliance', 'description' => 'Every action is logged and encrypted. Built to meet global compliance standards for audits and data security.'],
                                    ['title' => 'Built to Scale', 'description' => 'Start small, grow big. Modular and flexible system that expands features as your team grows.'],
                                    ['title' => 'Save Time & Cut Costs', 'description' => 'Stop wasting hours on spreadsheets. Automate core processes and focus energy where it matters most.'],
                                    ['title' => 'Better Employee Experience', 'description' => 'Self-service portal for payslips, leave applications, and personal info—no HR tickets required.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                       
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Benefit {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="benefit{{ $i }}_title" placeholder="{{ $defaultwhyTrust[$i-1]['title'] }}" value="{{ isset($whyTrustContent) && $whyTrustContent ? ($whyTrustContent->content_json['why_trust'][$i-1]['title'] ?? '') : $defaultwhyTrust[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="benefit{{ $i }}_description" rows="2" placeholder="{{ $defaultwhyTrust[$i-1]['description'] }}">{{ isset($whyTrustContent) && $whyTrustContent ? ($whyTrustContent->content_json['why_trust'][$i-1]['description'] ?? '') : $defaultwhyTrust[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Why Trust Section
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
                                        <textarea class="form-control" name="testimonials_title" placeholder="What Customers Are Saying">{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['title'] ?? '') : 'What Customers Are Saying' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTestimonials = [
                                    ['name' => 'Maya P.', 'role' => 'VP of People', 'company' => 'SaaS Company', 'review' => 'We consolidated 4 tools into VMS. Payroll, performance, onboarding—it\'s all just there, and it works.', 'rating' => 5],
                                    ['name' => 'Leo D.', 'role' => 'HR Manager', 'company' => 'Logistics Firm', 'review' => 'Our payroll used to take two full days every month. Now it takes 30 minutes. That\'s the impact VMS had.', 'rating' => 5],
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
                                        <textarea class="form-control" name="final_cta_description" rows="4" placeholder="VMS gives you the tools to work smarter—not harder...">{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['description'] ?? '') : 'VMS gives you the tools to work smarter—not harder. Whether you\'re building a team or managing thousands, you\'ll have everything you need to stay in control.' }}</textarea>
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
                                            <input type="text" class="form-control" name="feature_pill_1" placeholder="🛠 No setup fees" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][0] ?? '') : '🛠 Deployed in minutes' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="feature_pill_2" placeholder="⏱ Go live in under a week" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][1] ?? '') : '📱 Web, mobile & desktop access' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="feature_pill_3" placeholder="🔐 SOC2 & GDPR compliant" value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][2] ?? '') : '🔐 Encrypted & role-based access control' }}">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Section navigation
    const sectionLinks = document.querySelectorAll('.section-nav-link');
    const sectionContents = document.querySelectorAll('.section-content');

    sectionLinks.forEach(link => {
        link.addEventListener('click', function() {
            const targetSection = this.getAttribute('data-section');
            
            // Remove active class from all links and sections
            sectionLinks.forEach(l => l.classList.remove('active'));
            sectionContents.forEach(s => s.classList.remove('active'));
            
            // Add active class to clicked link and corresponding section
            this.classList.add('active');
            document.getElementById(targetSection + '-section').classList.add('active');
        });
    });

    // Form submissions
    const forms = ['heroForm', 'introForm', 'coreFeaturesForm', 'whyTrustForm', 'testimonialsForm', 'finalCtaForm','keybenefitForm','realSecurityForm'];
    const routes = {
        'heroForm': '{{ route("admin.vms-development.save-hero") }}',
        'introForm': '{{ route("admin.vms-development.save-intro") }}',
        'keybenefitForm': '{{ route("admin.vms-development.save-key-benefits") }}',
        'coreFeaturesForm': '{{ route("admin.vms-development.save-core-features") }}',
        'whyTrustForm': '{{ route("admin.vms-development.save-why-trust") }}',
        'testimonialsForm': '{{ route("admin.vms-development.save-testimonials") }}',
        'finalCtaForm': '{{ route("admin.vms-development.save-final-cta") }}',
        'realSecurityForm': '{{ route("admin.vms-development.save-real-security") }}'
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
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        showNotification('success', data.message);
                    } else {
                        // Show error message
                        showNotification('error', data.message);
                    }
                })
                .catch(error => {
                    showNotification('error', 'An error occurred while saving.');
                })
                .finally(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            });
        }
    });

    // Toggle switches
    const toggleSwitches = document.querySelectorAll('.section-toggle input[type="checkbox"]');
    toggleSwitches.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const sectionName = this.id.replace('Switch', '').replace(/([A-Z])/g, '_$1').toLowerCase().replace(/^_/, '');
            const isActive = this.checked;
            
            fetch('{{ route("admin.vms-development.toggle-section") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
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
                    // Update label
                    const label = this.nextElementSibling;
                    label.textContent = isActive ? 'On' : 'Off';
                } else {
                    showNotification('error', data.message);
                    // Revert toggle
                    this.checked = !isActive;
                }
            })
            .catch(error => {
                showNotification('error', 'An error occurred while updating section status.');
                // Revert toggle
                this.checked = !isActive;
            });
        });
    });

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