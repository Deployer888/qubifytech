@extends('frontend.layouts.app')

@section('title')
VPS - Vehicle Parking System - {{app_name()}}
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
                Smarter Parking.
                <span class="holographic">Fully Automated.</span> 
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
              Qubify VPS streamlines every part of the parking experience—from license plate recognition and real-time slot visibility to digital payments and admin analytics. It’s the modern solution for modern facilities.

            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                🎥 Live LPR
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                💳 Contactless Pay
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                📊 Central Control Panel
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    🚀 Request Demo
                </a>
                <button onclick="openContactModal()" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    📹 See It In Action 
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

<!-- What is Qubify VPS Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                What is <span class="text-blue-600">Qubify VPS</span>?
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Qubify VPS is a full-stack Vehicle Parking System that replaces paper slips, cash payments, and manual slot checks with an end-to-end digital solution. Whether you're managing five spaces or five levels of parking, VPS adapts to your infrastructure and transforms it into a smart, secure, and user-friendly operation.
            </p>
        </div>
        
        <!-- Core Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-parking text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Real-Time Slots</h3>
                <p class="text-gray-600 text-sm">Live slot visibility and dynamic allocation</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-camera text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">License Plate Recognition</h3>
                <p class="text-gray-600 text-sm">Automatic vehicle identification and validation</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-credit-card text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Digital Payments</h3>
                <p class="text-gray-600 text-sm">Contactless UPI, card, and wallet payments</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Smart Analytics</h3>
                <p class="text-gray-600 text-sm">Comprehensive reporting and data insights</p>
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
                Everything you need for modern parking management
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            <!-- Real-Time Parking Slot Management -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-parking text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">🅿️ Real-Time Parking Slot Management</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Every Slot is Visible, Updated in Real Time</h4>
                    <p class="text-gray-600 mb-4">
                        Every slot is visible on the dashboard, updated in real time. No guesswork. Drivers and staff always know what's available and where. Plus, with dynamic slot allocation, you can maximize occupancy without chaos.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Live slot status updates
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Dynamic slot allocation
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Maximum occupancy optimization
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Slot Management</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Available</span>
                                <span class="font-bold text-green-300">47</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Occupied</span>
                                <span class="font-bold">73</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Occupancy Rate</span>
                                <span class="font-bold">61%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- License Plate Recognition -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">LPR Performance</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Recognition Rate</span>
                                <span class="font-bold">99.1%</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Processing Time</span>
                                <span class="font-bold">1.2s</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Vehicles Scanned</span>
                                <span class="font-bold">89</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-camera text-green-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">🎥 License Plate Recognition (LPR) Technology</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Automatic Vehicle Identification</h4>
                    <p class="text-gray-600 mb-4">
                        Vehicles are identified and validated the moment they approach. Cameras detect plate numbers and sync with the database to approve or deny access—automatically. No cards, no tags, no tapping.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Instant plate detection and validation
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Database sync for access control
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Contactless entry and exit
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Digital & Contactless Payments -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-credit-card text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">💳 Digital & Contactless Payments</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Seamless Payment Experience</h4>
                    <p class="text-gray-600 mb-4">
                        Once parked, drivers can complete payment via UPI, credit/debit cards, or integrated wallet systems. Receipts are digital, records are logged, and transactions are fully transparent—ideal for paid parking environments.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            UPI, card, and wallet payments
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Digital receipts and logs
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Transparent transaction tracking
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Payment Analytics</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Revenue Today</span>
                                <span class="font-bold">₹12,450</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Digital Payments</span>
                                <span class="font-bold text-green-300">94%</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Avg. Transaction</span>
                                <span class="font-bold">₹140</span>
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
                        <i class="fas fa-door-open text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🚪 Entry & Exit Automation</h3>
                    <p class="text-gray-600 text-sm mb-3">Automated Gate Control</p>
                    <p class="text-gray-500 text-sm">Boom barriers or gate systems triggered by license plate match, QR code, or pre-authorized digital pass. Eliminates attendants while enhancing access control.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-tachometer-alt text-teal-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">📊 Admin Dashboard</h3>
                    <p class="text-gray-600 text-sm mb-3">Central Oversight</p>
                    <p class="text-gray-500 text-sm">One screen to manage slot occupancy, track vehicle flow, review payments, and export reports. Set access roles and customize rules.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-chart-bar text-orange-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">📈 Smart Reporting</h3>
                    <p class="text-gray-600 text-sm mb-3">Detailed Data Logs</p>
                    <p class="text-gray-500 text-sm">Every entry, exit, duration, and transaction logged in detail. View daily, weekly, or custom-range reports filtered by various parameters.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-bell text-pink-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🔔 Facility-Wide Alerts</h3>
                    <p class="text-gray-600 text-sm mb-3">Custom Rules & Notifications</p>
                    <p class="text-gray-500 text-sm">Auto-alerts for overstays, unauthorized access, or slot overruns. Define time limits, grace periods, pricing rules, or VIP zones.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-cogs text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🔧 Hardware Integration</h3>
                    <p class="text-gray-600 text-sm mb-3">Works with Existing Infrastructure</p>
                    <p class="text-gray-500 text-sm">Integrates with most major access control hardware including IP cameras, QR scanners, RFID modules, and LED signage.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-expand-arrows-alt text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🏢 Multi-Zone Support</h3>
                    <p class="text-gray-600 text-sm mb-3">Scalable Management</p>
                    <p class="text-gray-500 text-sm">Manage multiple parking zones, towers, or facilities under one master admin portal with individual configurations and unified reporting.</p>
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
                Hardware-Friendly <span class="text-blue-600">Integration</span>
            </h2>
            <p class="text-lg text-gray-600">
                Already have boom barriers or IP cameras? Qubify VPS plugs right in for fast deployment
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-camera text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">IP Cameras</h3>
                <p class="text-gray-600 text-sm">High-resolution license plate capture</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-qrcode text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">QR Scanners</h3>
                <p class="text-gray-600 text-sm">Digital pass validation systems</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-wifi text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">RFID Modules</h3>
                <p class="text-gray-600 text-sm">Proximity card and tag readers</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-door-open text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Entry Gate Controls</h3>
                <p class="text-gray-600 text-sm">Boom barriers and access gates</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-tv text-teal-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">LED Signage</h3>
                <p class="text-gray-600 text-sm">Real-time slot display boards</p>
            </div>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Industries <span class="text-blue-400">We Serve</span>
            </h2>
            <p class="text-lg text-gray-300">
                Qubify VPS works across multiple verticals—wherever vehicles park, we fit.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-building text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🏢 Corporate & IT Parks</h3>
                <p class="text-gray-300 text-sm">Enterprise campus parking solutions</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shopping-cart text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🛍️ Shopping Malls</h3>
                <p class="text-gray-300 text-sm">Retail center visitor management</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hospital text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🏥 Hospitals</h3>
                <p class="text-gray-300 text-sm">Medical campus parking control</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-landmark text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🏛️ Government Buildings</h3>
                <p class="text-gray-300 text-sm">Secure facility access management</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🎓 Colleges & Universities</h3>
                <p class="text-gray-300 text-sm">Campus parking automation</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-city text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🌆 Smart Cities</h3>
                <p class="text-gray-300 text-sm">Urban parking infrastructure</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-plane text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">✈️ Airports & Hotels</h3>
                <p class="text-gray-300 text-sm">High-volume parking management</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-calendar-alt text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🎪 Convention Centers</h3>
                <p class="text-gray-300 text-sm">Event-based parking solutions</p>
            </div>
        </div>
    </div>
</section>

<!-- Scalability Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Scalability Without <span class="text-blue-600">Limitations</span>
            </h2>
            <p class="text-lg text-gray-600">
                Whether you're handling 50 cars a day or 5,000, Qubify VPS is built to scale. Add more slots, users, zones, or hardware without disruption.
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">📈 Growth Ready</h3>
                <p class="text-gray-600 text-sm">Scale from 50 to 5,000 vehicles per day without system changes or performance degradation.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-layer-group text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">🏗️ Modular Design</h3>
                <p class="text-gray-600 text-sm">Add new zones, hardware components, or features as your facility grows without disrupting operations.</p>
            </div>
            
            <div class="text-center p-8 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-globe text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-3">🌐 Multi-Location</h3>
                <p class="text-gray-600 text-sm">Manage multiple facilities from one dashboard with location-specific rules and unified reporting.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Why Teams Love <span class="text-blue-600">Qubify VPS</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Rakesh N.</h4>
                        <p class="text-gray-600 text-sm">Admin Head, Tech Park</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "Installation was seamless, and we were live in under a week. No more paper logs or parking chaos."
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
                        <h4 class="font-semibold text-gray-900">Sneha M.</h4>
                        <p class="text-gray-600 text-sm">Facility Manager, Retail Group</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "The ability to track revenue, manage access, and keep history logs—all in one panel—is a huge upgrade."
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
                        <h4 class="font-semibold text-gray-900">Vikrant S.</h4>
                        <p class="text-gray-600 text-sm">Infra Head, Hospital</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "It's future-ready and works with our existing hardware. We didn't need to replace a thing."
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
                It's Time to <span class="text-blue-400">Modernize Parking</span>
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Your facility deserves more than outdated tickets and manual entry logs. Qubify VPS gives you modern infrastructure with the simplicity of a tap and the power of a smart city platform.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🧠 AI-enhanced tracking
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🔐 Fully secure and role-based
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🛠 Easy to integrate and scale
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    📱 Web, tablet & mobile ready
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    🚀 Book Your Demo Now
                </a>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    📞 Speak to a Consultant
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
    
    // VPS dashboard value animation on hover
    const dashboardCards = document.querySelectorAll('.bg-gradient-to-br');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const values = card.querySelectorAll('.font-bold');
            values.forEach(value => {
                if (value.textContent.includes('₹')) {
                    // Animate currency values
                    const currentValue = parseInt(value.textContent.replace(/[₹,]/g, ''));
                    const newValue = currentValue + Math.floor(Math.random() * 2000 - 1000);
                    value.textContent = '₹' + Math.max(0, newValue).toLocaleString();
                } else if (value.textContent.includes('/')) {
                    // Handle fraction values like "47/120"
                    const parts = value.textContent.split('/');
                    if (parts.length === 2) {
                        const available = parseInt(parts[0]);
                        const total = parseInt(parts[1]);
                        const newAvailable = Math.max(0, Math.min(available + Math.floor(Math.random() * 10 - 5), total));
                        value.textContent = newAvailable + '/' + total;
                    }
                } else if (value.textContent.includes('%')) {
                    // Handle percentage values
                    const currentValue = parseInt(value.textContent.replace('%', ''));
                    const newValue = Math.min(Math.max(currentValue + Math.floor(Math.random() * 6 - 3), 0), 100);
                    value.textContent = newValue + '%';
                } else if (value.textContent.includes('s')) {
                    // Handle time values in seconds
                    const currentValue = parseFloat(value.textContent.replace('s', ''));
                    const newValue = Math.max(currentValue + (Math.random() * 0.4 - 0.2), 0.1).toFixed(1);
                    value.textContent = newValue + 's';
                } else if (value.textContent.includes('hrs')) {
                    // Handle duration values
                    const currentValue = parseFloat(value.textContent.replace(' hrs', ''));
                    const newValue = Math.max(currentValue + (Math.random() * 0.8 - 0.4), 0.1).toFixed(1);
                    value.textContent = newValue + ' hrs';
                } else if (!isNaN(parseInt(value.textContent))) {
                    // Handle numeric values
                    const currentValue = parseInt(value.textContent);
                    const newValue = currentValue + Math.floor(Math.random() * 10 - 5);
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