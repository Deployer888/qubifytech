/**
 * HRMS Carousel Fix - Enhanced Initialization
 * Fixes Use Cases and Testimonials sections display issues
 */

(function() {
    'use strict';
    
    // Configuration
    const CONFIG = {
        useCases: {
            selector: '.use-cases-carousel',
            options: {
                loop: true,
                margin: 30,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                navText: [
                    '<i class="fas fa-chevron-left"></i>', 
                    '<i class="fas fa-chevron-right"></i>'
                ],
                responsive: {
                    0: { items: 1 },
                    768: { items: 2 },
                    992: { items: 3 },
                    1200: { items: 4 }
                }
            }
        },
        testimonials: {
            selector: '.testimonials-carousel',
            options: {
                loop: true,
                margin: 30,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                navText: [
                    '<i class="fas fa-chevron-left"></i>', 
                    '<i class="fas fa-chevron-right"></i>'
                ],
                responsive: {
                    0: { items: 1 },
                    768: { items: 2 },
                    1200: { items: 3 }
                }
            }
        }
    };
    
    // State management
    let isInitialized = false;
    let retryCount = 0;
    const maxRetries = 10;
    
    /**
     * Main initialization function
     */
    function initializeCarousels() {
        console.log('🎠 Initializing HRMS carousels...');
        
        // Check if already initialized
        if (isInitialized) {
            console.log('✅ Carousels already initialized');
            return;
        }
        
        // Check dependencies
        if (!checkDependencies()) {
            if (retryCount < maxRetries) {
                retryCount++;
                console.log(`⏳ Dependencies not ready, retrying... (${retryCount}/${maxRetries})`);
                setTimeout(initializeCarousels, 500);
                return;
            } else {
                console.warn('⚠️ Dependencies not available, using fallback layout');
                initializeFallbackLayout();
                return;
            }
        }
        
        try {
            // Initialize Use Cases carousel
            initializeUseCarousel();
            
            // Initialize Testimonials carousel
            initializeTestimonialsCarousel();
            
            // Handle reduced motion preference
            handleReducedMotion();
            
            // Add accessibility features
            enhanceAccessibility();
            
            isInitialized = true;
            console.log('✅ HRMS carousels initialized successfully');
            
        } catch (error) {
            console.error('❌ Error initializing carousels:', error);
            initializeFallbackLayout();
        }
    }
    
    /**
     * Check if required dependencies are available
     */
    function checkDependencies() {
        return (
            typeof jQuery !== 'undefined' && 
            typeof jQuery.fn.owlCarousel !== 'undefined'
        );
    }
    
    /**
     * Initialize Use Cases carousel
     */
    function initializeUseCarousel() {
        const $carousel = jQuery(CONFIG.useCases.selector);
        
        if ($carousel.length === 0) {
            console.warn('⚠️ Use cases carousel element not found');
            return;
        }
        
        // Destroy existing carousel if any
        if ($carousel.hasClass('owl-loaded')) {
            $carousel.trigger('destroy.owl.carousel');
            $carousel.removeClass('owl-loaded owl-drag');
        }
        
        // Initialize carousel
        $carousel.owlCarousel(CONFIG.useCases.options);
        
        // Add custom event handlers
        $carousel.on('initialized.owl.carousel', function(event) {
            console.log('✅ Use cases carousel initialized');
            addCarouselEnhancements($carousel, 'use-cases');
        });
        
        $carousel.on('changed.owl.carousel', function(event) {
            updateAriaLabels($carousel, event.item.index, event.item.count);
        });
    }
    
    /**
     * Initialize Testimonials carousel
     */
    function initializeTestimonialsCarousel() {
        const $carousel = jQuery(CONFIG.testimonials.selector);
        
        if ($carousel.length === 0) {
            console.warn('⚠️ Testimonials carousel element not found');
            return;
        }
        
        // Destroy existing carousel if any
        if ($carousel.hasClass('owl-loaded')) {
            $carousel.trigger('destroy.owl.carousel');
            $carousel.removeClass('owl-loaded owl-drag');
        }
        
        // Initialize carousel
        $carousel.owlCarousel(CONFIG.testimonials.options);
        
        // Add custom event handlers
        $carousel.on('initialized.owl.carousel', function(event) {
            console.log('✅ Testimonials carousel initialized');
            addCarouselEnhancements($carousel, 'testimonials');
        });
        
        $carousel.on('changed.owl.carousel', function(event) {
            updateAriaLabels($carousel, event.item.index, event.item.count);
        });
    }
    
    /**
     * Add carousel enhancements
     */
    function addCarouselEnhancements($carousel, type) {
        // Add keyboard navigation
        $carousel.on('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                $carousel.trigger('prev.owl.carousel');
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                $carousel.trigger('next.owl.carousel');
            }
        });
        
        // Add touch/swipe feedback
        $carousel.on('drag.owl.carousel', function(event) {
            $carousel.addClass('dragging');
        });
        
        $carousel.on('dragged.owl.carousel', function(event) {
            $carousel.removeClass('dragging');
        });
        
        // Add loading state removal
        $carousel.removeClass('carousel-loading');
        
        // Trigger custom event
        const customEvent = new CustomEvent('carouselReady', {
            detail: { type: type, element: $carousel[0] }
        });
        document.dispatchEvent(customEvent);
    }
    
    /**
     * Update ARIA labels for accessibility
     */
    function updateAriaLabels($carousel, currentIndex, totalItems) {
        const $items = $carousel.find('.owl-item');
        
        $items.each(function(index, item) {
            const $item = jQuery(item);
            const isActive = $item.hasClass('active');
            
            $item.attr('aria-hidden', !isActive);
            
            if (isActive) {
                $item.attr('aria-label', `Slide ${index + 1} of ${totalItems}`);
            }
        });
    }
    
    /**
     * Handle reduced motion preference
     */
    function handleReducedMotion() {
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        
        if (prefersReducedMotion) {
            // Disable autoplay
            jQuery('.owl-carousel').each(function() {
                jQuery(this).trigger('stop.owl.autoplay');
            });
            
            // Add reduced motion class
            document.body.classList.add('reduced-motion');
            
            console.log('🎯 Reduced motion preferences applied');
        }
    }
    
    /**
     * Enhance accessibility
     */
    function enhanceAccessibility() {
        // Add ARIA labels to carousels
        jQuery('.owl-carousel').each(function(index) {
            const $carousel = jQuery(this);
            const carouselType = $carousel.hasClass('use-cases-carousel') ? 'Use Cases' : 'Testimonials';
            
            $carousel.attr({
                'role': 'region',
                'aria-label': `${carouselType} Carousel`,
                'tabindex': '0'
            });
        });
        
        // Enhance navigation buttons
        jQuery('.owl-nav button').each(function() {
            const $btn = jQuery(this);
            const isNext = $btn.hasClass('owl-next');
            
            $btn.attr({
                'aria-label': isNext ? 'Next slide' : 'Previous slide',
                'type': 'button'
            });
        });
        
        // Enhance dots
        jQuery('.owl-dots .owl-dot').each(function(index) {
            jQuery(this).attr({
                'aria-label': `Go to slide ${index + 1}`,
                'type': 'button'
            });
        });
        
        console.log('♿ Accessibility enhancements applied');
    }
    
    /**
     * Initialize fallback layout when carousel is not available
     */
    function initializeFallbackLayout() {
        console.log('🔄 Initializing fallback layout...');
        
        // Add fallback classes
        const useCasesCarousel = document.querySelector(CONFIG.useCases.selector);
        const testimonialsCarousel = document.querySelector(CONFIG.testimonials.selector);
        
        if (useCasesCarousel) {
            useCasesCarousel.classList.add('fallback-grid');
            useCasesCarousel.style.display = 'grid';
            useCasesCarousel.style.gridTemplateColumns = 'repeat(auto-fit, minmax(280px, 1fr))';
            useCasesCarousel.style.gap = '2rem';
            useCasesCarousel.style.marginTop = '2rem';
        }
        
        if (testimonialsCarousel) {
            testimonialsCarousel.classList.add('fallback-grid');
            testimonialsCarousel.style.display = 'grid';
            testimonialsCarousel.style.gridTemplateColumns = 'repeat(auto-fit, minmax(350px, 1fr))';
            testimonialsCarousel.style.gap = '2rem';
            testimonialsCarousel.style.marginTop = '2rem';
        }
        
        // Remove carousel-specific margins
        const cards = document.querySelectorAll('.use-case-card, .testimonial-card');
        cards.forEach(card => {
            card.style.margin = '0';
        });
        
        // Add interaction enhancements
        addFallbackInteractions();
        
        console.log('✅ Fallback layout initialized');
    }
    
    /**
     * Add interactions for fallback layout
     */
    function addFallbackInteractions() {
        const cards = document.querySelectorAll('.use-case-card, .testimonial-card');
        
        cards.forEach(card => {
            // Add hover effects
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 20px 40px rgba(99, 102, 241, 0.15)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.05)';
            });
            
            // Add keyboard navigation
            card.setAttribute('tabindex', '0');
            card.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.click();
                }
            });
        });
    }
    
    /**
     * Refresh carousels (useful for dynamic content)
     */
    function refreshCarousels() {
        if (!isInitialized) return;
        
        jQuery('.owl-carousel').each(function() {
            const $carousel = jQuery(this);
            if ($carousel.hasClass('owl-loaded')) {
                $carousel.trigger('refresh.owl.carousel');
            }
        });
        
        console.log('🔄 Carousels refreshed');
    }
    
    /**
     * Destroy carousels
     */
    function destroyCarousels() {
        jQuery('.owl-carousel').each(function() {
            const $carousel = jQuery(this);
            if ($carousel.hasClass('owl-loaded')) {
                $carousel.trigger('destroy.owl.carousel');
                $carousel.removeClass('owl-loaded owl-drag');
            }
        });
        
        isInitialized = false;
        console.log('🗑️ Carousels destroyed');
    }
    
    /**
     * Event listeners
     */
    function bindEvents() {
        // Window resize handler
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                if (isInitialized) {
                    refreshCarousels();
                }
            }, 250);
        });
        
        // Visibility change handler
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                // Pause autoplay when tab is not visible
                jQuery('.owl-carousel').trigger('stop.owl.autoplay');
            } else {
                // Resume autoplay when tab becomes visible
                jQuery('.owl-carousel').trigger('play.owl.autoplay');
            }
        });
        
        // Custom events
        document.addEventListener('carouselReady', function(e) {
            console.log(`🎉 ${e.detail.type} carousel is ready`);
        });
    }
    
    /**
     * Initialize everything when DOM is ready
     */
    function init() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(initializeCarousels, 100);
                bindEvents();
            });
        } else {
            setTimeout(initializeCarousels, 100);
            bindEvents();
        }
    }
    
    // Public API
    window.HRMSCarousels = {
        init: initializeCarousels,
        refresh: refreshCarousels,
        destroy: destroyCarousels,
        isInitialized: function() { return isInitialized; }
    };
    
    // Auto-initialize
    init();
    
    console.log('🚀 HRMS Carousel Fix loaded');
    
})();