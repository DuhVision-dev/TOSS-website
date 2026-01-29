<?php
/*
Template Name: Products Page
*/

get_header();

// ============================================
// STEP 1: Get current category from URL
// ============================================
$current_category = isset($_GET['product_cat']) ? sanitize_text_field($_GET['product_cat']) : '';

// ============================================
// STEP 2: Get current page for pagination
// ============================================
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// ============================================
// STEP 3: Set up WooCommerce product query
// ============================================
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 12, // Max 12 products per page
    'paged'          => $paged,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
);

// Add category filter if selected
if (!empty($current_category)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $current_category,
        ),
    );
}

// Execute the query
$products_query = new WP_Query($args);

?>

<main class="products-page">
  
  <!-- Mobile Category Navbar (Tablet and below) -->
  <div class="mobile-category-navbar">
    <div class="mobile-category-scroll">
      <?php
      // Get parent categories for mobile navbar
      $mobile_parent_cats = get_terms(array(
          'taxonomy'   => 'product_cat',
          'hide_empty' => false,
          'parent'     => 0,
          'orderby'    => 'name',
          'order'      => 'ASC'
      ));
      
      if (!empty($mobile_parent_cats) && !is_wp_error($mobile_parent_cats)) :
          foreach ($mobile_parent_cats as $mobile_cat) :
              if ($mobile_cat->slug === 'uncategorized') continue;
              
              $mobile_cat_url = add_query_arg('product_cat', $mobile_cat->slug, get_permalink());
              $mobile_active = ($current_category === $mobile_cat->slug) ? 'active' : '';
              ?>
              <a href="<?php echo esc_url($mobile_cat_url); ?>" class="mobile-category-item <?php echo esc_attr($mobile_active); ?>">
                  <?php echo esc_html($mobile_cat->name); ?>
              </a>
          <?php endforeach;
      endif;
      ?>
    </div>
    
    <button class="mobile-category-toggle" aria-label="Toggle categories">
     <img src="<?php echo get_template_directory_uri() . '/assets/images/icons/categories.svg'; ?>" alt="">
    </button>
  </div>
  
  <!-- Mobile Category Dropdown (Hidden by default) -->
  <div class="mobile-category-dropdown">
    <div class="mobile-category-dropdown-content">
      <?php
      // Get all categories with hierarchy for dropdown
      $dropdown_parent_cats = get_terms(array(
          'taxonomy'   => 'product_cat',
          'hide_empty' => false,
          'parent'     => 0,
          'orderby'    => 'name',
          'order'      => 'ASC'
      ));
      
      if (!empty($dropdown_parent_cats) && !is_wp_error($dropdown_parent_cats)) :
          foreach ($dropdown_parent_cats as $dropdown_parent) :
              if ($dropdown_parent->slug === 'uncategorized') continue;
              
              $dropdown_parent_url = add_query_arg('product_cat', $dropdown_parent->slug, get_permalink());
              $dropdown_parent_active = ($current_category === $dropdown_parent->slug) ? 'active' : '';
              
              // Get children
              $dropdown_children = get_terms(array(
                  'taxonomy'   => 'product_cat',
                  'hide_empty' => false,
                  'parent'     => $dropdown_parent->term_id,
                  'orderby'    => 'name',
                  'order'      => 'ASC'
              ));
              ?>
              <div class="mobile-dropdown-category-group">
                  <a href="<?php echo esc_url($dropdown_parent_url); ?>" class="mobile-dropdown-parent <?php echo esc_attr($dropdown_parent_active); ?>">
                      <?php echo esc_html($dropdown_parent->name); ?>
                  </a>
                  
                  <?php if (!empty($dropdown_children) && !is_wp_error($dropdown_children)) : ?>
                      <div class="mobile-dropdown-children">
                          <?php foreach ($dropdown_children as $dropdown_child) :
                              $dropdown_child_url = add_query_arg('product_cat', $dropdown_child->slug, get_permalink());
                              $dropdown_child_active = ($current_category === $dropdown_child->slug) ? 'active' : '';
                          ?>
                              <a href="<?php echo esc_url($dropdown_child_url); ?>" class="mobile-dropdown-child <?php echo esc_attr($dropdown_child_active); ?>">
                                  <?php echo esc_html($dropdown_child->name); ?>
                              </a>
                          <?php endforeach; ?>
                      </div>
                  <?php endif; ?>
              </div>
          <?php endforeach;
      endif;
      ?>
    </div>
  </div>
  
  <div class="products-container container">
    
    <!-- ============================================
         LEFT SIDEBAR
         ============================================ -->
    <aside class="products-sidebar">
      
      <!-- PRODUCT CATEGORIES FILTER -->
      <div class="sidebar-section">
        <h3 class="sidebar-title">Our Categories</h3>
        
        <ul class="product-categories-list">
          <?php
          // Get all top-level parent categories (parent = 0)
          $parent_categories = get_terms(array(
              'taxonomy'   => 'product_cat',
              'hide_empty' => false,
              'parent'     => 0,
              'orderby'    => 'name',
              'order'      => 'ASC'
          ));
          
          if (!empty($parent_categories) && !is_wp_error($parent_categories)) :
              foreach ($parent_categories as $parent_cat) :
                  // Skip uncategorized
                  if ($parent_cat->slug === 'uncategorized') continue;
                  
                  // Build parent category URL
                  $parent_url = add_query_arg('product_cat', $parent_cat->slug, get_permalink());
                  
                  // Check if this parent is active
                  $parent_active = ($current_category === $parent_cat->slug) ? 'active' : '';
                  
                  // Get child categories (sub-categories)
                  $child_categories = get_terms(array(
                      'taxonomy'   => 'product_cat',
                      'hide_empty' => false,
                      'parent'     => $parent_cat->term_id,
                      'orderby'    => 'name',
                      'order'      => 'ASC'
                  ));
                  
                  // Check if any child is active
                  $has_active_child = false;
                  if (!empty($child_categories) && !is_wp_error($child_categories)) {
                      foreach ($child_categories as $child) {
                          if ($current_category === $child->slug) {
                              $has_active_child = true;
                              break;
                          }
                      }
                  }
                  
                  // Add 'has-children' and 'has-active-child' classes if applicable
                  $parent_classes = array('category-item');
                  if (!empty($child_categories) && !is_wp_error($child_categories)) {
                      $parent_classes[] = 'has-children';
                  }
                  if ($has_active_child) {
                      $parent_classes[] = 'has-active-child';
                  }
                  if ($parent_active) {
                      $parent_classes[] = 'active';
                  }
                  ?>
                  
                  <li class="<?php echo esc_attr(implode(' ', $parent_classes)); ?>">
                      <a href="<?php echo esc_url($parent_url); ?>">
                          <?php echo esc_html($parent_cat->name); ?>
                      </a>
                      
                      <?php if (!empty($child_categories) && !is_wp_error($child_categories)) : ?>
                          <!-- Sub-categories -->
                          <ul class="product-subcategories-list">
                              <?php foreach ($child_categories as $child_cat) : 
                                  $child_url = add_query_arg('product_cat', $child_cat->slug, get_permalink());
                                  $child_active = ($current_category === $child_cat->slug) ? 'active' : '';
                              ?>
                                  <li class="category-item subcategory-item <?php echo esc_attr($child_active); ?>">
                                      <a href="<?php echo esc_url($child_url); ?>">
                                          <?php echo esc_html($child_cat->name); ?>
                                      </a>
                                  </li>
                              <?php endforeach; ?>
                          </ul>
                      <?php endif; ?>
                  </li>
                  
              <?php endforeach;
          endif;
          ?>
        </ul>
      </div>
      
      <!-- INQUIRY FORM -->
      <div class="sidebar-section sidebar-form">
        <h3 class="sidebar-title">Send your inquiry</h3>
        
        <!-- Reuse existing form structure -->
        <form id="sidebar-inquiry-form" class="sidebar-inquiry-form" method="POST">
          <div class="form-group">
            <label for="sidebar-name">Name</label>
            <input type="text" id="sidebar-name" name="name" required />
          </div>
          
          <div class="form-group">
            <label for="sidebar-company">Company name</label>
            <input type="text" id="sidebar-company" name="company" required />
          </div>
          
          <div class="form-group">
            <label for="sidebar-email">Email</label>
            <input type="email" id="sidebar-email" name="email" required />
          </div>
          
          <div class="form-group">
            <label for="sidebar-phone">Phone/WhatsApp/Skype</label>
            <input type="text" id="sidebar-phone" name="phone" required />
          </div>
          
          <div class="form-group">
            <label for="sidebar-area">Working Area</label>
            <input type="text" id="sidebar-area" name="working_area" required />
          </div>
          
          <div class="form-group">
            <label for="sidebar-message">Message</label>
            <textarea id="sidebar-message" name="message" rows="4" required></textarea>
          </div>
          
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Call Us Now</button>
          </div>
          
          <div id="sidebar-form-response" class="form-response"></div>
        </form>
      </div>
      
    </aside>
    
    <!-- ============================================
         RIGHT CONTENT - PRODUCT GRID
         ============================================ -->
    <div class="products-content">
      
      <?php if ($products_query->have_posts()) : ?>
        
        <!-- Product Grid -->
        <div class="products-grid">
          
          <?php while ($products_query->have_posts()) : $products_query->the_post(); ?>
            <?php
            // Get WooCommerce product object
            global $product;
            ?>
            
            <div class="product-card">
              
              <!-- Product Image -->
              <div class="product-card-image">
                <?php 
                $thumbnail_id = get_post_thumbnail_id();
                if ($thumbnail_id) : ?>
                  <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php echo wp_get_attachment_image($thumbnail_id, 'large', false, array('class' => 'product-thumb')); ?>
                  </a>
                <?php else : ?>
                  <a href="<?php echo esc_url(get_permalink()); ?>">
                    <img src="<?php echo esc_url(wc_placeholder_img_src()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="product-thumb" />
                  </a>
                <?php endif; ?>
              </div>
              
              <!-- Product Title -->
              <div class="product-card-content">
                <h3 class="product-card-name">
                  
                    <?php the_title(); ?>
                </h3>
                
                <!-- Call Us Now Button - Links to Contact Page -->
                <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-primary">
                  Learn More
                </a>
              </div>
              
            </div>
            
          <?php endwhile; ?>
          
        </div>
        
        <!-- ============================================
             PAGINATION
             ============================================ -->
        <?php if ($products_query->max_num_pages > 1) : ?>
          <div class="products-pagination">
            <?php
            // Generate pagination links
            $pagination_args = array(
                'total'        => $products_query->max_num_pages,
                'current'      => $paged,
                'prev_text'    => '&laquo; Previous',
                'next_text'    => 'Next &raquo;',
                'type'         => 'list',
                'end_size'     => 1,
                'mid_size'     => 2
            );
            
            // If category is selected, preserve it in pagination URLs
            if (!empty($current_category)) {
                $pagination_args['add_args'] = array('product_cat' => $current_category);
            }
            
            echo paginate_links($pagination_args);
            ?>
          </div>
        <?php endif; ?>
        
      <?php else : ?>
        
        <!-- No Products Found -->
        <div class="no-products-found">
          <p>No products found in this category.</p>
          <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-secondary">View All Products</a>
        </div>
        
      <?php endif; ?>
      
      <?php
      // Reset post data after custom query
      wp_reset_postdata();
      ?>
      
    </div>
    
  </div>
</main>

<?php
get_footer();
?>