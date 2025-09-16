<link rel="stylesheet" href="{{ asset('css/home/testimonials.css') }}">


<!-- Client Testimonials -->
<section class="section testimonials">
    <div class="container-custom">
        <div class="text-center mb-5">
            <h2 class="section-title display-4 fw-bold text-gradient mb-3">
                {{ $testimonialsContent->content_json['title'] ?? 'Trusted by Global Teams That Lead Their Industries' }}
            </h2>
            <h3 class="section-subtitle fw-bold mb-4">
                {{ $testimonialsContent->content_json['subtitle'] ?? 'We Don\'t Just Deliver Projects — We Become Part of the Mission.' }}
            </h3>
            <p class="fs-5 mx-auto" style="max-width: 800px;">
                {{ $testimonialsContent->content_json['description'] ?? 'Our clients see us as an extension of their own team — not just a vendor. Here\'s what partnership feels like when you build with Qubify: 💬' }}
            </p>
        </div>
        
        <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if(isset($testimonialsContent->content_json['testimonials']) && is_array($testimonialsContent->content_json['testimonials']))
                    @foreach($testimonialsContent->content_json['testimonials'] as $index => $testimonial)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="card border-0 shadow-lg rounded-4 p-5 text-center">
                                        <div class="text-primary mb-4">
                                            <i class="fas fa-quote-left display-4"></i>
                                        </div>
                                        <blockquote class="blockquote fs-4 mb-4 lh-lg">
                                            {{ $testimonial['quote'] ?? 'Testimonial quote goes here.' }}
                                        </blockquote>
                                        <div class="d-flex align-items-center justify-content-center gap-3">
                                            <div class="bg-primary text-white rounded-circle p-3">
                                                <i class="fas fa-user fs-4"></i>
                                            </div>
                                            <div class="text-start">
                                                <h5 class="mb-1 fw-bold">{{ $testimonial['name'] ?? 'Client Name' }}</h5>
                                                <p class="text-muted mb-0">{{ $testimonial['company'] ?? 'Company Name' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Fallback static testimonials --}}
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card border-0 shadow-lg rounded-4 p-5 text-center">
                                    <div class="text-primary mb-4">
                                        <i class="fas fa-quote-left display-4"></i>
                                    </div>
                                    <blockquote class="blockquote fs-4 mb-4 lh-lg">
                                        We could not have asked for a better partner than the Qubify Technologies team. We truly feel like they are part of the LokaTrain team and family instead of seeing them as a service provider.
                                    </blockquote>
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <div class="bg-primary text-white rounded-circle p-3">
                                            <i class="fas fa-user fs-4"></i>
                                        </div>
                                        <div class="text-start">
                                            <h5 class="mb-1 fw-bold">LokaTrain Team</h5>
                                            <p class="text-muted mb-0">Training Platform</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card border-0 shadow-lg rounded-4 p-5 text-center">
                                    <div class="text-primary mb-4">
                                        <i class="fas fa-quote-left display-4"></i>
                                    </div>
                                    <blockquote class="blockquote fs-4 mb-4 lh-lg">
                                        What stood out with Qubify wasn't just the technology — it was the way they thought like co-founders. They challenged our roadmap, filled in the gaps, and helped us build something better than we imagined.
                                    </blockquote>
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <div class="bg-success text-white rounded-circle p-3">
                                            <i class="fas fa-user fs-4"></i>
                                        </div>
                                        <div class="text-start">
                                            <h5 class="mb-1 fw-bold">Co-Founder, SwiftCart</h5>
                                            <p class="text-muted mb-0">Hyperlocal Delivery Platform</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card border-0 shadow-lg rounded-4 p-5 text-center">
                                    <div class="text-primary mb-4">
                                        <i class="fas fa-quote-left display-4"></i>
                                    </div>
                                    <blockquote class="blockquote fs-4 mb-4 lh-lg">
                                        Qubify delivered a fully operational system in record time — no back-and-forth, no bloat, just clean execution. The team's ability to adapt on the fly was critical to meeting our launch window.
                                    </blockquote>
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <div class="bg-warning text-dark rounded-circle p-3">
                                            <i class="fas fa-user fs-4"></i>
                                        </div>
                                        <div class="text-start">
                                            <h5 class="mb-1 fw-bold">Head of Operations, Transline Fleet</h5>
                                            <p class="text-muted mb-0">Vehicle Tracking & Logistics</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</section>