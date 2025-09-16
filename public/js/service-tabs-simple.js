// Simple Service Tabs Fix - Load this after the page is ready
window.addEventListener('load', function() {
    console.log('Simple service tabs script loaded');
    
    // Wait a bit for everything to be ready
    setTimeout(function() {
        initServiceTabsSimple();
    }, 1000);
});

function initServiceTabsSimple() {
    console.log('Initializing simple service tabs');
    
    // Find all service tab buttons
    const tabButtons = document.querySelectorAll('#serviceTabsAdmin button[data-bs-target]');
    const tabPanes = document.querySelectorAll('#serviceTabsContent .tab-pane');
    
    console.log('Found', tabButtons.length, 'tab buttons and', tabPanes.length, 'tab panes');
    
    if (tabButtons.length === 0) {
        console.log('No service tab buttons found, trying alternative selector');
        const altButtons = document.querySelectorAll('#serviceTabsAdmin .nav-link');
        console.log('Found', altButtons.length, 'alternative buttons');
        return;
    }
    
    // Add click handler to each button
    tabButtons.forEach(function(button, index) {
        button.onclick = function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('data-bs-target');
            console.log('Clicked tab button for:', targetId);
            
            // Hide all tab panes
            tabPanes.forEach(function(pane) {
                pane.style.display = 'none';
                pane.classList.remove('active', 'show');
            });
            
            // Remove active class from all buttons
            tabButtons.forEach(function(btn) {
                btn.classList.remove('active');
            });
            
            // Show target pane
            const targetPane = document.querySelector(targetId);
            if (targetPane) {
                targetPane.style.display = 'block';
                targetPane.classList.add('active', 'show');
                console.log('Showed pane:', targetId);
            }
            
            // Add active class to clicked button
            this.classList.add('active');
        };
    });
    
    // Show first tab by default
    if (tabButtons.length > 0 && tabPanes.length > 0) {
        tabPanes.forEach(function(pane) {
            pane.style.display = 'none';
            pane.classList.remove('active', 'show');
        });
        
        tabButtons.forEach(function(btn) {
            btn.classList.remove('active');
        });
        
        tabButtons[0].classList.add('active');
        tabPanes[0].style.display = 'block';
        tabPanes[0].classList.add('active', 'show');
        
        console.log('Set first tab as active');
    }
    
    console.log('Simple service tabs initialized');
}

// Also try when services section becomes visible
document.addEventListener('click', function(e) {
    if (e.target && e.target.getAttribute('data-section') === 'services') {
        console.log('Services section clicked, reinitializing tabs');
        setTimeout(initServiceTabsSimple, 500);
    }
});