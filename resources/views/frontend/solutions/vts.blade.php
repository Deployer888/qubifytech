@extends('frontend.layouts.app')

@section('title')
VTS - Vehicle Tracking System - {{app_name()}}
@endsection

@section('content')

@php
    $hero = $sections['heroContent']->content_json ?? null;
    $intro = $sections['introContent']->content_json ?? null;
    $core_features = $sections['coreFeaturesContent']->content_json ?? null;
    $additional_features = $sections['additionalFeaturesContent']->content_json ?? null;
    $hardware_integration = $sections['hardwareIntegrationContent']->content_json ?? null;
    $use_cases = $sections['useCasesContent']->content_json ?? null;
    $benefits = $sections['benefitsContent']->content_json ?? null;
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
                {!! $hero['title'] ?? 'Track Every Vehicle.<span class="holographic">Optimize Every Route.</span>' !!}
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                {!! $hero['subtitle'] ?? 'Qubify VTS is a real-time vehicle tracking and fleet intelligence platform designed to help businesses monitor vehicle locations, reduce operational waste, and improve driver performance — all from a single dashboard.' !!}
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
                    🚚 Live GPS Tracking
                    </span>
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    📍 Route History & Alerts
                    </span>
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    📊 Driver Insights
                    </span>
                @endif
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                @if(isset($hero['buttons']) && is_array($hero['buttons']))
                    @foreach($hero['buttons'] as $button)
                    <a href="{{ route('frontend.index').'#contact' }}" class="px-10 py-4 {{ $button['classes'] === 'btn-primary' ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow' : 'bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300' }}">
                        {{ $button['text'] }}
                    </a>
                    @endforeach
                @else
                    <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                        🔵 Request a Live Demo
                    </a>
                    {{-- <!-- <a href="mailto:sales@qubifytech.com" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                        ⚪ Talk to Sales
                    </a> --> --}}
                    <button onclick="{{ $button['action'] ?? 'openContactModal()' }}" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                        ⚪ Talk to Sales
                    </button>
                @endif
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

<!-- What is Qubify VTS Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6">
                {!! $intro['title'] ?? 'What is <span class="text-blue-600">Qubify VTS</span>?' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {!! $intro['subtitle'] ?? 'Qubify VTS (Vehicle Tracking System) is an AI-enhanced, GPS-powered platform that gives you full visibility into your fleet\'s movements. It empowers transport managers, logistics teams, and fleet owners to optimize performance, improve fuel efficiency, and keep drivers safe and accountable.' !!}
            </p>
            <p class="text-lg text-gray-700 mt-4">
                {!! $intro['description'] ?? 'Whether you\'re managing five vehicles or five hundred, Qubify VTS adapts to your fleet\'s scale and complexity.' !!}
            </p>
        </div>
        
        <!-- Core Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if(isset($intro['features']) && is_array($intro['features']))
                @foreach($intro['features'] as $key => $feature)
                <div class="text-center">
                    <div class="w-16 h-16 {{ $key == 0 ? 'bg-blue-100' : ($key == 1 ? 'bg-green-100' : ($key == 2 ? 'bg-purple-100' : 'bg-orange-100')) }} rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($key == 0)
                            <i class="fas fa-map-marker-alt text-blue-600 text-2xl"></i>
                        @elseif($key == 1)
                            <i class="fas fa-route text-green-600 text-2xl"></i>
                        @elseif($key == 2)
                            <i class="fas fa-user-shield text-purple-600 text-2xl"></i>
                        @else
                            <i class="fas fa-chart-line text-orange-600 text-2xl"></i>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $feature['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $feature['description'] ?? '' }}</p>
                </div>
                @endforeach
            @else
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Real-Time Tracking</h3>
                    <p class="text-gray-600 text-sm">Live GPS location updates with movement trails</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-route text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Route Optimization</h3>
                    <p class="text-gray-600 text-sm">Smart routing with traffic data and geofencing</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-shield text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Driver Monitoring</h3>
                    <p class="text-gray-600 text-sm">Behavior analytics and performance insights</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Fleet Analytics</h3>
                    <p class="text-gray-600 text-sm">Comprehensive reports and data insights</p>
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
                {!! $core_features['subtitle'] ?? 'Everything you need to manage your fleet efficiently' !!}
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            @if(isset($core_features['capabilities']) && is_array($core_features['capabilities']))
                @foreach($core_features['capabilities'] as $key => $capability)
                <!-- Capability {{ $key + 1 }} -->
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    @if($key % 2 == 0)
                    <div>
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 {{ $key == 0 ? 'bg-blue-100' : ($key == 1 ? 'bg-green-100' : 'bg-purple-100') }} rounded-lg flex items-center justify-center mr-3">
                                @if($key == 0)
                                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                                @elseif($key == 1)
                                    <i class="fas fa-route text-green-600"></i>
                                @else
                                    <i class="fas fa-user-shield text-purple-600"></i>
                                @endif
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
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                {{ $feature }}
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <div class="bg-gradient-to-br {{ $key == 0 ? 'from-blue-500 to-blue-600' : ($key == 1 ? 'from-green-500 to-green-600' : 'from-purple-500 to-purple-600') }} text-white rounded-lg p-6">
                            <h4 class="text-lg font-semibold mb-4">{{ $key == 0 ? 'Live Tracking' : ($key == 1 ? 'Route Efficiency' : 'Driver Performance') }}</h4>
                            <div class="space-y-3">
                                @if(isset($capability['dashboard_stats']) && is_array($capability['dashboard_stats']))
                                    @foreach($capability['dashboard_stats'] as $stat)
                                    <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                        <span>{{ $stat['label'] ?? '' }}</span>
                                        <span class="font-bold {{ $key == 0 && $stat['label'] == 'Vehicle TR-001' ? 'text-green-300' : '' }}">{{ $stat['value'] ?? '' }}</span>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="order-2 lg:order-1 bg-white rounded-xl p-6 shadow-lg">
                        <div class="bg-gradient-to-br {{ $key == 0 ? 'from-blue-500 to-blue-600' : ($key == 1 ? 'from-green-500 to-green-600' : 'from-purple-500 to-purple-600') }} text-white rounded-lg p-6">
                            <h4 class="text-lg font-semibold mb-4">{{ $key == 0 ? 'Live Tracking' : ($key == 1 ? 'Route Efficiency' : 'Driver Performance') }}</h4>
                            <div class="space-y-3">
                                @if(isset($capability['dashboard_stats']) && is_array($capability['dashboard_stats']))
                                    @foreach($capability['dashboard_stats'] as $stat)
                                    <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                        <span>{{ $stat['label'] ?? '' }}</span>
                                        <span class="font-bold">{{ $stat['value'] ?? '' }}</span>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="order-1 lg:order-2">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 {{ $key == 0 ? 'bg-blue-100' : ($key == 1 ? 'bg-green-100' : 'bg-purple-100') }} rounded-lg flex items-center justify-center mr-3">
                                @if($key == 0)
                                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                                @elseif($key == 1)
                                    <i class="fas fa-route text-green-600"></i>
                                @else
                                    <i class="fas fa-user-shield text-purple-600"></i>
                                @endif
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
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                {{ $feature }}
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endif
                </div>
                @endforeach
            @else
            <!-- Fallback static content -->
            <!-- Real-Time Vehicle Location Tracking -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-map-marker-alt text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Real-Time Vehicle Location Tracking</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Know Exactly Where Every Vehicle Is</h4>
                    <p class="text-gray-600 mb-4">
                        Qubify VTS updates locations in real time, giving you a live map with movement trails, speed, and vehicle status. No blind spots, no guesswork.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Live GPS tracking with instant updates
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Movement trails and speed monitoring
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Vehicle status and health indicators
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Live Tracking</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Vehicle TR-001</span>
                                <span class="font-bold text-green-300">Moving</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Current Speed</span>
                                <span class="font-bold">65 km/h</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>ETA</span>
                                <span class="font-bold">45 mins</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        
        <!-- Additional Features Grid -->
        <div class="mt-20">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($additional_features['features']) && is_array($additional_features['features']))
                    @foreach($additional_features['features'] as $key => $feature)
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 {{ $key == 0 ? 'bg-indigo-100' : ($key == 1 ? 'bg-teal-100' : ($key == 2 ? 'bg-orange-100' : ($key == 3 ? 'bg-pink-100' : ($key == 4 ? 'bg-blue-100' : 'bg-red-100')))) }} rounded-lg flex items-center justify-center mb-4">
                            @if($key == 0)
                                <i class="fas fa-history text-indigo-600"></i>
                            @elseif($key == 1)
                                <i class="fas fa-bell text-teal-600"></i>
                            @elseif($key == 2)
                                <i class="fas fa-map-marked-alt text-orange-600"></i>
                            @elseif($key == 3)
                                <i class="fas fa-gas-pump text-pink-600"></i>
                            @elseif($key == 4)
                                <i class="fas fa-tachometer-alt text-blue-600"></i>
                            @else
                                <i class="fas fa-mobile-alt text-red-600"></i>
                            @endif
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $feature['subtitle'] ?? '' }}</p>
                        <p class="text-gray-500 text-sm">{{ $feature['description'] ?? '' }}</p>
                    </div>
                    @endforeach
                @else
                    <!-- Fallback static content -->
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-history text-indigo-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Trip History & Playback</h3>
                        <p class="text-gray-600 text-sm mb-3">Complete Audit Trail</p>
                        <p class="text-gray-500 text-sm">Every trip is automatically logged. View and replay full route history, stops, speeds, and time spent per location for compliance and billing.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-bell text-teal-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Smart Alerts & Notifications</h3>
                        <p class="text-gray-600 text-sm mb-3">Stay Informed, Not Overwhelmed</p>
                        <p class="text-gray-500 text-sm">Instant alerts for route deviations, excess idle time, geofence entry/exit, overspeeding, and extended stoppage—all configurable.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-map-marked-alt text-orange-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Geofencing & Zone Control</h3>
                        <p class="text-gray-600 text-sm mb-3">Virtual Boundaries, Real Control</p>
                        <p class="text-gray-500 text-sm">Define virtual boundaries and get notified when vehicles enter or exit designated zones like warehouses or restricted areas.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-gas-pump text-pink-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Fuel Usage & Maintenance</h3>
                        <p class="text-gray-600 text-sm mb-3">Optimize Costs, Extend Life</p>
                        <p class="text-gray-500 text-sm">Reduce fuel consumption with optimized routes and integrate fuel data with maintenance alerts based on distance or engine hours.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-tachometer-alt text-blue-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Admin Dashboard</h3>
                        <p class="text-gray-600 text-sm mb-3">Centralized Fleet Control</p>
                        <p class="text-gray-500 text-sm">All fleet data managed from one intuitive dashboard. Filter, analyze, and generate custom reports for real-time decision-making.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-mobile-alt text-red-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Mobile Access</h3>
                        <p class="text-gray-600 text-sm mb-3">Monitor Anywhere, Anytime</p>
                        <p class="text-gray-500 text-sm">Web, tablet, and mobile access giving you 24/7 visibility without being tied to a desk—perfect for remote monitoring.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Hardware Integration Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $hardware_integration['title'] ?? 'Hardware Integration & <span class="text-blue-600">Compatibility</span>' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {!! $hardware_integration['description'] ?? 'Qubify works with a wide range of GPS trackers and sensors—it\'s a plug-and-play solution' !!}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if(isset($hardware_integration['hardware_types']) && is_array($hardware_integration['hardware_types']))
                @foreach($hardware_integration['hardware_types'] as $key => $hardware)
                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 {{ $key == 0 ? 'bg-blue-100' : ($key == 1 ? 'bg-green-100' : ($key == 2 ? 'bg-purple-100' : 'bg-orange-100')) }} rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($key == 0)
                            <i class="fas fa-satellite text-blue-600 text-2xl"></i>
                        @elseif($key == 1)
                            <i class="fas fa-cog text-green-600 text-2xl"></i>
                        @elseif($key == 2)
                            <i class="fas fa-tint text-purple-600 text-2xl"></i>
                        @else
                            <i class="fas fa-shield-alt text-orange-600 text-2xl"></i>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $hardware['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $hardware['description'] ?? '' }}</p>
                </div>
                @endforeach        
            @endif
        </div>
    </div>
</section>

<!-- Use Cases Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $use_cases['title'] ?? 'Use Cases Across <span class="text-blue-400">Industries</span>' !!}
            </h2>
            <p class="text-lg text-gray-300">
                {!! $use_cases['description'] ?? 'Qubify VTS adapts to various industry needs, providing specialized tracking and management solutions for different business sectors.' !!}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @if(isset($use_cases['use_cases']) && is_array($use_cases['use_cases']))
                @foreach($use_cases['use_cases'] as $key => $case)
                <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 {{ $key == 0 ? 'bg-blue-600' : ($key == 1 ? 'bg-green-600' : ($key == 2 ? 'bg-purple-600' : ($key == 3 ? 'bg-orange-600' : ($key == 4 ? 'bg-red-600' : ($key == 5 ? 'bg-indigo-600' : ($key == 6 ? 'bg-yellow-600' : 'bg-teal-600')))))) }} rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($key == 0)
                            <i class="fas fa-truck text-white text-xl"></i>
                        @elseif($key == 1)
                            <i class="fas fa-hammer text-white text-xl"></i>
                        @elseif($key == 2)
                            <i class="fas fa-shopping-cart text-white text-xl"></i>
                        @elseif($key == 3)
                            <i class="fas fa-ambulance text-white text-xl"></i>
                        @elseif($key == 4)
                            <i class="fas fa-utensils text-white text-xl"></i>
                        @elseif($key == 5)
                            <i class="fas fa-school text-white text-xl"></i>
                        @elseif($key == 6)
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        @else
                            <i class="fas fa-recycle text-white text-xl"></i>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold mb-2">{{ $case['title'] ?? '' }}</h3>
                    <p class="text-gray-300 text-sm">{{ $case['description'] ?? '' }}</p>
                </div>
                @endforeach
           
            @endif
        </div>
    </div>
</section>

<!-- Benefits At a Glance Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $benefits['title'] ?? 'Benefits At a <span class="text-blue-600">Glance</span>' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if(isset($benefits['benefits']) && is_array($benefits['benefits']))
                @foreach($benefits['benefits'] as $key => $benefit)
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 {{ $key == 0 ? 'bg-blue-100' : ($key == 1 ? 'bg-green-100' : ($key == 2 ? 'bg-purple-100' : ($key == 3 ? 'bg-orange-100' : ($key == 4 ? 'bg-teal-100' : 'bg-red-100')))) }} rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($key == 0)
                            <i class="fas fa-dollar-sign text-blue-600 text-2xl"></i>
                        @elseif($key == 1)
                            <i class="fas fa-clock text-green-600 text-2xl"></i>
                        @elseif($key == 2)
                            <i class="fas fa-shield-alt text-purple-600 text-2xl"></i>
                        @elseif($key == 3)
                            <i class="fas fa-chart-line text-orange-600 text-2xl"></i>
                        @elseif($key == 4)
                            <i class="fas fa-smile text-teal-600 text-2xl"></i>
                        @else
                            <i class="fas fa-leaf text-red-600 text-2xl"></i>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $benefit['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $benefit['description'] ?? '' }}</p>
                </div>
                @endforeach

            @endif
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $testimonials['title'] ?? 'Why Companies Choose <span class="text-blue-600">Qubify VTS</span>' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @if(isset($testimonials['testimonials']) && is_array($testimonials['testimonials']))
                @foreach($testimonials['testimonials'] as $key => $testimonial)
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 {{ $key == 0 ? 'bg-blue-100' : ($key == 1 ? 'bg-green-100' : 'bg-purple-100') }} rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user {{ $key == 0 ? 'text-blue-600' : ($key == 1 ? 'text-green-600' : 'text-purple-600') }}"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">{{ $testimonial['name'] ?? '' }}</h4>
                            <p class="text-gray-600 text-sm">{{ $testimonial['position'] ?? '' }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4 italic">
                        "{{ $testimonial['text'] ?? '' }}"
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Fallback static content -->
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Amit S.</h4>
                            <p class="text-gray-600 text-sm">Logistics Manager</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4 italic">
                        "We've cut fuel waste by 20% and trip delays by 30%. The live map and historical tracking have been game changers."
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
                            <h4 class="font-semibold text-gray-900">Shreya T.</h4>
                            <p class="text-gray-600 text-sm">Operations Head, Retail Chain</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4 italic">
                        "Now we get real-time alerts when routes deviate or vehicles enter restricted areas. It's helped tighten security immensely."
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
                            <h4 class="font-semibold text-gray-900">Devraj N.</h4>
                            <p class="text-gray-600 text-sm">Fleet Compliance Officer</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4 italic">
                        "Driver behavior analytics gave us the insight we needed to improve training and reduce accidents."
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
                {!! $final_cta['title'] ?? 'Track Smarter, <span class="text-blue-400">Operate Better</span>' !!}
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                {!! $final_cta['description'] ?? 'Join thousands of businesses that trust Qubify VTS to optimize their fleet operations, reduce costs, and improve efficiency. Get started today and see the difference real-time tracking can make.' !!}
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
                        📍 Real-time GPS & Geofencing
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        🔐 Secure, cloud-based access
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        📈 Actionable analytics, export-ready reports
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        🛠 Simple setup, scalable architecture
                    </span>
                @endif
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                @if(isset($final_cta['buttons']) && is_array($final_cta['buttons']))
                    @foreach($final_cta['buttons'] as $button)
                    <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 {{ $button['classes'] === 'btn-primary' ? 'bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl' : 'bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300' }}">
                        {{ $button['text'] }}
                    </a>
                    @endforeach
                @else
                    <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                        🚀 Book a Demo Now
                    </a>
                    <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                        📞 Talk to an Expert
                    </a>
                @endif
            </div>
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
    
    // Fleet dashboard value animation on hover
    const dashboardCards = document.querySelectorAll('.bg-gradient-to-br');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const values = card.querySelectorAll('.font-bold');
            values.forEach(value => {
                if (value.textContent.includes('/')) {
                    // Handle fraction values like "47/52"
                    const parts = value.textContent.split('/');
                    if (parts.length === 2) {
                        const current = parseInt(parts[0]);
                        const total = parseInt(parts[1]);
                        const newCurrent = Math.min(current + Math.floor(Math.random() * 3), total);
                        value.textContent = newCurrent + '/' + total;
                    }
                } else if (value.textContent.includes('km/l')) {
                    // Handle efficiency values
                    const currentValue = parseFloat(value.textContent.replace(' km/l', ''));
                    const newValue = (currentValue + (Math.random() * 2 - 1)).toFixed(1);
                    value.textContent = newValue + ' km/l';
                } else if (value.textContent.includes('hrs')) {
                    // Handle time values
                    const currentValue = parseFloat(value.textContent.replace(' hrs', ''));
                    const newValue = Math.max(0, currentValue + (Math.random() * 1 - 0.5)).toFixed(1);
                    value.textContent = newValue + ' hrs';
                } else if (value.textContent.includes('km/h')) {
                    // Handle speed values
                    const currentValue = parseInt(value.textContent.replace(' km/h', ''));
                    const newValue = currentValue + Math.floor(Math.random() * 10 - 5);
                    value.textContent = Math.max(0, newValue) + ' km/h';
                } else if (value.textContent.includes('mins')) {
                    // Handle minute values
                    const currentValue = parseInt(value.textContent.replace(' mins', ''));
                    const newValue = Math.max(1, currentValue + Math.floor(Math.random() * 10 - 5));
                    value.textContent = newValue + ' mins';
                } else if (!isNaN(parseInt(value.textContent))) {
                    // Handle numeric values
                    const currentValue = parseInt(value.textContent);
                    const newValue = currentValue + Math.floor(Math.random() * 5);
                    value.textContent = newValue;
                }
            });
        });
    });
    
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