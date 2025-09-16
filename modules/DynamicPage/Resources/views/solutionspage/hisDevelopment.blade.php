@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $whyChooseContent = $whyChooseContent ?? null;
    $coreFeaturesContent = $coreFeaturesContent ?? null;
    $additionalFeaturesContent = $additionalFeaturesContent ?? null;
    $whyTrustContent = $whyTrustContent ?? null;
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
                    <li class="breadcrumb-item active" aria-current="page">HIS Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">HIS Development Sections</h5>
                    </div>
                    <div class="sections-nav">
                        <button class="section-nav-link active" data-section="hero">
                            <i class="fas fa-star"></i>
                            Hero Section
                        </button>
                        <button class="section-nav-link" data-section="intro">
                            <i class="fas fa-info-circle"></i>
                            What is HIS
                        </button>
                        <button class="section-nav-link" data-section="why-choose">
                            <i class="fas fa-thumbs-up"></i>
                            Why Choose HIS
                        </button>
                        <button class="section-nav-link" data-section="core-features">
                            <i class="fas fa-cogs"></i>
                            Core Capabilities
                        </button>
                        <button class="section-nav-link" data-section="why-trust">
                            <i class="fas fa-shield-alt"></i>
                            Why Teams Trust
                        </button>
                        <button class="section-nav-link" data-section="use-cases">
                            <i class="fas fa-hospital"></i>
                            Use Cases
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
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Revolutionize Hospital Management with HIS">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Revolutionize Hospital Management with HIS' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="A complete, cloud-based Hospital Information System...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : 'A complete, cloud-based Hospital Information System that brings your departments, staff, and patients into one connected platform—boosting operational control, clinical accuracy, and the patient experience.' }}</textarea>
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
                                            <input type="text" class="form-control" name="feature_pill_1" placeholder="🛡 Trusted by modern hospitals" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][0] ?? '') : '🛡 Trusted by modern hospitals and specialty clinics worldwide.' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="feature_pill_2" placeholder="☁️ 100% cloud infrastructure" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][1] ?? '') : '☁️ 100% cloud infrastructure.' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="feature_pill_3" placeholder="⚡ Accessible anywhere, anytime" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][2] ?? '') : '⚡ Accessible anywhere, anytime' }}">
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
                                            <input type="text" class="form-control" name="button1_text" placeholder="🔵 Start a Free Demo" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][0]['text'] ?? '') : '🔵 Start a Free Demo' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="button2_text" placeholder="⚪ Schedule a Call with an Expert" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['text'] ?? '') : '⚪ Schedule a Call with an Expert' }}">
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

                    <!-- What is HIS Section -->
                    <div class="section-content" id="intro-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-info-circle"></i>
                                    What is HIS Section
                                </h2>
                    
                            </div>
                        </div>

                        <form id="introForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="intro_title"
                                            placeholder="What is HIS?">{{ isset($introContent) && $introContent ? ($introContent->content_json['title'] ?? '') : 'What is HIS?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="intro_description" rows="4"
                                            placeholder="Managing a healthcare facility is a constant balancing act...">{{ isset($introContent) && $introContent ? ($introContent->content_json['description'] ?? '') : 'Managing a healthcare facility is a constant balancing act—staff schedules, patient records, billing, diagnostics, and compliance. HIS brings it all together in one intuitive system built specifically for hospitals of every size.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    ['title' => 'Hospital Administration', 'description' => 'Complete administrative control and oversight'],
                                    ['title' => 'Patient Management', 'description' => 'Streamlined appointment booking and patient care'],
                                    ['title' => 'Financial Control', 'description' => 'Automated billing and comprehensive financial tracking'],
                                    ['title' => 'Analytics & Reports', 'description' => 'Data-driven insights for better decision making']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Feature {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" 
                                                    name="feature{{ $i }}_title" 
                                                    placeholder="{{ $defaultFeatures[$i-1]['title'] }}" 
                                                    value="{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][$i-1]['title'] ?? '') : $defaultFeatures[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
                                    Save What is HIS Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Other sections will be added in subsequent tasks -->
                       <!-- Why Choose HIS Section -->
                    <div class="section-content" id="why-choose-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    Why Choose HIS Section
                                </h2>
                       
                            </div>
                        </div>

                        <form id="whyChooseForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="section_title"
                                            placeholder="Why Choose HIS?">{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['title'] ?? '') : 'Why Choose HIS?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                            <textarea class="form-control " name="section_subtitle"
                                            placeholder="Built for Real Hospitals, Not Just Software Demos">{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['subtitle'] ?? '') : 'Built for Real Hospitals, Not Just Software Demos' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Main Description</label>
                                        <textarea class="form-control editor" name="main_description" rows="3"
                                            placeholder="Unlike outdated or fragmented systems...">{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['main_description'] ?? '') : 'Unlike outdated or fragmented systems, HIS is purpose-built for the complexity of modern healthcare. Every module works seamlessly with the next, giving you a 360-degree view of your operations and patient care.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Benefit 1: Cloud-Connected & Always On -->
                            <div class="card mt-4">
                                <div class="card-title">
                                    <i class="fas fa-cloud"></i>
                                    Benefit 1: Cloud-Connected & Always On
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="benefit1_title"
                                                placeholder="Cloud-Connected & Always On"
                                                value="{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][0]['title'] ?? '') : 'Cloud-Connected & Always On' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="benefit1_description" rows="3"
                                                placeholder="Access hospital data securely from anywhere...">{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][0]['description'] ?? '') : 'Access hospital data securely from anywhere—perfect for remote consultations and multi-location facilities.' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature 1</label>
                                            <input type="text" class="form-control" name="benefit1_features[]"
                                                placeholder="Remote Access"
                                                value="{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][0]['features'][0] ?? '') : 'Remote Access' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="benefit1_features[]"
                                                placeholder="Multi-Location"
                                                value="{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][0]['features'][1] ?? '') : 'Multi-Location' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Benefit 2: Fully Integrated Workflow -->
                            <div class="card mt-4">
                                <div class="card-title">
                                    <i class="fas fa-sync"></i>
                                    Benefit 2: Fully Integrated Workflow
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="benefit2_title"
                                                placeholder="Fully Integrated Workflow"
                                                value="{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][1]['title'] ?? '') : 'Fully Integrated Workflow' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="benefit2_description" rows="3"
                                                placeholder="Clinical, administrative, financial, and diagnostic data...">{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][1]['description'] ?? '') : 'Clinical, administrative, financial, and diagnostic data are all connected, so nothing falls through the cracks.' }}</textarea>
                                        </div>
                                    </div>
                                    @php
                                        $defaultBenefit2Features = ['Clinical Data', 'Administrative', 'Financial', 'Diagnostics'];
                                    @endphp
                                    @for($i = 0; $i < 4; $i++)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Feature {{ $i + 1 }}</label>
                                                <input type="text" class="form-control" name="benefit2_features[]"
                                                    placeholder="{{ $defaultBenefit2Features[$i] }}"
                                                    value="{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][1]['features'][$i] ?? '') : $defaultBenefit2Features[$i] }}">
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <!-- Benefit 3: Security First, Always Compliant -->
                            <div class="card mt-4">
                                <div class="card-title">
                                    <i class="fas fa-shield-alt"></i>
                                    Benefit 3: Security First, Always Compliant
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="benefit3_title"
                                                placeholder="Security First, Always Compliant"
                                                value="{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][2]['title'] ?? '') : 'Security First, Always Compliant' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="benefit3_description" rows="3"
                                                placeholder="Built with healthcare-grade encryption...">{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][2]['description'] ?? '') : 'Built with healthcare-grade encryption, user access controls, and audit trails that meet HIPAA, GDPR, and national standards.' }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <h6>Security Features</h6>
                                    </div>
                                    @php
                                        $defaultSecurityFeatures = ['Healthcare-Grade Encryption', 'User Access Controls', 'Complete Audit Trails', 'HIPAA, GDPR Compliant'];
                                    @endphp
                                    @for($i = 0; $i < 4; $i++)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Security Feature {{ $i + 1 }}</label>
                                                <input type="text" class="form-control" name="benefit3_security_features[]"
                                                    placeholder="{{ $defaultSecurityFeatures[$i] }}"
                                                    value="{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][2]['security_features'][$i] ?? '') : $defaultSecurityFeatures[$i] }}">
                                            </div>
                                        </div>
                                    @endfor
                                    
                                    <div class="col-12">
                                        <h6>Compliance Features</h6>
                                    </div>
                                    @php
                                        $defaultComplianceFeatures = ['HIPAA', 'GDPR', 'National Standards', 'Audit Ready'];
                                    @endphp
                                    @for($i = 0; $i < 4; $i++)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Compliance Feature {{ $i + 1 }}</label>
                                                <input type="text" class="form-control" name="benefit3_compliance_features[]"
                                                    placeholder="{{ $defaultComplianceFeatures[$i] }}"
                                                    value="{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['benefits'][2]['compliance_features'][$i] ?? '') : $defaultComplianceFeatures[$i] }}">
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Why Choose HIS Section
                                </button>
                            </div>
                        </form>
                    </div>

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
                                <!-- Section Title -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="capabilities_title" 
                                            placeholder="Core Capabilities">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['title'] ?? '') : 'Core Capabilities' }}</textarea>
                                    </div>
                                </div>

                                <!-- Section Description -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="capabilities_description" rows="2" 
                                                placeholder="Everything your hospital needs in one powerful platform">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['description'] ?? '') : 'Everything your hospital needs in one powerful platform' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultCapabilities = [
                                    // Top 3 Capabilities with Dashboard
                                    [
                                        'icon' => 'fas fa-hospital',
                                        'title' => 'Hospital Administration',
                                        'subtitle' => 'One Dashboard to Oversee It All',
                                        'description' => 'From user roles and department activities to billing workflows and financial records, HIS gives administrators a centralized command center.',
                                        'features' => [
                                            'Coordinate across departments effortlessly',
                                            'Automate routine tasks and reduce paperwork',
                                            'Keep all hospital data secure and compliant'
                                        ],
                                        'dashboard' => [
                                            'title' => 'Admin Dashboard',
                                            'stats' => [
                                                ['label' => 'Active Patients', 'value' => '248'],
                                                ['label' => 'Staff On Duty', 'value' => '98'],
                                                ['label' => 'Bed Occupancy', 'value' => '79%']
                                            ]
                                        ]
                                    ],
                                    [
                                        'icon' => 'fas fa-user-injured',
                                        'title' => 'Patient Management',
                                        'subtitle' => 'Fewer Delays. Smoother Visits.',
                                        'description' => 'Maintain comprehensive digital records including histories, diagnoses, and treatments. Patients can self-schedule appointments online.',
                                        'features' => [
                                            'Complete digital patient records',
                                            'Online appointment scheduling',
                                            'Real-time transaction syncing'
                                        ],
                                        'dashboard' => [
                                            'title' => 'Patient Records',
                                            'stats' => [
                                                ['label' => 'New Appointments', 'value' => '34'],
                                                ['label' => 'Pending Reports', 'value' => '12'],
                                                ['label' => 'Discharged Today', 'value' => '8']
                                            ]
                                        ]
                                    ],
                                    [
                                        'icon' => 'fas fa-file-invoice-dollar',
                                        'title' => 'Billing & Financial Control',
                                        'subtitle' => 'Transparent Billing, Zero Confusion',
                                        'description' => 'Automated billing, multiple payment gateways, and real-time reporting give complete visibility into revenue and costs.',
                                        'features' => [
                                            'Automated billing and payments',
                                            'Multiple payment gateway support',
                                            'Real-time financial reporting'
                                        ],
                                        'dashboard' => [
                                            'title' => 'Financial Overview',
                                            'stats' => [
                                                ['label' => "Today's Revenue", 'value' => '₹2,45,000'],
                                                ['label' => 'Pending Bills', 'value' => '₹85,000'],
                                                ['label' => 'Insurance Claims', 'value' => '₹1,20,000']
                                            ]
                                        ]
                                    ],

                                    // 8 Bottom Cards (no dashboard)
                                    ['icon'=>'fas fa-user-md','title'=>'Doctor & Staff Coordination','subtitle'=>'Doctor & Staff Coordination','description'=>'Doctors can check schedules, review patient charts, and prescribe medications while staff stay in sync through built-in communication tools.'],
                                    ['icon'=>'fas fa-notes-medical','title'=>'Electronic Medical Records','subtitle'=>'Doctor & Staff Coordination','description'=>'Complete, up-to-date medical records with prescriptions and auto-linked lab results for unified clinical view.'],
                                    ['icon'=>'fas fa-procedures','title'=>'Bed & Ward Management','subtitle'=>'Doctor & Staff Coordination','description'=>'Track admissions, bed availability, and discharges for improved hospital flow coordination.'],
                                    ['icon'=>'fas fa-vials','title'=>'Pathology & Radiology','subtitle'=>'Doctor & Staff Coordination','description'=>'Unified interface for test requests, result uploads, and diagnostic data with instant availability.'],
                                    ['icon'=>'fas fa-video','title'=>'Live Consultations','subtitle'=>'Doctor & Staff Coordination','description'=>'Secure, HIPAA-compliant video consultations with integrated scheduling and tools.'],
                                    ['icon'=>'fas fa-tint','title'=>'Blood Bank & Inventory','description'=>'Real-time tracking of blood stocks, medications, and supplies with optimized reordering.'],
                                    ['icon'=>'fas fa-phone','title'=>'Front Office & Communication','subtitle'=>'Doctor & Staff Coordination','description'=>'Built-in SMS/email notifications keep patients informed about appointments, results, and reports automatically.'],
                                    ['icon'=>'fas fa-lock','title'=>'Security, Compliance & Customization','subtitle'=>'Doctor & Staff Coordination','description'=>'Role-based access, audit logs, and encryption ensure your system is as secure as it is powerful.'],
                                ];
                            @endphp

                            @foreach($defaultCapabilities as $index => $capability)
                                <div class="card my-3 p-3">
                                    <div class="card-title fw-bold">
                                        <i class="{{ $capability['icon'] }}"></i>
                                        Capability {{ $index + 1 }} - {{ $capability['title'] }}
                                    </div>
                                    <div class="row">
                                        <!-- Title -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" 
                                                    name="capability{{ $index + 1 }}_title"
                                                    value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['title'] ?? '') : $capability['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" 
                                                    name="capability{{ $index + 1 }}_subtitle"
                                                    value="{{ isset($coreFeaturesContent) && $coreFeaturesContent 
                                                                ? ($coreFeaturesContent->content_json['capabilities'][$index]['subtitle'] ?? '') 
                                                                : ($capability['subtitle'] ?? '') }}">
                                            </div>
                                        </div>
                                        <!-- Subtitle (only for first 3) -->
                                        @if($index < 3)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control"
                                                        name="capability{{ $index + 1 }}_subtitle"
                                                        value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['subtitle'] ?? '') : $capability['subtitle'] }}">
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Description -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="capability{{ $index + 1 }}_description" rows="3">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['description'] ?? '') : $capability['description'] }}</textarea>
                                            </div>
                                        </div>

                                        <!-- Features + Dashboard (only for first 3) -->
                                        @if($index < 3)
                                            @for($f=1; $f<=3; $f++)
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Feature {{ $f }}</label>
                                                        <input type="text" class="form-control"
                                                            name="capability{{ $index + 1 }}_feature{{ $f }}"
                                                            value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['features'][$f-1] ?? '') : ($capability['features'][$f-1] ?? '') }}">
                                                    </div>
                                                </div>
                                            @endfor

                                            <!-- Dashboard Title -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Dashboard Title</label>
                                                    <input type="text" class="form-control"
                                                        name="capability{{ $index + 1 }}_dashboard_title"
                                                        value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['dashboard']['title'] ?? '') : $capability['dashboard']['title'] }}">
                                                </div>
                                            </div>

                                            <!-- Dashboard Stats -->
                                            @for($s=1; $s<=3; $s++)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Stat {{ $s }} Label</label>
                                                        <input type="text" class="form-control"
                                                            name="capability{{ $index + 1 }}_stat{{ $s }}_label"
                                                            value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['dashboard']['stats'][$s-1]['label'] ?? '') : ($capability['dashboard']['stats'][$s-1]['label'] ?? '') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Stat {{ $s }} Value</label>
                                                        <input type="text" class="form-control"
                                                            name="capability{{ $index + 1 }}_stat{{ $s }}_value"
                                                            value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$index]['dashboard']['stats'][$s-1]['value'] ?? '') : ($capability['dashboard']['stats'][$s-1]['value'] ?? '') }}">
                                                    </div>
                                                </div>
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Core Capabilities Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="section-content" id="why-trust-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    Why Healthcare Leaders Choose HIS
                                </h2>
                   
                            </div>
                        </div>

                        <form id="whyTrustForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="section_title"
                                            placeholder="Why Healthcare Leaders Choose HIS">{{ isset($whyTrustContent) && $whyTrustContent ? ($whyTrustContent->content_json['title'] ?? '') : 'Why Healthcare Leaders Choose HIS' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTrust = [
                                    ['title' => 'Boost Efficiency', 'description' => 'Automate manual work and connect teams for smoother operations and faster patient care.'],
                                    ['title' => 'Better Care', 'description' => 'Real-time data access means fewer treatment delays and improved clinical outcomes.'],
                                    ['title' => 'Scalable', 'description' => 'From 30-bed clinics to 1,000-bed hospitals, HIS adapts to your size and growth.'],
                                    ['title' => 'Secure & Compliant', 'description' => 'Built to meet the toughest privacy and regulatory standards for healthcare.']
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
                                                <input type="text" class="form-control" name="trust{{ $i }}_title"
                                                    placeholder="{{ $defaultTrust[$i-1]['title'] }}"
                                                    value="{{ isset($whyTrustContent) && $whyTrustContent ? ($whyTrustContent->content_json['trust_factors'][$i-1]['title'] ?? '') : $defaultTrust[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="trust{{ $i }}_description" rows="2"
                                                        placeholder="{{ $defaultTrust[$i-1]['description'] }}">{{ isset($whyTrustContent) && $whyTrustContent ? ($whyTrustContent->content_json['trust_factors'][$i-1]['description'] ?? '') : $defaultTrust[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="section-content" id="use-cases-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-users"></i>
                                    Use Cases Section
                                </h2>
          
                            </div>
                        </div>
                        
                        <form id="useCasesForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="section_title" placeholder="Who's HRMS For?">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['title'] ?? '') : 'Who\'s HRMS For?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="section_description" rows="3" placeholder="HRMS is designed for teams that need control, visibility, and automation...">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['description'] ?? '') : 'HRMS is designed for teams that need control, visibility, and automation. Whether you\'re remote-first or office-based, here\'s how teams use it:' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultUseCases = [
                                    ['title' => 'Startups', 'description' => 'Fast-track hiring and scale your team without chaos'],
                                    ['title' => 'Enterprises', 'description' => 'Standardize HR processes across multiple locations'],
                                    ['title' => 'Remote Teams', 'description' => 'Manage people, documents, and time zones from one dashboard'],
                                    ['title' => 'Agencies', 'description' => 'Handle contractors, time tracking, and payroll in a unified space'],
                                    ['title' => 'Agencies', 'description' => 'Handle contractors, time tracking, and payroll in a unified space']
                                ];
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-briefcase"></i>
                                        Use Case {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="usecase{{ $i }}_title" placeholder="{{ $defaultUseCases[$i-1]['title'] }}" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][$i-1]['title'] ?? '') : $defaultUseCases[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="usecase{{ $i }}_description" rows="2" placeholder="{{ $defaultUseCases[$i-1]['description'] }}">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][$i-1]['description'] ?? '') : $defaultUseCases[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Text</label>
                                    <input type="text" class="form-control" name="footer_text" placeholder="Who's HRMS For?" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['footer_text'] ?? '') : '' }}">
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

<!-- JavaScript for section navigation -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Section navigation functionality
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
            const targetContent = document.getElementById(targetSection + '-section');
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });

        // Form submissions for HIS
    const forms = ['heroForm', 'introForm', 'whyChooseForm','coreFeaturesForm','whyTrustForm','useCasesForm','testimonialsForm','finalCtaForm'];
    const routes = {
        'heroForm': '{{ route("admin.his-development.save-hero") }}',
        'introForm': '{{ route("admin.his-development.save-intro") }}',
        'whyChooseForm': '{{ route("admin.his-development.save-why-choose") }}',
        'coreFeaturesForm': '{{ route("admin.his-development.save-core-features") }}',
        'whyTrustForm': '{{ route("admin.his-development.save-why-trust") }}',
        'useCasesForm': '{{ route("admin.his-development.save-use-cases") }}',
        'testimonialsForm': '{{ route("admin.his-development.save-testimonials") }}',   
        'finalCtaForm': '{{ route("admin.his-development.save-final-cta") }}'
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
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification(data.message, 'success');
                    } else {
                        showNotification(data.message, 'error');
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
        
   
    
    // Toggle section functionality
    const toggleSwitches = document.querySelectorAll('.section-toggle input[type="checkbox"]');
    toggleSwitches.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const sectionName = this.id.replace('Switch', '').replace(/([A-Z])/g, '_$1').toLowerCase().substring(1);
            const isActive = this.checked;
            
            fetch('{{ route("admin.his-development.toggle-section") }}', {
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
                    showNotification(data.message, 'success');
                    // Update label
                    const label = this.nextElementSibling;
                    label.textContent = isActive ? 'On' : 'Off';
                } else {
                    showNotification(data.message, 'error');
                    // Revert toggle
                    this.checked = !isActive;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Error updating section status', 'error');
                // Revert toggle
                this.checked = !isActive;
            });
        });
    });
    
    // Notification function
    function showNotification(message, type) {
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
                notification.parentNode.removeChild(notification);
            }
        }, 5000);
    }
});
</script>

@endsection    
              