@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $whatWeOfferContent = $whatWeOfferContent ?? null;
    $additionalServicesContent = $additionalServicesContent ?? null;
    $industriesContent = $industriesContent ?? null;
    $techStackContent = $techStackContent ?? null;
    $mvpProcessContent = $mvpProcessContent ?? null;
    $keyBenefitsContent = $keyBenefitsContent ?? null;
    $mvpMethodologiesContent = $mvpMethodologiesContent ?? null;
    $whyQubifyContent = $whyQubifyContent ?? null;
    $hireDevelopersContent = $hireDevelopersContent ?? null;
    $faqContent = $faqContent ?? null;
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
                    <li class="breadcrumb-item active" aria-current="page">MVP Development Page</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">MVP Development Page Sections</h5>
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
                        <button class="section-nav-link" data-section="what-we-offer">
                            <i class="fas fa-gift"></i>
                            What We Offer
                        </button>
                        <button class="section-nav-link" data-section="additional-services">
                            <i class="fas fa-plus-circle"></i>
                            Additional Services
                        </button>
                        <button class="section-nav-link" data-section="expertise">
                            <i class="fas fa-industry"></i>
                            Expertise
                        </button>
                        <button class="section-nav-link" data-section="tech-stack">
                            <i class="fas fa-code"></i>
                            Tech Stack
                        </button>
                        <button class="section-nav-link" data-section="mvp-process">
                            <i class="fas fa-tasks"></i>
                            MVP Process
                        </button>
                        <button class="section-nav-link" data-section="key-benefits">
                            <i class="fas fa-check-circle"></i>
                            Key Benefits
                        </button>
                        <button class="section-nav-link" data-section="mvp-methodologies">
                            <i class="fas fa-cogs"></i>
                            MVP Methodologies
                        </button>
                        <button class="section-nav-link" data-section="development-timeline">
                            <i class="fas fa-cogs"></i>
                            Development Timeline
                        </button>
                        <button class="section-nav-link" data-section="mvp-process-actually">
                            <i class="fas fa-cogs"></i>
                            MVP Process Actually
                        </button>
                        <button class="section-nav-link" data-section="why-qubify">
                            <i class="fas fa-lightbulb"></i>
                            Why Qubify
                        </button>
                        <button class="section-nav-link" data-section="industries">
                            <i class="fas fa-lightbulb"></i>
                            Industries
                        </button>
                        <button class="section-nav-link" data-section="hire-developers">
                            <i class="fas fa-users"></i>
                            Hire Developers
                        </button>
                        <button class="section-nav-link" data-section="faq">
                            <i class="fas fa-question-circle"></i>
                            FAQ
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
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="MVP Development Services">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'MVP Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="You bring the vision — we make it real...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : "You bring the vision — we make it real. With our MVP development services, you'll get a working product that's lean, functional, and built for early testing." }}</textarea>
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
                                            <label class="form-label">Feature Pill 1</label>
                                            <input type="text" class="form-control" name="feature_pill_1" placeholder="Fast Delivery" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['feature_pills'][0] ?? '') : 'Fast Delivery' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature Pill 2</label>
                                            <input type="text" class="form-control" name="feature_pill_2" placeholder="Smart Scaling" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['feature_pills'][1] ?? '') : 'Smart Scaling' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature Pill 3</label>
                                            <input type="text" class="form-control" name="feature_pill_3" placeholder="Real-World Validation" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['feature_pills'][2] ?? '') : 'Real-World Validation' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-mouse-pointer"></i>
                                    Call-to-Action Buttons
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 1 Text</label>
                                            <input type="text" class="form-control" name="button1_text" placeholder="🚀 Start Your MVP" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][0]['text'] ?? '') : '🚀 Start Your MVP' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="button2_text" placeholder="💬 Get Free Consultation" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['text'] ?? '') : '💬 Get Free Consultation' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Link</label>
                                            <input type="text" class="form-control" name="button2_link" placeholder="#contact" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['link'] ?? '') : '#contact' }}">
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
                                        <textarea class="form-control editor" name="intro_title" rows="2" placeholder="MVP Development Focused on Real-World Validation">{{ isset($introContent) && $introContent ? ($introContent->content_json['title'] ?? '') : 'MVP Development Focused on Real-World Validation' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">First Description Paragraph</label>
                                        <textarea class="form-control editor" name="intro_description_1" rows="4" placeholder="Moving fast matters — but building smart matters more...">{{ isset($introContent) && $introContent ? ($introContent->content_json['description_1'] ?? '') : 'Moving fast matters — but building smart matters more. Our approach to MVP development is designed to help you validate ideas quickly, without wasted time or budget. Whether it\'s a web app, mobile product, or SaaS platform, we zero in on the essential functionality — what your users actually need — and leave the rest for later.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Second Description Paragraph</label>
                                        <textarea class="form-control" name="intro_description_2" rows="2" placeholder="That way, you gather real feedback sooner...">{{ isset($introContent) && $introContent ? ($introContent->content_json['description_2'] ?? '') : 'That way, you gather real feedback sooner, reduce risks, and stay flexible as your product evolves.' }}</textarea>
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
                    
                    <!-- Placeholder for remaining sections -->
                    <div class="section-content" id="what-we-offer-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    What We Offer in MVP Development
                                </h2>
                        
                            </div>
                        </div>

                        <form id="whatWeOfferForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="offer_title" rows="2"
                                            placeholder="What We Offer in MVP Development">{{ isset($whatWeOfferContent) && $whatWeOfferContent ? ($whatWeOfferContent->content_json['title'] ?? '') : 'What We Offer in MVP Development' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="offer_subtitle"
                                            placeholder="Comprehensive MVP solutions tailored to your business needs"
                                            value="{{ isset($whatWeOfferContent) && $whatWeOfferContent ? ($whatWeOfferContent->content_json['description'] ?? '') : 'Comprehensive MVP solutions tailored to your business needs' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultOffers = [
                                    [
                                        'title' => 'MVP Consulting Services',
                                        'subtitle' => 'Strategic Planning & Feature Prioritization',
                                        'description' => 'We help refine your idea, map out key features, and create a clear development plan...',
                                        'features' => ['Idea Refinement', 'Feature Mapping', 'Development Planning'],
                                        'stats' => [
                                            ['label' => 'Risk Reduction', 'value' => '80%'],
                                            ['label' => 'Time Saved', 'value' => '60%'],
                                            ['label' => 'Success Rate', 'value' => '95%'],
                                        ]
                                    ],
                                    [
                                        'title' => 'MVP Prototyping',
                                        'subtitle' => 'Clickable Mockups & Wireframes',
                                        'description' => 'Before we dive into code, we create clickable mockups...',
                                        'features' => ['Interactive Mockups', 'User Flow Design', 'Concept Validation'],
                                        'stats' => [
                                            ['label' => 'Clarity Improvement', 'value' => '90%'],
                                            ['label' => 'Risk Reduction', 'value' => '70%'],
                                            ['label' => 'Feedback Quality', 'value' => 'A+'],
                                        ]
                                    ],
                                    [
                                        'title' => 'MVP Web Development',
                                        'subtitle' => 'Fast & Scalable Web Applications',
                                        'description' => 'We build efficient, secure web applications using trusted technologies...',
                                        'features' => ['React.js & Node.js', 'Django & Laravel', 'Scalable Architecture'],
                                        'stats' => [
                                            ['label' => 'Performance Score', 'value' => '98%'],
                                            ['label' => 'Security Rating', 'value' => 'A+'],
                                            ['label' => 'Scalability', 'value' => '100%'],
                                        ]
                                    ],
                                    [
                                        'title' => 'MVP Mobile App Development',
                                        'subtitle' => 'iOS, Android & Cross-Platform',
                                        'description' => 'We develop mobile MVPs using native (Swift, Kotlin) or cross-platform...',
                                        'features' => ['Swift & Kotlin', 'Flutter & React Native', 'Fast Launch'],
                                        'stats' => [
                                            ['label' => 'Launch Speed', 'value' => '3x'],
                                            ['label' => 'User Engagement', 'value' => '85%'],
                                            ['label' => 'Store Approval', 'value' => '100%'],
                                        ]
                                    ],
                                    [
                                        'title' => 'SaaS MVP Development',
                                        'subtitle' => 'Cloud-Based Solutions',
                                        'description' => 'We build cloud-based MVPs with features like user management...',
                                        'features' => ['User Management', 'Subscriptions', 'Multi-Tenant'],
                                        'stats' => [
                                            ['label' => 'Scalability', 'value' => '∞'],
                                            ['label' => 'Uptime', 'value' => '99.9%'],
                                            ['label' => 'Security', 'value' => 'A+'],
                                        ]
                                    ],
                                    [
                                        'title' => 'MVP UX/UI Design',
                                        'subtitle' => 'Clarity & Function First',
                                        'description' => 'We build minimal, clean interfaces that guide users...',
                                        'features' => ['Clean Interfaces', 'User-Focused', 'Feedback-Driven'],
                                        'stats' => [
                                            ['label' => 'User Satisfaction', 'value' => '92%'],
                                            ['label' => 'Task Completion', 'value' => '88%'],
                                            ['label' => 'Feedback Quality', 'value' => 'A+'],
                                        ]
                                    ],
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card my-3">
                                    <div class="card-title">
                                        <i class="fas fa-lightbulb"></i>
                                        Offer {{ $i }} - {{ $defaultOffers[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="offer{{ $i }}_title"
                                                    placeholder="{{ $defaultOffers[$i-1]['title'] }}"
                                                    value="{{ isset($whatWeOfferContent) && $whatWeOfferContent ? ($whatWeOfferContent->content_json['services'][$i-1]['title'] ?? '') : $defaultOffers[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="offer{{ $i }}_subtitle"
                                                    placeholder="{{ $defaultOffers[$i-1]['subtitle'] }}"
                                                    value="{{ isset($whatWeOfferContent) && $whatWeOfferContent ? ($whatWeOfferContent->content_json['services'][$i-1]['subtitle'] ?? '') : $defaultOffers[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="offer{{ $i }}_description" rows="3"
                                                    placeholder="{{ $defaultOffers[$i-1]['description'] }}">{{ isset($whatWeOfferContent) && $whatWeOfferContent ? ($whatWeOfferContent->content_json['services'][$i-1]['description'] ?? '') : $defaultOffers[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        @for($f = 1; $f <= 3; $f++)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Feature {{ $f }}</label>
                                                    <input type="text" class="form-control" 
                                                        name="offer{{ $i }}_feature{{ $f }}"
                                                        placeholder="{{ $defaultOffers[$i-1]['features'][$f-1] }}"
                                                        value="{{ isset($whatWeOfferContent) && $whatWeOfferContent 
                                                            ? ($whatWeOfferContent->content_json['services'][$i-1]['tags'][$f-1] ?? '') 
                                                            : $defaultOffers[$i-1]['features'][$f-1] }}">
                                                </div>
                                            </div>
                                        @endfor

                                        @for($s = 1; $s <= 3; $s++)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $s }} Label</label>
                                                    <input type="text" class="form-control" 
                                                        name="offer{{ $i }}_stat{{ $s }}_label"
                                                        placeholder="{{ $defaultOffers[$i-1]['stats'][$s-1]['label'] }}"
                                                        value="{{ isset($whatWeOfferContent) && $whatWeOfferContent 
                                                            ? ($whatWeOfferContent->content_json['services'][$i-1]['benefits'][$s-1]['label'] ?? '') 
                                                            : $defaultOffers[$i-1]['stats'][$s-1]['label'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $s }} Value</label>
                                                    <input type="text" class="form-control" 
                                                        name="offer{{ $i }}_stat{{ $s }}_value"
                                                        placeholder="{{ $defaultOffers[$i-1]['stats'][$s-1]['value'] }}"
                                                        value="{{ isset($whatWeOfferContent) && $whatWeOfferContent 
                                                            ? ($whatWeOfferContent->content_json['services'][$i-1]['benefits'][$s-1]['value'] ?? '') 
                                                            : $defaultOffers[$i-1]['stats'][$s-1]['value'] }}">
                                                </div>
                                            </div>
                                        @endfor

                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save What We Offer Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="section-content" id="additional-services-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-bolt"></i>
                                    MVP Services Section
                                </h2>
                           
                            </div>
                        </div>

                        <form id="additionalServicesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="section_title">{{ $additionalServicesContent->content_json['title'] ?? 'Specialized MVP Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="section_subtitle" 
                                            value="{{ $additionalServicesContent->content_json['subtitle'] ?? 'Comprehensive MVP solutions for every business need' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultServices = [
                                    ['title' => 'Rapid Prototyping', 'description' => 'Need to visualize your concept fast?...'],
                                    ['title' => 'Lean Startup Approach', 'description' => 'We follow lean product principles...'],
                                    ['title' => 'Technical Feasibility Checks', 'description' => 'Not sure if your idea is technically possible?...'],
                                    ['title' => 'Pilot Projects', 'description' => 'Want to test your product in a small market before expanding?...'],
                                    ['title' => 'MVP Redesigns', 'description' => 'Already built something but it’s falling flat?...']
                                ];
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                <div class="card mb-3">
                                    <div class="card-title">
                                        <i class="fas fa-cube"></i> Service {{ $i }}
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" 
                                            name="services[{{ $i-1 }}][title]" 
                                            value="{{ $additionalServicesContent->content_json['services'][$i-1]['title'] ?? $defaultServices[$i-1]['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="services[{{ $i-1 }}][description]" rows="2">{{ $additionalServicesContent->content_json['services'][$i-1]['description'] ?? $defaultServices[$i-1]['description'] }}</textarea>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Additional Services Section
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="section-content" id="expertise-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-bolt"></i>
                                    MVP Expertise Section
                                </h2>
                   
                            </div>
                        </div>

                        <form id="expertiseForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="expertise_title">{{ $expertiseContent->content_json['title'] ?? 'Our Areas of MVP Expertise' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="expertise_description" 
                                            value="{{ $expertiseContent->content_json['description'] ?? 'Specialized MVP development across multiple industries and technologies' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultExpertise = [
                                    ['title' => 'Web MVPs', 'description' => 'Custom-built apps for SaaS, marketplaces, or platform products'],
                                    ['title' => 'Mobile MVPs', 'description' => 'iOS, Android, and cross-platform builds for testing ideas on real devices'],
                                    ['title' => 'SaaS MVPs', 'description' => 'Subscription platforms with robust backends and user workflows'],
                                    ['title' => 'AI MVPs', 'description' => 'Prototypes that leverage machine learning to automate or enhance features'],
                                    ['title' => 'Blockchain MVPs', 'description' => 'DApps and tools for decentralized apps in fintech, supply chains, and beyond'],
                                    ['title' => 'IoT MVPs', 'description' => 'Connected product development for hardware-software systems']
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card mb-3">
                                    <div class="card-title">
                                        <i class="fas fa-cube"></i> Expertise {{ $i }}
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control"
                                            name="expertise{{ $i }}_title"
                                            value="{{ $expertiseContent->content_json['expertise'][$i-1]['title'] ?? $defaultExpertise[$i-1]['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="expertise{{ $i }}_description" rows="2">{{ $expertiseContent->content_json['expertise'][$i-1]['description'] ?? $defaultExpertise[$i-1]['description'] }}</textarea>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Expertise Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="section-content" id="tech-stack-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-bolt"></i>
                                    MVP Tech Stack Section
                                </h2>
                         
                            </div>
                        </div>

                        <form id="techStackForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="tech_title">{{ $techStackContent->content_json['title'] ?? 'MVP Tech Stack We Work With' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="tech_description"
                                            value="{{ $techStackContent->content_json['description'] ?? 'Modern, proven technologies for rapid MVP development' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTechs = [
                                    ['title' => 'Front-End Tools', 'description' => 'React.js, Vue.js, Angular, Svelte', 'tags' => ['React.js', 'Vue.js', 'Angular']],
                                    ['title' => 'Back-End Tools', 'description' => 'Node.js, Django, Flask, Laravel, Ruby on Rails, Spring Boot', 'tags' => ['Node.js', 'Django', 'Laravel']],
                                    ['title' => 'Mobile Tools', 'description' => 'Flutter, React Native, Swift, Kotlin', 'tags' => ['Flutter', 'React Native', 'Swift']],
                                    ['title' => 'Cloud Platforms', 'description' => 'AWS, Google Cloud, Microsoft Azure', 'tags' => ['AWS', 'Azure', 'GCP']],
                                    ['title' => 'Databases', 'description' => 'PostgreSQL, MongoDB, Firebase, MySQL', 'tags' => ['PostgreSQL', 'MongoDB', 'Firebase']],
                                    ['title' => 'DevOps / CI-CD', 'description' => 'Docker, Kubernetes, Jenkins, GitLab CI/CD', 'tags' => ['Docker', 'Kubernetes', 'Jenkins']],
                                    ['title' => 'Emerging Tech', 'description' => 'Machine Learning, Artificial Intelligence, Blockchain, IoT', 'tags' => ['AI', 'ML', 'Blockchain']],
                                ];
                            @endphp

                            @for($i = 1; $i <= 7; $i++)
                                <div class="card mb-3">
                                    <div class="card-title">
                                        <i class="fas fa-cube"></i> Tech Category {{ $i }}
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="tech{{ $i }}_title"
                                            value="{{ $techStackContent->content_json['categories'][$i-1]['title'] ?? $defaultTechs[$i-1]['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="tech{{ $i }}_description" rows="2">{{ $techStackContent->content_json['categories'][$i-1]['description'] ?? $defaultTechs[$i-1]['description'] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tags</label>
                                        <input type="text" class="form-control mb-2" name="tech{{ $i }}_tag1"
                                            value="{{ $techStackContent->content_json['categories'][$i-1]['tags'][0] ?? $defaultTechs[$i-1]['tags'][0] }}">
                                        <input type="text" class="form-control mb-2" name="tech{{ $i }}_tag2"
                                            value="{{ $techStackContent->content_json['categories'][$i-1]['tags'][1] ?? $defaultTechs[$i-1]['tags'][1] }}">
                                        <input type="text" class="form-control mb-2" name="tech{{ $i }}_tag3"
                                            value="{{ $techStackContent->content_json['categories'][$i-1]['tags'][2] ?? $defaultTechs[$i-1]['tags'][2] }}">
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Tech Stack Section
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="section-content" id="mvp-process-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-stream"></i>
                                    MVP Process Section
                                </h2>
                             
                            </div>
                        </div>

                        <form id="mvpProcessForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="process_title">{{ $mvpProcessContent->content_json['title'] ?? 'Our MVP Process, Step by Step' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="process_description"
                                            value="{{ $mvpProcessContent->content_json['description'] ?? 'A proven methodology that gets your MVP from idea to market quickly' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultSteps = [
                                    ['title' => 'Discovery', 'description' => 'Learn what your users need and clarify your product goals'],
                                    ['title' => 'Requirements', 'description' => 'Identify and lock in the core features needed to test your idea'],
                                    ['title' => 'Prototyping', 'description' => 'Create mockups and user flows to confirm direction'],
                                    ['title' => 'Design & Build', 'description' => 'Develop the MVP using fast, agile development cycles'],
                                    ['title' => 'Testing', 'description' => 'Run quality assurance and user testing to fix bugs and gather feedback'],
                                    ['title' => 'Launch', 'description' => 'Release the MVP to real users in your target market'],
                                    ['title' => 'Iterate', 'description' => 'Use real-world insights to refine and grow the product'],
                                ];
                            @endphp

                            @for($i = 1; $i <= 7; $i++)
                                <div class="card mb-3">
                                    <div class="card-title">
                                        <i class="fas fa-circle"></i> Step {{ $i }}
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Step Title</label>
                                        <input type="text" class="form-control" name="step{{ $i }}_title"
                                            value="{{ $mvpProcessContent->content_json['steps'][$i-1]['title'] ?? $defaultSteps[$i-1]['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Step Description</label>
                                        <textarea class="form-control" name="step{{ $i }}_description" rows="2">{{ $mvpProcessContent->content_json['steps'][$i-1]['description'] ?? $defaultSteps[$i-1]['description'] }}</textarea>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save MVP Process Section
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="section-content" id="key-benefits-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-gift"></i>
                                    Key Benefits Section
                                </h2>
                           
                            </div>
                        </div>

                        <form id="keyBenefitForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="benefits_title">{{ $keyBenefitsContent->content_json['title'] ?? 'Key Benefits of MVP Development' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="benefits_description"
                                            value="{{ $keyBenefitsContent->content_json['description'] ?? 'Why MVP development is the smart way to launch your product' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultBenefits = [
                                    [
                                        'title' => 'Launch with fewer risks and lower costs',
                                        'description' => 'Focus on essential features first to minimize investment and reduce development risks'
                                    ],
                                    [
                                        'title' => 'Validate your concept with real users',
                                        'description' => 'Test your idea with actual users before investing in full development'
                                    ],
                                    [
                                        'title' => 'Avoid building features no one uses',
                                        'description' => 'Build only what users actually need and want, preventing wasted development effort'
                                    ],
                                    [
                                        'title' => 'Save months of time in development',
                                        'description' => 'Accelerate your time-to-market with focused, lean development approach'
                                    ],
                                    [
                                        'title' => 'Gain traction with early adopters and investors',
                                        'description' => 'Build momentum and credibility with a working product that demonstrates value'
                                    ],
                                    [
                                        'title' => 'Use data to guide every next step',
                                        'description' => 'Make informed decisions based on real user behavior and feedback data',
                                    ],
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card mb-3">
                                    <div class="card-title">
                                        <i class="fas fa-circle"></i> Benefit {{ $i }}
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Benefit Title</label>
                                        <input type="text" class="form-control" name="benefit{{ $i }}_title"
                                            value="{{ $keyBenefitsContent->content_json['benefits'][$i-1]['title'] ?? $defaultBenefits[$i-1]['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Benefit Description</label>
                                        <textarea class="form-control" name="benefit{{ $i }}_description" rows="2">{{ $keyBenefitsContent->content_json['benefits'][$i-1]['description'] ?? $defaultBenefits[$i-1]['description'] }}</textarea>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Key Benefits Section
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="section-content" id="mvp-methodologies-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    MVP Methodologies Section
                                </h2>
                     
                            </div>
                        </div>

                        <form id="mvpMethodologiesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="methodologies_title">{{ $mvpMethodologiesContent->content_json['title'] ?? 'How We Build: MVP Methodologies That Work' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="methodologies_description"
                                            value="{{ $mvpMethodologiesContent->content_json['description'] ?? 'Proven methodologies that ensure your MVP is built efficiently and effectively' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultMethodologies = [
                                    [
                                        'title' => 'Agile',
                                        'description' => 'Work in sprints, improve quickly, stay flexible'
                                    ],
                                    [
                                        'title' => 'Scrum',
                                        'description' => 'Stay focused, organized, and goal-driven throughout development'                                   ],
                                    [
                                        'title' => 'Lean Startup',
                                        'description' => 'Focus on user value, quick learning, and resource efficiency'
                                    ],
                                    [
                                        'title' => 'DevOps',
                                        'description' => 'Smooth deployment with continuous integration and updates'
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card mb-3">
                                    <div class="card-title">
                                        <i class="fas fa-circle"></i> Methodology {{ $i }}
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="methodology{{ $i }}_title"
                                            value="{{ $mvpMethodologiesContent->content_json['methodologies'][$i-1]['title'] ?? $defaultMethodologies[$i-1]['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="methodology{{ $i }}_description" rows="2">{{ $mvpMethodologiesContent->content_json['methodologies'][$i-1]['description'] ?? $defaultMethodologies[$i-1]['description'] }}</textarea>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save MVP Methodologies Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="section-content" id="development-timeline-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    Development Timeline Section
                                </h2>
                        
                            </div>
                        </div>

                        <form id="developmentTimelineForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="timeline_title">{{ $developmentTimelineContent->content_json['title'] ?? 'Our Partner’s Development Timeline' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="timeline_description"
                                            value="{{ $developmentTimelineContent->content_json['description'] ?? 'A step-by-step journey from idea to launch and beyond' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTimeline = [
                                    ['title' => 'Validating the Idea', 'description' => 'Confirm the problem and who needs the solution'],
                                    ['title' => 'Product Discovery', 'description' => 'Map out features and define your MVP scope'],
                                    ['title' => 'Wireframing & Prototypes', 'description' => 'Create visual guides and click-through demos'],
                                    ['title' => 'Build the MVP', 'description' => 'Design, develop, and test'],
                                    ['title' => 'User Testing', 'description' => 'Put it in real hands and gather direct feedback'],
                                    ['title' => 'Launch', 'description' => 'Go live to early adopters and start learning'],
                                    ['title' => 'Ongoing Support', 'description' => 'Continue improving, scaling, and releasing updates'],
                                ];
                            @endphp

                            @for($i = 1; $i <= 7; $i++)
                                <div class="card mb-3">
                                    <div class="card-title">
                                        <i class="fas fa-circle"></i> Step {{ $i }}
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="step{{ $i }}_title"
                                            value="{{ $developmentTimelineContent->content_json['steps'][$i-1]['title'] ?? $defaultTimeline[$i-1]['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="step{{ $i }}_description" rows="2">{{ $developmentTimelineContent->content_json['steps'][$i-1]['description'] ?? $defaultTimeline[$i-1]['description'] }}</textarea>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Development Timeline Section
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="section-content" id="mvp-process-actually-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    MVP Process Actually Section
                                </h2>
                        
                            </div>
                        </div>

                        <form id="mvpProcessActuallyForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="process_title">{{ $mvpProcessActuallyContent->content_json['title'] ?? 'What the MVP Process Actually Looks Like' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="process_description"
                                            value="{{ $mvpProcessActuallyContent->content_json['description'] ?? 'A transparent look at our proven MVP development process' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultProcess = [
                                    ['title' => 'Research & Concepting', 'description' => "We dig into the challenge and the users you're trying to serve"],
                                    ['title' => 'Define Scope', 'description' => "We decide what really needs to be in the MVP — and what can wait"],
                                    ['title' => 'Design & Development', 'description' => 'The team builds a working, intuitive product you can test'],
                                    ['title' => 'Early Testing', 'description' => 'Users interact with it, and we capture their feedback'],
                                    ['title' => 'Growth & Scaling', 'description' => 'After validation, we help you build out a more complete version'],
                                ];
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                <div class="card mb-3">
                                    <div class="card-title">
                                        <i class="fas fa-circle"></i> Step {{ $i }}
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="step{{ $i }}_title"
                                            value="{{ $mvpProcessActuallyContent->content_json['steps'][$i-1]['title'] ?? $defaultProcess[$i-1]['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="step{{ $i }}_description" rows="2">{{ $mvpProcessActuallyContent->content_json['steps'][$i-1]['description'] ?? $defaultProcess[$i-1]['description'] }}</textarea>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save MVP Process Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="section-content" id="why-qubify-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-bolt"></i>
                                    Why Qubify Tech Section
                                </h2>

                            </div>
                        </div>

                        <form id="whyQubifyForm">
                            <div class="row">
                                <!-- Section Title -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="why_qubify_title">{{ $whyQubifyContent->content_json['title'] ?? 'Why Qubify Tech?' }}</textarea>
                                    </div>
                                </div>

                                <!-- Section Description -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control" name="why_qubify_description" rows="3">{{ $whyQubifyContent->content_json['description'] ?? 'We bring startup speed with enterprise-level care...' }}</textarea>
                                    </div>
                                </div>

                                <!-- Section Subtitle -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="why_qubify_subtitle"
                                            value="{{ $whyQubifyContent->content_json['subtitle'] ?? 'What Makes Us Stand Out' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Features Loop -->
                            @php
                                $defaultFeatures = [
                                    ['title' => 'Fast Launch Timelines', 'description' => 'Launch timelines in weeks, not drawn-out months'],
                                    ['title' => 'Product Thinking First', 'description' => 'Product thinking first — code comes second'],
                                    ['title' => 'Best Tech for You', 'description' => 'We work with the best tech for your needs, not ours'],
                                    ['title' => 'Full Journey Support', 'description' => 'We stay involved from first sketch to full launch'],
                                    ['title' => 'Clear Communication', 'description' => 'Clear communication and full transparency throughout'],
                                ];
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                <div class="card mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="feature{{ $i }}_title"
                                            value="{{ $whyQubifyContent->content_json['features'][$i-1]['title'] ?? $defaultFeatures[$i-1]['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="feature{{ $i }}_description" rows="2">{{ $whyQubifyContent->content_json['features'][$i-1]['description'] ?? $defaultFeatures[$i-1]['description'] }}</textarea>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Why Qubify Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="section-content" id="industries-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-industry"></i>
                                    Industries Section
                                </h2>

                            </div>
                        </div>

                        <form id="industriesForm">
                            <div class="row">
                                <!-- Section Title -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="industries_title">{{ $industriesContent->content_json['title'] ?? 'Industries We Support' }}</textarea>
                                    </div>
                                </div>

                                <!-- Section Description -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="industries_description" rows="3">{{ $industriesContent->content_json['description'] ?? 'MVP development expertise across diverse industries' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Industries Loop -->
                            @php
                                $defaultIndustries = [
                                    ['title' => 'Finance & Banking', 'description' => 'Digital payments, investing apps, and financial tools'],
                                    ['title' => 'Healthcare', 'description' => 'Patient portals, telehealth MVPs, and wellness platforms'],
                                    ['title' => 'Retail & eCommerce', 'description' => 'Custom stores, product marketplaces, and mobile shops'],
                                    ['title' => 'SaaS Tools', 'description' => 'Internal platforms, CRM, ERP, and other cloud-first tools'],
                                    ['title' => 'Education', 'description' => 'Learning platforms, tutoring apps, and online course MVPs'],
                                    ['title' => 'Travel & Booking', 'description' => 'Trip planners, booking engines, and travel tools']
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Industry Title</label>
                                        <input type="text" class="form-control" name="industry{{ $i }}_title"
                                            value="{{ $industriesContent->content_json['industries'][$i-1]['title'] ?? $defaultIndustries[$i-1]['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Industry Description</label>
                                        <textarea class="form-control" name="industry{{ $i }}_description" rows="2">{{ $industriesContent->content_json['industries'][$i-1]['description'] ?? $defaultIndustries[$i-1]['description'] }}</textarea>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Industries Section
                                </button>
                            </div>
                        </form>
                    </div>


                    <div class="section-content" id="hire-developers-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-users-cog"></i>
                                    Hire Developers Section
                                </h2>

                            </div>
                        </div>

                        <form id="hireDevelopersForm">
                            <div class="row">
                                <!-- Section Title -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="hire_title">{{ $hireDevelopersContent->content_json['title'] ?? 'Hire On-Demand MVP Developers' }}</textarea>
                                    </div>
                                </div>

                                <!-- Section Description -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="hire_description" rows="3">{{ $hireDevelopersContent->content_json['description'] ?? 'Need developers fast? We offer flexible engagement models that let you scale your team with experienced MVP builders who know how to move fast and stay aligned.' }}</textarea>
                                    </div>
                                </div>

                                <!-- Section Subtitle -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="hire_subtitle"
                                            value="{{ $hireDevelopersContent->content_json['subtitle'] ?? 'Our Developers Specialize In' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultSpecializations = [
                                    [
                                        'title' => 'Mobile Development',
                                        'tags' => 'React Native, Flutter, Swift, Kotlin'
                                    ],
                                    [
                                        'title' => 'Backend Development',
                                        'tags' => 'Node.js, Django, Laravel'
                                    ],
                                    [
                                        'title' => 'Cloud & Infrastructure',
                                        'tags' => 'Firebase, AWS Amplify, GCP'
                                    ],
                                    [
                                        'title' => 'UX/UI Design',
                                        'tags' => 'UX-first wireframing, MVP prototyping'
                                    ]
                                ];
                            @endphp

                            <!-- Specializations -->
                            @for($i = 1; $i <= 4; $i++)
                                <div class="card mb-3 p-3">
                                    <div class="form-group">
                                        <label class="form-label">Specialization {{ $i }} Title</label>
                                        <input type="text" class="form-control" name="specialization{{ $i }}_title"
                                            value="{{ $hireDevelopersContent->content_json['specializations'][$i-1]['title'] ?? $defaultSpecializations[$i-1]['title'] }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Tags (comma-separated)</label>
                                        <input type="text" class="form-control" name="specialization{{ $i }}_tags"
                                            value="{{ isset($hireDevelopersContent->content_json['specializations'][$i-1]['tags']) 
                                                ? implode(', ', $hireDevelopersContent->content_json['specializations'][$i-1]['tags']) 
                                                : $defaultSpecializations[$i-1]['tags'] }}">
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Hire Developers Section
                                </button>
                            </div>
                        </form>
                    </div>



                    <div class="section-content" id="faq-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-question-circle"></i>
                                    FAQ Section
                                </h2>
                           
                            </div>
                        </div>
                        
                        <form id="faqForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="faq_title" placeholder="Frequently Asked Questions">{{ isset($faqContent) && $faqContent ? ($faqContent->content_json['title'] ?? '') : 'Frequently Asked Questions' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Subtitle</label>
                                        <input type="text" class="form-control" name="faq_description" placeholder="Frequently Asked Questions" value="{{ isset($faqContent) && $faqContent ? ($faqContent->content_json['description'] ?? '') : '' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFaqs = [
                                    ['question' => 'How Can I Choose a Reliable Web Application Development Company?', 'answer' => 'Evaluate their portfolio to assess experience. Ensure they offer comprehensive services, use modern technologies, and maintain clear communication.'],
                                    ['question' => 'What Factors Influence the Cost of Creating a Custom Web Application?', 'answer' => 'Costs depend on the complexity of features, the location of the development team, and the level of customization required.'],
                                    ['question' => 'How Long Does It Take to Develop a Web Application?', 'answer' => 'Timelines vary based on project scope and features. Custom development generally takes longer than pre-built solutions.'],
                                    ['question' => 'What Differentiates Web Application Development from Website Development?', 'answer' => 'Web apps offer dynamic interactivity and are highly customizable, while websites typically deliver static content and simpler functionality.'],
                                    ['question' => 'Do Small Businesses Need Custom Web Application Development?', 'answer' => 'Custom web apps can boost visibility, attract more customers, and support business growth, making them ideal for expanding small businesses.'],
                                    ['question' => 'Do Small Businesses Need Custom Web Application Development?', 'answer' => 'Custom web apps can boost visibility, attract more customers, and support business growth, making them ideal for expanding small businesses.'],
                                    ['question' => 'Do Small Businesses Need Custom Web Application Development?', 'answer' => 'Custom web apps can boost visibility, attract more customers, and support business growth, making them ideal for expanding small businesses.'],
                                    ['question' => 'Do Small Businesses Need Custom Web Application Development?', 'answer' => 'Custom web apps can boost visibility, attract more customers, and support business growth, making them ideal for expanding small businesses.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 8; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-question"></i>
                                        FAQ {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Question</label>
                                                <textarea class="form-control" name="faq{{ $i }}_question" rows="2" placeholder="{{ $defaultFaqs[$i-1]['question'] }}">{{ isset($faqContent) && $faqContent ? ($faqContent->content_json['faqs'][$i-1]['question'] ?? '') : $defaultFaqs[$i-1]['question'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Answer</label>
                                                <textarea class="form-control" name="faq{{ $i }}_answer" rows="3" placeholder="{{ $defaultFaqs[$i-1]['answer'] }}">{{ isset($faqContent) && $faqContent ? ($faqContent->content_json['faqs'][$i-1]['answer'] ?? '') : $defaultFaqs[$i-1]['answer'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save FAQ Section
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
            const targetSection = this.getAttribute('data-section');
            
            // Remove active class from all links and sections
            sectionLinks.forEach(l => l.classList.remove('active'));
            sectionContents.forEach(s => s.classList.remove('active'));
            
            // Add active class to clicked link and corresponding section
            this.classList.add('active');
            document.getElementById(targetSection + '-section').classList.add('active');
        });
    });

    // CSRF token setup for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Define forms and their save routes
    const forms = [
        { id: 'heroForm', url: '{{ route("admin.mvp-development.save-hero") }}' },
        { id: 'introForm', url: '{{ route("admin.mvp-development.save-intro") }}' },
        { id: 'whatWeOfferForm', url: '{{ route("admin.mvp-development.save-what-we-offer") }}' },
        { id: 'additionalServicesForm', url: '{{ route("admin.mvp-development.save-additional-services") }}' },
        { id: 'expertiseForm', url: '{{ route("admin.mvp-development.save-expertise") }}' },
        { id: 'techStackForm', url: '{{ route("admin.mvp-development.save-tech-stack") }}' },
        { id: 'mvpProcessForm', url: '{{ route("admin.mvp-development.save-mvp-process") }}' },
        { id: 'keyBenefitForm', url: '{{ route("admin.mvp-development.save-key-benefits") }}' },
        { id: 'mvpMethodologiesForm', url: '{{ route("admin.mvp-development.save-mvp-methodologies") }}' },
        { id: 'developmentTimelineForm', url: '{{ route("admin.mvp-development.save-development-timeline") }}' },
        { id: 'mvpProcessActuallyForm', url: '{{ route("admin.mvp-development.save-mvp-process-actually") }}' },
        { id: 'whyQubifyForm', url: '{{ route("admin.mvp-development.save-why-qubify") }}' },
        { id: 'industriesForm', url: '{{ route("admin.mvp-development.save-industries") }}' },
        { id: 'hireDevelopersForm', url: '{{ route("admin.mvp-development.save-hire-developers") }}' },
        { id: 'faqForm', url: '{{ route("admin.mvp-development.save-faq") }}' }

        // 👉 add more forms here if needed
    ];

    // Attach submit event to each form
    forms.forEach(form => {
        const formElement = $('#' + form.id);

        if (formElement.length) {
            formElement.on('submit', function(e) {
                e.preventDefault();

                const submitButton = $(this).find('button[type="submit"]');
                const originalText = submitButton.html();

                // Show loading
                submitButton.html('<i class="fas fa-spinner fa-spin"></i> Saving...').prop('disabled', true);

                $.ajax({
                    url: form.url,
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            showNotification('success', response.message);
                        } else {
                            showNotification('error', response.message || 'An error occurred');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        showNotification('error', 'An error occurred while saving');
                    },
                    complete: function() {
                        // Reset button
                        submitButton.html(originalText).prop('disabled', false);
                    }
                });
            });
        }
    });


    // // Hero form submission
    // $('#heroForm').on('submit', function(e) {
    //     e.preventDefault();
        
    //     $.ajax({
    //         url: '{{ route("admin.mvp-development.save-hero") }}',
    //         method: 'POST', 
    //         data: $(this).serialize(),
    //         success: function(response) {
    //             if (response.success) {
    //                 showNotification('success', response.message);
    //             } else {
    //                 showNotification('Error', response.message);
    //             }
    //         },
    //         error: function(xhr) {
    //             alert('Error saving hero section');
    //         }
    //     });
    // });

    // // Intro form submission
    // $('#introForm').on('submit', function(e) {
    //     e.preventDefault();
        
    //     $.ajax({
    //         url: '{{ route("admin.mvp-development.save-intro") }}',
    //         method: 'POST',
    //         data: $(this).serialize(),
    //         success: function(response) {
    //             if (response.success) {
    //                 showNotification('success', response.message);
    //             } else {
    //                 showNotification('Error', response.message);
    //             }
    //         },
    //         error: function(xhr) {
    //             alert('Error saving intro section');
    //         }
    //     });
    // });
});


// Notification function
function showNotification(type, message) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
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
</script>

@endsection