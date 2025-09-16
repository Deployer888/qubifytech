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
        <div class="text-center max-w-5xl mx-auto">
            <!-- Main Headline -->
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                Mobile <span class="holographic">App</span> Development Services
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                You bring the vision. We bring it to life—built with precision, passion, and purpose. We build apps that feel natural to use, perform flawlessly, and scale easily with your business growth.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    iOS & Android Native
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    Flutter & React Native
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    Future-Ready Solutions
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    🚀 Start Your Mobile App
                </button>
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    💬 Get Free Consultation
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
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(236, 72, 153, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Main Title -->
            <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Mobile Apps Are No Longer Optional <br>
                <span class="bg-gradient-to-r from-pink-600 to-purple-700 bg-clip-text text-transparent">They're Essential</span>
            </h2>
            
            <!-- Description -->
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-16 max-w-4xl mx-auto font-light">
                At Qubify Tech, we know mobile apps are how your business stays connected, competitive, and ready for growth. We build apps that feel natural to use, perform flawlessly, and scale easily—secure, future-proof, and built around your goals.
            </p>
            
            <!-- Feature Cards -->
            <div class="grid md:grid-cols-4 gap-8 max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">User-First Design</h3>
                    <p class="text-gray-600 leading-relaxed">Apps that feel intuitive, not forced, with natural user experiences</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Speed & Performance</h3>
                    <p class="text-gray-600 leading-relaxed">Fast load times and smooth interactions for optimal user experience</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Scalability</h3>
                    <p class="text-gray-600 leading-relaxed">Apps that grow with your business and adapt to changing needs</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Security</h3>
                    <p class="text-gray-600 leading-relaxed">Protect your users and reputation at every touchpoint</p>
                </div>
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
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                Future-Ready <span class="bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">Mobile App Development</span>
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Technology changes fast. Your app should too. We embed future-focused features into your mobile solution from day one.
            </p>
        </div>
        
        <!-- Future Tech Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
            <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3">
                <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-pink-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">AI Integration</h3>
                <p class="text-gray-600 leading-relaxed">
                    Smarter chatbots, predictive personalization, and better business insights powered by artificial intelligence.
                </p>
            </div>
            
            <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">IoT Connectivity</h3>
                <p class="text-gray-600 leading-relaxed">
                    Real-time device connectivity and control for smart home, industrial, and wearable applications.
                </p>
            </div>
            
            <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">AR & VR</h3>
                <p class="text-gray-600 leading-relaxed">
                    Immersive shopping, learning, and training experiences with augmented and virtual reality integration.
                </p>
            </div>
            
            <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Blockchain</h3>
                <p class="text-gray-600 leading-relaxed">
                    Tamper-proof security and transparent transactions with decentralized technology integration.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Mobile App Development Services Section -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                Our Mobile App <span class="bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">Development Services</span>
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Different businesses. Different apps. Tailored every time.
            </p>
        </div>
        
        <!-- Services Stack -->
        <div class="max-w-5xl mx-auto space-y-12">
            
            <!-- Service 1: iOS App Development -->
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex flex-col lg:flex-row">
                        <!-- Content Section -->
                        <div class="lg:w-3/5 p-12">
                            <div class="flex items-start mb-8">
                                <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">iOS App Development</h3>
                                    <p class="text-gray-600 font-semibold text-lg">Beautiful Apps for Apple Users</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                Apple users are loyal—and they expect apps that work, feel beautiful, and perform without friction. We build iOS apps using Swift and Objective-C, following Apple's Human Interface Guidelines, and integrating services like Apple Pay, HealthKit, and CoreML.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-5 py-2 bg-gray-50 text-gray-700 rounded-full font-medium">Swift & Objective-C</span>
                                <span class="px-5 py-2 bg-gray-50 text-gray-700 rounded-full font-medium">Apple Pay Integration</span>
                                <span class="px-5 py-2 bg-gray-50 text-gray-700 rounded-full font-medium">App Store Ready</span>
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-gray-800 to-gray-900 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">iOS Excellence</h4>
                                <div class="space-y-4">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">User Satisfaction</span>
                                        <span class="text-white text-3xl font-bold">98%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">App Store Approval</span>
                                        <span class="text-white text-3xl font-bold">100%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Performance</span>
                                        <span class="text-white text-3xl font-bold">A+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Service 2: Android App Development -->
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex flex-col lg:flex-row-reverse">
                        <!-- Content Section -->
                        <div class="lg:w-3/5 p-12">
                            <div class="flex items-start mb-8">
                                <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.523 15.3414c-.5511 0-.9993-.4486-.9993-.9997s.4482-.9993.9993-.9993c.5511 0 .9993.4482.9993.9993.0001.5511-.4482.9997-.9993.9997m-11.046 0c-.5511 0-.9993-.4486-.9993-.9997s.4482-.9993.9993-.9993c.5511 0 .9993.4482.9993.9993 0 .5511-.4482.9997-.9993.9997m11.4045-6.02l1.9973-3.4592a.416.416 0 00-.1521-.5676.416.416 0 00-.5676.1521l-2.0223 3.503C15.5902 8.2439 13.8533 7.8508 12 7.8508s-3.5902.3931-5.1367 1.0989L4.841 5.4467a.4161.4161 0 00-.5677-.1521.4157.4157 0 00-.1521.5676l1.9973 3.4592C2.6889 11.1867.3432 14.6589 0 18.761h24c-.3435-4.1021-2.6892-7.5743-6.1185-9.4396"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Android App Development</h3>
                                    <p class="text-green-600 font-semibold text-lg">Reach the World's Largest Mobile Platform</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                With Android powering most of the world's devices, there's massive opportunity here. We develop Android apps using Kotlin and Java, making sure they run smoothly across smartphones, tablets, and wearables while optimizing for Android fragmentation.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">Kotlin & Java</span>
                                <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">Multi-Device Support</span>
                                <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">Play Store Ready</span>
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-green-500 to-green-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Android Reach</h4>
                                <div class="space-y-4">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Global Market Share</span>
                                        <span class="text-white text-3xl font-bold">71%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Device Compatibility</span>
                                        <span class="text-white text-3xl font-bold">1000+</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Performance Score</span>
                                        <span class="text-white text-3xl font-bold">95%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Service 3: Cross-Platform App Development -->
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex flex-col lg:flex-row">
                        <!-- Content Section -->
                        <div class="lg:w-3/5 p-12">
                            <div class="flex items-start mb-8">
                                <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Cross-Platform Development</h3>
                                    <p class="text-purple-600 font-semibold text-lg">Build Smart Once, Deploy Everywhere</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                Why build twice when you can build smart once? Cross-platform frameworks like Flutter and React Native let you launch faster, with a single codebase, without sacrificing user experience. Your app will still feel natural on both iOS and Android.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">Flutter & React Native</span>
                                <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">Single Codebase</span>
                                <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">Cost Effective</span>
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-purple-500 to-purple-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Cross-Platform Benefits</h4>
                                <div class="space-y-4">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Development Time</span>
                                        <span class="text-white text-3xl font-bold">-50%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Cost Savings</span>
                                        <span class="text-white text-3xl font-bold">-40%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Code Reusability</span>
                                        <span class="text-white text-3xl font-bold">90%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section><!-
- Additional Services Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Additional <span class="text-pink-600">Services</span>
            </h2>
            <p class="text-lg text-gray-600">
                Comprehensive mobile solutions for every business need
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Hybrid Mobile App Development</h3>
                <p class="text-gray-600 text-sm mb-3">Fast Deployment & Wide Coverage</p>
                <p class="text-gray-500 text-sm">Using frameworks like Ionic, PhoneGap, and Cordova for MVPs, internal business tools, and content-driven platforms.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Progressive Web App (PWA)</h3>
                <p class="text-gray-600 text-sm mb-3">No Downloads, Full Experience</p>
                <p class="text-gray-500 text-sm">Fast load times, offline access, push notifications, and home-screen installability without app store approvals.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Custom Mobile App Development</h3>
                <p class="text-gray-600 text-sm mb-3">When Templates Won't Cut It</p>
                <p class="text-gray-500 text-sm">Built precisely to your specs with flexibility to evolve as you grow, tailored for your unique business needs.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Mobile App UI/UX Design</h3>
                <p class="text-gray-600 text-sm mb-3">Design That Works Better</p>
                <p class="text-gray-500 text-sm">User research, journey mapping, wireframing, and testing to create apps that feel effortless to use.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Mobile App Maintenance & Support</h3>
                <p class="text-gray-600 text-sm mb-3">Beyond Launch Support</p>
                <p class="text-gray-500 text-sm">Regular updates, bug fixes, performance tuning, and scaling support to keep your app competitive.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Specialized Mobile Apps</h3>
                <p class="text-gray-600 text-sm mb-3">Industry-Specific Solutions</p>
                <p class="text-gray-500 text-sm">Enterprise apps, on-demand platforms, mobile games, IoT apps, wearable apps, and blockchain applications.</p>
            </div>
        </div>
    </div>
</section>

<!-- Tech Stack Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                We Use the Latest <span class="text-pink-400">Mobile App Development Tech Stack</span>
            </h2>
            <p class="text-lg text-gray-300">
                Latest, stable, and scalable tech stacks for apps that stand the test of time
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">📱 Frontend Frameworks</h3>
                <p class="text-gray-300 text-sm mb-4">Swift, Kotlin, Flutter, React Native</p>
                <div class="flex flex-wrap gap-2 justify-center">
                    <span class="px-2 py-1 bg-pink-600/20 text-pink-300 rounded text-xs">Swift</span>
                    <span class="px-2 py-1 bg-pink-600/20 text-pink-300 rounded text-xs">Kotlin</span>
                    <span class="px-2 py-1 bg-pink-600/20 text-pink-300 rounded text-xs">Flutter</span>
                </div>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">⚙️ Backend Technologies</h3>
                <p class="text-gray-300 text-sm mb-4">Node.js, Python, Ruby, PHP</p>
                <div class="flex flex-wrap gap-2 justify-center">
                    <span class="px-2 py-1 bg-purple-600/20 text-purple-300 rounded text-xs">Node.js</span>
                    <span class="px-2 py-1 bg-purple-600/20 text-purple-300 rounded text-xs">Python</span>
                    <span class="px-2 py-1 bg-purple-600/20 text-purple-300 rounded text-xs">Django</span>
                </div>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">☁️ Cloud Platforms</h3>
                <p class="text-gray-300 text-sm mb-4">AWS, Google Cloud, Azure</p>
                <div class="flex flex-wrap gap-2 justify-center">
                    <span class="px-2 py-1 bg-blue-600/20 text-blue-300 rounded text-xs">AWS</span>
                    <span class="px-2 py-1 bg-blue-600/20 text-blue-300 rounded text-xs">GCP</span>
                    <span class="px-2 py-1 bg-blue-600/20 text-blue-300 rounded text-xs">Azure</span>
                </div>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">🗄️ Databases</h3>
                <p class="text-gray-300 text-sm mb-4">Firebase, MongoDB, PostgreSQL</p>
                <div class="flex flex-wrap gap-2 justify-center">
                    <span class="px-2 py-1 bg-green-600/20 text-green-300 rounded text-xs">Firebase</span>
                    <span class="px-2 py-1 bg-green-600/20 text-green-300 rounded text-xs">MongoDB</span>
                    <span class="px-2 py-1 bg-green-600/20 text-green-300 rounded text-xs">SQLite</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Qubify Tech Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Why Choose <span class="text-pink-600">Qubify Tech?</span>
            </h2>
            <p class="text-lg text-gray-600">
                Smart builds. Straight talk. Real outcomes.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">👥 Senior Team</h3>
                <p class="text-gray-600 text-sm">Senior engineers, designers, and architects—no juniors learning on your project.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">💬 Direct Access</h3>
                <p class="text-gray-600 text-sm">Direct access to your development team, no middle layers or communication barriers.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">📊 Clear Milestones</h3>
                <p class="text-gray-600 text-sm">Clear project milestones, fast iterations, and honest updates throughout development.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">🚀 Flexible Models</h3>
                <p class="text-gray-600 text-sm">Flexible working models: full project ownership or team extension based on your needs.</p>
            </div>
        </div>
    </div>
</section>

<!-- How We Work Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                How We <span class="text-pink-600">Work</span>
            </h2>
            <p class="text-lg text-gray-600">
                Simple. Structured. Transparent.
            </p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        1
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Discovery and Strategy Workshops</h3>
                        <p class="text-gray-600">Deep dive into your goals, challenges, and customer behaviors to map out exactly what your app needs.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        2
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Wireframing and User Flow Mapping</h3>
                        <p class="text-gray-600">Create detailed user personas, map their journeys, and wireframe intuitive flows for optimal user experience.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        3
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Visual and Interaction Design</h3>
                        <p class="text-gray-600">Design brand-aligned, clean, and mobile-first screens that guide users naturally and reduce friction.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        4
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Parallel Front-end and Back-end Development</h3>
                        <p class="text-gray-600">Simultaneous development of user interface and server-side functionality for faster delivery.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        5
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Continuous Integration and Testing</h3>
                        <p class="text-gray-600">Ongoing testing and feedback loops to ensure quality and performance throughout development.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        6
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">App Store/Play Store Launch</h3>
                        <p class="text-gray-600">Handle compliance, submission, and approvals for both App Store and Google Play Store.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        7
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Ongoing Support and Scaling</h3>
                        <p class="text-gray-600">Continuous support, improvements, and scaling to keep your app competitive and growing.</p>
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
                Frequently Asked <span class="text-pink-600">Questions</span>
            </h2>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">How much does mobile app development cost?</h3>
                    <p class="text-gray-600">Anywhere from $10,000 to $300,000, depending on scope, tech stack, and features. We provide detailed estimates after understanding your requirements.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">How long will it take?</h3>
                    <p class="text-gray-600">Most apps take 3 to 9 months, depending on complexity. Simple apps can be completed in 3-4 months, while complex enterprise apps may take 6-9 months.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Which platform should I build for first—iOS or Android?</h3>
                    <p class="text-gray-600">Depends on your users and market. Cross-platform development is often a smart early move to reach both audiences simultaneously.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Can you integrate AI features?</h3>
                    <p class="text-gray-600">Yes. We build apps with chatbots, recommendation engines, AI-powered personalization, and machine learning capabilities.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Will you handle App Store and Play Store publishing?</h3>
                    <p class="text-gray-600">Absolutely. We take care of compliance, submission, and approvals for both platforms, ensuring smooth launch process.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Is my app idea safe?</h3>
                    <p class="text-gray-600">Yes. We sign NDAs upfront and treat your intellectual property with full confidentiality and security.</p>
                </div>
            </div>
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
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to Build Your <span class="text-pink-400">Mobile App?</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Transform your vision into a powerful mobile solution that users love and your business needs. Whether you're launching something new or expanding your reach, we're here to help you move faster and stay competitive.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    📱 iOS & Android Native
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🚀 Flutter & React Native
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🤖 AI-Powered Features
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    🚀 Start Your Mobile App Project
                </button>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    📞 Schedule Free Consultation
                </a>
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