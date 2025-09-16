<script src="https://www.google.com/recaptcha/api.js?render=6Ld5MHcrAAAAAIOMb9fY0uVLeWgmWG4Y_4XeFIxJ"></script>
<!-- <form action="{{-- route('frontend.contact.submit') --}}" method="POST"> -->
<form class="contact-form" id="leadForm" action="https://crm.qubifytech.com/index.php/collect_leads/save" method="post">
    <!-- Hidden fields -->
    <input type="hidden" id="page_name" name="page_name" value="">
    <input type="hidden" id="page_url" name="page_url" value="">
    <input type="hidden" name="lead_source_id" value="5">
    <input type="hidden" id="recaptcha_token" name="g-recaptcha-response" value="">
    
    <div class="form-row">
        <div class="form-group">
            <label class="form-label required">
                <i class="fas fa-user"></i>
                FULL NAME
            </label>
            <input name="uname" id="uname" type="text" class="form-input" placeholder="Enter your full name" required>
        </div>
        <div class="form-group">
            <label class="form-label required">
                <i class="fas fa-envelope"></i>
                EMAIL ADDRESS
            </label>
            <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email address" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-phone"></i>
                CONTACT NUMBER
            </label>
            <input name="phone" id="phone" type="tel" class="form-input" placeholder="Enter your phone number">
        </div>
        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-cogs"></i>
                SOLUTIONS
            </label>
            <select class="form-select" name="solution" id="solution">
                <option value="">Select your solution</option>
                <option value="HRMS">HRMS (Human Resource Management system)</option>
                <option value="CRM">CRM (Customer Relationship Management)</option>
                <option value="VMS">VMS (Visitor Management System)</option>
                <option value="HIS">HIS (Hospital Information System)</option>
                <option value="POS">POS (Point Of Sale)</option>
                <option value="VPS">VPS (Vehicle Parking System)</option>
                <option value="VTS">VTS (Vehicle Tracking System)</option>
                <option value="on-demand">On-Demand Delivery Software</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="form-label">
            <i class="fas fa-dollar-sign"></i>
            BUDGET RANGE
        </label>
        <select class="form-select" name="budget" id="budget">
            <option value="">Select your budget range</option>
            <option value="0-5k">$0 - $5,000</option>
            <option value="5k-15k">$5,000 - $15,000</option>
            <option value="15k-50k">$15,000 - $50,000</option>
            <option value="50k-100k">$50,000 - $100,000</option>
            <option value="100k+">$100,000+</option>
            <option value="discuss">Let's Discuss</option>
        </select>
    </div>
    
    <div class="form-group">
        <label class="form-label required mt-4">
            <i class="fas fa-comment"></i>
            YOUR MESSAGE
        </label>
        <textarea name="message" id="message" class="form-textarea" placeholder="Tell us about your needs and how we can help you..." required></textarea>
    </div>
    
    <button class="submit-btn" id="submitBtn" type="submit">
        SUBMIT NOW
        <i class="fas fa-paper-plane"></i>
    </button>

    <div id="responseMessage" class="response-message my-2"></div>

    <div class="recaptcha-badge my-4 text-center">
        <i class="fas fa-shield-alt"></i>
        Protected by reCAPTCHA v3
    </div>
    
    <div class="trust-badges">
        <div class="trust-badge">
            <i class="fas fa-shield-alt"></i>
            Secure & Private
        </div>
        <div class="trust-badge">
            <i class="fas fa-clock"></i>
            24hr Response
        </div>
        <div class="trust-badge">
            <i class="fas fa-ban"></i>
            No Spam
        </div>
    </div>
</form>

    <!-- Hidden iframe for form submission -->
<iframe name="submitFrame" id="submitFrame" style="display: none;"></iframe>

<script>
    // Configuration
    const RECAPTCHA_SITE_KEY = '6Ld5MHcrAAAAAIOMb9fY0uVLeWgmWG4Y_4XeFIxJ';
    const RECAPTCHA_VERIFY_URL = '/api/verify-recaptcha';

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Set hidden field values
        const ogTitle = document.querySelector('meta[property="og:title"]')?.getAttribute('content') || document.title;
        const ogUrl = document.querySelector('meta[property="og:url"]')?.getAttribute('content') || window.location.href;
        
        document.getElementById('page_name').value = ogTitle;
        document.getElementById('page_url').value = ogUrl;

        // Add input event listeners for real-time validation clearing
        document.querySelectorAll('.form-input, .form-select, .form-textarea').forEach(field => {
            field.addEventListener('input', function() {
                this.classList.remove('error-border');
            });
        });
    });

    // Form validation
    function validateForm() {
        const fields = {
            uname: { required: true },
            email: { required: true, pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/ },
            message: { required: true }
        };

        let isValid = true;

        for (const [fieldId, rules] of Object.entries(fields)) {
            const field = document.getElementById(fieldId);
            const value = field.value.trim();

            if (rules.required && !value) {
                field.classList.add('error-border');
                isValid = false;
            } else if (rules.pattern && !rules.pattern.test(value)) {
                field.classList.add('error-border');
                isValid = false;
            }
        }

        return isValid;
    }

    // Execute reCAPTCHA v3
    function executeRecaptcha(action = 'contact_form') {
        return new Promise((resolve, reject) => {
            if (typeof grecaptcha === 'undefined') {
                reject(new Error('reCAPTCHA not loaded'));
                return;
            }

            grecaptcha.ready(function() {
                grecaptcha.execute(RECAPTCHA_SITE_KEY, { action: action })
                    .then(resolve)
                    .catch(reject);
            });
        });
    }

    // Show message
    function showMessage(message, type) {
        const responseMessage = document.getElementById('responseMessage');
        responseMessage.textContent = message;
        responseMessage.className = `response-message ${type}`;
        responseMessage.style.display = 'block';

        if (type === 'success') {
            setTimeout(() => {
                responseMessage.style.display = 'none';
            }, 10000);
        }

        responseMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // Reset button
    function resetButton(btn) {
        btn.disabled = false;
        btn.innerHTML = 'SUBMIT NOW <i class="fas fa-paper-plane"></i>';
    }

    // Handle form submission
    document.getElementById('leadForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const form = this;
        const submitBtn = document.getElementById('submitBtn');

        // Validate form
        if (!validateForm()) {
            showMessage('Please fill in all required fields correctly.', 'error');
            return;
        }

        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner"></span> Verifying...';
        showMessage('Processing your request...', 'loading');

        try {
            // Execute reCAPTCHA
            const token = await executeRecaptcha('contact_form');
            document.getElementById('recaptcha_token').value = token;

            submitBtn.innerHTML = '<span class="spinner"></span> Submitting...';

            // Submit form
            await submitForm(form);

            // Success
            showMessage('Thank you! Your message has been submitted successfully.', 'success');
            form.reset();
            
            // Reset hidden fields
            const ogTitle = document.querySelector('meta[property="og:title"]')?.getAttribute('content') || document.title;
            const ogUrl = document.querySelector('meta[property="og:url"]')?.getAttribute('content') || window.location.href;
            document.getElementById('page_name').value = ogTitle;
            document.getElementById('page_url').value = ogUrl;
            document.getElementById('recaptcha_token').value = '';

        } catch (error) {
            console.error('Submission error:', error);
            showMessage('Unable to submit form. Please try again or contact us directly.', 'error');
        } finally {
            resetButton(submitBtn);
        }
    });

    // Submit form with fallback methods
    async function submitForm(form) {
        // Try iframe submission first (works with CORS)
        try {
            await submitViaIframe(form);
            return;
        } catch (error) {
            console.log('Iframe submission failed, trying fetch...');
        }

        // Try fetch with no-cors
        try {
            const formData = new FormData(form);
            await fetch(form.action, {
                method: 'POST',
                body: formData,
                mode: 'no-cors'
            });
            return;
        } catch (error) {
            console.log('Fetch submission failed, using direct form submission...');
        }

        // Last resort: direct form submission
        const tempForm = form.cloneNode(true);
        tempForm.style.display = 'none';
        tempForm.target = '_blank';
        document.body.appendChild(tempForm);
        tempForm.submit();
        document.body.removeChild(tempForm);
    }

    // Submit via iframe
    function submitViaIframe(form) {
        return new Promise((resolve, reject) => {
            const iframe = document.getElementById('submitFrame');
            let timeout;

            const cleanup = () => {
                clearTimeout(timeout);
                iframe.onload = null;
                iframe.onerror = null;
            };

            iframe.onload = () => {
                cleanup();
                resolve();
            };

            iframe.onerror = () => {
                cleanup();
                reject(new Error('Iframe submission failed'));
            };

            timeout = setTimeout(() => {
                cleanup();
                reject(new Error('Submission timeout'));
            }, 10000);

            form.target = 'submitFrame';
            form.submit();
            form.target = '';
        });
    }
</script>

<script>
    // Set hidden field values
    document.addEventListener('DOMContentLoaded', function() {
        // Get OG title and URL
        const ogTitle = document.querySelector('meta[property="og:title"]')?.getAttribute('content') || document.title;
        const ogUrl = document.querySelector('meta[property="og:url"]')?.getAttribute('content') || window.location.href;
        
        // Set values to hidden inputs
        document.getElementById('page_name').value = ogTitle;
        document.getElementById('page_url').value = ogUrl;
        
        console.log('Page Name:', ogTitle);
        console.log('Page URL:', ogUrl);
    });

    // Form validation
    function validateForm() {
        const uName = document.getElementById('uname').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const solution = document.getElementById('solution').value.trim();
        const budget = document.getElementById('budget').value.trim();
        const message = document.getElementById('message').value.trim();
        
        // Clear previous error styles
        document.querySelectorAll('.form-control').forEach(field => {
            field.style.borderColor = '';
        });
        
        let isValid = true;
        
        if (!uName) {
            document.getElementById('uname').style.borderColor = '#dc3545';
            isValid = false;
        }
        
        if (!email) {
            document.getElementById('email').style.borderColor = '#dc3545';
            isValid = false;
        } else {
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('email').style.borderColor = '#dc3545';
                isValid = false;
            }
        }
        
        if (!phone) {
            document.getElementById('phone').style.borderColor = '#dc3545';
            isValid = false;
        }
        
        if (!solution) {
            document.getElementById('solution').style.borderColor = '#dc3545';
            isValid = false;
        }
        
        if (!budget) {
            document.getElementById('budget').style.borderColor = '#dc3545';
            isValid = false;
        }
        
        if (!message) {
            document.getElementById('message').style.borderColor = '#dc3545';
            isValid = false;
        }
        
        return isValid;
    }

    // Handle form submission with multiple methods
    document.getElementById('leadForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = document.getElementById('submitBtn');
        
        // Validate form
        if (!validateForm()) {
            showMessage('Please fill in all required fields correctly.', 'error');
            return;
        }
        
        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner"></span>Submitting...';
        showMessage('Submitting your request...', 'loading');
        
        // Try multiple submission methods
        attemptSubmission(form, submitBtn);
    });

    async function attemptSubmission(form, submitBtn) {
        const methods = [
            () => submitViaIframe(form),
            () => submitViaFetch(form),
            () => submitViaFormPost(form)
        ];
        
        for (let i = 0; i < methods.length; i++) {
            try {
                console.log(`Trying submission method ${i + 1}`);
                await methods[i]();
                
                // If we reach here, submission was successful
                showMessage('Thank you! Your message has been submitted successfully.', 'success');
                form.reset();
                
                // Reset hidden fields
                resetPageInfo();
                resetButton(submitBtn);
                return;
                
            } catch (error) {
                console.log(`Method ${i + 1} failed:`, error);
                
                if (i === methods.length - 1) {
                    // All methods failed
                    showMessage('Unable to submit form at the moment. Please try again later or contact us directly.', 'error');
                    resetButton(submitBtn);
                }
            }
        }
    }

    // Method 1: Submit via hidden iframe (most reliable for CORS)
    function submitViaIframe(form) {
        return new Promise((resolve, reject) => {
            const iframe = document.getElementById('submitFrame');
            
            // Set up iframe load handler
            const handleLoad = () => {
                setTimeout(() => {
                    iframe.removeEventListener('load', handleLoad);
                    resolve();
                }, 1000);
            };
            
            const handleError = () => {
                iframe.removeEventListener('error', handleError);
                iframe.removeEventListener('load', handleLoad);
                reject(new Error('Iframe submission failed'));
            };
            
            iframe.addEventListener('load', handleLoad);
            iframe.addEventListener('error', handleError);
            
            // Submit the form to iframe
            form.target = 'submitFrame';
            form.submit();
            
            // Timeout after 10 seconds
            setTimeout(() => {
                iframe.removeEventListener('load', handleLoad);
                iframe.removeEventListener('error', handleError);
                reject(new Error('Submission timeout'));
            }, 10000);
        });
    }

    // Method 2: Try fetch with no-cors mode
    async function submitViaFetch(form) {
        const formData = new FormData(form);
        
        const response = await fetch(form.action, {
            method: 'POST',
            body: formData,
            mode: 'no-cors', // This bypasses CORS but we can't read the response
            credentials: 'omit'
        });
        
        // With no-cors mode, we can't check the response, so we assume success
        return Promise.resolve();
    }

    // Method 3: Direct form submission
    function submitViaFormPost(form) {
        return new Promise((resolve) => {
            // Create a temporary form for direct submission
            const tempForm = form.cloneNode(true);
            tempForm.style.display = 'none';
            tempForm.target = '_blank';
            document.body.appendChild(tempForm);
            
            setTimeout(() => {
                tempForm.submit();
                document.body.removeChild(tempForm);
                resolve();
            }, 100);
        });
    }

    // Reset page info in hidden fields
    function resetPageInfo() {
        const ogTitle = document.querySelector('meta[property="og:title"]')?.getAttribute('content') || document.title;
        const ogUrl = document.querySelector('meta[property="og:url"]')?.getAttribute('content') || window.location.href;
        
        document.getElementById('page_name').value = ogTitle;
        document.getElementById('page_url').value = ogUrl;
    }

    // Reset button state
    function resetButton(submitBtn) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Submit';
    }

    // Function to show messages
    function showMessage(message, type) {
        const responseMessage = document.getElementById('responseMessage');
        responseMessage.innerHTML = message;
        responseMessage.className = `response-message ${type}`;
        responseMessage.style.display = 'block';
        responseMessage.style.display = 'block';
        
        // Auto-hide success messages after 5 seconds
        if (type === 'success') {
            setTimeout(() => {
                responseMessage.style.display = 'none';
            }, 10000);
        }
        
        // Scroll to message
        responseMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // Clear field styling on focus
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.form-control').forEach(field => {
            field.addEventListener('focus', function() {
                this.style.borderColor = '';
            });
        });
    });

    // Alternative: Direct form submission without AJAX (fallback)
    function fallbackSubmission() {
        const form = document.getElementById('leadForm');
        form.target = '_blank'; // Open in new tab
        form.submit();
        
        showMessage('Form submitted! Please check the new tab for confirmation.', 'success');
        form.reset();
        resetPageInfo();
    }
</script>
