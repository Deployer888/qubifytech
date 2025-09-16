@extends('frontend.layouts.app')

@section('title')
HIS - Hospital Information System - {{app_name()}}
@endsection

@section('content')

@php
    $hero = $sections['heroContent']->content_json ?? null;
    $intro = $sections['introContent']->content_json ?? null;
    $why_choose = $sections['whyChooseContent']->content_json ?? null;
    $core_features = $sections['coreFeaturesContent']->content_json ?? null;
    $why_trust = $sections['whyTrustContent']->content_json ?? null;
    $use_cases = $sections['useCasesContent']->content_json ?? null;
    $testimonials = $sections['testimonialContent']->content_json ?? null;
    $final_cta = $sections['finalCtaContent']->content_json ?? null;
@endphp

<!-- Hero Section -->

<section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: var(--bg-hero);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="floating-shape absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl floating"></div>
        <div class="floating-shape absolute top-40 right-20 w-32 h-32 bg-blue-400/20 rounded-full blur-2xl floating" style="animation-delay: 1s;"></div>
        <div class="floating-shape absolute bottom-32 left-1/4 w-24 h-24 bg-orange-400/20 rounded-full blur-xl floating" style="animation-delay: 2s;"></div>
        <div class="floating-shape absolute top-1/3 right-1/3 w-16 h-16 bg-white/10 rounded-full blur-lg floating" style="animation-delay: 0.5s;"></div>
    </div>
    
    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 opacity-10">
        <div class="h-full w-full" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 50px 50px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Main Headline -->
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                {!! $hero['title'] ?? 'Revolutionize Hospital Management with <span class="holographic">HIS</span>' !!}
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                {!! $hero['subtitle'] ?? 'A complete, cloud-based Hospital Information System that brings your departments, staff, and patients into one connected platform—boosting operational control, clinical accuracy, and the patient experience.' !!}
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @if(isset($hero['features']) && is_array($hero['features']))
                    @foreach($hero['features'] as $feature)
                        <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                            {{ $feature }}
                        </span>
                    @endforeach
                @else
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        🛡 Trusted by modern hospitals and specialty clinics worldwide.
                    </span>
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        ☁️ 100% cloud infrastructure.
                    </span>
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        ⚡ Accessible anywhere, anytime
                    </span>
                @endif
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    {{ $hero['buttons'][0]['text'] ?? '🔵 Start a Free Demo' }}
                </button>
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    {{ $hero['buttons'][1]['text'] ?? '⚪ Schedule a Call with an Expert' }}
                </a>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white/70 rounded-full mt-2"></div>
        </div>
    </div>
</section>

<!-- What is HIS Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6">
                {!! $intro['title'] ?? 'What is <span class="text-blue-600">HIS</span>?' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {!! $intro['description'] ?? 'Managing a healthcare facility is a constant balancing act—staff schedules, patient records, billing, diagnostics, and compliance. HIS brings it all together in one intuitive system built specifically for hospitals of every size.' !!}
            </p>
        </div>
        
        <!-- Core Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if(isset($intro['features']) && is_array($intro['features']))
                @foreach($intro['features'] as $key => $feature)
                    <div class="text-center">
                        <div class="w-16 h-16 bg-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : ($key == 2 ? 'purple' : 'orange')) }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-{{ $key == 0 ? 'hospital' : ($key == 1 ? 'user-injured' : ($key == 2 ? 'credit-card' : 'chart-line')) }} text-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : ($key == 2 ? 'purple' : 'orange')) }}-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-gray-600 text-sm">{{ $feature['description'] ?? '' }}</p>
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hospital text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Hospital Administration</h3>
                    <p class="text-gray-600 text-sm">Complete administrative control and oversight</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-injured text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Patient Management</h3>
                    <p class="text-gray-600 text-sm">Streamlined appointment booking and patient care</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-credit-card text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Financial Control</h3>
                    <p class="text-gray-600 text-sm">Automated billing and comprehensive financial tracking</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Analytics & Reports</h3>
                    <p class="text-gray-600 text-sm">Data-driven insights for better decision making</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Why Choose HIS Section -->
<section class="py-24 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-40 h-40 bg-blue-500 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-32 h-32 bg-purple-500 rounded-full blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-indigo-500 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $why_choose['title'] ?? 'Why Choose <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent">HIS?</span>' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $why_choose['subtitle'] ?? 'Built for Real Hospitals, Not Just Software Demos' }}
            </p>
        </div>

        <!-- Main Description -->
        <div class="max-w-4xl mx-auto text-center mb-16">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50">
                <p class="text-lg text-gray-700 leading-relaxed">
                    {{ $why_choose['main_description'] ?? 'Unlike outdated or fragmented systems, HIS is purpose-built for the complexity of modern healthcare. Every module works seamlessly with the next, giving you a 360-degree view of your operations and patient care.' }}
                </p>
            </div>
        </div>

        <!-- Key Features Grid -->
        <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
            @if(isset($why_choose['benefits']) && is_array($why_choose['benefits']))
                @foreach($why_choose['benefits'] as $key => $benefit)
                    @if($key < 2)
                        <!-- First two benefits in regular grid -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                            <div class="flex items-start space-x-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-{{ $key == 0 ? 'blue' : 'green' }}-500 to-{{ $key == 0 ? 'blue' : 'green' }}-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        @if($key == 0)
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        @endif
                                    </svg>
                                </div>
                                <div>
                                    <div class="flex items-center mb-3">
                                        <span class="text-2xl mr-2">{{ $key == 0 ? '🌐' : '🔄' }}</span>
                                        <h3 class="text-2xl font-bold text-gray-900">{{ $benefit['title'] ?? '' }}</h3>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">
                                        {{ $benefit['description'] ?? '' }}
                                    </p>
                                    @if(isset($benefit['features']) && is_array($benefit['features']))
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            @foreach($benefit['features'] as $feature)
                                                <span class="px-3 py-1 bg-{{ $key == 0 ? 'blue' : 'green' }}-50 text-{{ $key == 0 ? 'blue' : 'green' }}-700 rounded-full text-sm font-medium">{{ $feature }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($key == 2)
                        <!-- Third benefit spans full width -->
                        <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 md:col-span-2">
                            <div class="flex items-start space-x-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center mb-3">
                                        <span class="text-2xl mr-2">🔒</span>
                                        <h3 class="text-2xl font-bold text-gray-900">{{ $benefit['title'] ?? '' }}</h3>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed mb-4">
                                        {{ $benefit['description'] ?? '' }}
                                    </p>
                                    @if(isset($benefit['security_features']) && is_array($benefit['security_features']))
                                        <div class="grid md:grid-cols-2 gap-4">
                                            <div class="space-y-3">
                                                @foreach(array_slice($benefit['security_features'], 0, 2) as $feature)
                                                    <div class="flex items-center space-x-3">
                                                        <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center">
                                                            <svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                        </div>
                                                        <span class="text-gray-700 font-medium">{{ $feature }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="space-y-3">
                                                @foreach(array_slice($benefit['security_features'], 2, 2) as $feature)
                                                    <div class="flex items-center space-x-3">
                                                        <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center">
                                                            <svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                        </div>
                                                        <span class="text-gray-700 font-medium">{{ $feature }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($benefit['compliance_features']) && is_array($benefit['compliance_features']))
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            @foreach($benefit['compliance_features'] as $feature)
                                                <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm font-medium">{{ $feature }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <!-- Fallback to static content if no dynamic data -->
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center mb-3">
                                <span class="text-2xl mr-2">🌐</span>
                                <h3 class="text-2xl font-bold text-gray-900">Cloud-Connected & Always On</h3>
                            </div>
                            <p class="text-gray-600 leading-relaxed">
                                Access hospital data securely from anywhere—perfect for remote consultations and multi-location facilities.
                            </p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">Remote Access</span>
                                <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">Multi-Location</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center mb-3">
                                <span class="text-2xl mr-2">🔄</span>
                                <h3 class="text-2xl font-bold text-gray-900">Fully Integrated Workflow</h3>
                            </div>
                            <p class="text-gray-600 leading-relaxed">
                                Clinical, administrative, financial, and diagnostic data are all connected, so nothing falls through the cracks.
                            </p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm font-medium">Clinical Data</span>
                                <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm font-medium">Administrative</span>
                                <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm font-medium">Financial</span>
                                <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm font-medium">Diagnostics</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 md:col-span-2">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center mb-3">
                                <span class="text-2xl mr-2">🔒</span>
                                <h3 class="text-2xl font-bold text-gray-900">Security First, Always Compliant</h3>
                            </div>
                            <p class="text-gray-600 leading-relaxed mb-4">
                                Built with healthcare-grade encryption, user access controls, and audit trails that meet HIPAA, GDPR, and national standards.
                            </p>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="space-y-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center">
                                            <svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium">Healthcare-Grade Encryption</span>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center">
                                            <svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium">User Access Controls</span>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center">
                                            <svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium">Complete Audit Trails</span>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center">
                                            <svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <span class="text-gray-700 font-medium">HIPAA, GDPR Compliant</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm font-medium">HIPAA</span>
                                <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm font-medium">GDPR</span>
                                <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm font-medium">National Standards</span>
                                <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm font-medium">Audit Ready</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
</section>

<!-- Core Capabilities Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $core_features['title'] ?? 'Core <span class="text-blue-600">Capabilities</span>' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {{ $core_features['description'] ?? 'Everything your hospital needs in one powerful platform' }}
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            @if(isset($core_features['capabilities']) && is_array($core_features['capabilities']))
                @foreach(array_slice($core_features['capabilities'], 0, 3) as $key => $capability)
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        @if($key % 2 == 0)
                            <!-- Left content, right dashboard -->
                            <div class="{{ $key == 1 ? 'order-2 lg:order-1' : '' }}">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-{{ $key == 0 ? 'hospital' : ($key == 1 ? 'user-injured' : 'credit-card') }} text-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-600"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900">{{ $capability['title'] ?? '' }}</h3>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $capability['subtitle'] ?? '' }}</h4>
                                <p class="text-gray-600 mb-4">
                                    {{ $capability['description'] ?? '' }}
                                </p>
                                @if(isset($capability['features']) && is_array($capability['features']))
                                    <ul class="space-y-2">
                                        @foreach($capability['features'] as $feature)
                                            @if($feature)
                                                <li class="flex items-center text-gray-700">
                                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                                    {{ $feature }}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            
                            @if(isset($capability['dashboard']))
                                <div class="{{ $key == 1 ? 'order-1 lg:order-2' : '' }} bg-white rounded-xl p-6 shadow-lg">
                                    <div class="bg-gradient-to-br from-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-500 to-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-600 text-white rounded-lg p-6">
                                        <h4 class="text-lg font-semibold mb-4">{{ $capability['dashboard']['title'] ?? '' }}</h4>
                                        <div class="space-y-3">
                                            @if(isset($capability['dashboard']['stats']) && is_array($capability['dashboard']['stats']))
                                                @foreach($capability['dashboard']['stats'] as $stat)
                                                    <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                                        <span>{{ $stat['label'] ?? '' }}</span>
                                                        <span class="font-bold">{{ $stat['value'] ?? '' }}</span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <!-- Patient Management - reversed layout -->
                            @if(isset($capability['dashboard']))
                                <div class="order-2 lg:order-1 bg-white rounded-xl p-6 shadow-lg">
                                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6">
                                        <h4 class="text-lg font-semibold mb-4">{{ $capability['dashboard']['title'] ?? '' }}</h4>
                                        <div class="space-y-3">
                                            @if(isset($capability['dashboard']['stats']) && is_array($capability['dashboard']['stats']))
                                                @foreach($capability['dashboard']['stats'] as $stat)
                                                    <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                                        <span>{{ $stat['label'] ?? '' }}</span>
                                                        <span class="font-bold">{{ $stat['value'] ?? '' }}</span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="order-1 lg:order-2">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-user-injured text-green-600"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900">{{ $capability['title'] ?? '' }}</h3>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $capability['subtitle'] ?? '' }}</h4>
                                <p class="text-gray-600 mb-4">
                                    {{ $capability['description'] ?? '' }}
                                </p>
                                @if(isset($capability['features']) && is_array($capability['features']))
                                    <ul class="space-y-2">
                                        @foreach($capability['features'] as $feature)
                                            @if($feature)
                                                <li class="flex items-center text-gray-700">
                                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                                    {{ $feature }}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Additional Features Grid -->
        <div class="mt-20">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-user-md text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$core_features['capabilities'][3]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{$core_features['capabilities'][3]['subtitle'] ?? ''}}</p>
                    <p class="text-gray-500 text-sm">{{$core_features['capabilities'][3]['description'] ?? ''}}</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-file-medical text-teal-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$core_features['capabilities'][4]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{$core_features['capabilities'][4]['subtitle'] ?? ''}}</p>
                    <p class="text-gray-500 text-sm">{{$core_features['capabilities'][4]['description'] ?? ''}}</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-bed text-orange-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$core_features['capabilities'][5]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{$core_features['capabilities'][5]['subtitle'] ?? ''}}</p>
                    <p class="text-gray-500 text-sm">{{$core_features['capabilities'][5]['description'] ?? ''}}</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-microscope text-pink-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$core_features['capabilities'][6]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{$core_features['capabilities'][6]['subtitle'] ?? ''}}</p>
                    <p class="text-gray-500 text-sm">{{$core_features['capabilities'][6]['description'] ?? ''}}</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-video text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$core_features['capabilities'][7]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{$core_features['capabilities'][7]['subtitle'] ?? ''}}</p>
                    <p class="text-gray-500 text-sm">{{$core_features['capabilities'][7]['description'] ?? ''}}</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-tint text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$core_features['capabilities'][8]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{$core_features['capabilities'][8]['subtitle'] ?? ''}}</p>
                    <p class="text-gray-500 text-sm">{{$core_features['capabilities'][8]['description'] ?? ''}}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                       <i class="fa-solid fa-phone text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$core_features['capabilities'][9]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{$core_features['capabilities'][9]['subtitle'] ?? ''}}</p>
                    <p class="text-gray-500 text-sm">{{$core_features['capabilities'][9]['description'] ?? ''}}</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                       <i class="fa-solid fa-lock text-pink-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$core_features['capabilities'][10]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{$core_features['capabilities'][10]['subtitle'] ?? ''}}</p>
                    <p class="text-gray-500 text-sm">{{$core_features['capabilities'][10]['description'] ?? ''}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Teams Trust HIS Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $why_trust['title'] ?? 'Why Healthcare Leaders Choose <span class="text-blue-600">HIS</span>' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if(isset($why_trust['trust_factors']) && is_array($why_trust['trust_factors']))
                @foreach($why_trust['trust_factors'] as $key => $factor)
                    <div class="text-center">
                        <div class="w-16 h-16 bg-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : ($key == 2 ? 'purple' : 'orange')) }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-{{ $key == 0 ? 'clock' : ($key == 1 ? 'heart' : ($key == 2 ? 'expand-arrows-alt' : 'shield-alt')) }} text-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : ($key == 2 ? 'purple' : 'orange')) }}-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $factor['title'] ?? '' }}</h3>
                        <p class="text-gray-600 text-sm">{{ $factor['description'] ?? '' }}</p>
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Boost Efficiency</h3>
                    <p class="text-gray-600 text-sm">Automate manual work and connect teams for smoother operations and faster patient care.</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Better Care</h3>
                    <p class="text-gray-600 text-sm">Real-time data access means fewer treatment delays and improved clinical outcomes.</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-expand-arrows-alt text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Scalable</h3>
                    <p class="text-gray-600 text-sm">From 30-bed clinics to 1,000-bed hospitals, HIS adapts to your size and growth.</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Secure & Compliant</h3>
                    <p class="text-gray-600 text-sm">Built to meet the toughest privacy and regulatory standards for healthcare.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Perfect for Teams Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $use_cases['title'] ?? 'HIS is Perfect for Healthcare Facilities That Want <span class="text-blue-400">Speed, Clarity, and Control</span>' !!}
            </h2>
            <p class="text-lg text-gray-300">
                {{ $use_cases['description'] ?? 'Built for all types of healthcare organizations that need everything in one place.' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
            @if(isset($use_cases['use_cases']) && is_array($use_cases['use_cases']))
                @foreach($use_cases['use_cases'] as $key => $case)
                    <div class="text-center">
                        <div class="w-16 h-16 bg-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : ($key == 2 ? 'purple' : ($key == 3 ? 'red' : 'orange'))) }}-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-{{ $key == 0 ? 'hospital-alt' : ($key == 1 ? 'user-md' : ($key == 2 ? 'brain' : ($key == 3 ? 'ambulance' : 'microscope'))) }} text-white text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ $case['title'] ?? '' }}</h3>
                        <p class="text-gray-400 text-sm">{{ $case['description'] ?? '' }}</p>
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hospital-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Hospitals</h3>
                    <p class="text-gray-400 text-sm">General and specialty hospitals of all sizes</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-md text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Clinics</h3>
                    <p class="text-gray-400 text-sm">Multi-specialty and single-specialty clinics</p>
                </div>
            @endif
        </div>
        
        <div class="text-center mt-12">
            <p class="text-lg text-gray-300">
                {{ $use_cases['footer_text'] ?? 'Each team gets exactly what they need—without the extra tools or learning curves.' }}
            </p>
        </div>
    </div>
</section>

<!-- Real Results Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $testimonials['title'] ?? 'Real <span class="text-blue-600">Results</span>' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @if(isset($testimonials['testimonials']) && is_array($testimonials['testimonials']))
                @foreach($testimonials['testimonials'] as $key => $testimonial)
                    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-user text-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">{{ $testimonial['name'] ?? '' }}</h4>
                                <p class="text-gray-600 text-sm">{{ $testimonial['role'] ?? '' }}, {{ $testimonial['company'] ?? '' }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">
                            {{ $testimonial['review'] ?? '' }}
                        </p>
                        <div class="flex text-yellow-400">
                            @for($i = 0; $i < (int)($testimonial['rating'] ?? 5); $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                    </div>
                @endforeach
            @else
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Naveen S.</h4>
                            <p class="text-gray-600 text-sm">Head of Security, Government Facility</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        "The integration with Aadhaar and facial recognition was a game changer for us. We're now processing visitors 60% faster with far more control."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-green-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Shalini M.</h4>
                            <p class="text-gray-600 text-sm">Admin Manager, Multinational Bank</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        "We used to have visitors waiting in line every morning. With VMS, they're already verified and walking in within seconds."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-purple-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Vikram J.</h4>
                            <p class="text-gray-600 text-sm">Compliance Lead, Healthcare Provider</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        "What impressed us most was the audit-ready reporting. We now have logs for every visitor, accessible instantly."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="py-20 bg-gray-900 text-white relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-4xl font-bold mb-6">
                {!! $final_cta['title'] ?? 'Streamline Your Workflow.<br><span class="text-blue-400">Simplify</span> Your Stack.' !!}
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                {{ $final_cta['description'] ?? 'From the first lead to the final invoice, HIS keeps your team in sync and your hospital on track.' }}
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @if(isset($final_cta['features']) && is_array($final_cta['features']))
                    @foreach($final_cta['features'] as $feature)
                        <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                            {{ $feature }}
                        </span>
                    @endforeach
                @else
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        ✅ No hardware dependencies
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        ✅ API integrations available
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        ✅ 24/7 support team
                    </span>
                @endif
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-8">
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    {{ $final_cta['buttons'][0]['text'] ?? '🚀 Try HIS Today' }}
                </a>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    {{ $final_cta['buttons'][1]['text'] ?? '📞 Request a Call' }}
                </a>
            </div>
            
            <!-- Additional CTAs -->
            {{-- <div class="grid md:grid-cols-2 gap-4 max-w-2xl mx-auto">
                <button class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-300">
                    📋 Schedule a Consultation
                </button>
                <button class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-all duration-300">
                    📊 See Real-time Reports
                </button>
            </div> --}}
        </div>
    </div>
</section>

<!-- Back to Top Button -->
<button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-xl transition-all duration-300 opacity-0 invisible hover:scale-110 z-50">
    <i class="fas fa-arrow-up"></i>
</button>

<!-- Enhanced CSS and JavaScript -->
<style>
/* Modern animations and effects */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out forwards;
}

/* Hover effects */
.hover-lift {
    transition: transform 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
}

/* Loading states */
.loading-placeholder {
    opacity: 0;
    transform: translateY(20px);
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom gradient text */
.text-gradient {
    background: linear-gradient(135deg, #3B82F6, #8B5CF6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Button hover effects */
.btn-primary {
    background: linear-gradient(135deg, #F97316, #EA580C);
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(249, 115, 22, 0.4);
}

/* Card hover effects */
.card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

/* Dashboard preview animations */
.dashboard-value {
    transition: all 0.3s ease;
}

/* Responsive improvements */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
        line-height: 1.2;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
}

/* Accessibility improvements */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced intersection observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe sections for animation
    document.querySelectorAll('section').forEach(section => {
        section.classList.add('loading-placeholder');
        observer.observe(section);
    });
    
    // Back to top button functionality
    const backToTopBtn = document.getElementById('backToTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.remove('opacity-0', 'invisible');
            backToTopBtn.classList.add('opacity-100', 'visible');
        } else {
            backToTopBtn.classList.add('opacity-0', 'invisible');
            backToTopBtn.classList.remove('opacity-100', 'visible');
        }
    });
    
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Dashboard value animation on hover
    const dashboardCards = document.querySelectorAll('.bg-gradient-to-br');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const values = card.querySelectorAll('.font-bold');
            values.forEach(value => {
                if (value.textContent.includes('₹')) {
                    // Animate currency values
                    const currentValue = parseInt(value.textContent.replace(/[₹,]/g, ''));
                    const newValue = currentValue + Math.floor(Math.random() * 10000);
                    animateValue(value, currentValue, newValue, 1000, '₹');
                } else if (value.textContent.includes('%')) {
                    // Animate percentage values
                    const currentValue = parseInt(value.textContent.replace('%', ''));
                    const newValue = Math.min(currentValue + Math.floor(Math.random() * 5), 100);
                    animateValue(value, currentValue, newValue, 1000, '%');
                } else if (!isNaN(parseInt(value.textContent))) {
                    // Animate numeric values
                    const currentValue = parseInt(value.textContent);
                    const newValue = currentValue + Math.floor(Math.random() * 10);
                    animateValue(value, currentValue, newValue, 1000);
                }
            });
        });
    });
    
    function animateValue(element, start, end, duration, suffix = '') {
        const startTime = performance.now();
        const animate = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const currentValue = Math.floor(start + (end - start) * progress);
            
            if (suffix === '₹') {
                element.textContent = '₹' + currentValue.toLocaleString();
            } else if (suffix === '%') {
                element.textContent = currentValue + '%';
            } else {
                element.textContent = currentValue;
            }
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        };
        requestAnimationFrame(animate);
    }
    
    // Button click effects
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Ripple effect
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
    
    // Performance monitoring
    if ('performance' in window) {
        window.addEventListener('load', () => {
            setTimeout(() => {
                const perfData = performance.getEntriesByType('navigation')[0];
                const loadTime = perfData.loadEventEnd - perfData.loadEventStart;
                
                if (loadTime > 3000) {
                    console.warn('⚠️ Page load time is above 3s:', loadTime + 'ms');
                } else {
                    console.log('✅ Good page load time:', loadTime + 'ms');
                }
            }, 0);
        });
    }
    
    // Add hover effects to cards
    const cards = document.querySelectorAll('.shadow-lg, .shadow-xl');
    cards.forEach(card => {
        card.classList.add('card-hover');
    });
    
    // Smooth reveal on scroll for better UX
    setTimeout(() => {
        document.documentElement.classList.add('loaded');
    }, 100);
});

// Additional CSS for ripple effect
const style = document.createElement('style');
style.textContent = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    button {
        position: relative;
        overflow: hidden;
    }
`;
document.head.appendChild(style);
</script>

@endsection