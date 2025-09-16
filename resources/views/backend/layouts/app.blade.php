<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ language_direction() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="keyword" content="{{ setting('meta_keyword') }}">
    <meta name="description" content="{{ setting('meta_description') }}">

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" />
    <link rel="icon" type="image/svg" href="{{asset('images/favicon.svg')}}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/favicon.svg')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <!-- <link href="{{asset('resources/assets/css/app-backend.scss')}}" /> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    @vite(['resources/assets/css/app-backend.scss'])  
    <link href="{{ asset('vendor/fontawesome-pro/css/all.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+UI&display=swap" rel="stylesheet" />
    <!-- / Styles -->

    @stack('after-styles')
    @livewireStyles
    <!-- Styles -->

    <!-- <x-google-analytics \/> -->
</head>

<body>
    <!-- Sidebar -->
    @include('backend.includes.sidebar')
    <!-- /Sidebar -->

    <main class="wrapper d-flex flex-column min-vh-100 bg-light">
        <!-- Header -->
        @include('backend.includes.header')
        <!-- /Header -->

        <div class="body flex-grow-1">
            <div class="container-lg">

                @include('flash::message')

                <!-- Errors block -->
                @include('backend.includes.errors')
                <!-- / Errors block -->

                <!-- Main content block -->
                @yield('content')
                <!-- / Main content block -->

            </div>
        </div>

        <!-- Footer block -->
        @include('backend.includes.footer')
        <!-- / Footer block -->

    </main>
    @php
        $blockedUrls = [
            'admin/dashboard',
            'admin/settings',
            'admin/users',
            'admin/roles',
            'admin/users/profile/*',
        ];
    @endphp
    @if (!request()->is($blockedUrls))
    <!-- SEO Settings Modal -->
    <div class="modal fade" id="seoModal" tabindex="-1" aria-labelledby="seoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="seoModalLabel">
                        <i class="fas fa-search"></i>
                        SEO Settings {{ $page->id }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <form id="seoSettingsForm">
                        @csrf
                        <input type="hidden" name="page_id" id="seo_page_id" value="{{ $page->id }}">
                        <input type="hidden" name="page_type_id" id="seo_page_type_id" value="{{ $pageType->id }}">

                        <!-- Basic SEO Tab Content -->
                        <div class="row">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-tag text-primary"></i>
                                    Basic SEO Settings
                                </h6>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" 
                                           placeholder="Enter meta title (50-60 characters)" maxlength="60">
                                    <small class="form-text text-muted">
                                        <span id="title-count">0</span>/60 characters
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="slug" class="form-label">Page Slug / URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text">{{ url('/') }}/</span>
                                        <input type="text" class="form-control" id="slug" name="slug" 
                                               placeholder="page-url-slug">
                                    </div>
                                    <small class="form-text text-muted">URL-friendly version</small>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" 
                                              rows="3" placeholder="Enter meta description (150-160 characters)" 
                                              maxlength="160"></textarea>
                                    <small class="form-text text-muted">
                                        <span id="desc-count">0</span>/160 characters
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="focus_keyphrase" class="form-label">Focus Keyphrase (Primary)</label>
                                    <input type="text" class="form-control" id="focus_keyphrase" name="focus_keyphrase" 
                                           placeholder="Enter primary keyword">
                                    <small class="form-text text-muted">Main keyword for this page</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="additional_keyphrases" class="form-label">Additional Keyphrases</label>
                                    <input type="text" class="form-control" id="additional_keyphrases" name="additional_keyphrases" 
                                           placeholder="keyword1, keyword2, keyword3">
                                    <small class="form-text text-muted">Separate with commas</small>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Schema Settings -->
                        <div class="row">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-code text-success"></i>
                                    Schema Settings
                                </h6>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="page_schema_type" class="form-label">Page Type (Schema)</label>
                                    <select class="form-control" id="page_schema_type" name="page_schema_type">
                                        <option value="WebPage">WebPage (Default)</option>
                                        <option value="AboutPage">AboutPage</option>
                                        <option value="ContactPage">ContactPage</option>
                                        <option value="FAQPage">FAQPage</option>
                                        <option value="ItemPage">ItemPage</option>
                                        <option value="Article">Article</option>
                                        <option value="BlogPosting">BlogPosting</option>
                                        <option value="Service">Service</option>
                                        <option value="Product">Product</option>
                                    </select>
                                    <small class="form-text text-muted">Choose appropriate schema type</small>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Advanced Settings -->
                        <div class="row">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-cog text-warning"></i>
                                    Advanced Settings
                                </h6>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Search Engine Indexing</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="robots_index" 
                                               id="index_yes" value="index" checked>
                                        <label class="form-check-label" for="index_yes">
                                            Index - Allow in search results
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="robots_index" 
                                               id="index_no" value="noindex">
                                        <label class="form-check-label" for="index_no">
                                            No Index - Hide from search results
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Follow Links</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="robots_follow" 
                                               id="follow_yes" value="follow" checked>
                                        <label class="form-check-label" for="follow_yes">
                                            Follow - Allow following links
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="robots_follow" 
                                               id="follow_no" value="nofollow">
                                        <label class="form-check-label" for="follow_no">
                                            No Follow - Don't follow links
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="canonical_url" class="form-label">Canonical URL (Override)</label>
                                    <input type="url" class="form-control" id="canonical_url" name="canonical_url" 
                                           placeholder="https://example.com/canonical-page">
                                    <small class="form-text text-muted">Leave empty for auto-generated canonical URL</small>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Redirect Settings -->
                        <div class="row">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-exchange-alt text-danger"></i>
                                    Redirect Settings
                                </h6>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="redirect_type" class="form-label">Redirect Type</label>
                                    <select class="form-control" id="redirect_type" name="redirect_type">
                                        <option value="">No Redirect</option>
                                        <option value="301">301 - Permanent Redirect</option>
                                        <option value="302">302 - Temporary Redirect</option>
                                        <option value="404">404 - Not Found</option>
                                        <option value="410">410 - Gone</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="redirect_url" class="form-label">Redirect URL</label>
                                    <input type="url" class="form-control" id="redirect_url" name="redirect_url" 
                                           placeholder="https://example.com/new-page" disabled>
                                    <small class="form-text text-muted">Required for 301 and 302 redirects</small>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="saveSeoSettings">
                        <i class="fas fa-save"></i>
                        Save SEO Settings
                       </button>
                    </form> --}}

                    <form id="seoSettingsForm">
                        @csrf
                        <input type="hidden" name="page_id" id="seo_page_id" value="{{ $page->id }}">
                        <input type="hidden" name="page_type_id" id="seo_page_type_id" value="{{ $pageType->id }}">

                        <!-- Basic SEO Tab Content -->
                        <div class="row">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-tag text-primary"></i>
                                    Basic SEO Settings
                                </h6>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                          value="{{ $seo_data->content_json['meta_title'] ?? '' }}"
                                          placeholder="Enter meta title (50-60 characters)" maxlength="60">
                                    <small class="form-text text-muted">
                                        <span id="title-count">{{ strlen($seo_data->content_json['meta_title'] ?? '') }}</span>/60 characters
                                    </small>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" 
                                              rows="3" placeholder="Enter meta description (150-160 characters)" 
                                              maxlength="160">{{ $seo_data->content_json['meta_description'] ?? '' }}</textarea>
                                    <small class="form-text text-muted">
                                        <span id="desc-count">{{ strlen($seo_data->content_json['meta_description'] ?? '') }}</span>/160 characters
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="focus_keyphrase" class="form-label">Focus Keyphrase (Primary)</label>
                                    <input type="text" class="form-control" id="focus_keyphrase" name="focus_keyphrase"
                                          value="{{ $seo_data->content_json['focus_keyphrase'] ?? '' }}"
                                          placeholder="Enter primary keyword">
                                    <small class="form-text text-muted">Main keyword for this page</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="additional_keyphrases" class="form-label">Additional Keyphrases</label>
                                    <input type="text" class="form-control" id="additional_keyphrases" name="additional_keyphrases"
                                          value="{{ $seo_data->content_json['additional_keyphrases'] ?? '' }}"
                                          placeholder="keyword1, keyword2, keyword3">
                                    <small class="form-text text-muted">Separate with commas</small>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Schema Settings -->
                        <div class="row">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-code text-success"></i>
                                    Schema Settings
                                </h6>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="page_schema_type" class="form-label">Schema</label>
                                    <textarea class="form-control" id="page_schema_type" name="page_schema_type">{{$seo_data->content_json['page_schema_type'] ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Advanced Settings -->
                        <div class="row">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-cog text-warning"></i>
                                    Advanced Settings
                                </h6>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Search Engine Indexing</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="robots_index" 
                                              id="index_yes" value="index"
                                              {{ ($seo_data->content_json['robots_index'] ?? 'index') == 'index' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="index_yes">
                                            Index - Allow in search results
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="robots_index" 
                                              id="index_no" value="noindex"
                                              {{ ($seo_data->content_json['robots_index'] ?? '') == 'noindex' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="index_no">
                                            No Index - Hide from search results
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Follow Links</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="robots_follow" 
                                              id="follow_yes" value="follow"
                                              {{ ($seo_data->content_json['robots_follow'] ?? 'follow') == 'follow' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="follow_yes">
                                            Follow - Allow following links
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="robots_follow" 
                                              id="follow_no" value="nofollow"
                                              {{ ($seo_data->content_json['robots_follow'] ?? '') == 'nofollow' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="follow_no">
                                            No Follow - Don't follow links
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="canonical_url" class="form-label">Canonical URL (Override)</label>
                                    <input type="url" class="form-control" id="canonical_url" name="canonical_url"
                                          value="{{ $seo_data->content_json['canonical_url'] ?? '' }}"
                                          placeholder="https://example.com/canonical-page">
                                    <small class="form-text text-muted">Leave empty for auto-generated canonical URL</small>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Redirect Settings -->
                      {{-- <!-- <div class="row">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">
                                    <i class="fas fa-exchange-alt text-danger"></i>
                                    Redirect Settings
                                </h6>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="redirect_type" class="form-label">Redirect Type</label>
                                    <select class="form-control" id="redirect_type" name="redirect_type">
                                        <option value="">No Redirect</option>
                                        <option value="301" {{ ($seo_data->content_json['redirect_type'] ?? '') == '301' ? 'selected' : '' }}>301 - Permanent Redirect</option>
                                        <option value="302" {{ ($seo_data->content_json['redirect_type'] ?? '') == '302' ? 'selected' : '' }}>302 - Temporary Redirect</option>
                                        <option value="404" {{ ($seo_data->content_json['redirect_type'] ?? '') == '404' ? 'selected' : '' }}>404 - Not Found</option>
                                        <option value="410" {{ ($seo_data->content_json['redirect_type'] ?? '') == '410' ? 'selected' : '' }}>410 - Gone</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="redirect_url" class="form-label">Redirect URL</label>
                                    <input type="url" class="form-control" id="redirect_url" name="redirect_url"
                                          value="{{ $seo_data->content_json['redirect_url'] ?? '' }}"
                                          placeholder="https://example.com/new-page"
                                          {{ in_array(($seo_data->content_json['redirect_type'] ?? ''), ['301','302']) ? '' : 'disabled' }}>
                                    <small class="form-text text-muted">Required for 301 and 302 redirects</small>
                                </div>
                            </div>
                        </div> --> --}}

                        <button type="button" class="btn btn-primary" id="saveSeoSettings">
                            <i class="fas fa-save"></i>
                            Save SEO Settings
                        </button>
                    </form>

                </div>
             
            </div>
        </div>
    </div>

    <!-- SEO Button (Floating) -->
    <div class="seo-button-container">
        <button type="button" class="btn btn-primary btn-sm" id="openSeoModal" 
                data-bs-toggle="modal" data-bs-target="#seoModal" 
                style="position: fixed; bottom: 20px; right: 20px; z-index: 1040; border-radius: 50px; padding: 12px 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
            <i class="fas fa-search"></i>
            SEO Settings
        </button>
    </div>
    @endif
    <!-- Scripts -->
    <script src="{{asset('vendor/jquery/jquery@3.2.1-min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>


    <!-- <script src="{{asset('resources/assets/js/app-backend.js')}}"></script> -->
    @vite(['resources/assets/js/app-backend.js']) 
    @livewireScriptConfig
    @stack('after-scripts')
    <!-- / Scripts -->

    <!-- SEO Modal JavaScript -->
    <script>
      $(document).ready(function() {
          // Initialize Summernote
          $('.editor').summernote({
              height: 80,
              placeholder: 'Type here...',
              toolbar: [
                  ['style', ['style']],
                  ['font', ['bold', 'italic', 'underline', 'clear']],
                  ['fontname', ['fontname']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['insert', ['link', 'picture', 'table', 'hr']],
                  ['view', ['codeview', 'fullscreen']]
              ]
          });
          document.querySelectorAll('.btn-close').forEach(btn => {
                btn.addEventListener('click', () => {
                    const modal = bootstrap.Modal.getInstance(btn.closest('.modal'));
                    if (modal) modal.hide();
                });
            });
        // Character count functionality
    function updateCharacterCount(element, countElement) {
        const maxLength = element.attr('maxlength');
        const currentLength = element.val().length;
        $(countElement).text(currentLength);
        
        if (currentLength > maxLength * 0.9) {
            $(countElement).css('color', '#dc3545');
        } else {
            $(countElement).css('color', '#6c757d');
        }
    }

    // Character count for meta title
    $('#meta_title').on('input', function() {
        updateCharacterCount($(this), '#title-count');
        
        // Auto-generate slug if empty
        if ($('#slug').val() === '') {
            const slug = $(this).val()
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            $('#slug').val(slug);
        }
    });

    // Character count for meta description
    $('#meta_description').on('input', function() {
        updateCharacterCount($(this), '#desc-count');
    });

    // Redirect type change handler
    $('#redirect_type').on('change', function() {
        const redirectUrl = $('#redirect_url');
        const requiresUrl = ['301', '302'].includes($(this).val());
        
        redirectUrl.prop('disabled', !requiresUrl);
        redirectUrl.prop('required', requiresUrl);
        
        if (!requiresUrl) {
            redirectUrl.val('');
        }
    });

    // Open SEO Modal button click handler
    $('#openSeoModal').on('click', function() {
      loadCurrentPageSeoData();

        $('#seoModal').modal('show');
    });

    // Load current page SEO data when modal opens
    $(document).on('show.bs.modal', '#seoModal', function () {
        console.log('Modal show event fired ✅');
     
    });

    // Save SEO settings
    $('#saveSeoSettings').on('click', function() {
        saveSeoSettings();
    });

    function loadCurrentPageSeoData() {
        // Get page IDs from hidden fields
        const pageId = $('#seo_page_id').val();
        const pageTypeId = $('#seo_page_type_id').val();
        const currentUrl = window.location.pathname;
        
        console.log('Loading SEO data for:', { pageId, pageTypeId, currentUrl });
        
        // Show loading indicator
        showLoadingState();
        
        // Load existing SEO data via AJAX
        $.ajax({
            url: '{{ route("admin.seo.get-page-data") }}',
            method: 'GET',
            data: {
                page_id: pageId,
                page_type_id: pageTypeId,
                current_url: currentUrl
            },
            success: function(response) {
                console.log('SEO data response:', response);
                hideLoadingState();
                
                if (response.success && response.data) {
                    console.log('Found existing SEO data, populating form...');
                    populateSeoForm(response.data);
                } else {
                    console.log('No existing SEO data found, using defaults');
                    setDefaultValues();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error loading SEO data:', error);
                hideLoadingState();
                setDefaultValues();
                showNotification('warning', 'Could not load existing SEO data. Using default values.');
            }
        });
    }

    function populateSeoForm(data) {
        console.log('Populating form with data:', data);
        
        // Basic SEO fields
        $('#meta_title').val(data.meta_title || '').trigger('input');
        $('#meta_description').val(data.meta_description || '').trigger('input');
        $('#slug').val(data.slug || '');
        $('#focus_keyphrase').val(data.focus_keyphrase || '');
        $('#additional_keyphrases').val(data.additional_keyphrases || '');
        
        // Schema settings
        $('#page_schema_type').val(data.page_schema_type || 'WebPage');
        
        // Advanced settings - robots
        const robotsIndex = data.robots_index || 'index';
        const robotsFollow = data.robots_follow || 'follow';
        
        $('input[name="robots_index"][value="' + robotsIndex + '"]').prop('checked', true);
        $('input[name="robots_follow"][value="' + robotsFollow + '"]').prop('checked', true);
        
        // Canonical URL
        $('#canonical_url').val(data.canonical_url || '');
        
        // Redirect settings
        $('#redirect_type').val(data.redirect_type || '').trigger('change');
        $('#redirect_url').val(data.redirect_url || '');
        
        // Update character counts after populating
        updateCharacterCount($('#meta_title'), '#title-count');
        updateCharacterCount($('#meta_description'), '#desc-count');
        
        console.log('Form populated successfully');
    }

    function setDefaultValues() {
        // Clear all fields first
        $('#seoSettingsForm')[0].reset();
        
        // Set default values
        const pageName = $('title').text().split('|')[0].trim();
        $('#meta_title').val(pageName).trigger('input');
        $('#page_schema_type').val('WebPage');
        $('input[name="robots_index"][value="index"]').prop('checked', true);
        $('input[name="robots_follow"][value="follow"]').prop('checked', true);
        
        // Update character counts
        updateCharacterCount($('#meta_title'), '#title-count');
        updateCharacterCount($('#meta_description'), '#desc-count');
        
        console.log('Default values set');
    }

    function showLoadingState() {
        // Disable all form fields
        $('#seoSettingsForm input, #seoSettingsForm textarea, #seoSettingsForm select').prop('disabled', true);
        
        // Show loading message
        if ($('#seo-loading-message').length === 0) {
            $('#seoSettingsForm').prepend(`
                <div id="seo-loading-message" class="text-center p-3">
                    <i class="fas fa-spinner fa-spin"></i>
                    Loading SEO data...
                </div>
            `);
        }
    }

    function hideLoadingState() {
        // Enable all form fields
        $('#seoSettingsForm input, #seoSettingsForm textarea, #seoSettingsForm select').prop('disabled', false);
        
        // Remove loading message
        $('#seo-loading-message').remove();
        
        // Re-trigger redirect type change to set correct state
        $('#redirect_type').trigger('change');
    }

    function saveSeoSettings() {
        const submitBtn = $('#saveSeoSettings');
        const originalText = submitBtn.html();
        
        // Show loading state
        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Saving...').prop('disabled', true);
        
        // Prepare form data
        const formData = $('#seoSettingsForm').serialize();
        
        console.log('Saving SEO data:', formData);
        
        $.ajax({
            url: '{{ route("admin.seo.save-page-data") }}',
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Save response:', response);
                if (response.success) {
                    // Show success message
                    showNotification('success', response.message);
                    
                    // Close modal after short delay
                    setTimeout(function() {
                        $('#seoModal').modal('hide');
                    }, 1500);
                } else {
                    showNotification('error', response.message || 'Failed to save SEO settings');
                }
            },
            error: function(xhr) {
                console.error('Save error:', xhr);
                let message = 'An error occurred while saving SEO settings.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                } else if (xhr.status === 422) {
                    message = 'Validation error. Please check your input.';
                } else if (xhr.status === 500) {
                    message = 'Server error. Please try again later.';
                }
                showNotification('error', message);
            },
            complete: function() {
                // Restore button state
                submitBtn.html(originalText).prop('disabled', false);
            }
        });
    }

    function showNotification(type, message) {
        const alertClass = type === 'success' ? 'alert-success' : 
                          type === 'warning' ? 'alert-warning' : 'alert-danger';
        const iconClass = type === 'success' ? 'fa-check-circle' : 
                         type === 'warning' ? 'fa-exclamation-triangle' : 'fa-times-circle';
        
        const notification = $(`
            <div class="alert ${alertClass} alert-dismissible fade show position-fixed" 
                 style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
                <i class="fas ${iconClass} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `);
        
        $('body').append(notification);
        
        // Auto remove after 5 seconds
        setTimeout(function() {
            notification.alert('close');
        }, 5000);
    }

    // Initialize character counts on page load
    updateCharacterCount($('#meta_title'), '#title-count');
    updateCharacterCount($('#meta_description'), '#desc-count');
      });
    </script>
</body>

</html>