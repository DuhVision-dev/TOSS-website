<?php
/*
Template Name: Interior
*/
get_header();
?>
<main class="industry-main">
  <section class="section">
    <div class="industry-container container">
      <div class="industry-hero">
        <div class="hero-content">
          <span class="sub-head">Interior Industry</span>
          <h1 class="hero-head">Where Precision Shapes Interior Manufacturing</h1>
          <p class="hero-text">
            CNC machines designed for accurate cutting, routing, and finishing of interior components.
            Built to support consistent quality across panels, furniture, and custom interior work.
          </p>

          <div class="hero-btns">
            <?php 
            // $text = 'Call Us Now';
            // $url = home_url('/contact');
            // $type = 'primary';
            // include get_template_directory() . '/components/button.php';
            ?>

            <?php 
            // $text = 'View Our Products';
            // $text = 'View Our Products';
            // $url = home_url('/products');
            // $type = 'secondary';
            // include get_template_directory() . '/components/button.php';
            ?>
          </div>
        </div>
        
        <div class="hero-image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/industries/webp/interior.webp" alt="Interior Industry Hero Image">
        </div>
      </div>
    </div>
  </section>

  <section class="ind-info section">
    <div class="ind-info-container container">
      <div class="ind-info-content">
        <span class="ind-info-head">Applications in Interior Manufacturing</span>
        <p class="ind-info-text">
         Our CNC machines are widely used in interior manufacturing for CNC wood cutting, panel processing, cabinet making, door machining, and custom furniture production. Designed for precision machining and repeatable accuracy, they support modular furniture manufacturing, interior fit-out projects, and large-scale woodworking production with clean finishes and consistent results.
        </p>
      </div>
      <div class="ind-imgs">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/industries/interior/interior.webp'; ?>" alt="">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/industries/interior/interior-2.webp'; ?>" alt="">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/industries/interior/interior-3.webp'; ?>" alt="">
      </div>

    <div class="ind-imgs">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/industries/interior/interior-4.webp'; ?>" alt="">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/industries/interior/interior-5.webp'; ?>" alt="">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/industries/interior/interior-6.webp'; ?>" alt="">
      </div>
  </section>
</main>
<?php
get_footer();
?>