<?php
/*
Template Name: Automobile
*/
get_header();
?>
 <main class="industry-main">
  <section class="section">

    <div class="industry-container container">
      <div class="industry-hero">
        <div class="hero-content">
          <span class="sub-head">Automobile Industry</span>
          <h1 class="hero-head">Where Precision Meets Automotive Manufacturing</h1>
          <p class="hero-text">
            CNC machines designed to support accuracy, consistency, and efficiency in automotive production.
            Built to meet the demands of high-volume manufacturing and tight tolerances.
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
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/industries/automobile.jpg" alt="Automobile Industry Hero Image">
        </div>
        
      </div>
    </div>
    
  </section>
 </main>
<?php
get_footer();
?>