@extends('backend.layouts.app')

@section('content')
@php
    // Initialize variables to prevent undefined variable errors
    $basicSeoContent = $basicSeoContent ?? null;
    $keywordsContent = $keywordsContent ?? null;
    $schemaContent = $schemaContent ?? null;
    $advancedContent = $advancedContent ?? null;
    $redirectsContent = $redirectsContent ?? null;
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
                    <li class="breadcrumb-item"><a href="#">SEO Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Page SEO Settings</li>
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
                        <h5 class="mb-0" style="color: #1e293b; font-weight: 600;">SEO Configuration</h5>
                    </div>
                    <div class="sections-nav">
                        <button class="section-nav-link active" data-section="basic-seo">
                            <i class="fas fa-search"></i>
                            Basic SEO
                        </button>
                        <button class="section-nav-link" data-section="keywords">
                            <i class="fas fa-tags"></i>
                            Keywords
                        </button>
                        <button class="section-nav-link" data-section="schema">
                            <i class="fas fa-code"></i>
                            Schema Settings
                        </button>
                        <button class="section-nav-link" data-section="advanced">
                            <i class="fas fa-cog"></i>
                            Advanced Settings
                        </button>
                        <button class="section-nav-link" data-section="redirects">
                            <i class="fas fa-exchange-alt"></i>
                            Redirects
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <div class="content-area">
                    
                    <!-- Basic SEO Section -->
                    <div class="section-content active" id="basic-seo-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-search"></i>
                                    Basic SEO Settings
                                </h2>
                            </div>
                        </div>
                        
                        <form id="basicSeoForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" placeholder="Enter meta title (recommended: 50-60 characters)" maxlength="60" value="{{ isset($basicSeoContent) && $basicSeoContent ? ($basicSeoContent->content_json['meta_title'] ?? '') : '' }}">
                                        <small class="form-text text-muted">
                                            <span class="character-count">0</span>/60 characters
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Meta Description</label>
                                        <textarea class="form-control" name="meta_description" rows="3" placeholder="Enter meta description (recommended: 150-160 characters)" maxlength="160">{{ isset($basicSeoContent) && $basicSeoContent ? ($basicSeoContent->content_json['meta_description'] ?? '') : '' }}</textarea>
                                        <small class="form-text text-muted">
                                            <span class="character-count">0</span>/160 characters
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Page Slug / URL</label>
                                        <div class="input-group">
                                            <span class="input-group-text">{{ url('/') }}/</span>
                                            <input type="text" class="form-control" name="slug" placeholder="page-url-slug" value="{{ isset($basicSeoContent) && $basicSeoContent ? ($basicSeoContent->content_json['slug'] ?? '') : '' }}">
                                        </div>
                                        <small class="form-text text-muted">URL-friendly version of the page name. Use lowercase letters, numbers, and hyphens only.</small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Focus Keyphrase (Primary)</label>
                                        <input type="text" class="form-control" name="focus_keyphrase" placeholder="Enter primary keyword or phrase" value="{{ isset($basicSeoContent) && $basicSeoContent ? ($basicSeoContent->content_json['focus_keyphrase'] ?? '') : '' }}">
                                        <small class="form-text text-muted">The main keyword you want this page to rank for.</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Basic SEO Settings
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Keywords Section -->
                    <div class="section-content" id="keywords-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-tags"></i>
                                    Additional Keywords
                                </h2>
                            </div>
                        </div>

                        <form id="keywordsForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Additional Keyphrases (Premium)</label>
                                        <textarea class="form-control" name="additional_keyphrases" rows="4" placeholder="Enter additional keywords, separated by commas">{{ isset($keywordsContent) && $keywordsContent ? ($keywordsContent->content_json['additional_keyphrases'] ?? '') : '' }}</textarea>
                                        <small class="form-text text-muted">Enter related keywords and phrases, separated by commas. These should support your main focus keyphrase.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-lightbulb"></i>
                                    Keyword Suggestions
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-2"><strong>Tips for choosing keywords:</strong></p>
                                        <ul class="mb-0">
                                            <li>Use long-tail keywords (3-4 words)</li>
                                            <li>Include location-based keywords if relevant</li>
                                            <li>Consider user intent and search queries</li>
                                            <li>Research competitor keywords</li>
                                            <li>Use keyword research tools for volume and difficulty</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Keywords
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Schema Settings Section -->
                    <div class="section-content" id="schema-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-code"></i>
                                    Schema Settings
                                </h2>
                            </div>
                        </div>
                        
                        <form id="schemaForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Page Type (Schema)</label>
                                        <select class="form-control" name="page_type">
                                            <option value="">Select Page Type</option>
                                            <option value="WebPage" {{ (isset($schemaContent) && $schemaContent ? ($schemaContent->content_json['page_type'] ?? '') : '') == 'WebPage' ? 'selected' : '' }}>WebPage (Default)</option>
                                            <option value="AboutPage" {{ (isset($schemaContent) && $schemaContent ? ($schemaContent->content_json['page_type'] ?? '') : '') == 'AboutPage' ? 'selected' : '' }}>AboutPage</option>
                                            <option value="ContactPage" {{ (isset($schemaContent) && $schemaContent ? ($schemaContent->content_json['page_type'] ?? '') : '') == 'ContactPage' ? 'selected' : '' }}>ContactPage</option>
                                            <option value="FAQPage" {{ (isset($schemaContent) && $schemaContent ? ($schemaContent->content_json['page_type'] ?? '') : '') == 'FAQPage' ? 'selected' : '' }}>FAQPage</option>
                                            <option value="ItemPage" {{ (isset($schemaContent) && $schemaContent ? ($schemaContent->content_json['page_type'] ?? '') : '') == 'ItemPage' ? 'selected' : '' }}>ItemPage</option>
                                            <option value="Article" {{ (isset($schemaContent) && $schemaContent ? ($schemaContent->content_json['page_type'] ?? '') : '') == 'Article' ? 'selected' : '' }}>Article</option>
                                            <option value="BlogPosting" {{ (isset($schemaContent) && $schemaContent ? ($schemaContent->content_json['page_type'] ?? '') : '') == 'BlogPosting' ? 'selected' : '' }}>BlogPosting</option>
                                            <option value="Service" {{ (isset($schemaContent) && $schemaContent ? ($schemaContent->content_json['page_type'] ?? '') : '') == 'Service' ? 'selected' : '' }}>Service</option>
                                            <option value="Product" {{ (isset($schemaContent) && $schemaContent ? ($schemaContent->content_json['page_type'] ?? '') : '') == 'Product' ? 'selected' : '' }}>Product</option>
                                        </select>
                                        <small class="form-text text-muted">Choose the appropriate schema type for this page to help search engines understand your content.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-info-circle"></i>
                                    Schema Type Descriptions
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="mb-0">
                                            <li><strong>WebPage:</strong> General web pages</li>
                                            <li><strong>AboutPage:</strong> About us, company information pages</li>
                                            <li><strong>ContactPage:</strong> Contact information pages</li>
                                            <li><strong>FAQPage:</strong> Frequently asked questions pages</li>
                                            <li><strong>ItemPage:</strong> Product or service detail pages</li>
                                            <li><strong>Article:</strong> News articles, editorial content</li>
                                            <li><strong>BlogPosting:</strong> Blog posts</li>
                                            <li><strong>Service:</strong> Service description pages</li>
                                            <li><strong>Product:</strong> Product pages</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Schema Settings
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Advanced Settings Section -->
                    <div class="section-content" id="advanced-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-cog"></i>
                                    Advanced Settings
                                </h2>
                            </div>
                        </div>
                        
                        <form id="advancedForm">
                            @csrf
                            
                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-search"></i>
                                    Search Engine Indexing
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Allow search engines to show this page in search results?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="robots_index" id="index_yes" value="index" {{ (isset($advancedContent) && $advancedContent ? ($advancedContent->content_json['robots_index'] ?? 'index') : 'index') == 'index' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="index_yes">
                                                    Yes (index) - Allow indexing
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="robots_index" id="index_no" value="noindex" {{ (isset($advancedContent) && $advancedContent ? ($advancedContent->content_json['robots_index'] ?? 'index') : 'index') == 'noindex' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="index_no">
                                                    No (noindex) - Prevent indexing
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-link"></i>
                                    Meta Robots Advanced Options
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Follow Links</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="robots_follow" id="follow_yes" value="follow" {{ (isset($advancedContent) && $advancedContent ? ($advancedContent->content_json['robots_follow'] ?? 'follow') : 'follow') == 'follow' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="follow_yes">
                                                    Follow - Allow search engines to follow links on this page
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="robots_follow" id="follow_no" value="nofollow" {{ (isset($advancedContent) && $advancedContent ? ($advancedContent->content_json['robots_follow'] ?? 'follow') : 'follow') == 'nofollow' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="follow_no">
                                                    Nofollow - Don't follow links on this page
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-external-link-alt"></i>
                                    Canonical URL
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Canonical URL (Override)</label>
                                            <input type="url" class="form-control" name="canonical_url" placeholder="https://example.com/canonical-page" value="{{ isset($advancedContent) && $advancedContent ? ($advancedContent->content_json['canonical_url'] ?? '') : '' }}">
                                            <small class="form-text text-muted">Leave empty to use the default page URL. Only set if you want to specify a different canonical URL.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Advanced Settings
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Redirects Section -->
                    <div class="section-content" id="redirects-section">
                        <div class="section-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title">
                                    <i class="fas fa-exchange-alt"></i>
                                    Redirects
                                </h2>
                            </div>
                        </div>
                        
                        <form id="redirectsForm">
                            @csrf
                            
                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-directions"></i>
                                    Redirect Configuration
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Redirect Type</label>
                                            <select class="form-control" name="redirect_type">
                                                <option value="">No Redirect</option>
                                                <option value="301" {{ (isset($redirectsContent) && $redirectsContent ? ($redirectsContent->content_json['redirect_type'] ?? '') : '') == '301' ? 'selected' : '' }}>301 - Permanent Redirect</option>
                                                <option value="302" {{ (isset($redirectsContent) && $redirectsContent ? ($redirectsContent->content_json['redirect_type'] ?? '') : '') == '302' ? 'selected' : '' }}>302 - Temporary Redirect</option>
                                                <option value="404" {{ (isset($redirectsContent) && $redirectsContent ? ($redirectsContent->content_json['redirect_type'] ?? '') : '') == '404' ? 'selected' : '' }}>404 - Not Found</option>
                                                <option value="410" {{ (isset($redirectsContent) && $redirectsContent ? ($redirectsContent->content_json['redirect_type'] ?? '') : '') == '410' ? 'selected' : '' }}>410 - Gone</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Redirect URL</label>
                                            <input type="url" class="form-control" name="redirect_url" placeholder="https://example.com/new-page" value="{{ isset($redirectsContent) && $redirectsContent ? ($redirectsContent->content_json['redirect_url'] ?? '') : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-title">
                                    <i class="fas fa-info-circle"></i>
                                    Redirect Types Explained
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="mb-0">
                                            <li><strong>301 - Permanent Redirect:</strong> The page has permanently moved. Search engines will transfer ranking to the new URL.</li>
                                            <li><strong>302 - Temporary Redirect:</strong> The page has temporarily moved. Search engines will keep the original URL in their index.</li>
                                            <li><strong>404 - Not Found:</strong> The page doesn't exist. Users will see a "page not found" error.</li>
                                            <li><strong>410 - Gone:</strong> The page has been permanently removed and won't come back.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save Redirect Settings
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
document.addEventListener('DOMContentLoaded', function() {
    // Character count for meta title and description
    const metaTitle = document.querySelector('input[name="meta_title"]');
    const metaDescription = document.querySelector('textarea[name="meta_description"]');
    
    function updateCharacterCount(element) {
        const maxLength = element.getAttribute('maxlength');
        const currentLength = element.value.length;
        const counterElement = element.parentNode.querySelector('.character-count');
        if (counterElement) {
            counterElement.textContent = currentLength;
            counterElement.style.color = currentLength > maxLength * 0.9 ? '#dc3545' : '#6c757d';
        }
    }

    if (metaTitle) {
        metaTitle.addEventListener('input', () => updateCharacterCount(metaTitle));
        updateCharacterCount(metaTitle);
    }

    if (metaDescription) {
        metaDescription.addEventListener('input', () => updateCharacterCount(metaDescription));
        updateCharacterCount(metaDescription);
    }

    // Slug generation from meta title
    if (metaTitle) {
        const slugField = document.querySelector('input[name="slug"]');
        metaTitle.addEventListener('input', function() {
            if (slugField && !slugField.value) {
                const slug = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');
                slugField.value = slug;
            }
        });
    }

    // Section navigation
    const sectionLinks = document.querySelectorAll('.section-nav-link');
    const sectionContents = document.querySelectorAll('.section-content');

    sectionLinks.forEach(link => {
        link.addEventListener('click', function() {
            const targetSection = this.getAttribute('data-section');
            
            // Remove active class from all links and sections
            sectionLinks.forEach(l => l.classList.remove('active'));
            sectionContents.forEach(s => s.classList.remove('active'));
            
            // Add active class to clicked link and corresponding section
            this.classList.add('active');
            document.getElementById(targetSection + '-section').classList.add('active');
        });
    });

    // Form submissions
    // const forms = ['basicSeoForm', 'keywordsForm', 'schemaForm', 'advancedForm', 'redirectsForm'];
    // const routes = {
    //     'basicSeoForm': '{{ route("admin.seo.save-basic") }}',
    //     'keywordsForm': '{{ route("admin.seo.save-keywords") }}',
    //     'schemaForm': '{{ route("admin.seo.save-schema") }}',
    //     'advancedForm': '{{ route("admin.seo.save-advanced") }}',
    //     'redirectsForm': '{{ route("admin.seo.save-redirects") }}'
    // };

    // forms.forEach(formId => {
    //     const form = document.getElementById(formId);
    //     if (form) {
    //         form.addEventListener('submit', function(e) {
    //             e.preventDefault();
                
    //             const formData = new FormData(this);
    //             const submitBtn = this.querySelector('button[type="submit"]');
    //             const originalText = submitBtn.innerHTML;
                
    //             submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
    //             submitBtn.disabled = true;
                
    //             fetch(routes[formId], {
    //                 method: 'POST',
    //                 body: formData,
    //                 headers: {
    //                     'X-Requested-With': 'XMLHttpRequest'
    //                 }
    //             })
    //             .then(response => response.json())
    //             .then(data => {
    //                 if (data.success) {
    //                     showNotification('success', data.message);
    //                 } else {
    //                     showNotification('error', data.message);
    //                 }
    //             })
    //             .catch(error => {
    //                 showNotification('error', 'An error occurred while saving.');
    //             })
    //             .finally(() => {
    //                 submitBtn.innerHTML = originalText;
    //                 submitBtn.disabled = false;
    //             });
    //         });
    //     }
    // });

    // Redirect type change handler
    const redirectType = document.querySelector('select[name="redirect_type"]');
    const redirectUrl = document.querySelector('input[name="redirect_url"]');
    
    if (redirectType && redirectUrl) {
        redirectType.addEventListener('change', function() {
            const requiresUrl = ['301', '302'].includes(this.value);
            redirectUrl.required = requiresUrl;
            redirectUrl.parentNode.style.display = requiresUrl || this.value === '' ? 'block' : 'none';
        });
        
        // Trigger change event on page load
        redirectType.dispatchEvent(new Event('change'));
    }

    function showNotification(type, message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }
});
</script>

@endsection