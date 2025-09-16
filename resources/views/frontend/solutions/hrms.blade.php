@extends('frontend.layouts.app')

@section('title')
HRMS - Human Resource Management System - {{app_name()}}
@endsection

@section('content')

@php
    $hero = $sections['heroContent']->content_json ?? null;
    $intro = $sections['introContent']->content_json ?? null;
    $core_features = $sections['coreFeaturesContent']->content_json ?? null;
    $benefit = $sections['benefitsContent']->content_json ?? null;
    $use_cases = $sections['useCasesContent']->content_json ?? null;
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
            {!! $hero['subtitle'] ?? '' !!}

            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @foreach($hero['features'] as $feature)
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                   {{$feature ?? ''}}
                </span>
                @endforeach
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    {{$hero['buttons'][0]['text']}}
                </button>
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    {{$hero['buttons'][1]['text']}}
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

<!-- Intro Section -->
<section class="py-20 bg-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(59, 130, 246, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Main Title -->
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                <!-- Take the Stress Out of <br>
                <span class="bg-gradient-to-r from-blue-600 to-blue-700 bg-clip-text text-transparent">HR Operations</span> -->
                {!! $intro['title'] !!}
            </h2>
            
            <!-- Description -->
            <p class="text-lg text-gray-600">
                <!-- Managing people is complex—but your tools shouldn't be. HRMS simplifies core HR functions by centralizing everything into one intuitive system. That means less time chasing paperwork and more time focusing on your people. -->
                {!! $intro['description'] !!}
            </p>
            
            <!-- Feature Cards -->
           

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{$intro['features'][0]['title']}}</h3>
                    <p class="text-gray-600 text-sm">{{$intro['features'][0]['description']}}</p>
                </div>
                
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{$intro['features'][1]['title']}}</h3>
                    <p class="text-gray-600 text-sm">{{$intro['features'][1]['description']}}</p>
                </div>
                
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{$intro['features'][2]['title']}}</h3>
                    <p class="text-gray-600 text-sm">{{$intro['features'][2]['description']}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Features Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                <!-- Core <span class="text-blue-600 " >Automate Everything</span> -->
                {!! $core_features['title'] ?? '' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {!! $core_features['description'] ?? '' !!}
                <!-- Everything you need to manage your workforce efficiently -->
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            <!-- Employee Management -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-users text-blue-600 " ></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">{{$core_features['features'][0]['title'] ?? ''}}</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">{{$core_features['features'][0]['subtitle'] ?? ''}}</h4>
                    <p class="text-gray-600 mb-4">
                        {{$core_features['features'][0]['description'] ?? ''}}
                    </p>
                  
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Employee Records</h4>
                        <div class="space-y-3">
                            @foreach($core_features['features'][0]['stats'] as $stat)
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>{{$stat['label']}}</span>
                                <span class="font-bold">{{$stat['value']}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Attendance & Leave -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Attendance Overview</h4>
                        <div class="space-y-3">
                            @foreach($core_features['features'][1]['stats'] as $stat)
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>{{$stat['label']}}</span>
                                <span class="font-bold">{{$stat['value']}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-clock text-green-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">{{$core_features['features'][1]['title'] ?? ''}}</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">{{$core_features['features'][1]['subtitle'] ?? ''}}</h4>
                    <p class="text-gray-600 mb-4">
                    {{$core_features['features'][1]['description'] ?? ''}}
                    </p>
                   
                </div>  
            </div>
            
            <!-- Payroll & Compensation -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-money-check-alt text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">{{$core_features['features'][2]['title'] ?? ''}}</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">{{$core_features['features'][2]['subtitle'] ?? ''}}</h4>
                    <p class="text-gray-600 mb-4">
                    {{$core_features['features'][2]['description'] ?? ''}}
                    </p>
                  
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Payroll Summary</h4>
                        <div class="space-y-3">
                            @foreach($core_features['features'][2]['stats'] as $stat)
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>{{$stat['label']}}</span>
                                <span class="font-bold">{{$stat['value']}}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Features Grid -->
        <div class="mt-20">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($core_features['extra_features'] as $key=>$feature)
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        @if($key == 0)
                        <i class="fas fa-chart-line text-indigo-600"></i>
                        @elseif($key == 1)
                        <i class="fas fa-user-plus text-teal-600"></i>
                        @elseif($key == 2)
                        <i class="fas fa-laptop text-orange-600"></i>
                        @else
                        <i class="fa-solid fa-chart-simple text-pink-600"></i>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$feature['title'] ?? ''}}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{$feature['subtitle'] ?? ''}}</p>
                    <p class="text-gray-500 text-sm">{{$feature['description'] ?? ''}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $benefit['title'] !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($benefit['benefits'] as $key=>$benefit)
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                @if($key == 0)
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-blue-600  text-2xl"></i>
                </div>
                @elseif($key == 1)
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-expand-arrows-alt text-green-600 text-2xl"></i>
                </div>
                @elseif($key == 2)
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-purple-600 text-2xl"></i>
                </div>
                @else
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-smile text-orange-600 text-2xl"></i>
                </div>
                @endif
                <h3 class="text-lg font-semibold text-gray-900 mb-3">{{$benefit['title'] ?? ''}}</h3>
                <p class="text-gray-600 text-sm">{{$benefit['description'] ?? ''}}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Use Cases Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $use_cases['title'] ?? '' !!}
            </h2>
            <p class="text-lg text-gray-300">
                {!! $use_cases['description'] ?? '' !!}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($use_cases['use_cases'] as $key=>$cases)
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                @if($key == 0)
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-rocket text-white text-xl"></i>
                </div>
                @elseif($key == 1)
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-building text-white text-xl"></i>
                </div>
                @elseif($key == 2)
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-home text-white text-xl"></i>
                </div>
                @else($key == 3)
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-palette text-white text-xl"></i>
                </div>
                @endif
                <h3 class="text-lg font-semibold mb-3">{{$cases['title'] ?? ''}}</h3>
                <p class="text-gray-300 text-sm">{{$cases['description'] ?? ''}}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $testimonials['title'] ?? '' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($testimonials['testimonials'] as $key=>$test)
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                <div class="flex items-center mb-4">
                    @if($key == 0)
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-blue-600 " ></i>
                    </div>
                    @elseif($key == 1)
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-green-600"></i>
                    </div>
                    @else
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-purple-600"></i>
                    </div>
                    @endif
                    <div>
                        <h4 class="font-semibold text-gray-900">{{$test['name'] ?? ''}}</h4>
                        <p class="text-gray-600 text-sm">{{$test['role'] ?? ''}}, {{$test['company'] ?? ''}}</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                   {{$test['review'] ?? ''}}
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
                {!! $cta['title'] ?? '' !!}
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                {!! $cta['description'] ?? '' !!}
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @foreach($cta['features'] as $feature)
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    {{$feature ?? ''}}
                </span>
                @endforeach
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    {{$cta['buttons'][0]['text'] ?? ''}}
                </button>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    {{$cta['buttons'][1]['text'] ?? ''}}
                </a>
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
    
    // HR dashboard value animation on hover
    const dashboardCards = document.querySelectorAll('.bg-gradient-to-br');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const values = card.querySelectorAll('.font-bold');
            values.forEach(value => {
                if (value.textContent.includes('₹')) {
                    // Animate currency values
                    const currentValue = parseFloat(value.textContent.replace(/[₹L]/g, ''));
                    const newValue = (currentValue + (Math.random() * 2 - 1)).toFixed(1);
                    value.textContent = '₹' + newValue + 'L';
                } else if (value.textContent.includes('/')) {
                    // Handle fraction values like "267/284"
                    const parts = value.textContent.split('/');
                    if (parts.length === 2) {
                        const current = parseInt(parts[0]);
                        const total = parseInt(parts[1]);
                        const newCurrent = Math.min(current + Math.floor(Math.random() * 5), total);
                        value.textContent = newCurrent + '/' + total;
                    }
                } else if (!isNaN(parseInt(value.textContent))) {
                    // Handle numeric values
                    const currentValue = parseInt(value.textContent);
                    const newValue = currentValue + Math.floor(Math.random() * 10 - 5);
                    value.textContent = Math.max(0, newValue);
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