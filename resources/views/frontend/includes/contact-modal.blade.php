<style>
    /* Modal Styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(5px);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .modal-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .contact-modal {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        max-width: 550px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        transform: scale(0.7) translateY(50px);
        transition: all 0.3s ease;
        position: relative;
    }

    /* Mobile Modal Optimization */
    @media (max-width: 767px) {
        .contact-modal {
            width: 95%;
            max-width: none;
            margin: 20px;
            max-height: calc(100vh - 40px);
            border-radius: 16px;
            transform: scale(0.8) translateY(30px);
        }

        .modal-overlay.active .contact-modal {
            transform: scale(1) translateY(0);
        }

        .modal-header {
            padding: 20px 20px 16px;
            flex-direction: column !important;
            text-align: center;
        }

        .modal-icon {
            width: 50px !important;
            height: 50px !important;
            margin: 0 auto 16px !important;
            font-size: 20px !important;
        }

        .modal-title {
            font-size: 20px !important;
            margin-bottom: 8px !important;
            line-height: 1.3;
        }

        .modal-subtitle {
            font-size: 14px !important;
        }

        .modal-body {
            padding: 20px !important;
        }

        .modal-close {
            top: 15px;
            right: 15px;
            width: 36px;
            height: 36px;
        }

        .modal-close i {
            font-size: 16px;
        }
    }

    /* Large Mobile */
    @media (min-width: 425px) and (max-width: 767px) {
        .contact-modal {
            width: 92%;
            margin: 24px;
            max-height: calc(100vh - 48px);
            border-radius: 18px;
        }

        .modal-header {
            padding: 24px 24px 20px;
        }

        .modal-body {
            padding: 24px !important;
        }

        .modal-title {
            font-size: 22px !important;
        }

        .modal-subtitle {
            font-size: 15px !important;
        }
    }

    /* Tablet Modal */
    @media (min-width: 768px) and (max-width: 1023px) {
        .contact-modal {
            width: 85%;
            max-width: 600px;
            border-radius: 20px;
        }

        .modal-header {
            padding: 24px 32px 20px;
            flex-direction: row !important;
            text-align: left;
        }

        .modal-icon {
            margin: 0 24px 0 0 !important;
        }

        .modal-body {
            padding: 24px 32px !important;
        }
    }

    /* Desktop Modal */
    @media (min-width: 1024px) {
        .contact-modal {
            width: auto;
            max-width: 650px;
            min-width: 550px;
        }

        .modal-header {
            padding: 30px 40px 24px;
            flex-direction: row !important;
            text-align: left;
        }

        .modal-icon {
            margin: 0 30px 0 0 !important;
        }

        .modal-body {
            padding: 30px 40px !important;
        }
    }

    .modal-overlay.active .contact-modal {
        transform: scale(1) translateY(0);
    }

    .modal-close {
        position: absolute;
        top: 20px;
        right: 20px;
        background: #f1f5f9;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #64748b;
        z-index: 10;
    }

    .modal-close:hover {
        background: #e2e8f0;
        color: #475569;
        transform: scale(1.1);
    }

    .modal-header {
        /* text-align: center; */
        padding: 25px 40px 20px;
        border-bottom: 1px solid #e2e8f0;
    }

    .modal-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 30px;
        color: white;
        font-size: 24px;
    }

    .modal-title {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 10px;
        line-height: 1.3;
    }

    .modal-subtitle {
        color: #64748b;
        font-size: 16px;
        margin: 0;
    }

    .modal-body {
        padding: 30px 40px;
    }

    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1;
    }

    .form-group.full-width {
        width: 100%;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-label.required::after {
        content: '*';
        color: #ef4444;
        margin-left: 2px;
    }

    .form-label i {
        color: #3b82f6;
        font-size: 16px;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: max(16px, 1rem); /* Prevent iOS zoom */
        transition: all 0.3s ease;
        background: white;
        outline: none;
        min-height: 48px; /* Better touch targets */
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
        font-family: inherit;
    }

    .form-select {
        cursor: pointer;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 12px center;
        background-repeat: no-repeat;
        background-size: 16px;
        padding-right: 40px;
        appearance: none;
    }

    .submit-btn {
        width: 100%;
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        color: white;
        border: none;
        padding: 16px 24px;
        border-radius: 12px;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin: 30px 0 20px;
        min-height: 56px; /* Better touch target */
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
    }

    .trust-badges {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        text-align: center;
    }

    .trust-badge {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #059669;
        font-size: 14px;
        font-weight: 500;
    }

    .trust-badge i {
        font-size: 16px;
    }

    /* Mobile Form Optimization */
    @media (max-width: 767px) {
        .form-row {
            flex-direction: column;
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-label {
            font-size: 15px;
            margin-bottom: 6px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            font-size: 16px; /* Prevent zoom on iOS */
            padding: 14px 16px;
            border-radius: 10px;
            min-height: 50px;
        }

        .form-textarea {
            min-height: 100px;
        }

        .submit-btn {
            font-size: 16px;
            padding: 16px 24px;
            margin: 24px 0 16px;
            min-height: 52px;
        }

        .trust-badges {
            flex-direction: column;
            gap: 8px;
        }

        .trust-badge {
            font-size: 13px;
        }
    }

    /* Large Mobile */
    @media (min-width: 425px) and (max-width: 767px) {
        .form-input,
        .form-select,
        .form-textarea {
            padding: 15px 18px;
        }

        .submit-btn {
            font-size: 17px;
            padding: 17px 28px;
        }

        .trust-badges {
            flex-direction: row;
            gap: 12px;
        }
    }

    /* Tablet Form */
    @media (min-width: 768px) and (max-width: 1023px) {
        .form-row {
            flex-direction: row;
            gap: 20px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            padding: 13px 16px;
        }

        .submit-btn {
            font-size: 17px;
            padding: 16px 28px;
        }
    }

    /* Desktop Form */
    @media (min-width: 1024px) {
        .form-row {
            flex-direction: row;
            gap: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
        }
    }

    /* Enhanced Accessibility Features */
    .modal-close:focus,
    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus,
    .submit-btn:focus {
        outline: 3px solid #3b82f6;
        outline-offset: 2px;
    }

    .modal-close:focus-visible,
    .form-input:focus-visible,
    .form-select:focus-visible,
    .form-textarea:focus-visible,
    .submit-btn:focus-visible {
        outline: 3px solid #3b82f6;
        outline-offset: 2px;
    }

    /* Error states for form validation */
    .form-input.error,
    .form-select.error,
    .form-textarea.error {
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .error-message {
        color: #ef4444;
        font-size: 14px;
        margin-top: 4px;
        display: block;
    }

    /* Loading state for submit button */
    .submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }

    .submit-btn .spinner {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid #ffffff;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* Reduced Motion Support */
    @media (prefers-reduced-motion: reduce) {
        .contact-modal,
        .modal-close,
        .submit-btn,
        .form-input,
        .form-select,
        .form-textarea {
            transition: none !important;
            animation: none !important;
        }

        .modal-overlay.active .contact-modal {
            transform: scale(1) translateY(0) !important;
        }

        .submit-btn:hover {
            transform: none !important;
        }

        .spinner {
            animation: none !important;
        }
    }

    /* High Contrast Mode Support */
    @media (prefers-contrast: high) {
        .contact-modal {
            background: #ffffff !important;
            border: 3px solid #000000;
        }

        .modal-header {
            border-bottom: 2px solid #000000;
        }

        .modal-title {
            color: #000000 !important;
        }

        .modal-subtitle {
            color: #000000 !important;
        }

        .form-label {
            color: #000000 !important;
        }

        .form-input,
        .form-select,
        .form-textarea {
            border: 2px solid #000000 !important;
            background: #ffffff !important;
            color: #000000 !important;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #000000 !important;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.3) !important;
        }

        .submit-btn {
            background: #000000 !important;
            color: #ffffff !important;
            border: 2px solid #000000 !important;
        }

        .trust-badge {
            color: #000000 !important;
        }

        .modal-close {
            background: #ffffff !important;
            color: #000000 !important;
            border: 2px solid #000000 !important;
        }
    }

    /* Screen Reader Only Content */
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }
</style>

<!-- Contact Modal -->
<div class="modal-overlay" id="contactModal">
    <div class="contact-modal">
        <button class="modal-close" onclick="closeContactModal()">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="modal-header" style="display: flex;">
            <div class="modal-icon">
                <i class="fas fa-paper-plane"></i>
            </div>
            <div class="">
                <h2 class="modal-title">Start the Conversation</h2>
                <p class="modal-subtitle">We'll get back to you within 24 hours</p>
            </div>
        </div>
        
        <div class="modal-body">
            @include('frontend.includes.contact-form')
        </div>
    </div>
</div>

<script>

    // Modal functionality
    function openContactModal() {
        document.getElementById('contactModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeContactModal() {
        document.getElementById('contactModal').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('contactModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeContactModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeContactModal();
        }
    });

    // Form submission - Updated to use correct form ID
    document.addEventListener('DOMContentLoaded', function() {
        const leadForm = document.getElementById('leadForm');
        if (leadForm) {
            // The form already has its own submission handler in contact-form.blade.php
            // We just need to ensure modal closes on successful submission
            const originalSubmitHandler = leadForm.onsubmit;
            
            // Add modal close functionality to successful submissions
            const responseMessage = document.getElementById('responseMessage');
            if (responseMessage) {
                const observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.type === 'childList' || mutation.type === 'characterData') {
                            const message = responseMessage.textContent;
                            if (message.includes('successfully') || message.includes('Thank you')) {
                                setTimeout(() => {
                                    closeContactModal();
                                }, 2000);
                            }
                        }
                    });
                });
                observer.observe(responseMessage, { childList: true, characterData: true, subtree: true });
            }
        }
    });


    // Initialize typing animation immediately
    document.addEventListener('DOMContentLoaded', function() {
        const words = ['AI-Driven', 'Award-Winning', 'Solution Focused', 'Mission Critical'];
        const typingElement = document.getElementById('typingText');
        
        if (typingElement) {
            let wordIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            let isPaused = false;
    
            const typeEffect = () => {
                const currentWord = words[wordIndex];
                
                if (!isDeleting && !isPaused) {
                    typingElement.textContent = currentWord.substring(0, charIndex + 1);
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
                    typingElement.textContent = currentWord.substring(0, charIndex);
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
        
    });
</script>

        