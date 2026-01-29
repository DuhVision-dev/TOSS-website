// forms.js — Contact form handling with AJAX

document.addEventListener('DOMContentLoaded', function() {
  
  // Main inquiry form handler
  const inquiryForm = document.getElementById('inquiry-form');
  
  if (inquiryForm) {
    inquiryForm.addEventListener('submit', function(e) {
      e.preventDefault();
      handleFormSubmission(inquiryForm, 'form-response');
    });
  }
  
  // Sidebar inquiry form handler (Products page)
  const sidebarInquiryForm = document.getElementById('sidebar-inquiry-form');
  
  if (sidebarInquiryForm) {
    sidebarInquiryForm.addEventListener('submit', function(e) {
      e.preventDefault();
      handleFormSubmission(sidebarInquiryForm, 'sidebar-form-response');
    });
  }
  
  // Reusable form submission function
  function handleFormSubmission(form, responseDivId) {
    const formData = new FormData(form);
    const responseDiv = document.getElementById(responseDivId);
    const submitButton = form.querySelector('button[type="submit"]');
    
    // Disable button during submission
    submitButton.disabled = true;
    submitButton.textContent = 'Sending...';
    
    // Clear previous messages
    responseDiv.className = 'form-response';
    responseDiv.textContent = '';
    
    // Add WordPress AJAX action
    formData.append('action', 'submit_inquiry_form');
    formData.append('nonce', tossAjax.nonce);
    
    // Send AJAX request
    fetch(tossAjax.ajaxurl, {
      method: 'POST',
      body: formData,
      credentials: 'same-origin'
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        responseDiv.className = 'form-response success';
        responseDiv.textContent = data.data.message;
        form.reset();
      } else {
        responseDiv.className = 'form-response error';
        responseDiv.textContent = data.data.message || 'Something went wrong. Please try again.';
      }
    })
    .catch(error => {
      responseDiv.className = 'form-response error';
      responseDiv.textContent = 'Network error. Please check your connection and try again.';
      console.error('Form submission error:', error);
    })
    .finally(() => {
      submitButton.disabled = false;
      submitButton.textContent = 'Call Us Now';
    });
  }
  
});
