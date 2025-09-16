@extends('frontend.layouts.app')

@section('title')
Mobile App Development Services - {{app_name()}}
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: var(--bg-hero);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="floating-shape absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl floating"></div>
        <div class="floating-shape absolute top-40 right-20 w-32 h-32 bg-pink-400/20 rounded-full blur-2xl floating" style="animation-delay: 1s;"></div>
        <div class="floating-shape absolute bottom-32 left-1/4 w-24 h-24 bg-purple-400/20 rounded-full blur-xl floating" style="animation-delay: 2s;"></div>
        <div class="floating-shape absolute top-1/3 right-1/3 w-16 h-16 bg-white/10 rounded-full blur-lg floating" style="animation-delay: 0.5s;"></div>
    </div>
    
    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 opacity-10">
        <div class="h-full w-full" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 50px 50px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <!-- Main Headline -->
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                {!! $heroContent->content_json['title'] ?? 'Mobile <span class="holographic">App</span> Development Services' !!}
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                {{ $heroContent->content_json['subtitle'] ?? 'You bring the vision. We bring it to life—built with precision, passion, and purpose. We build apps that feel natural to use, perform flawlessly, and scale easily with your business growth.' }}
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @php
                    $features = $heroContent->content_json['features'] ?? ['iOS & Android Native', 'Flutter & React Native', 'Future-Ready Solutions'];
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
                                {{ $button['text'] ?? '🚀 Start Your Mobile App' }}
                            </button>
                        @else
                            <a href='#' class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                                {{ $button['text'] ?? '🚀 Start Your Mobile App' }}
                            </a>
                        @endif
                    @else
                        <a href="{{ route('frontend.index') . '#contact' }}" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
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
<section class="py-20 bg-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(236, 72, 153, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <!-- Main Title -->
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $introContent->content_json['title'] ?? 'Mobile Apps Are No Longer Optional <br> <span class="bg-gradient-to-r from-pink-600 to-purple-700 bg-clip-text text-transparent">They\'re Essential</span>' !!}
            </h2>
            
            <!-- Description -->
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-16 max-w-4xl mx-auto font-light">
                {{ $introContent->content_json['description'] ?? 'At Qubify Tech, we know mobile apps are how your business stays connected, competitive, and ready for growth. We build apps that feel natural to use, perform flawlessly, and scale easily—secure, future-proof, and built around your goals.' }}
            </p>
            
            <!-- Feature Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                @php
                    $introFeatures = $introContent->content_json['features'] ?? [];
                    $introColors = [
                        'from-pink-500 to-pink-600',
                        'from-purple-500 to-purple-600',
                        'from-blue-500 to-blue-600',
                        'from-green-500 to-green-600'
                    ];
                @endphp
                
                @foreach($introFeatures as $index => $feature)
                    @php
                        $colorClass = $introColors[$index % count($introColors)];
                    @endphp
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        @if($index == 0)
                        <div class="w-16 h-16 bg-gradient-to-br {{ $colorClass }} rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                            </svg>
                        </div>
                         @elseif($index == 1)
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        @elseif($index == 2)
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                            </svg>
                        </div>
                        @else
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        @endif
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $feature['description'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Future-Ready Section -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-30">
        <div class="absolute top-20 left-20 w-2 h-2 bg-pink-400 rounded-full animate-ping"></div>
        <div class="absolute top-40 right-32 w-3 h-3 bg-purple-400 rounded-full animate-pulse"></div>
        <div class="absolute bottom-32 left-1/3 w-2 h-2 bg-blue-400 rounded-full animate-ping" style="animation-delay: 1s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-4xl font-bold text-gray-900 mb-6">
                {!! $futureReadyContent->content_json['title'] ?? 'Future-Ready <span class="bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">Mobile App Development</span>' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $futureReadyContent->content_json['subtitle'] ?? 'Technology changes fast. Your app should too. We embed future-focused features into your mobile solution from day one.' }}
            </p>
        </div>
        
        <!-- Future Tech Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
            @php
                $technologies = $futureReadyContent->content_json['technologies'] ?? [];
                $techColors = [
                    'from-pink-500 to-pink-600',
                    'from-purple-500 to-purple-600',
                    'from-blue-500 to-blue-600',
                    'from-green-500 to-green-600'
                ];
            @endphp
            
            @foreach($technologies as $index => $tech)
                @php
                    $colorClass = $techColors[$index % count($techColors)];
                @endphp
                <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3">
                    <div class="w-20 h-20 bg-gradient-to-br {{ $colorClass }} rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        @if($index == 0)
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                        @elseif($index == 1)
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                        </svg>
                        @elseif($index == 2)
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        @else
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        @endif
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $tech['title'] ?? '' }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $tech['description'] ?? '' }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Mobile App Development Services Section -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-4xl font-bold text-gray-900 mb-6">
                {!! $servicesContent->content_json['title'] ?? 'Our Mobile App <span class="bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">Development Services</span>' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $servicesContent->content_json['subtitle'] ?? 'Different businesses. Different apps. Tailored every time.' }}
            </p>
        </div>
        
        <!-- Services Stack -->
        <div class="max-w-4xl mx-auto space-y-12">
            @php
                $services = $servicesContent->content_json['services'] ?? [];
                $serviceColors = [
                    'gray' => ['from-gray-800 to-gray-900', 'bg-gray-50', 'text-gray-700', 'text-gray-600'],
                    'green' => ['from-green-500 to-green-600', 'bg-green-50', 'text-green-700', 'text-green-600'],
                    'purple' => ['from-purple-500 to-purple-600', 'bg-purple-50', 'text-purple-700', 'text-purple-600']
                ];
            @endphp
            
            @foreach($services as $index => $service)
                @php
                    $color = $service['color'] ?? array_keys($serviceColors)[$index % count($serviceColors)];
                    $colorClasses = $serviceColors[$color];
                    $isReverse = $index % 2 == 1;
                @endphp
                
                <!-- Service {{ $index + 1 }}: {{ $service['title'] ?? '' }} -->
                <div class="relative">
                    <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                        <div class="flex flex-col {{ $isReverse ? 'lg:flex-row-reverse' : 'lg:flex-row' }}">
                            <!-- Content Section -->
                            <div class="lg:w-3/5 p-12">
                                <div class="flex items-start mb-8">
                                    <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br {{ $colorClasses[0] }} rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                        @if($color == 'gray')
                                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                                            </svg>
                                        @elseif($color == 'green')
                                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.523 15.3414c-.5511 0-.9993-.4486-.9993-.9997s.4482-.9993.9993-.9993c.5511 0 .9993.4482.9993.9993.0001.5511-.4482.9997-.9993.9997m-11.046 0c-.5511 0-.9993-.4486-.9993-.9997s.4482-.9993.9993-.9993c.5511 0 .9993.4482.9993.9993 0 .5511-.4482.9997-.9993.9997m11.4045-6.02l1.9973-3.4592a.416.416 0 00-.1521-.5676.416.416 0 00-.5676.1521l-2.0223 3.503C15.5902 8.2439 13.8533 7.8508 12 7.8508s-3.5902.3931-5.1367 1.0989L4.841 5.4467a.4161.4161 0 00-.5677-.1521.4157.4157 0 00-.1521.5676l1.9973 3.4592C2.6889 11.1867.3432 14.6589 0 18.761h24c-.3435-4.1021-2.6892-7.5743-6.1185-9.4396"/>
                                            </svg>
                                        @else
                                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                        @endif
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
                                    <h4 class="text-white text-2xl font-bold mb-6">
                                        @if($color == 'gray') iOS Excellence
                                        @elseif($color == 'green') Android Reach
                                        @else Cross-Platform Benefits
                                        @endif
                                    </h4>
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

<!-- Additional Services Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $additionalServicesContent->content_json['title'] ?? 'Additional <span class="text-pink-600">Services</span>' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {{ $additionalServicesContent->content_json['subtitle'] ?? 'Comprehensive mobile solutions for every business need' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $additionalServices = $additionalServicesContent->content_json['services'] ?? [];
                $serviceColors = [
                    'blue' => ['bg-blue-100', 'text-blue-600'],
                    'green' => ['bg-green-100', 'text-green-600'],
                    'purple' => ['bg-purple-100', 'text-purple-600'],
                    'orange' => ['bg-orange-100', 'text-orange-600'],
                    'teal' => ['bg-teal-100', 'text-teal-600'],
                    'indigo' => ['bg-indigo-100', 'text-indigo-600']
                ];
                $colorKeys = array_keys($serviceColors);
            @endphp
            
            @foreach($additionalServices as $index => $service)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $colors = $serviceColors[$colorKey];
                @endphp
                
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 {{ $colors[0] }} rounded-lg flex items-center justify-center mb-4">
                        @if($index == 0)
                        <svg class="w-6 h-6 {{ $colors[1] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                        </svg>
                        @elseif($index == 1)
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        @elseif($index == 2)
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                        @elseif($index == 3)
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                       </svg>
                        @elseif($index == 4)
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                           @else
                           <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                           @endif
                    </svg>
                    </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $service['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $service['subtitle'] ?? '' }}</p>
                    <p class="text-gray-500 text-sm">{{ $service['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Tech Stack Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $techStackContent->content_json['title'] ?? 'We Use the Latest <span class="text-pink-400">Mobile App Development Tech Stack</span>' !!}
            </h2>
            <p class="text-lg text-gray-300">
                {{ $techStackContent->content_json['subtitle'] ?? 'Latest, stable, and scalable tech stacks for apps that stand the test of time' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $categories = $techStackContent->content_json['categories'] ?? [];
                $categoryColors = [
                    'bg-pink-600' => ['bg-pink-600/20', 'text-pink-300'],
                    'bg-purple-600' => ['bg-purple-600/20', 'text-purple-300'],
                    'bg-blue-600' => ['bg-blue-600/20', 'text-blue-300'],
                    'bg-green-600' => ['bg-green-600/20', 'text-green-300'],
                    'bg-orange-600' => ['bg-orange-600/20', 'text-orange-300'],
                    'bg-teal-600' => ['bg-teal-600/20', 'text-teal-300'],
                    'bg-indigo-600' => ['bg-indigo-600/20', 'text-indigo-300']
                ];
                $colorKeys = array_keys($categoryColors);
            @endphp
            
            @foreach($categories as $index => $category)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $tagColors = $categoryColors[$colorKey];
                @endphp
                
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 {{ $colorKey }} rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($index == 0)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        @elseif($index == 1)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                        </svg>
                        @elseif($index == 2)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                        @elseif($index == 3)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                        </svg>
                        @elseif($index == 4)
                         <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                        </svg>
                        @else
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold mb-3">{{ $category['title'] ?? '' }}</h3>
                    <p class="text-gray-300 text-sm mb-4">{{ $category['description'] ?? '' }}</p>
                    <div class="flex flex-wrap gap-2 justify-center">
                        @foreach(($category['technologies'] ?? []) as $tech)
                            <span class="px-2 py-1 {{ $tagColors[0] }} {{ $tagColors[1] }} rounded text-xs">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Industry Solutions Section -->
<section class="py-24 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-20">
        <div class="absolute top-20 right-20 w-4 h-4 bg-indigo-400 rounded-full animate-ping"></div>
        <div class="absolute top-60 left-24 w-3 h-3 bg-purple-400 rounded-full animate-pulse"></div>
        <div class="absolute bottom-40 right-1/3 w-5 h-5 bg-pink-400 rounded-full animate-ping" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/3 left-1/4 w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-5xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $industrySolutionsContent->content_json['title'] ?? 'Different industries. <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Specific needs.</span> Smart solutions.' !!}
            </h2>
        </div>

        <!-- Industry Solutions Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @php
                $solutions = $industrySolutionsContent->content_json['solutions'] ?? [];
                $solutionColors = [
                    'from-blue-500 to-blue-600',
                    'from-green-500 to-green-600',
                    'from-purple-500 to-purple-600',
                    'from-orange-500 to-orange-600',
                    'from-pink-500 to-pink-600',
                    'from-cyan-500 to-cyan-600'
                ];
            @endphp
            
            @foreach($solutions as $index => $solution)
                @php
                    $colorClass = $solutionColors[$index % count($solutionColors)];
                @endphp
                
                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-white/50">
                    <div class="w-16 h-16 bg-gradient-to-br {{ $colorClass }} rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        @if($index == 0)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        @elseif($index == 1)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        @elseif($index == 2)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                        @elseif($index == 3)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                        </svg>
                        @elseif($index == 4)
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        @else
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        @endif
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $solution['title'] ?? '' }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $solution['description'] ?? '' }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Bottom Message -->
        <div class="text-center max-w-3xl mx-auto">
            <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-white/50">
                <p class="text-xl text-gray-700 leading-relaxed font-medium">
                    {{ $industrySolutionsContent->content_json['bottom_message'] ?? 'Next, no matter your sector, we bring real-world experience—not just technical know-how—to the table.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Qubify Tech Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $whyChooseUsContent->content_json['title'] ?? 'Why Choose <span class="text-pink-600">Qubify Tech?</span>' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {{ $whyChooseUsContent->content_json['subtitle'] ?? 'Smart builds. Straight talk. Real outcomes.' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $reasons = $whyChooseUsContent->content_json['reasons'] ?? [];
                $reasonColors = [
                    'pink' => ['bg-pink-100', 'text-pink-600'],
                    'purple' => ['bg-purple-100', 'text-purple-600'],
                    'blue' => ['bg-blue-100', 'text-blue-600'],
                    'green' => ['bg-green-100', 'text-green-600']
                ];
                $colorKeys = array_keys($reasonColors);
            @endphp
            
            @foreach($reasons as $index => $reason)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $colors = $reasonColors[$colorKey];
                @endphp
                
                <div class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 {{ $colors[0] }} rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($index == 0)
                        <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        @elseif($index == 1)
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        @elseif($index == 2)
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        @else
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    @endif
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $reason['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $reason['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- How We Work Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $howWeWorkContent->content_json['title'] ?? 'How We <span class="text-pink-600">Work</span>' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {{ $howWeWorkContent->content_json['subtitle'] ?? 'Simple. Structured. Transparent.' }}
            </p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
                @php
                    $steps = $howWeWorkContent->content_json['steps'] ?? [];
                    $stepColors = [
                        'bg-pink-600', 'bg-purple-600', 'bg-blue-600', 'bg-green-600',
                        'bg-orange-600', 'bg-red-600', 'bg-indigo-600'
                    ];
                @endphp
                
                @foreach($steps as $index => $step)
                    @php
                        $colorClass = $stepColors[$index % count($stepColors)];
                    @endphp
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-12 h-12 {{ $colorClass }} rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $step['title'] ?? '' }}</h3>
                            <p class="text-gray-600">{{ $step['description'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $faqContent->content_json['title'] ?? 'Frequently Asked <span class="text-pink-600">Questions</span>' !!}
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
<button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-pink-600 hover:bg-pink-700 text-white rounded-full shadow-xl transition-all duration-300 opacity-0 invisible hover:scale-110 z-50">
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
    background: linear-gradient(135deg, #EC4899, #8B5CF6);
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