/**
 * Single Product Page JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
  
  // ============================================
  // Product Gallery Thumbnail Click
  // ============================================
  const thumbnails = document.querySelectorAll('.thumbnail-item');
  const mainImage = document.getElementById('main-product-image');
  
  if (thumbnails.length > 0 && mainImage) {
    thumbnails.forEach(thumbnail => {
      thumbnail.addEventListener('click', function() {
        // Remove active class from all thumbnails
        thumbnails.forEach(t => t.classList.remove('active'));
        
        // Add active class to clicked thumbnail
        this.classList.add('active');
        
        // Get the large image URL from data attribute
        const largeImageUrl = this.getAttribute('data-large-image');
        
        if (!largeImageUrl) return;
        
        // Update main image with fade effect
        mainImage.style.opacity = '0.3';
        
        setTimeout(() => {
          mainImage.src = largeImageUrl;
          mainImage.srcset = ''; // Remove srcset to prevent browser from using wrong image
          mainImage.removeAttribute('srcset'); // Completely remove srcset attribute
          mainImage.onload = function() {
            mainImage.style.opacity = '1';
          };
        }, 150);
      });
    });
  }
  
  // ============================================
  // FAQ Accordion with GSAP
  // ============================================
  const faqQuestions = document.querySelectorAll('.faq-question');
  
  if (faqQuestions.length > 0 && typeof gsap !== 'undefined') {
    faqQuestions.forEach(question => {
      question.addEventListener('click', function() {
        const faqItem = this.closest('.faq-item');
        const answer = faqItem.querySelector('.faq-answer');
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        
        if (isExpanded) {
          // Close
          gsap.to(answer, {
            maxHeight: 0,
            duration: 0.3,
            ease: 'power2.out'
          });
          this.setAttribute('aria-expanded', 'false');
        } else {
          // Close all other FAQs first
          faqQuestions.forEach(otherQuestion => {
            if (otherQuestion !== this) {
              const otherAnswer = otherQuestion.closest('.faq-item').querySelector('.faq-answer');
              gsap.to(otherAnswer, {
                maxHeight: 0,
                duration: 0.3,
                ease: 'power2.out'
              });
              otherQuestion.setAttribute('aria-expanded', 'false');
            }
          });
          
          // Open clicked FAQ
          gsap.set(answer, { maxHeight: 'none' });
          const targetHeight = answer.scrollHeight;
          gsap.set(answer, { maxHeight: 0 });
          
          gsap.to(answer, {
            maxHeight: targetHeight,
            duration: 0.3,
            ease: 'power2.out'
          });
          this.setAttribute('aria-expanded', 'true');
        }
      });
    });
  }
  
  // ============================================
  // Product Inquiry Form Handler
  // ============================================
  const productInquiryForm = document.getElementById('product-inquiry-form');
  const productFormResponse = document.getElementById('product-form-response');
  
  if (productInquiryForm && productFormResponse) {
    productInquiryForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Get form data
      const formData = new FormData(this);
      formData.append('action', 'toss_handle_inquiry_form');
      formData.append('nonce', tossAjax.nonce);
      
      // Show loading state
      const submitBtn = this.querySelector('button[type="submit"]');
      const originalBtnText = submitBtn.textContent;
      submitBtn.textContent = 'Sending...';
      submitBtn.disabled = true;
      
      // Send AJAX request
      fetch(tossAjax.ajaxurl, {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          productFormResponse.textContent = data.data.message;
          productFormResponse.className = 'form-response success';
          productInquiryForm.reset();
        } else {
          productFormResponse.textContent = data.data.message || 'Something went wrong. Please try again.';
          productFormResponse.className = 'form-response error';
        }
        
        // Reset button
        submitBtn.textContent = originalBtnText;
        submitBtn.disabled = false;
        
        // Auto-hide message after 5 seconds
        setTimeout(() => {
          productFormResponse.style.display = 'none';
        }, 5000);
      })
      .catch(error => {
        console.error('Error:', error);
        productFormResponse.textContent = 'An error occurred. Please try again.';
        productFormResponse.className = 'form-response error';
        
        submitBtn.textContent = originalBtnText;
        submitBtn.disabled = false;
      });
    });
  }
  
});
