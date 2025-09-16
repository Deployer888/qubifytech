@extends('frontend.layouts.app')

@section('title')
VMS - Visitor Management System - {{app_name()}}
@endsection

@section('content')
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
                Control Access. 
                <span class="holographic">Protect People.</span> 
                <br>Simplify Visitor Check-Ins.
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
                VMS is an intelligent Visitor Management System designed to help you secure your premises, 
                track visitor activity in real time, and offer a seamless check-in experience—from Aadhaar 
                verification to facial recognition.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    ✅ Corporate offices, hospitals, factories & government facilities
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    ✅ Fully compliant with data privacy regulations
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    🚀 Schedule a Demo
                </a>
                <button onclick="openContactModal()" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    📹 See How It Works
                </button>
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
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Smarter Visitor Access <span class="text-blue-600">Starts Here</span>
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed mb-8">
                Managing who enters your facility shouldn't rely on clipboards, manual logs, or ID cards that can be faked. VMS takes the guesswork out of guest management with a fully digital system built to verify, track, and log every visitor interaction.
            </p>
            
            <div class="text-left max-w-3xl mx-auto">
                <ul class="space-y-4">
                    <li class="flex items-center text-lg text-gray-700">
                        <i class="fas fa-id-card text-blue-500 mr-3 text-xl"></i>
                        <span>🔐 Aadhaar-based ID verification</span>
                    </li>
                    <li class="flex items-center text-lg text-gray-700">
                        <i class="fas fa-camera text-green-500 mr-3 text-xl"></i>
                        <span>📸 Real-time face authentication</span>
                    </li>
                    <li class="flex items-center text-lg text-gray-700">
                        <i class="fas fa-chart-bar text-purple-500 mr-3 text-xl"></i>
                        <span>📊 Instant visitor logs and reporting tools</span>
                    </li>
                    <li class="flex items-center text-lg text-gray-700">
                        <i class="fas fa-mobile-alt text-orange-500 mr-3 text-xl"></i>
                        <span>📲 Digital pre-invites and pre-check-in workflows</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Key Benefits Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Key <span class="text-blue-600">Benefits</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">🔐 Enhanced Security</h3>
                <p class="text-gray-600 text-sm">VMS uses Aadhaar verification and facial recognition to ensure every visitor is authenticated before entry. Every entry and exit is automatically logged and audit-ready.</p>
            </div>
            
            <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-check text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">💡 Seamless Pre-Check-In</h3>
                <p class="text-gray-600 text-sm">Visitors receive digital invites, complete Aadhaar verification at home, and walk in using face authentication. Faster check-ins and fewer bottlenecks.</p>
            </div>
            
            <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-camera text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">📸 Contactless Authentication</h3>
                <p class="text-gray-600 text-sm">Eliminate manual ID checks with real-time facial recognition at entry points. Match visitor faces to pre-verified data for zero-contact experience.</p>
            </div>
            
            <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map-marker-alt text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">📍 Real-Time Tracking</h3>
                <p class="text-gray-600 text-sm">Keep tabs on who's on-site, when they entered, who they're meeting, and when they leave. Generate detailed reports for audits and compliance.</p>
            </div>
        </div>
    </div>
</section>

<!-- Core Features Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Core <span class="text-blue-600">Features</span>
            </h2>
            <p class="text-lg text-gray-600">
                Everything you need for comprehensive visitor management
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            <!-- Secure Login & Admin Access -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-lock text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">🔹 Secure Login & Admin Access</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Protected Control Center</h4>
                    <p class="text-gray-600 mb-4">
                        Admins access the system through encrypted credentials. Passwords are securely hashed, and password recovery is handled via time-sensitive email links—keeping your control center protected at all times.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Encrypted admin credentials
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Secure password hashing
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Time-sensitive recovery links
                        </li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Admin Dashboard</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>System Status</span>
                                <span class="font-bold text-green-300">Online</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Active Sessions</span>
                                <span class="font-bold">3</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Security Level</span>
                                <span class="font-bold text-green-300">High</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Aadhaar Verification -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 bg-gray-50 rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Aadhaar Verification</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Verifications Today</span>
                                <span class="font-bold">142</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Success Rate</span>
                                <span class="font-bold">98.5%</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Avg. Time</span>
                                <span class="font-bold">12s</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-id-card text-green-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">🔹 Aadhaar Verification via API</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Official Identity Verification</h4>
                    <p class="text-gray-600 mb-4">
                        Integrated directly with India's official Aadhaar API, VMS enables instant visitor verification using an OTP-based authentication flow. It ensures every visitor's identity is legitimate before entry is granted.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Official Aadhaar API integration
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            OTP-based authentication flow
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Instant identity validation
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Face Authentication -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-camera text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">🔹 Face Authentication at Entry</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">No ID Cards, No Questions</h4>
                    <p class="text-gray-600 mb-4">
                        VMS uses facial recognition to match visitors with pre-approved records. This ensures high-speed, high-security access—especially useful in high-volume or high-risk environments.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Real-time facial recognition
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Pre-approved record matching
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            High-volume environment ready
                        </li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Face Recognition</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Recognition Rate</span>
                                <span class="font-bold">99.2%</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Processing Time</span>
                                <span class="font-bold">0.8s</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>False Positives</span>
                                <span class="font-bold text-green-300">0.02%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Features Grid -->
        <div class="mt-20">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-users text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🔹 Visitor Management & Smart Logging</h3>
                    <p class="text-gray-600 text-sm mb-3">Complete Digital Records</p>
                    <p class="text-gray-500 text-sm">From name and purpose to entry time and host details, every visitor is automatically logged. The system creates and manages digital visitor passes, minimizing human error and speeding up access.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-envelope text-teal-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🔹 Pre-Verification via Invite Links</h3>
                    <p class="text-gray-600 text-sm mb-3">Streamlined Guest Experience</p>
                    <p class="text-gray-500 text-sm">Employees send secure, digital invites directly to visitors via email or text. Visitors complete Aadhaar verification before they even arrive, shortening the check-in process to just a few seconds.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Industry Fit Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Built for Any Facility That Requires <span class="text-blue-400">Real Security</span>
            </h2>
            <p class="text-lg text-gray-300">
                VMS is flexible enough for SMBs and powerful enough for high-traffic, high-security zones.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-building text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-3">🏢 Corporate Offices</h3>
                <p class="text-gray-300 text-sm">Greet clients and partners with streamlined digital entry</p>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hospital text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-3">🏥 Hospitals</h3>
                <p class="text-gray-300 text-sm">Authenticate vendors, patients, and visitors without slowing operations</p>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-landmark text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-3">🏛️ Government Facilities</h3>
                <p class="text-gray-300 text-sm">Control access to sensitive zones with real-time verification</p>
            </div>
            
            <div class="text-center p-8 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-industry text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-3">🏭 Industrial Sites</h3>
                <p class="text-gray-300 text-sm">Ensure safety and track contractor and vendor movement easily</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Businesses Trust VMS Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Why Businesses Trust <span class="text-blue-600">VMS</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">🔐 Uncompromised Security</h3>
                <p class="text-gray-600 text-sm">From Aadhaar integration to facial recognition, VMS puts identity at the center of access control. You always know who's in your building—and why.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-cog text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">⚙️ Operational Efficiency</h3>
                <p class="text-gray-600 text-sm">Replace sign-in sheets, manual checks, and reception queues with automated workflows. Your front desk will thank you.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-expand-arrows-alt text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">📈 Scalable & Configurable</h3>
                <p class="text-gray-600 text-sm">VMS supports multi-location setups, thousands of daily check-ins, and custom access settings—so you can grow without limits.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-file-shield text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">📜 Data Privacy & Compliance</h3>
                <p class="text-gray-600 text-sm">All visitor data is encrypted and stored securely, ensuring full compliance with your industry's regulations and internal policies.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                What Our <span class="text-blue-600">Clients Say</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Naveen S.</h4>
                        <p class="text-gray-600 text-sm">Head of Security, Government Facility</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "The integration with Aadhaar and facial recognition was a game changer for us. We're now processing visitors 60% faster with far more control."
                </p>
                <div class="flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-green-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Shalini M.</h4>
                        <p class="text-gray-600 text-sm">Admin Manager, Multinational Bank</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "We used to have visitors waiting in line every morning. With VMS, they're already verified and walking in within seconds."
                </p>
                <div class="flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-purple-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Vikram J.</h4>
                        <p class="text-gray-600 text-sm">Compliance Lead, Healthcare Provider</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "What impressed us most was the audit-ready reporting. We now have logs for every visitor, accessible instantly."
                </p>
                <div class="flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
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
                Start Securing Your Facility with <span class="text-blue-400">VMS</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Protect your people and simplify visitor check-ins with one intelligent platform. VMS is fast to set up, easy to use, and built for high-stakes environments.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    ✅ No hardware dependencies
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    ✅ API integrations available
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    ✅ 24/7 support team
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    🚀 Get Started Now
                </button>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    📞 Request a Personalized Demo
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
    
    // VMS dashboard value animation on hover
    const dashboardCards = document.querySelectorAll('.bg-gradient-to-br');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const values = card.querySelectorAll('.font-bold');
            values.forEach(value => {
                if (value.textContent.includes('%')) {
                    // Handle percentage values
                    const currentValue = parseFloat(value.textContent.replace('%', ''));
                    const newValue = Math.min(Math.max(currentValue + (Math.random() * 2 - 1), 95), 100).toFixed(1);
                    value.textContent = newValue + '%';
                } else if (value.textContent.includes('s')) {
                    // Handle time values in seconds
                    const currentValue = parseFloat(value.textContent.replace('s', ''));
                    const newValue = Math.max(currentValue + (Math.random() * 2 - 1), 0.1).toFixed(1);
                    value.textContent = newValue + 's';
                } else if (value.textContent === 'Online' || value.textContent === 'High') {
                    // Keep status values unchanged
                    return;
                } else if (!isNaN(parseInt(value.textContent))) {
                    // Handle numeric values
                    const currentValue = parseInt(value.textContent);
                    const newValue = Math.max(currentValue + Math.floor(Math.random() * 10 - 5), 0);
                    value.textContent = newValue;
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