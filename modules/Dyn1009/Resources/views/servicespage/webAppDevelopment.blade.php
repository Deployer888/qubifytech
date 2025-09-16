@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $whoWeServeContent = $whoWeServeContent ?? null;
    $webAppsDeliverContent = $webAppsDeliverContent ?? null;
    $industriesContent = $industriesContent ?? null;
    $servicesContent = $servicesContent ?? null;
    $benefitsContent = $benefitsContent ?? null;
    $techStackContent = $techStackContent ?? null;
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
                    <li class="breadcrumb-item active" aria-current="page">Web App Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">Web App Development Sections</h5>
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
                        <button class="section-nav-link" data-section="who-we-serve">
                            <i class="fas fa-users"></i>
                            Who We Serve
                        </button>
                        <button class="section-nav-link" data-section="web-apps-deliver">
                            <i class="fas fa-laptop-code"></i>
                            Web Apps We Deliver
                        </button> 
                       <button class="section-nav-link" data-section="industries">
                            <i class="fas fa-industry"></i>
                            Industries We Know
                        </button>
                        <button class="section-nav-link" data-section="services">
                            <i class="fas fa-cogs"></i>
                            Our Services
                        </button>
                        <button class="section-nav-link" data-section="benefits">
                            <i class="fas fa-thumbs-up"></i>
                            Benefits
                        </button>
                        <button class="section-nav-link" data-section="tech-stack">
                            <i class="fas fa-code"></i>
                            Tech Stack
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
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Web Application Development Services">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Web Application Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="You set the business goals; we create the web application to bring them to life...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : "You set the business goals; we create the web application to bring them to life. Count on our expertise in modern technologies like React.js, Angular, Node.js, and Python to deliver dynamic, secure, and scalable solutions." }}</textarea>
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
                                            <input type="text" class="form-control" name="hero_feature1" placeholder="React.js & Angular" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][0] ?? '') : 'React.js & Angular' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="hero_feature2" placeholder="Enterprise-Grade" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][1] ?? '') : 'Enterprise-Grade' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="hero_feature3" placeholder="High-ROI Solutions" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][2] ?? '') : 'High-ROI Solutions' }}">
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
                                            <input type="text" class="form-control" name="hero_button1_text" placeholder="🚀 Start Your Web App Project" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][0]['text'] ?? '') : '🚀 Start Your Web App Project' }}">
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
                                        <textarea class="form-control editor" name="intro_title" rows="2" placeholder="Why Choose Us as Your Web App Development Company">{{ isset($introContent) && $introContent ? ($introContent->content_json['title'] ?? '') : 'Why Choose Us as Your Web App Development Company' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="intro_description" rows="4" placeholder="When you partner with us, we connect you with our team of talented developers...">{{ isset($introContent) && $introContent ? ($introContent->content_json['description'] ?? '') : 'When you partner with us, we connect you with our team of talented developers that want to see you succeed. Our expertise extends across various industries, allowing us to create unique web apps for your niche.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    ['title' => 'Proven Expertise', 'description' => 'We have an enormous amount of experience in building high-performance applications with advanced technologies'],
                                    ['title' => 'Advanced Technologies', 'description' => 'We are tech experts using the latest high-end tech stacks like React.js, Angular and ASP.NET'],
                                    ['title' => 'Client-Centric Approach', 'description' => 'We make your wishes come true with commitment to quality and scalability support for future-ready solutions'],
                                    ['title' => 'Commitment to Quality', 'description' => 'We put in the extra hours to make sure everything is perfect.'],
                                    ['title' => 'Scalability and Support', 'description' => 'Our solutions are future-ready with every update and fix that\'s required.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
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
                  <!-- Who We Serve Section -->
                    <div class="section-content" id="who-we-serve-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-users"></i>
                                    Who We Serve Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="whoWeServeForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="who_title" rows="2" placeholder="Who We Serve with Our Web Application Services">{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['title'] ?? '') : 'Who We Serve with Our Web Application Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="who_subtitle" placeholder="Tailored solutions for businesses at every stage of growth" value="{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['subtitle'] ?? '') : 'Tailored solutions for businesses at every stage of growth' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultServices = [
                                    [
                                        'title' => 'Startups',
                                        'subtitle' => 'Turn Ideas into Thorough Solutions',
                                        'description' => 'For young businesses, we deliver customized web application development services that turn ideas into thorough solutions. Our agile approach enables rapid development and deployment to help startups gain an online presence quickly with MVPs and scalable applications.',
                                        'features' => ['MVP Development', 'Rapid Deployment', 'Cost-Effective'],
                                        'stats' => [
                                            ['label' => 'Time to Market', 'value' => '-60%'],
                                            ['label' => 'Development Cost', 'value' => '-40%'],
                                            ['label' => 'Scalability', 'value' => '∞']
                                        ]
                                    ],
                                    [
                                        'title' => 'Businesses',
                                        'subtitle' => 'Optimize Operations & Customer Engagement',
                                        'description' => 'Our custom web application development service is perfect for small and medium-sized businesses to optimize their operations and improve customer engagement. We develop feature-rich and user-friendly applications like ecommerce, customer portals, or business management systems.',
                                        'features' => ['E-commerce Solutions', 'Customer Portals', 'Business Management'],
                                        'stats' => [
                                            ['label' => 'Efficiency Boost', 'value' => '+75%'],
                                            ['label' => 'Customer Engagement', 'value' => '+85%'],
                                            ['label' => 'ROI Improvement', 'value' => '+120%']
                                        ]
                                    ],
                                    [
                                        'title' => 'Enterprises',
                                        'subtitle' => 'Strong & Scalable Enterprise Solutions',
                                        'description' => 'Businesses need strong and big web applications that can manage complicated processes and lots of users. Our web application development services use the latest technology to create high-performance custom ERP, CRM, and AI solutions with existing security integration.',
                                        'features' => ['Custom ERP', 'CRM Solutions', 'AI Integration'],
                                        'stats' => [
                                            ['label' => 'User Capacity', 'value' => '10K+'],
                                            ['label' => 'Performance', 'value' => '99.9%'],
                                            ['label' => 'Security Level', 'value' => 'A+']
                                        ]
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 3; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-briefcase"></i>
                                        Service {{ $i }} - {{ $defaultServices[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_title" placeholder="{{ $defaultServices[$i-1]['title'] }}" value="{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['services'][$i-1]['title'] ?? '') : $defaultServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_subtitle" placeholder="{{ $defaultServices[$i-1]['subtitle'] }}" value="{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['services'][$i-1]['subtitle'] ?? '') : $defaultServices[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="service{{ $i }}_description" rows="3" placeholder="{{ $defaultServices[$i-1]['description'] }}">{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['services'][$i-1]['description'] ?? '') : $defaultServices[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 1</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_feature1" placeholder="{{ $defaultServices[$i-1]['features'][0] }}" value="{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['services'][$i-1]['features'][0] ?? '') : $defaultServices[$i-1]['features'][0] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 2</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_feature2" placeholder="{{ $defaultServices[$i-1]['features'][1] }}" value="{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['services'][$i-1]['features'][1] ?? '') : $defaultServices[$i-1]['features'][1] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 3</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_feature3" placeholder="{{ $defaultServices[$i-1]['features'][2] }}" value="{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['services'][$i-1]['features'][2] ?? '') : $defaultServices[$i-1]['features'][2] }}">
                                            </div>
                                        </div>
                                        @for($j = 1; $j <= 3; $j++)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $j }} Label</label>
                                                    <input type="text" class="form-control" name="service{{ $i }}_stat{{ $j }}_label" placeholder="{{ $defaultServices[$i-1]['stats'][$j-1]['label'] }}" value="{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['services'][$i-1]['stats'][$j-1]['label'] ?? '') : $defaultServices[$i-1]['stats'][$j-1]['label'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Stat {{ $j }} Value</label>
                                                    <input type="text" class="form-control" name="service{{ $i }}_stat{{ $j }}_value" placeholder="{{ $defaultServices[$i-1]['stats'][$j-1]['value'] }}" value="{{ isset($whoWeServeContent) && $whoWeServeContent ? ($whoWeServeContent->content_json['services'][$i-1]['stats'][$j-1]['value'] ?? '') : $defaultServices[$i-1]['stats'][$j-1]['value'] }}">
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Who We Serve Section
                                </button>
                            </div>
                        </form>
                    </div>         
                  <!-- Web Apps We Deliver Section -->
                    <div class="section-content" id="web-apps-deliver-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-laptop-code"></i>
                                    Web Applications We Deliver
                                </h2>
                            </div>
                        </div>
                        
                        <form id="webAppsDeliverForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="apps_title" placeholder="Web Applications We Deliver">{{ isset($webAppsDeliverContent) && $webAppsDeliverContent ? ($webAppsDeliverContent->content_json['title'] ?? '') : 'Web Applications We Deliver' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="apps_subtitle" placeholder="Robust and tailored web application development services that fit your business needs" value="{{ isset($webAppsDeliverContent) && $webAppsDeliverContent ? ($webAppsDeliverContent->content_json['subtitle'] ?? '') : 'Robust and tailored web application development services that fit your business needs' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultApps = [
                                    ['title' => 'Web Portals', 'subtitle' => 'Streamlined Interactions', 'description' => 'Self-Service & Customer Portals, Vendor & Partner Portals, Patient & Employee Portals, eLearning Portals, and Community Portals.'],
                                    ['title' => 'Enterprise Web Apps', 'subtitle' => 'Scalable Operations', 'description' => 'Project & Task Management Systems, ERP, PLM, PIM Software, CRM & Financial Management Systems, Document Management Systems.'],
                                    ['title' => 'Customer-Facing Apps', 'subtitle' => 'Exceptional Experiences', 'description' => 'Customer Service Apps, Ecommerce Web Apps, Payment & Lending Apps, Digital Wallets & Crypto Wallets.'],
                                    ['title' => 'Supply Chain Management', 'subtitle' => 'Complete Visibility', 'description' => 'Inventory & Asset Management Systems, Order & Delivery Management Apps, Vendor & Warehouse Management Systems.'],
                                    ['title' => 'Ecommerce Solutions', 'subtitle' => 'Diverse Market Needs', 'description' => 'B2C/B2B Ecommerce Web Apps, Progressive Ecommerce Web Apps, Online Marketplaces for buyers and sellers.'],
                                    ['title' => 'Analytics Web Apps', 'subtitle' => 'Data-Driven Decisions', 'description' => 'Business Intelligence Solutions, Risk Analytics Tools, AI & Machine Learning Applications for process automation.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-laptop"></i>
                                        App Type {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="app{{ $i }}_title" placeholder="{{ $defaultApps[$i-1]['title'] }}" value="{{ isset($webAppsDeliverContent) && $webAppsDeliverContent ? ($webAppsDeliverContent->content_json['apps'][$i-1]['title'] ?? '') : $defaultApps[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="app{{ $i }}_subtitle" placeholder="{{ $defaultApps[$i-1]['subtitle'] }}" value="{{ isset($webAppsDeliverContent) && $webAppsDeliverContent ? ($webAppsDeliverContent->content_json['apps'][$i-1]['subtitle'] ?? '') : $defaultApps[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="app{{ $i }}_description" rows="2" placeholder="{{ $defaultApps[$i-1]['description'] }}">{{ isset($webAppsDeliverContent) && $webAppsDeliverContent ? ($webAppsDeliverContent->content_json['apps'][$i-1]['description'] ?? '') : $defaultApps[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Web Apps We Deliver Section
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
                                    Industries We Know
                                </h2>
                            </div>
                        </div>
                        
                        <form id="industriesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="industries_title" placeholder="We Know Your Industry">{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['title'] ?? '') : 'We Know Your Industry' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="industries_subtitle" placeholder="Customized web applications for various industries that meet their standards" value="{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['subtitle'] ?? '') : 'Customized web applications for various industries that meet their standards' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultIndustries = [
                                    ['title' => 'Healthcare', 'description' => 'We create web applications for healthcare businesses that are secure, HIPAA-compliant websites, patient management software, health data analytics, and telemedicine applications.', 'features' => ['HIPAA Compliant', 'Patient Management', 'Telemedicine']],
                                    ['title' => 'Banking', 'description' => 'Security and compliance are the foundation of our banking web development solutions. Our experts help with online banking portals, payment gateways, fraud detection, and much more.', 'features' => ['Online Banking', 'Payment Gateway', 'Fraud Detection']],
                                    ['title' => 'Insurance', 'description' => 'Our web applications for the insurance sector simplify the claims process, streamline vehicle management, and provide self-service portals for clients while reducing administrative costs.', 'features' => ['Claims Processing', 'Self-Service Portal', 'Cost Reduction']],
                                    ['title' => 'Retail', 'description' => 'We create scalable eCommerce platforms, powerful inventory management systems, and personalized shopping experiences. Improve your operations, sales, and customer loyalty.', 'features' => ['eCommerce Platform', 'Inventory Management', 'Personalization']],
                                    ['title' => 'Manufacturing', 'description' => 'We develop web applications for manufacturing such as supply material management systems, production tracking, and inventory management solutions to optimize time and costs.', 'features' => ['Supply Management', 'Production Tracking', 'Automation']],
                                    ['title' => 'Telecoms', 'description' => 'We assist telecom firms in creating interactive web applications, customer management and billing software, and network monitoring solutions to enhance service delivery.', 'features' => ['Customer Management', 'Billing Software', 'Network Monitoring']]
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-industry"></i>
                                        Industry {{ $i }} - {{ $defaultIndustries[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="industry{{ $i }}_title" placeholder="{{ $defaultIndustries[$i-1]['title'] }}" value="{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['industries'][$i-1]['title'] ?? '') : $defaultIndustries[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="industry{{ $i }}_description" rows="3" placeholder="{{ $defaultIndustries[$i-1]['description'] }}">{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['industries'][$i-1]['description'] ?? '') : $defaultIndustries[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 1</label>
                                                <input type="text" class="form-control" name="industry{{ $i }}_feature1" placeholder="{{ $defaultIndustries[$i-1]['features'][0] }}" value="{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['industries'][$i-1]['features'][0] ?? '') : $defaultIndustries[$i-1]['features'][0] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 2</label>
                                                <input type="text" class="form-control" name="industry{{ $i }}_feature2" placeholder="{{ $defaultIndustries[$i-1]['features'][1] }}" value="{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['industries'][$i-1]['features'][1] ?? '') : $defaultIndustries[$i-1]['features'][1] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature 3</label>
                                                <input type="text" class="form-control" name="industry{{ $i }}_feature3" placeholder="{{ $defaultIndustries[$i-1]['features'][2] }}" value="{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['industries'][$i-1]['features'][2] ?? '') : $defaultIndustries[$i-1]['features'][2] }}">
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
                  <!-- Services Section -->
                    <div class="section-content" id="services-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cogs"></i>
                                    Our Web App Development Services
                                </h2>
                        
                            </div>
                        </div>
                        
                        <form id="servicesForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="services_title" placeholder="Our Web App Development Services">{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['title'] ?? '') : 'Our Web App Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="services_subtitle" placeholder="Personalized services that suit your business goals and elevate user experience" value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['subtitle'] ?? '') : 'Personalized services that suit your business goals and elevate user experience' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultServices = [
                                    ['title' => 'Project Planning', 'description' => 'Collaborate to establish project goals, determine KPIs, and build a roadmap that aligns with business objectives.'],
                                    ['title' => 'UX and UI Design', 'description' => 'Mobile-first responsive layouts and interactive designs using tools like Figma and Adobe XD for brand alignment.'],
                                    ['title' => 'Web App Development', 'description' => 'Smart, effective frameworks using React, Angular, Node.js, and Python with scalable and robust development.'],
                                    ['title' => 'Cloud Migration', 'description' => 'Secure transition to the cloud with zero data loss and downtime for convenient ownership transfer.'],
                                    ['title' => 'Quality Assurance', 'description' => 'Unit, integration and end-to-end testing with third-party API and services integration management.'],
                                    ['title' => '24/7 Support', 'description' => 'Regular monitoring, troubleshooting, and optimization to ensure long-term performance and reliability.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-cog"></i>
                                        Service {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="service{{ $i }}_title" placeholder="{{ $defaultServices[$i-1]['title'] }}" value="{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['services'][$i-1]['title'] ?? '') : $defaultServices[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="service{{ $i }}_description" rows="2" placeholder="{{ $defaultServices[$i-1]['description'] }}">{{ isset($servicesContent) && $servicesContent ? ($servicesContent->content_json['services'][$i-1]['description'] ?? '') : $defaultServices[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Services Section
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
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="benefits_title" placeholder="Benefits of Web App Development with Qubify Tech">{{ isset($benefitsContent) && $benefitsContent ? ($benefitsContent->content_json['title'] ?? '') : 'Benefits of Web App Development with Qubify Tech' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultBenefits = [
                                    ['title' => 'Safe Start', 'description' => 'Wide feasibility study or Proof of Concept (PoC) before full development to lessen risk possibilities and provide clarity.'],
                                    ['title' => 'Strong Security', 'description' => 'High levels of safety with data encryption and multiple login systems to keep data safe and gain trust.'],
                                    ['title' => 'Frequent Releases', 'description' => 'Updated versions every 2–3 weeks using iterative development process to keep the app tuned as per latest requirements.'],
                                    ['title' => 'Ease of Use', 'description' => 'Our apps are simple, intuitive, and built to scale with your business.'],
                                    ['title' => 'Outstanding UX/UI', 'description' => 'Attractive and functional designs that focus on user experience for easy utility and greater satisfaction.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
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
                                        <textarea class="form-control editor" name="tech_title" rows="2" placeholder="Our Tech Stack for Web Application Development Services">{{ isset($techStackContent) && $techStackContent ? ($techStackContent->content_json['title'] ?? '') : 'Our Tech Stack for Web Application Development Services' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control editor" name="tech_subtitle" rows="2" placeholder="Cutting-edge technologies and frameworks for building scalable, secure, and high-performance web applications">{{ isset($techStackContent) && $techStackContent ? ($techStackContent->content_json['subtitle'] ?? '') : 'Cutting-edge technologies and frameworks for building scalable, secure, and high-performance web applications' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTechCategories = [
                                    ['title' => 'Latest Architecture Patterns', 'technologies' => 'Microservices,PWAs,Serverless,Event-Driven'],
                                    ['title' => 'Advanced Technologies', 'technologies' => 'IoT,Blockchain,Cloud Computing,AI/ML,AR/VR,Edge Computing'],
                                    ['title' => 'Front-End Development', 'technologies' => 'React.js,Angular,Vue.js,Svelte,HTML5,CSS3,TypeScript,WebAssembly'],
                                    ['title' => 'Back-End Development', 'technologies' => 'Node.js,Python,Java,PHP,Ruby,Go,C#,.NET'],
                                    ['title' => 'Database Management', 'technologies' => 'MySQL,PostgreSQL,MongoDB,Redis,Cassandra,DynamoDB,Neo4j'],
                                    ['title' => 'Mobile Development', 'technologies' => 'Flutter,React Native,Kotlin,Swift'],
                                    ['title' => 'DevOps & CI/CD Tools', 'technologies' => 'Docker,Kubernetes,Jenkins,GitLab CI/CD,CircleCI,Terraform,Ansible'],
                                    ['title' => 'Testing Tools', 'technologies' => 'Selenium,Cypress,Playwright,Jest,Mocha,Chai'],
                                    ['title' => 'Version Control & Security', 'technologies' => 'Git,GitHub,GitLab,OAuth,JWT,SSL/TLS,OWASP']
                                ];
                            @endphp

                            @for($i = 1; $i <= 9; $i++)
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
                                    ['question' => 'How Can I Choose a Reliable Web Application Development Company?', 'answer' => 'Evaluate their portfolio to assess experience. Ensure they offer comprehensive services, use modern technologies, and maintain clear communication.'],
                                    ['question' => 'What Factors Influence the Cost of Creating a Custom Web Application?', 'answer' => 'Costs depend on the complexity of features, the location of the development team, and the level of customization required.'],
                                    ['question' => 'How Long Does It Take to Develop a Web Application?', 'answer' => 'Timelines vary based on project scope and features. Custom development generally takes longer than pre-built solutions.'],
                                    ['question' => 'What Differentiates Web Application Development from Website Development?', 'answer' => 'Web apps offer dynamic interactivity and are highly customizable, while websites typically deliver static content and simpler functionality.'],
                                    ['question' => 'Do Small Businesses Need Custom Web Application Development?', 'answer' => 'Custom web apps can boost visibility, attract more customers, and support business growth, making them ideal for expanding small businesses.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
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
        { id: 'heroForm', url: '{{ route("service.webAppDevelopment.save-hero") }}' },
        { id: 'introForm', url: '{{ route("service.webAppDevelopment.save-intro") }}' },
        { id: 'whoWeServeForm', url: '{{ route("service.webAppDevelopment.save-who-we-serve") }}' },
        { id: 'webAppsDeliverForm', url: '{{ route("service.webAppDevelopment.save-web-apps-deliver") }}' },
        { id: 'industriesForm', url: '{{ route("service.webAppDevelopment.save-industries") }}' },
        { id: 'servicesForm', url: '{{ route("service.webAppDevelopment.save-services") }}' },
        { id: 'benefitsForm', url: '{{ route("service.webAppDevelopment.save-benefits") }}' },
        { id: 'techStackForm', url: '{{ route("service.webAppDevelopment.save-tech-stack") }}' },
        { id: 'faqForm', url: '{{ route("service.webAppDevelopment.save-faq") }}' }
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
            fetch('{{ route("service.webAppDevelopment.toggle-section") }}', {
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