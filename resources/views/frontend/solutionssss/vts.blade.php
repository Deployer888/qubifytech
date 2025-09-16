@extends('frontend.layouts.app')

@section('title')
VTS - Vehicle Tracking System - {{app_name()}}
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
            Track Every Vehicle.<span class="holographic">Optimize Every Route.</span> 
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
            Qubify VTS is a real-time vehicle tracking and fleet intelligence platform designed to help businesses monitor vehicle locations, reduce operational waste, and improve driver performance — all from a single dashboard.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                🚚 Live GPS Tracking
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                📍 Route History & Alerts
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                📊 Driver Insights
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    🔵 Request a Live Demo
                </a>
                <a href="mailto:sales@qubifytech.com" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    ⚪ Talk to Sales
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

<!-- What is Qubify VTS Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                What is <span class="text-blue-600">Qubify VTS</span>?
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Qubify VTS (Vehicle Tracking System) is an AI-enhanced, GPS-powered platform that gives you full visibility into your fleet's movements. It empowers transport managers, logistics teams, and fleet owners to optimize performance, improve fuel efficiency, and keep drivers safe and accountable.
            </p>
            <p class="text-lg text-gray-700 mt-4">
                Whether you're managing five vehicles or five hundred, Qubify VTS adapts to your fleet's scale and complexity.
            </p>
        </div>
        
        <!-- Core Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map-marker-alt text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Real-Time Tracking</h3>
                <p class="text-gray-600 text-sm">Live GPS location updates with movement trails</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-route text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Route Optimization</h3>
                <p class="text-gray-600 text-sm">Smart routing with traffic data and geofencing</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-shield text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Driver Monitoring</h3>
                <p class="text-gray-600 text-sm">Behavior analytics and performance insights</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Fleet Analytics</h3>
                <p class="text-gray-600 text-sm">Comprehensive reports and data insights</p>
            </div>
        </div>
    </div>
</section>

<!-- Core Capabilities Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Core <span class="text-blue-600">Capabilities</span>
            </h2>
            <p class="text-lg text-gray-600">
                Everything you need to manage your fleet efficiently
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            <!-- Real-Time Vehicle Location Tracking -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-map-marker-alt text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">📍 Real-Time Vehicle Location Tracking</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Know Exactly Where Every Vehicle Is</h4>
                    <p class="text-gray-600 mb-4">
                        Qubify VTS updates locations in real time, giving you a live map with movement trails, speed, and vehicle status. No blind spots, no guesswork.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Live GPS tracking with instant updates
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Movement trails and speed monitoring
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Vehicle status and health indicators
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Live Tracking</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Vehicle TR-001</span>
                                <span class="font-bold text-green-300">Moving</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Current Speed</span>
                                <span class="font-bold">65 km/h</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>ETA</span>
                                <span class="font-bold">45 mins</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Route Optimization -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Route Efficiency</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Time Saved</span>
                                <span class="font-bold">2.5 hrs</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Fuel Savings</span>
                                <span class="font-bold">18%</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Optimal Routes</span>
                                <span class="font-bold">23/25</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-route text-green-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">🗺️ Route Optimization & Efficiency</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Plan Better Routes, Save Time & Fuel</h4>
                    <p class="text-gray-600 mb-4">
                        Plan better routes with real-time traffic data and geofencing zones. Reduce idle time, avoid congestion, and assign the most efficient routes to your drivers based on historical performance and live conditions.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Real-time traffic data integration
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Geofencing zones and alerts
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Historical performance analysis
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Driver Behavior Monitoring -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-user-shield text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">👨‍💼 Driver Behavior Monitoring</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Track More Than Location</h4>
                    <p class="text-gray-600 mb-4">
                        Qubify VTS tracks more than location—it also records how vehicles are being driven. Get detailed insights into harsh braking, overspeeding, idle time, and route deviations. Use this data to improve safety, reduce wear and tear, and reward high-performing drivers.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Harsh braking and acceleration alerts
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Overspeeding and idle time tracking
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Driver scoring and performance reports
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Driver Performance</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Safety Score</span>
                                <span class="font-bold">8.7/10</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Speed Violations</span>
                                <span class="font-bold text-orange-300">3</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Idle Time Today</span>
                                <span class="font-bold">1.2 hrs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Features Grid -->
        <div class="mt-20">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-history text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">📝 Trip History & Playback</h3>
                    <p class="text-gray-600 text-sm mb-3">Complete Audit Trail</p>
                    <p class="text-gray-500 text-sm">Every trip is automatically logged. View and replay full route history, stops, speeds, and time spent per location for compliance and billing.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-bell text-teal-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🔔 Smart Alerts & Notifications</h3>
                    <p class="text-gray-600 text-sm mb-3">Stay Informed, Not Overwhelmed</p>
                    <p class="text-gray-500 text-sm">Instant alerts for route deviations, excess idle time, geofence entry/exit, overspeeding, and extended stoppage—all configurable.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-map-marked-alt text-orange-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🗺️ Geofencing & Zone Control</h3>
                    <p class="text-gray-600 text-sm mb-3">Virtual Boundaries, Real Control</p>
                    <p class="text-gray-500 text-sm">Define virtual boundaries and get notified when vehicles enter or exit designated zones like warehouses or restricted areas.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-gas-pump text-pink-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">⛽ Fuel Usage & Maintenance</h3>
                    <p class="text-gray-600 text-sm mb-3">Optimize Costs, Extend Life</p>
                    <p class="text-gray-500 text-sm">Reduce fuel consumption with optimized routes and integrate fuel data with maintenance alerts based on distance or engine hours.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-tachometer-alt text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">📊 Admin Dashboard</h3>
                    <p class="text-gray-600 text-sm mb-3">Centralized Fleet Control</p>
                    <p class="text-gray-500 text-sm">All fleet data managed from one intuitive dashboard. Filter, analyze, and generate custom reports for real-time decision-making.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-mobile-alt text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">📱 Mobile Access</h3>
                    <p class="text-gray-600 text-sm mb-3">Monitor Anywhere, Anytime</p>
                    <p class="text-gray-500 text-sm">Web, tablet, and mobile access giving you 24/7 visibility without being tied to a desk—perfect for remote monitoring.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hardware Integration Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Hardware Integration & <span class="text-blue-600">Compatibility</span>
            </h2>
            <p class="text-lg text-gray-600">
                Qubify works with a wide range of GPS trackers and sensors—it's a plug-and-play solution
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-satellite text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">GPS/OBD II Trackers</h3>
                <p class="text-gray-600 text-sm">Compatible with leading GPS tracking devices</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-cog text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Engine Diagnostics</h3>
                <p class="text-gray-600 text-sm">Real-time engine health monitoring tools</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-tint text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Fuel Sensors</h3>
                <p class="text-gray-600 text-sm">Accurate fuel level and consumption tracking</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Safety Systems</h3>
                <p class="text-gray-600 text-sm">Panic buttons & RFID integration</p>
            </div>
        </div>
    </div>
</section>

<!-- Use Cases Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Use Cases Across <span class="text-blue-400">Industries</span>
            </h2>
            <p class="text-lg text-gray-300">
                Qubify VTS is built to serve diverse industries—from security to optimization, we adapt to your use case
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-truck text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🚛 Logistics & Freight</h3>
                <p class="text-gray-300 text-sm">Complete supply chain visibility</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-ambulance text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🏥 Emergency Services</h3>
                <p class="text-gray-300 text-sm">Critical response optimization</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-taxi text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🚕 Taxi & Ride-Sharing</h3>
                <p class="text-gray-300 text-sm">Efficient passenger services</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hammer text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🚜 Construction & Equipment</h3>
                <p class="text-gray-300 text-sm">Heavy machinery tracking</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-school text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🏫 School Transport</h3>
                <p class="text-gray-300 text-sm">Student safety and monitoring</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-industry text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🏭 Manufacturing Delivery</h3>
                <p class="text-gray-300 text-sm">Production logistics optimization</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-motorcycle text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🛵 Food Delivery</h3>
                <p class="text-gray-300 text-sm">Hyperlocal dispatch optimization</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-ellipsis-h text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">And Many More...</h3>
                <p class="text-gray-300 text-sm">Custom solutions for your industry</p>
            </div>
        </div>
    </div>
</section>

<!-- Benefits At a Glance Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Benefits At a <span class="text-blue-600">Glance</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-satellite-dish text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Live Tracking</h3>
                <p class="text-gray-600 text-sm">Real-time updates with instant notifications</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-route text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Route Optimization</h3>
                <p class="text-gray-600 text-sm">Reduce fuel consumption and travel time</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Safety & Compliance</h3>
                <p class="text-gray-600 text-sm">Alerts for safety, compliance & security</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-mobile-alt text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Multi-Platform Access</h3>
                <p class="text-gray-600 text-sm">Works on web, tablet & mobile devices</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-plug text-teal-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Easy Integration</h3>
                <p class="text-gray-600 text-sm">Simple setup with existing hardware devices</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-bar text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Powerful Analytics</h3>
                <p class="text-gray-600 text-sm">Admin dashboard with export-ready reports</p>
            </div>
        </div>
    </div>
</section>

<!-- Real Results Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Why Companies Choose <span class="text-blue-600">Qubify VTS</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Amit S.</h4>
                        <p class="text-gray-600 text-sm">Logistics Manager</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "We've cut fuel waste by 20% and trip delays by 30%. The live map and historical tracking have been game changers."
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
                        <h4 class="font-semibold text-gray-900">Shreya T.</h4>
                        <p class="text-gray-600 text-sm">Operations Head, Retail Chain</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "Now we get real-time alerts when routes deviate or vehicles enter restricted areas. It's helped tighten security immensely."
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
                        <h4 class="font-semibold text-gray-900">Devraj N.</h4>
                        <p class="text-gray-600 text-sm">Fleet Compliance Officer</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "Driver behavior analytics gave us the insight we needed to improve training and reduce accidents."
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
                Track Smarter, <span class="text-blue-400">Operate Better</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Whether you manage a city-wide delivery fleet or a few company vehicles, Qubify VTS helps you track smarter, plan better, and operate more efficiently—while keeping costs and risks low.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    📍 Real-time GPS & Geofencing
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🔐 Secure, cloud-based access
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    📈 Actionable analytics, export-ready reports
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🛠 Simple setup, scalable architecture
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    🚀 Book a Demo Now
                </a>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    📞 Talk to an Expert
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
    
    // Fleet dashboard value animation on hover
    const dashboardCards = document.querySelectorAll('.bg-gradient-to-br');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const values = card.querySelectorAll('.font-bold');
            values.forEach(value => {
                if (value.textContent.includes('/')) {
                    // Handle fraction values like "47/52"
                    const parts = value.textContent.split('/');
                    if (parts.length === 2) {
                        const current = parseInt(parts[0]);
                        const total = parseInt(parts[1]);
                        const newCurrent = Math.min(current + Math.floor(Math.random() * 3), total);
                        value.textContent = newCurrent + '/' + total;
                    }
                } else if (value.textContent.includes('km/l')) {
                    // Handle efficiency values
                    const currentValue = parseFloat(value.textContent.replace(' km/l', ''));
                    const newValue = (currentValue + (Math.random() * 2 - 1)).toFixed(1);
                    value.textContent = newValue + ' km/l';
                } else if (value.textContent.includes('hrs')) {
                    // Handle time values
                    const currentValue = parseFloat(value.textContent.replace(' hrs', ''));
                    const newValue = Math.max(0, currentValue + (Math.random() * 1 - 0.5)).toFixed(1);
                    value.textContent = newValue + ' hrs';
                } else if (value.textContent.includes('km/h')) {
                    // Handle speed values
                    const currentValue = parseInt(value.textContent.replace(' km/h', ''));
                    const newValue = currentValue + Math.floor(Math.random() * 10 - 5);
                    value.textContent = Math.max(0, newValue) + ' km/h';
                } else if (value.textContent.includes('mins')) {
                    // Handle minute values
                    const currentValue = parseInt(value.textContent.replace(' mins', ''));
                    const newValue = Math.max(1, currentValue + Math.floor(Math.random() * 10 - 5));
                    value.textContent = newValue + ' mins';
                } else if (!isNaN(parseInt(value.textContent))) {
                    // Handle numeric values
                    const currentValue = parseInt(value.textContent);
                    const newValue = currentValue + Math.floor(Math.random() * 5);
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