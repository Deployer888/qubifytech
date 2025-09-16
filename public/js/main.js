/**
 * ================================================================================================
 * MAIN APPLICATION LOADER
 * ================================================================================================
 * Single entry point that dynamically loads all JavaScript modules
 * Only this file needs to be included in your blade template
 */

(function() {
'use strict';

// ================================================================================================
// MODULE LOADER CLASS
// ================================================================================================

class ModuleLoader {
    constructor() {
        this.basePath = 'public/js/'; // Adjust this path as needed
        this.loadedModules = new Set();
        this.loadingPromises = new Map();
        
        // Define module loading order and dependencies
        this.modules = [
            // Core modules (load first, no dependencies)
            {
                name: 'utils',
                path: 'utils.js',
                dependencies: [],
                critical: true
            },
            {
                name: 'loader',
                path: 'loader.js',
                dependencies: [],
                critical: true
            },
            {
                name: 'theme',
                path: 'theme.js',
                dependencies: [],
                critical: true
            },
            // Feature modules (load after core)
            {
                name: 'animations',
                path: 'animations.js',
                dependencies: ['utils'],
                critical: false
            },
            {
                name: 'navigation',
                path: 'navigation.js',
                dependencies: ['utils'],
                critical: true
            },
            {
                name: 'dropdown',
                path: 'dropdown.js',
                dependencies: ['utils', 'navigation'],
                critical: false
            }
        ];
        
        this.init();
    }
    
    async init() {
        try {
            console.log('🚀 Starting module loading...');
            
            // Show loading indicator if available
            this.showLoadingState();
            
            // Load modules in dependency order
            await this.loadModulesInOrder();
            
            // Initialize the main application
            await this.initializeApp();
            
            console.log('✅ All modules loaded successfully');
            
        } catch (error) {
            console.error('❌ Module loading failed:', error);
            this.handleLoadingError(error);
        }
    }
    
    async loadModulesInOrder() {
        // First, load all critical modules
        const criticalModules = this.modules.filter(m => m.critical);
        console.log('📦 Loading critical modules...');
        
        for (const module of criticalModules) {
            await this.loadModule(module);
        }
        
        // Then load non-critical modules
        const nonCriticalModules = this.modules.filter(m => !m.critical);
        console.log('🎯 Loading feature modules...');
        
        // Load non-critical modules in parallel for better performance
        await Promise.all(nonCriticalModules.map(module => this.loadModule(module)));
    }
    
    async loadModule(module) {
        // Check if module is already loaded
        if (this.loadedModules.has(module.name)) {
            return;
        }
        
        // Check if module is currently loading
        if (this.loadingPromises.has(module.name)) {
            return this.loadingPromises.get(module.name);
        }
        
        // Wait for dependencies first
        if (module.dependencies.length > 0) {
            await this.waitForDependencies(module.dependencies);
        }
        
        // Load the module
        const loadPromise = this.loadScript(this.basePath + module.path);
        this.loadingPromises.set(module.name, loadPromise);
        
        try {
            await loadPromise;
            this.loadedModules.add(module.name);
            console.log(`✓ Loaded: ${module.name}`);
            
            // Dispatch module loaded event
            this.dispatchEvent('moduleLoaded', { 
                moduleName: module.name,
                path: module.path 
            });
            
        } catch (error) {
            console.error(`❌ Failed to load ${module.name}:`, error);
            
            // For critical modules, throw error to stop loading
            if (module.critical) {
                throw new Error(`Critical module ${module.name} failed to load`);
            }
            
            // For non-critical modules, continue loading
            console.warn(`⚠️ Non-critical module ${module.name} failed, continuing...`);
        } finally {
            this.loadingPromises.delete(module.name);
        }
    }
    
    async waitForDependencies(dependencies) {
        const waitPromises = dependencies.map(depName => {
            return new Promise((resolve, reject) => {
                // If dependency is already loaded, resolve immediately
                if (this.loadedModules.has(depName)) {
                    resolve();
                    return;
                }
                
                // If dependency is loading, wait for it
                if (this.loadingPromises.has(depName)) {
                    this.loadingPromises.get(depName).then(resolve).catch(reject);
                    return;
                }
                
                // Find dependency module and load it
                const depModule = this.modules.find(m => m.name === depName);
                if (depModule) {
                    this.loadModule(depModule).then(resolve).catch(reject);
                } else {
                    reject(new Error(`Dependency ${depName} not found`));
                }
            });
        });
        
        await Promise.all(waitPromises);
    }
    
    loadScript(src) {
        return new Promise((resolve, reject) => {
            // Check if script is already loaded
            const existingScript = document.querySelector(`script[src="${src}"]`);
            if (existingScript) {
                resolve();
                return;
            }
            
            const script = document.createElement('script');
            script.src = src;
            script.async = true;
            
            script.onload = () => {
                resolve();
            };
            
            script.onerror = () => {
                reject(new Error(`Failed to load script: ${src}`));
            };
            
            // Add script to head
            document.head.appendChild(script);
        });
    }
    
    async initializeApp() {
        console.log('🎯 Initializing main application...');
        
        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            await new Promise(resolve => {
                document.addEventListener('DOMContentLoaded', resolve);
            });
        }
        
        // Initialize the main App class
        await this.waitForApp();
        
        console.log('🎉 Application ready!');
        
        // Dispatch app ready event
        this.dispatchEvent('appReady');
        
        // Hide loading state
        this.hideLoadingState();
    }
    
    async waitForApp() {
        // Wait for the App class to be available and initialize
        return new Promise((resolve, reject) => {
            let attempts = 0;
            const maxAttempts = 50; // 5 seconds max wait
            
            const checkApp = () => {
                // Check if all required managers are available
                const requiredManagers = [
                    'Utils', 'LoaderManager', 'ThemeManager', 
                    'NavigationManager', 'AnimationManager'
                ];
                
                const allAvailable = requiredManagers.every(manager => window[manager]);
                
                if (allAvailable) {
                    resolve();
                } else if (attempts++ < maxAttempts) {
                    setTimeout(checkApp, 100);
                } else {
                    reject(new Error('App initialization timeout'));
                }
            };
            
            checkApp();
        });
    }
    
    showLoadingState() {
        // Create a simple loading indicator if loader module isn't ready yet
        if (!document.getElementById('moduleLoader')) {
            const loader = document.createElement('div');
            loader.id = 'moduleLoader';
            loader.innerHTML = `
                <div style="
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 50%, #1e3a8a 100%);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 10000;
                    color: white;
                    font-family: 'Inter', Arial, sans-serif;
                ">
                    <div style="text-align: center;">
                        <div style="
                            width: 50px;
                            height: 50px;
                            border: 3px solid rgba(255,255,255,0.3);
                            border-top: 3px solid white;
                            border-radius: 50%;
                            animation: spin 1s linear infinite;
                            margin: 0 auto 1rem;
                        "></div>
                        <div style="font-size: 1.2rem; font-weight: 600;">
                            Loading Modules...
                        </div>
                        <div id="moduleProgress" style="
                            font-size: 0.9rem; 
                            opacity: 0.8; 
                            margin-top: 0.5rem;
                        ">
                            Initializing...
                        </div>
                    </div>
                </div>
                <style>
                    @keyframes spin {
                        0% { transform: rotate(0deg); }
                        100% { transform: rotate(360deg); }
                    }
                </style>
            `;
            
            document.body.appendChild(loader);
        }
    }
    
    hideLoadingState() {
        const loader = document.getElementById('moduleLoader');
        if (loader) {
            loader.style.opacity = '0';
            loader.style.transition = 'opacity 0.5s ease';
            
            setTimeout(() => {
                if (loader.parentNode) {
                    loader.parentNode.removeChild(loader);
                }
            }, 500);
        }
    }
    
    handleLoadingError(error) {
        console.error('Module loading failed:', error);
        
        // Hide loading state
        this.hideLoadingState();
        
        // Show error message
        const errorDiv = document.createElement('div');
        errorDiv.innerHTML = `
            <div style="
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #f8fafc;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10000;
                color: #374151;
                font-family: 'Inter', Arial, sans-serif;
            ">
                <div style="text-align: center; max-width: 500px; padding: 2rem;">
                    <div style="
                        font-size: 3rem;
                        margin-bottom: 1rem;
                        color: #ef4444;
                    ">⚠️</div>
                    <h1 style="margin-bottom: 1rem; color: #1f2937;">
                        Loading Failed
                    </h1>
                    <p style="margin-bottom: 2rem; color: #6b7280; line-height: 1.6;">
                        Some modules failed to load. Please check your internet connection and try again.
                    </p>
                    <button onclick="window.location.reload()" style="
                        background: #3b82f6;
                        color: white;
                        border: none;
                        padding: 12px 24px;
                        border-radius: 8px;
                        cursor: pointer;
                        font-size: 1rem;
                        font-weight: 500;
                    ">
                        Reload Page
                    </button>
                    <details style="margin-top: 2rem; text-align: left;">
                        <summary style="cursor: pointer; color: #6b7280;">
                            Technical Details
                        </summary>
                        <pre style="
                            background: #f3f4f6;
                            padding: 1rem;
                            border-radius: 4px;
                            margin-top: 0.5rem;
                            font-size: 0.8rem;
                            overflow: auto;
                            color: #374151;
                        ">${error.message}</pre>
                    </details>
                </div>
            </div>
        `;
        
        document.body.appendChild(errorDiv);
    }
    
    dispatchEvent(eventName, detail = {}) {
        const event = new CustomEvent(eventName, {
            detail: { 
                ...detail, 
                timestamp: Date.now(),
                loader: this 
            },
            bubbles: true
        });
        
        document.dispatchEvent(event);
    }
    
    // Public API methods
    getLoadedModules() {
        return Array.from(this.loadedModules);
    }
    
    isModuleLoaded(moduleName) {
        return this.loadedModules.has(moduleName);
    }
    
    async loadAdditionalModule(name, path, dependencies = []) {
        const module = { name, path, dependencies, critical: false };
        await this.loadModule(module);
        return this.isModuleLoaded(name);
    }
    
    // Configuration
    setBasePath(path) {
        this.basePath = path.endsWith('/') ? path : path + '/';
    }
    
    addModule(moduleConfig) {
        this.modules.push(moduleConfig);
    }
}

// ================================================================================================
// APP INITIALIZATION
// ================================================================================================

class App {
    constructor() {
        this.modules = new Map();
        this.isInitialized = false;
        this.config = {
            enableAnalytics: true,
            enableErrorTracking: true,
            enablePerformanceMonitoring: true,
            loadTimeout: 10000,
            retryAttempts: 3
        };
        
        // Wait for modules to load before initializing
        document.addEventListener('appReady', () => this.init());
    }
    
    async init() {
        try {
            console.log('🚀 Initializing App...');
            
            // Initialize all loaded modules
            await this.initializeModules();
            
            // Setup global event listeners
            this.setupGlobalEvents();
            
            // Initialize additional features
            this.initializeFeatures();
            
            // Setup monitoring
            this.setupMonitoring();
            
            // Mark as initialized
            this.isInitialized = true;
            
            // Dispatch app ready event
            this.dispatchEvent('appInitialized');
            
            console.log('✅ App initialized successfully');
            
        } catch (error) {
            console.error('❌ App initialization failed:', error);
            this.handleInitializationError(error);
        }
    }
    
    async initializeModules() {
        // Initialize modules in order
        const moduleInitOrder = [
            'LoaderManager',
            'ThemeManager', 
            'Utils',
            'AnimationManager',
            'NavigationManager',
            'DropdownManager'
        ];
        
        for (const moduleName of moduleInitOrder) {
            if (window[moduleName]) {
                console.log(`✓ ${moduleName} available`);
                this.modules.set(moduleName, window[moduleName]);
            } else {
                console.warn(`⚠️ ${moduleName} not available`);
            }
        }
    }
    
    setupGlobalEvents() {
        // Handle uncaught errors
        window.addEventListener('error', (e) => {
            this.handleGlobalError(e.error || e, 'Global Error');
        });
        
        // Handle unhandled promise rejections
        window.addEventListener('unhandledrejection', (e) => {
            this.handleGlobalError(e.reason, 'Unhandled Promise Rejection');
            e.preventDefault();
        });
        
        // Handle page visibility changes
        document.addEventListener('visibilitychange', () => {
            this.handleVisibilityChange();
        });
        
        // Handle online/offline status
        window.addEventListener('online', () => {
            this.dispatchEvent('connectionRestored');
            console.log('🌐 Connection restored');
        });
        
        window.addEventListener('offline', () => {
            this.dispatchEvent('connectionLost');
            console.log('📵 Connection lost');
        });
        
        // Handle resize with debouncing
        if (window.Utils) {
            const debouncedResize = window.Utils.debounce(() => {
                this.handleResize();
            }, 250);
            
            window.addEventListener('resize', debouncedResize);
        }
        
        // Handle beforeunload for cleanup
        window.addEventListener('beforeunload', () => {
            this.cleanup();
        });
    }
    
    initializeFeatures() {
        this.initializeFormHandlers();
        this.initializeScrollEffects();
        this.initializeLazyLoading();
    }
    
    initializeFormHandlers() {
        // Newsletter form
        const newsletterForm = document.querySelector('.newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', (e) => {
                this.handleNewsletterSubmit(e);
            });
        }
        
        // Contact forms
        document.querySelectorAll('form[data-contact]').forEach(form => {
            form.addEventListener('submit', (e) => {
                this.handleContactFormSubmit(e);
            });
        });
    }
    
    initializeScrollEffects() {
        this.createBackToTopButton();
        this.createProgressIndicator();
    }
    
    initializeLazyLoading() {
        if (window.Utils) {
            window.Utils.lazyLoadImages();
        }
    }
    
    createBackToTopButton() {
        const button = document.createElement('button');
        button.className = 'back-to-top';
        button.innerHTML = '<i class="fas fa-arrow-up"></i>';
        button.setAttribute('aria-label', 'Back to top');
        
        let isVisible = false;
        
        const toggleVisibility = () => {
            const shouldShow = window.scrollY > 300;
            
            if (shouldShow && !isVisible) {
                button.classList.add('visible');
                isVisible = true;
            } else if (!shouldShow && isVisible) {
                button.classList.remove('visible');
                isVisible = false;
            }
        };
        
        button.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            if (window.Utils) {
                window.Utils.trackEvent('backToTop', { category: 'Navigation' });
            }
        });
        
        window.addEventListener('scroll', toggleVisibility);
        document.body.appendChild(button);
    }
    
    createProgressIndicator() {
        const progress = document.createElement('div');
        progress.className = 'scroll-progress';
        progress.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: var(--primary-gradient, linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%));
            z-index: 9999;
            transition: width 0.1s ease;
        `;
        
        const updateProgress = () => {
            const scrolled = window.scrollY;
            const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
            const progressPercent = (scrolled / maxScroll) * 100;
            
            progress.style.width = Math.min(progressPercent, 100) + '%';
        };
        
        window.addEventListener('scroll', updateProgress);
        document.body.appendChild(progress);
    }
    
    setupMonitoring() {
        if (!this.config.enablePerformanceMonitoring) return;
        
        // Monitor performance
        if ('performance' in window) {
            window.addEventListener('load', () => {
                setTimeout(() => {
                    const perfData = performance.getEntriesByType('navigation')[0];
                    if (perfData) {
                        const loadTime = perfData.loadEventEnd - perfData.loadEventStart;
                        console.log(`📊 Page load time: ${loadTime.toFixed(2)}ms`);
                        
                        if (window.Utils) {
                            window.Utils.trackEvent('pageLoad', {
                                loadTime,
                                category: 'Performance'
                            });
                        }
                    }
                }, 0);
            });
        }
    }
    
    handleNewsletterSubmit(e) {
        e.preventDefault();
        
        const form = e.target;
        const email = form.querySelector('input[type="email"]').value;
        
        if (!window.Utils || !window.Utils.isValidEmail(email)) {
            this.showNotification('Please enter a valid email address', 'error');
            return;
        }
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Subscribing...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            this.showNotification('Successfully subscribed to newsletter!', 'success');
            form.reset();
            
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
            
            if (window.Utils) {
                window.Utils.trackEvent('newsletterSubscribe', {
                    category: 'Engagement',
                    email: email
                });
            }
        }, 1500);
    }
    
    handleContactFormSubmit(e) {
        e.preventDefault();
        
        const form = e.target;
        
        // Basic validation
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('error');
                isValid = false;
            } else {
                field.classList.remove('error');
            }
        });
        
        if (!isValid) {
            this.showNotification('Please fill in all required fields', 'error');
            return;
        }
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            this.showNotification('Message sent successfully!', 'success');
            form.reset();
            
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
            
            if (window.Utils) {
                window.Utils.trackEvent('contactFormSubmit', {
                    category: 'Engagement'
                });
            }
        }, 2000);
    }
    
    showNotification(message, type = 'info', duration = 5000) {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            z-index: 10000;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        requestAnimationFrame(() => {
            notification.style.transform = 'translateX(0)';
        });
        
        // Auto remove
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, duration);
    }
    
    handleVisibilityChange() {
        if (document.hidden) {
            this.dispatchEvent('appHidden');
            if (window.AnimationManager) {
                window.AnimationManager.pauseAnimations();
            }
        } else {
            this.dispatchEvent('appVisible');
            if (window.AnimationManager) {
                window.AnimationManager.resumeAnimations();
            }
        }
    }
    
    handleResize() {
        const deviceInfo = window.Utils ? window.Utils.getDeviceInfo() : {};
        
        this.dispatchEvent('appResize', {
            width: window.innerWidth,
            height: window.innerHeight,
            deviceInfo
        });
    }
    
    handleGlobalError(error, context) {
        if (window.Utils) {
            window.Utils.handleError(error, context);
        } else {
            console.error(`Error in ${context}:`, error);
        }
        
        if (this.config.enableErrorTracking) {
            this.dispatchEvent('errorOccurred', { error, context });
        }
    }
    
    handleInitializationError(error) {
        console.error('App initialization failed:', error);
        
        // Show fallback UI
        document.body.innerHTML = `
            <div style="
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                text-align: center;
                font-family: Arial, sans-serif;
                background: #f8fafc;
                color: #374151;
            ">
                <div>
                    <h1>Something went wrong</h1>
                    <p>Please refresh the page to try again.</p>
                    <button onclick="window.location.reload()" style="
                        background: #3b82f6;
                        color: white;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 5px;
                        cursor: pointer;
                        margin-top: 10px;
                    ">
                        Refresh Page
                    </button>
                </div>
            </div>
        `;
    }
    
    dispatchEvent(eventName, detail = {}) {
        const event = new CustomEvent(eventName, {
            detail: { ...detail, timestamp: Date.now() },
            bubbles: true
        });
        
        document.dispatchEvent(event);
    }
    
    // Public API
    getModule(name) {
        return this.modules.get(name) || window[name] || null;
    }
    
    isReady() {
        return this.isInitialized;
    }
    
    getConfig() {
        return { ...this.config };
    }
    
    updateConfig(newConfig) {
        this.config = { ...this.config, ...newConfig };
    }
    
    cleanup() {
        ['LoaderManager', 'AnimationManager', 'NavigationManager', 'DropdownManager', 'ThemeManager', 'Utils'].forEach(moduleName => {
            const module = window[moduleName];
            if (module && typeof module.destroy === 'function') {
                module.destroy();
            }
        });
        
        console.log('🧹 App cleanup completed');
    }
}

// ================================================================================================
// INITIALIZATION
// ================================================================================================

// Configure module loader
const moduleLoader = new ModuleLoader();

// You can customize the base path if needed
// moduleLoader.setBasePath('/assets/js/');

// Initialize the app
const app = new App();

// Export for global access
window.App = app;
window.ModuleLoader = moduleLoader;

// Development helpers
if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
    window.debug = {
        app: app,
        loader: moduleLoader,
        modules: () => moduleLoader.getLoadedModules(),
        reload: () => window.location.reload()
    };
    
    console.log('🛠️ Debug helpers available: window.debug');
}

// Service Worker registration (if available)
if ('serviceWorker' in navigator && window.location.protocol === 'https:') {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then((registration) => {
                console.log('🔧 Service Worker registered:', registration.scope);
            })
            .catch((error) => {
                console.log('❌ Service Worker registration failed:', error);
            });
    });
}

})();





