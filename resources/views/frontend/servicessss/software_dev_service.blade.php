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
                Custom <span class="holographic">Software</span> Development Services
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                You define the vision; we craft the software to bring it to life. With a focus on scalability, performance, and purpose-driven solutions, our custom software development services address your unique challenges and drive results.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    AI-Driven Solutions
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    Enterprise Ready
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    Scalable Architecture
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    🚀 Start Your Software Project
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
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(139, 92, 246, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Main Title -->
            <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Custom Software Development Services <br>
                <span class="bg-gradient-to-r from-purple-600 to-blue-700 bg-clip-text text-transparent">That are AI-Driven</span>
            </h2>
            
            <!-- Description -->
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-16 max-w-4xl mx-auto font-light">
                As AI becomes a likable tool for industries, they are using it to make smart decisions. Our software development services powered by AI allow smart software applications to flourish in every industry from healthcare to retail using NLP, computer vision, and more.
            </p>
            
            <!-- Feature Cards -->
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">AI-Powered Automation</h3>
                    <p class="text-gray-600 leading-relaxed">Automate dull job workflows and enhance client experience with intelligent software solutions powered by machine learning and AI</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Enterprise Solutions</h3>
                    <p class="text-gray-600 leading-relaxed">Build reliable and secure custom systems that scale your business with advanced analytics and integrated workflows</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Revenue Growth</h3>
                    <p class="text-gray-600 leading-relaxed">Increase revenue like never before with smart software applications that enhance efficiency and drive business growth</p>
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
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                Our Custom Software <span class="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">Development Services</span>
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Comprehensive software development solutions tailored to your business needs
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
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Custom Software Development</h3>
                                    <p class="text-purple-600 font-semibold text-lg">Bespoke Solutions for Your Organization</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                We offer bespoke software development services to meet the unique needs of your organization. We build scalable and high-performance solutions that help enhance the efficiency of workflows, improve usability, and boost the future goals of your company.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">Scalable Solutions</span>
                                <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">High Performance</span>
                                <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">Advanced Tech</span>
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-purple-500 to-purple-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Development Metrics</h4>
                                <div class="space-y-4">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Efficiency Boost</span>
                                        <span class="text-white text-3xl font-bold">+85%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Performance</span>
                                        <span class="text-white text-3xl font-bold">+92%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Scalability</span>
                                        <span class="text-white text-3xl font-bold">∞</span>
                                    </div>
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
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Enterprise Software Development</h3>
                                    <p class="text-blue-600 font-semibold text-lg">Reliable & Secure Custom Systems</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                We assist big players in creating custom software to build reliable and secure custom systems that scale your business. Our custom products use advanced analytics, automation tools, and integrated workflows so departments can work efficiently.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">Advanced Analytics</span>
                                <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">Automation Tools</span>
                                <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">Integrated Workflows</span>
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-blue-500 to-blue-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Enterprise Benefits</h4>
                                <div class="space-y-4">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Security Level</span>
                                        <span class="text-white text-3xl font-bold">A+</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Reliability</span>
                                        <span class="text-white text-3xl font-bold">99.9%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Flexibility</span>
                                        <span class="text-white text-3xl font-bold">✓</span>
                                    </div>
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
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Software Product Development</h3>
                                    <p class="text-green-600 font-semibold text-lg">From MVP to Market Launch</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                We have proficient software engineers who can create stand-alone or customized software as per business needs. We take care of everything from MVP to product launch with research, design, and development to make sure you produce competitive, user-friendly, and market-ready products.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">MVP Development</span>
                                <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">Market Research</span>
                                <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">Product Launch</span>
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-green-500 to-green-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Product Success</h4>
                                <div class="space-y-4">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Time to Market</span>
                                        <span class="text-white text-3xl font-bold">-50%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">User Adoption</span>
                                        <span class="text-white text-3xl font-bold">+75%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Market Ready</span>
                                        <span class="text-white text-3xl font-bold">✓</span>
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
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Additional <span class="text-purple-600">Services</span>
            </h2>
            <p class="text-lg text-gray-600">
                Comprehensive solutions to enhance your software ecosystem
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Software Integration Services</h3>
                <p class="text-gray-600 text-sm mb-3">Seamless System Connection</p>
                <p class="text-gray-500 text-sm">Make your online experience easy with our integration services - ensuring new and old technologies communicate with each other seamlessly.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">API Development Services</h3>
                <p class="text-gray-600 text-sm mb-3">Reliable API Solutions</p>
                <p class="text-gray-500 text-sm">We establish frameworks to link your software and third-party systems with reliable and effective APIs designed to improve functionality.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">SaaS Development</h3>
                <p class="text-gray-600 text-sm mb-3">Scalable Cloud Solutions</p>
                <p class="text-gray-500 text-sm">Our custom SaaS software is easily scalable and affordable. We create multi-tenant architecture for various users while ensuring high performance.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Custom CRM Development</h3>
                <p class="text-gray-600 text-sm mb-3">Enhanced Customer Relations</p>
                <p class="text-gray-500 text-sm">We create custom CRM tools with contact management, sales automation, and advanced analytics to enhance customer engagement and retention.</p>
            </div>
        </div>
    </div>
</section>

<!-- Specialized Services Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Specialized <span class="text-purple-600">Software Development Services</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Software Implementation Services</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Speed up the deployment of new software solutions into your business operations. Our implementation process ensures smooth integration with your existing systems.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">Data Migration</span>
                    <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">System Config</span>
                    <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">Custom Setup</span>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">UX/UI Design</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    The success of your software depends on user experience. Our software development services focus on UX/UI design to make the software interface attractive and highly functional.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm">User Research</span>
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm">Wireframes</span>
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm">Prototypes</span>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Software Modernization</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Outdated systems may restrict growth and innovation. Our software modernization services reposition outdated applications by upgrading their architecture, design, and functionality.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">Cloud Migration</span>
                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">Microservices</span>
                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">Modern Tech</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Stack Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                We Use the Latest <span class="text-purple-400">Tech Stack</span>
            </h2>
            <p class="text-lg text-gray-300">
                Cutting-edge technologies for modern software development
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">🎨 Frontend Frameworks</h3>
                <p class="text-gray-300 text-sm mb-4">React.js, Angular, Vue.js</p>
                <div class="flex flex-wrap gap-2 justify-center">
                    <span class="px-2 py-1 bg-blue-600/20 text-blue-300 rounded text-xs">React.js</span>
                    <span class="px-2 py-1 bg-blue-600/20 text-blue-300 rounded text-xs">Angular</span>
                    <span class="px-2 py-1 bg-blue-600/20 text-blue-300 rounded text-xs">Vue.js</span>
                </div>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">⚙️ Backend Technologies</h3>
                <p class="text-gray-300 text-sm mb-4">Node.js, Python, Java, PHP</p>
                <div class="flex flex-wrap gap-2 justify-center">
                    <span class="px-2 py-1 bg-green-600/20 text-green-300 rounded text-xs">Node.js</span>
                    <span class="px-2 py-1 bg-green-600/20 text-green-300 rounded text-xs">Python</span>
                    <span class="px-2 py-1 bg-green-600/20 text-green-300 rounded text-xs">Java</span>
                </div>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">📱 Mobile Development</h3>
                <p class="text-gray-300 text-sm mb-4">Flutter, React Native, Swift</p>
                <div class="flex flex-wrap gap-2 justify-center">
                    <span class="px-2 py-1 bg-purple-600/20 text-purple-300 rounded text-xs">Flutter</span>
                    <span class="px-2 py-1 bg-purple-600/20 text-purple-300 rounded text-xs">React Native</span>
                    <span class="px-2 py-1 bg-purple-600/20 text-purple-300 rounded text-xs">Swift</span>
                </div>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">☁️ Cloud Platforms</h3>
                <p class="text-gray-300 text-sm mb-4">AWS, Google Cloud, Azure</p>
                <div class="flex flex-wrap gap-2 justify-center">
                    <span class="px-2 py-1 bg-orange-600/20 text-orange-300 rounded text-xs">AWS</span>
                    <span class="px-2 py-1 bg-orange-600/20 text-orange-300 rounded text-xs">Azure</span>
                    <span class="px-2 py-1 bg-orange-600/20 text-orange-300 rounded text-xs">GCP</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Industries We Serve Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Industries We <span class="text-purple-600">Serve</span>
            </h2>
            <p class="text-lg text-gray-600">
                Specialized software solutions for diverse industries
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Banking</h3>
                <p class="text-gray-600 text-sm">We help banks create software that is secure, scalable, and efficient. We tailor-make online banking software and fraud detection systems that enhance customer satisfaction.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Capital Markets</h3>
                <p class="text-gray-600 text-sm">We create software for capital markets to provide tools for real-time data analysis, automated trading systems, and risk management platforms.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Automotive</h3>
                <p class="text-gray-600 text-sm">Vehicle management systems, IoT-based connectivity tools, and predictive maintenance software to improve operational efficiency and customer experience.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Retail</h3>
                <p class="text-gray-600 text-sm">Tailor-made software solutions that improve efficiency and help generate more sales with e-commerce development and analytics tools integration.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Telecommunications</h3>
                <p class="text-gray-600 text-sm">Custom solutions that enable providers to improve network efficiency, manage customer data, optimize billing, and enhance service delivery.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Oil and Gas</h3>
                <p class="text-gray-600 text-sm">Software that optimizes resources, enhances operations, analyzes and mitigates risks, and improves safety measures with constant monitoring.</p>
            </div>
        </div>
    </div>
</section>

<!-- Development Process Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Development <span class="text-purple-600">Process</span>
            </h2>
            <p class="text-lg text-gray-600">
                A proven approach for creating custom software tailored to your operations
            </p>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-8">
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        1
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Initial Consultation</h3>
                        <p class="text-gray-600">Understanding your business needs, challenges, and objectives to define the project scope.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        2
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Requirements Documentation</h3>
                        <p class="text-gray-600">Comprehensive analysis and planning with detailed project roadmaps and resource identification.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        3
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Prototyping & Wireframing</h3>
                        <p class="text-gray-600">Creating intuitive, aesthetically pleasing user interfaces to give your clients the best experience.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-orange-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        4
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Development</h3>
                        <p class="text-gray-600">Building reliable, scalable, and secure software using the newest tools and technologies.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        5
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Testing</h3>
                        <p class="text-gray-600">Thorough examination to ensure there are no flaws or problems and everything works as intended.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        6
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Deployment</h3>
                        <p class="text-gray-600">Smooth deployment management so you can get started right away with your new software.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-6">
                        7
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Ongoing Support</h3>
                        <p class="text-gray-600">Continuous software maintenance and updates throughout its lifecycle to improve performance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Frequently Asked <span class="text-purple-600">Questions</span>
            </h2>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-6">
                <div class="bg-white rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">How much does it cost to develop custom software?</h3>
                    <p class="text-gray-600">The cost varies based on project complexity, features, and team size. The price usually falls within $25,000 to $300,000. For a customized estimate, reach out to us today.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">How long does it take to build custom software?</h3>
                    <p class="text-gray-600">The development timeline depends on complexity and requirements, generally ranging from 4 to 18 months including requirements gathering, design, development, and testing phases.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">How do you ensure the security of my project?</h3>
                    <p class="text-gray-600">We take security seriously with secure coding practices, access controls, NDAs, and various security protocols to ensure your intellectual property and data remain protected.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Can custom software integrate with my existing systems?</h3>
                    <p class="text-gray-600">Absolutely! Custom solutions are tailor-made to integrate with your CRM, ERP, and third-party software easily, ensuring better workflow and operations.</p>
                </div>
                
                <div class="bg-white rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Do you offer post-launch support and maintenance?</h3>
                    <p class="text-gray-600">Yes, we ensure your product is well-maintained, up-to-date, and fully functioning via regular maintenance, updates, and ongoing support.</p>
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
                Ready to Build Your <span class="text-purple-400">Custom Software?</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Transform your business with AI-driven custom software solutions that scale with your growth. Our expert team is ready to bring your vision to life with cutting-edge technology and innovative development practices.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🤖 AI-Powered Solutions
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🚀 Agile Development
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🔧 24/7 Support
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button  onclick="openContactModal()" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    🚀 Start Your Software Project
                </button>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    📞 Schedule Free Consultation
                </a>
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