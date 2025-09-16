// Fix Service Category Tabs - Simple and Effective Solution
console.log('Service tabs fix script loaded');

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing service tabs');
    
    // Initialize tabs when services section becomes active
    initServiceTabsWhenReady();
    
    // Also watch for when services section is clicked
    document.addEventListener('click', function(e) {
        if (e.target && e.target.getAttribute('data-section') === 'services') {
            console.log('Services section clicked, initializing tabs');
            setTimeout(initServiceTabsWhenReady, 300);
        }
    });
});

function initServiceTabsWhenReady() {
    // Try multiple times to find the tabs
    let attempts = 0;
    const maxAttempts = 20;
    
    function tryInit() {
        attempts++;
        console.log('Attempt', attempts, 'to initialize service tabs');
        
        const tabButtons = document.querySelectorAll('#serviceTabsAdmin .nav-link');
        const tabPanes = document.querySelectorAll('#serviceTabsContent .tab-pane');
        
        console.log('Found', tabButtons.length, 'tab buttons and', tabPanes.length, 'tab panes');
        
        if (tabButtons.length > 0 && tabPanes.length > 0) {
            setupServiceTabs(tabButtons, tabPanes);
            return;
        }
        
        if (attempts < maxAttempts) {
            setTimeout(tryInit, 200);
        } else {
            console.error('Could not find service tabs after', maxAttempts, 'attempts');
        }
    }
    
    tryInit();
}

function setupServiceTabs(tabButtons, tabPanes) {
    console.log('Setting up service tabs with', tabButtons.length, 'buttons');
    
    // Remove any existing event listeners by cloning
    tabButtons.forEach(function(button, index) {
        const newButton = button.cloneNode(true);
        button.parentNode.replaceChild(newButton, button);
    });
    
    // Get fresh references after cloning
    const freshButtons = document.querySelectorAll('#serviceTabsAdmin .nav-link');
    const freshPanes = document.querySelectorAll('#serviceTabsContent .tab-pane');
    
    // Add click handlers to fresh buttons
    freshButtons.forEach(function(button, index) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const targetId = this.getAttribute('data-bs-target');
            console.log('Service tab clicked:', targetId);
            
            // Remove active from all buttons
            freshButtons.forEach(function(btn) {
                btn.classList.remove('active');
            });
            
            // Hide all panes
            freshPanes.forEach(function(pane) {
                pane.classList.remove('show', 'active');
                pane.style.display = 'none';
            });
            
            // Activate clicked button
            this.classList.add('active');
            
            // Show target pane
            const targetPane = document.querySelector(targetId);
            if (targetPane) {
                targetPane.classList.add('show', 'active');
                targetPane.style.display = 'block';
                console.log('Activated pane:', targetId);
            } else {
                console.error('Target pane not found:', targetId);
            }
        });
    });
    
    // Set first tab as active by default
    if (freshButtons.length > 0 && freshPanes.length > 0) {
        // Reset all
        freshButtons.forEach(function(btn) {
            btn.classList.remove('active');
        });
        freshPanes.forEach(function(pane) {
            pane.classList.remove('show', 'active');
            pane.style.display = 'none';
        });
        
        // Activate first
        freshButtons[0].classList.add('active');
        freshPanes[0].classList.add('show', 'active');
        freshPanes[0].style.display = 'block';
        
        console.log('Service tabs initialized successfully - first tab activated');
    }
}

// Also try when window loads
window.addEventListener('load', function() {
    console.log('Window loaded, trying to initialize service tabs');
    setTimeout(initServiceTabsWhenReady, 500);
});