<link rel="stylesheet" href="{{ asset('css/home/portfolio.css') }}">

<!-- Premium Portfolio Section -->


<section class="section portfolio-section" id="solutions">
    <div class="portfolio-container">
        <!-- Premium Header -->
        <div class="section-header">
            <h2 class="section-title">
                {{ $portfolioContent->content_json['title'] ?? '' }}
            </h2>
            <h3 class="section-subtitle">
                {{ $portfolioContent->content_json['subtitle'] ?? '' }}
            </h3>
            <p class="section-description">
                {{ $portfolioContent->content_json['description'] ?? '' }}
            </p>
        </div>

        <!-- Portfolio Card -->
        <div class="portfolio-card">
            <!-- Main Navigation -->
            <div class="main-nav-container">
                <div class="main-nav" id="main-nav">
                    @foreach($portfolioContent->content_json['systems'] as $systemKey => $system)
                        <div class="main-nav-item {{ $loop->first ? 'active' : '' }}" data-target="{{ $systemKey }}">
                            <div class="nav-content">
                                <div class="nav-icon"><i class="{{ $system['icon'] }}"></i></div>
                                <div class="nav-title">{{ $system['title'] }}</div>
                                <div class="nav-subtitle">{{ $system['subtitle'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Content Area -->
            <div class="content-area">
                @foreach($portfolioContent->content_json['systems'] as $systemKey => $system)
                    <div class="system-content {{ $loop->first ? 'active' : '' }}" id="{{ $systemKey }}-content">
                        <div class="system-overview">
                            <h3>{{ $system['title'] }}</h3>
                            <p>{!! $system['overview'] !!}</p>
                        </div>

                        <!-- Feature Navigation -->
                        <div class="feature-nav" id="{{ $systemKey }}-nav">
                            @foreach($system['features'] as $featureKey => $feature)
                                <button class="feature-nav-item {{ $loop->first ? 'active' : '' }}" data-feature="{{ $systemKey }}-{{ $featureKey }}">
                                    <span>{{ $feature['title'] }}</span>
                                </button>
                            @endforeach
                        </div>

                        <!-- Feature Showcase -->
                        <div class="feature-showcase">
                            @foreach($system['features'] as $featureKey => $feature)
                                <div class="feature-content {{ $loop->first ? 'active' : '' }}" id="{{ $systemKey }}-{{ $featureKey }}">
                                    <div class="feature-text">
                                        <h4>{{ $feature['title'] }}</h4>
                                        <p>{!! $feature['description'] !!}</p>
                                    </div>
                                    <div class="feature-image">
                                        <img src="{{ asset($feature['image']) }}" alt="{{ $feature['image_alt'] }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
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