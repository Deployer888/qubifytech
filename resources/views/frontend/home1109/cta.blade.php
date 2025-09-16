<link rel="stylesheet" href="{{ asset('css/home/final-cta.css') }}">

<!-- Final CTA Section -->
<section class="section final-cta-section" id="cta">
    <div class="container">
        <div class="cta-content">
            <h2 class="text-white sectionTitle">
                {{ $ctaContent->content_json['title']  ?? 'Let\'s Build What\'s Next — Together' }}
            </h2>

            <h3 class="section-subtitle text-white">
                {{ $ctaContent->content_json['subtitle'] ?? 'Ready to Elevate Your Business with AI-Powered Precision?' }}
            </h3>
            <p class="cta-description">
                {{ $ctaContent->content_json['description'] ?? 'At Qubify, we don\'t just develop software – we build intelligent systems that learn, adapt, and scale with your business. Let us transform your vision into reality with cutting-edge AI solutions that deliver measurable results.' }}
            </p>
            <p class="cta-subdescription">
                {{ $ctaContent->content_json['sub_description'] ?? 'Get a free consultation today and see how we can accelerate your success with next-generation technology.' }}
            </p>
            
            <div class="cta-features">
                <div class="row g-4">
                    @if(isset($ctaContent->content_json['features']) && is_array($ctaContent->content_json['features']))
                        @foreach($ctaContent->content_json['features'] as $feature)
                            <div class="col-lg-3 col-md-6">
                                <div class="cta-feature scroll-fade-in">
                                    <div class="feature-icon">
                                        <i class="{{ $feature['icon'] ?? 'fas fa-star' }}"></i>
                                    </div>
                                    <h4>{{ $feature['title'] ?? 'Feature Title' }}</h4>
                                    <p>{{ $feature['description'] ?? 'Feature description goes here.' }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{-- Fallback static features --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="cta-feature scroll-fade-in">
                                <div class="feature-icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <h4>Free<br>Consultation</h4>
                                <p>Get expert advice tailored to your specific needs and challenges.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="cta-feature scroll-fade-in">
                                <div class="feature-icon">
                                    <i class="fas fa-code"></i>
                                </div>
                                <h4>Rapid Development</h4>
                                <p>Launch your MVP in weeks, not months, with our proven methodologies.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="cta-feature scroll-fade-in">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <h4>Enterprise Security</h4>
                                <p>Bank-grade security and compliance built into every solution.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="cta-feature scroll-fade-in">
                                <div class="feature-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <h4>Ongoing Support</h4>
                                <p>24/7 support and maintenance to keep your systems running smoothly.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="cta-actions">
                <a href="javascript:void(0)" onclick="openContactModal()" class="btn btn-primary-gradient btn-lg inline-flex items-center px-6 py-2 text-xl font-medium text-white bg-gradient-to-r from-blue-500 to-blue-500 rounded-xl hover:from-blue-600 hover:to-blue-600 transition-all duration-300 hover-glow transform hover:scale-105 shadow-lg">
                    <i class="fas fa-calendar me-2"></i>
                    Book Free Consultation 
                </a>
                <a href="{{ route('frontend.solutions') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-eye me-2"></i>
                    View Our Solutions
                </a>
            </div>
        </div>
    </div>
</section>