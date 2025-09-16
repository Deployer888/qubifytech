@extends('frontend.layouts.app')

@section('title') About - {{ config('app.name') }} @endsection

@section('content')

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'qubify-blue': '#0055A4',
                        'qubify-dark': '#1A1A1A',
                        'qubify-gray': '#F4F7FA',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'sans-serif'],
                        'serif': ['Playfair Display', 'serif'],
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out',
                        'fade-in-left': 'fadeInLeft 0.8s ease-out',
                        'fade-in-right': 'fadeInRight 0.8s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s infinite',
                    },
                    backdropBlur: {
                        'xs': '2px',
                    }
                }
            }
        }
    </script>
    
    <style>
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
        
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        
        .glassmorphic {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #0055A4, #FFF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-section {
            overflow: hidden;
            position: relative;
        }
        
        .section-observed {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        
        .section-observed.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .ripple-effect {
            position: relative;
            overflow: hidden;
            transform: translate3d(0, 0, 0);
        }
        
        .ripple-effect:before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .ripple-effect:hover:before {
            width: 300px;
            height: 300px;
        }
    </style>




    <section class="hero-section position-relative d-flex align-items-center" role="region" aria-label="Page introduction">
        <div class="hero-background position-absolute w-100 h-100" data-parallax="0.5">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='1920' height='600'%3E%3Crect width='1920' height='600' fill='%230055A4'/%3E%3C/svg%3E" 
                    alt="" 
                    loading="eager"
                    class="w-100 h-100 object-fit-cover">
        </div>
        <div class="relative z-10 text-center text-white px-4 max-w-5xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6 animate-fade-in-up">
                Made in India,<br>
                <span class="">Built for the World</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90 animate-fade-in-up animation-delay-300 max-w-3xl mx-auto">
                We're not just another software development company—we're your strategic partner in digital transformation, 
                crafting scalable, AI-powered solutions tailored to your business goals.
            </p>
            <button class="bg-light hover:bg-dark hover:text-white text-dark px-8 py-4 rounded-full text-lg font-semibold 
                        transition-all duration-300 transform hover:scale-105 hover:shadow-2xl ripple-effect animate-fade-in-up animation-delay-600">
                <i class="fas fa-rocket mr-2"></i>
                Discover Our Story
            </button>
        </div>
        <div class="scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-4" aria-hidden="true">
            <span></span>
        </div>
    </section>

    <!-- Who We Are Section -->
    <section class="py-20 bg-white section-observed">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="animate-fade-in-left">
                    <h2 class="text-4xl md:text-5xl font-serif font-bold mb-6 gradient-text">
                        Who We Are
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        Qubify Technologies Pvt. Ltd. is an India-based technology company focused on delivering custom software solutions, 
                        SaaS platforms, and AI-driven digital products that solve real business challenges.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed mb-8">
                        Our commitment to innovation, speed, and security has helped us serve clients across industries—from HR and 
                        healthcare to logistics and retail. We build what your business needs—not just what's trending.
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-qubify-blue rounded-full flex items-center justify-center">
                            <i class="fas fa-lightbulb text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-qubify-dark">Innovation First</h4>
                            <p class="text-gray-600">Cutting-edge solutions for modern challenges</p>
                        </div>
                    </div>
                </div>
                <div class="animate-fade-in-right">
                    <div class="relative">
                        <div class="glassmorphic rounded-3xl p-8 shadow-2xl">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-qubify-blue mb-2">50+</div>
                                    <div class="text-gray-600">Projects Delivered</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-qubify-blue mb-2">99%</div>
                                    <div class="text-gray-600">Client Satisfaction</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-qubify-blue mb-2">24/7</div>
                                    <div class="text-gray-600">Support Available</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-qubify-blue mb-2">5+</div>
                                    <div class="text-gray-600">Years Experience</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What We Do Section -->
    <section class="py-20 bg-qubify-gray section-observed">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-serif font-bold mb-6 gradient-text">What We Do</h2>
                <p class="text-lg text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    From high-performance enterprise software to user-centric mobile applications, we offer end-to-end development 
                    that empowers growth, efficiency, and transformation.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Service Cards -->
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-qubify-blue to-qubify-blue rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-qubify-dark">Custom Web & Mobile Apps</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Tailored applications that deliver exceptional user experiences and drive business growth.</p>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-qubify-blue to-red-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-cloud text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-qubify-dark">SaaS Product Development</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Scalable software-as-a-service solutions designed for rapid market deployment.</p>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-qubify-blue to-purple-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-qubify-dark">ERP & CRM Solutions</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Comprehensive business management systems that streamline operations.</p>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-qubify-blue rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-qubify-dark">HRMS, HIS & VMS Platforms</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Advanced management platforms for human resources and healthcare systems.</p>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-qubify-blue to-yellow-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-robot text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-qubify-dark">AI & Automation Integration</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Intelligent automation solutions that enhance efficiency and decision-making.</p>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-qubify-blue rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-shopping-cart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-qubify-dark">E-commerce Platforms</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Feature-rich online stores designed to maximize conversions and customer satisfaction.</p>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-qubify-blue to-cyan-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-code text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-qubify-dark">Cloud & API-based Architecture</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Scalable cloud solutions and robust API architectures for modern applications.</p>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-qubify-blue rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-qubify-dark">Secure, Scalable Enterprise Software</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Enterprise-grade solutions with built-in security and scalability features.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="py-20 bg-white section-observed">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Mission -->
                <div class="flex items-start space-x-6">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-qubify-blue rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">M</span>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold text-qubify-dark mb-4">Our Mission</h2>
                        <p class="text-gray-700 leading-relaxed">
                            To empower businesses with intelligent, secure, and customized technology solutions that enhance performance, 
                            streamline operations, and drive sustainable growth.
                        </p>
                    </div>
                </div>
                
                <!-- Vision -->
                <div class="flex items-start space-x-6">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-qubify-blue rounded-full flex items-center justify-center">
                            <i class="fas fa-eye text-white text-lg"></i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold text-qubify-dark mb-4">Our Vision</h2>
                        <p class="text-gray-700 leading-relaxed">
                            To be a globally recognized leader in digital innovation—helping businesses of all sizes achieve efficiency, 
                            agility, and competitive edge through custom-built, AI-powered technology.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Qubify Section -->
    <section class="py-20 bg-qubify-gray section-observed">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-serif font-bold mb-6 gradient-text">Why Qubify?</h2>
                <p class="text-lg text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    Five key pillars that set us apart in the competitive landscape of technology solutions.
                </p>
            </div>
            
            <div class="space-y-8">
                <!-- Pillar 1 -->
                <div class="flex flex-col lg:flex-row items-center bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="lg:w-1/3 mb-6 lg:mb-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-qubify-blue to-qubify-blue rounded-full flex items-center justify-center mx-auto lg:mx-0">
                            <i class="fas fa-cogs text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="lg:w-2/3">
                        <h3 class="text-2xl font-bold mb-4 text-qubify-dark">Custom-First Approach</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Every solution we deliver is purpose-built, tailored to your business needs—not a one-size-fits-all template. 
                            We understand that each business is unique and deserves a unique solution.
                        </p>
                    </div>
                </div>
                
                <!-- Pillar 2 -->
                <div class="flex flex-col lg:flex-row-reverse items-center bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="lg:w-1/3 mb-6 lg:mb-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-qubify-blue to-red-500 rounded-full flex items-center justify-center mx-auto lg:mx-0">
                            <i class="fas fa-expand-arrows-alt text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="lg:w-2/3 lg:pr-8">
                        <h3 class="text-2xl font-bold mb-4 text-qubify-dark">Scalability at Core</h3>
                        <p class="text-gray-700 leading-relaxed">
                            We build with the future in mind. Your software should grow with your business, not limit it. 
                            Our architectures are designed to handle growth seamlessly.
                        </p>
                    </div>
                </div>
                
                <!-- Pillar 3 -->
                <div class="flex flex-col lg:flex-row items-center bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="lg:w-1/3 mb-6 lg:mb-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-600 to-qubify-blue rounded-full flex items-center justify-center mx-auto lg:mx-0">
                            <i class="fas fa-brain text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="lg:w-2/3">
                        <h3 class="text-2xl font-bold mb-4 text-qubify-dark">AI & Automation Experts</h3>
                        <p class="text-gray-700 leading-relaxed">
                            We leverage intelligent automation, machine learning, and analytics to build smarter systems that 
                            learn, adapt, and optimize performance over time.
                        </p>
                    </div>
                </div>
                
                <!-- Pillar 4 -->
                <div class="flex flex-col lg:flex-row-reverse items-center bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="lg:w-1/3 mb-6 lg:mb-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-qubify-blue rounded-full flex items-center justify-center mx-auto lg:mx-0">
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="lg:w-2/3 lg:pr-8">
                        <h3 class="text-2xl font-bold mb-4 text-qubify-dark">Reliable & Secure</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Our enterprise-grade security frameworks and robust development practices ensure stability and peace of mind. 
                            Your data and systems are protected with bank-level security.
                        </p>
                    </div>
                </div>
                
                <!-- Pillar 5 -->
                <div class="flex flex-col lg:flex-row items-center bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300">
                    <div class="lg:w-1/3 mb-6 lg:mb-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-qubify-blue to-yellow-500 rounded-full flex items-center justify-center mx-auto lg:mx-0">
                            <i class="fas fa-dollar-sign text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="lg:w-2/3">
                        <h3 class="text-2xl font-bold mb-4 text-qubify-dark">Cost-Effective, High Value</h3>
                        <p class="text-gray-700 leading-relaxed">
                            We deliver innovation without the heavy price tag—quality and performance, without compromise. 
                            Premium solutions at competitive prices.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Co-Creation Process Section -->
    <section class="py-20 bg-light relative overflow-hidden section-observed">
        <div class="absolute inset-0 bg-light" style="border: 1px solid #80808024;"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-6xl font-serif font-bold mb-8">
                We Don't Just Code.<br>
                <span class="text-qubify-blue">We Co-Create.</span>
            </h2>
            <p class="text-xl md:text-2xl mb-8 opacity-90 max-w-4xl mx-auto leading-relaxed">
                Our process is collaborative from day one. We partner with clients to understand their workflows, 
                identify opportunities for improvement, and build long-term tech solutions that actually work in the real world.
            </p>
            
            <div class="grid md:grid-cols-3 gap-8 mt-16">
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Collaborate</h3>
                    <p class="opacity-80">Deep understanding of your business needs and goals</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Innovate</h3>
                    <p class="opacity-80">Creative solutions tailored to your unique challenges</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-rocket text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Execute</h3>
                    <p class="opacity-80">Deliver exceptional results that drive real business impact</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer CTA Section -->
    <section class="py-20 bg-qubify-dark text-white section-observed">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-serif font-bold mb-6">
                Ready to Transform?<br>
                <span class="text-qubify-blue" style="line-height: 1.5;">Let's Talk.</span>
            </h2>
            <p class="text-xl mb-8 opacity-90 max-w-3xl mx-auto leading-relaxed">
                Join the businesses that trust Qubify to deliver intelligent, scalable, and secure technology solutions. 
                Your transformation journey starts with a conversation.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <button class="bg-qubify-blue hover:bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold 
                            transition-all duration-300 transform hover:scale-105 hover:shadow-2xl ripple-effect">
                    <i class="fas fa-comments mr-2"></i>
                    Start Your Project
                </button>
                <button class="border-2 border-white text-white hover:bg-white hover:text-qubify-dark px-8 py-4 rounded-full text-lg font-semibold 
                            transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-calendar mr-2"></i>
                    Schedule Consultation
                </button>
            </div>
        </div>
    </section>

    <!-- JavaScript for Animations and Interactions -->
    <script>
        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('.section-observed').forEach(section => {
            observer.observe(section);
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

        // Add ripple effect to buttons
        document.querySelectorAll('.ripple-effect').forEach(button => {
            button.addEventListener('click', function(e) {
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

        // Parallax effect for hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.hero-gradient');
            if (parallax) {
                const speed = scrolled * 0.5;
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });

        // Dynamic navbar background on scroll
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('bg-white/95');
                nav.classList.remove('bg-white/90');
            } else {
                nav.classList.add('bg-white/90');
                nav.classList.remove('bg-white/95');
            }
        });

        // Counter animation for stats
        function animateCounters() {
            const counters = document.querySelectorAll('.text-3xl.font-bold');
            
            counters.forEach(counter => {
                const target = parseInt(counter.textContent);
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counter.textContent = Math.floor(current) + (counter.textContent.includes('%') ? '%' : '+');
                }, 20);
            });
        }

        // Trigger counter animation when stats section comes into view
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        const statsSection = document.querySelector('.glassmorphic');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    </script>

@endsection
