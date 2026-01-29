<?php
// parts/hero.php — Hero section
?>
<section class="hero section">
  <div class="home-hero container">

    <div class="hero-content">
      <span class="sub-head">
        Top 1 Professional CNC Machine Manufacturer in India
      </span>

      <h1 class="hero-head">
        CNC Machines Built for Reliability
      </h1>

      <p class="hero-text">Helping manufacturers achieve accuracy, efficiency, and confidence.</p>


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
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home/hero/hero-image.webp" alt="">
    </div>

  </div>
</section>