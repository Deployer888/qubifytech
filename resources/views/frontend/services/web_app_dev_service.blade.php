@extends('frontend.layouts.app')

@section('title')
Web Application Development Services - {{app_name()}}
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: var(--bg-hero);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="floating-shape absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl floating"></div>
        <div class="floating-shape absolute top-40 right-20 w-32 h-32 bg-green-400/20 rounded-full blur-2xl floating" style="animation-delay: 1s;"></div>
        <div class="floating-shape absolute bottom-32 left-1/4 w-24 h-24 bg-blue-400/20 rounded-full blur-xl floating" style="animation-delay: 2s;"></div>
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
                {!! $heroContent->content_json['title'] ?? 'Web <span class="holographic">Application</span> Development Services' !!}
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                {!! $heroContent->content_json['subtitle'] ?? '' !!}
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @php
                    $features = $heroContent->content_json['features'] ?? ['React.js & Angular', 'Enterprise-Grade', 'High-ROI Solutions'];
                @endphp
                @foreach($features as $feature)
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        {{ $feature }}
                    </span>
                @endforeach
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                @php
                    $buttons = $heroContent->content_json['buttons'] ?? [];
                @endphp
                @foreach($buttons as $index => $button)
                    @if($index == 0)
                        @if(($button['action'] ?? '') == 'modal')
                            <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                                {{ $button['text'] ?? '🚀 Start Your Web App Project' }}
                            </button>
                        @else
                            <a href="{{ $button['url'] ?? '#' }}" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                                {{ $button['text'] ?? '🚀 Start Your Web App Project' }}
                            </a>
                        @endif
                    @else
                        <a href="{{ $button['url'] ?? route('frontend.index') . '#contact' }}" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                            {{ $button['text'] ?? '💬 Get Free Consultation' }}
                        </a>
                    @endif
                @endforeach
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

<!-- Intro Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-20 left-20 w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
        <div class="absolute top-40 right-32 w-2 h-2 bg-blue-400 rounded-full animate-ping"></div>
        <div class="absolute bottom-32 left-1/3 w-4 h-4 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-green-400 rounded-full animate-ping" style="animation-delay: 2s;"></div>
    </div>
    
    <!-- Subtle Grid Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(34, 197, 94, 0.4) 1px, transparent 0); background-size: 50px 50px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-6xl mx-auto">
            <!-- Main Title -->
            <div class="mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    {!! $introContent->content_json['title'] ?? 'Why Choose Us as Your <br> <span class="bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">Web App Development Company</span>' !!}
                </h2>
                
                <!-- Description -->
                <p class="text-xl md:text-2xl text-gray-600 leading-relaxed max-w-4xl mx-auto font-light">
                    {!! $introContent->content_json['description'] ?? 'When you partner with us, we connect you with our team of talented developers that want to see you succeed. Our expertise extends across various industries, allowing us to create unique web apps for your niche.' !!}
                </p>
            </div>
            
            <!-- Feature Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 max-w-7xl mx-auto">
                @php
                    $introFeatures = $introContent->content_json['features'] ?? [];
                    $featureColors = [
                        'from-green-500 to-green-600',
                        'from-blue-500 to-blue-600',
                        'from-purple-500 to-purple-600',
                        'from-orange-500 to-orange-600',
                        'from-teal-500 to-teal-600'
                    ];
                @endphp
                
                @foreach($introFeatures as $index => $feature)
                    @php
                        $colorClass = $featureColors[$index % count($featureColors)];
                    @endphp
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-14 h-14 bg-gradient-to-br {{ $colorClass }} rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-gray-600 leading-relaxed text-sm">{{ $feature['description'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Who We Serve Section -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-30">
        <div class="absolute top-20 left-20 w-2 h-2 bg-green-400 rounded-full animate-ping"></div>
        <div class="absolute top-40 right-32 w-3 h-3 bg-blue-400 rounded-full animate-pulse"></div>
        <div class="absolute bottom-32 left-1/3 w-2 h-2 bg-purple-400 rounded-full animate-ping" style="animation-delay: 1s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-4xl font-bold text-gray-900 mb-6">
                {!! $whoWeServeContent->content_json['title'] ?? 'Who We Serve with Our <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Web Application Services</span>' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $whoWeServeContent->content_json['subtitle'] ?? 'Tailored solutions for businesses at every stage of growth' }}
            </p>
        </div>
        
        <!-- Services Stack -->
        <div class="max-w-5xl mx-auto space-y-12">
            @php
                $services = $whoWeServeContent->content_json['services'] ?? [];
                $serviceColors = [
                    'green' => ['from-green-500 to-green-600', 'bg-green-50', 'text-green-700', 'text-green-600'],
                    'blue' => ['from-blue-500 to-blue-600', 'bg-blue-50', 'text-blue-700', 'text-blue-600'],
                    'purple' => ['from-purple-500 to-purple-600', 'bg-purple-50', 'text-purple-700', 'text-purple-600']
                ];
            @endphp
            
            @foreach($services as $index => $service)
                @php
                    $color = $service['color'] ?? array_keys($serviceColors)[$index % count($serviceColors)];
                    $colorClasses = $serviceColors[$color];
                    $isReverse = $index % 2 == 1;
                @endphp
                
                <div class="relative">
                    <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                        <div class="flex flex-col {{ $isReverse ? 'lg:flex-row-reverse' : 'lg:flex-row' }}">
                            <!-- Content Section -->
                            <div class="lg:w-3/5 p-12">
                                <div class="flex items-start mb-8">
                                    <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br {{ $colorClasses[0] }} rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $service['title'] ?? '' }}</h3>
                                        <p class="{{ $colorClasses[3] }} font-semibold text-lg">{{ $service['subtitle'] ?? '' }}</p>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                    {{ $service['description'] ?? '' }}
                                </p>
                                <div class="flex flex-wrap gap-3">
                                    @foreach(($service['features'] ?? []) as $feature)
                                        <span class="px-5 py-2 {{ $colorClasses[1] }} {{ $colorClasses[2] }} rounded-full font-medium">{{ $feature }}</span>
                                    @endforeach
                                </div>
                            </div>
                            
                            <!-- Visual Preview -->
                            <div class="lg:w-2/5 bg-gradient-to-br {{ $colorClasses[0] }} p-8 flex items-center">
                                <div class="w-full">
                                    <h4 class="text-white text-2xl font-bold mb-6">{{ ucfirst($color) }} Success</h4>
                                    <div class="space-y-4">
                                        @foreach(($service['stats'] ?? []) as $stat)
                                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                                <span class="text-white text-lg">{{ $stat['label'] ?? '' }}</span>
                                                <span class="text-white text-3xl font-bold">{{ $stat['value'] ?? '' }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Web Applications We Deliver Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $webAppsDeliverContent->content_json['title'] ?? 'Web Applications We <span class="text-green-600">Deliver</span>' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {{ $webAppsDeliverContent->content_json['subtitle'] ?? 'Robust and tailored web application development services that fit your business needs' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $apps = $webAppsDeliverContent->content_json['apps'] ?? [];
                $appColors = [
                    'blue' => ['bg-blue-100', 'text-blue-600'],
                    'green' => ['bg-green-100', 'text-green-600'],
                    'purple' => ['bg-purple-100', 'text-purple-600'],
                    'orange' => ['bg-orange-100', 'text-orange-600'],
                    'teal' => ['bg-teal-100', 'text-teal-600'],
                    'indigo' => ['bg-indigo-100', 'text-indigo-600']
                ];
                $colorKeys = array_keys($appColors);
                
                $appIcons = [
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 919.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>'
                ];
            @endphp
            
            @foreach($apps as $index => $app)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $bgColorClass = $appColors[$colorKey][0];
                    $textColorClass = $appColors[$colorKey][1];
                @endphp
                
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 {{ $bgColorClass }} rounded-lg flex items-center justify-center mb-4">
                        <div class="{{ $textColorClass }}">
                            {!! $appIcons[$index % count($appIcons)] !!}
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $app['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $app['subtitle'] ?? '' }}</p>
                    <p class="text-gray-500 text-sm">{{ $app['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Industries We Know Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $industriesContent->content_json['title'] ?? 'We Know Your <span class="text-green-600">Industry</span>' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {{ $industriesContent->content_json['subtitle'] ?? 'Customized web applications for various industries that meet their standards' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $industries = $industriesContent->content_json['industries'] ?? [];
                $industryColors = [
                    'from-red-500 to-red-600' => ['bg-red-50', 'text-red-700'],
                    'from-blue-500 to-blue-600' => ['bg-blue-50', 'text-blue-700'],
                    'from-green-500 to-green-600' => ['bg-green-50', 'text-green-700'],
                    'from-purple-500 to-purple-600' => ['bg-purple-50', 'text-purple-700'],
                    'from-orange-500 to-orange-600' => ['bg-orange-50', 'text-orange-700'],
                    'from-teal-500 to-teal-600' => ['bg-teal-50', 'text-teal-700']
                ];
                $colorKeys = array_keys($industryColors);
            @endphp
            
            @foreach($industries as $index => $industry)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $tagColors = $industryColors[$colorKey];
                @endphp
                
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br {{ $colorKey }} rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $industry['title'] ?? '' }}</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        {{ $industry['description'] ?? '' }}
                    </p>
                    <div class="flex flex-wrap gap-2">
                        @foreach(($industry['features'] ?? []) as $feature)
                            <span class="px-3 py-1 {{ $tagColors[0] }} {{ $tagColors[1] }} rounded-full text-sm">{{ $feature }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Our Web App Development Services Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $servicesContent->content_json['title'] ?? 'Our Web App <span class="text-green-400">Development Services</span>' !!}
            </h2>
            <p class="text-lg text-gray-300">
                {{ $servicesContent->content_json['subtitle'] ?? 'Personalized services that suit your business goals and elevate user experience' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $services = $servicesContent->content_json['services'] ?? [];
                $serviceColors = [
                    'bg-green-600', 'bg-blue-600', 'bg-purple-600',
                    'bg-orange-600', 'bg-red-600', 'bg-teal-600'
                ];
            @endphp
            
            @foreach($services as $index => $service)
                @php
                    $bgColor = $serviceColors[$index % count($serviceColors)];
                @endphp
                
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 {{ $bgColor }} rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">{{ $service['title'] ?? '' }}</h3>
                    <p class="text-gray-300 text-sm">{{ $service['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $benefitsContent->content_json['title'] ?? 'Benefits of Web App Development with Qubify Tech' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
            @php
                $benefits = $benefitsContent->content_json['benefits'] ?? [];
                $benefitColors = [
                    'green' => ['bg-green-100', 'text-green-600'],
                    'blue' => ['bg-blue-100', 'text-blue-600'],
                    'purple' => ['bg-purple-100', 'text-purple-600'],
                    'pink' => ['bg-pink-100', 'text-pink-600'],
                    'orange' => ['bg-orange-100', 'text-orange-600']
                ];
                $colorKeys = array_keys($benefitColors);
            @endphp
            
            @foreach($benefits as $index => $benefit)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $colors = $benefitColors[$colorKey];
                @endphp
                
                <div class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 {{ $colors[0] }} rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 {{ $colors[1] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $benefit['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $benefit['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Tech Stack Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-3 h-3 bg-blue-400 rounded-full animate-pulse"></div>
        <div class="absolute top-60 right-32 w-2 h-2 bg-green-400 rounded-full animate-ping"></div>
        <div class="absolute bottom-40 left-1/3 w-4 h-4 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-orange-400 rounded-full animate-ping" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-5xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $techStackContent->content_json['title'] ?? 'Our Tech Stack for <br> <span class="bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">Web Application Development Services</span>' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $techStackContent->content_json['subtitle'] ?? 'Cutting-edge technologies and frameworks for building scalable, secure, and high-performance web applications' }}
            </p>
        </div>

        <!-- Tech Stack Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @php
                $categories = $techStackContent->content_json['categories'] ?? [];
                $categoryColors = [
                    'from-indigo-500 to-indigo-600' => ['bg-indigo-50', 'text-indigo-700'],
                    'from-purple-500 to-purple-600' => ['bg-purple-50', 'text-purple-700'],
                    'from-blue-500 to-blue-600' => ['bg-blue-50', 'text-blue-700'],
                    'from-green-500 to-green-600' => ['bg-green-50', 'text-green-700'],
                    'from-orange-500 to-orange-600' => ['bg-orange-50', 'text-orange-700'],
                    'from-pink-500 to-pink-600' => ['bg-pink-50', 'text-pink-700'],
                    'from-teal-500 to-teal-600' => ['bg-teal-50', 'text-teal-700'],
                    'from-red-500 to-red-600' => ['bg-red-50', 'text-red-700'],
                    'from-gray-700 to-gray-800' => ['bg-gray-50', 'text-gray-700']
                ];
                $colorKeys = array_keys($categoryColors);
            @endphp
            
            @foreach($categories as $index => $category)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $colors = $categoryColors[$colorKey];
                @endphp
                
                <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br {{ $colorKey }} rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">{{ $category['title'] ?? '' }}</h3>
                    <div class="flex flex-wrap gap-2 justify-center">
                        @foreach(($category['technologies'] ?? []) as $tech)
                            <span class="px-3 py-1 {{ $colors[0] }} {{ $colors[1] }} rounded-full text-sm font-medium">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $faqContent->content_json['title'] ?? 'Frequently Asked <span class="text-green-600">Questions</span>' !!}
            </h2>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-6">
                @php
                    $faqs = $faqContent->content_json['faqs'] ?? [];
                @endphp
                
                @foreach($faqs as $faq)
                    <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $faq['question'] ?? '' }}</h3>
                        <p class="text-gray-600">{{ $faq['answer'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Back to Top Button -->
<button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-green-600 hover:bg-green-700 text-white rounded-full shadow-xl transition-all duration-300 opacity-0 invisible hover:scale-110 z-50">
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
    background: linear-gradient(135deg, #22C55E, #3B82F6);
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
            }
        });
    }, observerOptions);

    // Observe all sections
    document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
    });

    // Back to top button functionality
    const backToTopButton = document.getElementById('backToTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.remove('opacity-0', 'invisible');
            backToTopButton.classList.add('opacity-100', 'visible');
        } else {
            backToTopButton.classList.add('opacity-0', 'invisible');
            backToTopButton.classList.remove('opacity-100', 'visible');
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>

@endsection