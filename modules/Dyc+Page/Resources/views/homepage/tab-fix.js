// Service Category Tabs Fix
document.addEventListener('DOMContentLoaded', function() {
    // Initialize service category tabs
    const initServiceTabs = () => {
        const tabButtons = document.querySelectorAll('#serviceTabsAdmin .nav-link');
        const tabPanes = document.querySelectorAll('#serviceTabsContent .tab-pane');
        
        tabButtons.forEach((button, index) => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all buttons and panes
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabPanes.forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Show corresponding pane
                const targetId = this.getAttribute('data-bs-target');
                const targetPane = document.querySelector(targetId);
                if (targetPane) {
                    targetPane.classList.add('show', 'active');
                }
                
                console.log('Tab clicked:', targetId);
            });
        });
        
        console.log('Service tabs initialized');
    };
    
    // Initialize tabs after a short delay to ensure DOM is ready
    setTimeout(initServiceTabs, 500);
});