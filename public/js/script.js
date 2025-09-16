
// ============================================
// REAL-TIME DASHBOARD SIMULATION
// ============================================
function simulateRealTimeActivity() {
    const activities = [
        { name: "Alex Chen", action: "Checked out • Duration: 3h 25m", initials: "AC" },
        { name: "Emma Thompson", action: "Temperature check passed • Main entrance", initials: "ET" },
        { name: "Michael Rodriguez", action: "VIP guest arrival • CEO meeting scheduled", initials: "MR" },
        { name: "Amanda Foster", action: "Contractor access approved • IT department", initials: "AF" },
        { name: "David Kim", action: "Emergency contact updated • Profile synchronized", initials: "DK" },
        { name: "Sarah Johnson", action: "Facial recognition verified • Executive floor", initials: "SJ" },
        { name: "Robert Wilson", action: "QR code scan successful • Conference room B", initials: "RW" },
        { name: "Lisa Park", action: "Visitor badge printed • HR appointment", initials: "LP" }
    ];
    
    const activityList = document.querySelector('.activity-list-mini');
    if (!activityList) return;
    
    setInterval(() => {
        const randomActivity = activities[Math.floor(Math.random() * activities.length)];
        const activityItems = activityList.querySelectorAll('.activity-item-mini');
        
        // Create new activity item
        const newItem = document.createElement('div');
        newItem.className = 'activity-item-mini';
        newItem.style.opacity = '0';
        newItem.style.transform = 'translateY(-20px)';
        newItem.innerHTML = `
            <div class="activity-dot-mini"></div>
            <span>${randomActivity.name} - ${randomActivity.action}</span>
        `;
        
        // Add to top of list
        if (activityItems.length > 0) {
            activityList.insertBefore(newItem, activityItems[0]);
        } else {
            activityList.appendChild(newItem);
        }
        
        // Animate in
        setTimeout(() => {
            newItem.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            newItem.style.opacity = '1';
            newItem.style.transform = 'translateY(0)';
        }, 50);
        
        // Remove excess items (keep only 3)
        const allItems = activityList.querySelectorAll('.activity-item-mini');
        if (allItems.length > 3) {
            const lastItem = allItems[allItems.length - 1];
            lastItem.style.opacity = '0';
            lastItem.style.transform = 'translateX(20px)';
            setTimeout(() => {
                if (activityList.contains(lastItem)) {
                    activityList.removeChild(lastItem);
                }
            }, 300);
        }
    }, 6000);
}

// ============================================
// REAL-TIME COUNTER UPDATES
// ============================================
function simulateRealTimeCounters() {
    const miniStatNumbers = document.querySelectorAll('.mini-stat-number');
    if (miniStatNumbers.length === 0) return;
    
    const visitorsCounter = miniStatNumbers[0]; // Assuming first is visitors
    let currentCount = parseInt(visitorsCounter.textContent.replace(/,/g, ''));
    
    setInterval(() => {
        const change = Math.floor(Math.random() * 5) - 2; // -2 to +2
        currentCount = Math.max(0, currentCount + change);
        visitorsCounter.textContent = currentCount.toLocaleString();
        
        // Add visual feedback for changes
        if (change !== 0) {
            visitorsCounter.style.color = change > 0 ? '#28CA42' : '#FF5F57';
            visitorsCounter.style.transform = 'scale(1.1)';
            
            setTimeout(() => {
                visitorsCounter.style.color = '';
                visitorsCounter.style.transform = '';
            }, 500);
        }
    }, 8000);
}

// ============================================
// PREMIUM INTERACTIVE ELEMENTS
// ============================================
function initInteractiveElements() {
    // Enhanced hover effects for mini stats
    const miniStats = document.querySelectorAll('.mini-stat');
    miniStats.forEach(stat => {
        stat.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.02)';
            this.style.boxShadow = '0 15px 35px rgba(0, 102, 255, 0.15)';
        });
        
        stat.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });

    // Interactive chart bars
    const chartBars = document.querySelectorAll('.mini-bar');
    chartBars.forEach((bar, index) => {
        bar.addEventListener('mouseenter', function() {
            this.style.background = 'linear-gradient(135deg, #004BD9 0%, #0066FF 100%)';
            this.style.transform = 'scaleY(1.1)';
            
            // Show tooltip effect
            const tooltip = document.createElement('div');
            tooltip.textContent = `${Math.floor(Math.random() * 300) + 100} visitors`;
            tooltip.style.cssText = `
                position: absolute;
                top: -35px;
                left: 50%;
                transform: translateX(-50%);
                background: var(--pure-black);
                color: var(--pure-white);
                padding: 6px 12px;
                border-radius: 6px;
                font-size: 12px;
                font-weight: 600;
                white-space: nowrap;
                z-index: 100;
            `;
            this.style.position = 'relative';
            this.appendChild(tooltip);
        });
        
        bar.addEventListener('mouseleave', function() {
            this.style.background = '';
            this.style.transform = '';
            const tooltip = this.querySelector('div');
            if (tooltip) {
                this.removeChild(tooltip);
            }
        });
    });

    // Floating badge interaction
    const floatingBadge = document.querySelector('.floating-security-badge');
    if (floatingBadge) {
        floatingBadge.addEventListener('click', function() {
            showPremiumNotification('🔒 Bank-level security verified! Your data is protected with enterprise-grade encryption.', 'success');
            
            // Add click animation
            this.style.animation = 'none';
            setTimeout(() => {
                this.style.animation = 'floatBadge 4s ease-in-out infinite';
            }, 50);
        });
    }
}

// ============================================
// PREMIUM PARTICLE SYSTEM
// ============================================
function enhanceParticleSystem() {
    const particles = document.querySelectorAll('.particle');
    
    particles.forEach((particle, index) => {
        // Random properties for each particle
        const randomSize = Math.random() * 4 + 2;
        const randomOpacity = Math.random() * 0.6 + 0.4;
        const randomDuration = Math.random() * 4 + 6;
        
        particle.style.width = randomSize + 'px';
        particle.style.height = randomSize + 'px';
        particle.style.opacity = randomOpacity;
        particle.style.animationDuration = randomDuration + 's';
        
        // Add glow effect
        particle.style.boxShadow = `0 0 ${randomSize * 3}px var(--accent-aqua)`;
    });
}

// ============================================
// PREMIUM SCROLL EFFECTS
// ============================================
function initAdvancedScrollEffects() {
    let ticking = false;
    
    function updateScrollEffects() {
        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;
        const scrollPercent = scrollY / (documentHeight - windowHeight);
        
        // Update scroll indicator opacity
        const scrollIndicator = document.querySelector('.scroll-indicator');
        if (scrollIndicator) {
            const opacity = Math.max(0, 1 - (scrollY / windowHeight) * 2);
            scrollIndicator.style.opacity = opacity;
        }
        
        // Parallax effect for hero content
        const heroContent = document.querySelector('.hero-content');
        if (heroContent && scrollY < windowHeight) {
            const parallaxY = scrollY * 0.3;
            heroContent.style.transform = `translateY(${parallaxY}px)`;
        }
        
        // Scale effect for dashboard preview
        const dashboardPreview = document.querySelector('.dashboard-preview');
        if (dashboardPreview && scrollY < windowHeight) {
            const scale = Math.max(0.9, 1 - (scrollY / windowHeight) * 0.1);
            dashboardPreview.style.transform = `scale(${scale})`;
        }
        
        ticking = false;
    }
    
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateScrollEffects);
            ticking = true;
        }
    }
    
    window.addEventListener('scroll', requestTick);
}

// ============================================
// PREMIUM BUTTON EFFECTS
// ============================================
function initPremiumButtonEffects() {
    const buttons = document.querySelectorAll('.btn-premium, .btn-primary-hero, .btn-secondary-hero, .btn-off-canvas');
    
    buttons.forEach(button => {
        // Ripple effect
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => {
                if (this.contains(ripple)) {
                    this.removeChild(ripple);
                }
            }, 600);
        });
        
        // Magnetic effect for desktop
        if (window.innerWidth > 768) {
            button.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                
                this.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px)`;
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        }
    });
    
    // Add ripple animation keyframes
    if (!document.querySelector('#ripple-animation')) {
        const style = document.createElement('style');
        style.id = 'ripple-animation';
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }
}

// ============================================
// PREMIUM PERFORMANCE OPTIMIZATIONS
// ============================================
function optimizePerformance() {
    // Lazy load heavy animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Start heavy animations only when visible
                if (entry.target.classList.contains('chart-bars-mini')) {
                    const bars = entry.target.querySelectorAll('.mini-bar');
                    bars.forEach((bar, index) => {
                        setTimeout(() => {
                            bar.style.animation = `growBar 1.5s cubic-bezier(0.4, 0, 0.2, 1) forwards`;
                        }, index * 100);
                    });
                }
                
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    // Observe heavy animation elements
    const heavyElements = document.querySelectorAll('.chart-bars-mini');
    heavyElements.forEach(el => observer.observe(el));
    
    // Debounced resize handler
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            // Recalculate animations on resize
            const particles = document.querySelectorAll('.particle');
            particles.forEach(particle => {
                particle.style.animation = 'none';
                setTimeout(() => {
                    particle.style.animation = '';
                }, 50);
            });
        }, 250);
    });
}

// ============================================
// INITIALIZE ALL PREMIUM ANIMATIONS
// ============================================
function initPremiumAnimations() {
    setTimeout(() => animateCounters(), 800);
    setTimeout(() => simulateRealTimeActivity(), 2000);
    setTimeout(() => simulateRealTimeCounters(), 3000);
    
    initInteractiveElements();
    enhanceParticleSystem();
    initAdvancedScrollEffects();
    initPremiumButtonEffects();
    optimizePerformance();
}

// ============================================
// ACCESSIBILITY ENHANCEMENTS
// ============================================
function initAccessibility() {
    // Focus management for off-canvas menu
    const offCanvasMenu = document.getElementById('offCanvasMenu');
    const menuToggle = document.getElementById('menuToggle');
    
    if (offCanvasMenu && menuToggle) {
        menuToggle.setAttribute('aria-label', 'Open navigation menu');
        menuToggle.setAttribute('aria-expanded', 'false');
        
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const isOpen = offCanvasMenu.classList.contains('active');
                    menuToggle.setAttribute('aria-expanded', isOpen.toString());
                    
                    if (isOpen) {
                        // Focus first link when menu opens
                        const firstLink = offCanvasMenu.querySelector('.off-canvas-link');
                        if (firstLink) {
                            setTimeout(() => firstLink.focus(), 300);
                        }
                    }
                }
            });
        });
        
        observer.observe(offCanvasMenu, { attributes: true });
    }
    
    // Reduced motion support
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.documentElement.style.setProperty('--animation-duration', '0s');
        const style = document.createElement('style');
        style.textContent = `
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        `;
        document.head.appendChild(style);
    }
}

// ============================================
// INITIALIZE EVERYTHING ON DOM READY
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    initAccessibility();
    
    // Add smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                const offsetTop = target.offsetTop - 100; // Account for fixed navbar
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});

// ============================================
// ERROR HANDLING & FALLBACKS
// ============================================
window.addEventListener('error', function(e) {
    console.warn('VMS: Non-critical error handled:', e.error);
    // Graceful degradation - continue without advanced animations if needed
});

// ============================================
// EXPORT FOR MODULAR USAGE (IF NEEDED)
// ============================================
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initPremiumAnimations,
        showPremiumNotification,
        animateCounters
    };
}
// God-Level Interactive Functionality
// ============================================

// ============================================
// PREMIUM PAGE LOADING ANIMATION
// ============================================
window.addEventListener('load', function() {
    setTimeout(function() {
        const loadingOverlay = document.getElementById('loadingOverlay');
        loadingOverlay.classList.add('fade-out');
        
        // Initialize premium animations after loading
        setTimeout(() => {
            initPremiumAnimations();
            initScrollAnimations();
        }, 300);
    }, 1500);
});

// ============================================
// PREMIUM NAVBAR SCROLL EFFECTS
// ============================================
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('mainNavbar');
    const scrollY = window.scrollY;
    
    if (scrollY > 100) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    
    // Parallax effect for floating elements
    const floatingElements = document.querySelectorAll('.floating-security-badge');
    floatingElements.forEach(element => {
        const speed = scrollY * 0.2;
        element.style.transform = `translateY(${speed}px) rotate(${speed * 0.1}deg)`;
    });
});

// ============================================
// OFF-CANVAS MENU FUNCTIONALITY
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const offCanvasMenu = document.getElementById('offCanvasMenu');
    const offCanvasOverlay = document.getElementById('offCanvasOverlay');
    const offCanvasClose = document.getElementById('offCanvasClose');
    const offCanvasLinks = document.querySelectorAll('.off-canvas-link');

    // Open off-canvas menu
    function openOffCanvas() {
        offCanvasMenu.classList.add('active');
        offCanvasOverlay.classList.add('active');
        menuToggle.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        // Reset and trigger animations
        const links = document.querySelectorAll('.off-canvas-link');
        links.forEach((link, index) => {
            link.style.animation = 'none';
            setTimeout(() => {
                link.style.animation = `slideInMenu 0.6s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s forwards`;
            }, 50);
        });
    }

    // Close off-canvas menu
    function closeOffCanvas() {
        offCanvasMenu.classList.remove('active');
        offCanvasOverlay.classList.remove('active');
        menuToggle.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Event listeners
    if (menuToggle) {
        menuToggle.addEventListener('click', openOffCanvas);
    }
    
    if (offCanvasClose) {
        offCanvasClose.addEventListener('click', closeOffCanvas);
    }
    
    if (offCanvasOverlay) {
        offCanvasOverlay.addEventListener('click', closeOffCanvas);
    }

    // Close menu when clicking on links
    offCanvasLinks.forEach(link => {
        link.addEventListener('click', function() {
            closeOffCanvas();
            // Smooth scroll to target
            const target = this.getAttribute('href');
            if (target.startsWith('#')) {
                const targetElement = document.querySelector(target);
                if (targetElement) {
                    setTimeout(() => {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 300);
                }
            }
        });
    });

    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && offCanvasMenu.classList.contains('active')) {
            closeOffCanvas();
        }
    });
});

// ============================================
// PREMIUM COUNTER ANIMATIONS
// ============================================
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number');
    
    counters.forEach(counter => {
        const target = parseFloat(counter.getAttribute('data-target'));
        const isDecimal = target % 1 !== 0;
        let count = 0;
        const increment = target / 120;
        const duration = 2000;
        const stepTime = duration / 120;
        
        const timer = setInterval(() => {
            count += increment;
            if (count >= target) {
                if (isDecimal) {
                    counter.textContent = target.toFixed(1);
                } else {
                    counter.textContent = target.toLocaleString();
                }
                clearInterval(timer);
            } else {
                if (isDecimal) {
                    counter.textContent = count.toFixed(1);
                } else {
                    counter.textContent = Math.floor(count).toLocaleString();
                }
            }
        }, stepTime);
    });
}

// ============================================
// PREMIUM SCROLL ANIMATIONS
// ============================================
function initScrollAnimations() {
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -100px 0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Zoom animations
                if (entry.target.classList.contains('animate-zoom-in')) {
                    entry.target.style.animation = 'zoomIn 1.2s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                }
                
                // Scale animations
                if (entry.target.classList.contains('scale-on-scroll')) {
                    entry.target.classList.add('animate-in');
                }
                
                // Fade animations
                if (entry.target.classList.contains('animate-on-scroll')) {
                    entry.target.classList.add('animate-in');
                }
                
                // Custom animations for specific elements
                if (entry.target.classList.contains('mini-bar')) {
                    entry.target.style.animation = 'growBar 1.5s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                }
            }
        });
    }, observerOptions);

    // Observe elements for scroll animations
    const elementsToObserve = document.querySelectorAll(
        '.animate-on-scroll, .scale-on-scroll, .animate-zoom-in, .mini-bar'
    );
    elementsToObserve.forEach(el => observer.observe(el));
}

// ============================================
// PREMIUM CTA INTERACTIONS
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    const scheduleDemoBtn = document.getElementById('scheduleDemoBtn');
    const howItWorksBtn = document.getElementById('howItWorksBtn');
    
    if (scheduleDemoBtn) {
        scheduleDemoBtn.addEventListener('click', function(e) {
            e.preventDefault();
            showPremiumNotification('🚀 Demo scheduling would open here! Premium feature activated.', 'success');
            
            // Add click effect
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    }
    
    if (howItWorksBtn) {
        howItWorksBtn.addEventListener('click', function(e) {
            e.preventDefault();
            showPremiumNotification('🎥 Product tour would start here! Interactive demo loading...', 'info');
            
            // Add click effect
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    }
});

// ============================================
// PREMIUM NOTIFICATION SYSTEM
// ============================================
function showPremiumNotification(message, type = 'success') {
    const notification = document.createElement('div');
    
    const colors = {
        success: 'linear-gradient(135deg, #0066FF 0%, #00E5FF 100%)',
        info: 'linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%)',
        warning: 'linear-gradient(135deg, #F59E0B 0%, #EAB308 100%)',
        error: 'linear-gradient(135deg, #EF4444 0%, #DC2626 100%)'
    };
    
    notification.style.cssText = `
        position: fixed;
        top: 30px;
        right: 30px;
        background: ${colors[type]};
        color: white;
        padding: 20px 32px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 16px;
        font-family: "Urbanist", sans-serif;
        z-index: 10000;
        box-shadow: 0 20px 40px rgba(0, 102, 255, 0.3);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transform: translateX(400px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        max-width: 400px;
        cursor: pointer;
    `;
    
    notification.textContent = message;
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Auto remove
    setTimeout(() => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 400);
    }, 5000);
    
    // Click to dismiss
    notification.addEventListener('click', function() {
        this.style.transform = 'translateX(400px)';
        setTimeout(() => {
            if (document.body.contains(this)) {
                document.body.removeChild(this);
            }
        }, 400);
    });
}

// ============================================
// CORE FEATURES & INDUSTRY SECTIONS JAVASCRIPT
// ============================================

// ============================================
// ENHANCED ANIMATIONS FOR CORE FEATURES
// ============================================
function initCoreFeatureAnimations() {
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -100px 0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Feature block animations
                if (entry.target.classList.contains('feature-block')) {
                    const featureContent = entry.target.querySelector('.feature-content');
                    const featureVisual = entry.target.querySelector('.feature-visual');
                    
                    if (featureContent) {
                        featureContent.style.animation = 'slideInLeft 1s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                    }
                    
                    if (featureVisual) {
                        setTimeout(() => {
                            featureVisual.style.animation = 'slideInRight 1s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                        }, 200);
                    }
                }
                
                // Visual card hover effects
                if (entry.target.classList.contains('visual-card')) {
                    entry.target.style.animation = 'cardReveal 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards';
                    
                    // Trigger specific card animations
                    setTimeout(() => {
                        triggerCardSpecificAnimations(entry.target);
                    }, 500);
                }
                
                // Industry card animations
                if (entry.target.classList.contains('industry-card')) {
                    const delay = entry.target.style.animationDelay || '0s';
                    entry.target.style.animation = `cardSlideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) ${delay} forwards`;
                }
            }
        });
    }, observerOptions);

    // Observe elements
    const elementsToObserve = document.querySelectorAll(
        '.feature-block, .visual-card, .industry-card'
    );
    elementsToObserve.forEach(el => observer.observe(el));

    // Add CSS animations
    addCoreFeatureAnimationStyles();
}

// ============================================
// CARD-SPECIFIC ANIMATIONS
// ============================================
function triggerCardSpecificAnimations(card) {
    const cardTitle = card.querySelector('.card-title');
    if (!cardTitle) return;
    
    const cardType = cardTitle.textContent.toLowerCase();
    
    switch (cardType) {
        case 'admin panel':
            animateLoginForm(card);
            break;
        case 'aadhaar verification':
            animateAadhaarFlow(card);
            break;
        case 'visitor dashboard':
            animateVisitorList(card);
            break;
        case 'face recognition':
            animateFaceScanner(card);
            break;
        case 'digital invite':
            animateInvitePreview(card);
            break;
    }
}

// ============================================
// LOGIN FORM ANIMATION
// ============================================
function animateLoginForm(card) {
    const inputFields = card.querySelectorAll('.input-field');
    const loginButton = card.querySelector('.login-button');
    
    inputFields.forEach((field, index) => {
        setTimeout(() => {
            field.style.animation = 'inputFocus 0.6s ease forwards';
            field.addEventListener('mouseenter', () => {
                field.style.transform = 'scale(1.02)';
                field.style.boxShadow = '0 4px 15px rgba(0, 102, 255, 0.2)';
            });
            field.addEventListener('mouseleave', () => {
                field.style.transform = '';
                field.style.boxShadow = '';
            });
        }, index * 200);
    });
    
    if (loginButton) {
        setTimeout(() => {
            loginButton.style.animation = 'buttonGlow 1s ease infinite alternate';
        }, 800);
        
        loginButton.addEventListener('click', () => {
            const loader = loginButton.querySelector('.button-loader');
            if (loader) {
                loader.style.opacity = '1';
                setTimeout(() => {
                    showMiniNotification('Login Successful!', 'success');
                    loader.style.opacity = '0';
                }, 2000);
            }
        });
    }
}

// ============================================
// AADHAAR VERIFICATION ANIMATION
// ============================================
function animateAadhaarFlow(card) {
    const formSteps = card.querySelectorAll('.form-step');
    const verificationStatus = card.querySelector('.verification-status');
    
    // Animate steps sequentially
    formSteps.forEach((step, index) => {
        setTimeout(() => {
            step.classList.add('active');
            step.style.animation = 'stepActivate 0.6s ease forwards';
            
            if (index === formSteps.length - 1 && verificationStatus) {
                setTimeout(() => {
                    verificationStatus.style.animation = 'successReveal 0.8s ease forwards';
                }, 500);
            }
        }, index * 1000);
    });
    
    // OTP animation
    const otpBoxes = card.querySelectorAll('.otp-box');
    otpBoxes.forEach((box, index) => {
        setTimeout(() => {
            box.style.animation = 'otpFill 0.4s ease forwards';
        }, 2000 + (index * 200));
    });
}

// ============================================
// VISITOR LIST ANIMATION
// ============================================
function animateVisitorList(card) {
    const visitorItems = card.querySelectorAll('.visitor-item');
    
    visitorItems.forEach((item, index) => {
        setTimeout(() => {
            item.style.animation = 'visitorSlideIn 0.6s ease forwards';
            
            // Add real-time status updates
            const status = item.querySelector('.visitor-status');
            if (status && status.classList.contains('pending')) {
                setTimeout(() => {
                    status.textContent = 'Active';
                    status.className = 'visitor-status active';
                    status.style.animation = 'statusChange 0.4s ease';
                }, 3000 + (index * 1000));
            }
        }, index * 300);
    });
    
    // Add new visitor simulation
    setTimeout(() => {
        addNewVisitorItem(card);
    }, 8000);
}

// ============================================
// FACE SCANNER ANIMATION
// ============================================
function animateFaceScanner(card) {
    const scannerFrame = card.querySelector('.scanner-frame');
    const scanLines = card.querySelectorAll('.scan-line');
    const scanStatus = card.querySelector('.scan-status');
    const matchResult = card.querySelector('.match-result');
    
    if (scannerFrame) {
        scannerFrame.style.animation = 'scannerPulse 2s ease infinite';
    }
    
    // Animate scan lines
    scanLines.forEach((line, index) => {
        setTimeout(() => {
            line.style.animation = 'scanMove 2s linear infinite';
        }, index * 300);
    });
    
    // Show match result after scanning
    setTimeout(() => {
        if (scanStatus) {
            scanStatus.style.opacity = '0';
        }
        if (matchResult) {
            matchResult.style.animation = 'matchFound 0.8s ease forwards';
        }
    }, 4000);
}

// ============================================
// INVITE PREVIEW ANIMATION
// ============================================
function animateInvitePreview(card) {
    const inviteElements = card.querySelectorAll('.detail-item');
    const verifyButton = card.querySelector('.verify-button');
    const qrCode = card.querySelector('.qr-code');
    
    inviteElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.animation = 'detailReveal 0.6s ease forwards';
        }, index * 200);
    });
    
    if (verifyButton) {
        setTimeout(() => {
            verifyButton.style.animation = 'buttonBounce 0.8s ease forwards';
        }, 1000);
        
        verifyButton.addEventListener('click', () => {
            showMiniNotification('Pre-verification started!', 'info');
            verifyButton.style.animation = 'buttonSuccess 0.6s ease forwards';
        });
    }
    
    if (qrCode) {
        setTimeout(() => {
            qrCode.style.animation = 'qrGenerate 1s ease forwards';
        }, 1500);
    }
}

// ============================================
// INDUSTRY CARD INTERACTIONS
// ============================================
function initIndustryCardInteractions() {
    const industryCards = document.querySelectorAll('.industry-card');
    
    industryCards.forEach(card => {
        const icon = card.querySelector('.industry-icon');
        const overlay = card.querySelector('.industry-overlay');
        const stats = card.querySelectorAll('.stat-number');
        
        card.addEventListener('mouseenter', function() {
            // Enhanced hover effects
            this.style.transform = 'translateY(-16px) scale(1.02)';
            this.style.boxShadow = '0 30px 60px rgba(0, 102, 255, 0.2)';
            
            if (icon) {
                icon.style.transform = 'scale(1.15) rotate(10deg)';
                icon.style.boxShadow = '0 20px 40px rgba(0, 102, 255, 0.4)';
            }
            
            // Animate stats when overlay is shown
            if (stats.length > 0) {
                setTimeout(() => {
                    stats.forEach((stat, index) => {
                        setTimeout(() => {
                            stat.style.animation = 'statCount 1s ease forwards';
                        }, index * 200);
                    });
                }, 200);
            }
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
            
            if (icon) {
                icon.style.transform = '';
                icon.style.boxShadow = '';
            }
        });
        
        // Click interaction
        card.addEventListener('click', function() {
            const title = this.querySelector('.industry-title').textContent;
            showMiniNotification(`🏢 ${title} - Perfect for your industry!`, 'success');
            
            // Click animation
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
}

// ============================================
// UTILITY FUNCTIONS
// ============================================
function addNewVisitorItem(card) {
    const visitorList = card.querySelector('.visitor-list');
    if (!visitorList) return;
    
    const newVisitor = document.createElement('div');
    newVisitor.className = 'visitor-item';
    newVisitor.style.opacity = '0';
    newVisitor.innerHTML = `
        <div class="visitor-avatar">AL</div>
        <div class="visitor-info">
            <div class="visitor-name">Alex Lee</div>
            <div class="visitor-details">Consultation • 4:30 PM • Room B</div>
        </div>
        <div class="visitor-status pending">Pending</div>
    `;
    
    visitorList.insertBefore(newVisitor, visitorList.firstChild);
    
    setTimeout(() => {
        newVisitor.style.animation = 'newVisitorSlide 0.6s ease forwards';
    }, 100);
    
    // Remove last item if more than 3
    const items = visitorList.querySelectorAll('.visitor-item');
    if (items.length > 3) {
        const lastItem = items[items.length - 1];
        lastItem.style.animation = 'visitorSlideOut 0.4s ease forwards';
        setTimeout(() => {
            if (visitorList.contains(lastItem)) {
                visitorList.removeChild(lastItem);
            }
        }, 400);
    }
}

function showMiniNotification(message, type = 'info') {
    const notification = document.createElement('div');
    
    const colors = {
        success: '#28CA42',
        info: '#0066FF',
        warning: '#FB923C',
        error: '#EF4444'
    };
    
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${colors[type]};
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        font-family: "Urbanist", sans-serif;
        z-index: 10000;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transform: translateX(300px);
        transition: transform 0.3s ease;
    `;
    
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    setTimeout(() => {
        notification.style.transform = 'translateX(300px)';
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

// ============================================
// ADD ANIMATION STYLES
// ============================================
function addCoreFeatureAnimationStyles() {
    if (document.querySelector('#core-feature-animations')) return;
    
    const style = document.createElement('style');
    style.id = 'core-feature-animations';
    style.textContent = `
        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateX(-60px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slideInRight {
            0% {
                opacity: 0;
                transform: translateX(60px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes cardReveal {
            0% {
                opacity: 0;
                transform: scale(0.9) translateY(30px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        
        @keyframes cardSlideUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes inputFocus {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes buttonGlow {
            0% {
                box-shadow: 0 0 0 rgba(0, 102, 255, 0.4);
            }
            100% {
                box-shadow: 0 0 20px rgba(0, 102, 255, 0.6);
            }
        }
        
        @keyframes stepActivate {
            0% {
                opacity: 0.5;
                transform: translateX(-20px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes successReveal {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes otpFill {
            0% {
                background: transparent;
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                background: rgba(0, 102, 255, 0.1);
                transform: scale(1);
            }
        }
        
        @keyframes visitorSlideIn {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes newVisitorSlide {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes visitorSlideOut {
            0% {
                opacity: 1;
                transform: translateX(0);
            }
            100% {
                opacity: 0;
                transform: translateX(30px);
            }
        }
        
        @keyframes statusChange {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        
        @keyframes scannerPulse {
            0%, 100% {
                border-color: var(--primary-blue);
                box-shadow: 0 0 0 rgba(0, 102, 255, 0.4);
            }
            50% {
                border-color: var(--accent-aqua);
                box-shadow: 0 0 20px rgba(0, 229, 255, 0.6);
            }
        }
        
        @keyframes matchFound {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes detailReveal {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes buttonBounce {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes buttonSuccess {
            0% {
                background: var(--gradient-primary);
            }
            50% {
                background: linear-gradient(135deg, #28CA42 0%, #22C55E 100%);
                transform: scale(1.05);
            }
            100% {
                background: var(--gradient-primary);
                transform: scale(1);
            }
        }
        
        @keyframes qrGenerate {
            0% {
                opacity: 0;
                transform: scale(0);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes statCount {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
                color: var(--accent-aqua);
                text-shadow: 0 0 30px rgba(0, 229, 255, 0.8);
            }
            100% {
                transform: scale(1);
            }
        }
    `;
    
    document.head.appendChild(style);
}

// ============================================
// PARALLAX EFFECTS FOR FEATURES
// ============================================
function initFeatureParallax() {
    let ticking = false;
    
    function updateFeatureParallax() {
        const scrollY = window.scrollY;
        
        // Background shapes parallax
        const bgShapes = document.querySelectorAll('.bg-shape');
        bgShapes.forEach((shape, index) => {
            const speed = 0.2 + (index * 0.1);
            const yPos = scrollY * speed;
            const rotation = scrollY * (0.05 + index * 0.02);
            shape.style.transform = `translateY(${yPos}px) rotate(${rotation}deg)`;
        });
        
        // Grid items animation
        const gridItems = document.querySelectorAll('.grid-item');
        gridItems.forEach((item, index) => {
            const speed = scrollY * 0.001;
            const delay = index * 0.1;
            item.style.background = `rgba(0, 102, 255, ${Math.sin(speed + delay) * 0.05 + 0.02})`;
        });
        
        ticking = false;
    }
    
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateFeatureParallax);
            ticking = true;
        }
    }
    
    window.addEventListener('scroll', requestTick);
}

// ============================================
// INITIALIZE CORE FEATURES FUNCTIONALITY
// ============================================
function initCoreFeatures() {
    initCoreFeatureAnimations();
    initIndustryCardInteractions();
    initFeatureParallax();
    
    // Add enhanced accessibility
    const interactiveElements = document.querySelectorAll('.visual-card, .industry-card');
    interactiveElements.forEach(element => {
        element.setAttribute('tabindex', '0');
        element.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
}

// ============================================
// TESTIMONIAL CAROUSEL INITIALIZATION
// ============================================
function initTestimonialCarousel() {
    if (typeof $.fn.owlCarousel !== 'undefined') {
        $('.testimonial-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            },
            navText: [
                '<i class="fas fa-arrow-left"></i>',
                '<i class="fas fa-arrow-right"></i>'
            ]
        });
    }
}

// ============================================
// AUTO-INITIALIZE ON DOM READY
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    // Initialize after other sections are ready
    setTimeout(() => {
        initCoreFeatures();
        initTestimonialCarousel();
    }, 500);
});

// ============================================
// EXPORT FOR MODULAR USAGE
// ============================================
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initCoreFeatures,
        initCoreFeatureAnimations,
        initIndustryCardInteractions
    };
}