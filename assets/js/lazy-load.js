/**
 * Enhanced Lazy Loading & Image Optimization
 * Improves image loading performance
 */

// Native lazy loading support
if ('loading' in HTMLImageElement.prototype) {
  // Browser supports native lazy loading
  console.log('Native lazy loading supported');
} else {
  // Fallback for older browsers - use Intersection Observer API
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.currentTarget;
          if (img.dataset.src) {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
          }
          observer.unobserve(img);
        }
      });
    }, {
      rootMargin: '50px' // Start loading 50px before image enters viewport
    });

    // Observe all images with data-src attribute
    document.querySelectorAll('img[data-src]').forEach(img => {
      imageObserver.observe(img);
    });
  }
}

// Optimize image loading with priority hints
addEventListener('load', () => {
  const images = document.querySelectorAll('img[loading="lazy"]');
  
  images.forEach(img => {
    // Ensure images load efficiently
    img.decoding = 'async';
  });
});

// Preload images that are about to come into view
document.addEventListener('DOMContentLoaded', () => {
  // For carousel and scrollable content
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '200px 0px'
  };

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && entry.target.tagName === 'IMG') {
          // Image is near viewport, ensure it's loading
          if (entry.target.loading === 'lazy') {
            entry.target.loading = 'eager';
          }
        }
      });
    }, observerOptions);

    document.querySelectorAll('img[loading="lazy"]').forEach(img => {
      observer.observe(img);
    });
  }
});
