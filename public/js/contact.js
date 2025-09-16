/**
 * Contact Us Page JavaScript - Bootstrap Premium Edition
 * Handles form validation, Google Maps, animations, and premium user interactions
 */

'use strict';

// Global variables
let map;
let contactForm;
let successModal;
let isSubmitting = false;

// Configuration
const CONFIG = {
  // Qubify office location (Panchkula, Haryana)
  officeLocation: {
    lat: 30.6942,
    lng: 76.8606
  },
  // Form validation patterns
  patterns: {
    email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
    phone: /^[\+]?[1-9][\d]{0,15}$/,
    name: /^[a-zA-Z\s]{2,50}$/
  },
  // Animation timing
  animationDelay: 150,
  staggerDelay: 100,
  // API endpoints (replace with actual endpoints)
  endpoints: {
    submit: '/api/contact-submit'
  },
  // Premium effects
  effects: {
    particlesEnabled: true,
    parallaxEnabled: true,
    morphingEnabled: true
  }
};

/**
 * Initialize the application when DOM is loaded
 */
document.addEventListener('DOMContentLoaded', function() {
  // initializeApp();
});

/**
 * Main application initialization
 */
function initializeApp() {
  // Get DOM elements
  contactForm = document.getElementById('contactForm');
  
  // Initialize Bootstrap modal
  const successModalElement = document.getElementById('successModal');
  if (successModalElement) {
    successModal = new bootstrap.Modal(successModalElement);
  }
  
  // Initialize components
  initializeFormValidation();
  initializeAnimations();
  initializeAccessibility();
  initializePremiumEffects();
  initializeParallax();
  
  // Add event listeners
  addEventListeners();
  
  // Start premium animations
  startPremiumAnimations();
  
  console.log('🚀 Qubify Contact Page initialized with Bootstrap and premium features');
}

/**
 * Initialize premium effects and interactions
 */
function initializePremiumEffects() {
  // Initialize magnetic buttons
  initializeMagneticButtons();
  
  // Initialize text reveal animations
  initializeTextReveal();
    
  // Initialize cursor trail (desktop only)
  if (window.innerWidth > 1024) {
    // initializeCursorEffects();
  }
}

/**
 * Initialize magnetic button effects
 */
function initializeMagneticButtons() {
  const magneticElements = document.querySelectorAll('.form__submit, .btn-primary, .hero__button');
  
  magneticElements.forEach(element => {
    element.addEventListener('mousemove', (e) => {
      const rect = element.getBoundingClientRect();
      const x = e.clientX - rect.left - rect.width / 2;
      const y = e.clientY - rect.top - rect.height / 2;
      
      element.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px)`;
    });
    
    element.addEventListener('mouseleave', () => {
      element.style.transform = '';
    });
  });
}

/**
 * Initialize text reveal animations
 */
function initializeTextReveal() {
  const textElements = document.querySelectorAll('.hero__title, .hero__subtitle, .contact__heading');
  
  textElements.forEach((element, index) => {
    const text = element.textContent;
    element.innerHTML = '';
    
    text.split('').forEach((char, charIndex) => {
      const span = document.createElement('span');
      span.textContent = char === ' ' ? '\u00A0' : char;
      span.style.opacity = '0';
      span.style.transform = 'translateY(50px)';
      span.style.transition = `all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) ${charIndex * 0.03}s`;
      element.appendChild(span);
    });
    
    // Trigger animation
    setTimeout(() => {
      element.querySelectorAll('span').forEach(span => {
        span.style.opacity = '1';
        span.style.transform = 'translateY(0)';
      });
    }, index * 200);
  });
}


/**
 * Initialize cursor effects for desktop
 */
function initializeCursorEffects() {
  const cursor = document.createElement('div');
  cursor.className = 'premium-cursor';
  cursor.innerHTML = '<div class="cursor-dot"></div><div class="cursor-outline"></div>';
  document.body.appendChild(cursor);
  
  let mouseX = 0, mouseY = 0;
  let cursorX = 0, cursorY = 0;
  
  document.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
  });
  
  function animateCursor() {
    cursorX += (mouseX - cursorX) * 0.1;
    cursorY += (mouseY - cursorY) * 0.1;
    cursor.style.transform = `translate(${cursorX}px, ${cursorY}px)`;
    requestAnimationFrame(animateCursor);
  }
  
  animateCursor();
  
  // Add hover effects
  const hoverElements = document.querySelectorAll('a, button, input, textarea, select');
  hoverElements.forEach(element => {
    element.addEventListener('mouseenter', () => cursor.classList.add('hover'));
    element.addEventListener('mouseleave', () => cursor.classList.remove('hover'));
  });
  
  // Add cursor styles
  const cursorStyles = `
    .premium-cursor {
      position: fixed;
      top: 0;
      left: 0;
      pointer-events: none;
      z-index: 9999;
      mix-blend-mode: difference;
    }
    .cursor-dot {
      width: 8px;
      height: 8px;
      background: #0055A4;
      border-radius: 50%;
    }
    .cursor-outline {
      position: absolute;
      top: -15px;
      left: -15px;
      width: 38px;
      height: 38px;
      border: 2px solid rgba(0, 85, 164, 0.3);
      border-radius: 50%;
      transition: all 0.1s ease;
    }
    .premium-cursor.hover .cursor-outline {
      transform: scale(1.5);
      border-color: #0055A4;
    }
  `;
  
  const styleSheet = document.createElement('style');
  styleSheet.textContent = cursorStyles;
  document.head.appendChild(styleSheet);
}

/**
 * Initialize parallax effects
 */
function initializeParallax() {
  if (!CONFIG.effects.parallaxEnabled) return;
  
  const parallaxElements = document.querySelectorAll('.hero, .contact');
  
  window.addEventListener('scroll', () => {
    const scrollTop = window.pageYOffset;
    
    parallaxElements.forEach((element, index) => {
      const speed = 0.5 + (index * 0.2);
      const yPos = -(scrollTop * speed);
      element.style.transform = `translateY(${yPos}px)`;
    });
  });
}

/**
 * Start premium animations
 */
function startPremiumAnimations() {
  // Animate elements on load
  const animatedElements = document.querySelectorAll('.fade-in');
  animatedElements.forEach((element, index) => {
    setTimeout(() => {
      element.classList.add('visible');
    }, index * CONFIG.staggerDelay);
  });
  
  // Add morphing effect to buttons
  morphButtons();
}

/**
 * Add morphing effect to buttons
 */
function morphButtons() {
  const buttons = document.querySelectorAll('.form__submit, .btn-primary');
  
  buttons.forEach(button => {
    setInterval(() => {
      button.style.borderRadius = `
        ${Math.random() * 20 + 10}px 
        ${Math.random() * 20 + 10}px 
        ${Math.random() * 20 + 10}px 
        ${Math.random() * 20 + 10}px
      `;
    }, 3000);
  });
}

/**
 * Add all event listeners
 */
function addEventListeners() {
  // Form submission
  if (contactForm) {
    contactForm.addEventListener('submit', handleFormSubmit);
    
    // Real-time validation for form fields
    const formFields = contactForm.querySelectorAll('input, select, textarea');
    formFields.forEach(field => {
      field.addEventListener('blur', () => validateField(field));
      field.addEventListener('input', () => clearFieldError(field));
    });
  }
  
  // Keyboard events
  document.addEventListener('keydown', handleKeyboardEvents);
  
  // Scroll events for header
  window.addEventListener('scroll', handleScroll);
  
  // Resize events
  window.addEventListener('resize', debounce(handleResize, 250));
  
  // Bootstrap modal events
  if (successModal) {
    const successModalElement = document.getElementById('successModal');
    successModalElement.addEventListener('hidden.bs.modal', () => {
      // Return focus to form after modal closes
      if (contactForm) {
        const firstInput = contactForm.querySelector('input');
        if (firstInput) {
          firstInput.focus();
        }
      }
    });
  }
}

/**
 * Form validation initialization
 */
function initializeFormValidation() {
  if (!contactForm) return;
  
  // Add novalidate to prevent browser default validation
  contactForm.setAttribute('novalidate', '');
}

/**
 * Handle form submission with premium effects
 */
async function handleFormSubmit(event) {
  event.preventDefault();
  
  if (isSubmitting) return;
  
  const submitButton = contactForm.querySelector('.form__submit');
  const originalText = submitButton.querySelector('.form__submit-text').textContent;
  
  try {
    // Validate entire form
    if (!validateForm()) {
      // Shake the form for invalid submission
      contactForm.style.animation = 'shake 0.5s ease-in-out';
      setTimeout(() => {
        contactForm.style.animation = '';
      }, 500);
      return;
    }
    
    isSubmitting = true;
    
    // Show premium loading state
    setPremiumLoadingState(submitButton, true);
    
    // Add loading particles
    addLoadingParticles(submitButton);
    
    // Get form data
    const formData = new FormData(contactForm);
    const data = Object.fromEntries(formData.entries());
    
    // Add loading effect to entire form
    contactForm.style.filter = 'blur(1px)';
    contactForm.style.opacity = '0.7';
    
    // Simulate API call (replace with actual API call)
    await simulateFormSubmission(data);
    
    // Success animation
    await playSuccessAnimation();
    
    // Show success modal with premium effect
    showPremiumModal();
    
    // Reset form with animation
    await resetFormWithAnimation();
    
  } catch (error) {
    console.error('Form submission error:', error);
    showPremiumErrorMessage('Sorry, there was an error sending your message. Please try again.');
    
    // Error shake animation
    submitButton.style.animation = 'shake 0.5s ease-in-out';
    setTimeout(() => {
      submitButton.style.animation = '';
    }, 500);
  } finally {
    // Reset states
    isSubmitting = false;
    setPremiumLoadingState(submitButton, false, originalText);
    removeLoadingParticles(submitButton);
    
    // Remove form blur
    contactForm.style.filter = '';
    contactForm.style.opacity = '';
  }
}

/**
 * Set premium loading state for button
 */
function setPremiumLoadingState(button, isLoading, text = 'Sending Message...') {
  const textElement = button.querySelector('.form__submit-text');
  const icon = button.querySelector('i');
  
  if (isLoading) {
    button.disabled = true;
    button.style.background = 'linear-gradient(270deg, #0055A4, #1a6bb8, #3b82f6, #1a6bb8, #0055A4)';
    button.style.backgroundSize = '400% 400%';
    button.style.animation = 'shimmer 2s ease-in-out infinite';
    textElement.textContent = text;
    icon.className = 'fas fa-spinner fa-spin ms-2';
    
    // Add glow effect
    button.style.boxShadow = '0 0 30px rgba(0, 85, 164, 0.6)';
  } else {
    button.disabled = false;
    button.style.background = '';
    button.style.backgroundSize = '';
    button.style.animation = '';
    textElement.textContent = text;
    icon.className = 'fas fa-paper-plane ms-2';
    button.style.boxShadow = '';
  }
}

/**
 * Add loading particles to button
 */
function addLoadingParticles(button) {
  for (let i = 0; i < 5; i++) {
    const particle = document.createElement('div');
    particle.className = 'loading-particle';
    particle.style.cssText = `
      position: absolute;
      width: 4px;
      height: 4px;
      background: rgba(255, 255, 255, 0.8);
      border-radius: 50%;
      animation: float ${1 + Math.random()}s ease-in-out infinite;
      left: ${Math.random() * 100}%;
      top: ${Math.random() * 100}%;
      pointer-events: none;
    `;
    button.appendChild(particle);
  }
}

/**
 * Remove loading particles
 */
function removeLoadingParticles(button) {
  const particles = button.querySelectorAll('.loading-particle');
  particles.forEach(particle => particle.remove());
}

/**
 * Play success animation
 */
async function playSuccessAnimation() {
  return new Promise(resolve => {
    // Create success overlay
    const overlay = document.createElement('div');
    overlay.style.cssText = `
      position: fixed;
      inset: 0;
      background: radial-gradient(circle, rgba(16, 185, 129, 0.2) 0%, transparent 70%);
      z-index: 9998;
      opacity: 0;
      transition: opacity 0.5s ease;
      pointer-events: none;
    `;
    document.body.appendChild(overlay);
    
    // Fade in
    setTimeout(() => {
      overlay.style.opacity = '1';
    }, 10);
    
    // Create checkmark
    const checkmark = document.createElement('div');
    checkmark.innerHTML = '<i class="fas fa-check-circle"></i>';
    checkmark.style.cssText = `
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0);
      font-size: 5rem;
      color: #10b981;
      z-index: 9999;
      transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      text-shadow: 0 0 20px rgba(16, 185, 129, 0.5);
    `;
    document.body.appendChild(checkmark);
    
    // Animate checkmark
    setTimeout(() => {
      checkmark.style.transform = 'translate(-50%, -50%) scale(1)';
    }, 100);
    
    // Remove after animation
    setTimeout(() => {
      overlay.style.opacity = '0';
      checkmark.style.transform = 'translate(-50%, -50%) scale(0)';
      setTimeout(() => {
        overlay.remove();
        checkmark.remove();
        resolve();
      }, 500);
    }, 1500);
  });
}

/**
 * Show premium modal using Bootstrap
 */
function showPremiumModal() {
  if (!successModal) return;
  
  // Show Bootstrap modal
  successModal.show();
  
  // Add confetti effect
  createConfetti();
}

/**
 * Create confetti effect
 */
function createConfetti() {
  const colors = ['#0055A4', '#1a6bb8', '#3b82f6', '#8b5cf6', '#10b981'];
  const confettiContainer = document.createElement('div');
  confettiContainer.style.cssText = `
    position: fixed;
    inset: 0;
    pointer-events: none;
    z-index: 10000;
  `;
  document.body.appendChild(confettiContainer);
  
  for (let i = 0; i < 50; i++) {
    const confetti = document.createElement('div');
    confetti.style.cssText = `
      position: absolute;
      width: 8px;
      height: 8px;
      background: ${colors[Math.floor(Math.random() * colors.length)]};
      left: ${Math.random() * 100}%;
      top: -10px;
      border-radius: ${Math.random() > 0.5 ? '50%' : '0'};
      animation: confetti-fall ${Math.random() * 2 + 2}s ease-out forwards;
    `;
    confettiContainer.appendChild(confetti);
  }
  
  // Add confetti animation
  const confettiStyle = document.createElement('style');
  confettiStyle.textContent = `
    @keyframes confetti-fall {
      0% {
        transform: translateY(-10px) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(100vh) rotate(360deg);
        opacity: 0;
      }
    }
    @keyframes shimmer {
      0% {
        background-position: -1000px 0;
      }
      100% {
        background-position: 1000px 0;
      }
    }
  `;
  document.head.appendChild(confettiStyle);
  
  // Remove after animation
  setTimeout(() => {
    confettiContainer.remove();
    confettiStyle.remove();
  }, 4000);
}

/**
 * Reset form with animation
 */
async function resetFormWithAnimation() {
  return new Promise(resolve => {
    const formFields = contactForm.querySelectorAll('input, select, textarea');
    
    formFields.forEach((field, index) => {
      setTimeout(() => {
        field.style.transform = 'translateX(-20px)';
        field.style.opacity = '0.5';
        
        setTimeout(() => {
          field.value = '';
          field.style.transform = '';
          field.style.opacity = '';
        }, 150);
      }, index * 50);
    });
    
    clearAllErrors();
    
    setTimeout(resolve, formFields.length * 50 + 300);
  });
}

/**
 * Show premium error message
 */
function showPremiumErrorMessage(message) {
  // Create error notification
  const notification = document.createElement('div');
  notification.style.cssText = `
    position: fixed;
    top: 100px;
    right: 20px;
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.9) 0%, rgba(220, 38, 38, 0.9) 100%);
    color: white;
    padding: 1rem 1.5rem;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(239, 68, 68, 0.3);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    z-index: 10000;
    transform: translateX(400px);
    transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    max-width: 300px;
    font-weight: 500;
  `;
  notification.innerHTML = `
    <div style="display: flex; align-items: center; gap: 0.5rem;">
      <i class="fas fa-exclamation-triangle"></i>
      <span>${message}</span>
    </div>
  `;
  
  document.body.appendChild(notification);
  
  // Slide in
  setTimeout(() => {
    notification.style.transform = 'translateX(0)';
  }, 10);
  
  // Slide out and remove
  setTimeout(() => {
    notification.style.transform = 'translateX(400px)';
    setTimeout(() => notification.remove(), 400);
  }, 4000);
}

/**
 * Validate entire form
 */
function validateForm() {
  const formFields = contactForm.querySelectorAll('input, select, textarea');
  let isValid = true;
  
  formFields.forEach(field => {
    if (!validateField(field)) {
      isValid = false;
    }
  });
  
  // Focus first invalid field
  if (!isValid) {
    const firstError = contactForm.querySelector('.is-invalid');
    if (firstError) {
      firstError.focus();
    }
  }
  
  return isValid;
}

/**
 * Validate individual field
 */
function validateField(field) {
  const value = field.value.trim();
  const fieldName = field.name;
  let isValid = true;
  let errorMessage = '';
  
  // Check required fields
  if (field.hasAttribute('required') && !value) {
    isValid = false;
    errorMessage = `${getFieldLabel(field)} is required.`;
  }
  // Validate specific field types
  else if (value) {
    switch (fieldName) {
      case 'fullName':
        if (!CONFIG.patterns.name.test(value)) {
          isValid = false;
          errorMessage = 'Please enter a valid name (2-50 characters, letters only).';
        }
        break;
        
      case 'email':
        if (!CONFIG.patterns.email.test(value)) {
          isValid = false;
          errorMessage = 'Please enter a valid email address.';
        }
        break;
        
      case 'phone':
        if (value && !CONFIG.patterns.phone.test(value.replace(/[\s\-\(\)]/g, ''))) {
          isValid = false;
          errorMessage = 'Please enter a valid phone number.';
        }
        break;
        
      case 'message':
        if (value.length < 10) {
          isValid = false;
          errorMessage = 'Message must be at least 10 characters long.';
        }
        break;
    }
  }
  
  // Update field appearance and error message
  updateFieldValidation(field, isValid, errorMessage);
  
  return isValid;
}

/**
 * Update field validation appearance using Bootstrap classes
 */
function updateFieldValidation(field, isValid, errorMessage) {
  const errorElement = document.getElementById(`${field.name}-error`);
  
  if (isValid) {
    field.classList.remove('is-invalid');
    field.classList.add('is-valid');
    if (errorElement) {
      errorElement.textContent = '';
      errorElement.setAttribute('aria-live', 'off');
    }
  } else {
    field.classList.remove('is-valid');
    field.classList.add('is-invalid');
    if (errorElement) {
      errorElement.textContent = errorMessage;
      errorElement.setAttribute('aria-live', 'polite');
    }
  }
}

/**
 * Clear field error
 */
function clearFieldError(field) {
  field.classList.remove('is-invalid');
  field.classList.remove('is-valid');
  const errorElement = document.getElementById(`${field.name}-error`);
  if (errorElement) {
    errorElement.textContent = '';
  }
}

/**
 * Clear all form errors
 */
function clearAllErrors() {
  const errorFields = contactForm.querySelectorAll('.is-invalid, .is-valid');
  const errorMessages = contactForm.querySelectorAll('.invalid-feedback');
  
  errorFields.forEach(field => {
    field.classList.remove('is-invalid', 'is-valid');
  });
  errorMessages.forEach(error => error.textContent = '');
}

/**
 * Get field label text
 */
function getFieldLabel(field) {
  const label = document.querySelector(`label[for="${field.id}"]`);
  return label ? label.textContent.replace('*', '').trim() : field.name;
}

/**
 * Simulate form submission (replace with actual API call)
 */
function simulateFormSubmission(data) {
  return new Promise((resolve, reject) => {
    // Simulate network delay
    setTimeout(() => {
      // Simulate 90% success rate
      if (Math.random() > 0.1) {
        console.log('Form data submitted:', data);
        resolve(data);
      } else {
        reject(new Error('Network error'));
      }
    }, 1500);
  });
}

/**
 * Initialize Google Maps with premium styling
 */
function initMap() {
  const mapElement = document.getElementById('map');
  if (!mapElement) return;
  
  try {
    // Premium map styles
    const premiumMapStyles = [
      {
        featureType: 'all',
        elementType: 'geometry',
        stylers: [{ color: '#f5f7fa' }]
      },
      {
        featureType: 'all',
        elementType: 'labels.text.fill',
        stylers: [{ color: '#2d3748' }]
      },
      {
        featureType: 'all',
        elementType: 'labels.text.stroke',
        stylers: [{ color: '#ffffff' }, { lightness: 13 }]
      },
      {
        featureType: 'administrative',
        elementType: 'geometry.fill',
        stylers: [{ color: '#ffeaa7' }]
      },
      {
        featureType: 'administrative',
        elementType: 'geometry.stroke',
        stylers: [{ color: '#0055A4' }, { lightness: 14 }, { weight: 1.4 }]
      },
      {
        featureType: 'landscape',
        elementType: 'all',
        stylers: [{ color: '#f0f2f5' }]
      },
      {
        featureType: 'poi',
        elementType: 'geometry',
        stylers: [{ color: '#dbeafe' }]
      },
      {
        featureType: 'road.highway',
        elementType: 'all',
        stylers: [{ color: '#0055A4' }]
      },
      {
        featureType: 'road.arterial',
        elementType: 'geometry',
        stylers: [{ color: '#1a6bb8' }]
      },
      {
        featureType: 'road.local',
        elementType: 'geometry',
        stylers: [{ color: '#ffffff' }]
      },
      {
        featureType: 'transit',
        elementType: 'all',
        stylers: [{ visibility: 'off' }]
      },
      {
        featureType: 'water',
        elementType: 'all',
        stylers: [{ color: '#3b82f6' }, { visibility: 'on' }]
      }
    ];
    
    // Create map with premium settings
    map = new google.maps.Map(mapElement, {
      center: CONFIG.officeLocation,
      zoom: 16,
      styles: premiumMapStyles,
      disableDefaultUI: true,
      zoomControl: true,
      zoomControlOptions: {
        position: google.maps.ControlPosition.RIGHT_BOTTOM
      },
      mapTypeControl: false,
      streetViewControl: true,
      streetViewControlOptions: {
        position: google.maps.ControlPosition.RIGHT_BOTTOM
      },
      fullscreenControl: true,
      fullscreenControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
      },
      gestureHandling: 'cooperative',
      backgroundColor: '#f0f2f5'
    });
    
    // Create custom marker with animation
    const markerIcon = {
      url: createCustomMarkerSVG(),
      scaledSize: new google.maps.Size(60, 60),
      anchor: new google.maps.Point(30, 60)
    };
    
    const marker = new google.maps.Marker({
      position: CONFIG.officeLocation,
      map: map,
      title: 'Qubify Technologies Office',
      icon: markerIcon,
      animation: google.maps.Animation.DROP
    });
    
    // Add premium info window
    const infoWindow = new google.maps.InfoWindow({
      content: createPremiumInfoWindowContent(),
      maxWidth: 300
    });
    
    // Add marker click listener
    marker.addListener('click', () => {
      infoWindow.open(map, marker);
      
      // Add bounce animation
      marker.setAnimation(google.maps.Animation.BOUNCE);
      setTimeout(() => {
        marker.setAnimation(null);
      }, 2000);
    });
    
    // Add map click listener to close info window
    map.addListener('click', () => {
      infoWindow.close();
    });
    
    // Hide fallback
    const fallback = document.querySelector('.map__fallback');
    if (fallback) {
      fallback.style.display = 'none';
    }
    
    // Add premium map controls
    addPremiumMapControls();
    
  } catch (error) {
    console.error('Google Maps initialization error:', error);
    showMapFallback();
  }
}

/**
 * Create custom marker SVG
 */
function createCustomMarkerSVG() {
  return 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(`
    <svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <linearGradient id="markerGradient" x1="0%" y1="0%" x2="100%" y2="100%">
          <stop offset="0%" stop-color="#0055A4"/>
          <stop offset="50%" stop-color="#1a6bb8"/>
          <stop offset="100%" stop-color="#3b82f6"/>
        </linearGradient>
        <filter id="shadow" x="-50%" y="-50%" width="200%" height="200%">
          <feDropShadow dx="0" dy="4" stdDeviation="4" flood-color="rgba(0,0,0,0.3)"/>
        </filter>
      </defs>
      <circle cx="30" cy="30" r="25" fill="url(#markerGradient)" filter="url(#shadow)"/>
      <circle cx="30" cy="30" r="20" fill="rgba(255,255,255,0.3)"/>
      <circle cx="30" cy="30" r="12" fill="white"/>
      <text x="30" y="36" text-anchor="middle" fill="#0055A4" font-family="Arial" font-size="16" font-weight="bold">Q</text>
    </svg>
  `);
}

/**
 * Create premium info window content
 */
function createPremiumInfoWindowContent() {
  return `
    <div style="padding: 20px; font-family: Inter, sans-serif; max-width: 280px;">
      <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #0055A4, #3b82f6); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 18px;">Q</div>
        <div>
          <h3 style="margin: 0; color: #0055A4; font-size: 18px; font-weight: 700;">Qubify Technologies</h3>
          <p style="margin: 0; color: #64748b; font-size: 14px;">HR Solutions Provider</p>
        </div>
      </div>
      
      <div style="background: linear-gradient(135deg, rgba(0, 85, 164, 0.05), rgba(59, 130, 246, 0.05)); padding: 16px; border-radius: 12px; border: 1px solid rgba(0, 85, 164, 0.1);">
        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
          <i class="fas fa-map-marker-alt" style="color: #0055A4; width: 16px;"></i>
          <span style="color: #1a202c; font-size: 14px; font-weight: 500;">Office no: 242, Tricity Plaza</span>
        </div>
        <div style="margin-left: 24px; color: #64748b; font-size: 13px; line-height: 1.4;">
          Panchkula, Haryana (INDIA)<br>
          Chandigarh - 134109
        </div>
        
        <div style="display: flex; gap: 8px; margin-top: 12px; padding-top: 12px; border-top: 1px solid rgba(0, 85, 164, 0.1);">
          <a href="tel:+919874566547" style="flex: 1; background: #0055A4; color: white; padding: 8px 12px; border-radius: 8px; text-decoration: none; font-size: 12px; font-weight: 600; text-align: center; transition: all 0.2s;">
            <i class="fas fa-phone" style="margin-right: 4px;"></i>Call
          </a>
          <a href="https://maps.google.com/?q=Tricity+Plaza+Panchkula" target="_blank" style="flex: 1; background: linear-gradient(135deg, #8b5cf6, #3b82f6); color: white; padding: 8px 12px; border-radius: 8px; text-decoration: none; font-size: 12px; font-weight: 600; text-align: center; transition: all 0.2s;">
            <i class="fas fa-directions" style="margin-right: 4px;"></i>Directions
          </a>
        </div>
      </div>
    </div>
  `;
}

/**
 * Add premium map controls
 */
function addPremiumMapControls() {
  if (!map) return;
  
  // Create custom control for map styles
  const styleControl = document.createElement('div');
  styleControl.style.cssText = `
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    padding: 8px;
    margin: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
  `;
  
  const styleButton = document.createElement('button');
  styleButton.innerHTML = '<i class="fas fa-palette"></i>';
  styleButton.style.cssText = `
    background: none;
    border: none;
    color: #0055A4;
    font-size: 16px;
    cursor: pointer;
    padding: 8px;
    border-radius: 8px;
    transition: all 0.2s;
  `;
  
  styleButton.addEventListener('click', toggleMapStyle);
  styleButton.addEventListener('mouseover', () => {
    styleButton.style.background = 'rgba(0, 85, 164, 0.1)';
  });
  styleButton.addEventListener('mouseout', () => {
    styleButton.style.background = 'none';
  });
  
  styleControl.appendChild(styleButton);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(styleControl);
}

/**
 * Toggle map style
 */
let currentMapStyle = 0;
function toggleMapStyle() {
  if (!map) return;
  
  const mapStyles = [
    [], // Default
    [ // Dark mode
      { elementType: 'geometry', stylers: [{ color: '#1a202c' }] },
      { elementType: 'labels.text.stroke', stylers: [{ color: '#1a202c' }] },
      { elementType: 'labels.text.fill', stylers: [{ color: '#e2e8f0' }] },
      { featureType: 'water', elementType: 'geometry', stylers: [{ color: '#0055A4' }] }
    ],
    [ // Satellite hybrid
      { featureType: 'all', stylers: [{ saturation: -80 }] }
    ]
  ];
  
  currentMapStyle = (currentMapStyle + 1) % mapStyles.length;
  map.setOptions({ styles: mapStyles[currentMapStyle] });
}

/**
 * Show map fallback if Google Maps fails
 */
function showMapFallback() {
  const fallback = document.querySelector('.map__fallback');
  if (fallback) {
    fallback.innerHTML = `
      <div class="text-center">
        <i class="fas fa-map-marker-alt fs-1 text-primary mb-3"></i>
        <h4>Our Location</h4>
        <p class="text-muted">Map unavailable</p>
        <a href="https://maps.google.com/?q=Tricity+Plaza+Panchkula" target="_blank" rel="noopener" class="btn btn-primary">
          View on Google Maps
          <i class="fas fa-external-link-alt ms-2"></i>
        </a>
      </div>
    `;
  }
}

/**
 * Enhanced scroll handling with premium effects
 */
function handleScroll() {
  const header = document.querySelector('.custom-header');
  const scrollTop = window.pageYOffset;
  
  if (!header) return;
  
  // Premium header effects
  if (scrollTop > 100) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
  
  // Parallax effects for premium elements
  const parallaxElements = document.querySelectorAll('.hero::after, .contact::before');
  parallaxElements.forEach((element, index) => {
    const speed = 0.3 + (index * 0.1);
    const yPos = scrollTop * speed;
    element.style.transform = `translateY(${yPos}px)`;
  });
  
  // Reveal animations on scroll
  revealElementsOnScroll();
}

/**
 * Reveal elements on scroll with premium animations
 */
function revealElementsOnScroll() {
  const elements = document.querySelectorAll('.fade-in:not(.visible)');
  
  elements.forEach(element => {
    const elementTop = element.getBoundingClientRect().top;
    const elementVisible = 150;
    
    if (elementTop < window.innerHeight - elementVisible) {
      element.classList.add('visible');
      
      // Add stagger effect for child elements
      const children = element.querySelectorAll('.contact__detail, .form-group, .feature-card');
      children.forEach((child, index) => {
        setTimeout(() => {
          child.style.animation = `slideUp 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) both`;
        }, index * 100);
      });
    }
  });
}

/**
 * Enhanced resize handling
 */
function handleResize() {
  // Resize map if needed
  if (map) {
    google.maps.event.trigger(map, 'resize');
    map.setCenter(CONFIG.officeLocation);
  }
  
  // Reinitialize cursor effects for desktop
  const cursor = document.querySelector('.premium-cursor');
  if (window.innerWidth > 1024 && !cursor) {
    // initializeCursorEffects();
  } else if (window.innerWidth <= 1024 && cursor) {
    cursor.remove();
  }
  
  // Adjust particle effects based on screen size
  adjustParticleEffects();
}

/**
 * Adjust particle effects based on screen size
 */
function adjustParticleEffects() {
  const particles = document.querySelectorAll('.loading-particle');
  const particleCount = window.innerWidth > 768 ? 5 : 3;
  
  // Remove excess particles on smaller screens
  if (particles.length > particleCount) {
    for (let i = particleCount; i < particles.length; i++) {
      particles[i].remove();
    }
  }
}

/**
 * Initialize animations
 */
function initializeAnimations() {
  // Add fade-in class to elements
  const animatedElements = document.querySelectorAll('.contact .container > .row, .feature-card');
  animatedElements.forEach(el => el.classList.add('fade-in'));
  
  // Initialize Intersection Observer for animations
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      }
    );
    
    animatedElements.forEach(el => observer.observe(el));
  } else {
    // Fallback for browsers without IntersectionObserver
    animatedElements.forEach(el => el.classList.add('visible'));
  }
}

/**
 * Initialize accessibility features
 */
/* function initializeAccessibility() {
  // Skip link for keyboard navigation
  const skipLink = document.createElement('a');
  skipLink.href = '#contact';
  
  skipLink.addEventListener('focus', () => {
    skipLink.classList.remove('visually-hidden-focusable');
  });
  
  skipLink.addEventListener('blur', () => {
    skipLink.classList.add('visually-hidden-focusable');
  });
  
  document.body.insertBefore(skipLink, document.body.firstChild);
  
  // Announce page changes for screen readers
  const announcer = document.createElement('div');
  announcer.setAttribute('aria-live', 'polite');
  announcer.setAttribute('aria-atomic', 'true');
  announcer.className = 'visually-hidden';
  document.body.appendChild(announcer);
  
  window.announceToScreenReader = (message) => {
    announcer.textContent = message;
    setTimeout(() => {
      announcer.textContent = '';
    }, 1000);
  };
} */

/**
 * Handle keyboard events
 */
function handleKeyboardEvents(event) {
  // Handle escape key for modals (Bootstrap handles this automatically)
  
  // Handle enter key on hero button
  if (event.key === 'Enter' && event.target.classList.contains('hero__button')) {
    event.preventDefault();
    document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' });
  }
}

/**
 * Debounce function to limit function calls
 */
function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

/**
 * Error handling for uncaught errors
 */
window.addEventListener('error', (event) => {
  console.error('JavaScript error:', event.error);
  
  // Show user-friendly error message
  if (event.error && event.error.message.includes('google')) {
    showMapFallback();
  }
});

/**
 * Handle unhandled promise rejections
 */
window.addEventListener('unhandledrejection', (event) => {
  console.error('Unhandled promise rejection:', event.reason);
  event.preventDefault();
});

// Make initMap globally available for Google Maps callback
window.initMap = initMap;

// Export for testing (if needed)
if (typeof module !== 'undefined' && module.exports) {
  module.exports = {
    validateField,
    validateForm,
    CONFIG
  };
}