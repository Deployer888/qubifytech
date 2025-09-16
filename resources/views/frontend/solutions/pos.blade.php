@extends('frontend.layouts.app')

@section('title')
POS - Point of Sale System - {{app_name()}}
@endsection

@section('content')

@php
    $hero = $sections['heroContent']->content_json ?? null;
    $intro = $sections['introContent']->content_json ?? null;
    $core_features = $sections['coreFeaturesContent']->content_json ?? null;
    $advanced_tools = $sections['advancedToolsContent']->content_json ?? null;
    $admin_control = $sections['adminControlContent']->content_json ?? null;
    $why_choose = $sections['whyChooseContent']->content_json ?? null;
    $industries = $sections['industriesContent']->content_json ?? null;
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
                {!! $hero['title'] ?? 'Smarter POS Software <br> for <br><span class="holographic">Modern Retail</span>' !!}
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                {!! $hero['subtitle'] ?? 'Qubify POS is a lightning-fast, fully customizable point-of-sale system that connects billing, inventory, and analytics into one secure, scalable platform—built on Laravel and ready for retail.' !!}
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
                        Touch-friendly interface
                    </span>
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        Real-time stock control
                    </span>
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        Multi-store performance tracking
                    </span>
                @endif
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    {{ $hero['buttons'][0]['text'] ?? '🔵 Get Started Now' }}
                </button>
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    {{ $hero['buttons'][1]['text'] ?? '⚪ Request a Demo' }}
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

<!-- What is Qubify POS Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6">
                {!! $intro['title'] ?? 'One System. <span class="text-blue-600">What Is Qubify POS?</span>' !!}
            </h2>
            <h3 class="text-4xl md:text-2xl font-bold text-gray-900 mb-6">
                {!! $intro['subtitle'] ?? 'One System. Total Store Control.' !!}
            </h3>
            <p class="text-xl text-gray-600 leading-relaxed mb-8">
                {!! $intro['description'] ?? 'Qubify POS isn\'t just a billing tool—it\'s your complete retail control center. Designed for speed and simplicity, it gives business owners and staff an intuitive way to process sales, track inventory, manage suppliers, and generate insights in real time.' !!}
            </p>
            <p class="text-lg text-gray-700 mb-8">
                {!! $intro['secondary_description'] ?? 'From general stores and pharmacies to electronics and fashion outlets, Qubify POS adapts to the needs of any modern shop floor—while staying easy to set up, use, and scale.' !!}
            </p>
            
            <div class="flex flex-wrap justify-center gap-4">
                @if(isset($intro['features']) && is_array($intro['features']))
                    @foreach($intro['features'] as $feature)
                    <span class="px-6 py-3 bg-blue-50 text-blue-700 rounded-full font-medium">
                        {{ $feature }}
                    </span>
                    @endforeach
                @else
                    <span class="px-6 py-3 bg-blue-50 text-blue-700 rounded-full font-medium">
                        ✅ Self-hosted and one-time setup
                    </span>
                    <span class="px-6 py-3 bg-green-50 text-green-700 rounded-full font-medium">
                        ✅ Offline-friendly with auto-sync
                    </span>
                    <span class="px-6 py-3 bg-purple-50 text-purple-700 rounded-full font-medium">
                        ✅ GST-compliant and barcode-ready
                    </span>
                @endif
            </div>
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
                {{ $core_features['description'] ?? 'Everything you need for complete retail management' }}
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            @if(isset($core_features['capabilities']) && is_array($core_features['capabilities']))
                @foreach($core_features['capabilities'] as $index => $capability)
                    @if($index < 3)
                    <!-- {{ $capability['title'] ?? 'Feature' }} -->
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        @if($index % 2 == 0)
                        <div>
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-{{ $index == 0 ? 'blue' : ($index == 1 ? 'green' : 'purple') }}-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-{{ $index == 0 ? 'cash-register' : ($index == 1 ? 'boxes' : 'users') }} text-{{ $index == 0 ? 'blue' : ($index == 1 ? 'green' : 'purple') }}-600"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $capability['title'] ?? 'Feature Title' }}</h3>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $capability['subtitle'] ?? 'Feature Subtitle' }}</h4>
                            <p class="text-gray-600 mb-4">
                                {{ $capability['description'] ?? 'Feature description' }}
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
                            <div class="bg-gradient-to-br from-{{ $index == 0 ? 'blue' : ($index == 1 ? 'green' : 'purple') }}-500 to-{{ $index == 0 ? 'blue' : ($index == 1 ? 'green' : 'purple') }}-600 text-white rounded-lg p-6">
                                <h4 class="text-lg font-semibold mb-4">{{ $index == 0 ? 'Sales Performance' : ($index == 1 ? 'Inventory Status' : 'Customer Analytics') }}</h4>
                                <div class="space-y-3">
                                    @if(isset($capability['stats']) && is_array($capability['stats']))
                                        @foreach($capability['stats'] as $stat)
                                        <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                            <span>{{ $stat['label'] ?? 'Label' }}</span>
                                            <span class="font-bold {{ isset($stat['highlight']) && $stat['highlight'] ? 'text-orange-300' : '' }}">{{ $stat['value'] ?? 'Value' }}</span>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="order-2 lg:order-1 bg-white rounded-xl p-6 shadow-lg">
                            <div class="bg-gradient-to-br from-{{ $index == 0 ? 'blue' : ($index == 1 ? 'green' : 'purple') }}-500 to-{{ $index == 0 ? 'blue' : ($index == 1 ? 'green' : 'purple') }}-600 text-white rounded-lg p-6">
                                <h4 class="text-lg font-semibold mb-4">{{ $index == 0 ? 'Sales Performance' : ($index == 1 ? 'Inventory Status' : 'Customer Analytics') }}</h4>
                                <div class="space-y-3">
                                    @if(isset($capability['stats']) && is_array($capability['stats']))
                                        @foreach($capability['stats'] as $stat)
                                        <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                            <span>{{ $stat['label'] ?? 'Label' }}</span>
                                            <span class="font-bold {{ isset($stat['highlight']) && $stat['highlight'] ? 'text-orange-300' : '' }}">{{ $stat['value'] ?? 'Value' }}</span>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="order-1 lg:order-2">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-{{ $index == 0 ? 'blue' : ($index == 1 ? 'green' : 'purple') }}-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-{{ $index == 0 ? 'cash-register' : ($index == 1 ? 'boxes' : 'users') }} text-{{ $index == 0 ? 'blue' : ($index == 1 ? 'green' : 'purple') }}-600"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $capability['title'] ?? 'Feature Title' }}</h3>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $capability['subtitle'] ?? 'Feature Subtitle' }}</h4>
                            <p class="text-gray-600 mb-4">
                                {{ $capability['description'] ?? 'Feature description' }}
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
                    @endif
                @endforeach
            @else
            <!-- Fallback content if no dynamic data -->
            <!-- Fast Checkout & Sales Processing -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-cash-register text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Fast Checkout & Sales Processing</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Speed is Everything at the Counter</h4>
                    <p class="text-gray-600 mb-4">
                        Qubify POS offers rapid billing, multi-mode payments, and custom invoices—all with touch-optimized controls and barcode scanning. Print, email, or export receipts instantly without delay.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Rapid billing with touch controls
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Multi-mode payment processing
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Instant receipt generation
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Sales Performance</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Today's Sales</span>
                                <span class="font-bold">₹18,750</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Transactions</span>
                                <span class="font-bold">127</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Avg. Transaction</span>
                                <span class="font-bold">₹148</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        
        <!-- Additional Features Grid -->
        @if(isset($core_features['capabilities']) && is_array($core_features['capabilities']) && count($core_features['capabilities']) > 3)
        <div class="mt-20">
            <div class="grid md:grid-cols-2 gap-8">
                @foreach(array_slice($core_features['capabilities'], 3, 2) as $index => $capability)
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-{{ $index == 0 ? 'indigo' : 'teal' }}-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-{{ $index == 0 ? 'store' : 'chart-bar' }} text-{{ $index == 0 ? 'indigo' : 'teal' }}-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $capability['title'] ?? 'Feature Title' }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $capability['subtitle'] ?? 'Feature Subtitle' }}</p>
                    <p class="text-gray-500 text-sm">{{ $capability['description'] ?? 'Feature description' }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Advanced Tools Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $advanced_tools['title'] ?? 'Advanced Tools That Set <span class="text-blue-600">Qubify Apart</span>' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if(isset($advanced_tools['tools']) && is_array($advanced_tools['tools']))
                @foreach($advanced_tools['tools'] as $index => $tool)
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-{{ ['blue', 'green', 'purple', 'orange', 'teal', 'red'][$index % 6] }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-{{ ['barcode', 'undo', 'truck', 'cash-register', 'file-invoice', 'cogs'][$index % 6] }} text-{{ ['blue', 'green', 'purple', 'orange', 'teal', 'red'][$index % 6] }}-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $tool['title'] ?? 'Tool Title' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $tool['description'] ?? 'Tool description' }}</p>
                </div>
                @endforeach
            @else
                <!-- Fallback content -->
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-barcode text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Built-In Barcode Scanning</h3>
                    <p class="text-gray-600 text-sm">Scan, search, and bill products instantly with integrated barcode recognition.</p>
                </div>
                
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-undo text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Return & Refund Handling</h3>
                    <p class="text-gray-600 text-sm">Manage product exchanges, issue refunds, and log returns with proper transaction references.</p>
                </div>
                
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Purchase & Stock-In Management</h3>
                    <p class="text-gray-600 text-sm">Create purchase orders and log incoming stock with full visibility from supplier to shelf.</p>
                </div>
                
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-cash-register text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Cash Register & Expense Logs</h3>
                    <p class="text-gray-600 text-sm">Open and close the day with complete tracking of cash flow, cash-in, cash-out, and petty expenses.</p>
                </div>
                
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-invoice text-teal-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Custom Invoicing & GST Setup</h3>
                    <p class="text-gray-600 text-sm">Personalize invoices with your branding. Configure tax rules and GST slabs per product category.</p>
                </div>
                
                <div class="text-center p-8 bg-gray-50 rounded-xl">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-cogs text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Admin Control Center</h3>
                    <p class="text-gray-600 text-sm">Powerful admin panel to configure operations, manage users, and customize workflows.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Admin Control Center Section -->
<section class="py-24 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-40 h-40 bg-blue-500 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-32 h-32 bg-indigo-500 rounded-full blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-slate-500 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-5xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $admin_control['title'] ?? '<span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-slate-600 bg-clip-text text-transparent">Scalable Back-End Management</span>' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $admin_control['description'] ?? 'Qubify POS comes with a powerful admin panel to configure every aspect of your operations.' }}
            </p>
        </div>

        <!-- Main Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @if(isset($admin_control['features']) && is_array($admin_control['features']))
                @foreach($admin_control['features'] as $index => $feature)
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-{{ ['blue', 'green', 'purple', 'orange', 'teal', 'pink'][$index % 6] }}-500 to-{{ ['blue', 'green', 'purple', 'orange', 'teal', 'pink'][$index % 6] }}-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($index == 0)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            @elseif($index == 1)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            @elseif($index == 2)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            @elseif($index == 3)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                            @elseif($index == 4)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                            @endif
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $feature['title'] ?? 'Feature Title' }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $feature['description'] ?? 'Feature description' }}
                    </p>
                    @if(isset($feature['tags']) && is_array($feature['tags']))
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach(array_filter($feature['tags']) as $tag)
                        <span class="px-3 py-1 bg-{{ ['blue', 'green', 'purple', 'orange', 'teal', 'pink'][$index % 6] }}-50 text-{{ ['blue', 'green', 'purple', 'orange', 'teal', 'pink'][$index % 6] }}-700 rounded-full text-sm font-medium">{{ $tag }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
            @else
                <!-- Fallback content -->
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">User Management</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Create and manage users with role-based permissions
                    </p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">Role-Based Access</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">User Permissions</span>
                    </div>
                </div>
            @endif
        </div>

    </div>
</section>

<!-- Why Stores Choose Qubify POS Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $why_choose['title'] ?? 'Why Stores Choose <span class="text-blue-600">Qubify POS</span>' !!}
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if(isset($why_choose['reasons']) && is_array($why_choose['reasons']))
                @foreach($why_choose['reasons'] as $index => $reason)
                <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                    <div class="w-16 h-16 bg-{{ ['blue', 'green', 'purple', 'orange'][$index % 4] }}-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-{{ ['code', 'dollar-sign', 'wifi', 'shield-alt'][$index % 4] }} text-{{ ['blue', 'green', 'purple', 'orange'][$index % 4] }}-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $reason['title'] ?? 'Reason Title' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $reason['description'] ?? 'Reason description' }}</p>
                </div>
                @endforeach
            @else
                <!-- Fallback content -->
                <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-code text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Built on Laravel</h3>
                    <p class="text-gray-600 text-sm">100% Laravel-powered front and back end—fully customizable, extendable, and secure for developers and businesses alike.</p>
                </div>
                
                <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-dollar-sign text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">No Monthly Fees</h3>
                    <p class="text-gray-600 text-sm">You own your system. One-time setup. Unlimited use. No recurring charges or limitations.</p>
                </div>
                
                <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-wifi text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Works Online & Offline</h3>
                    <p class="text-gray-600 text-sm">Auto-syncs data when internet returns—so your store never stops, even if your Wi-Fi does.</p>
                </div>
                
                <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Secure & Role-Based</h3>
                    <p class="text-gray-600 text-sm">Activity logs, role-based access, and encrypted credentials ensure operations stay safe from all risks.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Industries Served Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $industries['title'] ?? 'Industries <span class="text-blue-400">Served</span>' !!}
            </h2>
            <p class="text-lg text-gray-300">
                {{ $industries['description'] ?? 'Whatever you sell, Qubify POS is designed to handle it—with the speed and clarity today\'s retailers need.' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if(isset($industries['industries']) && is_array($industries['industries']))
                @foreach($industries['industries'] as $index => $industry)
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-{{ ['blue', 'green', 'orange', 'purple', 'red', 'teal'][$index % 6] }}-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-{{ ['shopping-cart', 'pills', 'coffee', 'mobile-alt', 'tshirt', 'boxes'][$index % 6] }} text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">{{ $industry['title'] ?? 'Industry Title' }}</h3>
                    <p class="text-gray-300 text-sm">{{ $industry['description'] ?? 'Industry description' }}</p>
                </div>
                @endforeach
            @else
                <!-- Fallback content -->
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shopping-cart text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Retail & General Stores</h3>
                    <p class="text-gray-300 text-sm">Complete solution for everyday retail operations</p>
                </div>
                
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-pills text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Pharmacies & Chemists</h3>
                    <p class="text-gray-300 text-sm">Specialized features for pharmaceutical retail</p>
                </div>
                
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-coffee text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Cafés & Quick-Service</h3>
                    <p class="text-gray-300 text-sm">Fast-paced restaurant and café management</p>
                </div>
                
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-mobile-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Mobile & Electronics</h3>
                    <p class="text-gray-300 text-sm">Electronics retail with warranty tracking</p>
                </div>
                
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tshirt text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Fashion & Apparel</h3>
                    <p class="text-gray-300 text-sm">Size and variant management for fashion retail</p>
                </div>
                
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-boxes text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">FMCG Wholesalers</h3>
                    <p class="text-gray-300 text-sm">Bulk operations and distributor management</p>
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
                {!! $final_cta['title'] ?? 'Simplify Your Store. <span class="text-blue-400">Supercharge Your Sales.</span>' !!}
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                {{ $final_cta['description'] ?? 'From fast checkouts to real-time analytics, Qubify POS gives your team the tools to serve better, sell smarter, and grow faster.' }}
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
                        ✅ No subscription fees
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        ✅ Works across devices
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        ✅ Secure, scalable, and retail-ready
                    </span>
                @endif
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    {{ $final_cta['buttons'][0]['text'] ?? '🚀 Get Started with Qubify POS' }}
                </button>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    {{ $final_cta['buttons'][1]['text'] ?? '📞 Talk to Our Team' }}
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
    
    // POS dashboard value animation on hover
    const dashboardCards = document.querySelectorAll('.bg-gradient-to-br');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const values = card.querySelectorAll('.font-bold');
            values.forEach(value => {
                if (value.textContent.includes('₹')) {
                    // Animate currency values
                    const currentValue = parseInt(value.textContent.replace(/[₹,L]/g, ''));
                    const newValue = currentValue + Math.floor(Math.random() * 5000 - 2500);
                    if (value.textContent.includes('L')) {
                        value.textContent = '₹' + (Math.max(0, newValue) / 1000).toFixed(1) + 'L';
                    } else {
                        value.textContent = '₹' + Math.max(0, newValue).toLocaleString();
                    }
                } else if (!isNaN(parseInt(value.textContent))) {
                    // Handle numeric values
                    const currentValue = parseInt(value.textContent);
                    const newValue = currentValue + Math.floor(Math.random() * 20 - 10);
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