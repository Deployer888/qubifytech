/**
 * Animation Manager - Handles all page animations and scroll effects
 */

class AnimationManager {
    constructor() {
        this.observers = new Map();
        this.isInitialized = false;
        
        // Bind methods
        this.initialize = this.initialize.bind(this);
        this.setupScrollAnimations = this.setupScrollAnimations.bind(this);
        this.setupCounterAnimations = this.setupCounterAnimations.bind(this);
        
        // Auto-initialize if loader is complete
        if (document.body.classList.contains('loaded')) {
            this.initialize();
        } else {
            document.addEventListener('loaderComplete', this.initialize);
        }
    }
    
    initialize() {
        if (this.isInitialized) return;
        
        this.setupCounterAnimations();
        this.setupScrollAnimations();
        this.setupTypingAnimation();
        this.setupFloatingElements();
        this.setupCodeWindow();
        this.setupDynamicParticles();
        
        this.isInitialized = true;
        console.log('Animations initialized');
    }
    
    setupCounterAnimations() {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-count'));
                    this.animateCounter(counter, 0, target, 2000);
                    counterObserver.unobserve(counter);
                }
            });
        }, { threshold: 0.1 }); // Lower threshold
        
        document.querySelectorAll('.stat-number[data-count]').forEach(counter => {
            counterObserver.observe(counter);
        });
        
        this.observers.set('counter', counterObserver);
    }
    
    setupScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    
                    // Add staggered animation for multiple elements
                    const siblings = Array.from(entry.target.parentElement?.children || []);
                    const index = siblings.indexOf(entry.target);
                    if (index > -1) {
                        entry.target.style.animationDelay = `${index * 0.1}s`;
                    }
                }
            });
        }, observerOptions);
        
        const elements = document.querySelectorAll(
            '.scroll-fade-in, .scroll-slide-left, .scroll-slide-right, .scroll-scale-in'
        );
        
        elements.forEach(el => scrollObserver.observe(el));
        this.observers.set('scroll', scrollObserver);
    }
    
    setupTypingAnimation() {
        // Start typing immediately when DOM is ready
        const words = ['AI-Driven', 'Intelligent', 'Next-Gen', 'Innovative'];
        const typingElement = document.getElementById('typingText');
        
        if (!typingElement) {
            console.warn('Typing element not found');
            return;
        }
        
        // Start immediately
        this.startTypingEffect(typingElement, words);
    }
    
    startTypingEffect(element, words) {
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let isPaused = false;

        const typeEffect = () => {
            const currentWord = words[wordIndex];
            
            if (!isDeleting && !isPaused) {
                // Typing
                element.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
                
                if (charIndex === currentWord.length) {
                    isPaused = true;
                    setTimeout(() => {
                        isPaused = false;
                        isDeleting = true;
                        typeEffect();
                    }, 2000);
                    return;
                }
            } else if (isDeleting && !isPaused) {
                // Deleting
                element.textContent = currentWord.substring(0, charIndex);
                charIndex--;
                
                if (charIndex === 0) {
                    isDeleting = false;
                    wordIndex = (wordIndex + 1) % words.length;
                }
            }
            
            if (!isPaused) {
                const speed = isDeleting ? 100 : 150;
                setTimeout(typeEffect, speed);
            }
        };

        typeEffect();
    }
    
    setupFloatingElements() {
        document.querySelectorAll('.element').forEach(element => {
            element.addEventListener('mouseenter', function() {
                this.style.animationPlayState = 'paused';
            });
            
            element.addEventListener('mouseleave', function() {
                this.style.animationPlayState = 'running';
            });
            
            element.addEventListener('click', function() {
                this.style.transform += ' rotateY(360deg)';
                setTimeout(() => {
                    this.style.transform = this.style.transform.replace(' rotateY(360deg)', '');
                }, 600);
            });
        });
    }
    
    setupCodeWindow() {
        const codeWindow = document.querySelector('.code-window');
        if (codeWindow) {
            codeWindow.addEventListener('mouseenter', function() {
                this.style.animationPlayState = 'paused';
                this.style.transform = 'translate(-50%, -50%) translateY(-20px) scale(1.05)';
            });
            
            codeWindow.addEventListener('mouseleave', function() {
                this.style.animationPlayState = 'running';
                this.style.color = 'black';
                this.style.transform = 'translate(-50%, -50%) translateY(0px) scale(1)';
            });
        }
    }
    
    setupDynamicParticles() {
        const createDynamicParticle = () => {
            const particlesContainer = document.querySelector('.floating-particles');
            if (!particlesContainer) return;

            const particle = document.createElement('div');
            particle.className = 'particle dynamic-particle';
            particle.style.cssText = `
                position: absolute;
                width: 6px;
                height: 6px;
                background: var(--neon-blue);
                border-radius: 50%;
                box-shadow: 0 0 15px var(--neon-blue);
                left: ${Math.random() * 100}%;
                animation: particleFloatEnhanced ${15 + Math.random() * 10}s linear infinite;
                pointer-events: none;
            `;

            particlesContainer.appendChild(particle);

            // Remove particle after animation
            setTimeout(() => {
                if (particle.parentNode) {
                    particle.parentNode.removeChild(particle);
                }
            }, 25000);
        };

        // Create new particles periodically
        this.particleInterval = setInterval(createDynamicParticle, 3000);
    }
    
    animateCounter(element, start, end, duration) {
        const startTime = performance.now();
        const difference = end - start;
        
        const step = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const current = start + (difference * this.easeOutQuart(progress));
            
            element.textContent = Math.floor(current);
            
            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                element.textContent = end;
            }
        };
        
        requestAnimationFrame(step);
    }
    
    easeOutQuart(t) {
        return 1 - (--t) * t * t * t;
    }
    
    // Utility method to create custom animations
    createAnimation(element, keyframes, options = {}) {
        if (!element || !keyframes) return null;
        
        const defaultOptions = {
            duration: 1000,
            easing: 'ease-out',
            fill: 'forwards'
        };
        
        return element.animate(keyframes, { ...defaultOptions, ...options });
    }
    
    // Cleanup method
    destroy() {
        // Clear all observers
        this.observers.forEach(observer => observer.disconnect());
        this.observers.clear();
        
        // Clear intervals
        if (this.particleInterval) {
            clearInterval(this.particleInterval);
        }
        
        // Remove dynamic particles
        document.querySelectorAll('.dynamic-particle').forEach(particle => {
            particle.remove();
        });
        
        this.isInitialized = false;
    }
    
    // Public methods for external control
    pauseAnimations() {
        document.querySelectorAll('*').forEach(el => {
            el.style.animationPlayState = 'paused';
        });
    }
    
    resumeAnimations() {
        document.querySelectorAll('*').forEach(el => {
            el.style.animationPlayState = 'running';
        });
    }
}

// Initialize animation manager
const animationManager = new AnimationManager();

// Export for other modules
window.AnimationManager = animationManager;