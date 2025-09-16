@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $coreServicesContent = $coreServicesContent ?? null;
    $additionalServicesContent = $additionalServicesContent ?? null;
    $whyChooseUsContent = $whyChooseUsContent ?? null;
    $customProcessContent = $customProcessContent ?? null;
    $crossHairContent = $crossHairContent ?? null;
    $whatIsCustomContent = $whatIsCustomContent ?? null;
    $whyNeedCustomContent = $whyNeedCustomContent ?? null;
    $whatServicesContent = $whatServicesContent ?? null;
    $faqContent = $faqContent ?? null;
@endphp

<!-- Common Dynamic Page Admin Styles -->
<link rel="stylesheet" href="{{ asset('css/dynamic-page-admin.css') }}">

<!-- CKEditor 5 with Source Editing -->


<div class="dynamic-page-container">
    <!-- Breadcrumb -->
    <div class="container-fluid">
        <div class="dynamic-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Dynamic Pages</a></li>
                    <li class="breadcrumb-item"><a href="#">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Web Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">Web Development Sections</h5>
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
                            <i class="fas fa-plus-circle"></i>
                            Additional Services
                        </button>
                        <button class="section-nav-link" data-section="why-choose-us">
                            <i class="fas fa-star"></i>
                            Why Choose Us
                        </button>
                        <button class="section-nav-link" data-section="custom-process">
                            <i class="fas fa-tasks"></i>
                            Custom Process
                        </button>
                        <button class="section-nav-link" data-section="ecommerce-development">
                           <i class="fas fa-server"></i>
                            Ecommerce Development
                        </button>
                        <button class="section-nav-link" data-section="development-methodologies">
                            <i class="fas fa-project-diagram"></i>
                            Development Methodologies
                        </button>
                        <button class="section-nav-link" data-section="devops-deployment">
                            <i class="fas fa-server"></i>
                            DevOps & Deployment
                        </button>
                        <button class="section-nav-link" data-section="database-management">
                            <i class="fas fa-database"></i>
                            Database Management
                        </button>
                        <button class="section-nav-link" data-section="security">
                            <i class="fas fa-shield-alt"></i>
                            Security
                        </button>
                        <button class="section-nav-link" data-section="performance-optimization">
                            <i class="fas fa-tachometer-alt"></i>
                            Performance Optimization
                        </button>
                        <button class="section-nav-link" data-section="quality-control-testing">
                            <i class="fas fa-check-circle"></i>
                            Quality Control & Testing
                        </button>
                        <button class="section-nav-link" data-section="designing-ui-ux">
                            <i class="fas fa-paint-brush"></i>
                            Designing & UI/UX
                        </button>
                        <button class="section-nav-link" data-section="cross-hair">
                            <i class="fas fa-crosshairs"></i>
                            Cross Hair
                        </button>
                        <button class="section-nav-link" data-section="what-is-custom">
                            <i class="fas fa-question-circle"></i>
                            What Is Custom
                        </button>
                        <button class="section-nav-link" data-section="why-need-custom">
                            <i class="fas fa-lightbulb"></i>
                            Why Need Custom
                        </button>
                        <button class="section-nav-link" data-section="what-services">
                            <i class="fas fa-list"></i>
                            What Services
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
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Custom Web Development Services">{{ isset($heroContent) && $heroContent ? ($heroContent['title'] ?? '') : 'Custom Web Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="You define the vision; we craft the solution...">{{ isset($heroContent) && $heroContent ? ($heroContent['subtitle'] ?? '') : 'You define the vision; we craft the solution. Leveraging our expertise in web technologies and agile development, we create high-performing, scalable, and responsive websites, web apps, and portals tailored to your goals.' }}</textarea>
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
                                            <input type="text" class="form-control" name="hero_feature1" placeholder="Fully Responsive Design" value="{{ isset($heroContent) && $heroContent ? ($heroContent['features'][0] ?? '') : 'Fully Responsive Design' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="hero_feature2" placeholder="E-commerce Ready" value="{{ isset($heroContent) && $heroContent ? ($heroContent['features'][1] ?? '') : 'E-commerce Ready' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="hero_feature3" placeholder="SEO Optimized" value="{{ isset($heroContent) && $heroContent ? ($heroContent['features'][2] ?? '') : 'SEO Optimized' }}">
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
                                            <input type="text" class="form-control" name="hero_button1_text" placeholder="🚀 Start Your Project" value="{{ isset($heroContent) && $heroContent ? ($heroContent['buttons'][0]['text'] ?? '') : '🚀 Start Your Project' }}">
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
                                        <textarea class="form-control editor" name="intro_title" rows="2" placeholder="We Deliver Highly Customized and Fully Integrated Web Development Services">{{ isset($introContent) && $introContent ? ($introContent['title'] ?? '') : 'We Deliver Highly Customized and Fully Integrated Web Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="intro_description" rows="4" placeholder="We provide completely integrated and personalized custom web development services...">{{ isset($introContent) && $introContent ? ($introContent['description'] ?? '') : 'We provide completely integrated and personalized custom web development services as per your business requirements. Our solutions are built to tackle problems such as scalability and efficiency using the latest technologies.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    ['icon' => 'fas fa-desktop', 'title' => 'Scalable Solutions', 'description' => 'Build websites and web applications that grow with your business using modern frameworks and technologies'],
                                    ['icon' => 'fas fa-shopping-cart', 'title' => 'E-commerce Excellence', 'description' => 'Custom e-commerce websites with great features and easy-to-control backend for smooth online store management'],
                                    ['icon' => 'fas fa-bolt', 'title' => 'Brand Alignment', 'description' => 'Dependable scalable platforms that match your brand guidelines and help your business grow effectively']
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Feature {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Feature Icon</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_icon" placeholder="{{ $defaultFeatures[$i-1]['icon'] }}" value="{{ isset($introContent) && $introContent ? ($introContent['features'][$i-1]['icon'] ?? '') : $defaultFeatures[$i-1]['icon'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Feature Title</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_title" placeholder="{{ $defaultFeatures[$i-1]['title'] }}" value="{{ isset($introContent) && $introContent ? ($introContent['features'][$i-1]['title'] ?? '') : $defaultFeatures[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Feature Description</label>
                                                <textarea class="form-control editor" name="feature{{ $i }}_description" rows="2" placeholder="{{ $defaultFeatures[$i-1]['description'] }}">{{ isset($introContent) && $introContent ? ($introContent['features'][$i-1]['description'] ?? '') : $defaultFeatures[$i-1]['description'] }}</textarea>
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
                                        <!-- <input type="text" class="form-control " name="core_title" placeholder="Our Custom Web Development Services" value="{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['title'] ?? '') : 'Our Custom Web Development Services' }}"> -->
                                        <textarea type="text" class="form-control editor" name="core_title" placeholder="Our Custom Web Development Services">{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['title'] ?? '') : 'Our Custom Web Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control " name="core_subtitle" placeholder="Comprehensive web development solutions tailored to your business needs" value="{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['subtitle'] ?? '') : 'Comprehensive web development solutions tailored to your business needs' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultCoreServices = [
                                    [
                                        'title' => 'Responsive Website Development',
                                        'subtitle' => 'Perfect on Every Device',
                                        'description' => 'Our custom web development services ensure your website looks great and works well on all devices. With adaptive grids and modern frameworks, we improve user experience, engagement, and search rankings for seamless conversions.',
                                        'features' => ['Adaptive Grids', 'Modern Frameworks', 'SEO Optimized'],
                                        'stats' => [
                                            ['label' => 'Time to Market', 'value' => '-60%'],
                                            ['label' => 'Development Cost', 'value' => '-40%'],
                                            ['label' => 'Scalability', 'value' => '∞']
                                        ]
                                    ],
                                    [
                                        'title' => 'E-Commerce Development',
                                        'subtitle' => 'Boost Your Online Sales',
                                        'description' => 'Get more sales online now with our custom e-commerce web development services. We include secure functionalities like shopping carts and encrypted checkouts to keep transactions safe and boost your online store\'s profits.',
                                        'features' => ['Secure Payments', 'Shopping Cart', 'Inventory Management'],
                                        'stats' => [
                                            ['label' => 'Time to Market', 'value' => '-60%'],
                                            ['label' => 'Development Cost', 'value' => '-40%'],
                                            ['label' => 'Scalability', 'value' => '∞']
                                        ]
                                    ],
                                    [
                                        'title' => 'CMS Development',
                                        'subtitle' => 'Manage Content Efficiently',
                                        'description' => 'Our custom CMS development services help in managing your content efficiently. We use content management systems like WordPress or Drupal that can be adapted to your needs, so you can update your website without needing to know code.',
                                        'features' => ['WordPress', 'Drupal', 'Custom CMS'],
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
                                                <textarea class="form-control editor" name="service{{ $i }}_description" rows="3" placeholder="{{ $defaultCoreServices[$i-1]['description'] }}">{{ isset($coreServicesContent) && $coreServicesContent ? ($coreServicesContent['services'][$i-1]['description'] ?? '') : $defaultCoreServices[$i-1]['description'] }}</textarea>
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
                                                    <input type="text" class="form-control" name="service{{ $i }}_stat{{ $j }}_label" placeholder="{{ $defaultCoreServices[$i-1]['stats'][$j-1]['label'] }}" value="{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['services'][$i-1]['stats'][$j-1]['label'] ?? '') : $defaultCoreServices[$i-1]['stats'][$j-1]['label'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $j }} Value</label>
                                                    <input type="text" class="form-control" name="service{{ $i }}_stat{{ $j }}_value" placeholder="{{ $defaultCoreServices[$i-1]['stats'][$j-1]['value'] }}" value="{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['services'][$i-1]['stats'][$j-1]['value'] ?? '') : $defaultCoreServices[$i-1]['stats'][$j-1]['value'] }}">
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
                                        <textarea type="text" class="form-control editor" name="additional_title" placeholder="Additional Services">{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent['title'] ?? '') : 'Additional Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="additional_subtitle" placeholder="Comprehensive solutions to enhance your web presence" value="{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent['subtitle'] ?? '') : 'Comprehensive solutions to enhance your web presence' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultAdditionalServices = [
                                    [
                                        'title' => 'Magento Web Development',
                                        'subtitle' => 'Advanced E-commerce Solutions',
                                        'description' => 'Use Magento with our custom web development services for advanced e-commerce solutions. We deploy Magento CMS to develop a custom-built online store suitable for your business needs.',
                                        'icon' => 'fas fa-check-circle'
                                    ],
                                    [
                                        'title' => 'Marketing Automation',
                                        'subtitle' => 'AI-Powered Marketing',
                                        'description' => 'Make your marketing easier with our custom web development services with marketing automation. We use artificial intelligence to get things done automatically and run campaigns.',
                                        'icon' => 'fas fa-bolt'
                                    ],
                                    [
                                        'title' => 'Website Security Audits',
                                        'subtitle' => 'Comprehensive Security',
                                        'description' => 'Let our custom web development services keep your website safe with our web security audits. We find problems and then introduce strong actions in place to protect your site.',
                                        'icon' => 'fas fa-shield-alt'
                                    ],
                                    [
                                        'title' => 'Website Maintenance',
                                        'subtitle' => 'Ongoing Support',
                                        'description' => 'Keep your website flawlessly optimal with our website maintenance support. We provide constant updates, bug fixes, and performance optimization.',
                                        'icon' => 'fas fa-cog'
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Service Icon</label>
                                                <input type="text" class="form-control" name="add_service{{ $i }}_icon" placeholder="{{ $defaultAdditionalServices[$i-1]['icon'] }}" value="{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent['services'][$i-1]['icon'] ?? '') : $defaultAdditionalServices[$i-1]['icon'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Service Title</label>
                                                <input type="text" class="form-control" name="add_service{{ $i }}_title" placeholder="{{ $defaultAdditionalServices[$i-1]['title'] }}" value="{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent['services'][$i-1]['title'] ?? '') : $defaultAdditionalServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Service Subtitle</label>
                                                <input type="text" class="form-control" name="add_service{{ $i }}_subtitle" placeholder="{{ $defaultAdditionalServices[$i-1]['subtitle'] }}" value="{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent['services'][$i-1]['subtitle'] ?? '') : $defaultAdditionalServices[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Service Description</label>
                                                <textarea class="form-control editor" name="add_service{{ $i }}_description" rows="3" placeholder="{{ $defaultAdditionalServices[$i-1]['description'] }}">{{ isset($additionalServicesContent) && $additionalServicesContent ? ($additionalServicesContent['services'][$i-1]['description'] ?? '') : $defaultAdditionalServices[$i-1]['description'] }}</textarea>
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

                    <!-- Why Choose Us Section -->
                    <div class="section-content" id="why-choose-us-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-star"></i>
                                    Why Choose Us Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="whyChooseUsForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>

                                        <textarea type="text" class="form-control editor" name="why_title" placeholder="Why Choose Qubify Tech for Web Development Services">{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent['title'] ?? '') : 'Why Choose Qubify Tech for Web Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control " name="why_subtitle" placeholder="Discover what makes us the preferred choice for custom web development" value="{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent['subtitle'] ?? '') : 'Discover what makes us the preferred choice for custom web development' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultReasons = [
                                    ['title' => 'Award-Winning Team', 'description' => 'When you partner with us for custom web development services, you are working with an award-winning team capable of working with every CMS, coding language, and web application.'],
                                    ['title' => 'Lead Generation Focus', 'description' => 'Our custom web development services focus on building websites that attract visitors and convert them into leads and sales with smart navigation and compelling CTAs.'],
                                    ['title' => 'Maximize ROI', 'description' => 'Get ready to maximize your ROI with our custom web development services tailored for you! We create custom web strategies to improve efficiency and increase revenue.'],
                                    ['title' => 'Industry-Leading Software', 'description' => 'Level up your tech game with our custom web development services! We automate operations and track data automatically so that you can do business efficiently.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
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
                                                <textarea class="form-control editor" name="reason{{ $i }}_description" rows="3" placeholder="{{ $defaultReasons[$i-1]['description'] }}">{{ isset($whyChooseUsContent) && $whyChooseUsContent ? ($whyChooseUsContent['reasons'][$i-1]['description'] ?? '') : $defaultReasons[$i-1]['description'] }}</textarea>
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

                    <!-- Custom Process Section -->
                    <div class="section-content" id="custom-process-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-tasks"></i>
                                    Custom Process Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="customProcessForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="process_title" placeholder="Inside Our Web Development Company's Custom Process">{{ isset($customProcessContent) && $customProcessContent ? ($customProcessContent['title'] ?? '') : 'Inside Our Web Development Company\'s Custom Process' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control " name="process_subtitle" value="{{ isset($customProcessContent) && $customProcessContent ? ($customProcessContent['subtitle'] ?? '') : 'Our comprehensive development methodology ensures quality results' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultProcesses = [
                                    ['icon' => 'fas fa-code', 'title' => 'Full-Stack Development', 'description' => 'Integrated front-end & back-end solutions. We are a full stack custom web development agency with expertise to merge the latest tech stacks.', 'technology' => 'HTML5,CSS3,React.js'],
                                    ['icon' => 'fas fa-server', 'title' => 'Back-End Development', 'description' => 'Robust frameworks & scalable applications using PHP, Python, Ruby on Rails, Java, Node.js, Django, Laravel, ASP.Net with comprehensive API & security integration.', 'technology' => 'PHP,Python,Laravel'],
                                    ['icon' => 'fas fa-layer-group', 'title' => 'Full-Stack Development', 'description' => 'Integrated front-end & back-end solutions. We are a full stack custom web development agency with expertise to merge the latest tech stacks.','technology' => 'Full-Stack,Integrated'],
                                    ['icon' => 'fas fa-edit','title' => 'CMS Development', 'description' => 'WordPress, Joomla, Drupal, Magento expertise with custom CMS creation and flexible headless solutions for scalability.', 'technology' => 'WordPress,Drupal,Custom CMS'],
                                    ['icon' => 'fas fa-database','title' => 'Database Management', 'description' => 'SQL & NoSQL expertise including MySQL, PostgreSQL, MongoDB, and Graph Databases with efficient data handling and optimization.', 'technology' => 'MySQL,MongoDB'],
                                    ['icon' => 'fas fa-shield-alt','title' => 'Security & Testing', 'description' => 'Comprehensive security measures including website security audits, data protection, DDoS protection, SSL encryption, and robust quality assurance.', 'technology' => 'Security Audits,SSL']
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-cog"></i>
                                        Process {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Icon</label>
                                                <input type="text" class="form-control" name="process{{ $i }}_icon" placeholder="{{ $defaultProcesses[$i-1]['icon'] }}" value="{{ isset($customProcessContent) && $customProcessContent ? ($customProcessContent['processes'][$i-1]['icon'] ?? '') : $defaultProcesses[$i-1]['icon'] }}">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label class="form-label">Process Title</label>
                                                <input type="text" class="form-control" name="process{{ $i }}_title" placeholder="{{ $defaultProcesses[$i-1]['title'] }}" value="{{ isset($customProcessContent) && $customProcessContent ? ($customProcessContent['processes'][$i-1]['title'] ?? '') : $defaultProcesses[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Process Description</label>
                                                <textarea class="form-control editor" name="process{{ $i }}_description" rows="3" placeholder="{{ $defaultProcesses[$i-1]['description'] }}">{{ isset($customProcessContent) && $customProcessContent ? ($customProcessContent['processes'][$i-1]['description'] ?? '') : $defaultProcesses[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Technologies</label>
                                                <input type="text" class="form-control" name="process{{ $i }}_technology" rows="3" placeholder="{{ $defaultProcesses[$i-1]['technology'] }}" value="{{ isset($customProcessContent) && $customProcessContent ? ($customProcessContent['processes'][$i-1]['technology'] ?? '') : $defaultProcesses[$i-1]['technology'] }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Custom Process Section
                                </button>
                            </div>
                        </form>
                    </div>

                      <!-- Ecommerce Development -->
                    <div class="section-content" id="ecommerce-development-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-server"></i>
                                    Ecommerce Development Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="ecommerceDevelopmentForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="ecommerce_development_title"  value="{{ isset($ecommerceDevelopmentContent) && $ecommerceDevelopmentContent ? ($ecommerceDevelopmentContent['title'] ?? '') : 'Ecommerce Development' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultEcommerceDevelopment = [
                                    [
                                        'main_heading'   => 'Platforms & Custom Solutions',
                                        'heading1'       => 'Tailored Platforms',
                                        'discription1'   => 'When it comes to custom Ecommerce web development, our expertise lies in Shopify, Magento, and WooCommerce.',
                                        'technologies'   => 'Shopify,Magento,WooCommerce',
                                        'heading2'       => 'Custom Features',
                                        'discription2'   => 'Our custom Ecommerce development involves adding custom shopping related functionalities. Whether it\'s custom shopping carts, flash deals, sales timers, etc. – we have nailed it all – and yes, everything according to your preferences.'
                                    ],
                                    [
                                        'main_heading'   => 'Security & Compliance',
                                        'heading1'       => 'Secure Transactions',
                                        'discription1'   => 'Ecommerce platforms have to be secure – no matter what. Our developers make sure that every transaction on the Ecommerce platform that we have built for you is secured.',
                                        'technologies'   => '',
                                        'heading2'       => 'Compliance Standards',
                                        'discription2'   => 'Every platform that we build is compliant to the local laws or the data privacy laws of the country in which the business is situated.'
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 2; $i++) 
                        
                                <div class="card">
                                    <div class="card-title">
                                        Div {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Main Heading</label>
                                                <input type="text" class="form-control" 
                                                    name="ecommerceDev{{ $i }}_main_heading" 
                                                    placeholder="{{ $defaultEcommerceDevelopment[$i-1]['main_heading'] }}" 
                                                    value="{{ isset($ecommerceDevelopmentContent) && $ecommerceDevelopmentContent ? ($ecommerceDevelopmentContent['methodologies'][$i-1]['main_heading'] ?? '') : $defaultEcommerceDevelopment[$i-1]['main_heading'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Heading</label>
                                                <input type="text" class="form-control" 
                                                    name="ecommerceDev{{ $i }}_heading1" 
                                                    placeholder="{{ $defaultEcommerceDevelopment[$i-1]['heading1'] }}" 
                                                    value="{{ isset($ecommerceDevelopmentContent) && $ecommerceDevelopmentContent ? ($ecommerceDevelopmentContent['methodologies'][$i-1]['heading1'] ?? '') : $defaultEcommerceDevelopment[$i-1]['heading1'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control editor" 
                                                        name="ecommerceDev{{ $i }}_discription1" 
                                                        rows="3" 
                                                        placeholder="{{ $defaultEcommerceDevelopment[$i-1]['discription1'] }}">{{ isset($ecommerceDevelopmentContent) && $ecommerceDevelopmentContent ? ($ecommerceDevelopmentContent['methodologies'][$i-1]['discription1'] ?? '') : $defaultEcommerceDevelopment[$i-1]['discription1'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Technologies</label>
                                                <input type="text" class="form-control" 
                                                    name="ecommerceDev{{ $i }}_technologies" 
                                                    placeholder="{{ $defaultEcommerceDevelopment[$i-1]['technologies'] }}" 
                                                    value="{{ isset($ecommerceDevelopmentContent) && $ecommerceDevelopmentContent ? ($ecommerceDevelopmentContent['methodologies'][$i-1]['technologies'] ?? '') : $defaultEcommerceDevelopment[$i-1]['technologies'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Heading</label>
                                                <input type="text" class="form-control" 
                                                    name="ecommerceDev{{ $i }}_heading2" 
                                                    placeholder="{{ $defaultEcommerceDevelopment[$i-1]['heading2'] }}" 
                                                    value="{{ isset($ecommerceDevelopmentContent) && $ecommerceDevelopmentContent ? ($ecommerceDevelopmentContent['methodologies'][$i-1]['heading2'] ?? '') : $defaultEcommerceDevelopment[$i-1]['heading2'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control editor" 
                                                        name="ecommerceDev{{ $i }}_discription2" 
                                                        rows="3" 
                                                        placeholder="{{ $defaultEcommerceDevelopment[$i-1]['discription2'] }}">{{ isset($ecommerceDevelopmentContent) && $ecommerceDevelopmentContent ? ($ecommerceDevelopmentContent['methodologies'][$i-1]['discription2'] ?? '') : $defaultEcommerceDevelopment[$i-1]['discription2'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Ecommerce Development Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Development Methodologies Section -->
                    <div class="section-content" id="development-methodologies-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-project-diagram"></i>
                                    Development Methodologies
                                </h2>
                            </div>
                        </div>
                        
                        <form id="developmentMethodologiesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="methodologies_title" placeholder="Development Methodologies" value="{{ isset($developmentMethodologiesContent) && $developmentMethodologiesContent ? ($developmentMethodologiesContent['title'] ?? '') : 'Development Methodologies' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultMethodologies = [
                                    ['title' => 'Agile Methodology','description' => 'Flexible and collaborative approach to software development with regular iterations and continuous feedback.'],
                                    ['title' => 'DevOps', 'description' => 'Streamlined development and operations processes for faster deployment and better collaboration.'],
                                    ['title' => 'Microservices and API', 'description' => 'Modular architecture approach that breaks applications into smaller, independent services.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-project-diagram"></i>
                                        Methodology {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="methodology{{ $i }}_title" placeholder="{{ $defaultMethodologies[$i-1]['title'] }}" value="{{ isset($developmentMethodologiesContent) && $developmentMethodologiesContent ? ($developmentMethodologiesContent['methodologies'][$i-1]['title'] ?? '') : $defaultMethodologies[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control editor" name="methodology{{ $i }}_description" rows="2" placeholder="{{ $defaultMethodologies[$i-1]['description'] }}">{{ isset($developmentMethodologiesContent) && $developmentMethodologiesContent ? ($developmentMethodologiesContent['methodologies'][$i-1]['description'] ?? '') : $defaultMethodologies[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Development Methodologies Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- DevOps and Deployment Section -->
                    <div class="section-content" id="devops-deployment-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-server"></i>
                                    DevOps and Deployment
                                </h2>
                            </div>
                        </div>
                        
                        <form id="devopsDeploymentForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="devops_title" placeholder="DevOps and Deployment" value="{{ isset($devopsDeploymentContent) && $devopsDeploymentContent ? ($devopsDeploymentContent['title'] ?? '') : 'DevOps and Deployment' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultDevOpsServices = [
                                    ['title' => 'Continuous Integration', 'description' => 'Streamlined development processes with automated testing and deployment pipelines.'],
                                    ['title' => 'Containerization', 'description' => 'Scalable and portable application deployment using containerization technologies.'],
                                    ['title' => 'Cloud Services', 'description' => 'Cloud-native solutions for scalable and reliable application hosting and management.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-server"></i>
                                        DevOps Service {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="devops{{ $i }}_title" placeholder="{{ $defaultDevOpsServices[$i-1]['title'] }}" value="{{ isset($devopsDeploymentContent) && $devopsDeploymentContent ? ($devopsDeploymentContent['services'][$i-1]['title'] ?? '') : $defaultDevOpsServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control editor" name="devops{{ $i }}_description" rows="2" placeholder="{{ $defaultDevOpsServices[$i-1]['description'] }}">{{ isset($devopsDeploymentContent) && $devopsDeploymentContent ? ($devopsDeploymentContent['services'][$i-1]['description'] ?? '') : $defaultDevOpsServices[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save DevOps and Deployment Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Database Management Section -->
                    <div class="section-content" id="database-management-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-database"></i>
                                    Database Management
                                </h2>
                            </div>
                        </div>
                        
                        <form id="databaseManagementForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="database_title" placeholder="Database Management" value="{{ isset($databaseManagementContent) && $databaseManagementContent ? ($databaseManagementContent['title'] ?? '') : 'Database Management' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultDbServices = [
                                    [
                                        'icon' => 'fas fa-database',
                                        'title' => 'Comprehensive Database Solutions',
                                        'sections' => [
                                            [
                                                'heading' => 'SQL & NoSQL Expertise',
                                                'description' => 'MySQL, PostgreSQL, MongoDB, and Graph Databases are what we are experienced in.',
                                                'technologies' => 'MySQL,PostgreSQL,MongoDB,Graph DB'
                                            ],
                                            [
                                                'heading' => 'Efficient Data Handling',
                                                'description' => 'Whether it\'s schema designers, indexers, or query optimizers – we are efficient data handlers.',
                                                'technologies' => ''
                                            ]
                                        ]
                                    ],
                                    [
                                        'icon' => 'fas fa-shield-alt',
                                        'title' => 'Security & Performance Optimization',
                                        'sections' => [
                                            [
                                                'heading' => 'Robust Backup & Recovery',
                                                'description' => 'We have robust backup and recovery flows in place for your data recovery.',
                                                'technologies' => ''
                                            ],
                                            [
                                                'heading' => 'Disaster Recovery Planning',
                                                'description' => 'Even if something terrible happens, we will make sure everything is working smooth with disaster recovery plan.',
                                                'technologies' => ''
                                            ],
                                            [
                                                'heading' => 'Enhanced Security & Performance',
                                                'description' => 'While enhancing security and performance, we harden databases and optimize their performance.',
                                                'technologies' => ''
                                            ]
                                        ]
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 2; $i++)
                            <div class="card mb-4">
                                <div class="card-title">
                                    <i class="{{ $defaultDbServices[$i-1]['icon'] }}"></i>
                                    Main Database Service {{ $i }}
                                </div>
                                <div class="row">

                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                                <input type="text" class="form-control"
                                                    name="db_service{{ $i }}_title"
                                                    placeholder="{{ $defaultDbServices[$i-1]['title'] }}"
                                                    value="{{ $databaseManagementContent['main_services'][$i-1]['title'] ?? $defaultDbServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                    </div>

                                  
                                     @for($j = 1; $j <= count($defaultDbServices[$i-1]['sections']); $j++)
                                        <div class="border p-3 my-2 rounded">
                                            <h6>Section {{ $j }}</h6>

                                            <div class="form-group">
                                                <label class="form-label">Heading</label>
                                                <input type="text" class="form-control"
                                                    name="db_service{{ $i }}_section{{ $j }}_heading"
                                                    placeholder="{{ $defaultDbServices[$i-1]['sections'][$j-1]['heading'] }}"
                                                    value="{{ $databaseManagementContent['main_services'][$i-1]['sections'][$j-1]['heading'] ?? $defaultDbServices[$i-1]['sections'][$j-1]['heading'] }}">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control editor" rows="2"
                                                    name="db_service{{ $i }}_section{{ $j }}_description"
                                                    placeholder="{{ $defaultDbServices[$i-1]['sections'][$j-1]['description'] }}">{{ $databaseManagementContent['main_services'][$i-1]['sections'][$j-1]['description'] ?? $defaultDbServices[$i-1]['sections'][$j-1]['description'] }}</textarea>
                                            </div>
                                            @if($j == 1 && $i == 1)
                                            <div class="form-group">
                                                <label class="form-label">Technologies (comma separated)</label>
                                                <input type="text" class="form-control"
                                                    name="db_service{{ $i }}_section{{ $j }}_technologies"
                                                    placeholder="{{ $defaultDbServices[$i-1]['sections'][$j-1]['technologies'] }}"
                                                    value="{{ $databaseManagementContent['main_services'][$i-1]['sections'][$j-1]['technologies'] ?? $defaultDbServices[$i-1]['sections'][$j-1]['technologies'] }}">
                                            </div>
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            @endfor



                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Database Management Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Security Section -->
                    <div class="section-content" id="security-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-shield-alt"></i>
                                    Security
                                </h2>
                            </div>
                        </div>
                        
                        <form id="securityForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="security_title" placeholder="Security" value="{{ isset($securityContent) && $securityContent ? ($securityContent['title'] ?? '') : 'Security' }}">
                                    </div>
                                </div>
                            </div>
                            @php
                                $defaultSecurityServices = [
                                    [
                                        'title' => 'Comprehensive Security Measures',
                                        'sections' => [
                                            ['title' => 'Website Security Audits', 'description' => 'When it comes to custom developing of websites, we always keep our hands-on security and vulnerability checks.'],
                                            ['title' => 'Data Protection', 'description' => 'With us, your data is safe and sound. We use the robustest of codes for encryption and setting the firewall.'],
                                            ['title' => 'DDoS Protection', 'description' => 'DDoS protection that we bring in, lets your website remain functional even if it is attacked or phished.'],
                                        ]
                                    ],
                                    [
                                        'title' => 'Access Control & Compliance',
                                        'sections' => [
                                            ['title' => 'Authentication & Authorization', 'description' => 'We work on two-factor authentications and role-based access control on a big scale.'],
                                            ['title' => 'SSL Encryption', 'description' => 'We make sure that any data-transmission with or without SSL encryption is safe.'],
                                            ['title' => 'Security Compliance', 'description' => 'We follow the law of the land, so you know that you can always count on us.'],
                                        ]
                                    ],
                                ];
                            @endphp

                            @for($i = 1; $i <= 2; $i++)
                                <div class="card mb-4">
                                    <div class="card-title">
                                        Main Security Service {{ $i }}
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Main Title</label>
                                                <input type="text" class="form-control"
                                                    name="security_service{{ $i }}_title"
                                                    value="{{ $securityContent['main_services'][$i-1]['title'] ?? $defaultSecurityServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- {{-- Sub Sections --}} -->
                                    @for($j = 1; $j <= 3; $j++)
                                        <div class="border rounded p-3 mb-2">
                                            <h6>Sub Service {{ $j }}</h6>
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control"
                                                    name="security_service{{ $i }}_section{{ $j }}_title"
                                                    value="{{ $securityContent['main_services'][$i-1]['sections'][$j-1]['title'] ?? $defaultSecurityServices[$i-1]['sections'][$j-1]['title'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control editor"
                                                    name="security_service{{ $i }}_section{{ $j }}_description"
                                                    rows="2">{{ $securityContent['main_services'][$i-1]['sections'][$j-1]['description'] ?? $defaultSecurityServices[$i-1]['sections'][$j-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            @endfor

                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Security Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Performance Optimization Section -->
                    <div class="section-content" id="performance-optimization-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Performance Optimization
                                </h2>
                            </div>
                        </div>
                        
                        <form id="performanceOptimizationForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="performance_title" placeholder="Performance Optimization" value="{{ isset($performanceOptimizationContent) && $performanceOptimizationContent ? ($performanceOptimizationContent['title'] ?? '') : 'Performance Optimization' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultPerformanceServices = [
                                    [
                                        'title' => 'Advanced Optimization Techniques',
                                        'sections' => [
                                            ['title' => 'Caching Strategies', 'description' => 'We aim to make a webpage load faster by caching a dataset to be frequently accessed.'],
                                            ['title' => 'CDN Integration', 'description' => 'We integrate CDN to improve delivery speed and reliability among our users/consumers.'],
                                            ['title' => 'Efficient Loading', 'description' => 'We use lazy loading and the intersection observer API to load resources efficiently.'],
                                        ]
                                    ],
                                    [
                                        'title' => 'Scalability & Continuous Monitoring',
                                        'sections' => [
                                            ['title' => 'Scalable Architecture', 'description' => 'We utilize our own server, load balancer, and auto-snapshot system to maintain efficiency during spikes in traffic.'],
                                            ['title' => 'Real-Time Analytics', 'description' => 'We track and optimize continuously so your website works seamlessly.'],
                                        ]
                                    ],
                                ];
                            @endphp

                            @for($i = 1; $i <= 2; $i++)
                                <div class="card mb-4">
                                    <div class="card-title">
                                        Main Performance Service {{ $i }}
                                    </div>
                                    <div class="card-body">
                                        {{-- Title --}}
                                        <div class="form-group">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control"
                                                name="performance_service{{ $i }}_title"
                                                placeholder="{{ $defaultPerformanceServices[$i-1]['title'] }}"
                                                value="{{ $performanceOptimizationContent['main_services'][$i-1]['title'] ?? $defaultPerformanceServices[$i-1]['title'] }}">
                                        </div>

                                        {{-- Sections --}}
                                        @for($j = 1; $j <= count($defaultPerformanceServices[$i-1]['sections']); $j++)
                                            <div class="border rounded p-3 mb-3">
                                                <h6>Section {{ $j }}</h6>
                                                <div class="form-group">
                                                    <label class="form-label">Section Title</label>
                                                    <input type="text" class="form-control"
                                                        name="performance_service{{ $i }}_section{{ $j }}_title"
                                                        placeholder="{{ $defaultPerformanceServices[$i-1]['sections'][$j-1]['title'] }}"
                                                        value="{{ $performanceOptimizationContent['main_services'][$i-1]['sections'][$j-1]['title'] ?? $defaultPerformanceServices[$i-1]['sections'][$j-1]['title'] }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Section Description</label>
                                                    <textarea class="form-control editor" rows="2"
                                                            name="performance_service{{ $i }}_section{{ $j }}_description"
                                                            placeholder="{{ $defaultPerformanceServices[$i-1]['sections'][$j-1]['description'] }}">{{ $performanceOptimizationContent['main_services'][$i-1]['sections'][$j-1]['description'] ?? $defaultPerformanceServices[$i-1]['sections'][$j-1]['description'] }}</textarea>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Performance Optimization Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Quality Control and Testing Section -->
                    <div class="section-content" id="quality-control-testing-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-check-circle"></i>
                                    Quality Control and Testing
                                </h2>
                            </div>
                        </div>
                        
                        <form id="qualityControlTestingForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="quality_title" placeholder="Quality Control and Testing" value="{{ isset($qualityControlTestingContent) && $qualityControlTestingContent ? ($qualityControlTestingContent['title'] ?? '') : 'Quality Control and Testing' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $comprehensive = [
                                    'title' => 'Comprehensive Testing Processes',
                                    'items' => [
                                        [
                                            'subtitle' => 'Unit Testing',
                                            'description' => 'We check every item to test whether it is working as intended, i.e., unit testing.'
                                        ],
                                        [
                                            'subtitle' => 'Integration Testing',
                                            'description' => 'We make sure all modules work together so that it passes integration tests.'
                                        ],
                                        [
                                            'subtitle' => 'End-to-End Testing',
                                            'description' => 'End-to-end testing imitates what a user would do to check the functioning as a whole.'
                                        ],
                                        [
                                            'subtitle' => 'Automated Testing',
                                            'description' => 'We use tools to make sure our repetitive work doesn\'t waste our time.'
                                        ],
                                        [
                                            'subtitle' => 'Manual Testing',
                                            'description' => 'We ensure a proper inspection takes place to test anything which does not get tested automated.'
                                        ],
                                    ]
                                ];

                                $robustQuality = [
                                    'title' => 'Robust Quality Assurance Techniques',
                                    'items' => [
                                        [
                                            'subtitle' => 'Bug Tracking',
                                            'description' => 'Our custom web developers are highly efficient in tracking bugs in the websites or web apps. Not just tracking but also eliminating them after catching them.'
                                        ],
                                        [
                                            'subtitle' => 'Stress and Load Testing',
                                            'description' => 'After custom building a website or web platform, we put it under maximum load to make sure that it stress tested.'
                                        ],
                                        [
                                            'subtitle' => 'Continuous Monitoring',
                                            'description' => 'We make sure to do continuous monitoring of the website\'s performance and health on a continuous basis.'
                                        ],
                                        [
                                            'subtitle' => 'Log Management and Error Tracking',
                                            'description' => 'Log management is a big issue but we make sure to track faults like these and eliminate them.'
                                        ],
                                    ]
                                ];

                            @endphp

                            <!-- {{-- Comprehensive Testing Processes --}} -->
                            <div class="card mb-3">
                                <div class="card-title">
                                    <i class="fas fa-check-circle"></i>
                                    {{ $comprehensive['title'] }}
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Main Title</label>
                                            <input type="text" 
                                                class="form-control" 
                                                name="comprehensive_title"
                                                placeholder="{{ $comprehensive['title'] }}"
                                                value="{{ $qualityControlTestingContent['comprehensive']['title'] ?? $comprehensive['title'] }}">
                                        </div>
                                    </div>
                                </div>
                                @foreach($comprehensive['items'] as $index => $item)
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle {{ $index + 1 }}</label>
                                                <input type="text" 
                                                    class="form-control" 
                                                    name="comprehensive_items[{{ $index }}][subtitle]"
                                                    placeholder="{{ $item['subtitle'] }}"
                                                    value="{{ $qualityControlTestingContent['comprehensive']['items'][$index]['subtitle'] ?? $item['subtitle'] }}">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-label">Description {{ $index + 1 }}</label>
                                                <textarea class="form-control editor" 
                                                        name="comprehensive_items[{{ $index }}][description]" 
                                                        rows="2"
                                                        placeholder="{{ $item['description'] }}">{{ $qualityControlTestingContent['comprehensive']['items'][$index]['description'] ?? $item['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            <!-- {{-- Robust Quality Assurance Techniques --}} -->
                            <div class="card mb-3">
                                <div class="card-title">
                                    <i class="fas fa-cogs"></i>
                                    {{ $robustQuality['title'] }}
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Main Title</label>
                                            <input type="text" 
                                                class="form-control" 
                                                name="robust_title"
                                                placeholder="{{ $robustQuality['title'] }}"
                                                value="{{ $qualityControlTestingContent['robust']['title'] ?? $robustQuality['title'] }}">
                                        </div>
                                    </div>
                                </div>

                                @foreach($robustQuality['items'] as $index => $item)
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle {{ $index + 1 }}</label>
                                                <input type="text" 
                                                    class="form-control" 
                                                    name="robust_items[{{ $index }}][subtitle]"
                                                    placeholder="{{ $item['subtitle'] }}"
                                                    value="{{ $qualityControlTestingContent['robust']['items'][$index]['subtitle'] ?? $item['subtitle'] }}">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-label">Description {{ $index + 1 }}</label>
                                                <textarea class="form-control editor" 
                                                        name="robust_items[{{ $index }}][description]" 
                                                        rows="2"
                                                        placeholder="{{ $item['description'] }}">{{ $qualityControlTestingContent['robust']['items'][$index]['description'] ?? $item['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Quality Control and Testing Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Designing & UI/UX Section -->
                    <div class="section-content" id="designing-ui-ux-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-paint-brush"></i>
                                    Designing & UI/UX
                                </h2>
                            </div>
                        </div>
                        
                        <form id="designingUiUxForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="design_title" placeholder="Designing & UI/UX" value="{{ isset($designingUiUxContent) && $designingUiUxContent ? ($designingUiUxContent['title'] ?? '') : 'Designing & UI/UX' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                    $defaultDesignServices = [
                                        [
                                            'title' => 'Design Strategy',
                                            'items' => [
                                                ['subtitle' => 'Wireframing & Prototyping', 'description' => 'Wireframing and prototyping is one of the first steps we do when it comes to creating easy and navigable interfaces.'],
                                                ['subtitle' => 'User Behaviour Analysis', 'description' => 'We make sure that the user behaviour analysis is take care of and based on that, accurate design is created.'],
                                                ['subtitle' => 'Usability & Aesthetics', 'description' => 'We properly balance the aesthetics & usability of your website for a better user experience.'],
                                            ]
                                        ],
                                        [
                                            'title' => 'Enhancing User Experience',
                                            'items' => [
                                                ['subtitle' => 'Interactive & Responsive Design', 'description' => 'The designs that we build are interactive and responsive – no matter on what device you see them.'],
                                                ['subtitle' => 'Mobile App Integration', 'description' => 'Yes, mobile app integration – it\'s important given everyone uses phones on-the-go. We are experts in doing mobile app integration with websites and any web application.'],
                                                ['subtitle' => 'Engagement Focus', 'description' => 'Our custom web developers don\'t just focus on coding part but also make sure that the website or web app is aligned towards hooking the customers.'],
                                            ]
                                        ]
                                    ];
                                @endphp

                                @foreach($defaultDesignServices as $index => $service)
                                    <div class="card mb-4">
                                        <div class="card-title">
                                            {{ $service['title'] }}
                                        </div>
                                        
                                        {{-- Title input --}}
                                        <div class="form-group mb-3">
                                            <label class="form-label">Main Title</label>
                                            <input type="text" 
                                                class="form-control" 
                                                name="design_services[{{ $index }}][title]"
                                                value="{{ $designingUiUxContent['services'][$index]['title'] ?? $service['title'] }}">
                                        </div>

                                        {{-- Loop through items --}}
                                        @foreach($service['items'] as $itemIndex => $item)
                                            <div class="border p-3 mb-3">
                                                <div class="form-group mb-2">
                                                    <label class="form-label">Subtitle</label>
                                                    <input type="text" 
                                                        class="form-control" 
                                                        name="design_services[{{ $index }}][items][{{ $itemIndex }}][subtitle]"
                                                        value="{{ $designingUiUxContent['services'][$index]['items'][$itemIndex]['subtitle'] ?? $item['subtitle'] }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control editor" 
                                                            name="design_services[{{ $index }}][items][{{ $itemIndex }}][description]"
                                                            rows="2">{{ $designingUiUxContent['services'][$index]['items'][$itemIndex]['description'] ?? $item['description'] }}</textarea>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach

                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Designing & UI/UX Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Cross Hair Section -->
                    <div class="section-content" id="cross-hair-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-crosshairs"></i>
                                    Cross Hair Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="crossHairForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="cross_hair_title" 
                                            placeholder="Our Cross-Hair Go Beyond Custom Web Development Services" 
                                            value="{{ isset($crossHairContent) && $crossHairContent ? ($crossHairContent['title'] ?? '') : 'Our Cross-Hair Go Beyond Custom Web Development Services' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultCrossHairServices = [
                                    [
                                        'title' => 'Custom UI & UX Design',
                                        'description' => 'Your website would look attractive and will also be highly navigable owing to our custom UX & UI designs. We create UIs that complement your brand, enrich the user experience and are simple to use.',
                                        'features' => ['Brand Alignment', 'User Experience', 'Conversion Focus']
                                    ],
                                    [
                                        'title' => 'SEO and Conversion Optimization',
                                        'description' => 'We improve your online presence with our SEO and conversion rate optimization services. We want to help you get more traffic to your website by enhancing its rankings on search engines.',
                                        'features' => ['Search Rankings', 'Traffic Growth', 'ROI Focus']
                                    ],
                                    [
                                        'title' => 'End-To-End Development',
                                        'description' => 'We cover everything from start to finish for your website or web app. Our website development services combine the power of front-end and back-end technologies! You take care of your business; we\'ll take care of your digital platform.',
                                        'features' => ['Full-Stack', 'Agile Methods', 'Quality Focus']
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-layer-group"></i>
                                        Cross Hair Service {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Service Title</label>
                                                <input type="text" class="form-control" name="cross_hair_service{{ $i }}_title" 
                                                    placeholder="{{ $defaultCrossHairServices[$i-1]['title'] }}" 
                                                    value="{{ isset($crossHairContent) && $crossHairContent ? ($crossHairContent['services'][$i-1]['title'] ?? '') : $defaultCrossHairServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Service Description</label>
                                                <textarea class="form-control editor" name="cross_hair_service{{ $i }}_description" rows="4" 
                                                    placeholder="{{ $defaultCrossHairServices[$i-1]['description'] }}">{{ isset($crossHairContent) && $crossHairContent ? ($crossHairContent['services'][$i-1]['description'] ?? '') : $defaultCrossHairServices[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 1</label>
                                                <input type="text" class="form-control" name="cross_hair_service{{ $i }}_feature1" 
                                                    placeholder="{{ $defaultCrossHairServices[$i-1]['features'][0] }}" 
                                                    value="{{ isset($crossHairContent) && $crossHairContent ? ($crossHairContent['services'][$i-1]['features'][0] ?? '') : $defaultCrossHairServices[$i-1]['features'][0] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 2</label>
                                                <input type="text" class="form-control" name="cross_hair_service{{ $i }}_feature2" 
                                                    placeholder="{{ $defaultCrossHairServices[$i-1]['features'][1] }}" 
                                                    value="{{ isset($crossHairContent) && $crossHairContent ? ($crossHairContent['services'][$i-1]['features'][1] ?? '') : $defaultCrossHairServices[$i-1]['features'][1] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 3</label>
                                                <input type="text" class="form-control" name="cross_hair_service{{ $i }}_feature3" 
                                                    placeholder="{{ $defaultCrossHairServices[$i-1]['features'][2] }}" 
                                                    value="{{ isset($crossHairContent) && $crossHairContent ? ($crossHairContent['services'][$i-1]['features'][2] ?? '') : $defaultCrossHairServices[$i-1]['features'][2] }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Cross Hair Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- What Is Custom Section -->
                    <div class="section-content" id="what-is-custom-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-question-circle"></i>
                                    What Is Custom Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="whatIsCustomForm">
                            <div class="row">
                                {{-- Section Title --}}
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="what_title"
                                        placeholder="What Is Custom Website Development?">{{ $whatIsCustomContent['title'] ?? '' }}</textarea>
                                    </div>
                                </div>

                                {{-- Section Description --}}
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="what_description" rows="4"
                                            placeholder="Custom website development is building a website or web-based application from scratch...">{{ $whatIsCustomContent['description'] ?? '' }}</textarea>
                                    </div>
                                </div>

                                {{-- Section Subtitle --}}
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="what_subtitle"
                                            placeholder="The Key Stages of Custom Web Development"
                                            value="{{ $whatIsCustomContent['subtitle'] ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Fixed Services (6) --}}
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5>Services</h5>
                                </div>

                                @for ($i = 0; $i < 6; $i++)
                                    <div class="col-12">
                                        <div class="service-item border p-3 mb-3 card">
                                            <h6 class="mb-3 card-title">Service {{ $i + 1 }}</h6>

                                            <div class="form-group mb-2">
                                                <label>Service Title</label>
                                                <input type="text" class="form-control" 
                                                    name="services[{{ $i }}][title]"
                                                    value="{{ $whatIsCustomContent['services'][$i]['title'] ?? '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Service Description</label>
                                                <textarea class="form-control editor" name="services[{{ $i }}][description]" rows="2">{{ $whatIsCustomContent['services'][$i]['description'] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save What Is Custom Section
                                </button>
                            </div>
                        </form>    
                    </div>

                    <!-- Why Need Custom Section -->
                    <div class="section-content" id="why-need-custom-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-lightbulb"></i>
                                    Why Need Custom Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="whyNeedCustomForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="need_title" placeholder="Why Do You Need Custom Web Design & Development?">{{ isset($whyNeedCustomContent) && $whyNeedCustomContent ? ($whyNeedCustomContent['title'] ?? '') : 'Why Do You Need Custom Web Design & Development?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="need_description" rows="4" placeholder="Most of the customers abandon a brand after just one negative mishap on the website...">{{ isset($whyNeedCustomContent) && $whyNeedCustomContent ? ($whyNeedCustomContent['description'] ?? '') : 'Most of the customers abandon a brand after just one negative mishap on the website, like a malfunction or slow loading. Custom web development gives your audience the exact website they need while addressing any gaps within their audience.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultBenefits = [
                                    ['title' => 'Unique Designs', 'description' => 'Unique designs tailored to your brand and audience.'],
                                    ['title' => 'Secure & Reliable', 'description' => 'Secure, reliable websites with custom functionality.'],
                                    ['title' => 'Optimized Performance', 'description' => 'Optimized layouts and faster loading speeds.'],
                                    ['title' => 'SEO Optimized', 'description' => 'On-page SEO to boost search engine rankings.'],
                                    ['title' => 'User-Friendly', 'description' => 'User-friendly interfaces for seamless navigation.'],
                                    ['title' => 'Scalable Platforms', 'description' => 'High-performing, scalable platforms to support growth.'],
                                    ['title' => 'Conversion-Focused', 'description' => 'Conversion-focused designs to increase engagement.'],
                                    ['title' => 'Custom Admin Panels', 'description' => 'Custom admin panels for easy management.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 8; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-check"></i>
                                        Benefit {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Benefit Title</label>
                                                <input type="text" class="form-control" name="benefit{{ $i }}_title" placeholder="{{ $defaultBenefits[$i-1]['title'] }}" value="{{ isset($whyNeedCustomContent) && $whyNeedCustomContent ? ($whyNeedCustomContent['benefits'][$i-1]['title'] ?? '') : $defaultBenefits[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Benefit Description</label>
                                                <textarea class="form-control editor" name="benefit{{ $i }}_description" rows="2" placeholder="{{ $defaultBenefits[$i-1]['description'] }}">{{ isset($whyNeedCustomContent) && $whyNeedCustomContent ? ($whyNeedCustomContent['benefits'][$i-1]['description'] ?? '') : $defaultBenefits[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Why Need Custom Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- What Services Section -->
                    <div class="section-content" id="what-services-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-list"></i>
                                    What Services Section
                                </h2>
                            </div>
                        </div>
                        
                
                        <form id="whatServicesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="services_title"
                                            placeholder="What Services Does A Custom Web Development Company Offer?">{{ isset($whatServicesContent['title']) ? $whatServicesContent['title'] : 'What Services Does A Custom Web Development Company Offer?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="services_description" rows="3"
                                            placeholder="Comprehensive web development services to meet all your digital needs">{{ isset($whatServicesContent['description']) ? $whatServicesContent['description'] : 'Comprehensive web development services to meet all your digital needs' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- Core Services Heading --}}
                            <div class="form-group mt-4">
                                <label class="form-label">Core Services Heading</label>
                                <input type="text" class="form-control" name="core_services_heading"
                                    placeholder="Core Services"
                                    value="{{ isset($whatServicesContent['core_services_heading']) ? $whatServicesContent['core_services_heading'] : 'Core Services' }}">
                            </div>

                            {{-- Core Services --}}
                            @php
                                $coreServices = [
                                    ['title' => 'Frontend & Backend Development', 'description' => 'Custom UI/UX design and backend solutions.'],
                                    ['title' => 'Responsive Design', 'description' => 'Websites that adapt seamlessly to any device.'],
                                    ['title' => 'App Development', 'description' => 'Android, iOS, and web app creation, including PWAs.'],
                                    ['title' => 'Website Support', 'description' => 'Ongoing maintenance and performance monitoring.'],
                                    ['title' => 'Website Migration', 'description' => 'Securely move platforms (e.g., WordPress to Shopify).'],
                                    ['title' => 'Website Redesign', 'description' => 'Update designs to reflect modern trends or business growth.'],
                                ];
                            @endphp

                            @for($i = 1; $i <= count($coreServices); $i++)
                                <div class="card mb-3">
                                    <div class="card-title">Core Service {{ $i }}</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Service Title</label>
                                            <input type="text" class="form-control" name="core_service{{ $i }}_title"
                                                placeholder="{{ $coreServices[$i-1]['title'] }}"
                                                value="{{ isset($whatServicesContent['core_services'][$i-1]['title']) ? $whatServicesContent['core_services'][$i-1]['title'] : $coreServices[$i-1]['title'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Service Description</label>
                                            <textarea class="form-control editor" name="core_service{{ $i }}_description" rows="2"
                                                placeholder="{{ $coreServices[$i-1]['description'] }}">{{ isset($whatServicesContent['core_services'][$i-1]['description']) ? $whatServicesContent['core_services'][$i-1]['description'] : $coreServices[$i-1]['description'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            {{-- Specialized Services Heading --}}
                            <div class="form-group mt-4">
                                <label class="form-label">Specialized Services Heading</label>
                                <input type="text" class="form-control" name="special_services_heading"
                                    placeholder="Specialized Services"
                                    value="{{ isset($whatServicesContent['special_services_heading']) ? $whatServicesContent['special_services_heading'] : 'Specialized Services' }}">
                            </div>

                            {{-- Specialized Services --}}
                            @php
                                $specializedServices = [
                                    ['title' => 'eCommerce Development', 'description' => 'Tailored platforms for stores of any size using Shopify, WooCommerce, or Magento.'],
                                    ['title' => 'Enterprise Solutions', 'description' => 'Complex systems with AI integration, CMS customization, and big data capabilities.'],
                                    ['title' => 'SEO Optimization', 'description' => 'Ensuring search visibility with robust on-page techniques.'],
                                ];
                            @endphp

                            @for($j = 1; $j <= count($specializedServices); $j++)
                                <div class="card mb-3">
                                    <div class="card-title">Specialized Service {{ $j }}</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Service Title</label>
                                            <input type="text" class="form-control" name="special_service{{ $j }}_title"
                                                placeholder="{{ $specializedServices[$j-1]['title'] }}"
                                                value="{{ isset($whatServicesContent['special_services'][$j-1]['title']) ? $whatServicesContent['special_services'][$j-1]['title'] : $specializedServices[$j-1]['title'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Service Description</label>
                                            <textarea class="form-control editor" name="special_service{{ $j }}_description" rows="2"
                                                placeholder="{{ $specializedServices[$j-1]['description'] }}">{{ isset($whatServicesContent['special_services'][$j-1]['description']) ? $whatServicesContent['special_services'][$j-1]['description'] : $specializedServices[$j-1]['description'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save What Services Section
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
                                    ['question' => 'What is a custom website?', 'answer' => 'A custom website is uniquely built from scratch to meet your business\'s needs, offering unmatched flexibility and scalability.'],
                                    ['question' => 'Why do I need custom web development?', 'answer' => 'Custom development enhances user experience, increases credibility, and improves search engine rankings.'],
                                    ['question' => 'How much does custom development cost?', 'answer' => 'Costs typically start at $1,000 and vary by project complexity, integrations, and design needs.'],
                                    ['question' => 'Will my site be mobile-optimized?', 'answer' => 'Absolutely, with a mobile-first approach ensuring responsiveness across all devices.'],
                                    ['question' => 'What is the timeline for development?', 'answer' => 'Informational sites take 1–4 months, while eCommerce projects may require more time.']
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
                                                <textarea class="form-control editor" name="faq{{ $i }}_answer" rows="3" placeholder="{{ $defaultFaqs[$i-1]['answer'] }}">{{ isset($faqContent) && $faqContent ? ($faqContent['faqs'][$i-1]['answer'] ?? '') : $defaultFaqs[$i-1]['answer'] }}</textarea>
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
    const forms = ['heroForm', 'introForm', 'coreServicesForm', 'additionalServicesForm', 'whyChooseUsForm', 'customProcessForm', 'crossHairForm', 'whatIsCustomForm', 'whyNeedCustomForm', 'whatServicesForm', 'faqForm', 'ecommerceDevelopmentForm', 'developmentMethodologiesForm', 'devopsDeploymentForm', 'databaseManagementForm', 'securityForm', 'performanceOptimizationForm', 'qualityControlTestingForm', 'designingUiUxForm'];
    
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
                        url = '{{ route("service.webDevelopment.save-hero") }}';
                        break;
                    case 'introForm':
                        url = '{{ route("service.webDevelopment.save-intro") }}';
                        break;
                    case 'coreServicesForm':
                        url = '{{ route("service.webDevelopment.save-core-services") }}';
                        break;
                    case 'additionalServicesForm':
                        url = '{{ route("service.webDevelopment.save-additional-services") }}';
                        break;
                    case 'whyChooseUsForm':
                        url = '{{ route("service.webDevelopment.save-why-choose-us") }}';
                        break;
                    case 'customProcessForm':
                        url = '{{ route("service.webDevelopment.save-custom-process") }}';
                        break;
                    case 'crossHairForm':
                        url = '{{ route("service.webDevelopment.save-cross-hair") }}';
                        break;
                    case 'whatIsCustomForm':
                        url = '{{ route("service.webDevelopment.save-what-is-custom") }}';
                        break;
                    case 'whyNeedCustomForm':
                        url = '{{ route("service.webDevelopment.save-why-need-custom") }}';
                        break;
                    case 'whatServicesForm':
                        url = '{{ route("service.webDevelopment.save-what-services") }}';
                        break;
                    case 'faqForm':
                        url = '{{ route("service.webDevelopment.save-faq") }}';
                        break;
                    case 'developmentMethodologiesForm':
                        url = '{{ route("service.webDevelopment.save-development-methodologies") }}';
                        break;
                    case 'devopsDeploymentForm':
                        url = '{{ route("service.webDevelopment.save-devops-deployment") }}';
                        break;
                    case 'databaseManagementForm':
                        url = '{{ route("service.webDevelopment.save-database-management") }}';
                        break;
                    case 'securityForm':
                        url = '{{ route("service.webDevelopment.save-security") }}';
                        break;
                    case 'performanceOptimizationForm':
                        url = '{{ route("service.webDevelopment.save-performance-optimization") }}';
                        break;
                    case 'qualityControlTestingForm':
                        url = '{{ route("service.webDevelopment.save-quality-control-testing") }}';
                        break;
                    case 'designingUiUxForm':
                        url = '{{ route("service.webDevelopment.save-designing-ui-ux") }}';
                        break;
                    case 'ecommerceDevelopmentForm':
                        url = '{{ route("service.webDevelopment.save-ecommerce-development") }}';
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
            
            fetch('{{ route("service.webDevelopment.toggle-section") }}', {
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