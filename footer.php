<footer class="site-footer ">
  <div class="footer-container ">
    
    <!-- Footer Top Section -->
    <div class="footer-top">
      
      <!-- Logo and Social Media -->
      <div class="footer-col footer-brand">
        <div class="footer-logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/toss_logo.svg" alt="TOSS Logo">
        </div>
        <div class="footer-social">
          <a href="#" class="social-icon" aria-label="Facebook">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/facebook.svg" alt="Facebook">
          </a>
          <a href="#" class="social-icon" aria-label="Instagram">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/instagram.svg" alt="Instagram">
          </a>
          <a href="#" class="social-icon" aria-label="YouTube">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/youtube.svg" alt="YouTube">
          </a>
          <a href="#" class="social-icon" aria-label="LinkedIn">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/linkedin.svg" alt="LinkedIn">
          </a>
          <a href="#" class="social-icon" aria-label="WhatsApp">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/whatsapp.svg" alt="WhatsApp">
          </a>
        </div>
      </div>

      <!-- Products Column -->
      <div class="footer-col">
        <h3 class="footer-heading">Products</h3>
        <ul class="footer-links">
          <li><a href="#">Vertical Machining</a></li>
          <li><a href="#">Horizontal Machining</a></li>
          <li><a href="#">CNC Turning</a></li>
          <li><a href="#">Special Purpose</a></li>
        </ul>
      </div>

      <!-- Pages Column -->
      <div class="footer-col">
        <h3 class="footer-heading">Pages</h3>
        <ul class="footer-links">
          <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
          <li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
          <li><a href="<?php echo esc_url(home_url('/products')); ?>">Products</a></li>
          <li><a href="<?php echo esc_url(home_url('/applications')); ?>">Industries</a></li>
          <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact Us</a></li>
        </ul>
      </div>

      <!-- Contact Column -->
      <div class="footer-col">
        <h3 class="footer-heading">Contact</h3>
        <ul class="footer-contact">
          <li><a href="mailto:email-id@gmail.com">email-id@gmail.com</a></li>
          <li><a href="tel:+919988776655">+91 9988776655</a></li>
          <li>779 Elliot Cape, Vonfield 59056</li>
        </ul>
      </div>

    </div>

    <!-- Footer Middle - Policy Links -->
    <div class="footer-middle">
      <div class="policy-links">
        <a href="#">Policy Links</a>
        <a href="#">Policy Links</a>
        <a href="#">Policy Links</a>
        <a href="#">Policy Links</a>
        <a href="#">Policy Links</a>
        <a href="#">Policy Links</a>
      </div>
    </div>



  </div>
      <!-- Footer Bottom - Copyright -->
    <div class="footer-bottom">
      <p>&copy;<?php echo date('Y'); ?> All Rights Reserved</p>
    </div>
</footer>



<?php wp_footer(); ?>
</body>
</html>
