<link rel="stylesheet" href="{{ asset('css/home/hero.css') }}">

<section class="section hero-section" id="home">
    <div class="hero-video-bg">
        <video autoplay muted loop playsinline class="hero-video" poster="">
            <source src="{{ asset('7021937.mp4') }}" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>
    
    <div class="hero-background">
        <div class="floating-particles">
            <div class="particle" style="top: 20%; left: 10%; animation-delay: 0s;"></div>
            <div class="particle" style="top: 30%; right: 15%; animation-delay: 3s;"></div>
            <div class="particle" style="bottom: 25%; left: 20%; animation-delay: 6s;"></div>
            <div class="particle" style="bottom: 40%; right: 25%; animation-delay: 9s;"></div>
            <div class="particle" style="top: 60%; left: 50%; animation-delay: 12s;"></div>
        </div>
        <div class="neural-network">
            <div class="neural-node" style="top: 20%; left: 10%;"></div>
            <div class="neural-node" style="top: 30%; right: 15%;"></div>
            <div class="neural-node" style="bottom: 25%; left: 20%;"></div>
            <div class="neural-node" style="bottom: 40%; right: 25%;"></div>
        </div>
    </div>
 
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="hero-content">

                    <div class="hero-badge">
                        <i class="{{ $heroContent->content_json['badge']['icon'] ?? 'fas fa-rocket' }}"></i>
                        <span>{{ $heroContent->content_json['badge']['text'] ?? 'A Leading Software Development Company' }}</span>
                    </div>
                    
                    <h1 class="hero-title">
                        <span id="typingText" class="typing-word gradient-box neon-cyan">
                           {{ $heroContent->content_json['title'] ?? 'AI-Driven Software Development Company' }}</span>
                    </h1>
                    <!-- <h1 class="hero-title">
                        <span id="typingText" class="typing-word gradient-box neon-cyan">AI-Driven</span><br>
                        Software Development Company
                    </h1> -->
                    
                    <p class="hero-description">
                        {{ $heroContent->content_json['description'] ?? 'We design AI-powered software and cutting-edge solutions that help global enterprises and tech startups build faster, smarter, and more efficiently. Making an advanced and better future.' }}
                    </p>
                    
                    <p class="hero-subdescription">
                        {{ $heroContent->content_json['sub_description'] ?? 'From idea to execution, Qubify is your engine for next-gen innovation.' }}
                    </p>
                    
                    <div class="hero-actions">
                        <a href="{{ $heroContent->content_json['cta']['link'] ?? 'javascript:void(0)' }}" 
                           @if(($heroContent->content_json['cta']['link'] ?? 'javascript:void(0)') === 'javascript:void(0)') onclick="openContactModal()" @endif
                           class="inline-flex items-center px-6 py-2 text-xl font-medium text-white bg-gradient-to-r from-blue-500 to-blue-500 rounded-xl hover:from-blue-600 hover:to-blue-600 transition-all duration-300 hover-glow transform hover:scale-105 shadow-lg">
                            <i class="{{ $heroContent->content_json['cta']['icon'] ?? 'fas fa-rocket' }}" style="margin-right: 8px;"></i>
                            {{ $heroContent->content_json['cta']['text'] ?? 'Start Your Project' }}
                        </a>
                    </div>
                    
                    <div class="hero-stats">
                        @if(isset($heroContent->content_json['statistics']) && is_array($heroContent->content_json['statistics']))
                            @foreach($heroContent->content_json['statistics'] as $stat)
                                <div class="stat-item">
                                    <div class="stat-number-container">
                                        <div class="stat-number" data-count="{{ $stat['number'] ?? '0' }}">0</div>
                                        <div class="stat-suffix">{{ $stat['suffix'] ?? '+' }}</div>
                                    </div>
                                    <div class="stat-label">{{ $stat['label'] ?? 'Statistic' }}</div>
                                </div>
                            @endforeach
                        @else
                            {{-- Fallback static stats --}}
                            <div class="stat-item">
                                <div class="stat-number-container">
                                    <div class="stat-number" data-count="500">0</div>
                                    <div class="stat-suffix">+</div>
                                </div>
                                <div class="stat-label">Successful Projects</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number-container">
                                    <div class="stat-number" data-count="50">0</div>
                                    <div class="stat-suffix">+</div>
                                </div>
                                <div class="stat-label">Enterprise Clients</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number-container">
                                    <div class="stat-number" data-count="99">0</div>
                                    <div class="stat-suffix">%</div>
                                </div>
                                <div class="stat-label">Project Success Rate</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- <div class="col-lg-5 align-content-center hero-right">
                <div class="hero-visual">
                    <div class="ai-animation-container">
                        <div class="code-window">
                            <div class="window-header">
                                <div class="window-controls">
                                    <span class="control close"></span>
                                    <span class="control minimize"></span>
                                    <span class="control maximize"></span>
                                </div>
                                <div class="window-title">AI_Neural_Network.py</div>
                            </div>
                            <div class="code-content">
                                <div class="code-line"><span class="keyword">import</span> <span class="module">tensorflow</span> <span class="keyword">as</span> <span class="variable">tf</span></div>
                                <div class="code-line"><span class="keyword">from</span> <span class="module">neural_network</span> <span class="keyword">import</span> <span class="variable">AI_Model</span></div>
                                <div class="code-line"></div>
                                <div class="code-line"><span class="keyword">class</span> <span class="class">IntelligentSystem</span>:</div>
                                <div class="code-line">&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">__init__</span>(<span class="variable">self</span>):</div>
                                <div class="code-line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="variable">self</span>.<span class="property">model</span> = <span class="variable">AI_Model</span>()</div>
                                <div class="code-line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="variable">self</span>.<span class="property">accuracy</span> = <span class="number">0.99</span></div>
                                <div class="code-line"></div>
                                <div class="code-line">&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">predict</span>(<span class="variable">self</span>, <span class="variable">data</span>):</div>
                            </div>
                        </div>
                        
                        <div class="floating-elements">
                            <div class="element ai-chip" style="top: 10%; left: 10%; animation-delay: 0s;">
                                <i class="fas fa-microchip"></i>
                            </div>
                            <div class="element neural-icon" style="top: 20%; right: 10%; animation-delay: 2s;">
                                <i class="fas fa-brain"></i>
                            </div>
                            <div class="element data-icon" style="bottom: 30%; left: 5%; animation-delay: 4s;">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="element cloud-icon" style="bottom: 10%; right: 15%; animation-delay: 6s;">
                                <i class="fas fa-cloud"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

<script>
    // Add this animateCounter function to your JavaScript
    function animateCounter(element, target, duration) {
        let start = 0;
        const increment = target / (duration / 16); // 60fps
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    // Alternative smoother version using requestAnimationFrame
    function animateCounterSmooth(element, target, duration) {
        const startTime = performance.now();
        const startValue = 0;
        
        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function for smooth animation
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const currentValue = Math.floor(startValue + (target - startValue) * easeOutQuart);
            
            element.textContent = currentValue;
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target; // Ensure final value is exact
            }
        }
        
        requestAnimationFrame(updateCounter);
    }

    // Complete working code for your counters
    document.addEventListener('DOMContentLoaded', function() {
        // Your existing typing animation code here...
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
        
        // Initialize hero counters with working animation
        const heroCounters = document.querySelectorAll('.hero-stats .stat-number[data-count]');
        heroCounters.forEach((counter, index) => {
            const target = parseInt(counter.getAttribute('data-count'));
            const statItem = counter.closest('.stat-item');
            const suffix = statItem.querySelector('.stat-suffix');
            
            // Start counter animation with a slight delay for each counter
            setTimeout(() => {
                animateCounterSmooth(counter, target, 2000);
            }, index * 200);
            
            // Show the suffix with animation
            if (suffix) {
                setTimeout(() => {
                    suffix.style.opacity = '1';
                    suffix.style.transform = 'scale(1)';
                }, 1500 + (index * 200));
            }
        });
        
        // Intersection Observer for animation on scroll (optional)
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number[data-count]');
                    counters.forEach((counter, index) => {
                        const target = parseInt(counter.getAttribute('data-count'));
                        const statItem = counter.closest('.stat-item');
                        const suffix = statItem.querySelector('.stat-suffix');
                        
                        // Reset counter
                        counter.textContent = '0';
                        if (suffix) {
                            suffix.style.opacity = '0';
                            suffix.style.transform = 'scale(0.8)';
                        }
                        
                        // Start animation
                        setTimeout(() => {
                            animateCounterSmooth(counter, target, 2000);
                        }, index * 200);
                        
                        if (suffix) {
                            setTimeout(() => {
                                suffix.style.opacity = '1';
                                suffix.style.transform = 'scale(1)';
                            }, 1500 + (index * 200));
                        }
                    });
                    
                    // Unobserve after first animation
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe the stats section
        const statsSection = document.querySelector('.hero-stats');
        if (statsSection) {
            observer.observe(statsSection);
        }
    });
</script>

<script src="{{ asset('js/home/hero.js') }}"></script>
