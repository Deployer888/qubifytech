<style>
    @media (max-width: 1023px) {
        .mobile-menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-top: 1px solid #e5e7eb;
            max-height: 80vh;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        .mobile-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Ensure mobile menu content is visible */
        .mobile-menu .px-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        /* Mobile menu items styling */
        .mobile-menu a {
            display: block;
            padding: 12px 16px;
            color: #374151;
            text-decoration: none;
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.2s ease;
        }

        .mobile-menu a:hover {
            background-color: #f8fafc;
            color: #2563eb;
        }

        .mobile-menu a:last-child {
            border-bottom: none;
        }
    }

    .headtop p {
        text-align: center;
        padding: 3px 0 5px;
        color: #fff;
    }

    .headtop p a {
        font-size: 14px;
        color: #fff;
        margin: 0 10px;
    }

    .headtop {
        background: #057bb8;
        position: relative;
    }
</style>

<!-- Fixed Navigation -->
<header class="fixed top-0 left-0 right-0 z-50">
    <div class="headtop lg:hidden">
        <div class="container">
            <div class="row">
                <p> <a href="mailto:sales@qubifytech.com"><i class="fa-solid fa-envelope"></i> sales@qubifytech.com </a> |
                    <a href="rtel:+917087076111"><i class="fa-solid fa-phone"></i> +91 7087-076-111</a>
                </p>
            </div>
        </div>
    </div>
    <nav class="glass-effect shadow-lg relative" x-data="{
        showMobileNav: false,
        showSolutions: false,
        showServices: false,
        showMobileSolutions: false,
        showMobileServices: false,
        hoverTimeout: null,
    
        handleMouseEnter() {
            if (window.innerWidth >= 1024) {
                if (this.hoverTimeout) {
                    clearTimeout(this.hoverTimeout);
                    this.hoverTimeout = null;
                }
                this.showSolutions = true;
            }
        },
    
        handleMouseLeave() {
            if (window.innerWidth >= 1024) {
                this.showSolutions = false;
            }
        },
    
        handleMouseEnterService() {
            if (window.innerWidth >= 1024) {
                if (this.hoverTimeout) {
                    clearTimeout(this.hoverTimeout);
                    this.hoverTimeout = null;
                }
                this.showServices = true;
            }
        },
    
        handleMouseLeaveService() {
            if (window.innerWidth >= 1024) {
                this.showServices = false;
            }
        },
    
        toggleMobileNav() {
            this.showMobileNav = !this.showMobileNav;
            if (this.showMobileNav) {
                this.showMobileSolutions = false;
                this.showMobileServices = false;
            } else {
                this.showMobileSolutions = false;
                this.showMobileServices = false;
            }
        }
    }">
        <!-- Main Navigation Bar -->
        <div class="max-w-9xl mx-1 px-4 sm:px-6 lg:px-8 nav-box">
            <div class="flex items-center justify-between h-20">



                <!-- Logo - Left Side -->
                <div class="flex items-center">
                    <a href="{{ route('frontend.index') }}" class="flex items-center">
                        <!-- <div class="flex items-center space-x-2">
                            <h1 class="text-4xl font-bold">
                                <span class="text-gray-800">QU<span class="text-gradient">BIFY</span></span>
                            </h1>
                        </div> -->
                        <img class="block h-10 w-auto" src="{{ asset('images/QubifyMain.png') }}"
                            alt="{{ app_name() }}">
                    </a>
                </div>


                <!-- Mobile Menu Button -->
                <div class="flex items-center lg:hidden">
                    <button @click="toggleMobileNav()" type="button"
                        class="inline-flex items-center justify-center p-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                        <span class="sr-only">Open main menu</span>
                        <svg x-show="!showMobileNav" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="showMobileNav" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop Navigation - Centered -->
                <div class="hidden lg:flex lg:items-center lg:space-x-8 absolute left-1/2 transform -translate-x-1/2">
                    <a href="{{ route('frontend.index') }}"
                        class="text-gray-700 hover:text-blue-600 px-3 py-2 text-xl font-medium border-b-2 border-transparent hover:border-blue-600 transition-all duration-200">
                        Home
                    </a>

                    <!-- Solutions Dropdown -->
                    <div class="relative" @mouseenter="handleMouseEnter()" @mouseleave="handleMouseLeave()">
                        <button
                            class="text-gray-700 hover:text-blue-600 px-3 py-2 text-xl font-medium border-b-2 border-transparent hover:border-blue-600 transition-all duration-200 flex items-center">
                            Solutions
                            <svg class="ml-1 h-4 w-4 transition-transform duration-200"
                                :class="{ 'rotate-180': showSolutions }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Desktop Mega Menu -->
                        <div x-show="showSolutions" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-1 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-1 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95"
                            class="absolute left-1/2 transform -translate-x-1/2 mt-2 w-screen max-w-6xl px-4 sm:px-0"
                            style="display: none;margin-left: 100px;">
                            <div
                                class="overflow-hidden rounded-2xl shadow-2xl ring-1 ring-black ring-opacity-5 bg-white">
                                <div class="relative grid gap-6 p-8 lg:grid-cols-4">
                                    <!-- HRMS -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.solutions.hrms') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-users text-blue-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">HRMS</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Employee
                                                    Management</span>
                                                <span class="block py-1 text-sm text-gray-600">Payroll System</span>
                                                <span class="block py-1 text-sm text-gray-600">Attendance
                                                    Tracking</span>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- CRM -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.solutions.crm') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-handshake text-purple-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">CRM</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Lead Management</span>
                                                <span class="block py-1 text-sm text-gray-600">Sales Pipeline</span>
                                                <span class="block py-1 text-sm text-gray-600">Customer Support</span>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- VMS -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.solutions.vms') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-id-card text-emerald-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">VMS</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Visitor
                                                    Registration</span>
                                                <span class="block py-1 text-sm text-gray-600">Access Control</span>
                                                <span class="block py-1 text-sm text-gray-600">Digital Check-in</span>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- HIS -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.solutions.his') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-hospital-user text-red-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">HIS</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Patient
                                                    Management</span>
                                                <span class="block py-1 text-sm text-gray-600">Financial Control</span>
                                                <span class="block py-1 text-sm text-gray-600">Analytics &
                                                    Reports</span>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- POS -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.solutions.pos') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-warehouse text-yellow-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">POS</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Real-time stock
                                                    control</span>
                                                <span class="block py-1 text-sm text-gray-600">Multi-Store
                                                    Operation</span>
                                                <span class="block py-1 text-sm text-gray-600">Business Intelligence &
                                                    Reporting</span>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- VPS -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.solutions.vps') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-square-parking text-orange-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">VPS</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Real-Time Slots</span>
                                                <span class="block py-1 text-sm text-gray-600">License Plate
                                                    Recognition</span>
                                                <span class="block py-1 text-sm text-gray-600">Digital Payments</span>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- VTS -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.solutions.vts') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-lime-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-car-on text-lime-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">VTS</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Live GPS Tracking</span>
                                                <span class="block py-1 text-sm text-gray-600">Route History &
                                                    Alerts</span>
                                                <span class="block py-1 text-sm text-gray-600">Driver Monitoring</span>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- On Demand -->
                                    <div class="space-y-2" style="background: #95b8dd0a;">
                                        <a href="{{ route('frontend.solutions.dds') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-bolt text-teal-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">On Demand</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Customer Portal</span>
                                                <span class="block py-1 text-sm text-gray-600">Smart Analytics</span>
                                                <span class="block py-1 text-sm text-gray-600">Full-stack APIs</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <!-- Call to Action -->
                                <div class="bg-gray-50 px-8 py-6 border-t">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">Ready to get started?</h3>
                                            <p class="text-sm text-gray-600">Explore our comprehensive solutions</p>
                                        </div>
                                       <a href="{{ route('frontend.solutions') }}"
                                            class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-500 rounded-xl hover:from-blue-600 hover:to-blue-600 transition-all duration-300 hover-glow transform hover:scale-105">
                                            View All Solutions
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Service Dropdown -->
                    <div class="relative" @mouseenter="handleMouseEnterService()"
                        @mouseleave="handleMouseLeaveService()">
                        <button
                            class="text-gray-700 hover:text-blue-600 px-3 py-2 text-xl font-medium border-b-2 border-transparent hover:border-blue-600 transition-all duration-200 flex items-center">
                            Services
                            <svg class="ml-1 h-4 w-4 transition-transform duration-200"
                                :class="{ 'rotate-180': showSolutions }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Desktop Mega Menu -->
                        <div x-show="showServices" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-1 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-1 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95"
                            class="absolute left-1/2 transform -translate-x-1/2 mt-2 w-screen max-w-4xl px-4 sm:px-0"
                            style="display: none;">
                            <div
                                class="overflow-hidden rounded-2xl shadow-2xl ring-1 ring-black ring-opacity-5 bg-white">
                                <div class="relative grid gap-6 p-8 lg:grid-cols-3">
                                    <!-- HRMS -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.services.web-devvelopment') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-laptop-code text-blue-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">Custom Web Development</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Business Websites</span>
                                                <span class="block py-1 text-sm text-gray-600">Responsive Design</span>
                                                <span class="block py-1 text-sm text-gray-600">UI/UX Design</span>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- CRM -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.services.software-development') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-users-viewfinder text-purple-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">Custom Software Development
                                                </h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Enterprise
                                                    Software</span>
                                                <span class="block py-1 text-sm text-gray-600">SaaS Products</span>
                                                <span class="block py-1 text-sm text-gray-600">AI Integration</span>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- VMS -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.services.web-app') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fa-solid fa-passport text-emerald-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">Web Application Development
                                                </h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">PWA (Progressive Web
                                                    Apps)</span>
                                                <span class="block py-1 text-sm text-gray-600">Data-Driven Apps</span>
                                                <span class="block py-1 text-sm text-gray-600">Business
                                                    Intelligence</span>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- VMS -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.services.mobile-app') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                    <i class="fas fa-mobile-screen-button text-red-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">Mobile App Development</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">iOS & Android
                                                    Apps</span>
                                                <span class="block py-1 text-sm text-gray-600">App Store
                                                    Deployment</span>
                                                <span class="block py-1 text-sm text-gray-600">GPS & Location
                                                    Tracking</span>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- mvp development -->
                                    <div class="space-y-2">
                                        <a href="{{ route('frontend.services.mvp-development') }}">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center mr-3">
                                                 
                                                    <i class="fa-solid fa-code text-pink-600 text-sm"></i>
                                                </div>
                                                <h4 class="font-semibold text-gray-800">MVP Development</h4>
                                            </div>
                                            <div class="ml-11 space-y-1">
                                                <span class="block py-1 text-sm text-gray-600">Fast Delivery</span>
                                                <span class="block py-1 text-sm text-gray-600">Real Feedback</span>
                                                <span class="block py-1 text-sm text-gray-600">Smart Scaling</span>
                                                <span class="block py-1 text-sm text-gray-600">Validation</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <!-- Call to Action -->
                                <div class="bg-gray-50 px-8 py-6 border-t">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">Ready to get started?</h3>
                                            <p class="text-sm text-gray-600">Explore our comprehensive services</p>
                                        </div>
                                      <a href="{{ route('frontend.services') }}"
                                            class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-blue-500 rounded-xl hover:from-blue-600 hover:to-blue-600 transition-all duration-300 hover-glow transform hover:scale-105">
                                            View All Services
                                            <i class="fas fa-arrow-right ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('frontend.about') }}"
                        class="text-gray-700 hover:text-blue-600 px-3 py-2 text-xl font-medium border-b-2 border-transparent hover:border-blue-600 transition-all duration-200">
                        About
                    </a>

                    <a href="{{ route('frontend.contact') }}"
                        class="text-gray-700 hover:text-blue-600 px-3 py-2 text-xl font-medium border-b-2 border-transparent hover:border-blue-600 transition-all duration-200">
                        Contact
                    </a>
                </div>

                <!-- Desktop Auth Buttons - Right Side -->
                <div class="hidden lg:flex lg:items-center">
                    <a href="{{ route('frontend.index') }}#contact"
                        class="inline-flex items-center px-6 py-2 text-xl font-medium text-white bg-gradient-to-r from-blue-500 to-blue-500 rounded-xl hover:from-blue-600 hover:to-blue-600 transition-all duration-300 hover-glow transform hover:scale-105 shadow-lg">
                        <i class="fas fa-clock mr-2"></i>Get Started
                    </a>
                </div>

                <!-- Mobile Get Started Button -->
                {{-- <div class="flex items-center lg:hidden btn-box">
                    <a href="/" class="inline-flex items-center px-6 py-2 text-xl font-medium text-white bg-gradient-to-r from-blue-500 to-blue-500 rounded-xl hover:from-blue-600 hover:to-blue-600 transition-all duration-300 hover-glow transform hover:scale-105 shadow-lg">
                        <i class="fas fa-clock mr-1"></i> Get Started
                    </a>
                </div> --}}
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div class="mobile-menu lg:hidden bg-white border-t border-gray-200" :class="{ 'active': showMobileNav }">
            <div class="px-4 py-4 space-y-3">
                <a href="/"
                    class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200">
                    <i class="fas fa-home mr-3 text-blue-500"></i>Home
                </a>

                <!-- Mobile Solutions -->
                <div>
                    <button @click="showMobileSolutions = !showMobileSolutions"
                        class="w-full flex items-center justify-between px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200">
                        <span>
                            <i class="fas fa-cogs mr-3 text-blue-500"></i>Solutions
                        </span>
                        <svg class="h-5 w-5 transition-transform duration-200"
                            :class="{ 'rotate-180': showMobileSolutions }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="showMobileSolutions" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-1 max-h-96"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-1 max-h-96" x-transition:leave-end="opacity-0 max-h-0"
                        class="overflow-hidden" style="display: none;">
                        <div class="pl-8 pr-4 py-3 space-y-4 border-l-2 border-blue-200 ml-4">
                            <!-- HRMS -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.solutions.hrms') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-users text-blue-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">HRMS</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">Employee
                                            Management</span>
                                        <span class="block py-1 text-sm text-gray-600">Payroll
                                            System</span>
                                        <span class="block py-1 text-sm text-gray-600">Attendance
                                            Tracking</span>
                                    </div>
                                </a>
                            </div>

                            <!-- CRM -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.solutions.crm') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-handshake text-purple-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">CRM</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">Lead
                                            Management</span>
                                        <span class="block py-1 text-sm text-gray-600">Sales
                                            Pipeline</span>
                                        <span class="block py-1 text-sm text-gray-600">Customer
                                            Support</span>
                                    </div>
                                </a>
                            </div>

                            <!-- VMS -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.solutions.vms') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-id-card text-emerald-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">VMS</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">Visitor
                                            Registration</span>
                                        <span class="block py-1 text-sm text-gray-600">Access
                                            Control</span>
                                        <span class="block py-1 text-sm text-gray-600">Digital
                                            Check-in</span>
                                    </div>
                                </a>
                            </div>
                            <!-- HIS -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.solutions.his') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-hospital-user text-red-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">HIS</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">Patient Management</span>
                                        <span class="block py-1 text-sm text-gray-600">Financial Control</span>
                                        <span class="block py-1 text-sm text-gray-600">Analytics & Reports</span>
                                    </div>
                                </a>
                            </div>
                            <!-- POS -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.solutions.pos') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-warehouse text-yellow-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">POS</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">Real-time stock control</span>
                                        <span class="block py-1 text-sm text-gray-600">Multi-Store Operation</span>
                                        <span class="block py-1 text-sm text-gray-600">Business Intelligence &
                                            Reporting</span>
                                    </div>
                                </a>
                            </div>
                            <!-- VPS -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.solutions.vps') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-square-parking text-orange-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">VPS</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">Real-Time Slots</span>
                                        <span class="block py-1 text-sm text-gray-600">License Plate Recognition</span>
                                        <span class="block py-1 text-sm text-gray-600">Digital Payments</span>
                                    </div>
                                </a>
                            </div>
                            <!-- VTS -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.solutions.vts') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-lime-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-car-on text-lime-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">VTS</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">Live GPS Tracking</span>
                                        <span class="block py-1 text-sm text-gray-600">Route History & Alerts</span>
                                        <span class="block py-1 text-sm text-gray-600">Driver Monitoring</span>
                                    </div>
                                </a>
                            </div>
                            <!-- On Demand -->
                            <div class="space-y-2" style="background: #95b8dd0a;">
                                <a href="{{ route('frontend.solutions.dds') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-bolt text-teal-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">On Demand</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">Customer Portal</span>
                                        <span class="block py-1 text-sm text-gray-600">Smart Analytics</span>
                                        <span class="block py-1 text-sm text-gray-600">Full-stack APIs</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Services -->
                <div>
                    <button @click="showMobileServices = !showMobileServices"
                        class="w-full flex items-center justify-between px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200">
                        <span>
                            <i class="fas fa-cogs mr-3 text-blue-500"></i>Solutions
                        </span>
                        <svg class="h-5 w-5 transition-transform duration-200"
                            :class="{ 'rotate-180': showMobileServices }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="showMobileServices" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-1 max-h-96"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-1 max-h-96" x-transition:leave-end="opacity-0 max-h-0"
                        class="overflow-hidden" style="display: none;">
                        <div class="pl-8 pr-4 py-3 space-y-4 border-l-2 border-blue-200 ml-4">
                            <!-- HRMS -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.services.web-devvelopment') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-laptop-code text-blue-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">Custom Web Development</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">Business Websites</span>
                                        <span class="block py-1 text-sm text-gray-600">Responsive Design</span>
                                        <span class="block py-1 text-sm text-gray-600">UI/UX Design</span>
                                    </div>
                                </a>
                            </div>

                            <!-- CRM -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.services.software-development') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-users-viewfinder text-purple-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">Custom Software Development</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">Enterprise Software</span>
                                        <span class="block py-1 text-sm text-gray-600">SaaS Products</span>
                                        <span class="block py-1 text-sm text-gray-600">AI Integration</span>
                                    </div>
                                </a>
                            </div>

                            <!-- VMS -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.services.web-app') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fa-solid fa-passport text-emerald-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">Web Application Development</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">PWA (Progressive Web
                                            Apps)</span>
                                        <span class="block py-1 text-sm text-gray-600">Data-Driven Apps</span>
                                        <span class="block py-1 text-sm text-gray-600">Business Intelligence</span>
                                    </div>
                                </a>
                            </div>

                            <!-- VMS -->
                            <div class="space-y-2">
                                <a href="{{ route('frontend.services.mobile-app') }}">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-mobile-screen-button text-red-600 text-sm"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-800">Mobile App Development</h4>
                                    </div>
                                    <div class="ml-11 space-y-1">
                                        <span class="block py-1 text-sm text-gray-600">iOS & Android Apps</span>
                                        <span class="block py-1 text-sm text-gray-600">App Store Deployment</span>
                                        <span class="block py-1 text-sm text-gray-600">GPS & Location Tracking</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('frontend.about') }}"
                    class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200">
                    <i class="fas fa-file-alt mr-3 text-blue-500"></i>About
                </a>

                <a href="{{ route('frontend.contact') }}"
                    class="block px-4 py-3 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200">
                    <i class="fas fa-newspaper mr-3 text-blue-500"></i>Contact
                </a>
            </div>
        </div>
    </nav>
</header>
