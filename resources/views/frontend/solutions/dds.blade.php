@extends('frontend.layouts.app')

@section('title')
On-Demand Delivery Software - {{app_name()}}
@endsection

@section('content')

@php
    $hero = $sections['heroContent']->content_json ?? null;
    $intro = $sections['introContent']->content_json ?? null;
    $core_features = $sections['coreFeaturesContent']->content_json ?? null;
    $additional_features = $sections['additionalFeaturesContent']->content_json ?? null;
    $use_cases = $sections['useCasesContent']->content_json ?? null;
    $highlights = $sections['highlightsContent']->content_json ?? null;
    $testimonials = $sections['testimonialContent']->content_json ?? null;
    $cta = $sections['finalCtaContent']->content_json ?? null;
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
                {!! $hero['title'] ?? '' !!}
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                {!! $hero['subtitle'] ?? "Qubify's On-Demand Delivery Software powers businesses with end-to-end control over every delivery — from dispatch to doorstep. Whether you're managing food, packages, or field services, Qubify automates logistics, tracks drivers live, and enhances your customer experience." !!}
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
                        Real-Time Tracking
                    </span>
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        Route Optimization
                    </span>
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        Customer Notifications
                    </span>
                @endif
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    {{ $hero['buttons'][0]['text'] ?? '🔵 Book a Demo' }}
                </a>
                <button onclick="openContactModal()" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    {{ $hero['buttons'][1]['text'] ?? '⚪ See It in Action' }}
                </button>
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
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6">
                {!! $intro['title'] ?? '' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {!! $intro['description'] ?? "Qubify's delivery platform enables you to digitize and manage every part of your on-demand logistics operation. From order assignments to last-mile tracking, the system is built to reduce delivery time, cut operational waste, and scale delivery capacity — without adding more people or complexity." !!}
            </p>
            <p class="text-lg text-gray-700 mt-4">
                {!! $intro['subtitle'] ?? "It's the smart backbone for restaurants, e-commerce, courier services, and hyperlocal businesses looking to move fast and keep customers loyal." !!}
            </p>
        </div>
        
        <!-- Core Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if(isset($intro['features']) && is_array($intro['features']))
                @foreach($intro['features'] as $key => $feature)
                    <div class="text-center">
                        <div class="w-16 h-16 bg-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : ($key == 2 ? 'purple' : 'orange')) }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="{{ $feature['icon'] ?? 'fas fa-star' }} text-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : ($key == 2 ? 'purple' : 'orange')) }}-600 text-2xl"></i>
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
                    <p class="text-gray-600 text-sm">Live driver and order monitoring with ETAs</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-robot text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Auto-Dispatch</h3>
                    <p class="text-gray-600 text-sm">Smart order assignment to nearest drivers</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-route text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Route Optimization</h3>
                    <p class="text-gray-600 text-sm">Traffic-aware navigation and best paths</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-mobile-alt text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Customer Portal</h3>
                    <p class="text-gray-600 text-sm">Live updates and delivery notifications</p>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- Core Features Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $core_features['title'] ?? 'Core <span class="text-blue-600">Capabilities</span>' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {!! $core_features['subtitle'] ?? 'Everything you need for complete delivery management' !!}
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            @if(isset($core_features['features']) && is_array($core_features['features']))
                @foreach($core_features['features'] as $key => $feature)
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        @if($key % 2 == 0)
                            <!-- Feature Content -->
                            <div>
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-{{ $key == 0 ? 'map-marker-alt' : ($key == 1 ? 'robot' : 'route') }} text-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-600"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900">{{ $feature['title'] ?? '' }}</h3>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $feature['subtitle'] ?? '' }}</h4>
                                <p class="text-gray-600 mb-4">{{ $feature['description'] ?? '' }}</p>
                                @if(isset($feature['benefits']) && is_array($feature['benefits']))
                                    <ul class="space-y-2">
                                        @foreach($feature['benefits'] as $benefit)
                                            <li class="flex items-center text-gray-700">
                                                <i class="fas fa-check text-green-500 mr-2"></i>
                                                {{ $benefit }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            
                            <!-- Stats Dashboard -->
                            <div class="bg-white rounded-xl p-6 shadow-lg">
                                <div class="bg-gradient-to-br from-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-500 to-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-600 text-white rounded-lg p-6">
                                    <h4 class="text-lg font-semibold mb-4">{{ $key == 0 ? 'Live Tracking' : ($key == 1 ? 'Auto-Dispatch Engine' : 'Route Performance') }}</h4>
                                    <div class="space-y-3">
                                        @if(isset($feature['stats']) && is_array($feature['stats']))
                                            @foreach($feature['stats'] as $stat)
                                                <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                                    <span>{{ $stat['label'] ?? '' }}</span>
                                                    <span class="font-bold">{{ $stat['value'] ?? '' }}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Stats Dashboard (Left side for odd items) -->
                            <div class="order-2 lg:order-1 bg-white rounded-xl p-6 shadow-lg">
                                <div class="bg-gradient-to-br from-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-500 to-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-600 text-white rounded-lg p-6">
                                    <h4 class="text-lg font-semibold mb-4">{{ $key == 0 ? 'Live Tracking' : ($key == 1 ? 'Auto-Dispatch Engine' : 'Route Performance') }}</h4>
                                    <div class="space-y-3">
                                        @if(isset($feature['stats']) && is_array($feature['stats']))
                                            @foreach($feature['stats'] as $stat)
                                                <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                                    <span>{{ $stat['label'] ?? '' }}</span>
                                                    <span class="font-bold">{{ $stat['value'] ?? '' }}</span>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Feature Content (Right side for odd items) -->
                            <div class="order-1 lg:order-2">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-100 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-{{ $key == 0 ? 'map-marker-alt' : ($key == 1 ? 'robot' : 'route') }} text-{{ $key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple') }}-600"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900">{{ $feature['title'] ?? '' }}</h3>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $feature['subtitle'] ?? '' }}</h4>
                                <p class="text-gray-600 mb-4">{{ $feature['description'] ?? '' }}</p>
                                @if(isset($feature['benefits']) && is_array($feature['benefits']))
                                    <ul class="space-y-2">
                                        @foreach($feature['benefits'] as $benefit)
                                            <li class="flex items-center text-gray-700">
                                                <i class="fas fa-check text-green-500 mr-2"></i>
                                                {{ $benefit }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- Additional Features Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $additional_features['title'] ?? 'Additional <span class="text-blue-600">Features</span>' !!}
            </h2>
        </div>
        
        <!-- Regular Features Grid -->
        @if(isset($additional_features['features']) && is_array($additional_features['features']))
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($additional_features['features'] as $key => $feature)
                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-{{ $key % 4 == 0 ? 'indigo' : ($key % 4 == 1 ? 'teal' : ($key % 4 == 2 ? 'orange' : 'pink')) }}-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-{{ $key % 6 == 0 ? 'user-check' : ($key % 6 == 1 ? 'clipboard-check' : ($key % 6 == 2 ? 'tachometer-alt' : ($key % 6 == 3 ? 'clock' : ($key % 6 == 4 ? 'bell' : 'mobile-alt')))) }} text-{{ $key % 4 == 0 ? 'indigo' : ($key % 4 == 1 ? 'teal' : ($key % 4 == 2 ? 'orange' : 'pink')) }}-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $feature['subtitle'] ?? '' }}</p>
                        <p class="text-gray-500 text-sm">{{ $feature['description'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        @endif
        
        <!-- Advanced Features -->
        @if(isset($additional_features['advanced_features']) && is_array($additional_features['advanced_features']))
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($additional_features['advanced_features'] as $key => $feature)
                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-{{ $key == 0 ? 'green' : 'purple' }}-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-{{ $key == 0 ? 'credit-card' : 'plug' }} text-{{ $key == 0 ? 'green' : 'purple' }}-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $feature['subtitle'] ?? '' }}</p>
                        <p class="text-gray-500 text-sm">{{ $feature['description'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        @endif
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
                {!! $use_cases['subtitle'] ?? 'Qubify supports delivery operations for every sector — whether you deliver in minutes or by appointment, we adapt.' !!}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @if(isset($use_cases['cases']) && is_array($use_cases['cases']))
                @foreach($use_cases['cases'] as $key => $case)
                    <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                        <div class="w-16 h-16 bg-{{ $key % 8 == 0 ? 'orange' : ($key % 8 == 1 ? 'blue' : ($key % 8 == 2 ? 'green' : ($key % 8 == 3 ? 'red' : ($key % 8 == 4 ? 'purple' : ($key % 8 == 5 ? 'teal' : ($key % 8 == 6 ? 'indigo' : 'yellow')))))) }}-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-{{ $key % 8 == 0 ? 'utensils' : ($key % 8 == 1 ? 'shopping-bag' : ($key % 8 == 2 ? 'shipping-fast' : ($key % 8 == 3 ? 'pills' : ($key % 8 == 4 ? 'tools' : ($key % 8 == 5 ? 'store' : ($key % 8 == 6 ? 'graduation-cap' : 'plus')))))) }} text-white text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ $case['title'] ?? '' }}</h3>
                        <p class="text-gray-300 text-sm">{{ $case['description'] ?? '' }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Highlights Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $highlights['title'] ?? 'Highlights At a <span class="text-blue-600">Glance</span>' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @if(isset($highlights['highlights']) && is_array($highlights['highlights']))
                @foreach($highlights['highlights'] as $key => $highlight)
                    <div class="text-center p-6 bg-gray-50 rounded-xl">
                        <div class="w-16 h-16 bg-{{ $key % 4 == 0 ? 'blue' : ($key % 4 == 1 ? 'green' : ($key % 4 == 2 ? 'purple' : 'orange')) }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-{{ $key % 8 == 0 ? 'satellite-dish' : ($key % 8 == 1 ? 'calendar-alt' : ($key % 8 == 2 ? 'route' : ($key % 8 == 3 ? 'clipboard-check' : ($key % 8 == 4 ? 'tachometer-alt' : ($key % 8 == 5 ? 'plug' : ($key % 8 == 6 ? 'mobile-alt' : 'chart-line')))))) }} text-{{ $key % 4 == 0 ? 'blue' : ($key % 4 == 1 ? 'green' : ($key % 4 == 2 ? 'purple' : 'orange')) }}-600 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $highlight['title'] ?? '' }}</h3>
                        <p class="text-gray-600 text-sm">{{ $highlight['description'] ?? '' }}</p>
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
                {!! $testimonials['title'] ?? 'Why Teams Trust <span class="text-blue-600">Qubify\'s Delivery Platform</span>' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @if(isset($testimonials['testimonials']) && is_array($testimonials['testimonials']))
                @foreach($testimonials['testimonials'] as $key => $testimonial)
                    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-{{ $testimonial['color'] ?? ($key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple')) }}-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-user text-{{ $testimonial['color'] ?? ($key == 0 ? 'blue' : ($key == 1 ? 'green' : 'purple')) }}-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">{{ $testimonial['name'] ?? '' }}</h4>
                                <p class="text-gray-600 text-sm">{{ $testimonial['position'] ?? '' }}, {{ $testimonial['company'] ?? '' }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4 italic">
                            "{{ $testimonial['content'] ?? '' }}"
                        </p>
                        <div class="flex text-yellow-400">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                    </div>
                @endforeach
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
                {!! $cta['title'] ?? 'Ready to <span class="text-blue-400">Deliver Like a Pro</span>?' !!}
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                {!! $cta['description'] ?? 'Whether you\'re launching a last-mile fleet or upgrading your operations, Qubify On-Demand Delivery Software gives you the tools to scale without chaos and deliver delight — every time.' !!}
            </p>
            
            <!-- Feature Pills -->
            @if(isset($cta['features']) && is_array($cta['features']))
                <div class="flex flex-wrap justify-center gap-4 mb-12">
                    @foreach($cta['features'] as $feature)
                        <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                            {{ $feature }}
                        </span>
                    @endforeach
                </div>
            @endif
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                @if(isset($cta['buttons']) && is_array($cta['buttons']))
                    @foreach($cta['buttons'] as $key => $button)
                        @if($key == 0)
                            <a href="{{ $button['url'] ?? route('frontend.index').'#contact' }}" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                                {{ $button['text'] ?? '🚀 Schedule Your Demo' }}
                            </a>
                        @else
                            <a href="{{ $button['url'] ?? 'tel:+917087076111' }}" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                                {{ $button['text'] ?? '📞 Talk to a Product Consultant' }}
                            </a>
                        @endif
                    @endforeach
                @else
                    <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                        🚀 Schedule Your Demo
                    </a>
                    <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                        📞 Talk to a Product Consultant
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

/* Floating animation for hero elements */
@keyframes floating {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.floating {
    animation: floating 6s ease-in-out infinite;
}

/* Holographic text effect */
.holographic {
    background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #ffeaa7);
    background-size: 400% 400%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: holographic 3s ease-in-out infinite;
}

@keyframes holographic {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

/* Hover effects */
.hover-glow:hover {
    box-shadow: 0 0 30px rgba(249, 115, 22, 0.6);
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Back to top button functionality */
.opacity-0 { opacity: 0; }
.invisible { visibility: hidden; }
.opacity-100 { opacity: 1; }
.visible { visibility: visible; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
});

// Contact modal function (if needed)
function openContactModal() {
    // Redirect to contact section or open modal
    window.location.href = "{{ route('frontend.index') }}#contact";
}
</script>

@endsection