/**
 * Loader Module - Handles page loading animations and progress
 */

class LoaderManager {
    constructor() {
        this.progressBar = document.getElementById('progressBar');
        this.loadingText = document.getElementById('loadingText');
        this.loader = document.getElementById('pageLoader');
        
        this.texts = [
            'Initializing AI Systems...',
            'Loading Neural Networks...',
            'Preparing Interface...',
            'Optimizing Performance...',
            'Almost Ready...'
        ];
        
        this.progress = 0;
        this.textIndex = 0;
        this.interval = null;
        
        this.init();
    }
    
    init() {
        // Prevent FOUC (Flash of Unstyled Content)
        document.documentElement.style.visibility = 'visible';
        
        // Start loader when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.start());
        } else {
            this.start();
        }
        
        // Ensure loader completes when page is fully loaded
        window.addEventListener('load', () => this.forceComplete());
    }
    
    start() {
        if (!this.loader || !this.progressBar || !this.loadingText) {
            console.warn('Loader elements not found');
            this.complete();
            return;
        }
        
        this.interval = setInterval(() => {
            this.updateProgress();
        }, 100);
    }
    
    updateProgress() {
        // Simulate realistic loading progress
        this.progress += Math.random() * 15 + 5;
        if (this.progress > 100) this.progress = 100;

        this.progressBar.style.width = this.progress + '%';

        // Update loading text based on progress
        const newTextIndex = Math.floor((this.progress / 100) * (this.texts.length - 1));
        if (newTextIndex !== this.textIndex && newTextIndex < this.texts.length) {
            this.textIndex = newTextIndex;
            this.loadingText.textContent = this.texts[this.textIndex];
        }

        if (this.progress >= 100) {
            this.complete();
        }
    }
    
    complete() {
        if (this.interval) {
            clearInterval(this.interval);
            this.interval = null;
        }
        
        if (this.loadingText) {
            this.loadingText.textContent = 'Ready!';
        }
        
        setTimeout(() => {
            this.hide();
        }, 800);
    }
    
    forceComplete() {
        // Fallback to ensure loader is removed even if other methods fail
        setTimeout(() => {
            if (this.loader && this.loader.style.display !== 'none') {
                if (this.progressBar) this.progressBar.style.width = '100%';
                if (this.loadingText) this.loadingText.textContent = 'Ready!';
                
                setTimeout(() => {
                    this.hide();
                }, 500);
            }
        }, 1500);
    }
    
    hide() {
        if (!this.loader) return;
        
        this.loader.style.opacity = '0';
        
        setTimeout(() => {
            this.loader.style.display = 'none';
            document.body.classList.add('loaded');
            
            // Trigger animations initialization
            if (window.AnimationManager) {
                window.AnimationManager.initialize();
            }
            
            // Dispatch custom event for other modules
            document.dispatchEvent(new CustomEvent('loaderComplete'));
        }, 500);
    }
    
    // Public method to manually complete loader
    forceHide() {
        this.complete();
    }
}

// Initialize loader
const loaderManager = new LoaderManager();

// Export for other modules
window.LoaderManager = loaderManager;