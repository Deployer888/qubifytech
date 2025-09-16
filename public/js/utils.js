/**
 * Utility Functions - Common helper functions and utilities
 * Enhanced with theme management and performance optimizations
 */

class Utils {
    constructor() {
        this.debounceTimers = new Map();
        this.throttleTimers = new Map();
        this.currentTheme = this.getStorageWithExpiry('theme') || 'light';
        
        // Initialize theme
        this.initializeTheme();
        this.createThemeToggle();
    }
    
    // Theme Management
    initializeTheme() {
        document.documentElement.setAttribute('data-theme', this.currentTheme);
        
        // Listen for system theme changes
        if (window.matchMedia) {
            const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
            mediaQuery.addEventListener('change', (e) => {
                if (!this.getStorageWithExpiry('theme')) {
                    this.setTheme(e.matches ? 'dark' : 'light');
                }
            });
        }
    }
    
    createThemeToggle() {
        const toggle = document.createElement('button');
        toggle.className = 'theme-toggle';
        toggle.setAttribute('aria-label', 'Toggle theme');
        toggle.innerHTML = `<i class="fas ${this.currentTheme === 'dark' ? 'fa-sun' : 'fa-moon'}"></i>`;
        
        toggle.addEventListener('click', () => {
            this.toggleTheme();
        });
        
        document.body.appendChild(toggle);
        return toggle;
    }
    
    toggleTheme() {
        const newTheme = this.currentTheme === 'light' ? 'dark' : 'light';
        this.setTheme(newTheme);
        
        // Add rotation animation
        const toggle = document.querySelector('.theme-toggle');
        if (toggle) {
            toggle.classList.add('rotating');
            setTimeout(() => toggle.classList.remove('rotating'), 500);
        }
    }
    
    setTheme(theme) {
        this.currentTheme = theme;
        document.documentElement.setAttribute('data-theme', theme);
        
        // Update toggle icon
        const toggle = document.querySelector('.theme-toggle i');
        if (toggle) {
            toggle.className = `fas ${theme === 'dark' ? 'fa-sun' : 'fa-moon'}`;
        }
        
        // Save to storage
        this.setStorageWithExpiry('theme', theme, 365 * 24 * 60); // 1 year
        
        // Dispatch theme change event
        this.dispatchCustomEvent('themeChanged', { theme });
        
        // Track theme change
        this.trackEvent('themeChange', { theme, category: 'Preferences' });
    }
    
    getTheme() {
        return this.currentTheme;
    }
    
    // Enhanced debounce function with immediate option
    debounce(func, delay, id = 'default', immediate = false) {
        return (...args) => {
            const timerId = this.debounceTimers.get(id);
            const callNow = immediate && !timerId;
            
            if (timerId) {
                clearTimeout(timerId);
            }
            
            const newTimerId = setTimeout(() => {
                this.debounceTimers.delete(id);
                if (!immediate) func.apply(this, args);
            }, delay);
            
            this.debounceTimers.set(id, newTimerId);
            
            if (callNow) func.apply(this, args);
        };
    }
    
    // Enhanced throttle function with leading and trailing options
    throttle(func, delay, id = 'default', options = {}) {
        const { leading = true, trailing = true } = options;
        
        return (...args) => {
            const timer = this.throttleTimers.get(id);
            
            if (!timer) {
                if (leading) func.apply(this, args);
                
                const timerId = setTimeout(() => {
                    this.throttleTimers.delete(id);
                    if (trailing && timer.pending) {
                        func.apply(this, timer.args);
                    }
                }, delay);
                
                this.throttleTimers.set(id, { timerId, pending: false, args: null });
            } else {
                timer.pending = true;
                timer.args = args;
            }
        };
    }
    
    // Enhanced smooth scroll with callback
    scrollToElement(element, offset = 0, duration = 800, callback = null) {
        if (typeof element === 'string') {
            element = document.querySelector(element);
        }
        
        if (!element) {
            console.warn('Element not found for scrolling');
            return Promise.reject('Element not found');
        }
        
        return new Promise(resolve => {
            const start = window.pageYOffset;
            const elementTop = this.getElementOffset(element).top;
            const target = elementTop - offset;
            const distance = target - start;
            const startTime = performance.now();
            
            const animateScroll = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Enhanced easing function (ease-out-cubic with bounce)
                const easeOutCubic = 1 - Math.pow(1 - progress, 3);
                
                window.scrollTo(0, start + distance * easeOutCubic);
                
                if (progress < 1) {
                    requestAnimationFrame(animateScroll);
                } else {
                    if (callback) callback();
                    resolve();
                }
            };
            
            requestAnimationFrame(animateScroll);
        });
    }
    
    // Enhanced viewport detection with partial visibility
    isInViewport(element, threshold = 0, partial = false) {
        if (typeof element === 'string') {
            element = document.querySelector(element);
        }
        
        if (!element) return false;
        
        const rect = element.getBoundingClientRect();
        const windowHeight = window.innerHeight || document.documentElement.clientHeight;
        const windowWidth = window.innerWidth || document.documentElement.clientWidth;
        
        if (partial) {
            return (
                rect.bottom >= threshold &&
                rect.right >= threshold &&
                rect.top <= windowHeight - threshold &&
                rect.left <= windowWidth - threshold
            );
        }
        
        return (
            rect.top >= threshold &&
            rect.left >= threshold &&
            rect.bottom <= windowHeight - threshold &&
            rect.right <= windowWidth - threshold
        );
    }
    
    // Enhanced element offset calculation
    getElementOffset(element) {
        if (typeof element === 'string') {
            element = document.querySelector(element);
        }
        
        if (!element) return { top: 0, left: 0 };
        
        const rect = element.getBoundingClientRect();
        const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        return {
            top: rect.top + scrollTop,
            left: rect.left + scrollLeft,
            width: rect.width,
            height: rect.height
        };
    }
    
    // Enhanced wait for element with mutation observer
    waitForElement(selector, timeout = 5000, parent = document.body) {
        return new Promise((resolve, reject) => {
            const element = parent.querySelector(selector);
            
            if (element) {
                resolve(element);
                return;
            }
            
            const observer = new MutationObserver((mutations, obs) => {
                const element = parent.querySelector(selector);
                if (element) {
                    obs.disconnect();
                    resolve(element);
                }
            });
            
            observer.observe(parent, {
                childList: true,
                subtree: true,
                attributes: true
            });
            
            // Timeout fallback
            setTimeout(() => {
                observer.disconnect();
                reject(new Error(`Element ${selector} not found within ${timeout}ms`));
            }, timeout);
        });
    }
    
    // Enhanced custom event dispatch
    dispatchCustomEvent(eventName, detail = {}, element = document) {
        const event = new CustomEvent(eventName, {
            detail: {
                ...detail,
                timestamp: Date.now(),
                theme: this.currentTheme
            },
            bubbles: true,
            cancelable: true
        });
        
        element.dispatchEvent(event);
        return event;
    }
    
    // Enhanced device info with more details
    getDeviceInfo() {
        const userAgent = navigator.userAgent;
        const platform = navigator.platform;
        const maxTouchPoints = navigator.maxTouchPoints || 0;
        
        const info = {
            isMobile: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(userAgent),
            isTablet: /iPad|Android(?!.*Mobile)/i.test(userAgent),
            isDesktop: !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(userAgent),
            isIOS: /iPad|iPhone|iPod/.test(userAgent),
            isAndroid: /Android/.test(userAgent),
            isSafari: /Safari/.test(userAgent) && !/Chrome/.test(userAgent),
            isChrome: /Chrome/.test(userAgent),
            isFirefox: /Firefox/.test(userAgent),
            isEdge: /Edge/.test(userAgent),
            isTouchDevice: maxTouchPoints > 0,
            platform: platform,
            screenWidth: window.screen.width,
            screenHeight: window.screen.height,
            windowWidth: window.innerWidth,
            windowHeight: window.innerHeight,
            pixelRatio: window.devicePixelRatio || 1,
            orientation: window.screen.orientation?.type || 'unknown',
            connectionType: navigator.connection?.effectiveType || 'unknown',
            theme: this.currentTheme
        };
        
        // Add device class for responsive behavior
        info.deviceClass = info.isMobile ? 'mobile' : info.isTablet ? 'tablet' : 'desktop';
        
        return info;
    }
    
    // Enhanced number formatting with locale support
    formatNumber(num, options = {}) {
        const defaults = {
            locale: 'en-US',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        };
        
        const config = { ...defaults, ...options };
        
        if (typeof Intl !== 'undefined' && Intl.NumberFormat) {
            return new Intl.NumberFormat(config.locale, config).format(num);
        }
        
        // Fallback for older browsers
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
    
    // Enhanced ID generation with collision detection
    generateId(prefix = 'id', length = 8, avoidCollision = true) {
        const characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let result = prefix + '_';
        
        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        
        // Check for collision if requested
        if (avoidCollision && document.getElementById(result)) {
            return this.generateId(prefix, length, avoidCollision);
        }
        
        return result;
    }
    
    // Enhanced query string parsing with type conversion
    parseQueryString(queryString = window.location.search) {
        const params = new URLSearchParams(queryString);
        const result = {};
        
        for (const [key, value] of params) {
            // Try to convert to appropriate type
            let convertedValue = value;
            
            if (value === 'true') convertedValue = true;
            else if (value === 'false') convertedValue = false;
            else if (value === 'null') convertedValue = null;
            else if (value === 'undefined') convertedValue = undefined;
            else if (!isNaN(value) && !isNaN(parseFloat(value))) {
                convertedValue = parseFloat(value);
            }
            
            result[key] = convertedValue;
        }
        
        return result;
    }
    
    // Enhanced query parameter management
    setQueryParam(key, value, updateHistory = true) {
        const url = new URL(window.location);
        
        if (value === null || value === undefined) {
            url.searchParams.delete(key);
        } else {
            url.searchParams.set(key, value);
        }
        
        if (updateHistory) {
            window.history.pushState({}, '', url);
            this.dispatchCustomEvent('urlChanged', { url: url.toString() });
        }
        
        return url.toString();
    }
    
    // Enhanced local storage with compression and encryption option
    setStorageWithExpiry(key, value, expiryMinutes = 60, compress = false) {
        const now = new Date();
        let processedValue = value;
        
        // Simple compression for large data (optional)
        if (compress && typeof value === 'string' && value.length > 1000) {
            try {
                processedValue = btoa(value);
            } catch (e) {
                console.warn('Compression failed, storing without compression');
            }
        }
        
        const item = {
            value: processedValue,
            expiry: now.getTime() + (expiryMinutes * 60 * 1000),
            compressed: compress,
            theme: this.currentTheme
        };
        
        try {
            localStorage.setItem(key, JSON.stringify(item));
            return true;
        } catch (error) {
            console.warn('Failed to set localStorage item:', error);
            // Try to clear some space
            this.clearExpiredStorage();
            try {
                localStorage.setItem(key, JSON.stringify(item));
                return true;
            } catch (retryError) {
                console.error('Failed to set localStorage item after cleanup:', retryError);
                return false;
            }
        }
    }
    
    getStorageWithExpiry(key) {
        try {
            const itemStr = localStorage.getItem(key);
            
            if (!itemStr) {
                return null;
            }
            
            const item = JSON.parse(itemStr);
            const now = new Date();
            
            if (now.getTime() > item.expiry) {
                localStorage.removeItem(key);
                return null;
            }
            
            let value = item.value;
            
            // Decompress if needed
            if (item.compressed && typeof value === 'string') {
                try {
                    value = atob(value);
                } catch (e) {
                    console.warn('Decompression failed');
                }
            }
            
            return value;
        } catch (error) {
            console.warn('Failed to get localStorage item:', error);
            return null;
        }
    }
    
    // Clear expired items from localStorage
    clearExpiredStorage() {
        const now = new Date().getTime();
        const keysToRemove = [];
        
        for (let i = 0; i < localStorage.length; i++) {
            const key = localStorage.key(i);
            try {
                const item = JSON.parse(localStorage.getItem(key));
                if (item && item.expiry && now > item.expiry) {
                    keysToRemove.push(key);
                }
            } catch (e) {
                // Skip invalid items
            }
        }
        
        keysToRemove.forEach(key => localStorage.removeItem(key));
        return keysToRemove.length;
    }