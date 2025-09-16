@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $futureReadyContent = $futureReadyContent ?? null;
    $servicesContent = $servicesContent ?? null;
    $additionalServicesContent = $additionalServicesContent ?? null;
    $techStackContent = $techStackContent ?? null;
    $industrySolutionsContent = $industrySolutionsContent ?? null;
    $whyChooseUsContent = $whyChooseUsContent ?? null;
    $howWeWorkContent = $howWeWorkContent ?? null;
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
                    <li class="breadcrumb-item"><a href="#">Service Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mobile App Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">Mobile App Development Sections</h5>
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
                        <button class="section-nav-link" data-section="future-ready">
                            <i class="fas fa-rocket"></i>
                            Future-Ready Tech
                        </button>
                        <button class="section-nav-link" data-section="services">
                            <i class="fas fa-mobile-alt"></i>
                            Main Services
                        </button>
                        <button class="section-nav-link" data-section="additional-services">
                            <i class="fas fa-plus-circle"></i>
                            Additional Services
                        </button>   
                     <button class="section-nav-link" data-section="tech-stack">
                            <i class="fas fa-code"></i>
                            Tech Stack
                        </button>
                        <button class="section-nav-link" data-section="industry-solutions">
                            <i class="fas fa-industry"></i>
                            Industry Solutions
                        </button>
                        <button class="section-nav-link" data-section="why-choose-us">
                            <i class="fas fa-thumbs-up"></i>
                            Why Choose Us
                        </button>
                        <button class="section-nav-link" data-section="how-we-work">
                            <i class="fas fa-cogs"></i>
                            How We Work
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Title</label>
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Mobile App Development Services">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Mobile App Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="You bring the vision. We bring it to life—built with precision, passion, and purpose...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : "You bring the vision. We bring it to life—built with precision, passion, and purpose. We build apps that feel natural to use, perform flawlessly, and scale easily with your business growth." }}</textarea>
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
                                            <input type="text" class="form-control" name="hero_feature1" placeholder="iOS & Android Native" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][0] ?? '') : 'iOS & Android Native' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="hero_feature2" placeholder="Flutter & React Native" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][1] ?? '') : 'Flutter & React Native' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="hero_feature3" placeholder="Future-Ready Solutions" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][2] ?? '') : 'Future-Ready Solutions' }}">
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
                                            <input type="text" class="form-control" name="hero_button1_text" placeholder="🚀 Start Your Mobile App" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][0]['text'] ?? '') : '🚀 Start Your Mobile App' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="hero_button2_text" placeholder="💬 Get Free Consultation" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['text'] ?? '') : '💬 Get Free Consultation' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 URL</label>
                                            <input type="text" class="form-control" name="hero_button2_url" placeholder="{{ route('frontend.index') }}#contact" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['url'] ?? '') : route('frontend.index') . '#contact' }}">
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
                                        <textarea class="form-control editor" name="intro_title" rows="2" placeholder="Mobile Apps Are No Longer Optional They're Essential">{{ isset($introContent) && $introContent ? ($introContent->content_json['title'] ?? '') : 'Mobile Apps Are No Longer Optional They\'re Essential' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="intro_description" rows="4" placeholder="At Qubify Tech, we know mobile apps are how your business stays connected...">{{ isset($introContent) && $introContent ? ($introContent->content_json['description'] ?? '') : 'At Qubify Tech, we know mobile apps are how your business stays connected, competitive, and ready for growth. We build apps that feel natural to use, perform flawlessly, and scale easily—secure, future-proof, and built around your goals.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    ['title' => 'User-First Design', 'description' => 'Apps that feel intuitive, not forced, with natural user experiences'],
                                    ['title' => 'Speed & Performance', 'description' => 'Fast load times and smooth interactions for optimal user experience'],
                                    ['title' => 'Scalability', 'description' => 'Apps that grow with your business and adapt to changing needs'],
                                    ['title' => 'Security', 'description' => 'Protect your users and reputation at every touchpoint']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
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
                    <!-- Future Ready Section -->
                    <div class="section-content" id="future-ready-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-rocket"></i>
                                    Future-Ready Tech Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="futureReadyForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="future_title" placeholder="Future-Ready Mobile App Development">{{ isset($futureReadyContent) && $futureReadyContent ? ($futureReadyContent->content_json['title'] ?? '') : 'Future-Ready Mobile App Development' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="future_subtitle" placeholder="Technology changes fast. Your app should too. We embed future-focused features into your mobile solution from day one." value="{{ isset($futureReadyContent) && $futureReadyContent ? ($futureReadyContent->content_json['subtitle'] ?? '') : 'Technology changes fast. Your app should too. We embed future-focused features into your mobile solution from day one.' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTechnologies = [
                                    ['title' => 'AI Integration', 'description' => 'Smarter chatbots, predictive personalization, and better business insights powered by artificial intelligence.'],
                                    ['title' => 'IoT Connectivity', 'description' => 'Real-time device connectivity and control for smart home, industrial, and wearable applications.'],
                                    ['title' => 'AR & VR', 'description' => 'Immersive shopping, learning, and training experiences with augmented and virtual reality integration.'],
                                    ['title' => 'Blockchain', 'description' => 'Tamper-proof security and transparent transactions with decentralized technology integration.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-rocket"></i>
                                        Technology {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="tech{{ $i }}_title" placeholder="{{ $defaultTechnologies[$i-1]['title'] }}" value="{{ isset($futureReadyContent) && $futureReadyContent ? ($futureReadyContent->content_json['technologies'][$i-1]['title'] ?? '') : $defaultTechnologies[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="tech{{ $i }}_description" rows="2" placeholder="{{ $defaultTechnologies[$i-1]['description'] }}">{{ isset($futureReadyContent) && $futureReadyContent ? ($futureReadyContent->content_json['technologies'][$i-1]['description'] ?? '') : $defaultTechnologies[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Future Ready Section
                                </button>
                            </div>
                        </form>
                    </div>  
                   <!-- Main Services Section -->
                    <div class="section-content" id="services-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-mobile-alt"></i>
                                    Main Services Section
                                </h2>

                            </div>
                        </div>
                        
                        <form id="servicesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="services_title" placeholder="Our Mobile App Development Services">{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['title'] ?? '') : 'Our Mobile App Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="services_subtitle" placeholder="Different businesses. Different apps. Tailored every time." value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['subtitle'] ?? '') : 'Different businesses. Different apps. Tailored every time.' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultServices = [
                                    [
                                        'title' => 'iOS App Development',
                                        'subtitle' => 'Beautiful Apps for Apple Users',
                                        'description' => 'Apple users are loyal—and they expect apps that work, feel beautiful, and perform without friction. We build iOS apps using Swift and Objective-C, following Apple\'s Human Interface Guidelines, and integrating services like Apple Pay, HealthKit, and CoreML.',
                                        'features' => ['Swift & Objective-C', 'Apple Pay Integration', 'App Store Ready'],
                                        'stats' => [
                                            ['label' => 'User Satisfaction', 'value' => '98%'],
                                            ['label' => 'App Store Approval', 'value' => '100%'],
                                            ['label' => 'Performance', 'value' => 'A+']
                                        ]
                                    ],
                                    [
                                        'title' => 'Android App Development',
                                        'subtitle' => 'Reach the World\'s Largest Mobile Platform',
                                        'description' => 'With Android powering most of the world\'s devices, there\'s massive opportunity here. We develop Android apps using Kotlin and Java, making sure they run smoothly across smartphones, tablets, and wearables while optimizing for Android fragmentation.',
                                        'features' => ['Kotlin & Java', 'Multi-Device Support', 'Play Store Ready'],
                                        'stats' => [
                                            ['label' => 'Global Market Share', 'value' => '71%'],
                                            ['label' => 'Device Compatibility', 'value' => '1000+'],
                                            ['label' => 'Performance Score', 'value' => '95%']
                                        ]
                                    ],
                                    [
                                        'title' => 'Cross-Platform Development',
                                        'subtitle' => 'Build Smart Once, Deploy Everywhere',
                                        'description' => 'Why build twice when you can build smart once? Cross-platform frameworks like Flutter and React Native let you launch faster, with a single codebase, without sacrificing user experience. Your app will still feel natural on both iOS and Android.',
                                        'features' => ['Flutter & React Native', 'Single Codebase', 'Cost Effective'],
                                        'stats' => [
                                            ['label' => 'Development Time', 'value' => '-50%'],
                                            ['label' => 'Cost Savings', 'value' => '-40%'],
                                            ['label' => 'Code Reusability', 'value' => '90%']
                                        ]
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-mobile"></i>
                                        Service {{ $i }} - {{ $defaultServices[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_title" placeholder="{{ $defaultServices[$i-1]['title'] }}" value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['services'][$i-1]['title'] ?? '') : $defaultServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_subtitle" placeholder="{{ $defaultServices[$i-1]['subtitle'] }}" value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['services'][$i-1]['subtitle'] ?? '') : $defaultServices[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="service{{ $i }}_description" rows="3" placeholder="{{ $defaultServices[$i-1]['description'] }}">{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['services'][$i-1]['description'] ?? '') : $defaultServices[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 1</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_feature1" placeholder="{{ $defaultServices[$i-1]['features'][0] }}" value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['services'][$i-1]['features'][0] ?? '') : $defaultServices[$i-1]['features'][0] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 2</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_feature2" placeholder="{{ $defaultServices[$i-1]['features'][1] }}" value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['services'][$i-1]['features'][1] ?? '') : $defaultServices[$i-1]['features'][1] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 3</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_feature3" placeholder="{{ $defaultServices[$i-1]['features'][2] }}" value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['services'][$i-1]['features'][2] ?? '') : $defaultServices[$i-1]['features'][2] }}">
                                            </div>
                                        </div>
                                        @for($j = 1; $j <= 3; $j++)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $j }} Label</label>
                                                    <input type="text" class="form-control" name="service{{ $i }}_stat{{ $j }}_label" placeholder="{{ $defaultServices[$i-1]['stats'][$j-1]['label'] }}" value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['services'][$i-1]['stats'][$j-1]['label'] ?? '') : $defaultServices[$i-1]['stats'][$j-1]['label'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $j }} Value</label>
                                                    <input type="text" class="form-control" name="service{{ $i }}_stat{{ $j }}_value" placeholder="{{ $defaultServices[$i-1]['stats'][$j-1]['value'] }}" value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['services'][$i-1]['stats'][$j-1]['value'] ?? '') : $defaultServices[$i-1]['stats'][$j-1]['value'] }}">
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Main Services Section
                                </button>
                            </div>
                        </form>
                    </div>   
                   <!-- Additional Services Section -->
                    <div class="section-content" id="additional-services-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-plus-circle"></i>
                                    Additional Services Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="additionalServicesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="additional_title" placeholder="Additional Services">{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent->content_json['title'] ?? '') : 'Additional Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="additional_subtitle" placeholder="Comprehensive mobile solutions for every business need" value="{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent->content_json['subtitle'] ?? '') : 'Comprehensive mobile solutions for every business need' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultAdditionalServices = [
                                    ['title' => 'Hybrid Mobile App Development', 'subtitle' => 'Fast Deployment & Wide Coverage', 'description' => 'Using frameworks like Ionic, PhoneGap, and Cordova for MVPs, internal business tools, and content-driven platforms.'],
                                    ['title' => 'Progressive Web App (PWA)', 'subtitle' => 'No Downloads, Full Experience', 'description' => 'Fast load times, offline access, push notifications, and home-screen installability without app store approvals.'],
                                    ['title' => 'Custom Mobile App Development', 'subtitle' => 'When Templates Won\'t Cut It', 'description' => 'Built precisely to your specs with flexibility to evolve as you grow, tailored for your unique business needs.'],
                                    ['title' => 'Mobile App UI/UX Design', 'subtitle' => 'Design That Works Better', 'description' => 'User research, journey mapping, wireframing, and testing to create apps that feel effortless to use.'],
                                    ['title' => 'Mobile App Maintenance & Support', 'subtitle' => 'Beyond Launch Support', 'description' => 'Regular updates, bug fixes, performance tuning, and scaling support to keep your app competitive.'],
                                    ['title' => 'Specialized Mobile Apps', 'subtitle' => 'Industry-Specific Solutions', 'description' => 'Enterprise apps, on-demand platforms, mobile games, IoT apps, wearable apps, and blockchain applications.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-plus"></i>
                                        Additional Service {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="add_service{{ $i }}_title" placeholder="{{ $defaultAdditionalServices[$i-1]['title'] }}" value="{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent->content_json['services'][$i-1]['title'] ?? '') : $defaultAdditionalServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="add_service{{ $i }}_subtitle" placeholder="{{ $defaultAdditionalServices[$i-1]['subtitle'] }}" value="{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent->content_json['services'][$i-1]['subtitle'] ?? '') : $defaultAdditionalServices[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="add_service{{ $i }}_description" rows="2" placeholder="{{ $defaultAdditionalServices[$i-1]['description'] }}">{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent->content_json['services'][$i-1]['description'] ?? '') : $defaultAdditionalServices[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Additional Services Section
                                </button>
                            </div>
                        </form>
                    </div>    
                  <!-- Tech Stack Section -->
                    <div class="section-content" id="tech-stack-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-code"></i>
                                    Tech Stack Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="techStackForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="tech_title" placeholder="We Use the Latest Mobile App Development Tech Stack">{{ isset($techStackContent) && $techStackContent ? ($techStackContent->content_json['title'] ?? '') : 'We Use the Latest Mobile App Development Tech Stack' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="tech_subtitle" placeholder="Latest, stable, and scalable tech stacks for apps that stand the test of time" value="{{ isset($techStackContent) && $techStackContent ? ($techStackContent->content_json['subtitle'] ?? '') : 'Latest, stable, and scalable tech stacks for apps that stand the test of time' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTechCategories = [
                                    ['title' => 'Frontend Frameworks', 'description' => 'Swift, Kotlin, Flutter, React Native', 'technologies' => 'Swift,Kotlin,Flutter,React Native'],
                                    ['title' => 'Backend Technologies', 'description' => 'Node.js, Python, Ruby, PHP', 'technologies' => 'Node.js,Python,Django,Ruby'],
                                    ['title' => 'Cloud Platforms', 'description' => 'AWS, Google Cloud, Azure', 'technologies' => 'AWS,GCP,Azure'],
                                    ['title' => 'Databases', 'description' => 'Firebase, MongoDB, PostgreSQL, Realm Database, SQLite', 'technologies' => 'Firebase,SQLite,MongoDB,PostgreSQL'],
                                    ['title' => 'Testing Tools', 'description' => 'Appium, Espresso, XCUITest, Detox', 'technologies' => 'Appium,Espresso,XCUITest,Detox'],
                                    ['title' => 'Emerging Technologies', 'description' => 'Artificial Intelligence, Machine Learning, Internet of Things, Blockchain, Augmented Reality', 'technologies' => 'AI,ML,IoT,Blockchain,AR']
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-layer-group"></i>
                                        Tech Category {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Category Title</label>
                                                <input type="text" class="form-control" name="tech{{ $i }}_title" placeholder="{{ $defaultTechCategories[$i-1]['title'] }}" value="{{ isset($techStackContent) && $techStackContent ? ($techStackContent->content_json['categories'][$i-1]['title'] ?? '') : $defaultTechCategories[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <input type="text" class="form-control" name="tech{{ $i }}_description" placeholder="{{ $defaultTechCategories[$i-1]['description'] }}" value="{{ isset($techStackContent) && $techStackContent ? ($techStackContent->content_json['categories'][$i-1]['description'] ?? '') : $defaultTechCategories[$i-1]['description'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Technologies (comma-separated)</label>
                                                <textarea class="form-control" name="tech{{ $i }}_technologies" rows="2" placeholder="{{ $defaultTechCategories[$i-1]['technologies'] }}">{{ isset($techStackContent) && $techStackContent ? implode(',', $techStackContent->content_json['categories'][$i-1]['technologies'] ?? []) : $defaultTechCategories[$i-1]['technologies'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Tech Stack Section
                                </button>
                            </div>
                        </form>
                    </div>    
                  <!-- Industry Solutions Section -->
                    <div class="section-content" id="industry-solutions-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-industry"></i>
                                    Industry Solutions Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="industrySolutionsForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="industry_title" placeholder="Different industries. Specific needs. Smart solutions.">{{ isset($industrySolutionsContent) && $industrySolutionsContent ? ($industrySolutionsContent->content_json['title'] ?? '') : 'Different industries. Specific needs. Smart solutions.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultSolutions = [
                                    ['title' => 'Enterprise apps', 'description' => 'Secure internal systems for HR, CRM, ERP, and asset management.'],
                                    ['title' => 'On-Demand apps', 'description' => 'Instant booking, tracking, and service delivery platforms.'],
                                    ['title' => 'Mobile games', 'description' => '2D, 3D, AR-based gaming experiences.'],
                                    ['title' => 'IoT apps', 'description' => 'Smart home, industrial IoT monitoring, and wearable controls.'],
                                    ['title' => 'Wearable apps', 'description' => 'Fitness tracking, healthcare monitoring, and AR navigation.'],
                                    ['title' => 'Blockchain apps', 'description' => 'Decentralized finance tools, crypto wallets, and secure ledgers.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-industry"></i>
                                        Solution {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="solution{{ $i }}_title" placeholder="{{ $defaultSolutions[$i-1]['title'] }}" value="{{ isset($industrySolutionsContent) && $industrySolutionsContent ? ($industrySolutionsContent->content_json['solutions'][$i-1]['title'] ?? '') : $defaultSolutions[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="solution{{ $i }}_description" rows="2" placeholder="{{ $defaultSolutions[$i-1]['description'] }}">{{ isset($industrySolutionsContent) && $industrySolutionsContent ? ($industrySolutionsContent->content_json['solutions'][$i-1]['description'] ?? '') : $defaultSolutions[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-comment"></i>
                                    Bottom Message
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Bottom Message</label>
                                    <textarea class="form-control" name="bottom_message" rows="3" placeholder="Next, no matter your sector, we bring real-world experience—not just technical know-how—to the table.">{{ isset($industrySolutionsContent) && $industrySolutionsContent ? ($industrySolutionsContent->content_json['bottom_message'] ?? '') : 'Next, no matter your sector, we bring real-world experience—not just technical know-how—to the table.' }}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Industry Solutions Section
                                </button>
                            </div>
                        </form>
                    </div> 
                   <!-- Why Choose Us Section -->
                    <div class="section-content" id="why-choose-us-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    Why Choose Us Section
                                </h2>

                            </div>
                        </div>
                        
                        <form id="whyChooseUsForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="why_title" placeholder="Why Choose Qubify Tech?">{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent->content_json['title'] ?? '') : 'Why Choose Qubify Tech?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="why_subtitle" placeholder="Smart builds. Straight talk. Real outcomes." value="{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent->content_json['subtitle'] ?? '') : 'Smart builds. Straight talk. Real outcomes.' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultReasons = [
                                    ['title' => 'Senior Team', 'description' => 'Senior engineers, designers, and architects—no juniors learning on your project.'],
                                    ['title' => 'Direct Access', 'description' => 'Direct access to your development team, no middle layers or communication barriers.'],
                                    ['title' => 'Clear Milestones', 'description' => 'Clear project milestones, fast iterations, and honest updates throughout development.'],
                                    ['title' => 'Flexible Models', 'description' => 'Flexible working models: full project ownership or team extension based on your needs.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Reason {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="reason{{ $i }}_title" placeholder="{{ $defaultReasons[$i-1]['title'] }}" value="{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent->content_json['reasons'][$i-1]['title'] ?? '') : $defaultReasons[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="reason{{ $i }}_description" rows="2" placeholder="{{ $defaultReasons[$i-1]['description'] }}">{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent->content_json['reasons'][$i-1]['description'] ?? '') : $defaultReasons[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Why Choose Us Section
                                </button>
                            </div>
                        </form>
                    </div>      
              <!-- How We Work Section -->
                    <div class="section-content" id="how-we-work-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    How We Work Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="howWeWorkForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="work_title" placeholder="How We Work">{{ isset($howWeWorkContent) && $howWeWorkContent ? ($howWeWorkContent->content_json['title'] ?? '') : 'How We Work' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="work_subtitle" placeholder="Simple. Structured. Transparent." value="{{ isset($howWeWorkContent) && $howWeWorkContent ? ($howWeWorkContent->content_json['subtitle'] ?? '') : 'Simple. Structured. Transparent.' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultSteps = [
                                    ['title' => 'Discovery and Strategy Workshops', 'description' => 'Deep dive into your goals, challenges, and customer behaviors to map out exactly what your app needs.'],
                                    ['title' => 'Wireframing and User Flow Mapping', 'description' => 'Create detailed user personas, map their journeys, and wireframe intuitive flows for optimal user experience.'],
                                    ['title' => 'Visual and Interaction Design', 'description' => 'Design brand-aligned, clean, and mobile-first screens that guide users naturally and reduce friction.'],
                                    ['title' => 'Parallel Front-end and Back-end Development', 'description' => 'Simultaneous development of user interface and server-side functionality for faster delivery.'],
                                    ['title' => 'Continuous Integration and Testing', 'description' => 'Ongoing testing and feedback loops to ensure quality and performance throughout development.'],
                                    ['title' => 'App Store/Play Store Launch', 'description' => 'Handle compliance, submission, and approvals for both App Store and Google Play Store.'],
                                    ['title' => 'Ongoing Support and Scaling', 'description' => 'Continuous support, improvements, and scaling to keep your app competitive and growing.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 7; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-step-forward"></i>
                                        Step {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Step Title</label>
                                                <input type="text" class="form-control" name="step{{ $i }}_title" placeholder="{{ $defaultSteps[$i-1]['title'] }}" value="{{ isset($howWeWorkContent) && $howWeWorkContent ? ($howWeWorkContent->content_json['steps'][$i-1]['title'] ?? '') : $defaultSteps[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Step Description</label>
                                                <textarea class="form-control" name="step{{ $i }}_description" rows="2" placeholder="{{ $defaultSteps[$i-1]['description'] }}">{{ isset($howWeWorkContent) && $howWeWorkContent ? ($howWeWorkContent->content_json['steps'][$i-1]['description'] ?? '') : $defaultSteps[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save How We Work Section
                                </button>
                            </div>
                        </form>
                    </div> 
                   <!-- FAQ Section -->
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
                            </div>

                            @php
                                $defaultFaqs = [
                                    ['question' => 'How much does mobile app development cost?', 'answer' => 'Anywhere from $10,000 to $300,000, depending on scope, tech stack, and features. We provide detailed estimates after understanding your requirements.'],
                                    ['question' => 'How long will it take?', 'answer' => 'Most apps take 3 to 9 months, depending on complexity. Simple apps can be completed in 3-4 months, while complex enterprise apps may take 6-9 months.'],
                                    ['question' => 'Which platform should I build for first—iOS or Android?', 'answer' => 'Depends on your users and market. Cross-platform development is often a smart early move to reach both audiences simultaneously.'],
                                    ['question' => 'Can you integrate AI features?', 'answer' => 'Yes. We build apps with chatbots, recommendation engines, AI-powered personalization, and machine learning capabilities.'],
                                    ['question' => 'Will you handle App Store and Play Store publishing?', 'answer' => 'Absolutely. We take care of compliance, submission, and approvals for both platforms, ensuring smooth launch process.'],
                                    ['question' => 'Is my app idea safe?', 'answer' => 'Yes. We sign NDAs upfront and treat your intellectual property with full confidentiality and security.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
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
<!-- JavaScript for Dynamic Page Management -->
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
    const forms = [
        { id: 'heroForm', url: '{{ route("service.mobileAppDevelopment.save-hero") }}' },
        { id: 'introForm', url: '{{ route("service.mobileAppDevelopment.save-intro") }}' },
        { id: 'futureReadyForm', url: '{{ route("service.mobileAppDevelopment.save-future-ready") }}' },
        { id: 'servicesForm', url: '{{ route("service.mobileAppDevelopment.save-services") }}' },
        { id: 'additionalServicesForm', url: '{{ route("service.mobileAppDevelopment.save-additional-services") }}' },
        { id: 'techStackForm', url: '{{ route("service.mobileAppDevelopment.save-tech-stack") }}' },
        { id: 'industrySolutionsForm', url: '{{ route("service.mobileAppDevelopment.save-industry-solutions") }}' },
        { id: 'whyChooseUsForm', url: '{{ route("service.mobileAppDevelopment.save-why-choose-us") }}' },
        { id: 'howWeWorkForm', url: '{{ route("service.mobileAppDevelopment.save-how-we-work") }}' },
        { id: 'faqForm', url: '{{ route("service.mobileAppDevelopment.save-faq") }}' }
    ];

    forms.forEach(form => {
        const formElement = document.getElementById(form.id);
        if (formElement) {
            formElement.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const submitButton = this.querySelector('button[type="submit"]');
                const originalText = submitButton.innerHTML;
                
                // Show loading state
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
                submitButton.disabled = true;
                
                fetch(form.url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        showNotification('success', data.message);
                    } else {
                        // Show error message
                        showNotification('error', data.message || 'An error occurred');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('error', 'An error occurred while saving');
                })
                .finally(() => {
                    // Reset button state
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
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
            const label = this.nextElementSibling;
            
            // Update label text
            label.textContent = isActive ? 'On' : 'Off';
            
            // Send toggle request
            fetch('{{ route("service.mobileAppDevelopment.toggle-section") }}', {
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
                    showNotification('error', data.message || 'An error occurred');
                    // Revert toggle state on error
                    this.checked = !isActive;
                    label.textContent = !isActive ? 'On' : 'Off';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('error', 'An error occurred while updating section status');
                // Revert toggle state on error
                this.checked = !isActive;
                label.textContent = !isActive ? 'On' : 'Off';
            });
        });
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
});
</script>

@endsection