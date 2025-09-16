@extends('frontend.layouts.app')

@section('title')
On-Demand Delivery Software - {{app_name()}}
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
                Deliver Smarter
                <span class="holographic">Faster</span> 
                <br>and in Real-Time
            </h1>
            
            <!-- Subheadline -->
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-4xl mx-auto leading-relaxed">
            Qubify’s On-Demand Delivery Software powers businesses with end-to-end control over every delivery — from dispatch to doorstep. Whether you’re managing food, packages, or field services, Qubify automates logistics, tracks drivers live, and enhances your customer experience.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                🚚 Real-Time Tracking
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                📦 Route Optimization
                </span>
                <span class="px-6 py-3 bg-white/20 backdrop-blur-lg rounded-full text-white border border-white/30">
                📲 Customer Notifications
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-full text-lg shadow-2xl hover:shadow-orange-500/50 hover:scale-105 transition-all duration-300 hover-glow">
                🔵 Book a Demo
                </a>
                <button onclick="openContactModal()" class="px-10 py-4 bg-white/20 backdrop-blur-lg text-white font-semibold rounded-full text-lg border border-white/30 hover:bg-white/30 transition-all duration-300">
                ⚪ See It in Action
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

<!-- What is Qubify Delivery Software Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                What is <span class="text-blue-600">Qubify On-Demand Delivery Software</span>?
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Qubify's delivery platform enables you to digitize and manage every part of your on-demand logistics operation. From order assignments to last-mile tracking, the system is built to reduce delivery time, cut operational waste, and scale delivery capacity — without adding more people or complexity.
            </p>
            <p class="text-lg text-gray-700 mt-4">
                It's the smart backbone for restaurants, e-commerce, courier services, and hyperlocal businesses looking to move fast and keep customers loyal.
            </p>
        </div>
        
        <!-- Core Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map-marker-alt text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Real-Time Tracking</h3>
                <p class="text-gray-600 text-sm">Live driver and order monitoring with ETAs</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-robot text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Auto-Dispatch</h3>
                <p class="text-gray-600 text-sm">Smart order assignment to nearest drivers</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-route text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Route Optimization</h3>
                <p class="text-gray-600 text-sm">Traffic-aware navigation and best paths</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-mobile-alt text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Customer Portal</h3>
                <p class="text-gray-600 text-sm">Live updates and delivery notifications</p>
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
                Everything you need for complete delivery management
            </p>
        </div>
        
        <!-- Features List -->
        <div class="space-y-16">
            <!-- Real-Time Driver & Order Tracking -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-map-marker-alt text-blue-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">📍 Real-Time Driver & Order Tracking</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Complete Visibility, Every Step</h4>
                    <p class="text-gray-600 mb-4">
                        Know exactly where every driver is, and where every order stands. Customers get live updates with ETAs and map tracking, while dispatchers can monitor delivery routes and address delays instantly. Visibility means fewer missed deliveries, faster resolutions, and higher trust.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Live driver location tracking
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Customer ETA notifications
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Instant delay resolution
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Live Tracking</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Active Drivers</span>
                                <span class="font-bold">24/30</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>In Transit</span>
                                <span class="font-bold text-green-300">67</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Avg. ETA</span>
                                <span class="font-bold">23 min</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Automated Order Dispatching -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Auto-Dispatch Engine</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Orders Auto-Assigned</span>
                                <span class="font-bold">94%</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Avg. Assignment Time</span>
                                <span class="font-bold">8s</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Efficiency Gain</span>
                                <span class="font-bold text-green-300">+42%</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-robot text-green-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">🤖 Automated Order Dispatching</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Smart Assignment, Maximum Efficiency</h4>
                    <p class="text-gray-600 mb-4">
                        Incoming orders are auto-assigned to the nearest available driver based on location, capacity, and priority. The system balances workload in real time and ensures maximum efficiency — no more manual coordination or missed assignments.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Location-based smart assignment
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Real-time workload balancing
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Priority-based order handling
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Route Optimization Engine -->
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-route text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">🗺️ Route Optimization Engine</h3>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">Fastest Path, Every Time</h4>
                    <p class="text-gray-600 mb-4">
                        Qubify uses live traffic data and delivery windows to recommend the fastest, most cost-effective routes. Whether it's one drop or 100, your drivers take the best path every time — reducing fuel use and increasing drop density.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Live traffic data integration
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Multi-drop route optimization
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            Fuel efficiency maximization
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-4">Route Performance</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Time Saved</span>
                                <span class="font-bold">32%</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Fuel Efficiency</span>
                                <span class="font-bold text-green-300">+18%</span>
                            </div>
                            <div class="flex justify-between items-center bg-white/20 rounded-lg p-3">
                                <span>Drops/Hour</span>
                                <span class="font-bold">8.3</span>
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
                        <i class="fas fa-user-check text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">📱 Customer Experience Portal</h3>
                    <p class="text-gray-600 text-sm mb-3">Real-Time Engagement</p>
                    <p class="text-gray-500 text-sm">Customers get real-time notifications with driver info, delivery status, and live map tracking — keeping them informed, engaged, and confident throughout the process.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-clipboard-check text-teal-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">📋 Electronic Proof of Delivery</h3>
                    <p class="text-gray-600 text-sm mb-3">Digital Accountability</p>
                    <p class="text-gray-500 text-sm">Every delivery ends with digital proof — photo capture, signature, timestamp, or OTP confirmation. Logs sync instantly for full accountability and dispute resolution.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-tachometer-alt text-orange-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">📊 Admin Dashboard</h3>
                    <p class="text-gray-600 text-sm mb-3">Central Command</p>
                    <p class="text-gray-500 text-sm">Your entire delivery fleet, visualized and controlled in one dashboard. Assign tasks, view heatmaps, monitor SLAs, and generate reports from a single screen.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-pink-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">⏰ Delivery Time Slots</h3>
                    <p class="text-gray-600 text-sm mb-3">Flexible Scheduling</p>
                    <p class="text-gray-500 text-sm">Give customers preferred delivery windows. Support instant, same-day, or next-day delivery with dynamic slot allocation based on capacity and traffic.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-bell text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">🔔 Real-Time Alerts</h3>
                    <p class="text-gray-600 text-sm mb-3">Proactive Monitoring</p>
                    <p class="text-gray-500 text-sm">Never miss a delivery window. Get alerts for late deliveries, missed stops, or route deviations with full control to reassign before problems escalate.</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-mobile-alt text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">📱 Driver Mobile App</h3>
                    <p class="text-gray-600 text-sm mb-3">Complete Toolkit</p>
                    <p class="text-gray-500 text-sm">More than navigation — real-time route updates, task alerts, digital proof collection, and performance stats in one mobile toolkit.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Features Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Advanced <span class="text-blue-600">Features</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-credit-card text-green-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">💰 Integrated Billing & Payout Tools</h3>
                <p class="text-gray-600 text-sm mb-3">Complete Financial Management</p>
                <p class="text-gray-500 text-sm">Manage delivery charges, driver commissions, and vendor payments in one place. Generate automated invoices, track cash-on-delivery balances, and ensure payment accuracy across every partner.</p>
            </div>
            
            <div class="bg-gray-50 p-6 rounded-xl shadow-lg">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-plug text-purple-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">🔌 Third-Party Integrations & APIs</h3>
                <p class="text-gray-600 text-sm mb-3">Seamless Connectivity</p>
                <p class="text-gray-500 text-sm">Already using e-commerce, POS, or warehouse platforms? Qubify integrates with your existing tools via secure APIs and webhooks — including payment gateways and CRM systems.</p>
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
                Qubify supports delivery operations for every sector — whether you deliver in minutes or by appointment, we adapt.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-utensils text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🍔 Food & Beverage</h3>
                <p class="text-gray-300 text-sm">Hot food delivery with time-critical logistics</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shopping-bag text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">📦 E-commerce & D2C</h3>
                <p class="text-gray-300 text-sm">Package delivery with customer experience focus</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shipping-fast text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🛵 Courier & Logistics</h3>
                <p class="text-gray-300 text-sm">Professional courier services and logistics</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-pills text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🧴 Pharma & Healthcare</h3>
                <p class="text-gray-300 text-sm">Medicine delivery with compliance tracking</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-tools text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🧹 Home Services</h3>
                <p class="text-gray-300 text-sm">Service professional dispatch and tracking</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-teal-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-store text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">🛍 Retail & Grocery</h3>
                <p class="text-gray-300 text-sm">Same-day grocery and retail deliveries</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">📚 Education</h3>
                <p class="text-gray-300 text-sm">Document and educational material dispatch</p>
            </div>
            
            <div class="text-center p-6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl">
                <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-plus text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2">➕ And More</h3>
                <p class="text-gray-300 text-sm">Custom solutions for your industry needs</p>
            </div>
        </div>
    </div>
</section>

<!-- Highlights At a Glance Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Highlights At a <span class="text-blue-600">Glance</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-satellite-dish text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Real-time Tracking</h3>
                <p class="text-gray-600 text-sm">Driver and order tracking with live updates</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-calendar-alt text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Auto-assign & Batch</h3>
                <p class="text-gray-600 text-sm">Smart scheduling and workload optimization</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-route text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Route Optimization</h3>
                <p class="text-gray-600 text-sm">Traffic-aware navigation and best paths</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clipboard-check text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ ePOD with Proof</h3>
                <p class="text-gray-600 text-sm">Digital proof with image, signature, OTP</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-tachometer-alt text-teal-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Admin Dashboards</h3>
                <p class="text-gray-600 text-sm">Complete fleet control and monitoring</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-plug text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Full-stack APIs</h3>
                <p class="text-gray-600 text-sm">Seamless integration with existing systems</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-mobile-alt text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Mobile Apps</h3>
                <p class="text-gray-600 text-sm">Driver apps with real-time communication</p>
            </div>
            
            <div class="text-center p-6 bg-gray-50 rounded-xl">
                <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-pink-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">✅ Smart Analytics</h3>
                <p class="text-gray-600 text-sm">Performance insights and optimization</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Why Teams Trust <span class="text-blue-600">Qubify's Delivery Platform</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Sameer P.</h4>
                        <p class="text-gray-600 text-sm">Head of Operations, QuickServe India</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "Since switching to Qubify, we've reduced our average delivery time by 30% and increased drop rates by over 40%."
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
                        <h4 class="font-semibold text-gray-900">Manisha K.</h4>
                        <p class="text-gray-600 text-sm">Co-founder, Blit Grocery App</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "The live tracking and auto-dispatch tools have been huge. We don't need a huge back-office team to scale now."
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
                        <h4 class="font-semibold text-gray-900">Rahul D.</h4>
                        <p class="text-gray-600 text-sm">Product Manager, UrbanPickup</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4 italic">
                    "Our NPS scores went up because customers can now track deliveries like rides. That visibility changed everything."
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
                Ready to <span class="text-blue-400">Deliver Like a Pro</span>?
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Whether you're launching a last-mile fleet or upgrading your operations, Qubify On-Demand Delivery Software gives you the tools to scale without chaos and deliver delight — every time.
            </p>
            
            <!-- Feature Pills -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    📲 Mobile-first delivery ops
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    📦 End-to-end visibility & control
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    📈 Actionable data, smart dispatch
                </span>
                <span class="px-6 py-3 bg-white/10 backdrop-blur-lg rounded-full text-white border border-white/20">
                    🧩 Integrates with your tech stack
                </span>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a  href="{{ route('frontend.index') }}#contact" class="px-10 py-4 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg text-xl transition-all duration-300 hover:scale-105 shadow-xl">
                    🚀 Schedule Your Demo
                </a>
                <a href="tel:+917087076111" class="px-10 py-4 bg-white/20 backdrop-blur-lg hover:bg-white/30 text-white font-bold rounded-lg text-xl border border-white/30 transition-all duration-300">
                    📞 Talk to a Product Consultant
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
    
    // Delivery dashboard value animation on hover
    const dashboardCards = document.querySelectorAll('.bg-gradient-to-br');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const values = card.querySelectorAll('.font-bold');
            values.forEach(value => {
                if (value.textContent.includes('/')) {
                    // Handle fraction values like "24/30"
                    const parts = value.textContent.split('/');
                    if (parts.length === 2) {
                        const current = parseInt(parts[0]);
                        const total = parseInt(parts[1]);
                        const newCurrent = Math.max(0, Math.min(current + Math.floor(Math.random() * 4 - 2), total));
                        value.textContent = newCurrent + '/' + total;
                    }
                } else if (value.textContent.includes('%')) {
                    // Handle percentage values
                    const currentValue = parseFloat(value.textContent.replace('%', ''));
                    const newValue = Math.min(Math.max(currentValue + (Math.random() * 2 - 1), 90), 100).toFixed(1);
                    value.textContent = newValue + '%';
                } else if (value.textContent.includes('min')) {
                    // Handle time values in minutes
                    const currentValue = parseInt(value.textContent.replace(' min', ''));
                    const newValue = Math.max(currentValue + Math.floor(Math.random() * 6 - 3), 15);
                    value.textContent = newValue + ' min';
                } else if (value.textContent.includes('s')) {
                    // Handle time values in seconds
                    const currentValue = parseInt(value.textContent.replace('s', ''));
                    const newValue = Math.max(currentValue + Math.floor(Math.random() * 4 - 2), 3);
                    value.textContent = newValue + 's';
                } else if (value.textContent.includes('+')) {
                    // Handle efficiency gain values
                    const currentValue = parseInt(value.textContent.replace('+', '').replace('%', ''));
                    const newValue = Math.max(currentValue + Math.floor(Math.random() * 6 - 3), 20);
                    value.textContent = '+' + newValue + '%';
                } else if (!isNaN(parseFloat(value.textContent))) {
                    // Handle numeric values (including decimals)
                    const currentValue = parseFloat(value.textContent);
                    const newValue = Math.max(currentValue + (Math.random() * 2 - 1), 1).toFixed(1);
                    value.textContent = newValue;
                } else if (!isNaN(parseInt(value.textContent))) {
                    // Handle integer values
                    const currentValue = parseInt(value.textContent);
                    const newValue = currentValue + Math.floor(Math.random() * 20 - 10);
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