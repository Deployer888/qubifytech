<x-auth-layout>

    <x-slot name="title">
        @lang('Forgot Password')
    </x-slot>

    <!-- Session Status -->
        <x-auth.session-status class="mb-4" :status="session('status')" />

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

        /* Session status */
        .session-status {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: var(--success);
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 0.925rem;
            display: flex;
            align-items: center;
        }

        .session-status::before {
            content: '✓';
            margin-right: 0.5rem;
            font-weight: bold;
        }

        /* Validation errors */
        .validation-errors {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: var(--error);
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 0.925rem;
        }

        /* Form groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
            font-size: 0.925rem;
        }

        /* Input wrapper */
        .input-wrapper {
            position: relative;
        }

        /* Form inputs */
        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: var(--transition);
            background: var(--gray-50);
            color: var(--gray-900);
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .form-input::placeholder {
            color: var(--gray-400);
        }

        .form-input.error {
            border-color: var(--error);
            background: rgba(239, 68, 68, 0.05);
        }

        /* Submit button */
        .submit-btn {
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
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn.loading {
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

        /* Back to login link */
        .back-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-200);
        }

        .back-link p {
            color: var(--gray-600);
            font-size: 0.925rem;
        }

        .back-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .back-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Error states */
        .error-message {
            color: var(--error);
            font-size: 0.825rem;
            margin-top: 0.375rem;
            display: none;
        }

        .error-message.show {
            display: block;
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

        .shake {
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Info box for explanation */
        .info-box {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            color: var(--primary);
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 0.925rem;
            line-height: 1.5;
        }

        .info-box::before {
            content: 'ℹ️';
            margin-right: 0.5rem;
            font-size: 1.1em;
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
            
            .form-input {
                background: var(--gray-800);
                border-color: var(--gray-600);
                color: var(--white);
            }
            
            .form-input:focus {
                background: var(--gray-700);
            }
            
            .info-box {
                background: rgba(59, 130, 246, 0.15);
                border-color: rgba(59, 130, 246, 0.4);
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
        .submit-btn:focus,
        .form-input:focus,
        .back-link a:focus {
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
            <h1 class="brand-title">Reset Password</h1>
            <p class="brand-subtitle">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>
        </div>

        <div style="padding: 0 2rem 2rem;">
            <!-- Session Status -->
            <x-auth.session-status class="session-status" :status="session('status')" />

            <!-- Info Box -->
            <div class="info-box">
                Enter your email address below and we'll send you a secure link to reset your password. Check your inbox and spam folder.
            </div>

            <!-- Validation Errors -->
            <x-auth.validation-errors class="validation-errors" :errors="$errors" />

            <form method="POST" action="{{ route('password.email') }}" id="resetForm">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-wrapper">
                        <input 
                            id="email" 
                            class="form-input" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            placeholder="Enter your email address"
                            required 
                            autofocus 
                        />
                    </div>
                    <div class="error-message" id="emailError"></div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    <div class="btn-loader" id="btnLoader"></div>
                    <span id="btnText">{{ __('Email Password Reset Link') }}</span>
                </button>
            </form>

            <div class="back-link">
                <p>Remember your password? <a href="{{ route('login') }}">Back to Login</a></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation
            const form = document.getElementById('resetForm');
            const emailInput = document.getElementById('email');
            const submitBtn = document.getElementById('submitBtn');
            const btnLoader = document.getElementById('btnLoader');
            const btnText = document.getElementById('btnText');

            // Email validation
            function validateEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email.trim());
            }

            // Show error
            function showError(fieldName, message) {
                const input = document.getElementById(fieldName);
                const errorElement = document.getElementById(fieldName + 'Error');
                
                input.classList.add('error');
                errorElement.textContent = message;
                errorElement.classList.add('show');
            }

            // Clear error
            function clearError(fieldName) {
                const input = document.getElementById(fieldName);
                const errorElement = document.getElementById(fieldName + 'Error');
                
                input.classList.remove('error');
                errorElement.classList.remove('show');
                errorElement.textContent = '';
            }

            // Real-time validation
            emailInput.addEventListener('input', function() {
                clearError('email');
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                let isValid = true;

                // Validate email
                if (!emailInput.value.trim()) {
                    showError('email', 'Email address is required');
                    isValid = false;
                } else if (!validateEmail(emailInput.value)) {
                    showError('email', 'Please enter a valid email address');
                    isValid = false;
                }

                if (isValid) {
                    // Show loading state
                    submitBtn.classList.add('loading');
                    btnLoader.style.display = 'block';
                    btnText.textContent = 'Sending Reset Link...';
                    
                    // Submit form (remove preventDefault in real implementation)
                    // form.submit();
                    
                    // Simulate loading for demo
                    setTimeout(() => {
                        submitBtn.classList.remove('loading');
                        btnLoader.style.display = 'none';
                        btnText.textContent = 'Email Password Reset Link';
                        
                        // Show success message
                        const infoBox = document.querySelector('.info-box');
                        infoBox.style.background = 'rgba(16, 185, 129, 0.1)';
                        infoBox.style.borderColor = 'rgba(16, 185, 129, 0.3)';
                        infoBox.style.color = '#10b981';
                        infoBox.innerHTML = '✓ Password reset link has been sent to your email address. Please check your inbox and spam folder.';
                    }, 2000);
                } else {
                    // Shake form on error
                    form.classList.add('shake');
                    setTimeout(() => {
                        form.classList.remove('shake');
                    }, 500);
                }
            });

            // Add fade-in animation to form elements
            const formElements = document.querySelectorAll('.form-group, .info-box, .back-link');
            formElements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    el.style.transition = 'all 0.5s ease-out';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</x-auth-layout>