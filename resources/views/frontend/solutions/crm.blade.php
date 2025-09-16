@extends('frontend.layouts.app')

@section('title')
CRM - Customer Relationship Management - {{app_name()}}
@endsection

@section('content')

@php
    $hero = $sections['heroContent']->content_json ?? null;
    $intro = $sections['introContent']->content_json ?? null;
    $core_features = $sections['coreFeaturesContent']->content_json ?? null;
    $why_trust = $sections['whyTrustContent']->content_json ?? null;
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
                <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    {{ $hero['buttons'][0]['text'] ?? '🔵 Start Free Trial' }}
                </button>
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    {{ $hero['buttons'][1]['text'] ?? '⚪ Schedule a Demo' }}
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

<!-- What is Qubify CRM Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6">
                {!! $intro['title'] ?? '' !!}
            </h2>
            <h3 class="text-4xl md:text-2xl font-bold text-gray-900 mb-6">
                {!! $intro['subtitle'] ?? '' !!}
            </h3>
            <p class="text-xl text-gray-600 leading-relaxed mb-8">
                {!! $intro['description'] ?? '' !!}
            </p>
            <p class="text-lg text-gray-700">
                {!! $intro['additional_description'] ?? '' !!}
            </p>
        </div>
        
        <!-- Core Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
            @if(isset($intro['features']) && is_array($intro['features']))
                @foreach($intro['features'] as $index => $feature)
                <div class="text-center">
                    @if($index == 0)
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-blue-600 text-2xl"></i>
                    </div>
                    @elseif($index == 1)
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-invoice text-green-600 text-2xl"></i>
                    </div>
                    @elseif($index == 2)
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-project-diagram text-purple-600 text-2xl"></i>
                    </div>
                    @elseif($index == 3)
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-orange-600 text-2xl"></i>
                    </div>
                    @else
                    <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-teal-600 text-2xl"></i>
                    </div>
                    @endif
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
                {!! $core_features['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            @if(isset($core_features['capabilities']) && is_array($core_features['capabilities']) && count($core_features['capabilities']) > 0)
            <!-- Feature 1 -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="{{ $core_features['capabilities'][0]['icon'] ?? 'fas fa-users' }} text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $core_features['capabilities'][0]['title'] ?? '' }}</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $core_features['capabilities'][0]['subtitle'] ?? '' }}</h4>
                    <p class="text-gray-600 mb-4">
                        {{ $core_features['capabilities'][0]['description'] ?? '' }}
                    </p>
                    @if(isset($core_features['capabilities'][0]['features']) && is_array($core_features['capabilities'][0]['features']))
                    <ul class="space-y-2">
                        @foreach($core_features['capabilities'][0]['features'] as $benefit)
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            {{ $benefit }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">{{ $core_features['capabilities'][0]['dashboard']['title'] ?? '' }}</h4>
                        <div class="space-y-3">
                            @if(isset($core_features['capabilities'][0]['dashboard']) && is_array($core_features['capabilities'][0]['dashboard']))
                                @foreach($core_features['capabilities'][0]['dashboard']['stats'] as $stat)
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
        
            @endif
            
            @if(isset($core_features['capabilities']) && is_array($core_features['capabilities']) && count($core_features['capabilities']) > 1)
            <!-- Feature 2 -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">{{ $core_features['capabilities'][1]['dashboard']['title'] ?? 'Invoice Generator' }}</h4>
                        <div class="space-y-3">
                            @if(isset($core_features['capabilities'][1]['dashboard']['stats']) && is_array($core_features['capabilities'][1]['dashboard']['stats']))
                                @foreach($core_features['capabilities'][1]['dashboard']['stats'] as $stat)
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
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="{{ $core_features['capabilities'][1]['icon'] ?? 'fas fa-file-invoice' }} text-green-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $core_features['capabilities'][1]['title'] ?? '🔹 Proforma Invoicing & Billing' }}</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $core_features['capabilities'][1]['subtitle'] ?? 'Professional Billing Made Simple' }}</h4>
                    <p class="text-gray-600 mb-4">
                        {{ $core_features['capabilities'][1]['description'] ?? 'Send branded quotes, invoices, and receipts in seconds. You can convert estimates into projects or recurring invoices automatically. Built-in support for PayPal, Stripe, Paytm, and multi-currency payments makes it ideal for global teams. Dues and transactions are tracked in real time.' }}
                    </p>
                    @if(isset($core_features['capabilities'][1]['features']) && is_array($core_features['capabilities'][1]['features']))
                    <ul class="space-y-2">
                        @foreach($core_features['capabilities'][1]['features'] as $benefit)
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            {{ $benefit }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
      
            @endif
            
            @if(isset($core_features['capabilities']) && is_array($core_features['capabilities']) && count($core_features['capabilities']) > 2)
            <!-- Feature 3 -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="{{ $core_features['capabilities'][2]['icon'] ?? 'fas fa-user-tie' }} text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $core_features['capabilities'][2]['title'] ?? '' }}</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $core_features['capabilities'][2]['subtitle'] ?? 'All Your People, One Platform' }}</h4>
                    <p class="text-gray-600 mb-4">
                        {{ $core_features['capabilities'][2]['description'] ?? '' }}
                    </p>
                    @if(isset($core_features['capabilities'][2]['features']) && is_array($core_features['capabilities'][2]['features']))
                    <ul class="space-y-2">
                        @foreach($core_features['capabilities'][2]['features'] as $benefit)
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            {{ $benefit }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">{{ $core_features['capabilities'][2]['dashboard']['title'] ?? 'HR Dashboard' }}</h4>
                        <div class="space-y-3">
                            @if(isset($core_features['capabilities'][2]['dashboard']['stats']) && is_array($core_features['capabilities'][2]['dashboard']['stats']))
                                @foreach($core_features['capabilities'][2]['dashboard']['stats'] as $stat)
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
            @endif
        </div>
        
        <!-- Additional Features Grid -->
        <div class="mt-20">
            <div class="grid md:grid-cols-2 gap-8">
                @if(isset($core_features['capabilities']) && is_array($core_features['capabilities']))
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-project-diagram text-indigo-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$core_features['capabilities'][3]['title'] ?? ''}}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{$core_features['capabilities'][3]['subtitle'] ?? ''}}</p>
                        <p class="text-gray-500 text-sm">{{$core_features['capabilities'][3]['description'] ?? ''}}</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-headset text-teal-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$core_features['capabilities'][4]['title'] ?? ''}}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{$core_features['capabilities'][4]['subtitle'] ?? ''}}</p>
                        <p class="text-gray-500 text-sm">{{$core_features['capabilities'][4]['description'] ?? ''}}</p>
                    </div> 
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Why Teams Trust Qubify CRM Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $why_trust['title'] ?? ' SaWhy Teams Trust <span class="text-blue-600">Qubify CRM</span>' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if(isset($why_trust['why_trust']) && is_array($why_trust['why_trust']))
                @foreach($why_trust['why_trust'] as $index => $benefit)
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    @if($index == 0)
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-layer-group text-blue-600 text-2xl"></i>
                    </div>
                    @elseif($index == 1)
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bolt text-green-600 text-2xl"></i>
                    </div>
                    @elseif($index == 2)
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-sync-alt text-purple-600 text-2xl"></i>
                    </div>
                    @else
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-expand-arrows-alt text-orange-600 text-2xl"></i>
                    </div>
                    @endif
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $benefit['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $benefit['description'] ?? '' }}</p>
                </div>
                @endforeach

            @endif
        </div>
    </div>
</section>

<!-- Perfect for Teams Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $use_cases['title'] ?? 'Qubify CRM is Perfect for Teams That Want <span class="text-blue-400">Speed, Clarity, and Control</span>' !!}
            </h2>
            <p class="text-lg text-gray-300">
                {!! $use_cases['description'] ?? 'Each team gets exactly what they need—without extra tools or learning curves.' !!}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
            @if(isset($use_cases['use_cases']) && is_array($use_cases['use_cases']))
                @foreach($use_cases['use_cases'] as $index => $case)
                <div class="text-center">
                    @if($index == 0)
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-rocket text-white text-xl"></i>
                    </div>
                    @elseif($index == 1)
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-palette text-white text-xl"></i>
                    </div>
                    @elseif($index == 2)
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-home text-white text-xl"></i>
                    </div>
                    @elseif($index == 3)
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-briefcase text-white text-xl"></i>
                    </div>
                    @else
                    <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-building text-white text-xl"></i>
                    </div>
                    @endif
                    <h3 class="text-lg font-semibold mb-2">{{ $case['title'] ?? '' }}</h3>
                    <p class="text-gray-400 text-sm">{{ $case['description'] ?? '' }}</p>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Real Results Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $testimonials['title'] ?? 'Real <span class="text-blue-600">Results</span>' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @if(isset($testimonials['testimonials']) && is_array($testimonials['testimonials']))
                @foreach($testimonials['testimonials'] as $index => $testimonial)
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 {{ $testimonial['bg_color'] ?? 'bg-blue-100' }} rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user {{ $testimonial['icon_color'] ?? 'text-blue-600' }}"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">{{ $testimonial['name'] ?? '' }}</h4>
                            <p class="text-gray-600 text-sm">{{ $testimonial['role'] ?? '' }}{{ isset($testimonial['company']) ? ', ' . $testimonial['company'] : '' }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4 italic">
                        "{{ $testimonial['review'] ?? '' }}"
                    </p>
                    <div class="flex text-yellow-400">
                        @for($i = 0; $i < ($testimonial['rating'] ?? 5); $i++)
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
                {!! $cta['title'] ?? 'Streamline Your Workflow.<br><span class="text-blue-400">Simplify</span> Your Stack.' !!}
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                {!! $cta['description'] ?? 'From the first lead to the final invoice, Qubify CRM keeps your team in sync and your business on track.' !!}
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @if(isset($cta['features']) && is_array($cta['features']))
                    @foreach($cta['features'] as $feature)
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        {{ $feature ?? '' }}
                    </span>
                    @endforeach
                @else
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        🛠 Deployed in minutes
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        📱 Web, mobile & desktop access
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        🔐 Encrypted & role-based access control
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        🎯 No bloat. Just smart business software.
                    </span>
                @endif
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    {{ $cta['buttons'][0]['text'] ?? '🚀 Try It Free Today' }}
                </button>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    {{ $cta['buttons'][1]['text'] ?? '📞 Request a Call' }}
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
    
    // CRM dashboard value animation on hover
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
                } else if (value.textContent.includes('%')) {
                    // Handle percentage values
                    const currentValue = parseInt(value.textContent.replace('%', ''));
                    const newValue = Math.min(Math.max(currentValue + Math.floor(Math.random() * 6 - 3), 0), 100);
                    value.textContent = newValue + '%';
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