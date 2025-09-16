<link rel="stylesheet" href="{{ asset('css/home/tech-solutions.css') }}">

<!-- Tech Solutions Section -->
<section class="section tech-solutions-section">
    <!-- Floating Elements -->
    <div class="tech-floating-elements">
        <div class="tech-element"></div>
        <div class="tech-element"></div>
        <div class="tech-element"></div>
        <div class="tech-element"></div>
        <div class="tech-element"></div>
        <div class="tech-element"></div>
        <div class="tech-element"></div>
        <div class="tech-element"></div>
    </div>
    
    <div class="container">
        <div class="section-header">
            <h2 class="section-title sectionntitle text-center text-white">
                {{ $solutionsContent->content_json['title'] ?? 'Ready-to-Use Tech Solutions' }}
            </h2>
            <p class="section-subtitle text-center text-white">
                {{ $solutionsContent->content_json['subtitle'] ?? 'Pre-built Platforms. Custom Results. Zero Code Hassle.' }}
            </p>
            <p class="section-description text-center text-white">
                {{ $solutionsContent->content_json['description'] ?? 'Qubify delivers business-ready digital architectures that reduce dev time, eliminate unnecessary complexity, and let you launch faster than ever — no deep tech team required.' }}
            </p>
        </div>
        
        <div class="row g-4 justify-content-center">
            @if(isset($solutionsContent->content_json['solutions']) && is_array($solutionsContent->content_json['solutions']))
                @foreach($solutionsContent->content_json['solutions'] as $solution)
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="tech-solution-card scroll-scale-in">
                            <div class="solution-icon">
                                {{ $solution['icon'] ?? '🔋' }}
                            </div>
                            <h3>{{ $solution['title'] ?? 'Solution Title' }}</h3>
                            <p>{{ $solution['description'] ?? 'Solution description goes here.' }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- Fallback static solutions --}}
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="tech-solution-card scroll-scale-in">
                        <div class="solution-icon">
                            🔋
                        </div>
                        <h3>70% Ready Code Architecture</h3>
                        <p>Start with a strong, scalable foundation already wired with essential features and workflows.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="tech-solution-card scroll-scale-in">
                        <div class="solution-icon">
                            🧩
                        </div>
                        <h3>Customized for Your Business</h3>
                        <p>We tailor every solution to fit your brand, logic, and unique market positioning.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="tech-solution-card scroll-scale-in">
                        <div class="solution-icon">
                            ⚡
                        </div>
                        <h3>Launch MVP in 2-3 Days</h3>
                        <p>Go live with a fully functional MVP in as little as 48 hours — faster than any traditional dev cycle.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>