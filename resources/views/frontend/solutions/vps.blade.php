@extends('frontend.layouts.app')

@section('title')
VPS - Vehicle Parking System - {{app_name()}}
@endsection

@section('content')

@php
    $hero = $sections['heroContent']->content_json ?? null;
    $intro = $sections['introContent']->content_json ?? null;
    $core_features = $sections['coreFeaturesContent']->content_json ?? null;
    $hardware_integration = $sections['hardwareIntegrationContent']->content_json ?? null;
    $industries = $sections['industriesContent']->content_json ?? null;
    $scalability = $sections['scalabilityContent']->content_json ?? null;
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
                {!! $hero['title'] ?? '' !!}
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                {!! $hero['subtitle'] ?? '' !!}
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @if(isset($hero['features']) && is_array($hero['features']))
                    @foreach($hero['features'] as $feature)
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        {{ $feature ?? '' }}
                    </span>
                    @endforeach
                @endif
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                @if(isset($hero['buttons']) && is_array($hero['buttons']))
                    @foreach($hero['buttons'] as $index => $button)
                        @if($index == 0)
                            <a href="{{ route('frontend.index').'#contact' }}" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                                {{ $button['text'] ?? 'Request Demo' }}
                            </a>
                        @else
                            <button onclick="{{ $button['action'] ?? 'openContactModal()' }}" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                                {{ $button['text'] ?? 'See It In Action' }}
                            </button>
                        @endif
                    @endforeach
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

<!-- What is Qubify VPS Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6">
                {!! $intro['title'] ?? '' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {!! $intro['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- Core Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if(isset($intro['features']) && is_array($intro['features']))
                @foreach($intro['features'] as $index => $feature)
                <div class="text-center">
                    <div class="w-16 h-16 
                        @if($index == 0) bg-blue-100 
                        @elseif($index == 1) bg-green-100 
                        @elseif($index == 2) bg-purple-100 
                        @else bg-orange-100 @endif
                        rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($index == 0)
                            <i class="fas fa-parking text-blue-600 text-2xl"></i>
                        @elseif($index == 1)
                            <i class="fas fa-camera text-green-600 text-2xl"></i>
                        @elseif($index == 2)
                            <i class="fas fa-credit-card text-purple-600 text-2xl"></i>
                        @else
                            <i class="fas fa-chart-line text-orange-600 text-2xl"></i>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $feature['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $feature['description'] ?? '' }}</p>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Core Capabilities Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $core_features['title'] ?? '' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {!! $core_features['subtitle'] ?? '' !!}
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            @if(isset($core_features['capabilities']) && is_array($core_features['capabilities']))
                @foreach($core_features['capabilities'] as $index => $capability)
                <!-- Capability Feature -->
                <div class="grid lg:grid-cols-2 gap-12 items-center {{ $index % 2 == 1 ? 'lg:flex-row-reverse' : '' }}">
                    <div class="{{ $index % 2 == 1 ? 'order-2 lg:order-1' : '' }}">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 
                                @if($index == 0) bg-blue-100 
                                @elseif($index == 1) bg-green-100 
                                @else bg-purple-100 @endif
                                rounded-lg flex items-center justify-center mr-3">
                                @if($index == 0)
                                    <i class="fas fa-parking text-blue-600"></i>
                                @elseif($index == 1)
                                    <i class="fas fa-camera text-green-600"></i>
                                @else
                                    <i class="fas fa-credit-card text-purple-600"></i>
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
                    
                    <div class="bg-white rounded-xl p-6 shadow-lg {{ $index % 2 == 1 ? 'order-1 lg:order-2' : '' }}">
                        <div class="bg-gradient-to-br 
                            @if($index == 0) from-blue-500 to-blue-600 
                            @elseif($index == 1) from-green-500 to-green-600 
                            @else from-purple-500 to-purple-600 @endif
                            text-white rounded-lg p-6">
                            <h4 class="text-lg font-semibold mb-4">{{ $capability['dashboard_title'] ?? '' }}</h4>
                            <div class="space-y-3">
                                @if(isset($capability['stats']) && is_array($capability['stats']))
                                    @foreach($capability['stats'] as $stat)
                                    <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                        <span>{{ $stat['label'] ?? '' }}</span>
                                        <span class="font-bold">{{ $stat['value'] ?? '' }}</span>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        
        <!-- Additional Features Grid -->
        @if(isset($core_features['additional_features']) && is_array($core_features['additional_features']))
        <div class="mt-20">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($core_features['additional_features'] as $index => $feature)
                    @if(isset($feature['title']) && $feature['title'])
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 
                            @if($index == 0) bg-indigo-100 
                            @elseif($index == 1) bg-teal-100 
                            @elseif($index == 2) bg-orange-100 
                            @elseif($index == 3) bg-pink-100 
                            @elseif($index == 4) bg-blue-100 
                            @else bg-red-100 @endif
                            rounded-lg flex items-center justify-center mb-4">
                            @if($index == 0)
                                <i class="fas fa-door-open text-indigo-600"></i>
                            @elseif($index == 1)
                                <i class="fas fa-tachometer-alt text-teal-600"></i>
                            @elseif($index == 2)
                                <i class="fas fa-chart-bar text-orange-600"></i>
                            @elseif($index == 3)
                                <i class="fas fa-bell text-pink-600"></i>
                            @elseif($index == 4)
                                <i class="fas fa-cogs text-blue-600"></i>
                            @else
                                <i class="fas fa-expand-arrows-alt text-red-600"></i>
                            @endif
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $feature['subtitle'] ?? '' }}</p>
                        <p class="text-gray-500 text-sm">{{ $feature['description'] ?? '' }}</p>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Hardware Integration Section -->
@if(isset($hardware_integration))
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $hardware_integration['title'] ?? '' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {!! $hardware_integration['description'] ?? '' !!}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
            @if(isset($hardware_integration['hardware_types']) && is_array($hardware_integration['hardware_types']))
                @foreach($hardware_integration['hardware_types'] as $index => $hardware)
                <div class="text-center p-6 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 
                        @if($index == 0) bg-blue-100 
                        @elseif($index == 1) bg-green-100 
                        @elseif($index == 2) bg-purple-100 
                        @elseif($index == 3) bg-orange-100 
                        @else bg-teal-100 @endif
                        rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($index == 0)
                            <i class="fas fa-camera text-blue-600 text-2xl"></i>
                        @elseif($index == 1)
                            <i class="fas fa-qrcode text-green-600 text-2xl"></i>
                        @elseif($index == 2)
                            <i class="fas fa-wifi text-purple-600 text-2xl"></i>
                        @elseif($index == 3)
                            <i class="fas fa-door-open text-orange-600 text-2xl"></i>
                        @else
                            <i class="fas fa-tv text-teal-600 text-2xl"></i>
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
@endif

<!-- Industries Section -->
@if(isset($industries))
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $industries['title'] ?? '' !!}
            </h2>
            <p class="text-lg text-gray-300">
                {!! $industries['description'] ?? '' !!}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @if(isset($industries['industries']) && is_array($industries['industries']))
                @foreach($industries['industries'] as $index => $industry)
                <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 
                        @if($index == 0) bg-blue-600 
                        @elseif($index == 1) bg-green-600 
                        @elseif($index == 2) bg-red-600 
                        @elseif($index == 3) bg-purple-600 
                        @elseif($index == 4) bg-yellow-600 
                        @elseif($index == 5) bg-indigo-600 
                        @elseif($index == 6) bg-orange-600 
                        @else bg-teal-600 @endif
                        rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($index == 0)
                            <i class="fas fa-building text-white text-xl"></i>
                        @elseif($index == 1)
                            <i class="fas fa-shopping-cart text-white text-xl"></i>
                        @elseif($index == 2)
                            <i class="fas fa-hospital text-white text-xl"></i>
                        @elseif($index == 3)
                            <i class="fas fa-landmark text-white text-xl"></i>
                        @elseif($index == 4)
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        @elseif($index == 5)
                            <i class="fas fa-city text-white text-xl"></i>
                        @elseif($index == 6)
                            <i class="fas fa-plane text-white text-xl"></i>
                        @else
                            <i class="fas fa-calendar-alt text-white text-xl"></i>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold mb-2">{{ $industry['title'] ?? '' }}</h3>
                    <p class="text-gray-300 text-sm">{{ $industry['description'] ?? '' }}</p>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endif

<!-- Scalability Section -->
@if(isset($scalability))
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $scalability['title'] ?? '' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {!! $scalability['description'] ?? '' !!}
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @if(isset($scalability['features']) && is_array($scalability['features']))
                @foreach($scalability['features'] as $index => $feature)
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 
                        @if($index == 0) bg-blue-100 
                        @elseif($index == 1) bg-green-100 
                        @else bg-purple-100 @endif
                        rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($index == 0)
                            <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                        @elseif($index == 1)
                            <i class="fas fa-layer-group text-green-600 text-2xl"></i>
                        @else
                            <i class="fas fa-globe text-purple-600 text-2xl"></i>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $feature['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $feature['description'] ?? '' }}</p>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endif

<!-- Testimonials Section -->
@if(isset($testimonials))
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $testimonials['title'] ?? '' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @if(isset($testimonials['testimonials']) && is_array($testimonials['testimonials']))
                @foreach($testimonials['testimonials'] as $index => $testimonial)
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 
                            @if($index == 0) bg-blue-100 
                            @elseif($index == 1) bg-green-100 
                            @else bg-purple-100 @endif
                            rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user 
                                @if($index == 0) text-blue-600 
                                @elseif($index == 1) text-green-600 
                                @else text-purple-600 @endif"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">{{ $testimonial['name'] ?? '' }}</h4>
                            <p class="text-gray-600 text-sm">{{ $testimonial['role'] ?? '' }}, {{ $testimonial['company'] ?? '' }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4 italic">
                        {{ $testimonial['review'] ?? '' }}
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
@endif

<!-- Final CTA Section -->
@if(isset($final_cta))
<section class="py-20 bg-gray-900 text-white relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-4xl font-bold mb-6">
                {!! $final_cta['title'] ?? '' !!}
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                {!! $final_cta['description'] ?? '' !!}
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @if(isset($final_cta['features']) && is_array($final_cta['features']))
                    @foreach($final_cta['features'] as $feature)
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        {{ $feature ?? '' }}
                    </span>
                    @endforeach
                @endif
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                @if(isset($final_cta['buttons']) && is_array($final_cta['buttons']))
                    @foreach($final_cta['buttons'] as $index => $button)
                        @if($index == 0)
                            <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                                {{ $button['text'] ?? '' }}
                            </a>
                        @else
                            <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                                {{ $button['text'] ?? '' }}
                            </a>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endif

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
    
    // VPS dashboard value animation on hover
    const dashboardCards = document.querySelectorAll('.bg-gradient-to-br');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const values = card.querySelectorAll('.font-bold');
            values.forEach(value => {
                if (value.textContent.includes('₹')) {
                    // Animate currency values
                    const currentValue = parseInt(value.textContent.replace(/[₹,]/g, ''));
                    const newValue = currentValue + Math.floor(Math.random() * 2000 - 1000);
                    value.textContent = '₹' + Math.max(0, newValue).toLocaleString();
                } else if (value.textContent.includes('/')) {
                    // Handle fraction values like "47/120"
                    const parts = value.textContent.split('/');
                    if (parts.length === 2) {
                        const available = parseInt(parts[0]);
                        const total = parseInt(parts[1]);
                        const newAvailable = Math.max(0, Math.min(available + Math.floor(Math.random() * 10 - 5), total));
                        value.textContent = newAvailable + '/' + total;
                    }
                } else if (value.textContent.includes('%')) {
                    // Handle percentage values
                    const currentValue = parseInt(value.textContent.replace('%', ''));
                    const newValue = Math.min(Math.max(currentValue + Math.floor(Math.random() * 6 - 3), 0), 100);
                    value.textContent = newValue + '%';
                } else if (value.textContent.includes('s')) {
                    // Handle time values in seconds
                    const currentValue = parseFloat(value.textContent.replace('s', ''));
                    const newValue = Math.max(currentValue + (Math.random() * 0.4 - 0.2), 0.1).toFixed(1);
                    value.textContent = newValue + 's';
                } else if (value.textContent.includes('hrs')) {
                    // Handle duration values
                    const currentValue = parseFloat(value.textContent.replace(' hrs', ''));
                    const newValue = Math.max(currentValue + (Math.random() * 0.8 - 0.4), 0.1).toFixed(1);
                    value.textContent = newValue + ' hrs';
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