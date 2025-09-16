<link rel="stylesheet" href="{{ asset('css/home/services.css') }}">

<!-- Main Services Section -->
<section id="services" class="section services-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title display-4 fw-bold text-gradient mb-3">
                {{ $servicesContent->content_json['title'] ?? 'Our Capabilities – Solutions Portfolio' }}
            </h2>
            <h3 class="section-subtitle fw-bold mb-4">
                {{ $servicesContent->content_json['subtitle'] ?? 'Scalable. Future-Ready.' }}
            </h3>
            <p class="fs-5 mx-auto" style="max-width: 900px;">
                {{ $servicesContent->content_json['description'] ?? 'We engineer digital systems that do more than just work — they accelerate transformation. From AI to blockchain, every solution we deliver is crafted to solve real problems with long-term impact.' }}
            </p>
        </div>
        
        <div class="row justify-content-center mb-5">
            <div class="col-auto">
                <ul class="nav nav-pills gap-3 flex-wrap justify-content-center" id="servicesTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active btn-gradient px-4 py-3 rounded-pill fw-semibold" data-bs-toggle="pill" data-bs-target="#ai-solutions" type="button" role="tab">AI Solutions</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-3 rounded-pill fw-semibold" data-bs-toggle="pill" data-bs-target="#mobile-dev" type="button" role="tab">Mobile Development</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-3 rounded-pill fw-semibold" data-bs-toggle="pill" data-bs-target="#web-dev" type="button" role="tab">Web Platforms</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-3 rounded-pill fw-semibold" data-bs-toggle="pill" data-bs-target="#mvp" type="button" role="tab">MVP</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-3 rounded-pill fw-semibold" data-bs-toggle="pill" data-bs-target="#design" type="button" role="tab">UI/UX Design</button>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="tab-content">
            <div class="tab-pane fade show active p-5" id="ai-solutions" role="tabpanel">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h3 class="display-6 fw-bold mb-4">
                            {{ $servicesContent->content_json['services']['ai']['title'] ?? 'Enterprise AI Solutions — Built for Scale' }}
                        </h3>
                        <p class="fs-5 mb-4">
                            {{ $servicesContent->content_json['services']['ai']['subtitle'] ?? 'Architect intelligent infrastructure that doesn\'t just analyze — it learns, adapts, and unlocks value at every level.' }}
                        </p>
                        <div class="mb-4">
                            {!! $servicesContent->content_json['services']['ai']['content'] ?? '<p class="mb-4 fw-medium">What we help you build:</p>
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">AI systems that enhance human decision-making</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Platforms that convert data into actionable insight</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Solutions that are secure, scalable, and performance-optimized</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-4">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Predictive tools that identify patterns before problems arise</span>
                                </li>
                            </ul>' !!}
                        </div>
                        <button class="btn btn-primary-gradient text-white btn-lg rounded-pill px-5 fw-semibold">
                            {{ $servicesContent->content_json['services']['ai']['button_text'] ?? '🟣 Explore AI Solutions' }}
                        </button>
                    </div>
                    <div class="col-lg-5 text-center">
                        <img src="{{ $servicesContent->content_json['services']['ai']['image'] ?? 'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=600&h=400&fit=crop&crop=center' }}" 
                            alt="{{ $servicesContent->content_json['services']['ai']['image_alt'] ?? 'AI Dashboard' }}" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="mobile-dev" role="tabpanel">
                <div class="row align-items-center g-5">
                    <div class="col-lg-7">
                        <h3 class="display-6 fw-bold mb-4">
                            {{ $servicesContent->content_json['services']['mobile']['title'] ?? 'Mobile App Development — Designed for Growth' }}
                        </h3>
                        <p class="fs-5 mb-4">
                            {{ $servicesContent->content_json['services']['mobile']['subtitle'] ?? 'Create high-performance mobile experiences that delight users and scale with your business.' }}
                        </p>
                        <div class="mb-4">
                            {!! $servicesContent->content_json['services']['mobile']['content'] ?? '<ul class="list-unstyled">
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Custom iOS and Android apps with intuitive UX and native performance</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Cross-platform solutions using React Native or Flutter</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Real-time features, API integrations, and offline-ready functionality</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-4">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Scalable backend infrastructure to support millions of users</span>
                                </li>
                            </ul>' !!}
                        </div>
                        <button class="btn btn-primary-gradient text-white btn-lg rounded-pill px-5 fw-semibold">
                            {{ $servicesContent->content_json['services']['mobile']['button_text'] ?? '🟣 View Mobile Projects' }}
                        </button>
                    </div>
                    <div class="col-lg-5 text-center">
                        <img src="{{ $servicesContent->content_json['services']['mobile']['image'] ?? 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&h=400&fit=crop&crop=center' }}" 
                            alt="{{ $servicesContent->content_json['services']['mobile']['image_alt'] ?? 'Mobile Development' }}" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="web-dev" role="tabpanel">
                <div class="row align-items-center g-5">
                    <div class="col-lg-7">
                        <h3 class="display-6 fw-bold mb-4">
                            {{ $servicesContent->content_json['services']['web']['title'] ?? 'Modern Web Platforms — Engineered for Performance' }}
                        </h3>
                        <p class="fs-5 mb-4">
                            {{ $servicesContent->content_json['services']['web']['subtitle'] ?? 'We craft custom web applications that don\'t just look great — they drive engagement, streamline workflows, and scale with your business.' }}
                        </p>
                        <div class="mb-4">
                            {!! $servicesContent->content_json['services']['web']['content'] ?? '<ul class="list-unstyled">
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Responsive, high-performance web platforms tailored to your use case</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Scalable backend systems powered by clean, modular code</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Seamless user interfaces that drive conversion and retention</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-4">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Integrations with CRMs, APIs, and third-party platforms</span>
                                </li>
                            </ul>' !!}
                        </div>
                        <button class="btn btn-primary-gradient text-white btn-lg rounded-pill px-5 fw-semibold">
                            {{ $servicesContent->content_json['services']['web']['button_text'] ?? '🟣 Explore Web Development' }}
                        </button>
                    </div>
                    <div class="col-lg-5 text-center">
                        <img src="{{ $servicesContent->content_json['services']['web']['image'] ?? 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop&crop=center' }}" 
                            alt="{{ $servicesContent->content_json['services']['web']['image_alt'] ?? 'Web Development' }}" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="mvp" role="tabpanel">
                <div class="row align-items-center g-5">
                    <div class="col-lg-7 ">
                        <h3 class="display-6 fw-bold mb-4">
                            {{ $servicesContent->content_json['services']['mvp']['title'] ?? 'MVP Development – Go to Market Fast' }}
                        </h3>
                        <p class="fs-5 mb-4">
                            {{ $servicesContent->content_json['services']['mvp']['subtitle'] ?? 'Building your product\'s first version doesn\'t mean compromising on quality — it means focusing on what matters.' }}
                        </p>
                        <div class="mb-4">
                            {!! $servicesContent->content_json['services']['mvp']['content'] ?? '<ul class="list-unstyled">
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">A lean, scalable core product — built fast, built right</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">User-focused design that solves real pain points</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Agile release cycles for testing, feedback, and iteration</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-4">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">A future-proof tech stack ready to grow with your vision</span>
                                </li>
                            </ul>' !!}
                        </div>
                        <button class="btn btn-primary-gradient text-white btn-lg rounded-pill px-5 fw-semibold">
                            {{ $servicesContent->content_json['services']['mvp']['button_text'] ?? '🟣 Start Your MVP Journey' }}
                        </button>
                    </div>
                    <div class="col-lg-5 text-center">
                        <img src="{{ $servicesContent->content_json['services']['mvp']['image'] ?? 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=600&h=400&fit=crop&crop=center' }}" 
                                alt="{{ $servicesContent->content_json['services']['mvp']['image_alt'] ?? 'MVP Development' }}" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="design" role="tabpanel">
                <div class="row align-items-center g-5">
                    <div class="col-lg-7 ">
                        <h3 class="display-6 fw-bold mb-4">
                            {{ $servicesContent->content_json['services']['design']['title'] ?? 'UI/UX Design That Feels as Good as It Looks' }}
                        </h3>
                        <p class="fs-5 mb-4">
                            {{ $servicesContent->content_json['services']['design']['subtitle'] ?? 'At Qubify, we design interfaces that do more than function — they connect.' }}
                        </p>
                        <div class="mb-4">
                            {!! $servicesContent->content_json['services']['design']['content'] ?? '<ul class="list-unstyled">
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Intuitive user flows that reduce friction and boost retention</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Responsive design systems for web, mobile, and beyond</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Research-backed wireframes and interaction prototypes</span>
                                </li>
                                <li class="d-flex align-items-start gap-3 mb-4">
                                    <i class="fas fa-check text-success fs-5 mt-1"></i>
                                    <span class="fs-6">Visual experiences tailored to real user behavior</span>
                                </li>
                            </ul>' !!}
                        </div>
                        <button class="btn btn-primary-gradient text-white btn-lg rounded-pill px-5 fw-semibold">
                            {{ $servicesContent->content_json['services']['design']['button_text'] ?? '🟣 Explore Design Services' }}
                        </button>
                    </div>
                    <div class="col-lg-5 text-center">
                        <img src="{{ $servicesContent->content_json['services']['design']['image'] ?? 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=600&h=400&fit=crop&crop=center' }}" 
                            alt="{{ $servicesContent->content_json['services']['design']['image_alt'] ?? 'UI/UX Design' }}" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>