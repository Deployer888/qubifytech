// Service Category Tabs Functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('Service tabs script loaded');
    
    // Initialize tabs with multiple retry attempts
    let retryCount = 0;
    const maxRetries = 10;
    
    function initServiceTabs() {
        const tabButtons = document.querySelectorAll('#serviceTabsAdmin .nav-link');
        const tabPanes = document.querySelectorAll('#serviceTabsContent .tab-pane');
        
        console.log('Attempt', retryCount + 1, '- Found tab buttons:', tabButtons.length, 'tab panes:', tabPanes.length);
        
        if ((tabButtons.length === 0 || tabPanes.length === 0) && retryCount < maxRetries) {
            retryCount++;
            console.log('Service tabs not found, retrying in 500ms...');
            setTimeout(initServiceTabs, 500);
            return;
        }
        
        if (tabButtons.length === 0 || tabPanes.length === 0) {
            console.error('Service tabs could not be found after', maxRetries, 'attempts');
            return;
        }
        
        // Remove any existing event listeners
        tabButtons.forEach(button => {
            button.replaceWith(button.cloneNode(true));
        });
        
        // Get fresh references after cloning
        const freshTabButtons = document.querySelectorAll('#serviceTabsAdmin .nav-link');
        const freshTabPanes = document.querySelectorAll('#serviceTabsContent .tab-pane');
        
        // Add click event to each tab button
        freshTabButtons.forEach((button, index) => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const targetId = this.getAttribute('data-bs-target');
                console.log('Tab clicked:', targetId);
                
                // Remove active class from all buttons
                freshTabButtons.forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Remove active class from all panes
                freshTabPanes.forEach(pane => {
                    pane.classList.remove('show', 'active');
                    pane.style.display = 'none';
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show corresponding pane
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
        
        // Ensure first tab is active by default
        if (freshTabButtons.length > 0 && freshTabPanes.length > 0) {
            // Reset all first
            freshTabButtons.forEach(btn => btn.classList.remove('active'));
            freshTabPanes.forEach(pane => {
                pane.classList.remove('show', 'active');
                pane.style.display = 'none';
            });
            
            // Activate first
            freshTabButtons[0].classList.add('active');
            freshTabPanes[0].classList.add('show', 'active');
            freshTabPanes[0].style.display = 'block';
            console.log('Set first tab as active');
        }
        
        console.log('Service tabs initialized successfully with', freshTabButtons.length, 'tabs');
    }
    
    // Start initialization
    setTimeout(initServiceTabs, 100);
    
    // Also try when the services section becomes visible
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                const target = mutation.target;
                if (target.id === 'services-content' && target.classList.contains('active')) {
                    console.log('Services section became active, reinitializing tabs');
                    setTimeout(initServiceTabs, 100);
                }
            }
        });
    });
    
    // Observe the services content section
    const servicesContent = document.getElementById('services-content');
    if (servicesContent) {
        observer.observe(servicesContent, { attributes: true });
    }
});