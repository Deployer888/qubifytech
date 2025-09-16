@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $coreServicesContent = $coreServicesContent ?? null;
    $specializedServicesContent = $specializedServicesContent ?? null;
    $technologyStackContent = $technologyStackContent ?? null;
    $processContent = $processContent ?? null;
    $methodologiesContent = $methodologiesContent ?? null;
    $developmentProcessContent = $developmentProcessContent ?? null;
    $benefitsContent = $benefitsContent ?? null;
    $understandingProcessContent = $understandingProcessContent ?? null;
    $whyChooseUsContent = $whyChooseUsContent ?? null;
    $whatMakesDifferentContent = $whatMakesDifferentContent ?? null;
    $benefitsCustomContent = $benefitsCustomContent ?? null;
    $whyChooseDetailedContent = $whyChooseDetailedContent ?? null;
    $industriesContent = $industriesContent ?? null;
    $onDemandDevelopersContent = $onDemandDevelopersContent ?? null;
    $faqContent = $faqContent ?? null;
    $servicesContent = $servicesContent ?? null;
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
                    <li class="breadcrumb-item"><a href="#">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Software Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">Software Development Sections</h5>
                    </div>
                    <div class="sections-nav">
                        <button class="section-nav-link active" data-section="hero">
                            <i class="fas fa-rocket"></i>
                            Hero Section
                        </button>
                        <button class="section-nav-link" data-section="intro">
                            <i class="fas fa-info-circle"></i>
                            Intro Section
                        </button>
                        <button class="section-nav-link" data-section="core-services">
                            <i class="fas fa-cogs"></i>
                            Core Services
                        </button>
                        <button class="section-nav-link" data-section="additional-services">
                            <i class="fas fa-star"></i>
                            Additional Services
                        </button>
                        <button class="section-nav-link" data-section="specialized-services">
                            <i class="fas fa-star"></i>
                            Specialized Services
                        </button>
                        <button class="section-nav-link" data-section="technology-stack">
                            <i class="fas fa-layer-group"></i>
                            Technology Stack
                        </button>
                        <button class="section-nav-link" data-section="process">
                            <i class="fas fa-tasks"></i>
                            Process Section
                        </button>
                        <button class="section-nav-link" data-section="methodologies">
                            <i class="fas fa-tasks"></i>
                            Methodologies Section
                        </button>
                        <button class="section-nav-link" data-section="development-step">
                            <i class="fas fa-tasks"></i>
                            Development Step Section
                        </button>
                        <button class="section-nav-link" data-section="benefits">
                            <i class="fas fa-tasks"></i>
                            Benifits Section
                        </button>
                        <button class="section-nav-link" data-section="understanding-process">
                            <i class="fas fa-tasks"></i>
                            Understanding Process Section
                        </button>
                        <button class="section-nav-link" data-section="why-choose-us">
                            <i class="fas fa-thumbs-up"></i>
                            Why Choose Us
                        </button>
                        <button class="section-nav-link" data-section="what-makes-different">
                            <i class="fas fa-thumbs-up"></i>
                            What Makes Different
                        </button>
                        <button class="section-nav-link" data-section="what-benefit-custom">
                            <i class="fas fa-thumbs-up"></i>
                            Custom Benefits
                        </button>
                        <button class="section-nav-link" data-section="choose-custom-development">
                            <i class="fas fa-thumbs-up"></i>
                            Custom Development
                        </button>
                        <button class="section-nav-link" data-section="industries">
                            <i class="fas fa-industry"></i>
                            Industries We Serve
                        </button>
                        <button class="section-nav-link" data-section="on-demand-developers">
                            <i class="fas fa-users-cog"></i>
                            On-Demand Developers
                        </button>
                        <button class="section-nav-link" data-section="faq">
                            <i class="fas fa-question"></i>
                            FAQ Section
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
                                    <i class="fas fa-rocket"></i>
                                    Hero Section
                                </h2>

                            </div>
                        </div>
                        
                        <form id="heroForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Title</label>
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Custom Software Development Services">{{ isset($heroContent) && $heroContent ? ($heroContent['title'] ?? '') : 'Custom Software Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control" name="hero_subtitle" rows="4" placeholder="You define the vision; we craft the software to bring it to life...">{{ isset($heroContent) && $heroContent ? ($heroContent['subtitle'] ?? '') : 'You define the vision; we craft the software to bring it to life. With a focus on scalability, performance, and purpose-driven solutions, our custom software development services address your unique challenges and drive results.' }}</textarea>
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
                                            <input type="text" class="form-control" name="hero_feature1" placeholder="AI-Driven Solutions" value="{{ isset($heroContent) && $heroContent ? ($heroContent['features'][0] ?? '') : 'AI-Driven Solutions' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="hero_feature2" placeholder="Enterprise Ready" value="{{ isset($heroContent) && $heroContent ? ($heroContent['features'][1] ?? '') : 'Enterprise Ready' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="hero_feature3" placeholder="Scalable Architecture" value="{{ isset($heroContent) && $heroContent ? ($heroContent['features'][2] ?? '') : 'Scalable Architecture' }}">
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
                                            <label class="form-label">Primary Button Text</label>
                                            <input type="text" class="form-control" name="hero_button1_text" placeholder="🚀 Start Your Software Project" value="{{ isset($heroContent) && $heroContent ? ($heroContent['buttons'][0]['text'] ?? '') : '🚀 Start Your Software Project' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Secondary Button Text</label>
                                            <input type="text" class="form-control" name="hero_button2_text" placeholder="💬 Get Free Consultation" value="{{ isset($heroContent) && $heroContent ? ($heroContent['buttons'][1]['text'] ?? '') : '💬 Get Free Consultation' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Secondary Button URL</label>
                                            <input type="text" class="form-control" name="hero_button2_url" placeholder="#contact" value="{{ isset($heroContent) && $heroContent ? ($heroContent['buttons'][1]['url'] ?? '') : '#contact' }}">
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
                                        <textarea class="form-control editor" name="intro_title" rows="2" placeholder="Custom Software Development Services That are AI-Driven">{{ isset($introContent) && $introContent ? ($introContent['title'] ?? '') : 'Custom Software Development Services That are AI-Driven' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control" name="intro_description" rows="4" placeholder="As AI becomes a likable tool for industries, they are using it to make smart decisions...">{{ isset($introContent) && $introContent ? ($introContent['description'] ?? '') : 'As AI becomes a likable tool for industries, they are using it to make smart decisions. Our software development services powered by AI allow smart software applications to flourish in every industry from healthcare to retail using NLP, computer vision, and more.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    ['title' => 'AI-Powered Automation', 'description' => 'Automate dull job workflows and enhance client experience with intelligent software solutions powered by machine learning and AI'],
                                    ['title' => 'Enterprise Solutions', 'description' => 'Build reliable and secure custom systems that scale your business with advanced analytics and integrated workflows'],
                                    ['title' => 'Revenue Growth', 'description' => 'Increase revenue like never before with smart software applications that enhance efficiency and drive business growth']
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
                                                <label class="form-label">Feature Title</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_title" placeholder="{{ $defaultFeatures[$i-1]['title'] }}" value="{{ isset($introContent) && $introContent ? ($introContent['features'][$i-1]['title'] ?? '') : $defaultFeatures[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Feature Description</label>
                                                <textarea class="form-control" name="feature{{ $i }}_description" rows="2" placeholder="{{ $defaultFeatures[$i-1]['description'] }}">{{ isset($introContent) && $introContent ? ($introContent['features'][$i-1]['description'] ?? '') : $defaultFeatures[$i-1]['description'] }}</textarea>
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

                    <!-- Core Services Section -->
                    <div class="section-content" id="core-services-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    Core Services Section
                                </h2>
           
                            </div>
                        </div>
                        
                        <form id="coreServicesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="core_title" placeholder="Our Custom Software Development Services">{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['title'] ?? '') : 'Our Custom Software Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="core_subtitle" placeholder="Comprehensive software development solutions tailored to your business needs" value="{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['subtitle'] ?? '') : 'Comprehensive software development solutions tailored to your business needs' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultCoreServices = [
                                    [
                                        'title' => 'Custom Software Development',
                                        'subtitle' => 'Bespoke Solutions for Your Organization',
                                        'description' => 'We offer bespoke software development services to meet the unique needs of your organization. We build scalable and high-performance solutions that help enhance the efficiency of workflows, improve usability, and boost the future goals of your company.',
                                        'features' => ['Scalable Solutions', 'High Performance', 'Advanced Tech'],
                                        'stats' => [
                                            ['label' => 'Time to Market', 'value' => '-60%'],
                                            ['label' => 'Development Cost', 'value' => '-40%'],
                                            ['label' => 'Scalability', 'value' => '∞']
                                        ]
                                    ],
                                    [
                                        'title' => 'Enterprise Software Development',
                                        'subtitle' => 'Reliable & Secure Custom Systems',
                                        'description' => 'We assist big players in creating custom software to build reliable and secure custom systems that scale your business. Our custom products use advanced analytics, automation tools, and integrated workflows so departments can work efficiently.',
                                        'features' => ['Advanced Analytics', 'Automation Tools', 'Integrated Workflows'],
                                        'stats' => [
                                            ['label' => 'Time to Market', 'value' => '-60%'],
                                            ['label' => 'Development Cost', 'value' => '-40%'],
                                            ['label' => 'Scalability', 'value' => '∞']
                                        ]
                                    ],
                                    [
                                        'title' => 'Software Product Development',
                                        'subtitle' => 'From MVP to Market Launch',
                                        'description' => 'We have proficient software engineers who can create stand-alone or customized software as per business needs. We take care of everything from MVP to product launch with research, design, and development to make sure you produce competitive, user-friendly, and market-ready products.',
                                        'features' => ['MVP Development', 'Market Research', 'Product Launch'],
                                        'stats' => [
                                            ['label' => 'Time to Market', 'value' => '-60%'],
                                            ['label' => 'Development Cost', 'value' => '-40%'],
                                            ['label' => 'Scalability', 'value' => '∞']
                                        ]
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-layer-group"></i>
                                        Core Service {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Service Title</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_title" placeholder="{{ $defaultCoreServices[$i-1]['title'] }}" value="{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['services'][$i-1]['title'] ?? '') : $defaultCoreServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Service Subtitle</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_subtitle" placeholder="{{ $defaultCoreServices[$i-1]['subtitle'] }}" value="{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['services'][$i-1]['subtitle'] ?? '') : $defaultCoreServices[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Service Description</label>
                                                <textarea class="form-control" name="service{{ $i }}_description" rows="3" placeholder="{{ $defaultCoreServices[$i-1]['description'] }}">{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['services'][$i-1]['description'] ?? '') : $defaultCoreServices[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 1</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_feature1" placeholder="{{ $defaultCoreServices[$i-1]['features'][0] }}" value="{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['services'][$i-1]['features'][0] ?? '') : $defaultCoreServices[$i-1]['features'][0] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 2</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_feature2" placeholder="{{ $defaultCoreServices[$i-1]['features'][1] }}" value="{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['services'][$i-1]['features'][1] ?? '') : $defaultCoreServices[$i-1]['features'][1] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 3</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_feature3" placeholder="{{ $defaultCoreServices[$i-1]['features'][2] }}" value="{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['services'][$i-1]['features'][2] ?? '') : $defaultCoreServices[$i-1]['features'][2] }}">
                                            </div>
                                        </div>
                                        @for($j = 1; $j <= 3; $j++)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $j }} Label</label>
                                                    <input type="text" class="form-control" name="service{{ $i }}_stat{{ $j }}_label" placeholder="{{ $defaultCoreServices[$i-1]['stats'][$j-1]['label'] }}" value="{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['services'][$i-1]['stats'][$j-1]['label'] ?? '') : $defaultCoreServices[$i-1]['stats'][$j-1]['label'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $j }} Value</label>
                                                    <input type="text" class="form-control" name="service{{ $i }}_stat{{ $j }}_value" placeholder="{{ $defaultCoreServices[$i-1]['stats'][$j-1]['value'] }}" value="{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['services'][$i-1]['stats'][$j-1]['value'] ?? '') : $defaultCoreServices[$i-1]['stats'][$j-1]['value'] }}">
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Core Services Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Additional Services Section -->
                    <div class="section-content" id="additional-services-section">      
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-star"></i>
                                    Additional Services Section
                                </h2>
                          
                            </div>
                        </div>
                        
                        <form id="specializedServicesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="specialized_title" placeholder="Additional Services">{{ isset($specializedServicesContent) && $specializedServicesContent ? ($specializedServicesContent['title'] ?? '') : 'Additional Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="specialized_subtitle" placeholder="Comprehensive solutions to enhance your software ecosystem" value="{{ isset($specializedServicesContent) && $specializedServicesContent ? ($specializedServicesContent['subtitle'] ?? '') : 'Comprehensive solutions to enhance your software ecosystem' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultSpecializedServices = [
                                    [
                                        'title' => 'Software Integration Services',
                                        'description' => 'Make your online experience easy with our integration services - ensuring new and old technologies communicate with each other seamlessly.'
                                    ],
                                    [
                                        'title' => 'API Development Services',
                                        'description' => 'We establish frameworks to link your software and third-party systems with reliable and effective APIs designed to improve functionality.'
                                    ],
                                    [
                                        'title' => 'SaaS Development',
                                        'description' => 'Our custom SaaS software is easily scalable and affordable. We create multi-tenant architecture for various users while ensuring high performance.'
                                    ],
                                    [
                                        'title' => 'Custom CRM Development',
                                        'description' => 'We create custom CRM tools with contact management, sales automation, and advanced analytics to enhance customer engagement and retention.'
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-plus"></i>
                                        Additional Service {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Service Title</label>
                                                <input type="text" class="form-control" name="spec_service{{ $i }}_title" placeholder="{{ $defaultSpecializedServices[$i-1]['title'] }}" value="{{ isset($specializedServicesContent) && $specializedServicesContent ? ($specializedServicesContent['services'][$i-1]['title'] ?? '') : $defaultSpecializedServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Service Description</label>
                                                <textarea class="form-control" name="spec_service{{ $i }}_description" rows="3" placeholder="{{ $defaultSpecializedServices[$i-1]['description'] }}">{{ isset($specializedServicesContent) && $specializedServicesContent ? ($specializedServicesContent['services'][$i-1]['description'] ?? '') : $defaultSpecializedServices[$i-1]['description'] }}</textarea>
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
            
                    <!-- Specialized Services Section -->
                    <div class="section-content" id="specialized-services-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    Specialized Services
                                </h2>
    
                            </div>
                        </div>

                        <form id="servicesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="services_title" rows="2" 
                                            placeholder="Our Specialized Custom Software Development Services">{{ isset($servicesContent) && $servicesContent ? ($servicesContent['title'] ?? '') : 'Our Specialized Custom Software Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="services_description" rows="3" 
                                            placeholder="Comprehensive software solutions tailored to your business needs and industry requirements">{{ isset($servicesContent) && $servicesContent ? ($servicesContent['description'] ?? '') : 'Comprehensive software solutions tailored to your business needs and industry requirements' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultServices = [
                                    [
                                        'title' => 'Software Implementation Services',
                                        'description' => 'Speed up deployment of new software solutions, ensuring smooth integration and productivity.',
                                        'tags' => ['Data Migration', 'System Configuration', 'Custom Setup']
                                    ],
                                    [
                                        'title' => 'UX/UI Design',
                                        'description' => 'We design attractive and functional interfaces with wireframes, prototypes, and user research.',
                                        'tags' => ['User Research', 'Wireframes', 'Prototypes']
                                    ],
                                    [
                                        'title' => 'API Integrations',
                                        'description' => 'Integrate payment gateways, CRMs, and 3rd party apps for smooth processes and efficiency.',
                                        'tags' => ['Payment Gateways', 'CRM Integration', '3rd Party Apps']
                                    ],
                                    [
                                        'title' => 'Software Modernization Services',
                                        'description' => 'Rebuild outdated systems with scalable modern architecture, microservices, and cloud solutions.',
                                        'tags' => ['Cloud Computing', 'Microservices', 'Modern Architecture']
                                    ],
                                    [
                                        'title' => 'Tech Advisory',
                                        'description' => 'Make informed technology decisions with our advisory on tools, timelines, and risk management.',
                                        'tags' => ['Technology Selection', 'Timeline Planning', 'Risk Management']
                                    ],
                                    [
                                        'title' => 'Industry-Specific Software Solutions',
                                        'description' => 'Custom software solutions for eCommerce, healthcare, manufacturing, and finance industries.',
                                        'tags' => ['eCommerce', 'Healthcare', 'Manufacturing', 'Finance']
                                    ],
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                          
                                <div class="card mt-3">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Service {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Service Title</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_title" 
                                                    placeholder="{{ $defaultServices[$i-1]['title'] }}" 
                                                    value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent['services'][$i-1]['title'] ?? '') : $defaultServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Service Description</label>
                                                <textarea class="form-control" name="service{{ $i }}_description" rows="2" 
                                                    placeholder="{{ $defaultServices[$i-1]['description'] }}">{{ isset($servicesContent) && $servicesContent ? ($servicesContent['services'][$i-1]['description'] ?? '') : $defaultServices[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Service Tags (comma separated)</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_tags" 
                                                    placeholder="{{ implode(', ', $defaultServices[$i-1]['tags']) }}" 
                                                    value="{{ isset($servicesContent) && $servicesContent ? (implode(', ', $servicesContent['services'][$i-1]['tags'] ?? [])) : implode(', ', $defaultServices[$i-1]['tags']) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Services Section
                                </button>
                            </div>
                        </form>
                    </div>


                    <!-- Technology Stack Section -->
                    <div class="section-content" id="technology-stack-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-layer-group"></i>
                                    Technology Stack Section
                                </h2>
                  
                            </div>
                        </div>
                        
                        <form id="technologyStackForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="tech_title" 
                                            placeholder="We Use the Latest Tech Stack">{{ isset($technologyStackContent) && $technologyStackContent ? ($technologyStackContent['title'] ?? '') : 'We Use the Latest Tech Stack' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="tech_subtitle" 
                                            placeholder="Cutting-edge technologies for modern software development"
                                            value="{{ isset($technologyStackContent) && $technologyStackContent ? ($technologyStackContent['subtitle'] ?? '') : 'Cutting-edge technologies for modern software development' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTechnologies = [
                                    ['title' => 'Frontend Frameworks', 'description' => 'ReactJS, Angular, Vue.js', 'tags' => ['ReactJS', 'Angular', 'Vue.js']],
                                    ['title' => 'Backend Technologies', 'description' => 'Node.js, Python, Java, PHP, Ruby on Rails, ASP.NET', 'tags' => ['Node.js', 'Python', 'Java']],
                                    ['title' => 'Mobile Development', 'description' => 'Flutter, React Native, Swift, Kotlin (Android)', 'tags' => ['Flutter', 'React Native', 'Swift']],
                                    ['title' => 'Cloud Platforms', 'description' => 'AWS, Google Cloud, Azure', 'tags' => ['AWS', 'Azure', 'GCP']],
                                    ['title' => 'Database Solutions', 'description' => 'MySQL, PostgreSQL, MongoDB, Redis, Cassandra', 'tags' => ['MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'Cassandra']],
                                    ['title' => 'DevOps and CI/CD Tools', 'description' => 'Docker, Kubernetes, Jenkins, GitHub Actions', 'tags' => ['Docker', 'Kubernetes', 'Jenkins', 'GitHub Actions']],
                                    ['title' => 'Testing Frameworks', 'description' => 'Selenium, Cypress, Jest, JUnit', 'tags' => ['Selenium', 'Cypress', 'Jest', 'JUnit']],
                                    ['title' => 'Emerging Technologies', 'description' => 'AI, ML, IoT, Blockchain, AR, VR', 'tags' => ['AI', 'ML', 'IoT', 'Blockchain', 'AR', 'VR']],
                                    ['title' => 'APIs and Integration Tools', 'description' => 'GraphQL, REST APIs, gRPC', 'tags' => ['GraphQL', 'REST APIs', 'gRPC']],
                                    ['title' => 'Version Control and Collaboration', 'description' => 'Git, GitLab, Bitbucket', 'tags' => ['Git', 'GitLab', 'Bitbucket']],
                                ];
                            @endphp

                            @for($i = 1; $i <= 10; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        <i class="fas fa-code"></i>
                                        Technology {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Technology Title</label>
                                                <input type="text" class="form-control" name="tech{{ $i }}_title" 
                                                    placeholder="{{ $defaultTechnologies[$i-1]['title'] }}" 
                                                    value="{{ isset($technologyStackContent) && $technologyStackContent ? ($technologyStackContent['technologies'][$i-1]['title'] ?? '') : $defaultTechnologies[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Technology Description</label>
                                                <textarea class="form-control" name="tech{{ $i }}_description" rows="2" 
                                                    placeholder="{{ $defaultTechnologies[$i-1]['description'] }}">{{ isset($technologyStackContent) && $technologyStackContent ? ($technologyStackContent['technologies'][$i-1]['description'] ?? '') : $defaultTechnologies[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Technology Tags (comma separated)</label>
                                                <input type="text" class="form-control" name="tech{{ $i }}_tags" 
                                                    placeholder="{{ implode(', ', $defaultTechnologies[$i-1]['tags']) }}" 
                                                    value="{{ isset($technologyStackContent) && $technologyStackContent ? (implode(', ', $technologyStackContent['technologies'][$i-1]['tags'] ?? [])) : implode(', ', $defaultTechnologies[$i-1]['tags']) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Technology Stack Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Process Section -->
                    <div class="section-content" id="process-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-tasks"></i>
                                    Process Section
                                </h2>
                         
                            </div>
                        </div>
                        
                        <form id="processForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="process_title" placeholder="Custom Software Development Services Process">{{ isset($processContent) && $processContent ? ($processContent['title'] ?? '') : 'Custom Software Development Services Process' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="process_subtitle" placeholder="Our proven development methodology" value="{{ isset($processContent) && $processContent ? ($processContent['subtitle'] ?? '') : 'Our proven development methodology' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultSteps = [
                                    [
                                        'title' => 'Requirement Gathering',
                                        'description' => 'Understanding the issue, system, and objective of your business is the first step in our process for gathering project requirements. This aids in defining the project\'s scope and the system\'s operation.'
                                    ],
                                    [
                                        'title' => 'Analysis and Planning',
                                        'description' => 'To guarantee smooth execution, comprehensive project roadmaps with resource identification and timetables are developed throughout the analysis and planning stage.'
                                    ],
                                    [
                                        'title' => 'UI/UX Design',
                                        'description' => 'To assist you in giving your clients the greatest experience possible, our UI/UX designers produce intuitive, aesthetically pleasing user interfaces.'
                                    ],
                                    [
                                        'title' => 'Development',
                                        'description' => 'We develop software that is reliable, scalable, and secure using the newest tools and technologies.'
                                    ],
                                    [
                                        'title' => 'QA and Testing',
                                        'description' => 'The program is thoroughly examined to make sure there are no flaws or problems and that everything works as it should.'
                                    ],
                                    [
                                        'title' => 'Deployment',
                                        'description' => 'We oversee the software\'s smooth deployment so you can get started right away.'
                                    ],
                                    [
                                        'title' => 'Maintenance and Updates',
                                        'description' => 'We\'ll assist you with software maintenance and updates throughout its life cycle after launch to improve performance.'
                                    ],
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
                                                <input type="text" class="form-control" name="step{{ $i }}_title" placeholder="{{ $defaultSteps[$i-1]['title'] }}" value="{{ isset($processContent) && $processContent ? ($processContent['steps'][$i-1]['title'] ?? '') : $defaultSteps[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Step Description</label>
                                                <textarea class="form-control" name="step{{ $i }}_description" rows="2" placeholder="{{ $defaultSteps[$i-1]['description'] }}">{{ isset($processContent) && $processContent ? ($processContent['steps'][$i-1]['description'] ?? '') : $defaultSteps[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Process Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Methodologies Section -->
                    <div class="section-content" id="methodologies-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-project-diagram"></i>
                                    Methodologies Section
                                </h2>
                         
                            </div>
                        </div>
                        
                        <form id="methodologiesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="methodologies_title" placeholder="Software Development Methodologies We Employ">{{ isset($methodologiesContent) && $methodologiesContent ? ($methodologiesContent['title'] ?? '') : 'Software Development Methodologies We Employ' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="methodologies_subtitle" placeholder="To guarantee efficient bespoke software development and quality..." value="{{ isset($methodologiesContent) && $methodologiesContent ? ($methodologiesContent['subtitle'] ?? '') : 'To guarantee efficient bespoke software development and quality, we use tried-and-true approaches to your project\'s complexity and deadlines.' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultMethodologies = [
                                    [
                                        'title' => 'DevOps',
                                        'description' => 'CI/CD implementation is made simple by DevOps. Therefore, we deliver releases and manage them smoothly because of automation.'
                                    ],
                                    [
                                        'title' => 'Agile',
                                        'description' => 'Through iterative development, the agile process offers flexibility, enabling us to adapt to changes and produce incremental value.'
                                    ],
                                    [
                                        'title' => 'Scrum',
                                        'description' => 'Scrum places a strong emphasis on segmenting projects into manageable sprints, encouraging increased openness and cooperation to ensure timely project completion.'
                                    ],
                                    [
                                        'title' => 'Waterfall',
                                        'description' => 'When projects are well-defined, have predictable results, and are completed in phases, the waterfall methodology performs well.'
                                    ],
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        <i class="fas fa-layer-group"></i>
                                        Methodology {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Methodology Title</label>
                                                <input type="text" class="form-control" name="methodology{{ $i }}_title" placeholder="{{ $defaultMethodologies[$i-1]['title'] }}" value="{{ isset($methodologiesContent) && $methodologiesContent ? ($methodologiesContent['items'][$i-1]['title'] ?? '') : $defaultMethodologies[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Methodology Description</label>
                                                <textarea class="form-control" name="methodology{{ $i }}_description" rows="2" placeholder="{{ $defaultMethodologies[$i-1]['description'] }}">{{ isset($methodologiesContent) && $methodologiesContent ? ($methodologiesContent['items'][$i-1]['description'] ?? '') : $defaultMethodologies[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Methodologies Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Development step Section -->
                    <div class="section-content" id="development-step-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-project-diagram"></i>
                                    Development Steps Section
                                </h2>
                      
                            </div>
                        </div>

                        <form id="developmentStepForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="development_step_title" 
                                            placeholder="Custom Software Development Services: Step by Step">{{ isset($developmentProcessContent) && $developmentProcessContent ? ($developmentProcessContent['title'] ?? '') : 'Custom Software Development Services: Step by Step' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="development_step_subtitle" 
                                            placeholder="A proven approach for creating custom software tailored to your operations"
                                            value="{{ isset($developmentProcessContent) && $developmentProcessContent ? ($developmentProcessContent['subtitle'] ?? '') : 'A proven approach for creating custom software tailored to your operations' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultSteps = [
                                    [ 'title' => 'Initial Consultation', 'description' => 'Understanding your business needs, challenges, and objectives to define the project scope.' ],
                                    [ 'title' => 'Requirements Documentation', 'description' => 'Comprehensive analysis and planning with detailed project roadmaps and resource identification.' ],
                                    [ 'title' => 'Prototyping & Wireframing', 'description' => 'Creating intuitive, aesthetically pleasing user interfaces to give your clients the best experience.' ],
                                    [ 'title' => 'Development', 'description' => 'Building reliable, scalable, and secure software using the newest tools and technologies.' ],
                                    [ 'title' => 'Testing', 'description' => 'Thorough examination to ensure there are no flaws or problems and everything works as intended.' ],
                                    [ 'title' => 'Deployment', 'description' => 'Smooth deployment management so you can get started right away with your new software.' ],
                                    [ 'title' => 'Ongoing Support', 'description' => 'Continuous software maintenance and updates throughout its lifecycle to improve performance.' ],
                                ];
                            @endphp

                            @for($i = 1; $i <= 7; $i++)
                                <div class="card mt-3">
                                    <div class="card-title d-flex align-items-center">
                                        <span class="badge rounded-circle me-2" 
                                            style="background-color: {{ ['#7B3FE4','#2D9CDB','#27AE60','#EB5757','#F2994A','#2F80ED','#BB6BD9'][$i-1] }}; 
                                                    color:#fff; width:30px; height:30px; display:flex; align-items:center; justify-content:center;">
                                            {{ $i }}
                                        </span>
                                        Step {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Step Title</label>
                                                <input type="text" class="form-control" name="step{{ $i }}_title" 
                                                    placeholder="{{ $defaultSteps[$i-1]['title'] }}"
                                                    value="{{ isset($developmentProcessContent) && $developmentProcessContent ? ($developmentProcessContent['items'][$i-1]['title'] ?? '') : $defaultSteps[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Step Description</label>
                                                <textarea class="form-control" name="step{{ $i }}_description" rows="2" 
                                                    placeholder="{{ $defaultSteps[$i-1]['description'] }}">{{ isset($developmentProcessContent) && $developmentProcessContent ? ($developmentProcessContent['items'][$i-1]['description'] ?? '') : $defaultSteps[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Development Steps
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Benifit Section -->
                    <div class="section-content" id="benefits-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-gift"></i>
                                    Benefits Section
                                </h2>
                        
                            </div>
                        </div>

                        <form id="benefitsForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="benefits_title" 
                                            placeholder="Benefits of Custom Software Development Services">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent['title'] ?? '') : 'Benefits of Custom Software Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control editor" name="benefits_subtitle" rows="2"
                                            placeholder="Custom software development services offer tailored solutions that align with your business needs, ensuring functionality, scalability, and efficiency. Unlike off-the-shelf solutions, custom software provides:">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent['subtitle'] ?? '') : 'Custom software development services offer tailored solutions that align with your business needs, ensuring functionality, scalability, and efficiency. Unlike off-the-shelf solutions, custom software provides:' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultBenefits = [
                                    ['title' => 'Enhanced Workflows', 'description' => 'Enhanced workflows by addressing specific operational challenges tailored to your unique business processes and requirements.' ],
                                    ['title' => 'Scalability', 'description' => 'Scalability to accommodate business growth and market changes, ensuring your software evolves with your expanding needs.' ],
                                    ['title' => 'Competitive Advantage', 'description' => 'Competitive advantage with unique features designed for your industry, setting you apart from competitors using generic solutions.' ],
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card mt-3">
                                    <div class="card-title d-flex align-items-center">
                                        <span class="badge rounded-circle me-2" 
                                            style="background-color: {{ ['#2D9CDB','#27AE60','#BB6BD9'][$i-1] }}; 
                                                    color:#fff; width:30px; height:30px; display:flex; align-items:center; justify-content:center;">
                                            {{ $i }}
                                        </span>
                                        Benefit {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Benefit Title</label>
                                                <input type="text" class="form-control" name="benefit{{ $i }}_title"
                                                    placeholder="{{ $defaultBenefits[$i-1]['title'] }}"
                                                    value="{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent['items'][$i-1]['title'] ?? '') : $defaultBenefits[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Benefit Description</label>
                                                <textarea class="form-control" name="benefit{{ $i }}_description" rows="2"
                                                    placeholder="{{ $defaultBenefits[$i-1]['description'] }}">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent['items'][$i-1]['description'] ?? '') : $defaultBenefits[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Benefits
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- understanding process Section -->
                    <div class="section-content" id="understanding-process-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-project-diagram"></i>
                                    Understanding Process Section
                                </h2>
                     
                            </div>
                        </div>

                        <form id="understandingProcessForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="understanding_process_title" 
                                            placeholder="Custom Software Development Process">{{ isset($understandingProcessContent) && $understandingProcessContent ? ($understandingProcessContent['title'] ?? '') : 'Custom Software Development Process' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control" name="understanding_process_subtitle" rows="2"
                                            placeholder="A comprehensive approach to building software solutions tailored specifically to your business requirements">{{ isset($understandingProcessContent) && $understandingProcessContent ? ($understandingProcessContent['subtitle'] ?? '') : 'A comprehensive approach to building software solutions tailored specifically to your business requirements' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultSteps = [
                                    ['title' => 'Requirement Analysis', 'description' => 'Understanding your business needs and objectives to create a comprehensive foundation for the development process.'],
                                    ['title' => 'Design and Prototyping', 'description' => 'Creating user-friendly interfaces and mockups that provide a clear vision of the final product before development begins.'],
                                    ['title' => 'Development', 'description' => 'Writing clean, efficient code for front-end and back-end components using modern technologies and best practices.'],
                                    ['title' => 'Testing', 'description' => 'Rigorous testing to eliminate bugs and ensure performance, security, and reliability across all platforms and devices.'],
                                    ['title' => 'Deployment and Maintenance', 'description' => 'Seamless launch and ongoing support for updates, ensuring your software continues to perform optimally over time.'],
                                ];
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                <div class="card mt-3">
                                    <div class="card-title d-flex align-items-center">
                                        <span class="badge rounded-circle me-2" 
                                            style="background-color: {{ ['#2D9CDB','#6C5CE7','#9B59B6','#E74C3C','#27AE60'][$i-1] }}; 
                                                    color:#fff; width:30px; height:30px; display:flex; align-items:center; justify-content:center;">
                                            {{ $i }}
                                        </span>
                                        Step {{ sprintf('%02d', $i) }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Step Title</label>
                                                <input type="text" class="form-control" name="understanding_step{{ $i }}_title"
                                                    placeholder="{{ $defaultSteps[$i-1]['title'] }}"
                                                    value="{{ isset($understandingProcessContent) && $understandingProcessContent ? ($understandingProcessContent['items'][$i-1]['title'] ?? '') : $defaultSteps[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Step Description</label>
                                                <textarea class="form-control" name="understanding_step{{ $i }}_description" rows="2"
                                                    placeholder="{{ $defaultSteps[$i-1]['description'] }}">{{ isset($understandingProcessContent) && $understandingProcessContent ? ($understandingProcessContent['items'][$i-1]['description'] ?? '') : $defaultSteps[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Understanding Process
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
                                        <textarea class="form-control editor" name="why_title" placeholder="Why Choose Us for Custom Software Development">{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent['title'] ?? '') : 'Why Choose Us for Custom Software Development' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="why_subtitle" placeholder="What makes us the preferred choice for software development" value="{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent['subtitle'] ?? '') : 'What makes us the preferred choice for software development' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultReasons = [
                                    ['title' => 'Expert Team', 'description' => 'Our team consists of experienced developers with expertise in latest technologies'],
                                    ['title' => 'Agile Methodology', 'description' => 'We follow agile development practices for faster delivery and better quality'],
                                    ['title' => 'Quality Assurance', 'description' => 'Rigorous testing and quality assurance processes ensure bug-free software']
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-check-circle"></i>
                                        Reason {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Reason Title</label>
                                                <input type="text" class="form-control" name="reason{{ $i }}_title" placeholder="{{ $defaultReasons[$i-1]['title'] }}" value="{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent['reasons'][$i-1]['title'] ?? '') : $defaultReasons[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Reason Description</label>
                                                <textarea class="form-control" name="reason{{ $i }}_description" rows="2" placeholder="{{ $defaultReasons[$i-1]['description'] }}">{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent['reasons'][$i-1]['description'] ?? '') : $defaultReasons[$i-1]['description'] }}</textarea>
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

                    <!-- what makes different Section -->
                    <div class="section-content" id="what-makes-different-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    What Makes Us Different Section
                                </h2>
               
                            </div>
                        </div>
                        
                        <form id="whatMakesDifferentForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="different_title" placeholder="What Makes Us Different">{{ isset($whatMakesDifferentContent) && $whatMakesDifferentContent ? ($whatMakesDifferentContent['title'] ?? '') : 'What Makes Us Different' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control" name="different_subtitle" rows="2" placeholder="Our unique approach to software solutions is based on a deep understanding of enterprise needs and incorporating the latest technologies.">{{ isset($whatMakesDifferentContent) && $whatMakesDifferentContent ? ($whatMakesDifferentContent['subtitle'] ?? '') : 'Our unique approach to software solutions is based on a deep understanding of enterprise needs and incorporating the latest technologies.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultReasons = [
                                    ['title' => 'Latest Technologies', 'description' => 'We combine the latest tools and modern frameworks to develop cutting-edge solutions that stay ahead of the curve.'],
                                    ['title' => 'Agile Methodology', 'description' => 'Our agile approach ensures flexibility, rapid iteration, and continuous improvement throughout the development process.'],
                                    ['title' => 'Collaboration Practices', 'description' => 'We take pride in our work for its quality and efficiency along with cost-effectiveness in our development process.'],
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        Feature {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Feature Title</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_title" placeholder="{{ $defaultReasons[$i-1]['title'] }}" value="{{ isset($whatMakesDifferentContent) && $whatMakesDifferentContent ? ($whatMakesDifferentContent['features'][$i-1]['title'] ?? '') : $defaultReasons[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Feature Description</label>
                                                <textarea class="form-control" name="feature{{ $i }}_description" rows="2" placeholder="{{ $defaultReasons[$i-1]['description'] }}">{{ isset($whatMakesDifferentContent) && $whatMakesDifferentContent ? ($whatMakesDifferentContent['features'][$i-1]['description'] ?? '') : $defaultReasons[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save What Makes Us Different Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- what benefits custom section Section -->
                    <div class="section-content" id="what-benefit-custom-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    Benefits of Custom Software Development Section
                                </h2>
   
                            </div>
                        </div>

                        <form id="whatBenefitCustomForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="benefit_title"
                                            placeholder="Benefits of Custom Software Development with Us">{{ isset($benefitsCustomContent) && $benefitsCustomContent ? ($benefitsCustomContent['title'] ?? '') : 'Benefits of Custom Software Development with Us' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control editor" name="benefit_subtitle" rows="2"
                                            placeholder="Discover the advantages that set our custom software solutions apart from generic alternatives.">{{ isset($benefitsCustomContent) && $benefitsCustomContent ? ($benefitsCustomContent['subtitle'] ?? '') : 'Discover the advantages that set our custom software solutions apart from generic alternatives.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultBenefits = [
                                    ['title' => 'Functionality Tailored to Your Needs', 'description' => 'We create software especially for your company to solve particular problems and increase productivity.'],
                                    ['title' => 'Lower Total Cost of Ownership', 'description' => 'Compared to off-the-shelf solutions, our scalable and maintainable solutions save money over time.'],
                                    ['title' => 'Unbound Innovation Potential', 'description' => 'Custom development has no restrictions because the features and functionality are determined by your ideas.'],
                                    ['title' => 'Advanced Security', 'description' => 'To safeguard your data, we use strong security measures like encryption and compliance procedures.'],
                                    ['title' => 'Total Compliance', 'description' => 'Our solutions give your company peace by adhering to all industry norms and laws.'],
                                    ['title' => 'Seamless Integration', 'description' => 'Whether integrating with third-party platforms or legacy systems, we guarantee seamless compatibility and peak performance.'],
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        Benefit {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Benefit Title</label>
                                                <input type="text" class="form-control" name="benefit{{ $i }}_title"
                                                    placeholder="{{ $defaultBenefits[$i-1]['title'] }}"
                                                    value="{{ isset($benefitsCustomContent) && $benefitsCustomContent ? ($benefitsCustomContent['benefits'][$i-1]['title'] ?? '') : $defaultBenefits[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Benefit Description</label>
                                                <textarea class="form-control" name="benefit{{ $i }}_description" rows="2"
                                                    placeholder="{{ $defaultBenefits[$i-1]['description'] }}">{{ isset($benefitsCustomContent) && $benefitsCustomContent ? ($benefitsCustomContent['benefits'][$i-1]['description'] ?? '') : $defaultBenefits[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Benefits Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- what why choose custom development Section -->
                    <div class="section-content" id="choose-custom-development-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    Why Choose of Custom Software Development Section
                                </h2>

                            </div>
                        </div>

                        <form id="customDevelopmentForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>

                                        <textarea class="form-control editor" name="custom_development_title"
                                            placeholder="Benefits of Custom Software Development with Us">{{ isset($whyChooseDetailedContent) && $whyChooseDetailedContent ? ($whyChooseDetailedContent['title'] ?? '') : 'Benefits of Custom Software Development with Us' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control" name="custom_development_subtitle" rows="2"
                                            placeholder="Discover the advantages that set our custom software solutions apart from generic alternatives.">{{ isset($whyChooseDetailedContent) && $whyChooseDetailedContent ? ($whyChooseDetailedContent['subtitle'] ?? '') : 'Discover the advantages that set our custom software solutions apart from generic alternatives.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultBenefits = [
                                    ['title' => 'Functionality Tailored to Your Needs', 'description' => 'We create software especially for your company to solve particular problems and increase productivity.'],
                                    ['title' => 'Lower Total Cost of Ownership', 'description' => 'Compared to off-the-shelf solutions, our scalable and maintainable solutions save money over time.'],
                                    ['title' => 'Unbound Innovation Potential', 'description' => 'Custom development has no restrictions because the features and functionality are determined by your ideas.'],
                                    ['title' => 'Advanced Security', 'description' => 'To safeguard your data, we use strong security measures like encryption and compliance procedures.'],
                                    ['title' => 'Total Compliance', 'description' => 'Our solutions give your company peace by adhering to all industry norms and laws.'],
                                    ['title' => 'Seamless Integration', 'description' => 'Whether integrating with third-party platforms or legacy systems, we guarantee seamless compatibility and peak performance.'],
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        Benefit {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Benefit Title</label>
                                                <input type="text" class="form-control" name="custom_development_benefit{{ $i }}_title"
                                                    placeholder="{{ $defaultBenefits[$i-1]['title'] }}"
                                                    value="{{ isset($whyChooseDetailedContent) && $whyChooseDetailedContent ? ($whyChooseDetailedContent['benefits'][$i-1]['title'] ?? '') : $defaultBenefits[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Benefit Description</label>
                                                <textarea class="form-control" name="custom_development_benefit{{ $i }}_description" rows="2"
                                                    placeholder="{{ $defaultBenefits[$i-1]['description'] }}">{{ isset($whyChooseDetailedContent) && $whyChooseDetailedContent ? ($whyChooseDetailedContent['benefits'][$i-1]['description'] ?? '') : $defaultBenefits[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Custom Development Section
                                </button>
                            </div>
                        </form>
                    </div>


                    <!-- Industries We Serve Section -->
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="industries_title" placeholder="Industries We Serve">{{ isset($industriesContent) && $industriesContent ? ($industriesContent['title'] ?? '') : 'Industries We Serve' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="industries_subtitle" placeholder="We provide software solutions across various industries" value="{{ isset($industriesContent) && $industriesContent ? ($industriesContent['subtitle'] ?? '') : 'We provide software solutions across various industries' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultIndustries = [
                                    ['title' => 'Healthcare', 'description' => 'Custom healthcare software solutions for hospitals, clinics, and medical practices'],
                                    ['title' => 'Finance & Banking', 'description' => 'Secure financial software for banks, fintech companies, and investment firms'],
                                    ['title' => 'E-commerce & Retail', 'description' => 'Online shopping platforms and retail management systems'],
                                    ['title' => 'Education', 'description' => 'Learning management systems and educational software solutions'],
                                    ['title' => 'Manufacturing', 'description' => 'Industrial automation and manufacturing management software'],
                                    ['title' => 'Real Estate', 'description' => 'Property management and real estate CRM solutions']
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-building"></i>
                                        Industry {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Industry Title</label>
                                                <input type="text" class="form-control" name="industry{{ $i }}_title" placeholder="{{ $defaultIndustries[$i-1]['title'] }}" value="{{ isset($industriesContent) && $industriesContent ? ($industriesContent['industries'][$i-1]['title'] ?? '') : $defaultIndustries[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Industry Description</label>
                                                <textarea class="form-control" name="industry{{ $i }}_description" rows="2" placeholder="{{ $defaultIndustries[$i-1]['description'] }}">{{ isset($industriesContent) && $industriesContent ? ($industriesContent['industries'][$i-1]['description'] ?? '') : $defaultIndustries[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Industries Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- On-Demand Developers Section -->
                    <div class="section-content" id="on-demand-developers-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-users-cog"></i>
                                    On-Demand Developers Section
                                </h2>
                          
                            </div>
                        </div>
                        
                        <form id="onDemandDevelopersForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="developers_title" placeholder="We Have On-Demand Developers">{{ isset($onDemandDevelopersContent) && $onDemandDevelopersContent ? ($onDemandDevelopersContent['title'] ?? '') : 'We Have On-Demand Developers' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="developers_subtitle" placeholder="Hire skilled developers for your project" value="{{ isset($onDemandDevelopersContent) && $onDemandDevelopersContent ? ($onDemandDevelopersContent['subtitle'] ?? '') : 'Hire skilled developers for your project' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control" name="developers_description" rows="7" placeholder="Get access to our pool of experienced developers who can work on your project remotely or on-site">{{ isset($onDemandDevelopersContent) && $onDemandDevelopersContent ? ($onDemandDevelopersContent['description'] ?? '') : 'Get access to our pool of experienced developers who can work on your project remotely or on-site' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save On-Demand Developers Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- FAQ Section -->
                    <div class="section-content" id="faq-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-question"></i>
                                    FAQ Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="faqForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="faq_title" placeholder="Frequently Asked Questions">{{ isset($faqContent) && $faqContent ? ($faqContent['title'] ?? '') : 'Frequently Asked Questions' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFaqs = [
                                    ['question' => 'What is custom software development?', 'answer' => 'Custom software development is the process of creating software applications specifically designed to meet the unique requirements of your business or organization.'],
                                    ['question' => 'How long does software development take?', 'answer' => 'The timeline varies based on project complexity, features, and requirements. Simple applications may take 3-6 months, while complex enterprise solutions can take 12+ months.'],
                                    ['question' => 'What technologies do you use?', 'answer' => 'We use modern technologies including AI/ML, cloud platforms, microservices architecture, and the latest programming languages and frameworks.'],
                                    ['question' => 'What technologies do you use?', 'answer' => 'We use modern technologies including AI/ML, cloud platforms, microservices architecture, and the latest programming languages and frameworks.'],
                                    ['question' => 'What technologies do you use?', 'answer' => 'We use modern technologies including AI/ML, cloud platforms, microservices architecture, and the latest programming languages and frameworks.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-question-circle"></i>
                                        FAQ {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Question</label>
                                                <input type="text" class="form-control" name="faq{{ $i }}_question" placeholder="{{ $defaultFaqs[$i-1]['question'] }}" value="{{ isset($faqContent) && $faqContent ? ($faqContent['faqs'][$i-1]['question'] ?? '') : $defaultFaqs[$i-1]['question'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Answer</label>
                                                <textarea class="form-control" name="faq{{ $i }}_answer" rows="3" placeholder="{{ $defaultFaqs[$i-1]['answer'] }}">{{ isset($faqContent) && $faqContent ? ($faqContent['faqs'][$i-1]['answer'] ?? '') : $defaultFaqs[$i-1]['answer'] }}</textarea>
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

<!-- JavaScript for Dynamic Page Admin -->
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
    const forms = ['heroForm', 'introForm', 'coreServicesForm', 'specializedServicesForm', 'technologyStackForm', 'processForm', 'whyChooseUsForm', 'industriesForm', 'onDemandDevelopersForm', 'faqForm','servicesForm','methodologiesForm','developmentStepForm','benefitsForm','understandingProcessForm','whatMakesDifferentForm','whatBenefitCustomForm','customDevelopmentForm'];
    
    forms.forEach(formId => {
        const form = document.getElementById(formId);
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const sectionName = formId.replace('Form', '').replace(/([A-Z])/g, '-$1').toLowerCase();
                let url = '';
                
                switch(formId) {
                    case 'heroForm':
                        url = '{{ route("service.softwareDevelopment.save-hero") }}';
                        break;
                    case 'introForm':
                        url = '{{ route("service.softwareDevelopment.save-intro") }}';
                        break;
                    case 'coreServicesForm':
                        url = '{{ route("service.softwareDevelopment.save-core-services") }}';
                        break;
                    case 'specializedServicesForm':
                        url = '{{ route("service.softwareDevelopment.save-specialized-services") }}';
                        break;
                    case 'technologyStackForm':
                        url = '{{ route("service.softwareDevelopment.save-technology-stack") }}';
                        break;
                    case 'processForm':
                        url = '{{ route("service.softwareDevelopment.save-process") }}';
                        break;
                    case 'whyChooseUsForm':
                        url = '{{ route("service.softwareDevelopment.save-why-choose-us") }}';
                        break;
                    case 'industriesForm':
                        url = '{{ route("service.softwareDevelopment.save-industries") }}';
                        break;
                    case 'onDemandDevelopersForm':
                        url = '{{ route("service.softwareDevelopment.save-on-demand-developers") }}';
                        break;
                    case 'faqForm':
                        url = '{{ route("service.softwareDevelopment.save-faq") }}';
                        break;
                    case 'servicesForm':
                        url = '{{ route("service.softwareDevelopment.save-services") }}';
                        break;
                    case 'methodologiesForm':
                        url = '{{ route("service.softwareDevelopment.save-methodologies") }}';
                        break;
                    case 'developmentStepForm':
                        url = '{{ route("service.softwareDevelopment.save-developmentStep") }}';
                        break;
                    case 'benefitsForm':
                        url = '{{ route("service.softwareDevelopment.save-benefits") }}';
                        break;
                    case 'understandingProcessForm':
                        url = '{{ route("service.softwareDevelopment.save-understanding-process") }}';
                        break;
                    case 'whatMakesDifferentForm':
                        url = '{{ route("service.softwareDevelopment.save-what-makes-different") }}';
                        break;
                    case 'whatBenefitCustomForm':
                        url = '{{ route("service.softwareDevelopment.save-custom-benefits") }}';
                        break;
                    case 'customDevelopmentForm':
                        url = '{{ route("service.softwareDevelopment.save-custom-development") }}';
                        break;
                }
                
                // Add CSRF token
                formData.append('_token', '{{ csrf_token() }}');
                
                fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showAlert('success', data.message);
                    } else {
                        showAlert('error', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('error', 'An error occurred while saving the section.');
                });
            });
        }
    });

    // Toggle switches
    const toggleSwitches = document.querySelectorAll('.section-toggle input[type="checkbox"]');
    
    toggleSwitches.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const sectionName = this.id.replace('Switch', '').replace(/([A-Z])/g, '_$1').toLowerCase();
            const isActive = this.checked;
            
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('section_name', sectionName);
            formData.append('is_active', isActive ? '1' : '0');
            
            fetch('{{ route("service.softwareDevelopment.toggle-section") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update label
                    const label = this.nextElementSibling;
                    label.textContent = isActive ? 'On' : 'Off';
                    showAlert('success', data.message);
                } else {
                    // Revert toggle if failed
                    this.checked = !isActive;
                    showAlert('error', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Revert toggle if failed
                this.checked = !isActive;
                showAlert('error', 'An error occurred while updating the section status.');
            });
        });
    });

    function showAlert(type, message) {
        // Create alert element
        const alert = document.createElement('div');
        alert.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
        alert.style.position = 'fixed';
        alert.style.top = '20px';
        alert.style.right = '20px';
        alert.style.zIndex = '9999';
        alert.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(alert);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (alert.parentNode) {
                alert.parentNode.removeChild(alert);
            }
        }, 5000);
    }
});
</script>

@endsection