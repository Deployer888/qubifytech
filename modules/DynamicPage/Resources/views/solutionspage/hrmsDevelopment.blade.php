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
                    <li class="breadcrumb-item active" aria-current="page">HRMS Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">HRMS Development Sections</h5>
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
                        <button class="section-nav-link" data-section="benefits">
                            <i class="fas fa-thumbs-up"></i>
                            Benefits
                        </button>
                        <button class="section-nav-link" data-section="use-cases">
                            <i class="fas fa-users"></i>
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
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Reimagine HR with HRMS">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Reimagine HR with HRMS' }}</textarea>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="feature_pill_3" placeholder="Customizable for businesses of all sizes" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][2] ?? '') : 'Customizable for businesses of all sizes' }}">
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
                                        <textarea class="form-control editor" name="intro_title" rows="2" placeholder="Take the Stress Out of HR Operations">{{ isset($introContent) && $introContent ? ($introContent->content_json['title'] ?? '') : 'Take the Stress Out of HR Operations' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="intro_description" rows="4" placeholder="Managing people is complex—but your tools shouldn't be...">{{ isset($introContent) && $introContent ? ($introContent->content_json['description'] ?? '') : 'Managing people is complex—but your tools shouldn\'t be. HRMS simplifies core HR functions by centralizing everything into one intuitive system. That means less time chasing paperwork and more time focusing on your people.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    ['title' => 'Automate Everything', 'description' => 'Automate hiring, onboarding, payroll, and leave tracking with intelligent workflows.'],
                                    ['title' => 'Real-time Insights', 'description' => 'Gain real-time visibility into performance and workforce trends with powerful analytics.'],
                                    ['title' => 'Better Experience', 'description' => 'Deliver a better experience for employees and HR teams with intuitive self-service tools']
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Feature {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
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
                                        <textarea class="form-control editor" name="core_title" placeholder="Core Automate Everything">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['title'] ?? '') : 'Core Automate Everything' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="core_description" rows="2" placeholder="Everything you need to manage your workforce efficiently">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['description'] ?? '') : 'Everything you need to manage your workforce efficiently' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultCoreFeatures = [
                                    [
                                        'title' => 'Employee Management',
                                        'subtitle' => 'Everything About Your Team in One Place',
                                        'description' => 'Manage complete employee records including roles, departments, reporting lines, and access permissions. HRMS helps you onboard faster, stay organized, and reduce manual data entry.',
                                        'stats' => [
                                            ['label' => 'Active Employees', 'value' => '284'],
                                            ['label' => 'Departments', 'value' => '8'],
                                            ['label' => 'New Hires (This Month)', 'value' => '12']
                                        ]
                                    ],
                                    [
                                        'title' => 'Attendance & Leave',
                                        'subtitle' => 'Track Hours, Leave, and Time Off—Automatically',
                                        'description' => 'Real-time attendance logging integrates with biometrics or virtual check-ins. Employees can request time off directly, while HR reviews everything from a centralized dashboard.',
                                        'stats' => [
                                            ['label' => 'Present Today', 'value' => '267/284'],
                                            ['label' => 'On Leave', 'value' => '9'],
                                            ['label' => 'Pending Requests', 'value' => '6']
                                        ]
                                    ],
                                    [
                                        'title' => 'Payroll & Compensation',
                                        'subtitle' => 'Run Payroll Without Stress',
                                        'description' => 'HRMS handles salary calculations, deductions, and bonus payouts with precision. Automatically generate payslips, process payments, and stay tax-compliant without switching systems.',
                                        'stats' => [
                                            ['label' => 'This Month', 'value' => '₹18.5L'],
                                            ['label' => 'Tax Deductions', 'value' => '₹3.2L'],
                                            ['label' => 'Net Pay', 'value' => '₹15.3L']
                                        ]
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-briefcase"></i>
                                        Feature {{ $i }} - {{ $defaultCoreFeatures[$i-1]['title'] }}
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

                            @php
                                $defaultCoreFeaturesExtras = [
                                    [
                                        'title' => 'Payroll & Compensation',
                                        'subtitle' => 'Run Payroll Without Stress',
                                        'description' => 'HRMS handles salary calculations, deductions, and bonus payouts with precision. Automatically generate payslips, process payments, and stay tax-compliant without switching systems.'
                                    ],
                                    [
                                        'title' => 'Payroll & Compensation',
                                        'subtitle' => 'Run Payroll Without Stress',
                                        'description' => 'HRMS handles salary calculations, deductions, and bonus payouts with precision. Automatically generate payslips, process payments, and stay tax-compliant without switching systems.'
                                    ],
                                    [
                                        'title' => 'Payroll & Compensation',
                                        'subtitle' => 'Run Payroll Without Stress',
                                        'description' => 'HRMS handles salary calculations, deductions, and bonus payouts with precision. Automatically generate payslips, process payments, and stay tax-compliant without switching systems.'
                                    ],
                                    [
                                        'title' => 'Payroll & Compensation',
                                        'subtitle' => 'Run Payroll Without Stress',
                                        'description' => 'HRMS handles salary calculations, deductions, and bonus payouts with precision. Automatically generate payslips, process payments, and stay tax-compliant without switching systems.'
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-briefcase"></i>
                                        Others Feature {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="extraFeature{{ $i }}_title" placeholder="{{ $defaultCoreFeaturesExtras[$i-1]['title'] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['extra_features'][$i-1]['title'] ?? '') : $defaultCoreFeaturesExtras[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="extraFeature{{ $i }}_subtitle" placeholder="{{ $defaultCoreFeaturesExtras[$i-1]['subtitle'] }}" value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['extra_features'][$i-1]['subtitle'] ?? '') : $defaultCoreFeaturesExtras[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="extraFeature{{ $i }}_description" rows="3" placeholder="{{ $defaultCoreFeaturesExtras[$i-1]['description'] }}">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['extra_features'][$i-1]['description'] ?? '') : $defaultCoreFeaturesExtras[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
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

                    <!-- Benefits Section -->
                    <div class="section-content" id="benefits-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    Benefits Section
                                </h2>
      
                            </div>
                        </div>
                        
                        <form id="benefitsForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="benefits_title" placeholder="Why Teams Choose HRMS">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['title'] ?? '') : 'Why Teams Choose HRMS' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultBenefits = [
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
                                                <input type="text" class="form-control" name="benefit{{ $i }}_title" placeholder="{{ $defaultBenefits[$i-1]['title'] }}" value="{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][$i-1]['title'] ?? '') : $defaultBenefits[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="benefit{{ $i }}_description" rows="2" placeholder="{{ $defaultBenefits[$i-1]['description'] }}">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['benefits'][$i-1]['description'] ?? '') : $defaultBenefits[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Benefits Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Use Cases Section -->
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
                                        <textarea class="form-control editor" name="use_cases_title" placeholder="Who's HRMS For?">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['title'] ?? '') : 'Who\'s HRMS For?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="use_cases_description" rows="3" placeholder="HRMS is designed for teams that need control, visibility, and automation...">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['description'] ?? '') : 'HRMS is designed for teams that need control, visibility, and automation. Whether you\'re remote-first or office-based, here\'s how teams use it:' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultUseCases = [
                                    ['title' => 'Startups', 'description' => 'Fast-track hiring and scale your team without chaos'],
                                    ['title' => 'Enterprises', 'description' => 'Standardize HR processes across multiple locations'],
                                    ['title' => 'Remote Teams', 'description' => 'Manage people, documents, and time zones from one dashboard'],
                                    ['title' => 'Agencies', 'description' => 'Handle contractors, time tracking, and payroll in a unified space']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-briefcase"></i>
                                        Use Case {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="use_case{{ $i }}_title" placeholder="{{ $defaultUseCases[$i-1]['title'] }}" value="{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][$i-1]['title'] ?? '') : $defaultUseCases[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="use_case{{ $i }}_description" rows="2" placeholder="{{ $defaultUseCases[$i-1]['description'] }}">{{ isset($useCasesContent) && $useCasesContent ? ($useCasesContent->content_json['use_cases'][$i-1]['description'] ?? '') : $defaultUseCases[$i-1]['description'] }}</textarea>
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
                                        <textarea class="form-control editor" name="testimonials_title" placeholder="What Customers Are Saying">{{ isset($testimonialsContent) && $testimonialsContent ? ($testimonialsContent->content_json['title'] ?? '') : 'What Customers Are Saying' }}"</textarea>
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
    const forms = ['heroForm', 'introForm', 'coreFeaturesForm', 'benefitsForm', 'useCasesForm', 'testimonialsForm', 'finalCtaForm'];
    const routes = {
        'heroForm': '{{ route("admin.hrms-development.save-hero") }}',
        'introForm': '{{ route("admin.hrms-development.save-intro") }}',
        'coreFeaturesForm': '{{ route("admin.hrms-development.save-core-features") }}',
        'benefitsForm': '{{ route("admin.hrms-development.save-benefits") }}',
        'useCasesForm': '{{ route("admin.hrms-development.save-use-cases") }}',
        'testimonialsForm': '{{ route("admin.hrms-development.save-testimonials") }}',
        'finalCtaForm': '{{ route("admin.hrms-development.save-final-cta") }}'
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
            
            fetch('{{ route("admin.hrms-development.toggle-section") }}', {
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