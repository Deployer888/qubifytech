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
                    Custom Web <span class="holographic">Development</span> Services
                </h1>

                <!-- Subheadline -->
                <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                    You define the vision; we craft the solution. Leveraging our expertise in web technologies and agile
                    development, we create high-performing, scalable, and responsive websites, web apps, and portals
                    tailored to your goals.
                </p>

                <!-- Feature Pills -->
                <div class="flex flex-wrap justify-center gap-4 mb-12">
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        Fully Responsive Design
                    </span>
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        E-commerce Ready
                    </span>
                    <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                        SEO Optimized
                    </span>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <button onclick="openContactModal()"
                        class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                        🚀 Start Your Project
                    </button>
                    <a href="{{ route('frontend.index') }}#contact"
                        class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
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
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 1px 1px, rgba(59, 130, 246, 0.3) 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-5xl mx-auto">
                <!-- Main Title -->
                <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    We Deliver Highly Customized and <br>
                    <span class="bg-gradient-to-r from-blue-600 to-blue-700 bg-clip-text text-transparent">Fully
                        Integrated</span> Web Development Services
                </h2>

                <!-- Description -->
                <p class="text-xl md:text-2xl text-gray-600 leading-relaxed mb-16 max-w-4xl mx-auto font-light">
                    We provide completely integrated and personalized custom web development services as per your business
                    requirements. Our solutions are built to tackle problems such as scalability and efficiency using the
                    latest technologies.
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
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Scalable Solutions</h3>
                        <p class="text-gray-600 leading-relaxed">Build websites and web applications that grow with your
                            business using modern frameworks and technologies</p>
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
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">E-commerce Excellence</h3>
                        <p class="text-gray-600 leading-relaxed">Custom e-commerce websites with great features and
                            easy-to-control backend for smooth online store management</p>
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
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Brand Alignment</h3>
                        <p class="text-gray-600 leading-relaxed">Dependable scalable platforms that match your brand
                            guidelines and help your business grow effectively</p>
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
                <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                    Our Custom Web <span
                        class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Development
                        Services</span>
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Comprehensive web development solutions tailored to your business needs
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
                                        <h3 class="text-3xl font-bold text-gray-900 mb-2">Responsive Website Development
                                        </h3>
                                        <p class="text-blue-600 font-semibold text-lg">Perfect on Every Device</p>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                    Our custom web development services ensure your website looks great and works well on
                                    all devices. With adaptive grids and modern frameworks, we improve user experience,
                                    engagement, and search rankings for seamless conversions.
                                </p>
                                <div class="flex flex-wrap gap-3">
                                    <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">Adaptive
                                        Grids</span>
                                    <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">Modern
                                        Frameworks</span>
                                    <span class="px-5 py-2 bg-blue-50 text-blue-700 rounded-full font-medium">SEO
                                        Optimized</span>
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
                                            <span class="text-white text-3xl font-bold">100%</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">Mobile</span>
                                            <span class="text-white text-3xl font-bold">100%</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">Tablet</span>
                                            <span class="text-white text-3xl font-bold">100%</span>
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
                                        <h3 class="text-3xl font-bold text-gray-900 mb-2">E-Commerce Development</h3>
                                        <p class="text-green-600 font-semibold text-lg">Boost Your Online Sales</p>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                    Get more sales online now with our custom e-commerce web development services. We
                                    include secure functionalities like shopping carts and encrypted checkouts to keep
                                    transactions safe and boost your online store's profits.
                                </p>
                                <div class="flex flex-wrap gap-3">
                                    <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">Secure
                                        Payments</span>
                                    <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">Shopping
                                        Cart</span>
                                    <span class="px-5 py-2 bg-green-50 text-green-700 rounded-full font-medium">Inventory
                                        Management</span>
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
                                            <span class="text-white text-3xl font-bold">+45%</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">Revenue Growth</span>
                                            <span class="text-white text-3xl font-bold">+78%</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">User Engagement</span>
                                            <span class="text-white text-3xl font-bold">+62%</span>
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
                                        <h3 class="text-3xl font-bold text-gray-900 mb-2">CMS Development</h3>
                                        <p class="text-purple-600 font-semibold text-lg">Manage Content Efficiently</p>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                                    Our custom CMS development services help in managing your content efficiently. We use
                                    content management systems like WordPress or Drupal that can be adapted to your needs,
                                    so you can update your website without needing to know code.
                                </p>
                                <div class="flex flex-wrap gap-3">
                                    <span
                                        class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">WordPress</span>
                                    <span
                                        class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">Drupal</span>
                                    <span class="px-5 py-2 bg-purple-50 text-purple-700 rounded-full font-medium">Custom
                                        CMS</span>
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
                                            <span class="text-white text-3xl font-bold">✓</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">No Coding</span>
                                            <span class="text-white text-3xl font-bold">✓</span>
                                        </div>
                                        <div
                                            class="bg-white/20 backdrop-blur-sm rounded-2xl p-5 flex justify-between items-center">
                                            <span class="text-white text-lg">SEO Ready</span>
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
                    Additional <span class="text-blue-600">Services</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Comprehensive solutions to enhance your web presence
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
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Magento Web Development</h3>
                    <p class="text-gray-600 text-sm mb-3">Advanced E-commerce Solutions</p>
                    <p class="text-gray-500 text-sm">Use Magento with our custom web development services for advanced
                        e-commerce solutions. We deploy Magento CMS to develop a custom-built online store suitable for your
                        business needs.</p>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Marketing Automation</h3>
                    <p class="text-gray-600 text-sm mb-3">AI-Powered Marketing</p>
                    <p class="text-gray-500 text-sm">Make your marketing easier with our custom web development services
                        with marketing automation. We use artificial intelligence to get things done automatically and run
                        campaigns.</p>
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
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Website Security Audits</h3>
                    <p class="text-gray-600 text-sm mb-3">Comprehensive Security</p>
                    <p class="text-gray-500 text-sm">Let our custom web development services keep your website safe with
                        our web security audits. We find problems and then introduce strong actions in place to protect your
                        site.</p>
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
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Website Maintenance</h3>
                    <p class="text-gray-600 text-sm mb-3">Ongoing Support</p>
                    <p class="text-gray-500 text-sm">Keep your website flawlessly optimal with our website maintenance
                        support. We provide constant updates, bug fixes, and performance improvements to keep your website
                        up and running.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Why Choose <span class="text-blue-600">Qubify Tech</span> for Web Development Services
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div
                    class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">🏆 Award-Winning Team</h3>
                    <p class="text-gray-600 text-sm">When you partner with us for custom web development services, you are
                        working with an award-winning team capable of working with every CMS, coding language, and web
                        application.</p>
                </div>

                <div
                    class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">📈 Lead Generation Focus</h3>
                    <p class="text-gray-600 text-sm">Our custom web development services focus on building websites that
                        attract visitors and convert them into leads and sales with smart navigation and compelling CTAs.
                    </p>
                </div>

                <div
                    class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">💰 Maximize ROI</h3>
                    <p class="text-gray-600 text-sm">Get ready to maximize your ROI with our custom web development
                        services tailored for you! We create custom web strategies to improve efficiency and increase
                        revenue.</p>
                </div>

                <div
                    class="text-center p-8 bg-gray-50 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">🚀 Industry-Leading Software</h3>
                    <p class="text-gray-600 text-sm">Level up your tech game with our custom web development services! We
                        automate operations and track data automatically so that you can do business efficiently.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Development Process Section -->
    <section class="py-20 bg-gray-900 text-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Inside Our Web Development <span class="text-blue-400">Process</span>
                </h2>
                <p class="text-lg text-gray-300">
                    Our comprehensive approach ensures quality and reliability at every step
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">🎨 Front-End Development</h3>
                    <p class="text-gray-300 text-sm">Advanced Technologies & Responsive Design using HTML5, CSS3,
                        Javascript frameworks (React.js, Angular, Vue.js), Node.js, TypeScript for high performing, dynamic
                        interfaces.</p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">⚙️ Back-End Development</h3>
                    <p class="text-gray-300 text-sm">Robust Frameworks & Scalable Applications using PHP, Python, Ruby on
                        Rails, Java, Node.js, Django, Laravel, ASP.Net with comprehensive API & security integration.</p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">🗄️ Database Management</h3>
                    <p class="text-gray-300 text-sm">Comprehensive Database Solutions with SQL & NoSQL expertise including
                        MySQL, PostgreSQL, MongoDB, and Graph Databases with efficient data handling.</p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">🔒 Security & Testing</h3>
                    <p class="text-gray-300 text-sm">Comprehensive Security Measures including website security audits,
                        data protection, DDoS protection, SSL encryption, and robust quality assurance techniques.</p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">⚡ Performance Optimization</h3>
                    <p class="text-gray-300 text-sm">Advanced Optimization Techniques including caching strategies, CDN
                        integration, efficient loading with lazy loading and scalable architecture for peak performance.</p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                    <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-3">🎨 UI/UX Design</h3>
                    <p class="text-gray-300 text-sm">Design Strategy with wireframing & prototyping, user behavior
                        analysis, interactive & responsive design with mobile app integration and engagement focus.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Extended Services Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Our Services Go <span class="text-blue-600">Beyond Development</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Custom UI & UX Design</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Your website would look attractive and will also be highly navigable owing to our custom UX & UI
                        designs. We create UIs that complement your brand, enrich the user experience and are simple to use.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm">Brand Alignment</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm">User Experience</span>
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm">Conversion Focus</span>
                    </div>
                </div>

                <div
                    class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">SEO and Conversion Optimization</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        We improve your online presence with our SEO and conversion rate optimization services. We want to
                        help you get more traffic to your website by enhancing its rankings on search engines.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">Search Rankings</span>
                        <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">Traffic Growth</span>
                        <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">ROI Focus</span>
                    </div>
                </div>

                <div
                    class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">End-To-End Development</h3>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        We cover everything from start to finish for your website or web app. Our website development
                        services combine the power of front-end and back-end technologies! You take care of your business;
                        we'll take care of your digital platform.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">Full-Stack</span>
                        <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">Agile Methods</span>
                        <span class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm">Quality Focus</span>
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
                    Frequently Asked <span class="text-blue-600">Questions</span>
                </h2>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="space-y-6">
                    <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">What is a custom website?</h3>
                        <p class="text-gray-600">A custom website is uniquely built from scratch to meet your business's
                            needs, offering unmatched flexibility and scalability.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Why do I need custom web development?</h3>
                        <p class="text-gray-600">Custom development enhances user experience, increases credibility, and
                            improves search engine rankings.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">How much does custom development cost?</h3>
                        <p class="text-gray-600">Costs typically start at $1,000 and vary by project complexity,
                            integrations, and design needs.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Will my site be mobile-optimized?</h3>
                        <p class="text-gray-600">Absolutely, with a mobile-first approach ensuring responsiveness across
                            all devices.</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 hover:bg-gray-100 transition-colors duration-300">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">What is the timeline for development?</h3>
                        <p class="text-gray-600">Informational sites take 1–4 months, while eCommerce projects may require
                            more time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-20 bg-gray-900 text-white relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Ready to Build Your <span class="text-blue-400">Dream Website?</span>
                </h2>
                <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                    Let's transform your vision into a powerful digital solution that drives results. Our expert team is
                    ready to bring your ideas to life with cutting-edge technology and innovative design.
                </p>

                <!-- Feature Pills -->
                <div class="flex flex-wrap justify-center gap-4 mb-12">
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        🚀 Fast Development
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        💰 Competitive Pricing
                    </span>
                    <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                        🔧 Ongoing Support
                    </span>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <button onclick="openContactModal()"
                        class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                        🚀 Start Your Project Now
                    </button>
                    <a href="tel:+917087076111"
                        class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                        📞 Schedule Free Consultation
                    </a>
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
