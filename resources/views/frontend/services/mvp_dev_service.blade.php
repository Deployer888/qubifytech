@extends('frontend.layouts.app')

@section('title')
MVP Development Services - {{app_name()}}
@endsection

@section('content')
<!-- Hero Section - Updated -->
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
        <div class="text-center max-w-5xl mx-auto">
            <!-- Main Headline -->
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                {!! $heroContent['content_json']['title'] ?? 'MVP Development Services' !!}
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                {!! $heroContent['content_json']['subtitle'] ?? '' !!}
            </p>
            
            <!-- Feature Pills -->
            @if(isset($heroContent['content_json']['feature_pills']) && is_array($heroContent['content_json']['feature_pills']))
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                @foreach($heroContent['content_json']['feature_pills'] as $feature)
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    {{ $feature }}
                </span>
                @endforeach
            </div>
            @endif
            
            <!-- CTA Buttons -->
            @if(isset($heroContent['content_json']['buttons']) && is_array($heroContent['content_json']['buttons']))
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                @if(isset($heroContent['content_json']['buttons'][0]))
                <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    {{ $heroContent['content_json']['buttons'][0]['text'] ?? '🚀 Start Your MVP' }}
                </button>
                @endif
                @if(isset($heroContent['content_json']['buttons'][1]))
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    {{ $heroContent['content_json']['buttons'][1]['text'] ?? '💬 Get Free Consultation' }}
                </a>
                @endif
            </div>
            @endif
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white/70 rounded-full mt-2"></div>
        </div>
    </div>
</section>

<!-- Intro Section - Updated -->
<section class="py-20 bg-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(236, 72, 153, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Main Title -->
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $introContent['content_json']['title'] ?? 'MVP Development Focused on Real-World Validation' !!}
            </h2>
            
            <!-- Description -->
            <p class="text-xl text-gray-600 leading-relaxed mb-2">
                {!! $introContent['content_json']['description_1'] ?? '' !!}
            </p>
            @if(isset($introContent['content_json']['description_2']))
            <p class="text-xl text-gray-600 leading-relaxed mt-6">
                {!! $introContent['content_json']['description_2'] !!}
            </p>
            @endif
        </div>
    </div>
</section>

<!-- What We Offer Section - Updated -->
<section class="py-24 bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-5xl font-bold text-gray-900 mb-6">
                {!! $whatWeOfferContent['content_json']['title'] ?? 'What We Offer in MVP Development' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {!! $whatWeOfferContent['content_json']['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- Services Stack -->
        <div class="max-w-5xl mx-auto space-y-12">
            @if(isset($whatWeOfferContent['content_json']['services']) && is_array($whatWeOfferContent['content_json']['services']))
                @php
                    $colors = ['blue', 'purple', 'green', 'pink', 'indigo', 'orange'];
                    $icons = [
                        'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                        'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z',
                        'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9',
                        'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
                        'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z',
                        'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z'
                    ];
                @endphp
                @foreach($whatWeOfferContent['content_json']['services'] as $index => $service)
                    @php
                        $color = $colors[$index % count($colors)];
                        $icon = $icons[$index % count($icons)];
                    @endphp
                    <div class="relative">
                        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                            <div class="flex flex-col {{ $index % 2 === 0 ? 'lg:flex-row' : 'lg:flex-row-reverse' }}">
                                <!-- Content Section -->
                                <div class="lg:w-3/5 p-12">
                                    <div class="flex items-start mb-8">
                                        <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $service['title'] ?? '' }}</h3>
                                            <p class="text-{{ $color }}-600 font-semibold text-lg">{{ $service['subtitle'] ?? '' }}</p>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                        {{ $service['description'] ?? '' }}
                                    </p>
                                    @if(isset($service['tags']) && is_array($service['tags']))
                                    <div class="flex flex-wrap gap-3">
                                        @foreach($service['tags'] as $tag)
                                            <span class="px-5 py-2 bg-{{ $color }}-50 text-{{ $color }}-700 rounded-full font-medium">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                
                                <!-- Visual Preview -->
                                <div class="lg:w-2/5 bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-600 p-8 flex items-center">
                                    <div class="w-full">
                                        <h4 class="text-white text-2xl font-bold mb-6">
                                            @if($index == 0) Consulting Benefits
                                            @elseif($index == 1) Prototyping Impact
                                            @elseif($index == 2) Web MVP Benefits
                                            @elseif($index == 3) Mobile MVP Stats
                                            @elseif($index == 4) SaaS MVP Features
                                            @elseif($index == 5) Design Impact
                                            @else Key Benefits
                                            @endif
                                        </h4>
                                        @if(isset($service['benefits']) && is_array($service['benefits']))
                                        <div class="space-y-4">
                                            @foreach($service['benefits'] as $benefit)
                                                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                                    <span class="text-white text-lg">{{ $benefit['label'] ?? '' }}</span>
                                                    <span class="text-white text-3xl font-bold">{{ $benefit['value'] ?? '' }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Additional Services Section - Updated -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {!! $additionalServicesContent['content_json']['title'] ?? '' !!}
            </h2>
            <p class="text-lg text-gray-600">
                {!! $additionalServicesContent['content_json']['subtitle'] ?? '' !!}
            </p>
        </div>
        
        @if(isset($additionalServicesContent['content_json']['services']) && is_array($additionalServicesContent['content_json']['services']))
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($additionalServicesContent['content_json']['services'] as $key=>$service)
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                @if($key == 0)
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                    </svg>
                </div>
                @elseif($key == 1)
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                @elseif($key == 2)
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                @elseif($key == 3)
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                @else
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                @endif
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $service['title'] ?? '' }}</h3>
                <p class="text-gray-500 text-sm">{{ $service['description'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- Areas of Expertise Section - Updated -->
<section class="py-24 bg-gradient-to-br from-violet-50 via-fuchsia-50 to-rose-50 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-30">
        <div class="absolute top-20 right-20 w-2 h-2 bg-violet-400 rounded-full animate-ping"></div>
        <div class="absolute top-44 left-16 w-3 h-3 bg-fuchsia-400 rounded-full animate-pulse"></div>
        <div class="absolute bottom-28 right-1/3 w-2 h-2 bg-rose-400 rounded-full animate-ping" style="animation-delay: 1.2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-5xl font-bold text-gray-900 mb-6">
                {!! $expertiseContent['content_json']['title'] ?? 'Our Areas of MVP Expertise' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {!! $expertiseContent['content_json']['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- Expertise Flow Layout -->
        @if(isset($expertiseContent['content_json']['expertise']) && is_array($expertiseContent['content_json']['expertise']))
        <div class="max-w-5xl mx-auto space-y-16">
            @php
                $colors = ['blue', 'pink', 'purple', 'green', 'indigo', 'orange'];
                $icons = [
                    'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9',
                    'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
                    'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z',
                    'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                    'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
                    'M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0'
                ];
                $expertiseChunks = array_chunk($expertiseContent['content_json']['expertise'], 3);
            @endphp
            
            @foreach($expertiseChunks as $chunkIndex => $expertiseGroup)
                @if($chunkIndex === 0)
                <!-- Row 1: Left Aligned -->
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2 space-y-8">
                        @for($i = 0; $i < 2 && isset($expertiseGroup[$i]); $i++)
                            @php
                                $expert = $expertiseGroup[$i];
                                $color = $colors[$i];
                                $icon = $icons[$i];
                            @endphp
                            <div class="bg-gradient-to-br from-white to-{{ $color }}-50 rounded-3xl p-8 shadow-xl border border-{{ $color }}-200 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                                <div class="flex items-center mb-6">
                                    <div class="w-16 h-16 bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-600 rounded-2xl flex items-center justify-center mr-6 shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $expert['title'] ?? '' }}</h3>
                                        <p class="text-gray-600">{{ $expert['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                    
                    @if(isset($expertiseGroup[2]))
                        @php
                            $expert = $expertiseGroup[2];
                            $color = $colors[2];
                            $icon = $icons[2];
                        @endphp
                        <div class="lg:w-1/2">
                            <div class="bg-gradient-to-br from-white to-{{ $color }}-50 rounded-3xl p-8 shadow-xl border border-{{ $color }}-200 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                                <div class="flex items-center mb-6">
                                    <div class="w-16 h-16 bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-600 rounded-2xl flex items-center justify-center mr-6 shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $expert['title'] ?? '' }}</h3>
                                        <p class="text-gray-600">{{ $expert['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @elseif($chunkIndex === 1)
                <!-- Row 2: Right Aligned -->
                <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                    <div class="lg:w-1/2 space-y-8">
                        @for($i = 0; $i < 2 && isset($expertiseGroup[$i]); $i++)
                            @php
                                $expert = $expertiseGroup[$i];
                                $color = $colors[$i + 3]; // Start from index 3 for second row
                                $icon = $icons[$i + 3];
                            @endphp
                            <div class="bg-gradient-to-br from-white to-{{ $color }}-50 rounded-3xl p-8 shadow-xl border border-{{ $color }}-200 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                                <div class="flex items-center mb-6">
                                    <div class="w-16 h-16 bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-600 rounded-2xl flex items-center justify-center mr-6 shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $expert['title'] ?? '' }}</h3>
                                        <p class="text-gray-600">{{ $expert['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                    
                    @if(isset($expertiseGroup[2]))
                        @php
                            $expert = $expertiseGroup[2];
                            $color = $colors[5]; // Last color (orange)
                            $icon = $icons[5];
                        @endphp
                        <div class="lg:w-1/2">
                            <div class="bg-gradient-to-br from-white to-{{ $color }}-50 rounded-3xl p-8 shadow-xl border border-{{ $color }}-200 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                                <div class="flex items-center mb-6">
                                    <div class="w-16 h-16 bg-gradient-to-br from-{{ $color }}-500 to-{{ $color }}-600 rounded-2xl flex items-center justify-center mr-6 shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $expert['title'] ?? '' }}</h3>
                                        <p class="text-gray-600">{{ $expert['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @endif
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- Tech Stack Section - Updated -->
<section class="py-20 bg-gray-900 text-white animate-fade-in-up">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                {!! $techStackContent['content_json']['title'] ?? 'MVP Tech Stack We Work With' !!}
            </h2>
            <p class="text-lg text-gray-300">
                {!! $techStackContent['content_json']['description'] ?? '' !!}
            </p>
        </div>
        
        @if(isset($techStackContent['content_json']['categories']) && is_array($techStackContent['content_json']['categories']))
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($techStackContent['content_json']['categories'] as $key=>$category)
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                @if($key == 0)
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                @elseif($key == 1)
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                    </svg>
                </div>
                @elseif($key == 2)
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                @elseif($key == 3)
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                    </svg>
                </div>
                @elseif($key == 4)
                <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                    </svg>
                </div>
                @elseif($key == 5)
                <div class="w-16 h-16 bg-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                @else
                <div class="w-16 h-16 bg-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                @endif
                <h3 class="text-lg font-semibold mb-3">{{ $category['title'] ?? '' }}</h3>
                <p class="text-gray-300 text-sm mb-4">{{ $category['description'] ?? '' }}</p>
                @if(isset($category['tags']) && is_array($category['tags']))
                <div class="flex flex-wrap gap-2 justify-center">
                    @foreach($category['tags'] as $tag)
                    <span class="px-2 py-1 bg-blue-600/20 text-blue-300 rounded text-xs">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- MVP Process Section - Updated -->
<section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-5xl font-bold text-gray-900 mb-6">
                {!! $mvpProcessContent['content_json']['title'] ?? 'Our MVP Process, Step by Step' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {!! $mvpProcessContent['content_json']['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- Process Steps -->
        @if(isset($mvpProcessContent['content_json']['steps']) && is_array($mvpProcessContent['content_json']['steps']))
        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
                @foreach($mvpProcessContent['content_json']['steps'] as $key=>$step)
                <div class="flex items-start">
                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br 
                    {{ $key === 0 ? 'from-blue-500 to-blue-600' : '' }}
                    {{ $key === 1 ? 'from-purple-500 to-purple-600' : '' }}
                    {{ $key === 2 ? 'from-green-500 to-green-600' : '' }}
                    {{ $key === 3 ? 'from-orange-500 to-orange-600' : '' }}
                    {{ $key === 4 ? 'from-pink-500 to-pink-600' : '' }}
                    {{ $key === 5 ? 'from-indigo-500 to-indigo-600' : '' }}
                    {{ $key === 6 ? 'from-teal-500 to-teal-600' : '' }}
                    rounded-full flex items-center justify-center text-white font-bold text-xl mr-6 shadow-lg">

                        {{ $step['number'] ?? '' }}
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $step['title'] ?? '' }}</h3>
                        <p class="text-gray-600 text-lg leading-relaxed">{{ $step['description'] ?? '' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Key Benefits Section - Updated -->
<section class="py-24 bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-20">
        <div class="absolute top-20 left-20 w-4 h-4 bg-blue-400 rounded-full animate-ping"></div>
        <div class="absolute top-40 right-32 w-6 h-6 bg-purple-400 rounded-full animate-pulse"></div>
        <div class="absolute bottom-32 left-1/3 w-3 h-3 bg-pink-400 rounded-full animate-ping" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 right-20 w-5 h-5 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-20 right-1/2 w-2 h-2 bg-yellow-400 rounded-full animate-ping" style="animation-delay: 0.5s;"></div>
    </div>
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                {!! $keyBenefitsContent['content_json']['title'] ?? 'Key Benefits of MVP Development' !!}
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed">
                {!! $keyBenefitsContent['content_json']['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- Benefits List -->
        @if(isset($keyBenefitsContent['content_json']['benefits']) && is_array($keyBenefitsContent['content_json']['benefits']))
        <div class="max-w-4xl mx-auto space-y-6">
            @foreach($keyBenefitsContent['content_json']['benefits'] as $key=>$benefit)
            <div class="group bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 hover:scale-105">
                <div class="flex items-center">
                    @if($key == 0)
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    @elseif($key == 1)
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-green-400 to-emerald-400 rounded-xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    @elseif($key == 2)
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-purple-400 to-pink-400 rounded-xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </div>
                    @elseif($key == 3)
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-purple-400 to-pink-400 rounded-xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </div>
                    @elseif($key == 4)
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-orange-400 to-red-400 rounded-xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    @elseif($key == 5)
                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-pink-400 to-rose-400 rounded-xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    @else<div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-indigo-400 to-blue-400 rounded-xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    @endif
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $benefit['title'] ?? '' }}</h3>
                        <p class="text-gray-300 leading-relaxed">{{ $benefit['description'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- MVP Methodologies Section - Updated -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-6xl mx-auto mb-20">
            <!-- Section Header -->
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    {!! $mvpMethodologiesContent['content_json']['title'] ?? 'How We Build: MVP Methodologies That Work' !!}
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    {!! $mvpMethodologiesContent['content_json']['description'] ?? '' !!}
                </p>
            </div>
            
            <!-- Methodologies Grid -->
            @if(isset($mvpMethodologiesContent['content_json']['methodologies']) && is_array($mvpMethodologiesContent['content_json']['methodologies']))
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($mvpMethodologiesContent['content_json']['methodologies'] as $key=>$methodology)
                <div class="bg-gradient-to-br from-white to-blue-50 rounded-3xl p-8 shadow-xl border border-blue-200 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    @if($key == 0)
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                     @elseif($key == 1)
                     <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                     @elseif($key == 2)
                     <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    @else
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    @endif
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">{{ $methodology['title'] ?? '' }}</h3>
                    <p class="text-gray-600 leading-relaxed text-center">{{ $methodology['description'] ?? '' }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Development Timeline Section - Updated -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-5xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    {!! $developmentTimelineContent['content_json']['title'] ?? 'Our Full MVP Development Timeline' !!}
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    {!! $developmentTimelineContent['content_json']['description'] ?? '' !!}
                </p>
            </div>
            
            <!-- Timeline -->
            @if(isset($developmentTimelineContent['content_json']['steps']) && is_array($developmentTimelineContent['content_json']['steps']))
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-8 top-0 bottom-0 w-1 bg-gradient-to-b from-blue-500 via-purple-500 to-pink-500 rounded-full"></div>
                
                <!-- Timeline Items -->
                <div class="space-y-12">
                    @foreach($developmentTimelineContent['content_json']['steps'] as $index => $step)
                    <div class="relative flex items-start">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-r  {{ $index === 0 ? 'from-blue-500 to-blue-600' : '' }}
                    {{ $index === 1 ? 'from-purple-500 to-purple-600' : '' }}
                    {{ $index === 2 ? 'from-green-500 to-green-600' : '' }}
                    {{ $index === 3 ? 'from-orange-500 to-orange-600' : '' }}
                    {{ $index === 4 ? 'from-pink-500 to-pink-600' : '' }}
                    {{ $index === 5 ? 'from-indigo-500 to-indigo-600' : '' }}
                    {{ $index === 6 ? 'from-teal-500 to-teal-600' : '' }} rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg z-10">
                            {{ $index + 1 }}
                        </div>
                        <div class="ml-8 bg-gradient-to-br from-white to-blue-50 rounded-2xl p-6 shadow-lg border border-blue-200 flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $step['title'] ?? '' }}</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $step['description'] ?? '' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- What the MVP Process Actually Looks Like Section - Updated -->
<section class="py-24 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-25">
        <div class="absolute top-24 left-20 w-3 h-3 bg-emerald-400 rounded-full animate-ping"></div>
        <div class="absolute top-48 right-24 w-4 h-4 bg-teal-400 rounded-full animate-pulse"></div>
        <div class="absolute bottom-32 left-1/3 w-2 h-2 bg-cyan-400 rounded-full animate-ping" style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/2 right-1/4 w-5 h-5 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $mvpProcessActuallyContent['content_json']['title'] ?? 'What the MVP Process Actually Looks Like' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {!! $mvpProcessActuallyContent['content_json']['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- Process Steps -->
        @if(isset($mvpProcessActuallyContent['content_json']['steps']) && is_array($mvpProcessActuallyContent['content_json']['steps']))
        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
                @foreach($mvpProcessActuallyContent['content_json']['steps'] as $key=>$step)
                <div class="group bg-gradient-to-r from-white to-emerald-50 rounded-3xl p-8 shadow-xl border border-emerald-200 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center">
                        @if($key == 0)
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        @elseif($key == 1)
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-r from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        @elseif($key == 2)
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-r from-cyan-500 to-cyan-600 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        @elseif($key == 3)
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        @else
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        @endif
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold text-gray-900 mb-3">{{ $step['title'] ?? '' }}</h3>
                            <p class="text-gray-600 text-lg leading-relaxed">{{ $step['description'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Why Qubify Tech Section - Updated -->
<section class="py-24 bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-20">
        <div class="absolute top-20 right-20 w-4 h-4 bg-purple-400 rounded-full animate-ping"></div>
        <div class="absolute top-60 left-24 w-6 h-6 bg-indigo-400 rounded-full animate-pulse"></div>
        <div class="absolute bottom-40 right-1/3 w-3 h-3 bg-pink-400 rounded-full animate-ping" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/3 left-1/4 w-5 h-5 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-20 left-1/2 w-2 h-2 bg-yellow-400 rounded-full animate-ping" style="animation-delay: 0.5s;"></div>
    </div>
    
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                {!! $whyQubifyContent['content_json']['title'] ?? 'Why Qubify Tech?' !!}
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed max-w-3xl mx-auto">
                {!! $whyQubifyContent['content_json']['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- What Makes Us Stand Out -->
        @if(isset($whyQubifyContent['content_json']['features']) && is_array($whyQubifyContent['content_json']['features']))
        <div class="max-w-8xl mx-auto">
            <h3 class="text-4xl font-bold text-white mb-12 text-center">
                {!! $whyQubifyContent['content_json']['subtitle'] ?? 'What Makes Us Stand Out' !!}
            </h3>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
                @php
                    $gradients = [
                        'from-orange-400 to-red-400',
                        'from-purple-400 to-indigo-400', 
                        'from-green-400 to-emerald-400',
                        'from-blue-400 to-cyan-400',
                        'from-pink-400 to-rose-400'
                    ];
                    $icons = [
                        'M13 10V3L4 14h7v7l9-11h-7z',
                        'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                        'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 11-6 0 3 3 0 016 0z',
                        'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                        'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'
                    ];
                @endphp
                
                @foreach($whyQubifyContent['content_json']['features'] as $index => $feature)
                    @php
                        $gradient = $gradients[$index % count($gradients)];
                        $icon = $icons[$index % count($icons)];
                        $isLastItem = $index == 4 && count($whyQubifyContent['content_json']['features']) == 5;
                    @endphp
                    <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 hover:bg-white/20 hover:border-white/40 transition-all duration-300 hover:scale-105{{ $isLastItem ? ' md:col-span-2 lg:col-span-1' : '' }}">
                        <div class="w-16 h-16 bg-gradient-to-r {{ $gradient }} rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
                            </svg>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-4 text-center">{{ $feature['title'] ?? '' }}</h4>
                        <p class="text-gray-300 leading-relaxed text-center">{{ $feature['description'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Industries We Support Section - Updated -->
<section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-5xl font-bold text-gray-900 mb-6">
                {!! $industriesContent['content_json']['title'] ?? 'Industries We Support' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {!! $industriesContent['content_json']['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- Industries Grid -->
        @if(isset($industriesContent['content_json']['industries']) && is_array($industriesContent['content_json']['industries']))
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($industriesContent['content_json']['industries'] as $key=>$industry)
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                @if($key == 0)
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                @elseif($key == 1)
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                 @elseif($key == 2)
                 <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M8 11v6h8v-6M8 11H6a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2v-6a2 2 0 00-2-2h-2"></path>
                    </svg>
                </div>
                @elseif($key == 3)
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                    </svg>
                </div>
                @elseif($key == 4)
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                @else
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                @endif
                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $industry['title'] ?? '' }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $industry['description'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- Hire On-Demand MVP Developers Section - Updated -->
<section class="py-24 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-30">
        <div class="absolute top-24 right-24 w-3 h-3 bg-blue-400 rounded-full animate-ping"></div>
        <div class="absolute top-48 left-20 w-4 h-4 bg-indigo-400 rounded-full animate-pulse"></div>
        <div class="absolute bottom-32 right-1/3 w-2 h-2 bg-purple-400 rounded-full animate-ping" style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/3 left-1/4 w-3 h-3 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                {!! $hireDevelopersContent['content_json']['title'] ?? 'Hire On-Demand MVP Developers' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                {!! $hireDevelopersContent['content_json']['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- Main Content -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-3xl p-12 shadow-xl border border-blue-200 hover:shadow-2xl transition-all duration-300">
                <h3 class="text-4xl font-bold text-gray-900 mb-8 text-center">
                    {!! $hireDevelopersContent['content_json']['subtitle'] ?? 'Our Developers Specialize In' !!}
                </h3>
                
                <!-- Specialization Categories -->
                @if(isset($hireDevelopersContent['content_json']['specializations']) && is_array($hireDevelopersContent['content_json']['specializations']))
                <div class="grid md:grid-cols-2 gap-8">
                    @php
                        // Exact same gradients and icons from original
                        $gradients = [
                            'from-pink-500 to-rose-500',
                            'from-green-500 to-emerald-500',
                            'from-blue-500 to-cyan-500',
                            'from-purple-500 to-indigo-500'
                        ];
                        $colorClasses = [
                            ['bg' => 'pink-100', 'text' => 'pink-700'],
                            ['bg' => 'green-100', 'text' => 'green-700'],
                            ['bg' => 'blue-100', 'text' => 'blue-700'],
                            ['bg' => 'purple-100', 'text' => 'purple-700']
                        ];
                        $icons = [
                            'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
                            'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2',
                            'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z',
                            'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z'
                        ];
                    @endphp
                    
                    @foreach($hireDevelopersContent['content_json']['specializations'] as $index => $specialization)
                        @php
                            $gradient = $gradients[$index % count($gradients)];
                            $colors = $colorClasses[$index % count($colorClasses)];
                            $icon = $icons[$index % count($icons)];
                        @endphp
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r {{ $gradient }} rounded-xl flex items-center justify-center mr-6">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-2xl font-semibold text-gray-900 mb-3">{{ $specialization['title'] ?? '' }}</h4>
                                @if(isset($specialization['tags']) && is_array($specialization['tags']))
                                <div class="flex flex-wrap gap-2">
                                    @foreach($specialization['tags'] as $tag)
                                    <span class="px-4 py-2 bg-{{ $colors['bg'] }} text-{{ $colors['text'] }} rounded-full text-sm font-medium">{{ $tag }}</span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section - Updated -->
<section class="py-24 bg-gradient-to-b relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-5xl font-bold text-gray-900 mb-6">
                {!! $faqContent['content_json']['title'] ?? 'Frequently Asked Questions' !!}
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                {!! $faqContent['content_json']['description'] ?? '' !!}
            </p>
        </div>
        
        <!-- FAQ Grid -->
        @if(isset($faqContent['content_json']['faqs']) && is_array($faqContent['content_json']['faqs']))
            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                @foreach($faqContent['content_json']['faqs'] as $item)
                    <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-all duration-300">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">
                            {{ $item['question'] ?? '' }}
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $item['answer'] ?? '' }}
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection