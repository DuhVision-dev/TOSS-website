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
 * Remove WordPress Admin Bar
 */
add_filter('show_admin_bar', '__return_false');

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
  
  // Products Archive Page Assets (Shop page)
  if (is_post_type_archive('product') || (is_page_template('pages/page-products.php'))) {
    wp_enqueue_style('toss-products-page', get_template_directory_uri() . '/assets/css/sections.css', array(), '1.0');
    wp_enqueue_style('toss-products-page-layout', get_template_directory_uri() . '/assets/css/layout.css', array(), '1.0');
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

/**
 * Add YouTube URL field to product admin
 */
add_action( 'woocommerce_product_options_general_product_data', 'add_youtube_url_field' );
function add_youtube_url_field() {
    woocommerce_wp_text_input( array(
        'id'          => '_youtube_url',
        'label'       => __( 'YouTube URL', 'woocommerce' ),
        'placeholder' => 'https://www.youtube.com/watch?v=...',
        'desc_tip'    => true,
        'description' => __( 'Enter the YouTube video URL for this product', 'woocommerce' )
    ) );
}

/**
 * Save the YouTube URL field
 */
add_action( 'woocommerce_process_product_meta', 'save_youtube_url_field' );
function save_youtube_url_field( $post_id ) {
    $youtube_url = isset( $_POST['_youtube_url'] ) ? sanitize_text_field( $_POST['_youtube_url'] ) : '';
    update_post_meta( $post_id, '_youtube_url', $youtube_url );
}

/**
 * Convert YouTube URL to embed URL
 */
function get_youtube_embed_url( $url ) {
    if ( empty( $url ) ) {
        return '';
    }
    
    $video_id = '';
    
    // Handle different YouTube URL formats
    if ( preg_match( '/youtube\\.com\\/watch\\?v=([^\\&\\?\\/]+)/', $url, $id ) ) {
        $video_id = $id[1];
    } elseif ( preg_match( '/youtube\\.com\\/embed\\/([^\\&\\?\\/]+)/', $url, $id ) ) {
        $video_id = $id[1];
    } elseif ( preg_match( '/youtu\\.be\\/([^\\&\\?\\/]+)/', $url, $id ) ) {
        $video_id = $id[1];
    }
    
    return $video_id ? 'https://www.youtube.com/embed/' . $video_id : '';
}

/**
 * Add Application Images meta box to product admin
 */
add_action( 'add_meta_boxes', 'add_application_images_meta_box' );
function add_application_images_meta_box() {
    add_meta_box(
        'product_application_images',
        __( 'Application Images', 'woocommerce' ),
        'render_application_images_meta_box',
        'product',
        'side',
        'default'
    );
}

/**
 * Render Application Images meta box
 */
function render_application_images_meta_box( $post ) {
    wp_nonce_field( 'save_application_images', 'application_images_nonce' );
    
    $application_images = get_post_meta( $post->ID, '_application_images', true );
    $application_images = $application_images ? $application_images : array();
    
    ?>
    <div id="application_images_container">
        <div id="application_images_list">
            <?php
            for ( $i = 0; $i < 4; $i++ ) {
                $image_id = isset( $application_images[$i] ) ? $application_images[$i] : '';
                $image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'thumbnail' ) : '';
                ?>
                <div class="application-image-item" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">
                        <?php echo sprintf( __( 'Image %d', 'woocommerce' ), $i + 1 ); ?>
                    </label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <input type="hidden" name="application_images[<?php echo $i; ?>]" class="application-image-id" value="<?php echo esc_attr( $image_id ); ?>" />
                        <div class="application-image-preview" style="width: 80px; height: 80px; border: 1px solid #ddd; background: #f5f5f5; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <?php if ( $image_url ) : ?>
                                <img src="<?php echo esc_url( $image_url ); ?>" style="max-width: 100%; max-height: 100%; object-fit: cover;" />
                            <?php else : ?>
                                <span style="color: #999; font-size: 12px;">No image</span>
                            <?php endif; ?>
                        </div>
                        <button type="button" class="button application-image-upload" data-index="<?php echo $i; ?>">
                            <?php echo $image_id ? __( 'Change', 'woocommerce' ) : __( 'Upload', 'woocommerce' ); ?>
                        </button>
                        <?php if ( $image_id ) : ?>
                            <button type="button" class="button application-image-remove" data-index="<?php echo $i; ?>">
                                <?php _e( 'Remove', 'woocommerce' ); ?>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Upload image
        $(document).on('click', '.application-image-upload', function(e) {
            e.preventDefault();
            
            var button = $(this);
            var index = button.data('index');
            var container = button.closest('.application-image-item');
            
            var frame = wp.media({
                title: '<?php _e( 'Select Application Image', 'woocommerce' ); ?>',
                button: {
                    text: '<?php _e( 'Use this image', 'woocommerce' ); ?>'
                },
                multiple: false
            });
            
            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                
                container.find('.application-image-id').val(attachment.id);
                container.find('.application-image-preview').html('<img src="' + attachment.url + '" style="max-width: 100%; max-height: 100%; object-fit: cover;" />');
                
                button.text('<?php _e( 'Change', 'woocommerce' ); ?>');
                
                if (!container.find('.application-image-remove').length) {
                    button.after('<button type="button" class="button application-image-remove" data-index="' + index + '"><?php _e( 'Remove', 'woocommerce' ); ?></button>');
                }
            });
            
            frame.open();
        });
        
        // Remove image
        $(document).on('click', '.application-image-remove', function(e) {
            e.preventDefault();
            
            var button = $(this);
            var container = button.closest('.application-image-item');
            
            container.find('.application-image-id').val('');
            container.find('.application-image-preview').html('<span style="color: #999; font-size: 12px;">No image</span>');
            container.find('.application-image-upload').text('<?php _e( 'Upload', 'woocommerce' ); ?>');
            
            button.remove();
        });
    });
    </script>
    <?php
}

/**
 * Save Application Images
 */
add_action( 'save_post_product', 'save_application_images_meta_box' );
function save_application_images_meta_box( $post_id ) {
    // Check nonce
    if ( !isset( $_POST['application_images_nonce'] ) || !wp_verify_nonce( $_POST['application_images_nonce'], 'save_application_images' ) ) {
        return;
    }
    
    // Check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    // Check permissions
    if ( !current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    // Save application images
    if ( isset( $_POST['application_images'] ) ) {
        $images = array_filter( array_map( 'absint', $_POST['application_images'] ) );
        update_post_meta( $post_id, '_application_images', $images );
    } else {
        delete_post_meta( $post_id, '_application_images' );
    }
}

/**
 * Enqueue media uploader in product admin
 */
add_action( 'admin_enqueue_scripts', 'enqueue_application_images_admin_scripts' );
function enqueue_application_images_admin_scripts( $hook ) {
    global $post_type;
    
    if ( ( 'post.php' === $hook || 'post-new.php' === $hook ) && 'product' === $post_type ) {
        wp_enqueue_media();
    }
}



