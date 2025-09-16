@extends('frontend.layouts.app')

@section('title')
Custom Software Development Services - {{app_name()}}
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: var(--bg-hero);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="floating-shape absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl floating"></div>
        <div class="floating-shape absolute top-40 right-20 w-32 h-32 bg-purple-400/20 rounded-full blur-2xl floating" style="animation-delay: 1s;"></div>
        <div class="floating-shape absolute bottom-32 left-1/4 w-24 h-24 bg-green-400/20 rounded-full blur-xl floating" style="animation-delay: 2s;"></div>
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
                 {!! $heroContent->content_json['title'] ?? '' !!}
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                {!! $heroContent->content_json['subtitle'] ?? '' !!}
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @foreach($heroContent->content_json['features'] as $feature)
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                   {{$feature ?? ''}}
                </span>
                @endforeach
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    {{$heroContent->content_json['buttons'][0]['text'] ?? ''}}
                </button>
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                   {{$heroContent->content_json['buttons'][1]['text'] ?? ''}}
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
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(139, 92, 246, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Main Title -->
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                <!-- Custom Software Development Services <br>
                <span class="bg-gradient-to-r from-purple-600 to-blue-700 bg-clip-text text-transparent">That are AI-Driven</span> -->
                {!! $introContent->content_json['title'] ?? '' !!}
            </h2>
            
            <!-- Description -->
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-16 max-w-4xl mx-auto font-light">
                {!! $introContent->content_json['description'] ?? '' !!}
            </p>
            
            <!-- Feature Cards -->
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">{{$introContent->content_json['features'][0]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 leading-relaxed">{{$introContent->content_json['features'][0]['description'] ?? ''}}</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">{{$introContent->content_json['features'][1]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 leading-relaxed">{{$introContent->content_json['features'][1]['description'] ?? ''}}</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">{{$introContent->content_json['features'][2]['title'] ?? ''}}</h3>
                    <p class="text-gray-600 leading-relaxed">{{$introContent->content_json['features'][2]['description'] ?? ''}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Services Section -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-30">
        <div class="absolute top-20 left-20 w-2 h-2 bg-purple-400 rounded-full animate-ping"></div>
        <div class="absolute top-40 right-32 w-3 h-3 bg-blue-400 rounded-full animate-pulse"></div>
        <div class="absolute bottom-32 left-1/3 w-2 h-2 bg-green-400 rounded-full animate-ping" style="animation-delay: 1s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-4xl font-bold text-gray-900 mb-6">
                <!-- Our Custom Software <span class="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">Development Services</span> -->
                 {!! $coreServicesContent->content_json['title'] ?? ''!!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $coreServicesContent->content_json['subtitle'] ?? '' }}
                <!-- Comprehensive software development solutions tailored to your business needs -->
            </p>
        </div>
        
        <!-- Services Stack -->
        <div class="max-w-5xl mx-auto space-y-12">
            
            <!-- Service 1: Custom Software Development -->
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex flex-col lg:flex-row">
                        <!-- Content Section -->
                        <div class="lg:w-3/5 p-12">
                            <div class="flex items-start mb-8">
                                <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $coreServicesContent->content_json['services'][0]['title'] ?? '' }}</h3>
                                    <p class="text-purple-600 font-semibold text-lg">{{ $coreServicesContent->content_json['services'][0]['subtitle'] ?? '' }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            {!! $coreServicesContent->content_json['services'][0]['description'] ?? '' !!}
                            </p>
                            <div class="flex flex-wrap gap-3">
                                @foreach($coreServicesContent->content_json['services'][0]['features'] as $feature)
                                <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">{{ $feature ?? ''}}</span>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-purple-500 to-purple-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Development Metrics</h4>
                                <div class="space-y-4">
                                    @foreach($coreServicesContent->content_json['services'][0]['stats'] as $stat)
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">{{$stat['label'] ?? ''}}</span>
                                        <span class="text-white text-3xl font-bold">{{$stat['value'] ?? ''}}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Service 2: Enterprise Software Development -->
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex flex-col lg:flex-row-reverse">
                        <!-- Content Section -->
                        <div class="lg:w-3/5 p-12">
                            <div class="flex items-start mb-8">
                                <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $coreServicesContent->content_json['services'][1]['title'] ?? '' }}</h3>
                                    <p class="text-blue-600 font-semibold text-lg">{{ $coreServicesContent->content_json['services'][1]['subtitle'] ?? '' }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            {!! $coreServicesContent->content_json['services'][1]['description'] ?? '' !!}
                            </p>
                            <div class="flex flex-wrap gap-3">
                                @foreach($coreServicesContent->content_json['services'][1]['features'] as $feature)
                                <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">{{ $feature ?? ''}}</span>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-blue-500 to-blue-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Enterprise Benefits</h4>
                                <div class="space-y-4">
                                    @foreach($coreServicesContent->content_json['services'][1]['stats'] as $stat)
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">{{$stat['label'] ?? ''}}</span>
                                        <span class="text-white text-3xl font-bold">{{$stat['value'] ?? ''}}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Service 3: Software Product Development -->
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex flex-col lg:flex-row">
                        <!-- Content Section -->
                        <div class="lg:w-3/5 p-12">
                            <div class="flex items-start mb-8">
                                <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $coreServicesContent->content_json['services'][2]['title'] ?? '' }}</h3>
                                    <p class="text-green-600 font-semibold text-lg">{{ $coreServicesContent->content_json['services'][2]['subtitle'] ?? '' }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                            {!! $coreServicesContent->content_json['services'][2]['description'] ?? '' !!}
                            </p>
                            <div class="flex flex-wrap gap-3">
                                @foreach($coreServicesContent->content_json['services'][2]['features'] as $feature)
                                <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">{{ $feature ?? ''}}</span>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-green-500 to-green-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Product Success</h4>
                                <div class="space-y-4">
                                @foreach($coreServicesContent->content_json['services'][2]['stats'] as $stat)
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">{{$stat['label'] ?? ''}}</span>
                                        <span class="text-white text-3xl font-bold">{{$stat['value'] ?? ''}}</span>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Additional Services Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $additionalServicesContent['content_json']['title'] ?? '' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {{ $additionalServicesContent['content_json']['subtitle'] ?? '' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($additionalServicesContent['content_json']['services'] ?? [] as $key=>$service)
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    @if($key == 0)
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    @elseif($key == 1)
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                    </div>
                    @elseif($key == 2)
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                    </div>
                    @else
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    @endif
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        {{ $service['title'] ?? '' }}
                    </h3>
                    {{-- <p class="text-gray-600 text-sm mb-3">{{ $service['tagline'] ?? '' }}</p> --}}
                    <p class="text-gray-500 text-sm">
                        {{ $service['description'] ?? '' }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Specialized Services Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-white to-purple-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-3 h-3 bg-purple-400 rounded-full animate-pulse"></div>
        <div class="absolute top-60 right-32 w-2 h-2 bg-blue-400 rounded-full animate-ping"></div>
        <div class="absolute bottom-40 left-1/3 w-4 h-4 bg-green-400 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-orange-400 rounded-full animate-ping" style="animation-delay: 2s;"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-5xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $specializedServicesContent['content_json']['title'] ?? '' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $specializedServicesContent['content_json']['description'] ?? '' }}
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @php
                $icons = [
                    // Software Implementation Services
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>',
                    // UX/UI Design
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                    </svg>',
                    // API Integrations
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                    </svg>',
                    // Software Modernization Services
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>',
                    // Tech Advisory
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>',
                    // Industry-Specific Software Solutions
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>',
                ];
                $colors = [
                    'from-purple-500 to-purple-600',
                    'from-blue-500 to-blue-600',
                    'from-green-500 to-green-600',
                    'from-orange-500 to-orange-600',
                    'from-teal-500 to-teal-600',
                    'from-indigo-500 to-indigo-600',
                ];
            @endphp

            @foreach($specializedServicesContent['content_json']['services'] ?? [] as $index => $service)
                <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3">
                    <div class="w-16 h-16 bg-gradient-to-br {{ $colors[$index] ?? 'from-gray-500 to-gray-600' }} rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        {!! $icons[$index] ?? '' !!}
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">
                        {{ $service['title'] ?? '' }}
                    </h3>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        {{ $service['description'] ?? '' }}
                    </p> 
                    <div class="flex flex-wrap gap-2 justify-center">
                        @foreach($service['tags'] ?? [] as $key=>$tag)
                            <span class="px-3 py-1  {{$key == 0 ? 'bg-purple-50 text-purple-700' : ($key == 1 ? 'bg-blue-50 text-blue-700' : ($key == 2 ? 'bg-green-50 text-green-700' : ($key == 0 ? 'bg-orange-50 text-orange-700': ($key == 0 ? 'bg-teal-50 text-teal-700' : 'bg-indigo-50 text-indigo-700'))))}} rounded-full text-sm font-medium">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Technology Stack Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $technologyStackContent->content_json['title'] ?? 'We Use the Latest Tech Stack' !!}
            </h2>
            <p class="text-lg text-gray-300">
                {{ $technologyStackContent->content_json['subtitle'] ?? 'Cutting-edge technologies for modern software development' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $iconColors = [
                    'bg-blue-600' => 'bg-blue-600/20 text-blue-300',
                    'bg-green-600' => 'bg-green-600/20 text-green-300',
                    'bg-purple-600' => 'bg-purple-600/20 text-purple-300',
                    'bg-orange-600' => 'bg-orange-600/20 text-orange-300',
                    'bg-cyan-600' => 'bg-cyan-600/20 text-cyan-300',
                    'bg-teal-600' => 'bg-teal-600/20 text-teal-300',
                    'bg-red-600' => 'bg-red-600/20 text-red-300',
                    'bg-pink-600' => 'bg-pink-600/20 text-pink-300',
                    'bg-indigo-600' => 'bg-indigo-600/20 text-indigo-300',
                    'bg-yellow-600' => 'bg-yellow-600/20 text-yellow-300'
                ];
                
                $iconClasses = ['bg-blue-600', 'bg-green-600', 'bg-purple-600', 'bg-orange-600', 'bg-cyan-600', 'bg-teal-600', 'bg-red-600', 'bg-pink-600', 'bg-indigo-600', 'bg-yellow-600'];
                
                $icons = [
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path></svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>'
                ];
            @endphp
            
            @foreach($technologyStackContent->content_json['technologies'] ?? [] as $index => $technology)
                @php
                    $iconClass = $iconClasses[$index % count($iconClasses)];
                    $tagClass = $iconColors[$iconClass];
                @endphp
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 {{ $iconClass }} rounded-full flex items-center justify-center mx-auto mb-4">
                        {!! $icons[$index % count($icons)] !!}
                    </div>
                    <h3 class="text-lg font-semibold mb-3">{{ $technology['title'] ?? '' }}</h3>
                    <p class="text-gray-300 text-sm mb-4">{{ $technology['description'] ?? '' }}</p>
                    <div class="flex flex-wrap gap-2 justify-center">
                        @foreach($technology['tags'] ?? [] as $tag)
                            <span class="px-2 py-1 {{ $tagClass }} rounded text-xs">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Custom Software Development Services Process Section -->
<section class="py-24 bg-gradient-to-br from-white via-gray-50 to-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(99, 102, 241, 0.3) 1px, transparent 0); background-size: 50px 50px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-5xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $processContent->content_json['title'] ?? 'Custom Software Development Services Process' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $processContent->content_json['subtitle'] ?? 'We have a proven approach for creating custom software that enables us to create software that is precisely tailored to your operations and business objectives.' }}
            </p>
        </div>

        <!-- Process Steps -->
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $stepColors = [
                        'indigo' => ['bg' => 'from-indigo-100 to-indigo-200', 'icon' => 'from-indigo-500 to-indigo-600'],
                        'purple' => ['bg' => 'from-purple-100 to-purple-200', 'icon' => 'from-purple-500 to-purple-600'],
                        'blue' => ['bg' => 'from-blue-100 to-blue-200', 'icon' => 'from-blue-500 to-blue-600'],
                        'green' => ['bg' => 'from-green-100 to-green-200', 'icon' => 'from-green-500 to-green-600'],
                        'orange' => ['bg' => 'from-orange-100 to-orange-200', 'icon' => 'from-orange-500 to-orange-600'],
                        'teal' => ['bg' => 'from-teal-100 to-teal-200', 'icon' => 'from-teal-500 to-teal-600'],
                        'pink' => ['bg' => 'from-pink-100 to-pink-200', 'icon' => 'from-pink-500 to-pink-600'],
                        'red' => ['bg' => 'from-red-100 to-red-200', 'icon' => 'from-red-500 to-red-600'],
                        'yellow' => ['bg' => 'from-yellow-100 to-yellow-200', 'icon' => 'from-yellow-500 to-yellow-600'],
                        'cyan' => ['bg' => 'from-cyan-100 to-cyan-200', 'icon' => 'from-cyan-500 to-cyan-600']
                    ];
                    
                    $colorKeys = array_keys($stepColors);
                @endphp
                
                @foreach($processContent->content_json['steps'] ?? [] as $index => $step)
                    @php
                        $colorKey = $colorKeys[$index % count($colorKeys)];
                        $colors = $stepColors[$colorKey];
                        $stepNumber = $index + 1;
                    @endphp
                    
                    <div class="group bg-white rounded-3xl p-8 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 relative overflow-hidden {{ $index >= 6 ? 'md:col-span-2 lg:col-span-1' : '' }}">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br {{ $colors['bg'] }} rounded-full -mr-10 -mt-10 opacity-50"></div>
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br {{ $colors['icon'] }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <span class="text-white font-bold text-xl">{{ $stepNumber }}</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $step['title'] ?? '' }}</h3>
                            <p class="text-gray-600 leading-relaxed">
                                {{ $step['description'] ?? '' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Software Development Methodologies Section -->
<section class="py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-4 h-4 bg-blue-400 rounded-full animate-pulse"></div>
        <div class="absolute top-60 right-32 w-3 h-3 bg-purple-400 rounded-full animate-ping"></div>
        <div class="absolute bottom-40 left-1/3 w-5 h-5 bg-green-400 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-orange-400 rounded-full animate-ping" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-5xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold mb-6 leading-tight">
                {!! $methodologiesContent->content_json['title'] ?? '' !!}
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed">
                {{ $methodologiesContent->content_json['subtitle'] ?? 'To guarantee efficient bespoke software development and quality, we use tried-and-true approaches to your project\'s complexity and deadlines.' }}
            </p>
        </div>

        <!-- Methodologies Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
            @php
                $methodologyColors = [
                    'blue' => ['icon' => 'from-blue-500 to-blue-600', 'border' => 'hover:border-blue-500'],
                    'purple' => ['icon' => 'from-purple-500 to-purple-600', 'border' => 'hover:border-purple-500'],
                    'green' => ['icon' => 'from-green-500 to-green-600', 'border' => 'hover:border-green-500'],
                    'orange' => ['icon' => 'from-orange-500 to-orange-600', 'border' => 'hover:border-orange-500'],
                    'teal' => ['icon' => 'from-teal-500 to-teal-600', 'border' => 'hover:border-teal-500'],
                    'red' => ['icon' => 'from-red-500 to-red-600', 'border' => 'hover:border-red-500'],
                    'indigo' => ['icon' => 'from-indigo-500 to-indigo-600', 'border' => 'hover:border-indigo-500'],
                    'pink' => ['icon' => 'from-pink-500 to-pink-600', 'border' => 'hover:border-pink-500']
                ];
                
                $colorKeys = array_keys($methodologyColors);
                
                $icons = [
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 919.288 0M15 7a3 3 0 11-6 0 3 3 0 616 0zm6 3a2 2 0 11-4 0 2 2 0 414 0zM7 10a2 2 0 11-4 0 2 2 0 414 0z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>'
                ];
            @endphp
            
            @foreach($methodologiesContent->content_json['items'] ?? [] as $index => $methodology)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $colors = $methodologyColors[$colorKey];
                @endphp
                
                <div class="group bg-gradient-to-br from-gray-800 to-gray-700 rounded-3xl p-8 shadow-2xl border border-gray-600 hover:shadow-3xl transition-all duration-500 hover:-translate-y-3 {{ $colors['border'] }}">
                    <div class="w-16 h-16 bg-gradient-to-br {{ $colors['icon'] }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        {!! $icons[$index % count($icons)] !!}
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">{{ $methodology['title'] ?? '' }}</h3>
                    <p class="text-gray-300 leading-relaxed">
                        {{ $methodology['description'] ?? '' }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Development Process Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $developmentStepsContent->content_json['title'] ?? 'Custom Software Development Services: Step by Step' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {{ $developmentStepsContent->content_json['subtitle'] ?? 'A proven approach for creating custom software tailored to your operations' }}
            </p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
                @php
                    $stepColors = [
                        'bg-purple-600',
                        'bg-blue-600',
                        'bg-green-600',
                        'bg-orange-600',
                        'bg-red-600',
                        'bg-indigo-600',
                        'bg-pink-600',
                        'bg-teal-600',
                        'bg-yellow-600',
                        'bg-cyan-600'
                    ];
                @endphp
                
                @foreach($developmentStepsContent->content_json['items'] ?? [] as $index => $step)
                    @php
                        $stepNumber = $index + 1;
                        $colorClass = $stepColors[$index % count($stepColors)];
                    @endphp
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-12 h-12 {{ $colorClass }} rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                            {{ $stepNumber }}
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

<!-- Benefits of Custom Software Development Services Section -->
<section class="py-24 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-3 h-3 bg-blue-400 rounded-full animate-pulse"></div>
        <div class="absolute top-60 right-32 w-2 h-2 bg-indigo-400 rounded-full animate-ping"></div>
        <div class="absolute bottom-40 left-1/3 w-4 h-4 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-pink-400 rounded-full animate-ping" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-5xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $benefitsContent->content_json['title'] ?? 'Benefits of Custom Software Development Services' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $benefitsContent->content_json['subtitle'] ?? 'Custom software development services offer tailored solutions that align with your business needs, ensuring functionality, scalability, and efficiency. Unlike off-the-shelf solutions, custom software provides:' }}
            </p>
        </div>

        <!-- Benefits Grid -->
        <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @php
                $benefitColors = [
                    'blue' => ['bg' => 'from-blue-100 to-blue-200', 'icon' => 'from-blue-500 to-blue-600'],
                    'indigo' => ['bg' => 'from-indigo-100 to-indigo-200', 'icon' => 'from-indigo-500 to-indigo-600'],
                    'purple' => ['bg' => 'from-purple-100 to-purple-200', 'icon' => 'from-purple-500 to-purple-600'],
                    'green' => ['bg' => 'from-green-100 to-green-200', 'icon' => 'from-green-500 to-green-600'],
                    'orange' => ['bg' => 'from-orange-100 to-orange-200', 'icon' => 'from-orange-500 to-orange-600'],
                    'teal' => ['bg' => 'from-teal-100 to-teal-200', 'icon' => 'from-teal-500 to-teal-600'],
                    'pink' => ['bg' => 'from-pink-100 to-pink-200', 'icon' => 'from-pink-500 to-pink-600'],
                    'red' => ['bg' => 'from-red-100 to-red-200', 'icon' => 'from-red-500 to-red-600']
                ];
                
                $colorKeys = array_keys($benefitColors);
                
                $icons = [
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>'
                ];
            @endphp
            
            @foreach($benefitsContent->content_json['items'] ?? [] as $index => $benefit)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $colors = $benefitColors[$colorKey];
                @endphp
                
                <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br {{ $colors['bg'] }} rounded-full -mr-12 -mt-12 opacity-50"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br {{ $colors['icon'] }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            {!! $icons[$index % count($icons)] !!}
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $benefit['title'] ?? '' }}</h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $benefit['description'] ?? '' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Understanding the Custom Software Development Process Section -->
<section class="py-24 bg-gradient-to-br from-gray-900 via-slate-800 to-gray-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(99, 102, 241, 0.4) 1px, transparent 0); background-size: 60px 60px;"></div>
    </div>
    
    <!-- Main Timeline Line -->
    <div class="absolute left-1/2 top-0 bottom-0 w-1 bg-gradient-to-b from-blue-400 via-indigo-400 via-purple-400 via-pink-400 to-green-400 transform -translate-x-1/2 hidden lg:block opacity-60 z-10"></div>
    
    <!-- Timeline Line Glow Effect -->
    <div class="absolute left-1/2 top-0 bottom-0 w-3 bg-gradient-to-b from-blue-400/20 via-indigo-400/20 via-purple-400/20 via-pink-400/20 to-green-400/20 transform -translate-x-1/2 hidden lg:block blur-sm z-5"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-5xl mx-auto mb-20">
            <h2 class="text-4xl md:text-4xl font-bold mb-6 leading-tight">
                {!! $understandingProcessContent->content_json['title'] ?? 'Understanding the Custom Software Development Process' !!}
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed">
                {{ $understandingProcessContent->content_json['subtitle'] ?? 'A comprehensive approach to building software solutions tailored specifically to your business requirements' }}
            </p>
        </div>

        <!-- Process Timeline -->
        <div class="max-w-6xl mx-auto space-y-16">
            @php
                $processColors = [
                    'blue' => ['dot' => 'bg-blue-500', 'dotInner' => 'bg-blue-400', 'card' => 'from-blue-900/50 to-blue-800/50', 'border' => 'border-blue-500/20', 'icon' => 'from-blue-500 to-blue-600', 'text' => 'text-blue-400'],
                    'indigo' => ['dot' => 'bg-indigo-500', 'dotInner' => 'bg-indigo-400', 'card' => 'from-indigo-900/50 to-indigo-800/50', 'border' => 'border-indigo-500/20', 'icon' => 'from-indigo-500 to-indigo-600', 'text' => 'text-indigo-400'],
                    'purple' => ['dot' => 'bg-purple-500', 'dotInner' => 'bg-purple-400', 'card' => 'from-purple-900/50 to-purple-800/50', 'border' => 'border-purple-500/20', 'icon' => 'from-purple-500 to-purple-600', 'text' => 'text-purple-400'],
                    'pink' => ['dot' => 'bg-pink-500', 'dotInner' => 'bg-pink-400', 'card' => 'from-pink-900/50 to-pink-800/50', 'border' => 'border-pink-500/20', 'icon' => 'from-pink-500 to-pink-600', 'text' => 'text-pink-400'],
                    'green' => ['dot' => 'bg-green-500', 'dotInner' => 'bg-green-400', 'card' => 'from-green-900/50 to-green-800/50', 'border' => 'border-green-500/20', 'icon' => 'from-green-500 to-green-600', 'text' => 'text-green-400'],
                    'teal' => ['dot' => 'bg-teal-500', 'dotInner' => 'bg-teal-400', 'card' => 'from-teal-900/50 to-teal-800/50', 'border' => 'border-teal-500/20', 'icon' => 'from-teal-500 to-teal-600', 'text' => 'text-teal-400'],
                    'orange' => ['dot' => 'bg-orange-500', 'dotInner' => 'bg-orange-400', 'card' => 'from-orange-900/50 to-orange-800/50', 'border' => 'border-orange-500/20', 'icon' => 'from-orange-500 to-orange-600', 'text' => 'text-orange-400'],
                    'red' => ['dot' => 'bg-red-500', 'dotInner' => 'bg-red-400', 'card' => 'from-red-900/50 to-red-800/50', 'border' => 'border-red-500/20', 'icon' => 'from-red-500 to-red-600', 'text' => 'text-red-400']
                ];
                
                $colorKeys = array_keys($processColors);
                
                $icons = [
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>'
                ];
            @endphp
            
            @foreach($understandingProcessContent->content_json['items'] ?? [] as $index => $step)
                @php
                    $stepNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $colors = $processColors[$colorKey];
                    $isEven = ($index % 2) == 1;
                @endphp
                
                <div class="relative flex items-center {{ $isEven ? 'lg:justify-end' : 'lg:justify-start' }}">
                    <!-- Timeline Dot -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 {{ $colors['dot'] }} rounded-full border-4 border-white shadow-xl z-20 hidden lg:block">
                        <div class="w-full h-full {{ $colors['dotInner'] }} rounded-full animate-pulse"></div>
                    </div>
                    
                    @if($isEven)
                        <!-- Empty space for left side -->
                        <div class="hidden lg:block lg:w-7/12"></div>
                    @endif
                    
                    <!-- Content Card -->
                    <div class="w-full lg:w-5/12 {{ $isEven ? 'lg:pl-8' : 'lg:pr-8' }}">
                        <div class="bg-gradient-to-br {{ $colors['card'] }} backdrop-blur-sm rounded-2xl p-8 shadow-xl border {{ $colors['border'] }} hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br {{ $colors['icon'] }} rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                    {!! $icons[$index % count($icons)] !!}
                                </div>
                                <div>
                                    <span class="{{ $colors['text'] }} font-semibold text-sm uppercase tracking-wide">Step {{ $stepNumber }}</span>
                                    <h3 class="text-2xl font-bold text-white">{{ $step['title'] ?? '' }}</h3>
                                </div>
                            </div>
                            <p class="text-gray-300 leading-relaxed">
                                {{ $step['description'] ?? '' }}
                            </p>
                        </div>
                    </div>
                    
                    @if(!$isEven)
                        <!-- Empty space for right side -->
                        <div class="hidden lg:block lg:w-7/12"></div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us for Custom Software Development Section -->
<section class="py-24 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-32 h-32 bg-blue-400 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-40 h-40 bg-purple-400 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-indigo-400 rounded-full blur-2xl"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $whyChooseUsContent->content_json['title'] ?? 'Why Choose Us for Custom Software Development' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $whyChooseUsContent->content_json['subtitle'] ?? 'We have custom software development services at unparalleled skill levels to knock down any hurdles in your business. From building scalable apps to feature-rich platforms, we prioritize value delivery through solutions that align with you.' }}
            </p>
        </div>

        <!-- Content Grid -->
        <div class="grid lg:grid-cols-2 gap-16 items-center max-w-7xl mx-auto">
            <!-- Left Content -->
            <div class="space-y-8">
                @php
                    $reasonColors = [
                        'blue' => 'from-blue-500 to-blue-600',
                        'indigo' => 'from-indigo-500 to-indigo-600',
                        'purple' => 'from-purple-500 to-purple-600',
                        'green' => 'from-green-500 to-green-600',
                        'orange' => 'from-orange-500 to-orange-600',
                        'teal' => 'from-teal-500 to-teal-600',
                        'pink' => 'from-pink-500 to-pink-600',
                        'red' => 'from-red-500 to-red-600'
                    ];
                    
                    $colorKeys = array_keys($reasonColors);
                    
                    $icons = [
                        '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>',
                        '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>',
                        '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>',
                        '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>',
                        '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                        </svg>',
                        '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>',
                        '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>',
                        '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>'
                    ];
                    
                    // ✅ Fix: Store in variable first
                    $reasons = $whyChooseUsContent->content_json['reasons'] ?? [];
                    $leftReasons = array_slice($reasons, 0, -1); // All except last
                    $rightReason = !empty($reasons) ? end($reasons) : null; // Last item
                @endphp
                
                @foreach($leftReasons as $index => $reason)
                    @php
                        $colorKey = $colorKeys[$index % count($colorKeys)];
                        $iconGradient = $reasonColors[$colorKey];
                    @endphp
                    
                    <div class="bg-white/70 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br {{ $iconGradient }} rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                {!! $icons[$index % count($icons)] !!}
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $reason['title'] ?? '' }}</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $reason['description'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Right Visual -->
            @if($rightReason)
            <div class="relative">
                <div class="bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 rounded-3xl p-12 shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 text-center">
                        <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">{{ $rightReason['title'] ?? 'Quality Assured' }}</h3>
                        <p class="text-white/90 leading-relaxed">
                            {{ $rightReason['description'] ?? 'Unparalleled skill levels and proven methodologies ensure exceptional results for every project.' }}
                        </p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>


<!-- What Makes Us Different Section -->
{{-- <section class="py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold mb-6 leading-tight">
                What Makes Us <br>
                <span class="bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">Different</span>
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed">
                Our unique approach to software solutions is based on a deep understanding of enterprise needs and incorporating the latest technologies.
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            
            <!-- Latest Technologies -->
            <div class="group bg-gradient-to-br from-gray-800/50 to-gray-700/50 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-gray-600/30 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 hover:border-blue-500/50">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Latest Technologies</h3>
                <p class="text-gray-300 leading-relaxed">
                    We combine the latest tools and modern frameworks to develop cutting-edge solutions that stay ahead of the curve.
                </p>
            </div>

            <!-- Agile Methodology -->
            <div class="group bg-gradient-to-br from-gray-800/50 to-gray-700/50 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-gray-600/30 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 hover:border-purple-500/50">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Agile Methodology</h3>
                <p class="text-gray-300 leading-relaxed">
                    Our agile approach ensures flexibility, rapid iteration, and continuous improvement throughout the development process.
                </p>
            </div>

            <!-- Collaboration Practices -->
            <div class="group bg-gradient-to-br from-gray-800/50 to-gray-700/50 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-gray-600/30 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 hover:border-pink-500/50">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Collaboration Practices</h3>
                <p class="text-gray-300 leading-relaxed">
                    We take pride in our work for its quality and efficiency along with cost-effectiveness in our development process.
                </p>
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-16">
            <div class="inline-flex items-center space-x-4 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full px-8 py-4 shadow-xl">
                <span class="text-white font-semibold">At Qubify Tech</span>
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                <span class="text-white/90">Custom Solutions Excellence</span>
            </div>
        </div>
    </div>
</section> --}}

<section class="py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold mb-6 leading-tight">
                {!! $whatMakesDifferentContent->content_json['title'] ?? 'What Makes Us <br> <span class="bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">Different</span>' !!}
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed">
                {{ $whatMakesDifferentContent->content_json['subtitle'] ?? 'Our unique approach to software solutions is based on a deep understanding of enterprise needs and incorporating the latest technologies.' }}
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @php
                $featureColors = [
                    'blue' => ['from-blue-500 to-blue-600', 'hover:border-blue-500/50'],
                    'purple' => ['from-purple-500 to-purple-600', 'hover:border-purple-500/50'],
                    'pink' => ['from-pink-500 to-pink-600', 'hover:border-pink-500/50'],
                    'indigo' => ['from-indigo-500 to-indigo-600', 'hover:border-indigo-500/50'],
                    'green' => ['from-green-500 to-green-600', 'hover:border-green-500/50'],
                    'orange' => ['from-orange-500 to-orange-600', 'hover:border-orange-500/50']
                ];
                
                $colorKeys = array_keys($featureColors);
                
                $featureIcons = [
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>'
                ];
                
                $features = $whatMakesDifferentContent->content_json['features'] ?? [];
            @endphp
            
            @foreach($features as $index => $feature)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $gradientClass = $featureColors[$colorKey][0];
                    $hoverBorderClass = $featureColors[$colorKey][1];
                @endphp
                
                <!-- Feature Card -->
                <div class="group bg-gradient-to-br from-gray-800/50 to-gray-700/50 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-gray-600/30 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 {{ $hoverBorderClass }}">
                    <div class="w-16 h-16 bg-gradient-to-br {{ $gradientClass }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        {!! $featureIcons[$index % count($featureIcons)] !!}
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">{{ $feature['title'] ?? '' }}</h3>
                    <p class="text-gray-300 leading-relaxed">
                        {{ $feature['description'] ?? '' }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-16">
            <div class="inline-flex items-center space-x-4 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full px-8 py-4 shadow-xl">
                <span class="text-white font-semibold">At Qubify Tech</span>
                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                <span class="text-white/90">Custom Solutions Excellence</span>
            </div>
        </div>
    </div>
</section>

<!-- Benefits of Custom Software Development Section -->

<section class="py-24 bg-gradient-to-br from-indigo-50 via-blue-50 to-cyan-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-20 h-20 bg-indigo-400 rounded-full blur-2xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-blue-400 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-cyan-400 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $customBenefitsContent->content_json['title'] ?? 'Benefits of Custom Software <br> <span class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-600 bg-clip-text text-transparent">Development with Us</span>' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {{ $customBenefitsContent->content_json['subtitle'] ?? 'Discover the advantages that set our custom software solutions apart from generic alternatives' }}
            </p>
        </div>

        <!-- Benefits Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @php
                $benefitColors = [
                    'indigo' => 'from-indigo-500 to-indigo-600',
                    'blue' => 'from-blue-500 to-blue-600',
                    'cyan' => 'from-cyan-500 to-cyan-600',
                    'purple' => 'from-purple-500 to-purple-600',
                    'green' => 'from-green-500 to-green-600',
                    'orange' => 'from-orange-500 to-orange-600',
                    'pink' => 'from-pink-500 to-pink-600',
                    'teal' => 'from-teal-500 to-teal-600'
                ];
                
                $colorKeys = array_keys($benefitColors);
                
                $benefitIcons = [
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>'
                ];
                
                $benefits = $customBenefitsContent->content_json['benefits'] ?? [];
            @endphp
            
            @foreach($benefits as $index => $benefit)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $gradientClass = $benefitColors[$colorKey];
                @endphp
                
                <!-- Benefit Card -->
                <div class="group bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br {{ $gradientClass }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        {!! $benefitIcons[$index % count($benefitIcons)] !!}
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $benefit['title'] ?? '' }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $benefit['description'] ?? '' }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us - Detailed Section -->

<section class="py-24 bg-gradient-to-br from-gray-900 via-slate-800 to-gray-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: linear-gradient(45deg, transparent 40%, rgba(255, 255, 255, 0.1) 50%, transparent 60%), linear-gradient(-45deg, transparent 40%, rgba(255, 255, 255, 0.1) 50%, transparent 60%); background-size: 20px 20px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-4xl font-bold mb-6 leading-tight">
                {!! $customDevelopmentContent->content_json['title'] ?? 'Why Choose Us for <br> <span class="bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">Custom Software Development</span>' !!}
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed">
                {{ $customDevelopmentContent->content_json['subtitle'] ?? 'Our comprehensive approach combines expertise, innovation, and partnership to deliver exceptional results' }}
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @php
                $developmentColors = [
                    'blue' => ['from-blue-500 to-blue-600', 'hover:border-blue-500/50'],
                    'purple' => ['from-purple-500 to-purple-600', 'hover:border-purple-500/50'],
                    'pink' => ['from-pink-500 to-pink-600', 'hover:border-pink-500/50'],
                    'green' => ['from-green-500 to-green-600', 'hover:border-green-500/50'],
                    'orange' => ['from-orange-500 to-orange-600', 'hover:border-orange-500/50'],
                    'cyan' => ['from-cyan-500 to-cyan-600', 'hover:border-cyan-500/50'],
                    'indigo' => ['from-indigo-500 to-indigo-600', 'hover:border-indigo-500/50'],
                    'teal' => ['from-teal-500 to-teal-600', 'hover:border-teal-500/50']
                ];
                
                $colorKeys = array_keys($developmentColors);
                
                $developmentIcons = [
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>',
                    '<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                    </svg>'
                ];
                
                $benefits = $customDevelopmentContent->content_json['benefits'] ?? [];
            @endphp
            
            @foreach($benefits as $index => $benefit)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $gradientClass = $developmentColors[$colorKey][0];
                    $hoverBorderClass = $developmentColors[$colorKey][1];
                @endphp
                
                <!-- Benefit Card -->
                <div class="group bg-gradient-to-br from-gray-800/50 to-gray-700/50 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-gray-600/30 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 {{ $hoverBorderClass }}">
                    <div class="w-16 h-16 bg-gradient-to-br {{ $gradientClass }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        {!! $developmentIcons[$index % count($developmentIcons)] !!}
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">{{ $benefit['title'] ?? '' }}</h3>
                    <p class="text-gray-300 leading-relaxed">
                        {{ $benefit['description'] ?? '' }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Industries We Serve Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $industriesContent->content_json['title'] ?? 'Industries We <span class="text-purple-600">Serve</span>' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {{ $industriesContent->content_json['subtitle'] ?? 'Specialized software solutions for diverse industries' }}
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $industryColors = [
                    'blue' => ['bg-blue-100', 'text-blue-600'],
                    'green' => ['bg-green-100', 'text-green-600'],
                    'purple' => ['bg-purple-100', 'text-purple-600'],
                    'orange' => ['bg-orange-100', 'text-orange-600'],
                    'teal' => ['bg-teal-100', 'text-teal-600'],
                    'red' => ['bg-red-100', 'text-red-600'],
                    'indigo' => ['bg-indigo-100', 'text-indigo-600'],
                    'pink' => ['bg-pink-100', 'text-pink-600']
                ];
                
                $colorKeys = array_keys($industryColors);
                
                $industryIcons = [
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>',
                    '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>'
                ];
                
                $industries = $industriesContent->content_json['industries'] ?? [];
            @endphp
            
            @foreach($industries as $index => $industry)
                @php
                    $colorKey = $colorKeys[$index % count($colorKeys)];
                    $bgColorClass = $industryColors[$colorKey][0];
                    $textColorClass = $industryColors[$colorKey][1];
                @endphp
                
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 {{ $bgColorClass }} rounded-lg flex items-center justify-center mb-4">
                        <div class="{{ $textColorClass }}">
                            {!! $industryIcons[$index % count($industryIcons)] !!}
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $industry['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm">{{ $industry['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- We Have On-Demand Developers Section -->
<section class="py-24 bg-gradient-to-br from-slate-50 via-gray-50 to-blue-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-40 h-40 bg-blue-500 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-32 h-32 bg-purple-500 rounded-full blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-indigo-500 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-5xl mx-auto ">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $onDemandDevelopersContent->content_json['title'] ?? 'We Have <br> <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">On-Demand Developers</span>' !!}
            </h2>
            <div class="inline-flex items-center space-x-3 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full px-6 py-3 mb-8">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 919.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-blue-700 font-semibold">{{ $onDemandDevelopersContent->content_json['subtitle'] ?? 'Hire Developers with Programming Expertise' }}</span>
            </div>
            @php
                $description = $onDemandDevelopersContent->content_json['description'] ?? 'You can get specialist developers to work for you with our custom software development services. They are well skilled in the latest programming languages and frameworks. Our software developers can help you solve a complex problem using the latest technology such as Python, Java, PHP, JavaScript (Node.js, React.js, Angular, Vue.js), Ruby on Rails, Kubernetes, WebAssembly, etc.

         We make sure that your software solution is scalable, secure and performant, as per your requirement to meet the business needs. Our developers are experts at building both the backend and front-end solutions that suite your business, making it highly secure and easy to use! When you hire on-demand developers, you can scale your team promptly, reduce timelines, save cost, and you get full control of the project.';
                
                $paragraphs = explode("\n\n", $description);
                $paragraphs = array_map('trim', $paragraphs);
                $paragraphs = array_filter($paragraphs);
            @endphp
            
            @foreach($paragraphs as $index => $paragraph)
                <p class="text-lg text-gray-600 leading-relaxed {{ $index < count($paragraphs) - 1 ? 'pb-3' : '' }}">
                    {{ $paragraph }}
                </p>
            @endforeach
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $faqContent->content_json['title'] ?? 'Frequently Asked <span class="text-purple-600">Questions</span>' !!}
            </h2>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-6">
                @php
                    $faqs = $faqContent->content_json['faqs'] ?? [];
                @endphp
                
                @foreach($faqs as $faq)
                    <div class="bg-white rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $faq['question'] ?? '' }}</h3>
                        <p class="text-gray-600">{{ $faq['answer'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


<!-- Back to Top Button -->
<button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-purple-600 hover:bg-purple-700 text-white rounded-full shadow-xl transition-all duration-300 opacity-0 invisible hover:scale-110 z-50">
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
    background: linear-gradient(135deg, #8B5CF6, #3B82F6);
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