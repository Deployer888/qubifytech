<x-auth-layout>

    <x-slot name="title">
        @lang('Email Verification')
    </x-slot>

    <style>
        /* Import Inter font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        /* CSS Variables */
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #3b82f6;
            --success: #10b981;
            --error: #ef4444;
            --warning: #f59e0b;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --white: #ffffff;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Body and base styles */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #0d6efd 0%, #764ba2 50%, #f093fb 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow: hidden;
            position: relative;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating shapes animation */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
            animation: pulseShapes 8s ease-in-out infinite;
        }

        @keyframes pulseShapes {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.1); }
        }

        /* Animated particles */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(2px 2px at 20% 30%, rgba(255, 255, 255, 0.4), transparent),
                radial-gradient(2px 2px at 40% 70%, rgba(255, 255, 255, 0.3), transparent),
                radial-gradient(1px 1px at 60% 30%, rgba(255, 255, 255, 0.5), transparent),
                radial-gradient(1px 1px at 80% 60%, rgba(255, 255, 255, 0.4), transparent),
                radial-gradient(2px 2px at 90% 40%, rgba(255, 255, 255, 0.3), transparent),
                radial-gradient(1px 1px at 30% 80%, rgba(255, 255, 255, 0.5), transparent);
            background-size: 200px 200px, 300px 300px, 150px 150px, 250px 250px, 180px 180px, 220px 220px;
            animation: starField 20s linear infinite;
            pointer-events: none;
            z-index: 1;
        }

        @keyframes starField {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-200px, -200px) rotate(360deg); }
        }

        /* Floating geometric shapes */
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .shape-1 {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            top: 10%;
            left: 10%;
            animation: float1 15s ease-in-out infinite;
        }

        .shape-2 {
            width: 60px;
            height: 60px;
            top: 20%;
            right: 15%;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            animation: float2 12s ease-in-out infinite reverse;
        }

        .shape-3 {
            width: 100px;
            height: 100px;
            border-radius: 20px;
            bottom: 20%;
            left: 20%;
            animation: float3 18s ease-in-out infinite;
        }

        .shape-4 {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            top: 60%;
            right: 25%;
            animation: float4 14s ease-in-out infinite;
        }

        .shape-5 {
            width: 90px;
            height: 90px;
            bottom: 10%;
            right: 10%;
            clip-path: polygon(20% 0%, 80% 0%, 100% 60%, 80% 100%, 20% 100%, 0% 60%);
            animation: float5 16s ease-in-out infinite reverse;
        }

        @keyframes float1 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        @keyframes float2 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(-40px, 30px) rotate(180deg); }
        }

        @keyframes float3 {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            25% { transform: translate(20px, -40px) rotate(90deg) scale(1.1); }
            50% { transform: translate(-30px, -20px) rotate(180deg) scale(0.9); }
            75% { transform: translate(40px, 10px) rotate(270deg) scale(1.05); }
        }

        @keyframes float4 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(-25px, -35px) rotate(-120deg); }
            66% { transform: translate(35px, 25px) rotate(-240deg); }
        }

        @keyframes float5 {
            0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
            50% { transform: translate(-50px, -40px) rotate(180deg) scale(1.2); }
        }

        /* Grid overlay */
        .grid-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 25s linear infinite;
            pointer-events: none;
            z-index: 1;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        /* Auth layout container */
        .min-h-screen {
            position: relative;
            z-index: 2;
        }

        /* Card container */
        .sm\:max-w-md {
            max-width: 28rem;
            margin: 0 auto;
            padding: 1.5rem;
        }

        .bg-white {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-xl);
            border-radius: 1.5rem;
            overflow: hidden;
            position: relative;
        }

        /* Logo styling */
        .w-20 {
            width: 5rem;
            height: 5rem;
            margin: 0 auto 2rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-lg);
            transform: rotate(-5deg);
            transition: var(--transition);
        }

        .w-20:hover {
            transform: rotate(0deg) scale(1.05);
        }

        /* Brand title */
        .brand-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(37, 99, 235, 0.1);
        }

        .brand-subtitle {
            text-align: center;
            color: var(--gray-600);
            margin-bottom: 2rem;
            font-size: 1rem;
            line-height: 1.5;
        }

        /* Email icon */
        .email-icon {
            width: 4rem;
            height: 4rem;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-lg);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Info message */
        .info-message {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: var(--primary);
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 0.925rem;
            line-height: 1.6;
            text-align: center;
        }

        /* Success message */
        .success-message {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: var(--success);
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 0.925rem;
            line-height: 1.6;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success-message::before {
            content: '✓';
            margin-right: 0.5rem;
            font-weight: bold;
            font-size: 1.1em;
        }

        /* Action buttons container */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        /* Primary button */
        .primary-btn {
            width: 100%;
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--white);
            border: none;
            border-radius: 0.75rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 52px;
            text-decoration: none;
        }

        .primary-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .primary-btn:hover::before {
            left: 100%;
        }

        .primary-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .primary-btn:active {
            transform: translateY(0);
        }

        .primary-btn.loading {
            pointer-events: none;
        }

        .btn-loader {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--white);
            animation: spin 1s linear infinite;
            margin-right: 0.5rem;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Secondary button */
        .secondary-btn {
            background: none;
            border: none;
            color: var(--gray-600);
            font-size: 0.925rem;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: underline;
            padding: 0.5rem;
        }

        .secondary-btn:hover {
            color: var(--gray-900);
        }

        /* Separator */
        .separator {
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
        }

        .separator::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--gray-200);
        }

        .separator span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 1rem;
            color: var(--gray-500);
            font-size: 0.875rem;
            position: relative;
            z-index: 1;
        }

        /* Animation classes */
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Email bounce animation */
        .email-bounce {
            animation: emailBounce 1s ease-out;
        }

        @keyframes emailBounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        /* Responsive design */
        @media (max-width: 640px) {
            .sm\:max-w-md {
                padding: 1rem;
            }
            
            .bg-white {
                border-radius: 1rem;
            }
            
            .brand-title {
                font-size: 2rem;
            }
            
            .action-buttons {
                gap: 0.75rem;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .bg-white {
                background: rgba(31, 41, 55, 0.95);
                color: var(--gray-100);
            }
            
            .brand-title {
                color: var(--primary-light);
            }
            
            .info-message {
                background: rgba(59, 130, 246, 0.15);
                border-color: rgba(59, 130, 246, 0.4);
            }
            
            .separator span {
                background: rgba(31, 41, 55, 0.95);
            }
        }

        /* Accessibility improvements */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Focus styles for accessibility */
        .primary-btn:focus,
        .secondary-btn:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
    </style>

    {{-- Add this right after the opening <x-auth-layout> tag --}}
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <div class="shape shape-5"></div>
    </div>

    <div class="grid-overlay"></div>

    <div class="bg-white overflow-hidden shadow-xl" style="max-width: 45rem; margin: 5rem auto; position: relative; z-index: 10;">
        <!-- Logo and Branding -->
        <div style="text-align: center; padding: 2rem 2rem 0;">
            <a href="/">
                <div class="w-20">
                    <svg fill="currentColor" viewBox="0 0 20 20" style="width: 2.5rem; height: 2.5rem; color: white;">
                        <path fill-rule="evenodd" d="M10 2L3 7v11h14V7l-7-5zM8 15v-3h4v3H8z" clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
            <h1 class="brand-title">Verify Your Email</h1>
            <p class="brand-subtitle">
                We're almost there! Please check your email and click the verification link to complete your registration.
            </p>
        </div>

        <div style="padding: 0 2rem 2rem;">
            <!-- Email Icon -->
            <div class="email-icon" id="emailIcon">
                <svg fill="currentColor" viewBox="0 0 20 20" style="width: 2rem; height: 2rem; color: white;">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
            </div>

            <!-- Main Info Message -->
            <div class="info-message" id="infoMessage">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            <!-- Success Message (if verification link was sent) -->
            @if (session('status') == 'verification-link-sent')
                <div class="success-message">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="action-buttons">
                <form method="POST" action="{{ route('verification.send') }}" id="resendForm">
                    @csrf
                    <button type="submit" class="primary-btn" id="resendBtn">
                        <div class="btn-loader" id="btnLoader"></div>
                        <span id="btnText">{{ __('Resend Verification Email') }}</span>
                    </button>
                </form>
            </div>

            <div class="separator">
                <span>or</span>
            </div>

            <!-- Logout Form -->
            <div style="text-align: center;">
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="secondary-btn">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>

            <!-- Additional Help -->
            <div style="text-align: center; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                <p style="color: var(--gray-500); font-size: 0.875rem;">
                    Still having trouble? Check your spam folder or 
                    <a href="mailto:support@qubify.com" style="color: var(--primary); text-decoration: none; font-weight: 500;">contact support</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resendForm = document.getElementById('resendForm');
            const resendBtn = document.getElementById('resendBtn');
            const btnLoader = document.getElementById('btnLoader');
            const btnText = document.getElementById('btnText');
            const emailIcon = document.getElementById('emailIcon');
            const infoMessage = document.getElementById('infoMessage');

            // Handle resend form submission
            resendForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading state
                resendBtn.classList.add('loading');
                btnLoader.style.display = 'block';
                btnText.textContent = 'Sending Email...';
                resendBtn.style.pointerEvents = 'none';
                
                // Add bounce animation to email icon
                emailIcon.classList.add('email-bounce');
                
                // Submit form (remove preventDefault in real implementation)
                // this.submit();
                
                // Simulate sending for demo
                setTimeout(() => {
                    // Reset button state
                    resendBtn.classList.remove('loading');
                    btnLoader.style.display = 'none';
                    btnText.textContent = 'Resend Verification Email';
                    resendBtn.style.pointerEvents = 'auto';
                    
                    // Show success message
                    const successDiv = document.createElement('div');
                    successDiv.className = 'success-message fade-in';
                    successDiv.innerHTML = '✓ A new verification link has been sent to your email address. Please check your inbox and spam folder.';
                    
                    // Insert after info message
                    infoMessage.parentNode.insertBefore(successDiv, infoMessage.nextSibling);
                    
                    // Remove bounce animation
                    emailIcon.classList.remove('email-bounce');
                    
                    // Auto-remove success message after 10 seconds
                    setTimeout(() => {
                        if (successDiv.parentNode) {
                            successDiv.style.opacity = '0';
                            setTimeout(() => {
                                if (successDiv.parentNode) {
                                    successDiv.parentNode.removeChild(successDiv);
                                }
                            }, 300);
                        }
                    }, 10000);
                    
                }, 2000);
            });

            // Auto-check for email verification (simulate checking every 5 seconds)
            let checkCount = 0;
            const maxChecks = 12; // Check for 1 minute
            
            function checkVerification() {
                if (checkCount >= maxChecks) return;
                
                checkCount++;
                
                // In real implementation, make AJAX call to check verification status
                // For demo, we'll just show a message after some time
                if (checkCount === 6) { // After 30 seconds
                    const checkingDiv = document.createElement('div');
                    checkingDiv.className = 'info-message fade-in';
                    checkingDiv.style.background = 'rgba(245, 158, 11, 0.1)';
                    checkingDiv.style.borderColor = 'rgba(245, 158, 11, 0.3)';
                    checkingDiv.style.color = 'var(--warning)';
                    checkingDiv.innerHTML = '⏱️ Still waiting for verification? Make sure to check your spam folder, and try resending the email if needed.';
                    
                    infoMessage.parentNode.insertBefore(checkingDiv, infoMessage.nextSibling);
                }
            }
            
            // Start checking
            const verificationCheck = setInterval(checkVerification, 5000);
            
            // Stop checking after max attempts
            setTimeout(() => {
                clearInterval(verificationCheck);
            }, maxChecks * 5000);

            // Add fade-in animation to elements
            const animatedElements = document.querySelectorAll('.info-message, .action-buttons, .separator');
            animatedElements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.5s ease-out';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100 + 200);
            });

            // Add pulse effect to email icon on page load
            setTimeout(() => {
                emailIcon.style.animation = 'pulse 2s ease-in-out infinite';
            }, 500);
        });
    </script>
</x-auth-layout>