@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $featuresContent = $featuresContent ?? null;
    $formContent = $formContent ?? null;
    $officeContent = $officeContent ?? null;
@endphp

<!-- Common Dynamic Page Admin Styles -->
<link rel="stylesheet" href="{{ asset('css/dynamic-page-admin.css') }}">

<div class="dynamic-page-container">
    <!-- Breadcrumb -->
    <div class="container-fluid">
        <div class="dynamic-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Dynamic Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Page</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="sections-sidebar">
                    <div class="p-3 border-bottom">
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">Contact Page Sections</h5>
                    </div>
                    <div class="sections-nav">
                        <button class="section-nav-link active" data-section="hero">
                            <i class="fas fa-star"></i>
                            Hero Section
                        </button>
                        <button class="section-nav-link" data-section="features">
                            <i class="fas fa-th-large"></i>
                            Features Section
                        </button>
                        <button class="section-nav-link" data-section="form">
                            <i class="fas fa-paper-plane"></i>
                            Form Section
                        </button>
                        <button class="section-nav-link" data-section="office">
                            <i class="fas fa-building"></i>
                            Office Section
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <div class="content-area">
                    
                    <!-- Hero Section -->
                    <div class="section-content active" id="hero-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-star"></i>
                                    Hero Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="heroForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Title</label>
                                        <input type="text" class="form-control" name="hero_title" placeholder="Let's Connect and Collaborate" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['title'] ?? '') : 'Let\'s Connect and Collaborate' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Hero Subtitle</label>
                                        <textarea class="form-control" name="hero_subtitle" rows="3" placeholder="Have questions or need a demo? We're here to help you...">{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['subtitle'] ?? '') : 'Have questions or need a demo? We\'re here to help you and support your journey every step of the way.' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" class="form-control" name="hero_button_text" placeholder="Start Your Journey" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['button']['text'] ?? '') : 'Start Your Journey' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Button Icon (FontAwesome class)</label>
                                        <input type="text" class="form-control" name="hero_button_icon" placeholder="fas fa-arrow-down" value="{{ isset($heroContent) && $heroContent ? ($heroContent->content_json['button']['icon'] ?? '') : 'fas fa-arrow-down' }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Hero Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Features Section -->
                    <div class="section-content" id="features-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-th-large"></i>
                                    Features Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="featuresForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Badge Icon</label>
                                        <input type="text" class="form-control" name="features_badge_icon" placeholder="fas fa-headset" value="{{ isset($featuresContent) && $featuresContent ? ($featuresContent->content_json['badge']['icon'] ?? '') : 'fas fa-headset' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Badge Text</label>
                                        <input type="text" class="form-control" name="features_badge_text" placeholder="Contact Us" value="{{ isset($featuresContent) && $featuresContent ? ($featuresContent->content_json['badge']['text'] ?? '') : 'Contact Us' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" class="form-control" name="features_title" placeholder="Start Your Smart Conversation with Qubify" value="{{ isset($featuresContent) && $featuresContent ? ($featuresContent->content_json['title'] ?? '') : 'Start Your Smart Conversation with Qubify' }}">
                                    </div>
                                </div>
                            </div>

                            @php
                                $defaultFeatures = [
                                    ['icon' => 'fas fa-comment-dots', 'title' => 'Instant Support', 'description' => 'Got a question? We\'re just a message away to assist you.'],
                                    ['icon' => 'fas fa-calendar-alt', 'title' => 'Free Demo', 'description' => 'Book your free demo by Qubify today.'],
                                    ['icon' => 'fas fa-handshake', 'title' => 'Consultation', 'description' => 'Let\'s talk about simplifying your processes.'],
                                    ['icon' => 'fas fa-lightbulb', 'title' => 'Smart Solutions', 'description' => 'Start real conversations and smart solutions.']
                                ];
                            @endphp

                            @for($i = 1; $i <= 4; $i++)
                                <div class="card">
                                    <div class="card-title">
                                        <i class="fas fa-star"></i>
                                        Feature {{ $i }}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Feature Icon</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_icon" placeholder="{{ $defaultFeatures[$i-1]['icon'] }}" value="{{ isset($featuresContent) && $featuresContent ? ($featuresContent->content_json['features'][$i-1]['icon'] ?? '') : $defaultFeatures[$i-1]['icon'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-label">Feature Title</label>
                                                <input type="text" class="form-control" name="feature{{ $i }}_title" placeholder="{{ $defaultFeatures[$i-1]['title'] }}" value="{{ isset($featuresContent) && $featuresContent ? ($featuresContent->content_json['features'][$i-1]['title'] ?? '') : $defaultFeatures[$i-1]['title'] }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Feature Description</label>
                                                <textarea class="form-control" name="feature{{ $i }}_description" rows="2" placeholder="{{ $defaultFeatures[$i-1]['description'] }}">{{ isset($featuresContent) && $featuresContent ? ($featuresContent->content_json['features'][$i-1]['description'] ?? '') : $defaultFeatures[$i-1]['description'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Features Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Form Section -->
                    <div class="section-content" id="form-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-paper-plane"></i>
                                    Form Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="formForm">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Form Icon</label>
                                        <input type="text" class="form-control" name="form_icon" placeholder="fas fa-paper-plane" value="{{ isset($formContent) && $formContent ? ($formContent->content_json['icon'] ?? '') : 'fas fa-paper-plane' }}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-label">Form Title</label>
                                        <input type="text" class="form-control" name="form_title" placeholder="Submit Your Request / Start the Conversation" value="{{ isset($formContent) && $formContent ? ($formContent->content_json['title'] ?? '') : 'Submit Your Request / Start the Conversation' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Form Subtitle</label>
                                        <input type="text" class="form-control" name="form_subtitle" placeholder="We'll get back to you within 24 hours" value="{{ isset($formContent) && $formContent ? ($formContent->content_json['subtitle'] ?? '') : 'We\'ll get back to you within 24 hours' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-shield-alt"></i>
                                    Trust Indicators
                                </div>
                                <div class="row">
                                    @php
                                        $defaultTrust = [
                                            ['icon' => 'fas fa-shield-alt', 'text' => 'Secure & Private'],
                                            ['icon' => 'fas fa-clock', 'text' => '24hr Response'],
                                            ['icon' => 'fas fa-check-circle', 'text' => 'No Spam']
                                        ];
                                    @endphp

                                    @for($i = 1; $i <= 3; $i++)
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Trust {{ $i }} Icon</label>
                                                <input type="text" class="form-control" name="trust{{ $i }}_icon" placeholder="{{ $defaultTrust[$i-1]['icon'] }}" value="{{ isset($formContent) && $formContent ? ($formContent->content_json['trust_indicators'][$i-1]['icon'] ?? '') : $defaultTrust[$i-1]['icon'] }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Trust {{ $i }} Text</label>
                                                <input type="text" class="form-control" name="trust{{ $i }}_text" placeholder="{{ $defaultTrust[$i-1]['text'] }}" value="{{ isset($formContent) && $formContent ? ($formContent->content_json['trust_indicators'][$i-1]['text'] ?? '') : $defaultTrust[$i-1]['text'] }}">
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Form Section
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Office Section -->
                    <div class="section-content" id="office-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-building"></i>
                                    Office Section
                                </h2>
                            </div>
                        </div>
                        
                        <form id="officeForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Office Icon</label>
                                        <input type="text" class="form-control" name="office_icon" placeholder="fas fa-building" value="{{ isset($officeContent) && $officeContent ? ($officeContent->content_json['icon'] ?? '') : 'fas fa-building' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Office Title</label>
                                        <input type="text" class="form-control" name="office_title" placeholder="Our Office" value="{{ isset($officeContent) && $officeContent ? ($officeContent->content_json['title'] ?? '') : 'Our Office' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Office Address</label>
                                        <textarea class="form-control" name="office_address" rows="3" placeholder="Office no: 242, Tricity Plaza, Panchkula, Haryana (INDIA)">{{ isset($officeContent) && $officeContent ? ($officeContent->content_json['details']['address']['content'] ?? '') : 'Office no: 242, Tricity Plaza
                                    Panchkula, Haryana (INDIA)' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Office Email</label>
                                        <input type="email" class="form-control" name="office_email" placeholder="sales@qubifytech.com" value="{{ isset($officeContent) && $officeContent ? ($officeContent->content_json['details']['email']['content'] ?? '') : 'sales@qubifytech.com' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Office Phone</label>
                                        <input type="text" class="form-control" name="office_phone" placeholder="+91 7087-076-111" value="{{ isset($officeContent) && $officeContent ? ($officeContent->content_json['details']['phone']['content'] ?? '') : '+91 7087-076-111' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Business Hours</label>
                                        <textarea class="form-control" name="office_hours" rows="2" placeholder="Monday - Friday: 9:00 AM - 6:00 PM, Saturday - Sunday: Closed">{{ isset($officeContent) && $officeContent ? ($officeContent->content_json['details']['hours']['content'] ?? '') : 'Monday - Friday: 9:00 AM - 6:00 PM
                                           Saturday - Sunday: Closed' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Office Section
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Section navigation
    document.querySelectorAll('.section-nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links and sections
            document.querySelectorAll('.section-nav-link').forEach(l => l.classList.remove('active'));
            document.querySelectorAll('.section-content').forEach(s => s.classList.remove('active'));
            
            // Add active class to clicked link
            this.classList.add('active');
            
            // Show corresponding section
            const sectionId = this.getAttribute('data-section') + '-section';
            document.getElementById(sectionId).classList.add('active');
        });
    });

    // Show notification
    function showNotification(type, message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        // Add to page
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }

    // Toggle switch functionality
    const toggleSwitches = document.querySelectorAll('.section-toggle input[type="checkbox"]');
    toggleSwitches.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const label = this.nextElementSibling;
            
            // Map switch IDs to section names
            const sectionMapping = {
                'heroSwitch': 'hero',
                'featuresSwitch': 'features',
                'formSwitch': 'form',
                'officeSwitch': 'office'
            };
            
            const sectionName = sectionMapping[this.id];
            
            // Update label text
            label.textContent = this.checked ? 'On' : 'Off';
            
            // Send AJAX request to update section status
            const formData = new FormData();
            formData.append('section_name', sectionName);
            formData.append('is_active', this.checked ? '1' : '0');
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            fetch('/admin/contactpage/toggle-section', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification('success', data.message);
                } else {
                    showNotification('error', data.message);
                    // Revert toggle state on error
                    this.checked = !this.checked;
                    label.textContent = this.checked ? 'On' : 'Off';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('error', 'An error occurred while updating section status');
                // Revert toggle state on error
                this.checked = !this.checked;
                label.textContent = this.checked ? 'On' : 'Off';
            });
        });
    });

    // Form submissions
    const forms = [
        { id: 'heroForm', url: '/admin/contactpage/save-hero', buttonText: 'Save Hero Section' },
        { id: 'featuresForm', url: '/admin/contactpage/save-features', buttonText: 'Save Features Section' },
        { id: 'formForm', url: '/admin/contactpage/save-form', buttonText: 'Save Form Section' },
        { id: 'officeForm', url: '/admin/contactpage/save-office', buttonText: 'Save Office Section' }
    ];

    forms.forEach(form => {
        document.getElementById(form.id).addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const button = this.querySelector('button[type="submit"]');
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
            button.disabled = true;
            
            // Add CSRF token to form data
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            
            // Send AJAX request
            fetch(form.url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success state
                    button.innerHTML = '<i class="fas fa-check"></i> Saved!';
                    button.style.background = 'linear-gradient(135deg, #22c55e 0%, #16a34a 100%)';
                    
                    // Show success message
                    showNotification('success', data.message);
                } else {
                    // Show error state
                    button.innerHTML = '<i class="fas fa-times"></i> Error';
                    button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                    
                    // Show error message
                    showNotification('error', data.message);
                }
                
                // Reset button after 3 seconds
                setTimeout(() => {
                    button.innerHTML = `<i class="fas fa-save"></i> ${form.buttonText}`;
                    button.style.background = 'linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%)';
                    button.disabled = false;
                }, 3000);
            })
            .catch(error => {
                console.error('Error:', error);
                button.innerHTML = '<i class="fas fa-times"></i> Error';
                button.style.background = 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)';
                showNotification('error', 'An error occurred while saving');
                
                setTimeout(() => {
                    button.innerHTML = `<i class="fas fa-save"></i> ${form.buttonText}`;
                    button.style.background = 'linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%)';
                    button.disabled = false;
                }, 3000);
            });
        });
    });
</script>

@endsection