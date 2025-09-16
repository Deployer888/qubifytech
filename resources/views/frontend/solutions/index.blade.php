@extends('frontend.layouts.app')

@section('title') Solutions - {{ config('app.name') }} @endsection

@section('content')

    <style>
        /* Global Styles & Theming */
        :root {
        --color-primary: #0055A4;
        --color-accent: #1062AF;
        --color-bg: #FFFFFF;
        --color-alt-bg: #F4F7FA;
        --text-primary: #1A1A1A;
        --text-secondary: #666666;
        --text-light: #8A8A8A;
        --radius-sm: 0.5rem;
        --radius-md: 1rem;
        --radius-lg: 1.5rem;
        --shadow-soft: 0 8px 24px rgba(0,0,0,0.1);
        --shadow-hover: 0 12px 32px rgba(0,0,0,0.15);
        --transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
        --font-size-xs: 0.875rem;
        --font-size-sm: 1rem;
        --font-size-md: 1.125rem;
        --font-size-lg: 1.5rem;
        --font-size-xl: 2rem;
        --font-size-2xl: 2.5rem;
        --font-size-3xl: 3rem;
        --spacing-xs: 0.5rem;
        --spacing-sm: 1rem;
        --spacing-md: 1.5rem;
        --spacing-lg: 2rem;
        --spacing-xl: 3rem;
        --spacing-2xl: 4rem;
        --container-max-width: 1200px;
        }

        * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        }

        body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        line-height: 1.6;
        color: var(--text-primary);
        background-color: var(--color-bg);
        overflow-x: hidden;
        }

        .container {
        max-width: var(--container-max-width);
        margin: 0 auto;
        padding: 0 var(--spacing-md);
        }

        @media (max-width: 768px) {
        .container {
            padding: 0 var(--spacing-sm);
        }
        }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
        line-height: 1.2;
        font-weight: 700;
        color: var(--text-primary);
        }

        h1 {
        font-size: var(--font-size-3xl);
        font-weight: 800;
        }

        h2 {
        font-size: var(--font-size-2xl);
        }

        h3 {
        font-size: var(--font-size-xl);
        }

        @media (max-width: 768px) {
        h1 {
            font-size: var(--font-size-2xl);
        }
        
        h2 {
            font-size: var(--font-size-xl);
        }
        }

        /* Buttons */
        .btn {
        display: inline-block;
        padding: var(--spacing-sm) var(--spacing-lg);
        border-radius: var(--radius-md);
        text-decoration: none;
        font-weight: 600;
        font-size: var(--font-size-sm);
        border: 2px solid transparent;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: var(--transition);
        text-align: center;
        background: none;
        }

        .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transition: width 0.3s, height 0.3s;
        transform: translate(-50%, -50%);
        z-index: 0;
        }

        .btn:hover::before {
        width: 300px;
        height: 300px;
        }

        .btn > * {
        position: relative;
        z-index: 1;
        }

        .btn--primary {
        background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
        color: white;
        box-shadow: var(--shadow-soft);
        }

        .btn--primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-hover);
        }

        .btn--secondary {
        background: white;
        color: var(--color-primary);
        border: 2px solid var(--color-primary);
        }

        .btn--secondary:hover {
        background: var(--color-primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: var(--shadow-hover);
        }

        .btn--outline {
        background: transparent;
        color: var(--color-primary);
        border: 2px solid var(--color-primary);
        }

        .btn--outline:hover {
        background: var(--color-primary);
        color: white;
        }

        /* Hero Section */
        .hero {
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-accent) 100%);
        color: white;
        padding: var(--spacing-2xl) 0;
        position: relative;
        overflow: hidden;
        min-height: 70vh;
        display: flex;
        align-items: center;
        }

        .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='3'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        z-index: 1;
        }

        .hero__content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
        }

        .hero__title {
        color: white;
        margin-bottom: var(--spacing-md);
        animation: fadeInUp 0.8s ease-out;
        }

        .hero__subtitle {
        font-size: var(--font-size-md);
        opacity: 0.9;
        margin-bottom: var(--spacing-xl);
        line-height: 1.7;
        animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        .hero__cta {
        display: flex;
        gap: var(--spacing-md);
        justify-content: center;
        flex-wrap: wrap;
        animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        @media (max-width: 768px) {
        .hero {
            padding: var(--spacing-xl) 0;
            min-height: 60vh;
        }
        
        .hero__cta {
            flex-direction: column;
            align-items: center;
        }
        
        .hero__cta .btn {
            width: 100%;
            max-width: 300px;
        }
        }

        /* Solutions Section */
        .solutions {
        padding: var(--spacing-2xl) 0;
        }

        .solutions__header {
        text-align: center;
        margin-bottom: var(--spacing-2xl);
        }

        .solutions__title {
        color: var(--color-primary);
        margin-bottom: var(--spacing-md);
        position: relative;
        display: inline-block;
        }

        .solutions__title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
        border-radius: 2px;
        }

        .solutions__subtitle {
        font-size: var(--font-size-md);
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
        }

        .solution {
        margin-bottom: var(--spacing-2xl);
        padding: var(--spacing-xl) 0;
        }

        .solution:nth-child(even) {
        background-color: var(--color-alt-bg);
        margin-left: -100vw;
        margin-right: -100vw;
        padding-left: 100vw;
        padding-right: 100vw;
        }

        .solution__content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--spacing-xl);
        align-items: center;
        max-width: var(--container-max-width);
        margin: 0 auto;
        padding: 0 var(--spacing-md);
        }

        .solution:nth-child(even) .solution__content {
        grid-template-columns: 1fr 1fr;
        }

        .solution__header {
        margin-bottom: var(--spacing-lg);
        }

        .solution__category {
        display: inline-block;
        background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
        color: white;
        padding: var(--spacing-xs) var(--spacing-sm);
        border-radius: var(--radius-sm);
        font-size: var(--font-size-xs);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: var(--spacing-sm);
        }

        .solution__text h2 {
        color: var(--color-primary);
        margin-bottom: var(--spacing-sm);
        position: relative;
        }

        .solution__text h2::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
        border-radius: 2px;
        }

        .solution__text p {
        color: var(--text-secondary);
        margin-bottom: var(--spacing-md);
        line-height: 1.7;
        }

        .solution__visual {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 300px;
        background: linear-gradient(135deg, var(--color-primary)10, var(--color-accent)10);
        border-radius: var(--radius-lg);
        position: relative;
        overflow: hidden;
        transition: var(--transition);
        }

        .solution__visual:hover {
        transform: scale(1.02);
        box-shadow: var(--shadow-hover);
        }

        .solution__visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: var(--radius-lg);
        }

        .solution__icon {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 2;
        }

        .solution__icon svg {
        width: 60px;
        height: 60px;
        fill: white;
        }

        @media (max-width: 768px) {
        .solution__content {
            grid-template-columns: 1fr;
            gap: var(--spacing-lg);
            text-align: center;
        }
        
        .solution:nth-child(even) .solution__content {
            grid-template-columns: 1fr;
        }
        
        .solution__visual {
            order: -1;
            height: 200px;
        }
        
        .solution__icon {
            width: 80px;
            height: 80px;
        }
        
        .solution__icon svg {
            width: 40px;
            height: 40px;
        }
        }

        /* Why Qubify Section */
        .why-qubify {
        background: var(--color-alt-bg);
        padding: var(--spacing-2xl) 0;
        text-align: center;
        position: relative;
        }

        .why-qubify__content {
        max-width: 800px;
        margin: 0 auto;
        }

        .why-qubify h2 {
        color: var(--color-primary);
        margin-bottom: var(--spacing-lg);
        position: relative;
        display: inline-block;
        }

        .why-qubify h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--color-accent), var(--color-primary));
        border-radius: 2px;
        }

        .why-qubify p {
        font-size: var(--font-size-md);
        color: var(--text-secondary);
        line-height: 1.8;
        }

        /* Industries Section */
        .industries {
        padding: var(--spacing-2xl) 0;
        }

        .industries h2 {
        text-align: center;
        color: var(--color-primary);
        margin-bottom: var(--spacing-xl);
        }

        .industries__grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: var(--spacing-lg);
        margin-top: var(--spacing-xl);
        }

        .industry-card {
        background: white;
        padding: var(--spacing-lg);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-soft);
        text-align: center;
        transition: var(--transition);
        border: 1px solid #f0f0f0;
        }

        .industry-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
        border-color: var(--color-primary);
        }

        .industry-card__icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
        border-radius: 50%;
        margin: 0 auto var(--spacing-md);
        display: flex;
        align-items: center;
        justify-content: center;
        }

        .industry-card__icon svg {
        width: 30px;
        height: 30px;
        fill: white;
        }

        .industry-card h3 {
        color: var(--color-primary);
        font-size: var(--font-size-md);
        margin-bottom: var(--spacing-sm);
        }

        /* CTA Section */
        .cta-section {
        background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
        color: white;
        padding: var(--spacing-2xl) 0;
        text-align: center;
        position: relative;
        overflow: hidden;
        margin-bottom: 0;
        }

        .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zm10 0c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        z-index: 1;
        }

        .cta-section__content {
        position: relative;
        z-index: 2;
        }

        .cta-section h2 {
        color: white;
        margin-bottom: var(--spacing-md);
        }

        .cta-section p {
        font-size: var(--font-size-md);
        margin-bottom: var(--spacing-lg);
        opacity: 0.9;
        }

        .contact-info {
        margin: var(--spacing-lg) 0;
        font-size: var(--font-size-sm);
        opacity: 0.9;
        }

        .contact-info a {
        color: white;
        text-decoration: none;
        }

        .contact-info a:hover {
        text-decoration: underline;
        }

        /* Animations */
        @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
        }

        @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
        }

        .floating {
        animation: float 6s ease-in-out infinite;
        }

        /* Utility Classes */
        .text-center {
        text-align: center;
        }

        .mb-lg {
        margin-bottom: var(--spacing-lg);
        }

        .mb-xl {
        margin-bottom: var(--spacing-xl);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
        .industries__grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }
        }

        @media (max-width: 480px) {
            .industries__grid {
                grid-template-columns: 1fr;
            }
            
            .hero__subtitle {
                font-size: var(--font-size-sm);
            }
        }

        /* Focus and Accessibility */
        .btn:focus,
        .industry-card:focus {
            outline: 2px solid var(--color-accent);
            outline-offset: 2px;
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
@php
    $heroContent = $sections['heroContent']->content_json ?? null;
    $solutionsHeaderContent = $sections['solutionsHeaderContent']->content_json ?? null;
    $solutionsItemsContent = $sections['solutionsItemsContent']->content_json ?? null;
    $whyQubifyContent = $sections['whyQubifyContent']->content_json ?? null;
    $industriesContent = $sections['industriesContent']->content_json ?? null;
    $why_choose = $sections['whyChooseContent']->content_json ?? null;
    $ctaContent = $sections['ctaContent']->content_json ?? null;
@endphp
 <!-- Hero Section -->
    <section class="hero mt-3">
        <div class="container">
            <div class="hero__content">
                <h1 class="hero__title">{!! $heroContent['title'] ?? 'Smart Software Solutions Built for Modern Business Challenges' !!}</h1>
                <p class="hero__subtitle">{{ $heroContent['subtitle'] ?? 'Qubify delivers AI-powered, scalable platforms that simplify operations, boost efficiency, and support digital transformation—across HR, healthcare, logistics, and more.' }}</p>
                <div class="hero__cta">
                    @if(isset($heroContent['buttons']))
                        @foreach($heroContent['buttons'] as $button)
                            <a href="{{ route('frontend.index') }}#contact" class="btn btn--{{ $button['classes'] === 'btn-primary' ? 'primary' : 'secondary' }}">{{ $button['text'] }}</a>
                        @endforeach
                    @else
                        <a href="{{ route('frontend.index') }}#contact" class="btn btn--primary">Request a Demo</a>
                        <a href="mailto:sales@qubifytech.com" class="btn btn--secondary">Contact Sales</a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Solutions Section -->
    <section class="solutions">
        <div class="container">
            <div class="solutions__header">
                <h2 class="solutions__title">{{ $solutionsHeaderContent['title'] ?? 'Our Solutions' }}</h2>
                <p class="solutions__subtitle">{{ $solutionsHeaderContent['subtitle'] ?? 'Comprehensive software solutions designed to transform your business operations and drive growth across all industries.' }}</p>
            </div>
        </div>
 
        @if(isset($solutionsItemsContent['solutions']))
            @foreach($solutionsItemsContent['solutions'] as $index => $solution)
                <div class="solution">
                    <div class="solution__content">
                        @if($index % 2 == 0)
                            <!-- Text first for even indexed items -->
                            <div class="solution__text">
                                <div class="solution__header">
                                    <span class="solution__category">{{ $solution['category'] }}</span>
                                    <h2>{{ $solution['title'] }}</h2>
                                </div>
                                <p>{{ $solution['description'] }}</p>
                                <p><strong>{{ $index < 4 ? ['Top Use Case:', 'Who it\'s for:', 'Key Advantage:', 'Ideal for:'][$index] : ['Use Case Highlight:', 'Best For:', 'Common Deployments:', 'Perfect Fit:'][$index-4] }}</strong> {{ $solution['use_case'] }}</p>
                              @php
                                    $routes = [
                                        0 => 'frontend.solutions.hrms',
                                        1 => 'frontend.solutions.crm',
                                        2 => 'frontend.solutions.vms',
                                        3 => 'frontend.solutions.his',
                                        4 => 'frontend.solutions.pos',
                                        5 => 'frontend.solutions.vps',
                                        6 => 'frontend.solutions.vts',
                                        7 => 'frontend.solutions.dds',
                                    ];
                                @endphp

                                <a href="{{ isset($routes[$index]) ? route($routes[$index]) : '#' }}" class="btn btn--outline">
                                    {{ $solution['button_text'] }}
                                </a>
                            </div>
                            <div class="solution__visual floating">
                                @if($solution['image'])
                                    <img src="{{ asset('storage/' . $solution['image']) }}" alt="{{ $solution['title'] }}" />
                                @else
                                    <div class="solution__icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        @else
                            <!-- Image first for odd indexed items -->
                            <div class="solution__visual floating">
                                @if($solution['image'])
                                    <img src="{{ asset('storage/' . $solution['image']) }}" alt="{{ $solution['title'] }}" />
                                @else
                                    <div class="solution__icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="solution__text">
                                <div class="solution__header">
                                    <span class="solution__category">{{ $solution['category'] }}</span>
                                    <h2>{{ $solution['title'] }}</h2>
                                </div>
                                <p>{{ $solution['description'] }}</p>
                                <p><strong>{{ $index < 4 ? ['Top Use Case:', 'Who it\'s for:', 'Key Advantage:', 'Ideal for:'][$index] : ['Use Case Highlight:', 'Best For:', 'Common Deployments:', 'Perfect Fit:'][$index-4] }}</strong> {{ $solution['use_case'] }}</p>
                                <a href="#" class="btn btn--outline">{{ $solution['button_text'] }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </section>

    <!-- Why Qubify Section -->
    <section class="why-qubify">
        <div class="container">
            <div class="why-qubify__content">
                <h2>{{ $whyQubifyContent['title'] ?? 'Why Qubify?' }}</h2>
                <p>{{ $whyQubifyContent['paragraph1'] ?? 'What sets Qubify apart is more than just our technology—it\'s our thinking. Every system we build is tailored, scalable, and infused with AI. We\'re not here to just "digitize" your business. We\'re here to improve how it works, end to end.' }}</p>
                <br>
                <p>{{ $whyQubifyContent['paragraph2'] ?? 'Our team blends technical expertise with industry insight to build software that delivers real ROI—secure, future-ready, and always aligned with your growth.' }}</p>
            </div>
        </div>
    </section>

    <!-- Industries Section -->
    <section class="industries">
        <div class="container">
            <h2>{{ $industriesContent['title'] ?? 'Industries We Serve' }}</h2>
            <p class="text-center" style="color: var(--text-secondary); font-size: var(--font-size-md); margin-bottom: var(--spacing-xl);">
                {{ $industriesContent['description'] ?? 'We work across multiple verticals—each with its own unique demands. Our software powers success in:' }}
            </p>
            <div class="industries__grid">
                @if(isset($industriesContent['industries']))
                    @foreach($industriesContent['industries'] as $industry)
                        <div class="industry-card">
                            <div class="industry-card__icon">
                                <svg viewBox="0 0 24 24">
                                    @switch($loop->index)
                                        @case(0)
                                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                            @break
                                        @case(1)
                                            <path d="M19 8H5c-1.66 0-3 1.34-3 3v6c0 1.66 1.34 3 3 3h14c1.66 0 3-1.34 3-3v-6c0-1.66-1.34-3-3-3zm-7 6h-2v2h-2v-2H6v-2h2v-2h2v2h2v2z"/>
                                            @break
                                        @case(2)
                                            <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12L8.1 13h7.45c.75 0 1.41-.41 1.75-1.03L21.7 4H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                                            @break
                                        @case(3)
                                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
                                            @break
                                        @case(4)
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                            @break
                                        @default
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    @endswitch
                                </svg>
                            </div>
                            <h3>{{ $industry['name'] }}</h3>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="contact">
        <div class="container">
            <div class="cta-section__content">
                <h2>{{ $ctaContent['title'] ?? 'Ready to Get Started?' }}</h2>
                <p>{{ $ctaContent['description'] ?? 'Let\'s build something purpose-driven—together. Whether you\'re optimizing internal processes or launching a customer-facing platform, Qubify has the expertise and execution power to get it done right.' }}</p>
                <div class="contact-info mb-lg">
                    <p>
                        <a href="mailto:{{ $ctaContent['contact_email'] ?? 'sales@qubifytech.com' }}">{{ $ctaContent['contact_email'] ?? 'sales@qubifytech.com' }}</a> | 
                        <a href="tel:{{ str_replace(' ', '', $ctaContent['contact_phone'] ?? '+919915437999') }}">{{ $ctaContent['contact_phone'] ?? '+91 99154 37999' }}</a>
                    </p>
                    <p><a href="https://{{ $ctaContent['contact_website'] ?? 'www.qubifytech.com' }}" target="_blank">{{ $ctaContent['contact_website'] ?? 'www.qubifytech.com' }}</a></p>
                </div>
                <a href="{{ $ctaContent['button_url'] ?? 'mailto:sales@qubifytech.com' }}" class="btn btn--secondary">{{ $ctaContent['button_text'] ?? 'Contact Sales' }}</a>
            </div>
        </div>
    </section>

    <script>
        // Button ripple effect
        document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
            ripple.remove();
            }, 600);
        });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            }
        });
        });

        // Keyboard navigation support
        document.addEventListener('keydown', (e) => {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
        });

        document.addEventListener('mousedown', () => {
        document.body.classList.remove('keyboard-navigation');
        });
    </script>

@endsection