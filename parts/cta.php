<?php
// parts/cta.php — Send Your Inquiry Contact Form
?>
<section class="contact-inquiry section">
  <div class="container">
    <h2 class="inquiry-title">Send Your Inquiry</h2>
    
    <form id="inquiry-form" class="inquiry-form" method="POST">
      <div class="form-row">
        <div class="form-group">
          <label for="inquiry-name">Name</label>
          <input 
            type="text" 
            id="inquiry-name" 
            name="name" 
            required 
            placeholder="" 
          />
        </div>
        
        <div class="form-group">
          <label for="inquiry-company">Company Name</label>
          <input 
            type="text" 
            id="inquiry-company" 
            name="company" 
            required 
            placeholder="" 
          />
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label for="inquiry-email">Email</label>
          <input 
            type="email" 
            id="inquiry-email" 
            name="email" 
            required 
            placeholder="" 
          />
        </div>
        
        <div class="form-group">
          <label for="inquiry-phone">Phone / WhatsApp / Skype</label>
          <input 
            type="text" 
            id="inquiry-phone" 
            name="phone" 
            required 
            placeholder="" 
          />
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group full-width">
          <label for="inquiry-area">Working Area</label>
          <input 
            type="text" 
            id="inquiry-area" 
            name="working_area" 
            required 
            placeholder="" 
          />
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group full-width">
          <label for="inquiry-message">Message</label>
          <textarea 
            id="inquiry-message" 
            name="message" 
            rows="6" 
            required 
            placeholder=""
          ></textarea>
        </div>
      </div>
      
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">
          Submit My Inquiry
        </button>
      </div>
      
      <div id="form-response" class="form-response"></div>
    </form>
  </div>
</section>