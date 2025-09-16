@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $introContent = $introContent ?? null;
    $coreFeaturesContent = $coreFeaturesContent ?? null;
    $advancedToolsContent = $advancedToolsContent ?? null;
    $adminControlContent = $adminControlContent ?? null;
    $whyChooseContent = $whyChooseContent ?? null;
    $industriesContent = $industriesContent ?? null;
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
                    <li class="breadcrumb-item active" aria-current="page">POS Development</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">POS Development Sections</h5>
                    </div>
                    <div class="sections-nav">
                        <button class="section-nav-link active" data-section="hero">
                            <i class="fas fa-star"></i>
                            Hero Section
                        </button>
                        <button class="section-nav-link" data-section="intro">
                            <i class="fas fa-info-circle"></i>
                            What is Qubify POS
                        </button>
                        <button class="section-nav-link" data-section="core-features">
                            <i class="fas fa-cogs"></i>
                            Core Capabilities
                        </button>
                        <button class="section-nav-link" data-section="advanced-tools">
                            <i class="fas fa-tools"></i>
                            Advanced Tools
                        </button>
                        <button class="section-nav-link" data-section="admin-control">
                            <i class="fas fa-user-shield"></i>
                            Admin Control Center
                        </button>
                        <button class="section-nav-link" data-section="why-choose">
                            <i class="fas fa-thumbs-up"></i>
                            Why Choose POS
                        </button>
                        <button class="section-nav-link" data-section="industries">
                            <i class="fas fa-industry"></i>
                            Industries Served
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
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Smarter POS Software for Modern Retail">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Smarter POS Software for Modern Retail' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="Qubify POS is a lightning-fast, fully customizable point-of-sale system...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : 'Qubify POS is a lightning-fast, fully customizable point-of-sale system that connects billing, inventory, and analytics into one secure, scalable platform—built on Laravel and ready for retail.' }}</textarea>
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
                                            <input type="text" class="form-control" name="hero_feature1" placeholder="Touch-friendly interface" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][0] ?? '') : 'Touch-friendly interface' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="hero_feature2" placeholder="Real-time stock control" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][1] ?? '') : 'Real-time stock control' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="hero_feature3" placeholder="Multi-store performance tracking" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['features'][2] ?? '') : 'Multi-store performance tracking' }}">
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
                                            <input type="text" class="form-control" name="hero_button1_text" placeholder="🔵 Get Started Now" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][0]['text'] ?? '') : '🔵 Get Started Now' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="hero_button2_text" placeholder="⚪ Request a Demo" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['text'] ?? '') : '⚪ Request a Demo' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
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

                    <!-- What is Qubify POS Section -->
                    <div class="section-content" id="intro-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-info-circle"></i>
                                    What is Qubify POS Section
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
                                            placeholder="One System. What Is Qubify POS?"
                                            >{{ isset($introContent) && $introContent ? ($introContent->content_json['title'] ?? '') : 'One System. What Is Qubify POS?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <input type="text" class="form-control" name="intro_subtitle"
                                            placeholder="One System. Total Store Control."
                                            value="{{ isset($introContent) && $introContent ? ($introContent->content_json['subtitle'] ?? '') : 'One System. Total Store Control.' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Main Description</label>
                                        <textarea class="form-control editor" name="intro_description" rows="4"
                                            placeholder="Qubify POS isn't just a billing tool—it's your complete retail control center...">{{ isset($introContent) && $introContent ? ($introContent->content_json['description'] ?? '') : 'Qubify POS isn\'t just a billing tool—it\'s your complete retail control center. Designed for speed and simplicity, it gives business owners and staff an intuitive way to process sales, track inventory, manage suppliers, and generate insights in real time.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Secondary Description</label>
                                        <textarea class="form-control editor" name="intro_secondary_description" rows="3"
                                            placeholder="From general stores and pharmacies to electronics and fashion outlets...">{{ isset($introContent) && $introContent ? ($introContent->content_json['secondary_description'] ?? '') : 'From general stores and pharmacies to electronics and fashion outlets, Qubify POS adapts to the needs of any modern shop floor—while staying easy to set up, use, and scale.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-check-circle"></i>
                                    Feature Badges
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature Badge 1</label>
                                            <input type="text" class="form-control" name="intro_feature1"
                                                placeholder="✅ Self-hosted and one-time setup"
                                                value="{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][0] ?? '') : '✅ Self-hosted and one-time setup' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature Badge 2</label>
                                            <input type="text" class="form-control" name="intro_feature2"
                                                placeholder="✅ Offline-friendly with auto-sync"
                                                value="{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][1] ?? '') : '✅ Offline-friendly with auto-sync' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature Badge 3</label>
                                            <input type="text" class="form-control" name="intro_feature3"
                                                placeholder="✅ GST-compliant and barcode-ready"
                                                value="{{ isset($introContent) && $introContent ? ($introContent->content_json['features'][2] ?? '') : '✅ GST-compliant and barcode-ready' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save What is Qubify POS Section
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
                                        <textarea class="form-control editor" name="core_title"
                                            placeholder="Core Capabilities">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['title'] ?? '') : 'Core Capabilities' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="core_description" rows="2"
                                            placeholder="Everything you need for complete retail management">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['description'] ?? '') : 'Everything you need for complete retail management' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultCapabilities = [
                                    [
                                        'title' => 'Fast Checkout & Sales Processing',
                                        'subtitle' => 'Speed is Everything at the Counter',
                                        'description' => 'Qubify POS offers rapid billing, multi-mode payments, and custom invoices—all with touch-optimized controls and barcode scanning. Print, email, or export receipts instantly without delay.',
                                        'features' => ['Rapid billing with touch controls', 'Multi-mode payment processing', 'Instant receipt generation'],
                                        'stats' => [
                                            ['label' => 'Today\'s Sales', 'value' => '₹18,750'],
                                            ['label' => 'Transactions', 'value' => '127'],
                                            ['label' => 'Avg. Transaction', 'value' => '₹148']
                                        ]
                                    ],
                                    [
                                        'title' => 'Live Inventory Management',
                                        'subtitle' => 'Track Every Item with Precision',
                                        'description' => 'Monitor stock levels, set low-stock alerts, manage product categories, and even keep tabs on expiry dates—especially useful for pharmacies and perishable goods.',
                                        'features' => ['Real-time stock level monitoring', 'Low-stock alerts and notifications', 'Expiry date tracking for perishables'],
                                        'stats' => [
                                            ['label' => 'Total Products', 'value' => '1,247'],
                                            ['label' => 'Low Stock', 'value' => '8'],
                                            ['label' => 'Stock Value', 'value' => '₹2.1L']
                                        ]
                                    ],
                                    [
                                        'title' => 'Customer & Supplier Management',
                                        'subtitle' => 'Clean, Organized Relationships',
                                        'description' => 'Maintain clear records of every buyer and vendor. View transaction histories, manage credit limits, and stay on top of dues. Qubify POS keeps your financial relationships clean, organized, and transparent.',
                                        'features' => ['Complete transaction histories', 'Credit limit management', 'Due payment tracking'],
                                        'stats' => [
                                            ['label' => 'Total Customers', 'value' => '1,847'],
                                            ['label' => 'Regular Customers', 'value' => '524'],
                                            ['label' => 'Outstanding Dues', 'value' => '₹42,150']
                                        ]
                                    ],
                                    [
                                        'title' => 'Customer & Supplier Management',
                                        'subtitle' => 'Clean, Organized Relationships',
                                        'description' => 'Maintain clear records of every buyer and vendor. View transaction histories, manage credit limits, and stay on top of dues. Qubify POS keeps your financial relationships clean, organized, and transparent.'
                                    ],
                                    [
                                        'title' => 'Customer & Supplier Management',
                                        'subtitle' => 'Clean, Organized Relationships',
                                        'description' => 'Maintain clear records of every buyer and vendor. View transaction histories, manage credit limits, and stay on top of dues. Qubify POS keeps your financial relationships clean, organized, and transparent.'
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                <div class="card mt-4">
                                    <div class="card-title">
                                        <i class="fas fa-layer-group"></i>
                                        Capability {{ $i }} - {{ $defaultCapabilities[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="capability{{ $i }}_title"
                                                    placeholder="{{ $defaultCapabilities[$i-1]['title'] }}"
                                                    value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$i-1]['title'] ?? '') : $defaultCapabilities[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="capability{{ $i }}_subtitle"
                                                    placeholder="{{ $defaultCapabilities[$i-1]['subtitle'] }}"
                                                    value="{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$i-1]['subtitle'] ?? '') : $defaultCapabilities[$i-1]['subtitle'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="capability{{ $i }}_description" rows="3"
                                                    placeholder="{{ $defaultCapabilities[$i-1]['description'] }}">{{ isset($coreFeaturesContent) && $coreFeaturesContent ? ($coreFeaturesContent->content_json['capabilities'][$i-1]['description'] ?? '') : $defaultCapabilities[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        
                                        @if(isset($defaultCapabilities[$i-1]['features']))
                                            <div class="col-12">
                                                <h6>Features</h6>
                                            </div>
                                            @for($j = 1; $j <= 3; $j++)
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Feature {{ $j }}</label>
                                                        <input type="text" class="form-control" name="capability{{ $i }}_feature{{ $j }}"
                                                            placeholder="{{ $defaultCapabilities[$i-1]['features'][$j-1] ?? '' }}"
                                                            value="{{ isset($coreFeaturesContent) && $coreFeaturesContent 
                                                                        ? ($coreFeaturesContent->content_json['capabilities'][$i-1]['features'][$j-1] ?? '') 
                                                                        : ($defaultCapabilities[$i-1]['features'][$j-1] ?? '') }}">
                                                    </div>
                                                </div>
                                            @endfor
                                        @endif
                                        
                                        @if(isset($defaultCapabilities[$i-1]['stats']))
                                            <div class="col-12">
                                                <h6>Statistics</h6>
                                            </div>
                                            @for($k = 1; $k <= 3; $k++)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Stat {{ $k }} Label</label>
                                                        <input type="text" class="form-control" name="capability{{ $i }}_stat{{ $k }}_label"
                                                            placeholder="{{ $defaultCapabilities[$i-1]['stats'][$k-1]['label'] ?? '' }}"
                                                            value="{{ isset($coreFeaturesContent) && $coreFeaturesContent 
                                                                        ? ($coreFeaturesContent->content_json['capabilities'][$i-1]['stats'][$k-1]['label'] ?? '') 
                                                                    : ($defaultCapabilities[$i-1]['stats'][$k-1]['label'] ?? '') }}">
                                                     </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Stat {{ $k }} Value</label>
                                                        <input type="text" class="form-control" name="capability{{ $i }}_stat{{ $k }}_value"
                                                            placeholder="{{ $defaultCapabilities[$i-1]['stats'][$k-1]['value'] ?? '' }}"
                                                            value="{{ isset($coreFeaturesContent) && $coreFeaturesContent 
                                                                        ? ($coreFeaturesContent->content_json['capabilities'][$i-1]['stats'][$k-1]['value'] ?? '') 
                                                                        : ($defaultCapabilities[$i-1]['stats'][$k-1]['value'] ?? '') }}">
                                                    </div>
                                                </div>
                                            @endfor
                                        @endif
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Core Capabilities Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Advanced Tools Section -->
                    <div class="section-content" id="advanced-tools-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-tools"></i>
                                    Advanced Tools Section
                                </h2>
  
                            </div>
                        </div>

                        <form id="advancedToolsForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                            <textarea class="form-control editor" name="advanced_title"
                                            placeholder="Advanced Tools That Set Qubify Apart">{{ isset($advancedToolsContent) && $advancedToolsContent ? ($advancedToolsContent->content_json['title'] ?? '') : 'Advanced Tools That Set Qubify Apart' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultTools = [
                                    [
                                        'title' => 'Built-In Barcode Scanning',
                                        'description' => 'Scan, search, and bill products instantly with integrated barcode recognition.'
                                    ],
                                    [
                                        'title' => 'Return & Refund Handling',
                                        'description' => 'Manage product exchanges, issue refunds, and log returns with proper transaction references.'
                                    ],
                                    [
                                        'title' => 'Purchase & Stock-In Management',
                                        'description' => 'Create purchase orders and log incoming stock with full visibility from supplier to shelf.'
                                    ],
                                    [
                                        'title' => 'Cash Register & Expense Logs',
                                        'description' => 'Open and close the day with complete tracking of cash flow, cash-in, cash-out, and petty expenses.'
                                    ],
                                    [
                                        'title' => 'Custom Invoicing & GST Setup',
                                        'description' => 'Personalize invoices with your branding. Configure tax rules and GST slabs per product category.'
                                    ],
                                    [
                                        'title' => 'Admin Control Center',
                                        'description' => 'Powerful admin panel to configure operations, manage users, and customize workflows.'
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        <i class="fas fa-wrench"></i>
                                        Tool {{ $i }} - {{ $defaultTools[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="tool{{ $i }}_title"
                                                    placeholder="{{ $defaultTools[$i-1]['title'] }}"
                                                    value="{{ isset($advancedToolsContent) && $advancedToolsContent ? ($advancedToolsContent->content_json['tools'][$i-1]['title'] ?? '') : $defaultTools[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="tool{{ $i }}_description" rows="2"
                                                    placeholder="{{ $defaultTools[$i-1]['description'] }}">{{ isset($advancedToolsContent) && $advancedToolsContent ? ($advancedToolsContent->content_json['tools'][$i-1]['description'] ?? '') : $defaultTools[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Advanced Tools Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Admin Control Center Section -->
                    <div class="section-content" id="admin-control-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-user-shield"></i>
                                    Admin Control Center Section
                                </h2>

                            </div>
                        </div>

                        <form id="adminControlForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="admin_title"
                                            placeholder="Scalable Back-End Management">{{ isset($adminControlContent) && $adminControlContent ? ($adminControlContent->content_json['title'] ?? '') : 'Scalable Back-End Management' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="admin_description" rows="2"
                                            placeholder="Qubify POS comes with a powerful admin panel to configure every aspect of your operations.">{{ isset($adminControlContent) && $adminControlContent ? ($adminControlContent->content_json['description'] ?? '') : 'Qubify POS comes with a powerful admin panel to configure every aspect of your operations.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    [
                                        'title' => 'User Management',
                                        'description' => 'Create and manage users with role-based permissions',
                                        'tags' => ['Role-Based Access', 'User Permissions', 'Security']
                                    ],
                                    [
                                        'title' => 'Branch-wise Monitoring',
                                        'description' => 'Monitor branch-wise sales, inventory, and expense reports',                                       
                                        'tags' => ['Sales Reports', 'Inventory', 'Expenses']
                                    ],
                                    [
                                        'title' => 'Pricing & Discount Rules',
                                        'description' => 'Set discount rules, pricing logic, and tax configurations',
                                        'tags' => ['Discount Rules', 'Pricing Logic', 'Tax Config']
                                    ],
                                    [
                                        'title' => 'Custom Print Layouts',
                                        'description' => 'Customize print layouts and invoice branding',
                                        'tags' => ['Print Layouts', 'Invoice Branding', 'Customization']
                                    ],
                                    [
                                        'title' => 'Data Security',
                                        'description' => 'Schedule data backups and restore points for system security',                                     
                                        'tags' => ['Auto Backups', 'Restore Points', 'Security']
                                    ],
                                    [
                                        'title' => 'Workflow Customization',
                                        'description' => 'Adapt POS settings to your exact daily workflow',                                    
                                        'tags' => ['Custom Workflow', 'Daily Operations', 'Settings']
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        <i class="fas fa-shield-alt"></i>
                                        Feature {{ $i }} - {{ $defaultFeatures[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_title"
                                                    placeholder="{{ $defaultFeatures[$i-1]['title'] }}"
                                                    value="{{ isset($adminControlContent) && $adminControlContent ? ($adminControlContent->content_json['features'][$i-1]['title'] ?? '') : $defaultFeatures[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="feature{{ $i }}_description" rows="2"
                                                    placeholder="{{ $defaultFeatures[$i-1]['description'] }}">{{ isset($adminControlContent) && $adminControlContent ? ($adminControlContent->content_json['features'][$i-1]['description'] ?? '') : $defaultFeatures[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <h6>Feature Tags</h6>
                                        </div>
                                        @for($j = 1; $j <= 3; $j++)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Tag {{ $j }}</label>
                                                    <input type="text" class="form-control" name="feature{{ $i }}_tag{{ $j }}"
                                                        placeholder="{{ $defaultFeatures[$i-1]['tags'][$j-1] }}"
                                                        value="{{ isset($adminControlContent) && $adminControlContent ? ($adminControlContent->content_json['features'][$i-1]['tags'][$j-1] ?? '') : $defaultFeatures[$i-1]['tags'][$j-1] }}">
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Admin Control Center Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Why Choose Section -->
                    <div class="section-content" id="why-choose-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-thumbs-up"></i>
                                    Why Choose POS Section
                                </h2>
       
                            </div>
                        </div>

                        <form id="whyChooseForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="why_title"
                                            placeholder="Why Stores Choose Qubify POS">{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['title'] ?? '') : 'Why Stores Choose Qubify POS' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultReasons = [
                                    [
                                        'title' => 'Built on Laravel',
                                        'description' => '100% Laravel-powered front and back end—fully customizable, extendable, and secure for developers and businesses alike.'
                                    ],
                                    [
                                        'title' => 'No Monthly Fees',
                                        'description' => 'You own your system. One-time setup. Unlimited use. No recurring charges or limitations.'
                                    ],
                                    [
                                        'title' => 'Works Online & Offline',
                                        'description' => 'Auto-syncs data when internet returns—so your store never stops, even if your Wi-Fi does.'
                                    ],
                                    [
                                        'title' => 'Secure & Role-Based',
                                        'description' => 'Activity logs, role-based access, and encrypted credentials ensure operations stay safe from all risks.'
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Reason {{ $i }} - {{ $defaultReasons[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="reason{{ $i }}_title"
                                                    placeholder="{{ $defaultReasons[$i-1]['title'] }}"
                                                    value="{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['reasons'][$i-1]['title'] ?? '') : $defaultReasons[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="reason{{ $i }}_description" rows="2"
                                                    placeholder="{{ $defaultReasons[$i-1]['description'] }}">{{ isset($whyChooseContent) && $whyChooseContent ? ($whyChooseContent->content_json['reasons'][$i-1]['description'] ?? '') : $defaultReasons[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Why Choose Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Industries Served Section -->
                    <div class="section-content" id="industries-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-industry"></i>
                                    Industries Served Section
                                </h2>
                            </div>
                        </div>

                        <form id="industriesForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="industries_title"
                                            placeholder="Industries Served">{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['title'] ?? '') : 'Industries Served' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="industries_description" rows="2"
                                            placeholder="Whatever you sell, Qubify POS is designed to handle it—with the speed and clarity today's retailers need.">{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['description'] ?? '') : 'Whatever you sell, Qubify POS is designed to handle it—with the speed and clarity today\'s retailers need.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultIndustries = [
                                    [
                                        'title' => 'Retail & General Stores',
                                        'description' => 'Complete solution for everyday retail operations'
                                    ],
                                    [
                                        'title' => 'Pharmacies & Chemists',
                                        'description' => 'Specialized features for pharmaceutical retail'
                                    ],
                                    [
                                        'title' => 'Cafés & Quick-Service',
                                        'description' => 'Fast-paced restaurant and café management'
                                    ],
                                    [
                                        'title' => 'Mobile & Electronics',
                                        'description' => 'Electronics retail with warranty tracking'
                                    ],
                                    [
                                        'title' => 'Fashion & Apparel',
                                        'description' => 'Size and variant management for fashion retail'
                                    ],
                                    [
                                        'title' => 'FMCG Wholesalers',
                                        'description' => 'Bulk operations and distributor management'
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card mt-3">
                                    <div class="card-title">
                                        <i class="fas fa-building"></i>
                                        Industry {{ $i }} - {{ $defaultIndustries[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="industry{{ $i }}_title"
                                                    placeholder="{{ $defaultIndustries[$i-1]['title'] }}"
                                                    value="{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['industries'][$i-1]['title'] ?? '') : $defaultIndustries[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="industry{{ $i }}_description" rows="2"
                                                    placeholder="{{ $defaultIndustries[$i-1]['description'] }}">{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['industries'][$i-1]['description'] ?? '') : $defaultIndustries[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Industries Section
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
                                        <textarea class="form-control editor" name="cta_title"
                                        placeholder="Simplify Your Store. Supercharge Your Sales.">{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['title'] ?? '') : 'Simplify Your Store. Supercharge Your Sales.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">CTA Description</label>
                                        <textarea class="form-control editor" name="cta_description" rows="3"
                                            placeholder="From fast checkouts to real-time analytics, Qubify POS gives your team the tools to serve better, sell smarter, and grow faster.">{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['description'] ?? '') : 'From fast checkouts to real-time analytics, Qubify POS gives your team the tools to serve better, sell smarter, and grow faster.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-check-circle"></i>
                                    Feature Pills
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 1</label>
                                            <input type="text" class="form-control" name="cta_feature1"
                                                placeholder="✅ No subscription fees"
                                                value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][0] ?? '') : '✅ No subscription fees' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 2</label>
                                            <input type="text" class="form-control" name="cta_feature2"
                                                placeholder="✅ Works across devices"
                                                value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][1] ?? '') : '✅ Works across devices' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Feature 3</label>
                                            <input type="text" class="form-control" name="cta_feature3"
                                                placeholder="✅ Secure, scalable, and retail-ready"
                                                value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['features'][2] ?? '') : '✅ Secure, scalable, and retail-ready' }}">
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
                                            <input type="text" class="form-control" name="cta_button1_text"
                                                placeholder="🚀 Get Started with Qubify POS"
                                                value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['buttons'][0]['text'] ?? '') : '🚀 Get Started with Qubify POS' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="cta_button2_text"
                                                placeholder="📞 Talk to Our Team"
                                                value="{{ isset($finalCtaContent) && $finalCtaContent ? ($finalCtaContent->content_json['buttons'][1]['text'] ?? '') : '📞 Talk to Our Team' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
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
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Form submissions for POS
    const forms = [
        'heroForm', 
        'introForm', 
        'coreFeaturesForm', 
        'advancedToolsForm', 
        'adminControlForm', 
        'whyChooseForm', 
        'industriesForm', 
        'finalCtaForm'
    ];

    const routes = {
        'heroForm': '{{ route("admin.pos-development.save-hero") }}',
        'introForm': '{{ route("admin.pos-development.save-intro") }}',
        'coreFeaturesForm': '{{ route("admin.pos-development.save-core-features") }}',
        'advancedToolsForm': '{{ route("admin.pos-development.save-advanced-tools") }}',
        'adminControlForm': '{{ route("admin.pos-development.save-admin-control") }}',
        'whyChooseForm': '{{ route("admin.pos-development.save-why-choose") }}',
        'industriesForm': '{{ route("admin.pos-development.save-industries") }}',
        'finalCtaForm': '{{ route("admin.pos-development.save-final-cta") }}'
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
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification(data.message, 'success');
                    } else if (data.errors) {
                        Object.values(data.errors).forEach(errArr => {
                            showNotification(errArr[0], 'error');
                        });
                    } else {
                        showNotification(data.message || 'An error occurred while saving the section.', 'error');
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

    // Notification function
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 5000);
    }


    // Section toggle functionality
    $('.section-toggle input[type="checkbox"]').on('change', function() {
        const sectionName = $(this).attr('id').replace('Switch', '').replace(/([A-Z])/g, '_$1').toLowerCase().replace(/^_/, '');
        const isActive = $(this).is(':checked');
        const label = $(this).next('label');
        
        $.ajax({
            url: '{{ route("admin.pos-development.toggle-section") }}',
            method: 'POST',
            data: {
                section_name: sectionName,
                is_active: isActive,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    label.text(isActive ? 'On' : 'Off');
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('An error occurred while updating section status.');
                // Revert the toggle
                $(this).prop('checked', !isActive);
            }
        });
    });
});
</script>

@endsection