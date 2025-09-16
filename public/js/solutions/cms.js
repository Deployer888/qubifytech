// Testimonials Owl Carousel - Add this to your existing script
document.addEventListener('DOMContentLoaded', function() {
    // Wait for jQuery and Owl Carousel to be loaded
    if (typeof jQuery !== 'undefined' && jQuery.fn.owlCarousel) {
        jQuery(document).ready(function($) {
            $('.testimonials-owl').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                smartSpeed: 1000,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        });
    } else {
        console.log('jQuery or Owl Carousel not loaded');
    }
});