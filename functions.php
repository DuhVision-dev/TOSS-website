<?php
/**
 * TOSS Theme functions
 */

/**
 * Theme Setup
 */
function toss_theme_setup() {
  // Add WooCommerce support
  add_theme_support( 'woocommerce' );
  
  // Add support for WooCommerce product gallery features
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'toss_theme_setup' );

/**
 * Enqueue styles and scripts
 */
function toss_enqueue_assets() {

  // Google Fonts
  wp_enqueue_style(
    'toss-google-fonts',
    'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap',
    [],
    null
  );

  // Adobe Fonts
  wp_enqueue_style(
    'toss-adobe-fonts',
    'https://use.typekit.net/nmb7nyt.css',
    [],
    null
  );

  // GSAP Library
  wp_enqueue_script(
    'gsap',
    'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
    [],
    '3.12.5',
    true
  );

  // Main stylesheet
  wp_enqueue_style(
    'toss-style',
    get_template_directory_uri() . '/assets/css/style.css',
    [],
    '1.0'
  );

  // Main JavaScript
  wp_enqueue_script(
    'toss-script',
    get_template_directory_uri() . '/assets/js/main.js',
    ['gsap'],
    '1.0',
    true
  );

  // Animations
  wp_enqueue_script(
    'toss-animations',
    get_template_directory_uri() . '/assets/js/animations.js',
    ['gsap'],
    '1.0',
    true
  );

  // Forms JavaScript
  wp_enqueue_script(
    'toss-forms',
    get_template_directory_uri() . '/assets/js/forms.js',
    [],
    '1.0',
    true
  );

  // Localize script for AJAX
  wp_localize_script('toss-forms', 'tossAjax', array(
    'ajaxurl' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('toss_inquiry_nonce')
  ));
  
  // Single Product Page Assets
  if (is_product()) {
    wp_enqueue_style('toss-single-product', get_template_directory_uri() . '/assets/css/single-product.css', array(), '1.0');
    wp_enqueue_script('toss-single-product', get_template_directory_uri() . '/assets/js/single-product.js', array('gsap'), '1.0', true);
  }
  
  // Industry Pages Assets
  if (is_page_template('pages/industries/page-automobile.php') || 
      is_page_template('pages/industries/page-interior.php') || 
      is_page_template('pages/industries/page-engineering.php') || 
      is_page_template('pages/industries/page-manufacturing.php') || 
      is_page_template('pages/industries/page-electronics.php') || 
      is_page_template('pages/industries/page-tooling.php')) {
    wp_enqueue_style('toss-industries', get_template_directory_uri() . '/assets/css/industries.css', array(), '1.0');
  }
}

add_action('wp_enqueue_scripts', 'toss_enqueue_assets');


/**
 * Handle inquiry form submission
 */
function toss_handle_inquiry_form() {
  // Verify nonce
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'toss_inquiry_nonce')) {
    wp_send_json_error(array('message' => 'Security check failed.'));
    return;
  }

  // Sanitize and validate inputs
  $name = sanitize_text_field($_POST['name'] ?? '');
  $company = sanitize_text_field($_POST['company'] ?? '');
  $email = sanitize_email($_POST['email'] ?? '');
  $phone = sanitize_text_field($_POST['phone'] ?? '');
  $working_area = sanitize_text_field($_POST['working_area'] ?? '');
  $message = sanitize_textarea_field($_POST['message'] ?? '');

  // Validate required fields
  if (empty($name) || empty($company) || empty($email) || empty($phone) || empty($working_area) || empty($message)) {
    wp_send_json_error(array('message' => 'Please fill in all required fields.'));
    return;
  }

  // Validate email
  if (!is_email($email)) {
    wp_send_json_error(array('message' => 'Please enter a valid email address.'));
    return;
  }

  // ========================================
  // CHANGE THIS TO YOUR EMAIL ADDRESS
  // ========================================
  $to = 'your-email@example.com';  // ← CHANGE THIS!
  
  $subject = 'New Inquiry from ' . $name . ' - ' . $company;
  
  // Prepare email body
  $email_body = "You have received a new inquiry from your website.\n\n";
  $email_body .= "=================================\n";
  $email_body .= "INQUIRY DETAILS\n";
  $email_body .= "=================================\n\n";
  $email_body .= "Name: " . $name . "\n";
  $email_body .= "Company: " . $company . "\n";
  $email_body .= "Email: " . $email . "\n";
  $email_body .= "Phone/WhatsApp/Skype: " . $phone . "\n";
  $email_body .= "Working Area: " . $working_area . "\n\n";
  $email_body .= "Message:\n" . $message . "\n\n";
  $email_body .= "=================================\n";
  $email_body .= "Submitted on: " . date('F j, Y, g:i a') . "\n";
  
  // Email headers
  $headers = array(
    'Content-Type: text/plain; charset=UTF-8',
    'From: ' . get_bloginfo('name') . ' <noreply@' . $_SERVER['HTTP_HOST'] . '>',
    'Reply-To: ' . $email
  );

  // Send email
  $sent = wp_mail($to, $subject, $email_body, $headers);

  if ($sent) {
    wp_send_json_success(array(
      'message' => 'Thank you! Your inquiry has been sent successfully. We will get back to you soon.'
    ));
  } else {
    wp_send_json_error(array(
      'message' => 'Sorry, there was an error sending your message. Please try again or contact us directly.'
    ));
  }
}

// Hook for logged-in users
add_action('wp_ajax_submit_inquiry_form', 'toss_handle_inquiry_form');

// Hook for non-logged-in users
add_action('wp_ajax_nopriv_submit_inquiry_form', 'toss_handle_inquiry_form');

/**
 * Register page templates from subdirectories
 */
function toss_add_custom_page_templates($templates) {
  $templates['pages/industries/page-automobile.php'] = 'Automobile Industry';
  $templates['pages/industries/page-interior.php'] = 'Interior Industry';
  $templates['pages/industries/page-engineering.php'] = 'Engineering Industry';
  $templates['pages/industries/page-manufacturing.php'] = 'Manufacturing Industry';
  $templates['pages/industries/page-electronics.php'] = 'Electronics Industry';
  $templates['pages/industries/page-tooling.php'] = 'Tooling Industry';
  
  return $templates;
}
add_filter('theme_page_templates', 'toss_add_custom_page_templates');

/**
 * Load page templates from subdirectories
 */
function toss_load_custom_page_templates($template) {
  global $post;
  
  if (!$post) {
    return $template;
  }
  
  $page_template = get_post_meta($post->ID, '_wp_page_template', true);
  
  // Check if it's one of our custom templates
  if (strpos($page_template, 'pages/industries/') === 0) {
    $file = get_template_directory() . '/' . $page_template;
    
    if (file_exists($file)) {
      return $file;
    }
  }
  
  return $template;
}
add_filter('template_include', 'toss_load_custom_page_templates', 99);






