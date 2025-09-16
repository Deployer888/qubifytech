<link rel="stylesheet" href="{{ asset('css/home/portfolio.css') }}">

<!-- Premium Portfolio Section -->
<section class="section portfolio-section" id="solutions">
    <div class="portfolio-container">
        <!-- Premium Header -->
        <div class="section-header">
            <h2 class="section-title">
                {{ $portfolioContent->content_json['title'] ?? 'Our Innovations in Action' }}
            </h2>
            <h3 class="section-subtitle">
                {{ $portfolioContent->content_json['subtitle'] ?? 'Built by Qubify. Powering the Real World.' }}
            </h3>
            <p class="section-description">
                {{ $portfolioContent->content_json['description'] ?? 'From smart cities to retail floors, our in-house platforms are transforming how industries operate, scale, and innovate. These aren\'t just solutions — they\'re living proof of what we do best.' }}
            </p>
        </div>

        <!-- Luxury Portfolio Card -->
        <div class="portfolio-card">
            <!-- Premium Main Navigation -->
            <div class="main-nav-container">
                <div class="main-nav" id="main-nav">
                    <div class="main-nav-item active" data-target="hrms">
                        <div class="nav-content">
                            <div class="nav-icon"><i class="fas fa-users"></i></div>
                            <div class="nav-title">HRMS</div>
                            <div class="nav-subtitle">Human Resource Management System</div>
                        </div>
                    </div>
                    <div class="main-nav-item" data-target="crm">
                        <div class="nav-content">
                            <div class="nav-icon"><i class="fas fa-handshake"></i></div>
                            <div class="nav-title">CRM</div>
                            <div class="nav-subtitle">Customer Relationship Management</div>
                        </div>
                    </div>
                    <div class="main-nav-item" data-target="vms">
                        <div class="nav-content">
                            <div class="nav-icon"><i class="fas fa-id-card"></i></div>
                            <div class="nav-title">VMS</div>
                            <div class="nav-subtitle">Visitor Management System</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Elegant Content Area -->
            <div class="content-area">
                <!-- HRMS Content -->
                <div class="system-content active" id="hrms-content">
                    <div class="system-overview">
                        <h3>Human Resource Management System</h3>
                        <p>Transform your HR operations with our comprehensive HRMS solution. Streamline recruitment, payroll processing, attendance tracking, and performance management with intelligent automation, advanced analytics, and seamless integration capabilities that scale with your organization's growth.</p>
                    </div>

                    <!-- Premium Feature Navigation -->
                    <div class="feature-nav" id="hrms-nav">
                        <button class="feature-nav-item active" data-feature="employee-mgmt">
                            <span>Employee Management</span>
                        </button>
                        <button class="feature-nav-item" data-feature="payroll">
                            <span>Payroll Processing</span>
                        </button>
                        <button class="feature-nav-item" data-feature="attendance">
                            <span>Attendance Tracking</span>
                        </button>
                        <button class="feature-nav-item" data-feature="performance">
                            <span>Performance Analytics</span>
                        </button>
                    </div>

                    <!-- Luxury Feature Showcase -->
                    <div class="feature-showcase">
                        <div class="feature-content active" id="employee-mgmt">
                            <div class="feature-text">
                                <h4>Employee Management</h4>
                                <p>Complete employee lifecycle management from onboarding to offboarding. Manage personal profiles, organizational hierarchy, role assignments, and career progression. Features include automated workflows, document management, skill tracking, and comprehensive employee databases with advanced search and filtering capabilities.</p>
                            </div>
                            <div class="feature-image">
                                <img src="{{ asset('images/hrms/Qubify-HRMS-Active-Employees.png') }}" alt="Employee Management Dashboard">
                            </div>
                        </div>

                        <div class="feature-content" id="payroll">
                            <div class="feature-text">
                                <h4>Payroll Processing</h4>
                                <p>Automated payroll system with tax calculations, statutory compliance, and multi-currency support. Process salaries, bonuses, deductions, and benefits with complete accuracy. Generate detailed payslips, handle complex salary structures, and maintain comprehensive audit trails for financial compliance.</p>
                            </div>
                            <div class="feature-image">
                                <img src="{{ asset('images/hrms/Qubify-HRMS-PAYROLL.png') }}" alt="Payroll Processing System">
                            </div>
                        </div>

                        <div class="feature-content" id="attendance">
                            <div class="feature-text">
                                <h4>Attendance Tracking</h4>
                                <p>Real-time attendance monitoring with biometric integration, GPS tracking, and mobile check-ins. Manage shifts, leaves, overtime calculations, and generate detailed reports. Features include automated notifications, flexible work arrangements, and comprehensive time analytics for workforce optimization.</p>
                            </div>
                            <div class="feature-image">
                                <img src="{{ asset('images/hrms/Qubify-HRMS-Manage-Attendance.png') }}" alt="Attendance Tracking Interface">
                            </div>
                        </div>

                        <div class="feature-content" id="performance">
                            <div class="feature-text">
                                <h4>Performance Analytics</h4>
                                <p>Advanced performance management with goal setting, regular reviews, and 360-degree feedback. Track KPIs, generate performance reports, and identify top performers. Includes predictive analytics, skill gap analysis, and personalized development recommendations for enhanced workforce productivity.</p>
                            </div>
                            <div class="feature-image">
                                <img src="{{ asset('images/hrms/image.png') }}" alt="Performance Analytics Dashboard">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CRM Content -->
                <div class="system-content" id="crm-content">
                    <div class="system-overview">
                        <h3>Customer Relationship Management</h3>
                        <p>Revolutionize your customer interactions with our intelligent CRM platform. Manage leads, track sales pipelines, automate marketing campaigns, and deliver exceptional customer service with powerful analytics, AI-driven insights, and seamless integration across all customer touchpoints.</p>
                    </div>

                    <!-- Premium Feature Navigation -->
                    <div class="feature-nav" id="crm-nav">
                        <button class="feature-nav-item active" data-feature="lead-mgmt">
                            <span>Lead Management</span>
                        </button>
                        <button class="feature-nav-item" data-feature="sales-pipeline">
                            <span>Sales Pipeline</span>
                        </button>
                        <button class="feature-nav-item" data-feature="customer-service">
                            <span>Customer Service</span>
                        </button>
                        <button class="feature-nav-item" data-feature="marketing-automation">
                            <span>Marketing Automation</span>
                        </button>
                    </div>

                    <!-- Luxury Feature Showcase -->
                    <div class="feature-showcase">
                        <div class="feature-content active" id="lead-mgmt">
                            <div class="feature-text">
                                <h4>Lead Management</h4>
                                <p>Capture, qualify, and nurture leads through intelligent lead scoring and automated workflows. Track lead sources, manage contact information, and convert prospects into customers with personalized engagement strategies. Features include lead assignment, follow-up reminders, and comprehensive lead analytics.</p>
                            </div>
                            <div class="feature-image">
                                <img src="{{asset('images/crm/Leads-CRM.png')}}" alt="Lead Management Interface">
                            </div>
                        </div>

                        <div class="feature-content" id="sales-pipeline">
                            <div class="feature-text">
                                <h4>Sales Pipeline</h4>
                                <p>Visualize and manage your entire sales process with customizable pipeline stages. Track deals, forecast revenue, and identify bottlenecks with real-time analytics. Includes opportunity management, sales forecasting, and automated follow-ups to maximize conversion rates and accelerate deal closure.</p>
                            </div>
                            <div class="feature-image">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&fit=crop" alt="Sales Pipeline Dashboard">
                            </div>
                        </div>

                        <div class="feature-content" id="customer-service">
                            <div class="feature-text">
                                <h4>Customer Service</h4>
                                <p>Deliver exceptional customer support with integrated ticketing, knowledge base, and multi-channel communication. Manage customer inquiries, track resolution times, and maintain service quality with automated workflows, escalation rules, and comprehensive customer interaction history.</p>
                            </div>
                            <div class="feature-image">
                                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&h=600&fit=crop" alt="Customer Service Platform">
                            </div>
                        </div>

                        <div class="feature-content" id="marketing-automation">
                            <div class="feature-text">
                                <h4>Marketing Automation</h4>
                                <p>Create sophisticated marketing campaigns with email automation, social media integration, and personalized content delivery. Track campaign performance, segment audiences, and nurture leads with targeted messaging. Includes A/B testing, behavioral triggers, and comprehensive marketing analytics.</p>
                            </div>
                            <div class="feature-image">
                                <img src="https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?w=800&h=600&fit=crop" alt="Marketing Automation Dashboard">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- VMS Content -->
                <div class="system-content" id="vms-content">
                    <div class="system-overview">
                        <h3>Visitor Management System</h3>
                        <p>Enhance security and streamline visitor experiences with our advanced VMS platform. Manage visitor registration, access control, and compliance tracking with contactless check-ins, real-time notifications, and comprehensive visitor analytics for complete facility management.</p>
                    </div>

                    <!-- Premium Feature Navigation -->
                    <div class="feature-nav" id="vms-nav">
                        <button class="feature-nav-item active" data-feature="visitor-registration">
                            <span>Visitor Registration</span>
                        </button>
                        <button class="feature-nav-item" data-feature="access-control">
                            <span>Access Control</span>
                        </button>
                        <button class="feature-nav-item" data-feature="digital-checkin">
                            <span>Digital Check-in</span>
                        </button>
                        <button class="feature-nav-item" data-feature="security-monitoring">
                            <span>Security Monitoring</span>
                        </button>
                    </div>

                    <!-- Luxury Feature Showcase -->
                    <div class="feature-showcase">
                        <div class="feature-content active" id="visitor-registration">
                            <div class="feature-text">
                                <h4>Visitor Registration</h4>
                                <p>Streamline visitor registration with digital forms, pre-registration capabilities, and automated host notifications. Capture visitor information, purpose of visit, and generate digital badges instantly. Features include photo capture, document verification, and visitor history tracking for enhanced security.</p>
                            </div>
                            <div class="feature-image">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&h=600&fit=crop" alt="Visitor Registration Interface">
                            </div>
                        </div>

                        <div class="feature-content" id="access-control">
                            <div class="feature-text">
                                <h4>Access Control</h4>
                                <p>Implement sophisticated access control with zone-based permissions, time-restricted access, and real-time monitoring. Integrate with existing security systems, manage visitor credentials, and track movement throughout facilities with automated alerts for unauthorized access attempts.</p>
                            </div>
                            <div class="feature-image">
                                <img src="https://images.unsplash.com/photo-1586953208448-b95a79798f07?w=800&h=600&fit=crop" alt="Access Control System">
                            </div>
                        </div>

                        <div class="feature-content" id="digital-checkin">
                            <div class="feature-text">
                                <h4>Digital Check-in</h4>
                                <p>Enable contactless visitor experiences with QR code check-ins, mobile app integration, and self-service kiosks. Automate badge printing, host notifications, and visitor tracking with touchless technology that ensures health compliance and enhances visitor satisfaction.</p>
                            </div>
                            <div class="feature-image">
                                <img src="https://images.unsplash.com/photo-1556075798-4825dfaaf498?w=800&h=600&fit=crop" alt="Digital Check-in Kiosk">
                            </div>
                        </div>

                        <div class="feature-content" id="security-monitoring">
                            <div class="feature-text">
                                <h4>Security Monitoring</h4>
                                <p>Comprehensive security oversight with real-time visitor tracking, automated alerts, and incident management. Monitor facility access, generate security reports, and maintain compliance with visitor logs, evacuation lists, and emergency response protocols for complete facility security.</p>
                            </div>
                            <div class="feature-image">
                                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=600&fit=crop" alt="Security Monitoring Dashboard">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Portfolio Section Isolated JavaScript - No conflicts with other sections
    (function() {
        'use strict';
        
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initPortfolioTabs);
        } else {
            initPortfolioTabs();
        }
        
        function initPortfolioTabs() {
            // Only target elements within the portfolio section
            const portfolioSection = document.querySelector('.portfolio-section');
            if (!portfolioSection) return;
            
            // System navigation (HRMS, CRM, VMS)
            const mainNavItems = portfolioSection.querySelectorAll('.main-nav-item');
            const systemContents = portfolioSection.querySelectorAll('.system-content');

            mainNavItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const targetSystem = this.getAttribute('data-target');
                    console.log('Switching to system:', targetSystem);
                    
                    // Update active nav item
                    mainNavItems.forEach(nav => nav.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Show target content
                    systemContents.forEach(content => content.classList.remove('active'));
                    
                    const targetContent = portfolioSection.querySelector('#' + targetSystem + '-content');
                    if (targetContent) {
                        targetContent.classList.add('active');
                        console.log('Activated system content:', targetSystem);
                    }
                });
            });

            // Feature navigation within each system
            setupSystemFeatures('hrms');
            setupSystemFeatures('crm');
            setupSystemFeatures('vms');
            
            function setupSystemFeatures(systemId) {
                const systemContent = portfolioSection.querySelector('#' + systemId + '-content');
                if (!systemContent) return;
                
                const featureNavItems = systemContent.querySelectorAll('.feature-nav-item');
                const featureContents = systemContent.querySelectorAll('.feature-content');

                featureNavItems.forEach(item => {
                    item.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        const targetFeature = this.getAttribute('data-feature');
                        console.log('Switching to feature:', targetFeature, 'in system:', systemId);
                        
                        // Remove active class from all nav items in this system
                        featureNavItems.forEach(nav => nav.classList.remove('active'));
                        this.classList.add('active');
                        
                        // Remove active class from all feature contents in this system
                        featureContents.forEach(content => content.classList.remove('active'));
                        
                        // Show target feature content
                        const targetFeatureContent = systemContent.querySelector('#' + targetFeature);
                        if (targetFeatureContent) {
                            targetFeatureContent.classList.add('active');
                            console.log('Activated feature content:', targetFeature);
                        }
                    });
                });
            }

            // Add entrance animations (optional)
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe elements for animations within portfolio section only
            portfolioSection.querySelectorAll('.main-nav-item, .system-overview, .feature-showcase').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(40px)';
                el.style.transition = 'opacity 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275), transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                observer.observe(el);
            });

            // Add staggered animation to main nav items
            const mainNavs = portfolioSection.querySelectorAll('.main-nav-item');
            mainNavs.forEach((item, index) => {
                item.style.animationDelay = `${index * 0.1}s`;
            });
            
            console.log('Portfolio tabs initialized successfully');
        }
    })();
</script>