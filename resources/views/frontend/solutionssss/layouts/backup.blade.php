@extends('frontend.layouts.app')

@section('title')
Smarter Parking. Fully Automated - {{app_name()}}
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900">
    <!-- Background Animation Elements -->
    <div class="absolute inset-0">
        <div class="floating-shape absolute top-20 left-20 w-20 h-20 bg-blue-400 opacity-10 rounded-full blur-xl"></div>
        <div class="floating-shape absolute top-40 right-32 w-32 h-32 bg-cyan-400 opacity-15 rounded-full blur-2xl" style="animation-delay: 1s;"></div>
        <div class="floating-shape absolute bottom-32 left-1/4 w-24 h-24 bg-blue-300 opacity-10 rounded-full blur-xl" style="animation-delay: 2s;"></div>
        <div class="floating-shape absolute bottom-20 right-20 w-16 h-16 bg-indigo-400 opacity-20 rounded-full blur-lg" style="animation-delay: 0.5s;"></div>
    </div>
    
    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 opacity-5">
        <div class="w-full h-full" style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 50px 50px;"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="text-center lg:text-left">
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    Smarter Parking.
                    <span class="text-gradient holographic">Fully Automated.</span>
                </h1>
                
                <p class="text-xl text-blue-100 mb-8 leading-relaxed max-w-2xl">
                    Qubify VPS streamlines every part of the parking experience—from license plate recognition and real-time slot visibility to digital payments and admin analytics. It's the modern solution for modern facilities.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-8">
                    <button class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-2xl hover:shadow-blue-500/25 transform hover:-translate-y-1 transition-all duration-300">
                        🔵 Request Demo
                    </button>
                    <button class="border-2 border-white/30 text-white hover:bg-white/10 px-8 py-4 rounded-xl font-semibold text-lg backdrop-blur-sm transition-all duration-300 hover:border-white/50">
                        ⚪ See It In Action
                    </button>
                </div>
                
                <!-- Key Features Pills -->
                <div class="flex flex-wrap gap-3 justify-center lg:justify-start">
                    <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm border border-white/20">
                        🎥 Live LPR
                    </span>
                    <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm border border-white/20">
                        💳 Contactless Pay
                    </span>
                    <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm border border-white/20">
                        📊 Central Control Panel
                    </span>
                </div>
            </div>
            
            <!-- Right Content - Parking Dashboard Preview -->
            <div class="relative">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20 shadow-2xl">
                    <!-- Mock Parking Dashboard Interface -->
                    <div class="bg-white rounded-xl p-6 mb-4">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-semibold text-gray-800">Parking Overview</h3>
                            <div class="flex space-x-2">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                            </div>
                        </div>
                        
                        <!-- Parking Stats Grid -->
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-600">127</div>
                                <div class="text-xs text-gray-600">Available</div>
                            </div>
                            <div class="text-center p-3 bg-orange-50 rounded-lg">
                                <div class="text-2xl font-bold text-orange-600">73</div>
                                <div class="text-xs text-gray-600">Occupied</div>
                            </div>
                            <div class="text-center p-3 bg-blue-50 rounded-lg">
                                <div class="text-2xl font-bold text-blue-600">200</div>
                                <div class="text-xs text-gray-600">Total Slots</div>
                            </div>
                        </div>
                        
                        <!-- Mock Parking Layout -->
                        <div class="bg-gray-100 rounded-lg p-4">
                            <div class="grid grid-cols-4 gap-2">
                                <div class="bg-green-400 h-4 rounded text-xs text-center text-white flex items-center justify-center">P1</div>
                                <div class="bg-red-400 h-4 rounded text-xs text-center text-white flex items-center justify-center">P2</div>
                                <div class="bg-green-400 h-4 rounded text-xs text-center text-white flex items-center justify-center">P3</div>
                                <div class="bg-green-400 h-4 rounded text-xs text-center text-white flex items-center justify-center">P4</div>
                                <div class="bg-red-400 h-4 rounded text-xs text-center text-white flex items-center justify-center">P5</div>
                                <div class="bg-green-400 h-4 rounded text-xs text-center text-white flex items-center justify-center">P6</div>
                                <div class="bg-red-400 h-4 rounded text-xs text-center text-white flex items-center justify-center">P7</div>
                                <div class="bg-green-400 h-4 rounded text-xs text-center text-white flex items-center justify-center">P8</div>
                            </div>
                            <div class="flex justify-center mt-3 text-xs text-gray-500 space-x-4">
                                <span><span class="w-2 h-2 bg-green-400 rounded-full inline-block mr-1"></span>Available</span>
                                <span><span class="w-2 h-2 bg-red-400 rounded-full inline-block mr-1"></span>Occupied</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Live Indicator -->
                    <div class="flex items-center justify-center text-white/80 text-sm">
                        <div class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></div>
                        Live Parking Dashboard
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- What Is Qubify VPS Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">What Is <span class="text-gradient holographic">Qubify VPS</span>?</h2>
            <p class="text-xl text-gray-600 leading-relaxed mb-8">
                Qubify VPS is a full-stack Vehicle Parking System that replaces paper slips, cash payments, and manual slot checks with an end-to-end digital solution. Whether you're managing five spaces or five levels of parking, VPS adapts to your infrastructure and transforms it into a smart, secure, and user-friendly operation.
            </p>
        </div>
    </div>
</section>

<!-- Core Features Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Complete Parking Automation Features</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Everything you need to transform your parking facility into a smart, automated system.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Real-Time Slot Management -->
            <div class="solution-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl text-white">🅿️</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Real-Time Parking Slot Management</h3>
                <p class="text-gray-600 leading-relaxed">
                    Every slot is visible on the dashboard, updated in real time. No guesswork. Drivers and staff always know what's available and where. Plus, with dynamic slot allocation, you can maximize occupancy without chaos.
                </p>
            </div>
            
            <!-- License Plate Recognition -->
            <div class="solution-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl text-white">🎥</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">License Plate Recognition (LPR) Technology</h3>
                <p class="text-gray-600 leading-relaxed">
                    Vehicles are identified and validated the moment they approach. Cameras detect plate numbers and sync with the database to approve or deny access—automatically. No cards, no tags, no tapping.
                </p>
            </div>
            
            <!-- Digital Payments -->
            <div class="solution-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl text-white">💳</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Digital & Contactless Payments</h3>
                <p class="text-gray-600 leading-relaxed">
                    Once parked, drivers can complete payment via UPI, credit/debit cards, or integrated wallet systems. Receipts are digital, records are logged, and transactions are fully transparent—ideal for paid parking environments.
                </p>
            </div>
            
            <!-- Entry & Exit Automation -->
            <div class="solution-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl text-white">🚧</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Entry & Exit Automation</h3>
                <p class="text-gray-600 leading-relaxed">
                    Boom barriers or gate systems are triggered by license plate match, QR code, or pre-authorized digital pass. This eliminates the need for attendants while enhancing access control and auditability.
                </p>
            </div>
            
            <!-- Admin Dashboard -->
            <div class="solution-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-blue-500 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl text-white">📊</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Admin Dashboard for Central Oversight</h3>
                <p class="text-gray-600 leading-relaxed">
                    Your entire parking facility—visualized and controlled in real time. Admins get one screen to manage slot occupancy, track vehicle flow, review payments, and export reports. Set access roles, customize rules, and monitor all historical logs.
                </p>
            </div>
            
            <!-- Smart Reporting -->
            <div class="solution-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-2xl text-white">📈</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Smart Reporting & Data Logs</h3>
                <p class="text-gray-600 leading-relaxed">
                    Every entry, exit, duration, and transaction is logged in detail. View daily, weekly, or custom-range reports. Filter by license plate, payment status, or zone. Great for audits, optimization, and performance reviews.
                </p>
            </div>
        </div>
    </div>
</section>


<!-- Advanced Features Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Advanced Parking Management Features</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Go beyond basic parking with intelligent automation and comprehensive facility management.
            </p>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-16">
            <!-- Left Column -->
            <div class="space-y-8">
                <div class="border-l-4 border-blue-500 pl-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Facility-Wide Alerts & Custom Rules</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Set auto-alerts for overstays, unauthorized access attempts, or slot overruns. Admins can define time limits, grace periods, pricing rules, or VIP zones—all configurable without code.
                    </p>
                </div>
                
                <div class="border-l-4 border-green-500 pl-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Hardware-Friendly Integration</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Already have boom barriers or IP cameras? Qubify VPS plugs right in. The system integrates with most major access control hardware, allowing for fast deployment without overhauling your infrastructure.
                    </p>
                </div>
                
                
            </div>
            
            <!-- Right Column -->
            <div class="space-y-8">
                <div class="border-l-4 border-purple-500 pl-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Scalability Without Limitations</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Whether you're handling 50 cars a day or 5,000, Qubify VPS is built to scale. Add more slots, users, zones, or hardware without disruption. Ideal for smart city parking, enterprise campuses, and large events.
                    </p>
                </div>
                <div class="border-l-4 border-orange-500 pl-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Multi-Zone & Multi-Location Support</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Manage multiple parking zones, towers, or facilities under one master admin portal. Each area has its own configuration and data logs, but you get a single source of truth for everything.
                    </p>
                </div>
                
                <!-- <div class="border-l-4 border-teal-500 pl-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">AI-Enhanced Security</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Advanced computer vision and machine learning algorithms ensure accurate license plate recognition, detect suspicious activities, and prevent unauthorized access with real-time monitoring.
                    </p>
                </div>
                
                <div class="border-l-4 border-indigo-500 pl-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Mobile & Cloud Ready</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Access your parking management system from anywhere with cloud-based architecture. Mobile apps for drivers and administrators ensure seamless operation across all devices.
                    </p>
                </div> -->
            </div>
        </div>
    </div>
</section>

<!-- Hardware Integration Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Hardware Integration & Compatibility</h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Qubify VPS integrates seamlessly with existing parking infrastructure and supports a wide range of hardware devices for complete automation.
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm">✓</span>
                        </div>
                        <span class="text-gray-700 font-medium">IP Cameras for LPR</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm">✓</span>
                        </div>
                        <span class="text-gray-700 font-medium">QR scanners</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm">✓</span>
                        </div>
                        <span class="text-gray-700 font-medium">RFID modules</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm">✓</span>
                        </div>
                        <span class="text-gray-700 font-medium">Entry gate controls</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm">✓</span>
                        </div>
                        <span class="text-gray-700 font-medium">LED signage for slot display</span>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gray-50 rounded-2xl p-8 shadow-lg">
                    <!-- Hardware Diagram -->
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center p-4 bg-blue-50 rounded-xl">
                            <div class="text-3xl mb-2">📹</div>
                            <h4 class="font-semibold text-gray-900 text-sm">LPR Camera</h4>
                        </div>
                        <div class="text-center p-4 bg-green-50 rounded-xl">
                            <div class="text-3xl mb-2">🚧</div>
                            <h4 class="font-semibold text-gray-900 text-sm">Boom Barrier</h4>
                        </div>
                        <div class="text-center p-4 bg-orange-50 rounded-xl">
                            <div class="text-3xl mb-2">📱</div>
                            <h4 class="font-semibold text-gray-900 text-sm">QR Scanner</h4>
                        </div>
                        <div class="text-center p-4 bg-purple-50 rounded-xl">
                            <div class="text-3xl mb-2">💡</div>
                            <h4 class="font-semibold text-gray-900 text-sm">LED Display</h4>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 bg-white rounded-xl text-center border-2 border-blue-200">
                        <div class="text-2xl mb-2">🧠</div>
                        <h4 class="font-semibold text-gray-900">Qubify VPS Control Center</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Industries We Serve</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Qubify VPS works across multiple verticals, adapting to unique parking requirements of every industry.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition-all duration-300">
                <div class="text-4xl mb-4">🏢</div>
                <h3 class="font-semibold text-gray-900 mb-2">Corporate & IT Parks</h3>
                <p class="text-gray-600 text-sm">Employee parking management with access control and analytics.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition-all duration-300">
                <div class="text-4xl mb-4">🛍️</div>
                <h3 class="font-semibold text-gray-900 mb-2">Shopping Malls & Retail</h3>
                <p class="text-gray-600 text-sm">Customer parking with payment integration and slot optimization.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition-all duration-300">
                <div class="text-4xl mb-4">🏥</div>
                <h3 class="font-semibold text-gray-900 mb-2">Hospitals & Medical Campuses</h3>
                <p class="text-gray-600 text-sm">Priority parking for emergency services and patient management.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition-all duration-300">
                <div class="text-4xl mb-4">🏛️</div>
                <h3 class="font-semibold text-gray-900 mb-2">Government Buildings</h3>
                <p class="text-gray-600 text-sm">Secure parking with visitor management and access tracking.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition-all duration-300">
                <div class="text-4xl mb-4">🎓</div>
                <h3 class="font-semibold text-gray-900 mb-2">Colleges & Universities</h3>
                <p class="text-gray-600 text-sm">Student and faculty parking with permit management systems.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition-all duration-300">
                <div class="text-4xl mb-4">🌆</div>
                <h3 class="font-semibold text-gray-900 mb-2">Smart Cities & Urban Projects</h3>
                <p class="text-gray-600 text-sm">Large-scale municipal parking with revenue optimization.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition-all duration-300">
                <div class="text-4xl mb-4">✈️</div>
                <h3 class="font-semibold text-gray-900 mb-2">Airports & Hotels</h3>
                <p class="text-gray-600 text-sm">Long-term parking solutions with automated billing systems.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition-all duration-300">
                <div class="text-4xl mb-4">🏨</div>
                <h3 class="font-semibold text-gray-900 mb-2">Convention Centers</h3>
                <p class="text-gray-600 text-sm">Event-based parking with dynamic pricing and capacity management.</p>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <p class="text-lg text-gray-600 italic">Wherever vehicles park, Qubify VPS fits.</p>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Teams Love Qubify VPS</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                See what our customers have to say about their transformation with Qubify VPS.
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-blue-50 p-8 rounded-2xl border border-blue-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                        RN
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Rakesh N.</h4>
                        <p class="text-gray-600 text-sm">Admin Head, Tech Park</p>
                    </div>
                </div>
                <blockquote class="text-gray-700 italic">
                    "Installation was seamless, and we were live in under a week. No more paper logs or parking chaos."
                </blockquote>
            </div>
            
            <div class="bg-green-50 p-8 rounded-2xl border border-green-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                        SM
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Sneha M.</h4>
                        <p class="text-gray-600 text-sm">Facility Manager, Retail Group</p>
                    </div>
                </div>
                <blockquote class="text-gray-700 italic">
                    "The ability to track revenue, manage access, and keep history logs—all in one panel—is a huge upgrade."
                </blockquote>
            </div>
            
            <div class="bg-orange-50 p-8 rounded-2xl border border-orange-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                        VS
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Vikrant S.</h4>
                        <p class="text-gray-600 text-sm">Infra Head, Hospital</p>
                    </div>
                </div>
                <blockquote class="text-gray-700 italic">
                    "It's future-ready and works with our existing hardware. We didn't need to replace a thing."
                </blockquote>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Key Benefits</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                See why facilities choose Qubify VPS for their parking automation needs.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl text-white">🧠</span>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">AI-enhanced tracking</h3>
                <p class="text-gray-600 text-sm">Advanced machine learning for accurate vehicle recognition and smart analytics.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl text-white">🔐</span>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Fully secure and role-based</h3>
                <p class="text-gray-600 text-sm">Enterprise-grade security with customizable access controls and permissions.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl text-white">🛠</span>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Easy to integrate and scale</h3>
                <p class="text-gray-600 text-sm">Seamless integration with existing infrastructure and unlimited scalability.</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl text-white">📱</span>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Web, tablet & mobile ready</h3>
                <p class="text-gray-600 text-sm">Access your parking system from any device, anywhere, anytime.</p>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-900 to-indigo-900 text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl lg:text-5xl font-bold mb-6">It's Time to Modernize Parking</h2>
        <p class="text-xl text-blue-100 mb-12 max-w-4xl mx-auto leading-relaxed">
            Your facility deserves more than outdated tickets and manual entry logs. Qubify VPS gives you modern infrastructure with the simplicity of a tap and the power of a smart city platform.
        </p>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
                <div class="text-3xl mb-3">🧠</div>
                <h3 class="font-semibold mb-2">AI-enhanced tracking</h3>
                <p class="text-blue-200 text-sm">Smart recognition and analytics</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
                <div class="text-3xl mb-3">🔐</div>
                <h3 class="font-semibold mb-2">Fully secure</h3>
                <p class="text-blue-200 text-sm">Role-based access control</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
                <div class="text-3xl mb-3">🛠</div>
                <h3 class="font-semibold mb-2">Easy to integrate</h3>
                <p class="text-blue-200 text-sm">Scalable architecture</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20">
                <div class="text-3xl mb-3">📱</div>
                <h3 class="font-semibold mb-2">Mobile ready</h3>
                <p class="text-blue-200 text-sm">Web, tablet & mobile access</p>
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <button class="bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white px-10 py-4 rounded-xl font-bold text-lg shadow-2xl hover:shadow-orange-500/25 transform hover:-translate-y-1 transition-all duration-300">
                🚀 Book Your Demo Now
            </button>
            <button class="border-2 border-white/50 text-white hover:bg-white/10 px-10 py-4 rounded-xl font-bold text-lg backdrop-blur-sm transition-all duration-300 hover:border-white/70">
                📞 Speak to a Consultant
            </button>
        </div>
        
    </div>
</section>

<!-- Contact/Support Section -->
<!-- <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl p-12 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Ready to Transform Your Parking Facility?</h2>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                Join facilities worldwide already using Qubify VPS to automate operations, increase revenue, and improve user experience.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    Schedule Demo
                </button>
                <button class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300">
                    Get Quote
                </button>
            </div>
            
            <div class="mt-8 flex flex-wrap justify-center gap-8 text-sm text-gray-600">
                <div class="flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                    Free consultation
                </div>
                <div class="flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                    Custom demonstration
                </div>
                <div class="flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                    Quick implementation
                </div>
                <div class="flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                    24/7 support
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Back to Top Button -->
<button id="top" class="fixed bottom-8 right-8 bg-blue-600 hover:bg-blue-700 text-white w-12 h-12 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 invisible z-50">
    <i class="fas fa-arrow-up"></i>
</button>

<style>
    /* FAQ Toggle Animation */
    .faq-content {
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease-out;
    }
    
    .faq-content.show {
        display: block !important;
        max-height: 200px;
    }
    
    /* Back to Top Button */
    #top.visible {
        opacity: 1;
        visibility: visible;
    }
    
    /* Floating Animation */
    .floating-shape {
        animation: floating 6s ease-in-out infinite;
    }
    
    @keyframes floating {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        33% {
            transform: translateY(-20px) rotate(120deg);
        }
        66% {
            transform: translateY(10px) rotate(240deg);
        }
    }
    
    /* Holographic Text Effect */
    .holographic {
        background: linear-gradient(45deg, #ff006e, #8338ec, #3a86ff, #06ffa5, #ffbe0b, #fb5607);
        background-size: 300% 300%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: holographic 3s ease-in-out infinite;
    }
    
    @keyframes holographic {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }
    
    /* Progress Bar Animation */
    .progress-bar {
        width: 0%;
        transition: width 2s ease-out;
    }
    
    /* Smooth Scroll */
    html {
        scroll-behavior: smooth;
    }
    
    /* Solution Card Hover Effects */
    .solution-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .solution-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    /* Text Gradient */
    .text-gradient {
        background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 50%, #1e3a8a 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<script>
    // FAQ Toggle Function
    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('span');
        
        // Close all other FAQs
        document.querySelectorAll('.faq-content').forEach(item => {
            if (item !== content) {
                item.classList.remove('show');
                item.previousElementSibling.querySelector('span').style.transform = 'rotate(0deg)';
            }
        });
        
        // Toggle current FAQ
        content.classList.toggle('show');
        const isOpen = content.classList.contains('show');
        icon.style.transform = isOpen ? 'rotate(45deg)' : 'rotate(0deg)';
    }
    
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
    
    // Counter animation functionality (already included in base layout)
    // Back to top functionality (already included in base layout)
    // Progress bar animations (already included in base layout)
</script>

@endsection