<?php
/*
Template Name: Engineering
*/
get_header();
?>
<main class="industry-main">
  <section class="section">
    <div class="industry-container container">
      <div class="industry-hero">
        <div class="hero-content">
          <span class="sub-head">Engineering Industry</span>
          <h1 class="hero-head">Where Engineering Demands Precision</h1>
          <p class="hero-text">
            CNC machines built to support accurate machining across complex and varied engineering applications.
            Designed for reliability, consistency, and performance in everyday engineering production.
          </p>

          <div class="hero-btns">
          <?php 
          $text = 'Call Us Now';
          $url = home_url('/contact');
          $type = 'primary';
          include get_template_directory() . '/components/button.php';
          ?>

          <?php $text = 'View Our Products';
          $text = 'View Our Products';
          $url = home_url('/products');
          $type = 'secondary';
          include get_template_directory() . '/components/button.php';
          ?>
        </div>
        </div>
        
        <div class="hero-image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/industries/engineering.png" alt="Engineering Industry Hero Image">
        </div>
        
      </div>
    </div>
  </section>
 </main>
<?php
get_footer();
?>