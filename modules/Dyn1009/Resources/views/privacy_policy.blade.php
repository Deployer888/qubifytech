@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $heroContent = $heroContent ?? null;
    $whoWeAreContent = $whoWeAreContent ?? null;
    $whatWeDoContent = $whatWeDoContent ?? null;
    $missionVisionContent = $missionVisionContent ?? null;
    $whyQubifyContent = $whyQubifyContent ?? null;
    $coCreationContent = $coCreationContent ?? null;
    $footerCtaContent = $footerCtaContent ?? null;
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
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">

            <!-- Content Area -->
            <div class="col-lg-12">
                <div class="content-area">
                    
                    <div class="section-content active" id="policy-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-users"></i>
                                    Privacy & Policy
                                </h2>
                            </div>
                        </div>
                        
                        <form id="policyForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Policy text</label>
                                        <textarea class="form-control editor" name="policy_text" rows="3" placeholder="">{{ isset($policyContent) && $policyContent ? ($policyContent->content_json['text'] ?? '') : '' }}</textarea>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Privacy & Policy Section
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


    // Similar form submission handlers for other sections
    const forms = [
        { id: 'policyForm', url: '/admin/policy-section'}
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
</script>

@endsection