<style>
    /* Professional Enhanced Footer Styles */
    .enhanced-footer {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        color: #ffffff;
        position: relative;
        overflow: hidden;
        margin-top: 0;
        padding: 0;
        border-top: 1px solid rgba(148, 163, 184, 0.1);
    }

    .enhanced-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, #0ea5e9, transparent);
        opacity: 0.6;
    }

    .footer-container {
        margin: 0 4px;
        padding: 0 16px;
        position: relative;
        z-index: 2;
    }

    @media (min-width: 640px) {
        .footer-container {
            padding: 0 24px;
        }
    }

    @media (min-width: 1024px) {
        .footer-container {
            padding: 0 32px;
        }
    }

    /* Base Mobile-First Styles */
    .footer-main {
        display: block;
        padding: 40px 0 30px;
        text-align: center;
    }

    .footer-column {
        display: flex;
        flex-direction: column;
        margin-bottom: 32px;
        text-align: center;
        width: 100%;
    }

    /* Brand Column */
    .brand-column {
        max-width: 100%;
        margin: 0 auto 32px;
    }

    .footer-logo {
        margin-bottom: 24px;
        position: relative;
        justify-items: center;
    }

    .logo-img {
        height: 45px;
        width: auto;
        filter: brightness(1.3) contrast(1.1);
        transition: all 0.3s ease;
    }

    .logo-img:hover {
        filter: brightness(1.5) contrast(1.2);
        transform: scale(1.05);
    }

    .company-description {
        color: #e2e8f0;
        line-height: 1.8;
        margin-bottom: 32px;
        font-size: 16px;
        font-weight: 400;
        letter-spacing: 0.3px;
        max-width: 350px;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin: 20px 0;
    }

    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        color: #ffffff;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .social-link:hover {
        background: transparent;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(14, 165, 233, 0.4);
        color: #ffffff;
    }

    .social-link i {
        font-size: 18px;
    }

    /* Professional Footer Titles */
    .footer-title {
        font-size: 20px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 28px;
        position: relative;
        padding-bottom: 16px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .footer-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, #0ea5e9, #2563eb, #7c3aed);
        border-radius: 3px;
        box-shadow: 0 2px 8px rgba(14, 165, 233, 0.3);
    }

    /* Footer Links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        margin-bottom: 15px;
    }

    .footer-links li {
        margin-bottom: 12px;
    }

    .footer-links a {
        color: #cbd5e1;
        text-decoration: none;
        font-size: 15px;
        line-height: 1.7;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-block;
        position: relative;
        padding: 8px 12px;
        border-radius: 8px;
        font-weight: 400;
        letter-spacing: 0.2px;
    }

    .footer-links a:hover {
        color: #ffffff;
        background: linear-gradient(135deg, rgba(14, 165, 233, 0.15), rgba(59, 130, 246, 0.1));
        transform: translateX(2px);
        box-shadow: 0 2px 8px rgba(14, 165, 233, 0.2);
    }

    .footer-links a::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #0ea5e9, #3b82f6);
        transition: width 0.3s ease;
        border-radius: 1px;
    }

    /* Consultation CTA */

    .consultation-btn {
        background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
        color: #ffffff;
        border: none;
        padding: 14px 24px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: center;
        box-shadow: 0 6px 25px rgba(14, 165, 233, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .consultation-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .consultation-btn:hover::before {
        left: 100%;
    }

    .consultation-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(14, 165, 233, 0.6);
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .consultation-btn i {
        font-size: 16px;
        transition: transform 0.3s ease;
    }

    .consultation-btn:hover i {
        transform: scale(1.1);
    }

    /* Professional Contact Info Styles */

    .contact-item {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
        color: #e2e8f0;
        font-size: 15px;
        line-height: 1.6;
        padding: 8px 12px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .contact-item:hover {
        background: rgba(14, 165, 233, 0.05);
        transform: translateX(2px);
    }

    .contact-item i {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(14, 165, 233, 0.2), rgba(59, 130, 246, 0.15));
        border-radius: 50%;
        color: #0ea5e9;
        font-size: 12px;
        margin-right: 14px;
        flex-shrink: 0;
        border: 1px solid rgba(14, 165, 233, 0.3);
    }

    .contact-info {
        margin: 0;
    }

    .contact-item a {
        color: #e2e8f0;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .contact-item a:hover {
        color: #ffffff;
        text-shadow: 0 0 8px rgba(14, 165, 233, 0.3);
    }

    /* Address Styles */
    .footer-address {
        margin-bottom: 24px;
        padding: 16px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
        border-left: 3px solid #0ea5e9;
        width: fit-content;
    }

    .address-title {
        font-size: 16px;
        font-weight: 600;
        color: #ffffff;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .address-title i {
        color: #0ea5e9;
        font-size: 16px;
    }

    .address-text {
        color: #cccccc;
        font-size: 14px;
        line-height: 1.6;
        margin: 0;
    }

    /* Professional Visual Enhancements */
    .footer-column {
        position: relative;
    }

    .footer-column::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 1px;
        height: 0;
        /* background: linear-gradient(180deg, transparent, rgba(14, 165, 233, 0.3), transparent); */
        transition: height 0.3s ease;
    }

    .footer-column:hover::before {
        height: 100%;
    }

    /* Enhanced Brand Column */
    .brand-column {
        position: relative;
        padding: 20px;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.02);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .brand-column:hover {
        background: rgba(255, 255, 255, 0.05);
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(14, 165, 233, 0.1);
    }

    /* Professional Typography */
    .footer-links li {
        position: relative;
        overflow: hidden;
    }

    .footer-links li::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 1px;
        background: linear-gradient(90deg, #0ea5e9, #3b82f6);
        transition: width 0.3s ease;
    }

    .footer-links li:hover::after {
        width: 100%;
    }

    /* Footer Bottom */
    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding: 32px 0;
    }

    .footer-bottom-content {
        text-align: center;
    }

    .footer-bottom-content p {
        color: #999999;
        margin: 0;
        font-size: 14px;
    }

    /* Background Decoration */
    .footer-bg-decoration {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
        overflow: hidden;
    }

    .bg-shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(14, 165, 233, 0.05);
        filter: blur(40px);
    }

    .shape-1 {
        width: 300px;
        height: 300px;
        top: -150px;
        right: -150px;
        animation: float 8s ease-in-out infinite;
    }

    .shape-2 {
        width: 200px;
        height: 200px;
        bottom: -100px;
        left: -100px;
        animation: float 8s ease-in-out infinite reverse;
        animation-delay: 2s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(5deg);
        }
    }

    /* Simplified Responsive Design */

    /* Mobile Devices (up to 767px) */
    @media (max-width: 767px) {
        .footer-container {
            padding: 0 16px;
        }

        .footer-main {
            display: block !important;
            padding: 40px 0 30px !important;
            text-align: center !important;
        }

        .footer-column {
            margin-bottom: 32px !important;
            text-align: center !important;
            width: 100% !important;
        }

        .brand-column {
            max-width: 100% !important;
            margin: 0 auto 32px !important;
        }

        .footer-title {
            font-size: 18px !important;
            margin-bottom: 20px !important;
        }

        .footer-title::after {
            left: 50% !important;
            transform: translateX(-50%) !important;
            width: 40px !important;
        }

        .footer-links a {
            font-size: 16px !important;
            padding: 12px 16px !important;
            display: block !important;
            min-height: 44px !important;
            border-radius: 8px !important;
            text-align: center !important;
        }

        .footer-links a:hover {
            background-color: rgba(14, 165, 233, 0.1) !important;
            transform: none !important;
        }

        .footer-links a::before {
            display: none !important;
        }

        .company-description {
            font-size: 16px !important;
            line-height: 1.6 !important;
            margin-bottom: 24px !important;
            max-width: 400px !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .consultation-btn {
            width: 100% !important;
            max-width: 300px !important;
            margin: 24px auto 0 !important;
            font-size: 16px !important;
            padding: 16px 24px !important;
        }

        .contact-item {
            justify-content: center !important;
            font-size: 15px !important;
        }

        .social-links {
            justify-content: center !important;
        }
    }

    /* Tablet Devices (768px - 1023px) */
    @media (min-width: 768px) and (max-width: 1023px) {
        .footer-container {
            padding: 0 24px;
        }

        .footer-main {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 40px !important;
            padding: 60px 0 40px !important;
            text-align: center !important;
        }

        .brand-column {
            grid-column: 1 / -1 !important;
            text-align: center !important;
            margin-bottom: 32px !important;
            max-width: none !important;
        }

        .footer-column {
            text-align: center !important;
        }

        .footer-title::after {
            left: 50% !important;
            transform: translateX(-50%) !important;
        }

        .footer-links a::before {
            display: none !important;
        }

        .footer-links a:hover {
            background-color: rgba(14, 165, 233, 0.1) !important;
            transform: none !important;
        }

        .contact-item {
            justify-content: center !important;
        }

        .social-links {
            justify-content: center !important;
        }

        .consultation-btn {
            max-width: 300px !important;
            margin: 0 auto !important;
        }
    }

    /* Desktop Devices (1024px+) */
    @media (min-width: 1024px) {
        .footer-container {
            padding: 0;
            margin: 0 auto;
        }

        .footer-main {
            display: grid !important;
            grid-template-columns: 1.2fr 1fr 1fr 1fr !important;
            gap: 48px !important;
            padding: 80px 0 60px !important;
            text-align: left !important;
        }

        .brand-column {
            grid-column: auto !important;
            text-align: left !important;
            max-width: 320px !important;
        }

        .footer-column {
            text-align: left !important;
        }

        .footer-title::after {
            left: 0 !important;
            transform: none !important;
        }

        .footer-links a::before {
            content: '' !important;
            position: absolute !important;
            left: -16px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            width: 0 !important;
            height: 2px !important;
            background: #0ea5e9 !important;
            transition: width 0.3s ease !important;
            display: block !important;
        }

        .footer-links a:hover {
            transform: translateX(4px) !important;
            background-color: transparent !important;
        }

        .footer-links a:hover::before {
            width: 12px !important;
        }

        .contact-item {
            justify-content: flex-start !important;
        }

        .social-links {
            justify-content: flex-start !important;
        }

        .consultation-btn {
            margin: 0 !important;
            max-width: none !important;
        }
    }

    /* Enhanced Focus States for Accessibility */
    .footer-links a:focus,
    .social-link:focus,
    .consultation-btn:focus {
        outline: 3px solid #0ea5e9;
        outline-offset: 2px;
        border-radius: 4px;
    }

    .footer-links a:focus-visible,
    .social-link:focus-visible,
    .consultation-btn:focus-visible {
        outline: 3px solid #0ea5e9;
        outline-offset: 2px;
    }

    /* Skip to content link for screen readers */
    .skip-link {
        position: absolute;
        top: -40px;
        left: 6px;
        background: #0ea5e9;
        color: white;
        padding: 8px;
        text-decoration: none;
        border-radius: 4px;
        z-index: 10000;
    }

    .skip-link:focus {
        top: 6px;
    }

    /* Keyboard Navigation Enhancement */
    .footer-links a,
    .social-link,
    .consultation-btn {
        position: relative;
    }

    .footer-links a:focus,
    .social-link:focus,
    .consultation-btn:focus {
        z-index: 1;
    }

    /* Reduced Motion Support */
    @media (prefers-reduced-motion: reduce) {

        .social-link,
        .footer-links a,
        .consultation-btn,
        .bg-shape {
            transition: none !important;
            animation: none !important;
            transform: none !important;
        }

        .footer-links a:hover {
            transform: none !important;
        }

        .consultation-btn:hover {
            transform: none !important;
        }
    }

    /* High Contrast Mode Support */
    @media (prefers-contrast: high) {
        .enhanced-footer {
            background: #000000 !important;
            border-top: 3px solid #ffffff;
        }

        .footer-links a {
            color: #ffffff !important;
            border: 1px solid transparent;
        }

        .footer-links a:hover,
        .footer-links a:focus {
            border-color: #ffffff;
            background-color: #333333;
        }

        .company-description {
            color: #ffffff !important;
        }

        .contact-item {
            color: #ffffff !important;
        }

        .contact-item a {
            color: #ffffff !important;
        }

        .social-link {
            border: 2px solid #ffffff;
            background: #000000 !important;
        }

        .consultation-btn {
            border: 2px solid #ffffff;
            background: #000000 !important;
            color: #ffffff !important;
        }

        .footer-title {
            color: #ffffff !important;
        }

        .footer-title::after {
            background: #ffffff !important;
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

    /* Enhanced Touch Targets for Mobile */
    @media (max-width: 767px) {

        .footer-links a,
        .social-link,
        .consultation-btn {
            min-height: 44px;
            min-width: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-links a {
            justify-content: flex-start;
            padding-left: 16px;
        }
    }
</style>

<footer class="enhanced-footer">
    <div class="footer-container">
        <!-- Main Footer Content -->
        <div class="footer-main">
            <!-- Column 1: Brand & Social -->
            <div class="footer-column brand-column">
                <div class="footer-logo">
                    <img src="{{ asset('images/QubifyMain.png') }}" alt="{{ app_name() }} Logo" class="logo-img" />
                </div>
                <p class="company-description">
                    From idea to execution, Qubify is your engine for next-gen innovation. Elevate your business with
                    cutting-edge technology solutions.
                </p>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:sales@qubifytech.com">sales@qubifytech.com</a>
                    </div>
                    {{-- <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <a href="tel:+919915437999">+91 99154 37999</a>
                    </div> --}}
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <a href="tel:+917087076111">+91 70870 76111</a>
                    </div>
                </div>
                {{-- <div class="social-links">
                    <a href="#" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                            width="18px"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#057AB7"
                                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                        </svg>
                    </a>
                    <a href="#" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            width="25px"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#057AB7"
                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                        </svg>
                    </a>
                    <a href="https://in.linkedin.com/company/qubifytech" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            width="25px"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#057AB7"
                                d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                        </svg>
                    </a>
                    <a href="#" class="social-link">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            width="25px"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#057AB7"
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                        </svg>
                    </a>
                </div> --}}
            </div>

            <!-- Column 2: Services -->
            <div class="footer-column services-column">
                <h4 class="footer-title">Services</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('frontend.services.web-devvelopment') }}">Web Development Services</a></li>
                    <li><a href="{{ route('frontend.services.software-development') }}">Software Development
                            Services</a></li>
                    <li><a href="{{ route('frontend.services.mobile-app') }}">Mobile App Development Services</a></li>
                    <li><a href="{{ route('frontend.services.web-app') }}">Web Application Development Services</a></li>
                </ul>
            </div>

            <!-- Column 3: Solutions -->
            <div class="footer-column solutions-column">
                <h4 class="footer-title">Solutions</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('frontend.solutions.hrms') }}">Human Resource Management System</a></li>
                    <li><a href="{{ route('frontend.solutions.crm') }}">Customer Relationship Management</a></li>
                    <li><a href="{{ route('frontend.solutions.vms') }}">Visitor Management System</a></li>
                    <li><a href="{{ route('frontend.solutions.his') }}">Hospital Information System</a></li>
                    <li><a href="{{ route('frontend.solutions.pos') }}">Point of Sale System</a></li>
                    <li><a href="{{ route('frontend.solutions.vps') }}">Vehicle Parking System</a></li>
                    <li><a href="{{ route('frontend.solutions.vts') }}">Vehicle Tracking System</a></li>
                    <li><a href="{{ route('frontend.solutions.dds') }}">On-Demand Delivery Software</a></li>
                </ul>
            </div>

            <!-- Column 4: Navigation & CTA -->
            <div class="footer-column navigation-column">
                <h4 class="footer-title">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.about') }}">About</a></li>
                    <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                    <li><a href="{{ route('frontend.index') }}#contact">Get Started</a></li>
                </ul>
                <div class="consultation-cta">
                    <button class="consultation-btn" onclick="openContactModal()">
                        <i class="fas fa-calendar-check"></i>
                        Book Free Consultation
                    </button>
                </div>

            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p>&copy; 2025 Qubify. All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- Background Decoration -->
    <div class="footer-bg-decoration">
        <div class="bg-shape shape-1"></div>
        <div class="bg-shape shape-2"></div>
    </div>
</footer>
