@extends('frontend.layouts.app')

@section('title')
    Custom Web Development Services - {{ app_name() }}
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden"
        style="background: var(--bg-hero);">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="floating-shape absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl floating"></div>
            <div class="floating-shape absolute top-40 right-20 w-32 h-32 bg-blue-400/20 rounded-full blur-2xl floating"
                style="animation-delay: 1s;"></div>
            <div class="floating-shape absolute bottom-32 left-1/4 w-24 h-24 bg-orange-400/20 rounded-full blur-xl floating"
                style="animation-delay: 2s;"></div>
            <div class="floating-shape absolute top-1/3 right-1/3 w-16 h-16 bg-white/10 rounded-full blur-lg floating"
                style="animation-delay: 0.5s;"></div>
        </div>

        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 opacity-10">
            <div class="h-full w-full"
                style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 50px 50px;">
            </div>
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
                    <button onclick="openContactModal()"
                        class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                        {{$heroContent->content_json['buttons'][0]['text'] ?? ''}}
                        <!-- 🚀 Start Your Project -->
                    </button>
                    <a href="{{ route('frontend.index') }}#contact"
                        class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                        {{$heroContent->content_json['buttons'][1]['text'] ?? ''}}
                        <!-- 💬 Get Free Consultation -->
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
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 1px 1px, rgba(59, 130, 246, 0.3) 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-5xl mx-auto">
                <!-- Main Title -->
                <h2 class="text-4xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    {!! $introContent->content_json['title'] ?? '' !!}
                </h2>

                <!-- Description -->
                <p class="text-xl text-gray-600 leading-relaxed mb-16 max-w-4xl mx-auto font-light">
                   {!! $introContent->content_json['description'] ?? '' !!}
                </p>

                <!-- Feature Cards -->
                <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <div
                        class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
             
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">{{$introContent->content_json['features'][0]['title'] ?? ''}}</h3>
              
                        <p class="text-gray-600 leading-relaxed">{{$introContent->content_json['features'][0]['description'] ?? ''}}</p>
                    </div>

                    <div
                        class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">{{$introContent->content_json['features'][1]['title'] ?? ''}}</h3>
                        <p class="text-gray-600 leading-relaxed">{{$introContent->content_json['features'][1]['description'] ?? ''}}</p>
                    </div>

                    <div
                        class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
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
            <div class="absolute top-20 left-20 w-2 h-2 bg-blue-400 rounded-full animate-ping"></div>
            <div class="absolute top-40 right-32 w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
            <div class="absolute bottom-32 left-1/3 w-2 h-2 bg-purple-400 rounded-full animate-ping"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-4xl mx-auto mb-20">
                {!! $coreServicesContent->content_json['title'] ?? '' !!}
                <p class="text-xl text-gray-600 leading-relaxed">
                    { $coreServicesContent->content_json['subtitle'] ?? '' !!}
                </p>
            </div>

            <!-- Services Stack -->
            <div class="max-w-5xl mx-auto space-y-12">

                <!-- Service 1: Responsive Website Development -->
                <div class="relative">
                    <div
                        class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                        <div class="flex flex-col lg:flex-row">
                            <!-- Content Section -->
                            <div class="lg:w-3/5 p-12">
                                <div class="flex items-start mb-8">
                                    <div
                                        class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{$coreServicesContent->content_json['services'][0]['title'] ?? ''}}
                                        </h3>
                                        <p class="text-blue-600 font-semibold text-lg">{{$coreServicesContent->content_json['services'][0]['subtitle'] ?? ''}}</p>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                {{$coreServicesContent->content_json['services'][0]['description'] ?? ''}}
                                </p>
                                <div class="flex flex-wrap gap-3">
                                    @foreach($coreServicesContent->content_json['services'][0]['features'] as $feature)
                                    <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">{{$feature ?? ''}}</span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Visual Preview -->
                            <div class="lg:w-2/5 bg-gradient-to-br from-blue-500 to-blue-600 p-8 flex items-center">
                                <div class="w-full">
                                    <h4 class="text-white text-2xl font-bold mb-6">Device Compatibility</h4>
                                    <div class="space-y-4">
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">Desktop</span>
                                            <span class="text-white text-2xl font-bold">100%</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">Mobile</span>
                                            <span class="text-white text-2xl font-bold">100%</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">Tablet</span>
                                            <span class="text-white text-2xl font-bold">100%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Service 2: E-Commerce Development -->
                <div class="relative">
                    <div
                        class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                        <div class="flex flex-col lg:flex-row-reverse">
                            <!-- Content Section -->
                            <div class="lg:w-3/5 p-12">
                                <div class="flex items-start mb-8">
                                    <div
                                        class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{$coreServicesContent->content_json['services'][1]['title'] ?? ''}}</h3>
                                        <p class="text-green-600 font-semibold text-lg">{{$coreServicesContent->content_json['services'][1]['subtitle'] ?? ''}}</p>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                {{$coreServicesContent->content_json['services'][1]['description'] ?? ''}}
                                </p>
                                <div class="flex flex-wrap gap-3">

                                    @foreach($coreServicesContent->content_json['services'][1]['features'] as $feature)
                                    <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">{{$feature ?? ''}}</span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Visual Preview -->
                            <div class="lg:w-2/5 bg-gradient-to-br from-green-500 to-green-600 p-8 flex items-center">
                                <div class="w-full">
                                    <h4 class="text-white text-2xl font-bold mb-6">Sales Performance</h4>
                                    <div class="space-y-4">
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">Conversion Rate</span>
                                            <span class="text-white text-2xl font-bold">+45%</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">Revenue Growth</span>
                                            <span class="text-white text-2xl font-bold">+78%</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">User Engagement</span>
                                            <span class="text-white text-2xl font-bold">+62%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Service 3: CMS Development -->
                <div class="relative">
                    <div
                        class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                        <div class="flex flex-col lg:flex-row">
                            <!-- Content Section -->
                            <div class="lg:w-3/5 p-12">
                                <div class="flex items-start mb-8">
                                    <div
                                        class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{$coreServicesContent->content_json['services'][2]['title'] ?? ''}}</h3>
                                        <p class="text-purple-600 font-semibold text-lg">{{$coreServicesContent->content_json['services'][2]['subtitle'] ?? ''}}</p>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                  {{$coreServicesContent->content_json['services'][2]['description'] ?? ''}}
                                </p>
                                <div class="flex flex-wrap gap-3">
                                    @foreach($coreServicesContent->content_json['services'][2]['features'] as $feature)
                                    <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">{{$feature ?? ''}}</span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Visual Preview -->
                            <div class="lg:w-2/5 bg-gradient-to-br from-purple-500 to-purple-600 p-8 flex items-center">
                                <div class="w-full">
                                    <h4 class="text-white text-2xl font-bold mb-6">Content Management</h4>
                                    <div class="space-y-4">
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">Easy Updates</span>
                                            <span class="text-white text-2xl font-bold">✓</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">No Coding</span>
                                            <span class="text-white text-2xl font-bold">✓</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">SEO Ready</span>
                                            <span class="text-white text-2xl font-bold">✓</span>
                                        </div>
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
                <!-- <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Additional <span class="text-blue-600">Services</span>
                </h2> -->
                 {!! $additionalServicesContent->content_json['title'] ?? '' !!}
                <p class="text-lg text-gray-600">
                 {{ $additionalServicesContent->content_json['subtitle'] ?? '' }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div
                    class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $additionalServicesContent->content_json['services'][0]['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $additionalServicesContent->content_json['services'][0]['subtitle'] ?? '' }}</p>
                    <p class="text-gray-500 text-sm">{{ $additionalServicesContent->content_json['services'][0]['description'] ?? '' }}</p>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $additionalServicesContent->content_json['services'][1]['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $additionalServicesContent->content_json['services'][1]['subtitle'] ?? '' }}</p>
                    <p class="text-gray-500 text-sm">{{ $additionalServicesContent->content_json['services'][1]['description'] ?? '' }}</p>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $additionalServicesContent->content_json['services'][2]['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $additionalServicesContent->content_json['services'][2]['subtitle'] ?? '' }}</p>
                    <p class="text-gray-500 text-sm">{{ $additionalServicesContent->content_json['services'][2]['description'] ?? '' }}</p>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $additionalServicesContent->content_json['services'][3]['title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $additionalServicesContent->content_json['services'][3]['subtitle'] ?? '' }}</p>
                    <p class="text-gray-500 text-sm">{{ $additionalServicesContent->content_json['services'][3]['description'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-gray-900 text-white ">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    {!! $whyChooseUsContent->content_json['title'] ?? '' !!}
                </h2>
                <p class="text-lg text-gray-300">
                    {{$whyChooseUsContent->content_json['subtitle'] ?? ''}}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">{{$whyChooseUsContent->content_json['reasons'][0]['title'] ?? ''}}</h3>
                    <p class="text-gray-300 text-sm">{!! $whyChooseUsContent->content_json['reasons'][0]['description'] ?? '' !!}</p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">{{$whyChooseUsContent->content_json['reasons'][1]['title'] ?? ''}}</h3>
                    <p class="text-gray-300 text-sm">{!! $whyChooseUsContent->content_json['reasons'][1]['description'] ?? '' !!}
                    </p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">{{$whyChooseUsContent->content_json['reasons'][2]['title'] ?? ''}}</h3>
                    <p class="text-gray-300 text-sm">{!! $whyChooseUsContent->content_json['reasons'][2]['description'] ?? '' !!}</p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">{{$whyChooseUsContent->content_json['reasons'][3]['title'] ?? ''}}</h3>
                    <p class="text-gray-300 text-sm">{!! $whyChooseUsContent->content_json['reasons'][3]['description'] ?? '' !!}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Inside Our Web Development Company's Custom Process Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {!! $processContent->content_json['title'] ?? '' !!}  
                </h2>
                <p class="text-lg text-gray-600">
                    {{$processContent->content_json['subtitle'] ?? ''}} 
                </p>
            </div>

            <!-- Web Development Foundations -->
            <div class="mb-16">
                <div class="text-center mb-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Web Development Foundations</h3>
                </div>
                
                <!-- Simple Process Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Front-End Development -->
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-code text-blue-600 text-xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">{{$processContent->content_json['processes'][0]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 mb-4">
                           {!! $processContent->content_json['processes'][0]['description'] ?? '' !!}
                        </p>
                            <?php
                            $techString = $processContent->content_json['processes'][0]['technology']; 
                            $technologies = explode(',', $techString); // convert to array
                            ?>
                       
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($technologies as $tech): ?>
                                    <span class="px-2 py-1 bg-blue-50 text-blue-700 rounded text-sm">
                                        <?= htmlspecialchars(trim($tech)) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                      
                    </div>

                    <!-- Back-End Development -->
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-server text-green-600 text-xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">{{$processContent->content_json['processes'][1]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 mb-4">
                        {!! $processContent->content_json['processes'][1]['description'] ?? '' !!}
                        </p>
                        <?php
                            $techString1 = $processContent->content_json['processes'][1]['technology']; 
                            $technologies1 = explode(',', $techString1); // convert to array
                            ?>
                        <div class="flex flex-wrap gap-2">
                                <?php foreach ($technologies1 as $tech): ?>
                                    <span class="px-2 py-1 bg-green-50 text-green-700 rounded text-sm">
                                        <?= htmlspecialchars(trim($tech)) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                    </div>

                    <!-- Full-Stack Development -->
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-layer-group text-purple-600 text-xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">{{$processContent->content_json['processes'][2]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 mb-4">
                        {!! $processContent->content_json['processes'][2]['description'] ?? '' !!}
                        </p>
                        <?php
                            $techString2 = $processContent->content_json['processes'][2]['technology']; 
                            $technologies2 = explode(',', $techString2); // convert to array
                            ?>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($technologies2 as $tech): ?>
                                <span class="px-2 py-1 bg-purple-50 text-purple-700 rounded text-sm">
                                    <?= htmlspecialchars(trim($tech)) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- CMS Development -->
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-edit text-orange-600 text-xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">{{$processContent->content_json['processes'][3]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 mb-4">
                          {!! $processContent->content_json['processes'][3]['description'] ?? '' !!}
                        </p>
                        <?php
                            $techString3 = $processContent->content_json['processes'][3]['technology']; 
                            $technologies3 = explode(',', $techString3); // convert to array
                            ?>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($technologies3 as $tech): ?>
                                <span class="px-2 py-1 bg-orange-50 text-purple-700 rounded text-sm">
                                    <?= htmlspecialchars(trim($tech)) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Database Management -->
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-database text-teal-600 text-xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">{{$processContent->content_json['processes'][4]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 mb-4">
                        {!! $processContent->content_json['processes'][4]['description'] ?? '' !!}
                        </p>
                        <?php
                            $techString4 = $processContent->content_json['processes'][4]['technology']; 
                            $technologies4 = explode(',', $techString4); // convert to array
                            ?>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($technologies4 as $tech): ?>
                                <span class="px-2 py-1 bg-teal-50 text-teal-700 rounded text-sm">
                                    <?= htmlspecialchars(trim($tech)) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Security & Testing -->
                    <div class="bg-gray-50 p-8 rounded-lg">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-shield-alt text-red-600 text-xl"></i>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-3">{{$processContent->content_json['processes'][5]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 mb-4">
                        {!! $processContent->content_json['processes'][5]['description'] ?? '' !!}
                        </p>
                        <?php
                            $techString5 = $processContent->content_json['processes'][5]['technology']; 
                            $technologies5 = explode(',', $techString5); // convert to array
                            ?>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($technologies5 as $tech): ?>
                                <span class="px-2 py-1 bg-teal-50 text-teal-700 rounded text-sm">
                                    <?= htmlspecialchars(trim($tech)) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ecommerce Development -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $allSections['ecommerce_development']['content_json']['title'] ?? 'Ecommerce Development' }}
                    </h3>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    @foreach($allSections['ecommerce_development']['content_json']['methodologies'] ?? [] as $index => $methodology)
                        <div class="bg-gradient-to-br 
                            {{ $index % 2 == 0 ? 'from-emerald-50 to-green-50 border-emerald-100' : 'from-red-50 to-pink-50 border-red-100' }} 
                            rounded-3xl p-8 shadow-xl border">
                            
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br 
                                    {{ $index % 2 == 0 ? 'from-emerald-500 to-green-600' : 'from-red-500 to-pink-600' }} 
                                    rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                    
                                    {{-- You can change icons conditionally as well --}}
                                    @if($index % 2 == 0)
                                        {{-- Shopping cart icon --}}
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 3H5.4M7 13L5.4 5M7 13l-2.293 
                                                2.293c-.63.63-.184 1.707.707 1.707H17M17 13v4a2 2 
                                                0 01-2 2H9a2 2 0 01-2-2v-4m8 0V9a2 2 
                                                0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                                        </svg>
                                    @else
                                        {{-- Shield / security icon --}}
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 
                                                0 0112 2.944a11.955 11.955 0 
                                                01-8.618 3.04A12.02 12.02 0 003 
                                                9c0 5.591 3.824 10.29 9 
                                                11.622 5.176-1.332 9-6.03 
                                                9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <h4 class="text-2xl font-bold text-gray-900">
                                    {{ $methodology['main_heading'] ?? '' }}
                                </h4>
                            </div>

                            <div class="space-y-6">
                                @if(!empty($methodology['heading1']) || !empty($methodology['discription1']))
                                    <div>
                                        <h5 class="text-lg font-semibold text-gray-900 mb-3">{{ $methodology['heading1'] ?? '' }}</h5>
                                        <p class="text-gray-600 leading-relaxed mb-4">{{ $methodology['discription1'] ?? '' }}</p>

                                        {{-- Technologies (if available) --}}
                                        @if(!empty($methodology['technologies']))
                                            <div class="flex flex-wrap gap-3">
                                                @foreach(explode(',', $methodology['technologies']) as $tech)
                                                    <span class="px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm font-medium">
                                                        {{ trim($tech) }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                @if(!empty($methodology['heading2']) || !empty($methodology['discription2']))
                                    <div>
                                        <h5 class="text-lg font-semibold text-gray-900 mb-3">{{ $methodology['heading2'] ?? '' }}</h5>
                                        <p class="text-gray-600 leading-relaxed">{{ $methodology['discription2'] ?? '' }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Development Methodologies -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $allSections['development_methodologies']['content_json']['title'] }}
                    </h3>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Agile Methodology -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            {{ $allSections['development_methodologies']['content_json']['methodologies'][0]['title'] }}
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $allSections['development_methodologies']['content_json']['methodologies'][0]['description'] }}
                        </p>
                    </div>

                    <!-- DevOps -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            {{ $allSections['development_methodologies']['content_json']['methodologies'][1]['title'] }}
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $allSections['development_methodologies']['content_json']['methodologies'][1]['description'] }}
                        </p>
                    </div>

                    <!-- Test-Driven Development -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            {{ $allSections['development_methodologies']['content_json']['methodologies'][2]['title'] }}
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $allSections['development_methodologies']['content_json']['methodologies'][2]['description'] }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- DevOps and Deployment -->
            <div class="mb-20" id="devops-deployment">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $allSections['devops_deployment']['content_json']['title'] ?? 'DevOps and Deployment' }}
                    </h3>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- CI/CD -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            {{ $allSections['devops_deployment']['content_json']['services'][0]['title'] ?? '' }}
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $allSections['devops_deployment']['content_json']['services'][0]['description'] ?? '' }}
                        </p>
                    </div>

                    <!-- Containerization -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            {{ $allSections['devops_deployment']['content_json']['services'][1]['title'] ?? '' }}
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $allSections['devops_deployment']['content_json']['services'][1]['description'] ?? '' }}
                        </p>
                    </div>

                    <!-- Cloud Services -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">
                            {{ $allSections['devops_deployment']['content_json']['services'][2]['title'] ?? '' }}
                        </h4>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $allSections['devops_deployment']['content_json']['services'][2]['description'] ?? '' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Database Management -->
            <div class="mb-20" id="database-management">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $allSections['database_management']['content_json']['title'] ?? 'Database Management' }}
                    </h3>
                </div>
                
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- First Card: Comprehensive Database Solutions -->
                    <div class="bg-gradient-to-br from-slate-50 to-gray-50 rounded-3xl p-8 shadow-xl border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-slate-500 to-gray-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <!-- same DB icon -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">
                                {{ $allSections['database_management']['content_json']['main_services'][0]['title'] ?? '' }}
                            </h4>
                        </div>

                        <div class="space-y-6">
                            @foreach($allSections['database_management']['content_json']['main_services'][0]['sections'] ?? [] as $section)
                                <div>
                                    <h5 class="text-lg font-semibold text-gray-900 mb-3">{{ $section['heading'] ?? '' }}</h5>
                                    <p class="text-gray-600 leading-relaxed mb-4">{{ $section['description'] ?? '' }}</p>

                                    {{-- Only show technologies grid if present --}}
                                    @if(!empty($section['technologies']))
                                        @php
                                            $techs = explode(',', $section['technologies']);
                                        @endphp
                                        <div class="grid grid-cols-2 gap-3">
                                            @foreach($techs as $tech)
                                                <div class="flex items-center space-x-2">
                                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                                        <!-- keep same tech icon -->
                                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                                            <circle cx="12" cy="12" r="10"/>
                                                        </svg>
                                                    </div>
                                                    <span class="text-sm font-medium text-gray-700">{{ trim($tech) }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Second Card: Security & Performance Optimization -->
                    <div class="bg-gradient-to-br from-red-50 to-orange-50 rounded-3xl p-8 shadow-xl border border-red-100">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-orange-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <!-- same shield icon -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">
                                {{ $allSections['database_management']['content_json']['main_services'][1]['title'] ?? '' }}
                            </h4>
                        </div>

                        <div class="space-y-6">
                            @foreach($allSections['database_management']['content_json']['main_services'][1]['sections'] ?? [] as $section)
                                <div>
                                    <h5 class="text-lg font-semibold text-gray-900 mb-3">{{ $section['heading'] ?? '' }}</h5>
                                    <p class="text-gray-600 leading-relaxed">{{ $section['description'] ?? '' }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <!-- Security -->
            <div class="mb-20" id="security">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $allSections['security']['content_json']['title'] ?? 'Security' }}
                    </h3>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- First Card: Comprehensive Security Measures -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 shadow-xl border border-blue-100">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <!-- same lock icon -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">
                                {{ $allSections['security']['content_json']['main_services'][0]['title'] ?? '' }}
                            </h4>
                        </div>

                        <div class="space-y-6">
                            @foreach($allSections['security']['content_json']['main_services'][0]['sections'] ?? [] as $section)
                                <div>
                                    <h5 class="text-lg font-semibold text-gray-900 mb-3">{{ $section['title'] ?? '' }}</h5>
                                    <p class="text-gray-600 leading-relaxed">{{ $section['description'] ?? '' }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Second Card: Access Control & Compliance -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-8 shadow-xl border border-green-100">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <!-- same shield icon -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">
                                {{ $allSections['security']['content_json']['main_services'][1]['title'] ?? '' }}
                            </h4>
                        </div>

                        <div class="space-y-6">
                            @foreach($allSections['security']['content_json']['main_services'][1]['sections'] ?? [] as $section)
                                <div>
                                    <h5 class="text-lg font-semibold text-gray-900 mb-3">{{ $section['title'] ?? '' }}</h5>
                                    <p class="text-gray-600 leading-relaxed">{{ $section['description'] ?? '' }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Optimization -->
            <div class="mb-20" id="performance_optimization">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $allSections['performance_optimization']['content_json']['title'] ?? 'Performance Optimization' }}
                    </h3>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- First Card: Advanced Optimization Techniques -->
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 shadow-xl border border-purple-100">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <!-- same lightning bolt icon -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">
                                {{ $allSections['performance_optimization']['content_json']['main_services'][0]['title'] ?? '' }}
                            </h4>
                        </div>

                        <div class="space-y-6">
                            @foreach($allSections['performance_optimization']['content_json']['main_services'][0]['sections'] ?? [] as $section)
                                <div>
                                    <h5 class="text-lg font-semibold text-gray-900 mb-3">{{ $section['title'] ?? '' }}</h5>
                                    <p class="text-gray-600 leading-relaxed">{{ $section['description'] ?? '' }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Second Card: Scalability & Continuous Monitoring -->
                    <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-3xl p-8 shadow-xl border border-orange-100">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <!-- same monitoring icon -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">
                                {{ $allSections['performance_optimization']['content_json']['main_services'][1]['title'] ?? '' }}
                            </h4>
                        </div>

                        <div class="space-y-6">
                            @foreach($allSections['performance_optimization']['content_json']['main_services'][1]['sections'] ?? [] as $section)
                                <div>
                                    <h5 class="text-lg font-semibold text-gray-900 mb-3">{{ $section['title'] ?? '' }}</h5>
                                    <p class="text-gray-600 leading-relaxed">{{ $section['description'] ?? '' }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quality Control and Testing -->
            <div class="mb-20" id="quality_control_testing">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $allSections['quality_control_testing']['content_json']['title'] ?? 'Quality Control and Testing' }}
                    </h3>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Comprehensive Testing Processes -->
                    <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-3xl p-8 shadow-xl border border-teal-100">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <!-- same checkmark icon -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">
                                {{ $allSections['quality_control_testing']['content_json']['comprehensive']['title'] ?? '' }}
                            </h4>
                        </div>

                        <div class="space-y-4">
                            @foreach($allSections['quality_control_testing']['content_json']['comprehensive']['items'] ?? [] as $item)
                                <div class="flex items-start space-x-3">
                                    <div class="w-6 h-6 bg-teal-100 rounded-full flex items-center justify-center mt-1">
                                        <!-- small checkmark icon -->
                                        <svg class="w-3 h-3 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-gray-900">{{ $item['subtitle'] ?? '' }}</h5>
                                        <p class="text-gray-600 text-sm">{{ $item['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Robust Quality Assurance Techniques -->
                    <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-3xl p-8 shadow-xl border border-indigo-100">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-blue-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                <!-- same bar chart icon -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-900">
                                {{ $allSections['quality_control_testing']['content_json']['robust']['title'] ?? '' }}
                            </h4>
                        </div>

                        <div class="space-y-4">
                            @foreach($allSections['quality_control_testing']['content_json']['robust']['items'] ?? [] as $item)
                                <div>
                                    <h5 class="text-lg font-semibold text-gray-900 mb-2">{{ $item['subtitle'] ?? '' }}</h5>
                                    <p class="text-gray-600 text-sm leading-relaxed">{{ $item['description'] ?? '' }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Designing, UI & UX -->
            <div class="mb-20" id="designing_ui_ux">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $allSections['designing_ui_ux']['content_json']['title'] ?? 'Designing, UI & UX' }}
                    </h3>
                </div>
                
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Loop through services -->
                    @foreach($allSections['designing_ui_ux']['content_json']['services'] ?? [] as $index => $service)
                        <div class="
                            rounded-3xl p-8 shadow-xl border
                            @if($index == 0) 
                                bg-gradient-to-br from-pink-50 to-rose-50 border-pink-100
                            @else 
                                bg-gradient-to-br from-violet-50 to-purple-50 border-violet-100
                            @endif
                        ">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 
                                    @if($index == 0) 
                                        bg-gradient-to-br from-pink-500 to-rose-600 
                                    @else 
                                        bg-gradient-to-br from-violet-500 to-purple-600 
                                    @endif
                                    rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                                    
                                    <!-- Keep same icons -->
                                    @if($index == 0)
                                        <!-- Design Strategy icon -->
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z" />
                                        </svg>
                                    @else
                                        <!-- Enhancing UX icon -->
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    @endif
                                </div>
                                <h4 class="text-2xl font-bold text-gray-900">
                                    {{ $service['title'] ?? '' }}
                                </h4>
                            </div>
                            
                            <div class="space-y-6">
                                @foreach($service['items'] ?? [] as $item)
                                    <div>
                                        <h5 class="text-lg font-semibold text-gray-900 mb-3">{{ $item['subtitle'] ?? '' }}</h5>
                                        <p class="text-gray-600 leading-relaxed">{{ $item['description'] ?? '' }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </section>

    <!-- Our Cross-Hair Go Beyond Custom Web Development Services -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            {{-- Section Title --}}
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {!! $crossHairContent['content_json']['title'] !!}
                </h2>
            </div>

            {{-- Services Grid --}}
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($crossHairContent['content_json']['services'] as $index => $service)
                    <div
                        class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">

                        {{-- Icon (static, based on index) --}}
                        <div
                            class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6
                            @if($index == 0) bg-gradient-to-br from-blue-500 to-blue-600
                            @elseif($index == 1) bg-gradient-to-br from-green-500 to-green-600
                            @elseif($index == 2) bg-gradient-to-br from-purple-500 to-purple-600 @endif">

                            @if($index == 0)
                                {{-- UI/UX Design Icon --}}
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                                </svg>
                            @elseif($index == 1)
                                {{-- SEO Icon --}}
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            @elseif($index == 2)
                                {{-- End-To-End Development Icon --}}
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                            @endif
                        </div>

                        {{-- Service Title --}}
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">
                            {{ $service['title'] }}
                        </h3>

                        {{-- Service Description --}}
                        <p class="text-gray-600 leading-relaxed mb-6">
                            {{ $service['description'] }}
                        </p>

                        {{-- Tags --}}
                        <div class="flex flex-wrap gap-2">
                            @foreach ($service['tags'] as $tag)
                                <span
                                    class="px-3 py-1 rounded-full text-sm 
                                    @if($index == 0) bg-blue-50 text-blue-700 
                                    @elseif($index == 1) bg-green-50 text-green-700 
                                    @elseif($index == 2) bg-purple-50 text-purple-700 @endif">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- What Is Custom Website Development Section -->

    <section class="py-24 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-40 h-40 bg-blue-500 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-20 w-32 h-32 bg-indigo-500 rounded-full blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-purple-500 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-5xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    {!! $allSections['what_is_custom']['content_json']['title'] ?? '' !!}
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    {{ $allSections['what_is_custom']['content_json']['description'] ?? 'Custom website development is building a website or web-based application from scratch that addresses the unique requirements of your business, attracts the right audience, and enhances your online brand image.' }}
                </p>
            </div>

            <!-- Key Stages -->
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ $allSections['what_is_custom']['content_json']['subtitle'] ?? 'The Key Stages of Custom Web Development' }}
                    </h3>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($allSections['what_is_custom']['content_json']['services'] ?? [] as $index => $service)
                            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                            <div class="w-16 h-16 
                                @if($index % 6 == 0) bg-gradient-to-br from-blue-500 to-blue-600 
                                @elseif($index % 6 == 1) bg-gradient-to-br from-indigo-500 to-indigo-600 
                                @elseif($index % 6 == 2) bg-gradient-to-br from-purple-500 to-purple-600 
                                @elseif($index % 6 == 3) bg-gradient-to-br from-green-500 to-green-600 
                                @elseif($index % 6 == 4) bg-gradient-to-br from-orange-500 to-orange-600 
                                @else bg-gradient-to-br from-pink-500 to-pink-600 
                                @endif
                                rounded-2xl flex items-center justify-center mb-6 shadow-lg">

                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" 
                                        d="M9 5h6m-3 0v14m0-14a2 2 0 00-2-2H9m6 0h2a2 2 0 012 2v14a2 2 0 01-2 2h-2"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">{{ $service['title'] ?? '' }}</h4>
                            <p class="text-gray-600 leading-relaxed">{{ $service['description'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Why Do You Need Custom Web Design & Development Section -->
    <section class="py-24 bg-gradient-to-br from-gray-900 via-slate-800 to-gray-900 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-5xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    {!! $allSections['why_need_custom']['content_json']['title'] !!}
                </h2>
                <p class="text-xl text-gray-300 leading-relaxed">
                    {!! $allSections['why_need_custom']['content_json']['description'] !!}
                </p>
            </div>

            <!-- Benefits Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
                @foreach($allSections['why_need_custom']['content_json']['benefits'] as $index => $benefit)
                    <div class="group bg-gradient-to-br from-gray-800/50 to-gray-700/50 backdrop-blur-sm 
                        rounded-3xl p-8 shadow-xl border border-gray-600/30 hover:shadow-2xl 
                        transition-all duration-500 hover:-translate-y-3 
                        @if($index % 8 == 0) hover:border-blue-500/50 
                        @elseif($index % 8 == 1) hover:border-green-500/50 
                        @elseif($index % 8 == 2) hover:border-purple-500/50 
                        @elseif($index % 8 == 3) hover:border-orange-500/50 
                        @elseif($index % 8 == 4) hover:border-pink-500/50 
                        @elseif($index % 8 == 5) hover:border-cyan-500/50 
                        @elseif($index % 8 == 6) hover:border-indigo-500/50 
                        @else hover:border-teal-500/50 @endif">

                        <!-- Icon -->
                        <div class="w-16 h-16 
                            @if($index % 8 == 0) bg-gradient-to-br from-blue-500 to-blue-600 
                            @elseif($index % 8 == 1) bg-gradient-to-br from-green-500 to-green-600 
                            @elseif($index % 8 == 2) bg-gradient-to-br from-purple-500 to-purple-600 
                            @elseif($index % 8 == 3) bg-gradient-to-br from-orange-500 to-orange-600 
                            @elseif($index % 8 == 4) bg-gradient-to-br from-pink-500 to-pink-600 
                            @elseif($index % 8 == 5) bg-gradient-to-br from-cyan-500 to-cyan-600 
                            @elseif($index % 8 == 6) bg-gradient-to-br from-indigo-500 to-indigo-600 
                            @else bg-gradient-to-br from-teal-500 to-teal-600 @endif
                            rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            
                            {{-- Static icons by index --}}
                            @if($index % 8 == 0)
                                <!-- Unique Designs -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                                </svg>
                            @elseif($index % 8 == 1)
                                <!-- Secure & Reliable -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            @elseif($index % 8 == 2)
                                <!-- Optimized Performance -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            @elseif($index % 8 == 3)
                                <!-- Responsive Layouts -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            @elseif($index % 8 == 4)
                                <!-- SEO Friendly -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            @elseif($index % 8 == 5)
                                <!-- Fast Loading -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v18m9-9H3"></path>
                                </svg>
                            @elseif($index % 8 == 6)
                                <!-- Maintenance Support -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2v-6h14v6a2 2 0 01-2 2z"></path>
                                </svg>
                            @else
                                <!-- Custom Functionality -->
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            @endif
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-white mb-4">{{ $benefit['title'] }}</h3>

                        <!-- Description -->
                        <p class="text-gray-300 leading-relaxed">{{ $benefit['description'] }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


    <!-- What Services Does A Custom Web Development Company Offer Section -->
     <section class="py-24 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-20 h-20 bg-blue-400 rounded-full blur-2xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-32 h-32 bg-purple-400 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-indigo-400 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-5xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    {!! $allSections['what_services']['content_json']['title'] ?? '' !!}
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    {{$allSections['what_services']['content_json']['description'] ?? ''}}
                </p>
            </div>

            <!-- Core Services -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4"> {{$allSections['what_services']['content_json']['core_services_heading'] ?? ''}}</h3>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    <!-- Frontend & Backend Development -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">{{ $allSections['what_services']['content_json']['core_services'][0]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 leading-relaxed">
                          {!! $allSections['what_services']['content_json']['core_services'][0]['title'] ?? '' !!}
                        </p>
                    </div>

                    <!-- Responsive Design -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">{{ $allSections['what_services']['content_json']['core_services'][1]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 leading-relaxed">
                        {!! $allSections['what_services']['content_json']['core_services'][1]['title'] ?? '' !!}
                        </p>
                    </div>

                    <!-- App Development -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">{{ $allSections['what_services']['content_json']['core_services'][2]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 leading-relaxed">
                        {!! $allSections['what_services']['content_json']['core_services'][2]['title'] ?? '' !!}
                        </p>
                    </div>

                    <!-- Website Support -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">{{ $allSections['what_services']['content_json']['core_services'][3]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 leading-relaxed">
                        {!! $allSections['what_services']['content_json']['core_services'][3]['title'] ?? '' !!}
                        </p>
                    </div>

                    <!-- Website Migration -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">{{ $allSections['what_services']['content_json']['core_services'][4]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 leading-relaxed">
                        {!! $allSections['what_services']['content_json']['core_services'][4]['title'] ?? '' !!}
                        </p>
                    </div>

                    <!-- Website Redesign -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">{{ $allSections['what_services']['content_json']['core_services'][5]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 leading-relaxed">
                        {!! $allSections['what_services']['content_json']['core_services'][5]['title'] ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Specialized Services -->
            <div class="mb-16">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">{{ $allSections['what_services']['content_json']['special_services_heading'] ?? '' }}</h3>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    <!-- eCommerce Development -->
                    <div class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-3xl p-8 shadow-xl border border-emerald-100">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 3H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v4a2 2 0 01-2 2H9a2 2 0 01-2-2v-4m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">{{ $allSections['what_services']['content_json']['special_services'][0]['title'] ?? ''}}</h4>
                        <p class="text-gray-600 leading-relaxed mb-4">
                        {!! $allSections['what_services']['content_json']['special_services'][0]['description'] ?? '' !!}
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm">Shopify</span>
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm">WooCommerce</span>
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm">Magento</span>
                        </div>
                    </div>

                    <!-- Enterprise Solutions -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-8 shadow-xl border border-blue-100">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">Enterprise Solutions</h4>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Complex systems with AI integration, CMS customization, and big data capabilities.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">AI Integration</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Big Data</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">CMS Custom</span>
                        </div>
                    </div>

                    <!-- SEO Optimization -->
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl p-8 shadow-xl border border-purple-100">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">SEO Optimization</h4>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Ensuring search visibility with robust on-page techniques.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">On-Page SEO</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Search Visibility</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm">Rankings</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 


    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {!! $faqContent->content_json['title'] ?? '' !!}
                    
                </h2>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="space-y-6">
                    @foreach($faqContent->content_json['faqs'] as $faq)
                    <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">{{$faq['question'] ?? ''}}</h3>
                        <p class="text-gray-600">{{$faq['answer'] ?? ''}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <button id="backToTop"
        class="fixed bottom-8 right-8 w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-xl transition-all duration-300 opacity-0 invisible hover:scale-110 z-50">
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
                anchor.addEventListener('click', function(e) {
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
