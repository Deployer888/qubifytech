// Final Fix for Service Category Tabs
console.log('Service tabs final fix loaded');

// Multiple initialization strategies
document.addEventListener('DOMContentLoaded', initServiceTabsFinal);
window.addEventListener('load', initServiceTabsFinal);

// Also initialize when services section is clicked
document.addEventListener('click', function(e) {
    if (e.target && e.target.getAttribute('data-section') === 'services') {
        console.log('Services section clicked, initializing tabs');
        setTimeout(initServiceTabsFinal, 200);
    }
});

function initServiceTabsFinal() {
    console.log('Attempting to initialize service tabs');
    
    // Try multiple times with different delays
    let attempts = 0;
    const maxAttempts = 15;
    
    function tryInitialize() {
        attempts++;
        console.log('Service tabs initialization attempt:', attempts);
        
        // Look for tab buttons and panes
        const tabButtons = document.querySelectorAll('#serviceTabsAdmin .nav-link');
        const tabPanes = document.querySelectorAll('#serviceTabsContent .tab-pane');
        
        console.log('Found tab buttons:', tabButtons.length, 'tab panes:', tabPanes.length);
        
        if (tabButtons.length > 0 && tabPanes.length > 0) {
            setupServiceTabsNow(tabButtons, tabPanes);
            return true;
        }
        
        if (attempts < maxAttempts) {
            setTimeout(tryInitialize, 300);
        } else {
            console.error('Failed to initialize service tabs after', maxAttempts, 'attempts');
        }
        
        return false;
    }
    
    tryInitialize();
}

function setupServiceTabsNow(tabButtons, tabPanes) {
    console.log('Setting up service tabs NOW with', tabButtons.length, 'buttons');
    
    // Clear any existing handlers by replacing elements
    tabButtons.forEach(function(button) {
        const newButton = button.cloneNode(true);
        button.parentNode.replaceChild(newButton, button);
    });
    
    // Get fresh references
    const freshButtons = document.querySelectorAll('#serviceTabsAdmin .nav-link');
    const freshPanes = document.querySelectorAll('#serviceTabsContent .tab-pane');
    
    console.log('Fresh buttons:', freshButtons.length, 'Fresh panes:', freshPanes.length);
    
    // Add click handlers
    freshButtons.forEach(function(button, index) {
        console.log('Adding click handler to button', index, button.textContent.trim());
        
        button.onclick = function(e) {
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
                console.log('Successfully activated pane:', targetId);
            } else {
                console.error('Could not find target pane:', targetId);
            }
        };
        
        // Also add addEventListener as backup
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const targetId = this.getAttribute('data-bs-target');
            console.log('Service tab clicked (addEventListener):', targetId);
            
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
                console.log('Successfully activated pane (addEventListener):', targetId);
            }
        });
    });
    
    // Set first tab as active by default
    if (freshButtons.length > 0 && freshPanes.length > 0) {
        console.log('Setting first tab as active by default');
        
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
        
        console.log('First tab activated successfully');
    }
    
    console.log('Service tabs setup completed successfully!');
}

// Additional fallback - try every 2 seconds for the first 10 seconds
let fallbackAttempts = 0;
const fallbackInterval = setInterval(function() {
    fallbackAttempts++;
    console.log('Fallback attempt:', fallbackAttempts);
    
    const buttons = document.querySelectorAll('#serviceTabsAdmin .nav-link');
    const panes = document.querySelectorAll('#serviceTabsContent .tab-pane');
    
    if (buttons.length > 0 && panes.length > 0) {
        console.log('Fallback found tabs, initializing...');
        setupServiceTabsNow(buttons, panes);
        clearInterval(fallbackInterval);
    } else if (fallbackAttempts >= 5) {
        console.log('Fallback giving up after 5 attempts');
        clearInterval(fallbackInterval);
    }
}, 2000);