@extends('frontend.layouts.app')

@section('title')
Web Application Development Services - {{app_name()}}
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: var(--bg-hero);">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="floating-shape absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl floating"></div>
        <div class="floating-shape absolute top-40 right-20 w-32 h-32 bg-green-400/20 rounded-full blur-2xl floating" style="animation-delay: 1s;"></div>
        <div class="floating-shape absolute bottom-32 left-1/4 w-24 h-24 bg-blue-400/20 rounded-full blur-xl floating" style="animation-delay: 2s;"></div>
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
                Web <span class="holographic">Application</span> Development Services
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                You set the business goals; we create the web application to bring them to life. Count on our expertise in modern technologies like React.js, Angular, Node.js, and Python to deliver dynamic, secure, and scalable solutions.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    React.js & Angular
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    Enterprise-Grade
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    High-ROI Solutions
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    🚀 Start Your Web App Project
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
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(34, 197, 94, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            <!-- Main Title -->
            <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Why Choose Us as Your <br>
                <span class="bg-gradient-to-r from-green-600 to-blue-700 bg-clip-text text-transparent">Web App Development Company</span>
            </h2>
            
            <!-- Description -->
            <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-16 max-w-4xl mx-auto font-light">
                When you partner with us, we connect you with our team of talented developers that want to see you succeed. Our expertise extends across various industries, allowing us to create unique web apps for your niche.
            </p>
            
            <!-- Feature Cards -->
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Proven Expertise</h3>
                    <p class="text-gray-600 leading-relaxed">We have an enormous amount of experience in building high-performance applications with advanced technologies</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Advanced Technologies</h3>
                    <p class="text-gray-600 leading-relaxed">We are tech experts using the latest high-end tech stacks like React.js, Angular and ASP.NET</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Client-Centric Approach</h3>
                    <p class="text-gray-600 leading-relaxed">We make your wishes come true with commitment to quality and scalability support for future-ready solutions</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Who We Serve Section -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full opacity-30">
        <div class="absolute top-20 left-20 w-2 h-2 bg-green-400 rounded-full animate-ping"></div>
        <div class="absolute top-40 right-32 w-3 h-3 bg-blue-400 rounded-full animate-pulse"></div>
        <div class="absolute bottom-32 left-1/3 w-2 h-2 bg-purple-400 rounded-full animate-ping" style="animation-delay: 1s;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                Who We Serve with Our <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Web Application Services</span>
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Tailored solutions for businesses at every stage of growth
            </p>
        </div>
        
        <!-- Services Stack -->
        <div class="max-w-5xl mx-auto space-y-12">
            
            <!-- Service 1: Startups -->
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex flex-col lg:flex-row">
                        <!-- Content Section -->
                        <div class="lg:w-3/5 p-12">
                            <div class="flex items-start mb-8">
                                <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Startups</h3>
                                    <p class="text-green-600 font-semibold text-lg">Turn Ideas into Thorough Solutions</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                For young businesses, we deliver customized web application development services that turn ideas into thorough solutions. Our agile approach enables rapid development and deployment to help startups gain an online presence quickly with MVPs and scalable applications.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">MVP Development</span>
                                <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">Rapid Deployment</span>
                                <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">Cost-Effective</span>
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-green-500 to-green-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Startup Success</h4>
                                <div class="space-y-4">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Time to Market</span>
                                        <span class="text-white text-3xl font-bold">-60%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Development Cost</span>
                                        <span class="text-white text-3xl font-bold">-40%</span>
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
            
            <!-- Service 2: Businesses -->
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
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Businesses</h3>
                                    <p class="text-blue-600 font-semibold text-lg">Optimize Operations & Customer Engagement</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                Our custom web application development service is perfect for small and medium-sized businesses to optimize their operations and improve customer engagement. We develop feature-rich and user-friendly applications like ecommerce, customer portals, or business management systems.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">E-commerce Solutions</span>
                                <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">Customer Portals</span>
                                <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">Business Management</span>
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-blue-500 to-blue-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Business Growth</h4>
                                <div class="space-y-4">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Efficiency Boost</span>
                                        <span class="text-white text-3xl font-bold">+75%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Customer Engagement</span>
                                        <span class="text-white text-3xl font-bold">+85%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">ROI Improvement</span>
                                        <span class="text-white text-3xl font-bold">+120%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Service 3: Enterprises -->
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="flex flex-col lg:flex-row">
                        <!-- Content Section -->
                        <div class="lg:w-3/5 p-12">
                            <div class="flex items-start mb-8">
                                <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center mr-6 shadow-lg">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-3xl font-bold text-gray-900 mb-2">Enterprises</h3>
                                    <p class="text-purple-600 font-semibold text-lg">Strong & Scalable Enterprise Solutions</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                Businesses need strong and big web applications that can manage complicated processes and lots of users. Our web application development services use the latest technology to create high-performance custom ERP, CRM, and AI solutions with existing security integration.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">Custom ERP</span>
                                <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">CRM Solutions</span>
                                <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">AI Integration</span>
                            </div>
                        </div>
                        
                        <!-- Visual Preview -->
                        <div class="lg:w-2/5 bg-gradient-to-br from-purple-500 to-purple-600 p-8 flex items-center">
                            <div class="w-full">
                                <h4 class="text-white text-2xl font-bold mb-6">Enterprise Power</h4>
                                <div class="space-y-4">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">User Capacity</span>
                                        <span class="text-white text-3xl font-bold">10K+</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Performance</span>
                                        <span class="text-white text-3xl font-bold">99.9%</span>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                        <span class="text-white text-lg">Security Level</span>
                                        <span class="text-white text-3xl font-bold">A+</span>
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
<!-- Web Applications We Deliver Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Web Applications We <span class="text-green-600">Deliver</span>
            </h2>
            <p class="text-lg text-gray-600">
                Robust and tailored web application development services that fit your business needs
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Web Portals</h3>
                <p class="text-gray-600 text-sm mb-3">Streamlined Interactions</p>
                <p class="text-gray-500 text-sm">Self-Service & Customer Portals, Vendor & Partner Portals, Patient & Employee Portals, eLearning Portals, and Community Portals.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Enterprise Web Apps</h3>
                <p class="text-gray-600 text-sm mb-3">Scalable Operations</p>
                <p class="text-gray-500 text-sm">Project & Task Management Systems, ERP, PLM, PIM Software, CRM & Financial Management Systems, Document Management Systems.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Customer-Facing Apps</h3>
                <p class="text-gray-600 text-sm mb-3">Exceptional Experiences</p>
                <p class="text-gray-500 text-sm">Customer Service Apps, Ecommerce Web Apps, Payment & Lending Apps, Digital Wallets & Crypto Wallets.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Supply Chain Management</h3>
                <p class="text-gray-600 text-sm mb-3">Complete Visibility</p>
                <p class="text-gray-500 text-sm">Inventory & Asset Management Systems, Order & Delivery Management Apps, Vendor & Warehouse Management Systems.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Ecommerce Solutions</h3>
                <p class="text-gray-600 text-sm mb-3">Diverse Market Needs</p>
                <p class="text-gray-500 text-sm">B2C/B2B Ecommerce Web Apps, Progressive Ecommerce Web Apps, Online Marketplaces for buyers and sellers.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Analytics Web Apps</h3>
                <p class="text-gray-600 text-sm mb-3">Data-Driven Decisions</p>
                <p class="text-gray-500 text-sm">Business Intelligence Solutions, Risk Analytics Tools, AI & Machine Learning Applications for process automation.</p>
            </div>
        </div>
    </div>
</section>

<!-- Industries We Know Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                We Know Your <span class="text-green-600">Industry</span>
            </h2>
            <p class="text-lg text-gray-600">
                Customized web applications for various industries that meet their standards
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Healthcare</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    We create web applications for healthcare businesses that are secure, HIPAA-compliant websites, patient management software, health data analytics, and telemedicine applications.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-red-50 text-red-700 rounded-full text-sm">HIPAA Compliant</span>
                    <span class="px-3 py-1 bg-red-50 text-red-700 rounded-full text-sm">Patient Management</span>
                    <span class="px-3 py-1 bg-red-50 text-red-700 rounded-full text-sm">Telemedicine</span>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Banking</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Security and compliance are the foundation of our banking web development solutions. Our experts help with online banking portals, payment gateways, fraud detection, and much more.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm">Online Banking</span>
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm">Payment Gateway</span>
                    <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm">Fraud Detection</span>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Insurance</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Our web applications for the insurance sector simplify the claims process, streamline vehicle management, and provide self-service portals for clients while reducing administrative costs.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">Claims Processing</span>
                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">Self-Service Portal</span>
                    <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">Cost Reduction</span>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Retail</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    We create scalable eCommerce platforms, powerful inventory management systems, and personalized shopping experiences. Improve your operations, sales, and customer loyalty.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">eCommerce Platform</span>
                    <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">Inventory Management</span>
                    <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">Personalization</span>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Manufacturing</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    We develop web applications for manufacturing such as supply material management systems, production tracking, and inventory management solutions to optimize time and costs.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-sm">Supply Management</span>
                    <span class="px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-sm">Production Tracking</span>
                    <span class="px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-sm">Automation</span>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Telecoms</h3>
                <p class="text-gray-600 leading-relaxed mb-6">
                    We assist telecom firms in creating interactive web applications, customer management and billing software, and network monitoring solutions to enhance service delivery.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-sm">Customer Management</span>
                    <span class="px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-sm">Billing Software</span>
                    <span class="px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-sm">Network Monitoring</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Web App Development Services Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Our Web App <span class="text-green-400">Development Services</span>
            </h2>
            <p class="text-lg text-gray-300">
                Personalized services that suit your business goals and elevate user experience
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">📋 Project Planning</h3>
                <p class="text-gray-300 text-sm">Collaborate to establish project goals, determine KPIs, and build a roadmap that aligns with business objectives.</p>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">🎨 UX and UI Design</h3>
                <p class="text-gray-300 text-sm">Mobile-first responsive layouts and interactive designs using tools like Figma and Adobe XD for brand alignment.</p>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">⚙️ Web App Development</h3>
                <p class="text-gray-300 text-sm">Smart, effective frameworks using React, Angular, Node.js, and Python with scalable and robust development.</p>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">☁️ Cloud Migration</h3>
                <p class="text-gray-300 text-sm">Secure transition to the cloud with zero data loss and downtime for convenient ownership transfer.</p>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">🔍 Quality Assurance</h3>
                <p class="text-gray-300 text-sm">Unit, integration and end-to-end testing with third-party API and services integration management.</p>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-3">🔧 24/7 Support</h3>
                <p class="text-gray-300 text-sm">Regular monitoring, troubleshooting, and optimization to ensure long-term performance and reliability.</p>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Benefits of Web App Development with <span class="text-green-600">Qubify Tech</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">🚀 Safe Start</h3>
                <p class="text-gray-600 text-sm">Wide feasibility study or Proof of Concept (PoC) before full development to lessen risk possibilities and provide clarity.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">🔒 Strong Security</h3>
                <p class="text-gray-600 text-sm">High levels of safety with data encryption and multiple login systems to keep data safe and gain trust.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">⚡ Frequent Releases</h3>
                <p class="text-gray-600 text-sm">Updated versions every 2–3 weeks using iterative development process to keep the app tuned as per latest requirements.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">🎨 Outstanding UX/UI</h3>
                <p class="text-gray-600 text-sm">Attractive and functional designs that focus on user experience for easy utility and greater satisfaction.</p>
            </div>
        </div>
    </div>
</section>

<!-- Tech Stack Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Our Tech Stack for <span class="text-green-600">Web Application Development</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Frontend Development</h3>
                <div class="space-y-2">
                    <span class="inline-block px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm mr-2 mb-2">React.js</span>
                    <span class="inline-block px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm mr-2 mb-2">Angular</span>
                    <span class="inline-block px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm mr-2 mb-2">Vue.js</span>
                    <span class="inline-block px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm mr-2 mb-2">TypeScript</span>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Backend Development</h3>
                <div class="space-y-2">
                    <span class="inline-block px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm mr-2 mb-2">Node.js</span>
                    <span class="inline-block px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm mr-2 mb-2">Python</span>
                    <span class="inline-block px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm mr-2 mb-2">Java</span>
                    <span class="inline-block px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm mr-2 mb-2">PHP</span>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Databases</h3>
                <div class="space-y-2">
                    <span class="inline-block px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm mr-2 mb-2">MySQL</span>
                    <span class="inline-block px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm mr-2 mb-2">PostgreSQL</span>
                    <span class="inline-block px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm mr-2 mb-2">MongoDB</span>
                    <span class="inline-block px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm mr-2 mb-2">Redis</span>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Cloud Platforms</h3>
                <div class="space-y-2">
                    <span class="inline-block px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-sm mr-2 mb-2">AWS</span>
                    <span class="inline-block px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-sm mr-2 mb-2">Azure</span>
                    <span class="inline-block px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-sm mr-2 mb-2">Google Cloud</span>
                    <span class="inline-block px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-sm mr-2 mb-2">Docker</span>
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
                Frequently Asked <span class="text-green-600">Questions</span>
            </h2>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">How Can I Choose a Reliable Web Application Development Company?</h3>
                    <p class="text-gray-600">Evaluate their portfolio to assess experience. Ensure they offer comprehensive services, use modern technologies, and maintain clear communication.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">What Factors Influence the Cost of Creating a Custom Web Application?</h3>
                    <p class="text-gray-600">Costs depend on the complexity of features, the location of the development team, and the level of customization required.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">How Long Does It Take to Develop a Web Application?</h3>
                    <p class="text-gray-600">Timelines vary based on project scope and features. Custom development generally takes longer than pre-built solutions.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">What Differentiates Web Application Development from Website Development?</h3>
                    <p class="text-gray-600">Web apps offer dynamic interactivity and are highly customizable, while websites typically deliver static content and simpler functionality.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Do Small Businesses Need Custom Web Application Development?</h3>
                    <p class="text-gray-600">Custom web apps can boost visibility, attract more customers, and support business growth, making them ideal for expanding small businesses.</p>
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
                Ready to Build Your <span class="text-green-400">Web Application?</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Transform your business goals into reality with our expert web application development services. Whether you need a customer-facing portal or enterprise-grade system, we deliver high-ROI solutions that scale with your growth.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🚀 React.js & Angular
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    ⚡ Rapid Development
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🔧 24/7 Support
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    🚀 Start Your Web App Project
                </button>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    📞 Schedule Free Consultation
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Back to Top Button -->
<button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-green-600 hover:bg-green-700 text-white rounded-full shadow-xl transition-all duration-300 opacity-0 invisible hover:scale-110 z-50">
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
    background: linear-gradient(135deg, #22C55E, #3B82F6);
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