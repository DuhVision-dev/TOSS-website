<?php
/*
Template Name: tooling
*/
get_header();
?>
<main class="industry-main" >
  <section class="section">
    <div class="industry-container container">
      <div class="industry-hero">
        <div class="hero-content">
          <span class="sub-head">Tooling Industry</span>
          <h1 class="hero-head">Where Precision Supports Tooling</h1>
          <p class="hero-text">
            CNC machines designed for accurate machining of tools, dies, and precision components.
            Built to maintain consistency, accuracy, and reliability in tooling production.
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
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/industries/tooling.png" alt="Tooling Industry Hero Image">
        </div>
        
      </div>
    </div>

  </section>
 </main>
<?php
get_footer();
?>