@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $solutionsHeaderContent = $solutionsHeaderContent ?? null;
    $solutionsItemsContent = $solutionsItemsContent ?? null;
    $whyQubifyContent = $whyQubifyContent ?? null;
    $industriesContent = $industriesContent ?? null;
    $ctaContent = $ctaContent ?? null;
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
                    <li class="breadcrumb-item active" aria-current="page">Solutions Page</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">Solutions Page Sections</h5>
                    </div>
                    <div class="sections-nav">
                        <button class="section-nav-link active" data-section="hero">
                            <i class="fas fa-star"></i>
                            Hero Section
                        </button>
                        <button class="section-nav-link" data-section="solutions-header">
                            <i class="fas fa-heading"></i>
                            Solutions Header
                        </button>
                        <button class="section-nav-link" data-section="solutions-items">
                            <i class="fas fa-th-list"></i>
                            Solutions Items
                        </button>
                        <button class="section-nav-link" data-section="why-qubify">
                            <i class="fas fa-question-circle"></i>
                            Why Qubify
                        </button>
                        <button class="section-nav-link" data-section="industries">
                            <i class="fas fa-industry"></i>
                            Industries
                        </button>
                        <button class="section-nav-link" data-section="cta">
                            <i class="fas fa-bullhorn"></i>
                            CTA Section
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
                                        <textarea class="form-control editor" name="hero_title" rows="3" placeholder="Smart Software Solutions Built for Modern Business Challenges">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Smart Software Solutions Built for Modern Business Challenges' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control editor" name="hero_subtitle" rows="4" placeholder="Qubify delivers AI-powered, scalable platforms that simplify operations...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : "Qubify delivers AI-powered, scalable platforms that simplify operations, boost efficiency, and support digital transformation—across HR, healthcare, logistics, and more." }}</textarea>
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
                                            <input type="text" class="form-control" name="button1_text" placeholder="Request a Demo" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][0]['text'] ?? '') : 'Request a Demo' }}">
                                        </div>
                                    </div>
                      
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button 2 Text</label>
                                            <input type="text" class="form-control" name="button2_text" placeholder="Contact Sales" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['buttons'][1]['text'] ?? '') : 'Contact Sales' }}">
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

                    <!-- Solutions Header Section -->
                    <div class="section-content" id="solutions-header-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-heading"></i>
                                    Solutions Header Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="solutionsHeaderForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="solutions_title" rows="2" placeholder="Our Solutions">{{ isset($solutionsHeaderContent) && $solutionsHeaderContent ? ($solutionsHeaderContent->content_json['title'] ?? '') : 'Our Solutions' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Subtitle</label>
                                        <textarea class="form-control editor" name="solutions_subtitle" rows="3" placeholder="Comprehensive software solutions designed to transform your business operations...">{{ isset($solutionsHeaderContent) && $solutionsHeaderContent ? ($solutionsHeaderContent->content_json['subtitle'] ?? '') : 'Comprehensive software solutions designed to transform your business operations and drive growth across all industries.' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Solutions Header Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Solutions Items Section -->
                  <div class="section-content" id="solutions-items-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-th-list"></i>
                                    Solutions Items Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="solutionsItemsForm" enctype="multipart/form-data">
                            @csrf

                            @php
                                $defaultSolutions = [
                                    [
                                        'category' => 'HR Management',
                                        'title' => 'Human Resource Management System (HRMS)',
                                        'description' => 'Managing a workforce can be complex—but it doesn\'t have to be. Our HRMS platform automates core functions like payroll, leave tracking, recruitment, and performance management.',
                                        'use_case' => 'Mid-sized and large teams looking to eliminate spreadsheets and manual HR processes.',
                                        'button_text' => 'Learn More',
                                        'button_url' => route('frontend.solutions.hrms')
                                    ],
                                    [
                                        'category' => 'Customer Relations',
                                        'title' => 'Customer Relationship Management (CRM)',
                                        'description' => 'Qubify CRM brings your sales, marketing, and support teams into one seamless platform. From capturing leads to managing the sales pipeline, every interaction is tracked.',
                                        'use_case' => 'B2B or B2C teams with growing lead volumes and complex customer journeys.',
                                        'button_text' => 'Learn More',
                                        'button_url' => route('frontend.solutions.crm')
                                    ],
                                    [
                                        'category' => 'Healthcare',
                                        'title' => 'Hospital Information System (HIS)',
                                        'description' => 'Designed for hospitals, clinics, and diagnostic centers, our HIS solution brings together patient records, billing, pharmacy, and doctor scheduling.',
                                        'use_case' => 'Real-time dashboards and EMR access simplify coordination and improve response time.',
                                        'button_text' => 'Learn More',
                                        'button_url' => '#contact'
                                    ],
                                    [
                                        'category' => 'Access Control',
                                        'title' => 'Visitor Management System (VMS)',
                                        'description' => 'Our VMS replaces paper logs with digital kiosks, automated check-ins, photo capture, and real-time visitor monitoring.',
                                        'use_case' => 'Workplaces with regular foot traffic and a need for better access control.',
                                        'button_text' => 'Learn More',
                                        'button_url' => route('frontend.solutions.vms')
                                    ],
                                    [
                                        'category' => 'Security',
                                        'title' => 'Video Surveillance System (VSS)',
                                        'description' => 'Real-time video monitoring, smart alerts, motion detection, and cloud playback—our VSS system brings intelligent surveillance to any facility.',
                                        'use_case' => 'Businesses needing 24/7 visibility with motion alerts and multi-camera control.',
                                        'button_text' => 'Learn More',
                                        'button_url' => '#contact'
                                    ],
                                    [
                                        'category' => 'Fleet Management',
                                        'title' => 'Vehicle Tracking System (VTS)',
                                        'description' => 'Qubify\'s VTS gives you live location tracking, route history, and driver behavior insights—all in one dashboard.',
                                        'use_case' => 'Transport, logistics, delivery networks, and cab aggregators.',
                                        'button_text' => 'Learn More',
                                        'button_url' => '#contact'
                                    ],
                                    [
                                        'category' => 'Smart Parking',
                                        'title' => 'Vehicle Parking System (VPS)',
                                        'description' => 'Qubify\'s VPS shows real-time slot availability, enables automatic entry/exit using license plate recognition.',
                                        'use_case' => 'Hospitals, malls, smart campuses, and gated societies.',
                                        'button_text' => 'Learn More',
                                        'button_url' => '#contact'
                                    ],
                                    [
                                        'category' => 'Retail Technology',
                                        'title' => 'Point of Sale System (POS)',
                                        'description' => 'Qubify POS supports barcode scanning, offline billing, multi-store sync, and customer loyalty tracking—all in a single platform.',
                                        'use_case' => 'Retailers and chains managing product catalogs, stock levels, and daily sales flow.',
                                        'button_text' => 'Learn More',
                                        'button_url' => '#contact'
                                    ]
                                ];
                            @endphp

                            @for($i = 1; $i <= 8; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-cog"></i>
                                        Solution {{ $i }} - {{ $defaultSolutions[$i-1]['title'] }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Category</label>
                                                <input type="text" class="form-control" name="solution{{ $i }}_category" placeholder="{{ $defaultSolutions[$i-1]['category'] }}" value="{{ isset($solutionsItemsContent) && $solutionsItemsContent ? ($solutionsItemsContent->content_json['solutions'][$i-1]['category'] ?? '') : $defaultSolutions[$i-1]['category'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="solution{{ $i }}_title" placeholder="{{ $defaultSolutions[$i-1]['title'] }}" value="{{ isset($solutionsItemsContent) && $solutionsItemsContent ? ($solutionsItemsContent->content_json['solutions'][$i-1]['title'] ?? '') : $defaultSolutions[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="solution{{ $i }}_description" rows="3" placeholder="{{ $defaultSolutions[$i-1]['description'] }}">{{ isset($solutionsItemsContent) && $solutionsItemsContent ? ($solutionsItemsContent->content_json['solutions'][$i-1]['description'] ?? '') : $defaultSolutions[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Use Case / Key Advantage</label>
                                                <textarea class="form-control" name="solution{{ $i }}_use_case" rows="2" placeholder="{{ $defaultSolutions[$i-1]['use_case'] }}">{{ isset($solutionsItemsContent) && $solutionsItemsContent ? ($solutionsItemsContent->content_json['solutions'][$i-1]['use_case'] ?? '') : $defaultSolutions[$i-1]['use_case'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Button Text</label>
                                                <input type="text" class="form-control" name="solution{{ $i }}_button_text" placeholder="{{ $defaultSolutions[$i-1]['button_text'] }}" value="{{ isset($solutionsItemsContent) && $solutionsItemsContent ? ($solutionsItemsContent->content_json['solutions'][$i-1]['button_text'] ?? '') : $defaultSolutions[$i-1]['button_text'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Solution Image Alt</label>
                                                <input type="text" class="form-control" name="solution{{ $i }}_image_alt" placeholder="" value="{{ isset($solutionsItemsContent) && $solutionsItemsContent ? ($solutionsItemsContent->content_json['solutions'][$i-1]['image_alt'] ?? '') : '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Solution Image</label>
                                                <input type="file" class="form-control" name="solution{{ $i }}_image" accept="image/*">
                                                @if(isset($solutionsItemsContent) && $solutionsItemsContent && isset($solutionsItemsContent->content_json['solutions'][$i-1]['image']))
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $solutionsItemsContent->content_json['solutions'][$i-1]['image']) }}" alt="Current Image" style="max-width: 100px; max-height: 80px; object-fit: cover;">
                                                        <small class="text-muted d-block">Current image</small>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Solutions Items Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Why Qubify Section -->
                    <div class="section-content" id="why-qubify-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-question-circle"></i>
                                    Why Qubify Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="whyQubifyForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="why_title" placeholder="Why Qubify?">{{ isset($whyQubifyContent) && $whyQubifyContent ? ($whyQubifyContent->content_json['title'] ?? '') : 'Why Qubify?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">First Paragraph</label>
                                        <textarea class="form-control editor" name="why_paragraph1" rows="4" placeholder="What sets Qubify apart is more than just our technology...">{{ isset($whyQubifyContent) && $whyQubifyContent ? ($whyQubifyContent->content_json['paragraph1'] ?? '') : 'What sets Qubify apart is more than just our technology—it\'s our thinking. Every system we build is tailored, scalable, and infused with AI. We\'re not here to just "digitize" your business. We\'re here to improve how it works, end to end.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Second Paragraph</label>
                                        <textarea class="form-control editor" name="why_paragraph2" rows="3" placeholder="Our team blends technical expertise with industry insight...">{{ isset($whyQubifyContent) && $whyQubifyContent ? ($whyQubifyContent->content_json['paragraph2'] ?? '') : 'Our team blends technical expertise with industry insight to build software that delivers real ROI—secure, future-ready, and always aligned with your growth.' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Why Qubify Section
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
                                    Industries Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="industriesForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <textarea class="form-control editor" name="industries_title" placeholder="Industries We Serve">{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['title'] ?? '') : 'Industries We Serve' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Description</label>
                                        <textarea class="form-control editor" name="industries_description" rows="3" placeholder="We work across multiple verticals—each with its own unique demands...">{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['description'] ?? '') : 'We work across multiple verticals—each with its own unique demands. Our software powers success in:' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultIndustries = [
                                    'Human Resource Management',
                                    'Healthcare & Diagnostics', 
                                    'Retail & Restaurant Chains',
                                    'Logistics & Transportation',
                                    'Facility & Visitor Management',
                                    'Smart Parking & Urban Infrastructure'
                                ];
                            @endphp

                            @for($i = 1; $i <= 6; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-industry"></i>
                                        Industry {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Industry Name</label>
                                                <input type="text" class="form-control" name="industry{{ $i }}_name" placeholder="{{ $defaultIndustries[$i-1] }}" value="{{ isset($industriesContent) && $industriesContent ? ($industriesContent->content_json['industries'][$i-1]['name'] ?? '') : $defaultIndustries[$i-1] }}">
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

                    <!-- CTA Section -->
                    <div class="section-content" id="cta-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-bullhorn"></i>
                                    CTA Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="ctaForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">CTA Title</label>
                                        <textarea class="form-control editor" name="cta_title" rows="2" placeholder="Ready to Get Started?">{{ isset($ctaContent) && $ctaContent ? ($ctaContent->content_json['title'] ?? '') : 'Ready to Get Started?' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">CTA Description</label>
                                        <textarea class="form-control editor" name="cta_description" rows="4" placeholder="Let's build something purpose-driven—together...">{{ isset($ctaContent) && $ctaContent ? ($ctaContent->content_json['description'] ?? '') : 'Let\'s build something purpose-driven—together. Whether you\'re optimizing internal processes or launching a customer-facing platform, Qubify has the expertise and execution power to get it done right.' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-phone"></i>
                                    Contact Information
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="contact_email" placeholder="sales@qubifytech.com" value="{{ isset($ctaContent) && $ctaContent ? ($ctaContent->content_json['contact_email'] ?? '') : 'sales@qubifytech.com' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="contact_phone" placeholder="+91 99154 37999" value="{{ isset($ctaContent) && $ctaContent ? ($ctaContent->content_json['contact_phone'] ?? '') : '+91 99154 37999' }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Website</label>
                                            <input type="text" class="form-control" name="contact_website" placeholder="www.qubifytech.com" value="{{ isset($ctaContent) && $ctaContent ? ($ctaContent->content_json['contact_website'] ?? '') : 'www.qubifytech.com' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-mouse-pointer"></i>
                                    CTA Button
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Button Text</label>
                                            <input type="text" class="form-control" name="cta_button_text" placeholder="Contact Sales" value="{{ isset($ctaContent) && $ctaContent ? ($ctaContent->content_json['button_text'] ?? '') : 'Contact Sales' }}">
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save CTA Section
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
    const forms = ['heroForm', 'solutionsHeaderForm', 'solutionsItemsForm', 'whyQubifyForm', 'industriesForm', 'ctaForm'];
    const routes = {
        'heroForm': '{{ route("admin.solutions.save-hero") }}',
        'solutionsHeaderForm': '{{ route("admin.solutions.save-solutions-header") }}',
        'solutionsItemsForm': '{{ route("admin.solutions.save-solutions-items") }}',
        'whyQubifyForm': '{{ route("admin.solutions.save-why-qubify") }}',
        'industriesForm': '{{ route("admin.solutions.save-industries") }}',
        'ctaForm': '{{ route("admin.solutions.save-cta") }}'
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
            
            fetch('{{ route("admin.solutions.toggle-section") }}', {
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