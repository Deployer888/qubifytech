<link rel="stylesheet" href="{{ asset('css/home/about.css') }}">
<!-- Value Pillars Section -->
<section class="section value-pillars-section" id="about">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center display-4 fw-bold text-gradient mb-3">
                {{ $aboutContent->content_json['title'] ?? 'Why Qubify?' }}
            </h2>
        </div>
        
        <div class="row g-4">
            @if(isset($aboutContent->content_json['pillars']) && is_array($aboutContent->content_json['pillars']))
                @foreach($aboutContent->content_json['pillars'] as $pillar)
                    <div class="col-lg-3 col-md-6">
                        <div class="pillar-card scroll-fade-in">
                            <div class="pillar-icon">
                                <i class="{{ $pillar['icon'] ?? 'fas fa-star' }}"></i>
                            </div>
                            <h3>{{ $pillar['title'] ?? 'Pillar Title' }}</h3>
                            <p>{{ $pillar['description'] ?? 'Pillar description goes here.' }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- Fallback static pillars --}}
                <div class="col-lg-3 col-md-6">
                    <div class="pillar-card scroll-fade-in">
                        <div class="pillar-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Built for Visionaries, Trusted by Leaders</h3>
                        <p>At Qubify, we don't just build software — we engineer transformative digital systems with security, scalability, and strategic growth baked in from day one.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="pillar-card scroll-fade-in">
                        <div class="pillar-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Enterprise-Grade Security Architecture</h3>
                        <p>Modern businesses demand more than encryption. We develop secure, scalable platforms with future-ready smart contracts and decentralized infrastructure—ensuring your systems are safe, efficient, and built to grow.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="pillar-card scroll-fade-in">
                        <div class="pillar-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3>Accelerated Operational Intelligence</h3>
                        <p>We turn raw data into strategic action. Our AI-driven platforms uncover insights that help you scale faster, enhance customer journeys, and streamline internal operations—all in real time.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="pillar-card scroll-fade-in">
                        <div class="pillar-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>We Take Every Project Serious</h3>
                        <p>We're not a volume shop—we're a partner. Each project gets direct C-suite oversight, access to top 1% tech talent, and tailored strategies to go from zero to market dominance with precision.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>