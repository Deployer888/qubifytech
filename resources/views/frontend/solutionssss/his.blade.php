@extends('frontend.layouts.app')

@section('title')
HIS - Hospital Information System - {{app_name()}}
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
               Revolutionize Hospital Management with  <span class="holographic">HIS</span> 
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
            A complete, cloud-based Hospital Information System that brings your departments, staff, and patients into one connected platform—boosting operational control, clinical accuracy, and the patient experience.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    🛡 Trusted by modern hospitals and specialty clinics worldwide.
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                ☁️ 100% cloud infrastructure.
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                    ⚡ Accessible anywhere, anytime
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <button onclick="openContactModal()" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                    🔵 Start a Free Demo
                </button>
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                    ⚪ Schedule a Call with an Expert
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

<!-- What is HIS Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                What is <span class="text-blue-600">HIS</span>?
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Managing a healthcare facility is a constant balancing act—staff schedules, patient records, billing, diagnostics, and compliance. HIS brings it all together in one intuitive system built specifically for hospitals of every size.
            </p>
        </div>
        
        <!-- Core Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hospital text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Hospital Administration</h3>
                <p class="text-gray-600 text-sm">Complete administrative control and oversight</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-injured text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Patient Management</h3>
                <p class="text-gray-600 text-sm">Streamlined appointment booking and patient care</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-credit-card text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Financial Control</h3>
                <p class="text-gray-600 text-sm">Automated billing and comprehensive financial tracking</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Analytics & Reports</h3>
                <p class="text-gray-600 text-sm">Data-driven insights for better decision making</p>
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
                Everything your hospital needs in one powerful platform
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            <!-- Hospital Administration -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-hospital text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">🏥 Hospital Administration</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">One Dashboard to Oversee It All</h4>
                    <p class="text-gray-600 mb-4">
                        From user roles and department activities to billing workflows and financial records, HIS gives administrators a centralized command center. Every team gets role-based access, keeping information secure and relevant.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Coordinate across departments effortlessly
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Automate routine tasks and reduce paperwork
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Keep all hospital data secure and compliant
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Admin Dashboard</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Active Patients</span>
                                <span class="font-bold">247</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Staff On Duty</span>
                                <span class="font-bold">89</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Bed Occupancy</span>
                                <span class="font-bold">78%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Patient Management -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Patient Records</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>New Appointments</span>
                                <span class="font-bold">34</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Pending Reports</span>
                                <span class="font-bold">12</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Discharged Today</span>
                                <span class="font-bold">8</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-user-injured text-green-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">👩‍⚕️ Patient Management</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Fewer Delays. Smoother Visits.</h4>
                    <p class="text-gray-600 mb-4">
                        Maintain comprehensive digital records including histories, diagnoses, and treatments. Patients can self-schedule appointments online, cutting wait times and easing your front-desk load.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Complete digital patient records
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Online appointment scheduling
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Real-time transaction syncing
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Billing & Financial -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-credit-card text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">💳 Billing & Financial Control</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Transparent Billing, Zero Confusion</h4>
                    <p class="text-gray-600 mb-4">
                        Automate billing, payments, and payroll with built-in financial tools. Support for multiple payment gateways and real-time financial reporting gives complete visibility into revenue and costs.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Automated billing and payments
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Multiple payment gateway support
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Real-time financial reporting
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Financial Overview</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Today's Revenue</span>
                                <span class="font-bold">₹2,45,000</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Pending Bills</span>
                                <span class="font-bold">₹85,000</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Insurance Claims</span>
                                <span class="font-bold">₹1,20,000</span>
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
                        <i class="fas fa-user-md text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">👨‍⚕️ Doctor & Staff Coordination</h3>
                    <p class="text-gray-600 text-sm mb-3">Better Schedules, Better Care</p>
                    <p class="text-gray-500 text-sm">Doctors can check schedules, review patient charts, and prescribe medications while staff stay in sync through built-in communication tools.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-file-medical text-teal-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">📁 Electronic Medical Records</h3>
                    <p class="text-gray-600 text-sm mb-3">No Lost Files, No Guesswork</p>
                    <p class="text-gray-500 text-sm">Complete, up-to-date medical records with digital prescriptions and auto-linked lab results for unified clinical view.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-bed text-orange-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🛏 Bed & Ward Management</h3>
                    <p class="text-gray-600 text-sm mb-3">Know What's Available—At a Glance</p>
                    <p class="text-gray-500 text-sm">Real-time tracking of admissions, bed availability, and discharges for improved hospital flow coordination.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-microscope text-pink-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🧪 Pathology & Radiology</h3>
                    <p class="text-gray-600 text-sm mb-3">Diagnostics, Streamlined and Synced</p>
                    <p class="text-gray-500 text-sm">Unified interface for test requests, result uploads, and diagnostic data with instant result availability.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-video text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">💻 Live Consultations</h3>
                    <p class="text-gray-600 text-sm mb-3">Bring Care to Patients—Anywhere</p>
                    <p class="text-gray-500 text-sm">Secure, HIPAA-compliant virtual consultations with integrated scheduling and video calling tools.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-tint text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🩸 Blood Bank & Inventory</h3>
                    <p class="text-gray-600 text-sm mb-3">Monitor Supply, Avoid Shortages</p>
                    <p class="text-gray-500 text-sm">Real-time tracking of blood stocks, medications, and supplies with optimized reordering management.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Teams Trust HIS Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Why Healthcare Leaders Choose <span class="text-blue-600">HIS</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">⏱ Boost Efficiency</h3>
                <p class="text-gray-600 text-sm">Automate manual work and connect teams for smoother operations and faster patient care.</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">🧑‍⚕️ Better Care</h3>
                <p class="text-gray-600 text-sm">Real-time data access means fewer treatment delays and improved clinical outcomes.</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-expand-arrows-alt text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">📈 Scalable</h3>
                <p class="text-gray-600 text-sm">From 30-bed clinics to 1,000-bed hospitals, HIS adapts to your size and growth.</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">🔒 Secure & Compliant</h3>
                <p class="text-gray-600 text-sm">Built to meet the toughest privacy and regulatory standards for healthcare.</p>
            </div>
        </div>
    </div>
</section>

<!-- Perfect for Teams Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                HIS is Perfect for Healthcare Facilities That Want 
                <span class="text-blue-400">Speed, Clarity, and Control</span>
            </h2>
            <p class="text-lg text-gray-300">
                Built for all types of healthcare organizations that need everything in one place.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hospital-alt text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Hospitals</h3>
                <p class="text-gray-400 text-sm">General and specialty hospitals of all sizes</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-md text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Clinics</h3>
                <p class="text-gray-400 text-sm">Multi-specialty and single-specialty clinics</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-brain text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Mental Health</h3>
                <p class="text-gray-400 text-sm">Specialized care coordination and patient tracking</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-ambulance text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Emergency Centers</h3>
                <p class="text-gray-400 text-sm">Fast-track patient care with real-time coordination</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-microscope text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">Diagnostic Labs</h3>
                <p class="text-gray-400 text-sm">Streamlined test processing and result management</p>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <p class="text-lg text-gray-300">
                Each team gets exactly what they need—without the extra tools or learning curves.
            </p>
        </div>
    </div>
</section>

<!-- Real Results Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Real <span class="text-blue-600">Results</span>
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
                <p class="text-gray-700 mb-4">
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
                <p class="text-gray-700 mb-4">
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
                <p class="text-gray-700 mb-4">
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
                Streamline Your Workflow.<br>
                <span class="text-blue-400">Simplify</span> Your Stack.
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                From the first lead to the final invoice, HIS keeps your team in sync and your hospital on track.
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
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-8">
                <a  href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    🚀 Try HIS Today
                </a>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    📞 Request a Call
                </a>
            </div>
            
            <!-- Additional CTAs -->
            {{-- <div class="grid md:grid-cols-2 gap-4 max-w-2xl mx-auto">
                <button class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-300">
                    📋 Schedule a Consultation
                </button>
                <button class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-all duration-300">
                    📊 See Real-time Reports
                </button>
            </div> --}}
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
    
    // Dashboard value animation on hover
    const dashboardCards = document.querySelectorAll('.bg-gradient-to-br');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const values = card.querySelectorAll('.font-bold');
            values.forEach(value => {
                if (value.textContent.includes('₹')) {
                    // Animate currency values
                    const currentValue = parseInt(value.textContent.replace(/[₹,]/g, ''));
                    const newValue = currentValue + Math.floor(Math.random() * 10000);
                    animateValue(value, currentValue, newValue, 1000, '₹');
                } else if (value.textContent.includes('%')) {
                    // Animate percentage values
                    const currentValue = parseInt(value.textContent.replace('%', ''));
                    const newValue = Math.min(currentValue + Math.floor(Math.random() * 5), 100);
                    animateValue(value, currentValue, newValue, 1000, '%');
                } else if (!isNaN(parseInt(value.textContent))) {
                    // Animate numeric values
                    const currentValue = parseInt(value.textContent);
                    const newValue = currentValue + Math.floor(Math.random() * 10);
                    animateValue(value, currentValue, newValue, 1000);
                }
            });
        });
    });
    
    function animateValue(element, start, end, duration, suffix = '') {
        const startTime = performance.now();
        const animate = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const currentValue = Math.floor(start + (end - start) * progress);
            
            if (suffix === '₹') {
                element.textContent = '₹' + currentValue.toLocaleString();
            } else if (suffix === '%') {
                element.textContent = currentValue + '%';
            } else {
                element.textContent = currentValue;
            }
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        };
        requestAnimationFrame(animate);
    }
    
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